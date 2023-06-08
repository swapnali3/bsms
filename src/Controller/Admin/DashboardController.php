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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class DashboardController extends AdminAppController
{
    public function index() {

        // $this->loadModel('Users');
        // $users = $this->paginate($this->Users);

        // echo "Prv" .print_r($users);exit;
  
        

        // $this->set(compact('Users'));
        
    }

    public function oldindex() {

        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('BuyerSellerUsers');

        $query = $this->RfqDetails->find();
        $query->select(['company_name' => 'BuyerSellerUsers.company_name', 'buyer_id' => 'BuyerSellerUsers.Id',
            'rfq_count' => $query->func()->count('RfqDetails.Id'),
            'reached' => $query->func()->count('RfqInquiries.Id'),
            'new_rfq' => $query->func()->sum('case when RfqDetails.status = 0 then 1 else 0 end'),
            'responded' => $query->func()->sum('case when RfqInquiries.inquiry = 1 then 1 else 0 end')
            ])
            ->contain(['BuyerSellerUsers', 'Products'])
            ->leftJoin(
                ['RfqInquiries' => 'rfq_inquiries'],
                ['RfqInquiries.rfq_id = RfqDetails.id'])
            ->group(['RfqDetails.buyer_seller_user_id'])
            ->order(['responded asc']);

        $countDashboard = $this->paginate($query);
        $this->set('countDashboard', $countDashboard);

        $rfqNonResponded = array();
        $queryNonResponded = $this->RfqDetails->find()
            ->select(['buyer_id' => 'RfqDetails.buyer_seller_user_id',
            'rfq_non_responded' => $query->func()->count('RfqDetails.Id')
            ])
            ->where('RfqDetails.Id not in (select rfq_id from rfq_inquiries where inquiry = 1)')
            ->group(['RfqDetails.buyer_seller_user_id'])->toList();

            foreach($queryNonResponded as $key => $val) {
                $rfqNonResponded[$val->buyer_id] = $val->rfq_non_responded;
            }
            
        $this->set('rfqNonResponded', $rfqNonResponded);

    }

    public function rfqList($buyerId = null, $responded = null) {

        $this->loadModel('RfqDetails');
        $this->loadModel('BuyerSellerUsers');

        $buyerSellerUser = $this->BuyerSellerUsers->get($buyerId, [
            'contain' => [],
        ]);


        $query = $this->RfqDetails->find()
            ->select(['RfqDetails.Id', 'RfqDetails.rfq_no', 'RfqDetails.part_name', 'RfqDetails.qty','Uoms.description','RfqDetails.status', 'RfqDetails.added_date','Products.name'])
            ->contain(['Products', 'Uoms'])
            ->where(['RfqDetails.buyer_seller_user_id' => $buyerId]);

        if(isset($responded) && !$responded) {
            $query = $this->RfqDetails->find()
            ->select(['RfqDetails.Id', 'RfqDetails.rfq_no', 'RfqDetails.part_name', 'RfqDetails.qty','Uoms.description','RfqDetails.status','RfqDetails.added_date','Products.name'])
            ->contain(['Products', 'Uoms'])
            ->where(['RfqDetails.buyer_seller_user_id' => $buyerId, 'RfqDetails.Id not in (select rfq_id from rfq_inquiries where inquiry = 1)']);
        }

        $rfqDetailsList = $this->paginate($query);


        
        $this->set(compact('buyerSellerUser'));
        $this->set('rfqList', $rfqDetailsList);

    }

    public function userAdd(){

        $response = array();
        $response['status'] = '0';
        $response['message'] = '';
        $this->autoRender = false;


        $this->loadModel('Users');
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $User = $this->Users->newEmptyEntity();
                $User = $this->Users->patchEntity($User, $this->request->getData());
                if ($this->Users->save($User)) {
                    $response['status'] = '1';
                    $response['message'] = 'Buyer Add successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = '0';
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);

    }


    public function userView(){

        $response = array();
        $response['status'] = '0';
        $response['message'] = '';
        $this->autoRender = false;


        $this->loadModel('Users');

       // $session = $this->getRequest()->getSession();

       
        $data = $this->Users->find('all');

        if ($data->count() > 0) {
            // $response['status'] = 'success';
            $response = $data;
        } else {
            // $response['status'] = 'fail';
            $response = [];
        }
        echo json_encode($response);

    }
}
