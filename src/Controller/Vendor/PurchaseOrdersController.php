<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\View\Helper\HtmlHelper;
use Cake\Datasource\ConnectionManager;

/**
 * PoHeaders Controller
 *
 * @property \App\Model\Table\PoHeadersTable $PoHeaders
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends VendorAppController
{
    var $uses = array('PoHeaders', 'DeliveryDetails');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');
        $session = $this->getRequest()->getSession();
        $poHeaders = $this->paginate($this->PoHeaders->find()
            ->where(['sap_vendor_code' => $session->read('vendor_code'), '(select count(1) from po_item_schedules PoItemSchedules where po_header_id = PoHeaders.id) > 0']));

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'create_schedule' AND message_count > 0");
        $count = $notificationCount->rowCount();

        $this->set(compact('poHeaders', 'notificationCount', 'count'));
    }

    public function poApi($search = null, $createAsn = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');

        $session = $this->getRequest()->getSession();

        if (!empty($createAsn)) {

            $data = $this->PoHeaders->find('all')
                ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
                ->distinct(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
                ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
                ->innerJoin(['PoItemSchedules' => 'po_item_schedules'], ['PoItemSchedules.po_footer_id = PoFooters.id'])
                ->where([
                    'sap_vendor_code' => $session->read('vendor_code'), '(select count(1) from po_item_schedules PoItemSchedules where po_header_id = PoHeaders.id ) > 0',
                    '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0',
                    'OR' => [
                        ['PoHeaders.po_no LIKE' => '%' . $search . '%'],
                        ['PoFooters.material LIKE' => '%' . $search . '%'],
                        ['PoFooters.short_text LIKE' => '%' . $search . '%'],
                    ]
                ])
                ->order(['PoHeaders.id' => 'DESC']);
        } else {

            $data = $this->PoHeaders->find('all')
                ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
                ->distinct(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
                ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
                ->where([
                    'sap_vendor_code' => $session->read('vendor_code'), '(select count(1) from po_item_schedules PoItemSchedules where po_header_id = PoHeaders.id ) > 0',
                    'OR' => [
                        ['PoHeaders.po_no LIKE' => '%' . $search . '%'],
                        ['PoFooters.material LIKE' => '%' . $search . '%'],
                        ['PoFooters.short_text LIKE' => '%' . $search . '%'],
                    ]
                ])
                ->order(['PoHeaders.id' => 'DESC']);
        }

        //  print_r($data);exit;

        if ($data->count() > 0) {
            $response['status'] = 'success';
            $response['message'] = $data;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Order not found';
        }
        echo json_encode($response);
    }

    public function createAsn()
    {
        $this->set('headTitle', 'Create ASN');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');
        $session = $this->getRequest()->getSession();
        $poHeaders = $this->paginate($this->PoHeaders->find()
            ->where(['sap_vendor_code' => $session->read('vendor_code'), '(select count(1) from po_item_schedules PoItemSchedules where po_header_id = PoHeaders.id) > 0']));

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'create_schedule' AND message_count > 0");
        $count = $notificationCount->rowCount();

        $this->set(compact('poHeaders', 'notificationCount', 'count'));
    }

    /**
     * View method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');


        /*$poHeader = $this->PoHeaders->get($id, [
            'contain' => ['PoFooters'],
        ]); */
        $poHeader = $this->PoHeaders->find('all')
            ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.currency', 'PoFooters.id', 'PoFooters.item', 'PoFooters.material', 'PoFooters.short_text', 'PoFooters.order_unit', 'PoFooters.net_price', 'PoItemSchedules.id', 'actual_qty' => '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty)', 'PoItemSchedules.delivery_date'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->innerJoin(['PoItemSchedules' => 'po_item_schedules'], ['PoItemSchedules.po_footer_id = PoFooters.id'])
            ->innerJoin(['dateDe' => '(select min(delivery_date) date from po_item_schedules PoItemSchedules where (PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0  group by po_footer_id )'], ['dateDe.date = PoItemSchedules.delivery_date'])

            ->where(['PoHeaders.id' => $id, '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0'])->toArray();

        //echo '<pre>'; print_r($poHeader); exit;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('AsnHeaders');
            $this->loadModel('AsnFooters');
            try {
                $request = $this->request->getData();
                $conn = ConnectionManager::get('default');
                $maxrfq = $conn->execute("SELECT MAX(asn_no) maxrfq FROM asn_headers where po_header_id=" . $request['po_header_id']);

                foreach ($maxrfq as $maxid) {
                    $asnNo = $maxid['maxrfq'];
                    if ($asnNo == 0) {
                        $asnNo = date('y') . str_pad($request['po_header_id'], 5, '0', STR_PAD_LEFT) . '1';
                    } else {
                        $asnNo = $asnNo + 1;
                    }
                }

                // echo '<pre>';
                // print_r($request);
                // exit;

                $productImages = $request["invoices"];

                //print_r($productImage);exit;
                $uploads["invoices"] = array();
                // file uploaded
                foreach ($productImages as $productImage) {
                    $fileName = $asnNo . '_' . time() . '_' . $productImage->getClientFilename();
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $uploads["invoices"][] = "uploads/" . $fileName;
                    }
                }


                // print_r($uploads["invoices"]);exit;
                $asnData = array();
                $asnData['asn_no'] = $asnNo;
                $asnData['po_header_id'] = $request['po_header_id'];
                $asnData['invoice_path'] = json_encode($uploads["invoices"]);
                $asnData['invoice_no'] = $request['invoice_no'];
                $asnData['invoice_date'] = $request['invoice_date'];
                $asnData['invoice_value'] = $request['invoice_value'];
                $asnData['vehicle_no'] = $request['vehicle_no'];
                $asnData['driver_name'] = $request['driver_name'];
                $asnData['driver_contact'] = $request['driver_contact'];
                $asnData['transporter_name'] = $request['transporter_name'];

                $asnObj = $this->AsnHeaders->newEmptyEntity();
                $asnObj = $this->AsnHeaders->patchEntity($asnObj, $asnData);

                if ($this->AsnHeaders->save($asnObj)) {

                    $asnSchedueData = array();
                    foreach ($request['schedule_id'] as $key => $val) {
                        $tmp = array();
                        $tmp['asn_header_id'] = $asnObj->id;
                        $tmp['po_footer_id'] = $request['po_footer_id'][$key];
                        $tmp['po_schedule_id'] = $val;
                        $tmp['qty'] = $request['qty'][$key];
                        $asnSchedueData[] = $tmp;

                        $schedueData = $this->PoItemSchedules->get($val);
                        $schedueData->received_qty = $schedueData->received_qty + $request['qty'][$key];
                        $this->PoItemSchedules->save($schedueData);
                    }

                    $asnFooter = $this->AsnFooters->newEntities($asnSchedueData);
                    if ($this->AsnFooters->saveMany($asnFooter)) {
                        $response['status'] = 'success';
                        $response['message'] = 'Record save successfully';
                       // $this->Flash->success("ASN-$asnNo has been created successfully");
                        $this->Flash->success(__("ASN-$asnNo has been created successfully", 30));
                        return $this->redirect(['controller' => 'asn', 'action' => 'index']);
                    } else {
                    }
                } else {
                    $this->Flash->error("fail");
                }
            } catch (\PDOException $e) {
                $this->Flash->error($e->getMessage());
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        //$data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id]]);

        //echo '<pre>'; print_r($poHeader); exit;

        $this->set(compact('poHeader'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poHeader = $this->PoHeaders->newEmptyEntity();
        if ($this->request->is('post')) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The po header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $poHeader = $this->PoHeaders->get($id);
        if ($this->PoHeaders->delete($poHeader)) {
            $this->Flash->success(__('The po header has been deleted.'));
        } else {
            $this->Flash->error(__('The po header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function adddelivery()
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("DeliveryDetails");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $DeliveryDetail = $this->DeliveryDetails->newEmptyEntity();
                $DeliveryDetail = $this->DeliveryDetails->patchEntity($DeliveryDetail, $this->request->getData());
                if ($this->DeliveryDetails->save($DeliveryDetail)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }


    public function getDeliveryDetails($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("DeliveryDetails");
        $data = $this->DeliveryDetails->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';

        if ($data->count() > 0) {
            $html .= '<table class="table table-bordered table-hover" id="example1">
            <thead>
                    <tr>
                        <th>Challan No</th>
                        <th>Qty</th>
                        <th>Eway Bill No.</th>
                        <th>Einvoice No</th>
                        <th class="actions">Actions</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {
                $totalQty = $totalQty + $row->qty;

                $html .= "<tr>
                            <td>$row->challan_no</td>
                            <td>$row->qty</td>
                            <td>$row->eway_bill_no</td>
                            <td>$row->einvoice_no</td>
                            <td class=\"actions\">
                                
                            </td>
                        </tr>";
            }

            $html .= "</tbody>
            </table>

            <div>Delivered Qty :$totalQty </div>";

            $response['status'] = 'success';
            $response['message'] = 'sucees';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'no record found';
        }


        //echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
    }

    public function getSchedules($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        $data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';


        if ($data->count() > 0) {
            $html .= '<table class="table table-bordered table-hover" id="example2">
            <thead>
                    <tr>
                        <th>Required Qty</th>
                        <th>Delivery Date</th>
                        <th class="actions">Actions</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {

                //$link = $this->Html->link(__('Dispatch'), "#", ['class' => 'dispatch_item', 'data-toggle'=> "modal", 'data-target' => "#exampleModal" ,'header-id' => $row->po_header_id, 'footer-id' => $id, 'schedule-id' => $row->id]);
                //echo $link; exit;
                $html .= "<tr>
                            <td>$row->actual_qty</td>
                            <td>$row->delivery_date</td>
                            <td class=\"actions\">
                                <a href='#' class='dispatch_item' data-toggle='modal' data-target='#exampleModal' header-id='$row->po_header_id'  footer-id='$id' schedule-id='$row->id'>Dispatch</a>
                            </td>
                        </tr>";
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'No schedules';
        }


        //echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
    }


    public function getItems($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');

        //$data = $this->PoFooters->find('all', ['conditions' => ['po_header_id' => $id]]);

        $data = $this->PoHeaders->find('all')

            ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.currency', 'PoFooters.id', 'PoFooters.item', 'PoFooters.material', 'PoFooters.short_text', 'PoFooters.order_unit', 'PoFooters.net_price', 'PoItemSchedules.id', 'actual_qty' => '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty)', 'PoItemSchedules.delivery_date'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->innerJoin(['PoItemSchedules' => 'po_item_schedules'], ['PoItemSchedules.po_footer_id = PoFooters.id'])
            ->innerJoin(['dateDe' => '(select min(delivery_date) date, po_footer_id from po_item_schedules PoItemSchedules where (PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0  group by po_footer_id )'], ['dateDe.date = PoItemSchedules.delivery_date', 'dateDe.po_footer_id = PoItemSchedules.po_footer_id'])

            ->where(['PoHeaders.id' => $id, '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0'])
            ->limit(1);

        //echo '<pre>'; print_r($data); exit;

        $html = '';
        if ($data->count() > 0) {
            $html .= '<table class="table table-bordered material-list" id="example2">
            <thead>
                <tr>
                    <th>
                    <input type="checkbox"  id="ckbCheckAll">
                    </th>
                    <th>Item</th>
                    <th>Material</th>
                    <th>Short Text</th>
                    <th>Pending Qty</th>
                    <th>Set Delivery Qty</th>
                </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {
                // print_r($row); 
                $html .= '<tr>
                <td><input type="checkbox" name="footer_id[]" value="' . $row->PoFooters['id'] . '" class="checkBoxClass"  data-pendingqty="' . $row->actual_qty . '" data-id="' . $row->PoItemSchedules['id'] . '"></td>
                 <td>' . $row->PoFooters['item'] . '</td>
                 <td>' . $row->PoFooters['material'] . '</td>
                 <td>' . $row->PoFooters['short_text'] . '</td>
                 <td>' . $row->actual_qty . ' ' . $row->PoFooters['order_unit'] . '</td>
                 <td><input type="number" name="" class="form-control check_qty" required="required" data-item="' . $row->PoFooters['item'] . '" id="qty' . $row->PoItemSchedules['id'] . '" value="0"></td>
                 
                </tr>';
            }
            // exit;
            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Material not found';
        }


        //echo '<pre>'; print_r($data); exit;
        echo json_encode($response);
    }

    public function getPurchaseItem($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');

        //$data = $this->PoFooters->find('all', ['conditions' => ['po_header_id' => $id]]);

        $data = $this->PoHeaders->find('all')
            ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.currency', 'PoFooters.id', 'PoFooters.item', 'PoFooters.material', 'PoFooters.short_text', 'PoFooters.order_unit', 'PoFooters.po_qty', 'PoFooters.net_price', 'PoFooters.net_value'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->where(['PoHeaders.id' => $id]);



        //echo '<pre>'; print_r($data); exit;

        $html = '';
        if ($data->count() > 0) {
            $html .= '<table class="table table-bordered material-list" id="example2">
            <thead>
                <tr>
                
                    <th>Item</th>
                    <th>Material</th>
                    <th>Short Text</th>
                    <th>Quantity</th>
                    <th>Base Value</th>
                    <th>Net Value</th>
            
                </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {
                //print_r($row); exit;
                $html .= '<tr>

                 <td>' . $row->PoFooters['item'] . '</td>
                 <td>' . $row->PoFooters['material'] . '</td>
                 <td>' . $row->PoFooters['short_text'] . '</td>
                 <td>' . $row->PoFooters['po_qty'] . ' ' . $row->PoFooters['order_unit'] . '</td>
                 <td>' . $row->PoFooters['net_price'] . '</td>
                 <td>' . $row->PoFooters['net_value'] . '</td>
                 
                </tr>';
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Material not found';
        }


        //echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
    }


    public function asnMaterials($id = null)
    {
        $this->set('headTitle', 'Create ASN Review');
        if ($this->request->is(['patch', 'post', 'put'])) {

            $request = $this->request->getData();

            //echo '<pre>'; print_r($request); exit;

            $id = $request['po_header_id'];
            $this->loadModel('PoHeaders');
            $this->loadModel('PoItemSchedules');

            $conditions = array();
            $whereFooterIds = "";

            $conditions['PoHeaders.id']  = $id;

            $conditions[]  = '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0';


            if (!empty($request['footer_id'])) {
                //$whereFooterIds = " PoFooters.id in (".implode(',', $request['footer_id']).") ";
                $conditions[]  = "PoFooters.id in (" . implode(',', $request['footer_id']) . ")";
            }

            $poHeader = $this->PoHeaders->find('all')
                ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.currency', 'PoFooters.id', 'PoFooters.item', 'PoFooters.material', 'PoFooters.short_text', 'PoFooters.order_unit', 'PoFooters.net_price', 'PoItemSchedules.id', 'actual_qty' => '(PoItemSchedules.actual_qty - PoItemSchedules.received_qty)', 'PoItemSchedules.delivery_date'])
                ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
                ->innerJoin(['PoItemSchedules' => 'po_item_schedules'], ['PoItemSchedules.po_footer_id = PoFooters.id'])
                ->innerJoin(['dateDe' => '(select min(delivery_date) date, po_footer_id from po_item_schedules PoItemSchedules where (PoItemSchedules.actual_qty - PoItemSchedules.received_qty) > 0  group by po_footer_id )'], ['dateDe.date = PoItemSchedules.delivery_date', 'dateDe.po_footer_id = PoItemSchedules.po_footer_id'])
                ->where($conditions)
                ->limit(1)
                ->toArray();


            //echo '<pre>'; print_r($poHeader); exit;


            foreach ($poHeader as &$row) {
                foreach ($request['footer_id'] as $key => $footer_id) {
                    if ($row->PoFooters['id'] == $footer_id) {
                        $row->actual_qty = $request['footer_id_qty'][$key];
                    }
                }
                //echo '<pre>';print_r($row); exit;
            }

            $this->loadModel('Notifications');
            $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'create_schedule' AND message_count > 0");
            $count = $notificationCount->rowCount();


            $this->set(compact('poHeader', 'notificationCount','count'));
        } else {
            return $this->redirect(['action' => 'create-asn']);
        }
    }
}
