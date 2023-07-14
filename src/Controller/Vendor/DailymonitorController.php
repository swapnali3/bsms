<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

class DailymonitorController extends VendorAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $this->loadModel("VendorMaterial");
        $this->loadModel("Productionline");

        $dailymonitor = $this->Dailymonitor->find('all', ['conditions' => ['Dailymonitor.vendor_id' => $vendorId]])
        ->select([
            'id','vendor_id','productionline_id','material_id', 'plan_date','target_production','confirm_production','status','added_date', 'updated_date',
            'prdline_description' => 'prdline.prdline_description','material_description' => 'vendormat.description'])->join([
            'table' => 'Productionline',
            'alias' => 'prdline',
            'type' => 'LEFT',
            'conditions' => 'prdline.id = Dailymonitor.productionline_id',
        ])->join([
            'table' => 'Vendor_material',
            'alias' => 'vendormat',
            'type' => 'LEFT',
            'conditions' => 'vendormat.id = Dailymonitor.material_id',
        ]);
        // echo '<pre>'; print_r($dailymonitor); exit;
        $this->set(compact('dailymonitor'));
    }

    /**
     * View method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dailymonitor = $this->Dailymonitor->get($id);
        $this->set(compact('dailymonitor'));
    }

    public function confirmedproduction($id=null, $confirm_production=null)
    {
        $response = ['status'=>0,'message'=>''];
        $dailymonitor = $this->Dailymonitor->get($id);
        $dailymonitor->confirm_production = $confirm_production;
        if ($this->Dailymonitor->save($dailymonitor)) { $response = ['status'=>1,'message'=>$dailymonitor]; }
        else { $response = ['status'=>0,'message'=>'Failed']; }
        echo json_encode($response); exit;
    }
    public function dailyentry()
    {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $this->loadModel("VendorMaterial");
        $this->loadModel("Productionline");

        $dailymonitor = $this->Dailymonitor->find('all', ['conditions' => ['Dailymonitor.vendor_id' => $vendorId, 'Dailymonitor.plan_date <=' => date('y-m-d')]])
        ->select([
            'id','vendor_id','productionline_id','material_id', 'plan_date','target_production','confirm_production','status','added_date', 'updated_date',
            'prdline_description' => 'prdline.prdline_description','material_description' => 'vendormat.description'])->join([
            'table' => 'Productionline',
            'alias' => 'prdline',
            'type' => 'LEFT',
            'conditions' => 'prdline.id = Dailymonitor.productionline_id',
        ])->join([
            'table' => 'Vendor_material',
            'alias' => 'vendormat',
            'type' => 'LEFT',
            'conditions' => 'vendormat.id = Dailymonitor.material_id',
        ])->order(['Dailymonitor.plan_date' => 'DESC']);
        // echo '<pre>'; print_r($dailymonitor); exit;
        $this->set(compact('dailymonitor'));
    }

    public function add()
    {
        $flash = [];
        $this->loadModel("VendorMaterial");
        $this->loadModel("Productionline");
        
        $dailymonitor = $this->Dailymonitor->newEmptyEntity();
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['vendor_id'] = $vendorId;
            $requestData['status'] = 1;
            // echo '<pre>'; print_r($requestData);exit;
            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $requestData);
            if ($this->Dailymonitor->save($dailymonitor)) {
                $flash = ['type'=>'success', 'msg'=>'The dailymonitor has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The dailymonitor could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $vendor_mateial = $this->VendorMaterial->find('list', ['conditions' => ['VendorMaterial.vendor_id' => $vendorId], 'keyField' => 'id', 'valueField' => 'description'])->all();
        $productionline = $this->Productionline->find('list', ['conditions' => ['Productionline.vendor_id' => $vendorId], 'keyField' => 'id', 'valueField' => 'prdline_description'])->all();

        $this->set(compact('dailymonitor', 'vendor_mateial', 'productionline'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel("VendorMaterial");
        $this->loadModel("Productionline");
        $dailymonitor = $this->Dailymonitor->get($id);
        $vendorId = $dailymonitor->vendor_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $this->request->getData());
            if ($this->Dailymonitor->save($dailymonitor)) {
                $flash = ['type'=>'success', 'msg'=>'The dailymonitor has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The dailymonitor could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $vendor_mateial = $this->VendorMaterial->find('list', [ 'conditions' => ['VendorMaterial.vendor_id' => $vendorId], 'keyField' => 'id', 'valueField' => 'description' ])->all();
        $productionline = $this->Productionline->find('list', [ 'conditions' => ['Productionline.vendor_id' => $vendorId], 'keyField' => 'id', 'valueField' => 'prdline_description' ])->all();
        $this->set(compact('dailymonitor','vendor_mateial', 'productionline'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $dailymonitor = $this->Dailymonitor->get($id);
        if ($this->Dailymonitor->delete($dailymonitor)) {
            $flash = ['type'=>'success', 'msg'=>'The dailymonitor has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The dailymonitor could not be deleted. Please, try again'];
        }
        
        $this->set('flash', $flash);
        return $this->redirect(['action' => 'index']);
    }
}
