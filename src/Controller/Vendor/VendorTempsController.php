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
        if ($id == null) { $id = $session->read('vendor_id'); }

        $this->loadModel('VendorTemps');
        $vendorTemp = $this->VendorTemps->get($session->read('vendor_id'), [
            'contain' => ['VendorStatus','CompanyCodes','PurchasingOrganizations','ReconciliationAccounts', 'AccountGroups', 'SchemaGroups', 'PaymentTerms', 'VendorFacilities', 'VendorIncometaxes', 'VendorOtherdetails', 'VendorQuestionnaires', 'VendorSmallScales', 'VendorTurnovers']]);
        
        $this->loadModel("VendorRegisteredOffices");
        $vendorRegisterOffice = $this->VendorRegisteredOffices->find()
        ->select($this->VendorRegisteredOffices)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorRegisteredOffices.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorRegisteredOffices.state','States.country_code = VendorRegisteredOffices.country'])
        ->where(['States.country_code = VendorRegisteredOffices.country', 'VendorRegisteredOffices.vendor_temp_id' => $session->read('vendor_id')])->first();
        //  echo '<pre>'; print_r($vendorRegisterOffice); exit;

        $this->loadModel("VendorPartnerAddress");
        $vendorPartnerAddress = $this->VendorPartnerAddress->find()
        ->select($this->VendorPartnerAddress)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorPartnerAddress.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorPartnerAddress.state','States.country_code = VendorPartnerAddress.country'])
        ->where([ 'VendorPartnerAddress.vendor_temp_id' => $session->read('vendor_id')])->toArray();
        // echo '<pre>'; print_r($vendorPartnerAddress); exit;

        $this->loadModel("VendorFactories");
        $vendorFactories = $this->VendorFactories->find()
        ->select($this->VendorFactories)
        ->select(['States.name', 'Countries.country_name'])
        ->contain(['VendorCommencements'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorFactories.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorFactories.state', 'States.country_code = VendorFactories.country'])     
        ->where([  'VendorFactories.vendor_temp_id' => $session->read('vendor_id')])->toArray();
        //  echo '<pre>'; print_r($vendorFactories); exit;
        
        
        $this->loadModel("VendorReputedCustomers");
        $vendorReputedCustomers = $this->VendorReputedCustomers->find()
        ->select($this->VendorReputedCustomers)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorReputedCustomers.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorReputedCustomers.state', 'States.country_code = VendorReputedCustomers.country'])
        ->where(['VendorReputedCustomers.vendor_temp_id' => $session->read('vendor_id')])->toArray();
        // echo '<pre>'; print_r($vendorReputedCustomers); exit;
        
        
        $this->loadModel("VendorBranchOffices");
        $vendorBranchOffices = $this->VendorBranchOffices->find()
        ->select($this->VendorBranchOffices)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorBranchOffices.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorBranchOffices.state', 'States.country_code = VendorBranchOffices.country'])
        ->where(['VendorBranchOffices.vendor_temp_id' => $session->read('vendor_id')])->toArray();
        // echo '<pre>'; print_r($vendorBranchOffices); exit;
        // echo '<pre>'; print_r($vendorTemp ); exit;

        $vendorTempView = $this->VendorTemps->find('all')->where(['update_flag' => $id]);
        $this->set('vendorTempView', $vendorTempView->toArray());
        $this->set('updatecount', $vendorTempView->count());
        $this->set(compact('vendorTemp', 'vendorRegisterOffice', 'vendorReputedCustomers', 'vendorFactories', 'vendorBranchOffices'));
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
        $vendorTemp = $this->VendorTemps->get($id, ['contain' => ['VendorStatus','CompanyCodes','ReconciliationAccounts','AccountGroups', 'PaymentTerms','SchemaGroups', 'PurchasingOrganizations']]);

        //echo '<pre>'; print_r($vendorTemp); exit;

        if ($this->request->is(['post'])) {
            $this->autoRender = false;
            $form_status = true;
            $request = $this->request->getData();
            $request_keys = array_keys($this->request->getData());
            // echo '<pre>';  print_r($request);
            try {
                $resp_data = array();
                foreach ($request_keys as $key => $value) {
                    switch ($value) {
                        case 'registered_offices':
                            $data = $request[$value];
                            // $query = $this->VendorRegisteredOffices->find()->where(['vendor_temp_id' => $id])->count();
                            if ($data['id'] != "" || $data['id'] != null) {
                                $old_regoffc = $this->VendorRegisteredOffices->get($data['id']);
                                $regoffc = $this->VendorRegisteredOffices->patchEntity($old_regoffc, $data);
                            } else{
                                $old_regoffc = $this->VendorRegisteredOffices->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $regoffc = $this->VendorRegisteredOffices->patchEntity($old_regoffc, $data);
                            }
                            // echo '<pre>'; print_r($regoffc); exit;
                            if (!$this->VendorRegisteredOffices->save($regoffc)) {
                                $form_status = false;
                            } else { $resp_data["vendor_registered_offices"] = $regoffc; }
                            break;

                        case 'branch_offices':
                            $data = $request[$value];
                            foreach ($data as $key => $value) {
                                if(isset($value["registration_certificate"]) && $value["registration_certificate"]->getSize() > 0) {
                                    $fileName = $value["registration_certificate"]->getClientFilename();
                                    $imagePath = WWW_ROOT . "uploads/vendor/" . $fileName;
                                    $value["registration_certificate"]->moveTo($imagePath);
                                    $value["registration_certificate"]= "uploads/vendor/" . $fileName;
                                } else { $value["registration_certificate"]=""; }

                                if ($value['id'] != "" || $value['id'] != null) {
                                    $old_bahoffc = $this->VendorBranchOffices->get($value['id']);
                                    $bahoffc = $this->VendorBranchOffices->patchEntity($old_bahoffc, $value);
                                } else{
                                    $old_bahoffc = $this->VendorBranchOffices->newEmptyEntity();
                                    $bahoffc = $this->VendorBranchOffices->patchEntity($old_bahoffc, $value);
                                }
                                if (!$this->VendorBranchOffices->save($bahoffc)) {
                                    $form_status = false;
                                } else { $resp_data["vendor_branch_offices"][] = $bahoffc; }
                            }
                            break;

                        case 'small_scale':
                            $data = $request[$value];
                            if( isset($data["certificate_file"]) && $data["certificate_file"]->getSize() > 0 ) {
                                $fileName = $data["certificate_file"]->getClientFilename();
                                if($fileName){
                                    $imagePath = WWW_ROOT . "uploads/smallscale/" . $fileName;
                                    $data["certificate_file"]->moveTo($imagePath);
                                    $data["certificate_file"]= "uploads/smallscale/" . $fileName;
                                }
                            } else { $data["certificate_file"]= ""; }

                            if ($data['id'] != "" || $data['id'] != null) {
                                $old_smscl = $this->VendorSmallScales->get($data["id"]);
                                $smscl = $this->VendorSmallScales->patchEntity($old_smscl, $data);
                            } else{
                                $old_smscl = $this->VendorSmallScales->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $smscl = $this->VendorSmallScales->patchEntity($old_smscl, $data);
                            }

                            // echo '<pre>'; print_r($regoffc); exit;
                            if (!$this->VendorSmallScales->save($smscl)) {
                                $form_status = false;
                            } else { $resp_data["vendor_small_scales"] = $smscl; }
                            break;

                        case 'facilities':
                            // $intax = $this->VendorFacilities->newEmptyEntity();
                            $data = $request[$value];
                            
                            if(isset($data["quality_control_file"]) && $data["quality_control_file"]->getSize() > 0) {
                                $fileName = $data["quality_control_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/quality_control/" . $fileName;
                                $data["quality_control_file"]->moveTo($imagePath);
                                $data["quality_control_file"]= "uploads/quality_control/" . $fileName;
                            } else { $data["quality_control_file"]= ""; }

                            if($data["lab_facility_file"] && $data["lab_facility_file"]->getSize() > 0) {
                                $fileName = $data["lab_facility_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/lab_facility/" . $fileName;
                                $data["lab_facility_file"]->moveTo($imagePath);
                                $data["lab_facility_file"]= "uploads/lab_facility/" . $fileName;
                            } else { $data["lab_facility_file"]= ""; }

                            if($data["isi_registration_file"] && $data["isi_registration_file"]->getSize() > 0) {
                                $fileName = $data["isi_registration_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/isi_registration/" . $fileName;
                                $data["isi_registration_file"]->moveTo($imagePath);
                                $data["isi_registration_file"]= "uploads/isi_registration/" . $fileName;
                            } else { $data["isi_registration_file"]= ""; }

                            if($data["test_facility_file"] && $data["test_facility_file"]->getSize() > 0) {
                                $fileName = $data["test_facility_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/test_facility/" . $fileName;
                                $data["test_facility_file"]->moveTo($imagePath);
                                $data["test_facility_file"]= "uploads/test_facility/" . $fileName;
                            } else { $data["test_facility_file"]= ""; }

                            if($data["sales_services_file"] && $data["sales_services_file"]->getSize() > 0) {
                                $fileName = $data["sales_services_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/sales_services/" . $fileName;
                                $data["sales_services_file"]->moveTo($imagePath);
                                $data["sales_services_file"]= "uploads/sales_services/" . $fileName;
                            } else { $data["sales_services_file"]= ""; }

                            if ($data['id'] != "" || $data['id'] != null) {
                                $old_facility = $this->VendorFacilities->get($data["id"]);
                                $facility = $this->VendorFacilities->patchEntity($old_facility, $data);
                            } else{
                                $old_facility = $this->VendorFacilities->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $facility = $this->VendorFacilities->patchEntity($old_facility, $data);
                            }

                            // print_r($facility);
                            // exit;
                            if (!$this->VendorFacilities->save($facility)) {
                                $form_status = false;
                            } else { $resp_data["vendor_facilities"] = $facility; }
                            break;

                        case 'turnovers':
                            $data = $request[$value];
                            if ($data['id'] != "" || $data['id'] != null) {
                                $old_turnover = $this->VendorTurnovers->get($data["id"]);
                                $turnover = $this->VendorTurnovers->patchEntity($old_turnover, $data);
                            } else{
                                $old_turnover = $this->VendorTurnovers->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $turnover = $this->VendorTurnovers->patchEntity($old_turnover, $data);
                            }

                            // print_r($turnover);
                            // exit;
                            if (!$this->VendorTurnovers->save($turnover)) {
                                $form_status = false;
                            } else { $resp_data["vendor_turnovers"] = $turnover; }
                            break;

                        case 'incometaxes':
                            $data = $request[$value];
                            if(isset($data["certificate_file"]) && $data["certificate_file"]->getSize() > 0 ) {
                                $fileName = $data["certificate_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/certificate/" . $fileName;
                                $data["certificate_file"]->moveTo($imagePath);
                                $data["certificate_file"]= "uploads/certificate/" . $fileName;
                            } else  { $data["certificate_file"]= ""; }

                            if(isset($data["balance_sheet_file"]) && $data["balance_sheet_file"]->getSize() > 0) {
                                $fileName = $data["balance_sheet_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/balance_sheet/" . $fileName;
                                $data["balance_sheet_file"]->moveTo($imagePath);
                                $data["balance_sheet_file"]= "uploads/balance_sheet/" . $fileName;
                            } else{ $data["balance_sheet_file"]= ""; }

                            if ($data['id'] != "" || $data['id'] != null) {
                                $old_it = $this->VendorIncometaxes->get($data["id"]);
                                $it = $this->VendorIncometaxes->patchEntity($old_it, $data);
                            } else{
                                $old_it = $this->VendorIncometaxes->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $it = $this->VendorIncometaxes->patchEntity($old_it, $data);
                            }

                            // print_r($it);
                            // exit;
                            if (!$this->VendorIncometaxes->save($it)) {
                                $form_status = false;
                            } else { $resp_data["vendor_incometaxes"] = $it; }
                            break;

                        case 'factories':
                            $data = $request[$value];

                            foreach ($data as $key => $value) {
                                
                                if(isset($value["installed_capacity_file"]) && $value["installed_capacity_file"]->getSize() > 0) {
                                        $fileName = $value["installed_capacity_file"]->getClientFilename();
                                        $imagePath = WWW_ROOT . "uploads/installed_capacity/" . $fileName;
                                        $value["installed_capacity_file"]->moveTo($imagePath);
                                        $value["installed_capacity_file"]= "uploads/installed_capacity/" . $fileName;
                                } else  { $value["installed_capacity_file"]= ""; }
            
                                if(isset($value["machinery_available_file"]) && $value["machinery_available_file"]->getSize() > 0) {
                                    $fileName = $value["machinery_available_file"]->getClientFilename();
                                    $imagePath = WWW_ROOT . "uploads/machinery_available/" . $fileName;
                                    $value["machinery_available_file"]->moveTo($imagePath);
                                    $value["machinery_available_file"]= "uploads/machinery_available/" . $fileName;
                                } else { $value["machinery_available_file"]= ""; }
            
                                if(isset($value["power_available_file"]) && $value["power_available_file"]->getSize() > 0) {
                                    $fileName = $value["power_available_file"]->getClientFilename();
                                    $imagePath = WWW_ROOT . "uploads/power_available/" . $fileName;
                                    $value["power_available_file"]->moveTo($imagePath);
                                    $value["power_available_file"]= "uploads/power_available/" . $fileName;
                                } else { $value["power_available_file"]= ""; }
            
                                if(isset($value["raw_material_file"]) && $value["raw_material_file"]->getSize() > 0) {
                                    $fileName = $value["raw_material_file"]->getClientFilename();
                                    $imagePath = WWW_ROOT . "uploads/raw_material/" . $fileName;
                                    $value["raw_material_file"]->moveTo($imagePath);
                                    $value["raw_material_file"]= "uploads/raw_material/" . $fileName;
                                } else { $value["raw_material_file"]= ""; }

                                if ($value['id'] != "" || $value['id'] != null) {
                                    $old_it = $this->VendorFactories->get($value["id"]);
                                    $it = $this->VendorFactories->patchEntity($old_it, $value);
                                } else{
                                    $old_it = $this->VendorFactories->newEmptyEntity();
                                    // $data["vendor_temp_id"] = $id;
                                    $value["factory_code"] = $value['country']."_".$value['state']."_".$value['city']."_Unit".($key+1);
                                    $it = $this->VendorFactories->patchEntity($old_it, $value);
                                }
    
                                // print_r($it);
                                // exit;
                                if (!$this->VendorFactories->save($it)) { $form_status = false; }
                                else{
                                    // $resp_data["vendor_factories"][] = $it;
                                    foreach ($value["commencements"] as $key => $val) {
                                        if ($val['id'] != "" || $val['id'] != null) {
                                            $old_it = $this->VendorCommencements->get($val["id"]);
                                            $com = $this->VendorCommencements->patchEntity($old_it, $val);
                                        } else{
                                            $old_it = $this->VendorCommencements->newEmptyEntity();
                                            $val["vendor_factory_id"] = $it['id'];
                                            $com = $this->VendorCommencements->patchEntity($old_it, $val);
                                        }
                                        // print_r($it);
                                        if (!$this->VendorCommencements->save($com))
                                        { $form_status = false; }
                                    }
                                }
                            }
                            if ($form_status){
                                $resp_data["vendor_factories"] = $this->VendorFactories->find('all')->contain(['VendorCommencements'])->where(['vendor_temp_id' => $id])->toArray();
                            }
                            break;

                        case 'partner_address':
                            $data = $request[$value];
                            foreach ($data as $key => $value) {
                                if ($value['id'] != "" || $value['id'] != null) {
                                    $post = $this->VendorPartnerAddress->get($value['id']);
                                    $regoffc = $this->VendorPartnerAddress->patchEntity($post, $value);
                                } else{
                                    $regoffc = $this->VendorPartnerAddress->newEmptyEntity();
                                    // $data["vendor_temp_id"] = $id;
                                    $regoffc = $this->VendorPartnerAddress->patchEntity($regoffc, $value);
                                }
                                // echo '<pre>'; print_r($regoffc); exit;
                                if (!$this->VendorPartnerAddress->save($regoffc)) {
                                    $form_status = false;
                                } else { $resp_data["vendor_partner_address"][] = $regoffc; }
                            }
                            break;

                        case 'otherdetails':
                            $data = $request[$value];

                            if($data["six_sigma_file"] && $data["six_sigma_file"]->getSize() > 0) {
                                $fileName = $data["six_sigma_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/six_sigma/" . $fileName;
                                $data["six_sigma_file"]->moveTo($imagePath);
                                $data["six_sigma_file"]= "uploads/six_sigma/" . $fileName;
                            } else  { $data["six_sigma_file"]= ""; }

                            if($data["halal_file"] && $data["halal_file"]->getSize() > 0) {
                                $fileName = $data["halal_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/halal/" . $fileName;
                                $data["halal_file"]->moveTo($imagePath);
                                $data["halal_file"]= "uploads/halal/" . $fileName;
                            } else { $data["halal_file"]= ""; }

                            if($data["iso_file"] && $data["iso_file"]->getSize() > 0 ) {
                                $fileName = $data["iso_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/iso/" . $fileName;
                                $data["iso_file"]->moveTo($imagePath);
                                $data["iso_file"]= "uploads/iso/" . $fileName;
                            } else { $data["iso_file"]= ""; }

                            if($data["declaration_file"] && $data["declaration_file"]->getSize() > 0) {
                                $fileName = $data["declaration_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/declaration/" . $fileName;
                                $data["declaration_file"]->moveTo($imagePath);
                                $data["declaration_file"]= "uploads/declaration/" . $fileName;
                            } else { $data["declaration_file"]= ""; }

                            if ($data['id'] != "" || $data['id'] != null) {
                                $post = $this->VendorOtherdetails->get($data['id']);
                                $regoffc = $this->VendorOtherdetails->patchEntity($post, $data);
                            } else{
                                $regoffc = $this->VendorOtherdetails->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $regoffc = $this->VendorOtherdetails->patchEntity($regoffc, $data);
                            }
                            // print_r($regoffc);
                            if (!$this->VendorOtherdetails->save($regoffc)) {
                                $form_status = false;
                            } else { $resp_data["vendor_otherdetails"] = $regoffc; }
                            break;

                        case 'questionnaire':
                            $data = $request[$value];
                            foreach ($data as $key => $value) {
                                if ($value['id'] != "" || $value['id'] != null) {
                                    $post = $this->VendorQuestionnaires->get($value['id']);
                                    $regoffc = $this->VendorQuestionnaires->patchEntity($post, $value);
                                } else{
                                    $regoffc = $this->VendorQuestionnaires->newEmptyEntity();
                                    // $data["vendor_temp_id"] = $id;
                                    $regoffc = $this->VendorQuestionnaires->patchEntity($regoffc, $value);
                                }
                                // echo '<pre>'; print_r($regoffc); exit;
                                if (!$this->VendorQuestionnaires->save($regoffc)) {
                                    $form_status = false;
                                } else { $resp_data["vendor_questionnaires"][] = $regoffc; }
                            }
                            break;

                        case 'reputed_customers':
                            $data = $request[$value];
                            foreach ($data as $key => $value) {
                                if ($value['id'] != "" || $value['id'] != null) {
                                    $post = $this->VendorReputedCustomers->get($value['id']);
                                    $regoffc = $this->VendorReputedCustomers->patchEntity($post, $value);
                                } else{
                                    $regoffc = $this->VendorReputedCustomers->newEmptyEntity();
                                    // $data["vendor_temp_id"] = $id;
                                    $regoffc = $this->VendorReputedCustomers->patchEntity($regoffc, $value);
                                }
                                // print_r($regoffc);
                                if (!$this->VendorReputedCustomers->save($regoffc)) {
                                    $form_status = false;
                                } else { $resp_data["vendor_reputed_customers"][] = $regoffc; }
                            }
                            break;

                        default:
                            $data = $request['temps'];
                            if(isset($data["gst_file"]) && $data["gst_file"]->getSize() > 0) {
                                $fileName = $data["gst_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/gst/" . $fileName;
                                $data["gst_file"]->moveTo($imagePath);
                                $data["gst_file"]= "uploads/gst/" . $fileName;
                            } else { $data["gst_file"]= ""; }

                            if(isset($data["pan_file"]) && $data["pan_file"]->getSize() > 0) {
                                $fileName = $data["pan_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/pan/" . $fileName;
                                $data["pan_file"]->moveTo($imagePath);
                                $data["pan_file"]= "uploads/pan/" . $fileName;
                            } else { $data["pan_file"]= ""; }

                            if( isset($data["bank_file"]) && $data["bank_file"]->getSize() > 0) {
                                $fileName = $data["bank_file"]->getClientFilename();
                                $imagePath = WWW_ROOT . "uploads/bank/" . $fileName;
                                $data["bank_file"]->moveTo($imagePath);
                                $data["bank_file"]= "uploads/bank/" . $fileName;
                            }else { $data["bank_file"]= "";}

                            if ($data['id'] != "" || $data['id'] != null) {
                                $post = $this->VendorTemps->get($id);
                                $regoffc = $this->VendorTemps->patchEntity($post, $data);
                            } else{
                                $regoffc = $this->VendorTemps->newEmptyEntity();
                                // $data["vendor_temp_id"] = $id;
                                $regoffc = $this->VendorTemps->patchEntity($regoffc, $data);
                            }
                            // echo '<pre>'; print_r($regoffc); exit;
                            if (!$this->VendorTemps->save($regoffc)) {
                                $form_status = false;
                            } else { $resp_data["vendor_temps"] = $regoffc; }
                            break;
                    }
                }
                if ($form_status){ echo json_encode(array('status'=>1, 'msg'=> 'Saved Successfully', 'data'=>$resp_data)); exit; }
                else { echo json_encode(array('status'=>0, 'msg'=> 'Saved Failed', 'data'=>$resp_data)); exit; }
            } catch (\PDOException $e) { $flash = ['type' => 'error', 'msg' => ($e->getMessage())]; }
        }

        $vt_countries = $this->Countries->find('list', ['keyField' => 'id', 'valueField' => 'country_name'])->toArray();
        $vt_state = $this->States->find('list', ['keyField' => 'id', 'valueField' => 'name'])->all();
        $countries = $this->Countries->find('list', ['keyField' => 'country_code', 'valueField' => 'country_name'])->toArray();
        $states = $this->States->find('list', ['keyField' => 'region_code', 'valueField' => 'name'])->all();
        $currencies = $this->Currencies->find('list', ['keyField' => 'code', 'valueField' => 'name'])->toArray();
        $this->set(compact('vendorTemp', 'vt_countries', 'vt_state', 'countries', 'states','currencies'));
    }

}
