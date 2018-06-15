<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

$where= " where uniacid=:uniacid";
$data[':uniacid']=$_W['uniacid'];
if($_GPC['keywords']){
	$where.=" and name LIKE  concat('%', :name,'%')";
	 $data[':name']=$_GPC['keywords'];  
}
	$pageindex = max(1, intval($_GPC['page']));

	$pagesize=10;
	$sql="select *  from " . tablename("zhtc_user") .$where;
	$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
	$list = pdo_fetchall($select_sql,$data);	

	$total=pdo_fetchcolumn("select count(*) from " . tablename("zhtc_user") .$where,$data);
	$pager = pagination($total, $pageindex, $pagesize);
	if($_GPC['op']=='delete'){
		$res4=pdo_delete("zhtc_user",array('id'=>$_GPC['id']));
		if($res4){
		 message('删除成功！', $this->createWebUrl('user2'), 'success');
		}else{
			  message('删除失败！','','error');
		}
	}
		if($_GPC['op']=='defriend'){
			
		$res4=pdo_update("zhtc_user",array('state'=>2),array('id'=>$_GPC['id']));
		if($res4){
		 message('拉黑成功！', $this->createWebUrl('user2',array('page'=>$_GPC['page'])), 'success');
		}else{
			  message('拉黑失败！','','error');
		}
	}
		if($_GPC['op']=='relieve'){
		$res4=pdo_update("zhtc_user",array('state'=>1),array('id'=>$_GPC['id']));
		if($res4){
		 message('取消成功！', $this->createWebUrl('user2',array('page'=>$_GPC['page'])), 'success');
		}else{
			  message('取消失败！','','error');
		}
	}
	if(checksubmit('submit2')){
      $res=pdo_update('zhtc_user',array('money +='=>$_GPC['reply']),array('id'=>$_GPC['id2']));
      if($res){
      	if($_GPC['reply']!=0){
      		if($_GPC['reply']<0){
      			$data2['type']=2;
		       $data2['note']='后台扣款';	
      		}else{
      			$data2['type']=1;
                $data2['note']='后台充值';
      		}
				$data2['money']=$_GPC['reply'];
		       $data2['user_id']=$_GPC['id2'];
		       $data2['time']=date('Y-m-d H:i:s');
		       $res2=pdo_insert('zhtc_qbmx',$data2); 
		       if($res2){
		       message('充值成功！', $this->createWebUrl('user2'), 'success');
		      }else{
		       message('充值失败！','','error');
		      }
      	}
       
    }
}
	
include $this->template('web/user2');