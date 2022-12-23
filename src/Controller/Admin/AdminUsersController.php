<?php
declare(strict_types=1);


namespace App\Controller\Admin;
use App\Controller\Admin\AdminAppController;

/**
 * AdminUsers Controller
 *
 * @property \App\Model\Table\AdminUsersTable $AdminUsers
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminUsersController extends AdminAppController
{
    public function login() {
        $this->loadModel("AdminUsers");
        
        $session = $this->getRequest()->getSession();
        if($session->read('adminuser.id')) {
            $this->redirect(array('controller' => 'adminusers', 'action' => 'index'));
        }

        if($this->request->is('post')) {
            print_r($this->request->getData());
            $result = $this->AdminUsers->find()
            ->select(['id', 'username', 'role'])
            ->where(['username' => $this->request->getData('username'),
                'password' => md5($this->request->getData('password'))])
                ->limit(1);
            
                $result = $result->toArray();

                if($result) {
                    $session = $this->getRequest()->getSession();
                    $session->write('adminuser.username', $result[0]->username);
                    $session->write('adminuser.id', $result[0]->id);
                    $session->write('adminuser.role', $result[0]->role);
                    $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
                    //$this->redirect(array('controller' => 'admin', 'action' => 'index'));
                } else {
                    $this->Flash->error("Invalid Login details");
                }
                
        }
    }

    public function logout() {
        $session = $this->getRequest()->getSession();
        $session->destroy();
        $this->Flash->success("You've successfully logged out.");
        $this->redirect(array('controller' => 'adminusers', 'action' => 'login'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel("AdminUsers");
        $adminUsers = $this->paginate($this->AdminUsers);

        $this->set(compact('adminUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel("AdminUsers");
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('adminUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("AdminUsers");
        $adminUser = $this->AdminUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());
            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $this->set(compact('adminUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("AdminUsers");
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());
            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $this->set(compact('adminUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel("AdminUsers");
        $this->request->allowMethod(['post', 'delete']);
        $adminUser = $this->AdminUsers->get($id);
        if ($this->AdminUsers->delete($adminUser)) {
            $this->Flash->success(__('The admin user has been deleted.'));
        } else {
            $this->Flash->error(__('The admin user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
