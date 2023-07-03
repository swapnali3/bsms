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
    public function index()
    {

        $this->set('headTitle', 'Dashboard');
        $session = $this->getRequest()->getSession();

        if (!$session->check('id')) {
            $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        }

        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');
        $this->loadModel('DeliveryDetails');

        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');
        $this->loadModel('AsnHeaders');

        // $totalVendorTemps = $this->VendorTemps->find('all', array('conditions' => array('buyer_id' => $session->read('id'))))->count();

        $totalVendorOnboarding = $this->VendorTemps->find('all', array('conditions' => array('buyer_id' => $session->read('id'), 'status' => '0')))->count();

        $totalVendorApproved = $this->VendorTemps->find('all', array('conditions' => array('buyer_id' => $session->read('id'), 'status' => '3')))->count();


        $totalSentSap = $this->VendorTemps->find('all', array('conditions' => array('buyer_id' => $session->read('id'), 'status' => '2')))->count();

        // Asn deshbord card

        $totalAsnCreated =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '1')))->count();

        $totalAsnIntransit =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '2')))->count();

        $totalAsnReceived =  $this->AsnHeaders->find('all', array('conditions' => array('status' => '3')))->count();


        // Purchase order card count view 

        $query = $this->PoHeaders->find();
        $query->innerJoin(
            ['VendorTemps' => 'vendor_temps'],
            ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code', 'VendorTemps.buyer_id = ' . $session->read('id')]
        );
        $totalPos = $query->count();


        $conn = ConnectionManager::get('default');

        $query = "SELECT COUNT(complete) 
        FROM (
        SELECT 1 AS complete, pf.po_qty, SUM(af.qty) AS delivered
        FROM po_headers ph
        LEFT JOIN po_footers pf ON ph.id = pf.po_header_id
        LEFT JOIN asn_headers ah ON ph.id = ah.po_header_id
        LEFT JOIN asn_footers af ON ah.id = af.asn_header_id AND pf.id = af.po_footer_id) a
        WHERE a.po_qty = a.delivered;";

        $result = $conn->execute($query)->fetch('assoc');
        $poCompleteCount = $result['COUNT(complete)'];

        

       // print_r($countComplete);exit;

        // $totalAsn = $this->DeliveryDetails->find('all', array('conditions'=>array('status'=>0)))->count();

        $query = $this->RfqDetails->find()
            ->select(['RfqDetails.id', 'RfqDetails.rfq_no', 'Products.name', 'RfqDetails.added_date', 'RfqInquiries.reach', 'RfqInquiries.respond'])
            ->contain(['Products'])
            ->leftJoin(
                ['RfqInquiries' => '(select rfq_item_id, count(seller_id) reach, count(inquiry) respond FROM rfq_inquiries group by rfq_inquiries.rfq_item_id)'],
                ['RfqInquiries.rfq_item_id = RfqDetails.id']
            )
            ->where(['RfqDetails.buyer_seller_user_id' => $session->read('id')]);

        $rfqDetails = $this->paginate($query);

        //print_r($query); exit;
        //$rfqsummary = $conn->execute("SELECT rfq_id, U.company_name, rate, created_date FROM rfq_inquiries RI join buyer_seller_users U on (U.id = RI.seller_id) WHERE rate = ( SELECT MIN( RI2.rate ) FROM rfq_inquiries RI2 WHERE RI.rfq_id = RI2.rfq_id ) ORDER BY rfq_id");



        // Getting paginated result based on page #

        $this->set('rfqDetails', $rfqDetails);
        //$this->set('rfqsummary', $rfqsummary);

        $totalRfqDetails = $this->RfqDetails->find('all', array('conditions' => array('status' => 1, 'buyer_seller_user_id' => $session->read('id'))))->count();

        // echo $totalVendorTemps;exit;

        $this->set(compact('totalVendorOnboarding', 'totalVendorApproved', 'totalSentSap', 'totalPos', 'totalAsnCreated', 'totalAsnIntransit', 'totalAsnReceived','poCompleteCount'));
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
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';

        $this->loadModel('Notifications');
        $this->Notifications->updateAll(['message_count' => 0], ['notification_type' => 'asn_material']);

        $response['status'] = 1;
        $response['message'] = 'clear Notification';

        echo json_encode($response);
        exit();
    }
}
