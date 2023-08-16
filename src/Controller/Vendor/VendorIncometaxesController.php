<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorIncometaxes Controller
 *
 * @property \App\Model\Table\VendorIncometaxesTable $VendorIncometaxes
 * @method \App\Model\Entity\VendorIncometax[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorIncometaxesController extends VendorAppController
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
        $vendorIncometaxes = $this->paginate($this->VendorIncometaxes);

        $this->set(compact('vendorIncometaxes'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Incometax id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorIncometax = $this->VendorIncometaxes->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorIncometax'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorIncometax = $this->VendorIncometaxes->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorIncometax = $this->VendorIncometaxes->patchEntity($vendorIncometax, $this->request->getData());
            if ($this->VendorIncometaxes->save($vendorIncometax)) {
                $this->Flash->success(__('The vendor incometax has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor incometax could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorIncometaxes->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorIncometax', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Incometax id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorIncometax = $this->VendorIncometaxes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorIncometax = $this->VendorIncometaxes->patchEntity($vendorIncometax, $this->request->getData());
            if ($this->VendorIncometaxes->save($vendorIncometax)) {
                $this->Flash->success(__('The vendor incometax has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor incometax could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorIncometaxes->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorIncometax', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Incometax id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorIncometax = $this->VendorIncometaxes->get($id);
        if ($this->VendorIncometaxes->delete($vendorIncometax)) {
            $this->Flash->success(__('The vendor incometax has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor incometax could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
