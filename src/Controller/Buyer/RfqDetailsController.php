<?php
declare(strict_types=1);

namespace App\Controller\Buyer;
use Cake\Datasource\ConnectionManager;

/**
 * RfqDetails Controller
 *
 * @property \App\Model\Table\RfqDetailsTable $RfqDetails
 * @method \App\Model\Entity\RfqDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RfqDetailsController extends BuyerAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $this->loadModel("RfqDetails");
        $this->paginate = [
            'contain' => ['Products', 'Uoms'],
        ];
        $rfqDetails = $this->paginate($this->RfqDetails);

        $this->set(compact('rfqDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Rfq Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel("RfqDetails");
        $this->loadModel("RfqInquiries");
        $this->loadModel("VendorTemps");
        $this->loadModel("Users");
        $rfqDetail = $this->RfqDetails->get($id, [
            'contain' => [ 'Products', 'Uoms'],
        ]);

        $results = $this->RfqInquiries->find()
        ->select($this->RfqInquiries)
        ->select(['company_name' => 'VendorTemps.name'])
        ->leftJoin(
            ['Users' => 'users'],
            ['Users.id = RfqInquiries.seller_id'])
        ->leftJoin(
            ['VendorTemps' => 'vendor_temps'],
            ['VendorTemps.email = Users.username'])
        
        ->where(['rfq_id' => $id])  
        ->toArray();

        //echo '<pre>'; print_r($results); exit;

        $this->set(compact('rfqDetail', 'results'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Products");
        $this->loadModel("Uoms");
        $this->loadModel("RfqDetails");
        $rfqDetail = $this->RfqDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $session = $this->getRequest()->getSession();
            $userId = $session->read('id');
            $data = $this->request->getData();

            $conn = ConnectionManager::get('default');
            $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD");

            foreach ($maxrfq as $maxid) {
                $maxRfqId = $maxid['maxrfq'] + 1; 
            }   

            $data['rfq_no'] = $maxRfqId;
            $data['buyer_seller_user_id'] = $userId;
            $rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $data);
            //echo '<pre>'; print_r($rfqDetail); exit;
            if ($this->RfqDetails->save($rfqDetail)) {
                $this->Flash->success(__('The RFQ has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The RFQ  could not be saved. Please, try again.'));
        }
        
        $products = $this->RfqDetails->Products->find('list', ['limit' => 200])->all();
        //$productSubCategories = $this->RfqDetails->ProductSubCategories->find('list', ['limit' => 200])->all();
        $uoms = $this->RfqDetails->Uoms->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqDetail', 'products', 'uoms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("RfqDetails");
        $rfqDetail = $this->RfqDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $this->request->getData());
            if ($this->RfqDetails->save($rfqDetail)) {
                $this->Flash->success(__('The rfq detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq detail could not be saved. Please, try again.'));
        }
        $buyerSellerUsers = $this->RfqDetails->BuyerSellerUsers->find('list', ['limit' => 200])->all();
        $products = $this->RfqDetails->Products->find('list', ['limit' => 200])->all();
        //$productSubCategories = $this->RfqDetails->ProductSubCategories->find('list', ['limit' => 200])->all();
        $uoms = $this->RfqDetails->Uoms->find('list', ['limit' => 200])->all();
        $this->set(compact('rfqDetail', 'buyerSellerUsers', 'products', 'productSubCategories', 'uoms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfqDetail = $this->RfqDetails->get($id);
        if ($this->RfqDetails->delete($rfqDetail)) {
            $this->Flash->success(__('The rfq detail has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function apprej($id = null, $action = null)
    {   
        $this->loadModel("RfqDetails");
        $rfqDetail = $this->RfqDetails->get($id);
        if($action == 'app') {
            $rfqDetail->status = 1;
        } else if($action == 'rej') {
            $rfqDetail->status = 2;
        }
        
        if ($this->RfqDetails->save($rfqDetail)) {
            
            if($action == 'app') {
                $this->Flash->success(__('The RFQ successfully approved'));
            } else if($action == 'rej') {
                $this->Flash->success(__('The RFQ successfully Rejected'));
            }
        } else {
            $this->Flash->error(__('The rfq detail could not be updated. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
