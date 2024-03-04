<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * DeliveryDetails Controller
 *
 * @property \App\Model\Table\DeliveryDetailsTable $DeliveryDetails
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AsnController extends VendorAppController
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
        $this->set('headTitle', 'ASN List');
        $this->loadModel('AsnHeaders');
        $session = $this->getRequest()->getSession();
        /*$this->paginate = [
            'contain' => ['PoHeaders'],
            'conditions' => ['AsnHeaders.status' => '1', 'PoHeaders.sap_vendor_code' => $session->read('vendor_code')] 
        ]; */


        $query = $this->AsnHeaders->find()
            ->select(['AsnHeaders.id', 'AsnHeaders.asn_no', 'AsnHeaders.invoice_no', 'AsnHeaders.invoice_date', 'PoHeaders.po_no', 'AsnHeaders.added_date', 'AsnHeaders.status', 'VendorFactories.factory_code'])
            ->contain(['PoHeaders', 'VendorFactories'])
            ->where(['PoHeaders.sap_vendor_code' => $session->read('vendor_code')])
            ->order(['AsnHeaders.id' => 'DESC']);

        //echo '<pre>'; print_r($query); exit;
        $deliveryDetails = $this->paginate($query);

        $this->set(compact('deliveryDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('headTitle', 'ASN Detail');
        $this->loadModel('AsnHeaders');

        $deliveryDetails = $this->AsnHeaders->find('all')
            ->select(['AsnHeaders.id', 'AsnHeaders.status', 'AsnHeaders.asn_no', 'AsnHeaders.invoice_path', 'AsnHeaders.invoice_no', 'AsnHeaders.invoice_date', 'AsnHeaders.invoice_value', 'AsnHeaders.vehicle_no', 'AsnHeaders.driver_name', 'AsnHeaders.driver_contact', 'AsnHeaders.added_date', 'PoHeaders.po_no', 'PoFooters.item', 'PoFooters.material', 'PoFooters.order_unit', 'AsnFooters.qty', 'PoItemSchedules.actual_qty', 'PoItemSchedules.delivery_date', 'VendorFactories.factory_code'])
            ->innerJoin(['PoHeaders' => 'po_headers'], ['AsnHeaders.po_header_id = PoHeaders.id'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->innerJoin(['VendorFactories' => 'vendor_factories'], ['VendorFactories.id = AsnHeaders.vendor_factory_id'])
            ->innerJoin(['PoItemSchedules' => 'po_item_schedules'], ['PoItemSchedules.po_header_id = PoHeaders.id', 'PoItemSchedules.po_footer_id = PoFooters.id'])
            ->innerJoin(['AsnFooters' => 'asn_footers'], ['AsnFooters.asn_header_id = AsnHeaders.id', 'AsnFooters.po_footer_id = PoFooters.id'])
            ->innerJoin(['AsnFooters' => 'asn_footers'], ['AsnFooters.asn_header_id = AsnHeaders.id', 'AsnFooters.po_footer_id = PoFooters.id', 'AsnFooters.po_schedule_id = PoItemSchedules.id'])

            ->where(['AsnHeaders.id' => $id])->toArray();

        $this->set('deliveryDetails', $deliveryDetails);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $deliveryDetail = $this->DeliveryDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $deliveryDetail = $this->DeliveryDetails->patchEntity($deliveryDetail, $this->request->getData());
            if ($this->DeliveryDetails->save($deliveryDetail)) {
                $flash = ['type'=>'success', 'msg'=>'The delivery detail has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The delivery detail could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $poHeaders = $this->DeliveryDetails->PoHeaders->find('list', ['limit' => 200])->all();
        $poFooters = $this->DeliveryDetails->PoFooters->find('list', ['limit' => 200])->all();
        $this->set(compact('deliveryDetail', 'poHeaders', 'poFooters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel('AsnHeaders');

        $asnDetail = $this->AsnHeaders->get($id, [
            'contain' => ['VendorFactories','PoHeaders', 'AsnFooters', 'AsnFooters.PoFooters', 'AsnFooters.PoItemSchedules'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $updatedData = $this->request->getData();
            $invoiceUpload = $updatedData["invoice"];
                $ewaybillUpload = $updatedData["ewaybill"];
                $otherUploads = $updatedData["others"];

                //print_r($productImage);exit;
                $uploads["uploads"] = json_decode($asnDetail->invoice_path, true);
                // file uploaded
                
                if($invoiceUpload->getSize() > 0) {
                    $fileName = $asnNo . '_invoice_' . time() . '_' . $invoiceUpload->getClientFilename();
                    $fileType = $invoiceUpload->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/" . $fileName;
                        $invoiceUpload->moveTo($imagePath);
                        $uploads["uploads"]['invoice'] = "uploads/" . $fileName;
                    }
                }
                if($ewaybillUpload->getSize() > 0) {
                    $fileName = $asnNo . '_ewaybill_' . time() . '_' . $ewaybillUpload->getClientFilename();
                    $fileType = $ewaybillUpload->getClientMediaType();

                    if ($fileType == "application/pdf" || $fileType == "image/*") {
                        $imagePath = WWW_ROOT . "uploads/" . $fileName;
                        $ewaybillUpload->moveTo($imagePath);
                        $uploads["uploads"]['ewaybill'] = "uploads/" . $fileName;
                    }
                }
                foreach($otherUploads as $otherUpload) {
                    if($otherUpload->getSize() > 0) {
                        $fileName = $asnNo . '_other_' . time() . '_' . $otherUpload->getClientFilename();
                        $fileType = $otherUpload->getClientMediaType();

                        if ($fileType == "application/pdf" || $fileType == "image/*") {
                            $imagePath = WWW_ROOT . "uploads/" . $fileName;
                            $otherUpload->moveTo($imagePath);
                            $uploads["uploads"]['other'][] = "uploads/" . $fileName;
                        }
                    }
                }

                $updatedData['invoice_path'] = json_encode($uploads["uploads"]);

                //echo '<pre>';  print_r($updatedData); exit;

            $asnDetail = $this->AsnHeaders->patchEntity($asnDetail, $updatedData);
            if ($this->AsnHeaders->save($asnDetail)) {
                $flash = ['type'=>'success', 'msg'=>'The ASN has been saved'];
                $this->set('flash', $flash);

                $this->Flash->success(__('The ASN has been saved'));

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The ASN could not be saved. Please, try again'];
            $this->Flash->error(__('The ASN could not be saved. Please, try again'));
            $this->set('flash', $flash);
        }
        
        $this->set(compact('asnDetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $deliveryDetail = $this->DeliveryDetails->get($id);
        if ($this->DeliveryDetails->delete($deliveryDetail)) {
            $flash = ['type'=>'success', 'msg'=>'The delivery detail has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The delivery detail could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }

    public function markDelivered($id = null)
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel('AsnHeaders');
        $this->loadModel('StockUploads');
        $session = $this->getRequest()->getSession();

        $deliveryDetail = $this->AsnHeaders->find('all')
        ->select($this->AsnHeaders)
        ->select(['material_id'=>'Materials.id', 'qty' => 'AsnFooters.qty'])
        ->innerJoin(['AsnFooters' => 'asn_footers'], ['AsnFooters.asn_header_id = AsnHeaders.id'])
        ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.id = AsnFooters.po_footer_id'])
        ->innerJoin(['Materials' => 'materials'], ['Materials.code = PoFooters.material', 'Materials.sap_vendor_code='.$session->read('vendor_code')])
        ->where(['AsnHeaders.id' => $id])->first();

        $uploadedToFTP = false;
        $asnDetails = $this->AsnHeaders->find('all')
        ->contain(['PoHeaders','AsnFooters', 'AsnFooters.PoFooters','AsnFooters.PoFooters'])
        ->where(['AsnHeaders.id' => $id])->toArray();

        $asnItems = [];
        
        foreach($asnDetails as $asn) {
            foreach($asn->asn_footers as $item) {
                $tmp = [];
                $tmp['ASN_NO'] = $asn->asn_no;
                $tmp['INVOICE_NO'] = $asn->invoice_no;
                $tmp['INVOICE_DATE'] = $asn->invoice_date;
                $tmp['VEHICLE_NO'] = $asn->vehicle_no;
                $tmp['EBELN'] = $asn->po_header->po_no;
                $tmp['EBELP'] = $item->po_footer->item;
                $tmp['MATNR'] = $item->po_footer->material;
                $tmp['MENGE'] = $item->qty;
                $tmp['MEINS'] = $item->po_footer->order_unit;
                $tmp['MBLNR'] = "";
                $tmp['MJAHR'] = "";
                $tmp['SUCCESS'] = "";
                $tmp['MESSAGE'] = "";

                $asnItems[] = $tmp;
            }
        }

        try{
            $uploadFileContent = json_encode($asnItems);
            $uploadfileName = 'ASN_('.$asnItems[0]['ASN_NO'].')_REQ.JSON';
            $downloadfileName = 'ASN_('.$asnItems[0]['ASN_NO'].')_RES.JSON';
            $ftpConn = $this->Ftp->connection();
            if($this->Ftp->uploadFile($ftpConn, $uploadFileContent, $uploadfileName)) {
                $uploadedToFTP = true;
            }
        } catch (\Exception $e) {
            $uploadedToFTP = false;
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        if(!$uploadedToFTP) {
            echo json_encode($response); exit;
        }

        $deliveryDetail = $this->AsnHeaders->patchEntity($deliveryDetail, ['status' => 2, 'gateout_date'=>date('Y-m-d H:i:s')]);

        if ($this->AsnHeaders->save($deliveryDetail)) {

            $stockDetails = $this->StockUploads->find('all', 
            ['conditions' => array('StockUploads.sap_vendor_code' => $session->read('vendor_code'), 
            'material_id' => $deliveryDetail->material_id, 
            'vendor_factory_id' => $deliveryDetail->vendor_factory_id)])->first();

            if($stockDetails) {
                $stockDetails = $this->StockUploads->patchEntity($stockDetails, ['current_stock' => ($stockDetails->current_stock - $deliveryDetail->qty), 'asn_stock' => ($stockDetails->asn_stock + $deliveryDetail->qty)]);
                if($this->StockUploads->save($stockDetails)) {
                    $response['status'] = 1;
                    $response['message'] = 'Successfully Marked In-Transit';
                }

            } else {
                $response['status'] = 0;
                $response['message'] = 'Stock not found';
            }
        } else {
            $response['status'] = 0;
            $response['message'] = 'mark entry fail';
        }


        echo json_encode($response);
    }
}
