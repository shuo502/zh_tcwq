<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('zhtc_system',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){           
	$data['tz_audit']=$_GPC['tz_audit'];
	 
	$data['tz_num']=$_GPC['tz_num']; 
    $data['ft_num']=$_GPC['ft_num']; 
    // $data['hb_sxf']=$_GPC['hb_sxf'];   
    // $data['hb_img']=$_GPC['hb_img']; 
    // $data['hbbj_img']=$_GPC['hbbj_img']; 
    // $data['hb_content']=$_GPC['hb_content'];
    $data['tzmc']=$_GPC['tzmc'];
	$data['ft_xuz']=html_entity_decode($_GPC['ft_xuz']); 


    $data['is_tzdz']=$_GPC['is_tzdz'];    
	$data['uniacid']=$_W['uniacid'];    
    if($_GPC['id']==''){                
        $res=pdo_insert('zhtc_system',$data);
        if($res){
            message('添加成功',$this->createWebUrl('tzcheck',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('zhtc_system', $data, array('id' => $_GPC['id']));
        if($res){
            message('编辑成功',$this->createWebUrl('tzcheck',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/tzcheck');