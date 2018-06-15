<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('zhtc_nav',array('id'=>$_GPC['id']));
if(checksubmit('submit')){
         $data['logo']=$_GPC['logo'];
        
        $data['orderby']=$_GPC['orderby'];
        $data['status']=$_GPC['status'];
        $data['title']=$_GPC['title'];       
        if($_GPC['state']==1){
              $data['state']=1;
            $data['src']=$_GPC['src'];
             $data['wb_src']='';
            $data['xcx_name']='';
            $data['appid']='';
        }
         if($_GPC['state']==2){
             $data['state']=2;
           $data['src']='';
             $data['wb_src']=$_GPC['wb_src'];
            $data['xcx_name']='';
            $data['appid']='';
        }
          if($_GPC['state']==3){
            $data['state']=3;
           $data['src']='';
            $data['wb_src']='';
            $data['xcx_name']=$_GPC['xcx_name'];
            $data['appid']=$_GPC['appid'];
        }    
        $data['uniacid']=$_W['uniacid'];
     if($_GPC['id']==''){  
        $res=pdo_insert('zhtc_nav',$data);
        if($res){
             message('添加成功！', $this->createWebUrl('nav'), 'success');
        }else{
             message('添加失败！','','error');
        }
    }else{
        $res=pdo_update('zhtc_nav',$data,array('id'=>$_GPC['id']));
        if($res){
             message('编辑成功！', $this->createWebUrl('nav'), 'success');
        }else{
             message('编辑失败！','','error');
        }
    }
}
include $this->template('web/addnav');