<?php

declare(strict_types=1);

namespace App\Controller\Buyer;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\Datasource\ConnectionManager;
use SebastianBergmann\Environment\Console;

/**
 * VendorTemps Controller
 *
 * @property \App\Model\Table\VendorTempsTable $VendorTemps
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorTempsController extends BuyerAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Vendor List');
        $this->loadModel("VendorTemps");
        $this->paginate = [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
            'order' => array('VendorTemps.added_date' => 'DESC'),
        ];
        $vendorTemps = $this->paginate($this->VendorTemps);


        $this->set(compact('vendorTemps'));
    }


    public function getList($term = null)
    {
        $this->autoRender = false;
        $list = array();
        $term = isset($_GET['term']) ? $_GET['term'] : null;

        $response['status'] = 0;
        $response['message'] = 'no records';
        if ($term != null) {
            $this->loadModel("VendorTemps");

            $vendors = $this->VendorTemps->find()
                ->select(['id', 'name', 'city', 'email', 'mobile'])
                ->where(["name like '%$term%'"])
                ->order(['name asc'])->all();

            foreach ($vendors as $vendor) {
                $tmp = array();
                $tmp['id'] = $vendor->id;
                $tmp['value'] = $vendor->name . ' (' . $vendor->city . ')';
                //$tmp['email'] = $vendor->email;
                //$tmp['mobile'] = $vendor->mobile;
                $list[] = $tmp;
            }
        }

        if (count($list)) {
            $response['status'] = 1;
            $response['message'] = 'success';
            $response['data'] = $list;
        }

        echo json_encode($list);
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
        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
        ]);
        $this->set('headTitle', 'Vendor Details');

        if ($this->VendorTemps->exists(['update_flag' => $id])) {

            $vendorTempView = $this->VendorTemps->find('all')->where(['update_flag' => $id])->toArray();
            // $vendorTempView = $this->VendorTemps->get($st[0]->id);
            //   $this->set(compact('vendorTempView'));
            $this->set('vendorTempView', $vendorTempView);
        }
        $this->set('vendorTemp', $vendorTemp);
        // echo '<pre>'; print_r($vendorTempView);exit;

    }


    public function update()
    {
        $this->loadModel("VendorTemps");

        if ($this->request->is('post')) {

            $id = $this->request->getData('id');

            $vendorTemp = $this->VendorTemps->get($id);
            $this->request->allowMethod(['post', 'put']);

            $vendorTemp->update_flag = -1;

            if ($this->VendorTemps->save($vendorTemp)) {
                $this->Flash->success(__('The vendorTemp has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {

                $this->Flash->error(__('The vendorTemp could not be updated. Please, try again.'));
            }
        }
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function sapView($id = null)
    {
        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
        ]);
        $this->set('headTitle', 'Vendor Details');


        $this->set(compact('vendorTemp'));
    }

    public function add()
    {
        $session = $this->getRequest()->getSession();

        $this->set('headTitle', 'Create Vendor');
        $this->loadModel("VendorTemps");
        $this->loadModel("PaymentTerms");
        $vendorTemp = $this->VendorTemps->newEmptyEntity();
        $vendorCodes = [];
        if ($this->request->is('post')) {

            $importFile = $this->request->getData('vendor_code');

            if ($importFile !== null && isset($_FILES['vendor_code']['name'])) {
                // echo '<pre>';
                $destination = "uploads/";
                $filename = $_FILES['vendor_code']['name'];
                $path = $destination . $filename;
                move_uploaded_file($_FILES['vendor_code']['tmp_name'], $path);
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($path);
                $worksheet = $spreadsheet->getActiveSheet();
                $this->loadModel('PaymentTerms');
                $this->loadModel('PurchasingOrganizations');
                $this->loadModel('AccountGroups');
                $this->loadModel('SchemaGroups');

                foreach ($worksheet->getRowIterator(2) as $row) {
                    $minivendor = [];
                    foreach ($row->getCellIterator() as $cell) {
                        $cellval = $cell->getValue();
                        array_push($minivendor, $cellval);
                    }
                    if (count($minivendor) > 1) {
                        // print_r($minivendor);exit;
                        $vendorTemp = $this->VendorTemps->newEmptyEntity();

                        // Check if mobile exist
                        if ($this->VendorTemps->exists(['VendorTemps.mobile' => $minivendor[2]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Mobile Already Exist", 'data' => $minivendor]);
                            continue;
                        } else {
                            $vendorTemp->mobile = $minivendor[2];
                        }

                        // Check if email exist
                        if ($this->VendorTemps->exists(['VendorTemps.email' => $minivendor[3]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Email Already Exist", 'data' => $minivendor]);
                            continue;
                        } else {
                            $vendorTemp->email = $minivendor[3];
                        }

                        // Check if Payment Term exist
                        if (!$this->PaymentTerms->exists(['PaymentTerms.code' => $minivendor[4]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Payment Terms not found", 'data' => $minivendor]);
                            continue;
                        } else {
                            $payment_term = $this->PaymentTerms->find('all')->where(['code =' => $minivendor[4]])->limit(1)->toArray();
                            if ($payment_term[0]->id) {
                                $vendorTemp->payment_term = $payment_term[0]->id;
                            }
                        }

                        // Check if Purchase Organisation exist
                        if (!$this->PurchasingOrganizations->exists(['PurchasingOrganizations.name' => $minivendor[5]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Purchasing Organizations not found", 'data' => $minivendor]);
                            continue;
                        } else {
                            $purchasing_org = $this->PurchasingOrganizations->find('all')->where(['name =' => $minivendor[5]])->limit(1)->toArray();
                            if ($purchasing_org[0]->id) {
                                $vendorTemp->purchasing_organization_id = $purchasing_org[0]->id;
                            }
                        }

                        // Check if Account Group exist
                        if (!$this->AccountGroups->exists(['AccountGroups.name' => $minivendor[6]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Account Groups not found", 'data' => $minivendor]);
                            continue;
                        } else {
                            $account_group = $this->AccountGroups->find('all')->where(['name =' => $minivendor[6]])->limit(1)->toArray();
                            if ($account_group[0]->id) {
                                $vendorTemp->account_group_id = $account_group[0]->id;
                            }
                        }

                        // Check if Schema Group exist
                        if (!$this->SchemaGroups->exists(['SchemaGroups.name' => $minivendor[7]])) {
                            array_push($vendorCodes, ['status' => false, 'msg' => "Schema Groups not found", 'data' => $minivendor]);
                            continue;
                        } else {
                            $schema_grp = $this->SchemaGroups->find('all')->where(['name =' => $minivendor[7]])->limit(1)->toArray();
                            if ($schema_grp[0]->id) {
                                $vendorTemp->schema_group_id = $schema_grp[0]->id;
                            }
                        }

                        $vendorTemp->buyer_id = $this->getRequest()->getSession()->read('id');
                        $vendorTemp->name = $minivendor[1];
                        $vendorTemp->valid_date = date('Y-m-d h:i:s');
                        $vendorTemp->status = 3;

                        try {
                            if ($this->VendorTemps->save($vendorTemp)) {
                                $id = $vendorTemp->toArray();
                                array_push($vendorCodes, ['status' => true, 'msg' => "Vendor Add Successful", 'data' => $minivendor]);
                            } else {
                                array_push($vendorCodes, ['status' => false, 'msg' => "Vendor Add Failed", 'data' => $minivendor]);
                            }
                        } catch (\Exception $e) {
                            array_push($vendorCodes, ['status' => false, 'msg' => $e->getMessage(), 'data' => $minivendor]);
                        }
                    }
                }

                $tempvendor = [];
                foreach ($vendorCodes as $ven) {
                    if (!$ven['status']) {
                        array_push($tempvendor, $ven);
                    }
                }
                foreach ($vendorCodes as $ven) {
                    if ($ven['status']) {
                        array_push($tempvendor, $ven);
                    }
                }

                $this->set('results', $tempvendor);
            } else {
                $this->Flash->error(__("SAP Vendor Code or Excel File Required."));
            }
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $payment_term = $this->PaymentTerms->find('list', ['keyField' => 'code', 'valueField' => 'code'])->all();

        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups', 'payment_term'));
    }

    public function sapAdd()
    {

        $this->set('headTitle', 'Import SAP Vendor');
        $this->loadModel("VendorTemps");

        if ($this->request->is('post')) {

            $inputCode = trim($this->request->getData('sap_vendor_code'));
            $vendorCodes = [$inputCode];

            if ($inputCode == "") {
                $vendorCodes = [];
            }

            $vendorView = [];


            $importFile = $this->request->getData('vendor_code');

            if ($_FILES['vendor_code']['name'] != "") {
                if ($importFile !== null && isset($_FILES['vendor_code']['name'])) {
                    $destination = "uploads/";
                    $filename = $_FILES['vendor_code']['name'];
                    $path = $destination . $filename;
                    move_uploaded_file($_FILES['vendor_code']['tmp_name'], $path);
                    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                    $spreadsheet = $reader->load($path);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $this->loadModel('PaymentTerms');
                    $this->loadModel('PurchasingOrganizations');
                    $this->loadModel('AccountGroups');
                    $this->loadModel('SchemaGroups');

                    // Copy cell data to vendorCodes array
                    foreach ($worksheet->getRowIterator(2) as $row) {
                        foreach ($row->getCellIterator() as $cell) {
                            $cellval = $cell->getValue();

                            array_push($vendorCodes, $cellval);
                            break;
                        }
                    }
                }
            }
            foreach ($vendorCodes as $vendorCode) {
                if (!empty($vendorCode)) {
                    if (!$this->VendorTemps->exists(['VendorTemps.sap_vendor_code' => $vendorCode])) {

                        $data['DATA'] = array();
                        $data['DATA']['LIFNR'] = $vendorCode;

                        // $http = new Client();
                        // $response = $http->post(
                        //     'http://123.108.46.252:8000/sap/bc/sftmob/VENDER_UPD/?sap-client=300',
                        //     json_encode($data),
                        //     ['type' => 'json', 'auth' => ['username' => 'vcsupport1', 'password' => 'aarti@123']]
                        // );



                        // if ($response->isOk()) {
                        //     $result = json_decode($response->getStringBody());

                        //     //print_r($result);

                        //     if ($result->RESPONSE->SUCCESS) {

                        $vendorTemp = $this->VendorTemps->newEmptyEntity();
                        // $resultResponse = json_decode($result->RESPONSE->DATA);

                        $data = array();
                        $response = array(
                            "NAME1" => "Abhishek Yadav",
                            "STREET" => "123 Main St",
                            "CITY1" => "mumbai",
                            "POST_CODE1" => "12345",
                            "COUNTRY" => "india",
                            "SMTP_ADDR" => "abhisheky@fts-pl.com",
                            "MOB_NUMBER" => "1234567890",
                            "ZTERM" => "0001"
                        );
                        $data['DATA']['LIFNR'] = $vendorCode;
                        $data['buyer_id'] = $this->getRequest()->getSession()->read('id');
                        $data['purchasing_organization_id'] = 1;
                        $data['account_group_id'] = 1;
                        $data['schema_group_id'] = 1;
                        $data['name'] = $response['NAME1'];
                        $data['address'] = $response['STREET'];
                        $data['city'] = $response['CITY1'];
                        $data['pincode'] = $response['POST_CODE1'];
                        $data['country'] = $response['COUNTRY'];
                        $data['email'] = $response['SMTP_ADDR'];
                        $data['mobile'] = $response['MOB_NUMBER'];
                        $data['payment_term'] = $response['ZTERM'];
                        $data['valid_date'] = date('Y-m-d h:i:s');

                        // user array create 
                        $names = explode(' ', $response['NAME1']);
                        $data['first_name'] = $names[0];
                        $data['last_name'] = $names[count($names) - 1];
                        $data['username'] = $response['SMTP_ADDR'];
                        $data['mobile'] = $response['MOB_NUMBER'];
                        $data['password'] = $response['MOB_NUMBER'];
                        $data['group_id'] = 3; // 3 is Vendor Portal Roles
                        $data['status'] = 5;
                        $data['sap_vendor_code'] = $vendorCode;

                        $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
                        //   print_r($data['email']);exit;

                        try {
                            if (!$this->VendorTemps->exists(['VendorTemps.email' => $data['email']]) && !$this->VendorTemps->exists(['VendorTemps.sap_vendor_code' => $data['sap_vendor_code']]) && !$this->VendorTemps->exists(['VendorTemps.mobile' => $data['mobile']])) {

                                if ($this->VendorTemps->save($vendorTemp)) {
                                    $this->loadModel("Users");
                                    $adminUser = $this->Users->newEmptyEntity();
                                    $adminUser = $this->Users->patchEntity($adminUser, $data);
                                    if (!$this->Users->exists(['Users.username' => $data['email']]) && !$this->Users->exists(['Users.mobile' => $data['mobile']])) {
                                        $this->Users->save($adminUser);
                                        $vendors = $vendorTemp->toArray();
                                        array_push($vendorView, ['status' => true, 'msg' => "The Vendor Added Successfully", 'data' => $vendors]);
                                    } else {
                                        array_push($vendorView, ['status' => false, 'msg' => "The Add Vendor Failed", 'data' => ['sap_vendor_code' => $vendorCode]]);
                                    }
                                }
                            }
                        } catch (\Exception $e) {
                            $this->Flash->error(__($e->getMessage()));
                        }
                        //     }
                        // }
                    } else {

                        array_push($vendorView, ['status' => false, 'msg' => "Already Exists for SAP code", 'data' => ['sap_vendor_code' => $vendorCode]]);
                    }
                } else {

                    array_push($vendorView, ['status' => false, 'msg' => "Please enter valid SAP Vendor Code", 'data' => ['sap_vendor_code' => $vendorCode]]);
                }
            }
            $this->set('vendorData', $vendorView);
        }
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
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $this->request->getData());
            if ($this->VendorTemps->save($vendorTemp)) {
                $this->Flash->success(__('The vendor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor temp could not be saved. Please, try again.'));
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Temp id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorTemp = $this->VendorTemps->get($id);
        if ($this->VendorTemps->delete($vendorTemp)) {
            $this->Flash->success(__('The vendor temp has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor temp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function approveVendor($id = null, $action = null)
    {
        $this->loadModel("VendorTemps");
        $vendor = $this->VendorTemps->get($id);

        if ($action == 'rej') {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $remarks = $this->request->getData('remarks');
                $vendor->status = 4;
                $vendor->remark = $remarks;
                $this->VendorTemps->save($vendor);
                $this->Flash->success(__('The Vendor successfully rejected'));
            } else {
                $this->Flash->success(__('Issue in vendor rejection'));
            }

            return $this->redirect(['action' => 'view', $id]);
        }

        if ($action == 'app') {
            $vendor->status = 2;
        }

        if ($this->VendorTemps->save($vendor)) {

            $data['DATA'] = array();

            $data['DATA']['LIFNR'] = $vendor->sap_vendor_code;
            $data['DATA']['BUKRS'] = '1000';
            $data['DATA']['EKORG'] = '1000'; //$vendor->purchasing_organization_id;
            $data['DATA']['KTOKK'] = 'ZZ01'; //$vendor->account_group_id;
            $data['DATA']['TITLE_MEDI'] = 'MR.';
            $data['DATA']['NAME1'] = $vendor->name;
            $data['DATA']['NAME2'] = $vendor->name;

            $data['DATA']['SORT1'] = 'Sort';
            $data['DATA']['STREET'] = $vendor->city;
            $data['DATA']['CITY1'] = $vendor->city;
            $data['DATA']['POST_CODE1'] = $vendor->pincode;

            $data['DATA']['REGION'] = 'MH';
            $data['DATA']['COUNTRY'] = 'IN';
            $data['DATA']['SMTP_ADDR'] = $vendor->email;
            $data['DATA']['MOB_NUMBER'] = $vendor->mobile;

            $data['DATA']['AKONT'] = '100110';
            $data['DATA']['ZUAWA'] = '001';
            $data['DATA']['ZTERM'] = '0001';
            $data['DATA']['WAERS'] = $vendor->order_currency;

            $http = new Client();
            $response = $http->post(
                'http://123.108.46.252:8000/sap/bc/sftmob/VENDER_UPD/?sap-client=300',
                json_encode($data),
                ['type' => 'json', 'auth' => ['username' => 'vcsupport1', 'password' => 'aarti@123']]
            );

            if ($response->isOk()) {
                $result = json_decode($response->getStringBody());

                if ($result->RESPONSE->SUCCESS) {

                    $resultResponse = json_decode($result->RESPONSE->DATA);
                    $newVendorCode = trim($resultResponse->DATA->LIFNR);

                    if (!empty($newVendorCode)) {
                        $this->loadModel("Users");
                        $adminUser = $this->Users->newEmptyEntity();
                        // echo '<pre>';
                        // print_r($adminUser);

                        $data = array();
                        $data['first_name'] = $vendor->name;
                        $data['last_name'] = $vendor->name;
                        $data['username'] = $vendor->email;
                        $data['mobile'] = $vendor->mobile;
                        $data['password'] = $vendor->mobile;
                        $data['group_id'] = 3;



                        $adminUser = $this->Users->patchEntity($adminUser, $data);

                        if ($this->Users->save($adminUser)) {
                            $link = Router::url(['prefix' => false, 'controller' => 'users', 'action' => 'login', '_full' => true, 'escape' => true]);
                            $mailer = new Mailer('default');
                            $mailer
                                ->setTransport('smtp')
                                ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                                ->setTo($data['username'])
                                ->setEmailFormat('html')
                                ->setSubject('Vendor Portal - Account created')
                                ->deliver('Hi ' . $data['first_name'] . ' <br/>Welcome to Vendor portal. <br/> <br/> Username: ' . $data['username'] .
                                    '<br/>Password:' . $data['password'] . '<br/> <a href="' . $link . '">Click here</a>');
                        }
                    }

                    $vendor->status = 3; //Approved by SAP
                    $vendor->sap_vendor_code = $newVendorCode;
                    $this->VendorTemps->save($vendor);



                    $this->redirect(['action' => 'index',]);
                    $this->Flash->success(__('The Vendor successfully approved', array('action' => 'index'), 30));
                }
            } else {
                $this->Flash->success(__('The Vendor sent to SAP for approval'));
            }
        } else {
            $this->Flash->error(__('The Vendor detail could not be updated. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $id]);
    }


    public function addvendor()
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("VendorTemps");
        $this->loadModel("Notifications");
        // echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $VendorTemp = $this->VendorTemps->newEmptyEntity();
                $data = $this->request->getData();
                $data['buyer_id'] = $this->getRequest()->getSession()->read('id');
                $data['valid_date'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +1 day'));
                $VendorTemp = $this->VendorTemps->patchEntity($VendorTemp, $data);
                $response['status'] = 'fail';
                if ($this->VendorTemps->exists(['VendorTemps.mobile' => $data['mobile']])) {
                    $response['message'] = 'Mobile Number Exist';
                } else if ($this->VendorTemps->exists(['VendorTemps.email' => $data['email']])) {
                    $response['message'] = 'Email ID Exist';
                } else if ($this->VendorTemps->save($VendorTemp)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                    $quryString = $data['email'] . '||' . $VendorTemp->id;
                    $link = Router::url(['controller' => '../vendor/onboarding', 'action' => 'verify', base64_encode($quryString), '_full' => true, 'escape' => true]);

                    $mailer = new Mailer('default');
                    $mailer
                        ->setTransport('smtp')
                        ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                        ->setTo($data['email'])
                        ->setEmailFormat('html')
                        ->setSubject('Verify New Account')
                        ->deliver('Hi ' . $data['name'] . '<br/>Welcome to Vendor portal. <br/>' . $link);
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = 'Contact Administrator';
                if ($e->getMessage()) {
                    $response['message'] = $e->getMessage();
                }
            }
        }

        echo json_encode($response);
    }
    public function sapEdit($id = null)
    {

        $response = array();
        $response['status'] = '0';
        $response['message'] = '';
        $this->autoRender = false;


        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            try {
                // $vendorTemp = $this->VendorTemps->newEmptyEntity();

                $data = $this->request->getData();


                $query = $this->VendorTemps->find('all')
                    ->where(['VendorTemps.id' => $id])
                    ->first();

                if ($query) {
                    if ($query['email'] != $data['email']) {
                        $emailCount = $this->VendorTemps->find()
                            ->where(['VendorTemps.email' => $data["email"]])
                            ->count();

                        if ($emailCount > 0) {
                            throw new \Exception('Already Exits Email ID');
                        }
                    } else if ($query['mobile'] != $data['mobile']) {
                        $mobileCount = $this->VendorTemps->find()
                            ->where(['VendorTemps.mobile' => $data["mobile"]])
                            ->count();

                        if ($mobileCount > 0) {
                            throw new \Exception('Already Exits Mobile No.');
                        }
                    }

                    $vendorTemp = $this->VendorTemps->patchEntity($query, $data);

                    if ($this->VendorTemps->save($vendorTemp)) {
                        $response['status'] = '1';
                        $response['message'] = 'Update Successfully';
                    } else {
                        throw new \Exception('Failed to Add User');
                    }
                } else {
                    throw new \Exception('Invalid ID');
                }
            } catch (\Exception $e) {
                $response['status'] = '0';
                $response['message'] = $e->getMessage();
            }
        }


        echo json_encode($response);
    }

    public function userCredentials($id = null)
    {
        $response = array();
        $response['status'] = '0';
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel("Users");
        $this->loadModel("VendorTemps");


        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'get', 'put'])) {


            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $this->request->getData());

            // print_r($vendorTemp);exit;

            $vendorTemp->status = 3;

            if ($this->VendorTemps->save($vendorTemp)) {

                $query = $this->Users->find()
                    ->select(['first_name', 'mobile', 'username'])
                    ->where(['username' => $vendorTemp->email])
                    ->toList();


                foreach ($query as $val) {
                    $link = Router::url(['prefix' => false, 'controller' => 'users', 'action' => 'login', '_full' => true, 'escape' => true]);
                    $mailer = new Mailer('default');
                    $mailer
                        ->setTransport('smtp')
                        ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                        ->setTo($val->username)
                        ->setEmailFormat('html')
                        ->setSubject('Vendor Portal - Account created')
                        ->deliver('Hi ' . $val->first_name . ' <br/>Welcome to Vendor portal. <br/> <br/> Username: ' . $val->username .
                            '<br/>Password:' . $val->mobile . '<br/> <a href="' . $link . '">Click here</a>');
                }
            } else {
                $response['status'] = '0';
                $response['message'] = 'Credentials Not Send.';
            }
        }


        $response['status'] = '1';
        $response['message'] = 'Credentials Mail Send successfully';
        echo json_encode($response);
    }
}

function importVendor($vendorCode)
{
    // $result = false;
    if (!empty($vendorCode) == "") {
        $data['DATA'] = array();
        $data['DATA']['LIFNR'] = $vendorCode;

        $http = new Client();
        $response = $http->post(
            'http://123.108.46.252:8000/sap/bc/sftmob/VENDER_UPD/?sap-client=300',
            json_encode($data),
            ['type' => 'json', 'auth' => ['username' => 'vcsupport1', 'password' => 'aarti@123']]
        );

        if ($response->isOk()) {
            $result = json_decode($response->getStringBody());
            if ($result->RESPONSE->SUCCESS) {
                $result = $resultResponse->DATA;
            }
        }
    }
    return $result;
}
