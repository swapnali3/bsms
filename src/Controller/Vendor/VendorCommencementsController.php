<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorCommencements Controller
 *
 * @property \App\Model\Table\VendorCommencementsTable $VendorCommencements
 * @method \App\Model\Entity\VendorCommencement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorCommencementsController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VendorFactories', 'VendorTemps'],
        ];
        $vendorCommencements = $this->paginate($this->VendorCommencements);

        $this->set(compact('vendorCommencements'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Commencement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorCommencement = $this->VendorCommencements->get($id, [
            'contain' => ['VendorFactories', 'VendorTemps'],
        ]);

        $this->set(compact('vendorCommencement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorCommencement = $this->VendorCommencements->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorCommencement = $this->VendorCommencements->patchEntity($vendorCommencement, $this->request->getData());
            if ($this->VendorCommencements->save($vendorCommencement)) {
                $this->Flash->success(__('The vendor commencement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor commencement could not be saved. Please, try again.'));
        }
        $vendorFactories = $this->VendorCommencements->VendorFactories->find('list', ['limit' => 200])->all();
        $vendorTemps = $this->VendorCommencements->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorCommencement', 'vendorFactories', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Commencement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorCommencement = $this->VendorCommencements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorCommencement = $this->VendorCommencements->patchEntity($vendorCommencement, $this->request->getData());
            if ($this->VendorCommencements->save($vendorCommencement)) {
                $this->Flash->success(__('The vendor commencement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor commencement could not be saved. Please, try again.'));
        }
        $vendorFactories = $this->VendorCommencements->VendorFactories->find('list', ['limit' => 200])->all();
        $vendorTemps = $this->VendorCommencements->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorCommencement', 'vendorFactories', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Commencement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorCommencement = $this->VendorCommencements->get($id);
        if ($this->VendorCommencements->delete($vendorCommencement)) {
            $this->Flash->success(__('The vendor commencement has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor commencement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
