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
class MaterialsController extends BuyerAppController
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
        $this->loadModel('Materials');
        $materials = $this->Materials->find('all')->toArray();
        $this->set(compact('materials'));
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
        $materials = $this->Materials->newEmptyEntity();
        $this->set('materials', $materials);
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


    public function upload()
    {
        
        $response['status'] = 0;
        $response['message'] = 'upload fail';
        $this->autoRender = false;
       
        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            // Import File To array
            $importFile = $this->request->getData('upload_file');
            if (isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != "" && isset($_FILES['upload_file']['name'])) {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['upload_file']['tmp_name']);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                $worksheet = $spreadsheet->getActiveSheet();
                $highestRow = $worksheet->getHighestRow(); 
                $highestColumn = $worksheet->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
                
                $this->loadModel("VendorTemps");
                $this->loadModel("Materials");

                $tmp = [];
                $datas = [];

                for ($row = 2; $row <= $highestRow; $row++) {
                    $vendorError = false;
                    $matError = false;
                    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                        
                        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                        if($col == 1) {
                            
                            $tmp['sap_vendor_code'] = str_pad((string)$value, 10, "0", STR_PAD_LEFT);
                            $datas['sap_vendor_code'] = str_pad((string)$value, 10, "0", STR_PAD_LEFT);
                            if(empty($value)) {
                                $vendorError = true;
                            }
                        }
                        else if($col == 2) {
                            $tmp['code'] = $value;
                            $datas['material_code'] = $value;
                        } else if($col == 3) {
                            $tmp['description'] = $value;
                            $datas['description'] = $value;
                        }
                        else if($col == 4) {
                            $tmp['minimum_stock'] = $value;
                            $datas['minimum_stock'] = $value;
                        }
                         else if ($col == 5) {
                            $tmp['uom'] = $value; 
                            $datas['uom'] = $value;
                        }
                    }

                    $datas['error'] = '';
                    if($vendorError) {
                        $datas['error'] = 'Invalid Vendor code';
                    }

                    $stockData[] = $datas;
                    if(empty($datas['error'])) {
                        $uploadData[] = $tmp;   
                    }
                    if(!empty($uploadData)) {
                        $columns = array_keys($uploadData[0]);
                        $upsertQuery = $this->Materials->query();
                        $upsertQuery->insert($columns);
                        foreach ($uploadData as $data) {
                            $upsertQuery->values($data);
                        }
                        $upsertQuery->epilog('ON DUPLICATE KEY UPDATE description=VALUES(description), minimum_stock=VALUES(minimum_stock)')
                            ->execute();
                    }
                }

                $response['status'] = 1;
                $response['data'] = $stockData;
                $response['message'] = 'uploaded Successfully';

            } else {
                $response['status'] = 0;
                $response['message'] = 'file not uploaded';
            }

        }
        echo json_encode($response); exit;
    }

}
