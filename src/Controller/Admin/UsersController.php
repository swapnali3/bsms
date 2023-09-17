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
    }

    public function addbuyer()
    {
        $this->loadModel('CompanyCodes');
        $company_codes = $this->CompanyCodes->find('list', ['keyField' => 'id', 'valueField' => function ($row) {
            return $row->code.' - '.$row->name;
        }])->all();

        $this->set(compact('company_codes'));
    }

    
}