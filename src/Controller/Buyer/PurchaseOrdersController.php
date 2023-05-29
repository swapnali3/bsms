<?php

declare(strict_types=1);

namespace App\Controller\Buyer;

/**
 * PoHeaders Controller
 *
 * @property \App\Model\Table\PoHeadersTable $PoHeaders
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends BuyerAppController
{
    var $uses = array('PoHeaders');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $poHeaders = $this->paginate($this->PoHeaders);

        $this->set(compact('poHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $this->set('headTitle', 'PO Detail');
        $this->loadModel('PoHeaders');
        $poHeaders = $this->PoHeaders->find()
            ->select(['id', 'po_no', 'sap_vendor_code'])->toArray();



        //print_r($poHeader); exit;

        $this->set(compact('poHeaders'));
    }


       public function poApi($search = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');
        $this->loadModel("VendorTemps");

        $session = $this->getRequest()->getSession();

        $data = $this->PoHeaders->find('all')
            ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code', 'PoFooters.item'])
            ->distinct(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->join([
                'table' => 'vendor_temps',
                'alias' => 'V',
                'type' => 'INNER',
                'conditions' => ['V.sap_vendor_code = PoHeaders.sap_vendor_code', 'V.buyer_id' => $session->read('id'), 'status' => '3']
            ])
            ->where([ 
                'OR' => [
                    ['PoHeaders.po_no LIKE' => '%' . $search . '%'],
                    ['PoFooters.material LIKE' => '%' . $search . '%'],
                    ['PoFooters.short_text LIKE' => '%' . $search . '%'],
                ]
            ]);

        //print_r($data);exit;

        if ($data->count() > 0) {
            $response['status'] = 'success';
            $response['message'] = $data;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Order not found';
        }
        echo json_encode($response);
    }

    public function getPoFooters($id = null)
    {

        $this->autoRender = false;
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';


        $this->set('headTitle', 'PO Detail');
        $this->loadModel('PoHeaders');
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => ['PoFooters'],
        ]);

        // print_r($poHeader);
        //echo json_encode($poHeader); exit;
   

        if ($poHeader) {

    
            $response['status'] = 'success';
            $response['data'] = $poHeader;
            $response['message'] = '';

        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Material not found';
        }


        // echo '<pre>'; print_r($data); exit;


        echo json_encode($response); exit;
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
                $this->Flash->success(__('The po header has been saved.'));

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

    public function createSchedule()
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $PoItemSchedule = $this->PoItemSchedules->newEmptyEntity();
                $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $this->request->getData());
                //echo '<pre>'; print_r($PoItemSchedule); exit();
                if ($this->PoItemSchedules->save($PoItemSchedule)) {
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
            $html .= '<table class="table" id="example2">
            <thead>
                    <tr>
                        <th>Actual Qty</th>
                        <th>Received Qty</th>
                        <th>Delivery Date</th>
                        <th>&nbsp;</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {
                //$link = $Html->link(__('Communication'), "#", ['class' => 'schedule_item btn btn-default', 'header-id' => $poHeader->id, 'footer-id' => $poFooters->id, 'item-no' => $poFooters->item]);
                $totalQty += $row->actual_qty;
                $html .= "<tr>
                            <td>$row->actual_qty</td>
                            <td>$row->received_qty</td>
                            <td>$row->delivery_date</td>
                            <td><a href='#' class='notify_item btn btn-default' schedue-id='$row->id' data-toggle='modal' data-target='#notifyModal'>Notify</a></td>
                        </tr>";
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
            $response['totalQty'] = $totalQty;

        } else {
            $response['html'] = '';
            $response['status'] = 'fail';
            $response['message'] = 'No schedule data';
            $response['totalQty'] = '0';
        }


        //echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
    }

    public function getScheduleMessages($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("ItemScheduleMessages");

        $data = $this->ItemScheduleMessages->find()

            ->select(['ItemScheduleMessages.message', 'ItemScheduleMessages.added_date', 'fullname' => 'CONCAT(Users.first_name,  " ",  Users.last_name )'])
            ->Contain(['Users'])
            ->where(['ItemScheduleMessages.schedule_id' => $id]);


        if ($data->count() > 0) {

            $html = '';

            foreach ($data as $row) {
                $html .= "<div class='past-msg'>
                <div class='row m-2'>
                <div class='col-md-12'>
                <div class='d-flex justify-content-between'>
                <div class='c-name'><b>$row->fullname</b></div>
                <div class='c-adde-ddate'><i>$row->added_date</i></div>
                </div>
                <div class='c-msg'>$row->message</div>
                </div>
                </div>
                </div> ";
            }


            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'no record';
            $response['html'] = '';
        }

        echo json_encode($response);
    }

    public function saveScheduleRemarks()
    {
        $session = $this->getRequest()->getSession();
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("ItemScheduleMessages");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $data = array();
                $data['schedule_id'] = $this->request->getData('schedule_id');
                $data['user_id'] = $session->read('id');
                $data['message'] = $this->request->getData('message');
                $PoItemSchedule = $this->ItemScheduleMessages->newEmptyEntity();

                $PoItemSchedule = $this->ItemScheduleMessages->patchEntity($PoItemSchedule, $data);
                //echo '<pre>'; print_r($PoItemSchedule); exit();
                if ($this->ItemScheduleMessages->save($PoItemSchedule)) {
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
}
