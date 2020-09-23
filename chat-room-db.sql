/*
 Navicat Premium Data Transfer

 Source Server         : Admin DB
 Source Server Type    : MySQL
 Source Server Version : 100322
 Source Host           : localhost:3306
 Source Schema         : c2portfolio

 Target Server Type    : MySQL
 Target Server Version : 100322
 File Encoding         : 65001

 Date: 21/08/2020 16:23:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for chat_message
-- ----------------------------
DROP TABLE IF EXISTS `chat_message`;
CREATE TABLE `chat_message`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `to_user_id` int(255) NULL DEFAULT NULL,
  `from_user_id` int(255) NULL DEFAULT NULL,
  `chat_message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chat_message
-- ----------------------------
INSERT INTO `chat_message` VALUES (1, 0, 2, 'arrow', '2020-08-21 16:12:43');
INSERT INTO `chat_message` VALUES (2, 0, 1, 'supernaturale', '2020-08-21 16:12:55');

-- ----------------------------
-- Table structure for login_details
-- ----------------------------
DROP TABLE IF EXISTS `login_details`;
CREATE TABLE `login_details`  (
  `user_id` int(255) NULL DEFAULT NULL,
  `login_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_details` int(255) NULL DEFAULT NULL,
  `last_activity` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`login_details_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login_details
-- ----------------------------
INSERT INTO `login_details` VALUES (2, 1, NULL, '2020-08-21 13:19:49');
INSERT INTO `login_details` VALUES (1, 2, NULL, NULL);
INSERT INTO `login_details` VALUES (1, 3, NULL, '2020-08-21 13:19:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_last_activity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user', '$2y$10$EzdcSQANoZwvyjWS5X753uedFoDSEX9tESa0D0/CYjrZSGSO3Rmk.', 'user@mail.com', NULL);
INSERT INTO `users` VALUES (2, 'user1', '$2y$10$lYK7ib7jix2xpYrJG9HmyeO4JuIfOiZ5GzjTnMSjFldu7UDA///7e', 'user1@mail.com', NULL);

SET FOREIGN_KEY_CHECKS = 1;
