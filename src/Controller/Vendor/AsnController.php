<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * DeliveryDetails Controller
 *
 * @property \App\Model\Table\DeliveryDetailsTable $DeliveryDetails
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AsnController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'ASN List');
        $this->loadModel('AsnHeaders');
        $session = $this->getRequest()->getSession();
        /*$this->paginate = [
            'contain' => ['PoHeaders'],
            'conditions' => ['AsnHeaders.status' => '1', 'PoHeaders.sap_vendor_code' => $session->read('vendor_code')] 
        ]; */


        $query = $this->AsnHeaders->find()
            ->select(['AsnHeaders.id','AsnHeaders.asn_no','AsnHeaders.invoice_no','AsnHeaders.invoice_date','PoHeaders.po_no', 'AsnHeaders.added_date','AsnHeaders.status'])
            ->contain(['PoHeaders'])
            ->where(['PoHeaders.sap_vendor_code' => $session->read('vendor_code')]);

            //echo '<pre>'; print_r($query); exit;
    $deliveryDetails = $this->paginate($query);
    

        //echo '<pre>'; print_r($rfqDetails); exit;

        $this->set(compact('deliveryDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('headTitle', 'ASN Detail');
        $this->loadModel('AsnHeaders');

        $deliveryDetails = $this->AsnHeaders->find('all')
        ->select(['AsnHeaders.id', 'AsnHeaders.status', 'AsnHeaders.asn_no','AsnHeaders.invoice_path','AsnHeaders.invoice_no', 'AsnHeaders.invoice_date', 'AsnHeaders.invoice_value','AsnHeaders.vehicle_no', 'AsnHeaders.driver_name', 'AsnHeaders.driver_contact','AsnHeaders.added_date', 'PoHeaders.po_no', 'PoFooters.item', 'PoFooters.material','PoFooters.order_unit', 'AsnFooters.qty', 'PoItemSchedules.actual_qty', 'PoItemSchedules.delivery_date'])
        ->innerJoin(['PoHeaders' => 'po_headers'],['AsnHeaders.po_header_id = PoHeaders.id'])
        ->innerJoin(['PoFooters' => 'po_footers'],['PoFooters.po_header_id = PoHeaders.id'])
        ->innerJoin(['PoItemSchedules' => 'po_item_schedules'],['PoItemSchedules.po_header_id = PoHeaders.id', 'PoItemSchedules.po_footer_id = PoFooters.id'])
        ->innerJoin(['AsnFooters' => 'asn_footers'],['AsnFooters.asn_header_id = AsnHeaders.id', 'AsnFooters.po_footer_id = PoFooters.id'])
        ->innerJoin(['AsnFooters' => 'asn_footers'],['AsnFooters.asn_header_id = AsnHeaders.id', 'AsnFooters.po_footer_id = PoFooters.id', 'AsnFooters.po_schedule_id = PoItemSchedules.id'])
        
        ->where(['AsnHeaders.id' => $id])->toArray();

        //echo '<pre>';  print_r($deliveryDetails); exit;
        /*$deliveryDetail = $this->AsnHeaders->get($id, [
            'contain' => ['PoHeaders'],
        ]); */

        //$record = $deliveryDetails->first();
        //$this->set('deliveryDetailw', $record);
        $this->set('deliveryDetails', $deliveryDetails);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryDetail = $this->DeliveryDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $deliveryDetail = $this->DeliveryDetails->patchEntity($deliveryDetail, $this->request->getData());
            if ($this->DeliveryDetails->save($deliveryDetail)) {
                $this->Flash->success(__('The delivery detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery detail could not be saved. Please, try again.'));
        }
        $poHeaders = $this->DeliveryDetails->PoHeaders->find('list', ['limit' => 200])->all();
        $poFooters = $this->DeliveryDetails->PoFooters->find('list', ['limit' => 200])->all();
        $this->set(compact('deliveryDetail', 'poHeaders', 'poFooters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryDetail = $this->DeliveryDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryDetail = $this->DeliveryDetails->patchEntity($deliveryDetail, $this->request->getData());
            if ($this->DeliveryDetails->save($deliveryDetail)) {
                $this->Flash->success(__('The delivery detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery detail could not be saved. Please, try again.'));
        }
        $poHeaders = $this->DeliveryDetails->PoHeaders->find('list', ['limit' => 200])->all();
        $poFooters = $this->DeliveryDetails->PoFooters->find('list', ['limit' => 200])->all();
        $this->set(compact('deliveryDetail', 'poHeaders', 'poFooters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryDetail = $this->DeliveryDetails->get($id);
        if ($this->DeliveryDetails->delete($deliveryDetail)) {
            $this->Flash->success(__('The delivery detail has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function markDelivered($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel('AsnHeaders');


        $deliveryDetail = $this->AsnHeaders->get($id, [
            'contain' => [],
        ]);
    
        $deliveryDetail = $this->AsnHeaders->patchEntity($deliveryDetail, ['status' => 2]);
        if ($this->AsnHeaders->save($deliveryDetail)) {
            $response['status'] = 'success';
            $response['message'] = 'success';
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'mark entry';
        }
        

        echo json_encode($response);

    }
}
