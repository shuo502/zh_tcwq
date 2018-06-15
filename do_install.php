<?php
pdo_query("CREATE TABLE IF NOT EXISTS `ims_zhtc_ad` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(50) NOT NULL COMMENT '轮播图标题',
`logo` varchar(200) NOT NULL COMMENT '图片',
`status` int(11) NOT NULL COMMENT '1.开启  2.关闭',
`src` varchar(100) NOT NULL COMMENT '链接',
`orderby` int(11) NOT NULL COMMENT '排序',
`xcx_name` varchar(20) NOT NULL,
`appid` varchar(20) NOT NULL,
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`type` int(11) NOT NULL,
`cityname` varchar(50) NOT NULL,
`wb_src` varchar(300) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_area` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`area_name` varchar(50) NOT NULL COMMENT '区域名称',
`num` int(11) NOT NULL COMMENT '排序',
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_car` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
`start_place` varchar(100) NOT NULL COMMENT '出发地',
`end_place` varchar(100) NOT NULL COMMENT '目的地',
`start_time` varchar(30) NOT NULL COMMENT '出发时间',
`num` int(4) NOT NULL COMMENT '乘车人数/可乘人数',
`link_name` varchar(30) NOT NULL COMMENT '联系人',
`link_tel` varchar(20) NOT NULL COMMENT '联系电话',
`typename` varchar(30) NOT NULL COMMENT '分类名称',
`other` varchar(300) NOT NULL COMMENT '补充',
`time` int(11) NOT NULL COMMENT '发布时间',
`sh_time` int(11) NOT NULL COMMENT '审核时间',
`top_id` int(11) NOT NULL COMMENT '置顶ID',
`top` int(4) NOT NULL COMMENT '是否置顶,1,是,2否',
`uniacid` varchar(50) NOT NULL,
`state` int(4) NOT NULL COMMENT '1待审核,2通过，3拒绝',
`tj_place` varchar(300) NOT NULL COMMENT '途经地',
`hw_wet` varchar(10) NOT NULL COMMENT '货物重量',
`star_lat` varchar(20) NOT NULL COMMENT '出发地维度',
`star_lng` varchar(20) NOT NULL COMMENT '出发地经度',
`end_lat` varchar(20) NOT NULL COMMENT '目的地维度',
`end_lng` varchar(20) NOT NULL COMMENT '目的地经度',
`is_open` int(4) NOT NULL,
`start_time2` int(11) NOT NULL,
`cityname` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_car_my_tag` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`tag_id` int(11) NOT NULL COMMENT '标签id',
`car_id` int(11) NOT NULL COMMENT '拼车ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_car_tag` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`typename` varchar(30) NOT NULL COMMENT '分类名称',
`tagname` varchar(30) NOT NULL COMMENT '标签名称',
`uniacid` varchar(11) NOT NULL COMMENT '50',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_car_top` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月',
`money` decimal(10,2) NOT NULL COMMENT '价格',
`uniacid` int(11) NOT NULL,
`num` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_carpaylog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`car_id` int(44) NOT NULL COMMENT '拼车id',
`money` decimal(10,2) NOT NULL COMMENT '钱',
`time` datetime NOT NULL,
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`information_id` int(11) NOT NULL COMMENT '帖子id',
`details` varchar(200) NOT NULL COMMENT '评论详情',
`time` varchar(20) NOT NULL COMMENT '时间',
`reply` varchar(200) NOT NULL COMMENT '回复详情',
`hf_time` varchar(20) NOT NULL COMMENT '回复时间',
`user_id` int(11) NOT NULL,
`store_id` int(11) NOT NULL,
`score` decimal(10,1) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_commission_withdrawal` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`type` int(11) NOT NULL COMMENT '1.支付宝2.银行卡',
`state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
`time` int(11) NOT NULL COMMENT '申请时间',
`sh_time` int(11) NOT NULL COMMENT '审核时间',
`uniacid` int(11) NOT NULL,
`user_name` varchar(20) NOT NULL,
`account` varchar(100) NOT NULL,
`tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
`sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_continuous` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`day` int(11) NOT NULL COMMENT '天数',
`integral` int(11) NOT NULL COMMENT '积分',
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_distribution` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`time` int(11) NOT NULL,
`user_name` varchar(20) NOT NULL,
`user_tel` varchar(20) NOT NULL,
`state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
`uniacid` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`pay_state` int(11) NOT NULL,
`code` varchar(50) NOT NULL,
`level` int(11) NOT NULL,
`cityname` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_earnings` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`son_id` int(11) NOT NULL COMMENT '下线',
`money` decimal(10,2) NOT NULL,
`time` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_fx` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户ID',
`zf_user_id` int(11) NOT NULL COMMENT '转发人ID',
`money` decimal(10,2) NOT NULL COMMENT '金额',
`time` int(11) NOT NULL COMMENT '时间戳',
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_fxlevel` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`money` decimal(10,2) NOT NULL,
`name` varchar(20) NOT NULL,
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
`commission` int(11) NOT NULL COMMENT '1级佣金比例',
`commission2` int(11) NOT NULL COMMENT '2级佣金比例',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_fxset` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`fx_details` text NOT NULL COMMENT '分销商申请协议',
`tx_details` text NOT NULL COMMENT '佣金提现协议',
`is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启',
`is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否',
`tx_rate` int(11) NOT NULL COMMENT '提现手续费',
`commission` varchar(10) NOT NULL COMMENT '一级佣金',
`commission2` varchar(10) NOT NULL COMMENT '二级佣金',
`tx_money` int(11) NOT NULL COMMENT '提现门槛',
`img` varchar(100) NOT NULL COMMENT '分销中心图片',
`img2` varchar(100) NOT NULL COMMENT '申请分销图片',
`uniacid` int(11) NOT NULL,
`is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭',
`instructions` text NOT NULL COMMENT '分销商说明',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_fxuser` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '一级分销',
`fx_user` int(11) NOT NULL COMMENT '二级分销',
`time` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_goods` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`store_id` int(11) NOT NULL COMMENT '商家ID',
`spec_id` int(11) NOT NULL COMMENT '主规格ID',
`goods_name` varchar(100) NOT NULL COMMENT '商品名称',
`goods_num` int(11) NOT NULL COMMENT '商品数量',
`goods_cost` decimal(10,2) NOT NULL,
`freight` decimal(10,2) NOT NULL COMMENT '运费',
`delivery` varchar(500) NOT NULL COMMENT '关于发货',
`quality` int(4) NOT NULL COMMENT '正品1是,0否',
`free` int(4) NOT NULL COMMENT '包邮1是,0否',
`all_day` int(4) NOT NULL COMMENT '24小时发货1是,0否',
`service` int(4) NOT NULL COMMENT '售后服务1是,0否',
`refund` int(4) NOT NULL COMMENT '极速退款1是,0否',
`weeks` int(4) NOT NULL COMMENT '7天包邮1是，0否',
`lb_imgs` varchar(500) NOT NULL COMMENT '轮播图',
`imgs` varchar(500) NOT NULL COMMENT '商品介绍图',
`time` int(11) NOT NULL COMMENT '时间',
`uniacid` varchar(50) NOT NULL,
`goods_details` text NOT NULL COMMENT '商品详细',
`state` int(4) NOT NULL COMMENT '1待审核,2通过，3拒绝',
`sy_num` int(11) NOT NULL COMMENT '剩余数量',
`is_show` int(11) NOT NULL DEFAULT '1',
`sales` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_goods_spec` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`spec_name` varchar(100) NOT NULL COMMENT '规格名称',
`sort` int(4) NOT NULL COMMENT '排序',
`uniacid` varchar(50) NOT NULL COMMENT '50',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_hblq` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户ID',
`tz_id` int(11) NOT NULL COMMENT '帖子ID',
`money` decimal(10,2) NOT NULL COMMENT '金额',
`time` int(11) NOT NULL COMMENT '时间戳',
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_help` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`question` varchar(200) NOT NULL COMMENT '标题',
`answer` text NOT NULL COMMENT '回答',
`sort` int(4) NOT NULL COMMENT '排序',
`uniacid` varchar(50) NOT NULL,
`created_time` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_hotcity` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`cityname` varchar(50) NOT NULL COMMENT '城市名称',
`time` int(11) NOT NULL COMMENT '创建时间',
`uniacid` varchar(50) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_in` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL COMMENT '1.一天2.半年3.一年',
`money` decimal(10,2) NOT NULL,
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_information` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`details` text NOT NULL COMMENT '内容',
`img` text NOT NULL COMMENT '图片',
`user_id` int(11) NOT NULL COMMENT '用户id',
`user_name` varchar(20) NOT NULL COMMENT '联系人',
`user_tel` varchar(20) NOT NULL COMMENT '电话',
`hot` int(11) NOT NULL COMMENT '1.热门 2.不热门',
`top` int(11) NOT NULL COMMENT '1.置顶 2.不置顶',
`givelike` int(11) NOT NULL COMMENT '点赞数',
`views` int(11) NOT NULL COMMENT '浏览量',
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`type2_id` int(11) NOT NULL COMMENT '分类二id',
`type_id` int(11) NOT NULL,
`state` int(11) NOT NULL COMMENT '1.待审核 2.通过3拒绝',
`money` decimal(10,2) NOT NULL,
`time` int(11) NOT NULL COMMENT '发布时间',
`sh_time` int(11) NOT NULL,
`top_type` int(11) NOT NULL,
`address` varchar(500) NOT NULL,
`hb_money` decimal(10,2) NOT NULL,
`hb_num` int(11) NOT NULL,
`hb_type` int(11) NOT NULL,
`hb_keyword` varchar(20) NOT NULL,
`hb_random` int(11) NOT NULL,
`hong` text NOT NULL,
`store_id` int(11) NOT NULL,
`del` int(11) NOT NULL DEFAULT '2',
`user_img2` varchar(200) NOT NULL,
`dq_time` int(11) NOT NULL,
`cityname` varchar(50) NOT NULL,
`hbfx_num` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_integral` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
`score` int(11) NOT NULL COMMENT '分数',
`type` int(4) NOT NULL COMMENT '1加,2减',
`order_id` int(11) NOT NULL COMMENT '订单id',
`cerated_time` datetime NOT NULL COMMENT '创建时间',
`uniacid` varchar(50) NOT NULL,
`note` varchar(20) NOT NULL COMMENT '备注',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_jfgoods` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL COMMENT '名称',
`img` varchar(100) NOT NULL,
`money` int(11) NOT NULL COMMENT '价格',
`type_id` int(11) NOT NULL COMMENT '分类id',
`goods_details` text NOT NULL,
`process_details` text NOT NULL,
`attention_details` text NOT NULL,
`number` int(11) NOT NULL COMMENT '数量',
`time` varchar(50) NOT NULL COMMENT '期限',
`is_open` int(11) NOT NULL COMMENT '1.开启2关闭',
`type` int(11) NOT NULL COMMENT '1.余额2.实物',
`num` int(11) NOT NULL COMMENT '排序',
`uniacid` int(11) NOT NULL,
`hb_moeny` decimal(10,2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_jfrecord` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
`good_id` int(11) NOT NULL COMMENT '商品id',
`time` varchar(20) NOT NULL COMMENT '兑换时间',
`user_name` varchar(20) NOT NULL COMMENT '用户地址',
`user_tel` varchar(20) NOT NULL COMMENT '用户电话',
`address` varchar(200) NOT NULL COMMENT '地址',
`note` varchar(20) NOT NULL,
`integral` int(11) NOT NULL COMMENT '积分',
`good_name` varchar(50) NOT NULL COMMENT '商品名称',
`good_img` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_jftype` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`img` varchar(100) NOT NULL,
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_label` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`label_name` varchar(20) NOT NULL,
`type2_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_like` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`information_id` int(11) NOT NULL COMMENT '帖子id',
`user_id` int(11) NOT NULL COMMENT '用户id',
`zx_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_mylabel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`label_id` int(11) NOT NULL,
`information_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_nav` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(50) NOT NULL COMMENT '名称',
`logo` varchar(200) NOT NULL COMMENT '图标',
`status` int(11) NOT NULL COMMENT '1.开启  2.关闭',
`src` varchar(100) NOT NULL COMMENT '内部链接',
`orderby` int(11) NOT NULL COMMENT '排序',
`xcx_name` varchar(20) NOT NULL COMMENT '小程序名称',
`appid` varchar(20) NOT NULL COMMENT 'APPID',
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`wb_src` varchar(300) NOT NULL COMMENT '外部链接',
`state` int(4) NOT NULL DEFAULT '1' COMMENT '1内部，2外部,3跳转',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_news` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(50) NOT NULL COMMENT '公告标题',
`details` text NOT NULL COMMENT '公告详情',
`num` int(11) NOT NULL COMMENT '排序',
`uniacid` int(11) NOT NULL,
`time` int(11) NOT NULL,
`img` varchar(100) NOT NULL,
`state` int(11) NOT NULL,
`type` int(11) NOT NULL,
`cityname` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_order` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`store_id` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL COMMENT '金额',
`user_name` varchar(20) NOT NULL COMMENT '联系人',
`address` varchar(200) NOT NULL COMMENT '联系地址',
`tel` varchar(20) NOT NULL COMMENT '电话',
`time` int(11) NOT NULL COMMENT '下单时间',
`pay_time` int(11) NOT NULL,
`complete_time` int(11) NOT NULL,
`fh_time` int(11) NOT NULL COMMENT '发货时间',
`state` int(11) NOT NULL COMMENT '1.待付款 2.待发货3.待确认4.已完成5.退款中6.已退款7.退款拒绝',
`order_num` varchar(20) NOT NULL COMMENT '订单号',
`good_id` int(11) NOT NULL,
`good_name` varchar(100) NOT NULL,
`good_img` varchar(100) NOT NULL,
`good_money` decimal(10,2) NOT NULL,
`out_trade_no` varchar(50) NOT NULL,
`good_spec` varchar(200) NOT NULL COMMENT '商品规格',
`del` int(11) NOT NULL COMMENT '用户删除1是  2否 ',
`del2` int(11) NOT NULL COMMENT '商家删除1.是2.否',
`uniacid` int(11) NOT NULL,
`freight` decimal(10,2) NOT NULL,
`note` varchar(100) NOT NULL,
`good_num` int(11) NOT NULL,
`is_zt` int(11) NOT NULL DEFAULT '2',
`zt_time` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_paylog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`fid` int(11) NOT NULL COMMENT '外键id(商家,帖子,黄页,拼车)',
`money` decimal(10,2) NOT NULL COMMENT '钱',
`time` datetime NOT NULL COMMENT '时间',
`uniacid` varchar(50) NOT NULL COMMENT '50',
`note` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_qbmx` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`money` decimal(10,2) NOT NULL,
`type` int(11) NOT NULL,
`note` varchar(20) NOT NULL,
`time` varchar(20) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_share` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`information_id` int(11) NOT NULL COMMENT '帖子id',
`user_id` int(11) NOT NULL COMMENT '用户id',
`store_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_signlist` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`time` varchar(20) NOT NULL COMMENT '签到时间',
`time2` int(11) NOT NULL,
`integral` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
`time3` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_signset` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`one` int(11) NOT NULL COMMENT '首次奖励积分',
`integral` int(11) NOT NULL COMMENT '每天签到积分',
`is_open` int(11) NOT NULL COMMENT '1.开启2.关闭  签到',
`is_bq` int(11) NOT NULL COMMENT '1.开启2.关闭  补签',
`bq_integral` int(11) NOT NULL COMMENT '补签扣除积分',
`details` text NOT NULL COMMENT '签到说明',
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_sms` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`appkey` varchar(100) NOT NULL,
`tpl_id` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
`is_open` int(11) NOT NULL DEFAULT '2',
`tid1` varchar(50) NOT NULL,
`tid2` varchar(50) NOT NULL,
`tid3` varchar(50) NOT NULL,
`tpl2_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_spec_value` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`goods_id` int(11) NOT NULL COMMENT '商品ID',
`spec_id` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL COMMENT '价格',
`name` varchar(50) NOT NULL COMMENT '名称',
`num` int(11) NOT NULL COMMENT '数量',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_special` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`day` varchar(20) NOT NULL COMMENT '日期',
`integral` int(11) NOT NULL COMMENT '积分',
`title` varchar(20) NOT NULL COMMENT '标题说明',
`color` varchar(20) NOT NULL COMMENT '颜色',
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_store` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
`store_name` varchar(50) NOT NULL COMMENT '商家名称',
`address` varchar(200) NOT NULL COMMENT '商家地址',
`announcement` varchar(100) NOT NULL COMMENT '公告',
`storetype_id` int(11) NOT NULL COMMENT '主行业分类id',
`storetype2_id` int(11) NOT NULL COMMENT '商家子分类id',
`area_id` int(11) NOT NULL COMMENT '区域id',
`yy_time` varchar(50) NOT NULL COMMENT '营业时间',
`keyword` varchar(50) NOT NULL COMMENT '关键字',
`skzf` int(11) NOT NULL COMMENT '1.是 2否(刷卡支付)',
`wifi` int(11) NOT NULL COMMENT '1.是 2否',
`mftc` int(11) NOT NULL COMMENT '1.是 2否(免费停车)',
`jzxy` int(11) NOT NULL COMMENT '1.是 2否(禁止吸烟)',
`tgbj` int(11) NOT NULL COMMENT '1.是 2否(提供包间)',
`sfxx` int(11) NOT NULL COMMENT '1.是 2否(沙发休闲)',
`tel` varchar(20) NOT NULL COMMENT '手机号',
`logo` varchar(100) NOT NULL,
`weixin_logo` varchar(100) NOT NULL,
`ad` text NOT NULL COMMENT '轮播图',
`state` int(11) NOT NULL COMMENT '1.待审核2通过3拒绝',
`money` decimal(10,2) NOT NULL COMMENT '金额',
`password` varchar(100) NOT NULL COMMENT '核销密码',
`details` text NOT NULL COMMENT '商家简介',
`uniacid` int(11) NOT NULL,
`coordinates` varchar(50) NOT NULL,
`views` int(11) NOT NULL,
`score` decimal(10,1) NOT NULL,
`type` int(11) NOT NULL,
`sh_time` int(11) NOT NULL,
`time_over` int(11) NOT NULL,
`img` text NOT NULL,
`vr_link` text NOT NULL,
`num` int(11) NOT NULL,
`start_time` varchar(20) NOT NULL,
`end_time` varchar(20) NOT NULL,
`wallet` decimal(10,2) NOT NULL,
`user_name` varchar(30) NOT NULL,
`pwd` varchar(50) NOT NULL,
`dq_time` int(11) NOT NULL,
`cityname` varchar(50) NOT NULL,
`time` datetime NOT NULL,
`fx_num` int(11) NOT NULL,
`ewm_logo` varchar(100) NOT NULL,
`is_top` int(4) NOT NULL DEFAULT '2',
`yyzz_img` varchar(100) NOT NULL,
`sfz_img` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_store_wallet` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`store_id` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`note` varchar(20) NOT NULL,
`type` int(11) NOT NULL COMMENT '1加2减',
`time` varchar(20) NOT NULL,
`tx_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_storepaylog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`store_id` int(11) NOT NULL COMMENT '商家ID',
`money` decimal(10,2) NOT NULL,
`time` datetime NOT NULL,
`uniacid` varchar(50) NOT NULL,
`note` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_storetype` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_name` varchar(20) NOT NULL COMMENT '分类名称',
`img` varchar(100) NOT NULL COMMENT '分类图片',
`uniacid` int(11) NOT NULL,
`num` int(11) NOT NULL COMMENT '排序',
`money` decimal(10,2) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_storetype2` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`type_id` int(11) NOT NULL COMMENT '主分类id',
`num` int(11) NOT NULL COMMENT '排序',
`uniacid` int(11) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_system` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`appid` varchar(100) NOT NULL COMMENT 'appid',
`appsecret` varchar(200) NOT NULL COMMENT 'appsecret',
`mchid` varchar(20) NOT NULL COMMENT '商户号',
`wxkey` varchar(100) NOT NULL COMMENT '商户秘钥',
`uniacid` varchar(50) NOT NULL,
`url_name` varchar(20) NOT NULL COMMENT '网址名称',
`details` text NOT NULL COMMENT '关于我们',
`url_logo` varchar(100) NOT NULL COMMENT '网址logo',
`bq_name` varchar(50) NOT NULL COMMENT '版权名称',
`link_name` varchar(30) NOT NULL COMMENT '网站名称',
`link_logo` varchar(100) NOT NULL COMMENT '网站logo',
`support` varchar(20) NOT NULL COMMENT '技术支持',
`bq_logo` varchar(100) NOT NULL,
`color` varchar(20) NOT NULL,
`tz_appid` varchar(30) NOT NULL,
`tz_name` varchar(30) NOT NULL,
`pt_name` varchar(30) NOT NULL COMMENT '平台名称',
`tz_audit` int(11) NOT NULL COMMENT '帖子审核1.是 2否',
`sj_audit` int(11) NOT NULL COMMENT '商家审核1.是 2否',
`mapkey` varchar(200) NOT NULL,
`tel` varchar(20) NOT NULL,
`gd_key` varchar(100) NOT NULL,
`rz_xuz` text NOT NULL,
`ft_xuz` text NOT NULL,
`fx_money` decimal(10,2) NOT NULL,
`hb_sxf` int(11) NOT NULL,
`tx_money` decimal(10,2) NOT NULL,
`tx_sxf` int(11) NOT NULL,
`tx_details` text NOT NULL,
`is_hhr` int(4) NOT NULL DEFAULT '2',
`is_hbfl` int(4) NOT NULL DEFAULT '2',
`is_zx` int(4) NOT NULL DEFAULT '2',
`is_car` int(4) NOT NULL,
`pc_xuz` text NOT NULL,
`pc_money` decimal(10,2) NOT NULL,
`is_sjrz` int(4) NOT NULL,
`is_pcfw` int(4) NOT NULL,
`total_num` int(11) NOT NULL,
`is_goods` int(4) NOT NULL,
`apiclient_cert` text NOT NULL,
`apiclient_key` text NOT NULL,
`is_openzx` int(4) NOT NULL,
`is_hyset` int(4) NOT NULL,
`is_tzopen` int(4) NOT NULL,
`is_pageopen` int(4) NOT NULL,
`cityname` varchar(50) NOT NULL,
`is_tel` int(4) NOT NULL DEFAULT '1',
`tx_mode` int(4) NOT NULL DEFAULT '1',
`many_city` int(4) NOT NULL DEFAULT '2',
`tx_type` int(4) NOT NULL DEFAULT '2',
`is_hbzf` int(4) NOT NULL DEFAULT '1',
`hb_img` varchar(100) NOT NULL,
`tz_num` int(11) NOT NULL,
`client_ip` varchar(30) NOT NULL,
`hb_content` varchar(100) NOT NULL,
`is_tzhb` int(4) NOT NULL DEFAULT '1',
`sj_max` varchar(1) NOT NULL,
`zfwl_max` varchar(1) NOT NULL,
`zfwl_open` int(4) NOT NULL DEFAULT '1',
`zx_type` int(4) NOT NULL DEFAULT '1',
`ft_num` int(11) NOT NULL,
`is_img` int(11) NOT NULL DEFAULT '2',
`is_sjhb` int(11) NOT NULL DEFAULT '1',
`is_tzdz` int(11) NOT NULL DEFAULT '1',
`is_rz` int(11) NOT NULL DEFAULT '1',
`integral` int(11) NOT NULL,
`integral2` int(11) NOT NULL,
`is_jf` int(11) NOT NULL DEFAULT '1',
`is_kf` int(11) NOT NULL DEFAULT '1',
`dw_more` int(11) NOT NULL DEFAULT '2',
`is_zxrz` int(11) NOT NULL DEFAULT '1',
`tzmc` varchar(20) NOT NULL,
`is_dnss` int(11) NOT NULL DEFAULT '1',
`is_vr` int(11) NOT NULL DEFAULT '1',
`is_yysj` int(11) NOT NULL DEFAULT '1',
`tc_img` varchar(100) NOT NULL,
`tc_gg` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_top` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月',
`money` decimal(10,2) NOT NULL COMMENT '价格',
`uniacid` int(11) NOT NULL,
`num` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_type` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_name` varchar(20) NOT NULL COMMENT '分类名称',
`img` varchar(100) NOT NULL COMMENT '分类图片',
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`num` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
`sx_money` decimal(10,2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_type2` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL COMMENT '分类名称',
`type_id` int(11) NOT NULL COMMENT '主分类id',
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_tzpaylog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`tz_id` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`time` datetime NOT NULL,
`uniacid` varchar(50) NOT NULL,
`note` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`openid` varchar(100) NOT NULL COMMENT 'openid',
`img` varchar(200) NOT NULL COMMENT '头像',
`time` varchar(20) NOT NULL COMMENT '注册时间',
`name` varchar(20) NOT NULL,
`uniacid` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`user_name` varchar(20) NOT NULL,
`user_tel` varchar(20) NOT NULL,
`user_address` varchar(200) NOT NULL,
`commission` decimal(10,2) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
`total_score` int(11) NOT NULL,
`day` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_userformid` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
`form_id` varchar(50) NOT NULL COMMENT 'form_id',
`time` datetime NOT NULL,
`uniacid` varchar(50) NOT NULL,
`openid` varchar(50) NOT NULL COMMENT 'openid',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_video` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_id` int(11) NOT NULL COMMENT '分类ID',
`title` varchar(200) NOT NULL COMMENT '标题',
`time` datetime NOT NULL,
`yd_num` int(11) NOT NULL COMMENT '阅读数量',
`pl_num` int(11) NOT NULL COMMENT '评论数量',
`dz_num` int(11) NOT NULL COMMENT '点赞数量',
`uniacid` varchar(50) NOT NULL,
`url` varchar(500) NOT NULL COMMENT '视频链接',
`logo` varchar(200) NOT NULL COMMENT '发布人logo',
`nick_name` varchar(30) NOT NULL COMMENT '昵称',
`cityname` varchar(50) NOT NULL COMMENT '城市名称',
`num` int(11) NOT NULL COMMENT '排序',
`fm_logo` varchar(200) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_videodz` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`video_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_videopl` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`content` varchar(500) NOT NULL,
`video_id` int(11) NOT NULL,
`time` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_videotype` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_name` varchar(20) NOT NULL COMMENT '分类名称',
`img` varchar(100) NOT NULL COMMENT '分类图片',
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`num` int(11) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_withdrawal` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(10) NOT NULL COMMENT '真实姓名',
`username` varchar(100) NOT NULL COMMENT '账号',
`type` int(11) NOT NULL COMMENT '1支付宝 2.微信 3.银行',
`time` int(11) NOT NULL COMMENT '申请时间',
`sh_time` int(11) NOT NULL COMMENT '审核时间',
`state` int(11) NOT NULL COMMENT '1.待审核 2.通过  3.拒绝',
`tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
`sj_cost` decimal(10,2) NOT NULL COMMENT '实际金额',
`user_id` int(11) NOT NULL COMMENT '用户id',
`uniacid` int(11) NOT NULL,
`method` int(11) NOT NULL,
`store_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yellowpaylog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`hy_id` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`time` datetime NOT NULL,
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yellowset` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`days` int(11) NOT NULL COMMENT '入住天数',
`money` decimal(10,2) NOT NULL,
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yellowstore` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`logo` varchar(200) NOT NULL COMMENT 'logo图片',
`company_name` varchar(100) NOT NULL COMMENT '公司名称',
`company_address` varchar(200) NOT NULL COMMENT '公司地址',
`type_id` int(11) NOT NULL COMMENT '二级分类',
`link_tel` varchar(20) NOT NULL COMMENT '联系电话',
`sort` int(11) NOT NULL COMMENT '排序',
`rz_time` int(11) NOT NULL COMMENT '入住时间',
`sh_time` int(11) NOT NULL COMMENT '审核时间',
`state` int(4) NOT NULL COMMENT '1待,2通过,3拒绝',
`rz_type` int(4) NOT NULL COMMENT '入驻类型',
`time_over` int(4) NOT NULL COMMENT '1到期,2没到期',
`uniacid` varchar(50) NOT NULL,
`coordinates` varchar(50) NOT NULL COMMENT '坐标',
`content` text NOT NULL COMMENT '简介',
`imgs` varchar(500) NOT NULL COMMENT '多图',
`views` int(11) NOT NULL,
`tel2` varchar(20) NOT NULL,
`cityname` varchar(50) NOT NULL,
`dq_time` int(11) NOT NULL,
`type2_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yellowtype` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`type_name` varchar(20) NOT NULL COMMENT '分类名称',
`img` varchar(100) NOT NULL COMMENT '分类图片',
`uniacid` int(11) NOT NULL COMMENT '小程序id',
`num` int(11) NOT NULL,
`money` decimal(10,2) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用,2禁用',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yellowtype2` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL COMMENT '分类名称',
`type_id` int(11) NOT NULL COMMENT '主分类id',
`num` int(11) NOT NULL,
`uniacid` int(11) NOT NULL,
`state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用,2禁用',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yjset` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(4) NOT NULL DEFAULT '1' COMMENT '1统一模式,2分开模式',
`typer` varchar(10) NOT NULL COMMENT '统一比例',
`sjper` varchar(10) NOT NULL COMMENT '商家比例',
`hyper` varchar(10) NOT NULL COMMENT '黄页比例',
`pcper` varchar(10) NOT NULL COMMENT '拼车比例',
`tzper` varchar(10) NOT NULL COMMENT '帖子比例',
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_yjtx` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`account_id` int(11) NOT NULL COMMENT '账号id',
`tx_type` int(4) NOT NULL COMMENT '提现方式 1,支付宝,2微信,3银联',
`tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
`status` int(4) NOT NULL COMMENT '状态 1申请,2通过,3拒绝',
`uniacid` varchar(50) NOT NULL,
`cerated_time` datetime NOT NULL COMMENT '日期',
`sj_cost` decimal(10,2) NOT NULL COMMENT '实际金额',
`account` varchar(30) NOT NULL COMMENT '账户',
`name` varchar(30) NOT NULL COMMENT '姓名',
`sx_cost` decimal(10,2) NOT NULL COMMENT '手续费',
`time` datetime NOT NULL COMMENT '审核时间',
`is_del` int(4) NOT NULL DEFAULT '1' COMMENT '1正常,2删除',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_zx` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_id` int(11) NOT NULL COMMENT '分类ID',
`user_id` int(11) NOT NULL COMMENT '发布人ID',
`title` varchar(200) NOT NULL COMMENT '标题',
`content` text NOT NULL COMMENT '内容',
`time` datetime NOT NULL,
`yd_num` int(11) NOT NULL COMMENT '阅读数量',
`pl_num` int(11) NOT NULL COMMENT '评论数量',
`uniacid` varchar(50) NOT NULL,
`imgs` text NOT NULL COMMENT '图片',
`state` int(4) NOT NULL,
`sh_time` datetime NOT NULL,
`type` int(4) NOT NULL,
`cityname` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_zx_assess` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`zx_id` int(4) NOT NULL,
`score` int(11) NOT NULL,
`content` text NOT NULL,
`img` varchar(500) NOT NULL,
`cerated_time` datetime NOT NULL,
`user_id` int(11) NOT NULL,
`uniacid` varchar(50) NOT NULL,
`status` int(4) NOT NULL,
`reply` text NOT NULL,
`reply_time` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_zx_type` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type_name` varchar(100) NOT NULL COMMENT '分类名称',
`icon` varchar(100) NOT NULL COMMENT '图标',
`sort` int(4) NOT NULL COMMENT '排序',
`time` datetime NOT NULL COMMENT '时间',
`uniacid` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_zhtc_zx_zj` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`zx_id` int(11) NOT NULL COMMENT '资讯ID',
`user_id` int(11) NOT NULL COMMENT '用户ID',
`uniacid` varchar(50) NOT NULL,
`time` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");
