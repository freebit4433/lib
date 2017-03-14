<?php
namespace Org\Util;
/**
 *
 * 导出csv文件操作类
 * @category   ORG
 * @package  ORG
 * @subpackage
 * @author    wenhao.zhang
 * @timeStamp 18:24 2017/2/5
 * @version
 */

class ExportCsv {

    static function export($file_name = '',$table = array(),$header = array()){
        $file_name = $file_name ? $file_name : 'default.csv';
        if(!is_array($table) || (count($table) == 0)){
            echo 'unvalid data';
            exit();
        }
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename={$file_name}");
        header("Content-Transfer-Encoding: binary");

        ob_start();
        $df = fopen("php://output", 'w');
        if(is_array($header) && (count($header) != 0)){
            $header = self::encodeSwitch($header);
            fputcsv($df, $header);
        }
        $table = self::encodeSwitch($table);
        foreach($table as $line){
            fputcsv($df, $line);
        }
        fclose($df);
        ob_end_flush();
    }

    static function encodeSwitch($a = array()){
        $re = array();
        if(!is_array($a)){
            return false;
        }
        foreach($a as $k => $v){
            if(is_array($v)){
                $re[] = self::encodeSwitch($v);
            }else{
                $re[] = mb_convert_encoding($v, 'gbk', 'utf-8');
            }
        }
        return $re;
    }

}

?>