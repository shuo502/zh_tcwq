<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list = pdo_getall('zhtc_jftype',array('uniacid' => $_W['uniacid']),array(),'','num ASC');
if($_GPC['id']){
    $res=pdo_delete('zhtc_jftype',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('jftype',array()),'success');
    }else{
        message('删除失败','','error');
    }
}
include $this->template('web/jftype');