/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : shopcz

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-30 16:14:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cz_address
-- ----------------------------
DROP TABLE IF EXISTS `cz_address`;
CREATE TABLE `cz_address` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址编号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '地址所属用户ID',
  `consignee` varchar(60) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `province` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '省份，保存是ID',
  `city` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '市',
  `district` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '区',
  `street` varchar(100) NOT NULL DEFAULT '' COMMENT '街道地址',
  `zipcode` varchar(10) NOT NULL DEFAULT '' COMMENT '邮政编码',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '移动电话',
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_address
-- ----------------------------
INSERT INTO `cz_address` VALUES ('1', '5', '地方', '1', '8', '2', '回龙观东大街', '2013192', '7689234511', '123456789011');
INSERT INTO `cz_address` VALUES ('2', '5', 'admin', '1', '8', '2', '正大街', '201412', '32145876', '13245678912');
INSERT INTO `cz_address` VALUES ('3', '5', 'admin1', '1', '8', '2', '京深海鲜1', '2014123', '12312312312', '13412341324');

-- ----------------------------
-- Table structure for cz_admin
-- ----------------------------
DROP TABLE IF EXISTS `cz_admin`;
CREATE TABLE `cz_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `admin_name` varchar(30) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_admin
-- ----------------------------
INSERT INTO `cz_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@itcast.cn', '0');

-- ----------------------------
-- Table structure for cz_attribute
-- ----------------------------
DROP TABLE IF EXISTS `cz_attribute`;
CREATE TABLE `cz_attribute` (
  `attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性ID',
  `attr_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品属性名称',
  `type_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '商品属性所属类型ID',
  `attr_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性是否可选 0 为唯一，1为单选，2为多选',
  `attr_input_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性录入方式 0为手工录入，1为从列表中选择，2为文本域',
  `attr_value` text COMMENT '属性的值',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '属性排序依据',
  PRIMARY KEY (`attr_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_attribute
-- ----------------------------
INSERT INTO `cz_attribute` VALUES ('7', '颜色', '2', '0', '1', '红色\r\n蓝色\r\n黑色', '50');
INSERT INTO `cz_attribute` VALUES ('6', '类型', '2', '0', '1', 'x\r\nXL\r\nXXL', '50');

-- ----------------------------
-- Table structure for cz_brand
-- ----------------------------
DROP TABLE IF EXISTS `cz_brand`;
CREATE TABLE `cz_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品品牌ID',
  `brand_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品品牌名称',
  `brand_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品品牌描述',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '商品品牌网址',
  `logo` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '商品品牌排序依据',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_brand
-- ----------------------------
INSERT INTO `cz_brand` VALUES ('1', '耐克', 'nike男鞋', 'www.nike.cn', './Public/Uploads/2016-04-10/570a13c2d0622.gif', '255', '1');
INSERT INTO `cz_brand` VALUES ('2', '安踏', '安踏，永不止步', 'www.anta.com', './Public/Uploads/2016-08-23/57bbc15a66ca6.jpg', '50', '1');

-- ----------------------------
-- Table structure for cz_cart
-- ----------------------------
DROP TABLE IF EXISTS `cz_cart`;
CREATE TABLE `cz_cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_attr` varchar(255) NOT NULL DEFAULT '' COMMENT '商品属性',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '商品数量',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成交价格',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '小计',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_cart
-- ----------------------------

-- ----------------------------
-- Table structure for cz_category
-- ----------------------------
DROP TABLE IF EXISTS `cz_category`;
CREATE TABLE `cz_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类别ID',
  `cat_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品类别名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类别父ID',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品类别描述',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序依据',
  `unit` varchar(15) NOT NULL DEFAULT '' COMMENT '单位',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`cat_id`),
  KEY `pid` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_category
-- ----------------------------
INSERT INTO `cz_category` VALUES ('1', '服装', '0', '服装', '50', '个', '1');
INSERT INTO `cz_category` VALUES ('2', '男装', '1', '阿道夫', '50', '个', '1');
INSERT INTO `cz_category` VALUES ('3', '女装', '1', '阿斯蒂芬', '50', '个', '1');
INSERT INTO `cz_category` VALUES ('4', '西装', '2', '多舒服啊', '50', '套', '1');
INSERT INTO `cz_category` VALUES ('5', '连衣裙', '3', '爱的色放', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('6', '书籍', '0', '无', '50', '本', '1');
INSERT INTO `cz_category` VALUES ('7', '文艺', '6', '文艺书籍', '50', '本', '1');
INSERT INTO `cz_category` VALUES ('8', '抒情', '7', '', '50', '本', '1');
INSERT INTO `cz_category` VALUES ('9', '风衣', '3', '无', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('10', '长袖连衣裙', '3', '无', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('11', '半身裙', '3', '无', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('12', '小脚裤', '3', '无', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('13', '毛呢大衣', '3', '无', '50', '件', '1');
INSERT INTO `cz_category` VALUES ('14', '毛呢短裤', '3', '无', '50', '件', '1');

-- ----------------------------
-- Table structure for cz_config
-- ----------------------------
DROP TABLE IF EXISTS `cz_config`;
CREATE TABLE `cz_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `postion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_config
-- ----------------------------
INSERT INTO `cz_config` VALUES ('1', 'localhost/shop/', '/public/images/e2dfe57add8fff66ed0964b1effd39b9.jpg', '2011城市主题公园亲子游', 'header');
INSERT INTO `cz_config` VALUES ('2', 'localhost/shop/', '/public/images/e50b5d398e3b890f08e14defbc71a94d.jpg', '潜入城市周边清幽之地', 'header');
INSERT INTO `cz_config` VALUES ('3', 'localhost/shop/', '/public/images/196b173f15685a2019ab3396cd1851a4.jpg', '盘点中国最美雪山', 'header');
INSERT INTO `cz_config` VALUES ('4', 'localhost/shop/', '/public/images/e81345cbc3d8a7e11f9a0e09df68221d.jpg', '2011西安世园会攻略', 'header');
INSERT INTO `cz_config` VALUES ('5', null, '/public/images/354b80528d2fbeefbab33c563532517e.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('6', null, '/public/images/1d2dfbead590510046a6522551db8139.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('7', null, '/public/images/26247430b09daa1b441b46008bfb6e6e.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('8', null, '/public/images/9c5dee77a6ecdafd9e152fed8c6a4e90.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('9', null, '/public/images/b175883eba95e793affb1b1ebbbf85a5.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('10', null, '/public/images/6e61a1c953e5bc8c5f1ffdac36862245.gif', null, 'footer');
INSERT INTO `cz_config` VALUES ('11', null, '/public/images/209abd835cd2ce2208f2dc42ba10efb4.gif', null, 'footer');

-- ----------------------------
-- Table structure for cz_footer
-- ----------------------------
DROP TABLE IF EXISTS `cz_footer`;
CREATE TABLE `cz_footer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_footer
-- ----------------------------
INSERT INTO `cz_footer` VALUES ('1', '0', '帮助中心');
INSERT INTO `cz_footer` VALUES ('2', '0', '支付方式');
INSERT INTO `cz_footer` VALUES ('3', '0', '售后服务');
INSERT INTO `cz_footer` VALUES ('4', '0', '客服中心');
INSERT INTO `cz_footer` VALUES ('5', '0', '关于我们');
INSERT INTO `cz_footer` VALUES ('6', '1', '积分兑换说明');
INSERT INTO `cz_footer` VALUES ('7', '1', '积分明细');
INSERT INTO `cz_footer` VALUES ('8', '1', '查看已购买商');
INSERT INTO `cz_footer` VALUES ('9', '1', '我要买');
INSERT INTO `cz_footer` VALUES ('10', '1', '忘记密码');
INSERT INTO `cz_footer` VALUES ('11', '2', '公司转账');
INSERT INTO `cz_footer` VALUES ('12', '2', '邮局汇款');
INSERT INTO `cz_footer` VALUES ('13', '2', '分期付款');
INSERT INTO `cz_footer` VALUES ('14', '2', '在线支付');
INSERT INTO `cz_footer` VALUES ('15', '2', '如何注册支付');
INSERT INTO `cz_footer` VALUES ('16', '3', '退款申请');
INSERT INTO `cz_footer` VALUES ('17', '3', '返修/退换货');
INSERT INTO `cz_footer` VALUES ('18', '3', '退换货流程');
INSERT INTO `cz_footer` VALUES ('19', '3', '退换货政策');
INSERT INTO `cz_footer` VALUES ('20', '3', '联系卖家');
INSERT INTO `cz_footer` VALUES ('21', '4', '修改收货地址');
INSERT INTO `cz_footer` VALUES ('22', '4', '商品发布');
INSERT INTO `cz_footer` VALUES ('23', '4', '会员修改个人');
INSERT INTO `cz_footer` VALUES ('24', '4', '会员修改密码');
INSERT INTO `cz_footer` VALUES ('25', '5', '合作及洽谈');
INSERT INTO `cz_footer` VALUES ('26', '5', '招聘英才');
INSERT INTO `cz_footer` VALUES ('27', '5', '联系我们');
INSERT INTO `cz_footer` VALUES ('28', '5', '关于Shop');

-- ----------------------------
-- Table structure for cz_galary
-- ----------------------------
DROP TABLE IF EXISTS `cz_galary`;
CREATE TABLE `cz_galary` (
  `img_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片编号',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `img_url` varchar(50) NOT NULL DEFAULT '' COMMENT '图片URL',
  `thumb_url` varchar(50) NOT NULL DEFAULT '' COMMENT '缩略图URL',
  `img_desc` varchar(50) NOT NULL DEFAULT '' COMMENT '图片描述',
  PRIMARY KEY (`img_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_galary
-- ----------------------------

-- ----------------------------
-- Table structure for cz_goods
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods`;
CREATE TABLE `cz_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '商品货号',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_brief` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_desc` text COMMENT '商品详情',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类别ID',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属品牌ID',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价格',
  `promote_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `promote_start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销起始时间',
  `promote_end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销截止时间',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型ID',
  `is_promote` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否促销，默认为0不促销',
  `is_best` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品,默认为0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品，默认为0',
  `is_hot` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖,默认为0',
  `is_onsale` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架,默认为1',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`goods_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods
-- ----------------------------
INSERT INTO `cz_goods` VALUES ('3', '123456', '衬衫1', '', '', '0', '0', '3612.00', '3010.00', '1000.00', '2009', '2014', './Public/Uploads/2016-08-12/57ad7c9169849.jpg', '4', '0', '0', '0', '1', '1', '1', '1', '1470987409');
INSERT INTO `cz_goods` VALUES ('4', '156645', '短袖', '', '', '0', '0', '3612.00', '3010.00', '1000.00', '2009', '2014', './Public/Uploads/2016-08-12/57ad7cb25443b.jpg', '4', '0', '0', '0', '1', '1', '1', '1', '1470987442');
INSERT INTO `cz_goods` VALUES ('5', '156644', '心里大师', '心灵的震撼', '', '8', '1', '3612.00', '3010.00', '1000.00', '0', '0', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '4', '0', '0', '0', '1', '1', '1', '1', '1470291541');
INSERT INTO `cz_goods` VALUES ('11', '123456', '衬衫3', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('13', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('133', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('134', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('135', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('136', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('137', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('138', '123456', '衬衫', 'OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417', '&lt;p&gt;&amp;nbsp;士大夫阿三阿斯蒂芬&lt;/p&gt;', '4', '1', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1460281468');
INSERT INTO `cz_goods` VALUES ('140', '990139', '是打发手动阀撒旦撒旦飞洒的毛呢裤', '山大啊发士大夫', '', '14', '1', '22222.00', '1111111.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-11/57ac466b5944b.jpg', '100', '0', '0', '0', '1', '1', '1', '1', '1470908011');
INSERT INTO `cz_goods` VALUES ('141', '56860351', '测试test', '', '', '0', '0', '3612.00', '3010.00', '0.00', '2009', '2014', './Public/Uploads/2016-08-12/57ad7369465a1.jpg', '4', '0', '0', '0', '1', '1', '1', '1', '1470985065');

-- ----------------------------
-- Table structure for cz_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods_attr`;
CREATE TABLE `cz_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '属性ID',
  `attr_value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性价格',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for cz_goods_thumb
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods_thumb`;
CREATE TABLE `cz_goods_thumb` (
  `thumb_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thumb_img` varchar(255) NOT NULL COMMENT '缩略图存储地址',
  `thumb_time` int(10) NOT NULL COMMENT '创建时间',
  `goods_sn` int(11) NOT NULL,
  PRIMARY KEY (`thumb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods_thumb
-- ----------------------------
INSERT INTO `cz_goods_thumb` VALUES ('51', './Public/Uploads/thumb/2016/08/12/15/36/49/57ad7c916c660.jpg', '1470987409', '123456');
INSERT INTO `cz_goods_thumb` VALUES ('52', './Public/Uploads/thumb/2016/08/12/15/36/49/57ad7c916cf5a.jpg', '1470987409', '123456');
INSERT INTO `cz_goods_thumb` VALUES ('53', './Public/Uploads/thumb/2016/08/12/15/36/49/57ad7c916d90d.jpg', '1470987409', '123456');
INSERT INTO `cz_goods_thumb` VALUES ('54', './Public/Uploads/thumb/2016/08/12/15/36/49/57ad7c916e185.jpg', '1470987409', '123456');
INSERT INTO `cz_goods_thumb` VALUES ('55', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb2558bf.jpg', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('56', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb255e90.jpg', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('57', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb256430.jpg', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('58', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb256baf.jpg', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('59', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb2571bc.png', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('60', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb2575e6.png', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('61', './Public/Uploads/thumb/2016/08/12/15/37/22/57ad7cb257c59.png', '1470987442', '156645');
INSERT INTO `cz_goods_thumb` VALUES ('62', './Public/Uploads/thumb/2016/08/23/16/40/00/57bc0be03ba0e.jpg', '1471941600', '1785278');
INSERT INTO `cz_goods_thumb` VALUES ('63', './Public/Uploads/thumb/2016/08/23/16/40/00/57bc0be0407c1.jpg', '1471941600', '1785278');

-- ----------------------------
-- Table structure for cz_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods_type`;
CREATE TABLE `cz_goods_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类型ID',
  `type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods_type
-- ----------------------------
INSERT INTO `cz_goods_type` VALUES ('2', '服装');

-- ----------------------------
-- Table structure for cz_homemenu
-- ----------------------------
DROP TABLE IF EXISTS `cz_homemenu`;
CREATE TABLE `cz_homemenu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_homemenu
-- ----------------------------
INSERT INTO `cz_homemenu` VALUES ('1', '首页', '/index/index');
INSERT INTO `cz_homemenu` VALUES ('2', '团购', null);
INSERT INTO `cz_homemenu` VALUES ('3', '品牌', null);
INSERT INTO `cz_homemenu` VALUES ('4', '优惠卷', null);
INSERT INTO `cz_homemenu` VALUES ('5', '积分中心', null);
INSERT INTO `cz_homemenu` VALUES ('6', '运动专场', null);
INSERT INTO `cz_homemenu` VALUES ('7', '微商城', null);

-- ----------------------------
-- Table structure for cz_menu
-- ----------------------------
DROP TABLE IF EXISTS `cz_menu`;
CREATE TABLE `cz_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_name` varchar(255) DEFAULT NULL COMMENT '菜单名称',
  `menu_model` varchar(255) DEFAULT NULL COMMENT '模块',
  `menu_action` varchar(255) DEFAULT NULL COMMENT '方法',
  `menu_controller` varchar(255) DEFAULT NULL COMMENT '控制器',
  `menu_class` varchar(255) DEFAULT NULL COMMENT 'css选择器',
  `menu_icon` varchar(255) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_menu
-- ----------------------------
INSERT INTO `cz_menu` VALUES ('1', '0', '商品管理', '', null, null, 'collapseOne', '&#xe612;');
INSERT INTO `cz_menu` VALUES ('2', '0', '订单管理', null, null, null, 'collapseTwo', '&#xe6e5;');
INSERT INTO `cz_menu` VALUES ('3', '0', '用户列表', null, null, null, 'collapseThree', '&#xe666;');
INSERT INTO `cz_menu` VALUES ('4', '1', '商品类型', '/shop/index.php/Admin', 'index', 'Type', 'list-group-item', '');
INSERT INTO `cz_menu` VALUES ('6', '1', '商品列表', '/shop/index.php/Admin', 'index', 'Goods', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('7', '1', '商品分类', '/shop/index.php/Admin', 'index', 'Category', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('8', '2', '订单列表', '/shop/index.php/Admin', 'index', 'Order', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('9', '2', '订单商品列表', '/shop/index.php/Admin', 'goods', 'Order', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('10', '1', '商品品牌', '/shop/index.php/Admin', 'index', 'Brand', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('11', '3', '管理员列表', '/shop/index.php/Admin', 'index', 'User', 'list-group-item', null);
INSERT INTO `cz_menu` VALUES ('12', '3', '客户列表', '/shop/index.php/Admin', 'customer', 'User', 'list-group-item', null);

-- ----------------------------
-- Table structure for cz_order
-- ----------------------------
DROP TABLE IF EXISTS `cz_order`;
CREATE TABLE `cz_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `order_sn` varchar(255) NOT NULL DEFAULT '' COMMENT '订单号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货地址id',
  `order_status` varchar(255) NOT NULL COMMENT '订单状态 1 待付款 2 待发货 3 已发货 4 已完成',
  `postscripts` varchar(255) NOT NULL DEFAULT '' COMMENT '订单附言',
  `shipping` varchar(255) NOT NULL COMMENT '送货方式ID',
  `pay` varchar(255) NOT NULL DEFAULT '0' COMMENT '支付方式ID',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总金额',
  `order_time` datetime NOT NULL COMMENT '下单时间',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`),
  KEY `pay_id` (`pay`),
  KEY `shipping_id` (`shipping`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order
-- ----------------------------
INSERT INTO `cz_order` VALUES ('24', '1166726728', '5', '3', '已发货', '空运', '韵达', '货到付款', '3010.00', '2016-08-29 17:16:23');
INSERT INTO `cz_order` VALUES ('25', '1163085095', '5', '3', '待发货', '空运', '韵达', '货到付款', '3010.00', '2016-08-29 17:16:41');
INSERT INTO `cz_order` VALUES ('23', '1036629072', '5', '3', '待发货', '空运', '韵达', '货到付款', '3010.00', '2016-08-29 15:01:23');

-- ----------------------------
-- Table structure for cz_order.bak
-- ----------------------------
DROP TABLE IF EXISTS `cz_order.bak`;
CREATE TABLE `cz_order.bak` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `order_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '订单号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货地址id',
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态 1 待付款 2 待发货 3 已发货 4 已完成',
  `postscripts` varchar(255) NOT NULL DEFAULT '' COMMENT '订单附言',
  `shipping_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '送货方式ID',
  `pay_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付方式ID',
  `goods_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总金额',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总金额',
  `order_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`),
  KEY `pay_id` (`pay_id`),
  KEY `shipping_id` (`shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order.bak
-- ----------------------------

-- ----------------------------
-- Table structure for cz_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `cz_order_goods`;
CREATE TABLE `cz_order_goods` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成交价格',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_attr` varchar(255) NOT NULL DEFAULT '' COMMENT '商品属性',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品小计',
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order_goods
-- ----------------------------
INSERT INTO `cz_order_goods` VALUES ('10', '24', '3', '衬衫1', './Public/Uploads/2016-08-12/57ad7c9169849.jpg', '3010.00', '0.00', '1', '', '3010.00');
INSERT INTO `cz_order_goods` VALUES ('11', '25', '5', '心里大师', './Public/Uploads/2016-08-04/57a2de5598d97.jpg', '3010.00', '0.00', '1', '', '3010.00');
INSERT INTO `cz_order_goods` VALUES ('5', '23', '3', '衬衫1', './Public/Uploads/2016-08-12/57ad7c9169849.jpg', '3010.00', '0.00', '1', '', '3010.00');
INSERT INTO `cz_order_goods` VALUES ('6', '23', '4', '短袖', './Public/Uploads/2016-08-12/57ad7cb25443b.jpg', '3010.00', '0.00', '1', '', '3010.00');
INSERT INTO `cz_order_goods` VALUES ('7', '25', '3', '衬衫1', './Public/Uploads/2016-08-12/57ad7c9169849.jpg', '3010.00', '0.00', '1', '', '3010.00');
INSERT INTO `cz_order_goods` VALUES ('8', '24', '4', '短袖', './Public/Uploads/2016-08-12/57ad7cb25443b.jpg', '3010.00', '0.00', '1', '', '3010.00');

-- ----------------------------
-- Table structure for cz_payment
-- ----------------------------
DROP TABLE IF EXISTS `cz_payment`;
CREATE TABLE `cz_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付方式ID',
  `pay_name` varchar(30) NOT NULL DEFAULT '' COMMENT '支付方式名称',
  `pay_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '支付方式描述',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用，默认启用',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_payment
-- ----------------------------

-- ----------------------------
-- Table structure for cz_region
-- ----------------------------
DROP TABLE IF EXISTS `cz_region`;
CREATE TABLE `cz_region` (
  `region_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '地区ID',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `region_name` varchar(30) NOT NULL DEFAULT '' COMMENT '地区名称',
  `region_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '地区类型 1 省份 2 市 3 区(县)',
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_region
-- ----------------------------
INSERT INTO `cz_region` VALUES ('1', '0', '北京', '1');
INSERT INTO `cz_region` VALUES ('2', '8', '丰台', '3');
INSERT INTO `cz_region` VALUES ('3', '8', '朝阳', '3');
INSERT INTO `cz_region` VALUES ('4', '0', '河南', '1');
INSERT INTO `cz_region` VALUES ('5', '4', '信阳', '2');
INSERT INTO `cz_region` VALUES ('6', '5', '光山', '3');
INSERT INTO `cz_region` VALUES ('8', '1', '北京', '2');

-- ----------------------------
-- Table structure for cz_shipping
-- ----------------------------
DROP TABLE IF EXISTS `cz_shipping`;
CREATE TABLE `cz_shipping` (
  `shipping_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `shipping_name` varchar(30) NOT NULL DEFAULT '' COMMENT '送货方式名称',
  `shipping_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '送货方式描述',
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '送货费用',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用，默认启用',
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for cz_user
-- ----------------------------
DROP TABLE IF EXISTS `cz_user`;
CREATE TABLE `cz_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码,md5加密',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户注册时间',
  `sex` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_user
-- ----------------------------
INSERT INTO `cz_user` VALUES ('2', 'north', '1340652578@qq.com', '202cb962ac59075b964b07152d234b70', '1462084060', '男');
INSERT INTO `cz_user` VALUES ('3', 'dt', '123213@qq.com', '202cb962ac59075b964b07152d234b70', '1462084060', '男');
INSERT INTO `cz_user` VALUES ('4', 'stack', '21423423412@qq.com', '202cb962ac59075b964b07152d234b70', '1462084060', '女');
INSERT INTO `cz_user` VALUES ('5', 'admin', '1340652578@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1470820874', '女');
