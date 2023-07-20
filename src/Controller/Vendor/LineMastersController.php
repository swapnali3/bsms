<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * LineMasters Controller
 *
 * @property \App\Model\Table\LineMastersTable $LineMasters
 * @method \App\Model\Entity\LineMaster[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LineMastersController extends VendorAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->loadModel('LineMasters');
        $this->set('flash', $flash);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lineMasters = $this->paginate($this->LineMasters);

        $this->set(compact('lineMasters'));
    }

    /**
     * View method
     *
     * @param string|null $id Line Master id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lineMaster = $this->LineMasters->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('lineMaster'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lineMaster = $this->LineMasters->newEmptyEntity();
        $this->loadModel("Materials");
        $uom = $this->Materials->find('list',['keyField' => 'uom', 'valueField' => 'uom'])->select(['uom'])
        ->distinct(['uom']);
        if ($this->request->is('post')) {
            $lineMaster = $this->LineMasters->patchEntity($lineMaster, $this->request->getData());
            if ($this->LineMasters->save($lineMaster)) {
                $this->Flash->success(__('The line master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The line master could not be saved. Please, try again.'));
        }
        $this->set(compact('lineMaster','uom'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Line Master id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lineMaster = $this->LineMasters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lineMaster = $this->LineMasters->patchEntity($lineMaster, $this->request->getData());
            if ($this->LineMasters->save($lineMaster)) {
                $this->Flash->success(__('The line master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The line master could not be saved. Please, try again.'));
        }
        $this->set(compact('lineMaster'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Line Master id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lineMaster = $this->LineMasters->get($id);
        if ($this->LineMasters->delete($lineMaster)) {
            $this->Flash->success(__('The line master has been deleted.'));
        } else {
            $this->Flash->error(__('The line master could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
