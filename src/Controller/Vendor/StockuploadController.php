<?php

declare(strict_types=1);

namespace App\Controller\Vendor;
use App\Model\Table\VendorMaterialTable;


/**
 * Stockupload Controller
 *
 * @property \App\Model\Table\StockuploadTable $Stockupload
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockuploadController extends VendorAppController
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
        $stockupload = $this->Stockupload->find('all', [
            'conditions' => ['Stockupload.vendor_id' => $vendorId]
        ])->select([
            'id', 'opening_stock', 'vendor_material_id', 'vendor_id', 'added_date', 'updated_date',
            'vm_description' => 'vm.description',
        ])->join([
            'table' => 'vendor_material',
            'alias' => 'vm',
            'type' => 'LEFT',
            'conditions' => 'vm.id = Stockupload.vendor_material_id',
        ]);

        $this->set(compact('stockupload'));
    }

    /**
     * View method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockupload = $this->Stockupload->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('stockupload'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel("VendorMaterial");
        $stockupload = $this->Stockupload->newEmptyEntity();

        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $vendorMaterialCode = $requestData['vendor_material_code'];

            $VendorMaterials = $this->paginate($this->VendorMaterial->find('all', [
                'conditions' => ['VendorMaterial.vendor_material_code' => $vendorMaterialCode]
            ]))->first();

            $requestData['vendor_id'] = $VendorMaterials->vendor_id;
            $requestData['vendor_material_id'] = $VendorMaterials->id;

            $stockupload = $this->Stockupload->patchEntity($stockupload, $requestData);
            if ($this->Stockupload->save($stockupload)) {
                $this->Flash->success(__('The stock Upload has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stockupload could not be saved. Please, try again.'));
        }

        $vendor_mateial = $this->VendorMaterial->find('list', ['keyField' => 'vendor_material_code', 'valueField' => 'vendor_material_code'])->all();


        $this->set(compact('stockupload', 'vendor_mateial'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockupload = $this->Stockupload->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockupload = $this->Stockupload->patchEntity($stockupload, $this->request->getData());
            if ($this->Stockupload->save($stockupload)) {
                $this->Flash->success(__('The stockupload has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stockupload could not be saved. Please, try again.'));
        }
        $this->set(compact('stockupload'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockupload = $this->Stockupload->get($id);
        if ($this->Stockupload->delete($stockupload)) {
            $this->Flash->success(__('The stockupload has been deleted.'));
        } else {
            $this->Flash->error(__('The stockupload could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
