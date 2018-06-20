<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
define('IN_MOBILE', true);
require '../../../../framework/bootstrap.inc.php';
global $_W, $_GPC;
$input = file_get_contents('php://input');
$isxml = true;
if (!empty($input) && empty($_GET['out_trade_no'])) {
	$obj = isimplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);
	$res = $data = json_decode(json_encode($obj), true);
	if (empty($data)) {
		$result = array(
			'return_code' => 'FAIL',
			'return_msg' => ''
		);
		echo array2xml($result);
		exit;
	}
	if ($data['result_code'] != 'SUCCESS' || $data['return_code'] != 'SUCCESS') {
		$result = array(
			'return_code' => 'FAIL',
			'return_msg' => empty($data['return_msg']) ? $data['err_code_des'] : $data['return_msg']
		);
		echo array2xml($result);
		exit;
	}
	$get = $data;
} else {
	$isxml = false;
	$get = $_GET;
}
load()->web('common');
load()->model('mc');
load()->func('communication');
$_W['uniacid'] = $_W['weid'] = intval($get['attach']);

$_W['uniaccount'] = $_W['account'] = uni_fetch($_W['uniacid']);
$_W['acid'] = $_W['uniaccount']['acid'];
$paySetting = uni_setting($_W['uniacid'], array('payment'));
if($res['return_code'] == 'SUCCESS' && $res['result_code'] == 'SUCCESS' ){
	$logno = trim($res['out_trade_no']);
	if (empty($logno)) {
		exit;
	}
$str=$_W['siteroot'];
	$n = 0;
for($i = 1;$i <= 3;$i++) {
    $n = strpos($str, '/', $n);
    $i != 3 && $n++;
}
$url=substr($str,0,$n);

	$order=pdo_get('zhtc_distribution',array('code'=>$logno));

	$hdorder=pdo_get('zhtc_joinlist',array('code'=>$logno));
	if($order['pay_state']==1){
		$yjset=pdo_get('zhtc_yjset',array('uniacid'=>$uniacid));
		if($yjset['type']==1){
          $money=$order['money']*$yjset['typer']/100;
	    }else{
	      $money=$order['money']*$yjset['sjper']/100;
	    }
		pdo_update('zhtc_account',array('money +='=>$money),array('cityname'=>$order['cityname']));
		pdo_update('zhtc_distribution',array('pay_state'=>2),array('code'=>$logno));

		file_get_contents("".$url."/app/index.php?i=".$order['uniacid']."&c=entry&a=wxapp&do=Fx&m=zh_tcwq&user_id=".$order['user_id']."&money=".$order['money']);//分销
	}
	if($hdorder['state']==1){
		 pdo_update('zhtc_activity',array('sign_num +='=>1),array('id'=>$hdorder['act_id'])); 
		$system=pdo_get('zhtc_system',array('uniacid'=>$hdorder['uniacid']));
		if($system['is_bm']==1){
			pdo_update('zhtc_joinlist',array('state'=>3),array('code'=>$logno));
		}else{
			pdo_update('zhtc_joinlist',array('state'=>2),array('code'=>$logno));
		}
		file_get_contents("".$url."/app/index.php?i=".$hdorder['uniacid']."&c=entry&a=wxapp&do=Fx&m=zh_tcwq&user_id=".$hdorder['user_id']."&money=".$hdorder['money']);//分销
		file_get_contents("".$url."/app/index.php?i=".$hdorder['uniacid']."&c=entry&a=wxapp&do=ActYj&m=zh_tcwq&act_id=".$hdorder['act_id']."&money=".$hdorder['money']);//城市佣金
	}
	$result = array(
		'return_code' => 'SUCCESS',
		'return_msg' => 'OK'
	);
	echo array2xml($result);
	exit;
	
	}else{
		//订单已经处理过了
		$result = array(
			'return_code' => 'SUCCESS',
			'return_msg' => 'OK'
		);
		echo array2xml($result);
		exit;
	}
