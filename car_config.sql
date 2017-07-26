/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : carproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-25 10:58:01
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `car_config` VALUES ('syssetting', 'a:3:{s:11:\"controllers\";a:23:{i:1;a:2:{s:8:\"econtrol\";s:10:\"adminbrand\";s:8:\"ccontrol\";s:6:\"品牌\";}i:2;a:2:{s:8:\"econtrol\";s:9:\"adminlist\";s:8:\"ccontrol\";s:9:\"管理员\";}i:3;a:2:{s:8:\"econtrol\";s:10:\"adminmodel\";s:8:\"ccontrol\";s:6:\"模型\";}i:4;a:2:{s:8:\"econtrol\";s:9:\"adminnews\";s:8:\"ccontrol\";s:6:\"新闻\";}i:5;a:2:{s:8:\"econtrol\";s:12:\"adminpackage\";s:8:\"ccontrol\";s:6:\"套餐\";}i:6;a:2:{s:8:\"econtrol\";s:16:\"adminprivilieges\";s:8:\"ccontrol\";s:6:\"权限\";}i:7;a:2:{s:8:\"econtrol\";s:9:\"adminrole\";s:8:\"ccontrol\";s:6:\"角色\";}i:8;a:2:{s:8:\"econtrol\";s:17:\"adminsettingpanel\";s:8:\"ccontrol\";s:12:\"网站设置\";}i:9;a:2:{s:8:\"econtrol\";s:10:\"adminstore\";s:8:\"ccontrol\";s:6:\"门店\";}i:10;a:2:{s:8:\"econtrol\";s:10:\"admintools\";s:8:\"ccontrol\";s:12:\"系统工具\";}i:11;a:2:{s:8:\"econtrol\";s:13:\"adminwarranty\";s:8:\"ccontrol\";s:6:\"质保\";}i:12;a:2:{s:8:\"econtrol\";s:19:\"adminwarrantydetail\";s:8:\"ccontrol\";s:12:\"质保详情\";}i:13;a:2:{s:8:\"econtrol\";s:5:\"login\";s:8:\"ccontrol\";s:6:\"登录\";}i:14;a:2:{s:8:\"econtrol\";s:19:\"adminwarrantyaction\";s:8:\"ccontrol\";s:12:\"质保操作\";}i:15;a:2:{s:8:\"econtrol\";s:9:\"adminuser\";s:8:\"ccontrol\";s:6:\"用户\";}i:16;a:2:{s:8:\"econtrol\";s:11:\"adminsmsmsg\";s:8:\"ccontrol\";s:12:\"平台短信\";}i:17;a:2:{s:8:\"econtrol\";s:8:\"adminlog\";s:8:\"ccontrol\";s:21:\"管理员操作日志\";}i:18;a:2:{s:8:\"econtrol\";s:10:\"adminvideo\";s:8:\"ccontrol\";s:6:\"视频\";}i:19;a:2:{s:8:\"econtrol\";s:11:\"adminadlist\";s:8:\"ccontrol\";s:6:\"广告\";}i:20;a:2:{s:8:\"econtrol\";s:15:\"adminadposition\";s:8:\"ccontrol\";s:9:\"广告位\";}i:21;a:2:{s:8:\"econtrol\";s:12:\"adminrecruit\";s:8:\"ccontrol\";s:6:\"招聘\";}i:22;a:2:{s:8:\"econtrol\";s:12:\"adminarticle\";s:8:\"ccontrol\";s:6:\"文章\";}i:23;a:2:{s:8:\"econtrol\";s:12:\"adminproduct\";s:8:\"ccontrol\";s:6:\"产品\";}}s:7:\"actions\";a:9:{i:1;a:2:{s:7:\"eaction\";s:3:\"add\";s:7:\"caction\";s:6:\"添加\";}i:2;a:2:{s:7:\"eaction\";s:6:\"update\";s:7:\"caction\";s:6:\"修改\";}i:3;a:2:{s:7:\"eaction\";s:6:\"delete\";s:7:\"caction\";s:6:\"删除\";}i:4;a:2:{s:7:\"eaction\";s:7:\"setting\";s:7:\"caction\";s:6:\"设置\";}i:5;a:2:{s:7:\"eaction\";s:3:\"set\";s:7:\"caction\";s:6:\"设置\";}i:6;a:2:{s:7:\"eaction\";s:10:\"updatepass\";s:7:\"caction\";s:12:\"修改密码\";}i:7;a:2:{s:7:\"eaction\";s:6:\"sysset\";s:7:\"caction\";s:12:\"系统设置\";}i:8;a:2:{s:7:\"eaction\";s:8:\"filepath\";s:7:\"caction\";s:12:\"路径设置\";}i:9;a:2:{s:7:\"eaction\";s:11:\"uploadimage\";s:7:\"caction\";s:12:\"上传图片\";}}s:4:\"lang\";a:2:{i:1;s:6:\"中文\";i:2;s:6:\"英语\";}}');
