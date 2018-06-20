<?php




class Yj

{                  

//获取商家城市
public  static function getStoreCity($store_id){

	$res=pdo_get('zhtc_store',array('id'=>$store_id),'cityname');
	return $res['cityname'];
	
} 

//获取帖子城市
public  static function getTzCity($tz_id){

	$res=pdo_get('zhtc_information',array('id'=>$tz_id),'cityname');
	return $res['cityname'];
	
} 

//获取拼车城市
public  static function getCarCity($car_id){

	$res=pdo_get('zhtc_car',array('id'=>$car_id),'cityname');
	return $res['cityname'];
	
} 


//获取黄页城市
public  static function getYellowCity($hy_id){

	$res=pdo_get('zhtc_yellowstore',array('id'=>$hy_id),'cityname');
	return $res['cityname'];
	
} 
//获取黄页城市
public  static function getActCity($act_id){

	$res=pdo_get('zhtc_activity',array('id'=>$act_id),'cityname');
	return $res['cityname'];
	
}

//获取城市佣金设置

public static  function getYjSet($uniacid){
	$res=pdo_get('zhtc_yjset',array('uniacid'=>$uniacid));
	
	return  $res;

}




}






