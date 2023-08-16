<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorBranchOffices Controller
 *
 * @property \App\Model\Table\VendorBranchOfficesTable $VendorBranchOffices
 * @method \App\Model\Entity\VendorBranchOffice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorBranchOfficesController extends VendorAppController
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
        $vendorBranchOffices = $this->paginate($this->VendorBranchOffices);

        $this->set(compact('vendorBranchOffices'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Branch Office id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorBranchOffice = $this->VendorBranchOffices->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorBranchOffice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorBranchOffice = $this->VendorBranchOffices->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorBranchOffice = $this->VendorBranchOffices->patchEntity($vendorBranchOffice, $this->request->getData());
            if ($this->VendorBranchOffices->save($vendorBranchOffice)) {
                $this->Flash->success(__('The vendor branch office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor branch office could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorBranchOffices->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorBranchOffice', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Branch Office id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorBranchOffice = $this->VendorBranchOffices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorBranchOffice = $this->VendorBranchOffices->patchEntity($vendorBranchOffice, $this->request->getData());
            if ($this->VendorBranchOffices->save($vendorBranchOffice)) {
                $this->Flash->success(__('The vendor branch office has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor branch office could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorBranchOffices->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorBranchOffice', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Branch Office id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorBranchOffice = $this->VendorBranchOffices->get($id);
        if ($this->VendorBranchOffices->delete($vendorBranchOffice)) {
            $this->Flash->success(__('The vendor branch office has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor branch office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
