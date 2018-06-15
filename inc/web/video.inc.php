<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//$list=pdo_getall('zhtc_video',array('uniacid'=>$_W['uniacid']),array(),'','time ASC');
$where="  WHERE a.uniacid=:uniacid ";
$data[':uniacid']=$_W['uniacid'];
if(!empty($_GPC['keywords'])){
    $where.=" and a.title LIKE  concat('%', :name,'%') ";
    $data[':name']=$_GPC['keywords'];   
}
if(!empty($_GPC['time'])){
   $start=strtotime($_GPC['time']['start']);
   $end=strtotime($_GPC['time']['end']);
  $where.=" and unix_timestamp(a.time) >={$start} and unix_timestamp(a.time)<={$end} ";

}
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$sql="select a.*,b.type_name from " . tablename("zhtc_video") . " a"  . " left join " . tablename("zhtc_videotype") . " b on a.type_id=b.id ".$where."order by a.num asc,a.time DESC ";
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
	$list = pdo_fetchall($select_sql,$data);	

	$total=pdo_fetchcolumn("select count(*) from " . tablename("zhtc_video") . " a"  . " left join " . tablename("zhtc_videotype") . " b on a.type_id=b.id ".$where,$data);
	$pager = pagination($total, $pageindex, $pagesize);
		//$list=pdo_fetchall($sql,$data);
if($_GPC['op']=='delete'){
	$res=pdo_delete('zhtc_video',array('id'=>$_GPC['id']));
	if($res){
		 message('删除成功！', $this->createWebUrl('video'), 'success');
		}else{
			  message('删除失败！','','error');
		}
}
// if($_GPC['state']){
// 	$data['state']=$_GPC['state'];
// 	$res=pdo_update('zhtc_video',$data,array('id'=>$_GPC['id']));
// 	if($res){
// 		 message('编辑成功！', $this->createWebUrl('video'), 'success');
// 		}else{
// 			  message('编辑失败！','','error');
// 		}
// }
include $this->template('web/video');