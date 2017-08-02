/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : carproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-02 18:00:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car_ad
-- ----------------------------
DROP TABLE IF EXISTS `car_ad`;
CREATE TABLE `car_ad` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `position_id` int(11) unsigned NOT NULL COMMENT '广告位置ID',
  `media_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '广告类型',
  `ad_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告标题',
  `ad_link` varchar(255) NOT NULL DEFAULT '' COMMENT '广告链接',
  `ad_code` text NOT NULL COMMENT '广告内容',
  `start_time` int(11) NOT NULL COMMENT '开始时间',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `ad_link_type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '外链类型(1.当前标签页打开2.新建标签页打开)',
  `link_man` varchar(60) DEFAULT '' COMMENT '联系人姓名',
  `link_email` varchar(60) DEFAULT '' COMMENT '联系人邮箱',
  `link_phone` varchar(11) DEFAULT '' COMMENT '联系人手机',
  `click_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用',
  `sort_order` int(11) NOT NULL DEFAULT '1' COMMENT '排序号',
  `lang` tinyint(1) DEFAULT '1' COMMENT '语言：1：中文；2：英文；',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_ad
-- ----------------------------
INSERT INTO `car_ad` VALUES ('25', '16', '1', 'fdafadfaf', '1111111111111111', '\\upload\\adpic\\adfile/1500607511591.jpg', '1498838400', '1498838400', '1', 'fdaf', 'dfaf', 'dfafda', '0', '1', '2', '1');
INSERT INTO `car_ad` VALUES ('26', '16', '1', 'fdafda', 'fdafad', '\\upload\\adpic\\adfile/1500694075151.jpg', '1970', '1970', '1', 'fdafad', 'fdaf', 'dfafa', '0', '1', '1', '2');

-- ----------------------------
-- Table structure for car_admin
-- ----------------------------
DROP TABLE IF EXISTS `car_admin`;
CREATE TABLE `car_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `username` varchar(45) NOT NULL COMMENT '用户名',
  `password` varchar(45) NOT NULL COMMENT '密码',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1:未激活;2:已激活',
  `role_id` int(11) NOT NULL COMMENT '所属角色:未来是否做权限',
  `province` int(11) DEFAULT '0' COMMENT '所属省份/直辖市',
  `city` int(11) DEFAULT '0' COMMENT '所属城市',
  `area` int(11) DEFAULT '0' COMMENT '所属区域',
  `created` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of car_admin
-- ----------------------------
INSERT INTO `car_admin` VALUES ('1', 'admin', 'c33367701511b4f6020ec61ded352059', '2', '1', null, null, null, '1500462478');
INSERT INTO `car_admin` VALUES ('2', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '2', '5', '43', '69', '71', '1497496213');
INSERT INTO `car_admin` VALUES ('3', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', null, null, null, '1498638538');

-- ----------------------------
-- Table structure for car_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `car_admin_log`;
CREATE TABLE `car_admin_log` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `controller` varchar(100) DEFAULT NULL COMMENT '控制器',
  `action` varchar(100) DEFAULT NULL COMMENT '操作',
  `control` varchar(100) DEFAULT NULL COMMENT '控制',
  `act` varchar(100) DEFAULT NULL COMMENT '操作',
  `ip` varchar(50) DEFAULT NULL COMMENT '操作者ip',
  `admin_id` int(13) DEFAULT NULL COMMENT '操作管理员id',
  `ctime` int(13) DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_admin_log
-- ----------------------------
INSERT INTO `car_admin_log` VALUES ('1', 'adminwarranty', 'index', '质保', '列表', '127.0.0.1', '1', '1500285864');
INSERT INTO `car_admin_log` VALUES ('2', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500285884');
INSERT INTO `car_admin_log` VALUES ('3', 'adminproduct', 'index', '产品', '列表', '127.0.0.1', '1', '1500285955');
INSERT INTO `car_admin_log` VALUES ('4', 'adminwarranty', 'setting', '质保', '设置', '127.0.0.1', '1', '1500286091');
INSERT INTO `car_admin_log` VALUES ('5', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500286102');
INSERT INTO `car_admin_log` VALUES ('6', 'adminwarranty', 'setting', '质保', '设置', '127.0.0.1', '1', '1500286114');
INSERT INTO `car_admin_log` VALUES ('7', 'adminwarranty', 'setting', '质保', '设置', '127.0.0.1', '1', '1500286185');
INSERT INTO `car_admin_log` VALUES ('8', 'adminwarranty', 'setting', '质保', '设置', '127.0.0.1', '1', '1500286191');
INSERT INTO `car_admin_log` VALUES ('9', 'adminwarranty', 'setting', '质保', '设置', '127.0.0.1', '1', '1500286198');
INSERT INTO `car_admin_log` VALUES ('10', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500286263');
INSERT INTO `car_admin_log` VALUES ('11', 'adminwarranty', 'index', '质保', '列表', '127.0.0.1', '1', '1500286265');
INSERT INTO `car_admin_log` VALUES ('12', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500286341');
INSERT INTO `car_admin_log` VALUES ('13', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500286403');
INSERT INTO `car_admin_log` VALUES ('14', 'adminwarranty', 'index', '质保', '列表', '127.0.0.1', '1', '1500286405');
INSERT INTO `car_admin_log` VALUES ('15', 'adminwarrantydetail', 'index', '质保详情', '列表', '127.0.0.1', '1', '1500286410');
INSERT INTO `car_admin_log` VALUES ('16', 'adminwarrantydetail', 'index', '质保详情', '列表', '127.0.0.1', '1', '1500287900');
INSERT INTO `car_admin_log` VALUES ('17', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500287903');
INSERT INTO `car_admin_log` VALUES ('18', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500287956');
INSERT INTO `car_admin_log` VALUES ('19', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288305');
INSERT INTO `car_admin_log` VALUES ('20', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288454');
INSERT INTO `car_admin_log` VALUES ('21', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288466');
INSERT INTO `car_admin_log` VALUES ('22', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288496');
INSERT INTO `car_admin_log` VALUES ('23', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288514');
INSERT INTO `car_admin_log` VALUES ('24', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288597');
INSERT INTO `car_admin_log` VALUES ('25', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288617');
INSERT INTO `car_admin_log` VALUES ('26', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500288699');
INSERT INTO `car_admin_log` VALUES ('27', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500289284');
INSERT INTO `car_admin_log` VALUES ('28', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500289423');
INSERT INTO `car_admin_log` VALUES ('29', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500289427');
INSERT INTO `car_admin_log` VALUES ('30', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500289438');
INSERT INTO `car_admin_log` VALUES ('31', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289439');
INSERT INTO `car_admin_log` VALUES ('32', 'adminwarrantydetail', 'index', '质保详情', '列表', '127.0.0.1', '1', '1500289440');
INSERT INTO `car_admin_log` VALUES ('33', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289443');
INSERT INTO `car_admin_log` VALUES ('34', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289497');
INSERT INTO `car_admin_log` VALUES ('35', 'adminwarrantydetail', 'index', '质保详情', '列表', '127.0.0.1', '1', '1500289560');
INSERT INTO `car_admin_log` VALUES ('36', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289562');
INSERT INTO `car_admin_log` VALUES ('37', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289566');
INSERT INTO `car_admin_log` VALUES ('38', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289769');
INSERT INTO `car_admin_log` VALUES ('39', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289901');
INSERT INTO `car_admin_log` VALUES ('40', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500289903');
INSERT INTO `car_admin_log` VALUES ('41', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290060');
INSERT INTO `car_admin_log` VALUES ('42', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290069');
INSERT INTO `car_admin_log` VALUES ('43', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290114');
INSERT INTO `car_admin_log` VALUES ('44', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290131');
INSERT INTO `car_admin_log` VALUES ('45', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290146');
INSERT INTO `car_admin_log` VALUES ('46', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290148');
INSERT INTO `car_admin_log` VALUES ('47', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290152');
INSERT INTO `car_admin_log` VALUES ('48', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500290172');
INSERT INTO `car_admin_log` VALUES ('49', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500290333');
INSERT INTO `car_admin_log` VALUES ('50', 'adminpackage', 'index', '套餐', '列表', '127.0.0.1', '1', '1500290423');
INSERT INTO `car_admin_log` VALUES ('51', 'adminbrand', 'index', '品牌', '列表', '127.0.0.1', '1', '1500290437');
INSERT INTO `car_admin_log` VALUES ('52', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500290481');
INSERT INTO `car_admin_log` VALUES ('53', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500290482');
INSERT INTO `car_admin_log` VALUES ('54', 'login', 'index', '登录', '列表', '127.0.0.1', '1', '1500338521');
INSERT INTO `car_admin_log` VALUES ('55', 'adminsettingpanel', 'index', '网站设置', '列表', '127.0.0.1', '1', '1500338521');
INSERT INTO `car_admin_log` VALUES ('56', 'adminpackage', 'add', '套餐', '添加', '127.0.0.1', '1', '1500338609');
INSERT INTO `car_admin_log` VALUES ('57', 'adminpackage', 'add', '套餐', '添加', '127.0.0.1', '1', '1500338613');
INSERT INTO `car_admin_log` VALUES ('58', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500340298');
INSERT INTO `car_admin_log` VALUES ('59', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500340792');
INSERT INTO `car_admin_log` VALUES ('60', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500340849');
INSERT INTO `car_admin_log` VALUES ('61', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500369750');
INSERT INTO `car_admin_log` VALUES ('62', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500369753');
INSERT INTO `car_admin_log` VALUES ('63', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500369936');
INSERT INTO `car_admin_log` VALUES ('64', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500373414');
INSERT INTO `car_admin_log` VALUES ('65', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500373468');
INSERT INTO `car_admin_log` VALUES ('66', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500373521');
INSERT INTO `car_admin_log` VALUES ('67', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500373595');
INSERT INTO `car_admin_log` VALUES ('68', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500373724');
INSERT INTO `car_admin_log` VALUES ('69', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374120');
INSERT INTO `car_admin_log` VALUES ('70', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374213');
INSERT INTO `car_admin_log` VALUES ('71', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374255');
INSERT INTO `car_admin_log` VALUES ('72', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374418');
INSERT INTO `car_admin_log` VALUES ('73', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374537');
INSERT INTO `car_admin_log` VALUES ('74', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374607');
INSERT INTO `car_admin_log` VALUES ('75', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374626');
INSERT INTO `car_admin_log` VALUES ('76', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500374644');
INSERT INTO `car_admin_log` VALUES ('77', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375322');
INSERT INTO `car_admin_log` VALUES ('78', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375350');
INSERT INTO `car_admin_log` VALUES ('79', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375592');
INSERT INTO `car_admin_log` VALUES ('80', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375679');
INSERT INTO `car_admin_log` VALUES ('81', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375785');
INSERT INTO `car_admin_log` VALUES ('82', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500375864');
INSERT INTO `car_admin_log` VALUES ('83', 'adminwarranty', 'add', '质保', '添加', '127.0.0.1', '1', '1500434516');
INSERT INTO `car_admin_log` VALUES ('84', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434577');
INSERT INTO `car_admin_log` VALUES ('85', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434586');
INSERT INTO `car_admin_log` VALUES ('86', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434595');
INSERT INTO `car_admin_log` VALUES ('87', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434643');
INSERT INTO `car_admin_log` VALUES ('88', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434649');
INSERT INTO `car_admin_log` VALUES ('89', 'adminwarranty', 'add', '质保', '编辑', '127.0.0.1', '1', '1500434655');
INSERT INTO `car_admin_log` VALUES ('90', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500459300');
INSERT INTO `car_admin_log` VALUES ('91', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1500459332');
INSERT INTO `car_admin_log` VALUES ('92', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1500459367');
INSERT INTO `car_admin_log` VALUES ('93', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1500459372');
INSERT INTO `car_admin_log` VALUES ('94', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1500459710');
INSERT INTO `car_admin_log` VALUES ('95', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1500459716');
INSERT INTO `car_admin_log` VALUES ('96', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1500459736');
INSERT INTO `car_admin_log` VALUES ('97', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1500459789');
INSERT INTO `car_admin_log` VALUES ('98', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1500459869');
INSERT INTO `car_admin_log` VALUES ('99', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1500460245');
INSERT INTO `car_admin_log` VALUES ('100', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1500460361');
INSERT INTO `car_admin_log` VALUES ('101', 'adminwarrantyaction', 'delete', '质保操作', '删除', '127.0.0.1', '1', '1500460366');
INSERT INTO `car_admin_log` VALUES ('102', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461255');
INSERT INTO `car_admin_log` VALUES ('103', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461391');
INSERT INTO `car_admin_log` VALUES ('104', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461440');
INSERT INTO `car_admin_log` VALUES ('105', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461443');
INSERT INTO `car_admin_log` VALUES ('106', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461450');
INSERT INTO `car_admin_log` VALUES ('107', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461473');
INSERT INTO `car_admin_log` VALUES ('108', 'adminlist', 'update', '管理员', '修改', '127.0.0.1', '1', '1500461482');
INSERT INTO `car_admin_log` VALUES ('109', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500462035');
INSERT INTO `car_admin_log` VALUES ('110', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462048');
INSERT INTO `car_admin_log` VALUES ('111', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462108');
INSERT INTO `car_admin_log` VALUES ('112', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462180');
INSERT INTO `car_admin_log` VALUES ('113', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462191');
INSERT INTO `car_admin_log` VALUES ('114', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462211');
INSERT INTO `car_admin_log` VALUES ('115', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462311');
INSERT INTO `car_admin_log` VALUES ('116', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462323');
INSERT INTO `car_admin_log` VALUES ('117', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462345');
INSERT INTO `car_admin_log` VALUES ('118', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462355');
INSERT INTO `car_admin_log` VALUES ('119', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462450');
INSERT INTO `car_admin_log` VALUES ('120', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462457');
INSERT INTO `car_admin_log` VALUES ('121', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462470');
INSERT INTO `car_admin_log` VALUES ('122', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '1', '1500462478');
INSERT INTO `car_admin_log` VALUES ('123', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500516187');
INSERT INTO `car_admin_log` VALUES ('124', 'adminsettingpanel', 'set', '网站设置', '设置', '127.0.0.1', '1', '1500516844');
INSERT INTO `car_admin_log` VALUES ('125', 'adminstore', 'add', '门店', '添加', '127.0.0.1', '2', '1500517563');
INSERT INTO `car_admin_log` VALUES ('126', 'adminstore', 'add', '门店', '添加', '127.0.0.1', '2', '1500517613');
INSERT INTO `car_admin_log` VALUES ('127', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518352');
INSERT INTO `car_admin_log` VALUES ('128', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518373');
INSERT INTO `car_admin_log` VALUES ('129', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518473');
INSERT INTO `car_admin_log` VALUES ('130', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518497');
INSERT INTO `car_admin_log` VALUES ('131', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518501');
INSERT INTO `car_admin_log` VALUES ('132', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518503');
INSERT INTO `car_admin_log` VALUES ('133', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518545');
INSERT INTO `car_admin_log` VALUES ('134', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518590');
INSERT INTO `car_admin_log` VALUES ('135', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518595');
INSERT INTO `car_admin_log` VALUES ('136', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518604');
INSERT INTO `car_admin_log` VALUES ('137', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518612');
INSERT INTO `car_admin_log` VALUES ('138', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518621');
INSERT INTO `car_admin_log` VALUES ('139', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518626');
INSERT INTO `car_admin_log` VALUES ('140', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518675');
INSERT INTO `car_admin_log` VALUES ('141', 'adminprivilieges', 'add', '权限', '编辑', '127.0.0.1', '1', '1500518699');
INSERT INTO `car_admin_log` VALUES ('142', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518729');
INSERT INTO `car_admin_log` VALUES ('143', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518758');
INSERT INTO `car_admin_log` VALUES ('144', 'adminprivilieges', 'add', '权限', '添加', '127.0.0.1', '1', '1500518777');
INSERT INTO `car_admin_log` VALUES ('145', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500518917');
INSERT INTO `car_admin_log` VALUES ('146', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519038');
INSERT INTO `car_admin_log` VALUES ('147', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519041');
INSERT INTO `car_admin_log` VALUES ('148', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519119');
INSERT INTO `car_admin_log` VALUES ('149', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519154');
INSERT INTO `car_admin_log` VALUES ('150', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519392');
INSERT INTO `car_admin_log` VALUES ('151', 'adminrole', 'add', '角色', '编辑', '127.0.0.1', '1', '1500519421');
INSERT INTO `car_admin_log` VALUES ('152', 'adminuser', 'updatepass', '用户', '修改密码', '127.0.0.1', '2', '1500519457');
INSERT INTO `car_admin_log` VALUES ('153', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500599741');
INSERT INTO `car_admin_log` VALUES ('154', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500599768');
INSERT INTO `car_admin_log` VALUES ('155', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500604916');
INSERT INTO `car_admin_log` VALUES ('156', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500604931');
INSERT INTO `car_admin_log` VALUES ('157', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500604945');
INSERT INTO `car_admin_log` VALUES ('158', 'adminsettingpanel', 'filepath', '网站设置', '路径设置', '127.0.0.1', '1', '1500604948');
INSERT INTO `car_admin_log` VALUES ('159', 'adminsettingpanel', 'filepath', '网站设置', '路径设置', '127.0.0.1', '1', '1500605437');
INSERT INTO `car_admin_log` VALUES ('160', 'adminsettingpanel', 'filepath', '网站设置', '路径设置', '127.0.0.1', '1', '1500605450');
INSERT INTO `car_admin_log` VALUES ('161', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500605642');
INSERT INTO `car_admin_log` VALUES ('162', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500605662');
INSERT INTO `car_admin_log` VALUES ('163', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500605697');
INSERT INTO `car_admin_log` VALUES ('164', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500605723');
INSERT INTO `car_admin_log` VALUES ('165', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500605741');
INSERT INTO `car_admin_log` VALUES ('166', 'adminvideo', 'add', '视频', '添加', '127.0.0.1', '1', '1500606936');
INSERT INTO `car_admin_log` VALUES ('167', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500606986');
INSERT INTO `car_admin_log` VALUES ('168', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607145');
INSERT INTO `car_admin_log` VALUES ('169', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607212');
INSERT INTO `car_admin_log` VALUES ('170', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607213');
INSERT INTO `car_admin_log` VALUES ('171', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607282');
INSERT INTO `car_admin_log` VALUES ('172', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607305');
INSERT INTO `car_admin_log` VALUES ('173', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607307');
INSERT INTO `car_admin_log` VALUES ('174', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607350');
INSERT INTO `car_admin_log` VALUES ('175', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500607363');
INSERT INTO `car_admin_log` VALUES ('176', 'adminadposition', 'add', '广告位', '添加', '127.0.0.1', '1', '1500607433');
INSERT INTO `car_admin_log` VALUES ('177', 'adminadposition', 'add', '广告位', '添加', '127.0.0.1', '1', '1500607477');
INSERT INTO `car_admin_log` VALUES ('178', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500607511');
INSERT INTO `car_admin_log` VALUES ('179', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500607514');
INSERT INTO `car_admin_log` VALUES ('180', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607564');
INSERT INTO `car_admin_log` VALUES ('181', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607678');
INSERT INTO `car_admin_log` VALUES ('182', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607785');
INSERT INTO `car_admin_log` VALUES ('183', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607791');
INSERT INTO `car_admin_log` VALUES ('184', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607798');
INSERT INTO `car_admin_log` VALUES ('185', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607870');
INSERT INTO `car_admin_log` VALUES ('186', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607986');
INSERT INTO `car_admin_log` VALUES ('187', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500607993');
INSERT INTO `car_admin_log` VALUES ('188', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500608094');
INSERT INTO `car_admin_log` VALUES ('189', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500608132');
INSERT INTO `car_admin_log` VALUES ('190', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500608137');
INSERT INTO `car_admin_log` VALUES ('191', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500608140');
INSERT INTO `car_admin_log` VALUES ('192', 'adminrecruit', 'add', '招聘', '添加', '127.0.0.1', '1', '1500608248');
INSERT INTO `car_admin_log` VALUES ('193', 'adminrecruit', 'add', '招聘', '编辑', '127.0.0.1', '1', '1500608250');
INSERT INTO `car_admin_log` VALUES ('194', 'adminrecruit', 'add', '招聘', '编辑', '127.0.0.1', '1', '1500609080');
INSERT INTO `car_admin_log` VALUES ('195', 'adminadposition', 'add', '广告位', '编辑', '127.0.0.1', '1', '1500609211');
INSERT INTO `car_admin_log` VALUES ('196', 'adminadposition', 'add', '广告位', '编辑', '127.0.0.1', '1', '1500609216');
INSERT INTO `car_admin_log` VALUES ('197', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500609223');
INSERT INTO `car_admin_log` VALUES ('198', 'adminsettingpanel', 'filepath', '网站设置', '路径设置', '127.0.0.1', '1', '1500620338');
INSERT INTO `car_admin_log` VALUES ('199', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500621850');
INSERT INTO `car_admin_log` VALUES ('200', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500621871');
INSERT INTO `car_admin_log` VALUES ('201', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500621878');
INSERT INTO `car_admin_log` VALUES ('202', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500621974');
INSERT INTO `car_admin_log` VALUES ('203', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500621995');
INSERT INTO `car_admin_log` VALUES ('204', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500622062');
INSERT INTO `car_admin_log` VALUES ('205', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622074');
INSERT INTO `car_admin_log` VALUES ('206', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622103');
INSERT INTO `car_admin_log` VALUES ('207', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622105');
INSERT INTO `car_admin_log` VALUES ('208', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622140');
INSERT INTO `car_admin_log` VALUES ('209', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622284');
INSERT INTO `car_admin_log` VALUES ('210', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622304');
INSERT INTO `car_admin_log` VALUES ('211', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500622307');
INSERT INTO `car_admin_log` VALUES ('212', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500688375');
INSERT INTO `car_admin_log` VALUES ('213', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500693601');
INSERT INTO `car_admin_log` VALUES ('214', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500693612');
INSERT INTO `car_admin_log` VALUES ('215', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500693670');
INSERT INTO `car_admin_log` VALUES ('216', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500693673');
INSERT INTO `car_admin_log` VALUES ('217', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500693727');
INSERT INTO `car_admin_log` VALUES ('218', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500693843');
INSERT INTO `car_admin_log` VALUES ('219', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500693926');
INSERT INTO `car_admin_log` VALUES ('220', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500693937');
INSERT INTO `car_admin_log` VALUES ('221', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500694004');
INSERT INTO `car_admin_log` VALUES ('222', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500694009');
INSERT INTO `car_admin_log` VALUES ('223', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500694056');
INSERT INTO `car_admin_log` VALUES ('224', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500694058');
INSERT INTO `car_admin_log` VALUES ('225', 'adminadlist', 'uploadimage', '广告', '上传图片', '127.0.0.1', '1', '1500694075');
INSERT INTO `car_admin_log` VALUES ('226', 'adminadlist', 'add', '广告', '添加', '127.0.0.1', '1', '1500694077');
INSERT INTO `car_admin_log` VALUES ('227', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694080');
INSERT INTO `car_admin_log` VALUES ('228', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694089');
INSERT INTO `car_admin_log` VALUES ('229', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694096');
INSERT INTO `car_admin_log` VALUES ('230', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694100');
INSERT INTO `car_admin_log` VALUES ('231', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694124');
INSERT INTO `car_admin_log` VALUES ('232', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694133');
INSERT INTO `car_admin_log` VALUES ('233', 'adminadlist', 'add', '广告', '编辑', '127.0.0.1', '1', '1500694136');
INSERT INTO `car_admin_log` VALUES ('234', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1500694352');
INSERT INTO `car_admin_log` VALUES ('235', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500694434');
INSERT INTO `car_admin_log` VALUES ('236', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500694439');
INSERT INTO `car_admin_log` VALUES ('237', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500694465');
INSERT INTO `car_admin_log` VALUES ('238', 'adminarticle', 'add', '文章', '编辑', '127.0.0.1', '1', '1500694469');
INSERT INTO `car_admin_log` VALUES ('239', 'adminbrand', 'add', '品牌', '添加', '127.0.0.1', '1', '1500694756');
INSERT INTO `car_admin_log` VALUES ('240', 'adminmodel', 'add', '模型', '添加', '127.0.0.1', '1', '1500695024');
INSERT INTO `car_admin_log` VALUES ('241', 'adminmodel', 'add', '模型', '编辑', '127.0.0.1', '1', '1500695033');
INSERT INTO `car_admin_log` VALUES ('242', 'adminmodel', 'add', '模型', '编辑', '127.0.0.1', '1', '1500695036');
INSERT INTO `car_admin_log` VALUES ('243', 'adminnews', 'add', '新闻', '添加', '127.0.0.1', '1', '1500695335');
INSERT INTO `car_admin_log` VALUES ('244', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1500695347');
INSERT INTO `car_admin_log` VALUES ('245', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1500695359');
INSERT INTO `car_admin_log` VALUES ('246', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1500695568');
INSERT INTO `car_admin_log` VALUES ('247', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1500695593');
INSERT INTO `car_admin_log` VALUES ('248', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1500695595');
INSERT INTO `car_admin_log` VALUES ('249', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1500706616');
INSERT INTO `car_admin_log` VALUES ('250', 'adminproduct', 'add', '产品', '添加', '127.0.0.1', '1', '1500706635');
INSERT INTO `car_admin_log` VALUES ('251', 'adminproduct', 'add', '产品', '编辑', '127.0.0.1', '1', '1500707267');
INSERT INTO `car_admin_log` VALUES ('252', 'adminrecruit', 'add', '招聘', '编辑', '127.0.0.1', '1', '1500707556');
INSERT INTO `car_admin_log` VALUES ('253', 'adminrecruit', 'add', '招聘', '添加', '127.0.0.1', '1', '1500707573');
INSERT INTO `car_admin_log` VALUES ('254', 'adminstore', 'add', '门店', '添加', '127.0.0.1', '1', '1500707847');
INSERT INTO `car_admin_log` VALUES ('255', 'adminstore', 'add', '门店', '编辑', '127.0.0.1', '1', '1500707854');
INSERT INTO `car_admin_log` VALUES ('256', 'adminstore', 'add', '门店', '编辑', '127.0.0.1', '1', '1500707864');
INSERT INTO `car_admin_log` VALUES ('257', 'adminvideo', 'add', '视频', '添加', '127.0.0.1', '1', '1500708287');
INSERT INTO `car_admin_log` VALUES ('258', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500708293');
INSERT INTO `car_admin_log` VALUES ('259', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500975145');
INSERT INTO `car_admin_log` VALUES ('260', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500975170');
INSERT INTO `car_admin_log` VALUES ('261', 'adminvideo', 'add', '视频', '编辑', '127.0.0.1', '1', '1500975174');
INSERT INTO `car_admin_log` VALUES ('262', 'adminrecruit', 'add', '招聘', '添加', '127.0.0.1', '1', '1501055412');
INSERT INTO `car_admin_log` VALUES ('263', 'adminrecruit', 'add', '招聘', '添加', '127.0.0.1', '1', '1501056193');
INSERT INTO `car_admin_log` VALUES ('264', 'adminnews', 'add', '新闻', '添加', '127.0.0.1', '1', '1501057383');
INSERT INTO `car_admin_log` VALUES ('265', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1501057385');
INSERT INTO `car_admin_log` VALUES ('266', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1501057389');
INSERT INTO `car_admin_log` VALUES ('267', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1501061746');
INSERT INTO `car_admin_log` VALUES ('268', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1501061762');
INSERT INTO `car_admin_log` VALUES ('269', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501061764');
INSERT INTO `car_admin_log` VALUES ('270', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501061797');
INSERT INTO `car_admin_log` VALUES ('271', 'adminsettingpanel', 'sysset', '网站设置', '系统设置', '127.0.0.1', '1', '1501061994');
INSERT INTO `car_admin_log` VALUES ('272', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501061999');
INSERT INTO `car_admin_log` VALUES ('273', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501062029');
INSERT INTO `car_admin_log` VALUES ('274', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501062043');
INSERT INTO `car_admin_log` VALUES ('275', 'adminmessage', 'detail', '反馈', '详情', '127.0.0.1', '1', '1501062079');
INSERT INTO `car_admin_log` VALUES ('276', 'adminnews', 'add', '新闻', '编辑', '127.0.0.1', '1', '1501063695');
INSERT INTO `car_admin_log` VALUES ('277', 'adminwarrantyaction', 'add', '质保操作', '添加', '127.0.0.1', '1', '1501459830');
INSERT INTO `car_admin_log` VALUES ('278', 'adminwarrantyaction', 'add', '质保操作', '编辑', '127.0.0.1', '1', '1501459834');
INSERT INTO `car_admin_log` VALUES ('279', 'adminrecruit', 'add', '招聘', '编辑', '127.0.0.1', '1', '1501657101');
INSERT INTO `car_admin_log` VALUES ('280', 'adminarticle', 'add', '文章', '添加', '127.0.0.1', '1', '1501662047');

-- ----------------------------
-- Table structure for car_admin_privilieges
-- ----------------------------
DROP TABLE IF EXISTS `car_admin_privilieges`;
CREATE TABLE `car_admin_privilieges` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT '父节点pid',
  `pname` varchar(50) NOT NULL COMMENT '权限名称',
  `model` char(30) NOT NULL COMMENT '权限模块',
  `controller` char(30) NOT NULL COMMENT '权限控制器',
  `action` char(30) NOT NULL COMMENT '权限方法',
  `ctime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_admin_privilieges
-- ----------------------------
INSERT INTO `car_admin_privilieges` VALUES ('150', '0', '产品管理', 'product', 'adminproduct', 'all', '1495617476');
INSERT INTO `car_admin_privilieges` VALUES ('151', '150', '产品删除', 'product', 'adminproduct', 'delete', '1495617472');
INSERT INTO `car_admin_privilieges` VALUES ('152', '0', '品牌管理', 'brand', 'adminbrand', 'all', '1495617468');
INSERT INTO `car_admin_privilieges` VALUES ('153', '152', '品牌列表', 'brand', 'adminbrand', 'index', '1495617464');
INSERT INTO `car_admin_privilieges` VALUES ('154', '150', '产品列表', 'product', 'adminproduct', 'index', '1495617459');
INSERT INTO `car_admin_privilieges` VALUES ('155', '150', '产品添加', 'product', 'adminproduct', 'add', '1495617454');
INSERT INTO `car_admin_privilieges` VALUES ('156', '152', '品牌添加', 'brand', 'adminbrand', 'add', '1498636631');
INSERT INTO `car_admin_privilieges` VALUES ('157', '152', '品牌删除', 'brand', 'adminbrand', 'delete', '1498636658');
INSERT INTO `car_admin_privilieges` VALUES ('158', '0', '文章管理', 'article', 'adminarticle', 'all', '1498636707');
INSERT INTO `car_admin_privilieges` VALUES ('159', '158', '文章列表', 'article', 'adminarticle', 'index', '1498636734');
INSERT INTO `car_admin_privilieges` VALUES ('160', '158', '文章添加', 'article', 'adminarticle', 'add', '1498636752');
INSERT INTO `car_admin_privilieges` VALUES ('161', '158', '文章删除', 'article', 'adminarticle', 'delete', '1498636772');
INSERT INTO `car_admin_privilieges` VALUES ('162', '0', '管理员管理', 'admin', 'adminlist', 'all', '1498636835');
INSERT INTO `car_admin_privilieges` VALUES ('163', '162', '管理员列表', 'admin', 'adminlist', 'index', '1498636855');
INSERT INTO `car_admin_privilieges` VALUES ('164', '162', '管理员添加', 'admin', 'adminlist', 'add', '1498636875');
INSERT INTO `car_admin_privilieges` VALUES ('165', '162', '管理员修改密码', 'admin', 'adminlist', 'update', '1498636897');
INSERT INTO `car_admin_privilieges` VALUES ('166', '0', '型号管理', 'model', 'adminmodel', 'all', '1498637026');
INSERT INTO `car_admin_privilieges` VALUES ('167', '166', '型号列表', 'model', 'adminmodel', 'index', '1498637045');
INSERT INTO `car_admin_privilieges` VALUES ('168', '166', '型号添加', 'model', 'adminmodel', 'add', '1498637060');
INSERT INTO `car_admin_privilieges` VALUES ('169', '166', '型号删除', 'model', 'adminmodel', 'delete', '1498637104');
INSERT INTO `car_admin_privilieges` VALUES ('170', '0', '资讯管理', 'news', 'adminnews', 'all', '1498637342');
INSERT INTO `car_admin_privilieges` VALUES ('171', '170', '资讯列表', 'news', 'adminnews', 'index', '1498637369');
INSERT INTO `car_admin_privilieges` VALUES ('172', '170', '资讯添加', 'news', 'adminnews', 'add', '1498637394');
INSERT INTO `car_admin_privilieges` VALUES ('173', '170', '资讯删除', 'news', 'adminnews', 'delete', '1498637410');
INSERT INTO `car_admin_privilieges` VALUES ('174', '0', '套餐管理', 'package', 'adminpackage', 'all', '1498637447');
INSERT INTO `car_admin_privilieges` VALUES ('175', '174', '套餐列表', 'package', 'adminpackage', 'index', '1498637470');
INSERT INTO `car_admin_privilieges` VALUES ('176', '174', '套餐添加', 'package', 'adminpackage', 'add', '1498637518');
INSERT INTO `car_admin_privilieges` VALUES ('177', '174', '套餐删除', 'package', 'adminpackage', 'delete', '1498637508');
INSERT INTO `car_admin_privilieges` VALUES ('178', '0', '权限管理', 'privilieges', 'adminprivilieges', 'all', '1498637582');
INSERT INTO `car_admin_privilieges` VALUES ('179', '178', '权限列表', 'privilieges', 'adminprivilieges', 'index', '1498637602');
INSERT INTO `car_admin_privilieges` VALUES ('180', '178', '权限添加', 'privilieges', 'adminprivilieges', 'add', '1498637619');
INSERT INTO `car_admin_privilieges` VALUES ('181', '0', '角色管理', 'role', 'adminrole', 'all', '1498637688');
INSERT INTO `car_admin_privilieges` VALUES ('182', '181', '角色列表', 'role', 'adminrole', 'index', '1498637717');
INSERT INTO `car_admin_privilieges` VALUES ('183', '181', '角色添加', 'role', 'adminrole', 'add', '1498637736');
INSERT INTO `car_admin_privilieges` VALUES ('184', '0', '网站设置', 'settingpanel', 'adminsettingpanel', 'all', '1498637861');
INSERT INTO `car_admin_privilieges` VALUES ('185', '184', '网站路径设置', 'settingpanel', 'adminsettingpanel', 'filepath', '1498637866');
INSERT INTO `car_admin_privilieges` VALUES ('186', '184', '网站基本设置', 'settingpanel', 'adminsettingpanel', 'index', '1498637885');
INSERT INTO `car_admin_privilieges` VALUES ('187', '184', '网站参数设置', 'settingpanel', 'adminsettingpanel', 'set', '1498637999');
INSERT INTO `car_admin_privilieges` VALUES ('188', '184', '网站logo上传', 'settingpanel', 'adminsettingpanel', 'upload', '1498638035');
INSERT INTO `car_admin_privilieges` VALUES ('189', '0', '门店管理', 'store', 'adminstore', 'all', '1498638091');
INSERT INTO `car_admin_privilieges` VALUES ('190', '189', '门店列表', 'store', 'adminstore', 'index', '1498638108');
INSERT INTO `car_admin_privilieges` VALUES ('191', '189', '门店添加', 'store', 'adminstore', 'add', '1498638130');
INSERT INTO `car_admin_privilieges` VALUES ('192', '189', '门店删除', 'store', 'adminstore', 'delete', '1498638153');
INSERT INTO `car_admin_privilieges` VALUES ('193', '0', '工具管理', 'tools', 'admintools', 'all', '1498638196');
INSERT INTO `car_admin_privilieges` VALUES ('194', '193', '缓存清理工具', 'tools', 'admintools', 'index', '1498638220');
INSERT INTO `car_admin_privilieges` VALUES ('195', '0', '质保管理', 'warranty', 'adminwarranty', 'all', '1498638259');
INSERT INTO `car_admin_privilieges` VALUES ('196', '195', '质保列表', 'warranty', 'adminwarranty', 'index', '1498638282');
INSERT INTO `car_admin_privilieges` VALUES ('197', '195', '质保添加', 'warranty', 'adminwarranty', 'add', '1498638298');
INSERT INTO `car_admin_privilieges` VALUES ('198', '195', '质保删除', 'warranty', 'adminwarranty', 'delete', '1498638319');
INSERT INTO `car_admin_privilieges` VALUES ('199', '195', '质保明细列表', 'warranty', 'adminwarrantydetail', 'index', '1498638378');
INSERT INTO `car_admin_privilieges` VALUES ('200', '162', '管理员删除', 'adminlist', 'adminlist', 'delete', '1499732992');
INSERT INTO `car_admin_privilieges` VALUES ('201', '181', '角色删除', 'adminrole', 'adminrole', 'delete', '1499733017');
INSERT INTO `car_admin_privilieges` VALUES ('202', '0', '质保操作记录', 'warrantyaction', 'adminwarrantyaction', 'all', '1500518699');
INSERT INTO `car_admin_privilieges` VALUES ('203', '162', '管理员日志列表', 'log', 'adminlog', 'index', '1500518626');
INSERT INTO `car_admin_privilieges` VALUES ('204', '184', '网站系统设置', 'settingpanel', 'adminsettingpanel', 'sysset', '1500518501');
INSERT INTO `car_admin_privilieges` VALUES ('205', '0', '网站短信日志', 'smsmsg', 'adminsmsmsg', 'all', '1500518545');
INSERT INTO `car_admin_privilieges` VALUES ('206', '205', '网站短信日志列表', 'smsmsg', 'adminsmsmsg', 'index', '1500518590');
INSERT INTO `car_admin_privilieges` VALUES ('207', '202', '质保操作记录列表', 'warrantyaction', 'adminwarrantyaction', 'index', '1500518729');
INSERT INTO `car_admin_privilieges` VALUES ('208', '202', '添加质保操作记录', 'warrantyaction', 'adminwarrantyaction', 'add', '1500518758');
INSERT INTO `car_admin_privilieges` VALUES ('209', '202', '删除质保操作记录', 'warrantyaction', 'adminwarrantyaction', 'delete', '1500518777');

-- ----------------------------
-- Table structure for car_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `car_admin_role`;
CREATE TABLE `car_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(45) NOT NULL COMMENT '角色名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1:已激活；2：未激活；',
  `res_ids` varchar(500) NOT NULL COMMENT '权限的id字符串',
  `privilege` text NOT NULL COMMENT '所属资源/权限的详细情况',
  `res` text NOT NULL COMMENT '所属资源/权限名称',
  `created` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色';

-- ----------------------------
-- Records of car_admin_role
-- ----------------------------
INSERT INTO `car_admin_role` VALUES ('1', '超级管理员', '1', 'all_allow', 'all_allow', 'all_allow', '2147483647');
INSERT INTO `car_admin_role` VALUES ('5', '测试角色', '1', '151,154,155,153,156,157,159,160,161,163,164,165,200,167,168,171,172,173,175,176,177,179,180,182,183,201,185,186,187,188,190,191,192,194,196,197,198,199,207,206', 'a:16:{s:12:\"adminproduct\";a:3:{i:0;s:6:\"delete\";i:1;s:5:\"index\";i:2;s:3:\"add\";}s:10:\"adminbrand\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:12:\"adminarticle\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:9:\"adminlist\";a:4:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"update\";i:3;s:6:\"delete\";}s:10:\"adminmodel\";a:2:{i:0;s:5:\"index\";i:1;s:3:\"add\";}s:9:\"adminnews\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:12:\"adminpackage\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:16:\"adminprivilieges\";a:2:{i:0;s:5:\"index\";i:1;s:3:\"add\";}s:9:\"adminrole\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:17:\"adminsettingpanel\";a:4:{i:0;s:8:\"filepath\";i:1;s:5:\"index\";i:2;s:3:\"set\";i:3;s:6:\"upload\";}s:10:\"adminstore\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:10:\"admintools\";a:1:{i:0;s:5:\"index\";}s:13:\"adminwarranty\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:6:\"delete\";}s:19:\"adminwarrantydetail\";a:1:{i:0;s:5:\"index\";}s:19:\"adminwarrantyaction\";a:1:{i:0;s:5:\"index\";}s:11:\"adminsmsmsg\";a:1:{i:0;s:5:\"index\";}}', '产品删除,产品列表,产品添加,品牌列表,品牌添加,品牌删除,文章列表,文章添加,文章删除,管理员列表,管理员添加,管理员修改密码,管理员删除,型号列表,型号添加,资讯列表,资讯添加,资讯删除,套餐列表,套餐添加,套餐删除,权限列表,权限添加,角色列表,角色添加,角色删除,网站路径设置,网站基本设置,网站参数设置,网站logo上传,门店列表,门店添加,门店删除,缓存清理工具,质保列表,质保添加,质保删除,质保明细列表,质保操作记录列表,网站短信日志列表', '1500519421');

-- ----------------------------
-- Table structure for car_ad_position
-- ----------------------------
DROP TABLE IF EXISTS `car_ad_position`;
CREATE TABLE `car_ad_position` (
  `position_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位置ID',
  `position_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告位置名称',
  `ad_width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '宽度',
  `ad_height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '高度',
  `position_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '广告描述',
  `position_style` text NOT NULL COMMENT '广告样式',
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_ad_position
-- ----------------------------
INSERT INTO `car_ad_position` VALUES ('16', 'fdafa', '111', '111', 'dfafa', '');
INSERT INTO `car_ad_position` VALUES ('17', 'fdafa', '111', '111', 'dfafa', '');

-- ----------------------------
-- Table structure for car_article
-- ----------------------------
DROP TABLE IF EXISTS `car_article`;
CREATE TABLE `car_article` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '显示平台：1：windows；2：wap;',
  `content` text NOT NULL,
  `images` text COMMENT '文章的图片集合',
  `lang` tinyint(1) DEFAULT '1' COMMENT '语言：1：中文；2：英文；',
  `ctime` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_article
-- ----------------------------
INSERT INTO `car_article` VALUES ('5', 'fdafda1111', '1', '<p><img src=\"/upload/images/20170517/20170517963825.jpg\" title=\"20170517963825.jpg\" alt=\"9097c6c8a786c9176bf3e0cccc3d70cf3ac7572b.jpg\" /></p>', null, '1', '1494992304');
INSERT INTO `car_article` VALUES ('6', 'fdafafad', '1', '<p>fdafafa</p>', '[\"\\\\upload\\\\articlepic\\\\1500622054.jpg\",\"\\\\upload\\\\articlepic\\\\1500622295.jpg\",\"\\\\upload\\\\articlepic\\\\1500622301.jpg\"]', '1', '1500622304');
INSERT INTO `car_article` VALUES ('7', 'fafafadfafa', '1', '<p>fdafadf</p>', '[]', '2', '1500694469');
INSERT INTO `car_article` VALUES ('8', 'dfdafadf', '1', '<p>fdafad</p>', '[]', '1', '1501662047');

-- ----------------------------
-- Table structure for car_auth_code_record
-- ----------------------------
DROP TABLE IF EXISTS `car_auth_code_record`;
CREATE TABLE `car_auth_code_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `auth_number` varchar(255) NOT NULL COMMENT '手机或邮箱',
  `auth_type` enum('email','phone') NOT NULL DEFAULT 'email' COMMENT '发送类型',
  `auth_cate` varchar(255) NOT NULL COMMENT '发送分类',
  `auth_content` text NOT NULL COMMENT '发送内容',
  `auth_count` int(11) NOT NULL DEFAULT '0' COMMENT '发送次数',
  `ctime` int(11) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_auth_code_record
-- ----------------------------
INSERT INTO `car_auth_code_record` VALUES ('1', '13992891749', 'phone', 'SMS_74650016', '60534362', '2', '1499497910');
INSERT INTO `car_auth_code_record` VALUES ('2', '13992891749', 'phone', 'SMS_77475079', '506329', '1', '1501654602');

-- ----------------------------
-- Table structure for car_brand
-- ----------------------------
DROP TABLE IF EXISTS `car_brand`;
CREATE TABLE `car_brand` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `name` varchar(50) NOT NULL COMMENT '品牌名称',
  `ename` varchar(200) DEFAULT '' COMMENT '英文名称',
  `intro` text COMMENT '品牌简介',
  `eintro` text COMMENT '英文简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_brand
-- ----------------------------
INSERT INTO `car_brand` VALUES ('1', 'aaaa', '1', '<p>aaaa</p>', null);
INSERT INTO `car_brand` VALUES ('2', 'aaaa2223333', '1', '<p>aaaa222222</p>', null);
INSERT INTO `car_brand` VALUES ('3', 'ffff', '1', '<p>aaaddd</p>', null);
INSERT INTO `car_brand` VALUES ('4', '品牌2', '1', '<p>品牌2品牌2品牌2品牌2品牌2品牌2品牌2品牌2品牌2品牌2</p>', null);
INSERT INTO `car_brand` VALUES ('5', '品牌3', '1', '<p>品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3品牌3</p>', null);
INSERT INTO `car_brand` VALUES ('6', 'faf', 'fafa', '<p>fafdafafafa</p>', '<p>111111111111</p>');

-- ----------------------------
-- Table structure for car_config
-- ----------------------------
DROP TABLE IF EXISTS `car_config`;
CREATE TABLE `car_config` (
  `var` varchar(30) NOT NULL COMMENT '配置项key',
  `datavalue` text NOT NULL COMMENT '配置项值',
  PRIMARY KEY (`var`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_config
-- ----------------------------
INSERT INTO `car_config` VALUES ('setting', 'a:1:{s:5:\"ptype\";a:2:{i:1;s:6:\"车身\";i:2;s:6:\"前挡\";}}');
INSERT INTO `car_config` VALUES ('site', 'a:9:{s:4:\"logo\";s:30:\"/upload\\default\\1494405055.png\";s:4:\"name\";s:3:\"aaa\";s:5:\"title\";s:2:\"vv\";s:4:\"desc\";s:2:\"bb\";s:8:\"keywords\";s:2:\"cc\";s:7:\"company\";s:2:\"dd\";s:9:\"copyright\";s:2:\"dd\";s:7:\"aboutus\";s:1305:\"<p>作为最早进入中国的外商独资企业之一，3M中国在过去的30多年里始终密切把握中国经济的发展脉搏，秉承“扎根中国，服务中国”的本土化发展战略，凭借多元化的技术和解决方案，积极支持中国经济的建设和发展。从基础设施建设到制造业崛起，从中国制造到中国创造，从出口驱动到推动内需，3M将企业的发展战略与中国的发展步伐紧密相连，助力中国市场的快速发展。这也使得3M成为中国本土化最成功的企业之一。\r\n\r\n\r\n\r\n                    3M中国致力开发适合本地市场和客户需求的创新科技和产品，并专注创新人才的培养。目前，3M中国已拥有700多名本土研发人员，贡献了超过千项本地专利发明，并在 3M全球的研发网络中发挥着极为重要的作用。\r\n\r\n\r\n\r\n                    3M中国积极履行社会责任，积极参与环境保护，扶贫减灾，推进志愿者行动。3M中国的努力得到了社会的广泛认可，获得了“大中华区最具领导力企业”、“最受赞赏的在华外商投资企业”、“亚洲最受尊敬公司二十强”等诸多荣誉，并多次入选“世界500强在华贡献排行榜”且名列前茅。\r\n                </p>11111111111\";s:10:\"siteCallus\";s:258:\"<div class=\"phone\"><i class=\"fa  fa-phone\"></i><a href=\"tel:18475555555\"> 1-888-123-4567 </a></div><div class=\"email\"><i class=\"fa  fa-envelope-o \"></i><a href=\"mailto:contact@site.com\">contact@site.com</a> or use <a href=\"help/index\"> contact form</a></div>\";}');
INSERT INTO `car_config` VALUES ('path', 'a:6:{s:10:\"systemfile\";s:17:\"D:\\new\\carproject\";s:11:\"defaultfile\";s:33:\"D:\\new\\carproject\\upload\\default\\\";s:5:\"adpic\";s:31:\"D:\\new\\carproject\\upload\\adpic\\\";s:8:\"videopic\";s:34:\"D:\\new\\carproject\\upload\\videopic\\\";s:9:\"videopath\";s:35:\"D:\\new\\carproject\\upload\\videopath\\\";s:13:\"articleimages\";s:36:\"D:\\new\\carproject\\upload\\articlepic\\\";}');
INSERT INTO `car_config` VALUES ('phone', 'a:3:{s:8:\"signname\";s:18:\"傲邦名车服务\";s:6:\"appkey\";s:16:\"LTAIarXdLsgiKww4\";s:9:\"secretKey\";s:30:\"7Zt9crGZjNzEHPCnoLC7jhb0QjcWxJ\";}');
INSERT INTO `car_config` VALUES ('phone1', 'a:3:{s:7:\"success\";a:3:{s:4:\"code\";s:12:\"SMS_77615074\";s:5:\"count\";s:0:\"\";s:4:\"time\";s:0:\"\";}s:4:\"fail\";a:3:{s:4:\"code\";s:12:\"SMS_77490077\";s:5:\"count\";s:0:\"\";s:4:\"time\";s:0:\"\";}s:4:\"auth\";a:3:{s:4:\"code\";s:12:\"SMS_77475079\";s:5:\"count\";s:1:\"3\";s:4:\"time\";s:3:\"600\";}}');
INSERT INTO `car_config` VALUES ('syssetting', 'a:3:{s:11:\"controllers\";a:24:{i:1;a:2:{s:8:\"econtrol\";s:10:\"adminbrand\";s:8:\"ccontrol\";s:6:\"品牌\";}i:2;a:2:{s:8:\"econtrol\";s:9:\"adminlist\";s:8:\"ccontrol\";s:9:\"管理员\";}i:3;a:2:{s:8:\"econtrol\";s:10:\"adminmodel\";s:8:\"ccontrol\";s:6:\"模型\";}i:4;a:2:{s:8:\"econtrol\";s:9:\"adminnews\";s:8:\"ccontrol\";s:6:\"新闻\";}i:5;a:2:{s:8:\"econtrol\";s:12:\"adminpackage\";s:8:\"ccontrol\";s:6:\"套餐\";}i:6;a:2:{s:8:\"econtrol\";s:16:\"adminprivilieges\";s:8:\"ccontrol\";s:6:\"权限\";}i:7;a:2:{s:8:\"econtrol\";s:9:\"adminrole\";s:8:\"ccontrol\";s:6:\"角色\";}i:8;a:2:{s:8:\"econtrol\";s:17:\"adminsettingpanel\";s:8:\"ccontrol\";s:12:\"网站设置\";}i:9;a:2:{s:8:\"econtrol\";s:10:\"adminstore\";s:8:\"ccontrol\";s:6:\"门店\";}i:10;a:2:{s:8:\"econtrol\";s:10:\"admintools\";s:8:\"ccontrol\";s:12:\"系统工具\";}i:11;a:2:{s:8:\"econtrol\";s:13:\"adminwarranty\";s:8:\"ccontrol\";s:6:\"质保\";}i:12;a:2:{s:8:\"econtrol\";s:19:\"adminwarrantydetail\";s:8:\"ccontrol\";s:12:\"质保详情\";}i:13;a:2:{s:8:\"econtrol\";s:5:\"login\";s:8:\"ccontrol\";s:6:\"登录\";}i:14;a:2:{s:8:\"econtrol\";s:19:\"adminwarrantyaction\";s:8:\"ccontrol\";s:12:\"质保操作\";}i:15;a:2:{s:8:\"econtrol\";s:9:\"adminuser\";s:8:\"ccontrol\";s:6:\"用户\";}i:16;a:2:{s:8:\"econtrol\";s:11:\"adminsmsmsg\";s:8:\"ccontrol\";s:12:\"平台短信\";}i:17;a:2:{s:8:\"econtrol\";s:8:\"adminlog\";s:8:\"ccontrol\";s:21:\"管理员操作日志\";}i:18;a:2:{s:8:\"econtrol\";s:10:\"adminvideo\";s:8:\"ccontrol\";s:6:\"视频\";}i:19;a:2:{s:8:\"econtrol\";s:11:\"adminadlist\";s:8:\"ccontrol\";s:6:\"广告\";}i:20;a:2:{s:8:\"econtrol\";s:15:\"adminadposition\";s:8:\"ccontrol\";s:9:\"广告位\";}i:21;a:2:{s:8:\"econtrol\";s:12:\"adminrecruit\";s:8:\"ccontrol\";s:6:\"招聘\";}i:22;a:2:{s:8:\"econtrol\";s:12:\"adminarticle\";s:8:\"ccontrol\";s:6:\"文章\";}i:23;a:2:{s:8:\"econtrol\";s:12:\"adminproduct\";s:8:\"ccontrol\";s:6:\"产品\";}i:24;a:2:{s:8:\"econtrol\";s:12:\"adminmessage\";s:8:\"ccontrol\";s:6:\"反馈\";}}s:7:\"actions\";a:10:{i:1;a:2:{s:7:\"eaction\";s:3:\"add\";s:7:\"caction\";s:6:\"添加\";}i:2;a:2:{s:7:\"eaction\";s:6:\"update\";s:7:\"caction\";s:6:\"修改\";}i:3;a:2:{s:7:\"eaction\";s:6:\"delete\";s:7:\"caction\";s:6:\"删除\";}i:4;a:2:{s:7:\"eaction\";s:7:\"setting\";s:7:\"caction\";s:6:\"设置\";}i:5;a:2:{s:7:\"eaction\";s:3:\"set\";s:7:\"caction\";s:6:\"设置\";}i:6;a:2:{s:7:\"eaction\";s:10:\"updatepass\";s:7:\"caction\";s:12:\"修改密码\";}i:7;a:2:{s:7:\"eaction\";s:6:\"sysset\";s:7:\"caction\";s:12:\"系统设置\";}i:8;a:2:{s:7:\"eaction\";s:8:\"filepath\";s:7:\"caction\";s:12:\"路径设置\";}i:9;a:2:{s:7:\"eaction\";s:11:\"uploadimage\";s:7:\"caction\";s:12:\"上传图片\";}i:10;a:2:{s:7:\"eaction\";s:6:\"detail\";s:7:\"caction\";s:6:\"详情\";}}s:4:\"lang\";a:2:{i:1;s:6:\"中文\";i:2;s:6:\"英语\";}}');

-- ----------------------------
-- Table structure for car_message
-- ----------------------------
DROP TABLE IF EXISTS `car_message`;
CREATE TABLE `car_message` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `message` text,
  `ctime` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_message
-- ----------------------------
INSERT INTO `car_message` VALUES ('1', '1', 'zhangxiaohui', '13992891749', 'fdafa', 'fdafdaf', '1501060581');

-- ----------------------------
-- Table structure for car_models
-- ----------------------------
DROP TABLE IF EXISTS `car_models`;
CREATE TABLE `car_models` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `name` varchar(50) NOT NULL COMMENT '型号名称',
  `ename` varchar(200) DEFAULT '' COMMENT '英文',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_models
-- ----------------------------
INSERT INTO `car_models` VALUES ('1', 'abc', '1');
INSERT INTO `car_models` VALUES ('2', 'ssss', '1');
INSERT INTO `car_models` VALUES ('8', 'fdafadfa', '1');
INSERT INTO `car_models` VALUES ('9', 'abdcc', '1');
INSERT INTO `car_models` VALUES ('10', '型号1', '1');
INSERT INTO `car_models` VALUES ('11', '型号2', '1');
INSERT INTO `car_models` VALUES ('12', '型号3', '1');
INSERT INTO `car_models` VALUES ('13', '型号4', '1');
INSERT INTO `car_models` VALUES ('14', '型号5', '1');
INSERT INTO `car_models` VALUES ('15', '22222', '1');
INSERT INTO `car_models` VALUES ('16', '333333', '1');
INSERT INTO `car_models` VALUES ('17', 'dfaf', 'dafae');

-- ----------------------------
-- Table structure for car_news
-- ----------------------------
DROP TABLE IF EXISTS `car_news`;
CREATE TABLE `car_news` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `lang` tinyint(1) DEFAULT '1' COMMENT '语言：1：中文；2：英文；',
  `content` text NOT NULL,
  `ctime` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_news
-- ----------------------------
INSERT INTO `car_news` VALUES ('1', 'aaaaaaaaaaa', '1', '<p><img src=\"/upload/images/20170510/20170510690574.jpg\" title=\"20170510690574.jpg\" alt=\"03087bf40ad162d949e23df511dfa9ec8b13cdcf.jpg\" /></p><p><img src=\"/upload/images/20170510/20170510492197.jpg\" title=\"20170510492197.jpg\" alt=\"20170510492197.jpg\" /></p><p><img src=\"/upload/images/20170510/20170510240805.png\" title=\"20170510240805.png\" alt=\"20170510240805.png\" /></p><p><br /></p>', '1494376801');
INSERT INTO `car_news` VALUES ('2', 'bbbbddd', '1', '<p>bbbbbbbb<br /></p>', '1494376858');
INSERT INTO `car_news` VALUES ('3', 'fdafaf', '2', '<p>fdafadfa</p>', '1500695335');
INSERT INTO `car_news` VALUES ('4', 'fdafa', '1', '<p>fdafa</p>', '1501057383');

-- ----------------------------
-- Table structure for car_package
-- ----------------------------
DROP TABLE IF EXISTS `car_package`;
CREATE TABLE `car_package` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `ename` varchar(500) DEFAULT '' COMMENT '英文名臣',
  `intro` text,
  `eintro` text COMMENT '英文简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_package
-- ----------------------------
INSERT INTO `car_package` VALUES ('1', '1112', '1', '<p>22232323211111<span style=\"white-space: normal;\">22232323211111</span><span style=\"white-space: normal;\">22232323211111</span><span style=\"white-space: normal;\">22232323211111</span>22232323211111<span style=\"white-space: normal;\">22232323211111</span><span style=\"white-space: normal;\">22232323211111</span><span style=\"white-space: normal;\">22232323211111</span>22232323211111<span style=\"white-space: normal;\">22232323211111</span>2223232321111122232323211111<span style=\"white-space: normal;\">22232323211111</span>22232323211111<span style=\"white-space: normal;\">22232323211111</span></p>', null);
INSERT INTO `car_package` VALUES ('2', '1212121', '1', '<div><video controls=\"\" preload=\"none\" width=\"320\" height=\"280\" src=\"/upload/video/20170711/1499741081958360.mp4\"><source src=\"/upload/video/20170711/1499741081958360.mp4\" type=\"video/mp4\"/></video>11111</div>', null);
INSERT INTO `car_package` VALUES ('3', '444444444', '1', '<p><video class=\"edui-upload-video  vjs-default-skin video-js\" controls=\"\" preload=\"none\" width=\"420\" height=\"280\" src=\"/upload/video/20170711/1499742976978112.mp4\" data-setup=\"{}\"><source src=\"/upload/video/20170711/1499742976978112.mp4\" type=\"video/mp4\"/></video></p>', null);
INSERT INTO `car_package` VALUES ('4', 'dafd', '1', '<p>dfafafafa</p>', null);

-- ----------------------------
-- Table structure for car_product
-- ----------------------------
DROP TABLE IF EXISTS `car_product`;
CREATE TABLE `car_product` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键编号ID',
  `mid` int(13) NOT NULL COMMENT '关联型号ID',
  `name` varchar(500) NOT NULL COMMENT '产品名称',
  `ename` varchar(500) DEFAULT '' COMMENT '英文名称',
  `series_number` varchar(500) NOT NULL COMMENT '序列号',
  `total` int(15) NOT NULL DEFAULT '0' COMMENT '总数量',
  `current_num` int(15) NOT NULL DEFAULT '0' COMMENT '当前数量',
  `bid` int(13) NOT NULL COMMENT '品牌编号',
  `intro` text COMMENT '产品简介',
  `storeid` int(13) NOT NULL COMMENT '门店id',
  `customer` varchar(500) DEFAULT NULL COMMENT '客户',
  `spec` varchar(500) DEFAULT NULL COMMENT '规格',
  `company` varchar(500) DEFAULT NULL COMMENT '单位',
  `province` int(13) DEFAULT NULL COMMENT '所属省份',
  `city` int(13) DEFAULT NULL COMMENT '所属城市',
  `area` int(13) DEFAULT NULL COMMENT '所属区县',
  `type` int(13) NOT NULL DEFAULT '0' COMMENT '产品位置',
  `create_user` varchar(500) NOT NULL COMMENT '创建批次管理员id',
  `ctime` int(13) NOT NULL COMMENT '上架时间',
  `udpatetime` int(13) DEFAULT NULL COMMENT '出库时间',
  `remarks` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_product
-- ----------------------------
INSERT INTO `car_product` VALUES ('1', '1', '产品1', '1', '4', '3', '0', '1', '<p>产品1产品1产品1产品1</p>', '0', null, null, null, null, null, null, '0', '1', '1494290690', null, '111111111111111111');
INSERT INTO `car_product` VALUES ('2', '1', '产品2', '1', '1', '1', '0', '1', '', '0', null, null, null, null, null, null, '0', '1', '1494290690', null, null);
INSERT INTO `car_product` VALUES ('3', '8', '产品3', '1', '3', '3', '0', '1', '', '0', null, null, null, null, null, null, '0', '1', '1494290690', null, null);
INSERT INTO `car_product` VALUES ('4', '9', 'aaaaaaaaaaaaaaaaa', '1', '2', '3', '0', '1', '', '0', null, null, null, null, null, null, '0', '1', '1494324366', null, null);
INSERT INTO `car_product` VALUES ('5', '9', 'aaaabbbccc', '1', '5', '4', '0', '1', '<p>aaaaaaaaaaaaaa</p>', '0', null, null, null, null, null, null, '0', '1', '1494376217', null, null);
INSERT INTO `car_product` VALUES ('6', '10', '产品11', '1', '4', '4', '0', '1', '<p>产品产品产品产品产品产品产品产品产品产品产品</p>', '0', null, null, null, null, null, null, '0', '1', '1494461031', null, null);
INSERT INTO `car_product` VALUES ('7', '11', '产品22', '1', '3', '1', '0', '1', '<p>产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品产品</p>', '0', null, null, null, null, null, null, '0', '1', '1494461061', null, null);
INSERT INTO `car_product` VALUES ('8', '14', '产品33', '1', '3', '3', '0', '2', '<p>产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33产品33</p>', '0', null, null, null, null, null, null, '0', '1', '1494461552', null, null);
INSERT INTO `car_product` VALUES ('9', '8', '111', '1', '2', '2', '0', '3', '', '0', null, null, null, null, null, null, '0', '1', '1495179696', null, null);
INSERT INTO `car_product` VALUES ('10', '12', '反对方答复', '1', '2', '3', '0', '1', '<p>dfaafafa</p>', '0', null, null, null, null, null, null, '0', '1', '1495180118', null, null);
INSERT INTO `car_product` VALUES ('11', '1', '测试111', '1', 'dafafdafa', '222', '207', '2', '<p>fdafdafda</p>', '0', null, null, null, '887', '926', '927', '2', '1', '1497511909', '1498726668', null);
INSERT INTO `car_product` VALUES ('12', '14', '测试产品2', '1', 'aaaaaaabbbbbbcccccc', '20000', '19970', '4', '<p>1234567890</p>', '0', null, null, null, '1', '2', '4', '1', '1', '1497516934', '1499500385', null);
INSERT INTO `car_product` VALUES ('13', '14', '测试产品3', '1', '112233445566', '0', '0', '5', '<p>afdsfa</p>', '0', null, null, null, null, null, null, '2', '1', '1497516968', null, null);
INSERT INTO `car_product` VALUES ('14', '11', '测试穿品1', '1', 'dfdsfsfs', '123', '121', '5', '<p>dasfdafda111</p>', '0', null, null, null, '22', '23', '28', '2', '1', '1497603984', '1498725120', null);
INSERT INTO `car_product` VALUES ('15', '13', '测试产品3', '1', '34311232·3·3', '30', '5', '5', '<p>dfsfds</p>', '0', '111', '222', '333', '3078', '3079', '3082', '1', '1', '1498529073', '1499500384', '4444444444');
INSERT INTO `car_product` VALUES ('16', '2', '测试产品44', '1', 'dfdfsdfdsfsdfds', '100', '73', '2', '<p>fdafa</p>', '0', 'fdafadf', 'fdafa', 'dfafad', '238', '264', '266', '0', '1', '1498724503', '1499500384', null);
INSERT INTO `car_product` VALUES ('17', '2', '11222', '1', '21212121', '11', '11', '1', '<p>fdaf</p>', '13', 'dfsfda', 'fdaf', 'fdaf', null, null, null, '0', '1', '1500277498', null, null);
INSERT INTO `car_product` VALUES ('18', '1', 'dfaadfda', '1', 'fdaf', '11', '11', '1', '<p>fd</p>', '13', 'fdaf', 'dfa', 'fd', '1', '19', '20', '0', '1', '1500277836', null, null);
INSERT INTO `car_product` VALUES ('19', '11', '11111111111111111111', '1', '13211233', '20', '17', '4', '<p>fdfdf</p>', '5', 'fdfd', 'fdf', 'fdfd', '3078', null, null, '0', '1', '1500280593', '1500369754', null);
INSERT INTO `car_product` VALUES ('20', '1', '123232', '1', 'f677881', '21', '11', '5', '<p>fdafa</p>', '4', 'dafda', 'fda', 'fdfd', '22', '39', '41', '0', '1', '1500280853', '1500434650', null);
INSERT INTO `car_product` VALUES ('21', '1', 'fdafdafdasf', 'fdafafa', '1fafdafafda', '20', '20', '6', '<p>fafadfa<br/></p>', '13', 'dafad', 'fdafafda', 'fdafa', null, null, null, '0', '1', '1500706635', null, null);

-- ----------------------------
-- Table structure for car_recruit
-- ----------------------------
DROP TABLE IF EXISTS `car_recruit`;
CREATE TABLE `car_recruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `lang` tinyint(1) DEFAULT '1' COMMENT '语言：1：中文；2：英文；',
  `employ_name` varchar(200) NOT NULL DEFAULT '' COMMENT '职位名称',
  `edu_level` varchar(100) NOT NULL DEFAULT '' COMMENT '教育程度',
  `sex` tinyint(1) DEFAULT '1' COMMENT '性别：1：男；2：女；3：不限；',
  `specialty` varchar(200) NOT NULL DEFAULT '' COMMENT '专业',
  `employ_length` varchar(100) NOT NULL DEFAULT '' COMMENT '工作年限',
  `desc` text NOT NULL COMMENT '详情描述',
  `enable` tinyint(1) DEFAULT '1' COMMENT '是否激活：1：激活；2：未激活；',
  `isdeleted` tinyint(1) DEFAULT '1' COMMENT '是否删除：1：未删除；2：已删除；',
  `ctime` int(20) DEFAULT '0' COMMENT '添加招聘时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_recruit
-- ----------------------------
INSERT INTO `car_recruit` VALUES ('11', '1', 'fdafa', 'dafa', '2', 'fdafa', 'dfafa', '<p>fadfaa</p>', '1', '1', '1500608249');
INSERT INTO `car_recruit` VALUES ('12', '2', 'fdafa', 'fdafafda', '3', 'fdafadf', 'fdafa', '<p>fdafadf</p>', '1', '1', '1500707573');
INSERT INTO `car_recruit` VALUES ('13', '1', 'fafadfafa', 'fdafafa', '3', 'fdafad', 'dfaf', '<p>dfafdafdadfa</p>', '1', '1', '1501055412');
INSERT INTO `car_recruit` VALUES ('14', '1', 'fdsfa', 'fdafa', '1', 'adfda', 'ddfa', '<p>fdafdaa</p>', '1', '1', '1501056194');

-- ----------------------------
-- Table structure for car_region
-- ----------------------------
DROP TABLE IF EXISTS `car_region`;
CREATE TABLE `car_region` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `parent` int(13) NOT NULL COMMENT '父地区id',
  `code` varchar(50) NOT NULL COMMENT '地区编码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3524 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_region
-- ----------------------------
INSERT INTO `car_region` VALUES ('1', '北京市', '0', '110000');
INSERT INTO `car_region` VALUES ('2', '市辖区', '1', '110100');
INSERT INTO `car_region` VALUES ('3', '东城区', '2', '110101');
INSERT INTO `car_region` VALUES ('4', '西城区', '2', '110102');
INSERT INTO `car_region` VALUES ('5', '崇文区', '2', '110103');
INSERT INTO `car_region` VALUES ('6', '宣武区', '2', '110104');
INSERT INTO `car_region` VALUES ('7', '朝阳区', '2', '110105');
INSERT INTO `car_region` VALUES ('8', '丰台区', '2', '110106');
INSERT INTO `car_region` VALUES ('9', '石景山区', '2', '110107');
INSERT INTO `car_region` VALUES ('10', '海淀区', '2', '110108');
INSERT INTO `car_region` VALUES ('11', '门头沟区', '2', '110109');
INSERT INTO `car_region` VALUES ('12', '房山区', '2', '110111');
INSERT INTO `car_region` VALUES ('13', '通州区', '2', '110112');
INSERT INTO `car_region` VALUES ('14', '顺义区', '2', '110113');
INSERT INTO `car_region` VALUES ('15', '昌平区', '2', '110114');
INSERT INTO `car_region` VALUES ('16', '大兴区', '2', '110115');
INSERT INTO `car_region` VALUES ('17', '怀柔区', '2', '110116');
INSERT INTO `car_region` VALUES ('18', '平谷区', '2', '110117');
INSERT INTO `car_region` VALUES ('19', '县', '1', '110200');
INSERT INTO `car_region` VALUES ('20', '密云县', '19', '110228');
INSERT INTO `car_region` VALUES ('21', '延庆县', '19', '110229');
INSERT INTO `car_region` VALUES ('22', '天津市', '0', '120000');
INSERT INTO `car_region` VALUES ('23', '市辖区', '22', '120100');
INSERT INTO `car_region` VALUES ('24', '和平区', '23', '120101');
INSERT INTO `car_region` VALUES ('25', '河东区', '23', '120102');
INSERT INTO `car_region` VALUES ('26', '河西区', '23', '120103');
INSERT INTO `car_region` VALUES ('27', '南开区', '23', '120104');
INSERT INTO `car_region` VALUES ('28', '河北区', '23', '120105');
INSERT INTO `car_region` VALUES ('29', '红桥区', '23', '120106');
INSERT INTO `car_region` VALUES ('30', '塘沽区', '23', '120107');
INSERT INTO `car_region` VALUES ('31', '汉沽区', '23', '120108');
INSERT INTO `car_region` VALUES ('32', '大港区', '23', '120109');
INSERT INTO `car_region` VALUES ('33', '东丽区', '23', '120110');
INSERT INTO `car_region` VALUES ('34', '西青区', '23', '120111');
INSERT INTO `car_region` VALUES ('35', '津南区', '23', '120112');
INSERT INTO `car_region` VALUES ('36', '北辰区', '23', '120113');
INSERT INTO `car_region` VALUES ('37', '武清区', '23', '120114');
INSERT INTO `car_region` VALUES ('38', '宝坻区', '23', '120115');
INSERT INTO `car_region` VALUES ('39', '县', '22', '120200');
INSERT INTO `car_region` VALUES ('40', '宁河县', '39', '120221');
INSERT INTO `car_region` VALUES ('41', '静海县', '39', '120223');
INSERT INTO `car_region` VALUES ('42', '蓟　县', '39', '120225');
INSERT INTO `car_region` VALUES ('43', '河北省', '0', '130000');
INSERT INTO `car_region` VALUES ('44', '石家庄市', '43', '130100');
INSERT INTO `car_region` VALUES ('45', '市辖区', '44', '130101');
INSERT INTO `car_region` VALUES ('46', '长安区', '44', '130102');
INSERT INTO `car_region` VALUES ('47', '桥东区', '44', '130103');
INSERT INTO `car_region` VALUES ('48', '桥西区', '44', '130104');
INSERT INTO `car_region` VALUES ('49', '新华区', '44', '130105');
INSERT INTO `car_region` VALUES ('50', '井陉矿区', '44', '130107');
INSERT INTO `car_region` VALUES ('51', '裕华区', '44', '130108');
INSERT INTO `car_region` VALUES ('52', '井陉县', '44', '130121');
INSERT INTO `car_region` VALUES ('53', '正定县', '44', '130123');
INSERT INTO `car_region` VALUES ('54', '栾城县', '44', '130124');
INSERT INTO `car_region` VALUES ('55', '行唐县', '44', '130125');
INSERT INTO `car_region` VALUES ('56', '灵寿县', '44', '130126');
INSERT INTO `car_region` VALUES ('57', '高邑县', '44', '130127');
INSERT INTO `car_region` VALUES ('58', '深泽县', '44', '130128');
INSERT INTO `car_region` VALUES ('59', '赞皇县', '44', '130129');
INSERT INTO `car_region` VALUES ('60', '无极县', '44', '130130');
INSERT INTO `car_region` VALUES ('61', '平山县', '44', '130131');
INSERT INTO `car_region` VALUES ('62', '元氏县', '44', '130132');
INSERT INTO `car_region` VALUES ('63', '赵　县', '44', '130133');
INSERT INTO `car_region` VALUES ('64', '辛集市', '44', '130181');
INSERT INTO `car_region` VALUES ('65', '藁城市', '44', '130182');
INSERT INTO `car_region` VALUES ('66', '晋州市', '44', '130183');
INSERT INTO `car_region` VALUES ('67', '新乐市', '44', '130184');
INSERT INTO `car_region` VALUES ('68', '鹿泉市', '44', '130185');
INSERT INTO `car_region` VALUES ('69', '唐山市', '43', '130200');
INSERT INTO `car_region` VALUES ('70', '市辖区', '69', '130201');
INSERT INTO `car_region` VALUES ('71', '路南区', '69', '130202');
INSERT INTO `car_region` VALUES ('72', '路北区', '69', '130203');
INSERT INTO `car_region` VALUES ('73', '古冶区', '69', '130204');
INSERT INTO `car_region` VALUES ('74', '开平区', '69', '130205');
INSERT INTO `car_region` VALUES ('75', '丰南区', '69', '130207');
INSERT INTO `car_region` VALUES ('76', '丰润区', '69', '130208');
INSERT INTO `car_region` VALUES ('77', '滦　县', '69', '130223');
INSERT INTO `car_region` VALUES ('78', '滦南县', '69', '130224');
INSERT INTO `car_region` VALUES ('79', '乐亭县', '69', '130225');
INSERT INTO `car_region` VALUES ('80', '迁西县', '69', '130227');
INSERT INTO `car_region` VALUES ('81', '玉田县', '69', '130229');
INSERT INTO `car_region` VALUES ('82', '唐海县', '69', '130230');
INSERT INTO `car_region` VALUES ('83', '遵化市', '69', '130281');
INSERT INTO `car_region` VALUES ('84', '迁安市', '69', '130283');
INSERT INTO `car_region` VALUES ('85', '秦皇岛市', '43', '130300');
INSERT INTO `car_region` VALUES ('86', '市辖区', '85', '130301');
INSERT INTO `car_region` VALUES ('87', '海港区', '85', '130302');
INSERT INTO `car_region` VALUES ('88', '山海关区', '85', '130303');
INSERT INTO `car_region` VALUES ('89', '北戴河区', '85', '130304');
INSERT INTO `car_region` VALUES ('90', '青龙满族自治县', '85', '130321');
INSERT INTO `car_region` VALUES ('91', '昌黎县', '85', '130322');
INSERT INTO `car_region` VALUES ('92', '抚宁县', '85', '130323');
INSERT INTO `car_region` VALUES ('93', '卢龙县', '85', '130324');
INSERT INTO `car_region` VALUES ('94', '邯郸市', '43', '130400');
INSERT INTO `car_region` VALUES ('95', '市辖区', '94', '130401');
INSERT INTO `car_region` VALUES ('96', '邯山区', '94', '130402');
INSERT INTO `car_region` VALUES ('97', '丛台区', '94', '130403');
INSERT INTO `car_region` VALUES ('98', '复兴区', '94', '130404');
INSERT INTO `car_region` VALUES ('99', '峰峰矿区', '94', '130406');
INSERT INTO `car_region` VALUES ('100', '邯郸县', '94', '130421');
INSERT INTO `car_region` VALUES ('101', '临漳县', '94', '130423');
INSERT INTO `car_region` VALUES ('102', '成安县', '94', '130424');
INSERT INTO `car_region` VALUES ('103', '大名县', '94', '130425');
INSERT INTO `car_region` VALUES ('104', '涉　县', '94', '130426');
INSERT INTO `car_region` VALUES ('105', '磁　县', '94', '130427');
INSERT INTO `car_region` VALUES ('106', '肥乡县', '94', '130428');
INSERT INTO `car_region` VALUES ('107', '永年县', '94', '130429');
INSERT INTO `car_region` VALUES ('108', '邱　县', '94', '130430');
INSERT INTO `car_region` VALUES ('109', '鸡泽县', '94', '130431');
INSERT INTO `car_region` VALUES ('110', '广平县', '94', '130432');
INSERT INTO `car_region` VALUES ('111', '馆陶县', '94', '130433');
INSERT INTO `car_region` VALUES ('112', '魏　县', '94', '130434');
INSERT INTO `car_region` VALUES ('113', '曲周县', '94', '130435');
INSERT INTO `car_region` VALUES ('114', '武安市', '94', '130481');
INSERT INTO `car_region` VALUES ('115', '邢台市', '43', '130500');
INSERT INTO `car_region` VALUES ('116', '市辖区', '115', '130501');
INSERT INTO `car_region` VALUES ('117', '桥东区', '115', '130502');
INSERT INTO `car_region` VALUES ('118', '桥西区', '115', '130503');
INSERT INTO `car_region` VALUES ('119', '邢台县', '115', '130521');
INSERT INTO `car_region` VALUES ('120', '临城县', '115', '130522');
INSERT INTO `car_region` VALUES ('121', '内丘县', '115', '130523');
INSERT INTO `car_region` VALUES ('122', '柏乡县', '115', '130524');
INSERT INTO `car_region` VALUES ('123', '隆尧县', '115', '130525');
INSERT INTO `car_region` VALUES ('124', '任　县', '115', '130526');
INSERT INTO `car_region` VALUES ('125', '南和县', '115', '130527');
INSERT INTO `car_region` VALUES ('126', '宁晋县', '115', '130528');
INSERT INTO `car_region` VALUES ('127', '巨鹿县', '115', '130529');
INSERT INTO `car_region` VALUES ('128', '新河县', '115', '130530');
INSERT INTO `car_region` VALUES ('129', '广宗县', '115', '130531');
INSERT INTO `car_region` VALUES ('130', '平乡县', '115', '130532');
INSERT INTO `car_region` VALUES ('131', '威　县', '115', '130533');
INSERT INTO `car_region` VALUES ('132', '清河县', '115', '130534');
INSERT INTO `car_region` VALUES ('133', '临西县', '115', '130535');
INSERT INTO `car_region` VALUES ('134', '南宫市', '115', '130581');
INSERT INTO `car_region` VALUES ('135', '沙河市', '115', '130582');
INSERT INTO `car_region` VALUES ('136', '保定市', '43', '130600');
INSERT INTO `car_region` VALUES ('137', '市辖区', '136', '130601');
INSERT INTO `car_region` VALUES ('138', '新市区', '136', '130602');
INSERT INTO `car_region` VALUES ('139', '北市区', '136', '130603');
INSERT INTO `car_region` VALUES ('140', '南市区', '136', '130604');
INSERT INTO `car_region` VALUES ('141', '满城县', '136', '130621');
INSERT INTO `car_region` VALUES ('142', '清苑县', '136', '130622');
INSERT INTO `car_region` VALUES ('143', '涞水县', '136', '130623');
INSERT INTO `car_region` VALUES ('144', '阜平县', '136', '130624');
INSERT INTO `car_region` VALUES ('145', '徐水县', '136', '130625');
INSERT INTO `car_region` VALUES ('146', '定兴县', '136', '130626');
INSERT INTO `car_region` VALUES ('147', '唐　县', '136', '130627');
INSERT INTO `car_region` VALUES ('148', '高阳县', '136', '130628');
INSERT INTO `car_region` VALUES ('149', '容城县', '136', '130629');
INSERT INTO `car_region` VALUES ('150', '涞源县', '136', '130630');
INSERT INTO `car_region` VALUES ('151', '望都县', '136', '130631');
INSERT INTO `car_region` VALUES ('152', '安新县', '136', '130632');
INSERT INTO `car_region` VALUES ('153', '易　县', '136', '130633');
INSERT INTO `car_region` VALUES ('154', '曲阳县', '136', '130634');
INSERT INTO `car_region` VALUES ('155', '蠡　县', '136', '130635');
INSERT INTO `car_region` VALUES ('156', '顺平县', '136', '130636');
INSERT INTO `car_region` VALUES ('157', '博野县', '136', '130637');
INSERT INTO `car_region` VALUES ('158', '雄　县', '136', '130638');
INSERT INTO `car_region` VALUES ('159', '涿州市', '136', '130681');
INSERT INTO `car_region` VALUES ('160', '定州市', '136', '130682');
INSERT INTO `car_region` VALUES ('161', '安国市', '136', '130683');
INSERT INTO `car_region` VALUES ('162', '高碑店市', '136', '130684');
INSERT INTO `car_region` VALUES ('163', '张家口市', '43', '130700');
INSERT INTO `car_region` VALUES ('164', '市辖区', '163', '130701');
INSERT INTO `car_region` VALUES ('165', '桥东区', '163', '130702');
INSERT INTO `car_region` VALUES ('166', '桥西区', '163', '130703');
INSERT INTO `car_region` VALUES ('167', '宣化区', '163', '130705');
INSERT INTO `car_region` VALUES ('168', '下花园区', '163', '130706');
INSERT INTO `car_region` VALUES ('169', '宣化县', '163', '130721');
INSERT INTO `car_region` VALUES ('170', '张北县', '163', '130722');
INSERT INTO `car_region` VALUES ('171', '康保县', '163', '130723');
INSERT INTO `car_region` VALUES ('172', '沽源县', '163', '130724');
INSERT INTO `car_region` VALUES ('173', '尚义县', '163', '130725');
INSERT INTO `car_region` VALUES ('174', '蔚　县', '163', '130726');
INSERT INTO `car_region` VALUES ('175', '阳原县', '163', '130727');
INSERT INTO `car_region` VALUES ('176', '怀安县', '163', '130728');
INSERT INTO `car_region` VALUES ('177', '万全县', '163', '130729');
INSERT INTO `car_region` VALUES ('178', '怀来县', '163', '130730');
INSERT INTO `car_region` VALUES ('179', '涿鹿县', '163', '130731');
INSERT INTO `car_region` VALUES ('180', '赤城县', '163', '130732');
INSERT INTO `car_region` VALUES ('181', '崇礼县', '163', '130733');
INSERT INTO `car_region` VALUES ('182', '承德市', '43', '130800');
INSERT INTO `car_region` VALUES ('183', '市辖区', '182', '130801');
INSERT INTO `car_region` VALUES ('184', '双桥区', '182', '130802');
INSERT INTO `car_region` VALUES ('185', '双滦区', '182', '130803');
INSERT INTO `car_region` VALUES ('186', '鹰手营子矿区', '182', '130804');
INSERT INTO `car_region` VALUES ('187', '承德县', '182', '130821');
INSERT INTO `car_region` VALUES ('188', '兴隆县', '182', '130822');
INSERT INTO `car_region` VALUES ('189', '平泉县', '182', '130823');
INSERT INTO `car_region` VALUES ('190', '滦平县', '182', '130824');
INSERT INTO `car_region` VALUES ('191', '隆化县', '182', '130825');
INSERT INTO `car_region` VALUES ('192', '丰宁满族自治县', '182', '130826');
INSERT INTO `car_region` VALUES ('193', '宽城满族自治县', '182', '130827');
INSERT INTO `car_region` VALUES ('194', '围场满族蒙古族自治县', '182', '130828');
INSERT INTO `car_region` VALUES ('195', '沧州市', '43', '130900');
INSERT INTO `car_region` VALUES ('196', '市辖区', '195', '130901');
INSERT INTO `car_region` VALUES ('197', '新华区', '195', '130902');
INSERT INTO `car_region` VALUES ('198', '运河区', '195', '130903');
INSERT INTO `car_region` VALUES ('199', '沧　县', '195', '130921');
INSERT INTO `car_region` VALUES ('200', '青　县', '195', '130922');
INSERT INTO `car_region` VALUES ('201', '东光县', '195', '130923');
INSERT INTO `car_region` VALUES ('202', '海兴县', '195', '130924');
INSERT INTO `car_region` VALUES ('203', '盐山县', '195', '130925');
INSERT INTO `car_region` VALUES ('204', '肃宁县', '195', '130926');
INSERT INTO `car_region` VALUES ('205', '南皮县', '195', '130927');
INSERT INTO `car_region` VALUES ('206', '吴桥县', '195', '130928');
INSERT INTO `car_region` VALUES ('207', '献　县', '195', '130929');
INSERT INTO `car_region` VALUES ('208', '孟村回族自治县', '195', '130930');
INSERT INTO `car_region` VALUES ('209', '泊头市', '195', '130981');
INSERT INTO `car_region` VALUES ('210', '任丘市', '195', '130982');
INSERT INTO `car_region` VALUES ('211', '黄骅市', '195', '130983');
INSERT INTO `car_region` VALUES ('212', '河间市', '195', '130984');
INSERT INTO `car_region` VALUES ('213', '廊坊市', '43', '131000');
INSERT INTO `car_region` VALUES ('214', '市辖区', '213', '131001');
INSERT INTO `car_region` VALUES ('215', '安次区', '213', '131002');
INSERT INTO `car_region` VALUES ('216', '广阳区', '213', '131003');
INSERT INTO `car_region` VALUES ('217', '固安县', '213', '131022');
INSERT INTO `car_region` VALUES ('218', '永清县', '213', '131023');
INSERT INTO `car_region` VALUES ('219', '香河县', '213', '131024');
INSERT INTO `car_region` VALUES ('220', '大城县', '213', '131025');
INSERT INTO `car_region` VALUES ('221', '文安县', '213', '131026');
INSERT INTO `car_region` VALUES ('222', '大厂回族自治县', '213', '131028');
INSERT INTO `car_region` VALUES ('223', '霸州市', '213', '131081');
INSERT INTO `car_region` VALUES ('224', '三河市', '213', '131082');
INSERT INTO `car_region` VALUES ('225', '衡水市', '43', '131100');
INSERT INTO `car_region` VALUES ('226', '市辖区', '225', '131101');
INSERT INTO `car_region` VALUES ('227', '桃城区', '225', '131102');
INSERT INTO `car_region` VALUES ('228', '枣强县', '225', '131121');
INSERT INTO `car_region` VALUES ('229', '武邑县', '225', '131122');
INSERT INTO `car_region` VALUES ('230', '武强县', '225', '131123');
INSERT INTO `car_region` VALUES ('231', '饶阳县', '225', '131124');
INSERT INTO `car_region` VALUES ('232', '安平县', '225', '131125');
INSERT INTO `car_region` VALUES ('233', '故城县', '225', '131126');
INSERT INTO `car_region` VALUES ('234', '景　县', '225', '131127');
INSERT INTO `car_region` VALUES ('235', '阜城县', '225', '131128');
INSERT INTO `car_region` VALUES ('236', '冀州市', '225', '131181');
INSERT INTO `car_region` VALUES ('237', '深州市', '225', '131182');
INSERT INTO `car_region` VALUES ('238', '山西省', '0', '140000');
INSERT INTO `car_region` VALUES ('239', '太原市', '238', '140100');
INSERT INTO `car_region` VALUES ('240', '市辖区', '239', '140101');
INSERT INTO `car_region` VALUES ('241', '小店区', '239', '140105');
INSERT INTO `car_region` VALUES ('242', '迎泽区', '239', '140106');
INSERT INTO `car_region` VALUES ('243', '杏花岭区', '239', '140107');
INSERT INTO `car_region` VALUES ('244', '尖草坪区', '239', '140108');
INSERT INTO `car_region` VALUES ('245', '万柏林区', '239', '140109');
INSERT INTO `car_region` VALUES ('246', '晋源区', '239', '140110');
INSERT INTO `car_region` VALUES ('247', '清徐县', '239', '140121');
INSERT INTO `car_region` VALUES ('248', '阳曲县', '239', '140122');
INSERT INTO `car_region` VALUES ('249', '娄烦县', '239', '140123');
INSERT INTO `car_region` VALUES ('250', '古交市', '239', '140181');
INSERT INTO `car_region` VALUES ('251', '大同市', '238', '140200');
INSERT INTO `car_region` VALUES ('252', '市辖区', '251', '140201');
INSERT INTO `car_region` VALUES ('253', '城　区', '251', '140202');
INSERT INTO `car_region` VALUES ('254', '矿　区', '251', '140203');
INSERT INTO `car_region` VALUES ('255', '南郊区', '251', '140211');
INSERT INTO `car_region` VALUES ('256', '新荣区', '251', '140212');
INSERT INTO `car_region` VALUES ('257', '阳高县', '251', '140221');
INSERT INTO `car_region` VALUES ('258', '天镇县', '251', '140222');
INSERT INTO `car_region` VALUES ('259', '广灵县', '251', '140223');
INSERT INTO `car_region` VALUES ('260', '灵丘县', '251', '140224');
INSERT INTO `car_region` VALUES ('261', '浑源县', '251', '140225');
INSERT INTO `car_region` VALUES ('262', '左云县', '251', '140226');
INSERT INTO `car_region` VALUES ('263', '大同县', '251', '140227');
INSERT INTO `car_region` VALUES ('264', '阳泉市', '238', '140300');
INSERT INTO `car_region` VALUES ('265', '市辖区', '264', '140301');
INSERT INTO `car_region` VALUES ('266', '城　区', '264', '140302');
INSERT INTO `car_region` VALUES ('267', '矿　区', '264', '140303');
INSERT INTO `car_region` VALUES ('268', '郊　区', '264', '140311');
INSERT INTO `car_region` VALUES ('269', '平定县', '264', '140321');
INSERT INTO `car_region` VALUES ('270', '盂　县', '264', '140322');
INSERT INTO `car_region` VALUES ('271', '长治市', '238', '140400');
INSERT INTO `car_region` VALUES ('272', '市辖区', '271', '140401');
INSERT INTO `car_region` VALUES ('273', '城　区', '271', '140402');
INSERT INTO `car_region` VALUES ('274', '郊　区', '271', '140411');
INSERT INTO `car_region` VALUES ('275', '长治县', '271', '140421');
INSERT INTO `car_region` VALUES ('276', '襄垣县', '271', '140423');
INSERT INTO `car_region` VALUES ('277', '屯留县', '271', '140424');
INSERT INTO `car_region` VALUES ('278', '平顺县', '271', '140425');
INSERT INTO `car_region` VALUES ('279', '黎城县', '271', '140426');
INSERT INTO `car_region` VALUES ('280', '壶关县', '271', '140427');
INSERT INTO `car_region` VALUES ('281', '长子县', '271', '140428');
INSERT INTO `car_region` VALUES ('282', '武乡县', '271', '140429');
INSERT INTO `car_region` VALUES ('283', '沁　县', '271', '140430');
INSERT INTO `car_region` VALUES ('284', '沁源县', '271', '140431');
INSERT INTO `car_region` VALUES ('285', '潞城市', '271', '140481');
INSERT INTO `car_region` VALUES ('286', '晋城市', '238', '140500');
INSERT INTO `car_region` VALUES ('287', '市辖区', '286', '140501');
INSERT INTO `car_region` VALUES ('288', '城　区', '286', '140502');
INSERT INTO `car_region` VALUES ('289', '沁水县', '286', '140521');
INSERT INTO `car_region` VALUES ('290', '阳城县', '286', '140522');
INSERT INTO `car_region` VALUES ('291', '陵川县', '286', '140524');
INSERT INTO `car_region` VALUES ('292', '泽州县', '286', '140525');
INSERT INTO `car_region` VALUES ('293', '高平市', '286', '140581');
INSERT INTO `car_region` VALUES ('294', '朔州市', '238', '140600');
INSERT INTO `car_region` VALUES ('295', '市辖区', '294', '140601');
INSERT INTO `car_region` VALUES ('296', '朔城区', '294', '140602');
INSERT INTO `car_region` VALUES ('297', '平鲁区', '294', '140603');
INSERT INTO `car_region` VALUES ('298', '山阴县', '294', '140621');
INSERT INTO `car_region` VALUES ('299', '应　县', '294', '140622');
INSERT INTO `car_region` VALUES ('300', '右玉县', '294', '140623');
INSERT INTO `car_region` VALUES ('301', '怀仁县', '294', '140624');
INSERT INTO `car_region` VALUES ('302', '晋中市', '238', '140700');
INSERT INTO `car_region` VALUES ('303', '市辖区', '302', '140701');
INSERT INTO `car_region` VALUES ('304', '榆次区', '302', '140702');
INSERT INTO `car_region` VALUES ('305', '榆社县', '302', '140721');
INSERT INTO `car_region` VALUES ('306', '左权县', '302', '140722');
INSERT INTO `car_region` VALUES ('307', '和顺县', '302', '140723');
INSERT INTO `car_region` VALUES ('308', '昔阳县', '302', '140724');
INSERT INTO `car_region` VALUES ('309', '寿阳县', '302', '140725');
INSERT INTO `car_region` VALUES ('310', '太谷县', '302', '140726');
INSERT INTO `car_region` VALUES ('311', '祁　县', '302', '140727');
INSERT INTO `car_region` VALUES ('312', '平遥县', '302', '140728');
INSERT INTO `car_region` VALUES ('313', '灵石县', '302', '140729');
INSERT INTO `car_region` VALUES ('314', '介休市', '302', '140781');
INSERT INTO `car_region` VALUES ('315', '运城市', '238', '140800');
INSERT INTO `car_region` VALUES ('316', '市辖区', '315', '140801');
INSERT INTO `car_region` VALUES ('317', '盐湖区', '315', '140802');
INSERT INTO `car_region` VALUES ('318', '临猗县', '315', '140821');
INSERT INTO `car_region` VALUES ('319', '万荣县', '315', '140822');
INSERT INTO `car_region` VALUES ('320', '闻喜县', '315', '140823');
INSERT INTO `car_region` VALUES ('321', '稷山县', '315', '140824');
INSERT INTO `car_region` VALUES ('322', '新绛县', '315', '140825');
INSERT INTO `car_region` VALUES ('323', '绛　县', '315', '140826');
INSERT INTO `car_region` VALUES ('324', '垣曲县', '315', '140827');
INSERT INTO `car_region` VALUES ('325', '夏　县', '315', '140828');
INSERT INTO `car_region` VALUES ('326', '平陆县', '315', '140829');
INSERT INTO `car_region` VALUES ('327', '芮城县', '315', '140830');
INSERT INTO `car_region` VALUES ('328', '永济市', '315', '140881');
INSERT INTO `car_region` VALUES ('329', '河津市', '315', '140882');
INSERT INTO `car_region` VALUES ('330', '忻州市', '238', '140900');
INSERT INTO `car_region` VALUES ('331', '市辖区', '330', '140901');
INSERT INTO `car_region` VALUES ('332', '忻府区', '330', '140902');
INSERT INTO `car_region` VALUES ('333', '定襄县', '330', '140921');
INSERT INTO `car_region` VALUES ('334', '五台县', '330', '140922');
INSERT INTO `car_region` VALUES ('335', '代　县', '330', '140923');
INSERT INTO `car_region` VALUES ('336', '繁峙县', '330', '140924');
INSERT INTO `car_region` VALUES ('337', '宁武县', '330', '140925');
INSERT INTO `car_region` VALUES ('338', '静乐县', '330', '140926');
INSERT INTO `car_region` VALUES ('339', '神池县', '330', '140927');
INSERT INTO `car_region` VALUES ('340', '五寨县', '330', '140928');
INSERT INTO `car_region` VALUES ('341', '岢岚县', '330', '140929');
INSERT INTO `car_region` VALUES ('342', '河曲县', '330', '140930');
INSERT INTO `car_region` VALUES ('343', '保德县', '330', '140931');
INSERT INTO `car_region` VALUES ('344', '偏关县', '330', '140932');
INSERT INTO `car_region` VALUES ('345', '原平市', '330', '140981');
INSERT INTO `car_region` VALUES ('346', '临汾市', '238', '141000');
INSERT INTO `car_region` VALUES ('347', '市辖区', '346', '141001');
INSERT INTO `car_region` VALUES ('348', '尧都区', '346', '141002');
INSERT INTO `car_region` VALUES ('349', '曲沃县', '346', '141021');
INSERT INTO `car_region` VALUES ('350', '翼城县', '346', '141022');
INSERT INTO `car_region` VALUES ('351', '襄汾县', '346', '141023');
INSERT INTO `car_region` VALUES ('352', '洪洞县', '346', '141024');
INSERT INTO `car_region` VALUES ('353', '古　县', '346', '141025');
INSERT INTO `car_region` VALUES ('354', '安泽县', '346', '141026');
INSERT INTO `car_region` VALUES ('355', '浮山县', '346', '141027');
INSERT INTO `car_region` VALUES ('356', '吉　县', '346', '141028');
INSERT INTO `car_region` VALUES ('357', '乡宁县', '346', '141029');
INSERT INTO `car_region` VALUES ('358', '大宁县', '346', '141030');
INSERT INTO `car_region` VALUES ('359', '隰　县', '346', '141031');
INSERT INTO `car_region` VALUES ('360', '永和县', '346', '141032');
INSERT INTO `car_region` VALUES ('361', '蒲　县', '346', '141033');
INSERT INTO `car_region` VALUES ('362', '汾西县', '346', '141034');
INSERT INTO `car_region` VALUES ('363', '侯马市', '346', '141081');
INSERT INTO `car_region` VALUES ('364', '霍州市', '346', '141082');
INSERT INTO `car_region` VALUES ('365', '吕梁市', '238', '141100');
INSERT INTO `car_region` VALUES ('366', '市辖区', '365', '141101');
INSERT INTO `car_region` VALUES ('367', '离石区', '365', '141102');
INSERT INTO `car_region` VALUES ('368', '文水县', '365', '141121');
INSERT INTO `car_region` VALUES ('369', '交城县', '365', '141122');
INSERT INTO `car_region` VALUES ('370', '兴　县', '365', '141123');
INSERT INTO `car_region` VALUES ('371', '临　县', '365', '141124');
INSERT INTO `car_region` VALUES ('372', '柳林县', '365', '141125');
INSERT INTO `car_region` VALUES ('373', '石楼县', '365', '141126');
INSERT INTO `car_region` VALUES ('374', '岚　县', '365', '141127');
INSERT INTO `car_region` VALUES ('375', '方山县', '365', '141128');
INSERT INTO `car_region` VALUES ('376', '中阳县', '365', '141129');
INSERT INTO `car_region` VALUES ('377', '交口县', '365', '141130');
INSERT INTO `car_region` VALUES ('378', '孝义市', '365', '141181');
INSERT INTO `car_region` VALUES ('379', '汾阳市', '365', '141182');
INSERT INTO `car_region` VALUES ('380', '内蒙古自治区', '0', '150000');
INSERT INTO `car_region` VALUES ('381', '呼和浩特市', '380', '150100');
INSERT INTO `car_region` VALUES ('382', '市辖区', '381', '150101');
INSERT INTO `car_region` VALUES ('383', '新城区', '381', '150102');
INSERT INTO `car_region` VALUES ('384', '回民区', '381', '150103');
INSERT INTO `car_region` VALUES ('385', '玉泉区', '381', '150104');
INSERT INTO `car_region` VALUES ('386', '赛罕区', '381', '150105');
INSERT INTO `car_region` VALUES ('387', '土默特左旗', '381', '150121');
INSERT INTO `car_region` VALUES ('388', '托克托县', '381', '150122');
INSERT INTO `car_region` VALUES ('389', '和林格尔县', '381', '150123');
INSERT INTO `car_region` VALUES ('390', '清水河县', '381', '150124');
INSERT INTO `car_region` VALUES ('391', '武川县', '381', '150125');
INSERT INTO `car_region` VALUES ('392', '包头市', '380', '150200');
INSERT INTO `car_region` VALUES ('393', '市辖区', '392', '150201');
INSERT INTO `car_region` VALUES ('394', '东河区', '392', '150202');
INSERT INTO `car_region` VALUES ('395', '昆都仑区', '392', '150203');
INSERT INTO `car_region` VALUES ('396', '青山区', '392', '150204');
INSERT INTO `car_region` VALUES ('397', '石拐区', '392', '150205');
INSERT INTO `car_region` VALUES ('398', '白云矿区', '392', '150206');
INSERT INTO `car_region` VALUES ('399', '九原区', '392', '150207');
INSERT INTO `car_region` VALUES ('400', '土默特右旗', '392', '150221');
INSERT INTO `car_region` VALUES ('401', '固阳县', '392', '150222');
INSERT INTO `car_region` VALUES ('402', '达尔罕茂明安联合旗', '392', '150223');
INSERT INTO `car_region` VALUES ('403', '乌海市', '380', '150300');
INSERT INTO `car_region` VALUES ('404', '市辖区', '403', '150301');
INSERT INTO `car_region` VALUES ('405', '海勃湾区', '403', '150302');
INSERT INTO `car_region` VALUES ('406', '海南区', '403', '150303');
INSERT INTO `car_region` VALUES ('407', '乌达区', '403', '150304');
INSERT INTO `car_region` VALUES ('408', '赤峰市', '380', '150400');
INSERT INTO `car_region` VALUES ('409', '市辖区', '408', '150401');
INSERT INTO `car_region` VALUES ('410', '红山区', '408', '150402');
INSERT INTO `car_region` VALUES ('411', '元宝山区', '408', '150403');
INSERT INTO `car_region` VALUES ('412', '松山区', '408', '150404');
INSERT INTO `car_region` VALUES ('413', '阿鲁科尔沁旗', '408', '150421');
INSERT INTO `car_region` VALUES ('414', '巴林左旗', '408', '150422');
INSERT INTO `car_region` VALUES ('415', '巴林右旗', '408', '150423');
INSERT INTO `car_region` VALUES ('416', '林西县', '408', '150424');
INSERT INTO `car_region` VALUES ('417', '克什克腾旗', '408', '150425');
INSERT INTO `car_region` VALUES ('418', '翁牛特旗', '408', '150426');
INSERT INTO `car_region` VALUES ('419', '喀喇沁旗', '408', '150428');
INSERT INTO `car_region` VALUES ('420', '宁城县', '408', '150429');
INSERT INTO `car_region` VALUES ('421', '敖汉旗', '408', '150430');
INSERT INTO `car_region` VALUES ('422', '通辽市', '380', '150500');
INSERT INTO `car_region` VALUES ('423', '市辖区', '422', '150501');
INSERT INTO `car_region` VALUES ('424', '科尔沁区', '422', '150502');
INSERT INTO `car_region` VALUES ('425', '科尔沁左翼中旗', '422', '150521');
INSERT INTO `car_region` VALUES ('426', '科尔沁左翼后旗', '422', '150522');
INSERT INTO `car_region` VALUES ('427', '开鲁县', '422', '150523');
INSERT INTO `car_region` VALUES ('428', '库伦旗', '422', '150524');
INSERT INTO `car_region` VALUES ('429', '奈曼旗', '422', '150525');
INSERT INTO `car_region` VALUES ('430', '扎鲁特旗', '422', '150526');
INSERT INTO `car_region` VALUES ('431', '霍林郭勒市', '422', '150581');
INSERT INTO `car_region` VALUES ('432', '鄂尔多斯市', '380', '150600');
INSERT INTO `car_region` VALUES ('433', '东胜区', '432', '150602');
INSERT INTO `car_region` VALUES ('434', '达拉特旗', '432', '150621');
INSERT INTO `car_region` VALUES ('435', '准格尔旗', '432', '150622');
INSERT INTO `car_region` VALUES ('436', '鄂托克前旗', '432', '150623');
INSERT INTO `car_region` VALUES ('437', '鄂托克旗', '432', '150624');
INSERT INTO `car_region` VALUES ('438', '杭锦旗', '432', '150625');
INSERT INTO `car_region` VALUES ('439', '乌审旗', '432', '150626');
INSERT INTO `car_region` VALUES ('440', '伊金霍洛旗', '432', '150627');
INSERT INTO `car_region` VALUES ('441', '呼伦贝尔市', '380', '150700');
INSERT INTO `car_region` VALUES ('442', '市辖区', '441', '150701');
INSERT INTO `car_region` VALUES ('443', '海拉尔区', '441', '150702');
INSERT INTO `car_region` VALUES ('444', '阿荣旗', '441', '150721');
INSERT INTO `car_region` VALUES ('445', '莫力达瓦达斡尔族自治旗', '441', '150722');
INSERT INTO `car_region` VALUES ('446', '鄂伦春自治旗', '441', '150723');
INSERT INTO `car_region` VALUES ('447', '鄂温克族自治旗', '441', '150724');
INSERT INTO `car_region` VALUES ('448', '陈巴尔虎旗', '441', '150725');
INSERT INTO `car_region` VALUES ('449', '新巴尔虎左旗', '441', '150726');
INSERT INTO `car_region` VALUES ('450', '新巴尔虎右旗', '441', '150727');
INSERT INTO `car_region` VALUES ('451', '满洲里市', '441', '150781');
INSERT INTO `car_region` VALUES ('452', '牙克石市', '441', '150782');
INSERT INTO `car_region` VALUES ('453', '扎兰屯市', '441', '150783');
INSERT INTO `car_region` VALUES ('454', '额尔古纳市', '441', '150784');
INSERT INTO `car_region` VALUES ('455', '根河市', '441', '150785');
INSERT INTO `car_region` VALUES ('456', '巴彦淖尔市', '380', '150800');
INSERT INTO `car_region` VALUES ('457', '市辖区', '456', '150801');
INSERT INTO `car_region` VALUES ('458', '临河区', '456', '150802');
INSERT INTO `car_region` VALUES ('459', '五原县', '456', '150821');
INSERT INTO `car_region` VALUES ('460', '磴口县', '456', '150822');
INSERT INTO `car_region` VALUES ('461', '乌拉特前旗', '456', '150823');
INSERT INTO `car_region` VALUES ('462', '乌拉特中旗', '456', '150824');
INSERT INTO `car_region` VALUES ('463', '乌拉特后旗', '456', '150825');
INSERT INTO `car_region` VALUES ('464', '杭锦后旗', '456', '150826');
INSERT INTO `car_region` VALUES ('465', '乌兰察布市', '380', '150900');
INSERT INTO `car_region` VALUES ('466', '市辖区', '465', '150901');
INSERT INTO `car_region` VALUES ('467', '集宁区', '465', '150902');
INSERT INTO `car_region` VALUES ('468', '卓资县', '465', '150921');
INSERT INTO `car_region` VALUES ('469', '化德县', '465', '150922');
INSERT INTO `car_region` VALUES ('470', '商都县', '465', '150923');
INSERT INTO `car_region` VALUES ('471', '兴和县', '465', '150924');
INSERT INTO `car_region` VALUES ('472', '凉城县', '465', '150925');
INSERT INTO `car_region` VALUES ('473', '察哈尔右翼前旗', '465', '150926');
INSERT INTO `car_region` VALUES ('474', '察哈尔右翼中旗', '465', '150927');
INSERT INTO `car_region` VALUES ('475', '察哈尔右翼后旗', '465', '150928');
INSERT INTO `car_region` VALUES ('476', '四子王旗', '465', '150929');
INSERT INTO `car_region` VALUES ('477', '丰镇市', '465', '150981');
INSERT INTO `car_region` VALUES ('478', '兴安盟', '380', '152200');
INSERT INTO `car_region` VALUES ('479', '乌兰浩特市', '478', '152201');
INSERT INTO `car_region` VALUES ('480', '阿尔山市', '478', '152202');
INSERT INTO `car_region` VALUES ('481', '科尔沁右翼前旗', '478', '152221');
INSERT INTO `car_region` VALUES ('482', '科尔沁右翼中旗', '478', '152222');
INSERT INTO `car_region` VALUES ('483', '扎赉特旗', '478', '152223');
INSERT INTO `car_region` VALUES ('484', '突泉县', '478', '152224');
INSERT INTO `car_region` VALUES ('485', '锡林郭勒盟', '380', '152500');
INSERT INTO `car_region` VALUES ('486', '二连浩特市', '485', '152501');
INSERT INTO `car_region` VALUES ('487', '锡林浩特市', '485', '152502');
INSERT INTO `car_region` VALUES ('488', '阿巴嘎旗', '485', '152522');
INSERT INTO `car_region` VALUES ('489', '苏尼特左旗', '485', '152523');
INSERT INTO `car_region` VALUES ('490', '苏尼特右旗', '485', '152524');
INSERT INTO `car_region` VALUES ('491', '东乌珠穆沁旗', '485', '152525');
INSERT INTO `car_region` VALUES ('492', '西乌珠穆沁旗', '485', '152526');
INSERT INTO `car_region` VALUES ('493', '太仆寺旗', '485', '152527');
INSERT INTO `car_region` VALUES ('494', '镶黄旗', '485', '152528');
INSERT INTO `car_region` VALUES ('495', '正镶白旗', '485', '152529');
INSERT INTO `car_region` VALUES ('496', '正蓝旗', '485', '152530');
INSERT INTO `car_region` VALUES ('497', '多伦县', '485', '152531');
INSERT INTO `car_region` VALUES ('498', '阿拉善盟', '380', '152900');
INSERT INTO `car_region` VALUES ('499', '阿拉善左旗', '498', '152921');
INSERT INTO `car_region` VALUES ('500', '阿拉善右旗', '498', '152922');
INSERT INTO `car_region` VALUES ('501', '额济纳旗', '498', '152923');
INSERT INTO `car_region` VALUES ('502', '辽宁省', '0', '210000');
INSERT INTO `car_region` VALUES ('503', '沈阳市', '502', '210100');
INSERT INTO `car_region` VALUES ('504', '市辖区', '503', '210101');
INSERT INTO `car_region` VALUES ('505', '和平区', '503', '210102');
INSERT INTO `car_region` VALUES ('506', '沈河区', '503', '210103');
INSERT INTO `car_region` VALUES ('507', '大东区', '503', '210104');
INSERT INTO `car_region` VALUES ('508', '皇姑区', '503', '210105');
INSERT INTO `car_region` VALUES ('509', '铁西区', '503', '210106');
INSERT INTO `car_region` VALUES ('510', '苏家屯区', '503', '210111');
INSERT INTO `car_region` VALUES ('511', '东陵区', '503', '210112');
INSERT INTO `car_region` VALUES ('512', '新城子区', '503', '210113');
INSERT INTO `car_region` VALUES ('513', '于洪区', '503', '210114');
INSERT INTO `car_region` VALUES ('514', '辽中县', '503', '210122');
INSERT INTO `car_region` VALUES ('515', '康平县', '503', '210123');
INSERT INTO `car_region` VALUES ('516', '法库县', '503', '210124');
INSERT INTO `car_region` VALUES ('517', '新民市', '503', '210181');
INSERT INTO `car_region` VALUES ('518', '大连市', '502', '210200');
INSERT INTO `car_region` VALUES ('519', '市辖区', '518', '210201');
INSERT INTO `car_region` VALUES ('520', '中山区', '518', '210202');
INSERT INTO `car_region` VALUES ('521', '西岗区', '518', '210203');
INSERT INTO `car_region` VALUES ('522', '沙河口区', '518', '210204');
INSERT INTO `car_region` VALUES ('523', '甘井子区', '518', '210211');
INSERT INTO `car_region` VALUES ('524', '旅顺口区', '518', '210212');
INSERT INTO `car_region` VALUES ('525', '金州区', '518', '210213');
INSERT INTO `car_region` VALUES ('526', '长海县', '518', '210224');
INSERT INTO `car_region` VALUES ('527', '瓦房店市', '518', '210281');
INSERT INTO `car_region` VALUES ('528', '普兰店市', '518', '210282');
INSERT INTO `car_region` VALUES ('529', '庄河市', '518', '210283');
INSERT INTO `car_region` VALUES ('530', '鞍山市', '502', '210300');
INSERT INTO `car_region` VALUES ('531', '市辖区', '530', '210301');
INSERT INTO `car_region` VALUES ('532', '铁东区', '530', '210302');
INSERT INTO `car_region` VALUES ('533', '铁西区', '530', '210303');
INSERT INTO `car_region` VALUES ('534', '立山区', '530', '210304');
INSERT INTO `car_region` VALUES ('535', '千山区', '530', '210311');
INSERT INTO `car_region` VALUES ('536', '台安县', '530', '210321');
INSERT INTO `car_region` VALUES ('537', '岫岩满族自治县', '530', '210323');
INSERT INTO `car_region` VALUES ('538', '海城市', '530', '210381');
INSERT INTO `car_region` VALUES ('539', '抚顺市', '502', '210400');
INSERT INTO `car_region` VALUES ('540', '市辖区', '539', '210401');
INSERT INTO `car_region` VALUES ('541', '新抚区', '539', '210402');
INSERT INTO `car_region` VALUES ('542', '东洲区', '539', '210403');
INSERT INTO `car_region` VALUES ('543', '望花区', '539', '210404');
INSERT INTO `car_region` VALUES ('544', '顺城区', '539', '210411');
INSERT INTO `car_region` VALUES ('545', '抚顺县', '539', '210421');
INSERT INTO `car_region` VALUES ('546', '新宾满族自治县', '539', '210422');
INSERT INTO `car_region` VALUES ('547', '清原满族自治县', '539', '210423');
INSERT INTO `car_region` VALUES ('548', '本溪市', '502', '210500');
INSERT INTO `car_region` VALUES ('549', '市辖区', '548', '210501');
INSERT INTO `car_region` VALUES ('550', '平山区', '548', '210502');
INSERT INTO `car_region` VALUES ('551', '溪湖区', '548', '210503');
INSERT INTO `car_region` VALUES ('552', '明山区', '548', '210504');
INSERT INTO `car_region` VALUES ('553', '南芬区', '548', '210505');
INSERT INTO `car_region` VALUES ('554', '本溪满族自治县', '548', '210521');
INSERT INTO `car_region` VALUES ('555', '桓仁满族自治县', '548', '210522');
INSERT INTO `car_region` VALUES ('556', '丹东市', '502', '210600');
INSERT INTO `car_region` VALUES ('557', '市辖区', '556', '210601');
INSERT INTO `car_region` VALUES ('558', '元宝区', '556', '210602');
INSERT INTO `car_region` VALUES ('559', '振兴区', '556', '210603');
INSERT INTO `car_region` VALUES ('560', '振安区', '556', '210604');
INSERT INTO `car_region` VALUES ('561', '宽甸满族自治县', '556', '210624');
INSERT INTO `car_region` VALUES ('562', '东港市', '556', '210681');
INSERT INTO `car_region` VALUES ('563', '凤城市', '556', '210682');
INSERT INTO `car_region` VALUES ('564', '锦州市', '502', '210700');
INSERT INTO `car_region` VALUES ('565', '市辖区', '564', '210701');
INSERT INTO `car_region` VALUES ('566', '古塔区', '564', '210702');
INSERT INTO `car_region` VALUES ('567', '凌河区', '564', '210703');
INSERT INTO `car_region` VALUES ('568', '太和区', '564', '210711');
INSERT INTO `car_region` VALUES ('569', '黑山县', '564', '210726');
INSERT INTO `car_region` VALUES ('570', '义　县', '564', '210727');
INSERT INTO `car_region` VALUES ('571', '凌海市', '564', '210781');
INSERT INTO `car_region` VALUES ('572', '北宁市', '564', '210782');
INSERT INTO `car_region` VALUES ('573', '营口市', '502', '210800');
INSERT INTO `car_region` VALUES ('574', '市辖区', '573', '210801');
INSERT INTO `car_region` VALUES ('575', '站前区', '573', '210802');
INSERT INTO `car_region` VALUES ('576', '西市区', '573', '210803');
INSERT INTO `car_region` VALUES ('577', '鲅鱼圈区', '573', '210804');
INSERT INTO `car_region` VALUES ('578', '老边区', '573', '210811');
INSERT INTO `car_region` VALUES ('579', '盖州市', '573', '210881');
INSERT INTO `car_region` VALUES ('580', '大石桥市', '573', '210882');
INSERT INTO `car_region` VALUES ('581', '阜新市', '502', '210900');
INSERT INTO `car_region` VALUES ('582', '市辖区', '581', '210901');
INSERT INTO `car_region` VALUES ('583', '海州区', '581', '210902');
INSERT INTO `car_region` VALUES ('584', '新邱区', '581', '210903');
INSERT INTO `car_region` VALUES ('585', '太平区', '581', '210904');
INSERT INTO `car_region` VALUES ('586', '清河门区', '581', '210905');
INSERT INTO `car_region` VALUES ('587', '细河区', '581', '210911');
INSERT INTO `car_region` VALUES ('588', '阜新蒙古族自治县', '581', '210921');
INSERT INTO `car_region` VALUES ('589', '彰武县', '581', '210922');
INSERT INTO `car_region` VALUES ('590', '辽阳市', '502', '211000');
INSERT INTO `car_region` VALUES ('591', '市辖区', '590', '211001');
INSERT INTO `car_region` VALUES ('592', '白塔区', '590', '211002');
INSERT INTO `car_region` VALUES ('593', '文圣区', '590', '211003');
INSERT INTO `car_region` VALUES ('594', '宏伟区', '590', '211004');
INSERT INTO `car_region` VALUES ('595', '弓长岭区', '590', '211005');
INSERT INTO `car_region` VALUES ('596', '太子河区', '590', '211011');
INSERT INTO `car_region` VALUES ('597', '辽阳县', '590', '211021');
INSERT INTO `car_region` VALUES ('598', '灯塔市', '590', '211081');
INSERT INTO `car_region` VALUES ('599', '盘锦市', '502', '211100');
INSERT INTO `car_region` VALUES ('600', '市辖区', '599', '211101');
INSERT INTO `car_region` VALUES ('601', '双台子区', '599', '211102');
INSERT INTO `car_region` VALUES ('602', '兴隆台区', '599', '211103');
INSERT INTO `car_region` VALUES ('603', '大洼县', '599', '211121');
INSERT INTO `car_region` VALUES ('604', '盘山县', '599', '211122');
INSERT INTO `car_region` VALUES ('605', '铁岭市', '502', '211200');
INSERT INTO `car_region` VALUES ('606', '市辖区', '605', '211201');
INSERT INTO `car_region` VALUES ('607', '银州区', '605', '211202');
INSERT INTO `car_region` VALUES ('608', '清河区', '605', '211204');
INSERT INTO `car_region` VALUES ('609', '铁岭县', '605', '211221');
INSERT INTO `car_region` VALUES ('610', '西丰县', '605', '211223');
INSERT INTO `car_region` VALUES ('611', '昌图县', '605', '211224');
INSERT INTO `car_region` VALUES ('612', '调兵山市', '605', '211281');
INSERT INTO `car_region` VALUES ('613', '开原市', '605', '211282');
INSERT INTO `car_region` VALUES ('614', '朝阳市', '502', '211300');
INSERT INTO `car_region` VALUES ('615', '市辖区', '614', '211301');
INSERT INTO `car_region` VALUES ('616', '双塔区', '614', '211302');
INSERT INTO `car_region` VALUES ('617', '龙城区', '614', '211303');
INSERT INTO `car_region` VALUES ('618', '朝阳县', '614', '211321');
INSERT INTO `car_region` VALUES ('619', '建平县', '614', '211322');
INSERT INTO `car_region` VALUES ('620', '喀喇沁左翼蒙古族自治县', '614', '211324');
INSERT INTO `car_region` VALUES ('621', '北票市', '614', '211381');
INSERT INTO `car_region` VALUES ('622', '凌源市', '614', '211382');
INSERT INTO `car_region` VALUES ('623', '葫芦岛市', '502', '211400');
INSERT INTO `car_region` VALUES ('624', '市辖区', '623', '211401');
INSERT INTO `car_region` VALUES ('625', '连山区', '623', '211402');
INSERT INTO `car_region` VALUES ('626', '龙港区', '623', '211403');
INSERT INTO `car_region` VALUES ('627', '南票区', '623', '211404');
INSERT INTO `car_region` VALUES ('628', '绥中县', '623', '211421');
INSERT INTO `car_region` VALUES ('629', '建昌县', '623', '211422');
INSERT INTO `car_region` VALUES ('630', '兴城市', '623', '211481');
INSERT INTO `car_region` VALUES ('631', '吉林省', '0', '220000');
INSERT INTO `car_region` VALUES ('632', '长春市', '631', '220100');
INSERT INTO `car_region` VALUES ('633', '市辖区', '632', '220101');
INSERT INTO `car_region` VALUES ('634', '南关区', '632', '220102');
INSERT INTO `car_region` VALUES ('635', '宽城区', '632', '220103');
INSERT INTO `car_region` VALUES ('636', '朝阳区', '632', '220104');
INSERT INTO `car_region` VALUES ('637', '二道区', '632', '220105');
INSERT INTO `car_region` VALUES ('638', '绿园区', '632', '220106');
INSERT INTO `car_region` VALUES ('639', '双阳区', '632', '220112');
INSERT INTO `car_region` VALUES ('640', '农安县', '632', '220122');
INSERT INTO `car_region` VALUES ('641', '九台市', '632', '220181');
INSERT INTO `car_region` VALUES ('642', '榆树市', '632', '220182');
INSERT INTO `car_region` VALUES ('643', '德惠市', '632', '220183');
INSERT INTO `car_region` VALUES ('644', '吉林市', '631', '220200');
INSERT INTO `car_region` VALUES ('645', '市辖区', '644', '220201');
INSERT INTO `car_region` VALUES ('646', '昌邑区', '644', '220202');
INSERT INTO `car_region` VALUES ('647', '龙潭区', '644', '220203');
INSERT INTO `car_region` VALUES ('648', '船营区', '644', '220204');
INSERT INTO `car_region` VALUES ('649', '丰满区', '644', '220211');
INSERT INTO `car_region` VALUES ('650', '永吉县', '644', '220221');
INSERT INTO `car_region` VALUES ('651', '蛟河市', '644', '220281');
INSERT INTO `car_region` VALUES ('652', '桦甸市', '644', '220282');
INSERT INTO `car_region` VALUES ('653', '舒兰市', '644', '220283');
INSERT INTO `car_region` VALUES ('654', '磐石市', '644', '220284');
INSERT INTO `car_region` VALUES ('655', '四平市', '631', '220300');
INSERT INTO `car_region` VALUES ('656', '市辖区', '655', '220301');
INSERT INTO `car_region` VALUES ('657', '铁西区', '655', '220302');
INSERT INTO `car_region` VALUES ('658', '铁东区', '655', '220303');
INSERT INTO `car_region` VALUES ('659', '梨树县', '655', '220322');
INSERT INTO `car_region` VALUES ('660', '伊通满族自治县', '655', '220323');
INSERT INTO `car_region` VALUES ('661', '公主岭市', '655', '220381');
INSERT INTO `car_region` VALUES ('662', '双辽市', '655', '220382');
INSERT INTO `car_region` VALUES ('663', '辽源市', '631', '220400');
INSERT INTO `car_region` VALUES ('664', '市辖区', '663', '220401');
INSERT INTO `car_region` VALUES ('665', '龙山区', '663', '220402');
INSERT INTO `car_region` VALUES ('666', '西安区', '663', '220403');
INSERT INTO `car_region` VALUES ('667', '东丰县', '663', '220421');
INSERT INTO `car_region` VALUES ('668', '东辽县', '663', '220422');
INSERT INTO `car_region` VALUES ('669', '通化市', '631', '220500');
INSERT INTO `car_region` VALUES ('670', '市辖区', '669', '220501');
INSERT INTO `car_region` VALUES ('671', '东昌区', '669', '220502');
INSERT INTO `car_region` VALUES ('672', '二道江区', '669', '220503');
INSERT INTO `car_region` VALUES ('673', '通化县', '669', '220521');
INSERT INTO `car_region` VALUES ('674', '辉南县', '669', '220523');
INSERT INTO `car_region` VALUES ('675', '柳河县', '669', '220524');
INSERT INTO `car_region` VALUES ('676', '梅河口市', '669', '220581');
INSERT INTO `car_region` VALUES ('677', '集安市', '669', '220582');
INSERT INTO `car_region` VALUES ('678', '白山市', '631', '220600');
INSERT INTO `car_region` VALUES ('679', '市辖区', '678', '220601');
INSERT INTO `car_region` VALUES ('680', '八道江区', '678', '220602');
INSERT INTO `car_region` VALUES ('681', '抚松县', '678', '220621');
INSERT INTO `car_region` VALUES ('682', '靖宇县', '678', '220622');
INSERT INTO `car_region` VALUES ('683', '长白朝鲜族自治县', '678', '220623');
INSERT INTO `car_region` VALUES ('684', '江源县', '678', '220625');
INSERT INTO `car_region` VALUES ('685', '临江市', '678', '220681');
INSERT INTO `car_region` VALUES ('686', '松原市', '631', '220700');
INSERT INTO `car_region` VALUES ('687', '市辖区', '686', '220701');
INSERT INTO `car_region` VALUES ('688', '宁江区', '686', '220702');
INSERT INTO `car_region` VALUES ('689', '前郭尔罗斯蒙古族自治县', '686', '220721');
INSERT INTO `car_region` VALUES ('690', '长岭县', '686', '220722');
INSERT INTO `car_region` VALUES ('691', '乾安县', '686', '220723');
INSERT INTO `car_region` VALUES ('692', '扶余县', '686', '220724');
INSERT INTO `car_region` VALUES ('693', '白城市', '631', '220800');
INSERT INTO `car_region` VALUES ('694', '市辖区', '693', '220801');
INSERT INTO `car_region` VALUES ('695', '洮北区', '693', '220802');
INSERT INTO `car_region` VALUES ('696', '镇赉县', '693', '220821');
INSERT INTO `car_region` VALUES ('697', '通榆县', '693', '220822');
INSERT INTO `car_region` VALUES ('698', '洮南市', '693', '220881');
INSERT INTO `car_region` VALUES ('699', '大安市', '693', '220882');
INSERT INTO `car_region` VALUES ('700', '延边朝鲜族自治州', '631', '222400');
INSERT INTO `car_region` VALUES ('701', '延吉市', '700', '222401');
INSERT INTO `car_region` VALUES ('702', '图们市', '700', '222402');
INSERT INTO `car_region` VALUES ('703', '敦化市', '700', '222403');
INSERT INTO `car_region` VALUES ('704', '珲春市', '700', '222404');
INSERT INTO `car_region` VALUES ('705', '龙井市', '700', '222405');
INSERT INTO `car_region` VALUES ('706', '和龙市', '700', '222406');
INSERT INTO `car_region` VALUES ('707', '汪清县', '700', '222424');
INSERT INTO `car_region` VALUES ('708', '安图县', '700', '222426');
INSERT INTO `car_region` VALUES ('709', '黑龙江省', '0', '230000');
INSERT INTO `car_region` VALUES ('710', '哈尔滨市', '709', '230100');
INSERT INTO `car_region` VALUES ('711', '市辖区', '710', '230101');
INSERT INTO `car_region` VALUES ('712', '道里区', '710', '230102');
INSERT INTO `car_region` VALUES ('713', '南岗区', '710', '230103');
INSERT INTO `car_region` VALUES ('714', '道外区', '710', '230104');
INSERT INTO `car_region` VALUES ('715', '香坊区', '710', '230106');
INSERT INTO `car_region` VALUES ('716', '动力区', '710', '230107');
INSERT INTO `car_region` VALUES ('717', '平房区', '710', '230108');
INSERT INTO `car_region` VALUES ('718', '松北区', '710', '230109');
INSERT INTO `car_region` VALUES ('719', '呼兰区', '710', '230111');
INSERT INTO `car_region` VALUES ('720', '依兰县', '710', '230123');
INSERT INTO `car_region` VALUES ('721', '方正县', '710', '230124');
INSERT INTO `car_region` VALUES ('722', '宾　县', '710', '230125');
INSERT INTO `car_region` VALUES ('723', '巴彦县', '710', '230126');
INSERT INTO `car_region` VALUES ('724', '木兰县', '710', '230127');
INSERT INTO `car_region` VALUES ('725', '通河县', '710', '230128');
INSERT INTO `car_region` VALUES ('726', '延寿县', '710', '230129');
INSERT INTO `car_region` VALUES ('727', '阿城市', '710', '230181');
INSERT INTO `car_region` VALUES ('728', '双城市', '710', '230182');
INSERT INTO `car_region` VALUES ('729', '尚志市', '710', '230183');
INSERT INTO `car_region` VALUES ('730', '五常市', '710', '230184');
INSERT INTO `car_region` VALUES ('731', '齐齐哈尔市', '709', '230200');
INSERT INTO `car_region` VALUES ('732', '市辖区', '731', '230201');
INSERT INTO `car_region` VALUES ('733', '龙沙区', '731', '230202');
INSERT INTO `car_region` VALUES ('734', '建华区', '731', '230203');
INSERT INTO `car_region` VALUES ('735', '铁锋区', '731', '230204');
INSERT INTO `car_region` VALUES ('736', '昂昂溪区', '731', '230205');
INSERT INTO `car_region` VALUES ('737', '富拉尔基区', '731', '230206');
INSERT INTO `car_region` VALUES ('738', '碾子山区', '731', '230207');
INSERT INTO `car_region` VALUES ('739', '梅里斯达斡尔族区', '731', '230208');
INSERT INTO `car_region` VALUES ('740', '龙江县', '731', '230221');
INSERT INTO `car_region` VALUES ('741', '依安县', '731', '230223');
INSERT INTO `car_region` VALUES ('742', '泰来县', '731', '230224');
INSERT INTO `car_region` VALUES ('743', '甘南县', '731', '230225');
INSERT INTO `car_region` VALUES ('744', '富裕县', '731', '230227');
INSERT INTO `car_region` VALUES ('745', '克山县', '731', '230229');
INSERT INTO `car_region` VALUES ('746', '克东县', '731', '230230');
INSERT INTO `car_region` VALUES ('747', '拜泉县', '731', '230231');
INSERT INTO `car_region` VALUES ('748', '讷河市', '731', '230281');
INSERT INTO `car_region` VALUES ('749', '鸡西市', '709', '230300');
INSERT INTO `car_region` VALUES ('750', '市辖区', '749', '230301');
INSERT INTO `car_region` VALUES ('751', '鸡冠区', '749', '230302');
INSERT INTO `car_region` VALUES ('752', '恒山区', '749', '230303');
INSERT INTO `car_region` VALUES ('753', '滴道区', '749', '230304');
INSERT INTO `car_region` VALUES ('754', '梨树区', '749', '230305');
INSERT INTO `car_region` VALUES ('755', '城子河区', '749', '230306');
INSERT INTO `car_region` VALUES ('756', '麻山区', '749', '230307');
INSERT INTO `car_region` VALUES ('757', '鸡东县', '749', '230321');
INSERT INTO `car_region` VALUES ('758', '虎林市', '749', '230381');
INSERT INTO `car_region` VALUES ('759', '密山市', '749', '230382');
INSERT INTO `car_region` VALUES ('760', '鹤岗市', '709', '230400');
INSERT INTO `car_region` VALUES ('761', '市辖区', '760', '230401');
INSERT INTO `car_region` VALUES ('762', '向阳区', '760', '230402');
INSERT INTO `car_region` VALUES ('763', '工农区', '760', '230403');
INSERT INTO `car_region` VALUES ('764', '南山区', '760', '230404');
INSERT INTO `car_region` VALUES ('765', '兴安区', '760', '230405');
INSERT INTO `car_region` VALUES ('766', '东山区', '760', '230406');
INSERT INTO `car_region` VALUES ('767', '兴山区', '760', '230407');
INSERT INTO `car_region` VALUES ('768', '萝北县', '760', '230421');
INSERT INTO `car_region` VALUES ('769', '绥滨县', '760', '230422');
INSERT INTO `car_region` VALUES ('770', '双鸭山市', '709', '230500');
INSERT INTO `car_region` VALUES ('771', '市辖区', '770', '230501');
INSERT INTO `car_region` VALUES ('772', '尖山区', '770', '230502');
INSERT INTO `car_region` VALUES ('773', '岭东区', '770', '230503');
INSERT INTO `car_region` VALUES ('774', '四方台区', '770', '230505');
INSERT INTO `car_region` VALUES ('775', '宝山区', '770', '230506');
INSERT INTO `car_region` VALUES ('776', '集贤县', '770', '230521');
INSERT INTO `car_region` VALUES ('777', '友谊县', '770', '230522');
INSERT INTO `car_region` VALUES ('778', '宝清县', '770', '230523');
INSERT INTO `car_region` VALUES ('779', '饶河县', '770', '230524');
INSERT INTO `car_region` VALUES ('780', '大庆市', '709', '230600');
INSERT INTO `car_region` VALUES ('781', '市辖区', '780', '230601');
INSERT INTO `car_region` VALUES ('782', '萨尔图区', '780', '230602');
INSERT INTO `car_region` VALUES ('783', '龙凤区', '780', '230603');
INSERT INTO `car_region` VALUES ('784', '让胡路区', '780', '230604');
INSERT INTO `car_region` VALUES ('785', '红岗区', '780', '230605');
INSERT INTO `car_region` VALUES ('786', '大同区', '780', '230606');
INSERT INTO `car_region` VALUES ('787', '肇州县', '780', '230621');
INSERT INTO `car_region` VALUES ('788', '肇源县', '780', '230622');
INSERT INTO `car_region` VALUES ('789', '林甸县', '780', '230623');
INSERT INTO `car_region` VALUES ('790', '杜尔伯特蒙古族自治县', '780', '230624');
INSERT INTO `car_region` VALUES ('791', '伊春市', '709', '230700');
INSERT INTO `car_region` VALUES ('792', '市辖区', '791', '230701');
INSERT INTO `car_region` VALUES ('793', '伊春区', '791', '230702');
INSERT INTO `car_region` VALUES ('794', '南岔区', '791', '230703');
INSERT INTO `car_region` VALUES ('795', '友好区', '791', '230704');
INSERT INTO `car_region` VALUES ('796', '西林区', '791', '230705');
INSERT INTO `car_region` VALUES ('797', '翠峦区', '791', '230706');
INSERT INTO `car_region` VALUES ('798', '新青区', '791', '230707');
INSERT INTO `car_region` VALUES ('799', '美溪区', '791', '230708');
INSERT INTO `car_region` VALUES ('800', '金山屯区', '791', '230709');
INSERT INTO `car_region` VALUES ('801', '五营区', '791', '230710');
INSERT INTO `car_region` VALUES ('802', '乌马河区', '791', '230711');
INSERT INTO `car_region` VALUES ('803', '汤旺河区', '791', '230712');
INSERT INTO `car_region` VALUES ('804', '带岭区', '791', '230713');
INSERT INTO `car_region` VALUES ('805', '乌伊岭区', '791', '230714');
INSERT INTO `car_region` VALUES ('806', '红星区', '791', '230715');
INSERT INTO `car_region` VALUES ('807', '上甘岭区', '791', '230716');
INSERT INTO `car_region` VALUES ('808', '嘉荫县', '791', '230722');
INSERT INTO `car_region` VALUES ('809', '铁力市', '791', '230781');
INSERT INTO `car_region` VALUES ('810', '佳木斯市', '709', '230800');
INSERT INTO `car_region` VALUES ('811', '市辖区', '810', '230801');
INSERT INTO `car_region` VALUES ('812', '永红区', '810', '230802');
INSERT INTO `car_region` VALUES ('813', '向阳区', '810', '230803');
INSERT INTO `car_region` VALUES ('814', '前进区', '810', '230804');
INSERT INTO `car_region` VALUES ('815', '东风区', '810', '230805');
INSERT INTO `car_region` VALUES ('816', '郊　区', '810', '230811');
INSERT INTO `car_region` VALUES ('817', '桦南县', '810', '230822');
INSERT INTO `car_region` VALUES ('818', '桦川县', '810', '230826');
INSERT INTO `car_region` VALUES ('819', '汤原县', '810', '230828');
INSERT INTO `car_region` VALUES ('820', '抚远县', '810', '230833');
INSERT INTO `car_region` VALUES ('821', '同江市', '810', '230881');
INSERT INTO `car_region` VALUES ('822', '富锦市', '810', '230882');
INSERT INTO `car_region` VALUES ('823', '七台河市', '709', '230900');
INSERT INTO `car_region` VALUES ('824', '市辖区', '823', '230901');
INSERT INTO `car_region` VALUES ('825', '新兴区', '823', '230902');
INSERT INTO `car_region` VALUES ('826', '桃山区', '823', '230903');
INSERT INTO `car_region` VALUES ('827', '茄子河区', '823', '230904');
INSERT INTO `car_region` VALUES ('828', '勃利县', '823', '230921');
INSERT INTO `car_region` VALUES ('829', '牡丹江市', '709', '231000');
INSERT INTO `car_region` VALUES ('830', '市辖区', '829', '231001');
INSERT INTO `car_region` VALUES ('831', '东安区', '829', '231002');
INSERT INTO `car_region` VALUES ('832', '阳明区', '829', '231003');
INSERT INTO `car_region` VALUES ('833', '爱民区', '829', '231004');
INSERT INTO `car_region` VALUES ('834', '西安区', '829', '231005');
INSERT INTO `car_region` VALUES ('835', '东宁县', '829', '231024');
INSERT INTO `car_region` VALUES ('836', '林口县', '829', '231025');
INSERT INTO `car_region` VALUES ('837', '绥芬河市', '829', '231081');
INSERT INTO `car_region` VALUES ('838', '海林市', '829', '231083');
INSERT INTO `car_region` VALUES ('839', '宁安市', '829', '231084');
INSERT INTO `car_region` VALUES ('840', '穆棱市', '829', '231085');
INSERT INTO `car_region` VALUES ('841', '黑河市', '709', '231100');
INSERT INTO `car_region` VALUES ('842', '市辖区', '841', '231101');
INSERT INTO `car_region` VALUES ('843', '爱辉区', '841', '231102');
INSERT INTO `car_region` VALUES ('844', '嫩江县', '841', '231121');
INSERT INTO `car_region` VALUES ('845', '逊克县', '841', '231123');
INSERT INTO `car_region` VALUES ('846', '孙吴县', '841', '231124');
INSERT INTO `car_region` VALUES ('847', '北安市', '841', '231181');
INSERT INTO `car_region` VALUES ('848', '五大连池市', '841', '231182');
INSERT INTO `car_region` VALUES ('849', '绥化市', '709', '231200');
INSERT INTO `car_region` VALUES ('850', '市辖区', '849', '231201');
INSERT INTO `car_region` VALUES ('851', '北林区', '849', '231202');
INSERT INTO `car_region` VALUES ('852', '望奎县', '849', '231221');
INSERT INTO `car_region` VALUES ('853', '兰西县', '849', '231222');
INSERT INTO `car_region` VALUES ('854', '青冈县', '849', '231223');
INSERT INTO `car_region` VALUES ('855', '庆安县', '849', '231224');
INSERT INTO `car_region` VALUES ('856', '明水县', '849', '231225');
INSERT INTO `car_region` VALUES ('857', '绥棱县', '849', '231226');
INSERT INTO `car_region` VALUES ('858', '安达市', '849', '231281');
INSERT INTO `car_region` VALUES ('859', '肇东市', '849', '231282');
INSERT INTO `car_region` VALUES ('860', '海伦市', '849', '231283');
INSERT INTO `car_region` VALUES ('861', '大兴安岭地区', '709', '232700');
INSERT INTO `car_region` VALUES ('862', '呼玛县', '861', '232721');
INSERT INTO `car_region` VALUES ('863', '塔河县', '861', '232722');
INSERT INTO `car_region` VALUES ('864', '漠河县', '861', '232723');
INSERT INTO `car_region` VALUES ('865', '上海市', '0', '310000');
INSERT INTO `car_region` VALUES ('866', '市辖区', '865', '310100');
INSERT INTO `car_region` VALUES ('867', '黄浦区', '866', '310101');
INSERT INTO `car_region` VALUES ('868', '卢湾区', '866', '310103');
INSERT INTO `car_region` VALUES ('869', '徐汇区', '866', '310104');
INSERT INTO `car_region` VALUES ('870', '长宁区', '866', '310105');
INSERT INTO `car_region` VALUES ('871', '静安区', '866', '310106');
INSERT INTO `car_region` VALUES ('872', '普陀区', '866', '310107');
INSERT INTO `car_region` VALUES ('873', '闸北区', '866', '310108');
INSERT INTO `car_region` VALUES ('874', '虹口区', '866', '310109');
INSERT INTO `car_region` VALUES ('875', '杨浦区', '866', '310110');
INSERT INTO `car_region` VALUES ('876', '闵行区', '866', '310112');
INSERT INTO `car_region` VALUES ('877', '宝山区', '866', '310113');
INSERT INTO `car_region` VALUES ('878', '嘉定区', '866', '310114');
INSERT INTO `car_region` VALUES ('879', '浦东新区', '866', '310115');
INSERT INTO `car_region` VALUES ('880', '金山区', '866', '310116');
INSERT INTO `car_region` VALUES ('881', '松江区', '866', '310117');
INSERT INTO `car_region` VALUES ('882', '青浦区', '866', '310118');
INSERT INTO `car_region` VALUES ('883', '南汇区', '866', '310119');
INSERT INTO `car_region` VALUES ('884', '奉贤区', '866', '310120');
INSERT INTO `car_region` VALUES ('885', '县', '865', '310200');
INSERT INTO `car_region` VALUES ('886', '崇明县', '885', '310230');
INSERT INTO `car_region` VALUES ('887', '江苏省', '0', '320000');
INSERT INTO `car_region` VALUES ('888', '南京市', '887', '320100');
INSERT INTO `car_region` VALUES ('889', '市辖区', '888', '320101');
INSERT INTO `car_region` VALUES ('890', '玄武区', '888', '320102');
INSERT INTO `car_region` VALUES ('891', '白下区', '888', '320103');
INSERT INTO `car_region` VALUES ('892', '秦淮区', '888', '320104');
INSERT INTO `car_region` VALUES ('893', '建邺区', '888', '320105');
INSERT INTO `car_region` VALUES ('894', '鼓楼区', '888', '320106');
INSERT INTO `car_region` VALUES ('895', '下关区', '888', '320107');
INSERT INTO `car_region` VALUES ('896', '浦口区', '888', '320111');
INSERT INTO `car_region` VALUES ('897', '栖霞区', '888', '320113');
INSERT INTO `car_region` VALUES ('898', '雨花台区', '888', '320114');
INSERT INTO `car_region` VALUES ('899', '江宁区', '888', '320115');
INSERT INTO `car_region` VALUES ('900', '六合区', '888', '320116');
INSERT INTO `car_region` VALUES ('901', '溧水县', '888', '320124');
INSERT INTO `car_region` VALUES ('902', '高淳县', '888', '320125');
INSERT INTO `car_region` VALUES ('903', '无锡市', '887', '320200');
INSERT INTO `car_region` VALUES ('904', '市辖区', '903', '320201');
INSERT INTO `car_region` VALUES ('905', '崇安区', '903', '320202');
INSERT INTO `car_region` VALUES ('906', '南长区', '903', '320203');
INSERT INTO `car_region` VALUES ('907', '北塘区', '903', '320204');
INSERT INTO `car_region` VALUES ('908', '锡山区', '903', '320205');
INSERT INTO `car_region` VALUES ('909', '惠山区', '903', '320206');
INSERT INTO `car_region` VALUES ('910', '滨湖区', '903', '320211');
INSERT INTO `car_region` VALUES ('911', '江阴市', '903', '320281');
INSERT INTO `car_region` VALUES ('912', '宜兴市', '903', '320282');
INSERT INTO `car_region` VALUES ('913', '徐州市', '887', '320300');
INSERT INTO `car_region` VALUES ('914', '市辖区', '913', '320301');
INSERT INTO `car_region` VALUES ('915', '鼓楼区', '913', '320302');
INSERT INTO `car_region` VALUES ('916', '云龙区', '913', '320303');
INSERT INTO `car_region` VALUES ('917', '九里区', '913', '320304');
INSERT INTO `car_region` VALUES ('918', '贾汪区', '913', '320305');
INSERT INTO `car_region` VALUES ('919', '泉山区', '913', '320311');
INSERT INTO `car_region` VALUES ('920', '丰　县', '913', '320321');
INSERT INTO `car_region` VALUES ('921', '沛　县', '913', '320322');
INSERT INTO `car_region` VALUES ('922', '铜山县', '913', '320323');
INSERT INTO `car_region` VALUES ('923', '睢宁县', '913', '320324');
INSERT INTO `car_region` VALUES ('924', '新沂市', '913', '320381');
INSERT INTO `car_region` VALUES ('925', '邳州市', '913', '320382');
INSERT INTO `car_region` VALUES ('926', '常州市', '887', '320400');
INSERT INTO `car_region` VALUES ('927', '市辖区', '926', '320401');
INSERT INTO `car_region` VALUES ('928', '天宁区', '926', '320402');
INSERT INTO `car_region` VALUES ('929', '钟楼区', '926', '320404');
INSERT INTO `car_region` VALUES ('930', '戚墅堰区', '926', '320405');
INSERT INTO `car_region` VALUES ('931', '新北区', '926', '320411');
INSERT INTO `car_region` VALUES ('932', '武进区', '926', '320412');
INSERT INTO `car_region` VALUES ('933', '溧阳市', '926', '320481');
INSERT INTO `car_region` VALUES ('934', '金坛市', '926', '320482');
INSERT INTO `car_region` VALUES ('935', '苏州市', '887', '320500');
INSERT INTO `car_region` VALUES ('936', '市辖区', '935', '320501');
INSERT INTO `car_region` VALUES ('937', '沧浪区', '935', '320502');
INSERT INTO `car_region` VALUES ('938', '平江区', '935', '320503');
INSERT INTO `car_region` VALUES ('939', '金阊区', '935', '320504');
INSERT INTO `car_region` VALUES ('940', '虎丘区', '935', '320505');
INSERT INTO `car_region` VALUES ('941', '吴中区', '935', '320506');
INSERT INTO `car_region` VALUES ('942', '相城区', '935', '320507');
INSERT INTO `car_region` VALUES ('943', '常熟市', '935', '320581');
INSERT INTO `car_region` VALUES ('944', '张家港市', '935', '320582');
INSERT INTO `car_region` VALUES ('945', '昆山市', '935', '320583');
INSERT INTO `car_region` VALUES ('946', '吴江市', '935', '320584');
INSERT INTO `car_region` VALUES ('947', '太仓市', '935', '320585');
INSERT INTO `car_region` VALUES ('948', '南通市', '887', '320600');
INSERT INTO `car_region` VALUES ('949', '市辖区', '948', '320601');
INSERT INTO `car_region` VALUES ('950', '崇川区', '948', '320602');
INSERT INTO `car_region` VALUES ('951', '港闸区', '948', '320611');
INSERT INTO `car_region` VALUES ('952', '海安县', '948', '320621');
INSERT INTO `car_region` VALUES ('953', '如东县', '948', '320623');
INSERT INTO `car_region` VALUES ('954', '启东市', '948', '320681');
INSERT INTO `car_region` VALUES ('955', '如皋市', '948', '320682');
INSERT INTO `car_region` VALUES ('956', '通州市', '948', '320683');
INSERT INTO `car_region` VALUES ('957', '海门市', '948', '320684');
INSERT INTO `car_region` VALUES ('958', '连云港市', '887', '320700');
INSERT INTO `car_region` VALUES ('959', '市辖区', '958', '320701');
INSERT INTO `car_region` VALUES ('960', '连云区', '958', '320703');
INSERT INTO `car_region` VALUES ('961', '新浦区', '958', '320705');
INSERT INTO `car_region` VALUES ('962', '海州区', '958', '320706');
INSERT INTO `car_region` VALUES ('963', '赣榆县', '958', '320721');
INSERT INTO `car_region` VALUES ('964', '东海县', '958', '320722');
INSERT INTO `car_region` VALUES ('965', '灌云县', '958', '320723');
INSERT INTO `car_region` VALUES ('966', '灌南县', '958', '320724');
INSERT INTO `car_region` VALUES ('967', '淮安市', '887', '320800');
INSERT INTO `car_region` VALUES ('968', '市辖区', '967', '320801');
INSERT INTO `car_region` VALUES ('969', '清河区', '967', '320802');
INSERT INTO `car_region` VALUES ('970', '楚州区', '967', '320803');
INSERT INTO `car_region` VALUES ('971', '淮阴区', '967', '320804');
INSERT INTO `car_region` VALUES ('972', '清浦区', '967', '320811');
INSERT INTO `car_region` VALUES ('973', '涟水县', '967', '320826');
INSERT INTO `car_region` VALUES ('974', '洪泽县', '967', '320829');
INSERT INTO `car_region` VALUES ('975', '盱眙县', '967', '320830');
INSERT INTO `car_region` VALUES ('976', '金湖县', '967', '320831');
INSERT INTO `car_region` VALUES ('977', '盐城市', '887', '320900');
INSERT INTO `car_region` VALUES ('978', '市辖区', '977', '320901');
INSERT INTO `car_region` VALUES ('979', '亭湖区', '977', '320902');
INSERT INTO `car_region` VALUES ('980', '盐都区', '977', '320903');
INSERT INTO `car_region` VALUES ('981', '响水县', '977', '320921');
INSERT INTO `car_region` VALUES ('982', '滨海县', '977', '320922');
INSERT INTO `car_region` VALUES ('983', '阜宁县', '977', '320923');
INSERT INTO `car_region` VALUES ('984', '射阳县', '977', '320924');
INSERT INTO `car_region` VALUES ('985', '建湖县', '977', '320925');
INSERT INTO `car_region` VALUES ('986', '东台市', '977', '320981');
INSERT INTO `car_region` VALUES ('987', '大丰市', '977', '320982');
INSERT INTO `car_region` VALUES ('988', '扬州市', '887', '321000');
INSERT INTO `car_region` VALUES ('989', '市辖区', '988', '321001');
INSERT INTO `car_region` VALUES ('990', '广陵区', '988', '321002');
INSERT INTO `car_region` VALUES ('991', '邗江区', '988', '321003');
INSERT INTO `car_region` VALUES ('992', '郊　区', '988', '321011');
INSERT INTO `car_region` VALUES ('993', '宝应县', '988', '321023');
INSERT INTO `car_region` VALUES ('994', '仪征市', '988', '321081');
INSERT INTO `car_region` VALUES ('995', '高邮市', '988', '321084');
INSERT INTO `car_region` VALUES ('996', '江都市', '988', '321088');
INSERT INTO `car_region` VALUES ('997', '镇江市', '887', '321100');
INSERT INTO `car_region` VALUES ('998', '市辖区', '997', '321101');
INSERT INTO `car_region` VALUES ('999', '京口区', '997', '321102');
INSERT INTO `car_region` VALUES ('1000', '润州区', '997', '321111');
INSERT INTO `car_region` VALUES ('1001', '丹徒区', '997', '321112');
INSERT INTO `car_region` VALUES ('1002', '丹阳市', '997', '321181');
INSERT INTO `car_region` VALUES ('1003', '扬中市', '997', '321182');
INSERT INTO `car_region` VALUES ('1004', '句容市', '997', '321183');
INSERT INTO `car_region` VALUES ('1005', '泰州市', '887', '321200');
INSERT INTO `car_region` VALUES ('1006', '市辖区', '1005', '321201');
INSERT INTO `car_region` VALUES ('1007', '海陵区', '1005', '321202');
INSERT INTO `car_region` VALUES ('1008', '高港区', '1005', '321203');
INSERT INTO `car_region` VALUES ('1009', '兴化市', '1005', '321281');
INSERT INTO `car_region` VALUES ('1010', '靖江市', '1005', '321282');
INSERT INTO `car_region` VALUES ('1011', '泰兴市', '1005', '321283');
INSERT INTO `car_region` VALUES ('1012', '姜堰市', '1005', '321284');
INSERT INTO `car_region` VALUES ('1013', '宿迁市', '887', '321300');
INSERT INTO `car_region` VALUES ('1014', '市辖区', '1013', '321301');
INSERT INTO `car_region` VALUES ('1015', '宿城区', '1013', '321302');
INSERT INTO `car_region` VALUES ('1016', '宿豫区', '1013', '321311');
INSERT INTO `car_region` VALUES ('1017', '沭阳县', '1013', '321322');
INSERT INTO `car_region` VALUES ('1018', '泗阳县', '1013', '321323');
INSERT INTO `car_region` VALUES ('1019', '泗洪县', '1013', '321324');
INSERT INTO `car_region` VALUES ('1020', '浙江省', '0', '330000');
INSERT INTO `car_region` VALUES ('1021', '杭州市', '1020', '330100');
INSERT INTO `car_region` VALUES ('1022', '市辖区', '1021', '330101');
INSERT INTO `car_region` VALUES ('1023', '上城区', '1021', '330102');
INSERT INTO `car_region` VALUES ('1024', '下城区', '1021', '330103');
INSERT INTO `car_region` VALUES ('1025', '江干区', '1021', '330104');
INSERT INTO `car_region` VALUES ('1026', '拱墅区', '1021', '330105');
INSERT INTO `car_region` VALUES ('1027', '西湖区', '1021', '330106');
INSERT INTO `car_region` VALUES ('1028', '滨江区', '1021', '330108');
INSERT INTO `car_region` VALUES ('1029', '萧山区', '1021', '330109');
INSERT INTO `car_region` VALUES ('1030', '余杭区', '1021', '330110');
INSERT INTO `car_region` VALUES ('1031', '桐庐县', '1021', '330122');
INSERT INTO `car_region` VALUES ('1032', '淳安县', '1021', '330127');
INSERT INTO `car_region` VALUES ('1033', '建德市', '1021', '330182');
INSERT INTO `car_region` VALUES ('1034', '富阳市', '1021', '330183');
INSERT INTO `car_region` VALUES ('1035', '临安市', '1021', '330185');
INSERT INTO `car_region` VALUES ('1036', '宁波市', '1020', '330200');
INSERT INTO `car_region` VALUES ('1037', '市辖区', '1036', '330201');
INSERT INTO `car_region` VALUES ('1038', '海曙区', '1036', '330203');
INSERT INTO `car_region` VALUES ('1039', '江东区', '1036', '330204');
INSERT INTO `car_region` VALUES ('1040', '江北区', '1036', '330205');
INSERT INTO `car_region` VALUES ('1041', '北仑区', '1036', '330206');
INSERT INTO `car_region` VALUES ('1042', '镇海区', '1036', '330211');
INSERT INTO `car_region` VALUES ('1043', '鄞州区', '1036', '330212');
INSERT INTO `car_region` VALUES ('1044', '象山县', '1036', '330225');
INSERT INTO `car_region` VALUES ('1045', '宁海县', '1036', '330226');
INSERT INTO `car_region` VALUES ('1046', '余姚市', '1036', '330281');
INSERT INTO `car_region` VALUES ('1047', '慈溪市', '1036', '330282');
INSERT INTO `car_region` VALUES ('1048', '奉化市', '1036', '330283');
INSERT INTO `car_region` VALUES ('1049', '温州市', '1020', '330300');
INSERT INTO `car_region` VALUES ('1050', '市辖区', '1049', '330301');
INSERT INTO `car_region` VALUES ('1051', '鹿城区', '1049', '330302');
INSERT INTO `car_region` VALUES ('1052', '龙湾区', '1049', '330303');
INSERT INTO `car_region` VALUES ('1053', '瓯海区', '1049', '330304');
INSERT INTO `car_region` VALUES ('1054', '洞头县', '1049', '330322');
INSERT INTO `car_region` VALUES ('1055', '永嘉县', '1049', '330324');
INSERT INTO `car_region` VALUES ('1056', '平阳县', '1049', '330326');
INSERT INTO `car_region` VALUES ('1057', '苍南县', '1049', '330327');
INSERT INTO `car_region` VALUES ('1058', '文成县', '1049', '330328');
INSERT INTO `car_region` VALUES ('1059', '泰顺县', '1049', '330329');
INSERT INTO `car_region` VALUES ('1060', '瑞安市', '1049', '330381');
INSERT INTO `car_region` VALUES ('1061', '乐清市', '1049', '330382');
INSERT INTO `car_region` VALUES ('1062', '嘉兴市', '1020', '330400');
INSERT INTO `car_region` VALUES ('1063', '市辖区', '1062', '330401');
INSERT INTO `car_region` VALUES ('1064', '秀城区', '1062', '330402');
INSERT INTO `car_region` VALUES ('1065', '秀洲区', '1062', '330411');
INSERT INTO `car_region` VALUES ('1066', '嘉善县', '1062', '330421');
INSERT INTO `car_region` VALUES ('1067', '海盐县', '1062', '330424');
INSERT INTO `car_region` VALUES ('1068', '海宁市', '1062', '330481');
INSERT INTO `car_region` VALUES ('1069', '平湖市', '1062', '330482');
INSERT INTO `car_region` VALUES ('1070', '桐乡市', '1062', '330483');
INSERT INTO `car_region` VALUES ('1071', '湖州市', '1020', '330500');
INSERT INTO `car_region` VALUES ('1072', '市辖区', '1071', '330501');
INSERT INTO `car_region` VALUES ('1073', '吴兴区', '1071', '330502');
INSERT INTO `car_region` VALUES ('1074', '南浔区', '1071', '330503');
INSERT INTO `car_region` VALUES ('1075', '德清县', '1071', '330521');
INSERT INTO `car_region` VALUES ('1076', '长兴县', '1071', '330522');
INSERT INTO `car_region` VALUES ('1077', '安吉县', '1071', '330523');
INSERT INTO `car_region` VALUES ('1078', '绍兴市', '1020', '330600');
INSERT INTO `car_region` VALUES ('1079', '市辖区', '1078', '330601');
INSERT INTO `car_region` VALUES ('1080', '越城区', '1078', '330602');
INSERT INTO `car_region` VALUES ('1081', '绍兴县', '1078', '330621');
INSERT INTO `car_region` VALUES ('1082', '新昌县', '1078', '330624');
INSERT INTO `car_region` VALUES ('1083', '诸暨市', '1078', '330681');
INSERT INTO `car_region` VALUES ('1084', '上虞市', '1078', '330682');
INSERT INTO `car_region` VALUES ('1085', '嵊州市', '1078', '330683');
INSERT INTO `car_region` VALUES ('1086', '金华市', '1020', '330700');
INSERT INTO `car_region` VALUES ('1087', '市辖区', '1086', '330701');
INSERT INTO `car_region` VALUES ('1088', '婺城区', '1086', '330702');
INSERT INTO `car_region` VALUES ('1089', '金东区', '1086', '330703');
INSERT INTO `car_region` VALUES ('1090', '武义县', '1086', '330723');
INSERT INTO `car_region` VALUES ('1091', '浦江县', '1086', '330726');
INSERT INTO `car_region` VALUES ('1092', '磐安县', '1086', '330727');
INSERT INTO `car_region` VALUES ('1093', '兰溪市', '1086', '330781');
INSERT INTO `car_region` VALUES ('1094', '义乌市', '1086', '330782');
INSERT INTO `car_region` VALUES ('1095', '东阳市', '1086', '330783');
INSERT INTO `car_region` VALUES ('1096', '永康市', '1086', '330784');
INSERT INTO `car_region` VALUES ('1097', '衢州市', '1020', '330800');
INSERT INTO `car_region` VALUES ('1098', '市辖区', '1097', '330801');
INSERT INTO `car_region` VALUES ('1099', '柯城区', '1097', '330802');
INSERT INTO `car_region` VALUES ('1100', '衢江区', '1097', '330803');
INSERT INTO `car_region` VALUES ('1101', '常山县', '1097', '330822');
INSERT INTO `car_region` VALUES ('1102', '开化县', '1097', '330824');
INSERT INTO `car_region` VALUES ('1103', '龙游县', '1097', '330825');
INSERT INTO `car_region` VALUES ('1104', '江山市', '1097', '330881');
INSERT INTO `car_region` VALUES ('1105', '舟山市', '1020', '330900');
INSERT INTO `car_region` VALUES ('1106', '市辖区', '1105', '330901');
INSERT INTO `car_region` VALUES ('1107', '定海区', '1105', '330902');
INSERT INTO `car_region` VALUES ('1108', '普陀区', '1105', '330903');
INSERT INTO `car_region` VALUES ('1109', '岱山县', '1105', '330921');
INSERT INTO `car_region` VALUES ('1110', '嵊泗县', '1105', '330922');
INSERT INTO `car_region` VALUES ('1111', '台州市', '1020', '331000');
INSERT INTO `car_region` VALUES ('1112', '市辖区', '1111', '331001');
INSERT INTO `car_region` VALUES ('1113', '椒江区', '1111', '331002');
INSERT INTO `car_region` VALUES ('1114', '黄岩区', '1111', '331003');
INSERT INTO `car_region` VALUES ('1115', '路桥区', '1111', '331004');
INSERT INTO `car_region` VALUES ('1116', '玉环县', '1111', '331021');
INSERT INTO `car_region` VALUES ('1117', '三门县', '1111', '331022');
INSERT INTO `car_region` VALUES ('1118', '天台县', '1111', '331023');
INSERT INTO `car_region` VALUES ('1119', '仙居县', '1111', '331024');
INSERT INTO `car_region` VALUES ('1120', '温岭市', '1111', '331081');
INSERT INTO `car_region` VALUES ('1121', '临海市', '1111', '331082');
INSERT INTO `car_region` VALUES ('1122', '丽水市', '1020', '331100');
INSERT INTO `car_region` VALUES ('1123', '市辖区', '1122', '331101');
INSERT INTO `car_region` VALUES ('1124', '莲都区', '1122', '331102');
INSERT INTO `car_region` VALUES ('1125', '青田县', '1122', '331121');
INSERT INTO `car_region` VALUES ('1126', '缙云县', '1122', '331122');
INSERT INTO `car_region` VALUES ('1127', '遂昌县', '1122', '331123');
INSERT INTO `car_region` VALUES ('1128', '松阳县', '1122', '331124');
INSERT INTO `car_region` VALUES ('1129', '云和县', '1122', '331125');
INSERT INTO `car_region` VALUES ('1130', '庆元县', '1122', '331126');
INSERT INTO `car_region` VALUES ('1131', '景宁畲族自治县', '1122', '331127');
INSERT INTO `car_region` VALUES ('1132', '龙泉市', '1122', '331181');
INSERT INTO `car_region` VALUES ('1133', '安徽省', '0', '340000');
INSERT INTO `car_region` VALUES ('1134', '合肥市', '1133', '340100');
INSERT INTO `car_region` VALUES ('1135', '市辖区', '1134', '340101');
INSERT INTO `car_region` VALUES ('1136', '瑶海区', '1134', '340102');
INSERT INTO `car_region` VALUES ('1137', '庐阳区', '1134', '340103');
INSERT INTO `car_region` VALUES ('1138', '蜀山区', '1134', '340104');
INSERT INTO `car_region` VALUES ('1139', '包河区', '1134', '340111');
INSERT INTO `car_region` VALUES ('1140', '长丰县', '1134', '340121');
INSERT INTO `car_region` VALUES ('1141', '肥东县', '1134', '340122');
INSERT INTO `car_region` VALUES ('1142', '肥西县', '1134', '340123');
INSERT INTO `car_region` VALUES ('1143', '芜湖市', '1133', '340200');
INSERT INTO `car_region` VALUES ('1144', '市辖区', '1143', '340201');
INSERT INTO `car_region` VALUES ('1145', '镜湖区', '1143', '340202');
INSERT INTO `car_region` VALUES ('1146', '马塘区', '1143', '340203');
INSERT INTO `car_region` VALUES ('1147', '新芜区', '1143', '340204');
INSERT INTO `car_region` VALUES ('1148', '鸠江区', '1143', '340207');
INSERT INTO `car_region` VALUES ('1149', '芜湖县', '1143', '340221');
INSERT INTO `car_region` VALUES ('1150', '繁昌县', '1143', '340222');
INSERT INTO `car_region` VALUES ('1151', '南陵县', '1143', '340223');
INSERT INTO `car_region` VALUES ('1152', '蚌埠市', '1133', '340300');
INSERT INTO `car_region` VALUES ('1153', '市辖区', '1152', '340301');
INSERT INTO `car_region` VALUES ('1154', '龙子湖区', '1152', '340302');
INSERT INTO `car_region` VALUES ('1155', '蚌山区', '1152', '340303');
INSERT INTO `car_region` VALUES ('1156', '禹会区', '1152', '340304');
INSERT INTO `car_region` VALUES ('1157', '淮上区', '1152', '340311');
INSERT INTO `car_region` VALUES ('1158', '怀远县', '1152', '340321');
INSERT INTO `car_region` VALUES ('1159', '五河县', '1152', '340322');
INSERT INTO `car_region` VALUES ('1160', '固镇县', '1152', '340323');
INSERT INTO `car_region` VALUES ('1161', '淮南市', '1133', '340400');
INSERT INTO `car_region` VALUES ('1162', '市辖区', '1161', '340401');
INSERT INTO `car_region` VALUES ('1163', '大通区', '1161', '340402');
INSERT INTO `car_region` VALUES ('1164', '田家庵区', '1161', '340403');
INSERT INTO `car_region` VALUES ('1165', '谢家集区', '1161', '340404');
INSERT INTO `car_region` VALUES ('1166', '八公山区', '1161', '340405');
INSERT INTO `car_region` VALUES ('1167', '潘集区', '1161', '340406');
INSERT INTO `car_region` VALUES ('1168', '凤台县', '1161', '340421');
INSERT INTO `car_region` VALUES ('1169', '马鞍山市', '1133', '340500');
INSERT INTO `car_region` VALUES ('1170', '市辖区', '1169', '340501');
INSERT INTO `car_region` VALUES ('1171', '金家庄区', '1169', '340502');
INSERT INTO `car_region` VALUES ('1172', '花山区', '1169', '340503');
INSERT INTO `car_region` VALUES ('1173', '雨山区', '1169', '340504');
INSERT INTO `car_region` VALUES ('1174', '当涂县', '1169', '340521');
INSERT INTO `car_region` VALUES ('1175', '淮北市', '1133', '340600');
INSERT INTO `car_region` VALUES ('1176', '市辖区', '1175', '340601');
INSERT INTO `car_region` VALUES ('1177', '杜集区', '1175', '340602');
INSERT INTO `car_region` VALUES ('1178', '相山区', '1175', '340603');
INSERT INTO `car_region` VALUES ('1179', '烈山区', '1175', '340604');
INSERT INTO `car_region` VALUES ('1180', '濉溪县', '1175', '340621');
INSERT INTO `car_region` VALUES ('1181', '铜陵市', '1133', '340700');
INSERT INTO `car_region` VALUES ('1182', '市辖区', '1181', '340701');
INSERT INTO `car_region` VALUES ('1183', '铜官山区', '1181', '340702');
INSERT INTO `car_region` VALUES ('1184', '狮子山区', '1181', '340703');
INSERT INTO `car_region` VALUES ('1185', '郊　区', '1181', '340711');
INSERT INTO `car_region` VALUES ('1186', '铜陵县', '1181', '340721');
INSERT INTO `car_region` VALUES ('1187', '安庆市', '1133', '340800');
INSERT INTO `car_region` VALUES ('1188', '市辖区', '1187', '340801');
INSERT INTO `car_region` VALUES ('1189', '迎江区', '1187', '340802');
INSERT INTO `car_region` VALUES ('1190', '大观区', '1187', '340803');
INSERT INTO `car_region` VALUES ('1191', '郊　区', '1187', '340811');
INSERT INTO `car_region` VALUES ('1192', '怀宁县', '1187', '340822');
INSERT INTO `car_region` VALUES ('1193', '枞阳县', '1187', '340823');
INSERT INTO `car_region` VALUES ('1194', '潜山县', '1187', '340824');
INSERT INTO `car_region` VALUES ('1195', '太湖县', '1187', '340825');
INSERT INTO `car_region` VALUES ('1196', '宿松县', '1187', '340826');
INSERT INTO `car_region` VALUES ('1197', '望江县', '1187', '340827');
INSERT INTO `car_region` VALUES ('1198', '岳西县', '1187', '340828');
INSERT INTO `car_region` VALUES ('1199', '桐城市', '1187', '340881');
INSERT INTO `car_region` VALUES ('1200', '黄山市', '1133', '341000');
INSERT INTO `car_region` VALUES ('1201', '市辖区', '1200', '341001');
INSERT INTO `car_region` VALUES ('1202', '屯溪区', '1200', '341002');
INSERT INTO `car_region` VALUES ('1203', '黄山区', '1200', '341003');
INSERT INTO `car_region` VALUES ('1204', '徽州区', '1200', '341004');
INSERT INTO `car_region` VALUES ('1205', '歙　县', '1200', '341021');
INSERT INTO `car_region` VALUES ('1206', '休宁县', '1200', '341022');
INSERT INTO `car_region` VALUES ('1207', '黟　县', '1200', '341023');
INSERT INTO `car_region` VALUES ('1208', '祁门县', '1200', '341024');
INSERT INTO `car_region` VALUES ('1209', '滁州市', '1133', '341100');
INSERT INTO `car_region` VALUES ('1210', '市辖区', '1209', '341101');
INSERT INTO `car_region` VALUES ('1211', '琅琊区', '1209', '341102');
INSERT INTO `car_region` VALUES ('1212', '南谯区', '1209', '341103');
INSERT INTO `car_region` VALUES ('1213', '来安县', '1209', '341122');
INSERT INTO `car_region` VALUES ('1214', '全椒县', '1209', '341124');
INSERT INTO `car_region` VALUES ('1215', '定远县', '1209', '341125');
INSERT INTO `car_region` VALUES ('1216', '凤阳县', '1209', '341126');
INSERT INTO `car_region` VALUES ('1217', '天长市', '1209', '341181');
INSERT INTO `car_region` VALUES ('1218', '明光市', '1209', '341182');
INSERT INTO `car_region` VALUES ('1219', '阜阳市', '1133', '341200');
INSERT INTO `car_region` VALUES ('1220', '市辖区', '1219', '341201');
INSERT INTO `car_region` VALUES ('1221', '颍州区', '1219', '341202');
INSERT INTO `car_region` VALUES ('1222', '颍东区', '1219', '341203');
INSERT INTO `car_region` VALUES ('1223', '颍泉区', '1219', '341204');
INSERT INTO `car_region` VALUES ('1224', '临泉县', '1219', '341221');
INSERT INTO `car_region` VALUES ('1225', '太和县', '1219', '341222');
INSERT INTO `car_region` VALUES ('1226', '阜南县', '1219', '341225');
INSERT INTO `car_region` VALUES ('1227', '颍上县', '1219', '341226');
INSERT INTO `car_region` VALUES ('1228', '界首市', '1219', '341282');
INSERT INTO `car_region` VALUES ('1229', '宿州市', '1133', '341300');
INSERT INTO `car_region` VALUES ('1230', '市辖区', '1229', '341301');
INSERT INTO `car_region` VALUES ('1231', '墉桥区', '1229', '341302');
INSERT INTO `car_region` VALUES ('1232', '砀山县', '1229', '341321');
INSERT INTO `car_region` VALUES ('1233', '萧　县', '1229', '341322');
INSERT INTO `car_region` VALUES ('1234', '灵璧县', '1229', '341323');
INSERT INTO `car_region` VALUES ('1235', '泗　县', '1229', '341324');
INSERT INTO `car_region` VALUES ('1236', '巢湖市', '1133', '341400');
INSERT INTO `car_region` VALUES ('1237', '市辖区', '1236', '341401');
INSERT INTO `car_region` VALUES ('1238', '居巢区', '1236', '341402');
INSERT INTO `car_region` VALUES ('1239', '庐江县', '1236', '341421');
INSERT INTO `car_region` VALUES ('1240', '无为县', '1236', '341422');
INSERT INTO `car_region` VALUES ('1241', '含山县', '1236', '341423');
INSERT INTO `car_region` VALUES ('1242', '和　县', '1236', '341424');
INSERT INTO `car_region` VALUES ('1243', '六安市', '1133', '341500');
INSERT INTO `car_region` VALUES ('1244', '市辖区', '1243', '341501');
INSERT INTO `car_region` VALUES ('1245', '金安区', '1243', '341502');
INSERT INTO `car_region` VALUES ('1246', '裕安区', '1243', '341503');
INSERT INTO `car_region` VALUES ('1247', '寿　县', '1243', '341521');
INSERT INTO `car_region` VALUES ('1248', '霍邱县', '1243', '341522');
INSERT INTO `car_region` VALUES ('1249', '舒城县', '1243', '341523');
INSERT INTO `car_region` VALUES ('1250', '金寨县', '1243', '341524');
INSERT INTO `car_region` VALUES ('1251', '霍山县', '1243', '341525');
INSERT INTO `car_region` VALUES ('1252', '亳州市', '1133', '341600');
INSERT INTO `car_region` VALUES ('1253', '市辖区', '1252', '341601');
INSERT INTO `car_region` VALUES ('1254', '谯城区', '1252', '341602');
INSERT INTO `car_region` VALUES ('1255', '涡阳县', '1252', '341621');
INSERT INTO `car_region` VALUES ('1256', '蒙城县', '1252', '341622');
INSERT INTO `car_region` VALUES ('1257', '利辛县', '1252', '341623');
INSERT INTO `car_region` VALUES ('1258', '池州市', '1133', '341700');
INSERT INTO `car_region` VALUES ('1259', '市辖区', '1258', '341701');
INSERT INTO `car_region` VALUES ('1260', '贵池区', '1258', '341702');
INSERT INTO `car_region` VALUES ('1261', '东至县', '1258', '341721');
INSERT INTO `car_region` VALUES ('1262', '石台县', '1258', '341722');
INSERT INTO `car_region` VALUES ('1263', '青阳县', '1258', '341723');
INSERT INTO `car_region` VALUES ('1264', '宣城市', '1133', '341800');
INSERT INTO `car_region` VALUES ('1265', '市辖区', '1264', '341801');
INSERT INTO `car_region` VALUES ('1266', '宣州区', '1264', '341802');
INSERT INTO `car_region` VALUES ('1267', '郎溪县', '1264', '341821');
INSERT INTO `car_region` VALUES ('1268', '广德县', '1264', '341822');
INSERT INTO `car_region` VALUES ('1269', '泾　县', '1264', '341823');
INSERT INTO `car_region` VALUES ('1270', '绩溪县', '1264', '341824');
INSERT INTO `car_region` VALUES ('1271', '旌德县', '1264', '341825');
INSERT INTO `car_region` VALUES ('1272', '宁国市', '1264', '341881');
INSERT INTO `car_region` VALUES ('1273', '福建省', '0', '350000');
INSERT INTO `car_region` VALUES ('1274', '福州市', '1273', '350100');
INSERT INTO `car_region` VALUES ('1275', '市辖区', '1274', '350101');
INSERT INTO `car_region` VALUES ('1276', '鼓楼区', '1274', '350102');
INSERT INTO `car_region` VALUES ('1277', '台江区', '1274', '350103');
INSERT INTO `car_region` VALUES ('1278', '仓山区', '1274', '350104');
INSERT INTO `car_region` VALUES ('1279', '马尾区', '1274', '350105');
INSERT INTO `car_region` VALUES ('1280', '晋安区', '1274', '350111');
INSERT INTO `car_region` VALUES ('1281', '闽侯县', '1274', '350121');
INSERT INTO `car_region` VALUES ('1282', '连江县', '1274', '350122');
INSERT INTO `car_region` VALUES ('1283', '罗源县', '1274', '350123');
INSERT INTO `car_region` VALUES ('1284', '闽清县', '1274', '350124');
INSERT INTO `car_region` VALUES ('1285', '永泰县', '1274', '350125');
INSERT INTO `car_region` VALUES ('1286', '平潭县', '1274', '350128');
INSERT INTO `car_region` VALUES ('1287', '福清市', '1274', '350181');
INSERT INTO `car_region` VALUES ('1288', '长乐市', '1274', '350182');
INSERT INTO `car_region` VALUES ('1289', '厦门市', '1273', '350200');
INSERT INTO `car_region` VALUES ('1290', '市辖区', '1289', '350201');
INSERT INTO `car_region` VALUES ('1291', '思明区', '1289', '350203');
INSERT INTO `car_region` VALUES ('1292', '海沧区', '1289', '350205');
INSERT INTO `car_region` VALUES ('1293', '湖里区', '1289', '350206');
INSERT INTO `car_region` VALUES ('1294', '集美区', '1289', '350211');
INSERT INTO `car_region` VALUES ('1295', '同安区', '1289', '350212');
INSERT INTO `car_region` VALUES ('1296', '翔安区', '1289', '350213');
INSERT INTO `car_region` VALUES ('1297', '莆田市', '1273', '350300');
INSERT INTO `car_region` VALUES ('1298', '市辖区', '1297', '350301');
INSERT INTO `car_region` VALUES ('1299', '城厢区', '1297', '350302');
INSERT INTO `car_region` VALUES ('1300', '涵江区', '1297', '350303');
INSERT INTO `car_region` VALUES ('1301', '荔城区', '1297', '350304');
INSERT INTO `car_region` VALUES ('1302', '秀屿区', '1297', '350305');
INSERT INTO `car_region` VALUES ('1303', '仙游县', '1297', '350322');
INSERT INTO `car_region` VALUES ('1304', '三明市', '1273', '350400');
INSERT INTO `car_region` VALUES ('1305', '市辖区', '1304', '350401');
INSERT INTO `car_region` VALUES ('1306', '梅列区', '1304', '350402');
INSERT INTO `car_region` VALUES ('1307', '三元区', '1304', '350403');
INSERT INTO `car_region` VALUES ('1308', '明溪县', '1304', '350421');
INSERT INTO `car_region` VALUES ('1309', '清流县', '1304', '350423');
INSERT INTO `car_region` VALUES ('1310', '宁化县', '1304', '350424');
INSERT INTO `car_region` VALUES ('1311', '大田县', '1304', '350425');
INSERT INTO `car_region` VALUES ('1312', '尤溪县', '1304', '350426');
INSERT INTO `car_region` VALUES ('1313', '沙　县', '1304', '350427');
INSERT INTO `car_region` VALUES ('1314', '将乐县', '1304', '350428');
INSERT INTO `car_region` VALUES ('1315', '泰宁县', '1304', '350429');
INSERT INTO `car_region` VALUES ('1316', '建宁县', '1304', '350430');
INSERT INTO `car_region` VALUES ('1317', '永安市', '1304', '350481');
INSERT INTO `car_region` VALUES ('1318', '泉州市', '1273', '350500');
INSERT INTO `car_region` VALUES ('1319', '市辖区', '1318', '350501');
INSERT INTO `car_region` VALUES ('1320', '鲤城区', '1318', '350502');
INSERT INTO `car_region` VALUES ('1321', '丰泽区', '1318', '350503');
INSERT INTO `car_region` VALUES ('1322', '洛江区', '1318', '350504');
INSERT INTO `car_region` VALUES ('1323', '泉港区', '1318', '350505');
INSERT INTO `car_region` VALUES ('1324', '惠安县', '1318', '350521');
INSERT INTO `car_region` VALUES ('1325', '安溪县', '1318', '350524');
INSERT INTO `car_region` VALUES ('1326', '永春县', '1318', '350525');
INSERT INTO `car_region` VALUES ('1327', '德化县', '1318', '350526');
INSERT INTO `car_region` VALUES ('1328', '金门县', '1318', '350527');
INSERT INTO `car_region` VALUES ('1329', '石狮市', '1318', '350581');
INSERT INTO `car_region` VALUES ('1330', '晋江市', '1318', '350582');
INSERT INTO `car_region` VALUES ('1331', '南安市', '1318', '350583');
INSERT INTO `car_region` VALUES ('1332', '漳州市', '1273', '350600');
INSERT INTO `car_region` VALUES ('1333', '市辖区', '1332', '350601');
INSERT INTO `car_region` VALUES ('1334', '芗城区', '1332', '350602');
INSERT INTO `car_region` VALUES ('1335', '龙文区', '1332', '350603');
INSERT INTO `car_region` VALUES ('1336', '云霄县', '1332', '350622');
INSERT INTO `car_region` VALUES ('1337', '漳浦县', '1332', '350623');
INSERT INTO `car_region` VALUES ('1338', '诏安县', '1332', '350624');
INSERT INTO `car_region` VALUES ('1339', '长泰县', '1332', '350625');
INSERT INTO `car_region` VALUES ('1340', '东山县', '1332', '350626');
INSERT INTO `car_region` VALUES ('1341', '南靖县', '1332', '350627');
INSERT INTO `car_region` VALUES ('1342', '平和县', '1332', '350628');
INSERT INTO `car_region` VALUES ('1343', '华安县', '1332', '350629');
INSERT INTO `car_region` VALUES ('1344', '龙海市', '1332', '350681');
INSERT INTO `car_region` VALUES ('1345', '南平市', '1273', '350700');
INSERT INTO `car_region` VALUES ('1346', '市辖区', '1345', '350701');
INSERT INTO `car_region` VALUES ('1347', '延平区', '1345', '350702');
INSERT INTO `car_region` VALUES ('1348', '顺昌县', '1345', '350721');
INSERT INTO `car_region` VALUES ('1349', '浦城县', '1345', '350722');
INSERT INTO `car_region` VALUES ('1350', '光泽县', '1345', '350723');
INSERT INTO `car_region` VALUES ('1351', '松溪县', '1345', '350724');
INSERT INTO `car_region` VALUES ('1352', '政和县', '1345', '350725');
INSERT INTO `car_region` VALUES ('1353', '邵武市', '1345', '350781');
INSERT INTO `car_region` VALUES ('1354', '武夷山市', '1345', '350782');
INSERT INTO `car_region` VALUES ('1355', '建瓯市', '1345', '350783');
INSERT INTO `car_region` VALUES ('1356', '建阳市', '1345', '350784');
INSERT INTO `car_region` VALUES ('1357', '龙岩市', '1273', '350800');
INSERT INTO `car_region` VALUES ('1358', '市辖区', '1357', '350801');
INSERT INTO `car_region` VALUES ('1359', '新罗区', '1357', '350802');
INSERT INTO `car_region` VALUES ('1360', '长汀县', '1357', '350821');
INSERT INTO `car_region` VALUES ('1361', '永定县', '1357', '350822');
INSERT INTO `car_region` VALUES ('1362', '上杭县', '1357', '350823');
INSERT INTO `car_region` VALUES ('1363', '武平县', '1357', '350824');
INSERT INTO `car_region` VALUES ('1364', '连城县', '1357', '350825');
INSERT INTO `car_region` VALUES ('1365', '漳平市', '1357', '350881');
INSERT INTO `car_region` VALUES ('1366', '宁德市', '1273', '350900');
INSERT INTO `car_region` VALUES ('1367', '市辖区', '1366', '350901');
INSERT INTO `car_region` VALUES ('1368', '蕉城区', '1366', '350902');
INSERT INTO `car_region` VALUES ('1369', '霞浦县', '1366', '350921');
INSERT INTO `car_region` VALUES ('1370', '古田县', '1366', '350922');
INSERT INTO `car_region` VALUES ('1371', '屏南县', '1366', '350923');
INSERT INTO `car_region` VALUES ('1372', '寿宁县', '1366', '350924');
INSERT INTO `car_region` VALUES ('1373', '周宁县', '1366', '350925');
INSERT INTO `car_region` VALUES ('1374', '柘荣县', '1366', '350926');
INSERT INTO `car_region` VALUES ('1375', '福安市', '1366', '350981');
INSERT INTO `car_region` VALUES ('1376', '福鼎市', '1366', '350982');
INSERT INTO `car_region` VALUES ('1377', '江西省', '0', '360000');
INSERT INTO `car_region` VALUES ('1378', '南昌市', '1377', '360100');
INSERT INTO `car_region` VALUES ('1379', '市辖区', '1378', '360101');
INSERT INTO `car_region` VALUES ('1380', '东湖区', '1378', '360102');
INSERT INTO `car_region` VALUES ('1381', '西湖区', '1378', '360103');
INSERT INTO `car_region` VALUES ('1382', '青云谱区', '1378', '360104');
INSERT INTO `car_region` VALUES ('1383', '湾里区', '1378', '360105');
INSERT INTO `car_region` VALUES ('1384', '青山湖区', '1378', '360111');
INSERT INTO `car_region` VALUES ('1385', '南昌县', '1378', '360121');
INSERT INTO `car_region` VALUES ('1386', '新建县', '1378', '360122');
INSERT INTO `car_region` VALUES ('1387', '安义县', '1378', '360123');
INSERT INTO `car_region` VALUES ('1388', '进贤县', '1378', '360124');
INSERT INTO `car_region` VALUES ('1389', '景德镇市', '1377', '360200');
INSERT INTO `car_region` VALUES ('1390', '市辖区', '1389', '360201');
INSERT INTO `car_region` VALUES ('1391', '昌江区', '1389', '360202');
INSERT INTO `car_region` VALUES ('1392', '珠山区', '1389', '360203');
INSERT INTO `car_region` VALUES ('1393', '浮梁县', '1389', '360222');
INSERT INTO `car_region` VALUES ('1394', '乐平市', '1389', '360281');
INSERT INTO `car_region` VALUES ('1395', '萍乡市', '1377', '360300');
INSERT INTO `car_region` VALUES ('1396', '市辖区', '1395', '360301');
INSERT INTO `car_region` VALUES ('1397', '安源区', '1395', '360302');
INSERT INTO `car_region` VALUES ('1398', '湘东区', '1395', '360313');
INSERT INTO `car_region` VALUES ('1399', '莲花县', '1395', '360321');
INSERT INTO `car_region` VALUES ('1400', '上栗县', '1395', '360322');
INSERT INTO `car_region` VALUES ('1401', '芦溪县', '1395', '360323');
INSERT INTO `car_region` VALUES ('1402', '九江市', '1377', '360400');
INSERT INTO `car_region` VALUES ('1403', '市辖区', '1402', '360401');
INSERT INTO `car_region` VALUES ('1404', '庐山区', '1402', '360402');
INSERT INTO `car_region` VALUES ('1405', '浔阳区', '1402', '360403');
INSERT INTO `car_region` VALUES ('1406', '九江县', '1402', '360421');
INSERT INTO `car_region` VALUES ('1407', '武宁县', '1402', '360423');
INSERT INTO `car_region` VALUES ('1408', '修水县', '1402', '360424');
INSERT INTO `car_region` VALUES ('1409', '永修县', '1402', '360425');
INSERT INTO `car_region` VALUES ('1410', '德安县', '1402', '360426');
INSERT INTO `car_region` VALUES ('1411', '星子县', '1402', '360427');
INSERT INTO `car_region` VALUES ('1412', '都昌县', '1402', '360428');
INSERT INTO `car_region` VALUES ('1413', '湖口县', '1402', '360429');
INSERT INTO `car_region` VALUES ('1414', '彭泽县', '1402', '360430');
INSERT INTO `car_region` VALUES ('1415', '瑞昌市', '1402', '360481');
INSERT INTO `car_region` VALUES ('1416', '新余市', '1377', '360500');
INSERT INTO `car_region` VALUES ('1417', '市辖区', '1416', '360501');
INSERT INTO `car_region` VALUES ('1418', '渝水区', '1416', '360502');
INSERT INTO `car_region` VALUES ('1419', '分宜县', '1416', '360521');
INSERT INTO `car_region` VALUES ('1420', '鹰潭市', '1377', '360600');
INSERT INTO `car_region` VALUES ('1421', '市辖区', '1420', '360601');
INSERT INTO `car_region` VALUES ('1422', '月湖区', '1420', '360602');
INSERT INTO `car_region` VALUES ('1423', '余江县', '1420', '360622');
INSERT INTO `car_region` VALUES ('1424', '贵溪市', '1420', '360681');
INSERT INTO `car_region` VALUES ('1425', '赣州市', '1377', '360700');
INSERT INTO `car_region` VALUES ('1426', '市辖区', '1425', '360701');
INSERT INTO `car_region` VALUES ('1427', '章贡区', '1425', '360702');
INSERT INTO `car_region` VALUES ('1428', '赣　县', '1425', '360721');
INSERT INTO `car_region` VALUES ('1429', '信丰县', '1425', '360722');
INSERT INTO `car_region` VALUES ('1430', '大余县', '1425', '360723');
INSERT INTO `car_region` VALUES ('1431', '上犹县', '1425', '360724');
INSERT INTO `car_region` VALUES ('1432', '崇义县', '1425', '360725');
INSERT INTO `car_region` VALUES ('1433', '安远县', '1425', '360726');
INSERT INTO `car_region` VALUES ('1434', '龙南县', '1425', '360727');
INSERT INTO `car_region` VALUES ('1435', '定南县', '1425', '360728');
INSERT INTO `car_region` VALUES ('1436', '全南县', '1425', '360729');
INSERT INTO `car_region` VALUES ('1437', '宁都县', '1425', '360730');
INSERT INTO `car_region` VALUES ('1438', '于都县', '1425', '360731');
INSERT INTO `car_region` VALUES ('1439', '兴国县', '1425', '360732');
INSERT INTO `car_region` VALUES ('1440', '会昌县', '1425', '360733');
INSERT INTO `car_region` VALUES ('1441', '寻乌县', '1425', '360734');
INSERT INTO `car_region` VALUES ('1442', '石城县', '1425', '360735');
INSERT INTO `car_region` VALUES ('1443', '瑞金市', '1425', '360781');
INSERT INTO `car_region` VALUES ('1444', '南康市', '1425', '360782');
INSERT INTO `car_region` VALUES ('1445', '吉安市', '1377', '360800');
INSERT INTO `car_region` VALUES ('1446', '市辖区', '1445', '360801');
INSERT INTO `car_region` VALUES ('1447', '吉州区', '1445', '360802');
INSERT INTO `car_region` VALUES ('1448', '青原区', '1445', '360803');
INSERT INTO `car_region` VALUES ('1449', '吉安县', '1445', '360821');
INSERT INTO `car_region` VALUES ('1450', '吉水县', '1445', '360822');
INSERT INTO `car_region` VALUES ('1451', '峡江县', '1445', '360823');
INSERT INTO `car_region` VALUES ('1452', '新干县', '1445', '360824');
INSERT INTO `car_region` VALUES ('1453', '永丰县', '1445', '360825');
INSERT INTO `car_region` VALUES ('1454', '泰和县', '1445', '360826');
INSERT INTO `car_region` VALUES ('1455', '遂川县', '1445', '360827');
INSERT INTO `car_region` VALUES ('1456', '万安县', '1445', '360828');
INSERT INTO `car_region` VALUES ('1457', '安福县', '1445', '360829');
INSERT INTO `car_region` VALUES ('1458', '永新县', '1445', '360830');
INSERT INTO `car_region` VALUES ('1459', '井冈山市', '1445', '360881');
INSERT INTO `car_region` VALUES ('1460', '宜春市', '1377', '360900');
INSERT INTO `car_region` VALUES ('1461', '市辖区', '1460', '360901');
INSERT INTO `car_region` VALUES ('1462', '袁州区', '1460', '360902');
INSERT INTO `car_region` VALUES ('1463', '奉新县', '1460', '360921');
INSERT INTO `car_region` VALUES ('1464', '万载县', '1460', '360922');
INSERT INTO `car_region` VALUES ('1465', '上高县', '1460', '360923');
INSERT INTO `car_region` VALUES ('1466', '宜丰县', '1460', '360924');
INSERT INTO `car_region` VALUES ('1467', '靖安县', '1460', '360925');
INSERT INTO `car_region` VALUES ('1468', '铜鼓县', '1460', '360926');
INSERT INTO `car_region` VALUES ('1469', '丰城市', '1460', '360981');
INSERT INTO `car_region` VALUES ('1470', '樟树市', '1460', '360982');
INSERT INTO `car_region` VALUES ('1471', '高安市', '1460', '360983');
INSERT INTO `car_region` VALUES ('1472', '抚州市', '1377', '361000');
INSERT INTO `car_region` VALUES ('1473', '市辖区', '1472', '361001');
INSERT INTO `car_region` VALUES ('1474', '临川区', '1472', '361002');
INSERT INTO `car_region` VALUES ('1475', '南城县', '1472', '361021');
INSERT INTO `car_region` VALUES ('1476', '黎川县', '1472', '361022');
INSERT INTO `car_region` VALUES ('1477', '南丰县', '1472', '361023');
INSERT INTO `car_region` VALUES ('1478', '崇仁县', '1472', '361024');
INSERT INTO `car_region` VALUES ('1479', '乐安县', '1472', '361025');
INSERT INTO `car_region` VALUES ('1480', '宜黄县', '1472', '361026');
INSERT INTO `car_region` VALUES ('1481', '金溪县', '1472', '361027');
INSERT INTO `car_region` VALUES ('1482', '资溪县', '1472', '361028');
INSERT INTO `car_region` VALUES ('1483', '东乡县', '1472', '361029');
INSERT INTO `car_region` VALUES ('1484', '广昌县', '1472', '361030');
INSERT INTO `car_region` VALUES ('1485', '上饶市', '1377', '361100');
INSERT INTO `car_region` VALUES ('1486', '市辖区', '1485', '361101');
INSERT INTO `car_region` VALUES ('1487', '信州区', '1485', '361102');
INSERT INTO `car_region` VALUES ('1488', '上饶县', '1485', '361121');
INSERT INTO `car_region` VALUES ('1489', '广丰县', '1485', '361122');
INSERT INTO `car_region` VALUES ('1490', '玉山县', '1485', '361123');
INSERT INTO `car_region` VALUES ('1491', '铅山县', '1485', '361124');
INSERT INTO `car_region` VALUES ('1492', '横峰县', '1485', '361125');
INSERT INTO `car_region` VALUES ('1493', '弋阳县', '1485', '361126');
INSERT INTO `car_region` VALUES ('1494', '余干县', '1485', '361127');
INSERT INTO `car_region` VALUES ('1495', '鄱阳县', '1485', '361128');
INSERT INTO `car_region` VALUES ('1496', '万年县', '1485', '361129');
INSERT INTO `car_region` VALUES ('1497', '婺源县', '1485', '361130');
INSERT INTO `car_region` VALUES ('1498', '德兴市', '1485', '361181');
INSERT INTO `car_region` VALUES ('1499', '山东省', '0', '370000');
INSERT INTO `car_region` VALUES ('1500', '济南市', '1499', '370100');
INSERT INTO `car_region` VALUES ('1501', '市辖区', '1500', '370101');
INSERT INTO `car_region` VALUES ('1502', '历下区', '1500', '370102');
INSERT INTO `car_region` VALUES ('1503', '市中区', '1500', '370103');
INSERT INTO `car_region` VALUES ('1504', '槐荫区', '1500', '370104');
INSERT INTO `car_region` VALUES ('1505', '天桥区', '1500', '370105');
INSERT INTO `car_region` VALUES ('1506', '历城区', '1500', '370112');
INSERT INTO `car_region` VALUES ('1507', '长清区', '1500', '370113');
INSERT INTO `car_region` VALUES ('1508', '平阴县', '1500', '370124');
INSERT INTO `car_region` VALUES ('1509', '济阳县', '1500', '370125');
INSERT INTO `car_region` VALUES ('1510', '商河县', '1500', '370126');
INSERT INTO `car_region` VALUES ('1511', '章丘市', '1500', '370181');
INSERT INTO `car_region` VALUES ('1512', '青岛市', '1499', '370200');
INSERT INTO `car_region` VALUES ('1513', '市辖区', '1512', '370201');
INSERT INTO `car_region` VALUES ('1514', '市南区', '1512', '370202');
INSERT INTO `car_region` VALUES ('1515', '市北区', '1512', '370203');
INSERT INTO `car_region` VALUES ('1516', '四方区', '1512', '370205');
INSERT INTO `car_region` VALUES ('1517', '黄岛区', '1512', '370211');
INSERT INTO `car_region` VALUES ('1518', '崂山区', '1512', '370212');
INSERT INTO `car_region` VALUES ('1519', '李沧区', '1512', '370213');
INSERT INTO `car_region` VALUES ('1520', '城阳区', '1512', '370214');
INSERT INTO `car_region` VALUES ('1521', '胶州市', '1512', '370281');
INSERT INTO `car_region` VALUES ('1522', '即墨市', '1512', '370282');
INSERT INTO `car_region` VALUES ('1523', '平度市', '1512', '370283');
INSERT INTO `car_region` VALUES ('1524', '胶南市', '1512', '370284');
INSERT INTO `car_region` VALUES ('1525', '莱西市', '1512', '370285');
INSERT INTO `car_region` VALUES ('1526', '淄博市', '1499', '370300');
INSERT INTO `car_region` VALUES ('1527', '市辖区', '1526', '370301');
INSERT INTO `car_region` VALUES ('1528', '淄川区', '1526', '370302');
INSERT INTO `car_region` VALUES ('1529', '张店区', '1526', '370303');
INSERT INTO `car_region` VALUES ('1530', '博山区', '1526', '370304');
INSERT INTO `car_region` VALUES ('1531', '临淄区', '1526', '370305');
INSERT INTO `car_region` VALUES ('1532', '周村区', '1526', '370306');
INSERT INTO `car_region` VALUES ('1533', '桓台县', '1526', '370321');
INSERT INTO `car_region` VALUES ('1534', '高青县', '1526', '370322');
INSERT INTO `car_region` VALUES ('1535', '沂源县', '1526', '370323');
INSERT INTO `car_region` VALUES ('1536', '枣庄市', '1499', '370400');
INSERT INTO `car_region` VALUES ('1537', '市辖区', '1536', '370401');
INSERT INTO `car_region` VALUES ('1538', '市中区', '1536', '370402');
INSERT INTO `car_region` VALUES ('1539', '薛城区', '1536', '370403');
INSERT INTO `car_region` VALUES ('1540', '峄城区', '1536', '370404');
INSERT INTO `car_region` VALUES ('1541', '台儿庄区', '1536', '370405');
INSERT INTO `car_region` VALUES ('1542', '山亭区', '1536', '370406');
INSERT INTO `car_region` VALUES ('1543', '滕州市', '1536', '370481');
INSERT INTO `car_region` VALUES ('1544', '东营市', '1499', '370500');
INSERT INTO `car_region` VALUES ('1545', '市辖区', '1544', '370501');
INSERT INTO `car_region` VALUES ('1546', '东营区', '1544', '370502');
INSERT INTO `car_region` VALUES ('1547', '河口区', '1544', '370503');
INSERT INTO `car_region` VALUES ('1548', '垦利县', '1544', '370521');
INSERT INTO `car_region` VALUES ('1549', '利津县', '1544', '370522');
INSERT INTO `car_region` VALUES ('1550', '广饶县', '1544', '370523');
INSERT INTO `car_region` VALUES ('1551', '烟台市', '1499', '370600');
INSERT INTO `car_region` VALUES ('1552', '市辖区', '1551', '370601');
INSERT INTO `car_region` VALUES ('1553', '芝罘区', '1551', '370602');
INSERT INTO `car_region` VALUES ('1554', '福山区', '1551', '370611');
INSERT INTO `car_region` VALUES ('1555', '牟平区', '1551', '370612');
INSERT INTO `car_region` VALUES ('1556', '莱山区', '1551', '370613');
INSERT INTO `car_region` VALUES ('1557', '长岛县', '1551', '370634');
INSERT INTO `car_region` VALUES ('1558', '龙口市', '1551', '370681');
INSERT INTO `car_region` VALUES ('1559', '莱阳市', '1551', '370682');
INSERT INTO `car_region` VALUES ('1560', '莱州市', '1551', '370683');
INSERT INTO `car_region` VALUES ('1561', '蓬莱市', '1551', '370684');
INSERT INTO `car_region` VALUES ('1562', '招远市', '1551', '370685');
INSERT INTO `car_region` VALUES ('1563', '栖霞市', '1551', '370686');
INSERT INTO `car_region` VALUES ('1564', '海阳市', '1551', '370687');
INSERT INTO `car_region` VALUES ('1565', '潍坊市', '1499', '370700');
INSERT INTO `car_region` VALUES ('1566', '市辖区', '1565', '370701');
INSERT INTO `car_region` VALUES ('1567', '潍城区', '1565', '370702');
INSERT INTO `car_region` VALUES ('1568', '寒亭区', '1565', '370703');
INSERT INTO `car_region` VALUES ('1569', '坊子区', '1565', '370704');
INSERT INTO `car_region` VALUES ('1570', '奎文区', '1565', '370705');
INSERT INTO `car_region` VALUES ('1571', '临朐县', '1565', '370724');
INSERT INTO `car_region` VALUES ('1572', '昌乐县', '1565', '370725');
INSERT INTO `car_region` VALUES ('1573', '青州市', '1565', '370781');
INSERT INTO `car_region` VALUES ('1574', '诸城市', '1565', '370782');
INSERT INTO `car_region` VALUES ('1575', '寿光市', '1565', '370783');
INSERT INTO `car_region` VALUES ('1576', '安丘市', '1565', '370784');
INSERT INTO `car_region` VALUES ('1577', '高密市', '1565', '370785');
INSERT INTO `car_region` VALUES ('1578', '昌邑市', '1565', '370786');
INSERT INTO `car_region` VALUES ('1579', '济宁市', '1499', '370800');
INSERT INTO `car_region` VALUES ('1580', '市辖区', '1579', '370801');
INSERT INTO `car_region` VALUES ('1581', '市中区', '1579', '370802');
INSERT INTO `car_region` VALUES ('1582', '任城区', '1579', '370811');
INSERT INTO `car_region` VALUES ('1583', '微山县', '1579', '370826');
INSERT INTO `car_region` VALUES ('1584', '鱼台县', '1579', '370827');
INSERT INTO `car_region` VALUES ('1585', '金乡县', '1579', '370828');
INSERT INTO `car_region` VALUES ('1586', '嘉祥县', '1579', '370829');
INSERT INTO `car_region` VALUES ('1587', '汶上县', '1579', '370830');
INSERT INTO `car_region` VALUES ('1588', '泗水县', '1579', '370831');
INSERT INTO `car_region` VALUES ('1589', '梁山县', '1579', '370832');
INSERT INTO `car_region` VALUES ('1590', '曲阜市', '1579', '370881');
INSERT INTO `car_region` VALUES ('1591', '兖州市', '1579', '370882');
INSERT INTO `car_region` VALUES ('1592', '邹城市', '1579', '370883');
INSERT INTO `car_region` VALUES ('1593', '泰安市', '1499', '370900');
INSERT INTO `car_region` VALUES ('1594', '市辖区', '1593', '370901');
INSERT INTO `car_region` VALUES ('1595', '泰山区', '1593', '370902');
INSERT INTO `car_region` VALUES ('1596', '岱岳区', '1593', '370903');
INSERT INTO `car_region` VALUES ('1597', '宁阳县', '1593', '370921');
INSERT INTO `car_region` VALUES ('1598', '东平县', '1593', '370923');
INSERT INTO `car_region` VALUES ('1599', '新泰市', '1593', '370982');
INSERT INTO `car_region` VALUES ('1600', '肥城市', '1593', '370983');
INSERT INTO `car_region` VALUES ('1601', '威海市', '1499', '371000');
INSERT INTO `car_region` VALUES ('1602', '市辖区', '1601', '371001');
INSERT INTO `car_region` VALUES ('1603', '环翠区', '1601', '371002');
INSERT INTO `car_region` VALUES ('1604', '文登市', '1601', '371081');
INSERT INTO `car_region` VALUES ('1605', '荣成市', '1601', '371082');
INSERT INTO `car_region` VALUES ('1606', '乳山市', '1601', '371083');
INSERT INTO `car_region` VALUES ('1607', '日照市', '1499', '371100');
INSERT INTO `car_region` VALUES ('1608', '市辖区', '1607', '371101');
INSERT INTO `car_region` VALUES ('1609', '东港区', '1607', '371102');
INSERT INTO `car_region` VALUES ('1610', '岚山区', '1607', '371103');
INSERT INTO `car_region` VALUES ('1611', '五莲县', '1607', '371121');
INSERT INTO `car_region` VALUES ('1612', '莒　县', '1607', '371122');
INSERT INTO `car_region` VALUES ('1613', '莱芜市', '1499', '371200');
INSERT INTO `car_region` VALUES ('1614', '市辖区', '1613', '371201');
INSERT INTO `car_region` VALUES ('1615', '莱城区', '1613', '371202');
INSERT INTO `car_region` VALUES ('1616', '钢城区', '1613', '371203');
INSERT INTO `car_region` VALUES ('1617', '临沂市', '1499', '371300');
INSERT INTO `car_region` VALUES ('1618', '市辖区', '1617', '371301');
INSERT INTO `car_region` VALUES ('1619', '兰山区', '1617', '371302');
INSERT INTO `car_region` VALUES ('1620', '罗庄区', '1617', '371311');
INSERT INTO `car_region` VALUES ('1621', '河东区', '1617', '371312');
INSERT INTO `car_region` VALUES ('1622', '沂南县', '1617', '371321');
INSERT INTO `car_region` VALUES ('1623', '郯城县', '1617', '371322');
INSERT INTO `car_region` VALUES ('1624', '沂水县', '1617', '371323');
INSERT INTO `car_region` VALUES ('1625', '苍山县', '1617', '371324');
INSERT INTO `car_region` VALUES ('1626', '费　县', '1617', '371325');
INSERT INTO `car_region` VALUES ('1627', '平邑县', '1617', '371326');
INSERT INTO `car_region` VALUES ('1628', '莒南县', '1617', '371327');
INSERT INTO `car_region` VALUES ('1629', '蒙阴县', '1617', '371328');
INSERT INTO `car_region` VALUES ('1630', '临沭县', '1617', '371329');
INSERT INTO `car_region` VALUES ('1631', '德州市', '1499', '371400');
INSERT INTO `car_region` VALUES ('1632', '市辖区', '1631', '371401');
INSERT INTO `car_region` VALUES ('1633', '德城区', '1631', '371402');
INSERT INTO `car_region` VALUES ('1634', '陵　县', '1631', '371421');
INSERT INTO `car_region` VALUES ('1635', '宁津县', '1631', '371422');
INSERT INTO `car_region` VALUES ('1636', '庆云县', '1631', '371423');
INSERT INTO `car_region` VALUES ('1637', '临邑县', '1631', '371424');
INSERT INTO `car_region` VALUES ('1638', '齐河县', '1631', '371425');
INSERT INTO `car_region` VALUES ('1639', '平原县', '1631', '371426');
INSERT INTO `car_region` VALUES ('1640', '夏津县', '1631', '371427');
INSERT INTO `car_region` VALUES ('1641', '武城县', '1631', '371428');
INSERT INTO `car_region` VALUES ('1642', '乐陵市', '1631', '371481');
INSERT INTO `car_region` VALUES ('1643', '禹城市', '1631', '371482');
INSERT INTO `car_region` VALUES ('1644', '聊城市', '1499', '371500');
INSERT INTO `car_region` VALUES ('1645', '市辖区', '1644', '371501');
INSERT INTO `car_region` VALUES ('1646', '东昌府区', '1644', '371502');
INSERT INTO `car_region` VALUES ('1647', '阳谷县', '1644', '371521');
INSERT INTO `car_region` VALUES ('1648', '莘　县', '1644', '371522');
INSERT INTO `car_region` VALUES ('1649', '茌平县', '1644', '371523');
INSERT INTO `car_region` VALUES ('1650', '东阿县', '1644', '371524');
INSERT INTO `car_region` VALUES ('1651', '冠　县', '1644', '371525');
INSERT INTO `car_region` VALUES ('1652', '高唐县', '1644', '371526');
INSERT INTO `car_region` VALUES ('1653', '临清市', '1644', '371581');
INSERT INTO `car_region` VALUES ('1654', '滨州市', '1499', '371600');
INSERT INTO `car_region` VALUES ('1655', '市辖区', '1654', '371601');
INSERT INTO `car_region` VALUES ('1656', '滨城区', '1654', '371602');
INSERT INTO `car_region` VALUES ('1657', '惠民县', '1654', '371621');
INSERT INTO `car_region` VALUES ('1658', '阳信县', '1654', '371622');
INSERT INTO `car_region` VALUES ('1659', '无棣县', '1654', '371623');
INSERT INTO `car_region` VALUES ('1660', '沾化县', '1654', '371624');
INSERT INTO `car_region` VALUES ('1661', '博兴县', '1654', '371625');
INSERT INTO `car_region` VALUES ('1662', '邹平县', '1654', '371626');
INSERT INTO `car_region` VALUES ('1663', '荷泽市', '1499', '371700');
INSERT INTO `car_region` VALUES ('1664', '市辖区', '1663', '371701');
INSERT INTO `car_region` VALUES ('1665', '牡丹区', '1663', '371702');
INSERT INTO `car_region` VALUES ('1666', '曹　县', '1663', '371721');
INSERT INTO `car_region` VALUES ('1667', '单　县', '1663', '371722');
INSERT INTO `car_region` VALUES ('1668', '成武县', '1663', '371723');
INSERT INTO `car_region` VALUES ('1669', '巨野县', '1663', '371724');
INSERT INTO `car_region` VALUES ('1670', '郓城县', '1663', '371725');
INSERT INTO `car_region` VALUES ('1671', '鄄城县', '1663', '371726');
INSERT INTO `car_region` VALUES ('1672', '定陶县', '1663', '371727');
INSERT INTO `car_region` VALUES ('1673', '东明县', '1663', '371728');
INSERT INTO `car_region` VALUES ('1674', '河南省', '0', '410000');
INSERT INTO `car_region` VALUES ('1675', '郑州市', '1674', '410100');
INSERT INTO `car_region` VALUES ('1676', '市辖区', '1675', '410101');
INSERT INTO `car_region` VALUES ('1677', '中原区', '1675', '410102');
INSERT INTO `car_region` VALUES ('1678', '二七区', '1675', '410103');
INSERT INTO `car_region` VALUES ('1679', '管城回族区', '1675', '410104');
INSERT INTO `car_region` VALUES ('1680', '金水区', '1675', '410105');
INSERT INTO `car_region` VALUES ('1681', '上街区', '1675', '410106');
INSERT INTO `car_region` VALUES ('1682', '邙山区', '1675', '410108');
INSERT INTO `car_region` VALUES ('1683', '中牟县', '1675', '410122');
INSERT INTO `car_region` VALUES ('1684', '巩义市', '1675', '410181');
INSERT INTO `car_region` VALUES ('1685', '荥阳市', '1675', '410182');
INSERT INTO `car_region` VALUES ('1686', '新密市', '1675', '410183');
INSERT INTO `car_region` VALUES ('1687', '新郑市', '1675', '410184');
INSERT INTO `car_region` VALUES ('1688', '登封市', '1675', '410185');
INSERT INTO `car_region` VALUES ('1689', '开封市', '1674', '410200');
INSERT INTO `car_region` VALUES ('1690', '市辖区', '1689', '410201');
INSERT INTO `car_region` VALUES ('1691', '龙亭区', '1689', '410202');
INSERT INTO `car_region` VALUES ('1692', '顺河回族区', '1689', '410203');
INSERT INTO `car_region` VALUES ('1693', '鼓楼区', '1689', '410204');
INSERT INTO `car_region` VALUES ('1694', '南关区', '1689', '410205');
INSERT INTO `car_region` VALUES ('1695', '郊　区', '1689', '410211');
INSERT INTO `car_region` VALUES ('1696', '杞　县', '1689', '410221');
INSERT INTO `car_region` VALUES ('1697', '通许县', '1689', '410222');
INSERT INTO `car_region` VALUES ('1698', '尉氏县', '1689', '410223');
INSERT INTO `car_region` VALUES ('1699', '开封县', '1689', '410224');
INSERT INTO `car_region` VALUES ('1700', '兰考县', '1689', '410225');
INSERT INTO `car_region` VALUES ('1701', '洛阳市', '1674', '410300');
INSERT INTO `car_region` VALUES ('1702', '市辖区', '1701', '410301');
INSERT INTO `car_region` VALUES ('1703', '老城区', '1701', '410302');
INSERT INTO `car_region` VALUES ('1704', '西工区', '1701', '410303');
INSERT INTO `car_region` VALUES ('1705', '廛河回族区', '1701', '410304');
INSERT INTO `car_region` VALUES ('1706', '涧西区', '1701', '410305');
INSERT INTO `car_region` VALUES ('1707', '吉利区', '1701', '410306');
INSERT INTO `car_region` VALUES ('1708', '洛龙区', '1701', '410307');
INSERT INTO `car_region` VALUES ('1709', '孟津县', '1701', '410322');
INSERT INTO `car_region` VALUES ('1710', '新安县', '1701', '410323');
INSERT INTO `car_region` VALUES ('1711', '栾川县', '1701', '410324');
INSERT INTO `car_region` VALUES ('1712', '嵩　县', '1701', '410325');
INSERT INTO `car_region` VALUES ('1713', '汝阳县', '1701', '410326');
INSERT INTO `car_region` VALUES ('1714', '宜阳县', '1701', '410327');
INSERT INTO `car_region` VALUES ('1715', '洛宁县', '1701', '410328');
INSERT INTO `car_region` VALUES ('1716', '伊川县', '1701', '410329');
INSERT INTO `car_region` VALUES ('1717', '偃师市', '1701', '410381');
INSERT INTO `car_region` VALUES ('1718', '平顶山市', '1674', '410400');
INSERT INTO `car_region` VALUES ('1719', '市辖区', '1718', '410401');
INSERT INTO `car_region` VALUES ('1720', '新华区', '1718', '410402');
INSERT INTO `car_region` VALUES ('1721', '卫东区', '1718', '410403');
INSERT INTO `car_region` VALUES ('1722', '石龙区', '1718', '410404');
INSERT INTO `car_region` VALUES ('1723', '湛河区', '1718', '410411');
INSERT INTO `car_region` VALUES ('1724', '宝丰县', '1718', '410421');
INSERT INTO `car_region` VALUES ('1725', '叶　县', '1718', '410422');
INSERT INTO `car_region` VALUES ('1726', '鲁山县', '1718', '410423');
INSERT INTO `car_region` VALUES ('1727', '郏　县', '1718', '410425');
INSERT INTO `car_region` VALUES ('1728', '舞钢市', '1718', '410481');
INSERT INTO `car_region` VALUES ('1729', '汝州市', '1718', '410482');
INSERT INTO `car_region` VALUES ('1730', '安阳市', '1674', '410500');
INSERT INTO `car_region` VALUES ('1731', '市辖区', '1730', '410501');
INSERT INTO `car_region` VALUES ('1732', '文峰区', '1730', '410502');
INSERT INTO `car_region` VALUES ('1733', '北关区', '1730', '410503');
INSERT INTO `car_region` VALUES ('1734', '殷都区', '1730', '410505');
INSERT INTO `car_region` VALUES ('1735', '龙安区', '1730', '410506');
INSERT INTO `car_region` VALUES ('1736', '安阳县', '1730', '410522');
INSERT INTO `car_region` VALUES ('1737', '汤阴县', '1730', '410523');
INSERT INTO `car_region` VALUES ('1738', '滑　县', '1730', '410526');
INSERT INTO `car_region` VALUES ('1739', '内黄县', '1730', '410527');
INSERT INTO `car_region` VALUES ('1740', '林州市', '1730', '410581');
INSERT INTO `car_region` VALUES ('1741', '鹤壁市', '1674', '410600');
INSERT INTO `car_region` VALUES ('1742', '市辖区', '1741', '410601');
INSERT INTO `car_region` VALUES ('1743', '鹤山区', '1741', '410602');
INSERT INTO `car_region` VALUES ('1744', '山城区', '1741', '410603');
INSERT INTO `car_region` VALUES ('1745', '淇滨区', '1741', '410611');
INSERT INTO `car_region` VALUES ('1746', '浚　县', '1741', '410621');
INSERT INTO `car_region` VALUES ('1747', '淇　县', '1741', '410622');
INSERT INTO `car_region` VALUES ('1748', '新乡市', '1674', '410700');
INSERT INTO `car_region` VALUES ('1749', '市辖区', '1748', '410701');
INSERT INTO `car_region` VALUES ('1750', '红旗区', '1748', '410702');
INSERT INTO `car_region` VALUES ('1751', '卫滨区', '1748', '410703');
INSERT INTO `car_region` VALUES ('1752', '凤泉区', '1748', '410704');
INSERT INTO `car_region` VALUES ('1753', '牧野区', '1748', '410711');
INSERT INTO `car_region` VALUES ('1754', '新乡县', '1748', '410721');
INSERT INTO `car_region` VALUES ('1755', '获嘉县', '1748', '410724');
INSERT INTO `car_region` VALUES ('1756', '原阳县', '1748', '410725');
INSERT INTO `car_region` VALUES ('1757', '延津县', '1748', '410726');
INSERT INTO `car_region` VALUES ('1758', '封丘县', '1748', '410727');
INSERT INTO `car_region` VALUES ('1759', '长垣县', '1748', '410728');
INSERT INTO `car_region` VALUES ('1760', '卫辉市', '1748', '410781');
INSERT INTO `car_region` VALUES ('1761', '辉县市', '1748', '410782');
INSERT INTO `car_region` VALUES ('1762', '焦作市', '1674', '410800');
INSERT INTO `car_region` VALUES ('1763', '市辖区', '1762', '410801');
INSERT INTO `car_region` VALUES ('1764', '解放区', '1762', '410802');
INSERT INTO `car_region` VALUES ('1765', '中站区', '1762', '410803');
INSERT INTO `car_region` VALUES ('1766', '马村区', '1762', '410804');
INSERT INTO `car_region` VALUES ('1767', '山阳区', '1762', '410811');
INSERT INTO `car_region` VALUES ('1768', '修武县', '1762', '410821');
INSERT INTO `car_region` VALUES ('1769', '博爱县', '1762', '410822');
INSERT INTO `car_region` VALUES ('1770', '武陟县', '1762', '410823');
INSERT INTO `car_region` VALUES ('1771', '温　县', '1762', '410825');
INSERT INTO `car_region` VALUES ('1772', '济源市', '1762', '410881');
INSERT INTO `car_region` VALUES ('1773', '沁阳市', '1762', '410882');
INSERT INTO `car_region` VALUES ('1774', '孟州市', '1762', '410883');
INSERT INTO `car_region` VALUES ('1775', '濮阳市', '1674', '410900');
INSERT INTO `car_region` VALUES ('1776', '市辖区', '1775', '410901');
INSERT INTO `car_region` VALUES ('1777', '华龙区', '1775', '410902');
INSERT INTO `car_region` VALUES ('1778', '清丰县', '1775', '410922');
INSERT INTO `car_region` VALUES ('1779', '南乐县', '1775', '410923');
INSERT INTO `car_region` VALUES ('1780', '范　县', '1775', '410926');
INSERT INTO `car_region` VALUES ('1781', '台前县', '1775', '410927');
INSERT INTO `car_region` VALUES ('1782', '濮阳县', '1775', '410928');
INSERT INTO `car_region` VALUES ('1783', '许昌市', '1674', '411000');
INSERT INTO `car_region` VALUES ('1784', '市辖区', '1783', '411001');
INSERT INTO `car_region` VALUES ('1785', '魏都区', '1783', '411002');
INSERT INTO `car_region` VALUES ('1786', '许昌县', '1783', '411023');
INSERT INTO `car_region` VALUES ('1787', '鄢陵县', '1783', '411024');
INSERT INTO `car_region` VALUES ('1788', '襄城县', '1783', '411025');
INSERT INTO `car_region` VALUES ('1789', '禹州市', '1783', '411081');
INSERT INTO `car_region` VALUES ('1790', '长葛市', '1783', '411082');
INSERT INTO `car_region` VALUES ('1791', '漯河市', '1674', '411100');
INSERT INTO `car_region` VALUES ('1792', '市辖区', '1791', '411101');
INSERT INTO `car_region` VALUES ('1793', '源汇区', '1791', '411102');
INSERT INTO `car_region` VALUES ('1794', '郾城区', '1791', '411103');
INSERT INTO `car_region` VALUES ('1795', '召陵区', '1791', '411104');
INSERT INTO `car_region` VALUES ('1796', '舞阳县', '1791', '411121');
INSERT INTO `car_region` VALUES ('1797', '临颍县', '1791', '411122');
INSERT INTO `car_region` VALUES ('1798', '三门峡市', '1674', '411200');
INSERT INTO `car_region` VALUES ('1799', '市辖区', '1798', '411201');
INSERT INTO `car_region` VALUES ('1800', '湖滨区', '1798', '411202');
INSERT INTO `car_region` VALUES ('1801', '渑池县', '1798', '411221');
INSERT INTO `car_region` VALUES ('1802', '陕　县', '1798', '411222');
INSERT INTO `car_region` VALUES ('1803', '卢氏县', '1798', '411224');
INSERT INTO `car_region` VALUES ('1804', '义马市', '1798', '411281');
INSERT INTO `car_region` VALUES ('1805', '灵宝市', '1798', '411282');
INSERT INTO `car_region` VALUES ('1806', '南阳市', '1674', '411300');
INSERT INTO `car_region` VALUES ('1807', '市辖区', '1806', '411301');
INSERT INTO `car_region` VALUES ('1808', '宛城区', '1806', '411302');
INSERT INTO `car_region` VALUES ('1809', '卧龙区', '1806', '411303');
INSERT INTO `car_region` VALUES ('1810', '南召县', '1806', '411321');
INSERT INTO `car_region` VALUES ('1811', '方城县', '1806', '411322');
INSERT INTO `car_region` VALUES ('1812', '西峡县', '1806', '411323');
INSERT INTO `car_region` VALUES ('1813', '镇平县', '1806', '411324');
INSERT INTO `car_region` VALUES ('1814', '内乡县', '1806', '411325');
INSERT INTO `car_region` VALUES ('1815', '淅川县', '1806', '411326');
INSERT INTO `car_region` VALUES ('1816', '社旗县', '1806', '411327');
INSERT INTO `car_region` VALUES ('1817', '唐河县', '1806', '411328');
INSERT INTO `car_region` VALUES ('1818', '新野县', '1806', '411329');
INSERT INTO `car_region` VALUES ('1819', '桐柏县', '1806', '411330');
INSERT INTO `car_region` VALUES ('1820', '邓州市', '1806', '411381');
INSERT INTO `car_region` VALUES ('1821', '商丘市', '1674', '411400');
INSERT INTO `car_region` VALUES ('1822', '市辖区', '1821', '411401');
INSERT INTO `car_region` VALUES ('1823', '梁园区', '1821', '411402');
INSERT INTO `car_region` VALUES ('1824', '睢阳区', '1821', '411403');
INSERT INTO `car_region` VALUES ('1825', '民权县', '1821', '411421');
INSERT INTO `car_region` VALUES ('1826', '睢　县', '1821', '411422');
INSERT INTO `car_region` VALUES ('1827', '宁陵县', '1821', '411423');
INSERT INTO `car_region` VALUES ('1828', '柘城县', '1821', '411424');
INSERT INTO `car_region` VALUES ('1829', '虞城县', '1821', '411425');
INSERT INTO `car_region` VALUES ('1830', '夏邑县', '1821', '411426');
INSERT INTO `car_region` VALUES ('1831', '永城市', '1821', '411481');
INSERT INTO `car_region` VALUES ('1832', '信阳市', '1674', '411500');
INSERT INTO `car_region` VALUES ('1833', '市辖区', '1832', '411501');
INSERT INTO `car_region` VALUES ('1834', '师河区', '1832', '411502');
INSERT INTO `car_region` VALUES ('1835', '平桥区', '1832', '411503');
INSERT INTO `car_region` VALUES ('1836', '罗山县', '1832', '411521');
INSERT INTO `car_region` VALUES ('1837', '光山县', '1832', '411522');
INSERT INTO `car_region` VALUES ('1838', '新　县', '1832', '411523');
INSERT INTO `car_region` VALUES ('1839', '商城县', '1832', '411524');
INSERT INTO `car_region` VALUES ('1840', '固始县', '1832', '411525');
INSERT INTO `car_region` VALUES ('1841', '潢川县', '1832', '411526');
INSERT INTO `car_region` VALUES ('1842', '淮滨县', '1832', '411527');
INSERT INTO `car_region` VALUES ('1843', '息　县', '1832', '411528');
INSERT INTO `car_region` VALUES ('1844', '周口市', '1674', '411600');
INSERT INTO `car_region` VALUES ('1845', '市辖区', '1844', '411601');
INSERT INTO `car_region` VALUES ('1846', '川汇区', '1844', '411602');
INSERT INTO `car_region` VALUES ('1847', '扶沟县', '1844', '411621');
INSERT INTO `car_region` VALUES ('1848', '西华县', '1844', '411622');
INSERT INTO `car_region` VALUES ('1849', '商水县', '1844', '411623');
INSERT INTO `car_region` VALUES ('1850', '沈丘县', '1844', '411624');
INSERT INTO `car_region` VALUES ('1851', '郸城县', '1844', '411625');
INSERT INTO `car_region` VALUES ('1852', '淮阳县', '1844', '411626');
INSERT INTO `car_region` VALUES ('1853', '太康县', '1844', '411627');
INSERT INTO `car_region` VALUES ('1854', '鹿邑县', '1844', '411628');
INSERT INTO `car_region` VALUES ('1855', '项城市', '1844', '411681');
INSERT INTO `car_region` VALUES ('1856', '驻马店市', '1674', '411700');
INSERT INTO `car_region` VALUES ('1857', '市辖区', '1856', '411701');
INSERT INTO `car_region` VALUES ('1858', '驿城区', '1856', '411702');
INSERT INTO `car_region` VALUES ('1859', '西平县', '1856', '411721');
INSERT INTO `car_region` VALUES ('1860', '上蔡县', '1856', '411722');
INSERT INTO `car_region` VALUES ('1861', '平舆县', '1856', '411723');
INSERT INTO `car_region` VALUES ('1862', '正阳县', '1856', '411724');
INSERT INTO `car_region` VALUES ('1863', '确山县', '1856', '411725');
INSERT INTO `car_region` VALUES ('1864', '泌阳县', '1856', '411726');
INSERT INTO `car_region` VALUES ('1865', '汝南县', '1856', '411727');
INSERT INTO `car_region` VALUES ('1866', '遂平县', '1856', '411728');
INSERT INTO `car_region` VALUES ('1867', '新蔡县', '1856', '411729');
INSERT INTO `car_region` VALUES ('1868', '湖北省', '0', '420000');
INSERT INTO `car_region` VALUES ('1869', '武汉市', '1868', '420100');
INSERT INTO `car_region` VALUES ('1870', '市辖区', '1869', '420101');
INSERT INTO `car_region` VALUES ('1871', '江岸区', '1869', '420102');
INSERT INTO `car_region` VALUES ('1872', '江汉区', '1869', '420103');
INSERT INTO `car_region` VALUES ('1873', '乔口区', '1869', '420104');
INSERT INTO `car_region` VALUES ('1874', '汉阳区', '1869', '420105');
INSERT INTO `car_region` VALUES ('1875', '武昌区', '1869', '420106');
INSERT INTO `car_region` VALUES ('1876', '青山区', '1869', '420107');
INSERT INTO `car_region` VALUES ('1877', '洪山区', '1869', '420111');
INSERT INTO `car_region` VALUES ('1878', '东西湖区', '1869', '420112');
INSERT INTO `car_region` VALUES ('1879', '汉南区', '1869', '420113');
INSERT INTO `car_region` VALUES ('1880', '蔡甸区', '1869', '420114');
INSERT INTO `car_region` VALUES ('1881', '江夏区', '1869', '420115');
INSERT INTO `car_region` VALUES ('1882', '黄陂区', '1869', '420116');
INSERT INTO `car_region` VALUES ('1883', '新洲区', '1869', '420117');
INSERT INTO `car_region` VALUES ('1884', '黄石市', '1868', '420200');
INSERT INTO `car_region` VALUES ('1885', '市辖区', '1884', '420201');
INSERT INTO `car_region` VALUES ('1886', '黄石港区', '1884', '420202');
INSERT INTO `car_region` VALUES ('1887', '西塞山区', '1884', '420203');
INSERT INTO `car_region` VALUES ('1888', '下陆区', '1884', '420204');
INSERT INTO `car_region` VALUES ('1889', '铁山区', '1884', '420205');
INSERT INTO `car_region` VALUES ('1890', '阳新县', '1884', '420222');
INSERT INTO `car_region` VALUES ('1891', '大冶市', '1884', '420281');
INSERT INTO `car_region` VALUES ('1892', '十堰市', '1868', '420300');
INSERT INTO `car_region` VALUES ('1893', '市辖区', '1892', '420301');
INSERT INTO `car_region` VALUES ('1894', '茅箭区', '1892', '420302');
INSERT INTO `car_region` VALUES ('1895', '张湾区', '1892', '420303');
INSERT INTO `car_region` VALUES ('1896', '郧　县', '1892', '420321');
INSERT INTO `car_region` VALUES ('1897', '郧西县', '1892', '420322');
INSERT INTO `car_region` VALUES ('1898', '竹山县', '1892', '420323');
INSERT INTO `car_region` VALUES ('1899', '竹溪县', '1892', '420324');
INSERT INTO `car_region` VALUES ('1900', '房　县', '1892', '420325');
INSERT INTO `car_region` VALUES ('1901', '丹江口市', '1892', '420381');
INSERT INTO `car_region` VALUES ('1902', '宜昌市', '1868', '420500');
INSERT INTO `car_region` VALUES ('1903', '市辖区', '1902', '420501');
INSERT INTO `car_region` VALUES ('1904', '西陵区', '1902', '420502');
INSERT INTO `car_region` VALUES ('1905', '伍家岗区', '1902', '420503');
INSERT INTO `car_region` VALUES ('1906', '点军区', '1902', '420504');
INSERT INTO `car_region` VALUES ('1907', '猇亭区', '1902', '420505');
INSERT INTO `car_region` VALUES ('1908', '夷陵区', '1902', '420506');
INSERT INTO `car_region` VALUES ('1909', '远安县', '1902', '420525');
INSERT INTO `car_region` VALUES ('1910', '兴山县', '1902', '420526');
INSERT INTO `car_region` VALUES ('1911', '秭归县', '1902', '420527');
INSERT INTO `car_region` VALUES ('1912', '长阳土家族自治县', '1902', '420528');
INSERT INTO `car_region` VALUES ('1913', '五峰土家族自治县', '1902', '420529');
INSERT INTO `car_region` VALUES ('1914', '宜都市', '1902', '420581');
INSERT INTO `car_region` VALUES ('1915', '当阳市', '1902', '420582');
INSERT INTO `car_region` VALUES ('1916', '枝江市', '1902', '420583');
INSERT INTO `car_region` VALUES ('1917', '襄樊市', '1868', '420600');
INSERT INTO `car_region` VALUES ('1918', '市辖区', '1917', '420601');
INSERT INTO `car_region` VALUES ('1919', '襄城区', '1917', '420602');
INSERT INTO `car_region` VALUES ('1920', '樊城区', '1917', '420606');
INSERT INTO `car_region` VALUES ('1921', '襄阳区', '1917', '420607');
INSERT INTO `car_region` VALUES ('1922', '南漳县', '1917', '420624');
INSERT INTO `car_region` VALUES ('1923', '谷城县', '1917', '420625');
INSERT INTO `car_region` VALUES ('1924', '保康县', '1917', '420626');
INSERT INTO `car_region` VALUES ('1925', '老河口市', '1917', '420682');
INSERT INTO `car_region` VALUES ('1926', '枣阳市', '1917', '420683');
INSERT INTO `car_region` VALUES ('1927', '宜城市', '1917', '420684');
INSERT INTO `car_region` VALUES ('1928', '鄂州市', '1868', '420700');
INSERT INTO `car_region` VALUES ('1929', '市辖区', '1928', '420701');
INSERT INTO `car_region` VALUES ('1930', '梁子湖区', '1928', '420702');
INSERT INTO `car_region` VALUES ('1931', '华容区', '1928', '420703');
INSERT INTO `car_region` VALUES ('1932', '鄂城区', '1928', '420704');
INSERT INTO `car_region` VALUES ('1933', '荆门市', '1868', '420800');
INSERT INTO `car_region` VALUES ('1934', '市辖区', '1933', '420801');
INSERT INTO `car_region` VALUES ('1935', '东宝区', '1933', '420802');
INSERT INTO `car_region` VALUES ('1936', '掇刀区', '1933', '420804');
INSERT INTO `car_region` VALUES ('1937', '京山县', '1933', '420821');
INSERT INTO `car_region` VALUES ('1938', '沙洋县', '1933', '420822');
INSERT INTO `car_region` VALUES ('1939', '钟祥市', '1933', '420881');
INSERT INTO `car_region` VALUES ('1940', '孝感市', '1868', '420900');
INSERT INTO `car_region` VALUES ('1941', '市辖区', '1940', '420901');
INSERT INTO `car_region` VALUES ('1942', '孝南区', '1940', '420902');
INSERT INTO `car_region` VALUES ('1943', '孝昌县', '1940', '420921');
INSERT INTO `car_region` VALUES ('1944', '大悟县', '1940', '420922');
INSERT INTO `car_region` VALUES ('1945', '云梦县', '1940', '420923');
INSERT INTO `car_region` VALUES ('1946', '应城市', '1940', '420981');
INSERT INTO `car_region` VALUES ('1947', '安陆市', '1940', '420982');
INSERT INTO `car_region` VALUES ('1948', '汉川市', '1940', '420984');
INSERT INTO `car_region` VALUES ('1949', '荆州市', '1868', '421000');
INSERT INTO `car_region` VALUES ('1950', '市辖区', '1949', '421001');
INSERT INTO `car_region` VALUES ('1951', '沙市区', '1949', '421002');
INSERT INTO `car_region` VALUES ('1952', '荆州区', '1949', '421003');
INSERT INTO `car_region` VALUES ('1953', '公安县', '1949', '421022');
INSERT INTO `car_region` VALUES ('1954', '监利县', '1949', '421023');
INSERT INTO `car_region` VALUES ('1955', '江陵县', '1949', '421024');
INSERT INTO `car_region` VALUES ('1956', '石首市', '1949', '421081');
INSERT INTO `car_region` VALUES ('1957', '洪湖市', '1949', '421083');
INSERT INTO `car_region` VALUES ('1958', '松滋市', '1949', '421087');
INSERT INTO `car_region` VALUES ('1959', '黄冈市', '1868', '421100');
INSERT INTO `car_region` VALUES ('1960', '市辖区', '1959', '421101');
INSERT INTO `car_region` VALUES ('1961', '黄州区', '1959', '421102');
INSERT INTO `car_region` VALUES ('1962', '团风县', '1959', '421121');
INSERT INTO `car_region` VALUES ('1963', '红安县', '1959', '421122');
INSERT INTO `car_region` VALUES ('1964', '罗田县', '1959', '421123');
INSERT INTO `car_region` VALUES ('1965', '英山县', '1959', '421124');
INSERT INTO `car_region` VALUES ('1966', '浠水县', '1959', '421125');
INSERT INTO `car_region` VALUES ('1967', '蕲春县', '1959', '421126');
INSERT INTO `car_region` VALUES ('1968', '黄梅县', '1959', '421127');
INSERT INTO `car_region` VALUES ('1969', '麻城市', '1959', '421181');
INSERT INTO `car_region` VALUES ('1970', '武穴市', '1959', '421182');
INSERT INTO `car_region` VALUES ('1971', '咸宁市', '1868', '421200');
INSERT INTO `car_region` VALUES ('1972', '市辖区', '1971', '421201');
INSERT INTO `car_region` VALUES ('1973', '咸安区', '1971', '421202');
INSERT INTO `car_region` VALUES ('1974', '嘉鱼县', '1971', '421221');
INSERT INTO `car_region` VALUES ('1975', '通城县', '1971', '421222');
INSERT INTO `car_region` VALUES ('1976', '崇阳县', '1971', '421223');
INSERT INTO `car_region` VALUES ('1977', '通山县', '1971', '421224');
INSERT INTO `car_region` VALUES ('1978', '赤壁市', '1971', '421281');
INSERT INTO `car_region` VALUES ('1979', '随州市', '1868', '421300');
INSERT INTO `car_region` VALUES ('1980', '市辖区', '1979', '421301');
INSERT INTO `car_region` VALUES ('1981', '曾都区', '1979', '421302');
INSERT INTO `car_region` VALUES ('1982', '广水市', '1979', '421381');
INSERT INTO `car_region` VALUES ('1983', '恩施土家族苗族自治州', '1868', '422800');
INSERT INTO `car_region` VALUES ('1984', '恩施市', '1983', '422801');
INSERT INTO `car_region` VALUES ('1985', '利川市', '1983', '422802');
INSERT INTO `car_region` VALUES ('1986', '建始县', '1983', '422822');
INSERT INTO `car_region` VALUES ('1987', '巴东县', '1983', '422823');
INSERT INTO `car_region` VALUES ('1988', '宣恩县', '1983', '422825');
INSERT INTO `car_region` VALUES ('1989', '咸丰县', '1983', '422826');
INSERT INTO `car_region` VALUES ('1990', '来凤县', '1983', '422827');
INSERT INTO `car_region` VALUES ('1991', '鹤峰县', '1983', '422828');
INSERT INTO `car_region` VALUES ('1992', '省直辖行政单位', '1868', '429000');
INSERT INTO `car_region` VALUES ('1993', '仙桃市', '1992', '429004');
INSERT INTO `car_region` VALUES ('1994', '潜江市', '1992', '429005');
INSERT INTO `car_region` VALUES ('1995', '天门市', '1992', '429006');
INSERT INTO `car_region` VALUES ('1996', '神农架林区', '1992', '429021');
INSERT INTO `car_region` VALUES ('1997', '湖南省', '0', '430000');
INSERT INTO `car_region` VALUES ('1998', '长沙市', '1997', '430100');
INSERT INTO `car_region` VALUES ('1999', '市辖区', '1998', '430101');
INSERT INTO `car_region` VALUES ('2000', '芙蓉区', '1998', '430102');
INSERT INTO `car_region` VALUES ('2001', '天心区', '1998', '430103');
INSERT INTO `car_region` VALUES ('2002', '岳麓区', '1998', '430104');
INSERT INTO `car_region` VALUES ('2003', '开福区', '1998', '430105');
INSERT INTO `car_region` VALUES ('2004', '雨花区', '1998', '430111');
INSERT INTO `car_region` VALUES ('2005', '长沙县', '1998', '430121');
INSERT INTO `car_region` VALUES ('2006', '望城县', '1998', '430122');
INSERT INTO `car_region` VALUES ('2007', '宁乡县', '1998', '430124');
INSERT INTO `car_region` VALUES ('2008', '浏阳市', '1998', '430181');
INSERT INTO `car_region` VALUES ('2009', '株洲市', '1997', '430200');
INSERT INTO `car_region` VALUES ('2010', '市辖区', '2009', '430201');
INSERT INTO `car_region` VALUES ('2011', '荷塘区', '2009', '430202');
INSERT INTO `car_region` VALUES ('2012', '芦淞区', '2009', '430203');
INSERT INTO `car_region` VALUES ('2013', '石峰区', '2009', '430204');
INSERT INTO `car_region` VALUES ('2014', '天元区', '2009', '430211');
INSERT INTO `car_region` VALUES ('2015', '株洲县', '2009', '430221');
INSERT INTO `car_region` VALUES ('2016', '攸　县', '2009', '430223');
INSERT INTO `car_region` VALUES ('2017', '茶陵县', '2009', '430224');
INSERT INTO `car_region` VALUES ('2018', '炎陵县', '2009', '430225');
INSERT INTO `car_region` VALUES ('2019', '醴陵市', '2009', '430281');
INSERT INTO `car_region` VALUES ('2020', '湘潭市', '1997', '430300');
INSERT INTO `car_region` VALUES ('2021', '市辖区', '2020', '430301');
INSERT INTO `car_region` VALUES ('2022', '雨湖区', '2020', '430302');
INSERT INTO `car_region` VALUES ('2023', '岳塘区', '2020', '430304');
INSERT INTO `car_region` VALUES ('2024', '湘潭县', '2020', '430321');
INSERT INTO `car_region` VALUES ('2025', '湘乡市', '2020', '430381');
INSERT INTO `car_region` VALUES ('2026', '韶山市', '2020', '430382');
INSERT INTO `car_region` VALUES ('2027', '衡阳市', '1997', '430400');
INSERT INTO `car_region` VALUES ('2028', '市辖区', '2027', '430401');
INSERT INTO `car_region` VALUES ('2029', '珠晖区', '2027', '430405');
INSERT INTO `car_region` VALUES ('2030', '雁峰区', '2027', '430406');
INSERT INTO `car_region` VALUES ('2031', '石鼓区', '2027', '430407');
INSERT INTO `car_region` VALUES ('2032', '蒸湘区', '2027', '430408');
INSERT INTO `car_region` VALUES ('2033', '南岳区', '2027', '430412');
INSERT INTO `car_region` VALUES ('2034', '衡阳县', '2027', '430421');
INSERT INTO `car_region` VALUES ('2035', '衡南县', '2027', '430422');
INSERT INTO `car_region` VALUES ('2036', '衡山县', '2027', '430423');
INSERT INTO `car_region` VALUES ('2037', '衡东县', '2027', '430424');
INSERT INTO `car_region` VALUES ('2038', '祁东县', '2027', '430426');
INSERT INTO `car_region` VALUES ('2039', '耒阳市', '2027', '430481');
INSERT INTO `car_region` VALUES ('2040', '常宁市', '2027', '430482');
INSERT INTO `car_region` VALUES ('2041', '邵阳市', '1997', '430500');
INSERT INTO `car_region` VALUES ('2042', '市辖区', '2041', '430501');
INSERT INTO `car_region` VALUES ('2043', '双清区', '2041', '430502');
INSERT INTO `car_region` VALUES ('2044', '大祥区', '2041', '430503');
INSERT INTO `car_region` VALUES ('2045', '北塔区', '2041', '430511');
INSERT INTO `car_region` VALUES ('2046', '邵东县', '2041', '430521');
INSERT INTO `car_region` VALUES ('2047', '新邵县', '2041', '430522');
INSERT INTO `car_region` VALUES ('2048', '邵阳县', '2041', '430523');
INSERT INTO `car_region` VALUES ('2049', '隆回县', '2041', '430524');
INSERT INTO `car_region` VALUES ('2050', '洞口县', '2041', '430525');
INSERT INTO `car_region` VALUES ('2051', '绥宁县', '2041', '430527');
INSERT INTO `car_region` VALUES ('2052', '新宁县', '2041', '430528');
INSERT INTO `car_region` VALUES ('2053', '城步苗族自治县', '2041', '430529');
INSERT INTO `car_region` VALUES ('2054', '武冈市', '2041', '430581');
INSERT INTO `car_region` VALUES ('2055', '岳阳市', '1997', '430600');
INSERT INTO `car_region` VALUES ('2056', '市辖区', '2055', '430601');
INSERT INTO `car_region` VALUES ('2057', '岳阳楼区', '2055', '430602');
INSERT INTO `car_region` VALUES ('2058', '云溪区', '2055', '430603');
INSERT INTO `car_region` VALUES ('2059', '君山区', '2055', '430611');
INSERT INTO `car_region` VALUES ('2060', '岳阳县', '2055', '430621');
INSERT INTO `car_region` VALUES ('2061', '华容县', '2055', '430623');
INSERT INTO `car_region` VALUES ('2062', '湘阴县', '2055', '430624');
INSERT INTO `car_region` VALUES ('2063', '平江县', '2055', '430626');
INSERT INTO `car_region` VALUES ('2064', '汨罗市', '2055', '430681');
INSERT INTO `car_region` VALUES ('2065', '临湘市', '2055', '430682');
INSERT INTO `car_region` VALUES ('2066', '常德市', '1997', '430700');
INSERT INTO `car_region` VALUES ('2067', '市辖区', '2066', '430701');
INSERT INTO `car_region` VALUES ('2068', '武陵区', '2066', '430702');
INSERT INTO `car_region` VALUES ('2069', '鼎城区', '2066', '430703');
INSERT INTO `car_region` VALUES ('2070', '安乡县', '2066', '430721');
INSERT INTO `car_region` VALUES ('2071', '汉寿县', '2066', '430722');
INSERT INTO `car_region` VALUES ('2072', '澧　县', '2066', '430723');
INSERT INTO `car_region` VALUES ('2073', '临澧县', '2066', '430724');
INSERT INTO `car_region` VALUES ('2074', '桃源县', '2066', '430725');
INSERT INTO `car_region` VALUES ('2075', '石门县', '2066', '430726');
INSERT INTO `car_region` VALUES ('2076', '津市市', '2066', '430781');
INSERT INTO `car_region` VALUES ('2077', '张家界市', '1997', '430800');
INSERT INTO `car_region` VALUES ('2078', '市辖区', '2077', '430801');
INSERT INTO `car_region` VALUES ('2079', '永定区', '2077', '430802');
INSERT INTO `car_region` VALUES ('2080', '武陵源区', '2077', '430811');
INSERT INTO `car_region` VALUES ('2081', '慈利县', '2077', '430821');
INSERT INTO `car_region` VALUES ('2082', '桑植县', '2077', '430822');
INSERT INTO `car_region` VALUES ('2083', '益阳市', '1997', '430900');
INSERT INTO `car_region` VALUES ('2084', '市辖区', '2083', '430901');
INSERT INTO `car_region` VALUES ('2085', '资阳区', '2083', '430902');
INSERT INTO `car_region` VALUES ('2086', '赫山区', '2083', '430903');
INSERT INTO `car_region` VALUES ('2087', '南　县', '2083', '430921');
INSERT INTO `car_region` VALUES ('2088', '桃江县', '2083', '430922');
INSERT INTO `car_region` VALUES ('2089', '安化县', '2083', '430923');
INSERT INTO `car_region` VALUES ('2090', '沅江市', '2083', '430981');
INSERT INTO `car_region` VALUES ('2091', '郴州市', '1997', '431000');
INSERT INTO `car_region` VALUES ('2092', '市辖区', '2091', '431001');
INSERT INTO `car_region` VALUES ('2093', '北湖区', '2091', '431002');
INSERT INTO `car_region` VALUES ('2094', '苏仙区', '2091', '431003');
INSERT INTO `car_region` VALUES ('2095', '桂阳县', '2091', '431021');
INSERT INTO `car_region` VALUES ('2096', '宜章县', '2091', '431022');
INSERT INTO `car_region` VALUES ('2097', '永兴县', '2091', '431023');
INSERT INTO `car_region` VALUES ('2098', '嘉禾县', '2091', '431024');
INSERT INTO `car_region` VALUES ('2099', '临武县', '2091', '431025');
INSERT INTO `car_region` VALUES ('2100', '汝城县', '2091', '431026');
INSERT INTO `car_region` VALUES ('2101', '桂东县', '2091', '431027');
INSERT INTO `car_region` VALUES ('2102', '安仁县', '2091', '431028');
INSERT INTO `car_region` VALUES ('2103', '资兴市', '2091', '431081');
INSERT INTO `car_region` VALUES ('2104', '永州市', '1997', '431100');
INSERT INTO `car_region` VALUES ('2105', '市辖区', '2104', '431101');
INSERT INTO `car_region` VALUES ('2106', '芝山区', '2104', '431102');
INSERT INTO `car_region` VALUES ('2107', '冷水滩区', '2104', '431103');
INSERT INTO `car_region` VALUES ('2108', '祁阳县', '2104', '431121');
INSERT INTO `car_region` VALUES ('2109', '东安县', '2104', '431122');
INSERT INTO `car_region` VALUES ('2110', '双牌县', '2104', '431123');
INSERT INTO `car_region` VALUES ('2111', '道　县', '2104', '431124');
INSERT INTO `car_region` VALUES ('2112', '江永县', '2104', '431125');
INSERT INTO `car_region` VALUES ('2113', '宁远县', '2104', '431126');
INSERT INTO `car_region` VALUES ('2114', '蓝山县', '2104', '431127');
INSERT INTO `car_region` VALUES ('2115', '新田县', '2104', '431128');
INSERT INTO `car_region` VALUES ('2116', '江华瑶族自治县', '2104', '431129');
INSERT INTO `car_region` VALUES ('2117', '怀化市', '1997', '431200');
INSERT INTO `car_region` VALUES ('2118', '市辖区', '2117', '431201');
INSERT INTO `car_region` VALUES ('2119', '鹤城区', '2117', '431202');
INSERT INTO `car_region` VALUES ('2120', '中方县', '2117', '431221');
INSERT INTO `car_region` VALUES ('2121', '沅陵县', '2117', '431222');
INSERT INTO `car_region` VALUES ('2122', '辰溪县', '2117', '431223');
INSERT INTO `car_region` VALUES ('2123', '溆浦县', '2117', '431224');
INSERT INTO `car_region` VALUES ('2124', '会同县', '2117', '431225');
INSERT INTO `car_region` VALUES ('2125', '麻阳苗族自治县', '2117', '431226');
INSERT INTO `car_region` VALUES ('2126', '新晃侗族自治县', '2117', '431227');
INSERT INTO `car_region` VALUES ('2127', '芷江侗族自治县', '2117', '431228');
INSERT INTO `car_region` VALUES ('2128', '靖州苗族侗族自治县', '2117', '431229');
INSERT INTO `car_region` VALUES ('2129', '通道侗族自治县', '2117', '431230');
INSERT INTO `car_region` VALUES ('2130', '洪江市', '2117', '431281');
INSERT INTO `car_region` VALUES ('2131', '娄底市', '1997', '431300');
INSERT INTO `car_region` VALUES ('2132', '市辖区', '2131', '431301');
INSERT INTO `car_region` VALUES ('2133', '娄星区', '2131', '431302');
INSERT INTO `car_region` VALUES ('2134', '双峰县', '2131', '431321');
INSERT INTO `car_region` VALUES ('2135', '新化县', '2131', '431322');
INSERT INTO `car_region` VALUES ('2136', '冷水江市', '2131', '431381');
INSERT INTO `car_region` VALUES ('2137', '涟源市', '2131', '431382');
INSERT INTO `car_region` VALUES ('2138', '湘西土家族苗族自治州', '1997', '433100');
INSERT INTO `car_region` VALUES ('2139', '吉首市', '2138', '433101');
INSERT INTO `car_region` VALUES ('2140', '泸溪县', '2138', '433122');
INSERT INTO `car_region` VALUES ('2141', '凤凰县', '2138', '433123');
INSERT INTO `car_region` VALUES ('2142', '花垣县', '2138', '433124');
INSERT INTO `car_region` VALUES ('2143', '保靖县', '2138', '433125');
INSERT INTO `car_region` VALUES ('2144', '古丈县', '2138', '433126');
INSERT INTO `car_region` VALUES ('2145', '永顺县', '2138', '433127');
INSERT INTO `car_region` VALUES ('2146', '龙山县', '2138', '433130');
INSERT INTO `car_region` VALUES ('2147', '广东省', '0', '440000');
INSERT INTO `car_region` VALUES ('2148', '广州市', '2147', '440100');
INSERT INTO `car_region` VALUES ('2149', '市辖区', '2148', '440101');
INSERT INTO `car_region` VALUES ('2150', '东山区', '2148', '440102');
INSERT INTO `car_region` VALUES ('2151', '荔湾区', '2148', '440103');
INSERT INTO `car_region` VALUES ('2152', '越秀区', '2148', '440104');
INSERT INTO `car_region` VALUES ('2153', '海珠区', '2148', '440105');
INSERT INTO `car_region` VALUES ('2154', '天河区', '2148', '440106');
INSERT INTO `car_region` VALUES ('2155', '芳村区', '2148', '440107');
INSERT INTO `car_region` VALUES ('2156', '白云区', '2148', '440111');
INSERT INTO `car_region` VALUES ('2157', '黄埔区', '2148', '440112');
INSERT INTO `car_region` VALUES ('2158', '番禺区', '2148', '440113');
INSERT INTO `car_region` VALUES ('2159', '花都区', '2148', '440114');
INSERT INTO `car_region` VALUES ('2160', '增城市', '2148', '440183');
INSERT INTO `car_region` VALUES ('2161', '从化市', '2148', '440184');
INSERT INTO `car_region` VALUES ('2162', '韶关市', '2147', '440200');
INSERT INTO `car_region` VALUES ('2163', '市辖区', '2162', '440201');
INSERT INTO `car_region` VALUES ('2164', '武江区', '2162', '440203');
INSERT INTO `car_region` VALUES ('2165', '浈江区', '2162', '440204');
INSERT INTO `car_region` VALUES ('2166', '曲江区', '2162', '440205');
INSERT INTO `car_region` VALUES ('2167', '始兴县', '2162', '440222');
INSERT INTO `car_region` VALUES ('2168', '仁化县', '2162', '440224');
INSERT INTO `car_region` VALUES ('2169', '翁源县', '2162', '440229');
INSERT INTO `car_region` VALUES ('2170', '乳源瑶族自治县', '2162', '440232');
INSERT INTO `car_region` VALUES ('2171', '新丰县', '2162', '440233');
INSERT INTO `car_region` VALUES ('2172', '乐昌市', '2162', '440281');
INSERT INTO `car_region` VALUES ('2173', '南雄市', '2162', '440282');
INSERT INTO `car_region` VALUES ('2174', '深圳市', '2147', '440300');
INSERT INTO `car_region` VALUES ('2175', '市辖区', '2174', '440301');
INSERT INTO `car_region` VALUES ('2176', '罗湖区', '2174', '440303');
INSERT INTO `car_region` VALUES ('2177', '福田区', '2174', '440304');
INSERT INTO `car_region` VALUES ('2178', '南山区', '2174', '440305');
INSERT INTO `car_region` VALUES ('2179', '宝安区', '2174', '440306');
INSERT INTO `car_region` VALUES ('2180', '龙岗区', '2174', '440307');
INSERT INTO `car_region` VALUES ('2181', '盐田区', '2174', '440308');
INSERT INTO `car_region` VALUES ('2182', '珠海市', '2147', '440400');
INSERT INTO `car_region` VALUES ('2183', '市辖区', '2182', '440401');
INSERT INTO `car_region` VALUES ('2184', '香洲区', '2182', '440402');
INSERT INTO `car_region` VALUES ('2185', '斗门区', '2182', '440403');
INSERT INTO `car_region` VALUES ('2186', '金湾区', '2182', '440404');
INSERT INTO `car_region` VALUES ('2187', '汕头市', '2147', '440500');
INSERT INTO `car_region` VALUES ('2188', '市辖区', '2187', '440501');
INSERT INTO `car_region` VALUES ('2189', '龙湖区', '2187', '440507');
INSERT INTO `car_region` VALUES ('2190', '金平区', '2187', '440511');
INSERT INTO `car_region` VALUES ('2191', '濠江区', '2187', '440512');
INSERT INTO `car_region` VALUES ('2192', '潮阳区', '2187', '440513');
INSERT INTO `car_region` VALUES ('2193', '潮南区', '2187', '440514');
INSERT INTO `car_region` VALUES ('2194', '澄海区', '2187', '440515');
INSERT INTO `car_region` VALUES ('2195', '南澳县', '2187', '440523');
INSERT INTO `car_region` VALUES ('2196', '佛山市', '2147', '440600');
INSERT INTO `car_region` VALUES ('2197', '市辖区', '2196', '440601');
INSERT INTO `car_region` VALUES ('2198', '禅城区', '2196', '440604');
INSERT INTO `car_region` VALUES ('2199', '南海区', '2196', '440605');
INSERT INTO `car_region` VALUES ('2200', '顺德区', '2196', '440606');
INSERT INTO `car_region` VALUES ('2201', '三水区', '2196', '440607');
INSERT INTO `car_region` VALUES ('2202', '高明区', '2196', '440608');
INSERT INTO `car_region` VALUES ('2203', '江门市', '2147', '440700');
INSERT INTO `car_region` VALUES ('2204', '市辖区', '2203', '440701');
INSERT INTO `car_region` VALUES ('2205', '蓬江区', '2203', '440703');
INSERT INTO `car_region` VALUES ('2206', '江海区', '2203', '440704');
INSERT INTO `car_region` VALUES ('2207', '新会区', '2203', '440705');
INSERT INTO `car_region` VALUES ('2208', '台山市', '2203', '440781');
INSERT INTO `car_region` VALUES ('2209', '开平市', '2203', '440783');
INSERT INTO `car_region` VALUES ('2210', '鹤山市', '2203', '440784');
INSERT INTO `car_region` VALUES ('2211', '恩平市', '2203', '440785');
INSERT INTO `car_region` VALUES ('2212', '湛江市', '2147', '440800');
INSERT INTO `car_region` VALUES ('2213', '市辖区', '2212', '440801');
INSERT INTO `car_region` VALUES ('2214', '赤坎区', '2212', '440802');
INSERT INTO `car_region` VALUES ('2215', '霞山区', '2212', '440803');
INSERT INTO `car_region` VALUES ('2216', '坡头区', '2212', '440804');
INSERT INTO `car_region` VALUES ('2217', '麻章区', '2212', '440811');
INSERT INTO `car_region` VALUES ('2218', '遂溪县', '2212', '440823');
INSERT INTO `car_region` VALUES ('2219', '徐闻县', '2212', '440825');
INSERT INTO `car_region` VALUES ('2220', '廉江市', '2212', '440881');
INSERT INTO `car_region` VALUES ('2221', '雷州市', '2212', '440882');
INSERT INTO `car_region` VALUES ('2222', '吴川市', '2212', '440883');
INSERT INTO `car_region` VALUES ('2223', '茂名市', '2147', '440900');
INSERT INTO `car_region` VALUES ('2224', '市辖区', '2223', '440901');
INSERT INTO `car_region` VALUES ('2225', '茂南区', '2223', '440902');
INSERT INTO `car_region` VALUES ('2226', '茂港区', '2223', '440903');
INSERT INTO `car_region` VALUES ('2227', '电白县', '2223', '440923');
INSERT INTO `car_region` VALUES ('2228', '高州市', '2223', '440981');
INSERT INTO `car_region` VALUES ('2229', '化州市', '2223', '440982');
INSERT INTO `car_region` VALUES ('2230', '信宜市', '2223', '440983');
INSERT INTO `car_region` VALUES ('2231', '肇庆市', '2147', '441200');
INSERT INTO `car_region` VALUES ('2232', '市辖区', '2231', '441201');
INSERT INTO `car_region` VALUES ('2233', '端州区', '2231', '441202');
INSERT INTO `car_region` VALUES ('2234', '鼎湖区', '2231', '441203');
INSERT INTO `car_region` VALUES ('2235', '广宁县', '2231', '441223');
INSERT INTO `car_region` VALUES ('2236', '怀集县', '2231', '441224');
INSERT INTO `car_region` VALUES ('2237', '封开县', '2231', '441225');
INSERT INTO `car_region` VALUES ('2238', '德庆县', '2231', '441226');
INSERT INTO `car_region` VALUES ('2239', '高要市', '2231', '441283');
INSERT INTO `car_region` VALUES ('2240', '四会市', '2231', '441284');
INSERT INTO `car_region` VALUES ('2241', '惠州市', '2147', '441300');
INSERT INTO `car_region` VALUES ('2242', '市辖区', '2241', '441301');
INSERT INTO `car_region` VALUES ('2243', '惠城区', '2241', '441302');
INSERT INTO `car_region` VALUES ('2244', '惠阳区', '2241', '441303');
INSERT INTO `car_region` VALUES ('2245', '博罗县', '2241', '441322');
INSERT INTO `car_region` VALUES ('2246', '惠东县', '2241', '441323');
INSERT INTO `car_region` VALUES ('2247', '龙门县', '2241', '441324');
INSERT INTO `car_region` VALUES ('2248', '梅州市', '2147', '441400');
INSERT INTO `car_region` VALUES ('2249', '市辖区', '2248', '441401');
INSERT INTO `car_region` VALUES ('2250', '梅江区', '2248', '441402');
INSERT INTO `car_region` VALUES ('2251', '梅　县', '2248', '441421');
INSERT INTO `car_region` VALUES ('2252', '大埔县', '2248', '441422');
INSERT INTO `car_region` VALUES ('2253', '丰顺县', '2248', '441423');
INSERT INTO `car_region` VALUES ('2254', '五华县', '2248', '441424');
INSERT INTO `car_region` VALUES ('2255', '平远县', '2248', '441426');
INSERT INTO `car_region` VALUES ('2256', '蕉岭县', '2248', '441427');
INSERT INTO `car_region` VALUES ('2257', '兴宁市', '2248', '441481');
INSERT INTO `car_region` VALUES ('2258', '汕尾市', '2147', '441500');
INSERT INTO `car_region` VALUES ('2259', '市辖区', '2258', '441501');
INSERT INTO `car_region` VALUES ('2260', '城　区', '2258', '441502');
INSERT INTO `car_region` VALUES ('2261', '海丰县', '2258', '441521');
INSERT INTO `car_region` VALUES ('2262', '陆河县', '2258', '441523');
INSERT INTO `car_region` VALUES ('2263', '陆丰市', '2258', '441581');
INSERT INTO `car_region` VALUES ('2264', '河源市', '2147', '441600');
INSERT INTO `car_region` VALUES ('2265', '市辖区', '2264', '441601');
INSERT INTO `car_region` VALUES ('2266', '源城区', '2264', '441602');
INSERT INTO `car_region` VALUES ('2267', '紫金县', '2264', '441621');
INSERT INTO `car_region` VALUES ('2268', '龙川县', '2264', '441622');
INSERT INTO `car_region` VALUES ('2269', '连平县', '2264', '441623');
INSERT INTO `car_region` VALUES ('2270', '和平县', '2264', '441624');
INSERT INTO `car_region` VALUES ('2271', '东源县', '2264', '441625');
INSERT INTO `car_region` VALUES ('2272', '阳江市', '2147', '441700');
INSERT INTO `car_region` VALUES ('2273', '市辖区', '2272', '441701');
INSERT INTO `car_region` VALUES ('2274', '江城区', '2272', '441702');
INSERT INTO `car_region` VALUES ('2275', '阳西县', '2272', '441721');
INSERT INTO `car_region` VALUES ('2276', '阳东县', '2272', '441723');
INSERT INTO `car_region` VALUES ('2277', '阳春市', '2272', '441781');
INSERT INTO `car_region` VALUES ('2278', '清远市', '2147', '441800');
INSERT INTO `car_region` VALUES ('2279', '市辖区', '2278', '441801');
INSERT INTO `car_region` VALUES ('2280', '清城区', '2278', '441802');
INSERT INTO `car_region` VALUES ('2281', '佛冈县', '2278', '441821');
INSERT INTO `car_region` VALUES ('2282', '阳山县', '2278', '441823');
INSERT INTO `car_region` VALUES ('2283', '连山壮族瑶族自治县', '2278', '441825');
INSERT INTO `car_region` VALUES ('2284', '连南瑶族自治县', '2278', '441826');
INSERT INTO `car_region` VALUES ('2285', '清新县', '2278', '441827');
INSERT INTO `car_region` VALUES ('2286', '英德市', '2278', '441881');
INSERT INTO `car_region` VALUES ('2287', '连州市', '2278', '441882');
INSERT INTO `car_region` VALUES ('2288', '东莞市', '2147', '441900');
INSERT INTO `car_region` VALUES ('2289', '中山市', '2147', '442000');
INSERT INTO `car_region` VALUES ('2290', '潮州市', '2147', '445100');
INSERT INTO `car_region` VALUES ('2291', '市辖区', '2290', '445101');
INSERT INTO `car_region` VALUES ('2292', '湘桥区', '2290', '445102');
INSERT INTO `car_region` VALUES ('2293', '潮安县', '2290', '445121');
INSERT INTO `car_region` VALUES ('2294', '饶平县', '2290', '445122');
INSERT INTO `car_region` VALUES ('2295', '揭阳市', '2147', '445200');
INSERT INTO `car_region` VALUES ('2296', '市辖区', '2295', '445201');
INSERT INTO `car_region` VALUES ('2297', '榕城区', '2295', '445202');
INSERT INTO `car_region` VALUES ('2298', '揭东县', '2295', '445221');
INSERT INTO `car_region` VALUES ('2299', '揭西县', '2295', '445222');
INSERT INTO `car_region` VALUES ('2300', '惠来县', '2295', '445224');
INSERT INTO `car_region` VALUES ('2301', '普宁市', '2295', '445281');
INSERT INTO `car_region` VALUES ('2302', '云浮市', '2147', '445300');
INSERT INTO `car_region` VALUES ('2303', '市辖区', '2302', '445301');
INSERT INTO `car_region` VALUES ('2304', '云城区', '2302', '445302');
INSERT INTO `car_region` VALUES ('2305', '新兴县', '2302', '445321');
INSERT INTO `car_region` VALUES ('2306', '郁南县', '2302', '445322');
INSERT INTO `car_region` VALUES ('2307', '云安县', '2302', '445323');
INSERT INTO `car_region` VALUES ('2308', '罗定市', '2302', '445381');
INSERT INTO `car_region` VALUES ('2309', '广西壮族自治区', '0', '450000');
INSERT INTO `car_region` VALUES ('2310', '南宁市', '2309', '450100');
INSERT INTO `car_region` VALUES ('2311', '市辖区', '2310', '450101');
INSERT INTO `car_region` VALUES ('2312', '兴宁区', '2310', '450102');
INSERT INTO `car_region` VALUES ('2313', '青秀区', '2310', '450103');
INSERT INTO `car_region` VALUES ('2314', '江南区', '2310', '450105');
INSERT INTO `car_region` VALUES ('2315', '西乡塘区', '2310', '450107');
INSERT INTO `car_region` VALUES ('2316', '良庆区', '2310', '450108');
INSERT INTO `car_region` VALUES ('2317', '邕宁区', '2310', '450109');
INSERT INTO `car_region` VALUES ('2318', '武鸣县', '2310', '450122');
INSERT INTO `car_region` VALUES ('2319', '隆安县', '2310', '450123');
INSERT INTO `car_region` VALUES ('2320', '马山县', '2310', '450124');
INSERT INTO `car_region` VALUES ('2321', '上林县', '2310', '450125');
INSERT INTO `car_region` VALUES ('2322', '宾阳县', '2310', '450126');
INSERT INTO `car_region` VALUES ('2323', '横　县', '2310', '450127');
INSERT INTO `car_region` VALUES ('2324', '柳州市', '2309', '450200');
INSERT INTO `car_region` VALUES ('2325', '市辖区', '2324', '450201');
INSERT INTO `car_region` VALUES ('2326', '城中区', '2324', '450202');
INSERT INTO `car_region` VALUES ('2327', '鱼峰区', '2324', '450203');
INSERT INTO `car_region` VALUES ('2328', '柳南区', '2324', '450204');
INSERT INTO `car_region` VALUES ('2329', '柳北区', '2324', '450205');
INSERT INTO `car_region` VALUES ('2330', '柳江县', '2324', '450221');
INSERT INTO `car_region` VALUES ('2331', '柳城县', '2324', '450222');
INSERT INTO `car_region` VALUES ('2332', '鹿寨县', '2324', '450223');
INSERT INTO `car_region` VALUES ('2333', '融安县', '2324', '450224');
INSERT INTO `car_region` VALUES ('2334', '融水苗族自治县', '2324', '450225');
INSERT INTO `car_region` VALUES ('2335', '三江侗族自治县', '2324', '450226');
INSERT INTO `car_region` VALUES ('2336', '桂林市', '2309', '450300');
INSERT INTO `car_region` VALUES ('2337', '市辖区', '2336', '450301');
INSERT INTO `car_region` VALUES ('2338', '秀峰区', '2336', '450302');
INSERT INTO `car_region` VALUES ('2339', '叠彩区', '2336', '450303');
INSERT INTO `car_region` VALUES ('2340', '象山区', '2336', '450304');
INSERT INTO `car_region` VALUES ('2341', '七星区', '2336', '450305');
INSERT INTO `car_region` VALUES ('2342', '雁山区', '2336', '450311');
INSERT INTO `car_region` VALUES ('2343', '阳朔县', '2336', '450321');
INSERT INTO `car_region` VALUES ('2344', '临桂县', '2336', '450322');
INSERT INTO `car_region` VALUES ('2345', '灵川县', '2336', '450323');
INSERT INTO `car_region` VALUES ('2346', '全州县', '2336', '450324');
INSERT INTO `car_region` VALUES ('2347', '兴安县', '2336', '450325');
INSERT INTO `car_region` VALUES ('2348', '永福县', '2336', '450326');
INSERT INTO `car_region` VALUES ('2349', '灌阳县', '2336', '450327');
INSERT INTO `car_region` VALUES ('2350', '龙胜各族自治县', '2336', '450328');
INSERT INTO `car_region` VALUES ('2351', '资源县', '2336', '450329');
INSERT INTO `car_region` VALUES ('2352', '平乐县', '2336', '450330');
INSERT INTO `car_region` VALUES ('2353', '荔蒲县', '2336', '450331');
INSERT INTO `car_region` VALUES ('2354', '恭城瑶族自治县', '2336', '450332');
INSERT INTO `car_region` VALUES ('2355', '梧州市', '2309', '450400');
INSERT INTO `car_region` VALUES ('2356', '市辖区', '2355', '450401');
INSERT INTO `car_region` VALUES ('2357', '万秀区', '2355', '450403');
INSERT INTO `car_region` VALUES ('2358', '蝶山区', '2355', '450404');
INSERT INTO `car_region` VALUES ('2359', '长洲区', '2355', '450405');
INSERT INTO `car_region` VALUES ('2360', '苍梧县', '2355', '450421');
INSERT INTO `car_region` VALUES ('2361', '藤　县', '2355', '450422');
INSERT INTO `car_region` VALUES ('2362', '蒙山县', '2355', '450423');
INSERT INTO `car_region` VALUES ('2363', '岑溪市', '2355', '450481');
INSERT INTO `car_region` VALUES ('2364', '北海市', '2309', '450500');
INSERT INTO `car_region` VALUES ('2365', '市辖区', '2364', '450501');
INSERT INTO `car_region` VALUES ('2366', '海城区', '2364', '450502');
INSERT INTO `car_region` VALUES ('2367', '银海区', '2364', '450503');
INSERT INTO `car_region` VALUES ('2368', '铁山港区', '2364', '450512');
INSERT INTO `car_region` VALUES ('2369', '合浦县', '2364', '450521');
INSERT INTO `car_region` VALUES ('2370', '防城港市', '2309', '450600');
INSERT INTO `car_region` VALUES ('2371', '市辖区', '2370', '450601');
INSERT INTO `car_region` VALUES ('2372', '港口区', '2370', '450602');
INSERT INTO `car_region` VALUES ('2373', '防城区', '2370', '450603');
INSERT INTO `car_region` VALUES ('2374', '上思县', '2370', '450621');
INSERT INTO `car_region` VALUES ('2375', '东兴市', '2370', '450681');
INSERT INTO `car_region` VALUES ('2376', '钦州市', '2309', '450700');
INSERT INTO `car_region` VALUES ('2377', '市辖区', '2376', '450701');
INSERT INTO `car_region` VALUES ('2378', '钦南区', '2376', '450702');
INSERT INTO `car_region` VALUES ('2379', '钦北区', '2376', '450703');
INSERT INTO `car_region` VALUES ('2380', '灵山县', '2376', '450721');
INSERT INTO `car_region` VALUES ('2381', '浦北县', '2376', '450722');
INSERT INTO `car_region` VALUES ('2382', '贵港市', '2309', '450800');
INSERT INTO `car_region` VALUES ('2383', '市辖区', '2382', '450801');
INSERT INTO `car_region` VALUES ('2384', '港北区', '2382', '450802');
INSERT INTO `car_region` VALUES ('2385', '港南区', '2382', '450803');
INSERT INTO `car_region` VALUES ('2386', '覃塘区', '2382', '450804');
INSERT INTO `car_region` VALUES ('2387', '平南县', '2382', '450821');
INSERT INTO `car_region` VALUES ('2388', '桂平市', '2382', '450881');
INSERT INTO `car_region` VALUES ('2389', '玉林市', '2309', '450900');
INSERT INTO `car_region` VALUES ('2390', '市辖区', '2389', '450901');
INSERT INTO `car_region` VALUES ('2391', '玉州区', '2389', '450902');
INSERT INTO `car_region` VALUES ('2392', '容　县', '2389', '450921');
INSERT INTO `car_region` VALUES ('2393', '陆川县', '2389', '450922');
INSERT INTO `car_region` VALUES ('2394', '博白县', '2389', '450923');
INSERT INTO `car_region` VALUES ('2395', '兴业县', '2389', '450924');
INSERT INTO `car_region` VALUES ('2396', '北流市', '2389', '450981');
INSERT INTO `car_region` VALUES ('2397', '百色市', '2309', '451000');
INSERT INTO `car_region` VALUES ('2398', '市辖区', '2397', '451001');
INSERT INTO `car_region` VALUES ('2399', '右江区', '2397', '451002');
INSERT INTO `car_region` VALUES ('2400', '田阳县', '2397', '451021');
INSERT INTO `car_region` VALUES ('2401', '田东县', '2397', '451022');
INSERT INTO `car_region` VALUES ('2402', '平果县', '2397', '451023');
INSERT INTO `car_region` VALUES ('2403', '德保县', '2397', '451024');
INSERT INTO `car_region` VALUES ('2404', '靖西县', '2397', '451025');
INSERT INTO `car_region` VALUES ('2405', '那坡县', '2397', '451026');
INSERT INTO `car_region` VALUES ('2406', '凌云县', '2397', '451027');
INSERT INTO `car_region` VALUES ('2407', '乐业县', '2397', '451028');
INSERT INTO `car_region` VALUES ('2408', '田林县', '2397', '451029');
INSERT INTO `car_region` VALUES ('2409', '西林县', '2397', '451030');
INSERT INTO `car_region` VALUES ('2410', '隆林各族自治县', '2397', '451031');
INSERT INTO `car_region` VALUES ('2411', '贺州市', '2309', '451100');
INSERT INTO `car_region` VALUES ('2412', '市辖区', '2411', '451101');
INSERT INTO `car_region` VALUES ('2413', '八步区', '2411', '451102');
INSERT INTO `car_region` VALUES ('2414', '昭平县', '2411', '451121');
INSERT INTO `car_region` VALUES ('2415', '钟山县', '2411', '451122');
INSERT INTO `car_region` VALUES ('2416', '富川瑶族自治县', '2411', '451123');
INSERT INTO `car_region` VALUES ('2417', '河池市', '2309', '451200');
INSERT INTO `car_region` VALUES ('2418', '市辖区', '2417', '451201');
INSERT INTO `car_region` VALUES ('2419', '金城江区', '2417', '451202');
INSERT INTO `car_region` VALUES ('2420', '南丹县', '2417', '451221');
INSERT INTO `car_region` VALUES ('2421', '天峨县', '2417', '451222');
INSERT INTO `car_region` VALUES ('2422', '凤山县', '2417', '451223');
INSERT INTO `car_region` VALUES ('2423', '东兰县', '2417', '451224');
INSERT INTO `car_region` VALUES ('2424', '罗城仫佬族自治县', '2417', '451225');
INSERT INTO `car_region` VALUES ('2425', '环江毛南族自治县', '2417', '451226');
INSERT INTO `car_region` VALUES ('2426', '巴马瑶族自治县', '2417', '451227');
INSERT INTO `car_region` VALUES ('2427', '都安瑶族自治县', '2417', '451228');
INSERT INTO `car_region` VALUES ('2428', '大化瑶族自治县', '2417', '451229');
INSERT INTO `car_region` VALUES ('2429', '宜州市', '2417', '451281');
INSERT INTO `car_region` VALUES ('2430', '来宾市', '2309', '451300');
INSERT INTO `car_region` VALUES ('2431', '市辖区', '2430', '451301');
INSERT INTO `car_region` VALUES ('2432', '兴宾区', '2430', '451302');
INSERT INTO `car_region` VALUES ('2433', '忻城县', '2430', '451321');
INSERT INTO `car_region` VALUES ('2434', '象州县', '2430', '451322');
INSERT INTO `car_region` VALUES ('2435', '武宣县', '2430', '451323');
INSERT INTO `car_region` VALUES ('2436', '金秀瑶族自治县', '2430', '451324');
INSERT INTO `car_region` VALUES ('2437', '合山市', '2430', '451381');
INSERT INTO `car_region` VALUES ('2438', '崇左市', '2309', '451400');
INSERT INTO `car_region` VALUES ('2439', '市辖区', '2438', '451401');
INSERT INTO `car_region` VALUES ('2440', '江洲区', '2438', '451402');
INSERT INTO `car_region` VALUES ('2441', '扶绥县', '2438', '451421');
INSERT INTO `car_region` VALUES ('2442', '宁明县', '2438', '451422');
INSERT INTO `car_region` VALUES ('2443', '龙州县', '2438', '451423');
INSERT INTO `car_region` VALUES ('2444', '大新县', '2438', '451424');
INSERT INTO `car_region` VALUES ('2445', '天等县', '2438', '451425');
INSERT INTO `car_region` VALUES ('2446', '凭祥市', '2438', '451481');
INSERT INTO `car_region` VALUES ('2447', '海南省', '0', '460000');
INSERT INTO `car_region` VALUES ('2448', '海口市', '2447', '460100');
INSERT INTO `car_region` VALUES ('2449', '市辖区', '2448', '460101');
INSERT INTO `car_region` VALUES ('2450', '秀英区', '2448', '460105');
INSERT INTO `car_region` VALUES ('2451', '龙华区', '2448', '460106');
INSERT INTO `car_region` VALUES ('2452', '琼山区', '2448', '460107');
INSERT INTO `car_region` VALUES ('2453', '美兰区', '2448', '460108');
INSERT INTO `car_region` VALUES ('2454', '三亚市', '2447', '460200');
INSERT INTO `car_region` VALUES ('2455', '市辖区', '2454', '460201');
INSERT INTO `car_region` VALUES ('2456', '省直辖县级行政单位', '2447', '469000');
INSERT INTO `car_region` VALUES ('2457', '五指山市', '2456', '469001');
INSERT INTO `car_region` VALUES ('2458', '琼海市', '2456', '469002');
INSERT INTO `car_region` VALUES ('2459', '儋州市', '2456', '469003');
INSERT INTO `car_region` VALUES ('2460', '文昌市', '2456', '469005');
INSERT INTO `car_region` VALUES ('2461', '万宁市', '2456', '469006');
INSERT INTO `car_region` VALUES ('2462', '东方市', '2456', '469007');
INSERT INTO `car_region` VALUES ('2463', '定安县', '2456', '469025');
INSERT INTO `car_region` VALUES ('2464', '屯昌县', '2456', '469026');
INSERT INTO `car_region` VALUES ('2465', '澄迈县', '2456', '469027');
INSERT INTO `car_region` VALUES ('2466', '临高县', '2456', '469028');
INSERT INTO `car_region` VALUES ('2467', '白沙黎族自治县', '2456', '469030');
INSERT INTO `car_region` VALUES ('2468', '昌江黎族自治县', '2456', '469031');
INSERT INTO `car_region` VALUES ('2469', '乐东黎族自治县', '2456', '469033');
INSERT INTO `car_region` VALUES ('2470', '陵水黎族自治县', '2456', '469034');
INSERT INTO `car_region` VALUES ('2471', '保亭黎族苗族自治县', '2456', '469035');
INSERT INTO `car_region` VALUES ('2472', '琼中黎族苗族自治县', '2456', '469036');
INSERT INTO `car_region` VALUES ('2473', '西沙群岛', '2456', '469037');
INSERT INTO `car_region` VALUES ('2474', '南沙群岛', '2456', '469038');
INSERT INTO `car_region` VALUES ('2475', '中沙群岛的岛礁及其海域', '2456', '469039');
INSERT INTO `car_region` VALUES ('2476', '重庆市', '0', '500000');
INSERT INTO `car_region` VALUES ('2477', '市辖区', '2476', '500100');
INSERT INTO `car_region` VALUES ('2478', '万州区', '2477', '500101');
INSERT INTO `car_region` VALUES ('2479', '涪陵区', '2477', '500102');
INSERT INTO `car_region` VALUES ('2480', '渝中区', '2477', '500103');
INSERT INTO `car_region` VALUES ('2481', '大渡口区', '2477', '500104');
INSERT INTO `car_region` VALUES ('2482', '江北区', '2477', '500105');
INSERT INTO `car_region` VALUES ('2483', '沙坪坝区', '2477', '500106');
INSERT INTO `car_region` VALUES ('2484', '九龙坡区', '2477', '500107');
INSERT INTO `car_region` VALUES ('2485', '南岸区', '2477', '500108');
INSERT INTO `car_region` VALUES ('2486', '北碚区', '2477', '500109');
INSERT INTO `car_region` VALUES ('2487', '万盛区', '2477', '500110');
INSERT INTO `car_region` VALUES ('2488', '双桥区', '2477', '500111');
INSERT INTO `car_region` VALUES ('2489', '渝北区', '2477', '500112');
INSERT INTO `car_region` VALUES ('2490', '巴南区', '2477', '500113');
INSERT INTO `car_region` VALUES ('2491', '黔江区', '2477', '500114');
INSERT INTO `car_region` VALUES ('2492', '长寿区', '2477', '500115');
INSERT INTO `car_region` VALUES ('2493', '县', '2476', '500200');
INSERT INTO `car_region` VALUES ('2494', '綦江县', '2493', '500222');
INSERT INTO `car_region` VALUES ('2495', '潼南县', '2493', '500223');
INSERT INTO `car_region` VALUES ('2496', '铜梁县', '2493', '500224');
INSERT INTO `car_region` VALUES ('2497', '大足县', '2493', '500225');
INSERT INTO `car_region` VALUES ('2498', '荣昌县', '2493', '500226');
INSERT INTO `car_region` VALUES ('2499', '璧山县', '2493', '500227');
INSERT INTO `car_region` VALUES ('2500', '梁平县', '2493', '500228');
INSERT INTO `car_region` VALUES ('2501', '城口县', '2493', '500229');
INSERT INTO `car_region` VALUES ('2502', '丰都县', '2493', '500230');
INSERT INTO `car_region` VALUES ('2503', '垫江县', '2493', '500231');
INSERT INTO `car_region` VALUES ('2504', '武隆县', '2493', '500232');
INSERT INTO `car_region` VALUES ('2505', '忠　县', '2493', '500233');
INSERT INTO `car_region` VALUES ('2506', '开　县', '2493', '500234');
INSERT INTO `car_region` VALUES ('2507', '云阳县', '2493', '500235');
INSERT INTO `car_region` VALUES ('2508', '奉节县', '2493', '500236');
INSERT INTO `car_region` VALUES ('2509', '巫山县', '2493', '500237');
INSERT INTO `car_region` VALUES ('2510', '巫溪县', '2493', '500238');
INSERT INTO `car_region` VALUES ('2511', '石柱土家族自治县', '2493', '500240');
INSERT INTO `car_region` VALUES ('2512', '秀山土家族苗族自治县', '2493', '500241');
INSERT INTO `car_region` VALUES ('2513', '酉阳土家族苗族自治县', '2493', '500242');
INSERT INTO `car_region` VALUES ('2514', '彭水苗族土家族自治县', '2493', '500243');
INSERT INTO `car_region` VALUES ('2515', '市', '2476', '500300');
INSERT INTO `car_region` VALUES ('2516', '江津市', '2515', '500381');
INSERT INTO `car_region` VALUES ('2517', '合川市', '2515', '500382');
INSERT INTO `car_region` VALUES ('2518', '永川市', '2515', '500383');
INSERT INTO `car_region` VALUES ('2519', '南川市', '2515', '500384');
INSERT INTO `car_region` VALUES ('2520', '四川省', '0', '510000');
INSERT INTO `car_region` VALUES ('2521', '成都市', '2520', '510100');
INSERT INTO `car_region` VALUES ('2522', '市辖区', '2521', '510101');
INSERT INTO `car_region` VALUES ('2523', '锦江区', '2521', '510104');
INSERT INTO `car_region` VALUES ('2524', '青羊区', '2521', '510105');
INSERT INTO `car_region` VALUES ('2525', '金牛区', '2521', '510106');
INSERT INTO `car_region` VALUES ('2526', '武侯区', '2521', '510107');
INSERT INTO `car_region` VALUES ('2527', '成华区', '2521', '510108');
INSERT INTO `car_region` VALUES ('2528', '龙泉驿区', '2521', '510112');
INSERT INTO `car_region` VALUES ('2529', '青白江区', '2521', '510113');
INSERT INTO `car_region` VALUES ('2530', '新都区', '2521', '510114');
INSERT INTO `car_region` VALUES ('2531', '温江县', '2521', '510115');
INSERT INTO `car_region` VALUES ('2532', '金堂县', '2521', '510121');
INSERT INTO `car_region` VALUES ('2533', '双流县', '2521', '510122');
INSERT INTO `car_region` VALUES ('2534', '郫　县', '2521', '510124');
INSERT INTO `car_region` VALUES ('2535', '大邑县', '2521', '510129');
INSERT INTO `car_region` VALUES ('2536', '蒲江县', '2521', '510131');
INSERT INTO `car_region` VALUES ('2537', '新津县', '2521', '510132');
INSERT INTO `car_region` VALUES ('2538', '都江堰市', '2521', '510181');
INSERT INTO `car_region` VALUES ('2539', '彭州市', '2521', '510182');
INSERT INTO `car_region` VALUES ('2540', '邛崃市', '2521', '510183');
INSERT INTO `car_region` VALUES ('2541', '崇州市', '2521', '510184');
INSERT INTO `car_region` VALUES ('2542', '自贡市', '2520', '510300');
INSERT INTO `car_region` VALUES ('2543', '市辖区', '2542', '510301');
INSERT INTO `car_region` VALUES ('2544', '自流井区', '2542', '510302');
INSERT INTO `car_region` VALUES ('2545', '贡井区', '2542', '510303');
INSERT INTO `car_region` VALUES ('2546', '大安区', '2542', '510304');
INSERT INTO `car_region` VALUES ('2547', '沿滩区', '2542', '510311');
INSERT INTO `car_region` VALUES ('2548', '荣　县', '2542', '510321');
INSERT INTO `car_region` VALUES ('2549', '富顺县', '2542', '510322');
INSERT INTO `car_region` VALUES ('2550', '攀枝花市', '2520', '510400');
INSERT INTO `car_region` VALUES ('2551', '市辖区', '2550', '510401');
INSERT INTO `car_region` VALUES ('2552', '东　区', '2550', '510402');
INSERT INTO `car_region` VALUES ('2553', '西　区', '2550', '510403');
INSERT INTO `car_region` VALUES ('2554', '仁和区', '2550', '510411');
INSERT INTO `car_region` VALUES ('2555', '米易县', '2550', '510421');
INSERT INTO `car_region` VALUES ('2556', '盐边县', '2550', '510422');
INSERT INTO `car_region` VALUES ('2557', '泸州市', '2520', '510500');
INSERT INTO `car_region` VALUES ('2558', '市辖区', '2557', '510501');
INSERT INTO `car_region` VALUES ('2559', '江阳区', '2557', '510502');
INSERT INTO `car_region` VALUES ('2560', '纳溪区', '2557', '510503');
INSERT INTO `car_region` VALUES ('2561', '龙马潭区', '2557', '510504');
INSERT INTO `car_region` VALUES ('2562', '泸　县', '2557', '510521');
INSERT INTO `car_region` VALUES ('2563', '合江县', '2557', '510522');
INSERT INTO `car_region` VALUES ('2564', '叙永县', '2557', '510524');
INSERT INTO `car_region` VALUES ('2565', '古蔺县', '2557', '510525');
INSERT INTO `car_region` VALUES ('2566', '德阳市', '2520', '510600');
INSERT INTO `car_region` VALUES ('2567', '市辖区', '2566', '510601');
INSERT INTO `car_region` VALUES ('2568', '旌阳区', '2566', '510603');
INSERT INTO `car_region` VALUES ('2569', '中江县', '2566', '510623');
INSERT INTO `car_region` VALUES ('2570', '罗江县', '2566', '510626');
INSERT INTO `car_region` VALUES ('2571', '广汉市', '2566', '510681');
INSERT INTO `car_region` VALUES ('2572', '什邡市', '2566', '510682');
INSERT INTO `car_region` VALUES ('2573', '绵竹市', '2566', '510683');
INSERT INTO `car_region` VALUES ('2574', '绵阳市', '2520', '510700');
INSERT INTO `car_region` VALUES ('2575', '市辖区', '2574', '510701');
INSERT INTO `car_region` VALUES ('2576', '涪城区', '2574', '510703');
INSERT INTO `car_region` VALUES ('2577', '游仙区', '2574', '510704');
INSERT INTO `car_region` VALUES ('2578', '三台县', '2574', '510722');
INSERT INTO `car_region` VALUES ('2579', '盐亭县', '2574', '510723');
INSERT INTO `car_region` VALUES ('2580', '安　县', '2574', '510724');
INSERT INTO `car_region` VALUES ('2581', '梓潼县', '2574', '510725');
INSERT INTO `car_region` VALUES ('2582', '北川羌族自治县', '2574', '510726');
INSERT INTO `car_region` VALUES ('2583', '平武县', '2574', '510727');
INSERT INTO `car_region` VALUES ('2584', '江油市', '2574', '510781');
INSERT INTO `car_region` VALUES ('2585', '广元市', '2520', '510800');
INSERT INTO `car_region` VALUES ('2586', '市辖区', '2585', '510801');
INSERT INTO `car_region` VALUES ('2587', '市中区', '2585', '510802');
INSERT INTO `car_region` VALUES ('2588', '元坝区', '2585', '510811');
INSERT INTO `car_region` VALUES ('2589', '朝天区', '2585', '510812');
INSERT INTO `car_region` VALUES ('2590', '旺苍县', '2585', '510821');
INSERT INTO `car_region` VALUES ('2591', '青川县', '2585', '510822');
INSERT INTO `car_region` VALUES ('2592', '剑阁县', '2585', '510823');
INSERT INTO `car_region` VALUES ('2593', '苍溪县', '2585', '510824');
INSERT INTO `car_region` VALUES ('2594', '遂宁市', '2520', '510900');
INSERT INTO `car_region` VALUES ('2595', '市辖区', '2594', '510901');
INSERT INTO `car_region` VALUES ('2596', '船山区', '2594', '510903');
INSERT INTO `car_region` VALUES ('2597', '安居区', '2594', '510904');
INSERT INTO `car_region` VALUES ('2598', '蓬溪县', '2594', '510921');
INSERT INTO `car_region` VALUES ('2599', '射洪县', '2594', '510922');
INSERT INTO `car_region` VALUES ('2600', '大英县', '2594', '510923');
INSERT INTO `car_region` VALUES ('2601', '内江市', '2520', '511000');
INSERT INTO `car_region` VALUES ('2602', '市辖区', '2601', '511001');
INSERT INTO `car_region` VALUES ('2603', '市中区', '2601', '511002');
INSERT INTO `car_region` VALUES ('2604', '东兴区', '2601', '511011');
INSERT INTO `car_region` VALUES ('2605', '威远县', '2601', '511024');
INSERT INTO `car_region` VALUES ('2606', '资中县', '2601', '511025');
INSERT INTO `car_region` VALUES ('2607', '隆昌县', '2601', '511028');
INSERT INTO `car_region` VALUES ('2608', '乐山市', '2520', '511100');
INSERT INTO `car_region` VALUES ('2609', '市辖区', '2608', '511101');
INSERT INTO `car_region` VALUES ('2610', '市中区', '2608', '511102');
INSERT INTO `car_region` VALUES ('2611', '沙湾区', '2608', '511111');
INSERT INTO `car_region` VALUES ('2612', '五通桥区', '2608', '511112');
INSERT INTO `car_region` VALUES ('2613', '金口河区', '2608', '511113');
INSERT INTO `car_region` VALUES ('2614', '犍为县', '2608', '511123');
INSERT INTO `car_region` VALUES ('2615', '井研县', '2608', '511124');
INSERT INTO `car_region` VALUES ('2616', '夹江县', '2608', '511126');
INSERT INTO `car_region` VALUES ('2617', '沐川县', '2608', '511129');
INSERT INTO `car_region` VALUES ('2618', '峨边彝族自治县', '2608', '511132');
INSERT INTO `car_region` VALUES ('2619', '马边彝族自治县', '2608', '511133');
INSERT INTO `car_region` VALUES ('2620', '峨眉山市', '2608', '511181');
INSERT INTO `car_region` VALUES ('2621', '南充市', '2520', '511300');
INSERT INTO `car_region` VALUES ('2622', '市辖区', '2621', '511301');
INSERT INTO `car_region` VALUES ('2623', '顺庆区', '2621', '511302');
INSERT INTO `car_region` VALUES ('2624', '高坪区', '2621', '511303');
INSERT INTO `car_region` VALUES ('2625', '嘉陵区', '2621', '511304');
INSERT INTO `car_region` VALUES ('2626', '南部县', '2621', '511321');
INSERT INTO `car_region` VALUES ('2627', '营山县', '2621', '511322');
INSERT INTO `car_region` VALUES ('2628', '蓬安县', '2621', '511323');
INSERT INTO `car_region` VALUES ('2629', '仪陇县', '2621', '511324');
INSERT INTO `car_region` VALUES ('2630', '西充县', '2621', '511325');
INSERT INTO `car_region` VALUES ('2631', '阆中市', '2621', '511381');
INSERT INTO `car_region` VALUES ('2632', '眉山市', '2520', '511400');
INSERT INTO `car_region` VALUES ('2633', '市辖区', '2632', '511401');
INSERT INTO `car_region` VALUES ('2634', '东坡区', '2632', '511402');
INSERT INTO `car_region` VALUES ('2635', '仁寿县', '2632', '511421');
INSERT INTO `car_region` VALUES ('2636', '彭山县', '2632', '511422');
INSERT INTO `car_region` VALUES ('2637', '洪雅县', '2632', '511423');
INSERT INTO `car_region` VALUES ('2638', '丹棱县', '2632', '511424');
INSERT INTO `car_region` VALUES ('2639', '青神县', '2632', '511425');
INSERT INTO `car_region` VALUES ('2640', '宜宾市', '2520', '511500');
INSERT INTO `car_region` VALUES ('2641', '市辖区', '2640', '511501');
INSERT INTO `car_region` VALUES ('2642', '翠屏区', '2640', '511502');
INSERT INTO `car_region` VALUES ('2643', '宜宾县', '2640', '511521');
INSERT INTO `car_region` VALUES ('2644', '南溪县', '2640', '511522');
INSERT INTO `car_region` VALUES ('2645', '江安县', '2640', '511523');
INSERT INTO `car_region` VALUES ('2646', '长宁县', '2640', '511524');
INSERT INTO `car_region` VALUES ('2647', '高　县', '2640', '511525');
INSERT INTO `car_region` VALUES ('2648', '珙　县', '2640', '511526');
INSERT INTO `car_region` VALUES ('2649', '筠连县', '2640', '511527');
INSERT INTO `car_region` VALUES ('2650', '兴文县', '2640', '511528');
INSERT INTO `car_region` VALUES ('2651', '屏山县', '2640', '511529');
INSERT INTO `car_region` VALUES ('2652', '广安市', '2520', '511600');
INSERT INTO `car_region` VALUES ('2653', '市辖区', '2652', '511601');
INSERT INTO `car_region` VALUES ('2654', '广安区', '2652', '511602');
INSERT INTO `car_region` VALUES ('2655', '岳池县', '2652', '511621');
INSERT INTO `car_region` VALUES ('2656', '武胜县', '2652', '511622');
INSERT INTO `car_region` VALUES ('2657', '邻水县', '2652', '511623');
INSERT INTO `car_region` VALUES ('2658', '华莹市', '2652', '511681');
INSERT INTO `car_region` VALUES ('2659', '达州市', '2520', '511700');
INSERT INTO `car_region` VALUES ('2660', '市辖区', '2659', '511701');
INSERT INTO `car_region` VALUES ('2661', '通川区', '2659', '511702');
INSERT INTO `car_region` VALUES ('2662', '达　县', '2659', '511721');
INSERT INTO `car_region` VALUES ('2663', '宣汉县', '2659', '511722');
INSERT INTO `car_region` VALUES ('2664', '开江县', '2659', '511723');
INSERT INTO `car_region` VALUES ('2665', '大竹县', '2659', '511724');
INSERT INTO `car_region` VALUES ('2666', '渠　县', '2659', '511725');
INSERT INTO `car_region` VALUES ('2667', '万源市', '2659', '511781');
INSERT INTO `car_region` VALUES ('2668', '雅安市', '2520', '511800');
INSERT INTO `car_region` VALUES ('2669', '市辖区', '2668', '511801');
INSERT INTO `car_region` VALUES ('2670', '雨城区', '2668', '511802');
INSERT INTO `car_region` VALUES ('2671', '名山县', '2668', '511821');
INSERT INTO `car_region` VALUES ('2672', '荥经县', '2668', '511822');
INSERT INTO `car_region` VALUES ('2673', '汉源县', '2668', '511823');
INSERT INTO `car_region` VALUES ('2674', '石棉县', '2668', '511824');
INSERT INTO `car_region` VALUES ('2675', '天全县', '2668', '511825');
INSERT INTO `car_region` VALUES ('2676', '芦山县', '2668', '511826');
INSERT INTO `car_region` VALUES ('2677', '宝兴县', '2668', '511827');
INSERT INTO `car_region` VALUES ('2678', '巴中市', '2520', '511900');
INSERT INTO `car_region` VALUES ('2679', '市辖区', '2678', '511901');
INSERT INTO `car_region` VALUES ('2680', '巴州区', '2678', '511902');
INSERT INTO `car_region` VALUES ('2681', '通江县', '2678', '511921');
INSERT INTO `car_region` VALUES ('2682', '南江县', '2678', '511922');
INSERT INTO `car_region` VALUES ('2683', '平昌县', '2678', '511923');
INSERT INTO `car_region` VALUES ('2684', '资阳市', '2520', '512000');
INSERT INTO `car_region` VALUES ('2685', '市辖区', '2684', '512001');
INSERT INTO `car_region` VALUES ('2686', '雁江区', '2684', '512002');
INSERT INTO `car_region` VALUES ('2687', '安岳县', '2684', '512021');
INSERT INTO `car_region` VALUES ('2688', '乐至县', '2684', '512022');
INSERT INTO `car_region` VALUES ('2689', '简阳市', '2684', '512081');
INSERT INTO `car_region` VALUES ('2690', '阿坝藏族羌族自治州', '2520', '513200');
INSERT INTO `car_region` VALUES ('2691', '汶川县', '2690', '513221');
INSERT INTO `car_region` VALUES ('2692', '理　县', '2690', '513222');
INSERT INTO `car_region` VALUES ('2693', '茂　县', '2690', '513223');
INSERT INTO `car_region` VALUES ('2694', '松潘县', '2690', '513224');
INSERT INTO `car_region` VALUES ('2695', '九寨沟县', '2690', '513225');
INSERT INTO `car_region` VALUES ('2696', '金川县', '2690', '513226');
INSERT INTO `car_region` VALUES ('2697', '小金县', '2690', '513227');
INSERT INTO `car_region` VALUES ('2698', '黑水县', '2690', '513228');
INSERT INTO `car_region` VALUES ('2699', '马尔康县', '2690', '513229');
INSERT INTO `car_region` VALUES ('2700', '壤塘县', '2690', '513230');
INSERT INTO `car_region` VALUES ('2701', '阿坝县', '2690', '513231');
INSERT INTO `car_region` VALUES ('2702', '若尔盖县', '2690', '513232');
INSERT INTO `car_region` VALUES ('2703', '红原县', '2690', '513233');
INSERT INTO `car_region` VALUES ('2704', '甘孜藏族自治州', '2520', '513300');
INSERT INTO `car_region` VALUES ('2705', '康定县', '2704', '513321');
INSERT INTO `car_region` VALUES ('2706', '泸定县', '2704', '513322');
INSERT INTO `car_region` VALUES ('2707', '丹巴县', '2704', '513323');
INSERT INTO `car_region` VALUES ('2708', '九龙县', '2704', '513324');
INSERT INTO `car_region` VALUES ('2709', '雅江县', '2704', '513325');
INSERT INTO `car_region` VALUES ('2710', '道孚县', '2704', '513326');
INSERT INTO `car_region` VALUES ('2711', '炉霍县', '2704', '513327');
INSERT INTO `car_region` VALUES ('2712', '甘孜县', '2704', '513328');
INSERT INTO `car_region` VALUES ('2713', '新龙县', '2704', '513329');
INSERT INTO `car_region` VALUES ('2714', '德格县', '2704', '513330');
INSERT INTO `car_region` VALUES ('2715', '白玉县', '2704', '513331');
INSERT INTO `car_region` VALUES ('2716', '石渠县', '2704', '513332');
INSERT INTO `car_region` VALUES ('2717', '色达县', '2704', '513333');
INSERT INTO `car_region` VALUES ('2718', '理塘县', '2704', '513334');
INSERT INTO `car_region` VALUES ('2719', '巴塘县', '2704', '513335');
INSERT INTO `car_region` VALUES ('2720', '乡城县', '2704', '513336');
INSERT INTO `car_region` VALUES ('2721', '稻城县', '2704', '513337');
INSERT INTO `car_region` VALUES ('2722', '得荣县', '2704', '513338');
INSERT INTO `car_region` VALUES ('2723', '凉山彝族自治州', '2520', '513400');
INSERT INTO `car_region` VALUES ('2724', '西昌市', '2723', '513401');
INSERT INTO `car_region` VALUES ('2725', '木里藏族自治县', '2723', '513422');
INSERT INTO `car_region` VALUES ('2726', '盐源县', '2723', '513423');
INSERT INTO `car_region` VALUES ('2727', '德昌县', '2723', '513424');
INSERT INTO `car_region` VALUES ('2728', '会理县', '2723', '513425');
INSERT INTO `car_region` VALUES ('2729', '会东县', '2723', '513426');
INSERT INTO `car_region` VALUES ('2730', '宁南县', '2723', '513427');
INSERT INTO `car_region` VALUES ('2731', '普格县', '2723', '513428');
INSERT INTO `car_region` VALUES ('2732', '布拖县', '2723', '513429');
INSERT INTO `car_region` VALUES ('2733', '金阳县', '2723', '513430');
INSERT INTO `car_region` VALUES ('2734', '昭觉县', '2723', '513431');
INSERT INTO `car_region` VALUES ('2735', '喜德县', '2723', '513432');
INSERT INTO `car_region` VALUES ('2736', '冕宁县', '2723', '513433');
INSERT INTO `car_region` VALUES ('2737', '越西县', '2723', '513434');
INSERT INTO `car_region` VALUES ('2738', '甘洛县', '2723', '513435');
INSERT INTO `car_region` VALUES ('2739', '美姑县', '2723', '513436');
INSERT INTO `car_region` VALUES ('2740', '雷波县', '2723', '513437');
INSERT INTO `car_region` VALUES ('2741', '贵州省', '0', '520000');
INSERT INTO `car_region` VALUES ('2742', '贵阳市', '2741', '520100');
INSERT INTO `car_region` VALUES ('2743', '市辖区', '2742', '520101');
INSERT INTO `car_region` VALUES ('2744', '南明区', '2742', '520102');
INSERT INTO `car_region` VALUES ('2745', '云岩区', '2742', '520103');
INSERT INTO `car_region` VALUES ('2746', '花溪区', '2742', '520111');
INSERT INTO `car_region` VALUES ('2747', '乌当区', '2742', '520112');
INSERT INTO `car_region` VALUES ('2748', '白云区', '2742', '520113');
INSERT INTO `car_region` VALUES ('2749', '小河区', '2742', '520114');
INSERT INTO `car_region` VALUES ('2750', '开阳县', '2742', '520121');
INSERT INTO `car_region` VALUES ('2751', '息烽县', '2742', '520122');
INSERT INTO `car_region` VALUES ('2752', '修文县', '2742', '520123');
INSERT INTO `car_region` VALUES ('2753', '清镇市', '2742', '520181');
INSERT INTO `car_region` VALUES ('2754', '六盘水市', '2741', '520200');
INSERT INTO `car_region` VALUES ('2755', '钟山区', '2754', '520201');
INSERT INTO `car_region` VALUES ('2756', '六枝特区', '2754', '520203');
INSERT INTO `car_region` VALUES ('2757', '水城县', '2754', '520221');
INSERT INTO `car_region` VALUES ('2758', '盘　县', '2754', '520222');
INSERT INTO `car_region` VALUES ('2759', '遵义市', '2741', '520300');
INSERT INTO `car_region` VALUES ('2760', '市辖区', '2759', '520301');
INSERT INTO `car_region` VALUES ('2761', '红花岗区', '2759', '520302');
INSERT INTO `car_region` VALUES ('2762', '汇川区', '2759', '520303');
INSERT INTO `car_region` VALUES ('2763', '遵义县', '2759', '520321');
INSERT INTO `car_region` VALUES ('2764', '桐梓县', '2759', '520322');
INSERT INTO `car_region` VALUES ('2765', '绥阳县', '2759', '520323');
INSERT INTO `car_region` VALUES ('2766', '正安县', '2759', '520324');
INSERT INTO `car_region` VALUES ('2767', '道真仡佬族苗族自治县', '2759', '520325');
INSERT INTO `car_region` VALUES ('2768', '务川仡佬族苗族自治县', '2759', '520326');
INSERT INTO `car_region` VALUES ('2769', '凤冈县', '2759', '520327');
INSERT INTO `car_region` VALUES ('2770', '湄潭县', '2759', '520328');
INSERT INTO `car_region` VALUES ('2771', '余庆县', '2759', '520329');
INSERT INTO `car_region` VALUES ('2772', '习水县', '2759', '520330');
INSERT INTO `car_region` VALUES ('2773', '赤水市', '2759', '520381');
INSERT INTO `car_region` VALUES ('2774', '仁怀市', '2759', '520382');
INSERT INTO `car_region` VALUES ('2775', '安顺市', '2741', '520400');
INSERT INTO `car_region` VALUES ('2776', '市辖区', '2775', '520401');
INSERT INTO `car_region` VALUES ('2777', '西秀区', '2775', '520402');
INSERT INTO `car_region` VALUES ('2778', '平坝县', '2775', '520421');
INSERT INTO `car_region` VALUES ('2779', '普定县', '2775', '520422');
INSERT INTO `car_region` VALUES ('2780', '镇宁布依族苗族自治县', '2775', '520423');
INSERT INTO `car_region` VALUES ('2781', '关岭布依族苗族自治县', '2775', '520424');
INSERT INTO `car_region` VALUES ('2782', '紫云苗族布依族自治县', '2775', '520425');
INSERT INTO `car_region` VALUES ('2783', '铜仁地区', '2741', '522200');
INSERT INTO `car_region` VALUES ('2784', '铜仁市', '2783', '522201');
INSERT INTO `car_region` VALUES ('2785', '江口县', '2783', '522222');
INSERT INTO `car_region` VALUES ('2786', '玉屏侗族自治县', '2783', '522223');
INSERT INTO `car_region` VALUES ('2787', '石阡县', '2783', '522224');
INSERT INTO `car_region` VALUES ('2788', '思南县', '2783', '522225');
INSERT INTO `car_region` VALUES ('2789', '印江土家族苗族自治县', '2783', '522226');
INSERT INTO `car_region` VALUES ('2790', '德江县', '2783', '522227');
INSERT INTO `car_region` VALUES ('2791', '沿河土家族自治县', '2783', '522228');
INSERT INTO `car_region` VALUES ('2792', '松桃苗族自治县', '2783', '522229');
INSERT INTO `car_region` VALUES ('2793', '万山特区', '2783', '522230');
INSERT INTO `car_region` VALUES ('2794', '黔西南布依族苗族自治州', '2741', '522300');
INSERT INTO `car_region` VALUES ('2795', '兴义市', '2794', '522301');
INSERT INTO `car_region` VALUES ('2796', '兴仁县', '2794', '522322');
INSERT INTO `car_region` VALUES ('2797', '普安县', '2794', '522323');
INSERT INTO `car_region` VALUES ('2798', '晴隆县', '2794', '522324');
INSERT INTO `car_region` VALUES ('2799', '贞丰县', '2794', '522325');
INSERT INTO `car_region` VALUES ('2800', '望谟县', '2794', '522326');
INSERT INTO `car_region` VALUES ('2801', '册亨县', '2794', '522327');
INSERT INTO `car_region` VALUES ('2802', '安龙县', '2794', '522328');
INSERT INTO `car_region` VALUES ('2803', '毕节地区', '2741', '522400');
INSERT INTO `car_region` VALUES ('2804', '毕节市', '2803', '522401');
INSERT INTO `car_region` VALUES ('2805', '大方县', '2803', '522422');
INSERT INTO `car_region` VALUES ('2806', '黔西县', '2803', '522423');
INSERT INTO `car_region` VALUES ('2807', '金沙县', '2803', '522424');
INSERT INTO `car_region` VALUES ('2808', '织金县', '2803', '522425');
INSERT INTO `car_region` VALUES ('2809', '纳雍县', '2803', '522426');
INSERT INTO `car_region` VALUES ('2810', '威宁彝族回族苗族自治县', '2803', '522427');
INSERT INTO `car_region` VALUES ('2811', '赫章县', '2803', '522428');
INSERT INTO `car_region` VALUES ('2812', '黔东南苗族侗族自治州', '2741', '522600');
INSERT INTO `car_region` VALUES ('2813', '凯里市', '2812', '522601');
INSERT INTO `car_region` VALUES ('2814', '黄平县', '2812', '522622');
INSERT INTO `car_region` VALUES ('2815', '施秉县', '2812', '522623');
INSERT INTO `car_region` VALUES ('2816', '三穗县', '2812', '522624');
INSERT INTO `car_region` VALUES ('2817', '镇远县', '2812', '522625');
INSERT INTO `car_region` VALUES ('2818', '岑巩县', '2812', '522626');
INSERT INTO `car_region` VALUES ('2819', '天柱县', '2812', '522627');
INSERT INTO `car_region` VALUES ('2820', '锦屏县', '2812', '522628');
INSERT INTO `car_region` VALUES ('2821', '剑河县', '2812', '522629');
INSERT INTO `car_region` VALUES ('2822', '台江县', '2812', '522630');
INSERT INTO `car_region` VALUES ('2823', '黎平县', '2812', '522631');
INSERT INTO `car_region` VALUES ('2824', '榕江县', '2812', '522632');
INSERT INTO `car_region` VALUES ('2825', '从江县', '2812', '522633');
INSERT INTO `car_region` VALUES ('2826', '雷山县', '2812', '522634');
INSERT INTO `car_region` VALUES ('2827', '麻江县', '2812', '522635');
INSERT INTO `car_region` VALUES ('2828', '丹寨县', '2812', '522636');
INSERT INTO `car_region` VALUES ('2829', '黔南布依族苗族自治州', '2741', '522700');
INSERT INTO `car_region` VALUES ('2830', '都匀市', '2829', '522701');
INSERT INTO `car_region` VALUES ('2831', '福泉市', '2829', '522702');
INSERT INTO `car_region` VALUES ('2832', '荔波县', '2829', '522722');
INSERT INTO `car_region` VALUES ('2833', '贵定县', '2829', '522723');
INSERT INTO `car_region` VALUES ('2834', '瓮安县', '2829', '522725');
INSERT INTO `car_region` VALUES ('2835', '独山县', '2829', '522726');
INSERT INTO `car_region` VALUES ('2836', '平塘县', '2829', '522727');
INSERT INTO `car_region` VALUES ('2837', '罗甸县', '2829', '522728');
INSERT INTO `car_region` VALUES ('2838', '长顺县', '2829', '522729');
INSERT INTO `car_region` VALUES ('2839', '龙里县', '2829', '522730');
INSERT INTO `car_region` VALUES ('2840', '惠水县', '2829', '522731');
INSERT INTO `car_region` VALUES ('2841', '三都水族自治县', '2829', '522732');
INSERT INTO `car_region` VALUES ('2842', '云南省', '0', '530000');
INSERT INTO `car_region` VALUES ('2843', '昆明市', '2842', '530100');
INSERT INTO `car_region` VALUES ('2844', '市辖区', '2843', '530101');
INSERT INTO `car_region` VALUES ('2845', '五华区', '2843', '530102');
INSERT INTO `car_region` VALUES ('2846', '盘龙区', '2843', '530103');
INSERT INTO `car_region` VALUES ('2847', '官渡区', '2843', '530111');
INSERT INTO `car_region` VALUES ('2848', '西山区', '2843', '530112');
INSERT INTO `car_region` VALUES ('2849', '东川区', '2843', '530113');
INSERT INTO `car_region` VALUES ('2850', '呈贡县', '2843', '530121');
INSERT INTO `car_region` VALUES ('2851', '晋宁县', '2843', '530122');
INSERT INTO `car_region` VALUES ('2852', '富民县', '2843', '530124');
INSERT INTO `car_region` VALUES ('2853', '宜良县', '2843', '530125');
INSERT INTO `car_region` VALUES ('2854', '石林彝族自治县', '2843', '530126');
INSERT INTO `car_region` VALUES ('2855', '嵩明县', '2843', '530127');
INSERT INTO `car_region` VALUES ('2856', '禄劝彝族苗族自治县', '2843', '530128');
INSERT INTO `car_region` VALUES ('2857', '寻甸回族彝族自治县', '2843', '530129');
INSERT INTO `car_region` VALUES ('2858', '安宁市', '2843', '530181');
INSERT INTO `car_region` VALUES ('2859', '曲靖市', '2842', '530300');
INSERT INTO `car_region` VALUES ('2860', '市辖区', '2859', '530301');
INSERT INTO `car_region` VALUES ('2861', '麒麟区', '2859', '530302');
INSERT INTO `car_region` VALUES ('2862', '马龙县', '2859', '530321');
INSERT INTO `car_region` VALUES ('2863', '陆良县', '2859', '530322');
INSERT INTO `car_region` VALUES ('2864', '师宗县', '2859', '530323');
INSERT INTO `car_region` VALUES ('2865', '罗平县', '2859', '530324');
INSERT INTO `car_region` VALUES ('2866', '富源县', '2859', '530325');
INSERT INTO `car_region` VALUES ('2867', '会泽县', '2859', '530326');
INSERT INTO `car_region` VALUES ('2868', '沾益县', '2859', '530328');
INSERT INTO `car_region` VALUES ('2869', '宣威市', '2859', '530381');
INSERT INTO `car_region` VALUES ('2870', '玉溪市', '2842', '530400');
INSERT INTO `car_region` VALUES ('2871', '市辖区', '2870', '530401');
INSERT INTO `car_region` VALUES ('2872', '红塔区', '2870', '530402');
INSERT INTO `car_region` VALUES ('2873', '江川县', '2870', '530421');
INSERT INTO `car_region` VALUES ('2874', '澄江县', '2870', '530422');
INSERT INTO `car_region` VALUES ('2875', '通海县', '2870', '530423');
INSERT INTO `car_region` VALUES ('2876', '华宁县', '2870', '530424');
INSERT INTO `car_region` VALUES ('2877', '易门县', '2870', '530425');
INSERT INTO `car_region` VALUES ('2878', '峨山彝族自治县', '2870', '530426');
INSERT INTO `car_region` VALUES ('2879', '新平彝族傣族自治县', '2870', '530427');
INSERT INTO `car_region` VALUES ('2880', '元江哈尼族彝族傣族自治县', '2870', '530428');
INSERT INTO `car_region` VALUES ('2881', '保山市', '2842', '530500');
INSERT INTO `car_region` VALUES ('2882', '市辖区', '2881', '530501');
INSERT INTO `car_region` VALUES ('2883', '隆阳区', '2881', '530502');
INSERT INTO `car_region` VALUES ('2884', '施甸县', '2881', '530521');
INSERT INTO `car_region` VALUES ('2885', '腾冲县', '2881', '530522');
INSERT INTO `car_region` VALUES ('2886', '龙陵县', '2881', '530523');
INSERT INTO `car_region` VALUES ('2887', '昌宁县', '2881', '530524');
INSERT INTO `car_region` VALUES ('2888', '昭通市', '2842', '530600');
INSERT INTO `car_region` VALUES ('2889', '市辖区', '2888', '530601');
INSERT INTO `car_region` VALUES ('2890', '昭阳区', '2888', '530602');
INSERT INTO `car_region` VALUES ('2891', '鲁甸县', '2888', '530621');
INSERT INTO `car_region` VALUES ('2892', '巧家县', '2888', '530622');
INSERT INTO `car_region` VALUES ('2893', '盐津县', '2888', '530623');
INSERT INTO `car_region` VALUES ('2894', '大关县', '2888', '530624');
INSERT INTO `car_region` VALUES ('2895', '永善县', '2888', '530625');
INSERT INTO `car_region` VALUES ('2896', '绥江县', '2888', '530626');
INSERT INTO `car_region` VALUES ('2897', '镇雄县', '2888', '530627');
INSERT INTO `car_region` VALUES ('2898', '彝良县', '2888', '530628');
INSERT INTO `car_region` VALUES ('2899', '威信县', '2888', '530629');
INSERT INTO `car_region` VALUES ('2900', '水富县', '2888', '530630');
INSERT INTO `car_region` VALUES ('2901', '丽江市', '2842', '530700');
INSERT INTO `car_region` VALUES ('2902', '市辖区', '2901', '530701');
INSERT INTO `car_region` VALUES ('2903', '古城区', '2901', '530702');
INSERT INTO `car_region` VALUES ('2904', '玉龙纳西族自治县', '2901', '530721');
INSERT INTO `car_region` VALUES ('2905', '永胜县', '2901', '530722');
INSERT INTO `car_region` VALUES ('2906', '华坪县', '2901', '530723');
INSERT INTO `car_region` VALUES ('2907', '宁蒗彝族自治县', '2901', '530724');
INSERT INTO `car_region` VALUES ('2908', '思茅市', '2842', '530800');
INSERT INTO `car_region` VALUES ('2909', '市辖区', '2908', '530801');
INSERT INTO `car_region` VALUES ('2910', '翠云区', '2908', '530802');
INSERT INTO `car_region` VALUES ('2911', '普洱哈尼族彝族自治县', '2908', '530821');
INSERT INTO `car_region` VALUES ('2912', '墨江哈尼族自治县', '2908', '530822');
INSERT INTO `car_region` VALUES ('2913', '景东彝族自治县', '2908', '530823');
INSERT INTO `car_region` VALUES ('2914', '景谷傣族彝族自治县', '2908', '530824');
INSERT INTO `car_region` VALUES ('2915', '镇沅彝族哈尼族拉祜族自治县', '2908', '530825');
INSERT INTO `car_region` VALUES ('2916', '江城哈尼族彝族自治县', '2908', '530826');
INSERT INTO `car_region` VALUES ('2917', '孟连傣族拉祜族佤族自治县', '2908', '530827');
INSERT INTO `car_region` VALUES ('2918', '澜沧拉祜族自治县', '2908', '530828');
INSERT INTO `car_region` VALUES ('2919', '西盟佤族自治县', '2908', '530829');
INSERT INTO `car_region` VALUES ('2920', '临沧市', '2842', '530900');
INSERT INTO `car_region` VALUES ('2921', '市辖区', '2920', '530901');
INSERT INTO `car_region` VALUES ('2922', '临翔区', '2920', '530902');
INSERT INTO `car_region` VALUES ('2923', '凤庆县', '2920', '530921');
INSERT INTO `car_region` VALUES ('2924', '云　县', '2920', '530922');
INSERT INTO `car_region` VALUES ('2925', '永德县', '2920', '530923');
INSERT INTO `car_region` VALUES ('2926', '镇康县', '2920', '530924');
INSERT INTO `car_region` VALUES ('2927', '双江拉祜族佤族布朗族傣族自治县', '2920', '530925');
INSERT INTO `car_region` VALUES ('2928', '耿马傣族佤族自治县', '2920', '530926');
INSERT INTO `car_region` VALUES ('2929', '沧源佤族自治县', '2920', '530927');
INSERT INTO `car_region` VALUES ('2930', '楚雄彝族自治州', '2842', '532300');
INSERT INTO `car_region` VALUES ('2931', '楚雄市', '2930', '532301');
INSERT INTO `car_region` VALUES ('2932', '双柏县', '2930', '532322');
INSERT INTO `car_region` VALUES ('2933', '牟定县', '2930', '532323');
INSERT INTO `car_region` VALUES ('2934', '南华县', '2930', '532324');
INSERT INTO `car_region` VALUES ('2935', '姚安县', '2930', '532325');
INSERT INTO `car_region` VALUES ('2936', '大姚县', '2930', '532326');
INSERT INTO `car_region` VALUES ('2937', '永仁县', '2930', '532327');
INSERT INTO `car_region` VALUES ('2938', '元谋县', '2930', '532328');
INSERT INTO `car_region` VALUES ('2939', '武定县', '2930', '532329');
INSERT INTO `car_region` VALUES ('2940', '禄丰县', '2930', '532331');
INSERT INTO `car_region` VALUES ('2941', '红河哈尼族彝族自治州', '2842', '532500');
INSERT INTO `car_region` VALUES ('2942', '个旧市', '2941', '532501');
INSERT INTO `car_region` VALUES ('2943', '开远市', '2941', '532502');
INSERT INTO `car_region` VALUES ('2944', '蒙自县', '2941', '532522');
INSERT INTO `car_region` VALUES ('2945', '屏边苗族自治县', '2941', '532523');
INSERT INTO `car_region` VALUES ('2946', '建水县', '2941', '532524');
INSERT INTO `car_region` VALUES ('2947', '石屏县', '2941', '532525');
INSERT INTO `car_region` VALUES ('2948', '弥勒县', '2941', '532526');
INSERT INTO `car_region` VALUES ('2949', '泸西县', '2941', '532527');
INSERT INTO `car_region` VALUES ('2950', '元阳县', '2941', '532528');
INSERT INTO `car_region` VALUES ('2951', '红河县', '2941', '532529');
INSERT INTO `car_region` VALUES ('2952', '金平苗族瑶族傣族自治县', '2941', '532530');
INSERT INTO `car_region` VALUES ('2953', '绿春县', '2941', '532531');
INSERT INTO `car_region` VALUES ('2954', '河口瑶族自治县', '2941', '532532');
INSERT INTO `car_region` VALUES ('2955', '文山壮族苗族自治州', '2842', '532600');
INSERT INTO `car_region` VALUES ('2956', '文山县', '2955', '532621');
INSERT INTO `car_region` VALUES ('2957', '砚山县', '2955', '532622');
INSERT INTO `car_region` VALUES ('2958', '西畴县', '2955', '532623');
INSERT INTO `car_region` VALUES ('2959', '麻栗坡县', '2955', '532624');
INSERT INTO `car_region` VALUES ('2960', '马关县', '2955', '532625');
INSERT INTO `car_region` VALUES ('2961', '丘北县', '2955', '532626');
INSERT INTO `car_region` VALUES ('2962', '广南县', '2955', '532627');
INSERT INTO `car_region` VALUES ('2963', '富宁县', '2955', '532628');
INSERT INTO `car_region` VALUES ('2964', '西双版纳傣族自治州', '2842', '532800');
INSERT INTO `car_region` VALUES ('2965', '景洪市', '2964', '532801');
INSERT INTO `car_region` VALUES ('2966', '勐海县', '2964', '532822');
INSERT INTO `car_region` VALUES ('2967', '勐腊县', '2964', '532823');
INSERT INTO `car_region` VALUES ('2968', '大理白族自治州', '2842', '532900');
INSERT INTO `car_region` VALUES ('2969', '大理市', '2968', '532901');
INSERT INTO `car_region` VALUES ('2970', '漾濞彝族自治县', '2968', '532922');
INSERT INTO `car_region` VALUES ('2971', '祥云县', '2968', '532923');
INSERT INTO `car_region` VALUES ('2972', '宾川县', '2968', '532924');
INSERT INTO `car_region` VALUES ('2973', '弥渡县', '2968', '532925');
INSERT INTO `car_region` VALUES ('2974', '南涧彝族自治县', '2968', '532926');
INSERT INTO `car_region` VALUES ('2975', '巍山彝族回族自治县', '2968', '532927');
INSERT INTO `car_region` VALUES ('2976', '永平县', '2968', '532928');
INSERT INTO `car_region` VALUES ('2977', '云龙县', '2968', '532929');
INSERT INTO `car_region` VALUES ('2978', '洱源县', '2968', '532930');
INSERT INTO `car_region` VALUES ('2979', '剑川县', '2968', '532931');
INSERT INTO `car_region` VALUES ('2980', '鹤庆县', '2968', '532932');
INSERT INTO `car_region` VALUES ('2981', '德宏傣族景颇族自治州', '2842', '533100');
INSERT INTO `car_region` VALUES ('2982', '瑞丽市', '2981', '533102');
INSERT INTO `car_region` VALUES ('2983', '潞西市', '2981', '533103');
INSERT INTO `car_region` VALUES ('2984', '梁河县', '2981', '533122');
INSERT INTO `car_region` VALUES ('2985', '盈江县', '2981', '533123');
INSERT INTO `car_region` VALUES ('2986', '陇川县', '2981', '533124');
INSERT INTO `car_region` VALUES ('2987', '怒江傈僳族自治州', '2842', '533300');
INSERT INTO `car_region` VALUES ('2988', '泸水县', '2987', '533321');
INSERT INTO `car_region` VALUES ('2989', '福贡县', '2987', '533323');
INSERT INTO `car_region` VALUES ('2990', '贡山独龙族怒族自治县', '2987', '533324');
INSERT INTO `car_region` VALUES ('2991', '兰坪白族普米族自治县', '2987', '533325');
INSERT INTO `car_region` VALUES ('2992', '迪庆藏族自治州', '2842', '533400');
INSERT INTO `car_region` VALUES ('2993', '香格里拉县', '2992', '533421');
INSERT INTO `car_region` VALUES ('2994', '德钦县', '2992', '533422');
INSERT INTO `car_region` VALUES ('2995', '维西傈僳族自治县', '2992', '533423');
INSERT INTO `car_region` VALUES ('2996', '西藏自治区', '0', '540000');
INSERT INTO `car_region` VALUES ('2997', '拉萨市', '2996', '540100');
INSERT INTO `car_region` VALUES ('2998', '市辖区', '2997', '540101');
INSERT INTO `car_region` VALUES ('2999', '城关区', '2997', '540102');
INSERT INTO `car_region` VALUES ('3000', '林周县', '2997', '540121');
INSERT INTO `car_region` VALUES ('3001', '当雄县', '2997', '540122');
INSERT INTO `car_region` VALUES ('3002', '尼木县', '2997', '540123');
INSERT INTO `car_region` VALUES ('3003', '曲水县', '2997', '540124');
INSERT INTO `car_region` VALUES ('3004', '堆龙德庆县', '2997', '540125');
INSERT INTO `car_region` VALUES ('3005', '达孜县', '2997', '540126');
INSERT INTO `car_region` VALUES ('3006', '墨竹工卡县', '2997', '540127');
INSERT INTO `car_region` VALUES ('3007', '昌都地区', '2996', '542100');
INSERT INTO `car_region` VALUES ('3008', '昌都县', '3007', '542121');
INSERT INTO `car_region` VALUES ('3009', '江达县', '3007', '542122');
INSERT INTO `car_region` VALUES ('3010', '贡觉县', '3007', '542123');
INSERT INTO `car_region` VALUES ('3011', '类乌齐县', '3007', '542124');
INSERT INTO `car_region` VALUES ('3012', '丁青县', '3007', '542125');
INSERT INTO `car_region` VALUES ('3013', '察雅县', '3007', '542126');
INSERT INTO `car_region` VALUES ('3014', '八宿县', '3007', '542127');
INSERT INTO `car_region` VALUES ('3015', '左贡县', '3007', '542128');
INSERT INTO `car_region` VALUES ('3016', '芒康县', '3007', '542129');
INSERT INTO `car_region` VALUES ('3017', '洛隆县', '3007', '542132');
INSERT INTO `car_region` VALUES ('3018', '边坝县', '3007', '542133');
INSERT INTO `car_region` VALUES ('3019', '山南地区', '2996', '542200');
INSERT INTO `car_region` VALUES ('3020', '乃东县', '3019', '542221');
INSERT INTO `car_region` VALUES ('3021', '扎囊县', '3019', '542222');
INSERT INTO `car_region` VALUES ('3022', '贡嘎县', '3019', '542223');
INSERT INTO `car_region` VALUES ('3023', '桑日县', '3019', '542224');
INSERT INTO `car_region` VALUES ('3024', '琼结县', '3019', '542225');
INSERT INTO `car_region` VALUES ('3025', '曲松县', '3019', '542226');
INSERT INTO `car_region` VALUES ('3026', '措美县', '3019', '542227');
INSERT INTO `car_region` VALUES ('3027', '洛扎县', '3019', '542228');
INSERT INTO `car_region` VALUES ('3028', '加查县', '3019', '542229');
INSERT INTO `car_region` VALUES ('3029', '隆子县', '3019', '542231');
INSERT INTO `car_region` VALUES ('3030', '错那县', '3019', '542232');
INSERT INTO `car_region` VALUES ('3031', '浪卡子县', '3019', '542233');
INSERT INTO `car_region` VALUES ('3032', '日喀则地区', '2996', '542300');
INSERT INTO `car_region` VALUES ('3033', '日喀则市', '3032', '542301');
INSERT INTO `car_region` VALUES ('3034', '南木林县', '3032', '542322');
INSERT INTO `car_region` VALUES ('3035', '江孜县', '3032', '542323');
INSERT INTO `car_region` VALUES ('3036', '定日县', '3032', '542324');
INSERT INTO `car_region` VALUES ('3037', '萨迦县', '3032', '542325');
INSERT INTO `car_region` VALUES ('3038', '拉孜县', '3032', '542326');
INSERT INTO `car_region` VALUES ('3039', '昂仁县', '3032', '542327');
INSERT INTO `car_region` VALUES ('3040', '谢通门县', '3032', '542328');
INSERT INTO `car_region` VALUES ('3041', '白朗县', '3032', '542329');
INSERT INTO `car_region` VALUES ('3042', '仁布县', '3032', '542330');
INSERT INTO `car_region` VALUES ('3043', '康马县', '3032', '542331');
INSERT INTO `car_region` VALUES ('3044', '定结县', '3032', '542332');
INSERT INTO `car_region` VALUES ('3045', '仲巴县', '3032', '542333');
INSERT INTO `car_region` VALUES ('3046', '亚东县', '3032', '542334');
INSERT INTO `car_region` VALUES ('3047', '吉隆县', '3032', '542335');
INSERT INTO `car_region` VALUES ('3048', '聂拉木县', '3032', '542336');
INSERT INTO `car_region` VALUES ('3049', '萨嘎县', '3032', '542337');
INSERT INTO `car_region` VALUES ('3050', '岗巴县', '3032', '542338');
INSERT INTO `car_region` VALUES ('3051', '那曲地区', '2996', '542400');
INSERT INTO `car_region` VALUES ('3052', '那曲县', '3051', '542421');
INSERT INTO `car_region` VALUES ('3053', '嘉黎县', '3051', '542422');
INSERT INTO `car_region` VALUES ('3054', '比如县', '3051', '542423');
INSERT INTO `car_region` VALUES ('3055', '聂荣县', '3051', '542424');
INSERT INTO `car_region` VALUES ('3056', '安多县', '3051', '542425');
INSERT INTO `car_region` VALUES ('3057', '申扎县', '3051', '542426');
INSERT INTO `car_region` VALUES ('3058', '索　县', '3051', '542427');
INSERT INTO `car_region` VALUES ('3059', '班戈县', '3051', '542428');
INSERT INTO `car_region` VALUES ('3060', '巴青县', '3051', '542429');
INSERT INTO `car_region` VALUES ('3061', '尼玛县', '3051', '542430');
INSERT INTO `car_region` VALUES ('3062', '阿里地区', '2996', '542500');
INSERT INTO `car_region` VALUES ('3063', '普兰县', '3062', '542521');
INSERT INTO `car_region` VALUES ('3064', '札达县', '3062', '542522');
INSERT INTO `car_region` VALUES ('3065', '噶尔县', '3062', '542523');
INSERT INTO `car_region` VALUES ('3066', '日土县', '3062', '542524');
INSERT INTO `car_region` VALUES ('3067', '革吉县', '3062', '542525');
INSERT INTO `car_region` VALUES ('3068', '改则县', '3062', '542526');
INSERT INTO `car_region` VALUES ('3069', '措勤县', '3062', '542527');
INSERT INTO `car_region` VALUES ('3070', '林芝地区', '2996', '542600');
INSERT INTO `car_region` VALUES ('3071', '林芝县', '3070', '542621');
INSERT INTO `car_region` VALUES ('3072', '工布江达县', '3070', '542622');
INSERT INTO `car_region` VALUES ('3073', '米林县', '3070', '542623');
INSERT INTO `car_region` VALUES ('3074', '墨脱县', '3070', '542624');
INSERT INTO `car_region` VALUES ('3075', '波密县', '3070', '542625');
INSERT INTO `car_region` VALUES ('3076', '察隅县', '3070', '542626');
INSERT INTO `car_region` VALUES ('3077', '朗　县', '3070', '542627');
INSERT INTO `car_region` VALUES ('3078', '陕西省', '0', '610000');
INSERT INTO `car_region` VALUES ('3079', '西安市', '3078', '610100');
INSERT INTO `car_region` VALUES ('3080', '市辖区', '3079', '610101');
INSERT INTO `car_region` VALUES ('3081', '新城区', '3079', '610102');
INSERT INTO `car_region` VALUES ('3082', '碑林区', '3079', '610103');
INSERT INTO `car_region` VALUES ('3083', '莲湖区', '3079', '610104');
INSERT INTO `car_region` VALUES ('3084', '灞桥区', '3079', '610111');
INSERT INTO `car_region` VALUES ('3085', '未央区', '3079', '610112');
INSERT INTO `car_region` VALUES ('3086', '雁塔区', '3079', '610113');
INSERT INTO `car_region` VALUES ('3087', '阎良区', '3079', '610114');
INSERT INTO `car_region` VALUES ('3088', '临潼区', '3079', '610115');
INSERT INTO `car_region` VALUES ('3089', '长安区', '3079', '610116');
INSERT INTO `car_region` VALUES ('3090', '蓝田县', '3079', '610122');
INSERT INTO `car_region` VALUES ('3091', '周至县', '3079', '610124');
INSERT INTO `car_region` VALUES ('3092', '户　县', '3079', '610125');
INSERT INTO `car_region` VALUES ('3093', '高陵县', '3079', '610126');
INSERT INTO `car_region` VALUES ('3094', '铜川市', '3078', '610200');
INSERT INTO `car_region` VALUES ('3095', '市辖区', '3094', '610201');
INSERT INTO `car_region` VALUES ('3096', '王益区', '3094', '610202');
INSERT INTO `car_region` VALUES ('3097', '印台区', '3094', '610203');
INSERT INTO `car_region` VALUES ('3098', '耀州区', '3094', '610204');
INSERT INTO `car_region` VALUES ('3099', '宜君县', '3094', '610222');
INSERT INTO `car_region` VALUES ('3100', '宝鸡市', '3078', '610300');
INSERT INTO `car_region` VALUES ('3101', '市辖区', '3100', '610301');
INSERT INTO `car_region` VALUES ('3102', '渭滨区', '3100', '610302');
INSERT INTO `car_region` VALUES ('3103', '金台区', '3100', '610303');
INSERT INTO `car_region` VALUES ('3104', '陈仓区', '3100', '610304');
INSERT INTO `car_region` VALUES ('3105', '凤翔县', '3100', '610322');
INSERT INTO `car_region` VALUES ('3106', '岐山县', '3100', '610323');
INSERT INTO `car_region` VALUES ('3107', '扶风县', '3100', '610324');
INSERT INTO `car_region` VALUES ('3108', '眉　县', '3100', '610326');
INSERT INTO `car_region` VALUES ('3109', '陇　县', '3100', '610327');
INSERT INTO `car_region` VALUES ('3110', '千阳县', '3100', '610328');
INSERT INTO `car_region` VALUES ('3111', '麟游县', '3100', '610329');
INSERT INTO `car_region` VALUES ('3112', '凤　县', '3100', '610330');
INSERT INTO `car_region` VALUES ('3113', '太白县', '3100', '610331');
INSERT INTO `car_region` VALUES ('3114', '咸阳市', '3078', '610400');
INSERT INTO `car_region` VALUES ('3115', '市辖区', '3114', '610401');
INSERT INTO `car_region` VALUES ('3116', '秦都区', '3114', '610402');
INSERT INTO `car_region` VALUES ('3117', '杨凌区', '3114', '610403');
INSERT INTO `car_region` VALUES ('3118', '渭城区', '3114', '610404');
INSERT INTO `car_region` VALUES ('3119', '三原县', '3114', '610422');
INSERT INTO `car_region` VALUES ('3120', '泾阳县', '3114', '610423');
INSERT INTO `car_region` VALUES ('3121', '乾　县', '3114', '610424');
INSERT INTO `car_region` VALUES ('3122', '礼泉县', '3114', '610425');
INSERT INTO `car_region` VALUES ('3123', '永寿县', '3114', '610426');
INSERT INTO `car_region` VALUES ('3124', '彬　县', '3114', '610427');
INSERT INTO `car_region` VALUES ('3125', '长武县', '3114', '610428');
INSERT INTO `car_region` VALUES ('3126', '旬邑县', '3114', '610429');
INSERT INTO `car_region` VALUES ('3127', '淳化县', '3114', '610430');
INSERT INTO `car_region` VALUES ('3128', '武功县', '3114', '610431');
INSERT INTO `car_region` VALUES ('3129', '兴平市', '3114', '610481');
INSERT INTO `car_region` VALUES ('3130', '渭南市', '3078', '610500');
INSERT INTO `car_region` VALUES ('3131', '市辖区', '3130', '610501');
INSERT INTO `car_region` VALUES ('3132', '临渭区', '3130', '610502');
INSERT INTO `car_region` VALUES ('3133', '华　县', '3130', '610521');
INSERT INTO `car_region` VALUES ('3134', '潼关县', '3130', '610522');
INSERT INTO `car_region` VALUES ('3135', '大荔县', '3130', '610523');
INSERT INTO `car_region` VALUES ('3136', '合阳县', '3130', '610524');
INSERT INTO `car_region` VALUES ('3137', '澄城县', '3130', '610525');
INSERT INTO `car_region` VALUES ('3138', '蒲城县', '3130', '610526');
INSERT INTO `car_region` VALUES ('3139', '白水县', '3130', '610527');
INSERT INTO `car_region` VALUES ('3140', '富平县', '3130', '610528');
INSERT INTO `car_region` VALUES ('3141', '韩城市', '3130', '610581');
INSERT INTO `car_region` VALUES ('3142', '华阴市', '3130', '610582');
INSERT INTO `car_region` VALUES ('3143', '延安市', '3078', '610600');
INSERT INTO `car_region` VALUES ('3144', '市辖区', '3143', '610601');
INSERT INTO `car_region` VALUES ('3145', '宝塔区', '3143', '610602');
INSERT INTO `car_region` VALUES ('3146', '延长县', '3143', '610621');
INSERT INTO `car_region` VALUES ('3147', '延川县', '3143', '610622');
INSERT INTO `car_region` VALUES ('3148', '子长县', '3143', '610623');
INSERT INTO `car_region` VALUES ('3149', '安塞县', '3143', '610624');
INSERT INTO `car_region` VALUES ('3150', '志丹县', '3143', '610625');
INSERT INTO `car_region` VALUES ('3151', '吴旗县', '3143', '610626');
INSERT INTO `car_region` VALUES ('3152', '甘泉县', '3143', '610627');
INSERT INTO `car_region` VALUES ('3153', '富　县', '3143', '610628');
INSERT INTO `car_region` VALUES ('3154', '洛川县', '3143', '610629');
INSERT INTO `car_region` VALUES ('3155', '宜川县', '3143', '610630');
INSERT INTO `car_region` VALUES ('3156', '黄龙县', '3143', '610631');
INSERT INTO `car_region` VALUES ('3157', '黄陵县', '3143', '610632');
INSERT INTO `car_region` VALUES ('3158', '汉中市', '3078', '610700');
INSERT INTO `car_region` VALUES ('3159', '市辖区', '3158', '610701');
INSERT INTO `car_region` VALUES ('3160', '汉台区', '3158', '610702');
INSERT INTO `car_region` VALUES ('3161', '南郑县', '3158', '610721');
INSERT INTO `car_region` VALUES ('3162', '城固县', '3158', '610722');
INSERT INTO `car_region` VALUES ('3163', '洋　县', '3158', '610723');
INSERT INTO `car_region` VALUES ('3164', '西乡县', '3158', '610724');
INSERT INTO `car_region` VALUES ('3165', '勉　县', '3158', '610725');
INSERT INTO `car_region` VALUES ('3166', '宁强县', '3158', '610726');
INSERT INTO `car_region` VALUES ('3167', '略阳县', '3158', '610727');
INSERT INTO `car_region` VALUES ('3168', '镇巴县', '3158', '610728');
INSERT INTO `car_region` VALUES ('3169', '留坝县', '3158', '610729');
INSERT INTO `car_region` VALUES ('3170', '佛坪县', '3158', '610730');
INSERT INTO `car_region` VALUES ('3171', '榆林市', '3078', '610800');
INSERT INTO `car_region` VALUES ('3172', '市辖区', '3171', '610801');
INSERT INTO `car_region` VALUES ('3173', '榆阳区', '3171', '610802');
INSERT INTO `car_region` VALUES ('3174', '神木县', '3171', '610821');
INSERT INTO `car_region` VALUES ('3175', '府谷县', '3171', '610822');
INSERT INTO `car_region` VALUES ('3176', '横山县', '3171', '610823');
INSERT INTO `car_region` VALUES ('3177', '靖边县', '3171', '610824');
INSERT INTO `car_region` VALUES ('3178', '定边县', '3171', '610825');
INSERT INTO `car_region` VALUES ('3179', '绥德县', '3171', '610826');
INSERT INTO `car_region` VALUES ('3180', '米脂县', '3171', '610827');
INSERT INTO `car_region` VALUES ('3181', '佳　县', '3171', '610828');
INSERT INTO `car_region` VALUES ('3182', '吴堡县', '3171', '610829');
INSERT INTO `car_region` VALUES ('3183', '清涧县', '3171', '610830');
INSERT INTO `car_region` VALUES ('3184', '子洲县', '3171', '610831');
INSERT INTO `car_region` VALUES ('3185', '安康市', '3078', '610900');
INSERT INTO `car_region` VALUES ('3186', '市辖区', '3185', '610901');
INSERT INTO `car_region` VALUES ('3187', '汉滨区', '3185', '610902');
INSERT INTO `car_region` VALUES ('3188', '汉阴县', '3185', '610921');
INSERT INTO `car_region` VALUES ('3189', '石泉县', '3185', '610922');
INSERT INTO `car_region` VALUES ('3190', '宁陕县', '3185', '610923');
INSERT INTO `car_region` VALUES ('3191', '紫阳县', '3185', '610924');
INSERT INTO `car_region` VALUES ('3192', '岚皋县', '3185', '610925');
INSERT INTO `car_region` VALUES ('3193', '平利县', '3185', '610926');
INSERT INTO `car_region` VALUES ('3194', '镇坪县', '3185', '610927');
INSERT INTO `car_region` VALUES ('3195', '旬阳县', '3185', '610928');
INSERT INTO `car_region` VALUES ('3196', '白河县', '3185', '610929');
INSERT INTO `car_region` VALUES ('3197', '商洛市', '3078', '611000');
INSERT INTO `car_region` VALUES ('3198', '市辖区', '3197', '611001');
INSERT INTO `car_region` VALUES ('3199', '商州区', '3197', '611002');
INSERT INTO `car_region` VALUES ('3200', '洛南县', '3197', '611021');
INSERT INTO `car_region` VALUES ('3201', '丹凤县', '3197', '611022');
INSERT INTO `car_region` VALUES ('3202', '商南县', '3197', '611023');
INSERT INTO `car_region` VALUES ('3203', '山阳县', '3197', '611024');
INSERT INTO `car_region` VALUES ('3204', '镇安县', '3197', '611025');
INSERT INTO `car_region` VALUES ('3205', '柞水县', '3197', '611026');
INSERT INTO `car_region` VALUES ('3206', '甘肃省', '0', '620000');
INSERT INTO `car_region` VALUES ('3207', '兰州市', '3206', '620100');
INSERT INTO `car_region` VALUES ('3208', '市辖区', '3207', '620101');
INSERT INTO `car_region` VALUES ('3209', '城关区', '3207', '620102');
INSERT INTO `car_region` VALUES ('3210', '七里河区', '3207', '620103');
INSERT INTO `car_region` VALUES ('3211', '西固区', '3207', '620104');
INSERT INTO `car_region` VALUES ('3212', '安宁区', '3207', '620105');
INSERT INTO `car_region` VALUES ('3213', '红古区', '3207', '620111');
INSERT INTO `car_region` VALUES ('3214', '永登县', '3207', '620121');
INSERT INTO `car_region` VALUES ('3215', '皋兰县', '3207', '620122');
INSERT INTO `car_region` VALUES ('3216', '榆中县', '3207', '620123');
INSERT INTO `car_region` VALUES ('3217', '嘉峪关市', '3206', '620200');
INSERT INTO `car_region` VALUES ('3218', '市辖区', '3217', '620201');
INSERT INTO `car_region` VALUES ('3219', '金昌市', '3206', '620300');
INSERT INTO `car_region` VALUES ('3220', '市辖区', '3219', '620301');
INSERT INTO `car_region` VALUES ('3221', '金川区', '3219', '620302');
INSERT INTO `car_region` VALUES ('3222', '永昌县', '3219', '620321');
INSERT INTO `car_region` VALUES ('3223', '白银市', '3206', '620400');
INSERT INTO `car_region` VALUES ('3224', '市辖区', '3223', '620401');
INSERT INTO `car_region` VALUES ('3225', '白银区', '3223', '620402');
INSERT INTO `car_region` VALUES ('3226', '平川区', '3223', '620403');
INSERT INTO `car_region` VALUES ('3227', '靖远县', '3223', '620421');
INSERT INTO `car_region` VALUES ('3228', '会宁县', '3223', '620422');
INSERT INTO `car_region` VALUES ('3229', '景泰县', '3223', '620423');
INSERT INTO `car_region` VALUES ('3230', '天水市', '3206', '620500');
INSERT INTO `car_region` VALUES ('3231', '市辖区', '3230', '620501');
INSERT INTO `car_region` VALUES ('3232', '秦城区', '3230', '620502');
INSERT INTO `car_region` VALUES ('3233', '北道区', '3230', '620503');
INSERT INTO `car_region` VALUES ('3234', '清水县', '3230', '620521');
INSERT INTO `car_region` VALUES ('3235', '秦安县', '3230', '620522');
INSERT INTO `car_region` VALUES ('3236', '甘谷县', '3230', '620523');
INSERT INTO `car_region` VALUES ('3237', '武山县', '3230', '620524');
INSERT INTO `car_region` VALUES ('3238', '张家川回族自治县', '3230', '620525');
INSERT INTO `car_region` VALUES ('3239', '武威市', '3206', '620600');
INSERT INTO `car_region` VALUES ('3240', '市辖区', '3239', '620601');
INSERT INTO `car_region` VALUES ('3241', '凉州区', '3239', '620602');
INSERT INTO `car_region` VALUES ('3242', '民勤县', '3239', '620621');
INSERT INTO `car_region` VALUES ('3243', '古浪县', '3239', '620622');
INSERT INTO `car_region` VALUES ('3244', '天祝藏族自治县', '3239', '620623');
INSERT INTO `car_region` VALUES ('3245', '张掖市', '3206', '620700');
INSERT INTO `car_region` VALUES ('3246', '市辖区', '3245', '620701');
INSERT INTO `car_region` VALUES ('3247', '甘州区', '3245', '620702');
INSERT INTO `car_region` VALUES ('3248', '肃南裕固族自治县', '3245', '620721');
INSERT INTO `car_region` VALUES ('3249', '民乐县', '3245', '620722');
INSERT INTO `car_region` VALUES ('3250', '临泽县', '3245', '620723');
INSERT INTO `car_region` VALUES ('3251', '高台县', '3245', '620724');
INSERT INTO `car_region` VALUES ('3252', '山丹县', '3245', '620725');
INSERT INTO `car_region` VALUES ('3253', '平凉市', '3206', '620800');
INSERT INTO `car_region` VALUES ('3254', '市辖区', '3253', '620801');
INSERT INTO `car_region` VALUES ('3255', '崆峒区', '3253', '620802');
INSERT INTO `car_region` VALUES ('3256', '泾川县', '3253', '620821');
INSERT INTO `car_region` VALUES ('3257', '灵台县', '3253', '620822');
INSERT INTO `car_region` VALUES ('3258', '崇信县', '3253', '620823');
INSERT INTO `car_region` VALUES ('3259', '华亭县', '3253', '620824');
INSERT INTO `car_region` VALUES ('3260', '庄浪县', '3253', '620825');
INSERT INTO `car_region` VALUES ('3261', '静宁县', '3253', '620826');
INSERT INTO `car_region` VALUES ('3262', '酒泉市', '3206', '620900');
INSERT INTO `car_region` VALUES ('3263', '市辖区', '3262', '620901');
INSERT INTO `car_region` VALUES ('3264', '肃州区', '3262', '620902');
INSERT INTO `car_region` VALUES ('3265', '金塔县', '3262', '620921');
INSERT INTO `car_region` VALUES ('3266', '安西县', '3262', '620922');
INSERT INTO `car_region` VALUES ('3267', '肃北蒙古族自治县', '3262', '620923');
INSERT INTO `car_region` VALUES ('3268', '阿克塞哈萨克族自治县', '3262', '620924');
INSERT INTO `car_region` VALUES ('3269', '玉门市', '3262', '620981');
INSERT INTO `car_region` VALUES ('3270', '敦煌市', '3262', '620982');
INSERT INTO `car_region` VALUES ('3271', '庆阳市', '3206', '621000');
INSERT INTO `car_region` VALUES ('3272', '市辖区', '3271', '621001');
INSERT INTO `car_region` VALUES ('3273', '西峰区', '3271', '621002');
INSERT INTO `car_region` VALUES ('3274', '庆城县', '3271', '621021');
INSERT INTO `car_region` VALUES ('3275', '环　县', '3271', '621022');
INSERT INTO `car_region` VALUES ('3276', '华池县', '3271', '621023');
INSERT INTO `car_region` VALUES ('3277', '合水县', '3271', '621024');
INSERT INTO `car_region` VALUES ('3278', '正宁县', '3271', '621025');
INSERT INTO `car_region` VALUES ('3279', '宁　县', '3271', '621026');
INSERT INTO `car_region` VALUES ('3280', '镇原县', '3271', '621027');
INSERT INTO `car_region` VALUES ('3281', '定西市', '3206', '621100');
INSERT INTO `car_region` VALUES ('3282', '市辖区', '3281', '621101');
INSERT INTO `car_region` VALUES ('3283', '安定区', '3281', '621102');
INSERT INTO `car_region` VALUES ('3284', '通渭县', '3281', '621121');
INSERT INTO `car_region` VALUES ('3285', '陇西县', '3281', '621122');
INSERT INTO `car_region` VALUES ('3286', '渭源县', '3281', '621123');
INSERT INTO `car_region` VALUES ('3287', '临洮县', '3281', '621124');
INSERT INTO `car_region` VALUES ('3288', '漳　县', '3281', '621125');
INSERT INTO `car_region` VALUES ('3289', '岷　县', '3281', '621126');
INSERT INTO `car_region` VALUES ('3290', '陇南市', '3206', '621200');
INSERT INTO `car_region` VALUES ('3291', '市辖区', '3290', '621201');
INSERT INTO `car_region` VALUES ('3292', '武都区', '3290', '621202');
INSERT INTO `car_region` VALUES ('3293', '成　县', '3290', '621221');
INSERT INTO `car_region` VALUES ('3294', '文　县', '3290', '621222');
INSERT INTO `car_region` VALUES ('3295', '宕昌县', '3290', '621223');
INSERT INTO `car_region` VALUES ('3296', '康　县', '3290', '621224');
INSERT INTO `car_region` VALUES ('3297', '西和县', '3290', '621225');
INSERT INTO `car_region` VALUES ('3298', '礼　县', '3290', '621226');
INSERT INTO `car_region` VALUES ('3299', '徽　县', '3290', '621227');
INSERT INTO `car_region` VALUES ('3300', '两当县', '3290', '621228');
INSERT INTO `car_region` VALUES ('3301', '临夏回族自治州', '3206', '622900');
INSERT INTO `car_region` VALUES ('3302', '临夏市', '3301', '622901');
INSERT INTO `car_region` VALUES ('3303', '临夏县', '3301', '622921');
INSERT INTO `car_region` VALUES ('3304', '康乐县', '3301', '622922');
INSERT INTO `car_region` VALUES ('3305', '永靖县', '3301', '622923');
INSERT INTO `car_region` VALUES ('3306', '广河县', '3301', '622924');
INSERT INTO `car_region` VALUES ('3307', '和政县', '3301', '622925');
INSERT INTO `car_region` VALUES ('3308', '东乡族自治县', '3301', '622926');
INSERT INTO `car_region` VALUES ('3309', '积石山保安族东乡族撒拉族自治县', '3301', '622927');
INSERT INTO `car_region` VALUES ('3310', '甘南藏族自治州', '3206', '623000');
INSERT INTO `car_region` VALUES ('3311', '合作市', '3310', '623001');
INSERT INTO `car_region` VALUES ('3312', '临潭县', '3310', '623021');
INSERT INTO `car_region` VALUES ('3313', '卓尼县', '3310', '623022');
INSERT INTO `car_region` VALUES ('3314', '舟曲县', '3310', '623023');
INSERT INTO `car_region` VALUES ('3315', '迭部县', '3310', '623024');
INSERT INTO `car_region` VALUES ('3316', '玛曲县', '3310', '623025');
INSERT INTO `car_region` VALUES ('3317', '碌曲县', '3310', '623026');
INSERT INTO `car_region` VALUES ('3318', '夏河县', '3310', '623027');
INSERT INTO `car_region` VALUES ('3319', '青海省', '0', '630000');
INSERT INTO `car_region` VALUES ('3320', '西宁市', '3319', '630100');
INSERT INTO `car_region` VALUES ('3321', '市辖区', '3320', '630101');
INSERT INTO `car_region` VALUES ('3322', '城东区', '3320', '630102');
INSERT INTO `car_region` VALUES ('3323', '城中区', '3320', '630103');
INSERT INTO `car_region` VALUES ('3324', '城西区', '3320', '630104');
INSERT INTO `car_region` VALUES ('3325', '城北区', '3320', '630105');
INSERT INTO `car_region` VALUES ('3326', '大通回族土族自治县', '3320', '630121');
INSERT INTO `car_region` VALUES ('3327', '湟中县', '3320', '630122');
INSERT INTO `car_region` VALUES ('3328', '湟源县', '3320', '630123');
INSERT INTO `car_region` VALUES ('3329', '海东地区', '3319', '632100');
INSERT INTO `car_region` VALUES ('3330', '平安县', '3329', '632121');
INSERT INTO `car_region` VALUES ('3331', '民和回族土族自治县', '3329', '632122');
INSERT INTO `car_region` VALUES ('3332', '乐都县', '3329', '632123');
INSERT INTO `car_region` VALUES ('3333', '互助土族自治县', '3329', '632126');
INSERT INTO `car_region` VALUES ('3334', '化隆回族自治县', '3329', '632127');
INSERT INTO `car_region` VALUES ('3335', '循化撒拉族自治县', '3329', '632128');
INSERT INTO `car_region` VALUES ('3336', '海北藏族自治州', '3319', '632200');
INSERT INTO `car_region` VALUES ('3337', '门源回族自治县', '3336', '632221');
INSERT INTO `car_region` VALUES ('3338', '祁连县', '3336', '632222');
INSERT INTO `car_region` VALUES ('3339', '海晏县', '3336', '632223');
INSERT INTO `car_region` VALUES ('3340', '刚察县', '3336', '632224');
INSERT INTO `car_region` VALUES ('3341', '黄南藏族自治州', '3319', '632300');
INSERT INTO `car_region` VALUES ('3342', '同仁县', '3341', '632321');
INSERT INTO `car_region` VALUES ('3343', '尖扎县', '3341', '632322');
INSERT INTO `car_region` VALUES ('3344', '泽库县', '3341', '632323');
INSERT INTO `car_region` VALUES ('3345', '河南蒙古族自治县', '3341', '632324');
INSERT INTO `car_region` VALUES ('3346', '海南藏族自治州', '3319', '632500');
INSERT INTO `car_region` VALUES ('3347', '共和县', '3346', '632521');
INSERT INTO `car_region` VALUES ('3348', '同德县', '3346', '632522');
INSERT INTO `car_region` VALUES ('3349', '贵德县', '3346', '632523');
INSERT INTO `car_region` VALUES ('3350', '兴海县', '3346', '632524');
INSERT INTO `car_region` VALUES ('3351', '贵南县', '3346', '632525');
INSERT INTO `car_region` VALUES ('3352', '果洛藏族自治州', '3319', '632600');
INSERT INTO `car_region` VALUES ('3353', '玛沁县', '3352', '632621');
INSERT INTO `car_region` VALUES ('3354', '班玛县', '3352', '632622');
INSERT INTO `car_region` VALUES ('3355', '甘德县', '3352', '632623');
INSERT INTO `car_region` VALUES ('3356', '达日县', '3352', '632624');
INSERT INTO `car_region` VALUES ('3357', '久治县', '3352', '632625');
INSERT INTO `car_region` VALUES ('3358', '玛多县', '3352', '632626');
INSERT INTO `car_region` VALUES ('3359', '玉树藏族自治州', '3319', '632700');
INSERT INTO `car_region` VALUES ('3360', '玉树县', '3359', '632721');
INSERT INTO `car_region` VALUES ('3361', '杂多县', '3359', '632722');
INSERT INTO `car_region` VALUES ('3362', '称多县', '3359', '632723');
INSERT INTO `car_region` VALUES ('3363', '治多县', '3359', '632724');
INSERT INTO `car_region` VALUES ('3364', '囊谦县', '3359', '632725');
INSERT INTO `car_region` VALUES ('3365', '曲麻莱县', '3359', '632726');
INSERT INTO `car_region` VALUES ('3366', '海西蒙古族藏族自治州', '3319', '632800');
INSERT INTO `car_region` VALUES ('3367', '格尔木市', '3366', '632801');
INSERT INTO `car_region` VALUES ('3368', '德令哈市', '3366', '632802');
INSERT INTO `car_region` VALUES ('3369', '乌兰县', '3366', '632821');
INSERT INTO `car_region` VALUES ('3370', '都兰县', '3366', '632822');
INSERT INTO `car_region` VALUES ('3371', '天峻县', '3366', '632823');
INSERT INTO `car_region` VALUES ('3372', '宁夏回族自治区', '0', '640000');
INSERT INTO `car_region` VALUES ('3373', '银川市', '3372', '640100');
INSERT INTO `car_region` VALUES ('3374', '市辖区', '3373', '640101');
INSERT INTO `car_region` VALUES ('3375', '兴庆区', '3373', '640104');
INSERT INTO `car_region` VALUES ('3376', '西夏区', '3373', '640105');
INSERT INTO `car_region` VALUES ('3377', '金凤区', '3373', '640106');
INSERT INTO `car_region` VALUES ('3378', '永宁县', '3373', '640121');
INSERT INTO `car_region` VALUES ('3379', '贺兰县', '3373', '640122');
INSERT INTO `car_region` VALUES ('3380', '灵武市', '3373', '640181');
INSERT INTO `car_region` VALUES ('3381', '石嘴山市', '3372', '640200');
INSERT INTO `car_region` VALUES ('3382', '市辖区', '3381', '640201');
INSERT INTO `car_region` VALUES ('3383', '大武口区', '3381', '640202');
INSERT INTO `car_region` VALUES ('3384', '惠农区', '3381', '640205');
INSERT INTO `car_region` VALUES ('3385', '平罗县', '3381', '640221');
INSERT INTO `car_region` VALUES ('3386', '吴忠市', '3372', '640300');
INSERT INTO `car_region` VALUES ('3387', '市辖区', '3386', '640301');
INSERT INTO `car_region` VALUES ('3388', '利通区', '3386', '640302');
INSERT INTO `car_region` VALUES ('3389', '盐池县', '3386', '640323');
INSERT INTO `car_region` VALUES ('3390', '同心县', '3386', '640324');
INSERT INTO `car_region` VALUES ('3391', '青铜峡市', '3386', '640381');
INSERT INTO `car_region` VALUES ('3392', '固原市', '3372', '640400');
INSERT INTO `car_region` VALUES ('3393', '市辖区', '3392', '640401');
INSERT INTO `car_region` VALUES ('3394', '原州区', '3392', '640402');
INSERT INTO `car_region` VALUES ('3395', '西吉县', '3392', '640422');
INSERT INTO `car_region` VALUES ('3396', '隆德县', '3392', '640423');
INSERT INTO `car_region` VALUES ('3397', '泾源县', '3392', '640424');
INSERT INTO `car_region` VALUES ('3398', '彭阳县', '3392', '640425');
INSERT INTO `car_region` VALUES ('3399', '海原县', '3392', '640522');
INSERT INTO `car_region` VALUES ('3400', '中卫市', '3372', '640500');
INSERT INTO `car_region` VALUES ('3401', '市辖区', '3400', '640501');
INSERT INTO `car_region` VALUES ('3402', '沙坡头区', '3400', '640502');
INSERT INTO `car_region` VALUES ('3403', '中宁县', '3400', '640521');
INSERT INTO `car_region` VALUES ('3404', '新疆维吾尔自治区', '0', '650000');
INSERT INTO `car_region` VALUES ('3405', '乌鲁木齐市', '3404', '650100');
INSERT INTO `car_region` VALUES ('3406', '市辖区', '3405', '650101');
INSERT INTO `car_region` VALUES ('3407', '天山区', '3405', '650102');
INSERT INTO `car_region` VALUES ('3408', '沙依巴克区', '3405', '650103');
INSERT INTO `car_region` VALUES ('3409', '新市区', '3405', '650104');
INSERT INTO `car_region` VALUES ('3410', '水磨沟区', '3405', '650105');
INSERT INTO `car_region` VALUES ('3411', '头屯河区', '3405', '650106');
INSERT INTO `car_region` VALUES ('3412', '达坂城区', '3405', '650107');
INSERT INTO `car_region` VALUES ('3413', '东山区', '3405', '650108');
INSERT INTO `car_region` VALUES ('3414', '乌鲁木齐县', '3405', '650121');
INSERT INTO `car_region` VALUES ('3415', '克拉玛依市', '3404', '650200');
INSERT INTO `car_region` VALUES ('3416', '市辖区', '3415', '650201');
INSERT INTO `car_region` VALUES ('3417', '独山子区', '3415', '650202');
INSERT INTO `car_region` VALUES ('3418', '克拉玛依区', '3415', '650203');
INSERT INTO `car_region` VALUES ('3419', '白碱滩区', '3415', '650204');
INSERT INTO `car_region` VALUES ('3420', '乌尔禾区', '3415', '650205');
INSERT INTO `car_region` VALUES ('3421', '吐鲁番地区', '3404', '652100');
INSERT INTO `car_region` VALUES ('3422', '吐鲁番市', '3421', '652101');
INSERT INTO `car_region` VALUES ('3423', '鄯善县', '3421', '652122');
INSERT INTO `car_region` VALUES ('3424', '托克逊县', '3421', '652123');
INSERT INTO `car_region` VALUES ('3425', '哈密地区', '3404', '652200');
INSERT INTO `car_region` VALUES ('3426', '哈密市', '3425', '652201');
INSERT INTO `car_region` VALUES ('3427', '巴里坤哈萨克自治县', '3425', '652222');
INSERT INTO `car_region` VALUES ('3428', '伊吾县', '3425', '652223');
INSERT INTO `car_region` VALUES ('3429', '昌吉回族自治州', '3404', '652300');
INSERT INTO `car_region` VALUES ('3430', '昌吉市', '3429', '652301');
INSERT INTO `car_region` VALUES ('3431', '阜康市', '3429', '652302');
INSERT INTO `car_region` VALUES ('3432', '米泉市', '3429', '652303');
INSERT INTO `car_region` VALUES ('3433', '呼图壁县', '3429', '652323');
INSERT INTO `car_region` VALUES ('3434', '玛纳斯县', '3429', '652324');
INSERT INTO `car_region` VALUES ('3435', '奇台县', '3429', '652325');
INSERT INTO `car_region` VALUES ('3436', '吉木萨尔县', '3429', '652327');
INSERT INTO `car_region` VALUES ('3437', '木垒哈萨克自治县', '3429', '652328');
INSERT INTO `car_region` VALUES ('3438', '博尔塔拉蒙古自治州', '3404', '652700');
INSERT INTO `car_region` VALUES ('3439', '博乐市', '3438', '652701');
INSERT INTO `car_region` VALUES ('3440', '精河县', '3438', '652722');
INSERT INTO `car_region` VALUES ('3441', '温泉县', '3438', '652723');
INSERT INTO `car_region` VALUES ('3442', '巴音郭楞蒙古自治州', '3404', '652800');
INSERT INTO `car_region` VALUES ('3443', '库尔勒市', '3442', '652801');
INSERT INTO `car_region` VALUES ('3444', '轮台县', '3442', '652822');
INSERT INTO `car_region` VALUES ('3445', '尉犁县', '3442', '652823');
INSERT INTO `car_region` VALUES ('3446', '若羌县', '3442', '652824');
INSERT INTO `car_region` VALUES ('3447', '且末县', '3442', '652825');
INSERT INTO `car_region` VALUES ('3448', '焉耆回族自治县', '3442', '652826');
INSERT INTO `car_region` VALUES ('3449', '和静县', '3442', '652827');
INSERT INTO `car_region` VALUES ('3450', '和硕县', '3442', '652828');
INSERT INTO `car_region` VALUES ('3451', '博湖县', '3442', '652829');
INSERT INTO `car_region` VALUES ('3452', '阿克苏地区', '3404', '652900');
INSERT INTO `car_region` VALUES ('3453', '阿克苏市', '3452', '652901');
INSERT INTO `car_region` VALUES ('3454', '温宿县', '3452', '652922');
INSERT INTO `car_region` VALUES ('3455', '库车县', '3452', '652923');
INSERT INTO `car_region` VALUES ('3456', '沙雅县', '3452', '652924');
INSERT INTO `car_region` VALUES ('3457', '新和县', '3452', '652925');
INSERT INTO `car_region` VALUES ('3458', '拜城县', '3452', '652926');
INSERT INTO `car_region` VALUES ('3459', '乌什县', '3452', '652927');
INSERT INTO `car_region` VALUES ('3460', '阿瓦提县', '3452', '652928');
INSERT INTO `car_region` VALUES ('3461', '柯坪县', '3452', '652929');
INSERT INTO `car_region` VALUES ('3462', '克孜勒苏柯尔克孜自治州', '3404', '653000');
INSERT INTO `car_region` VALUES ('3463', '阿图什市', '3462', '653001');
INSERT INTO `car_region` VALUES ('3464', '阿克陶县', '3462', '653022');
INSERT INTO `car_region` VALUES ('3465', '阿合奇县', '3462', '653023');
INSERT INTO `car_region` VALUES ('3466', '乌恰县', '3462', '653024');
INSERT INTO `car_region` VALUES ('3467', '喀什地区', '3404', '653100');
INSERT INTO `car_region` VALUES ('3468', '喀什市', '3467', '653101');
INSERT INTO `car_region` VALUES ('3469', '疏附县', '3467', '653121');
INSERT INTO `car_region` VALUES ('3470', '疏勒县', '3467', '653122');
INSERT INTO `car_region` VALUES ('3471', '英吉沙县', '3467', '653123');
INSERT INTO `car_region` VALUES ('3472', '泽普县', '3467', '653124');
INSERT INTO `car_region` VALUES ('3473', '莎车县', '3467', '653125');
INSERT INTO `car_region` VALUES ('3474', '叶城县', '3467', '653126');
INSERT INTO `car_region` VALUES ('3475', '麦盖提县', '3467', '653127');
INSERT INTO `car_region` VALUES ('3476', '岳普湖县', '3467', '653128');
INSERT INTO `car_region` VALUES ('3477', '伽师县', '3467', '653129');
INSERT INTO `car_region` VALUES ('3478', '巴楚县', '3467', '653130');
INSERT INTO `car_region` VALUES ('3479', '塔什库尔干塔吉克自治县', '3467', '653131');
INSERT INTO `car_region` VALUES ('3480', '和田地区', '3404', '653200');
INSERT INTO `car_region` VALUES ('3481', '和田市', '3480', '653201');
INSERT INTO `car_region` VALUES ('3482', '和田县', '3480', '653221');
INSERT INTO `car_region` VALUES ('3483', '墨玉县', '3480', '653222');
INSERT INTO `car_region` VALUES ('3484', '皮山县', '3480', '653223');
INSERT INTO `car_region` VALUES ('3485', '洛浦县', '3480', '653224');
INSERT INTO `car_region` VALUES ('3486', '策勒县', '3480', '653225');
INSERT INTO `car_region` VALUES ('3487', '于田县', '3480', '653226');
INSERT INTO `car_region` VALUES ('3488', '民丰县', '3480', '653227');
INSERT INTO `car_region` VALUES ('3489', '伊犁哈萨克自治州', '3404', '654000');
INSERT INTO `car_region` VALUES ('3490', '伊宁市', '3489', '654002');
INSERT INTO `car_region` VALUES ('3491', '奎屯市', '3489', '654003');
INSERT INTO `car_region` VALUES ('3492', '伊宁县', '3489', '654021');
INSERT INTO `car_region` VALUES ('3493', '察布查尔锡伯自治县', '3489', '654022');
INSERT INTO `car_region` VALUES ('3494', '霍城县', '3489', '654023');
INSERT INTO `car_region` VALUES ('3495', '巩留县', '3489', '654024');
INSERT INTO `car_region` VALUES ('3496', '新源县', '3489', '654025');
INSERT INTO `car_region` VALUES ('3497', '昭苏县', '3489', '654026');
INSERT INTO `car_region` VALUES ('3498', '特克斯县', '3489', '654027');
INSERT INTO `car_region` VALUES ('3499', '尼勒克县', '3489', '654028');
INSERT INTO `car_region` VALUES ('3500', '塔城地区', '3404', '654200');
INSERT INTO `car_region` VALUES ('3501', '塔城市', '3500', '654201');
INSERT INTO `car_region` VALUES ('3502', '乌苏市', '3500', '654202');
INSERT INTO `car_region` VALUES ('3503', '额敏县', '3500', '654221');
INSERT INTO `car_region` VALUES ('3504', '沙湾县', '3500', '654223');
INSERT INTO `car_region` VALUES ('3505', '托里县', '3500', '654224');
INSERT INTO `car_region` VALUES ('3506', '裕民县', '3500', '654225');
INSERT INTO `car_region` VALUES ('3507', '和布克赛尔蒙古自治县', '3500', '654226');
INSERT INTO `car_region` VALUES ('3508', '阿勒泰地区', '3404', '654300');
INSERT INTO `car_region` VALUES ('3509', '阿勒泰市', '3508', '654301');
INSERT INTO `car_region` VALUES ('3510', '布尔津县', '3508', '654321');
INSERT INTO `car_region` VALUES ('3511', '富蕴县', '3508', '654322');
INSERT INTO `car_region` VALUES ('3512', '福海县', '3508', '654323');
INSERT INTO `car_region` VALUES ('3513', '哈巴河县', '3508', '654324');
INSERT INTO `car_region` VALUES ('3514', '青河县', '3508', '654325');
INSERT INTO `car_region` VALUES ('3515', '吉木乃县', '3508', '654326');
INSERT INTO `car_region` VALUES ('3516', '省直辖行政单位', '3404', '659000');
INSERT INTO `car_region` VALUES ('3517', '石河子市', '3516', '659001');
INSERT INTO `car_region` VALUES ('3518', '阿拉尔市', '3516', '659002');
INSERT INTO `car_region` VALUES ('3519', '图木舒克市', '3516', '659003');
INSERT INTO `car_region` VALUES ('3520', '五家渠市', '3516', '659004');
INSERT INTO `car_region` VALUES ('3521', '台湾省', '0', '710000');
INSERT INTO `car_region` VALUES ('3522', '香港特别行政区', '0', '810000');
INSERT INTO `car_region` VALUES ('3523', '澳门特别行政区', '0', '820000');

-- ----------------------------
-- Table structure for car_sms_record
-- ----------------------------
DROP TABLE IF EXISTS `car_sms_record`;
CREATE TABLE `car_sms_record` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `type` varchar(20) DEFAULT NULL COMMENT '短信类型',
  `phone` char(13) DEFAULT NULL COMMENT '手机号码',
  `request_id` varchar(100) DEFAULT NULL COMMENT '短信request_id',
  `status` tinyint(1) DEFAULT '1' COMMENT '发送状态：1：成功；2：失败；',
  `bizid` varchar(100) DEFAULT NULL COMMENT '返回参数bizid',
  `code` varchar(100) DEFAULT NULL COMMENT '错误码',
  `message` varchar(100) DEFAULT NULL COMMENT '返回信息',
  `sms_code` varchar(100) DEFAULT NULL COMMENT '短信模板编号',
  `ext` text COMMENT '短信发送信息',
  `ctime` int(13) DEFAULT NULL COMMENT '调用接口时间',
  `sendtime` int(13) DEFAULT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_sms_record
-- ----------------------------
INSERT INTO `car_sms_record` VALUES ('1', 'auth', '13992891749', 'B168E793-C4C0-44FF-86D6-4F40023040CA', '1', '108847286703^1111874542682', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiJCMTY4RTc5My1DNEMwLTQ0RkYtODZENi00RjQwMDIzMDQwQ0EiO3M6NToiQml6SWQiO3M6MjY6IjEwODg0NzI4NjcwM14xMTExODc0NTQyNjgyIjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', null, null);
INSERT INTO `car_sms_record` VALUES ('2', 'auth', '13992891749', '256A8231-2B73-47FE-BE54-58B66233D637', '1', '108847485672^1111874806625', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIyNTZBODIzMS0yQjczLTQ3RkUtQkU1NC01OEI2NjIzM0Q2MzciO3M6NToiQml6SWQiO3M6MjY6IjEwODg0NzQ4NTY3Ml4xMTExODc0ODA2NjI1IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', null, null);
INSERT INTO `car_sms_record` VALUES ('3', 'auth', '13992891749', '63785C86-6386-4460-BA44-5B8F50C2C84C', '1', '108850528020^1111878525880', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiI2Mzc4NUM4Ni02Mzg2LTQ0NjAtQkE0NC01QjhGNTBDMkM4NEMiO3M6NToiQml6SWQiO3M6MjY6IjEwODg1MDUyODAyMF4xMTExODc4NTI1ODgwIjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', null, null);
INSERT INTO `car_sms_record` VALUES ('4', 'auth', '13992891749', '2435900F-857E-4826-92ED-FCC4DA0AADB3', '1', '108850618176^1111878572167', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIyNDM1OTAwRi04NTdFLTQ4MjYtOTJFRC1GQ0M0REEwQUFEQjMiO3M6NToiQml6SWQiO3M6MjY6IjEwODg1MDYxODE3Nl4xMTExODc4NTcyMTY3IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1500445292', '1500445292');
INSERT INTO `car_sms_record` VALUES ('5', 'auth', '13992891749', 'D9AD411C-DFD6-4B94-9561-5910B8CA40EB', '1', '108984585091^1112038081506', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiJEOUFENDExQy1ERkQ2LTRCOTQtOTU2MS01OTEwQjhDQTQwRUIiO3M6NToiQml6SWQiO3M6MjY6IjEwODk4NDU4NTA5MV4xMTEyMDM4MDgxNTA2IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501032378', '1501032378');
INSERT INTO `car_sms_record` VALUES ('6', 'auth', '13992891749', '18113B25-3E60-49CD-BFDC-8688C06156CA', '1', '108985693693^1112039824035', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIxODExM0IyNS0zRTYwLTQ5Q0QtQkZEQy04Njg4QzA2MTU2Q0EiO3M6NToiQml6SWQiO3M6MjY6IjEwODk4NTY5MzY5M14xMTEyMDM5ODI0MDM1IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501034352', '1501034352');
INSERT INTO `car_sms_record` VALUES ('7', 'auth', '13992891749', '0FCE2DCC-265D-4367-9033-68BED8BE9114', '1', '108986896236^1112041555627', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIwRkNFMkRDQy0yNjVELTQzNjctOTAzMy02OEJFRDhCRTkxMTQiO3M6NToiQml6SWQiO3M6MjY6IjEwODk4Njg5NjIzNl4xMTEyMDQxNTU1NjI3IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501035907', '1501035907');
INSERT INTO `car_sms_record` VALUES ('8', 'auth', '13992891749', '10AEB653-02F1-4F62-8EB9-A1B0FE7EE1CC', '1', '108987328426^1112042148873', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIxMEFFQjY1My0wMkYxLTRGNjItOEVCOS1BMUIwRkU3RUUxQ0MiO3M6NToiQml6SWQiO3M6MjY6IjEwODk4NzMyODQyNl4xMTEyMDQyMTQ4ODczIjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501036712', '1501036712');
INSERT INTO `car_sms_record` VALUES ('9', 'auth', '13992891749', '8415C667-9097-4DEC-B4E1-C7145BA378EB', '1', '108996998777^1112052925709', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiI4NDE1QzY2Ny05MDk3LTRERUMtQjRFMS1DNzE0NUJBMzc4RUIiO3M6NToiQml6SWQiO3M6MjY6IjEwODk5Njk5ODc3N14xMTEyMDUyOTI1NzA5IjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501060378', '1501060378');
INSERT INTO `car_sms_record` VALUES ('10', 'auth', '13992891749', '2C28D038-24FF-43F2-AED5-0733751311AB', '1', '109132122141^1112211042842', 'OK', 'OK', 'SMS_77475079', 'YTo0OntzOjc6Ik1lc3NhZ2UiO3M6MjoiT0siO3M6OToiUmVxdWVzdElkIjtzOjM2OiIyQzI4RDAzOC0yNEZGLTQzRjItQUVENS0wNzMzNzUxMzExQUIiO3M6NToiQml6SWQiO3M6MjY6IjEwOTEzMjEyMjE0MV4xMTEyMjExMDQyODQyIjtzOjQ6IkNvZGUiO3M6MjoiT0siO30=', '1501654605', '1501654605');

-- ----------------------------
-- Table structure for car_store
-- ----------------------------
DROP TABLE IF EXISTS `car_store`;
CREATE TABLE `car_store` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `name` varchar(300) NOT NULL COMMENT '门店名称',
  `ename` varchar(300) DEFAULT '' COMMENT '英文名称',
  `type` tinyint(2) NOT NULL COMMENT '门店类型',
  `provinceid` int(13) NOT NULL COMMENT '门店所在省ID',
  `cityid` int(13) NOT NULL COMMENT '门店所在城市ID',
  `areaid` int(13) DEFAULT NULL COMMENT '区县id',
  `address` varchar(500) NOT NULL DEFAULT '' COMMENT '门店地址',
  `eaddress` varchar(500) DEFAULT '' COMMENT '门店地址英文',
  `telephone` char(25) NOT NULL COMMENT '门店联系电话',
  `lat` char(25) NOT NULL COMMENT '门店经度',
  `lng` char(25) NOT NULL COMMENT '门店维度',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_store
-- ----------------------------
INSERT INTO `car_store` VALUES ('2', 'aaaa', '1', '1', '238', '251', '259', '1dfafdfda', '', '132323232', '', '');
INSERT INTO `car_store` VALUES ('3', 'dafdafda', '1', '1', '865', '885', '886', 'dfafa', '', '12321321321', '', '');
INSERT INTO `car_store` VALUES ('4', '测试店铺', '1', '1', '22', '39', '41', '天津市静海县', '', '13992891749', '38.953446', '116.980747');
INSERT INTO `car_store` VALUES ('5', '百佳科技股份有限公司', '1', '1', '3078', '3079', '3086', '西安市碑林区丈八一路蓝海大厦', '', '13992891749', '34.203527', '108.890938');
INSERT INTO `car_store` VALUES ('6', '春夏不秋冬', '1', '1', '1020', '1021', '1027', '浙江省杭州市西湖区文二路2', '', '15958209072', '30.288699', '120.125797');
INSERT INTO `car_store` VALUES ('7', '测试地址', '1', '2', '3078', '3079', '3082', '陕西省西安市友谊西路188号公安五处高层', '', '13992891749', '34.247019', '108.943165');
INSERT INTO `car_store` VALUES ('8', '测试门店1', '1', '3', '3078', '3079', '3082', '陕西省西安市长安大学', '', '13992891749', '34.238905', '108.96253');
INSERT INTO `car_store` VALUES ('9', '地址测试', '1', '2', '709', '829', null, '黑龙江省牡丹江市绥芬河市天佑国际', '', '13992891749', '44.410588', '131.169873');
INSERT INTO `car_store` VALUES ('10', 'aaaaaaaaaaaa11111', '1', '1', '2476', '2477', '2479', '西安市碑林区', '', '13992891749', '34.236608', '108.940746');
INSERT INTO `car_store` VALUES ('11', '康顺-长春尚腾', '1', '1', '631', '632', '638', '长春市长沈路4222号（南四环与西湖大路交汇立交桥）', '', '4008204052', '43.824446', '125.211788');
INSERT INTO `car_store` VALUES ('12', '恒信-武汉星隆', '1', '1', '1868', '1869', '1874', '湖北省武汉市汉阳区龙阳大道邱家大湾特1号', '', '4008204052', '30.554911', '114.210211');
INSERT INTO `car_store` VALUES ('13', '测试门店1', '1', '1', '1', '19', '20', '陕西省西安市公安五处高层', '', '4008204052', '34.247019', '108.943165');
INSERT INTO `car_store` VALUES ('14', '测试店铺1111', '1', '0', '1', '2', '5', '北京市上地', '', '13992891749', '39.965505', '116.305044');
INSERT INTO `car_store` VALUES ('15', 'fadfdafadf', 'dafaf', '0', '1', '19', '21', '西安', 'dfafa', '13992891749', '34.347281', '108.946107');

-- ----------------------------
-- Table structure for car_user
-- ----------------------------
DROP TABLE IF EXISTS `car_user`;
CREATE TABLE `car_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_uuid` varchar(32) NOT NULL,
  `user_name` varchar(255) NOT NULL COMMENT '靓号',
  `user_nick` varchar(255) NOT NULL COMMENT '昵称',
  `user_avatar` varchar(255) NOT NULL COMMENT '头像',
  `user_email` varchar(255) NOT NULL COMMENT '邮箱',
  `user_phone` varchar(11) NOT NULL COMMENT '手机',
  `user_pass` varchar(255) NOT NULL COMMENT '密码',
  `salt` char(6) NOT NULL COMMENT '标识',
  `user_status` tinyint(1) NOT NULL COMMENT '状态: 1：注册未激活；2：正常用户；',
  `user_level` int(2) NOT NULL COMMENT '等级',
  `user_sex` varchar(10) NOT NULL COMMENT '性别',
  `user_birthday` varchar(30) NOT NULL COMMENT '生日',
  `user_label` varchar(300) NOT NULL COMMENT '标签',
  `user_signature` varchar(2000) NOT NULL COMMENT '说明',
  `user_region` varchar(50) NOT NULL COMMENT '所在地',
  `personal_auth` tinyint(2) NOT NULL DEFAULT '0' COMMENT '个人认证',
  `team_auth` tinyint(2) NOT NULL DEFAULT '0' COMMENT '组织认证',
  `is_developer` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否开发者',
  `is_admin` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否管理员',
  `created_at` datetime NOT NULL COMMENT '注册时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17098 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_user
-- ----------------------------

-- ----------------------------
-- Table structure for car_video
-- ----------------------------
DROP TABLE IF EXISTS `car_video`;
CREATE TABLE `car_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `lang` tinyint(1) DEFAULT '1' COMMENT '语言：1：中文；2：英文；',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `thumb` varchar(255) NOT NULL COMMENT '图片',
  `show_type` tinyint(1) DEFAULT NULL,
  `video` varchar(255) NOT NULL COMMENT '视频',
  `desc` varchar(1000) NOT NULL COMMENT '简介',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除：1未删除；0：已删除；',
  `ctime` int(11) NOT NULL COMMENT '添加时间',
  `mtime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_video
-- ----------------------------
INSERT INTO `car_video` VALUES ('3', '1', 'fdafafafda', '\\upload\\videopic\\1500606876.jpg', '2', 'a:3:{s:9:\"file_name\";s:27:\"04个人工作室认证.mp4\";s:9:\"file_size\";s:8:\"18782328\";s:9:\"file_path\";s:74:\"/\\upload\\videopath\\20170721/fc1db97697bbb4565c3d3baab8af55b01276381811.mp4\";}', 'fdafafaf', '1', '1500606936', '1500606939');
INSERT INTO `car_video` VALUES ('4', '2', 'fdafafa', '\\upload\\videopic\\1500708256.jpg', '2', 'a:3:{s:9:\"file_name\";s:12:\"01注册.mp4\";s:9:\"file_size\";s:7:\"5752168\";s:9:\"file_path\";s:74:\"/\\upload\\videopath\\20170725/16d756845575e5d379b261dec40e04a31293035615.mp4\";}', 'fdafafa', '1', '1500975170', '1500975170');

-- ----------------------------
-- Table structure for car_warranty
-- ----------------------------
DROP TABLE IF EXISTS `car_warranty`;
CREATE TABLE `car_warranty` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `series_number` varchar(500) DEFAULT NULL COMMENT '质保证书编号',
  `pack_name` varchar(500) DEFAULT NULL,
  `mid` text NOT NULL COMMENT '质保产品型号',
  `pid` text NOT NULL COMMENT '质保产品ID',
  `storeid` int(13) DEFAULT NULL COMMENT '门店id',
  `name` varchar(500) NOT NULL COMMENT '质保用户姓名',
  `telephone` varchar(11) NOT NULL COMMENT '质保用户电话',
  `address` varchar(500) NOT NULL COMMENT '客户地址',
  `carmodel` varchar(100) DEFAULT NULL,
  `carlicence` varchar(500) NOT NULL COMMENT '车牌号码',
  `engineno` varchar(500) NOT NULL COMMENT '发动机编号',
  `construct_time` int(13) NOT NULL COMMENT '施工时间',
  `warrantytime` text COMMENT '质保时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '质保单状态：0：待审核；1：成功；2：失败；',
  `create_user` int(13) DEFAULT NULL COMMENT '添加质保单管理员',
  `ctime` int(13) NOT NULL COMMENT '添加质保时间',
  `createtime` int(13) NOT NULL COMMENT '质保申请提交时间',
  `refuse_reason` text,
  `constructor` varchar(500) DEFAULT NULL COMMENT '施工人员',
  `guide` varchar(500) DEFAULT NULL COMMENT '导购',
  `extension` text COMMENT '质保的详细数据',
  `is_send` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否发送信息：0：未发送；1：已发送；',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_warranty
-- ----------------------------
INSERT INTO `car_warranty` VALUES ('1', null, null, '1', '2', null, '', 'aaaaa', '', null, 'aaaaa', 'bbbb', '1493568000', '333', '1', null, '1494604800', '0', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('2', null, null, '1', '2', null, '', '222222222', '', null, 'abc', 'ddd', '1493568000', 'hhh', '1', null, '1493568000', '0', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('3', null, null, '14', '8', null, '', '13213213123', '', null, 'dfasfafadf123123', '23132132132132', '1495036800', 'dasfdas', '1', null, '1496160000', '0', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('4', '20170615151945', null, '1', '1', '13', 'zhangxiaohui', '13391912912', 'dfdsfds', null, 'dsfdsf', 'fdfdfd', '1496851200', '111', '1', '1', '1497511185', '0', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('5', '20170615155223', null, '1', '11', '13', 'zhangxiaohui1', '13992891749', 'dfdfd', null, 'dfdf', '112233', '1497628800', '1234', '1', '1', '1497513143', '1497511417', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('6', '20170615160453', null, '1', '11', '12', 'zhangxiaohui2', '13992891749', 'dfffffff', null, 'fdfdf', '223344', '1496419200', 'dfdfd', '1', '1', '1497513893', '1497513843', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('7', '20170615161129', null, '1', '11', '13', 'zhangxiaohui3', '13391912912', 'fdfdsfs', null, 'fdsfdsfsdf', '556677', '1497024000', '2323232', '1', '1', '1497514289', '1497513998', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('8', '20170615161349', null, '1', '11', '13', 'zhangxiaohui4', '13992891749', 'fdfd', null, 'dfdfd', '778899', '1496505600', '11111', '1', '1', '1497514429', '1497514330', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('9', '20170615161937', null, '1', '11', '12', 'zhangxiaohui5', '13391912912', 'dfd', null, 'dfd', 'fdfdee', '1498320000', '111', '1', '1', '1497514777', '1497514601', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('10', '20170615163016', null, '1', '11', '13', 'zhangxiaohui6', '13992891749', 'dddd', null, 'ffff', '009911', '1497628800', '1111333', '1', '1', '1497515416', '1497514877', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('11', '20170615164235', null, '1', '11', '13', 'zhangxiaohui7', '13992891749', 'dfdfd', null, '1132', '556321', '1497628800', '5454333', '1', '1', '1497516155', '1497516063', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('12', '20170615164621', null, '1', '11', '13', 'zhangxiaohui8', '13992891749', 'ff;;asdf', null, 'dfdf1', '123456', '1497628800', '334455', '1', '1', '1497516381', '1497516365', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('13', '20170615165426', null, '1', '11', '13', 'zhangxiaohui9', '13391912912', '112233', null, '132421', '908212', '1497110400', '1122334455667788', '1', '1', '1497516866', '1497516572', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('14', '20170615171303', null, '14', '12', '12', 'zhangxiaohui10', '13391912912', 'dfdfsd', null, 'dfsfdsfs', '112233', '1496246400', 'zhangxiaohui', '1', '1', '1497517983', '1497517201', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('15', '20170615171754', null, '1', '11', '6', 'zhangxiaohui11', '13391912912', 'dfdfd', null, '1232', '897654', '1496505600', '111112222', '1', '1', '1497518274', '1497518178', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('16', '20170615172726', null, '14', '12', '12', 'zhangxiaohui12', '13391912912', 'dfdfdsfs', null, 'dfsfsf', 'iioopp', '1496851200', '12112121', '1', '1', '1497518846', '1497518738', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('17', '20170616170145', null, '11', '14', '12', 'zhangxiaohui13', '13992891748', 'dfdsfds', null, 'dfsdf', '332255', '1491494400', 'dfdfd', '1', '1', '1497603705', '1497603514', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('18', '20170622100430', null, '11', '14', '9', 'zhangxiaohui14', '13992891747', 'dfdsfsf', null, 'dsfsf', '123422', '1497369600', 'fdfd', '1', '1', '1498097070', '1497603593', '', null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('19', '20170622102149', null, '13', '15', '13', 'zhangxiaohui17', '13992891744', 'dfdf', null, '1132', '321231', '1496246400', 'fdaf', '1', '1', '1498543815', '1498098071', '', '', '', null, '0');
INSERT INTO `car_warranty` VALUES ('20', null, null, '0', '0', '6', 'zhangxiaohui16', '13391912912', 'dfdf', null, 'ddf', 'dfdsfd', '1496246400', null, '0', null, '0', '1498124974', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('21', '20170627112808', null, '13', '15', null, 'fdaf', '13391912912', 'fdf', null, '123456', 'fdaf', '1496246400', 'fdafadfaf', '1', '1', '1498534088', '0', '', null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('22', '20170627112957', null, '13', '15', null, 'fdaf', '13391912912', 'fdf', null, '123456', 'fdaf', '1496246400', 'fdafadfaf', '1', '1', '1498534197', '0', '', null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('23', '20170627114548', null, '13', '15', '13', '13232', '13391912912', 'fdafaf', null, 'fdfdf', '112233', '1496332800', 'fdafdafa', '1', '1', '1498535148', '0', '', '2222222222222', '3333333333', null, '0');
INSERT INTO `car_warranty` VALUES ('25', '20170627172205', null, '13', '15', '13', 'fdaf', '13391912912', 'fdfdfd', null, '132311', 'fdafc', '1496246400', 'fdfd', '1', '1', '1498555325', '1498555325', '', 'dfdfff', '113322', null, '0');
INSERT INTO `car_warranty` VALUES ('26', '20170627172459', null, '13', '15', '13', 'fdaf', '13391912912', 'fdfdfd', null, '132311', 'fdafc', '1496246400', 'fdfd', '1', '1', '1498555499', '1498555499', '', 'dfdfff', '113322', null, '0');
INSERT INTO `car_warranty` VALUES ('27', '20170627172636', null, '13', '15', '13', '张小辉', '13992891749', 'faaaaaa', null, '1122334455', '887766', '1496246400', 'fdfdfd', '1', '1', '1498555596', '1498555596', '', 'fdfd', 'qqee', null, '0');
INSERT INTO `car_warranty` VALUES ('28', '20170627172803', null, '13', '15', '13', '张小辉', '13992891749', '是丰富的辅导', null, '13211', '665533', '1496246400', '但放大放大放大', '1', '1', '1498555683', '1498555683', '', '放大放大放大', '放大放大放大奋斗奋斗', null, '0');
INSERT INTO `car_warranty` VALUES ('29', '20170627173950', null, '13', '15', '12', '胡海鹏', '15191816906', '西安市', null, '112233456', '120981', '1496419200', '1年', '1', '1', '1498556390', '1498556390', '', '工人', '导购', null, '0');
INSERT INTO `car_warranty` VALUES ('30', '', null, '13', '15', '11', '张小辉', '13992891749', '西安', null, '1200999', '887766', '1496332800', '111111222', '2', '1', '1498556517', '1498556517', 'dfdfddfd', 'fdfd', 'fd ', null, '0');
INSERT INTO `car_warranty` VALUES ('31', '20170627183524', null, '13', '15', '13', '张小辉', '13992891749', '1122334455', null, 'ff111111', '222331', '1496851200', 'dfdfd', '1', '1', '1498559724', '1498559724', '', 'fdfd', '11232', null, '0');
INSERT INTO `car_warranty` VALUES ('32', '20170629151057', null, '', '', '4', 'fdf', '13391912912', 'fd', null, 'fds', '123456', '1496246400', '2,2', '1', '1', '1498720257', '1498720257', '', 'fd', 'fd', null, '0');
INSERT INTO `car_warranty` VALUES ('33', '20170629151441', null, '13,11', '15,14', '9', '张小辉', '13992891749', '113232', null, 'dsafaf', '123211', '1496246400', '2,2', '1', '1', '1498720481', '1498720481', '', 'fdsfa', 'fadfdfs', '', '1');
INSERT INTO `car_warranty` VALUES ('34', '20170629152727', null, '14,14', '12,12', '13', 'fdafa', '13992891749', 'fdafa', null, 'dfafa', 'fdafa1', '1496246400', 'fdafdafa,fdafadfad', '1', '1', '1498721247', '1498721247', '', 'fdafa', 'fdafa', '', '1');
INSERT INTO `car_warranty` VALUES ('35', '20170629153148', null, '14,14', '12,12', '12', 'aaaaaaabbbbbbcccccc', '13992891749', 'fdafa', null, 'fdaf', 'dfasf', '1496246400', 'fdafa,fdafa', '1', '1', '1498721508', '1498721508', '', 'fdafa', 'fdafa', '', '0');
INSERT INTO `car_warranty` VALUES ('38', '20170629163443', null, '2,2,2,2,2', '16,16,16,16,16', '12', '张小辉', '13992891749', 'dfafa', null, 'fdafa', '112233', '1496246400', '232,fdafa,fadfaf,fdafa,dfafa', '1', '1', '1498725283', '1498725283', '', 'dfdafa', 'fdafa', '', '1');
INSERT INTO `car_warranty` VALUES ('39', '20170629165748', null, '14,1', '12,11', '12', 'zhangxiaohui', '13992891749', 'fdafa', null, 'fdafa', 'fdafa', '1496246400', 'dafdafaf,fdafaa', '1', '1', '1498726668', '1498726668', '', 'fdaf', 'fdafa', '', '1');
INSERT INTO `car_warranty` VALUES ('40', null, null, '0', '0', '13', 'zhangxiaohui', '13992891749', 'fdsfds', null, 'dsfsdfds', '123111', '1496246400', null, '0', null, '0', '1498807571', null, null, null, '', '0');
INSERT INTO `car_warranty` VALUES ('41', '20170630160531', null, '2,2', '16,16', '11', '张小辉', '13992891749', 'sdfdfs', null, 'dfsf', '123111', '1496246400', 'dfdfdfs,csdfs', '1', '2', '1498809931', '1498809931', '', 'fdafa', 'fdsfa', '', '1');
INSERT INTO `car_warranty` VALUES ('42', '20170630161049', null, '2,2', '16,16', '12', '张小辉', '13992891749', 'fdafa', null, 'fdafda', '112233', '1496937600', 'dsdfds,dasfdsaf', '1', '2', '1498810249', '1498810249', '', 'fdafa', 'fdafa', 'YToyOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czoxNToiZGZkZnNkZmRzZnNkZmRzIjtzOjM6InBpZCI7czoyOiIxNiI7czozOiJtaWQiO3M6MToiMiI7czo1OiJtb2RlbCI7czo0OiJzc3NzIjtzOjU6ImJyYW5kIjtzOjExOiJhYWFhMjIyMzMzMyI7czo0OiJuYW1lIjtzOjE0OiLmtYvor5Xkuqflk4E0NCI7czoxMToiY3VycmVudF9udW0iO3M6MjoiNzgiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6NjoiZHNkZmRzIjt9aToxO2E6MTA6e3M6MTM6InNlcmllc19udW1iZXIiO3M6MTU6ImRmZGZzZGZkc2ZzZGZkcyI7czozOiJwaWQiO3M6MjoiMTYiO3M6MzoibWlkIjtzOjE6IjIiO3M6NToibW9kZWwiO3M6NDoic3NzcyI7czo1OiJicmFuZCI7czoxMToiYWFhYTIyMjMzMzMiO3M6NDoibmFtZSI7czoxNDoi5rWL6K+V5Lqn5ZOBNDQiO3M6MTE6ImN1cnJlbnRfbnVtIjtzOjI6Ijc4IjtzOjQ6InR5cGUiO3M6MToiMiI7czozOiJudW0iO3M6MToiMSI7czoxMjoid2FycmFudHl0aW1lIjtzOjg6ImRhc2Zkc2FmIjt9fQ==', '1');
INSERT INTO `car_warranty` VALUES ('43', '20170708095711', null, '2,14', '16,12', '3', '张小辉', '13992891749', 'fdafda', '222222222222111', 'fdafa', '123456', '1499961600', '111,2', '1', '1', '1499479829', '1499479031', '', 'dfdfa', 'fdsfdsf', 'YToyOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czoxNToiZGZkZnNkZmRzZnNkZmRzIjtzOjM6InBpZCI7czoyOiIxNiI7czozOiJtaWQiO3M6MToiMiI7czo1OiJtb2RlbCI7czo0OiJzc3NzIjtzOjU6ImJyYW5kIjtzOjExOiJhYWFhMjIyMzMzMyI7czo0OiJuYW1lIjtzOjE0OiLmtYvor5Xkuqflk4E0NCI7czoxMToiY3VycmVudF9udW0iO3M6MjoiNzYiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MzoiMTExIjt9aToxO2E6MTA6e3M6MTM6InNlcmllc19udW1iZXIiO3M6MTk6ImFhYWFhYWFiYmJiYmJjY2NjY2MiO3M6MzoicGlkIjtzOjI6IjEyIjtzOjM6Im1pZCI7czoyOiIxNCI7czo1OiJtb2RlbCI7czo3OiLlnovlj7c1IjtzOjU6ImJyYW5kIjtzOjc6IuWTgeeJjDIiO3M6NDoibmFtZSI7czoxMzoi5rWL6K+V5Lqn5ZOBMiI7czoxMToiY3VycmVudF9udW0iO3M6NToiMTk5NzIiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMiI7fX0=', '1');
INSERT INTO `car_warranty` VALUES ('44', null, null, '0', '0', '2', '111111111', '13992891749', 'fdaf', null, '', '132321', '1498838400', null, '0', null, '0', '1499497794', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('45', '20170708155304', null, '2,13,2,14', '16,15,16,12', '12', 'dfafadfa', '13992891749', 'dfafa', 'fdafafa', '', '313111', '1499356800', '1,1,1,1', '1', '1', '1499500384', '1499498024', '', '', '', 'YTo0OntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czoxNToiZGZkZnNkZmRzZnNkZmRzIjtzOjM6InBpZCI7czoyOiIxNiI7czozOiJtaWQiO3M6MToiMiI7czo1OiJtb2RlbCI7czo0OiJzc3NzIjtzOjU6ImJyYW5kIjtzOjExOiJhYWFhMjIyMzMzMyI7czo0OiJuYW1lIjtzOjE0OiLmtYvor5Xkuqflk4E0NCI7czoxMToiY3VycmVudF9udW0iO3M6MjoiNzUiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fWk6MTthOjEwOntzOjEzOiJzZXJpZXNfbnVtYmVyIjtzOjE0OiIzNDMxMTIzMsK3M8K3MyI7czozOiJwaWQiO3M6MjoiMTUiO3M6MzoibWlkIjtzOjI6IjEzIjtzOjU6Im1vZGVsIjtzOjc6IuWei+WPtzQiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjEzOiLmtYvor5Xkuqflk4EzIjtzOjExOiJjdXJyZW50X251bSI7czoxOiI2IjtzOjQ6InR5cGUiO3M6MToiMiI7czozOiJudW0iO3M6MToiMSI7czoxMjoid2FycmFudHl0aW1lIjtzOjE6IjEiO31pOjI7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czoxNToiZGZkZnNkZmRzZnNkZmRzIjtzOjM6InBpZCI7czoyOiIxNiI7czozOiJtaWQiO3M6MToiMiI7czo1OiJtb2RlbCI7czo0OiJzc3NzIjtzOjU6ImJyYW5kIjtzOjExOiJhYWFhMjIyMzMzMyI7czo0OiJuYW1lIjtzOjE0OiLmtYvor5Xkuqflk4E0NCI7czoxMToiY3VycmVudF9udW0iO3M6MjoiNzUiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fWk6MzthOjEwOntzOjEzOiJzZXJpZXNfbnVtYmVyIjtzOjE5OiJhYWFhYWFhYmJiYmJiY2NjY2NjIjtzOjM6InBpZCI7czoyOiIxMiI7czozOiJtaWQiO3M6MjoiMTQiO3M6NToibW9kZWwiO3M6Nzoi5Z6L5Y+3NSI7czo1OiJicmFuZCI7czo3OiLlk4HniYwyIjtzOjQ6Im5hbWUiO3M6MTM6Iua1i+ivleS6p+WTgTIiO3M6MTE6ImN1cnJlbnRfbnVtIjtzOjU6IjE5OTcxIjtzOjQ6InR5cGUiO3M6MToiMSI7czozOiJudW0iO3M6MToiMSI7czoxMjoid2FycmFudHl0aW1lIjtzOjE6IjEiO319', '1');
INSERT INTO `car_warranty` VALUES ('46', '20170717181103', '1111', '1,1', '20,20', '4', 'fdafa', '13992891749', 'dfafda', 'fdaf', '123456', '123211', '1498838400', '1,1', '1', '1', '1500286263', '1500286263', '', 'fdafa', 'fdaf', 'YToyOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo3OiJmNjc3ODgxIjtzOjM6InBpZCI7czoyOiIyMCI7czozOiJtaWQiO3M6MToiMSI7czo1OiJtb2RlbCI7czozOiJhYmMiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjY6IjEyMzIzMiI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMjEiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fWk6MTthOjEwOntzOjEzOiJzZXJpZXNfbnVtYmVyIjtzOjc6ImY2Nzc4ODEiO3M6MzoicGlkIjtzOjI6IjIwIjtzOjM6Im1pZCI7czoxOiIxIjtzOjU6Im1vZGVsIjtzOjM6ImFiYyI7czo1OiJicmFuZCI7czo3OiLlk4HniYwzIjtzOjQ6Im5hbWUiO3M6NjoiMTIzMjMyIjtzOjExOiJjdXJyZW50X251bSI7czoyOiIyMSI7czo0OiJ0eXBlIjtzOjE6IjIiO3M6MzoibnVtIjtzOjE6IjIiO3M6MTI6IndhcnJhbnR5dGltZSI7czoxOiIxIjt9fQ==', '1');
INSERT INTO `car_warranty` VALUES ('47', '20170717181324', 'fdafafa', '1,1,1', '20,20,20', '4', 'fdafa', '13992891749', 'fdafa', 'fdafa', 'fafa', '123456', '1498838400', '1,1,1', '1', '1', '1500286404', '1500286404', '', 'fdafadfa', 'fdafad', 'YTozOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo3OiJmNjc3ODgxIjtzOjM6InBpZCI7czoyOiIyMCI7czozOiJtaWQiO3M6MToiMSI7czo1OiJtb2RlbCI7czozOiJhYmMiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjY6IjEyMzIzMiI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMTgiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fWk6MTthOjEwOntzOjEzOiJzZXJpZXNfbnVtYmVyIjtzOjc6ImY2Nzc4ODEiO3M6MzoicGlkIjtzOjI6IjIwIjtzOjM6Im1pZCI7czoxOiIxIjtzOjU6Im1vZGVsIjtzOjM6ImFiYyI7czo1OiJicmFuZCI7czo3OiLlk4HniYwzIjtzOjQ6Im5hbWUiO3M6NjoiMTIzMjMyIjtzOjExOiJjdXJyZW50X251bSI7czoyOiIxOCI7czo0OiJ0eXBlIjtzOjE6IjIiO3M6MzoibnVtIjtzOjE6IjEiO3M6MTI6IndhcnJhbnR5dGltZSI7czoxOiIxIjt9aToyO2E6MTA6e3M6MTM6InNlcmllc19udW1iZXIiO3M6NzoiZjY3Nzg4MSI7czozOiJwaWQiO3M6MjoiMjAiO3M6MzoibWlkIjtzOjE6IjEiO3M6NToibW9kZWwiO3M6MzoiYWJjIjtzOjU6ImJyYW5kIjtzOjc6IuWTgeeJjDMiO3M6NDoibmFtZSI7czo2OiIxMjMyMzIiO3M6MTE6ImN1cnJlbnRfbnVtIjtzOjI6IjE4IjtzOjQ6InR5cGUiO3M6MToiMiI7czozOiJudW0iO3M6MToiMSI7czoxMjoid2FycmFudHl0aW1lIjtzOjE6IjEiO319', '1');
INSERT INTO `car_warranty` VALUES ('48', '20170718092050', 'fdafafa', '11', '19', '5', 'dafaf', '13992891749', 'fdafa', 'fdafa', '1df', '111333', '1498838400', '1', '1', '1', '1500340850', '1500340850', '', 'fdafa', 'fdafa', 'YToxOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo4OiIxMzIxMTIzMyI7czozOiJwaWQiO3M6MjoiMTkiO3M6MzoibWlkIjtzOjI6IjExIjtzOjU6Im1vZGVsIjtzOjc6IuWei+WPtzIiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMiI7czo0OiJuYW1lIjtzOjIwOiIxMTExMTExMTExMTExMTExMTExMSI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMjAiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fX0=', '0');
INSERT INTO `car_warranty` VALUES ('49', '20170718172231', 'fdafafa', '11', '19', '5', 'dafaf', '13992891749', 'fdafa', 'fdafa', '1df', '111333', '1498838400', '1', '1', '1', '1500369751', '1500369751', '', 'fdafa', 'fdafa', 'YToxOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo4OiIxMzIxMTIzMyI7czozOiJwaWQiO3M6MjoiMTkiO3M6MzoibWlkIjtzOjI6IjExIjtzOjU6Im1vZGVsIjtzOjc6IuWei+WPtzIiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMiI7czo0OiJuYW1lIjtzOjIwOiIxMTExMTExMTExMTExMTExMTExMSI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMjAiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fX0=', '0');
INSERT INTO `car_warranty` VALUES ('50', '20170718172233', 'fdafafa', '11', '19', '5', 'dafaf', '13992891749', 'fdafa', 'fdafa', '1df', '111333', '1498838400', '1', '1', '1', '1500369753', '1500369753', '', 'fdafa', 'fdafa', 'YToxOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo4OiIxMzIxMTIzMyI7czozOiJwaWQiO3M6MjoiMTkiO3M6MzoibWlkIjtzOjI6IjExIjtzOjU6Im1vZGVsIjtzOjc6IuWei+WPtzIiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMiI7czo0OiJuYW1lIjtzOjIwOiIxMTExMTExMTExMTExMTExMTExMSI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMjAiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fX0=', '0');
INSERT INTO `car_warranty` VALUES ('51', '20170718172537', 'fdafafafa', '1', '20', '4', '张小辉', '13992891749', '对方的身份的事', '13212321', '122111', '222333', '1499443200', '1', '1', '1', '1500369937', '1500369937', '', 'fdaffdafa', 'fdaf', 'YToxOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo3OiJmNjc3ODgxIjtzOjM6InBpZCI7czoyOiIyMCI7czozOiJtaWQiO3M6MToiMSI7czo1OiJtb2RlbCI7czozOiJhYmMiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjY6IjEyMzIzMiI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMTUiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fX0=', '0');
INSERT INTO `car_warranty` VALUES ('52', '20170718182635', null, '1', '20', '4', '张小辉', '13992891749', 'fdafa', '121', 'dfafa', '445566', '1498838400', '1', '1', '1', '1500373595', '1500372608', '', 'fda', 'fdafa', 'YToxOntpOjA7YToxMDp7czoxMzoic2VyaWVzX251bWJlciI7czo3OiJmNjc3ODgxIjtzOjM6InBpZCI7czoyOiIyMCI7czozOiJtaWQiO3M6MToiMSI7czo1OiJtb2RlbCI7czozOiJhYmMiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjY6IjEyMzIzMiI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMTQiO3M6NDoidHlwZSI7czoxOiIxIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fX0=', '1');
INSERT INTO `car_warranty` VALUES ('53', '20170719112156', 'fdafafafafa', '1,1', '20,20', '4', 'zhangxiaohui', '13992891749', 'fadfa', 'fdafafa', 'dfafafa', '132111', '1498838400', '1,1', '1', '1', '1500434649', '1500434516', '', 'dafdafa', 'fdafa', 'YToyOntpOjA7YToxMTp7czoxMzoic2VyaWVzX251bWJlciI7czo3OiJmNjc3ODgxIjtzOjM6InBpZCI7czoyOiIyMCI7czozOiJtaWQiO3M6MToiMSI7czozOiJzaWQiO3M6MToiNCI7czo1OiJtb2RlbCI7czozOiJhYmMiO3M6NToiYnJhbmQiO3M6Nzoi5ZOB54mMMyI7czo0OiJuYW1lIjtzOjY6IjEyMzIzMiI7czoxMToiY3VycmVudF9udW0iO3M6MjoiMTMiO3M6NDoidHlwZSI7czoxOiIyIjtzOjM6Im51bSI7czoxOiIxIjtzOjEyOiJ3YXJyYW50eXRpbWUiO3M6MToiMSI7fWk6MTthOjExOntzOjEzOiJzZXJpZXNfbnVtYmVyIjtzOjc6ImY2Nzc4ODEiO3M6MzoicGlkIjtzOjI6IjIwIjtzOjM6Im1pZCI7czoxOiIxIjtzOjM6InNpZCI7czoxOiI0IjtzOjU6Im1vZGVsIjtzOjM6ImFiYyI7czo1OiJicmFuZCI7czo3OiLlk4HniYwzIjtzOjQ6Im5hbWUiO3M6NjoiMTIzMjMyIjtzOjExOiJjdXJyZW50X251bSI7czoyOiIxMyI7czo0OiJ0eXBlIjtzOjE6IjIiO3M6MzoibnVtIjtzOjE6IjEiO3M6MTI6IndhcnJhbnR5dGltZSI7czoxOiIxIjt9fQ==', '1');
INSERT INTO `car_warranty` VALUES ('54', null, null, '0', '0', '13', '张小辉', '13992891749', '西安', 'dfsfs', '', '123456', '1500048000', null, '0', null, '0', '1501034371', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('55', null, null, '0', '0', '14', '张小辉', '13992891749', '西安', '131', '', '132111', '1501257600', null, '0', null, '0', '1501035919', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('56', null, null, '0', '0', '13', 'zhangxiaohui', '13992891749', 'xi\'an', '131', '', '112233', '1500652800', null, '0', null, '0', '1501036223', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('57', null, null, '0', '0', '15', '11111111', '13992891749', 'xi\'an', '131', '', '112233', '1500998400', null, '0', null, '0', '1501036273', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('58', null, null, '0', '0', '13', '11111111', '13992891749', 'fdafaf', '131', '', '123456', '1499875200', null, '0', null, '0', '1501036404', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('59', null, null, '0', '0', '13', '13232', '13992891749', 'dfdfd', '131', '', '112233', '1501084800', null, '0', null, '0', '1501036465', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('60', null, null, '0', '0', '4', 'zhangxiaohui', '13992891749', 'dfas', '111', '', '132111', '1499788800', null, '0', null, '0', '1501036724', null, null, null, null, '0');
INSERT INTO `car_warranty` VALUES ('61', null, null, '0', '0', '13', 'zhangxiaohui', '13992891749', 'dsf', '131', '', '132111', '1501776000', null, '0', null, '0', '1501654898', null, null, null, null, '0');

-- ----------------------------
-- Table structure for car_warranty_action
-- ----------------------------
DROP TABLE IF EXISTS `car_warranty_action`;
CREATE TABLE `car_warranty_action` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `wid` int(13) DEFAULT NULL COMMENT '质保单编号',
  `actpart` int(13) DEFAULT NULL COMMENT '施工位置',
  `storeid` int(13) DEFAULT NULL COMMENT '质保门店',
  `constructor` varchar(300) DEFAULT NULL COMMENT '施工员',
  `action_no` varchar(300) DEFAULT NULL COMMENT '质保行为序列号',
  `action` varchar(300) DEFAULT NULL COMMENT '质保行为',
  `acttime` int(13) DEFAULT NULL COMMENT '质保时间',
  `act_reason` varchar(300) DEFAULT NULL COMMENT '质保原因',
  `remark` text COMMENT '备注',
  `admin_id` int(13) DEFAULT NULL COMMENT '操作者id',
  `ctime` int(13) DEFAULT NULL COMMENT '添加记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_warranty_action
-- ----------------------------
INSERT INTO `car_warranty_action` VALUES ('1', '53', '1', '3', 'dsfadfafa', 'fafad', 'fdafa', '1498838400', 'dafda', '<p><img src=\"/upload/images/20170719/20170719565738.png\" title=\"20170719565738.png\" alt=\"brand_example.png\" />adfafafa</p>', '1', '1500459711');
INSERT INTO `car_warranty_action` VALUES ('2', '53', '1', '14', 'dfdasf', 'fdafadf', 'dfafa', '1499443200', 'fdafa', '<p>fdafa</p>', '1', '1501459831');

-- ----------------------------
-- Table structure for car_warranty_detail
-- ----------------------------
DROP TABLE IF EXISTS `car_warranty_detail`;
CREATE TABLE `car_warranty_detail` (
  `id` int(13) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `wid` int(13) NOT NULL COMMENT '质保单ID',
  `pid` int(13) NOT NULL COMMENT '产品ID',
  `num` int(13) NOT NULL COMMENT '质保数量',
  `current_total` int(13) NOT NULL COMMENT '质保当时的总数',
  `type` int(13) DEFAULT NULL COMMENT '安装位置',
  `ctime` int(13) NOT NULL COMMENT '质保时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_warranty_detail
-- ----------------------------
INSERT INTO `car_warranty_detail` VALUES ('1', '5', '11', '1', '0', null, '1497513143');
INSERT INTO `car_warranty_detail` VALUES ('2', '6', '11', '1', '0', null, '1497513894');
INSERT INTO `car_warranty_detail` VALUES ('3', '7', '11', '1', '0', null, '1497514177');
INSERT INTO `car_warranty_detail` VALUES ('4', '7', '11', '1', '0', null, '1497514200');
INSERT INTO `car_warranty_detail` VALUES ('5', '7', '11', '1', '0', null, '1497514289');
INSERT INTO `car_warranty_detail` VALUES ('6', '10', '11', '1', '0', null, '1497515416');
INSERT INTO `car_warranty_detail` VALUES ('7', '10', '11', '1', '0', null, '1497514919');
INSERT INTO `car_warranty_detail` VALUES ('8', '11', '11', '1', '0', null, '1497516130');
INSERT INTO `car_warranty_detail` VALUES ('9', '12', '0', '1', '0', null, '1497516381');
INSERT INTO `car_warranty_detail` VALUES ('10', '13', '11', '1', '0', null, '1497516866');
INSERT INTO `car_warranty_detail` VALUES ('11', '14', '12', '1', '0', null, '1497517985');
INSERT INTO `car_warranty_detail` VALUES ('12', '15', '11', '1', '0', null, '1497518274');
INSERT INTO `car_warranty_detail` VALUES ('13', '16', '12', '1', '0', null, '1497518846');
INSERT INTO `car_warranty_detail` VALUES ('14', '18', '14', '1', '0', null, '1498097070');
INSERT INTO `car_warranty_detail` VALUES ('15', '17', '14', '1', '0', null, '1497603705');
INSERT INTO `car_warranty_detail` VALUES ('16', '19', '15', '2', '17', null, '1498543815');
INSERT INTO `car_warranty_detail` VALUES ('17', '21', '15', '2', '27', null, '1498534089');
INSERT INTO `car_warranty_detail` VALUES ('18', '22', '15', '2', '25', null, '1498534197');
INSERT INTO `car_warranty_detail` VALUES ('19', '23', '15', '7', '18', null, '1498535148');
INSERT INTO `car_warranty_detail` VALUES ('21', '25', '15', '1', '16', null, '1498555326');
INSERT INTO `car_warranty_detail` VALUES ('22', '26', '15', '2', '14', null, '1498555499');
INSERT INTO `car_warranty_detail` VALUES ('23', '27', '15', '1', '13', null, '1498555597');
INSERT INTO `car_warranty_detail` VALUES ('24', '28', '15', '3', '10', null, '1498555683');
INSERT INTO `car_warranty_detail` VALUES ('25', '29', '15', '1', '9', null, '1498556390');
INSERT INTO `car_warranty_detail` VALUES ('26', '30', '15', '0', '9', null, '1498556517');
INSERT INTO `car_warranty_detail` VALUES ('27', '31', '15', '1', '8', null, '1498559725');
INSERT INTO `car_warranty_detail` VALUES ('28', '33', '15', '1', '6', '2', '1498720481');
INSERT INTO `car_warranty_detail` VALUES ('29', '34', '12', '4', '19994', '2', '1498721247');
INSERT INTO `car_warranty_detail` VALUES ('30', '35', '12', '11', '19983', '1', '1498721508');
INSERT INTO `car_warranty_detail` VALUES ('56', '38', '16', '1', '99', '2', '1498725283');
INSERT INTO `car_warranty_detail` VALUES ('57', '38', '16', '2', '97', '2', '1498725284');
INSERT INTO `car_warranty_detail` VALUES ('58', '38', '16', '3', '94', '1', '1498725284');
INSERT INTO `car_warranty_detail` VALUES ('59', '38', '16', '2', '92', '2', '1498725284');
INSERT INTO `car_warranty_detail` VALUES ('60', '38', '16', '1', '91', '1', '1498725284');
INSERT INTO `car_warranty_detail` VALUES ('61', '39', '12', '11', '19972', '1', '1498726668');
INSERT INTO `car_warranty_detail` VALUES ('62', '39', '11', '3', '207', '2', '1498726668');
INSERT INTO `car_warranty_detail` VALUES ('63', '41', '16', '12', '79', '1', '1498809932');
INSERT INTO `car_warranty_detail` VALUES ('64', '41', '16', '1', '78', '2', '1498809932');
INSERT INTO `car_warranty_detail` VALUES ('65', '42', '16', '1', '77', '1', '1498810250');
INSERT INTO `car_warranty_detail` VALUES ('66', '42', '16', '1', '76', '2', '1498810250');
INSERT INTO `car_warranty_detail` VALUES ('76', '43', '16', '1', '75', '1', '1499479830');
INSERT INTO `car_warranty_detail` VALUES ('77', '43', '12', '1', '19971', '1', '1499479830');
INSERT INTO `car_warranty_detail` VALUES ('78', '45', '16', '1', '74', '1', '1499500384');
INSERT INTO `car_warranty_detail` VALUES ('79', '45', '15', '1', '5', '2', '1499500384');
INSERT INTO `car_warranty_detail` VALUES ('80', '45', '16', '1', '73', '1', '1499500385');
INSERT INTO `car_warranty_detail` VALUES ('81', '45', '12', '1', '19970', '1', '1499500385');
INSERT INTO `car_warranty_detail` VALUES ('82', '46', '20', '1', '20', '1', '1500286264');
INSERT INTO `car_warranty_detail` VALUES ('83', '46', '20', '2', '18', '2', '1500286264');
INSERT INTO `car_warranty_detail` VALUES ('84', '47', '20', '1', '17', '1', '1500286404');
INSERT INTO `car_warranty_detail` VALUES ('85', '47', '20', '1', '16', '2', '1500286404');
INSERT INTO `car_warranty_detail` VALUES ('86', '47', '20', '1', '15', '2', '1500286404');
INSERT INTO `car_warranty_detail` VALUES ('87', '48', '19', '1', '19', '1', '1500340850');
INSERT INTO `car_warranty_detail` VALUES ('88', '49', '19', '1', '18', '1', '1500369752');
INSERT INTO `car_warranty_detail` VALUES ('89', '50', '19', '1', '17', '1', '1500369754');
INSERT INTO `car_warranty_detail` VALUES ('90', '51', '20', '1', '14', '1', '1500369937');
INSERT INTO `car_warranty_detail` VALUES ('91', '52', '20', '1', '13', '1', '1500373595');
INSERT INTO `car_warranty_detail` VALUES ('96', '53', '20', '1', '12', '2', '1500434650');
INSERT INTO `car_warranty_detail` VALUES ('97', '53', '20', '1', '11', '2', '1500434650');
