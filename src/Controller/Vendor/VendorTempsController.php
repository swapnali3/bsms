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
 
        $this->loadModel('VendorTemps');
        $vendorTemp = $this->VendorTemps->get($session->read('vendor_id'), [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            try{
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
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resp = $this->request->getData();
            // echo '<pre>';print_r($resp);
            $newvt = $this->VendorTemps->newEmptyEntity();
            $vt = array();
            $vt['purchasing_organization_id'] = $resp['purchasing_organization_id'];
            $vt['account_group_id'] = $resp['account_group_id'];
            $vt['schema_group_id'] = $resp['schema_group_id'];
            $vt['name'] = $resp['name'];
            $vt['address'] = $resp['address'];
            $vt['city'] = $resp['city'];
            $vt['pincode'] = $resp['pincode'];
            $vt['country'] = $resp['country'];
            $vt['payment_term'] = $resp['payment_term'];
            $vt['order_currency'] = $resp['order_currency'];
            $vt['gst_no'] = $resp['gst_no'];
            $vt['pan_no'] = $resp['pan_no'];
            $vt['contact_person'] = $resp['contact_person'];
            $vt['contact_mobile'] = $resp['contact_mobile'];
            $vt['cin_no'] = $resp['cin_no'];
            $vt['tan_no'] = $resp['tan_no'];
            $vt['status'] = $resp['status'];
            $vt['valid_date'] = $resp['valid_date'];
            $vt['buyer_id'] = $vendorTemp->buyer_id;
            $vt['mobile'] = $vendorTemp->mobile;
            $vt['address_2'] = $vendorTemp->address_2;
            $vt['payment_term'] = $vendorTemp->payment_term;
            $vt['update_flag'] = $vendorTemp->id;
            $vt['gst_file'] = $vendorTemp->gst_file;
            $vt['pan_file'] = $vendorTemp->pan_file;
            $vt['bank_file'] = $vendorTemp->bank_file;
            $vt['sap_vendor_code'] = $vendorTemp->sap_vendor_code;
            $vt['state'] = $vendorTemp->state;
            $vt['contact_department'] = $vendorTemp->contact_department;
            $vt['contact_designation'] = $vendorTemp->contact_designation;
            $vt['remark'] = $vendorTemp->remark;
            $newvt = $this->VendorTemps->patchEntity($newvt, $vt);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor temp could not be saved. Please, try again.'));
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
    }

}
