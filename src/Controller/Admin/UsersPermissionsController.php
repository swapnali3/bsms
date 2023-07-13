<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * UsersPermissions Controller
 *
 * @property \App\Model\Table\UsersPermissionsTable $UsersPermissions
 * @method \App\Model\Entity\UsersPermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersPermissionsController extends AdminAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $usersPermissions = $this->paginate($this->UsersPermissions);

        $this->set(compact('usersPermissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Permission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersPermission = $this->UsersPermissions->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('usersPermission'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $usersPermission = $this->UsersPermissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersPermission = $this->UsersPermissions->patchEntity($usersPermission, $this->request->getData());
            if ($this->UsersPermissions->save($usersPermission)) {
                $flash = ['type'=>'success', 'msg'=>'The users permission has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The users permission could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('usersPermission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Permission id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $usersPermission = $this->UsersPermissions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersPermission = $this->UsersPermissions->patchEntity($usersPermission, $this->request->getData());
            if ($this->UsersPermissions->save($usersPermission)) {
                $flash = ['type'=>'success', 'msg'=>'The users permission has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The users permission could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('usersPermission'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Permission id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $usersPermission = $this->UsersPermissions->get($id);
        if ($this->UsersPermissions->delete($usersPermission)) {
            $flash = ['type'=>'success', 'msg'=>'The users permission has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The users permission could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
