<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use App\Model\Table\VendorMaterialTable;
use Cake\Datasource\ConnectionManager;


/**
 * Stockupload Controller
 *
 * @property \App\Model\Table\StockuploadTable $Stockupload
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockUploadsController extends VendorAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    // public function index()
    // {

    //     $session = $this->getRequest()->getSession();
    //     $vendorId = $session->read('vendor_id');
    //     $this->loadModel('AsnFooters');

    //     $stockupload = $this->StockUploads->find('all')->contain(['Materials', 'VendorFactories'])
    //     ->where(['StockUploads.sap_vendor_code' => $session->read('vendor_code')])
    //     ->toArray();

    //     $intransitMaterials = $this->AsnFooters->find('all')
    //     ->select(['vendor_factory_id' => 'VendorFactories.id', 'material' => 'PoFooters.material', 'qty' => 'sum(AsnFooters.qty)'])
    //     ->contain(['AsnHeaders', 'AsnHeaders.VendorFactories','PoFooters', 'PoFooters.PoHeaders'])
    //     ->where(['AsnHeaders.status in ' => ['1','2'], 'PoHeaders.sap_vendor_code' => $session->read('vendor_code')])
    //     ->group(['VendorFactories.id','PoFooters.material'])->toArray();

    //     foreach($stockupload as &$stock) {
    //         foreach($intransitMaterials as $asn) {
    //             if($stock->vendor_factory_id == $asn->vendor_factory_id && $stock->material->code == $asn->material) {
    //                 $stock->asn_stock = $asn->qty;
    //                 $stock->current_stock = ($stock->opening_stock + $stock->production_stock) - $stock->asn_stock;
    //             }
    //         }
    //     }
        
    //     $this->set(compact('stockupload'));
    // }

    public function index()
    {
        $session = $this->getRequest()->getSession();
        $this->loadModel('Materials');
        $this->loadModel('VendorTypes');
        $materials = $this->Materials->find('all')->where(['Materials.sap_vendor_code' => $session->read('vendor_code')])->toArray();
        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();
        $this->set(compact('materials', 'segment', 'vendortype'));
    }

    public function stocklist(){
        $this->autoRender = false;
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('vendor_code');
        $response = array('status'=>0, 'message'=>'fail', 'data'=>'');

        $conditions = " where 1=1 and vendor_temps.sap_vendor_code='".$vendorId."'";
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
        }
        // echo '<pre>'; print_r($conditions);exit;
        $conn = ConnectionManager::get('default');
        $material = $conn->execute("SELECT
        vendor_temps.sap_vendor_code as 'v_code', vendor_factories.factory_code as 'f_code', '-' as 'po_no',
        materials.type as 'vt_id', materials.segment as 'mt_segment', '-' as 'line_item',
        materials.code as 'mt_code', materials.description as 'mt_description',
        stock_uploads.opening_stock, materials.uom as 'mt_uom' FROM stock_uploads
        left join vendor_temps on vendor_temps.sap_vendor_code = stock_uploads.sap_vendor_code
        left join materials on materials.id = stock_uploads.material_id
        left join vendor_factories on vendor_factories.id = stock_uploads.vendor_factory_id". $conditions);
        
        $materialist = $material->fetchAll('assoc');

        $results = [];
        foreach ($materialist as $mat) {
            $tmp = [];
            $tmp[] = $mat['v_code'];
            $tmp[] = $mat['f_code'];
            $tmp[] = $mat['po_no'];
            $tmp[] = $mat['vt_id'];
            $tmp[] = $mat['mt_segment'];
            $tmp[] = $mat['line_item'];
            $tmp[] = $mat['mt_code'];
            $tmp[] = $mat['mt_description'];
            $tmp[] = $mat['opening_stock'];
            $tmp[] = $mat['mt_uom'];
            $results[] = $tmp;
        }

        $response = array('status'=>1, 'message'=>'success', 'data'=>$results);
        echo json_encode($response); exit;
    }

    /**
     * View method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockupload = $this->StockUploads->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('stockupload'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('Uoms');

        $flash = [];
        $this->loadModel("Materials");
        $this->loadModel("StockUploads");
        $this->loadModel("VendorFactories");
        $stockupload = $this->StockUploads->newEmptyEntity();

        $stockUpload = [];
        $stockView = [];
        $flash = [];
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('vendor_id');
        $sapVendor = $session->read('vendor_code');

        if ($this->request->is('post')) {
            $minivendor = [];
            $res = $this->request->getData();
            $res['sap_vendor_code'] = $sapVendor;
            $res['current_stock'] = $res['opening_stock'];
            $res['asn_stock'] = 0;

            if($this->StockUploads->exists(['sap_vendor_code' => $sapVendor, 'vendor_factory_id' => $res['vendor_factory_id'], 'material_id' => $res['material_id']])) {
                $flash = ['type' => 'error', 'msg' => 'Stock for this material exists'];
            } else {
                $columns = array_keys($res);
                $upsertQuery = $this->StockUploads->query();
                $upsertQuery->insert($columns);
                $upsertQuery->values($res);
                if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE sap_vendor_code=VALUES(sap_vendor_code), vendor_factory_id=VALUES(vendor_factory_id), `material_id`=VALUES(`material_id`),`opening_stock`=VALUES(`opening_stock`)')
                    ->execute()) {
                    $flash = ['type' => 'success', 'msg' => 'The stockupload has been saved'];
                    return $this->redirect(['action' => 'index']);
                    
                } else {
                    $flash = ['type' => 'error', 'msg' => 'The stockupload could not be saved. Please, try again'];
                }
            }

            $this->set('flash', $flash);
        }

        //var_dump($sapVendor);
        $vendor_mateial = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'description'])->where(['sap_vendor_code' => $sapVendor])->all();

        //echo '<pre>';  print_r($vendor_mateial); exit;
        $vendor_factory = $this->VendorFactories->find('list', ['keyField' => 'id', 'valueField' => 'factory_code'])->where(['vendor_temp_id' => $vendorId])->all();
        

        //echo '<pre>'; print_r($this->VendorFactories); exit;

        $this->set(compact('stockupload', 'vendor_mateial', 'vendor_factory'));
    }


    public function material($id = null)
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';
        $this->autoRender = false;

        if ($this->request->is(['patch', 'get', 'put'])) {
            $this->loadModel("Materials");
            $vendorMaterial = $this->Materials->find('all')
                ->select([
                    'id', 'sap_vendor_code', 'code', 'description', 'minimum_stock',
                    'uom'
                ])
                ->where(['Materials.id' => $id])
                ->first();

            $response['status'] = 1;
            $response['message'] = 'success';
            $response['data'] = $vendorMaterial;
        } else {
            $response['message'] = 'error';
        }

        echo json_encode($response);
    }



    /**
     * Edit method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel("Materials");
        $stockupload = $this->StockUploads->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockupload = $this->StockUploads->patchEntity($stockupload, $this->request->getData());
            if ($this->StockUploads->save($stockupload)) {
                $flash = ['type' => 'success', 'msg' => 'The stockupload has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type' => 'success', 'msg' => 'The stockupload could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $session = $this->getRequest()->getSession();
        $sapVendor = $session->read('vendor_code');
      //  print_r($sapVendor);

        $vendor_mateial = $this->Materials->find('list', ['conditions' => ['sap_vendor_code' => $sapVendor],'keyField' => 'id', 'valueField' => 'code'])->all();
    
        $this->set(compact('stockupload', 'vendor_mateial'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stockupload id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $stockupload = $this->Stockupload->get($id);
        if ($this->Stockupload->delete($stockupload)) {
            $flash = ['type' => 'success', 'msg' => 'The stockupload has been deleted'];
        } else {
            $flash = ['type' => 'success', 'msg' => 'The stockupload could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }

    public function upload()
    {
        $response['status'] = 0;
        $response['message'] = 'upload fail';
        $this->autoRender = false;
       
        $session = $this->getRequest()->getSession();

        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            try {
            

                $uploadData = [];
                $stockData =[];
                if (isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != "" && isset($_FILES['upload_file']['name'])) {

                    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['upload_file']['tmp_name']);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                    $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $highestRow = $worksheet->getHighestRow(); 
                    $highestColumn = $worksheet->getHighestColumn();
                    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
                    $this->loadModel("Materials");
                    $this->loadModel("VendorFactories");

                    $tmp = [];
                    $datas = [];
                    

                    // echo "<pre>";
                    for ($row = 2; $row <= $highestRow; $row++) {
                        $facError = false;
                        $matError = false;
                        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                            
                            $tmp['sap_vendor_code'] = $session->read('vendor_code');
                            
                            $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                            if($col == 1) {
                                $factory = $this->VendorFactories->find('list')
                                ->select(['id'])
                                ->where(['factory_code' => $value, 'vendor_temp_id' => $session->read('vendor_id')])
                                ->first();

                                //echo '<pre>';  print_r($factory); exit;
                                $tmp['vendor_factory_id'] = $factory ? $factory : null;
                                $datas['factory_code'] = $value;
                                if(!$factory) {
                                    $facError = true;
                                }
                            } else if ($col ==2) {
                                $materials = $this->Materials->find('all')
                                ->select(['id', 'code'])
                                ->where(['code IN' => $value])->first();
    
                                $tmp['material_id'] = $materials['id'] ? $materials['id'] : null;
                                $datas['material'] = $value;
                                if(!$tmp['material_id']) {
                                    $matError = true;
                                    $datas['error'] = 'Invalid material';
                                }
                            }
                            else if($col == 3) {
                            
                                $datas['description'] = $value;
                            }
                            else if($col == 4) {
                                $tmp['opening_stock'] = $value;
                                $datas['opening_stock'] = $value;
                                $tmp['current_stock'] = $value;
                            }
                            else if($col == 5) {
                                $datas['uom'] = $value;
                            }
                            
                        }

                        $datas['error'] = '';
                        if($facError) {
                            $datas['error'] = 'Invalid factory code';
                        } else if($matError) {
                            $datas['error'] = 'Invalid Material';
                        }

                        if($this->StockUploads->exists(['sap_vendor_code' => $tmp['sap_vendor_code'], 'vendor_factory_id' => $tmp['vendor_factory_id'], 'material_id' => $tmp['material_id']])) {
                            $datas['error'] = "Stock exists";
                        }

                        $stockData[] = $datas;
                        $tmp['asn_stock'] = 0;
                        if(empty($datas['error'])) {
                            $uploadData[] = $tmp;   
                        }
                    }

      
                    if(!empty($uploadData)) {
                        $columns = array_keys($uploadData[0]);
                        $upsertQuery = $this->StockUploads->query();
                        $upsertQuery->insert($columns);
                        foreach ($uploadData as $data) {
                            $upsertQuery->values($data);
                        }
                        $upsertQuery->epilog('ON DUPLICATE KEY UPDATE sap_vendor_code=VALUES(sap_vendor_code), vendor_factory_id=VALUES(vendor_factory_id), `material_id`=VALUES(`material_id`),`opening_stock`=VALUES(`opening_stock`)')
                            ->execute();
                    }


                        $response['status'] = 1;
                        $response['data'] = $stockData;
                        $response['message'] = 'uploaded Successfully';
                } else {
                    $response['status'] = 0;
                    $response['message'] = 'file not uploaded';
                }

                
            } catch (\PDOException $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response); exit;
    }

    function transfer() {
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('vendor_id');
        $sapVendor = $session->read('vendor_code');
        $this->loadModel('VendorFactories');

        $vendor_factory_code = $this->VendorFactories->find('list', ['keyField' => 'id', 'valueField' => 'factory_code'])->where(['vendor_temp_id' => $vendorId])->all();

        $this->set(compact('vendor_factory_code'));
        
    }

    function saveTransfer() {
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';
        $this->autoRender = false;
        
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('vendor_id');
        $sapVendor = $session->read('vendor_code');

        if ($this->request->is(['post'])) {
            $this->loadModel('MaterialTransferLogs');

            $data = $this->request->getData();

            try {
                $this->StockUploads->getConnection()->begin();
                //$this->Users->saveOrFail($userEntity, ['atomic' => false]);
                $fromMaterial = [];
                $fromMaterial['sap_vendor_code'] = $sapVendor;
                $fromMaterial['vendor_factory_id'] = $data['vendor_factory_id'];
                $fromMaterial['material_id'] = $data['from_material_id'];
                $fromMaterial['out_transfer_stock'] = $data['out_transfer_stock'] + $data['stock_qty'];

                
                $fMatInstance = $this->StockUploads->find()->where(['sap_vendor_code' => $sapVendor,
                 'vendor_factory_id' => $fromMaterial['vendor_factory_id'] , 'material_id' => $fromMaterial['material_id']])->first();
                $fMatInstance = $this->StockUploads->patchEntity($fMatInstance, $fromMaterial);
                $this->StockUploads->save($fMatInstance);
                

                $toMaterial = [];
                $toMaterial['sap_vendor_code'] = $sapVendor;
                $toMaterial['vendor_factory_id'] = $data['vendor_factory_id'];
                $toMaterial['material_id'] = $data['to_material_id'];
                $toMaterial['in_transfer_stock'] = $data['in_transfer_stock'] + $data['stock_qty'];

                $tMatInstance = $this->StockUploads->find()->where(['sap_vendor_code' => $sapVendor,
                 'vendor_factory_id' => $toMaterial['vendor_factory_id'] , 'material_id' => $toMaterial['material_id']])->first();
                $tMatInstance = $this->StockUploads->patchEntity($tMatInstance, $toMaterial);
                $this->StockUploads->save($tMatInstance);


                $logData = [];
                $logData['sap_vendor_code'] = $sapVendor;
                $logData['vendor_factory_code'] = $data['vendor_factory_code'];
                $logData['from_material'] = $data['from_material'];
                $logData['to_material'] = $data['to_material'];
                $logData['transfer_qty'] = $data['stock_qty'];

                $transLogInc = $this->MaterialTransferLogs->newEmptyEntity();
                $transLogInc = $this->MaterialTransferLogs->patchEntity($transLogInc, $logData);
                $this->MaterialTransferLogs->save($transLogInc);

                $this->StockUploads->getConnection()->commit();
            
            } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
                $this->Users->getConnection()->rollback();
            }


            $response['status'] = 1;
            $response['message'] = 'Stock successfully transfered!';
        } else {
            $response['message'] = 'Issue in stock transfer';
        }

        echo json_encode($response);
        
    }

    function transferLog() {
        $session = $this->getRequest()->getSession();
        // $this->loadModel('MaterialTransferLogs', 'Materials');
        // $logs = $this->MaterialTransferLogs->find('all')->contains('Materials')->where(['sap_vendor_code' => $session->read('vendor_code')])->toArray();

        $conditions = " where 1=1 AND material_transfer_logs.sap_vendor_code='".$session->read('vendor_code')."' ";
        if ($this->request->is(['post'])) {
            $request = $this->request->getData();
            if(isset($request['material'])) {
                $search = '';
                foreach ($request['material'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                $conditions .= " AND (
                    (material_transfer_logs.from_material in (".$search.") AND material_transfer_logs.to_material IS NOT NULL)
                    OR 
                    (material_transfer_logs.to_material in (".$search.") AND material_transfer_logs.from_material IS NOT NULL)
                )";
            }
            if(isset($request['from']) && !empty($request['from'])) {
                $search = $request['from'];
                $conditions .= " and material_transfer_logs.added_date>='".$search." 00:00:00'";
            }
            if(isset($request['to']) && !empty($request['to'])) {
                $search = $request['to'];
                $conditions .= " and material_transfer_logs.added_date<='".$search." 23:59:59'";
            }
        }

        $conn = ConnectionManager::get('default');
        $query = $conn->execute("SELECT material_transfer_logs.vendor_factory_code, material_transfer_logs.from_material as code, m1.description, CONCAT(material_transfer_logs.from_material, ' - ', m1.description) as from_material, CONCAT(material_transfer_logs.to_material, ' - ', m2.description) as to_material, material_transfer_logs.transfer_qty, DATE_FORMAT(material_transfer_logs.added_date, '%d-%m-%Y') as added_date
        FROM material_transfer_logs
        left join materials as m1 on m1.code = material_transfer_logs.from_material
        left join materials as m2 on m2.code = material_transfer_logs.to_material
        left join vendor_temps on vendor_temps.sap_vendor_code = material_transfer_logs.sap_vendor_code ".$conditions);
        $result = $query->fetchAll('assoc');
        
        // Material List
        $materials=[];
        $material_list=[];
        $logs=[];
        foreach ($result as $row)
        {
            $logs[]=array($row['added_date'],$row['vendor_factory_code'],$row['from_material'],$row['to_material'],$row['transfer_qty']);
            if (!in_array($row['code'], $material_list))
            {
                $materials[] = array('code'=>$row['code'], 'description'=>$row['description']);
                $material_list[] = $row['code'];
            }
        }
        // echo '<pre>'; print_r($logs, $materials);exit;

        // Return Transfer Log
        if ($this->request->is(['post'])) {
            $this->autoRender = false;
            $response = array('status'=>1, 'msg'=>'Success', 'data'=>$logs);
            echo json_encode($response);exit();
        }
        
        $this->set(compact('materials'));
    }


    public function getFactoryMaterials($factoryId = null) {
        $this->autoRender = false;
        
        $this->loadModel('AsnFooters');
        $this->loadModel('StockUploads');

        $session = $this->getRequest()->getSession();
        $sapVendor = $session->read('vendor_code');
        
        $materialList = $this->StockUploads->find('all')
        ->select($this->StockUploads)
        ->select(['mat_id' => 'Materials.id','Materials.code', 'Materials.description'])
        ->contain(['Materials'])
        ->where(['vendor_factory_id' => $factoryId])->toArray();

        $asnMaterials = $this->AsnFooters->find('all')
        ->select(['vendor_factory_id' => 'VendorFactories.id', 'material' => 'PoFooters.material', 'qty' => 'sum(AsnFooters.qty)'])
        ->contain(['AsnHeaders', 'AsnHeaders.VendorFactories','PoFooters', 'PoFooters.PoHeaders'])
        ->where(['AsnHeaders.status in ' => ['1','2', '3'], 'PoHeaders.sap_vendor_code' => $sapVendor , 'VendorFactories.id' => $factoryId])
        ->group(['VendorFactories.id','PoFooters.material'])->toArray();

        foreach($materialList as &$stock) {
            $stock->current_stock = ($stock->opening_stock + $stock->production_stock +  $stock->in_transfer_stock) - ($stock->out_transfer_stock);
            foreach($asnMaterials as $asn) {
                if($stock->vendor_factory_id == $asn->vendor_factory_id && $stock->material['code'] == $asn->material) {
                    $stock->asn_stock = $asn->qty;
                    $stock->current_stock = ($stock->opening_stock + $stock->production_stock + $stock->in_transfer_stock) - ($stock->asn_stock + $stock->out_transfer_stock);
                }
            }
            if($stock->current_stock < 0) {
                $stock->current_stock = 0;
            }
        }

        $materials = [];
        foreach($materialList as $mat) {
            $materials[] = ['id' => $mat->mat_id, 'code' => $mat->material->code, 'description' => $mat->material->description, 'current_stock' => $mat->current_stock, 'in_transfer_stock' => $mat->in_transfer_stock, 'out_transfer_stock' => $mat->out_transfer_stock];
        }

        $response['status'] = 1;
        $response['data']['materials'] = $materials;

        echo json_encode($response);exit();
    }


}
