<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * UsersAcl Controller
 *
 * @property \App\Model\Table\UsersAclTable $UsersAcl
 * @method \App\Model\Entity\UsersAcl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersAclController extends AdminAppController
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
        $usersAcl = $this->paginate($this->UsersAcl);

        $this->set(compact('usersAcl'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Acl id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersAcl = $this->UsersAcl->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('usersAcl'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $usersAcl = $this->UsersAcl->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersAcl = $this->UsersAcl->patchEntity($usersAcl, $this->request->getData());
            if ($this->UsersAcl->save($usersAcl)) {
                $flash = ['type'=>'success', 'msg'=>'The users acl has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The users acl could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('usersAcl'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Acl id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $usersAcl = $this->UsersAcl->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersAcl = $this->UsersAcl->patchEntity($usersAcl, $this->request->getData());
            if ($this->UsersAcl->save($usersAcl)) {
                $flash = ['type'=>'success', 'msg'=>'The users acl has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The users acl could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('usersAcl'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Acl id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $usersAcl = $this->UsersAcl->get($id);
        if ($this->UsersAcl->delete($usersAcl)) {
            $flash = ['type'=>'success', 'msg'=>'The users acl has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The users acl could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
