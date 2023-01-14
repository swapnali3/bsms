<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize() : void 
  {
      parent::initialize();
      //$this->Auth->allow();
  }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'groups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->setLayout('admin/login'); 
        $this->loadModel("Users");

        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->getData('logged_by') == 'email') {

                $result = $this->Users->find()->where(['username' => $this->request->getData('username')])->limit(1)->toArray();    
                //print_r($this->request->getData());print_r($result); exit;
                if($result) {
                    if(password_verify($this->request->getData('password'), $result[0]->password )){
                        $session = $this->getRequest()->getSession();
                        $session->write('username', $result[0]->username);
                        $session->write('id', $result[0]->id);
                        $session->write('role', $result[0]->group_id);
                        if($result[0]->group_id == 1) {
                            $this->redirect(['controller' => 'admin/dashboard', 'action' => 'index']);
                        }  else if($result[0]->group_id == 2) {
                            $this->redirect(['controller' => 'buyer/dashboard', 'action' => 'index']);
                        }else if($result[0]->group_id == 3) {
                            $this->redirect(['controller' => 'vendor/dashboard', 'action' => 'index']);
                        }
                    } else {
                        $this->Flash->error("Invalid password");
                    }
                } else {
                    $this->Flash->error("Invalid username");
                }
            } else {
                $result = $this->Users->find()->where(['mobile' => $this->request->getData('mobile')])->limit(1)->toArray();    
                //print_r($result); exit;
                if($result) {
                    if($this->request->getData('otp') == $result[0]->otp){
                        $session = $this->getRequest()->getSession();
                        $session->write('username', $result[0]->username);
                        $session->write('id', $result[0]->id);
                        $session->write('role', $result[0]->group_id);
                        if($result[0]->group_id == 1) {
                            $this->redirect(['controller' => 'admin/dashboard', 'action' => 'index']);
                        }  else if($result[0]->group_id == 2) {
                            $this->redirect(['controller' => 'buyer/dashboard', 'action' => 'index']);
                        } else if($result[0]->group_id == 3) {
                            $this->redirect(['controller' => 'vendor/dashboard', 'action' => 'index']);
                        }
                    } else {
                        $this->Flash->error("Invalid OTP");
                    }
                } else {
                    $this->Flash->error("Invalid mobile");
                }
            }
        }
    }


    public function getOtp() {
        $this->autoRender = false;
        $this->loadModel("Users");

        $response = array();

        if ($this->request->is('post')) {
            $result = $this->Users->find()->where(['mobile' => $this->request->getData('mobile')])->limit(1)->toArray();    
            //print_r($result); exit;
            if($result) {
                $otp = random_int(100000, 999999);
                $user = $this->Users->get($result[0]->id);
                $user = $this->Users->patchEntity($user, array('otp' => $otp));
                if ($this->Users->save($user)) {
                    $t = $this->Sms->sendOTP($this->request->getData('mobile'), 'Portal Login OTP :: '. $otp);

                    $mailer = new Mailer('default');
                $mailer
                    ->setTransport('smtp')
                    ->setFrom(['helpdesk@fts-pl.com' => 'FT Portal'])
                    ->setTo('deepaksingh@fts-pl.com')
                    ->setEmailFormat('html')
                    ->setSubject('Login OTP')
                    ->deliver('Hi '.$result[0]->username. '<br/> OTP :: ' . $otp);

                }
                

                $response['status'] = 'success';
                $response['message'] = 'OTP sent to register email Id';

            } else {
                $response['status'] = 'fail';
                $response['message'] = 'Mobile number not found';
            }
        }

        echo json_encode($response);
    }

    public function logout() {
        //Leave empty for now.
        //$this->redirect($this->Auth->logout());
        $session = $this->getRequest()->getSession();
        $session->destroy();
        $this->Flash->success("You've successfully logged out.");
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
}
