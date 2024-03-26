<?php

declare(strict_types=1);

namespace App\Controller\Vendor;


/**
 * VendorMaterialStocks Controller
 *
 * @property \App\Model\Table\VendorMaterialStocksTable $VendorMaterialStocks
 * @method \App\Model\Entity\VendorMaterialStock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorMaterialStocksController extends VendorAppController
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
        $flash = [];
        $this->set('headTitle', 'Material Stocks');
        $session = $this->getRequest()->getSession();
        $vendorMaterialStocks = $this->paginate($this->VendorMaterialStocks->find()->where(['sap_vendor_code' => $session->read('vendor_code')]));
        $this->set('flash', $flash);
        $this->set(compact('vendorMaterialStocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Material Stock id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorMaterialStock = $this->VendorMaterialStocks->get($id);
        $this->set(compact('vendorMaterialStock'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $vendorMaterialStock = $this->VendorMaterialStocks->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorMaterialStock = $this->VendorMaterialStocks->patchEntity($vendorMaterialStock, $this->request->getData());
            if ($this->VendorMaterialStocks->save($vendorMaterialStock)) {
                $flash = ['type'=>'success', 'msg'=>'The vendor material stock has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The vendor material stock could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('vendorMaterialStock'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Material Stock id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $vendorMaterialStock = $this->VendorMaterialStocks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorMaterialStock = $this->VendorMaterialStocks->patchEntity($vendorMaterialStock, $this->request->getData());
            if ($this->VendorMaterialStocks->save($vendorMaterialStock)) {
                $flash = ['type'=>'success', 'msg'=>'The vendor material stock has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'success', 'msg'=>'The vendor material stock could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('vendorMaterialStock'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Material Stock id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $vendorMaterialStock = $this->VendorMaterialStocks->get($id);
        if ($this->VendorMaterialStocks->delete($vendorMaterialStock)) {
            $flash = ['type'=>'success', 'msg'=>'The vendor material stock has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The vendor material stock could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }

    public function upload()
    {
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();

        if ($this->request->is('post')) {
            if (isset($_FILES['Upload_Stocks']['name'])) {
                //print_r($_FILES); exit;
                $destination = "uploads/";
                $ext = substr($_FILES['Upload_Stocks']['name'], strrpos($_FILES['Upload_Stocks']['name'], '.') + 1);

                $path = $destination . $_FILES['Upload_Stocks']['name'];
                move_uploaded_file($_FILES['Upload_Stocks']['tmp_name'], $path);

                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($path);

                /**  Convert Spreadsheet Object to an Array for ease of use  **/
                $schdeules = $spreadsheet->getActiveSheet()->toArray();

                $data = array();

                if (count($schdeules) > 1) {
                    foreach ($schdeules as $key => $row) {
                        if ($key == 0) {
                            continue;
                        }
                        $tmp = array();
                        $tmp['sap_vendor_code'] = $session->read('vendor_code');
                        $tmp['part_code'] = trim($row[0]);
                        $tmp['material_desc'] = trim($row[1]);
                        $tmp['current_stock'] = trim($row[2]);
                        $tmp['production_stock'] = trim($row[3]);

                        $data[] = $tmp;
                    }

                    $this->loadModel('VendorMaterialStocks');

                    $this->VendorMaterialStocks->deleteAll(['sap_vendor_code' => $session->read('vendor_code')]);

                    $vendorMaterialStock = $this->VendorMaterialStocks->newEntities($data);

                    if ($this->VendorMaterialStocks->saveMany($vendorMaterialStock)) {
                        $flash = ['type'=>'success', 'msg'=>'The material stock has been saved'];
                        $this->set('flash', $flash);
                        return $this->redirect(['action' => 'index']);
                    }
                } else {
                    $flash = ['type'=>'success', 'msg'=>'Please upload correct file'];
                    $this->set('flash', $flash);
                    return $this->redirect(['action' => 'index']);
                }
            }

            //exit;

            $flash = ['type'=>'error', 'msg'=>'The  material stock could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
    }
}
