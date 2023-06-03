<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * DeliveryDetails Controller
 *
 * @property \App\Model\Table\DeliveryDetailsTable $DeliveryDetails
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeliveryDetailsController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Intransit');
        // $this->loadModel('DeliveryDetails');
        // $session = $this->getRequest()->getSession();
        // $this->paginate = [
        //     'contain' => ['PoHeaders', 'PoFooters'],
        //     'conditions' => ['status' => '0', 'PoHeaders.sap_vendor_code' => $session->read('vendor_code')] 
        // ];


        // $deliveryDetails = $this->paginate($this->DeliveryDetails);

        // //echo '<pre>'; print_r($deliveryDetails);

        // $this->set(compact('deliveryDetails'));

        $this->loadModel('AsnHeaders');
        $session = $this->getRequest()->getSession();
        $query = $this->AsnHeaders->find()
            ->select(['AsnHeaders.id','AsnHeaders.invoice_no','AsnHeaders.status','AsnHeaders.asn_no','AsnHeaders.invoice_value', 'PoHeaders.po_no','PoHeaders.currency', 'AsnHeaders.added_date','AsnHeaders.updated_date'])
            ->contain(['PoHeaders'])
            ->where(['PoHeaders.sap_vendor_code' => $session->read('vendor_code'), 'AsnHeaders.status' => '2' ]);

        //echo '<pre>'; print_r($query); exit;
        $deliveryDetails = $this->paginate($query);

        
       $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'create_schedule' AND message_count > 0");
        $count = $notificationCount->rowCount();


        //echo '<pre>'; print_r($rfqDetails); exit;

        $this->set(compact('deliveryDetails','notificationCount','count'));
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
        $deliveryDetail = $this->DeliveryDetails->get($id, [
            'contain' => ['PoHeaders', 'PoFooters'],
        ]);

        $this->set(compact('deliveryDetail'));
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
}
