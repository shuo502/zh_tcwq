<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
	$info = pdo_get('zhtc_type',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
		if(checksubmit('submit')){
			$data['img']=$_GPC['img'];
			$data['num']=$_GPC['num'];
			$data['type_name']=$_GPC['type_name'];
			$data['money']=$_GPC['money'];
			$data['sx_money']=$_GPC['sx_money'];
			$data['state']=$_GPC['state'];
			$data['uniacid']=$_W['uniacid'];
			if($_GPC['id']==''){				
				$res=pdo_insert('zhtc_type',$data);
				if($res){
					message('添加成功',$this->createWebUrl('fenlei',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('zhtc_type', $data, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl('fenlei',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addtype');