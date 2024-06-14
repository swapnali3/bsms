<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AdminAppController
{

    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
        //$this->Auth->allow();
    }

    public function index()
    {

        $this->loadModel('Users');
        $this->loadModel('Managers');
        $this->loadModel('Buyers');

        
        
        $managerUsers = $this->Managers
        ->find('all')
        ->select($this->Managers)
        ->select(['Users.id'])
        ->innerJoin(['Users' => 'users'],['Managers.email=Users.username'])
        ->where(['Users.group_id' => 4])
        ->toArray();

        //echo '<pre>'; print_r($managers); exit;

        $buyerUsers = $this->Buyers
        ->find('all')
        ->select($this->Buyers)
        ->select(['Users.id'])
        ->select(['Managers.first_name', 'Managers.last_name'])
        ->contain(['Managers'])
        ->innerJoin(['Users' => 'users'],['Buyers.email=Users.username'])
        ->where(['Users.group_id' => 2])
        ->toArray();


        $managerList = $this->Managers->find('list', ['keyField' => 'id', 'valueField' => function ($row) {
            return $row->first_name.' '.$row->last_name;
        }])->all();
        
        $this->set(compact('buyerUsers', 'managerUsers', 'managerList'));
        
    }

    public function addManager()
    {
        
    }

    public function importBuyer()
    {
        
    }


    public function checkBuyer()
    {
        $this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $this->loadModel('Buyers');
        
            $response = array();
            $response['status'] = 0;
            $response['message'] = '';

            if(!$this->checkUserLimit()) {
                $response['status'] = 0;
                $response['message'] = 'Allowed 25 active user has been exceeded, please contact authorized person.';
                echo json_encode($response); exit;
            }
            
            try {
                $sapUser = strtoupper($this->request->getData('sap_user'));
                if (!$this->Buyers->exists(['sap_user' => $sapUser])) { 
                    $data = [];
                    $data['UNAME'] = $sapUser;
                    $uploadFileContent = json_encode($data);
                    $uploadfileName = 'BUYER_GET_('.$sapUser.')_REQ.JSON';
                    $downloadfileName = 'BUYER_GET_('.$sapUser.')_RES.JSON';
                    $ftpConn = $this->Ftp->connection();
                    if($this->Ftp->uploadFile($ftpConn, $uploadFileContent, $uploadfileName)) {
                        $this->loadModel('BuyerCodeFiles');
                        $sapUserFile = $this->BuyerCodeFiles->newEmptyEntity();
                        $tm['sap_user'] = $sapUser;
                        $tm['req_file_name'] = $uploadfileName;
                        $tm['res_file_name'] = $downloadfileName;
                        $tm['status'] = 'request sent';
                        $sapUserFile = $this->BuyerCodeFiles->patchEntity($sapUserFile, $tm);
                        if($this->BuyerCodeFiles->save($sapUserFile)){
                            $response['status'] = 1;
                            $response['message'] = 'Request sent to SAP, please check after sometime.';
                        } else {
                            $response['status'] = 1;
                            $response['message'] = 'Request sent to SAP, please check after sometime.';
                        }
                    } else {
                        $response['status'] = 0;
                        $response['message'] = 'FTP connection fail, please try again';
                    }
                } else {
                    $response['status'] = 0;
                    $response['message'] = 'User Already Exists';
                }
               
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
            echo json_encode($response); exit;
        }
    }

    public function checkManager()
    {
        $this->autoRender = false;
        $this->loadModel('Users');
        $this->loadModel('Managers');
        
        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $this->loadModel('Buyers');
        
            $response = array();
            $response['status'] = 0;
            $response['message'] = '';

            if(!$this->checkUserLimit()) {
                $response['status'] = 0;
                $response['message'] = 'Allowed 25 active user has been exceeded, please contact authorized person.';
                echo json_encode($response); exit;
            }

            try {
                $data = $this->request->getData();
                if (!$this->Users->exists(['username' => $data['email']])) { 
                    $userDetails = $this->Users->newEmptyEntity();
                    $manager = $this->Managers->newEmptyEntity();
                    $data['username'] = $data['email'];
                    $data['password'] = $data['mobile'];
                    $data['group_id'] = 4;
                    $userDetails = $this->Users->patchEntity($userDetails, $data);
                    $manager = $this->Managers->patchEntity($manager, $data);

                    if($this->Users->save($userDetails)){
                        $manager = $this->Managers->newEmptyEntity();
                        $manager = $this->Managers->patchEntity($manager, $data);
                        $this->Managers->save($manager);
                        
                        $response['status'] = 1;
                        $response['message'] = 'Manager created successfully';
                    } else {
                        print_r($userDetails);
                        $response['status'] = 0;
                        $response['message'] = 'Manager creation failed';
                    }
                    
                } else {
                    $response['status'] = 0;
                    $response['message'] = 'User Already Exists';
                }
               
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
            echo json_encode($response); exit;
        }
    }

    function changeBuyerStatus () {
        $this->autoRender = false;
        $this->loadModel('Users');
        $this->loadModel('Buyers');
        $this->loadModel('Managers');

        $response = array();
        $response['status'] = 0;
        $response['message'] = '';

        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $data = $this->request->getData();
            $user = $this->Users->get($data['id']);
            $updateData = [];
            $updateData['status'] = $data['status'];

            unset($user->password);
            $user = $this->Users->patchEntity($user, $updateData);

            if ($this->Users->save($user)) {
                $response['status'] = 1;
                if($data['group'] == 2) {
                    $buyer = $this->Buyers->get($data['table_id']);
                    $buyer = $this->Buyers->patchEntity($buyer, $updateData);
                    $this->Buyers->save($buyer);
                }
                if($data['group'] == 4) {
                    $manager = $this->Managers->get($data['table_id']);
                    $manager = $this->Managers->patchEntity($manager, $updateData);
                    $this->Managers->save($manager);
                }
                if($data['status']) {
                    $response['message'] = 'User successfully activated';
                } else {
                    $response['message'] = 'User successfully deactivated';
                }
            } else {
                $response['status'] = 0;
                $response['message'] = 'Fail to updated data';
            }

        }

        echo json_encode($response); exit;

    }

    function changeBuyerManager () {
        $this->autoRender = false;
        $this->loadModel('Buyers');

        $response = array();
        $response['status'] = 0;
        $response['message'] = '';

        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $data = $this->request->getData();
            $buyer = $this->Buyers->get($data['id']);
            $buyer = $this->Buyers->patchEntity($buyer, $data);
                    

            if ($this->Buyers->save($buyer)) {
                $response['status'] = 1;
                $response['message'] = 'Manager updated successfully';
            } else {
                $response['status'] = 0;
                $response['message'] = 'Fail to updated data';
            }

        }

        echo json_encode($response); exit;

    }

    private function checkUserLimit() {
        $limit = 25;
        $this->loadModel('Users');
        $userList = $this->Users->find('all')->where(['group_id in (2,4)']);
        if($userList->count() <= $limit) {
            return true;
        }

        return false;
    }
}