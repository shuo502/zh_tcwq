<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$storeid=$_COOKIE["storeid"];
$gtime=date("Y-m-d");
if(!$_GPC['page']){
	$_GPC['page']=1;
}
$pageindex = max(1, intval($_GPC['page']));
$pagesize=15;
if(!empty($_GPC['time'])){

$gtime=$_GPC['time'];

}

//echo date("Y-m-d",1523534891);die();
if($_GPC['ordertype']==1){
	$sql=" select * from (select  a.money as xsmoney,time from (select  id,money,FROM_UNIXTIME(time) as time  from".tablename('zhtc_order')." where uniacid={$_W['uniacid']} and state in (2,3,4,5,7) ) a  where time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_storepaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_carpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money  as xsmoney,time from".tablename('zhtc_yellowpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%') xx order by xx.time desc";


$total=pdo_fetchcolumn("SELECT count(*) from (select  a.money as xsmoney,time from (select  id,money,FROM_UNIXTIME(time) as time  from".tablename('zhtc_order')." where uniacid={$_W['uniacid']} and state in (2,3,4,5,7)) a  where time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_storepaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money as xsmoney,time from".tablename('zhtc_carpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%' union all select money  as xsmoney,time from".tablename('zhtc_yellowpaylog')." where uniacid={$_W['uniacid']} and money>0 and  time like '%{$gtime}%') aa ");
}elseif($_GPC['ordertype']==2){
$sql="select  a.money as xsmoney,a.time,a.note,b.id,c.name  from".tablename('zhtc_tzpaylog'). " a"  . " left join " . tablename("zhtc_information") . " b on b.id=a.tz_id  " . " left join " . tablename("zhtc_user") . " c on b.user_id=c.id where a.uniacid={$_W['uniacid']} and  a.time like '%{$gtime}%' and a.note!='红包福利' order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} and  time like '%{$gtime}%' and note!='红包福利'");
}elseif($_GPC['ordertype']==3){
$sql="select  a.money as xsmoney,a.time,a.note,b.id,c.name  from".tablename('zhtc_storepaylog'). " a"  . " left join " . tablename("zhtc_store") . " b on b.id=a.store_id  " . " left join " . tablename("zhtc_user") . " c on b.user_id=c.id where a.uniacid={$_W['uniacid']} and  a.time like '%{$gtime}%' order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_storepaylog')." where uniacid={$_W['uniacid']} and  time like '%{$gtime}%' ");
}elseif($_GPC['ordertype']==4){
$sql="select  a.money as xsmoney,a.time,a.note,b.id,c.name  from".tablename('zhtc_tzpaylog'). " a"  . " left join " . tablename("zhtc_information") . " b on b.id=a.tz_id  " . " left join " . tablename("zhtc_user") . " c on b.user_id=c.id where a.uniacid={$_W['uniacid']} and  a.time like '%{$gtime}%' and a.note='红包福利' order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_tzpaylog')." where uniacid={$_W['uniacid']} and  time like '%{$gtime}%' and note='红包福利'");
}elseif($_GPC['ordertype']==5){
$zttime=strtotime($gtime)+60*60*24;
$jttime=strtotime($gtime);
$sql="select  a.money as xsmoney,a.time,a.id,b.name,c.name as level_name  from".tablename('zhtc_distribution'). " a"  . " left join " . tablename("zhtc_user") . " b on b.id=a.user_id " . " left join " . tablename("zhtc_fxlevel") . " c on a.level=c.id  where a.uniacid={$_W['uniacid']} and  a.time < ".$zttime." and a.pay_state=2 and a.time >= ".$jttime." order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_distribution')." where uniacid={$_W['uniacid']} and  time < ".$zttime." and pay_state=2 and time >= ".$jttime."");
}elseif($_GPC['ordertype']==6){
	$zttime=strtotime($gtime)+60*60*24;
$jttime=strtotime($gtime);
$sql=" select a.money as xsmoney,a.time,a.id,b.name from ".tablename('zhtc_order'). " a"  . " left join " . tablename("zhtc_user") . " b on b.id=a.user_id where a.uniacid={$_W['uniacid']} and a.state in (2,3,4,5,7) and a.time < ".$zttime." and  a.time >= ".$jttime;
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_order') ." where uniacid={$_W['uniacid']} and state in (2,3,4,5,7) and time < ".$zttime." and  time >= ".$jttime);
}
elseif($_GPC['ordertype']==7){
$sql="select  a.money as xsmoney,a.time,b.id,c.name  from".tablename('zhtc_yellowpaylog'). " a"  . " left join " . tablename("zhtc_yellowstore") . " b on b.id=a.hy_id  " . " left join " . tablename("zhtc_user") . " c on b.user_id=c.id where a.uniacid={$_W['uniacid']} and  a.time like '%{$gtime}%'  order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_yellowpaylog')." where uniacid={$_W['uniacid']} and  time like '%{$gtime}%'");
}elseif($_GPC['ordertype']==8){
$sql="select  a.money as xsmoney,a.time,b.id,c.name  from".tablename('zhtc_carpaylog'). " a"  . " left join " . tablename("zhtc_car") . " b on b.id=a.car_id  " . " left join " . tablename("zhtc_user") . " c on b.user_id=c.id where a.uniacid={$_W['uniacid']} and  a.time like '%{$gtime}%'  order by a.id DESC";
$total=pdo_fetchcolumn("SELECT count(*) from ".tablename('zhtc_carpaylog')." where uniacid={$_W['uniacid']} and  time like '%{$gtime}%'");
}

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$xsinfo=pdo_fetchall($select_sql);
$pager = pagination($total, $pageindex, $pagesize);


include $this->template('web/xsdatalist');