<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * RfqInquiries Controller
 *
 * @property \App\Model\Table\RfqInquiriesTable $RfqInquiries
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RfqInquiriesController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BuyerSellerUsers'],
        ];
        $rfqInquiries = $this->paginate($this->RfqInquiries);

        $this->set(compact('rfqInquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfqInquiry = $this->RfqInquiries->get($id, [
            'contain' => ['BuyerSellerUsers'],
        ]);

        $this->set(compact('rfqInquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfqInquiry = $this->RfqInquiries->newEmptyEntity();
        if ($this->request->is('post')) {
            $rfqInquiry = $this->RfqInquiries->patchEntity($rfqInquiry, $this->request->getData());
            if ($this->RfqInquiries->save($rfqInquiry)) {
                $this->Flash->success(__('The rfq inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq inquiry could not be saved. Please, try again.'));
        }
        $buyerSellerUsers = $this->RfqInquiries->BuyerSellerUsers->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqInquiry', 'buyerSellerUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfqInquiry = $this->RfqInquiries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfqInquiry = $this->RfqInquiries->patchEntity($rfqInquiry, $this->request->getData());
            if ($this->RfqInquiries->save($rfqInquiry)) {
                $this->Flash->success(__('The rfq inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq inquiry could not be saved. Please, try again.'));
        }
        $buyerSellerUsers = $this->RfqInquiries->BuyerSellerUsers->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqInquiry', 'buyerSellerUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfqInquiry = $this->RfqInquiries->get($id);
        if ($this->RfqInquiries->delete($rfqInquiry)) {
            $this->Flash->success(__('The rfq inquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq inquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inquiry($id=null) {
        $session = $this->getRequest()->getSession();
        if($this->request->is('post')) {

            $request = $this->request->getData();
            //echo '<pre>'; print_r($request); exit;
            
            $this->loadModel('RfqInquiries');
            $this->loadModel('RfqInquiriesHistories');

            try {

                $data = array();
                $error = false;
                foreach($request['rfq_item_id'] as $key => $val) {
                    $qryCnd = array();
                    $qryCnd['rfq_id'] =  $request['rfq_id'];
                    $qryCnd['rfq_item_id'] =  $val;
                    $qryCnd['seller_id'] = $session->read('vendor_id');
                    $RfqInquiry = $this->RfqInquiries->find()->where($qryCnd)->first();
                    $exists = false;
                    if($RfqInquiry) {
                        $exists = true;
                        $RfqInquiry->inquiry = 1;
                        $RfqInquiry->qty = $request['qty'][$key];
                        $RfqInquiry->rate = $request['rate'][$key];
                        $RfqInquiry->delivery_date = $request['delivery_date'][$key];
                    } else {
                        $data['rfq_id'] =  $request['rfq_id'];
                        $data['rfq_item_id'] = $val;
                        $data['seller_id'] = $session->read('vendor_id');
                        $data['inquiry'] = 1;
                        $data['qty'] = $request['qty'][$key];
                        $data['rate'] = $request['rate'][$key];
                        $data['delivery_date'] = $request['delivery_date'][$key];
                        //print_r($data); exit;
                        //$RfqInquiry = $this->RfqInquiries->newEntities($data);
                        $RfqInquiry = $this->RfqInquiries->newEmptyEntity();
                        $RfqInquiry = $this->RfqInquiries->patchEntity($RfqInquiry, $data);
                    }
                    
                    if($this->RfqInquiries->save($RfqInquiry)) {
                        $rfqInquiryHistory = $this->RfqInquiriesHistories->newEmptyEntity();
                        $rfqInquiryHistory = $this->RfqInquiriesHistories->patchEntity($rfqInquiryHistory, $RfqInquiry->toArray());
                        $this->RfqInquiriesHistories->save($rfqInquiryHistory);
                    } else {
                        $error = true;
                    }
                
                    /*$tmp = array();
                    $tmp['rfq_id'] = $val;
                    $tmp['seller_id'] = $session->read('vendor_id');
                    $tmp['inquiry'] = 1;
                    $tmp['qty'] = $request['qty'][$key];
                    $tmp['rate'] =  $request['rate'][$key];
                    $tmp['delivery_date'] =  $request['delivery_date'][$key];

                    $data[] = $tmp; */
                }

                


                //$RfqInquiry = $this->RfqInquiries->newEntities($data);

                //print_r($RfqInquiry); exit;
                
                /*if($this->RfqInquiries->save($RfqInquiry)) {
                    $this->Flash->success(__('Inquiry send to Buyer.'));
                    return $this->redirect(['controller' => 'rfqs', 'action' => 'index']);
                } else {
                    
                    foreach($RfqInquiry as $err) {
                        if($err->hasErrors()) {
                            $this->Flash->error(__("Quation save fail"));
                        }
                    }
                    return $this->redirect(['controller' => 'rfqs', 'action' => 'view', $id]);
                } */

                if($error) {
                    foreach($RfqInquiry as $err) {
                        if($err->hasErrors()) {
                            $this->Flash->error(__("Quation save fail"));
                        }
                    }
                    return $this->redirect(['controller' => 'rfqs', 'action' => 'view', $id]);
                } else {
                    $this->loadModel('RfqCommunications');
                    $rfq_id = $this->request->getData('rfq_id');
                    $message = $this->request->getData('Comments');
                    $comm = array();
                    $comm['rfq_id'] = $rfq_id;
                    $comm['vendor_temp_id'] = $session->read('vendor_id');
                    $comm['message'] = $message;

                    $newRfqComm = $this->RfqCommunications->newEmptyEntity();
                    $rfqCommunication= $this->RfqCommunications->patchEntity($newRfqComm, $comm);

                    if ($this->RfqCommunications->save($rfqCommunication)) {
                    }

                    $this->Flash->success(__('Inquiry send to Buyer.'));
                    return $this->redirect(['controller' => 'rfqs', 'action' => 'index']);
                }

            } catch (\PDOException $e) {
                $this->Flash->error($e->getMessage());
                return $this->redirect(['controller' => 'rfqs', 'action' => 'view', $id]);
            } catch (\Exception $e) {
                $this->Flash->error(__($e->getMessage()));
                return $this->redirect(['controller' => 'rfqs', 'action' => 'view', $id]);
            }
        }
    }
}
