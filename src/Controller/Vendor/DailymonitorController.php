<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * Dailymonitor Controller
 *
 * @property \App\Model\Table\DailymonitorTable $Dailymonitor
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DailymonitorController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');

        $dailymonitor = $this->Dailymonitor->find('all', [
            'conditions' => ['Dailymonitor.vendor_id' => $vendorId]
        ])->select([
            'id','vendor_id','productionline_id','target_production','confirm_production','status','added_date', 'updated_date',
            'prdline_description' => 'prdline.prdline_description',
        ])->join([
            'table' => 'Productionline',
            'alias' => 'prdline',
            'type' => 'LEFT',
            'conditions' => 'prdline.id = Dailymonitor.productionline_id', 'prdline.status' => 1,
        ]);


        // $dailymonitor = $this->Dailymonitor->find('all')
        //     ->select([
        //         'Dailymonitor.id',
        //         'Dailymonitor.vendor_id',
        //         'Dailymonitor.productionline_id',
        //         'Dailymonitor.target_production',
        //         'Dailymonitor.confirm_production',
        //         'Dailymonitor.status',
        //         'Dailymonitor.added_date',
        //         'Dailymonitor.updated_date',
        //         'prdline.prdline_description',

        //     ])
        //     ->leftJoin(
        //         ['prdline' => 'Productionline'],
        //         ['prdline.id = Dailymonitor.productionline_id', 'prdline.status' => 1]
        //     )
        //     ->leftJoin(
        //         ['vendormaterial' => 'vendor_material'],
        //         ['vendormaterial.vendor_id = Dailymonitor.vendor_id', 'vendormaterial.status' => 1]
        //     )
        //     ->where(['Dailymonitor.vendor_id' => $vendorId]);

        // print_r($dailymonitor);exit;
        // $query = $query->select($Productionline);
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
        $dailymonitor = $this->Dailymonitor->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dailymonitor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->loadModel("VendorMaterial");
        $this->loadModel("Productionline");
        
        $dailymonitor = $this->Dailymonitor->newEmptyEntity();
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['vendor_id'] = $vendorId;
            $requestData['status'] = 0;

            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $requestData);
            if ($this->Dailymonitor->save($dailymonitor)) {
                $this->Flash->success(__('The dailymonitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dailymonitor could not be saved. Please, try again.'));
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
        $dailymonitor = $this->Dailymonitor->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $this->request->getData());
            if ($this->Dailymonitor->save($dailymonitor)) {
                $this->Flash->success(__('The dailymonitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dailymonitor could not be saved. Please, try again.'));
        }
        $this->set(compact('dailymonitor'));
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
        $this->request->allowMethod(['post', 'delete']);
        $dailymonitor = $this->Dailymonitor->get($id);
        if ($this->Dailymonitor->delete($dailymonitor)) {
            $this->Flash->success(__('The dailymonitor has been deleted.'));
        } else {
            $this->Flash->error(__('The dailymonitor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
