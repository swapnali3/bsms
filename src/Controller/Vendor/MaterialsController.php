<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Http\Client;

/**
 * VendorMaterial Controller
 *
 * @property \App\Model\Table\VendorMaterialTable $VendorMaterial
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaterialsController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $this->loadModel('Materials');
        $this->loadModel('VendorTypes');

        $materials = $this->Materials->find('all')->where(['sap_vendor_code="'.$session->read('vendor_code').'"' ])->toArray();

        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();
        $this->set(compact('materials', 'segment', 'vendortype'));
    }

    public function materiallist(){
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('vendor_code');
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $response = array('status'=>0, 'message'=>'fail', 'data'=>'');

        $conditions = " where vendor_temps.sap_vendor_code='".$vendorId."' ";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->request->getData();
            if(isset($request['vendor'])) {
                $search = '';
                foreach ($request['vendor'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " and vendor_temps.sap_vendor_code in (".$search.")";
            }
            if(isset($request['material'])) {
                $search = '';
                foreach ($request['material'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                if(!isset($request['vendor'])){ $conditions .= " and materials.id in (".$search.")"; }
                else{ $conditions .= " and materials.id in (".$search.")"; }
            }
            if(isset($request['vendortype'])) {
                $search = '';
                foreach ($request['vendortype'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                if(!isset($request['material']) and !isset($request['vendor'])){ $conditions .= " and materials.type in (".$search.")"; }
                else{ $conditions .= " and materials.type in (".$search.")"; }
            }
            if(isset($request['segment'])) {
                $search = '';
                foreach ($request['segment'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype'])){ $conditions .= " and materials.segment in (".$search.")"; }
                else{ $conditions .= " and materials.segment in (".$search.")"; }
            }
            $conn = ConnectionManager::get('default');
        }
        
        $conn = ConnectionManager::get('default');
        $material = $conn->execute("select
        vendor_temps.id as 'v_id', vendor_temps.sap_vendor_code as 'v_code', vendor_temps.name as 'v_name',
        materials.id as 'mt_id', materials.code as 'mt_code', materials.description as 'mt_description', materials.minimum_stock as 'mt_ms', materials.uom as 'mt_uom', IFNULL(materials.segment, '') as 'mt_segment',
        materials.type as 'vt_id' from materials
        left join vendor_temps on materials.sap_vendor_code = vendor_temps.sap_vendor_code". $conditions);
        // echo '<pre>'; print_r($request);print_r($material);
        $materialist = $material->fetchAll('assoc');

        $results = [];
        foreach ($materialist as $mat) {
            $tmp = [];
            $tmp[] = $mat['v_code'];
            $tmp[] = $mat['mt_code'];
            $tmp[] = $mat['mt_description'];
            $tmp[] = $mat['vt_id'];
            $tmp[] = $mat['mt_segment'];
            $tmp[] = $mat['mt_ms'];
            $tmp[] = $mat['mt_uom'];
            $results[] = $tmp;
        }

        $response = array('status'=>1, 'message'=>'success', 'data'=>$results);
        echo json_encode($response); exit;
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorMaterial = $this->VendorMaterial->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('vendorMaterial'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("VendorTemps");
        $this->loadModel("VendorMaterial");
        $this->loadModel('Notifications');
        $this->loadModel('Uoms');
        $this->loadModel("Users");

        // $vendorMaterial = $this->VendorMaterial->newEmptyEntity();
        $vendorMaterial = [];
        $vendorView = [];
        $flash = [];
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $sapVendor = $session->read('vendor_code');
        
        // Retrieve the buyer_id based on sapVendor
        $buyer = $this->VendorTemps->find()
            ->select(['buyer_id'])
            ->where(['sap_vendor_code' => $sapVendor])
            ->first();

        if ($this->request->is('post')) {
            // Import File To array
            $importFile = $this->request->getData('vendor_code');
            if (isset($_FILES['vendor_code']) && $_FILES['vendor_code']['name'] != "" && $importFile !== null && isset($_FILES['vendor_code']['name'])) {
                $destination = "uploads/";
                $filename = $_FILES['vendor_code']['name'];
                $path = $destination . $filename;
                move_uploaded_file($_FILES['vendor_code']['tmp_name'], $path);
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($path);
                $worksheet = $spreadsheet->getActiveSheet();

                foreach ($worksheet->getRowIterator(2) as $row) {
                    $minivendor = [];
                    foreach ($row->getCellIterator() as $cell) {
                        $cellval = $cell->getValue();
                        if (!empty($cellval)) { $minivendor[] = $cellval; }
                    }
                    // $finduom = $this->Uoms->exists(['Uoms.code' => $minivendor[3]]);
                    $uom_code = $this->paginate($this->Uoms->find('all', ['conditions' => ['Uoms.code' => $minivendor["3"]]]))->first();
                    
                    if ($uom_code->id > 0) { $minivendor[4] = $minivendor[3]; $minivendor[3] = $uom_code->id; }
                    else{ $minivendor[3] = 0;$minivendor[4] = 0; }
                    
                    array_push($vendorMaterial, $minivendor);
                }
                // print_r($vendorMaterial); exit;
            }

          if(empty($minivendor)){
            $minivendor = [];
            $res = $this->request->getData();
            if ($res["vendor_material_code"] && $res["description"] && $res["minimum_stock"] && $res["uom"]) {
                array_push($minivendor, $res["vendor_material_code"]);
                array_push($minivendor, $res["description"]);
                array_push($minivendor, $res["minimum_stock"]);
                array_push($minivendor, $res["uom"]);
                $uom_code = $this->paginate($this->Uoms->find('all', ['conditions' => ['Uoms.id' => $res["uom"]]]))->first();
                if ($uom_code->id > 0) {
                     $minivendor[4] = $uom_code->code; }
                array_push($vendorMaterial, $minivendor);
            }
        }
           
          //  echo "<pre>";
            foreach ($vendorMaterial as $vendorMaterials) {
                if (!empty($vendorMaterials)) {

                    $vendorData = array();
                    $vendorData['vendor_id'] = $vendorId;
                    $vendorData['vendor_material_code'] = $vendorMaterials[0];
                    $vendorData['description'] = $vendorMaterials[1];
                    $vendorData['minimum_stock'] = $vendorMaterials[2];
                    $vendorData['uom'] = $vendorMaterials[3];
                 
                    $vendorData['status'] = 1;

                    //print_r($vendorData);exit;
                 
                    $vendorMaterial = $this->VendorMaterial->newEmptyEntity();
                    $vendorMaterial = $this->VendorMaterial->patchEntity($vendorMaterial, $vendorData);
                    //  print_r($vendorMaterial); exit;
                    if ($this->VendorMaterial->save($vendorMaterial)) {
                     
                        if ($this->Notifications->exists(['Notifications.user_id' => $buyer->buyer_id, 'Notifications.notification_type' => 'vendor_material'])) {
                            $this->Notifications->updateAll(
                                ['message_count' => $this->Notifications->query()->newExpr('message_count + 1')],
                                ['user_id' => $buyer->buyer_id, 'notification_type' => 'vendor_material']
                            );
                        } else {
                            $notification = $this->Notifications->newEmptyEntity();
                            $notification->user_id = $buyer->buyer_id;
                            $notification->notification_type = 'vendor_material';
                            $notification->message_count = 1;
                            $this->Notifications->save($notification);
                        }
                      
                        array_push($vendorView, ['status' => true, 'msg' => "The vendor material has been saved.", 'data' => $vendorMaterials]);
                    } else {
                        array_push($vendorView, ['status' => false, 'msg' => "The vendor material could not be saved. Please, try again.", 'data' => $vendorMaterials]);
                    }
                }
            }

            $this->set('vendorMaterialData', $vendorView);
        }

        $uom = $this->Uoms->find('list', ['keyField' => 'id', 'valueField' => 'code'])->all();

        $this->set(compact('vendorMaterial', 'uom'));
    }



    /**
     * Edit method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Uoms');
        $flash = [];
        $vendorMaterial = $this->VendorMaterial->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorMaterial = $this->VendorMaterial->patchEntity($vendorMaterial, $this->request->getData());
            if ($this->VendorMaterial->save($vendorMaterial)) {
                $flash = ['type'=>'success', 'msg'=>'The vendor material has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The vendor material has been saved'];
            $this->set('flash', $flash);
        }

        $uom = $this->Uoms->find('list', ['keyField' => 'id', 'valueField' => 'code'])->all();

        $this->set(compact('vendorMaterial', 'uom'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Material id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $vendorMaterial = $this->VendorMaterial->get($id);
        if ($this->VendorMaterial->delete($vendorMaterial)) {
            $flash = ['type'=>'success', 'msg'=>'The vendor material has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The vendor material could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }
}
