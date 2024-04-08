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

namespace App\Controller\Vendor;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class DashboardController extends VendorAppController
{

    public function initialize(): void
    {
        parent::initialize();
        $flash = [];
        //     $session = $this->getRequest()->getSession();

        //     $permissionsTable = $this->getTableLocator()->get('Permissions');
        //     $query = $permissionsTable->find()
        //         ->select(['permission'])
        //         ->where([
        //             'controller' => ':controller', 
        //             'action' => 'index',
        //             'users' => $session->read('id') 
        //         ])->toArray();

        //    print_r($query);exit;    
        $this->set('flash', $flash);
    }

    public function index()
    {
        $this->set('headTitle', 'Dashboard');
        $session = $this->getRequest()->getSession();
        $conn = ConnectionManager::get('default');

        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');

        $this->loadModel('PoItemSchedules');
        $this->loadModel('DeliveryDetails');
        $this->loadModel('StockUploads');
        $this->loadModel('AsnFooters');

        $totalPos = $this->PoHeaders->find('all')
        ->where(['sap_vendor_code' => $session->read('vendor_code')]);

        //echo '<pre>'; print_r($totalPos); exit;
        $totalPos = $totalPos->count();

        $stocks = $conn->execute("select vendor_factories.factory_code, materials.code,  materials.description, CONCAT(stock_uploads.opening_stock, ' ', materials.uom) as opening_stock,
        CONCAT(stock_uploads.production_stock, ' ', materials.uom) as production_stock, CONCAT(stock_uploads.in_transfer_stock, ' ', materials.uom) as in_transfer_stock,
        CONCAT(COALESCE(asn.qty,0), ' ', materials.uom) as asn_stock,  CONCAT(stock_uploads.opening_stock + stock_uploads.production_stock + stock_uploads.in_transfer_stock - stock_uploads.out_transfer_stock - COALESCE(asn.qty,0), ' ', materials.uom) as current_stock,
        CONCAT(materials.minimum_stock, ' ', materials.uom) as minimum_stock, sum(po_footers.po_qty) as po_qty, sum(po_footers.grn_qty) as grn_qty,
        sum(po_footers.po_qty) - sum(po_footers.grn_qty) as pending_qty
        from stock_uploads
        left join vendor_factories on stock_uploads.vendor_factory_id=vendor_factories.id
        left join materials on materials.id = stock_uploads.material_id
        left join po_headers on po_headers.sap_vendor_code = materials.sap_vendor_code
        left join po_footers on po_footers.material = materials.code and po_footers.po_header_id = po_headers.id
        left join (
            select vendor_factories.factory_code, po_footers.material, sum(asn_footers.qty) as qty
            from asn_footers
            left join asn_headers on asn_headers.id=asn_footers.asn_header_id
            left join po_footers on po_footers.id = asn_footers.po_footer_id
            left join po_headers on po_headers.id = po_footers.po_header_id
            left join vendor_factories on asn_headers.vendor_factory_id= vendor_factories.id
            where asn_headers.status in (1,2,3) and po_headers.sap_vendor_code = '".$session->read('vendor_code')."'
            group by vendor_factories.id, po_footers.material
        ) as asn on asn.factory_code = vendor_factories.factory_code and asn.material = materials.code
        where materials.sap_vendor_code='".$session->read('vendor_code')."' and po_qty > 0
        group by vendor_factories.factory_code, materials.code
        order by stock_uploads.updated_date desc")->fetchAll('assoc');

        $intransitMaterials = $this->AsnFooters->find('all')
        ->select(['VendorFactories.factory_code','AsnHeaders.asn_no', 'AsnHeaders.invoice_no', 'AsnHeaders.invoice_date', 'PoHeaders.po_no', 'PoFooters.material', 'AsnFooters.qty', 'AsnHeaders.status'])
        ->contain(['AsnHeaders', 'AsnHeaders.VendorFactories','PoFooters', 'PoFooters.PoHeaders'])
        ->where(['AsnHeaders.status' => '2', 'PoHeaders.sap_vendor_code' => $session->read('vendor_code')]);
        $totalIntransit = $intransitMaterials->count();
        
        $this->set(compact('totalPos', 'totalIntransit', 'stocks', 'intransitMaterials'));
    }

    public function getlist()
    {
        $this->autoRender = false;
        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');

        $query = $this->PoHeaders->find();
        $query->join(['PoFooters' => 'po_footers'])
            ->leftJoin(
                ['VendorTemps' => 'vendor_temps'],
                ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code']
            )->toArray();



        print_r($query);
    }

    public function clearMessageCount()
    {
        $session = $this->getRequest()->getSession();
        $vendorID = $session->read('id');
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
