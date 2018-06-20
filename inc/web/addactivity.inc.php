<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('zhtc_activity',array('id'=>$_GPC['id']));
$type=pdo_getall('zhtc_acttype',array('uniacid'=>$_W['uniacid'],'state'=>1),array(),'','num asc');
if($info['img']){
	if(strpos($info['img'],',')){
		$img= explode(',',$info['img']);
	}else{
		$img=array(
			0=>$info['img']
			);
	}
}
if(checksubmit('submit')){
	if(!$_GPC['title']){
		message('活动标题不能为空','','error');
	}
	if(!$_GPC['logo']){
		message('活动logo不能为空','','error');
	}
	if($_GPC['img']){
		$data['img']=implode(",",$_GPC['img']);
	}else{
		$data['img']='';
	}
	$data['title']=$_GPC['title'];
	$data['logo']=$_GPC['logo'];
	$data['details']=html_entity_decode($_GPC['details']);
	$data['number']=$_GPC['number'];
	$data['time']=date('Y-m-d H:i:s');
	$data['start_time']=$_GPC['start_time'];
	$data['end_time']=$_GPC['end_time'];
	$data['uniacid']=$_W['uniacid'];
	$data['money']=$_GPC['money'];
	$data['type_id']=$_GPC['type_id'];
	$data['tel']=$_GPC['tel'];
	$data['address']=$_GPC['address'];
	$data['coordinate']=$_GPC['coordinate'];
	$data['num']=$_GPC['num'];
	$data['view']=$_GPC['view'];
	$data['is_bm']=$_GPC['is_bm'];
	$data['cityname']=$_GPC['cityname'];
	if($_GPC['id']){
		$res = pdo_update('zhtc_activity', $data,array('id'=>$_GPC['id']));
	if($res){
		message('修改成功',$this->createWebUrl('activity',array()),'success');
	}else{
		message('修改失败','','error');
	}
	}else{
	$res = pdo_insert('zhtc_activity', $data);
	if($res){
		message('新增成功',$this->createWebUrl('activity',array()),'success');
	}else{
		message('新增失败','','error');
	}	
	}
	
}
include $this->template('web/addactivity');