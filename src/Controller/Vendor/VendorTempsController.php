<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Datasource\ConnectionManager;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;


class VendorTempsController extends VendorAppController
{

    public function initialize(): void
    {
        parent::initialize();
        $flash = [];
        $this->set('flash', $flash);
    }

    
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


    public function countryByState($id = null)
    {
        $this->autoRender = false;
        $response = ["status"=>0, 'message' =>'Empty request'];
        $this->loadModel("States");
        $states = $this->States->find()->select(['id', 'name'])->innerJoin(['Countries'=>'countries'],['Countries.country_code = States.country_code', 'Countries.id' =>$id])->toArray();

        //print_r($states); exit;
        $response = ["status"=> 1, 'message' =>['States'=>$states]];
        echo json_encode($response);
    }

    // public function stateByCountryId($name = null)
    // {
    //     $this->autoRender = false;
    //     $response = ["status"=> 0, 'message' =>'Empty request'];
    //     $this->loadModel("Currencies");
    //     $query = $this->Currencies->find()->where(['code =' => $name])->first();
    //     print_r($query);
        
    //     if ($query !== null && $query = "" ) {
    //         $response = ["status"=> 1, 'message' => $query['name']];
    //     } else {
    //         $response = ["status"=> 0, 'message' => 'Currency not found'];
    //     }
    //     $response = ["status"=> 1, 'message' =>$query['name']];
    //     echo json_encode($response);
    // }

    public function paymentCode($code = null)
    {
        $this->autoRender = false;
        $response = ["status"=>0, 'message' =>'Empty request'];
        $this->loadModel("PaymentTerms");
        $paymentCode = $this->PaymentTerms->find()->select(['code', 'description'])->where(['code =' => $code])->first();
        $response = ["status"=> 1, 'message' =>$paymentCode];
        echo json_encode($response);
    }

    public function edit($id = null)
    {
        $this->loadModel("VendorTemps");
        $this->loadModel("VendorRegisteredOffices");
        $this->loadModel("CompanyCodes");
        $this->loadModel("ReconciliationAccounts");
        $this->loadModel("VendorBranchOffices");
        $this->loadModel("VendorSmallScales");
        $this->loadModel("VendorFacilities");
        $this->loadModel("VendorTurnovers");
        $this->loadModel("VendorIncometaxes");
        $this->loadModel('Currencies');
        $this->loadModel("VendorFactories");
        $this->loadModel("VendorPartnerAddress");
        $this->loadModel("VendorOtherdetails");
        $this->loadModel("VendorCommencements");
        $this->loadModel("VendorQuestionnaires");
        $this->loadModel("VendorReputedCustomers");
        $this->loadModel("Countries");
        $this->loadModel("States");
        $this->loadModel("Users");
        $session = $this->getRequest()->getSession();
        $vendorTemp = $this->VendorTemps->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->request->getData();
            try {
                echo '<pre>'; print_r($request);

                // Basic details
                $vendorTemp["business_type"] = $request["business_type"];
                $vendorTemp["address"] = $request["address"];
                $vendorTemp["address_2"] = $request["address_2"];
                $vendorTemp["pincode"] = $request["pincode"];
                $vendorTemp["city"] = $request["city"];
                $vendorTemp["country"] = $request["country"];
                $vendorTemp["state"] = $request["state"];
                $vendorTemp["telephone"] = $request["address_2"];
                $vendorTemp["fax_no"] = $request["fax_no"];

                // Registered Office
                $regoffc = $this->VendorRegisteredOffices->newEmptyEntity();
                $regoffc["vendor_temps_id"] = $id;
                $regoffc = $this->VendorRegisteredOffices->patchEntity($regoffc, $request["registered_office"]);
                if ($this->VendorRegisteredOffices->save($regoffc)) { }
                
                // Branch Office
                foreach ($request["branch"]["branch_office"] as $key => $value) {
                    $branch = $this->VendorBranchOffices->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $branch = $this->VendorBranchOffices->patchEntity($branch, $value);
                    if ($this->VendorBranchOffices->save($branch)) { }
                }

                // Small Scale
                $smallscale = $this->VendorSmallScales->newEmptyEntity();
                $smallscale["vendor_temps_id"] = $id;
                $smallscale = $this->VendorSmallScales->patchEntity($smallscale, $request["small_scale"]);
                if ($this->VendorSmallScales->save($smallscale)) { }
                
                // Other Details
                foreach ($request["facility"] as $key => $value) {
                    $intax = $this->VendorFacility->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $intax = $this->VendorFacility->patchEntity($intax, $value);
                    if ($this->VendorFacility->save($intax)) { }
                }

                // Turn Over
                foreach ($request["annual_turnover"] as $key => $value) {
                    $turnovr = $this->VendorTurnovers->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $turnovr = $this->VendorTurnovers->patchEntity($turnovr, $value);
                    if ($this->VendorTurnovers->save($turnovr)) { }
                }
                
                // Income Tax
                $intax = $this->VendorIncometaxes->newEmptyEntity();
                $intax["vendor_temps_id"] = $id;
                $intax = $this->VendorIncometaxes->patchEntity($intax, $request["income_tax"]);
                if ($this->VendorIncometaxes->save($intax)) { }

                // Factory Address
                foreach ($request["prdflt"]["factory_office"] as $key => $value) {
                    $factory = $this->VendorFactories->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    // $value["sap_vendor_code"] = $vendorTemp->sap_vendor_code;
                    $value["factory_code"] = substr(strtoupper($value['country']), 0, 2)."_".substr(strtoupper($value['state']), 0, 2)."_".substr(strtoupper($value['city']), 0, 2)."_Unit".($key+1);
                    $factory = $this->VendorFactories->patchEntity($factory, $value);
                    if ($factory_id = $this->VendorFactories->save($factory)) {                        
                        $commencement = $this->VendorCommencements->newEmptyEntity();
                        $value["vendor_factory_id"] = $factory_id;
                        $value["vendor_temp_id"] = $id;
                        $commencement = $this->VendorCommencements->patchEntity($commencement, $value);
                        if ($this->VendorCommencements->save($commencement)) {  }
                    }
                }

                $vendorTemp["contact_person"] = $request["contact_person"];
                $vendorTemp["contact_email"] = $request["contact_email"];
                $vendorTemp["contact_mobile"] = $request["contact_mobile"];
                $vendorTemp["contact_department"] = $request["contact_department"];
                $vendorTemp["contact_designation"] = $request["contact_designation"];

                // Parter Address
                foreach ($request["other_address"] as $key => $value) {
                    $partneraddr = $this->VendorPartnerAddress->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $partneraddr = $this->VendorPartnerAddress->patchEntity($partneraddr, $value);
                    if ($this->VendorPartnerAddress->save($partneraddr)) { }
                }

                $vendorTemp["bank_name"] = $request["bank_name"];
                $vendorTemp["bank_branch"] = $request["bank_branch"];
                $vendorTemp["bank_number"] = $request["bank_number"];
                $vendorTemp["bank_ifsc"] = $request["bank_ifsc"];
                $vendorTemp["bank_key"] = $request["bank_key"];
                $vendorTemp["bank_country"] = $request["bank_country"];
                $vendorTemp["bank_city"] = $request["contact_email"];
                $vendorTemp["bank_swift"] = $request["bank_swift"];
                $vendorTemp["order_currency"] = $request["order_currency"];
                $vendorTemp["tan_no"] = $request["tan_no"];
                $vendorTemp["cin_no"] = $request["cin_no"];
                $vendorTemp["gst_no"] = $request["gst_no"];
                $vendorTemp["pan_no"] = $request["pan_no"];
                $vendorTemp["gst_file"] = $request["gst_file"];
                $vendorTemp["pan_file"] = $request["pan_file"];
                $vendorTemp["bank_file"] = $request["bank_file"];

                // Other Detail
                $other = $this->VendorOtherdetails->newEmptyEntity();
                $other["vendor_factory_id"] = $factory_id;
                $other["vendor_temp_id"] = $id;
                $other = $this->VendorOtherdetails->patchEntity($other, $value['other']);
                if ($this->VendorOtherdetails->save($other)) {  }


                // Questionnaire Address
                foreach ($request["questionnaire"] as $key => $value) {
                    $partneraddr = $this->VendorQuestionnaires->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $partneraddr = $this->VendorQuestionnaires->patchEntity($partneraddr, $value);
                    if ($this->VendorQuestionnaires->save($partneraddr)) { }
                }

                // Reputed Customers
                foreach ($request["reputed"]["customer"] as $key => $value) {
                    $partneraddr = $this->VendorReputedCustomers->newEmptyEntity();
                    $value["vendor_temps_id"] = $id;
                    $partneraddr = $this->VendorReputedCustomers->patchEntity($partneraddr, $value);
                    if ($this->VendorReputedCustomers->save($partneraddr)) { }
                }

                exit;
            } catch (\PDOException $e) {
                $flash = ['type' => 'error', 'msg' => ($e->getMessage())];
            }
        }

        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $companyCodes = $this->VendorTemps->CompanyCodes->find('list', ['limit' => 200])->all();
        $reconciliationAccount = $this->VendorTemps->ReconciliationAccounts->find('list', ['limit' => 200])->all();
        $paymentTerm = $this->VendorTemps->PaymentTerms->find('list', ['limit' => 200])->all();


        $countries = $this->Countries->find('list', ['keyField' => 'country_code', 'valueField' => 'country_name'])->toArray();

        $currencies = $this->Currencies->find('list', ['keyField' => 'code', 'valueField' => 'name'])->toArray();

        $hasIndia = array_key_exists('IN', $countries);
        if ($hasIndia) {
            unset($countries['India']);
            $countries = ['India' => 'India'] + $countries;
        }

        $states = $this->States->find('list', ['keyField' => 'region_code', 'valueField' => 'name'])->all();

        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups', 'countries', 'states','companyCodes','reconciliationAccount','currencies'));
    }
}
