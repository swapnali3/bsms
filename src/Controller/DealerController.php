<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DealerController extends AppController
{

    public function login() {
        $flash = [];
        $this->loadModel('BuyerSellerUsers');
        $this->loadModel('Products');

        $products = $this->Products->find('list')->toArray();
        $this->set(compact('products'));
        $session = $this->getRequest()->getSession();
        if($session->read('user.id')) { $this->redirect(array('action' => 'dashboard')); }

        if($this->request->is('post')) {
            $result = $this->BuyerSellerUsers->find()
            ->where(['username' => $this->request->getData('username'),
                'password' => md5($this->request->getData('password'))])
                ->limit(1);
                $result = $result->toArray();
            if($result) {
                $session = $this->getRequest()->getSession();
                $session->write('user.username', $result[0]->username);
                $session->write('user.id', $result[0]->id);
                $session->write('user.user_type', $result[0]->user_type);
                $session->write('user.details', $result[0]);
                $this->redirect(array('controller' => 'dealer', 'action' => 'dashboard'));
            } else { $flash = ['type'=>'error', 'msg'=>'Invalid Login details']; }
        }
        $this->set('flash', $flash);
    }

    public function logout() {
        $session = $this->getRequest()->getSession();
        $session->destroy();
        $flash = ['type'=>'success', 'msg'=>'Logged Out Successfully'];
        $this->set('flash', $flash);
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    public function registration()
    {
        $flash = [];
        $this->loadModel('BuyerSellerUsers');
        $buyerSellerUser = $this->BuyerSellerUsers->newEmptyEntity();

        $this->loadModel('Products');
        $products = $this->Products->find('list')->toArray();

        if ($this->request->is('post')) {
            //print_r($this->request->getData()); exit;
            $data = $this->request->getData();
            $data['added_date'] = date('y-m-d H:i:s');
            $data['password'] = md5($data['password']);
            $buyerSellerUser = $this->BuyerSellerUsers->patchEntity($buyerSellerUser, $data);
            //print_r($buyerSellerUser); exit;
            if ($this->BuyerSellerUsers->save($buyerSellerUser)) {
                $flash = ['type'=>'success', 'msg'=>'User Saved Successfully'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'confirmation']);
            }
            $flash = ['type'=>'error', 'msg'=>'User Saved Failed. Try Again'];
        }
        $this->set('flash', $flash);
        $this->set(compact('buyerSellerUser', 'products'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function confirmation()
    {
        
    }

    
    public function dashboard() 
    {
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        if($session->read('user.user_type') == 'seller') {
            $this->redirect(['action' => 'productlist']);
        }

        $conn = ConnectionManager::get('default');
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');
        $this->loadModel('Products');

        /*$rfqDetails = $conn->execute("select rfq_details.id,rfq_details.rfq_no, products.name as category, rfq_details.added_date, rfq_inquiries.reach, rfq_inquiries.respond
 from rfq_details 
 join products on (products.id = rfq_details.product_id)
 left join (select rfq_id, count(seller_id) reach, count(inquiry) respond FROM rfq_inquiries group by rfq_inquiries.rfq_id) rfq_inquiries on (rfq_inquiries.rfq_id = rfq_details.id)
 where rfq_details.buyer_seller_user_id=" .$session->read('user.id'));
*/
 $query = $this->RfqDetails->find()
            ->select(['RfqDetails.id','RfqDetails.rfq_no','Products.name','RfqDetails.added_date', 'RfqInquiries.reach', 'RfqInquiries.respond'])
            ->contain(['Products'])
            ->leftJoin(
                ['RfqInquiries' => '(select rfq_id, count(seller_id) reach, count(inquiry) respond FROM rfq_inquiries group by rfq_inquiries.rfq_id)'],
                ['RfqInquiries.rfq_id = RfqDetails.id'])
            ->where(['RfqDetails.buyer_seller_user_id' => $session->read('user.id')]);

    $rfqDetails = $this->paginate($query);

    //print_r($query); exit;
        $rfqsummary = $conn->execute("SELECT rfq_id, U.company_name, rate, created_date FROM rfq_inquiries RI join buyer_seller_users U on (U.id = RI.seller_id) WHERE rate = ( SELECT MIN( RI2.rate ) FROM rfq_inquiries RI2 WHERE RI.rfq_id = RI2.rfq_id ) ORDER BY rfq_id");
 
 

    // Getting paginated result based on page #
    
    $this->set('rfqDetails', $rfqDetails);
    $this->set('rfqsummary', $rfqsummary);
        
    }

    public function view($id = null)
    {

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqInquiries');

        $rfqDetails = $this->RfqDetails->get($id, [
            'contain' => ['Products', 'Uoms'],
        ]);
        $attrParams = json_decode($rfqDetails->uploaded_files, true);

        $session = $this->getRequest()->getSession();
        $userType = $session->read('user.user_type');
        if($userType == 'seller') {
            $RfqInquiry = $this->RfqInquiries->newEmptyEntity();
            $data = array();
            $data['rfq_id'] = $id;
            $data['seller_id'] = $session->read('user.id');
            $RfqInquiry = $this->RfqInquiries->patchEntity($RfqInquiry, $data);
            $results = $this->RfqInquiries->save($RfqInquiry);
        }  else if($userType == 'buyer')  {
                $results = $this->RfqInquiries->find()->where(['rfq_id' => $id])->contain('BuyerSellerUsers')->toArray();

                /*$data = array();
                foreach($results as &$result) {
                    $t = array();
                    if(isset($result['inquiry_data']) && $result['inquiry_data'] != null ) {
                        $tmp = json_decode($result['inquiry_data'], true);
                        foreach($tmp as $k => $v) {
                            $t[$k] = $v;
                        }
                    }
                    $t['inquiry_date'] = $result['created_date'];
                    $t['company'] = $result->buyer_seller_user->company_name;

                    $data[] = $t;
                } */
                //echo '<pre>'; print_r($results); exit;
        }  

        $this->set(compact('rfqDetails', 'attrParams', 'userType', 'results'));
    }

    public function addproduct($type, $sellerId = '') {
        $flash = [];
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $this->loadModel("Products");
        $this->loadModel("Uoms");

        $products = $this->Products->find('list')->toArray();
        $uoms = $this->Uoms->find('list')->toArray();
        


        if(isset($sellerId) && !empty($sellerId)) {
            $this->loadModel('BuyerSellerUsers');

            $sellerProducts = $this->BuyerSellerUsers->find()
            ->select(['product_deals'])
            ->where(['id' => $sellerId])
                ->limit(1);

                $sellerProducts = $sellerProducts->toArray();
                $sellerProducts = explode(',', $sellerProducts[0]->product_deals);

                $tempProducts = array();
                foreach($products as $k => $v) {
                    if(in_array($k, $sellerProducts)) {
                        $tempProducts[$k] = $v;
                    }
                }
                $products = $tempProducts;
            
        }

        $this->set('seller_id', $sellerId);

        $this->set(compact('products', 'uoms'));

        if ($this->request->is('post')) {
            $session = $this->getRequest()->getSession();
            $userId = $session->read('user.id');
            $this->loadModel("RfqDetails");
            
            //$RfqDetail = $this->RfqDetails->newEmptyEntity();
            $request = $this->request->getData();
            $data = array();

            $conn = ConnectionManager::get('default');
            $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=$userId");

            foreach ($maxrfq as $maxid) {
                $maxRfqId = $maxid['maxrfq'] + 1; 
            }   

            //echo $maxRfqId;
            //echo '<pre>'; print_r($request); exit;


            if(empty($request['seller_id'])) {
                unset($request['seller_id']);
            }

            foreach ($request as $key => $row) {
                $record = array();
                $productImages = $row["files"];
                $uploads["files"] = array();
                // file uploaded
                foreach($productImages as $productImage) {
                    $fileName = time().'_'.$productImage->getClientFilename();
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $uploads["files"][] = "uploads/" . $fileName;
                    }
                }

                $record['buyer_seller_user_id'] = $userId;
                $record['rfq_no'] = $maxRfqId;
                $record['product_id'] = $row['product_id'];
                $record['product_sub_category_id'] = $row['product_sub_category_id'];
                $record['part_name'] = $row['part_name'];
                $record['qty'] = $row['qty'];
                $record['uom_code'] = $row['uom_code'];
                $record['remarks'] = $row['remarks'];
                $record['make'] = $row['make'];
                $record['added_date'] = date('Y-m-d H:i:s');
                $record['uploaded_files'] = json_encode($uploads["files"]);

                $data[] = $record;

            }

            $RfqDetail = $this->RfqDetails->newEntities($data);
            if($this->RfqDetails->saveMany($RfqDetail)) {

                $this->loadModel('RfqForSellers');
                $rfqSellers = array();
                $rfqSellers['rfq_no']  = $maxRfqId;
                $rfqSellers['seller_id']  = $request['seller_id'];
                $rfqSeller = $this->RfqForSellers->newEmptyEntity();
                $rfqSeller = $this->RfqForSellers->patchEntity($rfqSeller, $rfqSellers);
                $this->RfqForSellers->save($rfqSeller);
                $flash = ['type'=>'success', 'msg'=>'Product Saved Successfully'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'dashboard']);
            }
            $flash = ['type'=>'error', 'msg'=>'Product Saved Failed. Try Again'];
            $this->set('flash', $flash);
        }
    }

    public function copy($id = null)
    {
        $flash = [];
        $this->loadModel("RfqDetails");
        $rfqDetailExisting = $this->RfqDetails->get($id)->toArray();

        unset($rfqDetailExisting['id']);
        unset($rfqDetailExisting['added_date']);
        unset($rfqDetailExisting['updated_date']);
        
        $conn = ConnectionManager::get('default');
        $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=".$rfqDetailExisting['buyer_seller_user_id']);

        foreach ($maxrfq as $maxid) {
            $maxRfqId = $maxid['maxrfq'] + 1; 
        }

        $rfqDetailExisting['rfq_no'] = $maxRfqId;

        $rfqDetail = $this->RfqDetails->newEmptyEntity();
        
        $rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $rfqDetailExisting);
        if ($this->RfqDetails->save($rfqDetail)) {
            $flash = ['type'=>'success', 'msg'=>'The rfq successfully copied - RFQ NO:-' .$maxRfqId];
            $this->set('flash', $flash);
            return $this->redirect(['action' => 'dashboard']);
        }
        $flash = ['type'=>'error', 'msg'=>'RFQ Saving Failed. Try Again'];
        $this->set('flash', $flash);
    }

    public function copyPreview($id = null)
    {
        $flash = [];
        $this->loadModel("RfqDetails");
        $rfqDetail = $this->RfqDetails->get($id, [
            'contain' => [],
        ]);
        
        $products = $this->RfqDetails->Products->find('list')->all();
        $uoms = $this->RfqDetails->Uoms->find('list')->all();
        $this->set(compact('rfqDetail', 'products', 'uoms'));
        $this->set('reference_rfq_id', $id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->getRequest()->getSession();
            $userId = $session->read('user.id');
            $request = $this->request->getData();
            $request['uploaded_files'] = $rfqDetail->uploaded_files;
            $request['added_date'] = date('Y-m-d H:i:s');

            //echo '<pre>' ; print_r($request); exit;
            
            $conn = ConnectionManager::get('default');
            $maxrfq = $conn->execute("SELECT MAX(rfq_no) maxrfq FROM rfq_details RD WHERE RD.buyer_seller_user_id=$userId");

            foreach ($maxrfq as $maxid) {
                $maxRfqId = $maxid['maxrfq'] + 1; 
            }   

            $request['rfq_no'] = $maxRfqId;

            $rfqDetail = $this->RfqDetails->newEmptyEntity();
        
        $rfqDetail = $this->RfqDetails->patchEntity($rfqDetail, $request);
        if ($this->RfqDetails->save($rfqDetail)) {
            $flash = ['type'=>'success', 'msg'=>'The rfq successfully copied - RFQ NO:-' .$maxRfqId];
            $this->set('flash', $flash);
            return $this->redirect(['action' => 'dashboard']);
        }
        $flash = ['type'=>'error', 'msg'=>'The rfq detail could not be saved. Please, try again.'];
        $this->set('flash', $flash);
        }
    }

    public function productlist() {
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }
        $this->loadModel('RfqDetails');
        $this->loadModel('RfqForSellers');

        
        $userType = $session->read('user.user_type');
        $productDeals = $session->read('user.details.product_deals');

        $rfqDetails = array();
        if($userType == 'seller') {
            $rfqDetails = $this->RfqDetails->find()->where(['RfqDetails.status' => 1, 'RfqDetails.rfq_no NOT IN (select rfq_no from rfq_for_sellers where seller_id !='  .$session->read("user.id").')' ])->contain(['Products' => function ($q) use ($productDeals)  {
                return $q->where(['Products.id in ' => $productDeals]);

            }, 'Uoms'])->toList();

            //echo '<pre>';print_r($rfqDetails); exit;
            foreach ($rfqDetails as &$rfqDetail) {
                $files = json_decode($rfqDetail['uploaded_files'], true);
                foreach($files as $file) {
                    $rfqDetail['image'] = $file;
                    break;
                }
            }
            //echo '<pre>'; print_r($rfqDetails);
        }


        $this->set(compact('rfqDetails'));
    }

    public function inquiry($id=null) {
        $flash = [];
        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }
        $session = $this->getRequest()->getSession();
        $userType = $session->read('user.user_type');
        if($userType == 'seller') {
            if($this->request->is('post')) {
                //print_r($this->request->getData()); exit;
            
                $this->loadModel('RfqInquiries');
                $request = array();
                $request['rfq_id'] = $id;
                $request['seller_id'] = $session->read('user.id');
                $RfqInquiry = $this->RfqInquiries->find()->where($request)->first();
                $RfqInquiry->inquiry = 1;
                $RfqInquiry->qty = $this->request->getData('qty');
                $RfqInquiry->rate = $this->request->getData('rate');
                $RfqInquiry->delivery_date = $this->request->getData('delivery_date');
                
                if($this->RfqInquiries->save($RfqInquiry)) {
                    $flash = ['type'=>'success', 'msg'=>'Inquiry send to Buyer'];
                    $this->set('flash', $flash);
                    return $this->redirect(['action' => 'productlist']);
                }
            }
        }

        $this->set('userType', $userType);
    }

    public function search(){

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $request = $this->request->getData();  
        $total = 0;
        $searchData = array();

        if ($this->request->is('post') && strlen($request['q']) ) { 
            $conn = ConnectionManager::get('default');
            if(isset($request['type']) && $request['type'] == 'seller') {
                $searchData = $conn->execute("select U.*, P.name product_name
                from buyer_seller_users U
                INNER join products P on (P.id in (U.product_deals))
                where U.user_type = 'seller'
                and U.company_name like '%$request[q]%'");
            } else {
                $searchData = $conn->execute("select U.*, P.name product_name
                from buyer_seller_users U
                INNER join products P on (P.id in (U.product_deals))
                where U.user_type = 'seller'
                and P.name like '%$request[q]%'");
            }
            
            $total = count($searchData);
        }

        $this->set('total', $total);
        $this->set('q', $request['q']);
        $this->set('data', $searchData);
        $this->set('type', $request['type']);

    }


    public function regionalsearch(){

        $session = $this->getRequest()->getSession();
        if(!$session->check('user.id')) {
            return $this->redirect(array('action' => 'login'));
        }

        $request = $this->request->getData();  
        $total = 0;
        $searchData = array();

        
        $userDetails = $session->read('user.details');
        $conn = ConnectionManager::get('default');
        $searchData = $conn->execute("select U.*, P.name product_name
        from buyer_seller_users U
        INNER join products P on (P.id in (U.product_deals))
        where U.user_type = 'seller'
        and U.cities = '$userDetails->cities'"
        );
        
        $total = count($searchData);

        $this->set('total', $total);
        $this->set('data', $searchData);

    }
    

}
