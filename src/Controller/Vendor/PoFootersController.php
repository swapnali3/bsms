<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * PoFooters Controller
 *
 * @property \App\Model\Table\PoFootersTable $PoFooters
 * @method \App\Model\Entity\PoFooter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PoFootersController extends VendorAppController
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
        $this->paginate = [
            'contain' => ['PoHeaders'],
        ];
        $poFooters = $this->paginate($this->PoFooters);

        $this->set(compact('poFooters'));
    }

    /**
     * View method
     *
     * @param string|null $id Po Footer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poFooter = $this->PoFooters->get($id, [
            'contain' => ['PoHeaders'],
        ]);

        $this->set(compact('poFooter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $poFooter = $this->PoFooters->newEmptyEntity();
        if ($this->request->is('post')) {
            $poFooter = $this->PoFooters->patchEntity($poFooter, $this->request->getData());
            if ($this->PoFooters->save($poFooter)) {
                $flash = ['type'=>'success', 'msg'=>'The po footer has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The po footer could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $poHeaders = $this->PoFooters->PoHeaders->find('list', ['limit' => 200])->all();
        $this->set(compact('poFooter', 'poHeaders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Po Footer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $poFooter = $this->PoFooters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poFooter = $this->PoFooters->patchEntity($poFooter, $this->request->getData());
            if ($this->PoFooters->save($poFooter)) {
                $flash = ['type'=>'success', 'msg'=>'The po footer has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The po footer could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $poHeaders = $this->PoFooters->PoHeaders->find('list', ['limit' => 200])->all();
        $this->set(compact('poFooter', 'poHeaders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Po Footer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $poFooter = $this->PoFooters->get($id);
        if ($this->PoFooters->delete($poFooter)) {
            $flash = ['type'=>'success', 'msg'=>'The po footer has been deleted'];
        } else {
            $flash = ['type'=>'success', 'msg'=>'The po footer could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }


    public function update($id = null)
    {
        $this->loadModel('PoFooters');
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $poFooter = $this->PoFooters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            try{
                $data = array();
                $data['part_code'] = $this->request->getData('part_code');
                $data['stock'] = $this->request->getData('stock');

                $poFooter = $this->PoFooters->patchEntity($poFooter, $data);
                if ($this->PoFooters->save($poFooter)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            } 
        }
        echo json_encode($response);
    }
}
