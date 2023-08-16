<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorSmallScales Controller
 *
 * @property \App\Model\Table\VendorSmallScalesTable $VendorSmallScales
 * @method \App\Model\Entity\VendorSmallScale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorSmallScalesController extends VendorAppController
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
        $vendorSmallScales = $this->paginate($this->VendorSmallScales);

        $this->set(compact('vendorSmallScales'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Small Scale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorSmallScale = $this->VendorSmallScales->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorSmallScale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorSmallScale = $this->VendorSmallScales->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorSmallScale = $this->VendorSmallScales->patchEntity($vendorSmallScale, $this->request->getData());
            if ($this->VendorSmallScales->save($vendorSmallScale)) {
                $this->Flash->success(__('The vendor small scale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor small scale could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorSmallScales->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorSmallScale', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Small Scale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorSmallScale = $this->VendorSmallScales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorSmallScale = $this->VendorSmallScales->patchEntity($vendorSmallScale, $this->request->getData());
            if ($this->VendorSmallScales->save($vendorSmallScale)) {
                $this->Flash->success(__('The vendor small scale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor small scale could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorSmallScales->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorSmallScale', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Small Scale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorSmallScale = $this->VendorSmallScales->get($id);
        if ($this->VendorSmallScales->delete($vendorSmallScale)) {
            $this->Flash->success(__('The vendor small scale has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor small scale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
