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
                // echo '<pre>';  print_r($request);

                // Registered Office [working]
                $regoffc = $this->VendorRegisteredOffices->newEmptyEntity();
                $data = $request["registered_office"];
                $data["vendor_temp_id"] = $id;
                $regoffc = $this->VendorRegisteredOffices->patchEntity($regoffc, $data);
                if ($this->VendorRegisteredOffices->save($regoffc)) { }
                
                // Branch Office [working]
                foreach ($request["branch"]["branch_office"] as $key => $value) {
                    $branch = $this->VendorBranchOffices->newEmptyEntity();
                    $value["vendor_temp_id"] = $id;
                    $fileName = $value["registration_certificate"]->getClientFilename();
                    $imagePath = WWW_ROOT . "uploads/vendor/" . $fileName;
                    $value["registration_certificate"]->moveTo($imagePath);
                    $value["registration_certificate"]= "uploads/vendor/" . $fileName;
                    $branch = $this->VendorBranchOffices->patchEntity($branch, $value);
                    if ($this->VendorBranchOffices->save($branch)) { }
                }

                // Small Scale [working]
                $smallscale = $this->VendorSmallScales->newEmptyEntity();
                $data = $request["small_scale"];
                $data["vendor_temp_id"] = $id;

                $fileName = $data["certificate_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/smallscale/" . $fileName;
                $data["certificate_file"]->moveTo($imagePath);
                $data["certificate_file"]= "uploads/smallscale/" . $fileName;

                $smallscale = $this->VendorSmallScales->patchEntity($smallscale, $data);
                if ($this->VendorSmallScales->save($smallscale)) { }
                
                // Other Details [working]
                $data = $request["production_facility"];
                $intax = $this->VendorFacilities->newEmptyEntity();
                $data["vendor_temp_id"] = $id;

                $fileName = $data["quality_control_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/quality_control/" . $fileName;
                $data["quality_control_file"]->moveTo($imagePath);
                $data["quality_control_file"]= "uploads/quality_control/" . $fileName;

                $fileName = $data["lab_facility_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/lab_facility/" . $fileName;
                $data["lab_facility_file"]->moveTo($imagePath);
                $data["lab_facility_file"]= "uploads/lab_facility/" . $fileName;

                $fileName = $data["isi_registration_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/isi_registration/" . $fileName;
                $data["isi_registration_file"]->moveTo($imagePath);
                $data["isi_registration_file"]= "uploads/isi_registration/" . $fileName;

                $fileName = $data["test_facility_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/test_facility/" . $fileName;
                $data["test_facility_file"]->moveTo($imagePath);
                $data["test_facility_file"]= "uploads/test_facility/" . $fileName;

                $fileName = $data["sales_services_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/sales_services/" . $fileName;
                $data["sales_services_file"]->moveTo($imagePath);
                $data["sales_services_file"]= "uploads/sales_services/" . $fileName;

                $intax = $this->VendorFacilities->patchEntity($intax, $data);
                if ($this->VendorFacilities->save($intax)) { }


                // Turn Over [working]
                $data = $request["annual_turnover"];
                $turnovr = $this->VendorTurnovers->newEmptyEntity();
                $data["vendor_temp_id"] = $id;
                $turnovr = $this->VendorTurnovers->patchEntity($turnovr, $data);
                if ($this->VendorTurnovers->save($turnovr)) { }

                // Reputed Customers [working]
                $otherdtl = $this->VendorOtherdetails->newEmptyEntity();
                $data = $request["other"];
                $data["vendor_temp_id"] = $id;

                $fileName = $data["six_sigma_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/six_sigma/" . $fileName;
                $data["six_sigma_file"]->moveTo($imagePath);
                $data["six_sigma_file"]= "uploads/six_sigma/" . $fileName;

                $fileName = $data["halal_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/halal/" . $fileName;
                $data["halal_file"]->moveTo($imagePath);
                $data["halal_file"]= "uploads/halal/" . $fileName;

                $fileName = $data["iso_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/iso/" . $fileName;
                $data["iso_file"]->moveTo($imagePath);
                $data["iso_file"]= "uploads/iso/" . $fileName;

                $fileName = $data["declaration_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/declaration/" . $fileName;
                $data["declaration_file"]->moveTo($imagePath);
                $data["declaration_file"]= "uploads/declaration/" . $fileName;

                $otherdtl = $this->VendorOtherdetails->patchEntity($otherdtl, $data);                
                if ($this->VendorOtherdetails->save($otherdtl)) { }
                
                // Income Tax [working]
                $intax = $this->VendorIncometaxes->newEmptyEntity();
                $data = $request["income_tax"];
                $data["vendor_temp_id"] = $id;

                $fileName = $data["certificate_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/certificate/" . $fileName;
                $data["certificate_file"]->moveTo($imagePath);
                $data["certificate_file"]= "uploads/certificate/" . $fileName;

                $fileName = $data["balance_sheet_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/balance_sheet/" . $fileName;
                $data["balance_sheet_file"]->moveTo($imagePath);
                $data["balance_sheet_file"]= "uploads/balance_sheet/" . $fileName;
                
                $intax = $this->VendorIncometaxes->patchEntity($intax, $data);
                if ($this->VendorIncometaxes->save($intax)) { }

                // Factory Address [working]
                foreach ($request["prdflt"]["factory_office"] as $key => $value) {
                    $factory = $this->VendorFactories->newEmptyEntity();
                    $value["vendor_temp_id"] = $id;
                    $value["factory_code"] = substr(strtoupper($value['country']), 0, 2)."_".substr(strtoupper($value['state']), 0, 2)."_".substr(strtoupper($value['city']), 0, 2)."_Unit".($key+1);
                    
                    $fileName = $value["installed_capacity_file"]->getClientFilename();
                    $imagePath = WWW_ROOT . "uploads/installed_capacity/" . $fileName;
                    $value["installed_capacity_file"]->moveTo($imagePath);
                    $value["installed_capacity_file"]= "uploads/installed_capacity/" . $fileName;

                    $fileName = $value["machinery_available_file"]->getClientFilename();
                    $imagePath = WWW_ROOT . "uploads/machinery_available/" . $fileName;
                    $value["machinery_available_file"]->moveTo($imagePath);
                    $value["machinery_available_file"]= "uploads/machinery_available/" . $fileName;

                    $fileName = $value["power_available_file"]->getClientFilename();
                    $imagePath = WWW_ROOT . "uploads/power_available/" . $fileName;
                    $value["power_available_file"]->moveTo($imagePath);
                    $value["power_available_file"]= "uploads/power_available/" . $fileName;

                    $fileName = $value["raw_material_file"]->getClientFilename();
                    $imagePath = WWW_ROOT . "uploads/raw_material/" . $fileName;
                    $value["raw_material_file"]->moveTo($imagePath);
                    $value["raw_material_file"]= "uploads/raw_material/" . $fileName;
                    $factory = $this->VendorFactories->patchEntity($factory, $value);
                    if ($factory_id = $this->VendorFactories->save($factory)) {
                        foreach ($value["commencement"] as $key => $value) {
                            $commencement = $this->VendorCommencements->newEmptyEntity();
                            $value["vendor_factory_id"] = $factory_id->id;
                            $value["vendor_temp_id"] = $id;
                            $commencement = $this->VendorCommencements->patchEntity($commencement, $value);
                            if ($this->VendorCommencements->save($commencement)) {  }
                        }
                    }
                }

                // Partner Address [Working]
                foreach ($request["other_address"] as $key => $value) {
                    $partneraddr = $this->VendorPartnerAddress->newEmptyEntity();
                    $value["vendor_temp_id"] = $id;
                    $partneraddr = $this->VendorPartnerAddress->patchEntity($partneraddr, $value);
                    if ($this->VendorPartnerAddress->save($partneraddr)) { }
                }

                // Other Detail [Working]
                $other = $this->VendorOtherdetails->newEmptyEntity();
                $value = $request["other"];
                $value["vendor_temp_id"] = $id;
                $other = $this->VendorOtherdetails->patchEntity($other, $value);
                if ($this->VendorOtherdetails->save($other)) {  }


                // Questionnaire Address [Working]
                foreach ($request["questionnaire"] as $key => $value) {
                    $partneraddr = $this->VendorQuestionnaires->newEmptyEntity();
                    $value["vendor_temp_id"] = $id;
                    $partneraddr = $this->VendorQuestionnaires->patchEntity($partneraddr, $value);
                    if ($this->VendorQuestionnaires->save($partneraddr)) { }
                }

                // Reputed Customers [Working]
                foreach ($request["reputed"] as $key => $value) {
                    $partneraddr = $this->VendorReputedCustomers->newEmptyEntity();
                    $value["vendor_temp_id"] = $id;
                    $partneraddr = $this->VendorReputedCustomers->patchEntity($partneraddr, $value);
                    if ($this->VendorReputedCustomers->save($partneraddr)) { }
                }

                // Basic details
                $data = $request["vendor"];

                $fileName = $data["gst_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/gst/" . $fileName;
                $data["gst_file"]->moveTo($imagePath);
                $data["gst_file"]= "uploads/gst/" . $fileName;

                $fileName = $data["pan_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/pan/" . $fileName;
                $data["pan_file"]->moveTo($imagePath);
                $data["pan_file"]= "uploads/pan/" . $fileName;

                $fileName = $data["bank_file"]->getClientFilename();
                $imagePath = WWW_ROOT . "uploads/bank/" . $fileName;
                $data["bank_file"]->moveTo($imagePath);
                $data["bank_file"]= "uploads/bank/" . $fileName;
                $data["order_currency"]= "INR";

                $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
                // print_r($vendorTemp);
                if ($this->VendorTemps->save($vendorTemp)) {}
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
