<?php
/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装） 
 * @return mixed
 */
function getIP() { 
	if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) 
	   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
	else if (@$_SERVER["HTTP_CLIENT_IP"]) 
	   $ip = $_SERVER["HTTP_CLIENT_IP"]; 
	else if (@$_SERVER["REMOTE_ADDR"]) 
	   $ip = $_SERVER["REMOTE_ADDR"]; 
	else if (@getenv("HTTP_X_FORWARDED_FOR"))
	   $ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (@getenv("HTTP_CLIENT_IP")) 
	   $ip = getenv("HTTP_CLIENT_IP"); 
	else if (@getenv("REMOTE_ADDR")) 
	   $ip = getenv("REMOTE_ADDR"); 
	else 
	   $ip = "Unknown"; 
	return $ip; 
}

/**
 * 手机号码打码
 *
 */
function markPhone($phone) {
    $pattern = "/(1\d{1,2})\d\d(\d{0,2})/";
    $replacement = "\$1****\$3";
    return preg_replace($pattern, $replacement, $phone);
}

/* 获取微信信息 */
function getWeixinUserInfo($openid) {
//	$openid = 'oRU2njpNj4ioGc07l_rHaxUL_X1A';
	
	$timestamp = strtotime(date('Y-m-d H:i:s'));
	
	$tmpSig = md5(API_KEY . API_SECRET . $timestamp);
		
	$url = 'http://api.socialjia.com/index.php?apiKey='.API_KEY.'&timestamp='.$timestamp.'&sig='.$tmpSig.'&a=User&m=get&openid='.$openid;
	
	$html = @file_get_contents($url);
	$ret = json_decode($html);
	
	if($ret->error == 0){
		return $ret->data->subscribe;
	}else{
		return 0;
	}
	
}
?>
