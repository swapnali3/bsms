<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * AccountGroups Controller
 *
 * @property \App\Model\Table\AccountGroupsTable $AccountGroups
 * @method \App\Model\Entity\AccountGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountGroupsController extends AdminAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $accountGroups = $this->paginate($this->AccountGroups);

        $this->set(compact('accountGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Account Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountGroup = $this->AccountGroups->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('accountGroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountGroup = $this->AccountGroups->newEmptyEntity();
        if ($this->request->is('post')) {
            $accountGroup = $this->AccountGroups->patchEntity($accountGroup, $this->request->getData());
            if ($this->AccountGroups->save($accountGroup)) {
                $this->Flash->success(__('The account group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account group could not be saved. Please, try again.'));
        }
        $this->set(compact('accountGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountGroup = $this->AccountGroups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountGroup = $this->AccountGroups->patchEntity($accountGroup, $this->request->getData());
            if ($this->AccountGroups->save($accountGroup)) {
                $this->Flash->success(__('The account group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account group could not be saved. Please, try again.'));
        }
        $this->set(compact('accountGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountGroup = $this->AccountGroups->get($id);
        if ($this->AccountGroups->delete($accountGroup)) {
            $this->Flash->success(__('The account group has been deleted.'));
        } else {
            $this->Flash->error(__('The account group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
