<?php
/*
 *左歌科技*****QQ525094890****小程序****公众号
*/


defined('IN_IA') or exit('Access Denied');

require 'inc/func/core.php';

class Zh_tcwqModuleSite extends Core {


    public function doMobileUpdArea() {
        global $_W,$_GPC;
        if($_GPC['num']){
           $data['num']=$_GPC['num']; 
        }
        $res=pdo_update('zhtc_area',$data,array('id'=>$_GPC['id']));
        if($res){
            echo '1';
        }else{
            echo '2';
        }    

    }
    public function doMobileUpdAd() {
        global $_W,$_GPC;
        if($_GPC['num']){
           $data['orderby']=$_GPC['num']; 
        }
        $res=pdo_update('zhtc_ad',$data,array('id'=>$_GPC['id']));
        if($res){
            echo '1';
        }else{
            echo '2';
        }   

    }
    public function doMobileUpdType(){
        global $_W,$_GPC;
        if($_GPC['num']){
           $data['num']=$_GPC['num']; 
        }
         if($_GPC['money']){
           $data['money']=$_GPC['money']; 
        }
         if($_GPC['sx_money']){
           $data['sx_money']=$_GPC['sx_money']; 
        }
        $res=pdo_update('zhtc_type',$data,array('id'=>$_GPC['id']));
        if($res){
            echo '1';
        }else{
            echo '2';
        }   
    }

public function doMobileAllDelete(){
    global $_W, $_GPC;
            $res=pdo_delete('zhtc_type2',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('type2',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileDeleteType2(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_storetype2',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('storetype2',array()),'success');
        }else{
            message('删除失败','','error');
        }
}


    public function doMobileUpdType2(){
        global $_W,$_GPC;
        if($_GPC['num']){
           $data['num']=$_GPC['num']; 
        }
         if($_GPC['money']){
           $data['money']=$_GPC['money']; 
        }
        $res=pdo_update('zhtc_storetype',$data,array('id'=>$_GPC['id']));
        if($res){
            echo '1';
        }else{
            echo '2';
        }   
    }


    public function doMobileGetInformationType() {
        global $_W,$_GPC;
     $type2=pdo_getall('zhtc_type2',array('type_id'=>$_GPC['id']));
     echo json_encode( $type2);

    }

public function doMobileAlldeleteinfo(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_information',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileAllUpdateInfo(){
    global $_W, $_GPC;
    $arr=$_GPC['arr'];
    if($arr){
        foreach($arr as $v){
            if($v['type']==1){               
               $res= pdo_update('zhtc_type2',array('state'=>2),array('id'=>$v['id']));         
            }

            if($v['type']==2){
                $res=pdo_update('zhtc_type2',array('state'=>1),array('id'=>$v['id']));
            }

        }
    }
    
}

public function doMobileAllUpdateStore(){
    global $_W, $_GPC;
    $arr=$_GPC['arr'];
    if($arr){
        foreach($arr as $v){
            if($v['type']==1){               
               $res= pdo_update('zhtc_storetype2',array('state'=>2),array('id'=>$v['id']));         
            }

            if($v['type']==2){
                $res=pdo_update('zhtc_storetype2',array('state'=>1),array('id'=>$v['id']));
            }

        }
    }
    
}

public function doMobileAdoptInfo(){
     global $_W, $_GPC;
     for($i=0;$i<count($_GPC['id']);$i++){
         $tz=pdo_get("zhtc_information",array('id'=>$_GPC['id'][$i]));
          if(!$tz['sh_time']){
          if($tz['top_type']==1){
        $time=time()+24*60*60;
        }elseif($tz['top_type']==2){
          $time=time()+24*60*60*7;
        }elseif($tz['top_type']==3){
          $time=time()+24*60*60*30;
        }
         $res=pdo_update('zhtc_information',array('state'=>2,'sh_time'=>time(),'dq_time'=>$time),array('id'=>$_GPC['id'][$i]));
      }else{
         $res=pdo_update('zhtc_information',array('state'=>2),array('id'=>$_GPC['id'][$i]));
      }

     }
}

public function doMobileRejectInfo(){
     global $_W, $_GPC;

        $res=pdo_update('zhtc_information',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileAlldeleteZx(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_zx',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('zx',array()),'success');
        }else{
            message('删除失败','','error');
        }
}
public function doMobileAlldeleteVideo(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_video',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('zx',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileAdoptZx(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_zx',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('zx',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileRejectZx(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_zx',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('zx',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileAlldeleteCar(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_car',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('zx',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileAdoptCar(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_car',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileRejectCar(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_car',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileDelHy(){
     global $_W, $_GPC;
     $res=pdo_delete('zhtc_yellowstore',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('删除失败','','error');
        }
}
public function doMobileAdoptHy(){
     global $_W, $_GPC;
     for($i=0;$i<count($_GPC['id']);$i++){
             $rst=pdo_get('zhtc_yellowstore',array('id'=>$_GPC['id'][$i]));
              $time=pdo_get('zhtc_yellowset',array('id'=>$rst['rz_type']));
              $newtime=$time['days']*24*60*60;
                $res=pdo_update('zhtc_yellowstore',array('state'=>2,'sh_time'=>time(),'dq_time'=>time()+$newtime),array('id'=>$_GPC['id'][$i]));
     }
}
public function doMobileRejectHy(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_yellowstore',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileDeleteStore(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_store',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('store',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileAdoptStore(){
     global $_W, $_GPC;
     for($i=0;$i<count($_GPC['id']);$i++){
             $rst=pdo_get('zhtc_store',array('id'=>$_GPC['id'][$i]));
              if(!$rst['sh_time']){//增加
                      if($rst['type']==1){
                        $time=24*60*60*7;
                      }
                      if($rst['type']==2){
                        $time=24*182*60*60;
                      }
                      if($rst['type']==3){
                        $time=24*365*60*60;
                      }
              $time2=time();
               $res=pdo_update('zhtc_store',array('state'=>2,'sh_time'=>$time2,'dq_time'=>time()+$time),array('id'=>$_GPC['id'][$i]));
              }else{//修改
                   $res=pdo_update('zhtc_store',array('state'=>2),array('id'=>$_GPC['id'][$i]));
              }
     }
}

public function doMobileRejectStore(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_store',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('information',array()),'success');
        }else{
            message('操作失败','','error');
        }
}


public function doMobileDeleteGoods(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_goods',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('goods',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileAdoptGoods(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_goods',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('goods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileRejectGoods(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_goods',array('state'=>3),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('goods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}
public function doMobileGoodsSj(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_goods',array('is_show'=>1),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('goods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}
public function doMobileGoodsXj(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_goods',array('is_show'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('goods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}




public function doMobileJfGoodsSj(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_jfgoods',array('is_open'=>1),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('jfgoods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}
public function doMobileJfGoodsXj(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_jfgoods',array('is_open'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('jfgoods',array()),'success');
        }else{
            message('操作失败','','error');
        }
}
public function doMobileDelJfGoods(){
     global $_W, $_GPC;
        $res=pdo_delete('zhtc_jfgoods',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('jfgoods',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileDeleteType(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_type',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('type',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileQyType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_type',array('state'=>1),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('type',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileJyType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_type',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('type',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileDeleteStoreType(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_storetype',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('storetype',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileQyStoreType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_storetype',array('state'=>1),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('storetype',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileJyStoreType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_storetype',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('storetype',array()),'success');
        }else{
            message('操作失败','','error');
        }
}




public function doMobileDeleteYellowType(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_yellowtype',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('Yellowtype',array()),'success');
        }else{
            message('删除失败','','error');
        }
}

public function doMobileQyYellowType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_yellowtype',array('state'=>1),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('Yellowtype',array()),'success');
        }else{
            message('操作失败','','error');
        }
}

public function doMobileJyYellowType(){
     global $_W, $_GPC;
        $res=pdo_update('zhtc_yellowtype',array('state'=>2),array('id'=>$_GPC['id']));
        if($res){
            message('操作成功',$this->createWebUrl('Yellowtype',array()),'success');
        }else{
            message('操作失败','','error');
        }
}









public function doMobileDelUser(){
    global $_W, $_GPC;
        $res=pdo_delete('zhtc_user',array('id'=>$_GPC['id']));
        if($res){
            message('删除成功',$this->createWebUrl('user',array()),'success');
        }else{
            message('删除失败','','error');
        }
}


public function doMobileFindUser(){
global $_W, $_GPC;
$sql =" select id,name from ".tablename('zhtc_user')." where uniacid={$_W['uniacid']}  and id not in (select user_id  from" .tablename('zhtc_store')."where uniacid={$_W['uniacid']}) and  (name like '%{$_GPC['keywords']}%' || openid like '%{$_GPC['keywords']}%')";  
$user=pdo_fetchall($sql);

return json_encode($user);
}

public function doMobileFindUser2(){
global $_W, $_GPC;
$sql =" select id,name from ".tablename('zhtc_user')." where uniacid={$_W['uniacid']}  and id not in (select user_id  from" .tablename('zhtc_acthxlist')."where act_id={$_GPC['act_id']}) and  (name like '%{$_GPC['keywords']}%' || openid like '%{$_GPC['keywords']}%')";  
$user=pdo_fetchall($sql);

return json_encode($user);
}

public function doMobileFindCity(){
global $_W, $_GPC;
$sql =" select DISTINCT cityname from ".tablename('zhtc_hotcity')." where uniacid={$_W['uniacid']}   and  cityname like '%{$_GPC['keywords']}%'";  
$city=pdo_fetchall($sql);
return json_encode($city);

}



public function doMobileDeleteZxAssess(){
    global $_W, $_GPC;
    $res=pdo_delete('zhtc_zx_assess',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('zxpinglun',array()),'success');
    }else{
        message('删除失败','','error');
    }

}


public function doMobileTypeList(){
    global $_W, $_GPC;
    $type=pdo_getall('zhtc_type',array('uniacid'=>$_W['uniacid'],'state'=>1),array(),'','num asc');
    $type2=pdo_getall('zhtc_type2',array('uniacid'=>$_W['uniacid'],'state'=>1),array(),'','num asc');
    foreach($type as $key => $value){
         $data=$this->getSon($value['id'],$type2);
         $type[$key]['ej']=$data;

    }
    return json_encode($type);

}

public function doMobilePTypeInfo(){
    global $_W, $_GPC;
    $res=pdo_get('zhtc_type',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
    return json_encode($res);
}

public function doMobileSavePType(){
    global $_W, $_GPC;
    $data['img']=$_GPC['img'];
    $data['num']=$_GPC['num'];
    $data['type_name']=$_GPC['type_name'];
    $data['money']=$_GPC['money'];
    $data['state']=$_GPC['state'];
    $data['uniacid']=$_W['uniacid'];
    if($_GPC['id']==''){                
        $res=pdo_insert('zhtc_type',$data);        
    }else{
        $res = pdo_update('zhtc_type', $data, array('id' => $_GPC['id']));
    }
    if($res){
       echo '1';
   }else{
       echo '2';
   }

}

public function doMobileSTypeInfo(){
    global $_W, $_GPC;
    $res= pdo_get('zhtc_type2',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
    return json_encode($res);
}

public function doMobileSaveSType(){
    global $_W, $_GPC;
    $data['num']=$_GPC['num'];
    $data['type_id']=$_GPC['type_id'];
    $data['name']=$_GPC['name'];
    $data['state']=$_GPC['state'];
    $data['uniacid']=$_W['uniacid'];
    if($_GPC['id']==''){                
        $res=pdo_insert('zhtc_type2',$data);
    }else{
        $res = pdo_update('zhtc_type2', $data, array('id' => $_GPC['id']));
    }
    if($res){
       echo '1';
   }else{
       echo '2';
   }

}


public  function doMobileQueryTag(){
    global $_W, $_GPC;
    $res=pdo_getall('zhtc_label',array('type2_id'=>$_GPC['type2_id']));
    echo json_encode($res);

}


public function doMobileDelTag(){
    global $_W, $_GPC;
    $res=pdo_delete('zhtc_label',array('id'=>$_GPC['tag_id']));
    if($res){
        echo '1';
    }else{
        echo '2';
    }
}

public function doMobileUpdTag(){
  global $_W, $_GPC;
  $res=pdo_update('zhtc_label',array('label_name'=>$_GPC['label_name']),array('id'=>$_GPC['tag_id']));
  if($res){
    echo '1';
}else{
    echo '2';
}
}


public function doMobileUpdNav() {
    global $_W,$_GPC;
    if($_GPC['num']){
     $data['orderby']=$_GPC['num']; 
 }
 $res=pdo_update('zhtc_nav',$data,array('id'=>$_GPC['id']));
 if($res){
    echo '1';
}else{
    echo '2';
}   

}


    public function doMobileGetStoreType() {
        global $_W,$_GPC;
     $type2=pdo_getall('zhtc_storetype2',array('type_id'=>$_GPC['id']));
     echo json_encode($type2);

    }

    public function doMobileGetYellowType() {
        global $_W,$_GPC;
     $type2=pdo_getall('zhtc_yellowtype2',array('type_id'=>$_GPC['id']));
     echo json_encode($type2);

    }


    public function doMobileDelQd(){
        global $_W,$_GPC;
        $res=pdo_delete('zhtc_continuous',array('id'=>$_GPC['id']));
        if($res){
            echo '1';
        }else{
            echo '2';
        }
    }
    public function doMobileAddQd(){
        global $_W,$_GPC;
        pdo_delete('zhtc_continuous',array('uniacid'=>$_W['uniacid']));
        for($i=0;$i<count($_GPC['list']);$i++){
            $data['day']=$_GPC['list'][$i]['day'];
            $data['integral']=$_GPC['list'][$i]['integral'];
            $data['uniacid']=$_W['uniacid'];
            pdo_insert('zhtc_continuous',$data);
        }
        $res=pdo_get('zhtc_signset',array('uniacid'=>$_W['uniacid']));
        if($res){
            $data2['one']=$_GPC['one'];
            $data2['integral']=$_GPC['integral'];
            $data2['is_open']=$_GPC['is_open'];
            $data2['qd_img']=$_GPC['qd_img'];
            $data2['is_bq']=$_GPC['is_bq'];
            $data2['bq_integral']=$_GPC['bq_integral'];
            pdo_update('zhtc_signset',$data2,array('uniacid'=>$_W['uniacid']));
        }else{
            $data2['one']=$_GPC['one'];
            $data2['integral']=$_GPC['integral'];
            $data2['is_open']=$_GPC['is_open'];
            $data2['qd_img']=$_GPC['qd_img'];
            $data2['is_bq']=$_GPC['is_bq'];
            $data2['bq_integral']=$_GPC['bq_integral'];
            $data2['uniacid']=$_W['uniacid'];
            pdo_insert('zhtc_signset',$data2);
        }
        $res2=pdo_get('zhtc_special',array('uniacid'=>$_W['uniacid']));
        if($res2){
            $data3['day']=$_GPC['day'];
            $data3['integral']=$_GPC['integral2'];
            $data3['title']=$_GPC['title'];
            $data3['color']=$_GPC['color'];
            pdo_update('zhtc_special',$data3,array('uniacid'=>$_W['uniacid']));
        }else{
            $data3['day']=$_GPC['day'];
            $data3['integral']=$_GPC['integral2'];
            $data3['title']=$_GPC['title'];
            $data3['color']=$_GPC['color'];
            $data3['uniacid']=$_W['uniacid'];
            pdo_insert('zhtc_special',$data3);
        }
    }




    public function doMobileRefresh(){
        global $_W, $_GPC;
        $res=pdo_update('zhtc_information',array('sh_time'=>time()),array('id'=>$_GPC['id']));
        if($res){
          echo '1';
        }else{
          echo '2';
        }
    }
    














}
/*
 *QQ525094890    小程序    公众号
*/