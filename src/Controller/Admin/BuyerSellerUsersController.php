<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * BuyerSellerUsers Controller
 *
 * @property \App\Model\Table\BuyerSellerUsersTable $BuyerSellerUsers
 * @method \App\Model\Entity\BuyerSellerUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuyerSellerUsersController extends AdminAppController
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
        $this->loadModel('BuyerSellerUsers');
        $buyerSellerUsers = $this->paginate($this->BuyerSellerUsers);

        $this->set(compact('buyerSellerUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Buyer Seller User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('BuyerSellerUsers');
        $buyerSellerUser = $this->BuyerSellerUsers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('buyerSellerUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $this->loadModel('BuyerSellerUsers');
        
        $buyerSellerUser = $this->BuyerSellerUsers->newEmptyEntity();

        if ($this->request->is('post')) {
            $buyerSellerUser = $this->BuyerSellerUsers->patchEntity($buyerSellerUser, $this->request->getData());
            if ($this->BuyerSellerUsers->save($buyerSellerUser)) {
                $flash = ['type'=>'success', 'msg'=>'The buyer seller user has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The buyer seller user could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('buyerSellerUser', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Buyer Seller User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel('BuyerSellerUsers');
        $buyerSellerUser = $this->BuyerSellerUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buyerSellerUser = $this->BuyerSellerUsers->patchEntity($buyerSellerUser, $this->request->getData());
            if ($this->BuyerSellerUsers->save($buyerSellerUser)) {
                $flash = ['type'=>'success', 'msg'=>'The buyer seller user has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The buyer seller user could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('buyerSellerUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Buyer Seller User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->loadModel('BuyerSellerUsers');
        $this->request->allowMethod(['post', 'delete']);
        $buyerSellerUser = $this->BuyerSellerUsers->get($id);
        if ($this->BuyerSellerUsers->delete($buyerSellerUser)) {
            $flash = ['type'=>'success', 'msg'=>'The buyer seller user has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The buyer seller user could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
