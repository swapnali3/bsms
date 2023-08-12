<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use phpseclib3\Net\SFTP;


class FtpComponent extends Component
{
    
    var $conn;
    function connection() {
        $this->conn = new SFTP('182.66.82.11');
        $this->conn->login('root', 'pro@2017');
        $this->conn->chdir('/vendor_portal_upload'); 
        return $this->conn;
    }

    function getList($conn) {
        $result = $conn->rawlist();
        return $result;
    }

    function getMasterData($conn, $fileName) {
        if($conn->file_exists($fileName)) {
            //$t = $conn->stat($fileName);
            return $conn->get($fileName, false, 0);
        }

        return false;
    }

}

?>