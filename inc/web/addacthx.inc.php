<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$sql =" select id,name from ".tablename('zhtc_user')." where uniacid={$_W['uniacid']} and name!=''  and id not in (select user_id  from" .tablename('zhtc_acthxlist')."where act_id={$_GPC['act_id']})";  
$user=pdo_fetchall($sql);
	$info = pdo_get('zhtc_acthxlist',array('id'=>$_GPC['id']));
		if(checksubmit('submit')){
			$data['user_id']=$_GPC['user_id'];
			$data['act_id']=$_GPC['act_id'];
			if($_GPC['id']==''){				
				$res=pdo_insert('zhtc_acthxlist',$data);
				if($res){
					message('添加成功',$this->createWebUrl('acthx',array('act_id' => $_GPC['act_id'])),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('zhtc_acthxlist', $data, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl('acthx',array('act_id' => $_GPC['act_id'])),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addacthx');