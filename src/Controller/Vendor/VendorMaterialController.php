<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;

/**
 * VendorMaterial Controller
 *
 * @property \App\Model\Table\VendorMaterialTable $VendorMaterial
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorMaterialController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $vendorMaterial = $this->paginate($this->VendorMaterial);

        $this->set(compact('vendorMaterial'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorMaterial = $this->VendorMaterial->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('vendorMaterial'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorMaterial = $this->VendorMaterial->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorMaterial = $this->VendorMaterial->patchEntity($vendorMaterial, $this->request->getData());
            if ($this->VendorMaterial->save($vendorMaterial)) {
                $this->Flash->success(__('The vendor material has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor material could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorMaterial'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorMaterial = $this->VendorMaterial->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorMaterial = $this->VendorMaterial->patchEntity($vendorMaterial, $this->request->getData());
            if ($this->VendorMaterial->save($vendorMaterial)) {
                $this->Flash->success(__('The vendor material has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor material could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorMaterial'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorMaterial = $this->VendorMaterial->get($id);
        if ($this->VendorMaterial->delete($vendorMaterial)) {
            $this->Flash->success(__('The vendor material has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
