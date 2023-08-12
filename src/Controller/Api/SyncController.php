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


    public function master()    
    {
        set_time_limit(300);
        $response = array();
        $response['message'] = [];
        
        $ftpConn = $this->Ftp->connection();
        //$list = $this->Ftp->getList($ftpConn);
        $data  = $this->Ftp->getMasterData($ftpConn, 'master.json');
        
        if($data) {

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
    

}