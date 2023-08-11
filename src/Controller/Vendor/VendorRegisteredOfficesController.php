<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorRegisteredOffices Controller
 *
 * @property \App\Model\Table\VendorRegisteredOfficesTable $VendorRegisteredOffices
 * @method \App\Model\Entity\VendorRegisteredOffice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorRegisteredOfficesController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VendorTemps'],
        ];
        $vendorRegisteredOffices = $this->paginate($this->VendorRegisteredOffices);

        $this->set(compact('vendorRegisteredOffices'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Registered Office id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorRegisteredOffice = $this->VendorRegisteredOffices->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorRegisteredOffice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorRegisteredOffice = $this->VendorRegisteredOffices->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorRegisteredOffice = $this->VendorRegisteredOffices->patchEntity($vendorRegisteredOffice, $this->request->getData());
            if ($this->VendorRegisteredOffices->save($vendorRegisteredOffice)) {
                $this->Flash->success(__('The vendor registered office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor registered office could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorRegisteredOffices->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorRegisteredOffice', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Registered Office id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorRegisteredOffice = $this->VendorRegisteredOffices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorRegisteredOffice = $this->VendorRegisteredOffices->patchEntity($vendorRegisteredOffice, $this->request->getData());
            if ($this->VendorRegisteredOffices->save($vendorRegisteredOffice)) {
                $this->Flash->success(__('The vendor registered office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor registered office could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorRegisteredOffices->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorRegisteredOffice', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Registered Office id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorRegisteredOffice = $this->VendorRegisteredOffices->get($id);
        if ($this->VendorRegisteredOffices->delete($vendorRegisteredOffice)) {
            $this->Flash->success(__('The vendor registered office has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor registered office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
