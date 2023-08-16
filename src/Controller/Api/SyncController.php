<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;


/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SyncController extends ApiAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    var $uses = false;

    public function initialize(): void
    {
        parent::initialize();

        $this->autoRender = false;

        date_default_timezone_set('Asia/Kolkata');

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);

        $this->loadComponent('Ftp');
    }


    public function master() {
        set_time_limit(300);
        $response = array();
        $response['message'] = [];
        
        $ftpConn = $this->Ftp->connection();
        //$list = $this->Ftp->getList($ftpConn);
        $data  = $this->Ftp->downloadFile($ftpConn, 'MASTER.JSON');
        
        if($data) {

            $data = trim(preg_replace('/\s+/', ' ', $data));
            $d = json_decode($data);

            foreach($d->ORG_MASTER as $mKey => $mVal) {
                if($mKey == 'M_TITLE') {
                    $response['message'][] = $this->saveTitles((array)$mVal);
                }
                if($mKey == 'CC_LIST') {
                    $response['message'][] =$this->saveCompanyCodes((array)$mVal);
                }
                if($mKey == 'PAY_TERM') {
                    $response['message'][] =$this->savePayTerms((array)$mVal);
                }
                if($mKey == 'PUR_ORG') {
                    $response['message'][] =$this->savePurchasingOrganizations((array)$mVal);
                }
                if($mKey == 'ACC_GRP') {
                    $response['message'][] =$this->saveAccountGroups((array)$mVal);
                }
                if($mKey == 'COUNTRY') {
                    $response['message'][] =$this->saveCountries((array)$mVal);
                }
                if($mKey == 'REGION') {
                    $response['message'][] =$this->saveRegions((array)$mVal);
                }
                if($mKey == 'SCH_GRP') {
                    $response['message'][] =$this->saveSchemaGroups((array)$mVal);
                }

                if($mKey == 'REC_ACC') {
                    $response['message'][] =$this->saveReconciliationAccounts((array)$mVal);
                }
                if($mKey == 'CURRENCY') {
                    $response['message'][] =$this->saveCurrencies((array)$mVal);
                }
            }
        }

        echo json_encode($response);
    }

    function saveCompanyCodes($CompanyCodeMaster = array()) {
        if(!empty($CompanyCodeMaster)) {
            //echo '<pre>'; print_r($CompanyCodeMaster); exit;
            $this->loadModel("CompanyCodes");
            $columns = array('code', 'name');
            $upsertQuery = $this->CompanyCodes->query();
            $upsertQuery->insert($columns);
            foreach($CompanyCodeMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->BUKRS, 'name' => $v->BUTXT));
            }
            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Company Code sync successfully!';
            } else {
                return 'Company Code sync fail!';
            }
            
        } 
    }

    function savePurchasingOrganizations($purchOrgMaster) {
        if(!empty($purchOrgMaster)) {
            $this->loadModel("CompanyCodes");
            $this->loadModel("PurchasingOrganizations");

            $company_codes = $this->CompanyCodes->find('list', ['keyField' => 'code', 'valueField' => 'id'])->toArray();
            $columns = array('code', 'name', 'company_code_id');
            $upsertQuery = $this->PurchasingOrganizations->query();
            $upsertQuery->insert($columns);

            foreach($purchOrgMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->EKORG, 'name' => $v->EKOTX, 'company_code_id' => $company_codes[$v->BUKRS]));
            }
            
            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Purchase Organization sync successfully!';
            } else {
                return 'Purchase Organization sync fail!';
            }
        }
    }

    function saveReconciliationAccounts($reconcAcMaster) {
        if(!empty($reconcAcMaster)) {
            $this->loadModel("CompanyCodes");
            $this->loadModel("ReconciliationAccounts");

            $company_codes = $this->CompanyCodes->find('list', ['keyField' => 'code', 'valueField' => 'id'])->toArray();
            $columns = array('code', 'name', 'company_code_id');
            $upsertQuery = $this->ReconciliationAccounts->query();
            $upsertQuery->insert($columns);

            foreach($reconcAcMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->SAKNR, 'name' => $v->TXT20, 'company_code_id' => $company_codes[$v->BUKRS]));
            }
            
            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Reconciliation Accounts sync successfully!';
            } else {
                return 'Reconciliation Accounts sync fail!';
            }
        }
    }

    function saveAccountGroups($acctGroupMaster = array()) {
        //echo '<pre>'; print_r($acctGroupMaster); exit;
        if(!empty($acctGroupMaster)) {
            $this->loadModel("AccountGroups");
            $columns = array('code', 'name');
            $upsertQuery = $this->AccountGroups->query();
            $upsertQuery->insert($columns);
            foreach($acctGroupMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->KTOKK, 'name' => $v->TXT30));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()){
                return 'Account Groups sync successfully!';
            } else {
                return 'Account Groups sync fail!';
            }
        } 
    }

    function savePayTerms($payTermMaster = array()) {
        //echo '<pre>'; print_r($payTermMaster); exit;
        if(!empty($payTermMaster)) {
            $this->loadModel("PaymentTerms");
            $columns = array('code', 'description');
            $upsertQuery = $this->PaymentTerms->query();
            $upsertQuery->insert($columns);
            foreach($payTermMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->ZTERM, 'description' => $v->TEXT1));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `description`=VALUES(`description`)')->execute()) {
                return 'Payment Terms sync successfully!';
            } else {
                return 'Payment Terms sync fail!';
            }
        } 
    }

    function saveCountries($countryMaster = array()) {
        //echo '<pre>'; print_r($countryMaster); exit;
        if(!empty($countryMaster)) {
            $this->loadModel("Countries");
            $columns = array('country_code', 'country_name');
            $upsertQuery = $this->Countries->query();
            $upsertQuery->insert($columns);
            foreach($countryMaster as $k => $v) {
                $upsertQuery->values(array('country_code' => $v->LAND1, 'country_name' => $v->LANDX));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `country_name`=VALUES(`country_name`)')->execute()) {
                return 'Country sync successfully!';
            } else {
                return 'Country sync fail!';
            }
        } 
    }

    function saveSchemaGroups($schimaGroupMaster = array()) {
        //echo '<pre>'; print_r($schimaGroupMaster); exit;
        if(!empty($schimaGroupMaster)) {
            $this->loadModel("SchemaGroups");
            $columns = array('code', 'name');
            $upsertQuery = $this->SchemaGroups->query();
            $upsertQuery->insert($columns);
            foreach($schimaGroupMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->KALSK, 'name' => $v->KALSB));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Schema Groups sync successfully!';
            } else {
                return 'Schema Groups sync fail!';
            }
        } 
    }

    function saveRegions($regionMaster = array()) {
        //echo '<pre>'; print_r($regionMaster); exit;
        if(!empty($regionMaster)) {
            $this->loadModel("States");
            $upsertQuery = $this->States->query();
            $columns = array('region_code','name', 'country_code');
            $upsertQuery->insert($columns);
            foreach($regionMaster as $k => $v) {
                $upsertQuery->values(array('region_code' => $v->BLAND, 'name' => $v->BEZEI, 'country_code' => $v->LAND1));
            }
            
            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Region sync successfully!';
            } else {
                return 'Region sync fail!';
            }
        } 
    }

    function saveTitles($titleMaster = array()) {
        //echo '<pre>'; print_r($schimaGroupMaster); exit;
        if(!empty($titleMaster)) {
            $this->loadModel("Titles");
            $columns = array('code', 'name');
            $upsertQuery = $this->Titles->query();
            $upsertQuery->insert($columns);
            foreach($titleMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->TITLE, 'name' => $v->TITLE_MEDI));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Titles sync successfully!';
            } else {
                return 'Titles sync fail!';
            }
        } 
    }

    function savecurrencies($CurrencyMaster = array()) {
        //echo '<pre>'; print_r($schimaGroupMaster); exit;
        if(!empty($CurrencyMaster)) {
            $this->loadModel("Currencies");
            $columns = array('code', 'name');
            $upsertQuery = $this->Currencies->query();
            $upsertQuery->insert($columns);
            foreach($CurrencyMaster as $k => $v) {
                $upsertQuery->values(array('code' => $v->WAERS, 'name' => $v->KTEXT));
            }

            if($upsertQuery->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')->execute()) {
                return 'Currencies sync successfully!';
            } else {
                return 'Currencies sync fail!';
            }
        } 
    }
    

    public function purchaseOrder()  {
        set_time_limit(300);
        $response = array();
        $response['message'] = [];
        
        $ftpConn = $this->Ftp->connection();
        //$list = $this->Ftp->getList($ftpConn);
        $data  = $this->Ftp->downloadFile($ftpConn, 'po_list.json');
        
        if($data) {
            $this->loadModel("PoHeaders");
            $this->loadModel("PoFooters");

            $data = trim(preg_replace('/\s+/', ' ', $data));
            $d = json_decode($data);

            //echo '<pre>'; print_r($d); exit;
            foreach($d->PO_LIST as $key => $row) {
                $hederData = array();
                $footerData = array();

                $hederData['sap_vendor_code'] = $row->LIFNR;
                $hederData['po_no'] = $row->EBELN;
                $hederData['document_type'] = $row->BSART;
                $hederData['created_on'] = date("Y-m-d H:i:s", strtotime($row->AEDAT));
                $hederData['created_by'] = $row->ERNAM;
                $hederData['pay_terms'] = $row->ZTERM;
                $hederData['currency'] = $row->WAERS;
                $hederData['exchange_rate'] = $row->WKURS;
                $hederData['release_status'] = $row->FRGZU;

                if($this->PoHeaders->exists(['po_no' => $row->EBELN])) {
                    $poInstance = $this->PoHeaders->find()->where(['po_no' => $row->EBELN])->first();
                    $poInstance = $this->PoHeaders->patchEntity($poInstance, $hederData);
                } else {
                    $poInstance = $this->PoHeaders->newEmptyEntity();
                    $poInstance = $this->PoHeaders->patchEntity($poInstance, $hederData);
                }

                try {
                    if ($this->PoHeaders->save($poInstance)) {
                        $po_header_id = $poInstance->id;

                        foreach ($row->ITEM as $no => $item) {
                            $tmp = array();
                            $tmp['po_header_id'] = $po_header_id;
                            $tmp['item'] = $item->EBELP;
                            $tmp['deleted_indication'] = $item->LOEKZ;
                            $tmp['material'] = $item->MATNR;
                            $tmp['short_text'] = $item->TXZ01;
                            $tmp['po_qty'] = $item->MENGE;
                            $tmp['grn_qty'] = $item->R_QTY;
                            $tmp['pending_qty'] = $item->P_QTY;
                            $tmp['order_unit'] = $item->MEINS;
                            $tmp['net_price'] = $item->NETPR;
                            $tmp['price_unit'] = $item->PEINH;
                            $tmp['net_value'] = $item->NETWR;
                            $tmp['gross_value'] = $item->BRTWR;

                            $footerData = $tmp;
                            if($this->PoFooters->exists(['po_header_id' => $po_header_id, 'item' => $item->EBELP])) {
                                $poItemsInstance = $this->PoFooters->find()->where(['po_header_id' => $po_header_id, 'item' => $item->EBELP])->first();
                                $poItemsInstance = $this->PoFooters->patchEntity($poItemsInstance, $hederData);
                            }  else {
                                $poItemsInstance = $this->PoFooters->newEmptyEntity();
                                $poItemsInstance = $this->PoFooters->patchEntity($poItemsInstance, $footerData);
                            }

                            if ($this->PoFooters->save($poItemsInstance)) {
                                $response['message'][] = 'PO : '.$row->EBELN.' Item : '.$item->EBELP.' saved successfully';
                            } else {
                                $response['message'][] = 'PO :'.$row->EBELN.' Item : '.$item->EBELP.' save fail';
                            }
                        }

                        /*$poItemsInstance = $this->PoFooters->newEntities($footerData);
                        
                        if ($this->PoFooters->saveMany($poItemsInstance)) {
                            $response['message'][] = 'PO : '.$row->EBELN.' saved successfully';
                        } else {
                            $response['message'][] = 'PO :'.$row->EBELN.' Items save fail';
                        } */
                    } else if($poInstance->getError('po_no')) {
                        $response['message'][] = $poInstance->getError('po_no');
                    }else {
                        $response['message'][] = 'PO :'.$row->EBELN.' save fail';
                    }
                } catch (\PDOException $e) {
                    $response['message'][] = $e->getMessage();
                } catch (\Exception $e) {
                    $response['message'][] = $e->getMessage();
                }
            }
        }
        echo json_encode($response);
    }

    public function vendorData() {
        set_time_limit(300);
        $response = array();
        $response['message'] = [];
        
        $ftpConn = $this->Ftp->connection();
        //$list = $this->Ftp->getList($ftpConn);
        $data  = $this->Ftp->downloadFile($ftpConn, 'VENDOR_PULL_LIST.JSON');
        if($data) {
            $this->loadModel("VendorTemps");

            $data = trim(preg_replace('/\s+/', ' ', $data));
            $d = json_decode($data);

            //echo '<pre>'; print_r($d); exit;
            foreach($d->VENDOR_LIST as $key => $row) {

                $companyCode = $this->VendorTemps->CompanyCodes->findByCode($row->BUKRS)->first();
                $puOrg = $this->VendorTemps->PurchasingOrganizations->findByCode($row->EKORG)->first();
                $accGrp = $this->VendorTemps->AccountGroups->findByCode($row->KTOKK)->first();
                $reconAccount = $this->VendorTemps->ReconciliationAccounts->findByCode($row->AKONT)->first();
                $companyCode = $this->VendorTemps->CompanyCodes->findByCode($row->BUKRS)->first();

                $vendor = $this->VendorTemps->newEmptyEntity();

                echo '<pre>'; print_r($vendor); exit;
                $vendor->sap_vendor_code = $row->LIFNR;
                $vendor->company_code_id = $companyCode->id;
                $vendor->purchasing_organization_id = $puOrg->id;
                $vendor->account_group_id = $accGrp->id;
                $vendor->reconciliation_account_id = $reconAccount->id;
                $vendor->title = $row->TITLE_MEDI;
                $vendor->name = $row->NAME1;
                $vendor->sap_vendor_code = $row->LIFNR;
                $vendor->sap_vendor_code = $row->LIFNR;
                $vendor->sap_vendor_code = $row->LIFNR;
                $vendor->sap_vendor_code = $row->LIFNR;



                echo '<pre>'; print_r($puOrg); exit;
            }
        }
    }
}