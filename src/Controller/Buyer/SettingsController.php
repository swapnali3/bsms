<?php
declare(strict_types=1);

namespace App\Controller\Buyer;
use Cake\Datasource\ConnectionManager;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsController extends BuyerAppController
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
        $settings = $this->paginate($this->Settings);

        $this->set(compact('settings'));
    }

    /**
     * View method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setting = $this->Settings->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('setting'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $setting = $this->Settings->newEmptyEntity();
        if ($this->request->is('post')) {
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());
            if ($this->Settings->save($setting)) {
                $flash = ['type'=>'success', 'msg'=>'The schema group has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The schema group has been saved'];
            $this->set('flash', $flash);
        }
        $this->set(compact('setting'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $setting = $this->Settings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());
            if ($this->Settings->save($setting)) {
                $flash = ['type'=>'success', 'msg'=>'The setting has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The setting could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('setting'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            $flash = ['type'=>'success', 'msg'=>'The setting has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The setting could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }

    public function update()
    {
        $flash = [];
        $setting = $this->Settings->find('all')->toList();
        if ($this->request->is(['patch', 'post', 'put'])) {
            //echo '<pre>'; print_r($this->request->getData()); exit;

            $conn = ConnectionManager::get('default');
            foreach($this->request->getData() as $key => $val) {
                $rfqDetails = $conn->execute("update settings set `value` = '$val' where `name` = '$key'");
            }
            
            $flash = ['type'=>'success', 'msg'=>'The setting has been saved'];
            $this->set('flash', $flash);

            return $this->redirect(['action' => 'update']);
        }

        //echo '<pre>'; print_r($setting); exit;
        $this->set(compact('setting'));
    }

    public function buyerManagement() {
        $this->set('headTitle', 'Buyer Management');

    }

    public function vendorManagement() {
        $this->set('headTitle', 'Vendor Management');
     
    }

    public function supplierCapacity($id = null)
    {
        $this->set('headTitle', 'Supplier Capacity');
    }

}
