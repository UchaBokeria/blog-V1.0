/*
 Navicat Premium Data Transfer

 Source Server         : pizzilab
 Source Server Type    : MySQL
 Source Server Version : 100328
 Source Host           : out27.keliweb.com:3306
 Source Schema         : udkedhjd_maindb

 Target Server Type    : MySQL
 Target Server Version : 100328
 File Encoding         : 65001

 Date: 25/04/2021 12:34:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gender
-- ----------------------------
DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gender
-- ----------------------------
INSERT INTO `gender` VALUES (1, 'მამრობითი', 1);
INSERT INTO `gender` VALUES (2, 'მდედრობითი', 1);
INSERT INTO `gender` VALUES (3, 'ტრანსი', 1);

SET FOREIGN_KEY_CHECKS = 1;
