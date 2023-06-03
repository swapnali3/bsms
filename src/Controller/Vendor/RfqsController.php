<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * Rfqs Controller
 *
 * @property \App\Model\Table\RfqsTable $Rfqs
 * @method \App\Model\Entity\Rfq[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RfqsController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'RFQ List');
        $session = $this->getRequest()->getSession();

       
        $query = $this->Rfqs->find()
            ->select(['Rfqs.rfq_no','PrHeaders.pr_no','Rfqs.added_date'])
            ->contain(['PrHeaders'])
            ->where(['Rfqs.vendor_temp_id' => $session->read('vendor_id')])
            ->group(['Rfqs.rfq_no', 'PrHeaders.pr_no', 'Rfqs.added_date']);

            //print_r($query); exit;

        $rfqs = $this->paginate($query);

        /*$this->paginate = [
            'contain' => ['VendorTemps', 'PrHeaders'],
            'conditions' =>['vendor_temp_id' => $session->read('vendor_id')]
        ];
        $rfqs = $this->paginate($this->Rfqs);
        */

        
        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'create_schedule' AND message_count > 0");
        $count = $notificationCount->rowCount();

        $this->set(compact('rfqs','notificationCount','count'));
    }

    /**
     * View method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('headTitle', 'RFQ Detail');
        $session = $this->getRequest()->getSession();

        $this->loadModel('RfqCommunications');
        $vendorId = $session->read('vendor_id');


        $rfqs = $this->Rfqs->find()
            ->select(['Rfqs.id', 'Rfqs.rfq_no', 'PrHeaders.pr_no', 'Rfqs.sub_total','Rfqs.freight_value','Rfqs.tax_value','Rfqs.total_value', 'PrFooters.item', 'PrFooters.material','RfqItems.id', 'VendorTemps.name', 'RfqInquiries.qty', 'RfqInquiries.rate', 'RfqInquiries.delivery_date', 'RfqInquiries.discount', 'RfqInquiries.sub_total'])
            ->contain(['VendorTemps', 'PrHeaders'])
            ->leftJoin(['RfqItems' => 'rfq_items'],
            ['RfqItems.rfq_id = Rfqs.id']
            )
            ->leftJoin(['PrFooters' => 'pr_footers'],
            ['PrFooters.id = RfqItems.pr_footer_id']
            )
            ->leftjoin(['RfqInquiries' => 'rfq_inquiries'],
            ['RfqInquiries.rfq_item_id = RfqItems.id']
            )
            ->where(['Rfqs.vendor_temp_id' => $session->read('vendor_id'), "Rfqs.rfq_no='$id'"])->all();


            $chatHistory = $this->RfqCommunications->find()
            ->contain(['VendorTemps'])
            ->leftJoin(['Users' => 'users'],
                ['Users.id = RfqCommunications.buyer_id']
            )
            ->leftJoin(['Rfqs' => 'rfqs'],
                ['Rfqs.id = RfqCommunications.rfq_id']
            )
            ->where(["Rfqs.rfq_no='$id'"])
            ->order(['RfqCommunications.id desc']);

            if ($this->request->is(['patch', 'post', 'put'])) {
                try {

                    $rfqId = $this->request->getData('rfq_id');
                    $message = $this->request->getData('Comments');

                    $comm = array();
                    $comm['rfq_id'] = $rfqId;
                    $comm['vendor_temp_id'] = $vendorId;
                    $comm['message'] = $message;

                    $newRfqComm = $this->RfqCommunications->newEmptyEntity();
                    $rfqCommunication= $this->RfqCommunications->patchEntity($newRfqComm, $comm);

                    if ($this->RfqCommunications->save($rfqCommunication)) {
                    }

                } catch (\PDOException $e) {
                    $this->Flash->error($e->getMessage());
                }  catch (\Exception $e ) {
                    $this->Flash->error($e->getMessage());
                }
            }

            //echo '<pre>'; print_r($rfqs); exit;

        $this->set(compact('rfqs', 'chatHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfq = $this->Rfqs->newEmptyEntity();
        if ($this->request->is('post')) {
            $rfq = $this->Rfqs->patchEntity($rfq, $this->request->getData());
            if ($this->Rfqs->save($rfq)) {
                $this->Flash->success(__('The rfq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->Rfqs->VendorTemps->find('list', ['limit' => 200])->all();
        $prHeaders = $this->Rfqs->PrHeaders->find('list', ['limit' => 200])->all();
        $prFooters = $this->Rfqs->PrFooters->find('list', ['limit' => 200])->all();
        $this->set(compact('rfq', 'vendorTemps', 'prHeaders', 'prFooters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfq = $this->Rfqs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfq = $this->Rfqs->patchEntity($rfq, $this->request->getData());
            if ($this->Rfqs->save($rfq)) {
                $this->Flash->success(__('The rfq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->Rfqs->VendorTemps->find('list', ['limit' => 200])->all();
        $prHeaders = $this->Rfqs->PrHeaders->find('list', ['limit' => 200])->all();
        $prFooters = $this->Rfqs->PrFooters->find('list', ['limit' => 200])->all();
        $this->set(compact('rfq', 'vendorTemps', 'prHeaders', 'prFooters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfq = $this->Rfqs->get($id);
        if ($this->Rfqs->delete($rfq)) {
            $this->Flash->success(__('The rfq has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
