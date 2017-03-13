<?php

//将数组转换为sql中需要IN查询的字符串
function implodeAndMark($a){
	$b = '';
	foreach($a as $v){
	    $b .= "'" . $v . "',";
	}
	$b = rtrim($b,',');
	return $b;
}



//获取毫秒时间戳
function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}


?>