<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list = pdo_getall('zhtc_fxlevel',array('uniacid' => $_W['uniacid']),array(),'','num ASC');
if($_GPC['id']){
    $res=pdo_delete('zhtc_fxlevel',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('level',array()),'success');
    }else{
        message('删除失败','','error');
    }
}
include $this->template('web/level');