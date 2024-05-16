<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Core\Configure;


/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockController extends ApiAppController
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

        ini_set('default_socket_timeout', '120');
    }

    public function genStockVisibility() {     
        try {
            $conn = ConnectionManager::get('default');
            $header = array('Company_Code', 'Vend_Mat', 'Vendor_Code', 'Vendor_Name', 'Material_Code', 'Material_Desc', 'Material_Type', 'Material_Segment', 'Material_Packsize', 'Opening_Stk_VE', 'Prod_Stk_VE', 'Dispatch_Stk_VE', 'Opening_InTrans_Stk_VE', 'Dispacted_Stk_VE', 'MIGO_STK_Plant');
            
            $query = $conn->execute("SELECT * FROM stock_visibility");
            $result = $query->fetchAll('assoc');
            
            $ftpConn = $this->Ftp->connection();
        
            $content = implode(',', $header);
            foreach($result as $row) {
                $content .= "\n";
                $content .= implode(',', $row);
                $content .= "\n";
            }
        
            $this->Ftp->uploadcsvFile($ftpConn, $content, 'Data.csv');
            echo 'Successful'; exit;
       
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }
    }
}