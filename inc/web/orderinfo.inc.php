<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('zhtc_order',array('id'=>$_GPC['id']));
include $this->template('web/orderinfo');