<?php
declare(strict_types=1);

namespace App\Controller\Buyer;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Http\Client;

/**
 * VendorMaterial Controller
 *
 * @property \App\Model\Table\VendorMaterialTable $VendorMaterial
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorMaterialController extends BuyerAppController
{
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        // $this->loadModel('VendorMaterial');
        // $vendorMaterial = $this->paginate($this->VendorMaterial->find('all'));
    
        // $this->set(compact('vendorMaterial'));
    }

    public function getvendormaterial()
    {
        $response = ['status'=>0, 'message'=>'', 'data'=>''];
        $session = $this->getRequest()->getSession();
        $userId =  $session->read('id');

        $this->loadModel('VendorMaterial');
        $vendorMaterial = $this->VendorMaterial->find('all')->order(['status' => 'ASC']);
        $response = ['status'=>1, 'message'=>'success', 'data'=>$vendorMaterial];
        echo json_encode($response);exit;
    }

    public function postvendormaterial($id=null, $buyer_material_code=null)
    {
        $response = ['status'=>0, 'message'=>'', 'data'=>''];
        $session = $this->getRequest()->getSession();
        $userId =  $session->read('id');
        $this->loadModel('VendorMaterial');

        // $data = $this->request->getData();
        $vendormat = $this->VendorMaterial->get($id);
        // echo '<pre>'; print_r($buyer_material_code); exit;
        $vendormat->buyer_material_code = $buyer_material_code;
        $vendormat->status = 1;

        if ($this->VendorMaterial->save($vendormat)) {
            $response = ['status'=>1, 'message'=>'success', 'data'=>$vendormat];
        }
        echo json_encode($response);exit;
    }
}
