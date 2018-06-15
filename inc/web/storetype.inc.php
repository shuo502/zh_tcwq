<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list = pdo_getall('zhtc_storetype',array('uniacid' => $_W['uniacid']),array(),'','num ASC');

 $type=pdo_getall('zhtc_storetype',array('uniacid'=>$_W['uniacid']),array(),'','num asc');
$type2=pdo_getall('zhtc_storetype2',array('uniacid'=>$_W['uniacid']),array(),'','num asc');



      foreach($list as $key => $value){
         $data=$this->getSon($value['id'],$type2);
         $list[$key]['ej']=$data;
       
    }
    // print_r(json_encode($list));die;
if($_GPC['op']=='delete'){
    $res=pdo_delete('zhtc_storetype',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('storetype',array()),'success');
    }else{
        message('删除失败','','error');
    }
}
if($_GPC['op']=='delete2'){
    $res=pdo_delete('zhtc_storetype2',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('storetype',array()),'success');
    }else{
        message('删除失败','','error');
    }
}
if($_GPC['op']=='change'){
	 $res=pdo_update('zhtc_storetype',array('state'=>$_GPC['state']),array('id'=>$_GPC['id']));
    if($res){
        message('操作成功',$this->createWebUrl('storetype',array()),'success');
    }else{
        message('操作失败','','error');
    }
}
if($_GPC['op']=='change2'){
     $res=pdo_update('zhtc_storetype2',array('state'=>$_GPC['state']),array('id'=>$_GPC['id']));
    if($res){
        message('操作成功',$this->createWebUrl('storetype',array()),'success');
    }else{
        message('操作失败','','error');
    }
}
include $this->template('web/storetype');