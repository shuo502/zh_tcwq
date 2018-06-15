<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$storeid=$_COOKIE["storeid"];
$gtime=date("Y-m-d");
$pageindex = max(1, intval($_GPC['page']));
$pagesize=30;
if(!empty($_GPC['time'])){

$gtime=$_GPC['time'];

}
$sql=" select a.* from (select  id,hb_money,hb_num,hb_type,hb_random,FROM_UNIXTIME(sh_time) as time  from".tablename('zhtc_information')." where uniacid={$_W['uniacid']} and state=2 and hb_money>0) a where time like '%{$gtime}%' ";
//$tzinfo=pdo_fetchall($sql5);

$total=pdo_fetchcolumn("SELECT count(*) from (select  id,hb_money,hb_num,hb_type,hb_random,FROM_UNIXTIME(sh_time) as time  from".tablename('zhtc_information')." where uniacid={$_W['uniacid']} and state=2 and hb_money>0) a where time like '%{$gtime}%'");

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$tzinfo=pdo_fetchall($select_sql);
$pager = pagination($total, $pageindex, $pagesize);
/*$jrhb=0;
if($tzinfo){
foreach($tzinfo as $v){
	if($v['hb_random']==1){
		$jrhb+=$v['hb_money'];
	}
	if($v['hb_random']==2){
		$jrhb+=$v['hb_money']*$v['hb_num'];
	}
}
}*/

include $this->template('web/hbdata');