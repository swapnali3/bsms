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
        $this->conn = ftp_connect('apardms.co.in');
        ftp_login($this->conn, 'portal', '4d={4DC<rew3');
        ftp_pasv($this->conn, true);
        return $this->conn;
    }

    function getList($conn) {
        ftp_chdir($conn, '/DEV/TO_PORTAL'); 
        $result = ftp_nlist($conn, '');
        return $result;
    }

    function downloadFile($conn, $fileName) {
        ftp_chdir($conn, '/DEV/TO_PORTAL'); 
        if(ftp_size($conn, $fileName) > 0) {
            ob_start();
            $result = ftp_get($conn, "php://output", $fileName);
            $data = ob_get_contents();
            ob_end_clean();
            return $data;
        }
        return false;
    }

    function uploadFile($conn, $content, $fileName) {
        ftp_chdir($conn,'/DEV/TO_SAP'); 
        $temp = tmpfile();
        fwrite($temp, $content);
        $path = stream_get_meta_data($temp)['uri'];
        return ftp_put($conn, $fileName, $path);
        fclose($temp); 
    }

    function removeFile($conn, $fileName) {
        ftp_chdir($conn,'/DEV/TO_PORTAL'); 
        return ftp_delete($conn, $fileName);
    }
}

?>