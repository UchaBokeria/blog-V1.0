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

 Date: 25/04/2021 12:36:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for liveChatUsers
-- ----------------------------
DROP TABLE IF EXISTS `liveChatUsers`;
CREATE TABLE `liveChatUsers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender_id` int NULL DEFAULT NULL,
  `token` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of liveChatUsers
-- ----------------------------
INSERT INTO `liveChatUsers` VALUES (1, 'admin', 'admin', 'test', 2, NULL, '2021-04-22 21:51:02');
INSERT INTO `liveChatUsers` VALUES (2, 'test', 'test', 'test', 2, NULL, '2021-04-22 20:57:56');
INSERT INTO `liveChatUsers` VALUES (3, 'ragac', 'ragac', 'test', 1, NULL, '2021-04-22 21:51:00');
INSERT INTO `liveChatUsers` VALUES (4, 'gogo', 'gogo', 'test', 2, NULL, '2021-04-22 22:59:08');
INSERT INTO `liveChatUsers` VALUES (5, 'biji', 'biji', 'biji', 1, NULL, '2021-04-22 20:58:36');
INSERT INTO `liveChatUsers` VALUES (6, 'bavshvi', 'bavshvi', 'biji', 1, NULL, '2021-04-22 20:58:50');
INSERT INTO `liveChatUsers` VALUES (7, '1111111', '11111111', '1111', 1, NULL, '2021-04-22 21:50:54');

SET FOREIGN_KEY_CHECKS = 1;
