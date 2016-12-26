/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : class

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2016-12-26 17:33:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_introduction` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of class
-- ----------------------------

-- ----------------------------
-- Table structure for `form`
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_detail` text COLLATE utf8_unicode_ci,
  `form_create_user_id` int(11) DEFAULT NULL,
  `form_create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `form_delete_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `form_update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `form_close_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of form
-- ----------------------------

-- ----------------------------
-- Table structure for `form_col`
-- ----------------------------
DROP TABLE IF EXISTS `form_col`;
CREATE TABLE `form_col` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_col_form_id` int(11) DEFAULT NULL,
  `form_col_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_col_default` text COLLATE utf8_unicode_ci,
  `form_col_placeholder` text COLLATE utf8_unicode_ci,
  `form_col_plugin_id` int(11) DEFAULT NULL,
  `form_col_order_id` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of form_col
-- ----------------------------

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_user_id` int(11) DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `log_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice_txt` text COLLATE utf8_unicode_ci,
  `notice_create_user_id` int(11) DEFAULT NULL,
  `notice_create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `notice_update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `notice_delete_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of notice
-- ----------------------------

-- ----------------------------
-- Table structure for `plugin`
-- ----------------------------
DROP TABLE IF EXISTS `plugin`;
CREATE TABLE `plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plugin_url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plugin_detail` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of plugin
-- ----------------------------

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_introduction` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_pw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_class_id` int(11) DEFAULT NULL,
  `user_bio` text COLLATE utf8_unicode_ci,
  `user_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_delete_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_latest_login_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_latest_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `user_form`
-- ----------------------------
DROP TABLE IF EXISTS `user_form`;
CREATE TABLE `user_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_form_user_id` int(11) DEFAULT NULL,
  `user_form_form_id` int(11) DEFAULT NULL,
  `user_form_data` text COLLATE utf8_unicode_ci,
  `user_form_create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_form_delete_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_form_update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_form_fill_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_form
-- ----------------------------
