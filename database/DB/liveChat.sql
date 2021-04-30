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

 Date: 25/04/2021 12:35:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for liveChat
-- ----------------------------
DROP TABLE IF EXISTS `liveChat`;
CREATE TABLE `liveChat`  (
  `id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sender_id` int NULL DEFAULT NULL,
  `getter_id` int NULL DEFAULT NULL,
  `body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `seen` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `seenedAt` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of liveChat
-- ----------------------------
INSERT INTO `liveChat` VALUES ('1', 'gamarjoba', 7, 1, 'gamarjoba gamarjoba 222', 0, '2021-04-22 23:23:07', '2021-04-22 23:23:13', NULL);
INSERT INTO `liveChat` VALUES ('2', 'heyu', 1, 7, 'ravi var 333', 0, '2021-04-22 23:24:58', '2021-04-22 23:25:00', NULL);
INSERT INTO `liveChat` VALUES ('3', 'lol', 4, 3, 'magari gawame im xelshi bozish', 0, '2021-04-22 23:25:52', '2021-04-22 23:25:55', NULL);
INSERT INTO `liveChat` VALUES ('4', 'asdasd', 7, 3, 'ragaca ', 0, '2021-04-22 23:26:21', '2021-04-22 23:26:24', NULL);

SET FOREIGN_KEY_CHECKS = 1;
