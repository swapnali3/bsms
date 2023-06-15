<?php

declare(strict_types=1);

namespace App\Controller\Buyer;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

        $session = $this->getRequest()->getSession();

        $userId =  $session->read('id');

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'asn_material' AND message_count > 0 AND user_id = $userId");
        $count = $notificationCount->rowCount();


        $this->set(compact('vendorTemps', 'notificationCount', 'count'));
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

        $session = $this->getRequest()->getSession();

        $userId =  $session->read('id');

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'asn_material' AND message_count > 0 AND user_id = $userId");
        $count = $notificationCount->rowCount();

        $this->set(compact('vendorTemp', 'notificationCount', 'count'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->getRequest()->getSession();

        $userId =  $session->read('id');

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'asn_material' AND message_count > 0 AND user_id = $userId");
        $count = $notificationCount->rowCount();

        $this->set(compact('notificationCount', 'count'));
        $this->set('headTitle', 'Create Vendor');
        $this->loadModel("VendorTemps");
        $this->loadModel("PaymentTerms");
        $vendorTemp = $this->VendorTemps->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['buyer_id'] = $this->getRequest()->getSession()->read('id');
            $data['valid_date'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +1 day'));;

            $existingVendor = $this->VendorTemps->find()
                ->where(['OR' => ['email' => $data['email'], 'mobile' => $data['mobile']]])
                ->first();

            if ($existingVendor) {
                $this->Flash->error(__('Email or mobile number already exists'));
                //return $this->redirect(['action' => 'add']);
            } else {
                $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
                //echo '<pre>'; print_r($data); exit;
                if ($this->VendorTemps->save($vendorTemp)) {
                    $quryString = $data['email'] . '||' . $vendorTemp->id;
                    $link = Router::url(['controller' => '../vendor/onboarding', 'action' => 'verify', base64_encode($quryString), '_full' => true, 'escape' => true]);

                    $mailer = new Mailer('default');
                    $mailer
                        ->setTransport('smtp')
                        ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                        ->setTo($data['email'])
                        ->setEmailFormat('html')
                        ->setSubject('Verify New Account')
                        ->deliver('Hi ' . $data['name'] . '<br/>Welcome to Vendor portal. <br/>' . $link);

                    $this->Flash->success(__('The vendor has been initiated'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
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

        $session = $this->getRequest()->getSession();

        $userId =  $session->read('id');

        $this->loadModel('Notifications');
        $notificationCount = $this->Notifications->getConnection()->execute("SELECT * FROM notifications WHERE notification_type = 'asn_material' AND message_count > 0 AND user_id = $userId");
        $count = $notificationCount->rowCount();

        $this->set(compact('notificationCount', 'count'));

        $this->set('headTitle', 'Import SAP Vendor');
        $this->loadModel("VendorTemps");

        if ($this->request->is('post')) {

            $vendorCode = trim($this->request->getData('sap_vendor_code'));
            $importFile = $this->request->getData('vendor_code');
            if ($importFile !== null && isset($_FILES['vendor_code']['name'])) {

                $destination = "uploads/";
                $filename = $_FILES['vendor_code']['name'];
                $path = $destination . $filename;

                move_uploaded_file($_FILES['vendor_code']['tmp_name'], $path);

                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($path);

                $worksheet = $spreadsheet->getActiveSheet();
                $vendorCodes = [];

                foreach ($worksheet->getRowIterator() as $row) {
                    foreach ($row->getCellIterator() as $cell) {
                        $vendorCode1 = $cell->getValue();
                        $vendorCodes[] = $vendorCode1;
                    }
                }


                $query = $this->VendorTemps->find()
                    ->where(['VendorTemps.sap_vendor_code IN' => $vendorCodes]);
                $VendorTemps = $this->paginate($query);
                       
                $this->set('vendorData', $VendorTemps);
            }



            if (!empty($vendorCode) == "") {

                if (!$this->VendorTemps->exists(['VendorTemps.sap_vendor_code' => $vendorCode])) {
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

                        //print_r($result);

                        if ($result->RESPONSE->SUCCESS) {
                            $vendorTemp = $this->VendorTemps->newEmptyEntity();
                            $resultResponse = json_decode($result->RESPONSE->DATA);

                            $data = array();
                            $data['buyer_id'] = $this->getRequest()->getSession()->read('id');
                            $data['purchasing_organization_id'] = 1;
                            $data['account_group_id'] = 1;
                            $data['schema_group_id'] = 1;
                            $data['name'] = $resultResponse->DATA->NAME1;
                            $data['address'] = $resultResponse->DATA->STREET;
                            $data['city'] = $resultResponse->DATA->CITY1;
                            $data['pincode'] = $resultResponse->DATA->POST_CODE1;
                            $data['country'] = $resultResponse->DATA->COUNTRY;
                            $data['email'] = $resultResponse->DATA->SMTP_ADDR;
                            $data['mobile'] = $resultResponse->DATA->MOB_NUMBER;
                            $data['payment_term'] = $resultResponse->DATA->ZTERM;
                            $data['valid_date'] = date('Y-m-d h:i:s');
                            $data['status'] = 3;

                            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);

                            try {
                                if ($this->VendorTemps->save($vendorTemp)) {
                                    $this->Flash->success(__('The Vendor successfully added'));
                                }
                            } catch (\Exception $e) {
                                $this->Flash->error(__($e->getMessage()));
                            }
                        }
                    }
                } else {
                    $this->Flash->error(__('Vendor Already Exists for SAP code - ' . $vendorCode));
                }
            } else {
                $this->Flash->error(__('Please enter valid SAP Vendor Code'));
            }
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

            //echo '<pre>'; print_r($vendor);

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

            //echo '<pre>'; print_r($data);
            //echo '<pre>'; print_r($response->isOk()); 


            if ($response->isOk()) {
                $result = json_decode($response->getStringBody());

                if ($result->RESPONSE->SUCCESS) {

                    $resultResponse = json_decode($result->RESPONSE->DATA);
                    $newVendorCode = trim($resultResponse->DATA->LIFNR);

                    if (!empty($newVendorCode)) {
                        $this->loadModel("Users");
                        $adminUser = $this->Users->newEmptyEntity();
                        echo '<pre>';
                        print_r($adminUser);

                        $data = array();
                        $data['first_name'] = $vendor->name;
                        $data['last_name'] = $vendor->name;
                        $data['username'] = $vendor->email;
                        $data['mobile'] = $vendor->mobile;
                        $data['password'] = $vendor->mobile;
                        $data['group_id'] = 3;



                        $adminUser = $this->Users->patchEntity($adminUser, $data);

                        // echo '<pre>'; print_r($adminUser);exit;


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

                    //echo '<pre>'; print_r($resultResponse); exit;
                    $vendor->status = 3; //Approved by SAP
                    $vendor->sap_vendor_code = $newVendorCode;
                    $this->VendorTemps->save($vendor);
                    $this->redirect(['action' => 'index',]);
                    $this->Flash->success(__('The Vendor successfully approved', array('action' => 'index'), 30));
                }
                //echo '<pre>'; print_r($result->RESPONSE); exit;
                //echo '<pre>'; print_r($response->getStringBody()); exit;
            } else {
                $this->Flash->success(__('The Vendor sent to SAP for approval'));
            }
        } else {
            $this->Flash->error(__('The Vendor detail could not be updated. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $id]);
    }
}
