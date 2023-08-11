<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorOtherdetails Controller
 *
 * @property \App\Model\Table\VendorOtherdetailsTable $VendorOtherdetails
 * @method \App\Model\Entity\VendorOtherdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorOtherdetailsController extends VendorAppController
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
        $vendorOtherdetails = $this->paginate($this->VendorOtherdetails);

        $this->set(compact('vendorOtherdetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Otherdetail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorOtherdetail = $this->VendorOtherdetails->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorOtherdetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorOtherdetail = $this->VendorOtherdetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorOtherdetail = $this->VendorOtherdetails->patchEntity($vendorOtherdetail, $this->request->getData());
            if ($this->VendorOtherdetails->save($vendorOtherdetail)) {
                $this->Flash->success(__('The vendor otherdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor otherdetail could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorOtherdetails->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorOtherdetail', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Otherdetail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorOtherdetail = $this->VendorOtherdetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorOtherdetail = $this->VendorOtherdetails->patchEntity($vendorOtherdetail, $this->request->getData());
            if ($this->VendorOtherdetails->save($vendorOtherdetail)) {
                $this->Flash->success(__('The vendor otherdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor otherdetail could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorOtherdetails->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorOtherdetail', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Otherdetail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorOtherdetail = $this->VendorOtherdetails->get($id);
        if ($this->VendorOtherdetails->delete($vendorOtherdetail)) {
            $this->Flash->success(__('The vendor otherdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor otherdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
