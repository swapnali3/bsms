<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Vendor;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Core\Configure;
use Cake\Http\Exception;
use Cake\Http\Exception\ForbiddenException;
use Cake\Datasource\ConnectionManager;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class VendorAppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    
    public function initialize(): void
    {
        parent::initialize();
        
        date_default_timezone_set('Asia/Kolkata');
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Sms');
        $this->loadComponent('Ftp');
        $this->loadComponent("Cookie"); 
        
        $flash = [];  
        $this->set('flash', $flash);
        $this->set('title', 'APAR');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        
    }

    public function beforeFilter(EventInterface $event)
    {
        $flash = [];
        parent::beforeFilter($event);
        //$this->viewBuilder()->setLayout('vendor_default');  //admin is our new layout name
        $this->viewBuilder()->setLayout('vendor/admin');  //admin is our new layout name
        $this->set('controller', $this->request->getParam('controller'));
        $this->set('action', $this->request->getParam('action'));

        $session = $this->getRequest()->getSession();
        $full_name = $session->read('full_name');
        $role = $session->read('role');
        $userId = $session->read('id');
        $group_name = $session->read('group_name');

        //echo '<pre>'; print_r($session); exit;

        if (($this->request->getParam('action') == 'verify' || $this->request->getParam('action') == 'create')) {
            // $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        } else if ($session->check('id') && $session->read('role') != 3) {
            $flash = ['type'=>'error', 'msg'=>'You are not authrized'];
            $this->set('flash', $flash);
            return $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        } else if (!$session->check('id')) {
            return $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        } else {

            $this->loadModel('LoginToken');
            $loginToken = $this->LoginToken->find('all', [
            'conditions' => ['user_id' => $userId],
            'orderby' => 'desc']);
            $loginToken = $loginToken->first();
            if($loginToken) {
                $token = $loginToken->login_token;
                if($token && $token != $this->Cookie->getLoginToken()) {
                    return $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'logout-session'));
                }
            }

            $this->set('logged_in', $session->read('id'));
            $this->set('username', $session->read('username'));
        }

        $this->set(compact('full_name', 'role', 'group_name'));


        //$this->permission();
    }
    public function permission()
    {
        $conn = ConnectionManager::get('default');

        $session = $this->getRequest()->getSession();
        $permissionQuary = $conn->execute("SELECT permission FROM users_acl WHERE controller=:controller AND action=:action AND users=:id", [
            'controller' => $this->request->getParam('controller'),
            'action' => $this->request->getParam('action'),
            'id' => $session->read('id')
        ]);


        if ($permissionQuary->count() === 0) {
            throw new ForbiddenException('Permission Denied');
        }
    }
}
