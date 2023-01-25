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
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class DashboardController extends VendorAppController
{
    public function index() {

        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');

        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');


        $query = $this->PoHeaders->find();
        $query->leftJoin(
                ['VendorTemps' => 'vendor_temps'],
                ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code']);

        $po_list = $this->paginate($query);
        $this->set('po_list', $po_list);

        $rfqDetails = $this->RfqDetails->find('all', ['condtions' => ['status' => 0]])->contain(['Products','Uoms'])->order(['RfqDetails.added_date' => 'desc']);
        $this->set('rfqDetails', $rfqDetails);
    }

    public function rfqView($id = null)
    {
        $session = $this->getRequest()->getSession();
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');

        $rfqDetails = $this->RfqDetails->get($id, [
            'contain' => ['Products', 'Uoms'],
        ]);
        //$attrParams = json_decode($rfqDetails->uploaded_files, true);

        
        $userType = 'seller';
        if($userType == 'seller') {
            $RfqInquiry = $this->RfqInquiries->newEmptyEntity();
            $data = array();
            $data['rfq_id'] = $id;
            $data['seller_id'] = $session->read('id');
            $RfqInquiry = $this->RfqInquiries->patchEntity($RfqInquiry, $data);
            $results = $this->RfqInquiries->save($RfqInquiry);
        }   

        $this->set(compact('rfqDetails', 'userType', 'results'));
    }

    public function getlist() {


        $this->autoRender= false;
        $this->loadModel('PoHeaders');
        $this->loadModel('VendorTemps');
        

        $query = $this->PoHeaders->find();
        $query->join(['PoFooters' => 'po_footers'])
        ->leftJoin(
                ['VendorTemps' => 'vendor_temps'],
                ['VendorTemps.sap_vendor_code = PoHeaders.sap_vendor_code'])->toArray();


        
        print_r($query);
    }
}
