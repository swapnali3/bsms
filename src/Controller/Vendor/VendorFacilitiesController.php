<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorFacilities Controller
 *
 * @property \App\Model\Table\VendorFacilitiesTable $VendorFacilities
 * @method \App\Model\Entity\VendorFacility[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorFacilitiesController extends VendorAppController
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
        $vendorFacilities = $this->paginate($this->VendorFacilities);

        $this->set(compact('vendorFacilities'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Facility id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorFacility = $this->VendorFacilities->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorFacility'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorFacility = $this->VendorFacilities->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorFacility = $this->VendorFacilities->patchEntity($vendorFacility, $this->request->getData());
            if ($this->VendorFacilities->save($vendorFacility)) {
                $this->Flash->success(__('The vendor facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor facility could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorFacilities->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorFacility', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Facility id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorFacility = $this->VendorFacilities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorFacility = $this->VendorFacilities->patchEntity($vendorFacility, $this->request->getData());
            if ($this->VendorFacilities->save($vendorFacility)) {
                $this->Flash->success(__('The vendor facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor facility could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorFacilities->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorFacility', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Facility id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorFacility = $this->VendorFacilities->get($id);
        if ($this->VendorFacilities->delete($vendorFacility)) {
            $this->Flash->success(__('The vendor facility has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor facility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
