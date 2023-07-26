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
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];
        $this->set('flash', $flash);
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flash = [];
        $this->set('headTitle', 'Profile');
        $session = $this->getRequest()->getSession();
        if ($id == null) {
            $id = $session->read('vendor_id');
        }

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
                    $flash = ['type' => 'success', 'msg' => 'Profle has been updated successfully'];
                    $this->set('flash', $flash);
                } else {
                    // Handle save error
                    $flash = ['type' => 'error', 'msg' => 'Failed to save user data'];
                    $this->set('flash', $flash);
                }
            } catch (\PDOException $e) {
                $flash = ['type' => 'error', 'msg' => ($e->getMessage())];
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
                $flash = ['type' => 'error', 'msg' => ($e->getMessage())];
            }
            $this->set('flash', $flash);
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

        // print_r($id);exit;
        $this->loadModel("VendorTemps");
        $this->loadModel("Countries");
        $this->loadModel("States");
        $this->loadModel("Users");
        $vendorTemp = $this->VendorTemps->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->request->getData();
                echo '<pre>'; echo json_encode($request);exit;

            try {
                
            } catch (\PDOException $e) {

            }
        }        
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();

        $countries = $this->Countries->find('list', ['keyField' => 'country_name', 'valueField' => 'country_name'])->all();
        $states = $this->States->find('list', ['keyField' => 'name', 'valueField' => 'name'])->all();

        
      
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups', 'countries', 'states'));



        //     $flash = [];
        //     $this->loadModel("VendorTemps");
        //     $this->loadModel("Countries");
        //     $this->loadModel("States");
        //     $this->loadModel("Users");
        //     $vendorTemp = $this->VendorTemps->get($id);
        //     $buyer = $this->Users->get($vendorTemp->buyer_id);

        //     //print_r($buyer); exit;
        //     $updaterequest = $this->VendorTemps->find('all')->where(['update_flag >' => 0])->count();
        //     if ($updaterequest == 0) {
        //         if ($this->request->is(['patch', 'post', 'put'])) {
        //             $resp = $this->request->getData();
        //             $resp['update_flag'] = 1;
        //             $newvt = $this->VendorTemps->patchEntity($vendorTemp, $resp);
        //             if ($this->VendorTemps->save($newvt)) {

        //                 // print_r($buyer->username);exit;
        //                 $link = Router::url(['prefix' => false, 'controller' => 'users', 'action' => 'login', '_full' => true, 'escape' => true]);
        //                 $mailer = new Mailer('default');
        //                 $mailer
        //                     ->setTransport('smtp')
        //                     ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
        //                     ->setTo($buyer->username)
        //                     ->setEmailFormat('html')
        //                     ->setSubject('Vendor Portal - Review Vendor Update')
        //                     ->deliver('Dear Buyer, <br/><br/>' . $vendorTemp->name . ' Send You a Profile Update Request. Kindly Check and Review.<br/> <a href="' . $link . '">Click here</a>');
        //                 $flash = ['type'=>'success', 'msg'=>'The Vendor successfully Updated'];
        //                 $this->set('flash', $flash);
        //                 return $this->redirect(['action' => 'view', $id]);
        //             } else {
        //                 $flash = ['type'=>'error', 'msg'=>'The vendor could not be saved. Please, try again'];
        //                 $this->set('flash', $flash);}
        //         }
        //     } else {
        //         $flash = ['type'=>'success', 'msg'=>'Previous Update Request is under review'];
        //         $this->set('flash', $flash);
        //         return $this->redirect(['action' => 'view', $id]);
        //     }
        //     $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        //     $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        //     $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();

        //     $countries = $this->Countries->find('list', ['keyField' => 'country_name', 'valueField' => 'country_name'])->all();
        //     $states = $this->States->find('list', ['keyField' => 'name', 'valueField' => 'name'])->all();

        //     $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups','countries', 'states'));
    }
}
