/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50509
Source Host           : localhost:3306
Source Database       : cmctest

Target Server Type    : MYSQL
Target Server Version : 50509
File Encoding         : 65001

Date: 2012-10-09 18:53:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', null, '现要', 0xE5858BE4B896E4B896E4BBA3E4BBA3E8A681, null);
INSERT INTO `news` VALUES ('2', null, '现要', 0xE5858BE4B896E4B896E4BBA3E4BBA3E8A681, null);
INSERT INTO `news` VALUES ('3', null, '现要', 0xE5858BE4B896E4B896E4BBA3E4BBA3E8A681, null);
