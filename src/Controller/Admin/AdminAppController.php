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
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AdminAppController extends Controller
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
        $flash = [];
        parent::initialize();

        date_default_timezone_set('Asia/Kolkata'); 

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Sms');
        $this->loadComponent('Ftp');
        $this->loadComponent("Cookie"); 
        
        $this->set('title', 'VeKPro');
        

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $session = $this->getRequest()->getSession();

        $full_name = $session->read('full_name');
        $role = $session->read('role');
        $group_name = $session->read('group_name');

        $this->set(compact('full_name', 'role', 'group_name'));
        
        
        //echo '<pre>'; print_r($session); exit;
        
        if(!$session->read('id') && $this->request->getParam('action') != 'login') {
            $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        } else {
            $this->set('logged_in', $session->read('id'));
        }
        $this->set('statusCode', Configure::read('StatusCode'));

        if($session->read('role') != 1) {
                $flash = ['type'=>'error', 'msg'=>'You are not authrized'];
                $this->set('flash', $flash);
            $this->redirect(array('prefix' => false, 'controller' => 'users', 'action' => 'login'));
        }
        
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('admin/admin');  //admin is our new layout name
    }

}
