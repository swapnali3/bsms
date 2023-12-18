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
        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');
        $this->loadModel('DeliveryDetails');
        $this->loadModel('AsnHeaders');
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $session = $this->getRequest()->getSession();
        $conn = ConnectionManager::get('default');
        if (!$session->check('id'))
        { $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login')); }

        // POST
        $g1_filter = " where 1=1 ";
        $g2_filter = " where 1=1 ";
        $g3_filter = " where 1=1 ";
        $g4_filter = " where 1=1 ";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->request->getData();
            // FILTER : Vendor By Order Value
            if(isset($request['vendor5'])) {
                $search = '';
                foreach ($request['vendor5'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g1_filter .= " and po_headers.sap_vendor_code in (".$search.")";
            }
            if(isset($request['type5'])) {
                $search = '';
                foreach ($request['type5'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g1_filter .= " and materials.type in (".$search.")";
            }
            if(isset($request['segment5'])) {
                $search = '';
                foreach ($request['segment5'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g1_filter .= " and materials.segment in (".$search.")";
            }
            // FILTER : Top 5 Materials by quantity
            if(isset($request['vendor6'])) {
                $search = '';
                foreach ($request['vendor6'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g2_filter .= " and materials.sap_vendor_code in (".$search.")";
            }
            if(isset($request['type6'])) {
                $search = '';
                foreach ($request['type6'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g2_filter .= " and materials.type in (".$search.")";
            }
            if(isset($request['segment6'])) {
                $search = '';
                foreach ($request['segment6'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g2_filter .= " and materials.segment in (".$search.")";
            }
            // FILTER : PO order value by period
            if(isset($request['vendor7'])) {
                $search = '';
                foreach ($request['vendor7'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g3_filter .= " and materials.sap_vendor_code in (".$search.")";
            }
            if(isset($request['type7'])) {
                $search = '';
                foreach ($request['type7'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g3_filter .= " and materials.type in (".$search.")";
            }
            if(isset($request['segment7'])) {
                $search = '';
                foreach ($request['segment7'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g3_filter .= " and materials.segment in (".$search.")";
            }
            // FILTER : Top Material by order value
            if(isset($request['vendor8'])) {
                $search = '';
                foreach ($request['vendor8'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g4_filter .= " and materials.sap_vendor_code in (".$search.")";
            }
            if(isset($request['type8'])) {
                $search = '';
                foreach ($request['type8'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g4_filter .= " and materials.type in (".$search.")";
            }
            if(isset($request['segment8'])) {
                $search = '';
                foreach ($request['segment8'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $g4_filter .= " and materials.segment in (".$search.")";
            }
        }

        // Vendors
        $vendorStatus = $this->VendorTemps->find()
        ->select(['status' => 'VendorStatus.status','count' => 'count(VendorStatus.status)'])
        ->innerJoin(['VendorStatus' => 'vendor_status'], ['VendorStatus.status=VendorTemps.status'])
        ->where(['company_code_id' => $session->read('company_code_id'), 
        'purchasing_organization_id' => $session->read('purchasing_organization_id')])
        ->group('VendorTemps.status')->toArray();

        $vendorDashboardCount = [];
        $vendorDashboardCount['total'] = array_sum(array_column($vendorStatus,'count'));
        foreach($vendorStatus as $status) { $vendorDashboardCount[$status->status] = $status->count; }

        // ASN
        $asnCounts = $this->AsnHeaders->find()
        ->select(['status' => 'AsnHeaders.status','count' => 'count(AsnHeaders.status)'])
        ->innerJoin( ['PoHeaders' => 'po_headers'], ['AsnHeaders.po_header_id = PoHeaders.id'] )
        ->innerJoin(
            ['VendorTemps' => 'vendor_temps'],
            ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code', 
            'VendorTemps.company_code_id' => $session->read('company_code_id'),
            'VendorTemps.purchasing_organization_id' => $session->read('purchasing_organization_id')]
        )->group('AsnHeaders.status')->toArray();

        $asnDashboardCount = [];
        $asnDashboardCount['total'] = array_sum(array_column($asnCounts,'count'));
        foreach($asnCounts as $status) { $asnDashboardCount[$status->status] = $status->count; }

        // Purchase orders
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
        having sum(pf.pending_qty) = 0) a";
        $result = $conn->execute($query)->fetch('assoc');
        $poCompleteCount = $result['complete'];

        // Vendor By Order value
        $topVendor = $conn->execute("select po_headers.sap_vendor_code as category, sum(po_footers.net_value) as value
        from po_headers left join po_footers on po_footers.po_header_id = po_headers.id
        left join materials on materials.code = po_footers.material".$g1_filter."
        group by po_headers.sap_vendor_code
        order by po_footers.net_value desc
        limit 5 ");
        $topVendors = $topVendor->fetchAll('assoc');

        // Material by Quantity
        $topMaterial = $conn->execute("SELECT po_footers.material as category, sum(po_footers.po_qty) as value
        from po_footers left join materials on materials.code = po_footers.material".$g2_filter."
        group by po_footers.material
        order by po_footers.net_value desc limit 5 ");
        $topMaterials = $topMaterial->fetchAll('assoc');
        
        $orderByPeriod = $conn->execute("SELECT sum(po_footers.net_value) as value, date_format(po_headers.created_on, '%b-%y') as network
        from po_headers left join po_footers on po_footers.po_header_id = po_headers.id
        left join materials on materials.code = po_footers.material".$g3_filter."
        group by date_format(po_headers.created_on, '%b-%y')
        order by po_headers.created_on asc limit 5 ");
        $orderByPeriods = $orderByPeriod->fetchAll('assoc');

        $topMaterialByValue = $conn->execute("SELECT po_footers.material as country, sum(po_footers.net_value) as value
        from po_footers left join materials on materials.code = po_footers.material".$g4_filter."
        group by po_footers.material
        order by po_footers.net_value desc limit 5 ");
        $topMaterialByValues = $topMaterialByValue->fetchAll('assoc');
        
        // echo '<pre>'; print_r($topMaterial); exit;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->autoRender = false;
            $results = array($topVendors, $topMaterials, $orderByPeriods, $topMaterialByValues);
            $response = array('status'=>1, 'message'=>'success', 'data'=>$results);
            echo json_encode($response); exit;
        }

        // Filter List
        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendor = $this->PoHeaders->find('all')->select(['sap_vendor_code'])->distinct(['sap_vendor_code'])->where(['sap_vendor_code IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->select(['type'])->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();
        
        $this->set(compact('vendor', 'vendortype', 'segment', 'topVendors', 'topMaterials', 'topMaterialByValues', 'orderByPeriods', 'vendorDashboardCount', 'totalPos', 'asnDashboardCount', 'poCompleteCount'));
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
