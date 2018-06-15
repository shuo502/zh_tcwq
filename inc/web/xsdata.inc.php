<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$storeid=$_COOKIE["storeid"];
$time=date("Y-m-d");
$where=" and  time like '%{$time}%'";
$where2=" where time like '%{$time}%'";
if(!empty($_GPC['time'])){
$start=strtotime($_GPC['time']['start']);
$end=strtotime($_GPC['time']['end']);
$where=" and  UNIX_TIMESTAMP(time)>=".$start." and UNIX_TIMESTAMP(time)<=".$end;
$where2=" where  UNIX_TIMESTAMP(time)>=".$start." and UNIX_TIMESTAMP(time)<=".$end;
}
$jrtmoney=0;
//今日销售金额
//今日订单销售金额
$sql7=" select  sum(a.money) as ordermoney from (select  id,money,FROM_UNIXTIME(time) as time  from".tablename('zhtc_order')." where uniacid={$_W['uniacid']} and state in (2,3,4,5,7)) a ".$where2;
$ordermoney=pdo_fetch($sql7);
//商家入驻的钱
$sql8=" select sum(money) as storemoney from".tablename('zhtc_storepaylog')." where uniacid={$_W['uniacid']} ".$where;
$storemoney=pdo_fetch($sql8);  
//帖子入驻加置顶
$sql9=" select sum(money) as tzmoney from".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} ".$where." and note!='红包福利' ";
$tzmoney=pdo_fetch($sql9); 

// //红包
// $sql13=" select sum(money) as hbmoney from".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} ".$where." and note='红包福利' ";
// $hbmoney=pdo_fetch($sql13); 



$sql5=" select a.* from (select  id,hb_money,hb_num,hb_type,hb_random,FROM_UNIXTIME(sh_time) as time  from".tablename('zhtc_information')." where uniacid={$_W['uniacid']} and state=2) a ".$where2;
$tzinfo=pdo_fetchall($sql5);
$jrtz=count($tzinfo);
$hbmoney=0;
if($tzinfo){
foreach($tzinfo as $v){
	if($v['hb_random']==1){
		$hbmoney+=$v['hb_money'];
	}
	if($v['hb_random']==2){
		$hbmoney+=$v['hb_money']*$v['hb_num'];
	}
}
}



//拼车发布的钱
$sql10=" select sum(money) as pcmoney from".tablename('zhtc_carpaylog')." where uniacid={$_W['uniacid']} ".$where." ";
$pcmoney=pdo_fetch($sql10); 
//114入驻的钱
$sql11=" select sum(money) as hymoney from".tablename('zhtc_yellowpaylog')." where uniacid={$_W['uniacid']} ".$where." ";
$hymoney=pdo_fetch($sql11);
//合伙人的钱
$zttime=strtotime(date("Y-m-d",strtotime("+1 day")));
$jttime=strtotime(date("Y-m-d"));
if(!empty($_GPC['time'])){
	$sql12=" select sum(money) as hhrmoney from".tablename('zhtc_distribution')." where uniacid={$_W['uniacid']} and pay_state=2".$where;
}else{
	$sql12=" select sum(money) as hhrmoney from".tablename('zhtc_distribution')." where uniacid={$_W['uniacid']} and  time < ".$zttime." and pay_state=2 and time >= ".$jttime;
}

$hhrmoney=pdo_fetch($sql12);  
//今日总金额
$jrtmoney=$ordermoney['ordermoney']+$storemoney['storemoney']+$tzmoney['tzmoney']+$pcmoney['pcmoney']+$hymoney['hymoney']+$hhrmoney['hhrmoney']+$hbmoney['hhrmoney'];
include $this->template('web/xsdata');