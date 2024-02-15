<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;
use Cake\Core\Configure;

/**
 * VendorTemps Controller
 *
 * @property \App\Model\Table\VendorTempsTable $VendorTemps
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorTempsController extends AdminAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel("VendorTemps");
        $this->paginate = [
            'contain' => ['PurchasingOrganizations', 'AccountGroups', 'SchemaGroups'],
        ];
        $vendorTemps = $this->paginate($this->VendorTemps);

        $this->set(compact('vendorTemps'));
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
        $this->set('headTitle', 'Vendor Details');
        $this->loadModel('VendorTemps');

        if ($this->VendorTemps->exists(['update_flag' => $id])) {
            $vendorTempView = $this->VendorTemps->find('all')->where(['update_flag' => $id])->toArray();
            $this->set('vendorTempView', $vendorTempView);
        }

        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => ['VendorStatus','CompanyCodes','PurchasingOrganizations','ReconciliationAccounts', 'AccountGroups', 'SchemaGroups', 'PaymentTerms', 'VendorFacilities', 'VendorIncometaxes', 'VendorOtherdetails', 'VendorQuestionnaires', 'VendorSmallScales', 'VendorTurnovers', 'States', 'Countries']]);
        
        $this->loadModel("VendorRegisteredOffices");
        $vendorRegisterOffice = $this->VendorRegisteredOffices->find()
        ->select($this->VendorRegisteredOffices)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorRegisteredOffices.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorRegisteredOffices.state','States.country_code = VendorRegisteredOffices.country'])
        ->where(['States.country_code = VendorRegisteredOffices.country', 'VendorRegisteredOffices.vendor_temp_id' => $id])->first();
        
        $this->loadModel("VendorPartnerAddress");
        $vendorPartnerAddress = $this->VendorPartnerAddress->find()
        ->select($this->VendorPartnerAddress)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorPartnerAddress.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorPartnerAddress.state','States.country_code = VendorPartnerAddress.country'])
        ->where([ 'VendorPartnerAddress.vendor_temp_id' => $id])->toArray();
        
        $this->loadModel("VendorFactories");
        $vendorFactories = $this->VendorFactories->find()
        ->select($this->VendorFactories)
        ->select(['States.name', 'Countries.country_name'])
        ->contain(['VendorCommencements'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorFactories.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorFactories.state', 'States.country_code = VendorFactories.country'])     
        ->where([  'VendorFactories.vendor_temp_id' => $id])->toArray();
        
        
        $this->loadModel("VendorReputedCustomers");
        $vendorReputedCustomers = $this->VendorReputedCustomers->find()
        ->select($this->VendorReputedCustomers)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorReputedCustomers.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorReputedCustomers.state', 'States.country_code = VendorReputedCustomers.country'])
        ->where(['VendorReputedCustomers.vendor_temp_id' => $id])->toArray();
        
        
        $this->loadModel("VendorBranchOffices");
        $vendorBranchOffices = $this->VendorBranchOffices->find()
        ->select($this->VendorBranchOffices)
        ->select(['States.name', 'Countries.country_name'])
        ->innerJoin(['Countries'=> 'countries'], ['Countries.country_code = VendorBranchOffices.country'])
        ->innerJoin(['States'=> 'states'], ['States.region_code = VendorBranchOffices.state', 'States.country_code = VendorBranchOffices.country'])
        ->where(['VendorBranchOffices.vendor_temp_id' => $id])->toArray();

        $this->set(compact('vendorTemp', 'vendorPartnerAddress', 'vendorRegisterOffice', 'vendorReputedCustomers', 'vendorFactories', 'vendorBranchOffices'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['buyer_id'] = $this->getRequest()->getSession()->read('adminuser.id');
            $data['valid_date'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +1 day'));;
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
            //echo '<pre>'; print_r($data); exit;
            if ($this->VendorTemps->save($vendorTemp)) {
                $quryString = $data['email'].'||'.$vendorTemp->id;
                
                $buyer = $this->Buyers->find()->where(['id'=>$data['buyer_id']]);
                $buyerList = $this->Buyers->find()->select('email')->where(['company_code_id' => $buyer->company_code_id, 'purchasing_organization_id' => $buyer->purchasing_organization_id])->toArray();
                $buyersEmails = [];
                foreach($buyerList as $email) { $buyersEmails[] = $email->email; }
                
                $visit_url = Router::url(['prefix' => false, 'controller' => 'onboarding', 'action' => 'verify', base64_encode($quryString), '_full' => true, 'escape' => true]);
                $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setViewVars([
                        'vendor_name' => $vendorTemp->name,
                        'spt_email' => $buyer->email,
                    ])
                    ->setFrom(Configure::read('MAIL_FROM'))
                    ->setTo($buyersEmails)
                    ->setEmailFormat('html')
                    ->setSubject('VENDOR PORTAL - VERIFY NEW ACCOUNT')
                    ->viewBuilder()
                        ->setTemplate('new_vendor');
                $mailer->deliver();

                $flash = ['type'=>'success', 'msg'=>'The vendor temp has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }

            $flash = ['type'=>'error', 'msg'=>'The vendor could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups'));
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
        $flash = [];
        $this->loadModel("VendorTemps");
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $this->request->getData());
            if ($this->VendorTemps->save($vendorTemp)) {
                $flash = ['type'=>'success', 'msg'=>'The vendor temp has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The vendor temp could not be saved. Please, try again'];
            $this->set('flash', $flash);
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
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $vendorTemp = $this->VendorTemps->get($id);
        if ($this->VendorTemps->delete($vendorTemp)) {
            $flash = ['type'=>'error', 'msg'=>'The vendor temp has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The vendor temp could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);
        
        return $this->redirect(['action' => 'index']);
    }

    public function approveVendor($id = null, $action = null)
    {  
        $flash = []; 
        $this->loadModel("VendorTemps");
        $vendor = $this->VendorTemps->get($id);
        if($action == 'app') {
            $vendor->status = 2;
        }
        
        if ($this->VendorTemps->save($vendor)) {
            
            //echo '<pre>'; print_r($vendor); exit;

            $data['DATA'] = array();

            $data['DATA']['LIFNR'] = $vendor->sap_vendor_code;
            $data['DATA']['BUKRS'] = '1000';
            $data['DATA']['EKORG'] = $vendor->purchasing_organization_id;
            $data['DATA']['KTOKK'] = $vendor->account_group_id;
            $data['DATA']['TITLE_MEDI'] = 'MR.';
            $data['DATA']['NAME1'] = $vendor->name;
            $data['DATA']['NAME2'] = $vendor->name;

            $data['DATA']['SORT1'] = $vendor->name;
            $data['DATA']['STREET'] = $vendor->city;
            $data['DATA']['CITY1'] = $vendor->city;
            $data['DATA']['POST_CODE1'] = $vendor->pincode;

            $data['DATA']['REGION'] = 'MH';
            $data['DATA']['COUNTRY'] = 'IN';
            $data['DATA']['SMTP_ADDR'] = $vendor->email;
            $data['DATA']['MOB_NUMBER'] = $vendor->mobile;

            $data['DATA']['AKONT'] = 100110;
            $data['DATA']['ZUAWA'] = 1;
            $data['DATA']['ZTERM'] = '1';
            $data['DATA']['WAERS'] = $vendor->order_currency;

            $http = new Client();
            $response = $http->post(
                    'http://123.108.46.252:8000/sap/bc/sftmob/VENDER_UPD/?sap-client=300',
                    json_encode($data),
                    ['type' => 'json', 'auth' => ['username' => 'vcsupport1', 'password' => 'aarti@123']]
            );

            if($action == 'app') {
                $flash = ['type'=>'success', 'msg'=>'The Vendor successfully approved and sent to SAP system'];
            }
        } else {
            $flash = ['type'=>'success', 'msg'=>'The Vendor detail could not be updated. Please, try again'];
        }
        
        $this->set('flash', $flash);
        return $this->redirect(['action' => 'index']);
    }


}
