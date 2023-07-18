<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use App\Model\Table\VendorMaterialTable;


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
    public function index()
    {

        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $stockupload = $this->StockUploads->find('all', [
            'conditions' => ['StockUploads.sap_vendor_code' => $session->read('vendor_code')]
        ])->select([
            'id', 'opening_stock', 'material_id', 'sap_vendor_code', 'added_date', 'updated_date',
            'vm_description' => 'vm.description', 'vm_vendor_code' => 'vm.code', 'vm.uom',
        ])->join([
            'table' => 'materials',
            'alias' => 'vm',
            'type' => 'LEFT',
            'conditions' => 'vm.id = StockUploads.material_id',
        ])->toArray();
        // echo '<pre>';print_r($stockupload);exit;


        $this->set(compact('stockupload'));
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
        $stockupload = $this->StockUploads->newEmptyEntity();

        $stockUpload = [];
        $stockView = [];
        $flash = [];
        $session = $this->getRequest()->getSession();
        $vendorId = $session->read('id');
        $sapVendor = $session->read('vendor_code');

        if ($this->request->is('post')) {

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
                        if (!empty($cellval)) {
                            $minivendor[] = $cellval;
                        }
                    }

                    array_push($stockUpload, $minivendor);
                }
            }



            if (empty($minivendor)) {
                $minivendor = [];
                $res = $this->request->getData();
                //  print_r($res);exit;

                if ($res["code"] && $res["description"] && $res["opening_stock"] && $res["uom"]) {

                    $VendorMaterials = $this->paginate($this->Materials->find('all', [
                        'conditions' => ['Materials.id' => $res['code']]
                    ]))->first();
                    array_push($minivendor, $VendorMaterials->code);
                    array_push($minivendor, $res["opening_stock"]);
                    array_push($stockUpload, $minivendor);
                }
            }


            foreach ($stockUpload as $stockuploads) {
                if (!empty($stockuploads)) {
                    $materialCode = $stockuploads[0];
                    $VendorMaterials = $this->paginate($this->Materials->find('all', [
                        'conditions' => ['Materials.code' => $materialCode]
                    ]))->first();

                    $stockData = array();
                    $stockData['sap_vendor_code'] = $sapVendor;
                    $stockData['material_id'] = $VendorMaterials->id;
                    $stockData['opening_stock'] = $stockuploads[1];
                    $stockData['desc'] =  $VendorMaterials->description;
                    $stockData['material_code'] =  $VendorMaterials->code;
                    $stockData['uoms'] =  $VendorMaterials->uom;



                    $existingStockUpload = $this->StockUploads->find('all', [
                        'conditions' => [
                            'StockUploads.material_id' => $VendorMaterials->id,
                        ]
                    ])->first();

                 if (!$existingStockUpload) {
                    $stockupload = $this->StockUploads->newEmptyEntity();
                    $stockupload = $this->StockUploads->patchEntity($stockupload, $stockData);
                    if ($this->StockUploads->save($stockupload)) {
                        $flash = ['type' => 'success', 'msg' => 'The stock Upload has been saved'];
                        $this->set('flash', $flash);
                        array_push($stockView, ['status' => true, 'msg' => "The vendor material has been saved.", 'data' => $stockData]);
                    } else {
                        array_push($stockView, ['status' => false, 'msg' => "The vendor material could not be saved. Please, try again.", 'data' => $stockData]);
                    }
                    } 
                    else {
                        array_push($stockView, ['status' => false, 'msg' => "Vendor material code already exits in stock upload", 'data' => $stockData]);
                    }
                }
            }

            $this->set('stockuploadData', $stockView);
        }

        $vendor_mateial = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'code'])->all();
        $this->set(compact('stockupload', 'vendor_mateial'));
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
}
