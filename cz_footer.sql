/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : shopcz

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-01 16:03:24
*/

SET FOREIGN_KEY_CHECKS=0;

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
