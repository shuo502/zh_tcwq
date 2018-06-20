<?php
pdo_query("
CREATE TABLE `ims_zhtc_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号',
  `storeid` varchar(1000) NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `from_user` varchar(100) NOT NULL DEFAULT '',
  `accountname` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `salt` varchar(10) NOT NULL DEFAULT '',
  `pwd` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pay_account` varchar(200) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '状态',
  `role` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:店长,2:店员',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(15) NOT NULL,
  `areaid` int(10) NOT NULL DEFAULT '0' COMMENT '区域id',
  `is_admin_order` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_notice_order` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_notice_queue` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_notice_service` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_notice_boss` tinyint(1) NOT NULL DEFAULT '0',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度',
  `lng` decimal(18,10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度',
  `cityname` varchar(50) NOT NULL COMMENT '城市名称',
  `money` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_acthxlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '活动标题',
  `logo` varchar(200) NOT NULL COMMENT '活动logo',
  `img` text NOT NULL COMMENT '活动轮播图',
  `details` text NOT NULL COMMENT '活动详情',
  `number` int(11) NOT NULL COMMENT '限制人数',
  `sign_num` int(11) NOT NULL COMMENT '限制人数',
  `time` varchar(20) NOT NULL COMMENT '发布时间',
  `start_time` varchar(20) NOT NULL COMMENT '开始时间',
  `end_time` varchar(20) NOT NULL COMMENT '结束时间',
  `uniacid` int(11) NOT NULL COMMENT '小程序id',
  `money` decimal(10,2) NOT NULL COMMENT '价格',
  `type_id` int(11) NOT NULL COMMENT '分类id',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `coordinate` varchar(50) NOT NULL COMMENT '坐标',
  `num` int(11) NOT NULL COMMENT '排序',
  `view` int(11) NOT NULL COMMENT '访问量',
  `is_bm` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2.关闭',
  `cityname` varchar(20) NOT NULL COMMENT '城市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_acttype` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `state` int(11) NOT NULL COMMENT '1.开启2.关闭',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_ad` (
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL COMMENT '区域名称',
  `num` int(11) NOT NULL COMMENT '排序',
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_car` (
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='拼车';
CREATE TABLE `ims_zhtc_car_my_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL COMMENT '标签id',
  `car_id` int(11) NOT NULL COMMENT '拼车ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_car_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL COMMENT '分类名称',
  `tagname` varchar(30) NOT NULL COMMENT '标签名称',
  `uniacid` varchar(11) NOT NULL COMMENT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_car_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月',
  `money` decimal(10,2) NOT NULL COMMENT '价格',
  `uniacid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='拼车置顶';
CREATE TABLE `ims_zhtc_carpaylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(44) NOT NULL COMMENT '拼车id',
  `money` decimal(10,2) NOT NULL COMMENT '钱',
  `time` datetime NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='拼车支付记录表';
CREATE TABLE `ims_zhtc_comments` (
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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_commission_withdrawal` (
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
  `bank` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='佣金提现';
CREATE TABLE `ims_zhtc_continuous` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL COMMENT '天数',
  `integral` int(11) NOT NULL COMMENT '积分',
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_distribution` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='分销申请';
CREATE TABLE `ims_zhtc_earnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `son_id` int(11) NOT NULL COMMENT '下线',
  `money` decimal(10,2) NOT NULL,
  `time` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='佣金收益表';
CREATE TABLE `ims_zhtc_fx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `zf_user_id` int(11) NOT NULL COMMENT '转发人ID',
  `money` decimal(10,2) NOT NULL COMMENT '金额',
  `time` int(11) NOT NULL COMMENT '时间戳',
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分销表';
CREATE TABLE `ims_zhtc_fxlevel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `commission` int(11) NOT NULL COMMENT '1级佣金比例',
  `commission2` int(11) NOT NULL COMMENT '2级佣金比例',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_fxset` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_fxuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '一级分销',
  `fx_user` int(11) NOT NULL COMMENT '二级分销',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_goods` (
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
  `is_show` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='商品表';
CREATE TABLE `ims_zhtc_goods_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spec_name` varchar(100) NOT NULL COMMENT '规格名称',
  `sort` int(4) NOT NULL COMMENT '排序',
  `uniacid` varchar(50) NOT NULL COMMENT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='商品规格表';
CREATE TABLE `ims_zhtc_hblq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `tz_id` int(11) NOT NULL COMMENT '帖子ID',
  `money` decimal(10,2) NOT NULL COMMENT '金额',
  `time` int(11) NOT NULL COMMENT '时间戳',
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8 COMMENT='红包领取表';
CREATE TABLE `ims_zhtc_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL COMMENT '标题',
  `answer` text NOT NULL COMMENT '回答',
  `sort` int(4) NOT NULL COMMENT '排序',
  `uniacid` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_hotcity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(50) NOT NULL COMMENT '城市名称',
  `time` int(11) NOT NULL COMMENT '创建时间',
  `uniacid` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1780 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '1.一天2.半年3.一年',
  `money` decimal(10,2) NOT NULL,
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_information` (
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
  `user_img2` varchar(100) NOT NULL,
  `dq_time` int(11) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `hbfx_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2018 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_integral` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `score` int(11) NOT NULL COMMENT '分数',
  `type` int(4) NOT NULL COMMENT '1加,2减',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `cerated_time` datetime NOT NULL COMMENT '创建时间',
  `uniacid` varchar(50) NOT NULL,
  `note` varchar(20) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_jfgoods` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_jfrecord` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_jftype` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_joinlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `code` varchar(100) NOT NULL,
  `form_id` varchar(100) NOT NULL,
  `state` int(11) NOT NULL COMMENT '1.待支付2.已支付3.已通过4.已核销5.已拒绝',
  `uniacid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `hx_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(20) NOT NULL,
  `type2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL COMMENT '帖子id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `zx_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_mylabel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_nav` (
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_news` (
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_order` (
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
  `kd_num` varchar(100) NOT NULL,
  `kd_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='订单表';
CREATE TABLE `ims_zhtc_paylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '外键id(商家,帖子,黄页,拼车)',
  `money` decimal(10,2) NOT NULL COMMENT '钱',
  `time` datetime NOT NULL COMMENT '时间',
  `uniacid` varchar(50) NOT NULL COMMENT '50',
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='支付记录表';
CREATE TABLE `ims_zhtc_qbmx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) NOT NULL,
  `type` int(11) NOT NULL,
  `note` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL COMMENT '帖子id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_signlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL COMMENT '签到时间',
  `time2` int(11) NOT NULL,
  `integral` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `time3` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_signset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `one` int(11) NOT NULL COMMENT '首次奖励积分',
  `integral` int(11) NOT NULL COMMENT '每天签到积分',
  `is_open` int(11) NOT NULL COMMENT '1.开启2.关闭  签到',
  `is_bq` int(11) NOT NULL COMMENT '1.开启2.关闭  补签',
  `bq_integral` int(11) NOT NULL COMMENT '补签扣除积分',
  `details` text NOT NULL COMMENT '签到说明',
  `uniacid` int(11) NOT NULL,
  `qd_img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_sms` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_spec_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `spec_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL COMMENT '价格',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `num` int(11) NOT NULL COMMENT '数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_special` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(20) NOT NULL COMMENT '日期',
  `integral` int(11) NOT NULL COMMENT '积分',
  `title` varchar(20) NOT NULL COMMENT '标题说明',
  `color` varchar(20) NOT NULL COMMENT '颜色',
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_store` (
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
) ENGINE=InnoDB AUTO_INCREMENT=465 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_store_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `note` varchar(20) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1加2减',
  `time` varchar(20) NOT NULL,
  `tx_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商家钱包明细';
CREATE TABLE `ims_zhtc_storepaylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL COMMENT '商家ID',
  `money` decimal(10,2) NOT NULL,
  `time` datetime NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  `note` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COMMENT='商家入驻支付记录表';
CREATE TABLE `ims_zhtc_storetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL COMMENT '分类名称',
  `img` varchar(100) NOT NULL COMMENT '分类图片',
  `uniacid` int(11) NOT NULL,
  `num` int(11) NOT NULL COMMENT '排序',
  `money` decimal(10,2) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_storetype2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT '主分类id',
  `num` int(11) NOT NULL COMMENT '排序',
  `uniacid` int(11) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_storetypead` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '轮播图标题',
  `logo` varchar(200) NOT NULL COMMENT '图片',
  `status` int(11) NOT NULL COMMENT '1.开启  2.关闭',
  `src` varchar(100) NOT NULL COMMENT '链接',
  `orderby` int(11) NOT NULL COMMENT '排序',
  `xcx_name` varchar(20) NOT NULL,
  `appid` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_id2` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL COMMENT '小程序id',
  `cityname` varchar(50) NOT NULL COMMENT '城市名称',
  `wb_src` varchar(300) NOT NULL COMMENT '外部链接',
  `state` int(4) NOT NULL DEFAULT '1' COMMENT '1内部，2外部,3跳转',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_system` (
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
  `hb_sxf` int(11) NOT NULL,
  `tx_money` decimal(10,2) NOT NULL,
  `tx_sxf` int(11) NOT NULL,
  `tx_details` text NOT NULL,
  `rz_xuz` text NOT NULL,
  `ft_xuz` text NOT NULL,
  `fx_money` decimal(10,2) NOT NULL,
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
  `is_pageopen` int(11) NOT NULL,
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
  `tzmc` varchar(20) NOT NULL DEFAULT '帖子',
  `is_dnss` int(11) NOT NULL DEFAULT '1',
  `is_vr` int(11) NOT NULL DEFAULT '1',
  `is_yysj` int(11) NOT NULL DEFAULT '1',
  `tc_img` varchar(100) NOT NULL,
  `tc_gg` varchar(100) NOT NULL,
  `hbbj_img` varchar(200) NOT NULL,
  `gs_img` text NOT NULL,
  `gs_details` text NOT NULL,
  `gs_tel` varchar(20) NOT NULL,
  `gs_time` varchar(50) NOT NULL,
  `gs_add` varchar(200) NOT NULL,
  `gs_zb` varchar(50) NOT NULL,
  `model` int(4) NOT NULL DEFAULT '1',
  `is_bm` int(11) NOT NULL DEFAULT '2',
  `zf_title` varchar(50) NOT NULL,
  `sh_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月',
  `money` decimal(10,2) NOT NULL COMMENT '价格',
  `uniacid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL COMMENT '分类名称',
  `img` varchar(100) NOT NULL COMMENT '分类图片',
  `uniacid` int(11) NOT NULL COMMENT '小程序id',
  `num` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1',
  `sx_money` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_type2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `type_id` int(11) NOT NULL COMMENT '主分类id',
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_tzpaylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tz_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `time` datetime NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  `note` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='帖子支付记录表';
CREATE TABLE `ims_zhtc_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2266 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_userformid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `form_id` varchar(50) NOT NULL COMMENT 'form_id',
  `time` datetime NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5802 DEFAULT CHARSET=utf8 COMMENT='formid表';
CREATE TABLE `ims_zhtc_video` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_videodz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_videopl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `video_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_videotype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL COMMENT '分类名称',
  `img` varchar(100) NOT NULL COMMENT '分类图片',
  `uniacid` int(11) NOT NULL COMMENT '小程序id',
  `num` int(11) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_withdrawal` (
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
  `bank` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_yellowpaylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hy_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `time` datetime NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='黄页支付记录表';
CREATE TABLE `ims_zhtc_yellowset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL COMMENT '入住天数',
  `money` decimal(10,2) NOT NULL,
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='黄页设置表';
CREATE TABLE `ims_zhtc_yellowstore` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_yellowtype` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL COMMENT '分类名称',
  `img` varchar(100) NOT NULL COMMENT '分类图片',
  `uniacid` int(11) NOT NULL COMMENT '小程序id',
  `num` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用,2禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_yellowtype2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `type_id` int(11) NOT NULL COMMENT '主分类id',
  `num` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用,2禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_yjset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL DEFAULT '1' COMMENT '1统一模式,2分开模式',
  `typer` varchar(10) NOT NULL COMMENT '统一比例',
  `sjper` varchar(10) NOT NULL COMMENT '商家比例',
  `hyper` varchar(10) NOT NULL COMMENT '黄页比例',
  `pcper` varchar(10) NOT NULL COMMENT '拼车比例',
  `tzper` varchar(10) NOT NULL COMMENT '帖子比例',
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='佣金比例表';
CREATE TABLE `ims_zhtc_yjtx` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_zx` (
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_zx_assess` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_zx_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL COMMENT '分类名称',
  `icon` varchar(100) NOT NULL COMMENT '图标',
  `sort` int(4) NOT NULL COMMENT '排序',
  `time` datetime NOT NULL COMMENT '时间',
  `uniacid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
CREATE TABLE `ims_zhtc_zx_zj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zx_id` int(11) NOT NULL COMMENT '资讯ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `uniacid` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COMMENT='资讯足迹';

");
if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'weid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'storeid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `storeid` varchar(1000) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'uid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `uid` int(10) unsigned NOT NULL DEFAULT '0';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'from_user')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `from_user` varchar(100) NOT NULL DEFAULT '';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'accountname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `accountname` varchar(50) NOT NULL DEFAULT '';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'password')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `password` varchar(200) NOT NULL DEFAULT '';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'salt')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `salt` varchar(10) NOT NULL DEFAULT '';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'pwd')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `pwd` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'mobile')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `mobile` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'email')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `email` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'username')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `username` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'pay_account')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `pay_account` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'displayorder')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'dateline')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `dateline` int(10) unsigned NOT NULL DEFAULT '0';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `status` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '状态';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'role')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `role` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:店长;2:店员';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'lastvisit')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `lastvisit` int(10) unsigned NOT NULL DEFAULT '0';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'lastip')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `lastip` varchar(15) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'areaid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `areaid` int(10) NOT NULL DEFAULT '0' COMMENT '区域id';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'is_admin_order')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `is_admin_order` tinyint(1) unsigned NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'is_notice_order')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `is_notice_order` tinyint(1) unsigned NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'is_notice_queue')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `is_notice_queue` tinyint(1) unsigned NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'is_notice_service')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `is_notice_service` tinyint(1) unsigned NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'is_notice_boss')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `is_notice_boss` tinyint(1) NOT NULL DEFAULT '0';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'remark')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'lat')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `lat` decimal(18;10) NOT NULL DEFAULT '0.0000000000' COMMENT '经度';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'lng')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `lng` decimal(18;10) NOT NULL DEFAULT '0.0000000000' COMMENT '纬度';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `cityname` varchar(50) NOT NULL COMMENT '城市名称';");
}
}

if(pdo_tableexists('ims_zhtc_account')) {
if(!pdo_fieldexists('ims_zhtc_account',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_account')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_acthxlist')) {
if(!pdo_fieldexists('ims_zhtc_acthxlist',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acthxlist')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_acthxlist')) {
if(!pdo_fieldexists('ims_zhtc_acthxlist',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acthxlist')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_acthxlist')) {
if(!pdo_fieldexists('ims_zhtc_acthxlist',  'act_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acthxlist')."ADD `act_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `title` varchar(50) NOT NULL COMMENT '活动标题';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `logo` varchar(200) NOT NULL COMMENT '活动logo';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `img` text NOT NULL COMMENT '活动轮播图';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `details` text NOT NULL COMMENT '活动详情';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'number')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `number` int(11) NOT NULL COMMENT '限制人数';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'sign_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `sign_num` int(11) NOT NULL COMMENT '限制人数';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `time` varchar(20) NOT NULL COMMENT '发布时间';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'start_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `start_time` varchar(20) NOT NULL COMMENT '开始时间';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'end_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `end_time` varchar(20) NOT NULL COMMENT '结束时间';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `money` decimal(10;2) NOT NULL COMMENT '价格';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `type_id` int(11) NOT NULL COMMENT '分类id';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `tel` varchar(20) NOT NULL COMMENT '电话';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `address` varchar(200) NOT NULL COMMENT '地址';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'coordinate')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `coordinate` varchar(50) NOT NULL COMMENT '坐标';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'view')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `view` int(11) NOT NULL COMMENT '访问量';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'is_bm')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `is_bm` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2.关闭';");
}
}

if(pdo_tableexists('ims_zhtc_activity')) {
if(!pdo_fieldexists('ims_zhtc_activity',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_activity')."ADD `cityname` varchar(20) NOT NULL COMMENT '城市';");
}
}

if(pdo_tableexists('ims_zhtc_acttype')) {
if(!pdo_fieldexists('ims_zhtc_acttype',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acttype')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_acttype')) {
if(!pdo_fieldexists('ims_zhtc_acttype',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acttype')."ADD `type_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_acttype')) {
if(!pdo_fieldexists('ims_zhtc_acttype',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acttype')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_acttype')) {
if(!pdo_fieldexists('ims_zhtc_acttype',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acttype')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_acttype')) {
if(!pdo_fieldexists('ims_zhtc_acttype',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_acttype')."ADD `state` int(11) NOT NULL COMMENT '1.开启2.关闭';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `title` varchar(50) NOT NULL COMMENT '轮播图标题';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `logo` varchar(200) NOT NULL COMMENT '图片';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `status` int(11) NOT NULL COMMENT '1.开启  2.关闭';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `src` varchar(100) NOT NULL COMMENT '链接';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'orderby')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `orderby` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'xcx_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `xcx_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'appid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `appid` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'wb_src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `wb_src` varchar(300) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_ad')) {
if(!pdo_fieldexists('ims_zhtc_ad',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_ad')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_area')) {
if(!pdo_fieldexists('ims_zhtc_area',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_area')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_area')) {
if(!pdo_fieldexists('ims_zhtc_area',  'area_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_area')."ADD `area_name` varchar(50) NOT NULL COMMENT '区域名称';");
}
}

if(pdo_tableexists('ims_zhtc_area')) {
if(!pdo_fieldexists('ims_zhtc_area',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_area')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_area')) {
if(!pdo_fieldexists('ims_zhtc_area',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_area')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'start_place')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `start_place` varchar(100) NOT NULL COMMENT '出发地';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'end_place')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `end_place` varchar(100) NOT NULL COMMENT '目的地';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'start_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `start_time` varchar(30) NOT NULL COMMENT '出发时间';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `num` int(4) NOT NULL COMMENT '乘车人数/可乘人数';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'link_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `link_name` varchar(30) NOT NULL COMMENT '联系人';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'link_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `link_tel` varchar(20) NOT NULL COMMENT '联系电话';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'typename')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `typename` varchar(30) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'other')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `other` varchar(300) NOT NULL COMMENT '补充';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `time` int(11) NOT NULL COMMENT '发布时间';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `sh_time` int(11) NOT NULL COMMENT '审核时间';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'top_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `top_id` int(11) NOT NULL COMMENT '置顶ID';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'top')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `top` int(4) NOT NULL COMMENT '是否置顶;1;是;2否';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `state` int(4) NOT NULL COMMENT '1待审核;2通过，3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'tj_place')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `tj_place` varchar(300) NOT NULL COMMENT '途经地';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'hw_wet')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `hw_wet` varchar(10) NOT NULL COMMENT '货物重量';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'star_lat')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `star_lat` varchar(20) NOT NULL COMMENT '出发地维度';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'star_lng')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `star_lng` varchar(20) NOT NULL COMMENT '出发地经度';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'end_lat')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `end_lat` varchar(20) NOT NULL COMMENT '目的地维度';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'end_lng')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `end_lng` varchar(20) NOT NULL COMMENT '目的地经度';");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'is_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `is_open` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'start_time2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `start_time2` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car')) {
if(!pdo_fieldexists('ims_zhtc_car',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car_my_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_my_tag',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_my_tag')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_car_my_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_my_tag',  'tag_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_my_tag')."ADD `tag_id` int(11) NOT NULL COMMENT '标签id';");
}
}

if(pdo_tableexists('ims_zhtc_car_my_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_my_tag',  'car_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_my_tag')."ADD `car_id` int(11) NOT NULL COMMENT '拼车ID';");
}
}

if(pdo_tableexists('ims_zhtc_car_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_tag',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_tag')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_car_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_tag',  'typename')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_tag')."ADD `typename` varchar(30) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_car_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_tag',  'tagname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_tag')."ADD `tagname` varchar(30) NOT NULL COMMENT '标签名称';");
}
}

if(pdo_tableexists('ims_zhtc_car_tag')) {
if(!pdo_fieldexists('ims_zhtc_car_tag',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_tag')."ADD `uniacid` varchar(11) NOT NULL COMMENT '50';");
}
}

if(pdo_tableexists('ims_zhtc_car_top')) {
if(!pdo_fieldexists('ims_zhtc_car_top',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_top')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_car_top')) {
if(!pdo_fieldexists('ims_zhtc_car_top',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_top')."ADD `type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月';");
}
}

if(pdo_tableexists('ims_zhtc_car_top')) {
if(!pdo_fieldexists('ims_zhtc_car_top',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_top')."ADD `money` decimal(10;2) NOT NULL COMMENT '价格';");
}
}

if(pdo_tableexists('ims_zhtc_car_top')) {
if(!pdo_fieldexists('ims_zhtc_car_top',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_top')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_car_top')) {
if(!pdo_fieldexists('ims_zhtc_car_top',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_car_top')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_carpaylog')) {
if(!pdo_fieldexists('ims_zhtc_carpaylog',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_carpaylog')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_carpaylog')) {
if(!pdo_fieldexists('ims_zhtc_carpaylog',  'car_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_carpaylog')."ADD `car_id` int(44) NOT NULL COMMENT '拼车id';");
}
}

if(pdo_tableexists('ims_zhtc_carpaylog')) {
if(!pdo_fieldexists('ims_zhtc_carpaylog',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_carpaylog')."ADD `money` decimal(10;2) NOT NULL COMMENT '钱';");
}
}

if(pdo_tableexists('ims_zhtc_carpaylog')) {
if(!pdo_fieldexists('ims_zhtc_carpaylog',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_carpaylog')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_carpaylog')) {
if(!pdo_fieldexists('ims_zhtc_carpaylog',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_carpaylog')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'information_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `information_id` int(11) NOT NULL COMMENT '帖子id';");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `details` varchar(200) NOT NULL COMMENT '评论详情';");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `time` varchar(20) NOT NULL COMMENT '时间';");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'reply')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `reply` varchar(200) NOT NULL COMMENT '回复详情';");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'hf_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `hf_time` varchar(20) NOT NULL COMMENT '回复时间';");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_comments')) {
if(!pdo_fieldexists('ims_zhtc_comments',  'score')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_comments')."ADD `score` decimal(10;1) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `type` int(11) NOT NULL COMMENT '1.支付宝2.银行卡';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `time` int(11) NOT NULL COMMENT '申请时间';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `sh_time` int(11) NOT NULL COMMENT '审核时间';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `user_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'account')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `account` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'tx_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `tx_cost` decimal(10;2) NOT NULL COMMENT '提现金额';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'sj_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `sj_cost` decimal(10;2) NOT NULL COMMENT '实际到账金额';");
}
}

if(pdo_tableexists('ims_zhtc_commission_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_commission_withdrawal',  'bank')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_commission_withdrawal')."ADD `bank` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_continuous')) {
if(!pdo_fieldexists('ims_zhtc_continuous',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_continuous')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_continuous')) {
if(!pdo_fieldexists('ims_zhtc_continuous',  'day')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_continuous')."ADD `day` int(11) NOT NULL COMMENT '天数';");
}
}

if(pdo_tableexists('ims_zhtc_continuous')) {
if(!pdo_fieldexists('ims_zhtc_continuous',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_continuous')."ADD `integral` int(11) NOT NULL COMMENT '积分';");
}
}

if(pdo_tableexists('ims_zhtc_continuous')) {
if(!pdo_fieldexists('ims_zhtc_continuous',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_continuous')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `user_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'user_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `user_tel` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'pay_state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `pay_state` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'code')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `code` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'level')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `level` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_distribution')) {
if(!pdo_fieldexists('ims_zhtc_distribution',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_distribution')."ADD `cityname` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'son_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `son_id` int(11) NOT NULL COMMENT '下线';");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_earnings')) {
if(!pdo_fieldexists('ims_zhtc_earnings',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_earnings')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `user_id` int(11) NOT NULL COMMENT '用户ID';");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'zf_user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `zf_user_id` int(11) NOT NULL COMMENT '转发人ID';");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `money` decimal(10;2) NOT NULL COMMENT '金额';");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `time` int(11) NOT NULL COMMENT '时间戳';");
}
}

if(pdo_tableexists('ims_zhtc_fx')) {
if(!pdo_fieldexists('ims_zhtc_fx',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fx')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'commission')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `commission` int(11) NOT NULL COMMENT '1级佣金比例';");
}
}

if(pdo_tableexists('ims_zhtc_fxlevel')) {
if(!pdo_fieldexists('ims_zhtc_fxlevel',  'commission2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxlevel')."ADD `commission2` int(11) NOT NULL COMMENT '2级佣金比例';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'fx_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `fx_details` text NOT NULL COMMENT '分销商申请协议';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'tx_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `tx_details` text NOT NULL COMMENT '佣金提现协议';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'is_fx')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'is_ej')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'tx_rate')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `tx_rate` int(11) NOT NULL COMMENT '提现手续费';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'commission')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `commission` varchar(10) NOT NULL COMMENT '一级佣金';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'commission2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `commission2` varchar(10) NOT NULL COMMENT '二级佣金';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'tx_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `tx_money` int(11) NOT NULL COMMENT '提现门槛';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `img` varchar(100) NOT NULL COMMENT '分销中心图片';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'img2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `img2` varchar(100) NOT NULL COMMENT '申请分销图片';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'is_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
}

if(pdo_tableexists('ims_zhtc_fxset')) {
if(!pdo_fieldexists('ims_zhtc_fxset',  'instructions')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxset')."ADD `instructions` text NOT NULL COMMENT '分销商说明';");
}
}

if(pdo_tableexists('ims_zhtc_fxuser')) {
if(!pdo_fieldexists('ims_zhtc_fxuser',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxuser')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_fxuser')) {
if(!pdo_fieldexists('ims_zhtc_fxuser',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxuser')."ADD `user_id` int(11) NOT NULL COMMENT '一级分销';");
}
}

if(pdo_tableexists('ims_zhtc_fxuser')) {
if(!pdo_fieldexists('ims_zhtc_fxuser',  'fx_user')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxuser')."ADD `fx_user` int(11) NOT NULL COMMENT '二级分销';");
}
}

if(pdo_tableexists('ims_zhtc_fxuser')) {
if(!pdo_fieldexists('ims_zhtc_fxuser',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_fxuser')."ADD `time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `store_id` int(11) NOT NULL COMMENT '商家ID';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'spec_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `spec_id` int(11) NOT NULL COMMENT '主规格ID';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'goods_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `goods_name` varchar(100) NOT NULL COMMENT '商品名称';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'goods_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `goods_num` int(11) NOT NULL COMMENT '商品数量';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'goods_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `goods_cost` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'freight')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `freight` decimal(10;2) NOT NULL COMMENT '运费';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'delivery')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `delivery` varchar(500) NOT NULL COMMENT '关于发货';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'quality')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `quality` int(4) NOT NULL COMMENT '正品1是;0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'free')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `free` int(4) NOT NULL COMMENT '包邮1是;0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'all_day')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `all_day` int(4) NOT NULL COMMENT '24小时发货1是;0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'service')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `service` int(4) NOT NULL COMMENT '售后服务1是;0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'refund')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `refund` int(4) NOT NULL COMMENT '极速退款1是;0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'weeks')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `weeks` int(4) NOT NULL COMMENT '7天包邮1是，0否';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'lb_imgs')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `lb_imgs` varchar(500) NOT NULL COMMENT '轮播图';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'imgs')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `imgs` varchar(500) NOT NULL COMMENT '商品介绍图';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `time` int(11) NOT NULL COMMENT '时间';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'goods_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `goods_details` text NOT NULL COMMENT '商品详细';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `state` int(4) NOT NULL COMMENT '1待审核;2通过，3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'sy_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `sy_num` int(11) NOT NULL COMMENT '剩余数量';");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'is_show')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `is_show` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_goods')) {
if(!pdo_fieldexists('ims_zhtc_goods',  'sales')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods')."ADD `sales` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_goods_spec')) {
if(!pdo_fieldexists('ims_zhtc_goods_spec',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods_spec')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_goods_spec')) {
if(!pdo_fieldexists('ims_zhtc_goods_spec',  'spec_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods_spec')."ADD `spec_name` varchar(100) NOT NULL COMMENT '规格名称';");
}
}

if(pdo_tableexists('ims_zhtc_goods_spec')) {
if(!pdo_fieldexists('ims_zhtc_goods_spec',  'sort')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods_spec')."ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_goods_spec')) {
if(!pdo_fieldexists('ims_zhtc_goods_spec',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_goods_spec')."ADD `uniacid` varchar(50) NOT NULL COMMENT '50';");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `user_id` int(11) NOT NULL COMMENT '用户ID';");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'tz_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `tz_id` int(11) NOT NULL COMMENT '帖子ID';");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `money` decimal(10;2) NOT NULL COMMENT '金额';");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `time` int(11) NOT NULL COMMENT '时间戳';");
}
}

if(pdo_tableexists('ims_zhtc_hblq')) {
if(!pdo_fieldexists('ims_zhtc_hblq',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hblq')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'question')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `question` varchar(200) NOT NULL COMMENT '标题';");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'answer')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `answer` text NOT NULL COMMENT '回答';");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'sort')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_help')) {
if(!pdo_fieldexists('ims_zhtc_help',  'created_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_help')."ADD `created_time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_hotcity')) {
if(!pdo_fieldexists('ims_zhtc_hotcity',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hotcity')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_hotcity')) {
if(!pdo_fieldexists('ims_zhtc_hotcity',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hotcity')."ADD `cityname` varchar(50) NOT NULL COMMENT '城市名称';");
}
}

if(pdo_tableexists('ims_zhtc_hotcity')) {
if(!pdo_fieldexists('ims_zhtc_hotcity',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hotcity')."ADD `time` int(11) NOT NULL COMMENT '创建时间';");
}
}

if(pdo_tableexists('ims_zhtc_hotcity')) {
if(!pdo_fieldexists('ims_zhtc_hotcity',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hotcity')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_hotcity')) {
if(!pdo_fieldexists('ims_zhtc_hotcity',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_hotcity')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_in')) {
if(!pdo_fieldexists('ims_zhtc_in',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_in')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_in')) {
if(!pdo_fieldexists('ims_zhtc_in',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_in')."ADD `type` int(11) NOT NULL COMMENT '1.一天2.半年3.一年';");
}
}

if(pdo_tableexists('ims_zhtc_in')) {
if(!pdo_fieldexists('ims_zhtc_in',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_in')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_in')) {
if(!pdo_fieldexists('ims_zhtc_in',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_in')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_in')) {
if(!pdo_fieldexists('ims_zhtc_in',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_in')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `details` text NOT NULL COMMENT '内容';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `img` text NOT NULL COMMENT '图片';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `user_name` varchar(20) NOT NULL COMMENT '联系人';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'user_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `user_tel` varchar(20) NOT NULL COMMENT '电话';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hot')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hot` int(11) NOT NULL COMMENT '1.热门 2.不热门';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'top')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `top` int(11) NOT NULL COMMENT '1.置顶 2.不置顶';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'givelike')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `givelike` int(11) NOT NULL COMMENT '点赞数';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'views')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `views` int(11) NOT NULL COMMENT '浏览量';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'type2_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `type2_id` int(11) NOT NULL COMMENT '分类二id';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `type_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `state` int(11) NOT NULL COMMENT '1.待审核 2.通过3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `time` int(11) NOT NULL COMMENT '发布时间';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `sh_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'top_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `top_type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `address` varchar(500) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hb_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hb_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hb_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hb_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hb_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hb_type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hb_keyword')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hb_keyword` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hb_random')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hb_random` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hong')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hong` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'del')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `del` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'user_img2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `user_img2` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'dq_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `dq_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_information')) {
if(!pdo_fieldexists('ims_zhtc_information',  'hbfx_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_information')."ADD `hbfx_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'score')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `score` int(11) NOT NULL COMMENT '分数';");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `type` int(4) NOT NULL COMMENT '1加;2减';");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'order_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `order_id` int(11) NOT NULL COMMENT '订单id';");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'cerated_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `cerated_time` datetime NOT NULL COMMENT '创建时间';");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_integral')) {
if(!pdo_fieldexists('ims_zhtc_integral',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_integral')."ADD `note` varchar(20) NOT NULL COMMENT '备注';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `name` varchar(50) NOT NULL COMMENT '名称';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `money` int(11) NOT NULL COMMENT '价格';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `type_id` int(11) NOT NULL COMMENT '分类id';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'goods_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `goods_details` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'process_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `process_details` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'attention_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `attention_details` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'number')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `number` int(11) NOT NULL COMMENT '数量';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `time` varchar(50) NOT NULL COMMENT '期限';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'is_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `is_open` int(11) NOT NULL COMMENT '1.开启2关闭';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `type` int(11) NOT NULL COMMENT '1.余额2.实物';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfgoods')) {
if(!pdo_fieldexists('ims_zhtc_jfgoods',  'hb_moeny')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfgoods')."ADD `hb_moeny` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'good_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `good_id` int(11) NOT NULL COMMENT '商品id';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `time` varchar(20) NOT NULL COMMENT '兑换时间';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `user_name` varchar(20) NOT NULL COMMENT '用户地址';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'user_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `user_tel` varchar(20) NOT NULL COMMENT '用户电话';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `address` varchar(200) NOT NULL COMMENT '地址';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `note` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `integral` int(11) NOT NULL COMMENT '积分';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'good_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `good_name` varchar(50) NOT NULL COMMENT '商品名称';");
}
}

if(pdo_tableexists('ims_zhtc_jfrecord')) {
if(!pdo_fieldexists('ims_zhtc_jfrecord',  'good_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jfrecord')."ADD `good_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jftype')) {
if(!pdo_fieldexists('ims_zhtc_jftype',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jftype')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_jftype')) {
if(!pdo_fieldexists('ims_zhtc_jftype',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jftype')."ADD `name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jftype')) {
if(!pdo_fieldexists('ims_zhtc_jftype',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jftype')."ADD `img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jftype')) {
if(!pdo_fieldexists('ims_zhtc_jftype',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jftype')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_jftype')) {
if(!pdo_fieldexists('ims_zhtc_jftype',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_jftype')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'act_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `act_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'code')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `code` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'form_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `form_id` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `state` int(11) NOT NULL COMMENT '1.待支付2.已支付3.已通过4.已核销5.已拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `user_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'user_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `user_tel` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_joinlist')) {
if(!pdo_fieldexists('ims_zhtc_joinlist',  'hx_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_joinlist')."ADD `hx_time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_label')) {
if(!pdo_fieldexists('ims_zhtc_label',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_label')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_label')) {
if(!pdo_fieldexists('ims_zhtc_label',  'label_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_label')."ADD `label_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_label')) {
if(!pdo_fieldexists('ims_zhtc_label',  'type2_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_label')."ADD `type2_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_like')) {
if(!pdo_fieldexists('ims_zhtc_like',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_like')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_like')) {
if(!pdo_fieldexists('ims_zhtc_like',  'information_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_like')."ADD `information_id` int(11) NOT NULL COMMENT '帖子id';");
}
}

if(pdo_tableexists('ims_zhtc_like')) {
if(!pdo_fieldexists('ims_zhtc_like',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_like')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_like')) {
if(!pdo_fieldexists('ims_zhtc_like',  'zx_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_like')."ADD `zx_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_mylabel')) {
if(!pdo_fieldexists('ims_zhtc_mylabel',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_mylabel')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_mylabel')) {
if(!pdo_fieldexists('ims_zhtc_mylabel',  'label_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_mylabel')."ADD `label_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_mylabel')) {
if(!pdo_fieldexists('ims_zhtc_mylabel',  'information_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_mylabel')."ADD `information_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `title` varchar(50) NOT NULL COMMENT '名称';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `logo` varchar(200) NOT NULL COMMENT '图标';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `status` int(11) NOT NULL COMMENT '1.开启  2.关闭';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `src` varchar(100) NOT NULL COMMENT '内部链接';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'orderby')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `orderby` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'xcx_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `xcx_name` varchar(20) NOT NULL COMMENT '小程序名称';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'appid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `appid` varchar(20) NOT NULL COMMENT 'APPID';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'wb_src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `wb_src` varchar(300) NOT NULL COMMENT '外部链接';");
}
}

if(pdo_tableexists('ims_zhtc_nav')) {
if(!pdo_fieldexists('ims_zhtc_nav',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_nav')."ADD `state` int(4) NOT NULL DEFAULT '1' COMMENT '1内部，2外部;3跳转';");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `title` varchar(50) NOT NULL COMMENT '公告标题';");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `details` text NOT NULL COMMENT '公告详情';");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `state` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_news')) {
if(!pdo_fieldexists('ims_zhtc_news',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_news')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `money` decimal(10;2) NOT NULL COMMENT '金额';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `user_name` varchar(20) NOT NULL COMMENT '联系人';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `address` varchar(200) NOT NULL COMMENT '联系地址';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `tel` varchar(20) NOT NULL COMMENT '电话';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `time` int(11) NOT NULL COMMENT '下单时间';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'pay_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `pay_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'complete_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `complete_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'fh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `fh_time` int(11) NOT NULL COMMENT '发货时间';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `state` int(11) NOT NULL COMMENT '1.待付款 2.待发货3.待确认4.已完成5.退款中6.已退款7.退款拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'order_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `order_num` varchar(20) NOT NULL COMMENT '订单号';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_name` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'out_trade_no')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `out_trade_no` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_spec')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_spec` varchar(200) NOT NULL COMMENT '商品规格';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'del')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `del` int(11) NOT NULL COMMENT '用户删除1是  2否 ';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'del2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `del2` int(11) NOT NULL COMMENT '商家删除1.是2.否';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'freight')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `freight` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `note` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'good_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `good_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'is_zt')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `is_zt` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'zt_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `zt_time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'kd_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `kd_num` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_order')) {
if(!pdo_fieldexists('ims_zhtc_order',  'kd_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_order')."ADD `kd_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'fid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `fid` int(11) NOT NULL COMMENT '外键id(商家;帖子;黄页;拼车)';");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `money` decimal(10;2) NOT NULL COMMENT '钱';");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `time` datetime NOT NULL COMMENT '时间';");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `uniacid` varchar(50) NOT NULL COMMENT '50';");
}
}

if(pdo_tableexists('ims_zhtc_paylog')) {
if(!pdo_fieldexists('ims_zhtc_paylog',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_paylog')."ADD `note` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `note` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_qbmx')) {
if(!pdo_fieldexists('ims_zhtc_qbmx',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_qbmx')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_share')) {
if(!pdo_fieldexists('ims_zhtc_share',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_share')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_share')) {
if(!pdo_fieldexists('ims_zhtc_share',  'information_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_share')."ADD `information_id` int(11) NOT NULL COMMENT '帖子id';");
}
}

if(pdo_tableexists('ims_zhtc_share')) {
if(!pdo_fieldexists('ims_zhtc_share',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_share')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_share')) {
if(!pdo_fieldexists('ims_zhtc_share',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_share')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `time` varchar(20) NOT NULL COMMENT '签到时间';");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'time2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `time2` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `integral` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signlist')) {
if(!pdo_fieldexists('ims_zhtc_signlist',  'time3')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signlist')."ADD `time3` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'one')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `one` int(11) NOT NULL COMMENT '首次奖励积分';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `integral` int(11) NOT NULL COMMENT '每天签到积分';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'is_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `is_open` int(11) NOT NULL COMMENT '1.开启2.关闭  签到';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'is_bq')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `is_bq` int(11) NOT NULL COMMENT '1.开启2.关闭  补签';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'bq_integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `bq_integral` int(11) NOT NULL COMMENT '补签扣除积分';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `details` text NOT NULL COMMENT '签到说明';");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_signset')) {
if(!pdo_fieldexists('ims_zhtc_signset',  'qd_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_signset')."ADD `qd_img` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'appkey')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `appkey` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'tpl_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `tpl_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'is_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `is_open` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'tid1')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `tid1` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'tid2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `tid2` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'tid3')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `tid3` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_sms')) {
if(!pdo_fieldexists('ims_zhtc_sms',  'tpl2_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_sms')."ADD `tpl2_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'goods_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `goods_id` int(11) NOT NULL COMMENT '商品ID';");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'spec_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `spec_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `money` decimal(10;2) NOT NULL COMMENT '价格';");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `name` varchar(50) NOT NULL COMMENT '名称';");
}
}

if(pdo_tableexists('ims_zhtc_spec_value')) {
if(!pdo_fieldexists('ims_zhtc_spec_value',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_spec_value')."ADD `num` int(11) NOT NULL COMMENT '数量';");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'day')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `day` varchar(20) NOT NULL COMMENT '日期';");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `integral` int(11) NOT NULL COMMENT '积分';");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `title` varchar(20) NOT NULL COMMENT '标题说明';");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'color')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `color` varchar(20) NOT NULL COMMENT '颜色';");
}
}

if(pdo_tableexists('ims_zhtc_special')) {
if(!pdo_fieldexists('ims_zhtc_special',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_special')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'store_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `store_name` varchar(50) NOT NULL COMMENT '商家名称';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `address` varchar(200) NOT NULL COMMENT '商家地址';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'announcement')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `announcement` varchar(100) NOT NULL COMMENT '公告';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'storetype_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `storetype_id` int(11) NOT NULL COMMENT '主行业分类id';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'storetype2_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `storetype2_id` int(11) NOT NULL COMMENT '商家子分类id';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'area_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `area_id` int(11) NOT NULL COMMENT '区域id';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'yy_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `yy_time` varchar(50) NOT NULL COMMENT '营业时间';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'keyword')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `keyword` varchar(50) NOT NULL COMMENT '关键字';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'skzf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `skzf` int(11) NOT NULL COMMENT '1.是 2否(刷卡支付)';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'wifi')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `wifi` int(11) NOT NULL COMMENT '1.是 2否';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'mftc')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `mftc` int(11) NOT NULL COMMENT '1.是 2否(免费停车)';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'jzxy')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `jzxy` int(11) NOT NULL COMMENT '1.是 2否(禁止吸烟)';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'tgbj')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `tgbj` int(11) NOT NULL COMMENT '1.是 2否(提供包间)';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'sfxx')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `sfxx` int(11) NOT NULL COMMENT '1.是 2否(沙发休闲)';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `tel` varchar(20) NOT NULL COMMENT '手机号';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `logo` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'weixin_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `weixin_logo` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'ad')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `ad` text NOT NULL COMMENT '轮播图';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `state` int(11) NOT NULL COMMENT '1.待审核2通过3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `money` decimal(10;2) NOT NULL COMMENT '金额';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'password')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `password` varchar(100) NOT NULL COMMENT '核销密码';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `details` text NOT NULL COMMENT '商家简介';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'coordinates')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `coordinates` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'views')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `views` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'score')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `score` decimal(10;1) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `type` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `sh_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'time_over')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `time_over` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `img` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'vr_link')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `vr_link` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'start_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `start_time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'end_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `end_time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'wallet')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `wallet` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `user_name` varchar(30) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'pwd')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `pwd` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'dq_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `dq_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'fx_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `fx_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'ewm_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `ewm_logo` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'is_top')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `is_top` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'yyzz_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `yyzz_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store')) {
if(!pdo_fieldexists('ims_zhtc_store',  'sfz_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store')."ADD `sfz_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `note` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `type` int(11) NOT NULL COMMENT '1加2减';");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_store_wallet')) {
if(!pdo_fieldexists('ims_zhtc_store_wallet',  'tx_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_store_wallet')."ADD `tx_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `store_id` int(11) NOT NULL COMMENT '商家ID';");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storepaylog')) {
if(!pdo_fieldexists('ims_zhtc_storepaylog',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storepaylog')."ADD `note` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `type_name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `img` varchar(100) NOT NULL COMMENT '分类图片';");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetype')) {
if(!pdo_fieldexists('ims_zhtc_storetype',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `type_id` int(11) NOT NULL COMMENT '主分类id';");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetype2')) {
if(!pdo_fieldexists('ims_zhtc_storetype2',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetype2')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `title` varchar(50) NOT NULL COMMENT '轮播图标题';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `logo` varchar(200) NOT NULL COMMENT '图片';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `status` int(11) NOT NULL COMMENT '1.开启  2.关闭';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `src` varchar(100) NOT NULL COMMENT '链接';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'orderby')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `orderby` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'xcx_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `xcx_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'appid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `appid` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `type_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'type_id2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `type_id2` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `cityname` varchar(50) NOT NULL COMMENT '城市名称';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'wb_src')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `wb_src` varchar(300) NOT NULL COMMENT '外部链接';");
}
}

if(pdo_tableexists('ims_zhtc_storetypead')) {
if(!pdo_fieldexists('ims_zhtc_storetypead',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_storetypead')."ADD `state` int(4) NOT NULL DEFAULT '1' COMMENT '1内部，2外部;3跳转';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'appid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `appid` varchar(100) NOT NULL COMMENT 'appid';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'appsecret')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `appsecret` varchar(200) NOT NULL COMMENT 'appsecret';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'mchid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `mchid` varchar(20) NOT NULL COMMENT '商户号';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'wxkey')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `wxkey` varchar(100) NOT NULL COMMENT '商户秘钥';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'url_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `url_name` varchar(20) NOT NULL COMMENT '网址名称';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `details` text NOT NULL COMMENT '关于我们';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'url_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `url_logo` varchar(100) NOT NULL COMMENT '网址logo';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'bq_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `bq_name` varchar(50) NOT NULL COMMENT '版权名称';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'link_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `link_name` varchar(30) NOT NULL COMMENT '网站名称';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'link_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `link_logo` varchar(100) NOT NULL COMMENT '网站logo';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'support')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `support` varchar(20) NOT NULL COMMENT '技术支持';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'bq_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `bq_logo` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'color')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `color` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tz_appid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tz_appid` varchar(30) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tz_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tz_name` varchar(30) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'pt_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `pt_name` varchar(30) NOT NULL COMMENT '平台名称';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tz_audit')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tz_audit` int(11) NOT NULL COMMENT '帖子审核1.是 2否';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'sj_audit')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `sj_audit` int(11) NOT NULL COMMENT '商家审核1.是 2否';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'mapkey')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `mapkey` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tel` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gd_key')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gd_key` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'hb_sxf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `hb_sxf` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tx_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tx_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tx_sxf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tx_sxf` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tx_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tx_details` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'rz_xuz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `rz_xuz` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'ft_xuz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `ft_xuz` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'fx_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `fx_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_hhr')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_hhr` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_hbfl')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_hbfl` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_zx')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_zx` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_car')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_car` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'pc_xuz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `pc_xuz` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'pc_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `pc_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_sjrz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_sjrz` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_pcfw')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_pcfw` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'total_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `total_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_goods')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_goods` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'apiclient_cert')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `apiclient_cert` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'apiclient_key')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `apiclient_key` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_openzx')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_openzx` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_hyset')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_hyset` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_tzopen')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_tzopen` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_pageopen')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_pageopen` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_tel` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tx_mode')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tx_mode` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'many_city')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `many_city` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tx_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tx_type` int(4) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_hbzf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_hbzf` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'hb_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `hb_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tz_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tz_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'client_ip')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `client_ip` varchar(30) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'hb_content')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `hb_content` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_tzhb')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_tzhb` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'sj_max')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `sj_max` varchar(1) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'zfwl_max')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `zfwl_max` varchar(1) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'zfwl_open')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `zfwl_open` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'zx_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `zx_type` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'ft_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `ft_num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_img` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_sjhb')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_sjhb` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_tzdz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_tzdz` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_rz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_rz` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'integral')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `integral` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'integral2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `integral2` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_jf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_jf` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_kf')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_kf` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'dw_more')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `dw_more` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_zxrz')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_zxrz` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tzmc')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tzmc` varchar(20) NOT NULL DEFAULT '帖子';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_dnss')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_dnss` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_vr')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_vr` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_yysj')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_yysj` int(11) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tc_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tc_img` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'tc_gg')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `tc_gg` varchar(100) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'hbbj_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `hbbj_img` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_img` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_details')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_details` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_tel` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_time` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_add')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_add` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'gs_zb')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `gs_zb` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'model')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `model` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'is_bm')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `is_bm` int(11) NOT NULL DEFAULT '2';");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'zf_title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `zf_title` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_system')) {
if(!pdo_fieldexists('ims_zhtc_system',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_system')."ADD `sh_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_top')) {
if(!pdo_fieldexists('ims_zhtc_top',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_top')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_top')) {
if(!pdo_fieldexists('ims_zhtc_top',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_top')."ADD `type` int(11) NOT NULL COMMENT '1.一天2.一周3.一个月';");
}
}

if(pdo_tableexists('ims_zhtc_top')) {
if(!pdo_fieldexists('ims_zhtc_top',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_top')."ADD `money` decimal(10;2) NOT NULL COMMENT '价格';");
}
}

if(pdo_tableexists('ims_zhtc_top')) {
if(!pdo_fieldexists('ims_zhtc_top',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_top')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_top')) {
if(!pdo_fieldexists('ims_zhtc_top',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_top')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `type_name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `img` varchar(100) NOT NULL COMMENT '分类图片';");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_type')) {
if(!pdo_fieldexists('ims_zhtc_type',  'sx_money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type')."ADD `sx_money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `type_id` int(11) NOT NULL COMMENT '主分类id';");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_type2')) {
if(!pdo_fieldexists('ims_zhtc_type2',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_type2')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'tz_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `tz_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_tzpaylog')) {
if(!pdo_fieldexists('ims_zhtc_tzpaylog',  'note')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_tzpaylog')."ADD `note` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'openid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `openid` varchar(100) NOT NULL COMMENT 'openid';");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `img` varchar(200) NOT NULL COMMENT '头像';");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `time` varchar(20) NOT NULL COMMENT '注册时间';");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'user_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `user_name` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'user_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `user_tel` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'user_address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `user_address` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'commission')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `commission` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'total_score')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `total_score` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_user')) {
if(!pdo_fieldexists('ims_zhtc_user',  'day')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_user')."ADD `day` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'form_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `form_id` varchar(50) NOT NULL COMMENT 'form_id';");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_userformid')) {
if(!pdo_fieldexists('ims_zhtc_userformid',  'openid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_userformid')."ADD `openid` varchar(50) NOT NULL COMMENT 'openid';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `type_id` int(11) NOT NULL COMMENT '分类ID';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `title` varchar(200) NOT NULL COMMENT '标题';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'yd_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `yd_num` int(11) NOT NULL COMMENT '阅读数量';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'pl_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `pl_num` int(11) NOT NULL COMMENT '评论数量';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'dz_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `dz_num` int(11) NOT NULL COMMENT '点赞数量';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'url')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `url` varchar(500) NOT NULL COMMENT '视频链接';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `logo` varchar(200) NOT NULL COMMENT '发布人logo';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'nick_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `nick_name` varchar(30) NOT NULL COMMENT '昵称';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `cityname` varchar(50) NOT NULL COMMENT '城市名称';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `num` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_video')) {
if(!pdo_fieldexists('ims_zhtc_video',  'fm_logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_video')."ADD `fm_logo` varchar(200) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videodz')) {
if(!pdo_fieldexists('ims_zhtc_videodz',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videodz')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_videodz')) {
if(!pdo_fieldexists('ims_zhtc_videodz',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videodz')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videodz')) {
if(!pdo_fieldexists('ims_zhtc_videodz',  'video_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videodz')."ADD `video_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videopl')) {
if(!pdo_fieldexists('ims_zhtc_videopl',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videopl')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_videopl')) {
if(!pdo_fieldexists('ims_zhtc_videopl',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videopl')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videopl')) {
if(!pdo_fieldexists('ims_zhtc_videopl',  'content')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videopl')."ADD `content` varchar(500) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videopl')) {
if(!pdo_fieldexists('ims_zhtc_videopl',  'video_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videopl')."ADD `video_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videopl')) {
if(!pdo_fieldexists('ims_zhtc_videopl',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videopl')."ADD `time` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `type_name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `img` varchar(100) NOT NULL COMMENT '分类图片';");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_videotype')) {
if(!pdo_fieldexists('ims_zhtc_videotype',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_videotype')."ADD `state` int(4) NOT NULL DEFAULT '1';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `name` varchar(10) NOT NULL COMMENT '真实姓名';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'username')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `username` varchar(100) NOT NULL COMMENT '账号';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `type` int(11) NOT NULL COMMENT '1支付宝 2.微信 3.银行';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `time` int(11) NOT NULL COMMENT '申请时间';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `sh_time` int(11) NOT NULL COMMENT '审核时间';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `state` int(11) NOT NULL COMMENT '1.待审核 2.通过  3.拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'tx_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `tx_cost` decimal(10;2) NOT NULL COMMENT '提现金额';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'sj_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `sj_cost` decimal(10;2) NOT NULL COMMENT '实际金额';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `user_id` int(11) NOT NULL COMMENT '用户id';");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'method')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `method` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'store_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `store_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_withdrawal')) {
if(!pdo_fieldexists('ims_zhtc_withdrawal',  'bank')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_withdrawal')."ADD `bank` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowpaylog')) {
if(!pdo_fieldexists('ims_zhtc_yellowpaylog',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowpaylog')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yellowpaylog')) {
if(!pdo_fieldexists('ims_zhtc_yellowpaylog',  'hy_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowpaylog')."ADD `hy_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowpaylog')) {
if(!pdo_fieldexists('ims_zhtc_yellowpaylog',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowpaylog')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowpaylog')) {
if(!pdo_fieldexists('ims_zhtc_yellowpaylog',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowpaylog')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowpaylog')) {
if(!pdo_fieldexists('ims_zhtc_yellowpaylog',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowpaylog')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowset')) {
if(!pdo_fieldexists('ims_zhtc_yellowset',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowset')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yellowset')) {
if(!pdo_fieldexists('ims_zhtc_yellowset',  'days')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowset')."ADD `days` int(11) NOT NULL COMMENT '入住天数';");
}
}

if(pdo_tableexists('ims_zhtc_yellowset')) {
if(!pdo_fieldexists('ims_zhtc_yellowset',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowset')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowset')) {
if(!pdo_fieldexists('ims_zhtc_yellowset',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowset')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowset')) {
if(!pdo_fieldexists('ims_zhtc_yellowset',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowset')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'logo')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `logo` varchar(200) NOT NULL COMMENT 'logo图片';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'company_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `company_name` varchar(100) NOT NULL COMMENT '公司名称';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'company_address')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `company_address` varchar(200) NOT NULL COMMENT '公司地址';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `type_id` int(11) NOT NULL COMMENT '二级分类';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'link_tel')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `link_tel` varchar(20) NOT NULL COMMENT '联系电话';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'sort')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `sort` int(11) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'rz_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `rz_time` int(11) NOT NULL COMMENT '入住时间';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `sh_time` int(11) NOT NULL COMMENT '审核时间';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `state` int(4) NOT NULL COMMENT '1待;2通过;3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'rz_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `rz_type` int(4) NOT NULL COMMENT '入驻类型';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'time_over')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `time_over` int(4) NOT NULL COMMENT '1到期;2没到期';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'coordinates')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `coordinates` varchar(50) NOT NULL COMMENT '坐标';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'content')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `content` text NOT NULL COMMENT '简介';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'imgs')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `imgs` varchar(500) NOT NULL COMMENT '多图';");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'views')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `views` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'tel2')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `tel2` varchar(20) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'dq_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `dq_time` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowstore')) {
if(!pdo_fieldexists('ims_zhtc_yellowstore',  'type2_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowstore')."ADD `type2_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `type_name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `img` varchar(100) NOT NULL COMMENT '分类图片';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `uniacid` int(11) NOT NULL COMMENT '小程序id';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'money')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `money` decimal(10;2) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype')."ADD `state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用;2禁用';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `name` varchar(20) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `type_id` int(11) NOT NULL COMMENT '主分类id';");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `num` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `uniacid` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yellowtype2')) {
if(!pdo_fieldexists('ims_zhtc_yellowtype2',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yellowtype2')."ADD `state` int(4) NOT NULL DEFAULT '1' COMMENT '1启用;2禁用';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `type` int(4) NOT NULL DEFAULT '1' COMMENT '1统一模式;2分开模式';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'typer')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `typer` varchar(10) NOT NULL COMMENT '统一比例';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'sjper')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `sjper` varchar(10) NOT NULL COMMENT '商家比例';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'hyper')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `hyper` varchar(10) NOT NULL COMMENT '黄页比例';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'pcper')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `pcper` varchar(10) NOT NULL COMMENT '拼车比例';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'tzper')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `tzper` varchar(10) NOT NULL COMMENT '帖子比例';");
}
}

if(pdo_tableexists('ims_zhtc_yjset')) {
if(!pdo_fieldexists('ims_zhtc_yjset',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjset')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'account_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `account_id` int(11) NOT NULL COMMENT '账号id';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'tx_type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `tx_type` int(4) NOT NULL COMMENT '提现方式 1;支付宝;2微信;3银联';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'tx_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `tx_cost` decimal(10;2) NOT NULL COMMENT '提现金额';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `status` int(4) NOT NULL COMMENT '状态 1申请;2通过;3拒绝';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'cerated_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `cerated_time` datetime NOT NULL COMMENT '日期';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'sj_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `sj_cost` decimal(10;2) NOT NULL COMMENT '实际金额';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'account')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `account` varchar(30) NOT NULL COMMENT '账户';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `name` varchar(30) NOT NULL COMMENT '姓名';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'sx_cost')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `sx_cost` decimal(10;2) NOT NULL COMMENT '手续费';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `time` datetime NOT NULL COMMENT '审核时间';");
}
}

if(pdo_tableexists('ims_zhtc_yjtx')) {
if(!pdo_fieldexists('ims_zhtc_yjtx',  'is_del')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_yjtx')."ADD `is_del` int(4) NOT NULL DEFAULT '1' COMMENT '1正常;2删除';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'type_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `type_id` int(11) NOT NULL COMMENT '分类ID';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `user_id` int(11) NOT NULL COMMENT '发布人ID';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'title')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `title` varchar(200) NOT NULL COMMENT '标题';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'content')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `content` text NOT NULL COMMENT '内容';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'yd_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `yd_num` int(11) NOT NULL COMMENT '阅读数量';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'pl_num')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `pl_num` int(11) NOT NULL COMMENT '评论数量';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'imgs')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `imgs` text NOT NULL COMMENT '图片';");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'state')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `state` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'sh_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `sh_time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'type')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `type` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx')) {
if(!pdo_fieldexists('ims_zhtc_zx',  'cityname')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx')."ADD `cityname` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'zx_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `zx_id` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'score')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `score` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'content')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `content` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'img')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `img` varchar(500) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'cerated_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `cerated_time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `user_id` int(11) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'status')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `status` int(4) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'reply')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `reply` text NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_assess')) {
if(!pdo_fieldexists('ims_zhtc_zx_assess',  'reply_time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_assess')."ADD `reply_time` datetime NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'type_name')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `type_name` varchar(100) NOT NULL COMMENT '分类名称';");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'icon')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `icon` varchar(100) NOT NULL COMMENT '图标';");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'sort')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `time` datetime NOT NULL COMMENT '时间';");
}
}

if(pdo_tableexists('ims_zhtc_zx_type')) {
if(!pdo_fieldexists('ims_zhtc_zx_type',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_type')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_zj')) {
if(!pdo_fieldexists('ims_zhtc_zx_zj',  'id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_zj')."ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
}

if(pdo_tableexists('ims_zhtc_zx_zj')) {
if(!pdo_fieldexists('ims_zhtc_zx_zj',  'zx_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_zj')."ADD `zx_id` int(11) NOT NULL COMMENT '资讯ID';");
}
}

if(pdo_tableexists('ims_zhtc_zx_zj')) {
if(!pdo_fieldexists('ims_zhtc_zx_zj',  'user_id')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_zj')."ADD `user_id` int(11) NOT NULL COMMENT '用户ID';");
}
}

if(pdo_tableexists('ims_zhtc_zx_zj')) {
if(!pdo_fieldexists('ims_zhtc_zx_zj',  'uniacid')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_zj')."ADD `uniacid` varchar(50) NOT NULL;");
}
}

if(pdo_tableexists('ims_zhtc_zx_zj')) {
if(!pdo_fieldexists('ims_zhtc_zx_zj',  'time')) {
pdo_query("ALTER TABLE ".tablename('ims_zhtc_zx_zj')."ADD `time` int(11) NOT NULL;");
}
}
