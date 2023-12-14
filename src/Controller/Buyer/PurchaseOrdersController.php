<?php

declare(strict_types=1);

namespace App\Controller\Buyer;

use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;

/**
 * PoHeaders Controller
 *
 * @property \App\Model\Table\PoHeadersTable $PoHeaders
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends BuyerAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];
        $this->set('flash', $flash);
    }

    var $uses = array('PoHeaders');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel('AsnHeaders');
        $this->loadModel('AsnFooters');
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        
        $vendorList = $this->VendorTemps->find('all')->select(['sap_vendor_code', 'name'])->distinct(['sap_vendor_code'])->where(['sap_vendor_code IS NOT NULL' ])->toArray();
        $poList = $this->PoHeaders->find('all')->toArray();
        $materialList = $this->Materials->find('all')->toArray();
        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();

        $this->set(compact('vendorList','poList', 'materialList', 'vendortype', 'segment'));
    }

    public function purchaseorderlist(){
        $this->autoRender = false;
        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel('AsnHeaders');
        $this->loadModel('AsnFooters');
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $response = array('status'=>0, 'message'=>'fail', 'data'=>'');

        $conditions = " where 1=1 ";
        $statusconditions = "";
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
            if(isset($request['po_no'])) {
                $search = '';
                foreach ($request['po_no'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']) and !isset($request['status'])){ $conditions .= " and po_headers.po_no in (".$search.")"; }
                else{ $conditions .= " and po_headers.po_no in (".$search.")"; }
            }
            if(isset($request['po_no_date']) && !empty($request['po_no_date'])) {
                $search = $request['po_no_date'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']) and !isset($request['status']) and !isset($request['po_no'])){ $conditions .= " and po_headers.created_on>='".$search." 00:00:00'"; }
                else{ $conditions .= " and po_headers.created_on>='".$search." 00:00:00'"; }
            }
            if(isset($request['delivery_date']) && !empty($request['delivery_date'])) {
                $search = $request['delivery_date'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']) and !isset($request['status']) and !isset($request['po_no'])){ $conditions .= " and po_item_schedules.delivery_date >='".$search." 00:00:00'"; }
                else{ $conditions .= " and po_item_schedules.delivery_date >='".$search." 00:00:00'"; }
            }
            if(isset($request['status'])) {
                $search = '';
                foreach ($request['status'] as $mat) { $search .= "'" . $mat . "',"; }
                $search = rtrim($search, ',');
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment'])){ $statusconditions .= " where status in (".$search.")"; }
                else{ $statusconditions .= " where status in (".$search.")"; }
            }
            $conn = ConnectionManager::get('default');
        }

        $conn = ConnectionManager::get('default');
        $material = $conn->execute("select * from (select po_headers.id, po_headers.sap_vendor_code, po_headers.po_no, item, materials.type, materials.segment, po_footers.material, po_footers.short_text, po_qty, grn_qty, pending_qty, po_footers.order_unit, po_footers.net_price, po_footers.net_value, po_footers.gross_value,po_footers.price_unit, po_item_schedules.actual_qty, po_item_schedules.received_qty, DATE_FORMAT(po_item_schedules.delivery_date, '%d-%m-%Y') as 'delivery_date', a.asn_no,
        case
            when a.status = 3 then 'Received' else
            case when a.status = 2 then 'In-Transit' else
                case when po_item_schedules.delivery_date is null then '' else
                    case when po_item_schedules.received_qty = 0 then 'Scheduled' else
                        case when po_item_schedules.received_qty < po_item_schedules.actual_qty then 'Partial ASN created' else 'ASN created'
                        end
                    end
                end
            end
        end as 'status'
        from po_headers
        join po_footers on po_footers.po_header_id = po_headers.id
        left join vendor_temps on vendor_temps.sap_vendor_code = po_headers.sap_vendor_code
        left join materials on materials.code = po_footers.material
        left join po_item_schedules on po_item_schedules.po_header_id = po_headers.id and po_item_schedules.po_footer_id = po_footers.id
        left join asn_footers on asn_footers.po_schedule_id=po_item_schedules.id  and asn_footers.po_footer_id = po_footers.id
        left join (select asn_headers.status, asn_no, po_header_id, asn_footers.id as asn_footer_id, po_schedule_id from asn_headers left join asn_footers on asn_footers.asn_header_id = asn_headers.id) as a on a.po_header_id = po_headers.id and asn_footer_id = asn_footers.id ".$conditions." ) as a ". $statusconditions);
        $materialist = $material->fetchAll('assoc');

        $results = [];
        foreach ($materialist as $mat) {
            $tmp = [];
            $tmp[] = $mat['sap_vendor_code'];
            $tmp[] = $mat['po_no'];
            $tmp[] = $mat['item'];
            $tmp[] = $mat['type'];
            $tmp[] = $mat['segment'];
            $tmp[] = $mat['material'];
            $tmp[] = $mat['short_text'];
            $tmp[] = $mat['po_qty'];
            $tmp[] = $mat['grn_qty'];
            $tmp[] = $mat['pending_qty'];
            $tmp[] = $mat['order_unit'];
            $tmp[] = $mat['net_price'];
            $tmp[] = $mat['net_value'];
            $tmp[] = $mat['gross_value'];
            $tmp[] = $mat['price_unit'];
            $tmp[] = $mat['actual_qty'];
            $tmp[] = $mat['received_qty'];
            $tmp[] = $mat['asn_no'];
            $tmp[] = $mat['delivery_date'];
            $tmp[] = $mat['status'];
            $results[] = $tmp;
        }

        $response = array('status'=>1, 'message'=>'success', 'data'=>$results);
        echo json_encode($response); exit;
    }

    public function secondaryAgeingReport(){
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $materials = $this->Materials->find('all')->toArray();
        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendor = $this->VendorTemps->find('all')->select(['sap_vendor_code', 'name'])->distinct(['sap_vendor_code'])->where(['sap_vendor_code IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();
        $this->set(compact('materials', 'vendor', 'vendortype', 'segment'));
    }

    public function sarlist(){
        $this->autoRender = false;
        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel('AsnHeaders');
        $this->loadModel('AsnFooters');
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $response = array('status'=>0, 'message'=>'fail', 'data'=>'');

        $conditions = " where 1=1 ";
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
            if(isset($request['from']) && !empty($request['from'])) {
                $search = $request['from'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']))
                { $conditions .= " and po_item_schedules.added_date>='".$search." 00:00:00'"; }
                else{ $conditions .= " and po_item_schedules.added_date>='".$search." 00:00:00'"; }
            }
            if(isset($request['till']) && !empty($request['till'])) {
                $search = $request['till'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']) and !isset($request['from']))
                { $conditions .= " and po_item_schedules.added_date<='".$search." 23:59:59'"; }
                else{ $conditions .= " and po_item_schedules.added_date<='".$search." 23:59:59'"; }
            }
            $conn = ConnectionManager::get('default');
        }

        $conn = ConnectionManager::get('default');
        $material = $conn->execute("select
        DATE_FORMAT(po_item_schedules.added_date, '%d-%m-%Y') as 'added_date', materials.type, materials.segment, materials.code, materials.description,
        '-' as 'size', po_footers.po_qty, po_item_schedules.received_qty, po_footers.po_qty - po_item_schedules.received_qty as 'pending_qty', vendor_temps.name, DATE_FORMAT(po_item_schedules.delivery_date, '%d-%m-%Y') as 'delivery_date', TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) as 'no_of_days',
        case
            when TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) <= 0 then 'Within 7 days' else
            case when TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) < 16 then '7 to 15 days' else 'Greater than 15 days'
            end
        end as 'ageing',
        case
            when asn_headers.status = 3 then 'Received' else
            case when asn_headers.status = 2 then 'In-Transit' else
                case when po_item_schedules.delivery_date is null then '-' else
                    case when po_item_schedules.received_qty = 0 then 'Scheduled' else
                        case when po_item_schedules.received_qty < po_item_schedules.actual_qty then 'Partial ASN created' else 'ASN created'
                        end
                    end
                end
            end
        end as 'status'
        from po_item_schedules
        left join po_footers on po_footers.id = po_item_schedules.po_footer_id
        left join materials on materials.code = po_footers.material
        left join po_headers on po_footers.po_header_id = po_headers.id
        left join vendor_temps on vendor_temps.sap_vendor_code = po_headers.sap_vendor_code
        left join asn_footers on asn_footers.po_schedule_id = po_item_schedules.id
        left join asn_headers on asn_footers.asn_header_id = asn_headers.id". $conditions);
        $materialist = $material->fetchAll('assoc');

        $results = [];
        foreach ($materialist as $mat) {
            $tmp = [];
            $tmp[] = $mat['added_date'];
            $tmp[] = $mat['type'];
            $tmp[] = $mat['segment'];
            $tmp[] = $mat['code'];
            $tmp[] = $mat['description'];
            $tmp[] = $mat['size'];
            $tmp[] = $mat['po_qty'];
            $tmp[] = $mat['received_qty'];
            $tmp[] = $mat['pending_qty'];
            $tmp[] = $mat['name'];
            $tmp[] = $mat['delivery_date'];
            $tmp[] = $mat['no_of_days'];
            $tmp[] = $mat['ageing'];
            $tmp[] = $mat['status'];
            $results[] = $tmp;
        }

        $summary = $conn->execute("select case
        when asn_headers.status = 3 then 'Received' else
        case when asn_headers.status = 2 then 'In-Transit' else
            case when po_item_schedules.delivery_date is null then '-' else
                case when po_item_schedules.received_qty = 0 then 'Scheduled' else
                    case when po_item_schedules.received_qty < po_item_schedules.actual_qty then 'Partial ASN created' else 'ASN created'
                    end
                end
            end
        end
        end as 'status',
        materials.type, 
        case
        when TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) < 8 then po_footers.po_qty - po_item_schedules.received_qty else ''
        end as 'Within 7 days',
        case
        when 7 < TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) and TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) < 16 then po_footers.po_qty - po_item_schedules.received_qty else ''
        end as '7 to 15 days',
        case
        when TIMESTAMPDIFF( DAY, po_item_schedules.added_date, po_item_schedules.delivery_date ) > 15 then po_footers.po_qty - po_item_schedules.received_qty else ''
        end as 'Greater than 15 days'
        from po_item_schedules
        left join po_footers on po_footers.id = po_item_schedules.po_footer_id
        left join materials on materials.code = po_footers.material
        left join po_headers on po_footers.po_header_id = po_headers.id
        left join vendor_temps on vendor_temps.sap_vendor_code = po_headers.sap_vendor_code
        left join asn_footers on asn_footers.po_schedule_id = po_item_schedules.id
        left join asn_headers on asn_footers.asn_header_id = asn_headers.id". $conditions."
        group by status, type order by status, type");
        $summaryist = $summary->fetchAll('assoc');

        $s_result = []; $tmparr = []; $x=0; $y=0; $z=0;
        foreach ($summaryist as $mat) {
            if(!isset($tmparr[$mat['status']])){
                $tmp = [];
                $tmp[] = $mat['status'];
                $tmp[] = "";
                $tmp[] = "";
                $tmp[] = "";
                $tmp[] = "";
                $s_result[] = $tmp;                
                $tmparr[$mat['status']] = 5;
            }
            $tmp = [];
            $tmp[] = $mat['type'];
            $tmp[] = $mat['Within 7 days'];
            $tmp[] = $mat['7 to 15 days'];
            $tmp[] = $mat['Greater than 15 days'];
            $a = !empty($mat['Within 7 days']) ? intval($mat['Within 7 days']) : 0;
            $x = $x + $a;
            $b = !empty($mat['7 to 15 days']) ? intval($mat['7 to 15 days']) : 0;
            $y = $y + $b;
            $c = !empty($mat['Greater than 15 days']) ? intval($mat['Greater than 15 days']) : 0;
            $z = $z + $c;
            $tmp[] = $a + $b + $c;
            $s_result[] = $tmp;
        }
        $tmp = [];
        $tmp[] = "Grand Total";
        $tmp[] = $x;
        $tmp[] = $y;
        $tmp[] = $z;
        $tmp[] = $x + $y + $z;
        $s_result[] = $tmp;

        $response = array('status'=>1, 'message'=>'success', 'data'=>array($results, $s_result));
        echo json_encode($response); exit;
    }

    public function productionplanVsActual(){
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $materials = $this->Materials->find('all')->toArray();
        $segment = $this->Materials->find('all')->select(['segment'])->distinct(['segment'])->where(['segment IS NOT NULL' ])->toArray();
        $vendor = $this->VendorTemps->find('all')->select(['sap_vendor_code', 'name'])->distinct(['sap_vendor_code'])->where(['sap_vendor_code IS NOT NULL' ])->toArray();
        $vendortype = $this->Materials->find('all')->distinct(['type'])->where(['type IS NOT NULL' ])->toArray();
        $this->set(compact('materials', 'vendor', 'vendortype', 'segment'));
    }

    public function ppalist(){
        $this->autoRender = false;
        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel('AsnHeaders');
        $this->loadModel('AsnFooters');
        $this->loadModel("VendorTemps");
        $this->loadModel('VendorTypes');
        $this->loadModel('Materials');
        $response = array('status'=>0, 'message'=>'fail', 'data'=>'');

        $conditions = " where 1=1 ";
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
            if(isset($request['from']) && !empty($request['from'])) {
                $search = $request['from'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']))
                { $conditions .= " and dailymonitor.plan_date>='".$search." 00:00:00'"; }
                else{ $conditions .= " and dailymonitor.plan_date>='".$search." 00:00:00'"; }
            }
            if(isset($request['till']) && !empty($request['till'])) {
                $search = $request['till'];
                if(!isset($request['material']) and !isset($request['vendor']) and !isset($request['vendortype']) and !isset($request['segment']) and !isset($request['from']))
                { $conditions .= " and dailymonitor.plan_date<='".$search." 23:59:59'"; }
                else{ $conditions .= " and dailymonitor.plan_date<='".$search." 23:59:59'"; }
            }
            $conn = ConnectionManager::get('default');
        }

        $conn = ConnectionManager::get('default');
        $material = $conn->execute("SELECT
        DATE_FORMAT(dailymonitor.plan_date, '%d-%m-%Y') as plan_date, vendor_temps.sap_vendor_code, materials.type, materials.segment, line_masters.name,
        materials.code, materials.description, dailymonitor.target_production, dailymonitor.confirm_production, DATE_FORMAT(dailymonitor.plan_date, '%d-%m-%Y') as 'plan_date',
        case when dailymonitor.status=1 then 'Active' else case when dailymonitor.status=3 then 'Planned Confirmed' else 'Cancelled' end end as 'status',
        '-' as 'action', CURDATE() - dailymonitor.plan_date as 'ageing'
        FROM dailymonitor
        left join vendor_temps on dailymonitor.sap_vendor_code=vendor_temps.sap_vendor_code
        left join materials on materials.id=dailymonitor.material_id
        left join production_lines on production_lines.id=dailymonitor.production_line_id
        left join line_masters on line_masters.id=production_lines.line_master_id". $conditions);
        $materialist = $material->fetchAll('assoc');

        $results = [];
        foreach ($materialist as $mat) {
            $tmp = [];
            $tmp[] = $mat['plan_date'];
            $tmp[] = $mat['sap_vendor_code'];
            $tmp[] = $mat['type'];
            $tmp[] = $mat['segment'];
            $tmp[] = $mat['name'];
            $tmp[] = $mat['code'];
            $tmp[] = $mat['description'];
            $tmp[] = $mat['target_production'];
            $tmp[] = $mat['confirm_production'];
            $tmp[] = $mat['plan_date'];
            $tmp[] = $mat['status'];
            $tmp[] = $mat['action'];
            $tmp[] = $mat['ageing'];
            $results[] = $tmp;
        }
        // echo '<pre>';print_r($results);
        $response = array('status'=>1, 'message'=>'success', 'data'=>$results);
        echo json_encode($response); exit;
    }

    public function view()
    {
        $session = $this->getRequest()->getSession();
        $this->set('headTitle', 'PO Detail');
        $this->loadModel('PoHeaders');
        $poHeaders = $this->PoHeaders->find()
            ->select(['id', 'po_no', 'sap_vendor_code'])->toArray();

        $this->set(compact('poHeaders'));
    }

    


    public function poApi($search = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;

        $this->set('headTitle', 'Purchase Order List');
        $this->loadModel('PoHeaders');
        $this->loadModel('PoItemSchedules');
        $this->loadModel("VendorTemps");

        $session = $this->getRequest()->getSession();

        $data = $this->PoHeaders->find('all')
            ->select(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
            ->distinct(['PoHeaders.id', 'PoHeaders.po_no', 'PoHeaders.sap_vendor_code'])
            ->innerJoin(['PoFooters' => 'po_footers'], ['PoFooters.po_header_id = PoHeaders.id'])
            ->join([
                'table' => 'vendor_temps',
                'alias' => 'V',
                'type' => 'INNER',
                'conditions' => ['V.sap_vendor_code = PoHeaders.sap_vendor_code', 
                'V.company_code_id' => $session->read('company_code_id'),
                'V.purchasing_organization_id' => $session->read('purchasing_organization_id'), 
                'status' => '3']
            ])
            ->where([
                'OR' => [
                    ['PoHeaders.po_no LIKE' => '%' . $search . '%'],
                    ['PoFooters.material LIKE' => '%' . $search . '%'],
                    ['PoFooters.short_text LIKE' => '%' . $search . '%'],
                    ['V.name LIKE' => '%' . $search . '%'],
                    ['V.sap_vendor_code LIKE' => '%' . $search . '%'],
                ],
                ['PoHeaders.created_on >= now()-interval 3 month']
            ])->order(['PoHeaders.id' => 'desc']);

        //echo '<pre>';print_r($data);exit;

        if ($data->count() > 0) {
            $response['status'] = 'success';
            $response['message'] = $data;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'Order not found';
        }
        echo json_encode($response);
    }

    public function getPoFooters($id = null)
    {
        $this->autoRender = false;
        $response = array();
        $response['status'] = '0';
        $response['message'] = '';

        /*
          
         $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $poHeader = $this->PoHeaders->find()
        ->select($this->PoFooters)
        ->select($this->PoHeaders)
        ->Join(['PoFooters' => 'po_footers'],['PoFooters.po_header_id=PoHeaders.id'])
        ->where(['PoHeaders.id' => $id, "PoFooters.deleted_indication=''"])->all();

        */
        $this->loadModel('PoHeaders');
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => [
                'PoFooters' => function($query){
                    return $query->where(['deleted_indication' => '']);
                }
            ]
        ]);

        //echo '<pre>'; print_r($poHeader); exit;
        if (!$poHeader->acknowledge) {
            $response['status'] = 0;
            $response['data'] = $poHeader;
            $response['message'] = 'PO not acknowledged by vendor';
        } else if(!$poHeader->po_footers) {
            $response['status'] = 0;
            $response['data'] = null;
            $response['message'] = 'Line item not found';
        }else {
            $response['status'] = 1;
            $response['data'] = $poHeader;
            $response['message'] = '';
        }


        // echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
        exit;
    }


    public function update($id = null)
    {

        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        
        $this->loadModel("Notifications");
        $this->loadModel("PoItemSchedules");
        $this->loadModel("VendorTemps");

        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $PoItemSchedule = $this->PoItemSchedules->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'get', 'put'])) {
          

            $schedule = $this->PoItemSchedules->get($id);
            if ($this->PoItemSchedules->delete($schedule)) {

                $poDetail = $this->PoHeaders->find()
                        ->select(['sap_vendor_code', 'po_no'])
                        ->where(['id' => $PoItemSchedule->po_header_id])
                        ->first();

                $poItem = $this->PoFooters->find()
                        ->select(['item'])
                        ->where(['id' => $PoItemSchedule->po_footer_id])
                        ->first();

                        $vendorRecord = $this->VendorTemps->find()
                        ->where(['sap_vendor_code' => $poDetail->sap_vendor_code])
                        ->first();

                $filteredBuyers = $this->VendorTemps->find()
                            ->select(['VendorTemps.id','user_id'=> 'Users.id'])
                            ->innerJoin(['Users' => 'users'], ['Users.username = VendorTemps.email'])
                            ->where(['VendorTemps.id' => $vendorRecord['id']]);

                            foreach ($filteredBuyers as $buyer) {
                                $n = $this->Notifications->find()->where(['user_id' => $buyer->user_id, 'notification_type'=>'Schedule Cancelled'])->first();
                                if ($n) {
                                    $n->Notifications = 'Schedule Cancelled';
                                    $n->message_count = $n->message_count+1;
                                } else {
                                    $n = $this->Notifications->newEntity([
                                        'user_id' => $buyer->user_id,
                                        'notification_type' => 'Schedule Cancelled',
                                        'message_count' => '1',
                                    ]);
                                }
                                $this->Notifications->save($n);
                            }


                            $visit_url = Router::url('/', true);
                            $mailer = new Mailer('default');
                            $mailer
                                ->setTransport('smtp')
                                ->setViewVars([ 'subject' => 'Hi ' . $vendorRecord->name, 'mailbody' => 'A schedule has been cancelled for PO : '.$poDetail->po_no.' and Item : '.$poItem->item.' . Visit Vekpro for more details.', 'link' => $visit_url, 'linktext' => 'Visit Vekpro' ])
                                ->setFrom(['vekpro@fts-pl.com' => 'FT Portal'])
                                ->setTo($vendorRecord->email)
                                ->setEmailFormat('html')
                                ->setSubject('Vendor Portal - Schedule Cancelled')
                                ->viewBuilder()
                                    ->setTemplate('mail_template');
                            $mailer->deliver();

                $response['status'] = 'success';
                $response['message'] = 'Schedule deleted successfully';
            } else {
                $response['status'] = 'fail';
                $response['message'] = 'failed to delete schedule';
            }
        }
        echo json_encode($response);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $poHeader = $this->PoHeaders->newEmptyEntity();
        if ($this->request->is('post')) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $flash = ['type' => 'success', 'msg' => 'The po header has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type' => 'error', 'msg' => 'The po header could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $flash = ['type' => 'error', 'msg' => 'The po header has been saved'];
                $this->set('flash', $flash);

                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type' => 'error', 'msg' => 'The po header could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->request->allowMethod(['post', 'delete']);
        $poHeader = $this->PoHeaders->get($id);
        if ($this->PoHeaders->delete($poHeader)) {
            $flash = ['type' => 'error', 'msg' => 'The po header has been deleted'];
            $this->set('flash', $flash);
        } else {
            $flash = ['type' => 'error', 'msg' => 'The po header could not be deleted. Please, try again'];
            $this->set('flash', $flash);
        }

        return $this->redirect(['action' => 'index']);
    }

    public function createSchedule()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel("Notifications");
        $this->loadModel("PoItemSchedules");
        $this->loadModel("VendorTemps");
 

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            foreach ($data as $row) {
                try {

                    $poDetail = $this->PoHeaders->find()
                        ->select(['sap_vendor_code', 'po_no'])
                        ->where(['id' => $row['po_header_id']])->first();
                    
                $poItem = $this->PoFooters->find()
                        ->select(['item'])
                        ->where(['id' => $row['po_footer_id']])
                        ->first();

                        $vendorRecord = $this->VendorTemps->find()
                        ->where(['sap_vendor_code' => $poDetail->sap_vendor_code])
                        ->first();


                    if ($vendorRecord->update_flag) {
                        $response['status'] = 0;
                        $response['message'] = 'Vendor details pending for review';
                    } else {
                        $PoItemSchedule = $this->PoItemSchedules->newEmptyEntity();
                        $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $row);
                        if ($this->PoItemSchedules->save($PoItemSchedule)) {
                            $filteredBuyers = $this->VendorTemps->find()
                            ->select(['VendorTemps.id','user_id'=> 'Users.id'])
                            ->innerJoin(['Users' => 'users'], ['Users.username = VendorTemps.email'])
                            ->where(['VendorTemps.id' => $vendorRecord['id']]);

                            foreach ($filteredBuyers as $buyer) {
                                $n = $this->Notifications->find()->where(['user_id' => $buyer->user_id, 'notification_type'=>'New Schedule'])->first();
                                if ($n) {
                                    $n->Notifications = 'New Schedule';
                                    $n->message_count = $n->message_count+1;
                                } else {
                                    $n = $this->Notifications->newEntity([
                                        'user_id' => $buyer->user_id,
                                        'notification_type' => 'New Schedule',
                                        'message_count' => '1',
                                    ]);
                                }
                                $this->Notifications->save($n);
                            }


                            $visit_url = Router::url('/', true);
                            $mailer = new Mailer('default');
                            $mailer
                                ->setTransport('smtp')
                                ->setViewVars([ 'vendor_name' => $vendorRecord->name, 'po' => $sapVendorcode->po_no ]) 
                                ->setFrom(['vekpro@fts-pl.com' => 'Vendor Portal'])
                                ->setTo($vendorRecord->email)
                                ->setEmailFormat('html')
                                ->setSubject('DELVERY SCHEDULE CREATED')
                                ->viewBuilder()
                                    ->setTemplate('delivery_schedule');
                            $mailer->deliver();
                            $response['status'] = 1;
                            $response['message'] = "Schedule created successfully";
                        } 
                    }
                } catch (\Exception $e) {
                    $response['status'] = 0;
                    $response['message'] = $e->getMessage();
                }
            }
            
        }
        echo json_encode($response);
    }


    public function createScheduleUpdate($id = null)
    {
        $response = array();
        $response['status'] = '';
        $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel('PoHeaders');
        $this->loadModel('PoFooters');
        $this->loadModel("Notifications");
        $this->loadModel("PoItemSchedules");
        $this->loadModel("VendorTemps");


        // $flash = [];
        $PoItemSchedule = $this->PoItemSchedules->get($id, [
            'contain' => [],
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $this->request->getData());
            if ($item_po = $this->PoItemSchedules->save($PoItemSchedule)) {
                
                $poDetail = $this->PoHeaders->find()
                        ->select(['sap_vendor_code', 'po_no'])
                        ->where(['id' => $PoItemSchedule->po_header_id])
                        ->first();

                $poItem = $this->PoFooters->find()
                        ->select(['item'])
                        ->where(['id' => $PoItemSchedule->po_footer_id])
                        ->first();

                        $vendorRecord = $this->VendorTemps->find()
                        ->where(['sap_vendor_code' => $poDetail->sap_vendor_code])
                        ->first();

                $filteredBuyers = $this->VendorTemps->find()
                            ->select(['VendorTemps.id','user_id'=> 'Users.id'])
                            ->innerJoin(['Users' => 'users'], ['Users.username = VendorTemps.email'])
                            ->where(['VendorTemps.id' => $vendorRecord['id']]);

                            foreach ($filteredBuyers as $buyer) {
                                $n = $this->Notifications->find()->where(['user_id' => $buyer->user_id, 'notification_type'=>'Schedule Updated'])->first();
                                if ($n) {
                                    $n->Notifications = 'Schedule Updated';
                                    $n->message_count = $n->message_count+1;
                                } else {
                                    $n = $this->Notifications->newEntity([
                                        'user_id' => $buyer->user_id,
                                        'notification_type' => 'Schedule Updated',
                                        'message_count' => '1',
                                    ]);
                                }
                                $this->Notifications->save($n);
                            }


                            $visit_url = Router::url('/', true);
                            $mailer = new Mailer('default');
                            $mailer
                                ->setTransport('smtp')
                                ->setViewVars([ 'vendor_name' => $vendorRecord->name, 'po_item' => $poItem, 'item_po'=>$item_po, 'po_detail'=>$poDetail ])
                                ->setFrom(['vekpro@fts-pl.com' => 'FT Portal'])
                                ->setTo($vendorRecord->email)
                                ->setEmailFormat('html')
                                ->setSubject('Vendor Portal - Schedule Updated')
                                ->viewBuilder()
                                    ->setTemplate('m_delivery_schedule');
                            $mailer->deliver();

                $response['status'] = 'success';
                $response['message'] = 'Delivery Date Update.';
            } else {
                $response['status'] = 'fail';
                $response['message'] = 'Failed';
            }
        }
        echo json_encode($response);
    }
    public function getSchedules($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        $data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';

        if ($data->count() > 0) {
            $html .= '<table class="table" id="example2">
            <thead>
                    <tr>
                        <th>Actual Qty</th>
                        <th>Received Qty</th>
                        <th>Delivery Date</th>
                        <th>&nbsp;</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach ($data as $row) {
                //$link = $Html->link(__('Communication'), "#", ['class' => 'schedule_item btn btn-default', 'header-id' => $poHeader->id, 'footer-id' => $poFooters->id, 'item-no' => $poFooters->item]);
                $totalQty += $row->actual_qty;
                $html .= "<tr>
                            <td>$row->actual_qty</td>
                            <td>$row->received_qty</td>
                            <td>$row->delivery_date</td>
                            <td><a href='#' class='notify_item btn btn-default' schedue-id='$row->id' data-toggle='modal' data-target='#notifyModal'>Notify</a></td>
                        </tr>";
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
            $response['totalQty'] = $totalQty;
        } else {
            $response['html'] = '';
            $response['status'] = 'fail';
            $response['message'] = 'No schedule data';
            $response['totalQty'] = '0';
        }


        //echo '<pre>'; print_r($data); exit;


        echo json_encode($response);
    }

    public function getSchedulelist($id = null)
    {
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        $response = ['status' => 0, 'message' => '', 'totalQty' => ''];
        $data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id, 'status' => 1, 
        //'PoItemSchedules.id not in (select po_schedule_id from asn_footers where po_footer_id ='.$id.')'
        ]]);
        
        //print_r($data); exit;
        if ($data->count() > 0) {
            $totalQty = 0;
            foreach ($data as $row) {
                $totalQty += $row->actual_qty;
                $row->delivery_date = $row->delivery_date->i18nFormat('dd-MM-YYYY');
            }
            $response['status'] = 1;
            $response['message'] = $data;
            $response['totalQty'] = $totalQty;
        } else {
            $response = ['status' => 0, 'message' => 'No schedule data', 'totalQty' => 0];
        }
        // echo '<pre>'; print_r(json_encode($response)); exit;
        echo json_encode($response);
    }

    public function getScheduleMessages($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("ItemScheduleMessages");

        $data = $this->ItemScheduleMessages->find()

            ->select(['ItemScheduleMessages.message', 'ItemScheduleMessages.added_date', 'fullname' => 'CONCAT(Users.first_name,  " ",  Users.last_name )'])
            ->Contain(['Users'])
            ->where(['ItemScheduleMessages.schedule_id' => $id]);


        if ($data->count() > 0) {

            $html = '';

            foreach ($data as $row) {
                $html .= "<div class='past-msg'>
                <div class='row m-2'>
                <div class='col-md-12'>
                <div class='d-flex justify-content-between'>
                <div class='c-name'><b>$row->fullname</b></div>
                <div class='c-adde-ddate'><i>$row->added_date</i></div>
                </div>
                <div class='c-msg'>$row->message</div>
                </div>
                </div>
                </div> ";
            }


            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;
        } else {
            $response['status'] = 'fail';
            $response['message'] = 'no record';
            $response['html'] = '';
        }

        echo json_encode($response);
    }

    public function saveScheduleRemarks()
    {
        $session = $this->getRequest()->getSession();
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("ItemScheduleMessages");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $data = array();
                $data['schedule_id'] = $this->request->getData('schedule_id');
                $data['user_id'] = $session->read('id');
                $data['message'] = $this->request->getData('message');
                $PoItemSchedule = $this->ItemScheduleMessages->newEmptyEntity();

                $PoItemSchedule = $this->ItemScheduleMessages->patchEntity($PoItemSchedule, $data);
                //echo '<pre>'; print_r($PoItemSchedule); exit();
                if ($this->ItemScheduleMessages->save($PoItemSchedule)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }

    public function upload()
    {
        $response['status'] = 0;
        $response['message'] = 'upload fail';
        $this->autoRender = false;
        
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

                    //echo '<pre>'; print_r($worksheet); exit;
                    $this->loadModel('VendorTemps');
                    $this->loadModel('PoHeaders');
                    $this->loadModel('PoFooters');
                    $this->loadModel('PoItemSchedules');
                    
                    $tmp = [];
                    
                    for ($row = 2; $row <= $highestRow; ++$row) {
                        $vendorError = false;
                        $poError = false;
                        $poItemError = false;
                        $datas = [];
                        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                            $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                            if($value){
                                if($col == 1) {
                                    $tmp['sap_vendor_code'] = $value;
                                    $datas['sap_vendor_code'] = $value;

                                    if(!$this->VendorTemps->exists(['sap_vendor_code' => str_pad((string)$value, 10, "0", STR_PAD_LEFT)])) {
                                        $vendorError = true;
                                    }

                                } else if($col == 2) {
                                    $poHeaderId = $this->PoHeaders->find('list')
                                    ->select(['id'])
                                    ->where(['po_no' => $value])
                                    ->first();
                                    $tmp['po_header_id'] = $poHeaderId ? $poHeaderId : null;
                                    $datas['po_no'] = $value;
                                    if(!$poHeaderId) {
                                        $poError = true;
                                    }
                                } else if($col == 3) {
                                    if(!$poError) {
                                        $poFooterId = $this->PoFooters->find('list')
                                        ->select(['id'])
                                        ->where(['po_header_id' => $tmp['po_header_id'], 'item' => str_pad((string)$value, 5, "0", STR_PAD_LEFT)])
                                        ->first();
                                        $tmp['po_footer_id'] = $poFooterId ? $poFooterId : null;
                                        if(!$poFooterId) {
                                            $poItemError = true;
                                        }
                                    } else {
                                        $tmp['po_footer_id'] = null;
                                    }

                                    $datas['item_no'] = $value;
                                    
                                } else if($col == 4){
                                    $datas['material'] = $value;
                                } else if($col == 5){
                                    $tmp['actual_qty'] = $value;
                                    $datas['schedule_qty'] = $value;
                                } else if($col == 6){
                                    $tmp['delivery_date'] = date('Y-m-d', strtotime(trim($value)));
                                    $datas['delivery_date'] = $value;
                                }
                            }
                        }

                        $datas['error'] = '';
                        if($vendorError) {
                            $datas['error'] = 'Invalid Vendor code';
                        } 
                        if($poError) {
                            $datas['error'] = 'PO Detail not found';
                        } 
                        if($poItemError) {
                            $datas['error'] = 'Item Detail not found';
                        } 

                        if(empty($datas['error'])) {
                            $uploadData[] = $tmp; 
                            
                            $PoItemSchedule = $this->PoItemSchedules->newEmptyEntity();
                            $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $tmp);
                            if ($this->PoItemSchedules->save($PoItemSchedule)) {
                                $datas['error'] = "Schedule created";
                            } else {
                                $datas['error'] = "Fail to create schedule";
                            }

                            //echo '<pre>'; print_r($uploadData); exit;
                            /*if($this->PoItemSchedules->exists(['po_header_id' => $tmp['po_header_id'], 'po_footer_id' => $tmp['po_footer_id'], 'delivery_date' => $tmp['delivery_date'], 'status' => 1])) {
                                $datas['error'] = 'Schedule already created';
                            } else {
                                $PoItemSchedule = $this->PoItemSchedules->newEmptyEntity();
                                $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $tmp);
                                if ($this->PoItemSchedules->save($PoItemSchedule)) {
                                    $datas['error'] = "Schedule created";
                                } else {
                                    $datas['error'] = "Fail to create schedule";
                                }
                            } */
                        }

                        $showData[] = $datas;
                    }

                    $response['status'] = 1;
                    $response['message'] = 'uploaded Successfully';
                    $response['data'] = $showData;
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

}
