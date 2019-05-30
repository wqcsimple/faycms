DROP TABLE IF EXISTS `{{$prefix}}shop_goods`;
CREATE TABLE `{{$prefix}}shop_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `sub_stock` tinyint(4) NOT NULL DEFAULT '1' COMMENT '何时减库存',
  `post_fee` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '运费',
  `thumbnail` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '缩略图',
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `price` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `publish_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_cat_prop_values`;
CREATE TABLE `{{$prefix}}shop_goods_cat_prop_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `prop_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '属性ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT '排序值i',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_cat_props`;
CREATE TABLE `{{$prefix}}shop_goods_cat_props` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `alias` varchar(50) NOT NULL DEFAULT '' COMMENT '别名',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '编辑框类型',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '必选标记',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `is_sale_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否销售属性',
  `is_input_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可自定义属性',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '排序值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_counter`;
CREATE TABLE `{{$prefix}}shop_goods_counter` (
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID',
  `views` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `real_views` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '真实浏览量',
  `sales` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '总销量',
  `real_sales` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '真实总销量',
  `reviews` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评价数',
  `real_reviews` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '真实评价数',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `real_favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '真实收藏数',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_extra`;
CREATE TABLE `{{$prefix}}shop_goods_extra` (
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO Title',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO Keywords',
  `seo_description` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO Description',
  `ip_int` int(11) NOT NULL DEFAULT '0' COMMENT 'IP',
  `weight` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '单位:kg',
  `size` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '单位:立方米',
  `sn` varchar(50) NOT NULL DEFAULT '' COMMENT '货号',
  `rich_text` text COMMENT '富文本描述',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_files`;
CREATE TABLE `{{$prefix}}shop_goods_files` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品Id',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件Id',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '排序值',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`goods_id`,`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_prop_values`;
CREATE TABLE `{{$prefix}}shop_goods_prop_values` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品Id',
  `prop_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '属性Id',
  `prop_value_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '属性值Id',
  `prop_value_alias` varchar(255) NOT NULL DEFAULT '' COMMENT '属性别名',
  PRIMARY KEY (`goods_id`,`prop_id`,`prop_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_goods_skus`;
CREATE TABLE `{{$prefix}}shop_goods_skus` (
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `sku_key` varchar(100) NOT NULL DEFAULT '' COMMENT 'SKU Key',
  `price` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `quantity` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `tsces` varchar(50) NOT NULL DEFAULT '' COMMENT '商家编码',
  PRIMARY KEY (`goods_id`,`sku_key`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_item_prop_values`;
CREATE TABLE `{{$prefix}}shop_item_prop_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'Cat Id',
  `prop_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'Prop Id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `title_alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title Alias',
  `is_terminal` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is Terminal',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT 'Sort',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_item_props`;
CREATE TABLE `{{$prefix}}shop_item_props` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `is_input_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is Input Prop',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Type',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'Cat Id',
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Required',
  `parent_pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'Parent Pid',
  `parent_vid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Parent Vid',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `is_sale_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is Sale Prop',
  `is_color_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is Color Prop',
  `is_enum_prop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is Enum Prop',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `multi` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Multi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET={{$charset}};

DROP TABLE IF EXISTS `{{$prefix}}shop_order_address`;
CREATE TABLE `{{$prefix}}shop_order_address` (
  `order_id` mediumint(8) unsigned NOT NULL,
  `state` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '省',
  `city` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '市',
  `district` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '县',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `mobile` varchar(30) NOT NULL DEFAULT '' COMMENT '手机号码',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下单时选择的地址id',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}} COMMENT='订单收件人信息';

DROP TABLE IF EXISTS `{{$prefix}}shop_order_goods`;
CREATE TABLE `{{$prefix}}shop_order_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '商品标题',
  `price` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `num` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `sku_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'SKU Key',
  `sku_properties_name` varchar(500) NOT NULL DEFAULT '' COMMENT 'SKU的值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}} COMMENT='订单商品表';

DROP TABLE IF EXISTS `{{$prefix}}shop_orders`;
CREATE TABLE `{{$prefix}}shop_orders` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `buyer_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '买家ID',
  `buyer_note` varchar(255) NOT NULL DEFAULT '' COMMENT '买家留言',
  `seller_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '卖家ID',
  `seller_note` varchar(255) NOT NULL DEFAULT '' COMMENT '卖家留言',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `goods_fee` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品总价',
  `shipping_fee` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '邮费',
  `adjust_fee` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '卖家手工调整金额（差值）',
  `total_fee` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订单总价',
  `paid_fee` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '实付金额',
  `seller_rate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否评价',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单创建时间',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '付款时间',
  `consign_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '卖家发货时间',
  `confirm_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '确认收货时间',
  `close_reason` varchar(255) NOT NULL DEFAULT '' COMMENT '交易关闭原因',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={{$charset}} COMMENT='订单表';