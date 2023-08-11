<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorFactories Controller
 *
 * @property \App\Model\Table\VendorFactoriesTable $VendorFactories
 * @method \App\Model\Entity\VendorFactory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorFactoriesController extends VendorAppController
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
        $vendorFactories = $this->paginate($this->VendorFactories);

        $this->set(compact('vendorFactories'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Factory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorFactory = $this->VendorFactories->get($id, [
            'contain' => ['VendorTemps', 'VendorCommencements'],
        ]);

        $this->set(compact('vendorFactory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorFactory = $this->VendorFactories->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorFactory = $this->VendorFactories->patchEntity($vendorFactory, $this->request->getData());
            if ($this->VendorFactories->save($vendorFactory)) {
                $this->Flash->success(__('The vendor factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor factory could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorFactories->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorFactory', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Factory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorFactory = $this->VendorFactories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorFactory = $this->VendorFactories->patchEntity($vendorFactory, $this->request->getData());
            if ($this->VendorFactories->save($vendorFactory)) {
                $this->Flash->success(__('The vendor factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor factory could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorFactories->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorFactory', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Factory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorFactory = $this->VendorFactories->get($id);
        if ($this->VendorFactories->delete($vendorFactory)) {
            $this->Flash->success(__('The vendor factory has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor factory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
