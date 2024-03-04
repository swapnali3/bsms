<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorPartnerAddress Controller
 *
 * @property \App\Model\Table\VendorPartnerAddressTable $VendorPartnerAddress
 * @method \App\Model\Entity\VendorPartnerAddres[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorPartnerAddressController extends VendorAppController
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
        $vendorPartnerAddress = $this->paginate($this->VendorPartnerAddress);

        $this->set(compact('vendorPartnerAddress'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Partner Addres id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorPartnerAddres = $this->VendorPartnerAddress->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorPartnerAddres'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorPartnerAddres = $this->VendorPartnerAddress->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorPartnerAddres = $this->VendorPartnerAddress->patchEntity($vendorPartnerAddres, $this->request->getData());
            if ($this->VendorPartnerAddress->save($vendorPartnerAddres)) {
                $this->Flash->success(__('The vendor partner addres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor partner addres could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorPartnerAddress->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorPartnerAddres', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Partner Addres id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorPartnerAddres = $this->VendorPartnerAddress->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorPartnerAddres = $this->VendorPartnerAddress->patchEntity($vendorPartnerAddres, $this->request->getData());
            if ($this->VendorPartnerAddress->save($vendorPartnerAddres)) {
                $this->Flash->success(__('The vendor partner addres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor partner addres could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorPartnerAddress->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorPartnerAddres', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Partner Addres id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorPartnerAddres = $this->VendorPartnerAddress->get($id);
        if ($this->VendorPartnerAddress->delete($vendorPartnerAddres)) {
            $this->Flash->success(__('The vendor partner addres has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor partner addres could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
