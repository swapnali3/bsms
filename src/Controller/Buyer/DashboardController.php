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
        // Not Logged In
        $session = $this->getRequest()->getSession();
        if (!$session->check('id'))
        { $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login')); }

        $this->set('headTitle', 'Dashboard');
        $conn = ConnectionManager::get('default');
        
        // Search Filter
        $conditions = " where 1=1 ";
        if ($this->request->is(['post'])) {
            $request = $this->request->getData();
            if(isset($request['year']) && !empty($request['year'])) {
                $search = $request['year'];
                $conditions .= " and year(po_footers.added_date) in (".$search.") ";
            }
            if(isset($request['month']) && !empty($request['month'])) {
                $search = $request['month'];
                $conditions .= " and month(po_footers.added_date) in (".$search.") ";
            }
            if(isset($request['sap_vendor_code'])) {
                $search = '';
                foreach ($request['sap_vendor_code'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and po_headers.sap_vendor_code in (".$search.")";
            }
            if(isset($request['code'])) {
                $search = '';
                foreach ($request['code'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and materials.code in (".$search.")";
            }
            if(isset($request['type'])) {
                $search = '';
                foreach ($request['type'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and materials.type in (".$search.")";
            }
            if(isset($request['segment'])) {
                $search = '';
                foreach ($request['segment'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and materials.segment in (".$search.")";
            }
            if(isset($request['pack_size'])) {
                $search = '';
                foreach ($request['pack_size'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and materials.pack_size in (".$search.")";
            }
            if(isset($request['uom'])) {
                $search = '';
                foreach ($request['uom'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and materials.uom in (".$search.")";
            }
            $conn = ConnectionManager::get('default');
        }

        // Dropdowns
        $years = $conn->execute("select distinct year(added_date) as year from po_headers order by year desc")->fetchAll('assoc');
        
        $vendors = $conn->execute("select vendor_temps.sap_vendor_code, vendor_temps.name from vendor_temps left join users on  vendor_temps.email = users.username where users.status = 1")->fetchAll('assoc');

        $materials = $conn->execute("select distinct code, description from materials")->fetchAll('assoc');

        $types = $conn->execute("select distinct type from materials where type is not null")->fetchAll('assoc');

        $segments = $conn->execute("select distinct segment_code, segment from materials")->fetchAll('assoc');

        $packsizes = $conn->execute("select distinct pack_size from materials where pack_size is not null")->fetchAll('assoc');

        $uoms = $conn->execute("select distinct uom from materials where uom is not null")->fetchAll('assoc');
        
        $card_total_vendor = $conn->execute("select count(vendor_temps.id) as vendor from vendor_temps left join users on vendor_temps.email=users.username where users.status = 1")->fetchAll('assoc')[0];
        
        $card_total_category = $conn->execute("select COUNT(DISTINCT segment) as segment from materials")->fetchAll('assoc')[0];
        
        $card_total_product = $conn->execute("select COUNT(DISTINCT code) as code from materials")->fetchAll('assoc')[0];
        
        // echo '<pre>'; print_r($card_total_category); exit;
        $card_spend = $conn->execute("select sum(net_value) as spend from ( select sum(po_footers.net_value) as net_value from po_headers 
        left join po_footers on po_headers.id=po_footers.po_header_id
        left join materials on materials.sap_vendor_code=po_headers.sap_vendor_code and materials.code = po_footers.material
        ".$conditions."
        group by year(po_footers.added_date), month(po_footers.added_date), po_headers.sap_vendor_code, materials.uom, materials.code, materials.type, materials.segment, materials.pack_size) as a")->fetchAll('assoc')[0];

        $card_supplier = $conn->execute("select count(distinct sap_vendor_code) as spend from ( select po_headers.sap_vendor_code from po_headers 
        left join po_footers on po_headers.id=po_footers.po_header_id
        left join materials on materials.sap_vendor_code=po_headers.sap_vendor_code and materials.code = po_footers.material
        ".$conditions."
        group by year(po_footers.added_date), month(po_footers.added_date), po_headers.sap_vendor_code, materials.uom, materials.code, materials.type, materials.segment, materials.pack_size) as a")->fetchAll('assoc')[0];

        $card_transactions = $conn->execute("select count(id) as spend from ( select po_footers.id from po_headers 
        left join po_footers on po_headers.id=po_footers.po_header_id
        left join materials on materials.sap_vendor_code=po_headers.sap_vendor_code and materials.code = po_footers.material
        ".$conditions."
        group by year(po_footers.added_date), month(po_footers.added_date), po_headers.sap_vendor_code, materials.uom, materials.code, materials.type, materials.segment, materials.pack_size) as a")->fetchAll('assoc')[0];

        $card_po_count = $conn->execute("select count(distinct id) as spend from ( select po_headers.id from po_headers 
        left join po_footers on po_headers.id=po_footers.po_header_id
        left join materials on materials.sap_vendor_code=po_headers.sap_vendor_code and materials.code = po_footers.material
        ".$conditions."
        group by year(po_footers.added_date), month(po_footers.added_date), po_headers.sap_vendor_code, materials.uom, materials.code, materials.type, materials.segment, materials.pack_size) as a")->fetchAll('assoc')[0];
        
        $card_invoice_count = $conn->execute("select count(invoice_no) as spend from ( select distinct asn_headers.invoice_no from asn_headers 
        left join po_headers on po_headers.id=asn_headers.po_header_id
        left join po_footers on po_headers.id=po_footers.po_header_id
        left join materials on materials.sap_vendor_code=po_headers.sap_vendor_code and materials.code = po_footers.material
        ".$conditions."
        group by year(po_footers.added_date), month(po_footers.added_date), po_headers.sap_vendor_code, materials.uom, materials.code, materials.type, materials.segment, materials.pack_size, asn_headers.invoice_no) as a")->fetchAll('assoc')[0];
        
        $purchase_volume_segment_wise = $conn->execute("SELECT materials.segment_code, materials.segment, count(materials.segment) as count FROM po_headers
        left join po_footers on po_headers.id= po_footers.po_header_id
        left join materials on po_headers.sap_vendor_code= materials.sap_vendor_code and po_footers.material= materials.code
        left join vendor_temps on vendor_temps.sap_vendor_code = materials.sap_vendor_code and vendor_temps.sap_vendor_code = po_headers.sap_vendor_code
        where materials.segment != ''
        group by materials.segment order by count desc limit 5")->fetchAll('assoc');
        
        // $delivery_time = $conn->execute("")->fetchAll('assoc');
        
        // $spend_by_category = $conn->execute("")->fetchAll('assoc');
        
        // $supplier_wise_business_share_analysis = $conn->execute("")->fetchAll('assoc');
        
        // $category_wise_indent = $conn->execute("")->fetchAll('assoc');

        $this->set(compact(
            'years', 'vendors', 'materials', 'types', 'uoms', 'segments', 'packsizes',
            'card_total_vendor', 'card_total_category', 'card_total_product',
            'card_spend', 'card_supplier', 'card_transactions', 'card_po_count', 'card_invoice_count',
            'purchase_volume_segment_wise',
            // 'delivery_time',
            // 'spend_by_category',
            // 'supplier_wise_business_share_analysis',
            // 'category_wise_indent',
        ));
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
