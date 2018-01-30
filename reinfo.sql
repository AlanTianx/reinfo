/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : reinfo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-30 15:28:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for re_admin_route_list
-- ----------------------------
DROP TABLE IF EXISTS `re_admin_route_list`;
CREATE TABLE `re_admin_route_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `route` varchar(100) DEFAULT '',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route` (`route`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='管理的路由列表';

-- ----------------------------
-- Records of re_admin_route_list
-- ----------------------------
INSERT INTO `re_admin_route_list` VALUES ('1', '添加管理员', 'admin/addadmin', '2017-12-25 09:10:09');
INSERT INTO `re_admin_route_list` VALUES ('2', '管理员列表', 'admin/showadmin', '2017-12-07 17:19:32');
INSERT INTO `re_admin_route_list` VALUES ('3', '删除管理员', 'admin/dltadmin/{id}', '2017-12-07 17:19:35');
INSERT INTO `re_admin_route_list` VALUES ('4', '分类管理列表', 'admin/category', '2017-12-07 17:21:28');
INSERT INTO `re_admin_route_list` VALUES ('5', '添加分类', 'admin/category/create', '2017-12-07 17:22:10');
INSERT INTO `re_admin_route_list` VALUES ('6', '修改分类', 'admin/category/{category}/edit', '2017-12-07 17:49:05');
INSERT INTO `re_admin_route_list` VALUES ('7', '删除分类', 'admin/category/{category}', '2017-12-07 17:52:12');
INSERT INTO `re_admin_route_list` VALUES ('8', '后台首页', 'admin/index', '2017-12-22 11:37:06');
INSERT INTO `re_admin_route_list` VALUES ('9', '管理员信息', 'admin/info', '2017-12-22 11:45:52');
INSERT INTO `re_admin_route_list` VALUES ('10', '退出登陆', 'admin/logout', '2017-12-22 11:48:54');
INSERT INTO `re_admin_route_list` VALUES ('11', '修改密码', 'admin/upd_pass', '2017-12-22 11:49:42');
INSERT INTO `re_admin_route_list` VALUES ('14', '菜单列表', 'admin/menu', '2017-12-25 16:09:08');
INSERT INTO `re_admin_route_list` VALUES ('15', '修改菜单', 'admin/menu/{menu}/edit', '2017-12-25 16:10:16');
INSERT INTO `re_admin_route_list` VALUES ('16', '提交修改/删除菜单', 'admin/menu/{menu}', '2017-12-25 16:15:00');
INSERT INTO `re_admin_route_list` VALUES ('17', '添加菜单', 'admin/menu/create', '2017-12-25 16:18:06');
INSERT INTO `re_admin_route_list` VALUES ('19', '路由列表', 'admin/routeList', '2017-12-25 16:29:04');
INSERT INTO `re_admin_route_list` VALUES ('23', '添加路由', 'admin/routeList/create', '2017-12-25 16:39:56');
INSERT INTO `re_admin_route_list` VALUES ('24', '提交修改/删除路由', 'admin/routeList/{routeList}', '2017-12-25 08:58:58');
INSERT INTO `re_admin_route_list` VALUES ('25', '编辑路由', 'admin/routeList/{routeList}/edit', '2017-12-25 09:00:00');
INSERT INTO `re_admin_route_list` VALUES ('26', '权限组列表', 'admin/adminauth', '2017-12-26 08:42:39');
INSERT INTO `re_admin_route_list` VALUES ('27', '添加新的权限组', 'admin/adminauth/create', '2017-12-26 06:15:01');
INSERT INTO `re_admin_route_list` VALUES ('28', '提交修改/删除权限', 'admin/adminauth/{adminauth}', '2017-12-26 07:17:21');
INSERT INTO `re_admin_route_list` VALUES ('29', '编辑权限组', 'admin/adminauth/{adminauth}/edit', '2017-12-26 08:41:54');
INSERT INTO `re_admin_route_list` VALUES ('30', '分配菜单', 'admin/pushMenu/{id}', '2017-12-26 09:51:20');
INSERT INTO `re_admin_route_list` VALUES ('31', '分配权限', 'admin/pushAuth/{id}', '2017-12-27 02:18:56');
INSERT INTO `re_admin_route_list` VALUES ('32', 'ajax修改性质分类排序', 'admin/ajaxChangeOrder/{id}/{order}', '2018-01-12 03:29:09');
INSERT INTO `re_admin_route_list` VALUES ('33', '帖子列表', 'admin/company', '2018-01-12 06:00:46');
INSERT INTO `re_admin_route_list` VALUES ('34', '帖子详情', 'admin/company/{company}/edit', '2018-01-15 06:37:56');
INSERT INTO `re_admin_route_list` VALUES ('35', '删除帖子', 'admin/company/{company}', '2018-01-15 07:54:40');
INSERT INTO `re_admin_route_list` VALUES ('36', '新增帖子', 'admin/company/create', '2018-01-15 07:55:55');
INSERT INTO `re_admin_route_list` VALUES ('37', '词汇过滤列表', 'admin/filt', '2018-01-18 09:13:00');
INSERT INTO `re_admin_route_list` VALUES ('38', '添加过滤词汇', 'admin/filt/create', '2018-01-18 09:20:59');
INSERT INTO `re_admin_route_list` VALUES ('39', '修改敏感词汇', 'admin/filt/{filt}/edit', '2018-01-18 09:28:21');
INSERT INTO `re_admin_route_list` VALUES ('40', '删除词汇', 'admin/filt/{filt}', '2018-01-18 09:29:27');
INSERT INTO `re_admin_route_list` VALUES ('41', '待审核列表', 'admin/audit', '2018-01-30 06:44:03');

-- ----------------------------
-- Table structure for re_auth_route_group
-- ----------------------------
DROP TABLE IF EXISTS `re_auth_route_group`;
CREATE TABLE `re_auth_route_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '//路由名',
  `describe` varchar(255) NOT NULL DEFAULT '' COMMENT '//路由组描述',
  `route_list_id` varchar(255) NOT NULL DEFAULT '' COMMENT '路由地址',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '路由组父id',
  `time` datetime NOT NULL COMMENT '//路由组添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='权限路由组';

-- ----------------------------
-- Records of re_auth_route_group
-- ----------------------------
INSERT INTO `re_auth_route_group` VALUES ('6', 'BOSS', '所有权限，超管', '1,2,3,4,5,6,7,14,15,16,17,19,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41', '0', '2018-01-30 06:44:16');
INSERT INTO `re_auth_route_group` VALUES ('7', '经理', '请管理公司分类权限', '4,5,6,7,8,9,10,11,14,15,16,17,19,23,24,26,27,28,29', '0', '2017-12-27 05:30:53');
INSERT INTO `re_auth_route_group` VALUES ('8', '经理助手', '添加公司性质分类', '4', '7', '2017-12-27 05:34:52');
INSERT INTO `re_auth_route_group` VALUES ('9', '经理助手B', '路由管理', '19,23,24,25', '7', '2017-12-27 05:31:46');

-- ----------------------------
-- Table structure for re_category
-- ----------------------------
DROP TABLE IF EXISTS `re_category`;
CREATE TABLE `re_category` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL DEFAULT '' COMMENT '//分类名字',
  `cate_order` int(11) DEFAULT NULL COMMENT '//分类排序',
  `cate_pid` int(11) unsigned DEFAULT NULL COMMENT '//主分类ID',
  `cate_time` datetime DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of re_category
-- ----------------------------
INSERT INTO `re_category` VALUES ('1', '培训公司', '1', '0', '2017-11-29 23:19:10');
INSERT INTO `re_category` VALUES ('2', '正规招聘', '2', '0', '2017-11-29 15:12:43');
INSERT INTO `re_category` VALUES ('3', '慢处理公司', '3', '2', '2017-11-29 15:20:17');
INSERT INTO `re_category` VALUES ('4', '招聘骗子', '4', '1', '2017-11-29 15:22:04');

-- ----------------------------
-- Table structure for re_company
-- ----------------------------
DROP TABLE IF EXISTS `re_company`;
CREATE TABLE `re_company` (
  `com_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `com_name` varchar(255) NOT NULL DEFAULT '' COMMENT '//公司名称',
  `com_type_id` int(2) NOT NULL DEFAULT '0' COMMENT '//公司性质分类',
  `com_title` varchar(50) NOT NULL DEFAULT '' COMMENT '//帖子标题',
  `com_position` varchar(50) NOT NULL DEFAULT '' COMMENT '//招聘职位',
  `com_img` varchar(50) NOT NULL DEFAULT '' COMMENT '//图片证据',
  `com_content` text NOT NULL COMMENT '//主体内容',
  `com_view` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//查看次数',
  `com_time` datetime NOT NULL COMMENT '//添加时间',
  `users_id` int(10) NOT NULL COMMENT '//添加用户',
  `type_id` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '//审核状态，1.通过2.待审核3.删除',
  PRIMARY KEY (`com_id`),
  KEY `com_name` (`com_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='招聘信息发布表';

-- ----------------------------
-- Records of re_company
-- ----------------------------
INSERT INTO `re_company` VALUES ('3', '万马塘++++', '2', '万马堂招聘6666', 'PHP攻城狮', '20180118075726931.jpg', '<pre style=\"background-color:#272822;color:#f8f8f2;font-family:&#39;宋体&#39;;font-size:14.3pt;\">return&nbsp;redirect(&#39;admin/category&#39;)-&gt;with(&#39;errors&#39;,&#39;分类添加成功&#39;);</pre><p><br/></p>', '0', '2018-01-18 07:57:31', '1', '1');
INSERT INTO `re_company` VALUES ('4', '上海soar信息有限公司', '2', '虽然正规招聘，但是公司不行，工资巨低', 'PHP实习攻城狮', '', '<p>请问地震发生地方请问请问请问发到最幸<img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=121.405225,31.252076&zoom=17&width=530&height=340&markers=121.480539,31.235929\"/>福按时打算瑟道夫根深蒂<img src=\"/ueditor/php/upload/image/20180118/1516265054623199.jpg\" title=\"1516265054623199.jpg\" alt=\"1516265054623199.jpg\" width=\"168\" height=\"105\" border=\"1\" vspace=\"1\" style=\"width: 168px; height: 105px;\"/>固水电费速度发生的请问啊时代发生的分公司各太容易儿童儿童</p>', '0', '2018-01-18 08:46:30', '1', '1');

-- ----------------------------
-- Table structure for re_filt
-- ----------------------------
DROP TABLE IF EXISTS `re_filt`;
CREATE TABLE `re_filt` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of re_filt
-- ----------------------------
INSERT INTO `re_filt` VALUES ('1', '垃圾', '2018-01-18 09:38:02');

-- ----------------------------
-- Table structure for re_menu
-- ----------------------------
DROP TABLE IF EXISTS `re_menu`;
CREATE TABLE `re_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `display` enum('1','0') NOT NULL,
  `order` int(11) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `fid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of re_menu
-- ----------------------------
INSERT INTO `re_menu` VALUES ('1', '常用管理', '1', '0', '', '0');
INSERT INTO `re_menu` VALUES ('2', '管理员信息', '0', '1', 'admin/info', '1');
INSERT INTO `re_menu` VALUES ('3', '菜单维护', '1', '2', 'admin/menu', '1');
INSERT INTO `re_menu` VALUES ('4', '管理员列表', '1', '3', 'admin/showadmin', '1');
INSERT INTO `re_menu` VALUES ('5', '公司性质分类', '1', '1', '', '0');
INSERT INTO `re_menu` VALUES ('6', '分类列表', '1', '1', 'admin/category', '5');
INSERT INTO `re_menu` VALUES ('11', '权限组管理', '1', '3', 'admin/adminauth', '1');
INSERT INTO `re_menu` VALUES ('13', '路由管理', '1', '4', 'admin/routeList', '1');
INSERT INTO `re_menu` VALUES ('14', '审核验证', '1', '3', '#', '0');
INSERT INTO `re_menu` VALUES ('15', '待审核', '1', '1', 'admin/audit', '14');
INSERT INTO `re_menu` VALUES ('16', '已通过', '1', '2', '', '14');
INSERT INTO `re_menu` VALUES ('17', '已删除', '1', '3', '', '14');
INSERT INTO `re_menu` VALUES ('18', '帖子管理', '1', '3', '', '0');
INSERT INTO `re_menu` VALUES ('19', '帖子列表', '1', '1', 'admin/company', '18');
INSERT INTO `re_menu` VALUES ('20', '词汇过滤', '1', '9', 'admin/filt', '18');

-- ----------------------------
-- Table structure for re_migrations
-- ----------------------------
DROP TABLE IF EXISTS `re_migrations`;
CREATE TABLE `re_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of re_migrations
-- ----------------------------

-- ----------------------------
-- Table structure for re_user
-- ----------------------------
DROP TABLE IF EXISTS `re_user`;
CREATE TABLE `re_user` (
  `us_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `us_name` varchar(50) NOT NULL DEFAULT '',
  `us_pwd` varchar(255) NOT NULL DEFAULT '',
  `auth_id` varchar(100) NOT NULL,
  `menu_id` varchar(100) NOT NULL DEFAULT '1,2' COMMENT '//菜单',
  `us_time` datetime NOT NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `us_name` (`us_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of re_user
-- ----------------------------
INSERT INTO `re_user` VALUES ('1', 'tian', 'eyJpdiI6IkR5clJVYlFESFhITXNESDEra2p4ZGc9PSIsInZhbHVlIjoiMmdISG5FT0ZYUTZ4alp3ZVZrUUZNZz09IiwibWFjIjoiMmYyMGIxMGY3NjY0YzI2MDhhYzRjM2NjN2ZlYjA1NTE0MjNhZTVkYmZjYjE5YTY5MjJiMTA3N2ZkMzExMmM3NSJ9', '7', '1,2,5,6', '2017-11-23 10:07:46');
INSERT INTO `re_user` VALUES ('4', 'wang', 'eyJpdiI6IkRwS1dEYitMU0tOTmg4akphcTdJcXc9PSIsInZhbHVlIjoiYVZoSHQ1UGVhdEhcL2JqVml2RzJqcnc9PSIsIm1hYyI6ImE4NDkzYTI5ZGE0MTFhY2RmMTliZjJmZGYwMjZmNTFiN2ZkODI0NjZhOTA2NjgyZjI2YTEwYjcwYjM2YmUwZjcifQ==', '8,9', '1,2,5,6,13', '2017-11-29 05:33:55');
INSERT INTO `re_user` VALUES ('8', 'admin', 'eyJpdiI6IlMxSHdqa0FydHNJY2NDcjU5aEF5TUE9PSIsInZhbHVlIjoiWGhUTElpem0xWWtpRUxUamFEMFRXQT09IiwibWFjIjoiNmI5MzJlNDQzNGNhMWU1OTZhZDUwY2IzOTYxNzc2MGIxNzE4ZDAxZTUxZDMxOTIyYTk2OTA4MjFhNjRjOTVlMSJ9', '6', '1,2,3,4,5,6,11,13,14,15,16,17,18,19,20', '2017-11-29 06:04:10');

-- ----------------------------
-- Table structure for re_users
-- ----------------------------
DROP TABLE IF EXISTS `re_users`;
CREATE TABLE `re_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of re_users
-- ----------------------------
INSERT INTO `re_users` VALUES ('1', '官方认证', '1157432388@qq.com', '$2y$10$8T99kd18Q5tAl5Z2fno.oOoHk9TRCC.iPmk9FlTmMWkfRISuhnJf6', null, '2018-01-12 06:32:32', '2018-01-12 06:32:32');
