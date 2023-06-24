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
class ApiController extends ApiAppController
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
    }

    public function index()
    {
    }

    public function postPo()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = 'Empty request';
        $request = $this->request->getData();

        $this->loadModel("PoHeaders");
        $this->loadModel("PoFooters");

        if (!empty($request) && count($request['DATA'])) {

            try {
                foreach ($request['DATA'] as $key => $row) {
                    $hederData = array();
                    $footerData = array();

                    $hederData['sap_vendor_code'] = $row['LIFNR'];
                    $hederData['po_no'] = $row['EBELN'];
                    $hederData['document_type'] = $row['BSART'];
                    $hederData['created_on'] = date("Y-m-d H:i:s", strtotime($row['AEDAT']));
                    $hederData['created_by'] = $row['ERNAM'];
                    $hederData['pay_terms'] = $row['ZTERM'];
                    $hederData['currency'] = $row['WAERS'];
                    $hederData['exchange_rate'] = $row['WKURS'];
                    $hederData['release_status'] = $row['FRGZU'];

                    $poInstance = $this->PoHeaders->newEmptyEntity();
                    $poInstance = $this->PoHeaders->patchEntity($poInstance, $hederData);

                    if ($this->PoHeaders->save($poInstance)) {
                        $po_header_id = $poInstance->id;

                        foreach ($row['ITEMS'] as $no => $item) {
                            $tmp = array();
                            $tmp['po_header_id'] = $po_header_id;
                            $tmp['item'] = $item['EBELP'];
                            $tmp['deleted_indication'] = $item['LOEKZ'];
                            $tmp['material'] = $item['MATNR'];
                            $tmp['short_text'] = $item['TXZ01'];
                            $tmp['po_qty'] = $item['MENGE'];
                            $tmp['grn_qty'] = $item['R_QTY'];
                            $tmp['pending_qty'] = $item['P_QTY'];
                            $tmp['order_unit'] = $item['MEINS'];
                            $tmp['net_price'] = $item['NETPR'];
                            $tmp['price_unit'] = $item['PEINH'];
                            $tmp['net_value'] = $item['NETWR'];
                            $tmp['gross_value'] = $item['BRTWR'];

                            $footerData[] = $tmp;
                            //print_r($footerData);        
                        }

                        $poItemsInstance = $this->PoFooters->newEntities($footerData);
                        #print_r($poItemsInstance);
                        if ($this->PoFooters->saveMany($poItemsInstance)) {
                            $response['status'] = 1;
                            $response['message'] = 'PO saved successfully';
                        } else {
                            $response['status'] = 0;
                            $response['message'] = 'PO Items save fail';
                        }
                    } else {
                        $response['status'] = 0;
                        $response['message'] = 'PO header save fail';
                    }
                    //print_r($hederData);
                }
            } catch (\PDOException $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }

    public function postPr()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = 'Empty request';
        $request = $this->request->getData();

        $this->loadModel("PrHeaders");
        $this->loadModel("PrFooters");

        if (!empty($request) && count($request['DATA'])) {

            try {
                foreach ($request['DATA'] as $key => $row) {
                    $hederData = array();
                    $footerData = array();

                    $hederData['pr_no'] = $row['BANFN'];
                    $hederData['description'] = $row['TXZ01'];
                    $hederData['pr_type'] = $row['BSART'];
                    $hederData['purchase_group'] = $row['EKGRP'];

                    $poInstance = $this->PrHeaders->newEmptyEntity();
                    $poInstance = $this->PrHeaders->patchEntity($poInstance, $hederData);


                    if ($this->PrHeaders->save($poInstance)) {
                        $pr_header_id = $poInstance->id;

                        foreach ($row['ITEMS'] as $no => $item) {
                            $tmp = array();
                            $tmp['pr_header_id'] = $pr_header_id;
                            $tmp['item'] = $item['BNFPO'];
                            $tmp['material'] = $item['MATNR'];
                            $tmp['short_text'] = $item['TXZ01'];
                            $tmp['qty'] = $item['MENGE'];
                            $tmp['unit'] = $item['MEINS'];
                            $tmp['delivery_date'] = $item['LFDAT'];
                            $tmp['plant'] = $item['WERKS'];
                            $tmp['material_group'] = $item['MATKL'];
                            $tmp['storage_location'] = $item['LGORT'];
                            $tmp['purchase_group'] = $item['EKGRP'];
                            $tmp['requisitioner'] = $item['AFNAM'];
                            $tmp['total_value'] = $item['RLWRT'];
                            $tmp['price'] = $item['PEINH'];
                            $tmp['purchase_organization'] = $item['EKORG'];

                            $footerData[] = $tmp;
                            //print_r($footerData);        
                        }

                        $poItemsInstance = $this->PrFooters->newEntities($footerData);
                        #print_r($poItemsInstance);
                        if ($this->PrFooters->saveMany($poItemsInstance)) {
                            $response['status'] = 1;
                            $response['message'] = 'PR saved successfully';
                        } else {
                            $response['status'] = 0;
                            $response['message'] = 'PR Items save fail';
                        }
                    } else {
                        $response['status'] = 0;
                        $response['message'] = 'PR header save fail';
                    }
                }
            } catch (\PDOException $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            } catch (\Exception $e) {
                $response['status'] = 0;
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }


    public function notification()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';
        $session = $this->getRequest()->getSession();


        $userId =  $session->read('id');
        $this->loadModel('Notifications');

        $conn = ConnectionManager::get('default');
        $notificationsQuery = $conn->execute(
            "SELECT * FROM notifications WHERE notification_type IN (
                SELECT nt.name FROM users u
                INNER JOIN user_groups ug ON ug.id = u.group_id
                INNER JOIN map_role_notification mrn ON ug.id = mrn.user_group
                INNER JOIN notifications_type nt ON nt.id = mrn.notification_type
                WHERE u.id = :userId
            ) AND message_count > 0",
            ['userId' => $userId]
        );

        $notifications = $notificationsQuery->fetchAll('assoc');
   
        $response['status'] = '1';
        $response['message'] = 'success';
        $response['notifications'] = $notifications;

        echo json_encode($response);
    }
}
