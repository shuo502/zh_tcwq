<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$type=empty($_GPC['type']) ? 'wait' :$_GPC['type'];
$state=empty($_GPC['state']) ? '1' :$_GPC['state'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=' WHERE  uniacid=:uniacid';
$data[':uniacid']=$_W['uniacid'];
if(checksubmit('submit')){
    $op=$_GPC['keywords'];
    $where.=" and user_name LIKE  concat('%', :name,'%') ";    
    $data[':name']=$op;
    $type='all';
}
if($type=='all'){    
  $sql="SELECT * FROM ".tablename('zhtc_commission_withdrawal') ."".$where." ORDER BY time DESC";
  $total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('zhtc_commission_withdrawal') ."".$where." ORDER BY time DESC",$data);
}else{
    $where.= " and state=$state";
    $sql="SELECT * FROM ".tablename('zhtc_commission_withdrawal')."". $where." ORDER BY time DESC";
    $data[':uniacid']=$_W['uniacid'];
    $total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('zhtc_commission_withdrawal') ."".$where." ORDER BY time DESC",$data);    
}
$list=pdo_fetchall( $sql,$data);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
$pager = pagination($total, $pageindex, $pagesize);
if($operation=='adopt'){//审核通过
    $id=$_GPC['id'];
    $list=pdo_get('zhtc_commission_withdrawal',array('id'=>$_GPC['id']));
    $user=pdo_get('zhtc_user',array('id'=>$list['user_id']));
   
  $res=pdo_update('zhtc_commission_withdrawal',array('state'=>2,'sh_time'=>time()),array('id'=>$id));  
    if($res){
        message('审核成功',$this->createWebUrl('fxtx',array()),'success');
    }else{
        message('审核失败','','error');
    }
}
if($operation=='adopt2'){
    $id=$_GPC['id'];
    $list=pdo_get('zhtc_commission_withdrawal',array('id'=>$_GPC['id']));
    $user=pdo_get('zhtc_user',array('id'=>$list['user_id']));

////////////////打款//////////////////////
function arraytoxml($data){
        $str='<xml>';
        foreach($data as $k=>$v) {
            $str.='<'.$k.'>'.$v.'</'.$k.'>';
        }
        $str.='</xml>';
        return $str;
    }
    function xmltoarray($xml) { 
        //禁止引用外部xml实体 
        libxml_disable_entity_loader(true); 
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
        $val = json_decode(json_encode($xmlstring),true); 
        return $val;
    } 
    function curl($param="",$url) {
        global $_GPC, $_W;
        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();                                      //初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);                 //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);                    //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);                      //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);           // 增加 HTTP Header（头）里的字段 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);        // 终止从服务端进行验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch,CURLOPT_SSLCERT,IA_ROOT . "/addons/zh_tcwq/cert/".'apiclient_cert_' . $_W['uniacid'] . '.pem'); //这个是证书的位置绝对路径
        curl_setopt($ch,CURLOPT_SSLKEY,IA_ROOT . "/addons/zh_tcwq/cert/".'apiclient_key_' . $_W['uniacid'] . '.pem'); //这个也是证书的位置绝对路径
        $data = curl_exec($ch);                                 //运行curl
        curl_close($ch);
        return $data;
    }  
    $system=pdo_get('zhtc_system',array('uniacid'=>$_W['uniacid']));
    $client_ip=$system['client_ip'];
    if(empty($client_ip)){
         $client_ip=$_SERVER['SERVER_ADDR'];
    }
    $data=array(
        'mch_appid'=>$system['appid'],//商户账号appid
        'mchid'=>$system['mchid'],//商户号
        'nonce_str'=>rand(1111111111,9999999999),//随机字符串
        'partner_trade_no'=>time().rand(11111,99999),//商户订单号
        'openid'=>$user['openid'],//用户openid
        'check_name'=>'NO_CHECK',//校验用户姓名选项,
        're_user_name'=>$list['user_name'],//收款用户姓名
        'amount'=>$list['sj_cost']*100,//金额
        'desc'=>'提现打款',//企业付款描述信息
        'spbill_create_ip'=>$client_ip,//Ip地址
    );
    $key=$system['wxkey'];///这个就是个API密码。32位的。。随便MD5一下就可以了
   // $key=md5($key);
    $data=array_filter($data);
    ksort($data);
    $str='';
    foreach($data as $k=>$v) {
        $str.=$k.'='.$v.'&';
    }
    $str.='key='.$key;
    $data['sign']=md5($str);
    $xml=arraytoxml($data);
    $url='https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
    $res=curl($xml,$url);
    $return=xmltoarray($res);
    if($return['result_code']=='SUCCESS'){
      pdo_update('zhtc_commission_withdrawal',array('state'=>2,'sh_time'=>time()),array('id'=>$id));
      message('审核成功',$this->createWebUrl('fxtx',array()),'success');
    }else{
        if($return['err_code_des']){
            $message=$return['err_code_des'];
        }else{
            $message='请检查证书是否上传正确!';
        }
      message($return['err_code_des'],'','error');
    }
    // print_r($return);
  
////////////////打款//////////////////////

}

    

if($operation=='reject'){
     $id=$_GPC['id'];
     $list=pdo_get('zhtc_commission_withdrawal',array('id'=>$id));
    $res=pdo_update('zhtc_commission_withdrawal',array('state'=>3,'sh_time'=>time()),array('id'=>$id));
     if($res){
        pdo_update('zhtc_user',array('commission +='=>$list['tx_cost']),array('id'=>$list['user_id']));
        message('拒绝成功',$this->createWebUrl('fxtx',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}
if($operation=='delete'){
     $id=$_GPC['id'];
     $res=pdo_delete('zhtc_commission_withdrawal',array('id'=>$id));
     if($res){
        message('删除成功',$this->createWebUrl('fxtx',array()),'success');
    }else{
        message('删除失败','','error');
    }

}

include $this->template('web/fxtx');