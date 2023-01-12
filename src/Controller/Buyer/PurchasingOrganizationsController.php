<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * PurchasingOrganizations Controller
 *
 * @property \App\Model\Table\PurchasingOrganizationsTable $PurchasingOrganizations
 * @method \App\Model\Entity\PurchasingOrganization[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasingOrganizationsController extends AdminAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $purchasingOrganizations = $this->paginate($this->PurchasingOrganizations);

        $this->set(compact('purchasingOrganizations'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchasing Organization id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchasingOrganization = $this->PurchasingOrganizations->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('purchasingOrganization'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchasingOrganization = $this->PurchasingOrganizations->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchasingOrganization = $this->PurchasingOrganizations->patchEntity($purchasingOrganization, $this->request->getData());
            if ($this->PurchasingOrganizations->save($purchasingOrganization)) {
                $this->Flash->success(__('The purchasing organization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchasing organization could not be saved. Please, try again.'));
        }
        $this->set(compact('purchasingOrganization'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchasing Organization id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchasingOrganization = $this->PurchasingOrganizations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchasingOrganization = $this->PurchasingOrganizations->patchEntity($purchasingOrganization, $this->request->getData());
            if ($this->PurchasingOrganizations->save($purchasingOrganization)) {
                $this->Flash->success(__('The purchasing organization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchasing organization could not be saved. Please, try again.'));
        }
        $this->set(compact('purchasingOrganization'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchasing Organization id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchasingOrganization = $this->PurchasingOrganizations->get($id);
        if ($this->PurchasingOrganizations->delete($purchasingOrganization)) {
            $this->Flash->success(__('The purchasing organization has been deleted.'));
        } else {
            $this->Flash->error(__('The purchasing organization could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
