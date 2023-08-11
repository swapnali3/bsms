<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorReputedCustomers Controller
 *
 * @property \App\Model\Table\VendorReputedCustomersTable $VendorReputedCustomers
 * @method \App\Model\Entity\VendorReputedCustomer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorReputedCustomersController extends VendorAppController
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
        $vendorReputedCustomers = $this->paginate($this->VendorReputedCustomers);

        $this->set(compact('vendorReputedCustomers'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Reputed Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorReputedCustomer = $this->VendorReputedCustomers->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorReputedCustomer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorReputedCustomer = $this->VendorReputedCustomers->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorReputedCustomer = $this->VendorReputedCustomers->patchEntity($vendorReputedCustomer, $this->request->getData());
            if ($this->VendorReputedCustomers->save($vendorReputedCustomer)) {
                $this->Flash->success(__('The vendor reputed customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor reputed customer could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorReputedCustomers->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorReputedCustomer', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Reputed Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorReputedCustomer = $this->VendorReputedCustomers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorReputedCustomer = $this->VendorReputedCustomers->patchEntity($vendorReputedCustomer, $this->request->getData());
            if ($this->VendorReputedCustomers->save($vendorReputedCustomer)) {
                $this->Flash->success(__('The vendor reputed customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor reputed customer could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorReputedCustomers->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorReputedCustomer', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Reputed Customer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorReputedCustomer = $this->VendorReputedCustomers->get($id);
        if ($this->VendorReputedCustomers->delete($vendorReputedCustomer)) {
            $this->Flash->success(__('The vendor reputed customer has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor reputed customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
