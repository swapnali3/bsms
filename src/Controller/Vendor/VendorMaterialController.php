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
        $this->loadModel('Uoms');
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');

        $this->loadModel('VendorMaterial');

        $vendorMaterial = $this->VendorMaterial->find('all', [
            'conditions' => ['vendorMaterial.vendor_id' => $vendorId]
        ])->select([
            'id', 'vendor_id', 'vendor_material_code', 'description', 'minimum_stock',
            'uom_desp' => 'um.code',
        ])->join([
            'table' => 'uoms',
            'alias' => 'um',
            'type' => 'LEFT',
            'conditions' => 'um.id = vendorMaterial.uom',
        ])->toArray();

        // echo '<pre>';print_r($vendorMaterial);exit;

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
        $this->loadModel("VendorTemps");
        $this->loadModel('Notifications');
        $this->loadModel('Uoms');
        $vendorMaterial = $this->VendorMaterial->newEmptyEntity();
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');

        $sapVendor = $session->read('vendor_code');

  
        
        // Retrieve the buyer_id based on sapVendor
        $buyer = $this->VendorTemps->find()
            ->select(['buyer_id'])
            ->where(['sap_vendor_code' => $sapVendor])
            ->first();

        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['vendor_id'] = $vendorId;
            $vendorMaterial = $this->VendorMaterial->patchEntity($vendorMaterial, $requestData);
            if ($this->VendorMaterial->save($vendorMaterial)) {
                if ($this->Notifications->exists(['Notifications.user_id' => $buyer->buyer_id, 'Notifications.notification_type' => 'vendor_material'])) {
                    $this->Notifications->updateAll(
                        ['message_count' => $this->Notifications->query()->newExpr('message_count + 1')],
                        ['user_id' => $buyer->buyer_id, 'notification_type' => 'vendor_material']
                    );
                } else {
                    $notification = $this->Notifications->newEmptyEntity();
                    $notification->user_id = $buyer->buyer_id;
                    $notification->notification_type = 'vendor_material';
                    $notification->message_count = 1;
                    $this->Notifications->save($notification);
                } 

                $this->Flash->success(__('The vendor material has been saved.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor material could not be saved. Please, try again.'));
        }

        $uom = $this->Uoms->find('list', ['keyField' => 'id', 'valueField' => 'code'])->all();

        $this->set(compact('vendorMaterial','uom'));
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
        $this->loadModel('Uoms');
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
        
        $uom = $this->Uoms->find('list', ['keyField' => 'id', 'valueField' => 'code'])->all();

        $this->set(compact('vendorMaterial','uom'));
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
