/*
 Navicat Premium Data Transfer

 Source Server         : Vulvetempel
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : nl-srv-web447.main-hosting.eu:3306
 Source Schema         : u205928446_Blog

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 16/05/2021 14:02:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_roles
-- ----------------------------
DROP TABLE IF EXISTS `account_roles`;
CREATE TABLE `account_roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account_roles
-- ----------------------------
INSERT INTO `account_roles` VALUES (1, 'as', 1, 1, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (2, '12', 2, 2, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (3, 'ga', 1, 2, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (4, 'xz', 1, 3, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (5, 'hr', 1, 4, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (6, 'manager', 9, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `second_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `midname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender_id` int NULL DEFAULT NULL,
  `birth_date` datetime(0) NULL DEFAULT NULL,
  `permission_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES (19, '41251251', 'Aleka Medina', '$2y$10$9l5x0ZXSDR/bfjIqbqwnYeIDKlQ8QezvUElSnA0uLDLimMf2ddaeW', 'Aleka Medina', 'alekamedina@gmail.com', 'Bild 09.05.21 um 23.1719.jpeg', 'Aleka Medina wurde 1989 in Guatemala in eine Nachkriegsgeneration geboren. Nach einer katholischen Erziehung trat sie 2008 in die ESA (Kunstakademie Guatemalas) ein, um bildende Kunst zu studieren. 2015 begann sie an der Kunstakademie Münster Freie Kunst, in der Klasse von Mariana Castillo Deball, zu studieren. 2017 studierte sie bei Gerda Gruber in ihrer Werkstatt in Yucatan.\n2019 gewann Aleka den Preis \"Förderpreis der Freunde der Akademie\". Ihre Kunst basiert auf verschiedenen politischen und sozialen Kontexten, auf Aktivismus und darauf wie Frauen Protagonistinnen davon sind. Sie arbeitet mit Installation und Performance, auch in Gemeinschaft und Räumen, die von Frauen gemeinsam gebaut und genutzt werden.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (17, '12124', 'Frederike de Graft', '$2y$10$GtnYdHvnUgIh5ClAkUZkhexXEHzKIGBMYGs8SqKb0NLTjA7KC7.zC', 'Frederike de Graft', 'frederike@degraft.de', 'Bildschirmfoto 2021-05-15 um 00.49.5017.png', 'Frederike de Graft (*1990) studierte in Kiel und Münster Kunst und Geschichte (M.Ed) und Freie Kunst. In bildhauerischen und multimedialen Arbeiten versucht sie intersubjetive Einsichten zu materialisieren und ästhetische Widersprüche aufzuzeigen.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (18, '14124214', 'Maria Renee Morales Garcia', '$2y$10$xVTHvcHgT3Tqu09O7PTGCuc7MkxMBJrJYFARDnWKVgc7EZZzJEnZ.', 'Maria Renee Morales Garcia', 'mariareneemoralesgarcia@gmail.com', 'Bildschirmfoto 2021-05-15 um 00.49.5018.png', 'Maria Renee Morales Garcia, she/her (*1997 Guatemala), studiert seit 2016 an der Kunstakademie freie Kunst bei Mariana Castillo Deball und ist seit 2020 Gast-Studentin bei Nicoline van Harskamp. Renee ist intersektionale Feministin. Dieses Thema beschäftigt sie in ihre künstlerischen Arbeit, die stark durch Installation und Performance geprägt ist.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (16, '515115152', 'Yoana Tuzharova', '$2y$10$adLXXkn/3McpbJSg00Usi.NW1rttMoVtbWKiUXWNfdC2m89uW27z6', 'Yoana Tuzharova', 'yoana.tuzharova@gmail.com', 'Bildschirmfoto 2021-05-15 um 00.49.5016.png', 'Yoana Tuzharova ist 1986 in Bulgarien geboren. Sie ist freischaffende Künstlerin. Im Fokus ihres Interesses steht die Kunst im öffentlichen Raum. Sie arbeitet medienübergreifend und konzeptuell. Zwischen 2005-2009 hat sie einen akademischen Abschluss der bildenden Kunst in der Klasse von Prof. Dr. Oleg Gochev in Bulgarien erworben. 2013-2018 absolvierte sie an der Kunstakademie Münster in der Klasse für Kunst im öffentlichen Raum bei Prof. Maik Löbbert und Prof. Dirk Löbbert ein weiteres Studium. Yoana Tuzharova hat Stipendien und Auszeichnungen erhalten und an zahlreichen Ausstellungen teilgenommen. Ihre Arbeiten sind in privaten und öffentlichen Sammlungen vertreten. Sie lebt und arbeitet in Köln und Münster.   www.yoanart.com', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (13, '5151351', 'Nadja Rich', '$2y$10$sTj.GQqdVU3WuGD0pbWnb..uw0I2ZsSshmFNrx4/2e7HLjrToZD/2', 'Nadja Rich', 'nadjarich@gmail.com', 'Bildschirmfoto 2021-05-15 um 00.49.5013.png', 'Nadja Rich (*1991) studiert an der Kunstakademie Münster Freie Kunst und Kunstpädagogik. In ihrer Kunst befasst sie sich in den Medien Malerei, Keramik und Installationen mit Körpern und ihren Erscheinungsformen sowie Identitäten und queerfeministischen Fragestellungen.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (14, '125415125', 'Annemarie Lange', '$2y$10$VzvOj/mY8KffDhXRfBiaAOvQP2W57OiLZPE/2s3rEq8YgxO6n1ore', 'Annemarie Lange', 'a_lang37@uni-muenster.de', 'Bildschirmfoto 2021-05-15 um 00.49.5014.png', 'Annemarie Lange (*1999, Rotenburg) studiert in Münster Philosophie, Bildende und Freie Kunst. In Bildhauerei und Installation setzen sich ihre künstlerischen Arbeiten mit dem Thema Spannung und dem Auslösen von Gefühlen auseinander.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (15, '12363463', 'Birthe Langner', '$2y$10$83LUC1qn9C8dJ4WKtn7r4uG2qvX5SH9gZvBDhnb45osNiNbu35tmS', 'Birthe Langner', 'blangne1@uni-muenster.de', 'Bildschirmfoto 2021-05-15 um 00.49.5015.png', 'Birthe Langner (*2000, Bückeburg) studiert Kunstpädagogik für das Lehramt sowie Freie Kunst an der Kunstakademie Münster, seit 2020 in der Klasse Buetti. Mit personifizierten Objekten hinterfragt sie die Wahrnehmung von Alltagsgegenständen und eröffnet mit Knetfiguren in Stop Motion Videos fiktive Räume für Intimität.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (20, '51214214', 'Kip Fiene', '$2y$10$fzPgiLOVPUhksOTCinvqSeR1rHDkAyfclTVFvDeAW8XwG.mAxozhu', 'Kip Fiene', 'kipfiene@gmail.com', 'Bildschirmfoto 2021-05-15 um 00.49.5020.png', 'Kip Fiene (*1999 Münster, Pronomen: keine/kip) studiert seit 2019 an der Kunstakademie Münster Freie Kunst, seit 2020 bei Nicoline van Harskamp. Kip ist schlecht in Entscheidungen treffen. Daraus resultiert nicht nur ein uneindeutiges Geschlecht (trans nicht-binär) sondern auch eine Zerissenheit zwischen verschiedenen Arbeitsweisen und Thematiken. Queernes, Feminismus, und Depressionen vermischen sich mit Texten, Skizzen, Videos, Screenshots und Audioarbeiten.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (21, '1412124', 'Theresa Hahner', '$2y$10$ex4ti7I3VODpmgRFpcwgEeJPkBSbTzixdUIRFzpMgwYDUjOGTNRti', 'Theresa Hahner', 'terra.kikeriki@googlemail.com', 'Bildschirmfoto 2021-05-15 um 00.49.5021.png', 'Theresa Hahner (*1997 in Fulda) studiert seit 2016 freie Kunst an der Kunstakademie Münster, seit 2017 in der Klasse Van Harskamp. Sie ist fasziniert von Masken und Puppen, Wachs und dem Überfluss an Krempel in Kellern.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (22, '124142124', 'admin', '$2y$10$fsIQtPLB/Bv4oMJt0IL7beuQmDWtrFQmadwdIR2jCz2AIroy5Zv2u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `accounts` VALUES (23, '6345345345', 'Lisa Tschorn', '$2y$10$GW.r.ZKQpqxvWoabUdKFp.ZQBUB2lZvnqzarSLxHvcqFqzQ.PJf5e', 'Lisa Tschorn', 'lisa.tschorn@uni-muenster.de', 'Bildschirmfoto 2021-05-15 um 00.49.5023.png', 'Lisa Tschorn (*1984, Unna) studierte in Münster, Bochum und Clermont-Ferrand Jura, Geografie, Politikwissenschaften, Kunstpädagogik und Freie Kunst. Ihre künstlerischen Arbeiten entwickelt sie ausgehend von einer performativen Praxis in unterschiedlichen Medien.', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 1);
INSERT INTO `accounts` VALUES (25, '234654346346234', 'dachi123', '$2y$10$uqzEO8KPQy.VMBPpwFQcSOZG3V1.L0AKDmbTDL4N9ey.lU8.vYTUi', 'Nickname Dachi', 'dachi@gmail.com', NULL, '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 0);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posts_count` int NULL DEFAULT NULL,
  `sub_cat_count` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'exhibition', NULL, NULL, NULL, '2021-04-30 13:18:39', NULL, 1);
INSERT INTO `categories` VALUES (2, 'blog', NULL, NULL, NULL, '2021-04-30 13:18:47', NULL, 1);

-- ----------------------------
-- Table structure for file_types
-- ----------------------------
DROP TABLE IF EXISTS `file_types`;
CREATE TABLE `file_types`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `activated` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of file_types
-- ----------------------------
INSERT INTO `file_types` VALUES (1, 'photo', '.jpg', '0', 1);
INSERT INTO `file_types` VALUES (2, 'gif', '.gif', '0', 1);
INSERT INTO `file_types` VALUES (3, 'photo', '.png', '0', 1);

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` double NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT 0,
  `mail_id` int NULL DEFAULT 0,
  `str_position` int NULL DEFAULT 0,
  `createdAt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12123373 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (12123355, 'IMG_1247.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123356, 'IMG_1248.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123357, 'IMG_1249.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123358, 'IMG_1238.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123359, 'IMG_1239.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123360, 'IMG_1240.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123361, 'IMG_1241.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123362, 'IMG_1242.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123363, 'IMG_1243.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123364, 'IMG_1244.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123365, 'IMG_1245.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123367, 'IMG_1247.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123368, 'IMG_1248.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123369, 'IMG_1249.jpg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123370, 'IMG_1242.jpg', NULL, NULL, NULL, 185, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123372, 'D84410A7-093B-49CE-9A3B-9BF9BA97EFEA.jpeg', NULL, NULL, NULL, 184, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123353, 'IMG_1245.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123345, 'DSC_0026.JPG', NULL, NULL, NULL, 179, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123344, 'CSC_0109.JPG', NULL, NULL, NULL, 179, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123343, 'DSC_0027.JPG', NULL, NULL, NULL, 178, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123342, 'DSC_0027.JPG', NULL, NULL, NULL, 178, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123352, 'IMG_1244.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123350, 'IMG_1242.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123351, 'IMG_1243.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123349, 'IMG_1241.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123348, 'IMG_1240.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123347, 'IMG_1239.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);
INSERT INTO `files` VALUES (12123346, 'IMG_1238.jpg', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `body` blob NULL,
  `seen` int NULL DEFAULT NULL,
  `ip_address` int NULL DEFAULT NULL,
  `reply_id` int NULL DEFAULT 0,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mail
-- ----------------------------

-- ----------------------------
-- Table structure for notification_subjects
-- ----------------------------
DROP TABLE IF EXISTS `notification_subjects`;
CREATE TABLE `notification_subjects`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rule` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notification_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, 'home', 'app/user-side/', '', 'Ausstellung', 1);
INSERT INTO `pages` VALUES (2, 'blog', 'app/user-side/', NULL, 'Blog', 1);
INSERT INTO `pages` VALUES (3, 'about_us', 'app/user-side/', NULL, 'Über uns ', 1);
INSERT INTO `pages` VALUES (4, 'contact', 'app/user-side/', NULL, 'Kontakt', 1);
INSERT INTO `pages` VALUES (6, 'admin-home', 'app/admin-side/', NULL, 'Ausstellung', 1);
INSERT INTO `pages` VALUES (7, 'admin-blog', 'app/admin-side/', NULL, 'Blog', 1);
INSERT INTO `pages` VALUES (8, 'admin-profile', 'app/admin-side/', NULL, '\r\nProfil', 1);

-- ----------------------------
-- Table structure for pages_permission
-- ----------------------------
DROP TABLE IF EXISTS `pages_permission`;
CREATE TABLE `pages_permission`  (
  `id` int NOT NULL,
  `page_id` int NULL DEFAULT NULL,
  `parmission_id` int NULL DEFAULT NULL,
  `createdAt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pages_permission
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NULL DEFAULT NULL,
  `permission_id` int NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for post_comments
-- ----------------------------
DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of post_comments
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `views` int NULL DEFAULT 0,
  `user_id` int NULL DEFAULT NULL,
  `status_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  `status_moder_id` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 188 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (186, 'asdasd', 'asdas', 'asdasd', 0, 25, 1, 2, NULL, '2021-05-11 15:32:04', NULL, 1);
INSERT INTO `posts` VALUES (187, '', '', '&lt;figure class=&quot;image&quot;&gt;&lt;img&gt;&lt;/figure&gt;', 0, 23, 2, 1, NULL, '2021-05-15 14:38:42', '2021-05-15 14:52:42', 0);
INSERT INTO `posts` VALUES (183, 'Vulventempel Aufbau', '', '', 0, 12, 2, 1, NULL, '2021-05-14 20:46:46', '2021-05-14 20:52:54', 1);
INSERT INTO `posts` VALUES (184, 'Aufbau Vulventempel', '', '&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;&lt;strong&gt;Aktuelles:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Online-Eröffnung: Dienstag, 18.05.2021 um 20:15 Uhr im Anschluss an die Münster Lecture der Kunstakademie. Zugang über den Link:&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://wwu.zoom.us/j/64330861073&quot;&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;http://wwu.zoom.us/j/64330861073&lt;/span&gt;&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Meeting-ID: 643 3086 1073&lt;/span&gt;&lt;br&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Kenncode: 884112&lt;/span&gt;&lt;br&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Wir freuen uns über eine rege Diskussion und Feedback zur Ausstellung. Die beteiligten Künstler:innen sind anwesend.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Ausstellungslaufzeit:&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;19. Mai bis 13. Juni 2021&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Ort:&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Wewerka Pavillon – Ausstellungsraum der Kunstakademie Münster&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Kardinal-von-Galen-Ring / Annette-Allee / Aasee-Uferweg&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Im Laufe der Ausstellung wird am 02.06. um 18 Uhr eine Podiumsdiskussion stattfinden, wobei Fragen aus dem Publikum zu der Ausstellung beantwortet werden.&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Weitere Informationen Folgen an dieser Stelle.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;&lt;strong&gt;Vulventempel:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;Nadja Rich und Lisa Tschorn mit Kip Fiene, Aleka Medina Fuentes, Frederike de Graft, Theresa Hahner, Annemarie Lange, Birthe Langner, Maria Renee Morales Garcia und Yoana Tuzharova.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-huge&quot; style=&quot;color:hsl(0,0%,0%);font-family:Arial, Helvetica, sans-serif;&quot;&gt;In die stählernen Außenverstrebungen des Wewerka Pavillons sind zehn dreieckige Leinwände gespannt. Die gleichschenkligen Malgründe zeigen differente Darstellungsweisen von Vulven, die sich in ihrem Spektrum zwischen abstrahiert-zeichnerischer Geste und expressionistischer Malerei bewegen. In Kooperation mit acht Studierenden und unter professioneller Anleitung der Sexological Bodyworker*in Robin Franke haben die Künstlerinnen Nadja Rich und Lisa Tschorn in einer eigens für die Ausstellung entwickelten Workshopreihe die Vulva in kunsthistorischer und wissenschaftlicher Darstellung untersucht. In theoretischen und praktischen Sequenzen haben die zehn Künstler*innen nach ihrer ganz subjektiven Darstellungsform der Vulva gesucht. Die intimen Darstellungen flankieren von außen die beiden Längsseiten des Pavillons und verschieben in aller Deutlichkeit das Thema Vulva in die Öffentlichkeit. Der Pavillon als öffentlicher Ausstellungsort bleibt dabei im Inneren ganz bewusst leer. Der Wewerka Pavillon wird zum „Vulventempel“, einem Raum zum Nachdenken über Scham, Körperbewusstsein und stereotype Vorstellungsbilder. Die großformatigen Malereien zeigen konkret das, was zumeist für die Öffentlichkeit verborgen bleibt. Irritierend und unverblümt gibt der „Vulventempel“ den vorbeiziehenden Spaziergänger*innen einen ganz deutlichen Fingerzeig auf einen höchst aktuellen gesellschaftskritischen Diskurs und stellt klar: Vulven sind divers und bunt und sollten in all ihren Formen und Farben gezeigt werden!&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;span class=&quot;text-big&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;assets/uploads/Plakat_VULVENTEMPEL_klein.png&quot;&gt;&lt;/figure&gt;', 0, 13, 2, 1, NULL, '2021-05-14 21:15:37', '2021-05-15 22:57:52', 1);
INSERT INTO `posts` VALUES (185, 'Selbstbezeichnung statt Scham und Porno', '&lt;p&gt;Ein positives Körpergefühl zu haben ist nicht für alle Personen, aber besonders nicht für alle weiblich gelesenen Personen natürlich oder selbstverständlich. Seit meiner Kindheit habe ich gelernt, dass mein Geschlechtsteil entweder komisch riecht oder man es besonders sauber und auch immer rasiert halten muss. Ganz natürliche Dinge wie Ausfluss oder die Periode sind tabu Themen. Ich habe mich geschämt wenn ich als junges Mädchen bei einer Übernachtungsparty menstruiert habe und besonders wenn etwas Blut auf dem Laken gelandet ist obwohl ich komplett unter Frauen war. Ich habe mich lange nicht gefragt woher diese Gefühle kamen, da ich doch vorwiegend mit einem positiven Gefühl zu meinem Körper und gut aufgeklärt aufwuchs. Warum also diese Ausstellung?&lt;/p&gt;&lt;p&gt;Die unterschwellige Vermeidung, Unterdrückung und Ignoranz des Patriarchats hat seine Spuren in unserem sozialen Miteinander hinterlassen. Die Worte die unser Sprachgebrauch zur Verfügung hat um etwas zu beschreiben, das kein Penis ist sind einfach ungenügend, schambesetzt und irgendwie peinlich. Ich kann mich nicht mit einem positiven Gefühl selbst benennen wenn ich Muschi, Scheide oder Vagina sagen. Vulva hingegen ist nicht nur die korrekte Bezeichnung eines sichtbaren Geschlechts sondern auch durch die Aufklärungsarbeit von mittlerweile zahlreichen Künstler:innen und Wissenschaftler:innen (z.B. Mithu Sanyal) positiv besetzt.&lt;/p&gt;&lt;p&gt;Vulva.&lt;/p&gt;&lt;p&gt;So sage ich gern zu meinem Geschlecht, das so mehr ist als Porno oder peinlich, unaussprechlich, niedlich oder ein Katzen Name. Für mich ist diese Ausstellung gleichzeitig radikal und auch ein Versuch die Vulva und ihren Anblick zu normalisieren. Jedes Kind erkennt einen auf den Schultisch hingekritzelten Penis aber eine Vulva? Wenn die Pubertät kommt und auch die Vulvalippen wachsen, so dass sich das „da unten“ verändert, wird die Unterschiedlichkeit plötzlich beängstigend, weil sie noch so selten abgebildet ist. Genitaloperationen an komplett gesunden Körpern aus einem Schönheitideal heraus kann die Folge dessen sein. Das ist jedoch krank, eher den Körper zu ändern, als unsere Vorstellung von richtig und falsch.&lt;/p&gt;&lt;p&gt;Wir versuchen mit den unterschiedlichen Darstellungsweisen in unserer Ausstellung eine Diversität zu zeigen und die Selbstbezeichnung und Ermächtigung des eigenen Körpers zu verinnerlichen. Auch wir sind da noch auf dem Weg und konnten noch nicht alle Unsicherheiten abschütteln. Alle die empört oder beschämt sind, unverständlich drein sehen und vorbeigehen, könnten nicht nur sich, sondern auch uns fragen warum wir das machen. Es geht um Diversität, Körperpositivität anderen und dem eigenen Körper gegenüber. Unser Körper definiert nicht wer wir sind aber er ist unser Vehikel und unser Tempel. Der einzige den wir haben. Wir wollen ihn mit der Ausstellung Vulventempel feiern.&lt;/p&gt;', '', 0, 13, 2, 2, NULL, '2021-05-14 21:50:28', '2021-05-14 21:56:17', 0);

-- ----------------------------
-- Table structure for role_details
-- ----------------------------
DROP TABLE IF EXISTS `role_details`;
CREATE TABLE `role_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_details
-- ----------------------------
INSERT INTO `role_details` VALUES (1, 'painter', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `role_details` VALUES (2, 'blogger', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `role_details` VALUES (3, 'admin', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `role_details` VALUES (4, 'daddy issue gogoebis fsiqologi', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for setting_details
-- ----------------------------
DROP TABLE IF EXISTS `setting_details`;
CREATE TABLE `setting_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `background` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting_details
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `settings_id` int NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for social_media
-- ----------------------------
DROP TABLE IF EXISTS `social_media`;
CREATE TABLE `social_media`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of social_media
-- ----------------------------
INSERT INTO `social_media` VALUES (1, 'twitter', 'https://i.pinimg.com/originals/5c/a9/8c/5ca98c73b2bb7a02bf8350933c7ca443.png', 'www.https://twitter.com/', 1, '2021-04-30 22:44:40', 1);
INSERT INTO `social_media` VALUES (2, 'facebook', 'https://i.pinimg.com/originals/b7/63/69/b763699fd1fa3bfb374442593ae642e1.png', 'www.facebook.com', 1, '2021-04-30 22:45:30', 1);
INSERT INTO `social_media` VALUES (3, 'instagram', 'https://i.pinimg.com/originals/63/9b/3d/639b3dafb544d6f061fcddd2d6686ddb.png', 'www.instagram.com', 1, '2021-04-30 22:45:44', 1);
INSERT INTO `social_media` VALUES (4, 'gmail', 'https://cdn.icon-icons.com/icons2/652/PNG/512/gmail_icon-icons.com_59877.png', 'www.gmail.com', 1, '2021-04-30 22:46:49', 1);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'Alle', NULL, 1);
INSERT INTO `status` VALUES (2, 'öffentlich', NULL, 1);
INSERT INTO `status` VALUES (3, 'Privat', NULL, 1);
INSERT INTO `status` VALUES (4, 'Projekt', NULL, 1);
INSERT INTO `status` VALUES (5, 'Gelöscht', NULL, 0);

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT NULL,
  `sub_category_title_id` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------

-- ----------------------------
-- Table structure for sub_categories_details
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories_details`;
CREATE TABLE `sub_categories_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posts_count` int NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sub_categories_details
-- ----------------------------

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for welcome_pages
-- ----------------------------
DROP TABLE IF EXISTS `welcome_pages`;
CREATE TABLE `welcome_pages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `page_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `default` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of welcome_pages
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
