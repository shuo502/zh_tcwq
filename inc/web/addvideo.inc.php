<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
 $type=pdo_getall('zhtc_videotype',array('uniacid'=>$_W['uniacid']));
$system=pdo_get('zhtc_system',array('uniacid'=>$_W['uniacid']));
$info=pdo_get('zhtc_video',array('id'=>$_GPC['id']));
if(checksubmit('submit')){
        if(!$_GPC['url']){
            message('视频地址不能为空!','','error');
        }
        $data['type_id']=$_GPC['type_id'];
        $data['title']=$_GPC['title'];
        $data['time']=date('Y-m-d H:i:s');
        $data['uniacid']=$_W['uniacid'];
        $data['yd_num']=$_GPC['yd_num'];
        $data['num']=$_GPC['num'];
        $data['cityname']=$_GPC['cityname'];
        $data['logo']=$_GPC['logo'];
         $data['fm_logo']=$_GPC['fm_logo'];


       


        $data['url']=$_GPC['url'];
         $data['nick_name']=$_GPC['nick_name'];
     if($_GPC['id']==''){  
        $res=pdo_insert('zhtc_video',$data);
        if($res){
             message('添加成功！', $this->createWebUrl('video'), 'success');
        }else{
             message('添加失败！','','error');
        }
    }else{
        $data['cityname']=$_GPC['cityname'];
        $res=pdo_update('zhtc_video',$data,array('id'=>$_GPC['id']));
        if($res){
             message('编辑成功！', $this->createWebUrl('video'), 'success');
        }else{
             message('编辑失败！','','error');
        }
    }
}
include $this->template('web/addvideo');