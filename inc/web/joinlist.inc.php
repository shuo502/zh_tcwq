<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
if(!$_GPC['type']){
    $_GPC['type']='now';
}
if($_GPC['type']=='all'){
$list = pdo_getall('zhtc_joinlist',array('act_id' => $_GPC['act_id'],'state !='=>1),array(),'','id DESC');
}elseif($_GPC['type']=='now'){
$list = pdo_getall('zhtc_joinlist',array('act_id' => $_GPC['act_id'],'state'=>2),array(),'','id DESC');
}

if($_GPC['op']=='delete'){
    $res=pdo_delete('zhtc_joinlist',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('joinlist',array('act_id' => $_GPC['act_id'])),'success');
    }else{
        message('删除失败','','error');
    }
}
if($_GPC['op']=='tg'){
	 $res=pdo_update('zhtc_joinlist',array('state'=>3),array('id'=>$_GPC['id']));
    if($res){
        message('操作成功',$this->createWebUrl('joinlist',array('act_id' => $_GPC['act_id'])),'success');
    }else{
        message('操作失败','','error');
    }
}
if($_GPC['op']=='jj'){ 
    $id=$_GPC['id'];
    include_once IA_ROOT . '/addons/zh_tcwq/cert/WxPay.Api.php';
    load()->model('account');
    load()->func('communication');
    $WxPayApi = new WxPayApi();
    $input = new WxPayRefund();
    $path_cert = IA_ROOT . "/addons/zh_tcwq/cert/".'apiclient_cert_' . $_W['uniacid'] . '.pem';
    $path_key = IA_ROOT . "/addons/zh_tcwq/cert/".'apiclient_key_' . $_W['uniacid'] . '.pem';
    $account_info = $_W['account'];
    $refund_order =pdo_get('zhtc_joinlist',array('id'=>$id));  
    $res=pdo_get('zhtc_system',array('uniacid'=>$_W['uniacid']));
    $appid=$res['appid'];
    $key=$res['wxkey'];
    $mchid=$res['mchid']; 
    $out_trade_no=$refund_order['code'];
    $fee = $refund_order['money'] * 100;
    $input->SetAppid($appid);
    $input->SetMch_id($mchid);
    $input->SetOp_user_id($mchid);
    $input->SetRefund_fee($fee);
    $input->SetTotal_fee($fee);
 // $input->SetTransaction_id($refundid);
    $input->SetOut_refund_no($id);
    $input->SetOut_trade_no($out_trade_no);
    $result = $WxPayApi->refund($input, 6, $path_cert, $path_key, $key);
   // var_dump($result);die;
    if ($result['result_code'] == 'SUCCESS') {//退款成功
    //更改订单操作
        pdo_update('zhtc_joinlist',array('state'=>5),array('id'=>$_GPC['id']));
        message('退款成功',$this->createWebUrl('joinlist',array('act_id' => $_GPC['act_id'])),'success');
    }else{
        message($result['result_code'],'','error');
}
}
include $this->template('web/joinlist');