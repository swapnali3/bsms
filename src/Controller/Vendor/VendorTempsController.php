<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Datasource\ConnectionManager;



use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;


/**
 * VendorTemps Controller
 *
 * @property \App\Model\Table\VendorTempsTable $VendorTemps
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorTempsController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    /**
     * View method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('headTitle', 'Profile');
        $session = $this->getRequest()->getSession();
        if ($id == null){ $id = $session->read('vendor_id'); }

        $this->loadModel('VendorTemps');
        $vendorTemp = $this->VendorTemps->get($session->read('vendor_id'), [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $request = $this->request->getData();
                $userData = [
                    'address' => $request['address1'],
                    'address_2' => $request['address2'],
                    'contact_person' => $request['contact_person'],
                    'contact_mobile' => $request['contact_mobiles'],
                    'contact_email' => $request['contact_email'],
                    'contact_department' => $request['contact_department'],
                    'contact_designation' => $request['contact_designation']
                ];


                $userObj = $this->VendorTemps->newEmptyEntity();
                $userObj = $this->VendorTemps->patchEntity($vendorTemp, $userData);

                if ($this->VendorTemps->save($userObj)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record saved successfully';
                    $this->Flash->success("Profle has been updated successfully");
                } else {
                    // Handle save error
                    $this->Flash->error('Failed to save user data.');
                }
            } catch (\PDOException $e) {
                $this->Flash->error($e->getMessage());
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        $vendorTempView = $this->VendorTemps->find('all')->where(['update_flag' => $id]);
        $this->set('vendorTempView', $vendorTempView->toArray());
        $this->set('updatecount', $vendorTempView->count());
        $this->set(compact('vendorTemp'));
    }



    /**
     * Edit method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("VendorTemps");
        $this->loadModel("Users");
        $vendorTemp = $this->VendorTemps->get($id);
        $buyer = $this->Users->get($vendorTemp->buyer_id);
        $updaterequest = $this->VendorTemps->find('all')->where(['update_flag >' => 0])->count();
        if ($updaterequest == 0) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $resp = $this->request->getData();
                $vendorTempData = $vendorTemp->toArray();      
                $newvt = $this->VendorTemps->newEntity($vendorTemp->toArray());  
                if ($this->VendorTemps->save($newvt)) {
                    $vt = array();
                    $vt['name'] = $resp['name'];
                    $vt['address'] = $resp['address'];
                    $vt['city'] = $resp['city'];
                    $vt['pincode'] = $resp['pincode'];
                    $vt['country'] = $resp['country'];
                    $vt['order_currency'] = $resp['order_currency'];
                    $vt['contact_email'] = $resp['contact_email'];
                    $vt['contact_person'] = $resp['contact_person'];
                    $vt['contact_mobile'] = $resp['contact_mobile'];
                    $vt['contact_department'] = $resp['contact_department'];
                    $vt['contact_designation'] = $resp['contact_designation'];
                    $vt['update_flag'] = $vendorTemp->id;
                    $newvt = $this->VendorTemps->patchEntity($newvt, $vt);
                }
                if ($this->VendorTemps->save($newvt)) {
                    echo $newvt->author_id;
                    $link = Router::url(['prefix' => false, 'controller' => 'users', 'action' => 'login', '_full' => true, 'escape' => true]);
                    $mailer = new Mailer('default');
                    $mailer
                        ->setTransport('smtp')
                        ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                        ->setTo($buyer->email)
                        // ->setTo('abhisheky@fts-pl.com')
                        ->setEmailFormat('html')
                        ->setSubject('Vendor Portal - Review Vendor Update')
                        ->deliver('Dear Buyer, <br/><br/>' . $vendorTempData['name'] . ' Send You a Profile Update Request. Kindly Check and Review.<br/> <a href="' . $link . '">Click here</a>');
                    $this->Flash->success(__('The Vendor successfully Updated'));
                    return $this->redirect(['action' => 'view', $id]);
                } else { $this->Flash->error(__('The vendor could not be saved. Please, try again.')); }
            }
        } else {
            $this->Flash->error(__('Previous Update Request is under review.'));
            return $this->redirect(['action' => 'view', $id]);
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
    }
}
