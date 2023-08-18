<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;

use Cake\Event\EventInterface;

/**
 * VendorTemps Controller
 *
 * @property \App\Model\Table\VendorTempsTable $VendorTemps
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OnboardingController extends VendorAppController
{
    
    public function initialize(): void
    {
        parent::initialize();
        
        date_default_timezone_set('Asia/Kolkata'); 
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $flash = [];  
        $this->set('flash', $flash);
        $this->loadComponent('Flash');
        $this->set('title', 'Vendor Portal');
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('vendor_default');  //admin is our new layout name
    }

    public function verify($request = null)
    {
        $flash = [];
        if($request == null) {
            echo 'Bad request';
            exit;
        }

        $this->loadModel("VendorTemps");
        $this->loadModel("VendorTempOtps");
        $requestQry = explode('||', base64_decode($request));
        $id = $requestQry[1];
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        $validDate = $vendorTemp->valid_date->format('Y-m-d H:i:s');
        $today = date('Y-m-d H:i:s');

        if($validDate < $today) {
             //echo 'less';
        }

        if($vendorTemp->status) {
            //echo 'filled';
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data = $this->request->getData();
            //print_r($data);
            $vendorTempOtp = $this->VendorTempOtps->find('all',['conditions' => ['vendor_temp_id' => $id], 'order' => ['id desc'], 'limit' => 1])->toArray();
            if($vendorTempOtp[0]->otp == $data['otp']) {
                echo 'match';
                return $this->redirect(['action' => 'create', $request]);
            } else {
                $flash = ['type'=>'error', 'msg'=>'Invalid otp'];
                $this->set('flash', $flash);
            }
            //print_r($vendorTempOtp);
            
        } else {
            $otp = random_int(100000, 999999);
            $data = array();

            $data['vendor_temp_id'] =$id;
            $data['otp'] =$otp;
            $data['expire_date'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +5 minutes'));

            //$t = $this->Sms->sendOTP($vendorTemp->mobile, 'Onboarding OTP :: '. $otp);

            $VendorTempOtp = $this->VendorTempOtps->newEmptyEntity();
            $vendorOtp = $this->VendorTempOtps->patchEntity($VendorTempOtp, $data);
            if ($this->VendorTempOtps->save($vendorOtp)) {
                // $mailer = new Mailer('default');
                //     $mailer
                //         ->setTransport('smtp')
                //         ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                //         ->setTo($vendorTemp->email)
                //         ->setEmailFormat('html')
                //         ->setSubject('Verify New Account otp')
                //         ->deliver('Hi '.$vendorTemp->name.'<br/>OTP : ' . $otp);
                
                $visit_url = Router::url('/', true);
                $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setViewVars([ 'subject' => 'Hi '.$vendorTemp->name, 'mailbody' => 'OTP : ' . $otp, 'link' => $visit_url, 'linktext' => 'Visit Vekpro' ])
                    ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                    ->setTo($vendorTemp->email)
                    ->setEmailFormat('html')
                    ->setSubject('Vendor Portal - Verify New Account OTP')
                    ->viewBuilder()
                        ->setTemplate('mail_template');
                $mailer->deliver();
            }
        }

        $this->set(compact('vendorTemp'));
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
            $data['valid_date'] = $stop_date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +1 day'));;
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
            //echo '<pre>'; print_r($data); exit;
            if ($this->VendorTemps->save($vendorTemp)) {

                // $link = Router::url(['prefix' => false, 'controller' => 'onboarding', 'action' => 'create', base64_encode($data['email']), '_full' => true, 'escape' => true]);
                // $mailer = new Mailer('default');
                // $mailer
                //     ->setTransport('smtp')
                //     ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                //     ->setTo($data['email'])
                //     ->setEmailFormat('html')
                //     ->setSubject('Verify New Account')
                //     ->deliver('Hi '.$data['name'].'<br/>Welcome to Vekpro.' . $link);

                $visit_url = Router::url(['prefix' => false, 'controller' => 'onboarding', 'action' => 'create', base64_encode($data['email']), '_full' => true, 'escape' => true]);
                $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setViewVars([ 'subject' => 'Hi '.$data['name'], 'mailbody' => 'Welcome to Vekpro', 'link' => $visit_url, 'linktext' => 'Click Here' ])
                    ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                    ->setTo($data['email'])
                    ->setEmailFormat('html')
                    ->setSubject('Vendor Portal - Verify New Account')
                    ->viewBuilder()
                        ->setTemplate('mail_template');
                $mailer->deliver();

                $flash = ['type'=>'success', 'msg'=>'The vendor temp has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }

            //print_r($vendorTemp);
            //exit;
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
    public function create($request = null)
    {
        $flash = [];
        $this->loadModel("VendorTemps");
        $this->loadModel("Countries");
        $this->loadModel('Currencies');
        $this->loadModel('Users');
        $this->loadModel("States");
        $request = explode('||', base64_decode($request));

        //print_r($request); exit;
        $id = $request[1];
        $vendorTemp = $this->VendorTemps->get($id, [
            'contain' => [],
        ]);

        $validDate = $vendorTemp->valid_date->format('Y-m-d H:i:s');
        $today = date('Y-m-d H:i:s');

        if($validDate < $today) {
             //echo 'less';
        }

        if($vendorTemp->status) {
            //echo 'filled';
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['status'] = 1;

            // echo '<pre>'; print_r($data); exit;

            if($data["gst_file"]) {
                $gstUpload = $data["gst_file"];
                if (
                    $gstUpload !== null &&
                    $gstUpload->getError() !== \UPLOAD_ERR_NO_FILE
                ) {
                    $fileName = $id.'_'.$gstUpload->getClientFilename();
                    $fileType = $gstUpload->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/kyc/" . $fileName;
                        $gstUpload->moveTo($imagePath);
                        $data["gst_file"]= "uploads/kyc/" . $fileName;
                    }
                } else {
                    $data["gst_file"] = "";
                }
            }

            if($data["pan_file"]) {
                $panUpload = $data["pan_file"];
                if (
                    $panUpload !== null &&
                    $panUpload->getError() !== \UPLOAD_ERR_NO_FILE
                ) {
                    $fileName = $id.'_'.$panUpload->getClientFilename();
                    $fileType = $panUpload->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/kyc/" . $fileName;
                        $panUpload->moveTo($imagePath);
                        $data["pan_file"] = "uploads/kyc/" . $fileName;
                    }
                } else {
                    $data["pan_file"] = "";
                }
            }


            if($data["bank_file"]) {
                $bankUpload = $data["bank_file"];
                if (
                    $bankUpload !== null &&
                    $bankUpload->getError() !== \UPLOAD_ERR_NO_FILE
                ) {
                    $fileName = $id.'_'.$bankUpload->getClientFilename();
                $fileType = $bankUpload->getClientMediaType();

                if ($fileType == "application/pdf" || $fileType == "image/*") {
                    $imagePath = WWW_ROOT . "uploads/kyc/" . $fileName;
                    $bankUpload->moveTo($imagePath);
                    $data["bank_file"] = "uploads/kyc/" . $fileName;
                }
                } else {
                    $data["bank_file"] = "";
                }
                
            }

            //echo '<pre>'; print_r($data); exit;
            $buyer = $this->Users->get($vendorTemp->buyer_id);
            $vendorTemp = $this->VendorTemps->patchEntity($vendorTemp, $data);
            if ($this->VendorTemps->save($vendorTemp)) {
                $flash = ['type'=>'success', 'msg'=>'The request sent for approval'];
                $this->set('flash', $flash);

                $visit_url = Router::url('/', true);
                $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setViewVars([ 'subject' => 'New Vendor Oboarding', 'mailbody' => 'A new vendor has onboarded', 'link' => $visit_url, 'linktext' => 'VEKPRO' ])
                    ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                    ->setTo($buyer['username'])
                    ->setEmailFormat('html')
                    ->setSubject('Vendor Portal - Verify New Account')
                    ->viewBuilder()
                        ->setTemplate('mail_template');
                $mailer->deliver();

                return $this->redirect(['prefix' => false, 'controller' => 'users','action' => 'welcome']);
            }
            $flash = ['type'=>'error', 'msg'=>'The vendor temp could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $purchasingOrganizations = $this->VendorTemps->PurchasingOrganizations->find('list', ['limit' => 200])->all();
        $accountGroups = $this->VendorTemps->AccountGroups->find('list', ['limit' => 200])->all();
        $schemaGroups = $this->VendorTemps->SchemaGroups->find('list', ['limit' => 200])->all();
        $companyCodes = $this->VendorTemps->CompanyCodes->find('list', ['limit' => 200])->all();
        $reconciliationAccount = $this->VendorTemps->ReconciliationAccounts->find('list', ['limit' => 200])->all();

        $countries = $this->Countries->find('list', ['keyField' => 'id', 'valueField' => 'country_name'])->toArray();

        $currencies = $this->Currencies->find('list', ['keyField' => 'code', 'valueField' => 'code'])->toArray();

        $hasIndia = array_key_exists('IN', $countries);
        if ($hasIndia) {
            unset($countries['IN']);
            $countries = ['India' => 'India'] + $countries;
        }
        
        $states = $this->States->find('list', ['keyField' => 'id', 'valueField' => 'name'])->all();

        $this->set(compact('vendorTemp', 'purchasingOrganizations', 'accountGroups', 'schemaGroups', 'countries', 'states','companyCodes','reconciliationAccount','currencies'));
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
            $flash = ['type'=>'success', 'msg'=>'The vendor temp has been deleted'];
        } else {
            $flash = ['type'=>'success', 'msg'=>'The vendor temp could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
