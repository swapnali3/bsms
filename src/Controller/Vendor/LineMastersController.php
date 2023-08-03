<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

class LineMastersController extends VendorAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->loadModel('LineMasters');
        $this->set('flash', $flash);
    }

    public function index()
    {
        $session = $this->getRequest()->getSession();
        $lineMasters = $this->LineMasters->find('all', [
            'conditions' => ['LineMasters.sap_vendor_code' => $session->read('vendor_code')]
        ])->contain(['Factories'])->toArray();
        
        // $lineMasters = $this->paginate($this->LineMasters);

        $this->set(compact('lineMasters'));
    }

    public function view($id = null)
    {
        $lineMaster = $this->LineMasters->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('lineMaster'));
    }

    public function add()
    {
        $this->loadModel('Factories');
        $session = $this->getRequest()->getSession();
        $lineMaster = $this->LineMasters->newEmptyEntity();
        $this->loadModel("Materials");
        $uom = $this->Materials->find('list',['keyField' => 'uom', 'valueField' => 'uom'])->select(['uom'])->distinct(['uom']);
        $factory = $this->Factories->find('list',['keyField' => 'id', 'valueField' => 'factory_code']);
        if ($this->request->is('post')) {
            $lineMaster = $this->LineMasters->patchEntity($lineMaster, $this->request->getData());
            $lineMaster->sap_vendor_code = $session->read('vendor_code');
            // echo '<pre>'; print_r($lineMaster); exit;
            try {
                if ($this->LineMasters->save($lineMaster)) {
                    $this->Flash->success(__('The line master has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The line master could not be saved. Please, try again.'));
                
            } catch (\PDOException $e) {
                $this->Flash->error(__($e->getMessage()));
            } catch (\Exception $e) {
                $this->Flash->error(__($e->getMessage()));
            }
        }
        $this->set(compact('lineMaster','uom','factory'));
    }

    public function edit($id = null)
    {
        $lineMaster = $this->LineMasters->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lineMaster = $this->LineMasters->patchEntity($lineMaster, $this->request->getData());
            if ($this->LineMasters->save($lineMaster)) {
                $this->Flash->success(__('The line master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The line master could not be saved. Please, try again.'));
        }
        $this->set(compact('lineMaster'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lineMaster = $this->LineMasters->get($id);
        if ($this->LineMasters->delete($lineMaster)) {
            $this->Flash->success(__('The line master has been deleted.'));
        } else {
            $this->Flash->error(__('The line master could not be deleted. Please, try again.'));
        }

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
                if (isset($_FILES['upload_file']) && $_FILES['upload_file']['name'] != "" && isset($_FILES['upload_file']['name'])) {
                    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['upload_file']['tmp_name']);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                    $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $highestRow = $worksheet->getHighestRow(); 
                    $highestColumn = $worksheet->getHighestColumn();
                    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

                    $tmp = [];
                    for ($row = 3; $row <= $highestRow; ++$row) {
                        
                        $tmp['sap_vendor_code']  = $session->read('vendor_code');
                        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                            $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                            if($col == 1) {
                                $tmp['name'] = $value;
                            } else if($col == 2) {
                                $tmp['factory_id'] = $value;
                            } else if($col == 3) {
                                $tmp['capacity'] = $value;
                            } else {
                                $tmp['uom'] = $value;
                            }
                            
                        }

                        $uploadData[] = $tmp;
                    }
                    
                    $columns = array_keys($uploadData[0]);
                    $upsertQuery = $this->LineMasters->query();
                    $upsertQuery->insert($columns);

                    foreach($uploadData as $row) {
                        $upsertQuery->values($row);
                        $upsertQuery->epilog('ON DUPLICATE KEY UPDATE `sap_vendor_code`=VALUES(`sap_vendor_code`), `name`=VALUES(`name`),
                        `capacity`=VALUES(`capacity`), `uom`=VALUES(`uom`)')
                        ->execute();
                    }

                    $response['status'] = 1;
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

    public function getDetail($id = null)
    {
        $this->autoRender = false;
        $this->loadModel('ProductionLines');
        $total = 0;
        $response = ['status' => 1, 'message' => ''];
        $lineMaster = $this->LineMasters->get($id);
        $totalResult = $this->ProductionLines->find()
        ->select(['total' => 'sum(capacity)'])
        ->where(['line_master_id' => $id])->first();

        //echo '<pre>'; print_r($lineMaster); print_r($total); exit();
        $response['data']['capacity'] = $lineMaster->capacity;
        if(!$totalResult->isEmpty('total')) {
            $total = $totalResult->total;
        }
        
        $response['data']['total'] = $total;
        $response['data']['balance'] = $lineMaster->capacity - $total;

        echo json_encode($response); exit;
    }
}
