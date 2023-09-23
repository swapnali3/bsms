<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
//use phpseclib3\Net\SFTP;
//use phpseclib3\Net\FTP;


class FtpComponent extends Component
{
    var $conn;
    function connection() {
        $this->conn = new SFTP('apars4nlbplb.aparbi.com');
        $this->conn->login('portal', '4d={4DC<rew3');
        return $this->conn;
    }

    function getList($conn) {
        $this->conn->chdir('/DEV/TO_PORTAL'); 
        $result = $conn->rawlist();
        return $result;
    }

    function downloadFile($conn, $fileName) {
        $this->conn->chdir('/DEV/TO_PORTAL'); 
        if($conn->file_exists($fileName)) {
            return $conn->get($fileName, false, 0);
        }

        return false;
    }

    function uploadFile($conn, $content, $fileName) {
        $this->conn->chdir('/DEV/TO_SAP'); 
        return $conn->put($fileName, $content);
    }

    function removeFile($conn, $fileName) {
        $this->conn->chdir('/DEV/TO_PORTAL'); 
        return $conn->delete($fileName);
    }


}

?>