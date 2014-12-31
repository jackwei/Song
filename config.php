<?php
/*
*
*配置文件
*
***/
error_reporting(-1);
session_start();
set_time_limit(0);
header("Content-type : text/html; charset=utf-8");
/*数据库配置*/

define('SAE_MYSQL_HOST_M', '127.0.0.1');
define('SAE_MYSQL_PORT', '3306');
define('SAE_MYSQL_USER', 'root');
define('SAE_MYSQL_PASS', 'root');
define('SAE_MYSQL_DB', 'lovesong');


/**后台用户**/
define("ADMIN",'admin');
define("ADMIN_PWD",'admin');

define("API_KEY", "98ce803af02404bbf9ca654b1de17c5a");
define("API_SECRET", "fb1cd26b8320d36dfeb775cbb90151ed");
/*中奖信息*/
$LotteryInfo = array(
	'percount'=>1000,
	'level1_rate'=>array(22100, 20000),  /* 10元话费，每天10个 */
	'level1_cnt'=>10,
	'level2_rate'=>array(6633, 6600),    /* 5元话费，每天50个 */
	'level2_cnt'=>50,
	'level3_rate'=>array(6633, 6600),    /* 50元话费，每天3个 */
	'level3_cnt'=>3,
	'level4_rate'=>array(6633, 6600),    /*冰箱专用吸附杀菌除味保鲜盒，每天30个*/
	'level4_cnt'=>30,
	'level5_rate'=>array(30, 6600),    /* 洗衣机专用桶洗剂，每天30个  */ 
	'level5_cnt'=>30,
	'level6_rate'=>array(2, 6600),    /* 净芯杯，每天2个 */ 
	'level6_cnt'=>2,
);

?>