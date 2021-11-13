/*
 Navicat Premium Data Transfer

 Source Server         : localhost_123456
 Source Server Type    : MariaDB
 Source Server Version : 100500
 Source Host           : localhost:3306
 Source Schema         : smartmeeting

 Target Server Type    : MariaDB
 Target Server Version : 100500
 File Encoding         : 65001

 Date: 13/11/2021 10:51:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'ฝ่าย' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for equipment
-- ----------------------------
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'อุปกรณ์',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูป',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'อุปกรณ์' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for meeting
-- ----------------------------
DROP TABLE IF EXISTS `meeting`;
CREATE TABLE `meeting`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เรื่อง',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `date_start` datetime(0) NOT NULL COMMENT 'เริ่ม',
  `date_end` datetime(0) NOT NULL COMMENT 'สิ้นสุด',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'เพิ่มเมื่อ',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'แก้ไขเมื่อ',
  `room_id` int(11) NOT NULL COMMENT 'ห้อง',
  `user_id` int(11) NOT NULL COMMENT 'ผู้จอง',
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT 'สถานะการจอง',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_meeting_room1_idx`(`room_id`) USING BTREE,
  INDEX `fk_meeting_person1_idx`(`user_id`) USING BTREE,
  CONSTRAINT `fk_meeting_person1` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_meeting_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'การจองห้องประชุม' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL COMMENT 'ฝ่าย',
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'นามสกุล',
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'nopic.jpg',
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ที่อยู่',
  `tel` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เบอร์โทร',
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `fk_person_user_idx`(`user_id`) USING BTREE,
  INDEX `fk_person_department1_idx`(`department_id`) USING BTREE,
  CONSTRAINT `fk_person_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_person_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'บุคคล' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อห้อง',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูปภาพ',
  `color` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'สี',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'ผู้ใช้' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for uses
-- ----------------------------
DROP TABLE IF EXISTS `uses`;
CREATE TABLE `uses`  (
  `meeting_id` int(11) NOT NULL COMMENT 'การจอง',
  `equipment_id` int(11) NOT NULL COMMENT 'อุปกรณ์',
  PRIMARY KEY (`meeting_id`, `equipment_id`) USING BTREE,
  INDEX `fk_meeting_has_equipment_equipment1_idx`(`equipment_id`) USING BTREE,
  INDEX `fk_meeting_has_equipment_meeting1_idx`(`meeting_id`) USING BTREE,
  CONSTRAINT `fk_meeting_has_equipment_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_meeting_has_equipment_meeting1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'ใช้อุปกรณ์' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
