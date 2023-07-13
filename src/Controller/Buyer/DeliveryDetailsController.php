<?php
declare(strict_types=1);

namespace App\Controller\Buyer;

/**
 * DeliveryDetails Controller
 *
 * @property \App\Model\Table\DeliveryDetailsTable $DeliveryDetails
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeliveryDetailsController extends BuyerAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Intransit');
        // $this->loadModel('DeliveryDetails');
        // $this->paginate = [
        //     'contain' => ['PoHeaders', 'PoFooters'],
        //     'conditions' => ['status' => '0']
        // ];
        // $deliveryDetails = $this->paginate($this->DeliveryDetails);

        // $this->set(compact('deliveryDetails'));

        $this->loadModel('AsnHeaders');
        $session = $this->getRequest()->getSession();
        $query = $this->AsnHeaders->find()
            ->select(['AsnHeaders.id','AsnHeaders.invoice_no','AsnHeaders.status','AsnHeaders.asn_no','AsnHeaders.invoice_value', 'PoHeaders.po_no','PoHeaders.currency','PoHeaders.sap_vendor_code', 'AsnHeaders.added_date','AsnHeaders.updated_date'])
            ->contain(['PoHeaders'])
            ->where(['AsnHeaders.status' => '2' ]);

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
        $flash = [];
        $deliveryDetail = $this->DeliveryDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $deliveryDetail = $this->DeliveryDetails->patchEntity($deliveryDetail, $this->request->getData());
            if ($this->DeliveryDetails->save($deliveryDetail)) {
                $flash = ['type'=>'success', 'msg'=>'The delivery detail has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The delivery detail could not be saved. Please, try again'];
            $this->set('flash', $flash);
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
        $flash = [];
        $deliveryDetail = $this->DeliveryDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryDetail = $this->DeliveryDetails->patchEntity($deliveryDetail, $this->request->getData());
            if ($this->DeliveryDetails->save($deliveryDetail)) {
                $flash = ['type'=>'success', 'msg'=>'The delivery detail has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The delivery detail could not be saved. Please, try again'];
            $this->set('flash', $flash);
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
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $deliveryDetail = $this->DeliveryDetails->get($id);
        if ($this->DeliveryDetails->delete($deliveryDetail)) {
            $flash = ['type'=>'error', 'msg'=>'The delivery detail has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The delivery detail could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
