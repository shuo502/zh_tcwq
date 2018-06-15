<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
	$info = pdo_get('zhtc_yellowtype2',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
	$type = pdo_getall('zhtc_yellowtype',array('uniacid' => $_W['uniacid']));
		if(checksubmit('submit')){
			
			$data['name']=$_GPC['name'];
			$data['num']=$_GPC['num'];
			$data['state']=$_GPC['state'];
			$data['uniacid']=$_W['uniacid'];
			if($_GPC['id']==''){
			$data['type_id']=$_GPC['type_id'];				
				$res=pdo_insert('zhtc_yellowtype2',$data);
				if($res){
					message('添加成功',$this->createWebUrl('yellowtype',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('zhtc_yellowtype2', $data, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl('yellowtype',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addyellowtype2');