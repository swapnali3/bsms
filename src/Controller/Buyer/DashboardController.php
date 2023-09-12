<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Buyer;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class DashboardController extends BuyerAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }

    public function index()
    {

        $this->set('headTitle', 'Dashboard');
        $session = $this->getRequest()->getSession();

        //echo '<pre>'; print_r($session->read()); exit;

        if (!$session->check('id')) {
            $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        }

        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');
        $this->loadModel('DeliveryDetails');
        $this->loadModel('AsnHeaders');

        $totalVendorTemps = $this->VendorTemps->find('all', array('conditions' => array(
            'company_code_id' => $session->read('company_code_id'), 
            'purchasing_organization_id' => $session->read('purchasing_organization_id'))))->count();

        $totalVendorOnboarding = $this->VendorTemps->find('all', array('conditions' => array(
            'company_code_id' => $session->read('company_code_id'),
            'purchasing_organization_id' => $session->read('purchasing_organization_id'), 
            'status' => '0')))->count();

        $totalVendorApproved = $this->VendorTemps->find('all', array('conditions' => array(
            'company_code_id' => $session->read('company_code_id'),
            'purchasing_organization_id' => $session->read('purchasing_organization_id'), 
            'status' => '3')))->count();


        $totalSentSap = $this->VendorTemps->find('all', array('conditions' => array(
            'company_code_id' => $session->read('company_code_id'),
            'purchasing_organization_id' => $session->read('purchasing_organization_id'), 
            'status' => '2')))->count();

        // Asn deshbord card

        $totalAsnCreated =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '1')))->count();

        $totalAsnIntransit =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '2')))->count();

        $totalAsnReceived =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '3')))->count();


        // Purchase order card count view 

        $query = $this->PoHeaders->find();
        $query->innerJoin(
            ['VendorTemps' => 'vendor_temps'],
            ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code', 
            'VendorTemps.company_code_id' => $session->read('company_code_id'),
            'VendorTemps.purchasing_organization_id' => $session->read('purchasing_organization_id')]
        );
        $totalPos = $query->count();


        $conn = ConnectionManager::get('default');

        $query = "select count(1) complete from (SELECT sum(pf.pending_qty)
        from po_headers PH	
        join po_footers pf on pf.po_header_id = PH.id
        group by PH.id
        having sum(pf.pending_qty) = 0
    ) a";

        $result = $conn->execute($query)->fetch('assoc');
        $poCompleteCount = $result['complete'];

        $topVendor = $conn->execute("select * from (SELECT PH.sap_vendor_code, sum(pf.po_qty) total
        from po_headers PH	
        join po_footers pf on pf.po_header_id = PH.id
        group by PH.sap_vendor_code
    ) a order by total desc limit 5 ");
        $topVendors = $topVendor->fetchAll('assoc');



        // echo $totalVendorTemps;exit;

        $this->set(compact('totalVendorTemps','totalVendorOnboarding', 'totalVendorApproved', 'totalSentSap', 'totalPos', 'totalAsnCreated', 'totalAsnIntransit', 'totalAsnReceived', 'poCompleteCount', 'topVendors'));
    }

    public function oldindex()
    {

        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('BuyerSellerUsers');

        $query = $this->RfqDetails->find();
        $query->select([
            'company_name' => 'BuyerSellerUsers.company_name', 'buyer_id' => 'BuyerSellerUsers.Id',
            'rfq_count' => $query->func()->count('RfqDetails.Id'),
            'reached' => $query->func()->count('RfqInquiries.Id'),
            'new_rfq' => $query->func()->sum('case when RfqDetails.status = 0 then 1 else 0 end'),
            'responded' => $query->func()->sum('case when RfqInquiries.inquiry = 1 then 1 else 0 end')
        ])
            ->contain(['BuyerSellerUsers', 'Products'])
            ->leftJoin(
                ['RfqInquiries' => 'rfq_inquiries'],
                ['RfqInquiries.rfq_id = RfqDetails.id']
            )
            ->group(['RfqDetails.buyer_seller_user_id'])
            ->order(['responded asc']);

        $countDashboard = $this->paginate($query);
        $this->set('countDashboard', $countDashboard);

        $rfqNonResponded = array();
        $queryNonResponded = $this->RfqDetails->find()
            ->select([
                'buyer_id' => 'RfqDetails.buyer_seller_user_id',
                'rfq_non_responded' => $query->func()->count('RfqDetails.Id')
            ])
            ->where('RfqDetails.Id not in (select rfq_id from rfq_inquiries where inquiry = 1)')
            ->group(['RfqDetails.buyer_seller_user_id'])->toList();

        foreach ($queryNonResponded as $key => $val) {
            $rfqNonResponded[$val->buyer_id] = $val->rfq_non_responded;
        }

        $this->set('rfqNonResponded', $rfqNonResponded);
    }

    public function rfqList($buyerId = null, $responded = null)
    {

        $this->loadModel('RfqDetails');
        $this->loadModel('BuyerSellerUsers');

        $buyerSellerUser = $this->BuyerSellerUsers->get($buyerId, [
            'contain' => [],
        ]);


        $query = $this->RfqDetails->find()
            ->select(['RfqDetails.Id', 'RfqDetails.rfq_no', 'RfqDetails.part_name', 'RfqDetails.qty', 'Uoms.description', 'RfqDetails.status', 'RfqDetails.added_date', 'Products.name'])
            ->contain(['Products', 'Uoms'])
            ->where(['RfqDetails.buyer_seller_user_id' => $buyerId]);

        if (isset($responded) && !$responded) {
            $query = $this->RfqDetails->find()
                ->select(['RfqDetails.Id', 'RfqDetails.rfq_no', 'RfqDetails.part_name', 'RfqDetails.qty', 'Uoms.description', 'RfqDetails.status', 'RfqDetails.added_date', 'Products.name'])
                ->contain(['Products', 'Uoms'])
                ->where(['RfqDetails.buyer_seller_user_id' => $buyerId, 'RfqDetails.Id not in (select rfq_id from rfq_inquiries where inquiry = 1)']);
        }

        $rfqDetailsList = $this->paginate($query);



        $this->set(compact('buyerSellerUser'));
        $this->set('rfqList', $rfqDetailsList);
    }

    public function clearMessageCount()
    {
        $session = $this->getRequest()->getSession();
        // $vendorID = $session->read('id');
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';

        $id = $this->request->getQuery('id'); 
        if (!empty($id)) {
            $this->loadModel('Notifications');
            $this->Notifications->updateAll(['message_count' => 0], ['id IN' => $id]);
        }
        else{
            $response['status'] = 0;
            $response['message'] = 'Failed';
        }

        $response['status'] = 1;
        $response['message'] = 'Clear Notification';

        echo json_encode($response);
        exit();
    }
}
