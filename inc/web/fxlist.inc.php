<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
pdo_update('zhtc_distribution',array('state'=>1),array('pay_state'=>1));
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=' WHERE  a.uniacid=:uniacid and a.pay_state=2';
$where2=' WHERE  uniacid=:uniacid and pay_state=2';
$data[':uniacid']=$_W['uniacid'];
if($_GPC['keywords']){
    $op=$_GPC['keywords'];
    $where.=" and (a.user_tel LIKE  concat('%', :name,'%') || a.user_name LIKE  concat('%', :name,'%'))";   
    $where2.=" and (user_tel LIKE  concat('%', :name,'%') || user_name LIKE  concat('%', :name,'%'))";  
    $data[':name']=$op;
} 
   $sql="select a.* ,b.img,b.commission,c.name as level_name from " . tablename("zhtc_distribution") . " a"  . " left join " . tablename("zhtc_user") . " b on b.id=a.user_id "  . " left join " . tablename("zhtc_fxlevel") . " c on c.id=a.level ". $where." ORDER BY id DESC";
  $total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('zhtc_distribution') .  "".$where2." ORDER BY id DESC",$data);
$list=pdo_fetchall( $sql,$data);
//print_r($list);die;
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
$pager = pagination($total, $pageindex, $pagesize);
$operation=$_GPC['op'];
if($operation=='adopt'){//审核通过
    $id=$_GPC['id'];
    $distribution=pdo_get('zhtc_distribution',array('id'=>$id));
    $res=pdo_update('zhtc_distribution',array('state'=>2),array('id'=>$id));  
    $fx=pdo_get('zhtc_fxuser',array('fx_user'=>$distribution['user_id']));
   if(!$fx){
    pdo_insert("zhtc_fxuser",array('user_id'=>0,'fx_user'=>$distribution['user_id'],'time'=>time()));
   }
    if($res){
        message('审核成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('审核失败','','error');
    }
}
if($operation=='reject'){
     $id=$_GPC['id'];
    $res=pdo_update('zhtc_distribution',array('state'=>3),array('id'=>$id));
     if($res){
        message('拒绝成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}
if($operation=='delete'){
     $id=$_GPC['id'];
     $res=pdo_delete('zhtc_distribution',array('id'=>$id));
    if($res){
      pdo_delete('zhtc_fxuser',array('user_id'=>$id));
      pdo_delete('zhtc_fxuser',array('fx_user'=>$id));
        message('删除成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('删除失败','','error');
    }

}
if($_GPC['id2']){
  $id=$_GPC['id2'];
  pdo_update('zhtc_user',array('commission +='=>$_GPC['reply']),array('id'=>$id));
  $data3['user_id']=$id;//上线id
  $data3['son_id']=0;
  $data3['money']=$_GPC['reply'];//金额
  $data3['time']=time();//时间
  $data3['uniacid']=$_W['uniacid'];
  $res=pdo_insert('zhtc_earnings',$data3);
  if($res){
        message('充值成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('充值失败','','error');
    }
}

include $this->template('web/fxlist');