<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('zhtc_system',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){           
    $data['is_hyset']=$_GPC['is_hyset']; 
    $data['is_tel']=$_GPC['is_tel'];
    $data['uniacid']=$_W['uniacid'];    
    if($_GPC['id']==''){                
        $res=pdo_insert('zhtc_system',$data);
        if($res){
            message('添加成功',$this->createWebUrl('yellowcheck',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('zhtc_system', $data, array('id' => $_GPC['id']));
        if($res){
            message('编辑成功',$this->createWebUrl('yellowcheck',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/yellowcheck');