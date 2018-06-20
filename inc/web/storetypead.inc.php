<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
if($_GPC['type']==1){
	$sql="select * from".tablename('zhtc_storetypead')." where type_id={$_GPC['type_id']} ORDER BY orderby ASC";
	$total=pdo_fetchcolumn("select count(*) from".tablename('zhtc_storetypead')." where type_id={$_GPC['type_id']} ");
}elseif($_GPC['type']==2){
	$sql="select * from".tablename('zhtc_storetypead')." where type_id2={$_GPC['type_id']} ORDER BY orderby ASC";
	$total=pdo_fetchcolumn("select count(*) from".tablename('zhtc_storetypead')." where type_id2={$_GPC['type_id']} ");
}

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql);
$pager = pagination($total, $pageindex, $pagesize);
//$list=pdo_getall('zhtc_storetypead',array('uniacid'=>$_W['uniacid']),array(),'','orderby ASC');
if($_GPC['op']=='delete'){
	$res=pdo_delete('zhtc_storetypead',array('id'=>$_GPC['id']));
	if($res){
		 message('删除成功！', $this->createWebUrl('storetypead',array('type_id'=>$_GPC['type_id'],'type'=>$_GPC['type'])), 'success');
		}else{
			  message('删除失败！','','error');
		}
}
if($_GPC['status']){
	$data['status']=$_GPC['status'];
	$res=pdo_update('zhtc_storetypead',$data,array('id'=>$_GPC['id']));
	if($res){
		 message('编辑成功！', $this->createWebUrl('storetypead',array('type_id'=>$_GPC['type_id'],'type'=>$_GPC['type'])), 'success');
		}else{
			  message('编辑失败！','','error');
		}
}
include $this->template('web/storetypead');