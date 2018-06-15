<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('zhtc_yellowstore',array('id'=>$_GPC['id']));
//$area=pdo_getall('zhtc_area',array('uniacid'=>$_W['uniacid']));
$type=pdo_getall('zhtc_yellowtype',array('uniacid'=>$_W['uniacid'],'state'=>1),array(),'','num asc');
//入住类型
$typein=pdo_getall('zhtc_yellowset',array('uniacid'=>$_W['uniacid']));	
if($info['imgs']){
			if(strpos($info['imgs'],',')){
			$imgs= explode(',',$info['imgs']);
		}else{
			$imgs=array(
				0=>$info['imgs']
				);
		}
		}
        if(checksubmit('submit')){
        	if($_GPC['imgs']){
        		$data['imgs']=implode(",",$_GPC['imgs']);
        	}else{
        		$data['imgs']='';
        	}
        	$data['company_name']=$_GPC['company_name'];
        	$data['company_address']=$_GPC['company_address'];
        	$data['link_tel']=$_GPC['link_tel'];
        	$data['logo']=$_GPC['logo'];
        	$data['content']=$_GPC['content'];
        	//$data['coordinates']=$_GPC['op']['lat'].','.$_GPC['op']['lng'];
            $data['coordinates']=$_GPC['coordinates'];
        	$data['sort']=$_GPC['sort'];
            $data['views']=$_GPC['views'];
            $data['type_id']=$_GPC['type_id'];
            $data['type2_id']=$_GPC['type2_id'];
            $data['dq_time']=strtotime($_GPC['dq_time']);
            if($data['dq_time']<=time()){
                $data['time_over']=1;
            }else{
               $data['time_over']=2; 
            }
            $data['cityname']=$_GPC['cityname'];
        	$res = pdo_update('zhtc_yellowstore', $data, array('id' => $_GPC['id']));
        	if($res){
        		message('编辑成功',$this->createWebUrl('yellowstore',array()),'success');
        	}else{
        		message('编辑失败','','error');
        	}

        }
include $this->template('web/yellowstoreinfo');