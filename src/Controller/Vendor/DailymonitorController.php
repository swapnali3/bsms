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
        $dailymonitor = $this->paginate($this->Dailymonitor->find('all', [
            'conditions' => ['dailymonitor.vendor_id' => $vendorId]
        ]));

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
        
        $dailymonitor = $this->Dailymonitor->newEmptyEntity();
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['vendor_id'] = $vendorId;
            $requestData['productionline_id'] =1;
            $requestData['status'] = 0;

            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $requestData);
            if ($this->Dailymonitor->save($dailymonitor)) {
                $this->Flash->success(__('The dailymonitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dailymonitor could not be saved. Please, try again.'));
        }
        $vendor_mateial = $this->VendorMaterial->find('list', ['keyField' => 'vendor_material_code', 'valueField' => 'vendor_material_code'])->all();

        $this->set(compact('dailymonitor','vendor_mateial'));
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
