<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
 $sql="select a.* ,b.name,b.img from " . tablename("zhtc_fxuser") . " a"  . " left join " . tablename("zhtc_user") . " b on b.id=a.fx_user   WHERE a.user_id=:user_id order by id DESC";
 $res=pdo_fetchall($sql,array(':user_id'=>$_GPC['user_id']));
 $res2=array();
 for($i=0;$i<count($res);$i++){
  $sql2="select a.* ,b.name,b.img from " . tablename("zhtc_fxuser") . " a"  . " left join " . tablename("zhtc_user") . " b on b.id=a.fx_user   WHERE a.user_id=:user_id order by id DESC";
  $res3=pdo_fetchall($sql2,array(':user_id'=>$res[$i]['fx_user']));
  $res2[]=$res3;

}

$res4=array();
for($k=0;$k<count($res2);$k++){
  for($j=0;$j<count($res2[$k]);$j++){
    $res4[]=$res2[$k][$j]; 
  }

}
$data['one']=$res;
$data['two']=$res4;
include $this->template('web/ej');