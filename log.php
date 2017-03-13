<?php


class log {
	static function setLog($massage){
		$log_path = './log.log';
	    $time = date('Y-m-d H:i:s');
	    $error_page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	    file_put_contents($log_path, "LOG TIME:".$time.PHP_EOL, FILE_APPEND);
	    file_put_contents($log_path, "LOG URL:".$error_page.PHP_EOL, FILE_APPEND);
	    if(is_array($massage)){
	        $massage = json_encode($massage);
	    }
	    file_put_contents($log_path, "LOG MESSAGE:".$massage.PHP_EOL.PHP_EOL, FILE_APPEND);
	}
}


?>