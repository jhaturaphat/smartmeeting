-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2015 at 06:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '6', 1446553602),
('staff', '5', 1446553602),
('user', '2', 1446553602);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1446470331, 1446470331),
('meeting/equipment/create', 2, 'เพิ่มอุปกรณ์', NULL, NULL, 1446469105, 1446469105),
('meeting/equipment/delete', 2, 'ลบอุปกรณ์', NULL, NULL, 1446469105, 1446469105),
('meeting/equipment/index', 2, 'รายการอุปกรณ์', NULL, NULL, 1446469105, 1446469105),
('meeting/equipment/update', 2, 'แก้ไขอุปกรณ์', NULL, NULL, 1446469105, 1446469105),
('meeting/equipment/view', 2, 'ดูอุปกรณ์', NULL, NULL, 1446469105, 1446469105),
('meeting/meeting/create', 2, 'การจองห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/meeting/delete', 2, 'ลบการจองห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/meeting/index', 2, 'รายการการจองห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/meeting/update', 2, 'แก้ไขการจองห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/meeting/view', 2, 'ดูการจองห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/report/report1', 2, 'สรุปการจองห้องประชุมแบ่งตามห้อง', NULL, NULL, 1446469105, 1446469105),
('meeting/report/report2', 2, 'รายงานสรุปการจองห้องประชุมแบ่งตามเดือน', NULL, NULL, 1446469105, 1446469105),
('meeting/report/report3', 2, 'รายงานการจองห้องประชุมแบ่งตามเดือน', NULL, NULL, 1446469105, 1446469105),
('meeting/room/create', 2, 'เพิ่มห้องระชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/room/delete', 2, 'ลบห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/room/index', 2, 'รายการห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/room/update', 2, 'แก้ไขห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('meeting/room/view', 2, 'ดูห้องประชุม', NULL, NULL, 1446469105, 1446469105),
('personal/default/index', 2, 'หน้าหลักโมดูลบุคคล', NULL, NULL, 1446469105, 1446469105),
('personal/person/create', 2, 'เพิ่มบุคล', NULL, NULL, 1446469105, 1446469105),
('personal/person/delete', 2, 'ลบบุคล', NULL, NULL, 1446469105, 1446469105),
('personal/person/index', 2, 'รายการบุคคล', NULL, NULL, 1446469105, 1446469105),
('personal/person/update', 2, 'แก้ไขบุคล', NULL, NULL, 1446469105, 1446469105),
('personal/person/view', 2, 'ดูบุคล', NULL, NULL, 1446469105, 1446469105),
('staff', 1, NULL, NULL, NULL, 1446470331, 1446470331),
('updateOwnPost', 2, 'ปรับปรุงโพสของตัวเอง', 'isStaff', NULL, 1446555024, 1446555024),
('user', 1, NULL, NULL, NULL, 1446470331, 1446470331);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'meeting/equipment/create'),
('admin', 'meeting/equipment/delete'),
('user', 'meeting/equipment/index'),
('admin', 'meeting/equipment/update'),
('user', 'meeting/equipment/view'),
('staff', 'meeting/meeting/create'),
('admin', 'meeting/meeting/delete'),
('user', 'meeting/meeting/index'),
('admin', 'meeting/meeting/update'),
('updateOwnPost', 'meeting/meeting/update'),
('user', 'meeting/meeting/view'),
('user', 'meeting/report/report1'),
('user', 'meeting/report/report2'),
('user', 'meeting/report/report3'),
('admin', 'meeting/room/create'),
('admin', 'meeting/room/delete'),
('user', 'meeting/room/index'),
('admin', 'meeting/room/update'),
('user', 'meeting/room/view'),
('user', 'personal/default/index'),
('admin', 'personal/person/create'),
('admin', 'personal/person/delete'),
('user', 'personal/person/index'),
('admin', 'personal/person/update'),
('user', 'personal/person/view'),
('admin', 'staff'),
('staff', 'updateOwnPost'),
('staff', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isStaff', 'O:27:"common\\components\\StaffRule":3:{s:4:"name";s:7:"isStaff";s:9:"createdAt";i:1446555024;s:9:"updatedAt";i:1446555024;}', 1446555024, 1446555024);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ฝ่าย';

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'บริหาร'),
(2, 'ทะเบียน'),
(3, 'การเงิน'),
(4, 'ยุทธศาตร์');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
`id` int(11) NOT NULL,
  `equipment` varchar(100) NOT NULL COMMENT 'อุปกรณ์',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(100) NOT NULL COMMENT 'รูป'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='อุปกรณ์';

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment`, `description`, `photo`) VALUES
(1, 'Computer Notebook Asus แก้ไข', 'Computer Notebook Asus\r\n7440-001-0002/25 แก้ไขไม่เลือกรูป', 'asus.jpg'),
(2, 'มินิโปรเจคเตอร์', 'Mini Projector สวยที่สุด', 'projector.jpg'),
(3, 'ไมค์ลอย/ไมค์ไร้สาย', 'ไมค์ลอย/ไมค์ไร้สาย คลื่น RF 2000MHz', 'microphon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'เรื่อง',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `date_start` datetime NOT NULL COMMENT 'เริ่ม',
  `date_end` datetime NOT NULL COMMENT 'สิ้นสุด',
  `created_at` datetime DEFAULT NULL COMMENT 'เพิ่มเมื่อ',
  `updated_at` datetime DEFAULT NULL COMMENT 'แก้ไขเมื่อ',
  `room_id` int(11) NOT NULL COMMENT 'ห้อง',
  `user_id` int(11) NOT NULL COMMENT 'ผู้จอง',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT 'สถานะการจอง'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='การจองห้องประชุม';

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `title`, `description`, `date_start`, `date_end`, `created_at`, `updated_at`, `room_id`, `user_id`, `status`) VALUES
(1, 'ประชุมวิชาการการเฝ้าระวัง', 'ประชุมวิชาการการเฝ้าระวัง', '2015-11-01 09:10:00', '2015-11-03 18:05:00', '2015-10-31 20:06:33', '2015-11-01 06:02:15', 1, 4, '0'),
(2, 'อบรมการช่วยฟื้นคืนชีพขั้นพื้นฐาน', 'อบรมการช่วยฟื้นคืนชีพขั้นพื้นฐาน ', '2015-12-01 08:00:00', '2015-11-03 16:00:00', '2015-11-01 20:35:42', '2015-11-01 20:35:42', 3, 4, '0'),
(3, 'อบรมการใช้งานโปรแกรม Excel 2015 ฉบับพื้นฐาน', 'อบรมการใช้งานโปรแกรม Excel 2015 ฉบับพื้นฐาน', '2015-11-04 08:00:00', '2015-11-04 16:00:00', '2015-11-01 20:37:06', '2015-11-01 20:37:06', 4, 4, '0'),
(4, 'อบรม Yii2 Framework 2 Step by Step', 'อบรม Yii2 Framework 2 Step by Step', '2015-12-01 08:00:00', '2015-12-02 16:00:00', '2015-11-01 20:38:45', '2015-11-01 20:38:45', 2, 4, '0'),
(5, 'การเขียนโปรแกรมด้วย PHP_PDO สำหรับภาษา PHP', 'การเขียนโปรแกรมด้วย PHP_PDO สำหรับภาษา PHP', '2015-11-19 08:00:00', '2015-11-21 16:00:00', '2015-11-03 20:23:40', '2015-11-03 20:23:40', 3, 5, '0'),
(6, 'อบรมการใช้งานโปรแกรม Excel 2015 ฉบับฐานข้อมูล', 'อบรมการใช้งานโปรแกรม Excel 2015 ฉบับฐานข้อมูล', '2015-11-16 08:00:00', '2015-11-17 16:00:00', '2015-11-03 21:08:58', '2015-11-03 21:08:58', 3, 5, '0');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445869187),
('m130524_201442_init', 1445869189),
('m140506_102106_rbac_init', 1446465426);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL COMMENT 'ฝ่าย',
  `firstname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `photo` varchar(100) DEFAULT 'nopic.jpg',
  `address` text COMMENT 'ที่อยู่',
  `tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทร'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='บุคคล';

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`user_id`, `department_id`, `firstname`, `lastname`, `photo`, `address`, `tel`) VALUES
(2, 2, 'Demo2', 'Demo2', '2.jpg', 'Demo2', '08123456987'),
(4, 4, 'สมคิด', 'เคนประจิตร', '4.jpg', '178 ม.21 ต.เมืองเดช อ.เดชอุดม จ.อุบลราชธานี 34160\r\nแก้ไขที่อยู่', '0813907061'),
(5, 3, 'staff', 'staff', '5.jpg', 'ที่อยู่ staff', '026598888888'),
(6, 4, 'admin', 'admin', '6.jpg', 'ที่อยู่ admin', '1234569585');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT 'ชื่อห้อง',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(45) NOT NULL COMMENT 'รูปภาพ',
  `color` varchar(7) NOT NULL COMMENT 'สี'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `photo`, `color`) VALUES
(1, 'สัตบุตย์', 'ห้องขนาด 50 คน', 'room50.jpg', '#3c78d8'),
(2, 'จงกลณี', 'ห้องประชุมขนาด 100', 'room50.jpg', '#ff0000'),
(3, 'อโยธยา', 'ห้องไม้สัก', 'imageshghgh.jpg', '#00ffff'),
(4, 'มรกรต', 'เขียวว', 'm4.jpg', '#00ff00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ผู้ใช้';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Demo2', '123456', '$2y$13$FJA6ewsOcczWc9SSfGpcuuyZV7xSuMqM/WDIPVDQOpbiwI.jFUP4K', NULL, 'Demo2@Demo2.com', 10, 1445954149, 1446160240),
(4, 'สมคิด', 'wDcyLXmGFLtwEOgFfUnkQwvYF3cDmTn0', '$2y$13$FJA6ewsOcczWc9SSfGpcuuyZV7xSuMqM/WDIPVDQOpbiwI.jFUP4K', NULL, 'somkid@gmail.com', 10, 1446239079, 1446239514),
(5, 'staff', 'aWhK6IUAm3ysl1hv5wxbt5fSuX-ym53L', '$2y$13$jcr2T1sV4B6tDvTfvdd2kOEUuD7U0FbgSKO33HOcY/2wMea54jfhC', NULL, 'staff@staff.com', 10, 1446551635, 1446551635),
(6, 'admin', 'WtGDTaogt9n8xxIs0K-oB4qqsNWhT6IN', '$2y$13$Y2o5W4eMUKP.hX502xTQD.cItBihrA4LimQ7OsdYpNPnbcNIJLhua', NULL, 'admin@admin.com', 10, 1446552395, 1446552395);

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

CREATE TABLE IF NOT EXISTS `uses` (
  `meeting_id` int(11) NOT NULL COMMENT 'การจอง',
  `equipment_id` int(11) NOT NULL COMMENT 'อุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ใช้อุปกรณ์';

--
-- Dumping data for table `uses`
--

INSERT INTO `uses` (`meeting_id`, `equipment_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(5, 1),
(6, 1),
(2, 2),
(3, 2),
(6, 2),
(2, 3),
(3, 3),
(6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_meeting_room1_idx` (`room_id`), ADD KEY `fk_meeting_person1_idx` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`user_id`), ADD KEY `fk_person_user_idx` (`user_id`), ADD KEY `fk_person_department1_idx` (`department_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `uses`
--
ALTER TABLE `uses`
 ADD PRIMARY KEY (`meeting_id`,`equipment_id`), ADD KEY `fk_meeting_has_equipment_equipment1_idx` (`equipment_id`), ADD KEY `fk_meeting_has_equipment_meeting1_idx` (`meeting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
ADD CONSTRAINT `fk_meeting_person1` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_meeting_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
ADD CONSTRAINT `fk_person_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_person_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `uses`
--
ALTER TABLE `uses`
ADD CONSTRAINT `fk_meeting_has_equipment_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_meeting_has_equipment_meeting1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
