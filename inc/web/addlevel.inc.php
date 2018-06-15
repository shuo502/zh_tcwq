<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
	$info = pdo_get('zhtc_fxlevel',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
		if(checksubmit('submit')){
			if(!$_GPC['name']){
				message('请输入名称!','','error');
			}
			if(!$_GPC['commission']){
				message('请输入一级佣金!','','error');
			}
			if(!$_GPC['commission2']){
				message('请输入二级级佣金!','','error');
			}
			$data['money']=$_GPC['money'];
			$data['commission']=$_GPC['commission'];
			$data['commission2']=$_GPC['commission2'];
			$data['num']=$_GPC['num'];
			$data['name']=$_GPC['name'];
			$data['uniacid']=$_W['uniacid'];
			if($_GPC['id']==''){				
				$res=pdo_insert('zhtc_fxlevel',$data);
				if($res){
					message('添加成功',$this->createWebUrl('level',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('zhtc_fxlevel', $data, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl('level',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addlevel');