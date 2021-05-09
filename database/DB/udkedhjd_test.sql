/*
 Navicat Premium Data Transfer

 Source Server         : pizzilab
 Source Server Type    : MySQL
 Source Server Version : 100328
 Source Host           : out27.keliweb.com:3306
 Source Schema         : udkedhjd_test

 Target Server Type    : MySQL
 Target Server Version : 100328
 File Encoding         : 65001

 Date: 09/05/2021 21:09:43
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
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_roles
-- ----------------------------
INSERT INTO `account_roles` VALUES (1, 'as', 1, 1, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (2, '12', 2, 2, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (3, 'ga', 1, 2, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (4, 'xz', 1, 3, NULL, NULL, NULL);
INSERT INTO `account_roles` VALUES (5, 'hr', 1, 4, NULL, NULL, NULL);

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
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `second_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `midname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender_id` int NULL DEFAULT NULL,
  `birth_date` datetime(0) NULL DEFAULT NULL,
  `permission_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  `activated` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES (1, '123456789', 'admin', '123', 'DiDidatviguro', 'dachi.xucishvili53@gmail.com', 'defblog.jpg', 'Gio Guka', NULL, NULL, NULL, NULL, 2, '2021-05-20 00:00:00', '1', '2021-04-28 13:21:20', '2021-04-28 13:21:20', 1);
INSERT INTO `accounts` VALUES (2, '9a0ffc542a81ccc72bd9efd88980d20f55ac44d6161d72062af4333509e38ed5', 'dachi', '$2y$10$sghKsgfZcWzI.ifOORMID.yOA4/hjl5sTTRXIcK4VHvTXQxmKV4jC', 'Giorgi', 'dachi.xucishvili53@gmail.com', 'WIN_20210214_13_46_05_Pro.jpg', 'Datove yvavili taroze modian dzmebi gvelebi\naxseni sheni qcevebi an damimale yverebi\nsad vin ras edzebs charchoa\nes xo martoa martoa\nmagram movidnen dzmebi\nxalxshi gavarda xmebi \nisini arian gebi\nda ture qoniat rqebi\nmagram sadaa sashveli\nmorbian debi nas', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL);

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
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 123130 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (1, 'img1', 'photo', NULL, 40.4, 1, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (7, 'blog1', NULL, NULL, NULL, 3, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (2, 'img2', 'photo', NULL, NULL, 1, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (8, 'blog2', NULL, NULL, NULL, 3, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (9, 'blog3', NULL, NULL, NULL, 3, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (10, 'blog1', NULL, NULL, NULL, 4, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (11, 'blog2', NULL, NULL, NULL, 4, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (12, 'blog3', NULL, NULL, NULL, 4, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (3, 'img3', 'photo', NULL, 20.4, 1, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (4, 'img1', 'photo', NULL, NULL, 2, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (5, 'img2', 'photo', NULL, NULL, 2, 0, 0, NULL, 1);
INSERT INTO `files` VALUES (6, 'img3', 'photo', NULL, NULL, 2, 0, 0, NULL, 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

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
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'Post 1', '', 'Es aris pirveli Images Descripton', 0, 1, 1, 1, NULL, '2021-05-08 12:38:04', '2021-05-08 17:05:13', 1);
INSERT INTO `posts` VALUES (2, 'Post 2', NULL, 'Es aris meore Images Descripton', 0, 2, 2, 1, NULL, '2021-05-04 18:05:46', NULL, 1);
INSERT INTO `posts` VALUES (3, 'Blog 1', NULL, 'Es aris Blogis 2 posti', 0, 1, 1, 2, NULL, '2021-04-26 18:05:48', NULL, 1);
INSERT INTO `posts` VALUES (4, 'Blog 2', NULL, 'Es aris blog n2', 0, 2, 1, 2, NULL, '2021-05-05 18:05:52', NULL, 1);
INSERT INTO `posts` VALUES (26, '1t', '', '&lt;p&gt;halo&lt;/p&gt;', 0, 1, 3, 1, NULL, '2021-05-09 17:34:54', NULL, 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

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
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of welcome_pages
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
