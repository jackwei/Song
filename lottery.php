<?php
include("./config.php");
include("./db/db.php");
include("./util.php");

class Lottery {
		
	public function route() {
		$a = @$_GET['a'];
	    if (method_exists('Lottery', $a)) {
    	    $rst = $this->$a();
    	    echo json_encode($rst);
    	}else{
        	header("HTTP/1.0 404 Not Found");
    	}
	}
	
	/* 获取微信信息 */
	public function getWeixinUserInfo($openid) {
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

	/* 随机奖品  */
	public function lucky() {
		global $LotteryInfo;
		$openid = $_GET['openid'];
		$ip = getIP();

		if ($openid == '') {
			return array('code'=>201,'msg'=>'请登录微信并关注后参与抽奖信息');
		}
		
		/* $subscribe=$this->getWeixinUserInfo($openid);
		
		if($subscribe == 0){
			return array('code'=>202,'msg'=>'请关注后参与抽奖信息');
		} */

		$now = date('Y-m-d');
		$db = new DB();
		$cnt = $db->sql_query_row("select count(1) as cnt from lottery_history where openid='$openid' and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
		if ($cnt['cnt'] > $LotteryInfo['percount']) {
			return array('code'=>101, 'msg'=>'今天已经超次数了，下次再来吧');
		}
		$db->insert("lottery_history", array(
			'openid'=>$openid,
			'create_time'=>date("Y-m-d H:i:s"),
			'craete_ip'=>$ip
		));

		$cnt = $db->sql_query_row("select count(1) as cnt from lottery where openid='$openid'");
		if ($cnt['cnt'] > 0) {
			return array('code'=>102, 'msg'=>'您已中过奖，留给别人吧！');		
		}

		$prize =  mt_rand(1,6);
		
		if ($prize == 1) {
			$seed = mt_rand(0, $LotteryInfo['level1_rate'][1]);
			$range = $LotteryInfo['level1_rate'][0];
			$level = 1;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=1 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level1_cnt'];
		} else if($prize == 2) {
			$seed = mt_rand(0, $LotteryInfo['level2_rate'][1]);
			$range = $LotteryInfo['level2_rate'][0];
			$level = 2;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=2 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level2_cnt'];
		}else if($prize == 3) {
			$seed = mt_rand(0, $LotteryInfo['level3_rate'][1]);
			$range = $LotteryInfo['level3_rate'][0];
			$level = 3;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=3 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level3_cnt'];
		}else if($prize == 4) {
			$seed = mt_rand(0, $LotteryInfo['level4_rate'][1]);
			$range = $LotteryInfo['level4_rate'][0];
			$level = 4;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=4 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level4_cnt'];
		}else if($prize == 5) {
			$seed = mt_rand(0, $LotteryInfo['level5_rate'][1]);
			$range = $LotteryInfo['level5_rate'][0];
			$level = 5;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=5 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level5_cnt'];
		}else if($prize == 6) {
			$seed = mt_rand(0, $LotteryInfo['level6_rate'][1]);
			$range = $LotteryInfo['level6_rate'][0];
			$level = 6;
			$cnt = $db->sql_query_row("select count(1) as cnt from lottery where level=6 and DATE_FORMAT(create_time, '%Y-%m-%d') = '$now'");
			$maxcnt = $LotteryInfo['level6_cnt'];
		}
		
		if ($seed < $range && $cnt['cnt'] < $maxcnt) {
			$db->insert("lottery", array(
				'level'=>$level,
				'openid'=>$openid,
				'create_time'=>date("Y-m-d H:i:s"),
				'create_ip'=>$ip
			));
			return array('code'=>0, 'msg'=>'恭喜您', 'level'=>$level);
		}
		return array('code'=>103, 'msg'=>'您未中奖！');
	}

	/* 保存联系信息 */
	public function addInfo() {
		$openid = $_GET['openid'];
		$ip = getIp();

		$name = $_GET['name'];
		$phone = $_GET['phone'];
		$address = $_GET['address'];
		if ($name == '' || $phone == '' || $address == '') {
			return array('code'=>104, 'msg'=>'参数错误！');
		}

		$db = new DB();
		$cnt = $db->sql_query_row("select count(1) as cnt from lottery where openid='$openid'");
		
		if ($cnt['cnt'] == 0) {
			return array('code'=>103, 'msg'=>'您未中奖！');
		}
		
		/* $sel_name = $db->sql_query_row("select name from lottery where openid='$openid'");
		if ($sel_name['name'] != '') {
			return array('code'=>105, 'msg'=>'您信息已提交！');
		} */
		
		$db->update("lottery", array(
			'name'=>$name,
			'phone'=>$phone,
			'address'=>$address,
			'modify_time'=>date("Y-m-d H:i:s"),
			'modify_ip'=>$ip
		),"openid='$openid' and phone=''");
		return array('code'=>0, 'msg'=>'您信息已提交！');
	}
	
	/* 保存联系人电话 */
	public function addPhone() {
		$openid = $_GET['openid'];
		$ip = getIp();
	
		$phone = $_GET['phone'];
		if ($phone == '') {
			return array('code'=>104, 'msg'=>'参数错误！');
		}
	
		$db = new DB();
		$cnt = $db->sql_query_row("select count(1) as cnt from lottery where openid='$openid'");
	
		if ($cnt['cnt'] == 0) {
			return array('code'=>103, 'msg'=>'您未中奖！');
		}
	
		/* $sel_name = $db->sql_query_row("select name from lottery where openid='$openid'");
			if ($sel_name['name'] != '') {
			return array('code'=>105, 'msg'=>'您信息已提交！');
			} */
	
		$db->update("lottery", array(
				'phone'=>$phone,
				'modify_time'=>date("Y-m-d H:i:s"),
				'modify_ip'=>$ip
		),"openid='$openid' and phone='' ");
		return array('code'=>0, 'msg'=>'您信息已提交！');
	}
}

$lottery = new Lottery();
$lottery->route();
