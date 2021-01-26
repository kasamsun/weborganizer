-- phpMyAdmin SQL Dump
-- version 2.6.0-pl3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 04 เม.ย. 2005  น.
-- รุ่นของเซิร์ฟเวอร์: 4.1.8
-- รุ่นของ PHP: 5.0.3
-- 
-- ฐานข้อมูล: `weborganizer`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_addr_book`
-- 

DROP TABLE IF EXISTS `weborg_addr_book`;
CREATE TABLE `weborg_addr_book` (
  `addr_book_id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL default '0',
  `addr_name` varchar(80) NOT NULL default '',
  `addr_address` varchar(200) NOT NULL default '',
  `addr_phone` varchar(50) NOT NULL default '',
  `addr_email` varchar(50) NOT NULL default '',
  `addr_company` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`addr_book_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=36 ;

-- 
-- dump ตาราง `weborg_addr_book`
-- 

INSERT INTO `weborg_addr_book` VALUES (11, 4710426055, 'เชษฐา', 'bkk', '023501000', 'chetta@cud.mof.go.th', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (12, 4710426055, 'ศรัญญา', 'bkk', '023501000', 'saranya@cud.mof.go.th', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (13, 4710426055, 'กี', '', '025178734', 'kee@mpa.com', '');
INSERT INTO `weborg_addr_book` VALUES (15, 4710426055, 'กีรติ', '204/11', '097707713', 'keerati@map.com', 'SISEA');
INSERT INTO `weborg_addr_book` VALUES (16, 4710426055, 'อิทธิพล', 'bkk', '023501000', 'ittipolch@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (17, 4710426055, 'รุ่งนภา', '132/23 moo 6', '077777777', 'rungnapa@mpa.com', 'MPA');
INSERT INTO `weborg_addr_book` VALUES (18, 4710426055, 'สมโชค', 'bkk', '023501000', 'somchok@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (19, 4710426055, 'Michael', '56/67 USA', '023456789', 'michael@doo.com', 'Doo');
INSERT INTO `weborg_addr_book` VALUES (20, 4710426055, 'ณัฐพล', 'bkk', '023501000', 'nuttapo@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (21, 4710426055, 'สุรศักดิ์', 'bkk', '023501000', 'surasak@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (22, 4710426055, 'Mac', '16 rungsit Bangkok', '023454565', 'montree@pan.com', 'Pon');
INSERT INTO `weborg_addr_book` VALUES (23, 4710426055, 'วิเชียร', 'bkk', '023501000', 'wichien@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (24, 4710426055, 'วิเชียร', 'bkk', '023501000', 'wichien@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (25, 4710426055, 'ศิริณญา', 'bkk', '023501000', 'sirinya@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (26, 4710426055, 'รชตะ', 'bkk', '023501000', 'rachata@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (27, 4710426055, 'Jenny', '11 Colorado USA', '029999999', 'jen@si.com', 'SI');
INSERT INTO `weborg_addr_book` VALUES (28, 4710426055, 'บุญเรือน', 'bkk', '023501000', 'bunrude@yipintsoi.com', 'YIT');
INSERT INTO `weborg_addr_book` VALUES (29, 4710426055, 'เอก', '19 moo 28', '076895690', 'ake.j@lan.com', 'LAN');
INSERT INTO `weborg_addr_book` VALUES (30, 4710426055, 'วีรชัย', 'พระราม 7', '045678905', 'wee@egat.com', 'EGAT');
INSERT INTO `weborg_addr_book` VALUES (31, 4710426055, 'Swen', 'USA', '082333333', 'swen@home.com', 'HOME');
INSERT INTO `weborg_addr_book` VALUES (32, 4710426055, 'Fred', 'HK', '034567891', 'fred@rock.com', 'ROCK');
INSERT INTO `weborg_addr_book` VALUES (33, 4710426055, 'Armanda', 'HK', '000099991', 'aman@mart.com', 'MART');
INSERT INTO `weborg_addr_book` VALUES (35, 4710426023, 'กีรติ', 'ลาดกระบัง กทม.', '097707713', 'keerati@hotmail.com', 'sisea');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_addr_book_seq`
-- 

DROP TABLE IF EXISTS `weborg_addr_book_seq`;
CREATE TABLE `weborg_addr_book_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=36 ;

-- 
-- dump ตาราง `weborg_addr_book_seq`
-- 

INSERT INTO `weborg_addr_book_seq` VALUES (35);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_attachment`
-- 

DROP TABLE IF EXISTS `weborg_attachment`;
CREATE TABLE `weborg_attachment` (
  `attach_id` bigint(20) NOT NULL auto_increment,
  `job_id` bigint(20) NOT NULL default '0',
  `filename` varchar(200) NOT NULL default '',
  `filesize` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`attach_id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=234 ;

-- 
-- dump ตาราง `weborg_attachment`
-- 

INSERT INTO `weborg_attachment` VALUES (209, 1101, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (210, 1101, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (211, 1101, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (212, 1102, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (213, 1102, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (214, 1102, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (215, 1103, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (216, 1103, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (217, 1103, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (218, 1104, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (219, 1104, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (220, 1104, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (221, 1105, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (222, 1105, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (223, 1105, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (224, 1106, '4710426041s.jpg', 1087);
INSERT INTO `weborg_attachment` VALUES (225, 1106, '4710426002s.jpg', 1267);
INSERT INTO `weborg_attachment` VALUES (226, 1106, '4710426035s.jpg', 1216);
INSERT INTO `weborg_attachment` VALUES (230, 1108, 'Comment_Project_PHP4.doc', 33280);
INSERT INTO `weborg_attachment` VALUES (232, 1111, 'setupsql.chm', 1198783);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_attachment_seq`
-- 

DROP TABLE IF EXISTS `weborg_attachment_seq`;
CREATE TABLE `weborg_attachment_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=234 ;

-- 
-- dump ตาราง `weborg_attachment_seq`
-- 

INSERT INTO `weborg_attachment_seq` VALUES (233);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_department`
-- 

DROP TABLE IF EXISTS `weborg_department`;
CREATE TABLE `weborg_department` (
  `dep_id` bigint(20) NOT NULL auto_increment,
  `dep_name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`dep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=25 ;

-- 
-- dump ตาราง `weborg_department`
-- 

INSERT INTO `weborg_department` VALUES (22, 'ISM 7');
INSERT INTO `weborg_department` VALUES (23, 'ISM 8');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_department_seq`
-- 

DROP TABLE IF EXISTS `weborg_department_seq`;
CREATE TABLE `weborg_department_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=25 ;

-- 
-- dump ตาราง `weborg_department_seq`
-- 

INSERT INTO `weborg_department_seq` VALUES (24);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_group`
-- 

DROP TABLE IF EXISTS `weborg_group`;
CREATE TABLE `weborg_group` (
  `group_id` bigint(20) NOT NULL auto_increment,
  `group_name` varchar(100) NOT NULL default '',
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=39 ;

-- 
-- dump ตาราง `weborg_group`
-- 

INSERT INTO `weborg_group` VALUES (1, 'กลุ่ม Administrator');
INSERT INTO `weborg_group` VALUES (25, 'กลุ่มรายงานServlet');
INSERT INTO `weborg_group` VALUES (24, 'กลุ่มรายงานASP.Net');
INSERT INTO `weborg_group` VALUES (23, 'กลุ่มรายงาน PHP');
INSERT INTO `weborg_group` VALUES (26, 'กลุ่มรายงานJSP');
INSERT INTO `weborg_group` VALUES (27, 'กลุ่มรายงานJavascript');
INSERT INTO `weborg_group` VALUES (28, 'Project_PHP1');
INSERT INTO `weborg_group` VALUES (29, 'Project_PHP2');
INSERT INTO `weborg_group` VALUES (30, 'Project_PHP4');
INSERT INTO `weborg_group` VALUES (31, 'Project_PHP3');
INSERT INTO `weborg_group` VALUES (32, 'Project_JSPServlet1');
INSERT INTO `weborg_group` VALUES (33, 'Project_JSPServlet2');
INSERT INTO `weborg_group` VALUES (34, 'Project_JSPServlet3');
INSERT INTO `weborg_group` VALUES (35, 'Project_JSPServlet4');
INSERT INTO `weborg_group` VALUES (36, 'Project_ASP1');
INSERT INTO `weborg_group` VALUES (37, 'Project_ASP2');
INSERT INTO `weborg_group` VALUES (38, 'Project_ASP3');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_group_assign`
-- 

DROP TABLE IF EXISTS `weborg_group_assign`;
CREATE TABLE `weborg_group_assign` (
  `group_assign_id` bigint(20) NOT NULL auto_increment,
  `group_id` bigint(20) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `group_position` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_assign_id`),
  KEY `group_id` (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=126 ;

-- 
-- dump ตาราง `weborg_group_assign`
-- 

INSERT INTO `weborg_group_assign` VALUES (1, 1, 1, 1);
INSERT INTO `weborg_group_assign` VALUES (2, 1, 4710426034, 1);
INSERT INTO `weborg_group_assign` VALUES (125, 1, 4710426023, 1);
INSERT INTO `weborg_group_assign` VALUES (4, 1, 4710426047, 1);
INSERT INTO `weborg_group_assign` VALUES (5, 1, 4710426055, 1);
INSERT INTO `weborg_group_assign` VALUES (23, 25, 4710426014, 1);
INSERT INTO `weborg_group_assign` VALUES (8, 23, 4710426005, 1);
INSERT INTO `weborg_group_assign` VALUES (9, 23, 4710426010, 0);
INSERT INTO `weborg_group_assign` VALUES (10, 23, 4710426011, 0);
INSERT INTO `weborg_group_assign` VALUES (11, 23, 4710426030, 0);
INSERT INTO `weborg_group_assign` VALUES (12, 23, 4710426052, 0);
INSERT INTO `weborg_group_assign` VALUES (13, 23, 4710426019, 0);
INSERT INTO `weborg_group_assign` VALUES (14, 23, 4710426022, 0);
INSERT INTO `weborg_group_assign` VALUES (15, 23, 4710426033, 0);
INSERT INTO `weborg_group_assign` VALUES (16, 23, 4710426048, 0);
INSERT INTO `weborg_group_assign` VALUES (17, 23, 4710426050, 0);
INSERT INTO `weborg_group_assign` VALUES (18, 27, 4710426002, 1);
INSERT INTO `weborg_group_assign` VALUES (19, 27, 4710426004, 0);
INSERT INTO `weborg_group_assign` VALUES (108, 33, 4710426014, 1);
INSERT INTO `weborg_group_assign` VALUES (21, 27, 4710426013, 0);
INSERT INTO `weborg_group_assign` VALUES (121, 1, 4710426017, 0);
INSERT INTO `weborg_group_assign` VALUES (25, 25, 4710426015, 0);
INSERT INTO `weborg_group_assign` VALUES (27, 34, 4710426015, 1);
INSERT INTO `weborg_group_assign` VALUES (28, 27, 4710426017, 0);
INSERT INTO `weborg_group_assign` VALUES (29, 27, 4710426023, 0);
INSERT INTO `weborg_group_assign` VALUES (30, 25, 4710426018, 0);
INSERT INTO `weborg_group_assign` VALUES (31, 27, 4710426026, 0);
INSERT INTO `weborg_group_assign` VALUES (32, 27, 4710426031, 0);
INSERT INTO `weborg_group_assign` VALUES (40, 34, 4710426018, 0);
INSERT INTO `weborg_group_assign` VALUES (34, 27, 4710426034, 0);
INSERT INTO `weborg_group_assign` VALUES (35, 27, 4710426047, 0);
INSERT INTO `weborg_group_assign` VALUES (36, 25, 4710426021, 0);
INSERT INTO `weborg_group_assign` VALUES (37, 27, 4710426055, 0);
INSERT INTO `weborg_group_assign` VALUES (38, 34, 4710426021, 0);
INSERT INTO `weborg_group_assign` VALUES (39, 24, 4710426001, 1);
INSERT INTO `weborg_group_assign` VALUES (41, 24, 4710426008, 0);
INSERT INTO `weborg_group_assign` VALUES (42, 24, 4710426009, 0);
INSERT INTO `weborg_group_assign` VALUES (43, 24, 4710426016, 0);
INSERT INTO `weborg_group_assign` VALUES (44, 25, 4710426024, 0);
INSERT INTO `weborg_group_assign` VALUES (45, 24, 4710426036, 0);
INSERT INTO `weborg_group_assign` VALUES (46, 25, 4710426025, 0);
INSERT INTO `weborg_group_assign` VALUES (47, 24, 4710426038, 0);
INSERT INTO `weborg_group_assign` VALUES (48, 24, 4710426039, 0);
INSERT INTO `weborg_group_assign` VALUES (49, 25, 4710426032, 0);
INSERT INTO `weborg_group_assign` VALUES (50, 24, 4710426040, 0);
INSERT INTO `weborg_group_assign` VALUES (51, 24, 4710426042, 0);
INSERT INTO `weborg_group_assign` VALUES (52, 25, 4710426044, 0);
INSERT INTO `weborg_group_assign` VALUES (53, 24, 4710426043, 0);
INSERT INTO `weborg_group_assign` VALUES (54, 25, 4710426045, 0);
INSERT INTO `weborg_group_assign` VALUES (55, 24, 4710426049, 0);
INSERT INTO `weborg_group_assign` VALUES (56, 25, 4710426046, 0);
INSERT INTO `weborg_group_assign` VALUES (57, 25, 4710426053, 0);
INSERT INTO `weborg_group_assign` VALUES (58, 36, 4710426008, 1);
INSERT INTO `weborg_group_assign` VALUES (59, 25, 4710426054, 0);
INSERT INTO `weborg_group_assign` VALUES (60, 36, 4710426009, 0);
INSERT INTO `weborg_group_assign` VALUES (80, 26, 4710426003, 1);
INSERT INTO `weborg_group_assign` VALUES (62, 36, 4710426036, 0);
INSERT INTO `weborg_group_assign` VALUES (63, 26, 4710426007, 0);
INSERT INTO `weborg_group_assign` VALUES (64, 36, 4710426037, 0);
INSERT INTO `weborg_group_assign` VALUES (65, 26, 4710426012, 0);
INSERT INTO `weborg_group_assign` VALUES (66, 36, 4710426049, 0);
INSERT INTO `weborg_group_assign` VALUES (67, 37, 4710426001, 1);
INSERT INTO `weborg_group_assign` VALUES (68, 37, 4710426002, 0);
INSERT INTO `weborg_group_assign` VALUES (69, 26, 4710426027, 0);
INSERT INTO `weborg_group_assign` VALUES (70, 26, 4710426028, 0);
INSERT INTO `weborg_group_assign` VALUES (71, 37, 4710426040, 0);
INSERT INTO `weborg_group_assign` VALUES (72, 26, 4710426029, 0);
INSERT INTO `weborg_group_assign` VALUES (73, 26, 4710426035, 0);
INSERT INTO `weborg_group_assign` VALUES (74, 37, 4710426042, 0);
INSERT INTO `weborg_group_assign` VALUES (75, 37, 4710426043, 0);
INSERT INTO `weborg_group_assign` VALUES (76, 26, 4710426041, 0);
INSERT INTO `weborg_group_assign` VALUES (77, 26, 4710426051, 0);
INSERT INTO `weborg_group_assign` VALUES (78, 26, 4710426056, 0);
INSERT INTO `weborg_group_assign` VALUES (79, 38, 4710426016, 1);
INSERT INTO `weborg_group_assign` VALUES (81, 38, 4710426027, 0);
INSERT INTO `weborg_group_assign` VALUES (82, 38, 4710426026, 0);
INSERT INTO `weborg_group_assign` VALUES (83, 28, 4710426005, 1);
INSERT INTO `weborg_group_assign` VALUES (84, 38, 4710426038, 0);
INSERT INTO `weborg_group_assign` VALUES (85, 38, 4710426039, 0);
INSERT INTO `weborg_group_assign` VALUES (86, 28, 4710426010, 0);
INSERT INTO `weborg_group_assign` VALUES (87, 28, 4710426011, 0);
INSERT INTO `weborg_group_assign` VALUES (88, 28, 4710426030, 0);
INSERT INTO `weborg_group_assign` VALUES (89, 28, 4710426052, 0);
INSERT INTO `weborg_group_assign` VALUES (90, 29, 4710426004, 1);
INSERT INTO `weborg_group_assign` VALUES (91, 29, 4710426013, 0);
INSERT INTO `weborg_group_assign` VALUES (92, 29, 4710426031, 0);
INSERT INTO `weborg_group_assign` VALUES (93, 34, 4710426045, 0);
INSERT INTO `weborg_group_assign` VALUES (94, 34, 4710426046, 0);
INSERT INTO `weborg_group_assign` VALUES (95, 29, 4710426044, 0);
INSERT INTO `weborg_group_assign` VALUES (96, 30, 4710426019, 1);
INSERT INTO `weborg_group_assign` VALUES (97, 30, 4710426022, 0);
INSERT INTO `weborg_group_assign` VALUES (98, 35, 4710426012, 1);
INSERT INTO `weborg_group_assign` VALUES (99, 30, 4710426033, 0);
INSERT INTO `weborg_group_assign` VALUES (100, 30, 4710426048, 0);
INSERT INTO `weborg_group_assign` VALUES (101, 35, 4710426028, 0);
INSERT INTO `weborg_group_assign` VALUES (102, 30, 4710426050, 0);
INSERT INTO `weborg_group_assign` VALUES (103, 35, 4710426029, 0);
INSERT INTO `weborg_group_assign` VALUES (104, 35, 4710426035, 0);
INSERT INTO `weborg_group_assign` VALUES (105, 35, 4710426041, 0);
INSERT INTO `weborg_group_assign` VALUES (106, 31, 4710426017, 1);
INSERT INTO `weborg_group_assign` VALUES (107, 31, 4710426023, 0);
INSERT INTO `weborg_group_assign` VALUES (109, 31, 4710426034, 0);
INSERT INTO `weborg_group_assign` VALUES (110, 33, 4710426025, 0);
INSERT INTO `weborg_group_assign` VALUES (111, 31, 4710426047, 0);
INSERT INTO `weborg_group_assign` VALUES (112, 33, 4710426032, 0);
INSERT INTO `weborg_group_assign` VALUES (113, 33, 4710426053, 0);
INSERT INTO `weborg_group_assign` VALUES (114, 31, 4710426055, 0);
INSERT INTO `weborg_group_assign` VALUES (115, 33, 4710426054, 0);
INSERT INTO `weborg_group_assign` VALUES (116, 32, 4710426003, 1);
INSERT INTO `weborg_group_assign` VALUES (117, 32, 4710426007, 0);
INSERT INTO `weborg_group_assign` VALUES (118, 32, 4710426024, 0);
INSERT INTO `weborg_group_assign` VALUES (119, 32, 4710426051, 0);
INSERT INTO `weborg_group_assign` VALUES (120, 32, 4710426056, 0);
INSERT INTO `weborg_group_assign` VALUES (122, 24, 4710426037, 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_group_assign_seq`
-- 

DROP TABLE IF EXISTS `weborg_group_assign_seq`;
CREATE TABLE `weborg_group_assign_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=241 ;

-- 
-- dump ตาราง `weborg_group_assign_seq`
-- 

INSERT INTO `weborg_group_assign_seq` VALUES (240);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_group_seq`
-- 

DROP TABLE IF EXISTS `weborg_group_seq`;
CREATE TABLE `weborg_group_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=39 ;

-- 
-- dump ตาราง `weborg_group_seq`
-- 

INSERT INTO `weborg_group_seq` VALUES (38);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_job`
-- 

DROP TABLE IF EXISTS `weborg_job`;
CREATE TABLE `weborg_job` (
  `job_id` bigint(20) NOT NULL auto_increment,
  `job_type` tinyint(4) NOT NULL default '0',
  `entrydate` varchar(8) NOT NULL default '',
  `effectivedate` varchar(8) NOT NULL default '',
  `entrytime` varchar(6) NOT NULL default '',
  `effectivetime` varchar(6) NOT NULL default '',
  `room_id` bigint(20) NOT NULL default '0',
  `from_time` varchar(8) NOT NULL default '',
  `to_time` varchar(8) NOT NULL default '',
  `job_title` varchar(250) NOT NULL default '',
  `job_detail` text NOT NULL,
  `job_folder` tinyint(4) NOT NULL default '0',
  `job_user_id` bigint(20) NOT NULL default '0',
  `from_user` bigint(20) NOT NULL default '0',
  `sendto_type` tinyint(4) NOT NULL default '0',
  `sendto_id` bigint(20) NOT NULL default '0',
  `read_status` tinyint(11) NOT NULL default '0',
  `job_size` bigint(20) NOT NULL default '0',
  `from_job_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`job_id`),
  KEY `room_id` (`room_id`),
  KEY `from_user` (`from_user`),
  KEY `sendto_id` (`sendto_id`),
  KEY `entrydate` (`entrydate`),
  KEY `effectivedate` (`effectivedate`),
  KEY `entrytime` (`entrytime`),
  KEY `effectivetime` (`effectivetime`),
  KEY `job_user_id` (`job_user_id`),
  KEY `sendto_type` (`sendto_type`),
  KEY `from_job_id` (`from_job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=1421 ;

-- 
-- dump ตาราง `weborg_job`
-- 

INSERT INTO `weborg_job` VALUES (1101, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 1, 4710426055, 4710426055, 3, 1, 1, 4007, 0);
INSERT INTO `weborg_job` VALUES (1102, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 0, 1, 4710426055, 3, 1, 0, 4007, 1101);
INSERT INTO `weborg_job` VALUES (1103, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 2, 4710426017, 4710426055, 3, 1, 1, 4007, 1101);
INSERT INTO `weborg_job` VALUES (1104, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 0, 4710426023, 4710426055, 3, 1, 1, 4007, 1101);
INSERT INTO `weborg_job` VALUES (1105, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 0, 4710426034, 4710426055, 3, 1, 0, 4007, 1101);
INSERT INTO `weborg_job` VALUES (1106, 1, '20050331', '20050331', '223816', '0900', 0, '', '', 'test sending mail', 'test mail bla bla', 0, 4710426047, 4710426055, 3, 1, 0, 4007, 1101);
INSERT INTO `weborg_job` VALUES (1172, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426056, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1108, 1, '20050331', '20050331', '223928', '0900', 0, '', '', 'Re: test sending mail', 'test mail bla bla', 1, 4710426017, 4710426017, 1, 4710426055, 1, 33717, 0);
INSERT INTO `weborg_job` VALUES (1171, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426055, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1111, 5, '20050331', '20050331', '224905', '0900', 0, '', '', 'test attach', 'test', 1, 4710426017, 4710426017, 1, 4710426055, 1, 1199207, 0);
INSERT INTO `weborg_job` VALUES (1170, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 1, 4710426055, 4710426055, 2, 22, 1, 436, 0);
INSERT INTO `weborg_job` VALUES (1113, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 1, 4710426037, 4710426037, 2, 22, 1, 424, 0);
INSERT INTO `weborg_job` VALUES (1114, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426055, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1115, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426056, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1116, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426042, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1117, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426043, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1118, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426044, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1119, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426045, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1120, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426046, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1121, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426047, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1122, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426048, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1123, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426049, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1124, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426050, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1125, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426051, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1126, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426052, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1127, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426053, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1128, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426054, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1129, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426003, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1130, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426004, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1131, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426005, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1132, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426006, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1133, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426007, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1134, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426008, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1135, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426009, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1136, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426010, 4710426037, 2, 22, 1, 424, 1113);
INSERT INTO `weborg_job` VALUES (1137, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426011, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1138, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426012, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1139, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426013, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1140, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426014, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1141, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426015, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1142, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426016, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1143, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426017, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1144, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426018, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1145, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426019, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1146, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426020, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1147, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426021, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1148, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426022, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1149, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 3, 4710426023, 4710426037, 2, 22, 1, 424, 1113);
INSERT INTO `weborg_job` VALUES (1150, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426024, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1151, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426025, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1152, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426026, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1153, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426027, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1154, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426028, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1155, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426029, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1156, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426030, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1157, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426031, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1158, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426032, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1159, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426033, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1160, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426034, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1161, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426035, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1162, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426036, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1163, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426037, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1164, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426038, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1165, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426039, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1166, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426040, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1167, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426041, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1168, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426001, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1169, 5, '20050331', '20050331', '230041', '0900', 0, '', '', 'test', 'test', 0, 4710426002, 4710426037, 2, 22, 0, 424, 1113);
INSERT INTO `weborg_job` VALUES (1173, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426042, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1174, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426043, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1175, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426044, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1176, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426045, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1177, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426046, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1178, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426047, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1179, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426048, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1180, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426049, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1181, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426050, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1182, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426051, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1183, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426052, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1184, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426053, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1185, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426054, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1186, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426003, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1187, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426004, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1188, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426005, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1189, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426006, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1190, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426007, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1191, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426008, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1192, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426009, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1193, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426010, 4710426055, 2, 22, 1, 436, 1170);
INSERT INTO `weborg_job` VALUES (1194, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426011, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1195, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426012, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1196, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426013, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1197, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426014, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1198, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426015, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1199, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426016, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1200, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426017, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1201, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426018, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1202, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426019, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1203, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426020, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1204, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426021, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1205, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426022, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1206, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426023, 4710426055, 2, 22, 1, 436, 1170);
INSERT INTO `weborg_job` VALUES (1207, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426024, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1208, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426025, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1209, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426026, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1210, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426027, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1211, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426028, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1212, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426029, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1213, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426030, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1214, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426031, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1215, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426032, 4710426055, 2, 22, 1, 436, 1170);
INSERT INTO `weborg_job` VALUES (1216, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426033, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1217, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426034, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1218, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426035, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1219, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426036, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1220, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426037, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1221, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426038, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1222, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426039, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1223, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426040, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1224, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426041, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1225, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426001, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1226, 5, '20050331', '20050331', '230346', '0900', 0, '', '', 'data', 'data debug error', 0, 4710426002, 4710426055, 2, 22, 0, 436, 1170);
INSERT INTO `weborg_job` VALUES (1227, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 1, 4710426055, 4710426055, 3, 31, 1, 425, 0);
INSERT INTO `weborg_job` VALUES (1228, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 0, 4710426017, 4710426055, 3, 31, 0, 425, 1227);
INSERT INTO `weborg_job` VALUES (1229, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 3, 4710426023, 4710426055, 3, 31, 1, 425, 1227);
INSERT INTO `weborg_job` VALUES (1230, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 0, 4710426034, 4710426055, 3, 31, 0, 425, 1227);
INSERT INTO `weborg_job` VALUES (1231, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 0, 4710426047, 4710426055, 3, 31, 0, 425, 1227);
INSERT INTO `weborg_job` VALUES (1232, 5, '20050331', '20050331', '230706', '0900', 0, '', '', 'test error', 'error', 0, 4710426055, 4710426055, 3, 31, 1, 425, 1227);
INSERT INTO `weborg_job` VALUES (1233, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 1, 4710426037, 4710426037, 3, 31, 1, 437, 0);
INSERT INTO `weborg_job` VALUES (1234, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 0, 4710426017, 4710426037, 3, 31, 1, 437, 1233);
INSERT INTO `weborg_job` VALUES (1235, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 3, 4710426023, 4710426037, 3, 31, 0, 437, 1233);
INSERT INTO `weborg_job` VALUES (1236, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 0, 4710426034, 4710426037, 3, 31, 0, 437, 1233);
INSERT INTO `weborg_job` VALUES (1237, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 0, 4710426047, 4710426037, 3, 31, 0, 437, 1233);
INSERT INTO `weborg_job` VALUES (1238, 5, '20050331', '20050331', '230725', '0900', 0, '', '', 'test', '<P>test debug</P>', 0, 4710426055, 4710426037, 3, 31, 0, 437, 1233);
INSERT INTO `weborg_job` VALUES (1239, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 1, 4710426055, 4710426055, 3, 1, 1, 438, 0);
INSERT INTO `weborg_job` VALUES (1240, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 1, 4710426055, 3, 1, 1, 438, 1239);
INSERT INTO `weborg_job` VALUES (1241, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 4710426017, 4710426055, 3, 1, 0, 438, 1239);
INSERT INTO `weborg_job` VALUES (1242, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 4710426023, 4710426055, 3, 1, 1, 438, 1239);
INSERT INTO `weborg_job` VALUES (1243, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 4710426034, 4710426055, 3, 1, 0, 438, 1239);
INSERT INTO `weborg_job` VALUES (1244, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 4710426047, 4710426055, 3, 1, 0, 438, 1239);
INSERT INTO `weborg_job` VALUES (1245, 1, '20050331', '20050331', '231258', '0900', 0, '', '', 'บันทึกผลการประชุม', 'บันทึกผลการประชุม ', 0, 4710426055, 4710426055, 3, 1, 0, 438, 1239);
INSERT INTO `weborg_job` VALUES (1246, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 1, 4710426055, 4710426055, 3, 1, 1, 432, 0);
INSERT INTO `weborg_job` VALUES (1247, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 1, 4710426055, 3, 1, 0, 432, 1246);
INSERT INTO `weborg_job` VALUES (1248, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 4710426017, 4710426055, 3, 1, 1, 432, 1246);
INSERT INTO `weborg_job` VALUES (1249, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 4710426023, 4710426055, 3, 1, 0, 432, 1246);
INSERT INTO `weborg_job` VALUES (1250, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 4710426034, 4710426055, 3, 1, 0, 432, 1246);
INSERT INTO `weborg_job` VALUES (1251, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 4710426047, 4710426055, 3, 1, 0, 432, 1246);
INSERT INTO `weborg_job` VALUES (1252, 3, '20050331', '20050330', '231425', '0900', 0, '', '', 'แจ้งนัดหมาย', 'แจ้งนัดหมาย ', 0, 4710426055, 4710426055, 3, 1, 0, 432, 1246);
INSERT INTO `weborg_job` VALUES (1253, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 1, 4710426017, 4710426017, 3, 31, 1, 420, 0);
INSERT INTO `weborg_job` VALUES (1254, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 0, 4710426017, 4710426017, 3, 31, 1, 420, 1253);
INSERT INTO `weborg_job` VALUES (1255, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 0, 4710426023, 4710426017, 3, 31, 1, 420, 1253);
INSERT INTO `weborg_job` VALUES (1256, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 0, 4710426034, 4710426017, 3, 31, 0, 420, 1253);
INSERT INTO `weborg_job` VALUES (1257, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 0, 4710426047, 4710426017, 3, 31, 0, 420, 1253);
INSERT INTO `weborg_job` VALUES (1258, 2, '20050331', '20060301', '231457', '0900', 0, '', '', 'meeting on Saturday 10:00AM', '', 0, 4710426055, 4710426017, 3, 31, 0, 420, 1253);
INSERT INTO `weborg_job` VALUES (1259, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 1, 4710426055, 4710426055, 3, 27, 1, 434, 0);
INSERT INTO `weborg_job` VALUES (1260, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426002, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1261, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426004, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1262, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426013, 4710426055, 3, 27, 1, 434, 1259);
INSERT INTO `weborg_job` VALUES (1263, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426017, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1264, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426023, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1265, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426026, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1266, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426031, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1267, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426034, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1268, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426047, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1269, 4, '20050331', '20050321', '231518', '0900', 0, '0800', '0800', 'จองห้องประชุม', 'จองห้องประชุม ', 0, 4710426055, 4710426055, 3, 27, 0, 434, 1259);
INSERT INTO `weborg_job` VALUES (1270, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 1, 4710426055, 4710426055, 3, 27, 1, 435, 0);
INSERT INTO `weborg_job` VALUES (1271, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426002, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1272, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426004, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1273, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426013, 4710426055, 3, 27, 1, 435, 1270);
INSERT INTO `weborg_job` VALUES (1274, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426017, 4710426055, 3, 27, 1, 435, 1270);
INSERT INTO `weborg_job` VALUES (1275, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426023, 4710426055, 3, 27, 1, 435, 1270);
INSERT INTO `weborg_job` VALUES (1276, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426026, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1277, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426031, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1278, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426034, 4710426055, 3, 27, 1, 435, 1270);
INSERT INTO `weborg_job` VALUES (1279, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426047, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1280, 4, '20050331', '20050316', '231619', '0900', 0, '0800', '0800', 'จองห้องประชุม 2', 'จองห้องประชุม 2', 0, 4710426055, 4710426055, 3, 27, 0, 435, 1270);
INSERT INTO `weborg_job` VALUES (1281, 5, '20050331', '20050227', '232854', '0900', 0, '', '', 'calendar', 'ปฏิทินจ้า', 4, 4710426055, 4710426055, 1, 0, 1, 429, 0);
INSERT INTO `weborg_job` VALUES (1282, 5, '20050331', '20050331', '233058', '1200', 0, '', '', 'เที่ยง', 'หิวแล้ว', 4, 4710426055, 4710426055, 1, 0, 1, 427, 0);
INSERT INTO `weborg_job` VALUES (1283, 5, '20050331', '20050227', '233330', '0900', 0, '', '', 'xxxxx', 'xxxxxxxx', 4, 4710426034, 4710426034, 1, 0, 1, 428, 0);
INSERT INTO `weborg_job` VALUES (1284, 5, '20050331', '20050401', '233408', '0900', 0, '', '', 'asdfasdf', 'asdfasdfasdfasdf', 4, 4710426034, 4710426034, 1, 0, 1, 436, 0);
INSERT INTO `weborg_job` VALUES (1285, 5, '20050331', '20050401', '233419', '0900', 0, '', '', 'asdfasdf', 'asdfasdfasdfasdf', 4, 4710426034, 4710426034, 1, 0, 1, 436, 0);
INSERT INTO `weborg_job` VALUES (1287, 5, '20050331', '20050401', '234003', '1000', 0, '', '', 'Present#2', 'asdfasfasfdasfd', 4, 4710426034, 4710426034, 1, 0, 1, 435, 0);
INSERT INTO `weborg_job` VALUES (1288, 5, '20050331', '20050401', '234008', '1400', 0, '', '', 'asdfasfd', 'asfdasdfasf', 4, 4710426034, 4710426034, 1, 0, 1, 431, 0);
INSERT INTO `weborg_job` VALUES (1290, 4, '20050331', '20050322', '234855', '0900', 7, '0800', '0800', 'asdfasfasfa', 'fdasfdasdfasfasf', 1, 4710426034, 4710426034, 1, 4710426023, 1, 436, 0);
INSERT INTO `weborg_job` VALUES (1291, 4, '20050331', '20050322', '234855', '0900', 7, '0800', '0800', 'asdfasfasfa', 'fdasfdasdfasfasf', 0, 4710426023, 4710426034, 1, 4710426023, 1, 436, 1290);
INSERT INTO `weborg_job` VALUES (1292, 4, '20050402', '20050410', '171306', '0900', 7, '0800', '1600', 'Test', 'Test', 1, 4710426055, 4710426055, 1, 4710426017, 1, 424, 0);
INSERT INTO `weborg_job` VALUES (1293, 4, '20050402', '20050410', '171306', '0900', 7, '0800', '1600', 'Test', 'Test', 0, 4710426017, 4710426055, 1, 4710426017, 0, 424, 1292);
INSERT INTO `weborg_job` VALUES (1295, 5, '20050403', '20050406', '174251', '0900', 0, '', '', 'test private', 'hello', 5, 4710426055, 4710426055, 1, 0, 1, 425, 0);
INSERT INTO `weborg_job` VALUES (1296, 5, '20050403', '20050404', '174659', '0900', 0, '', '', 'Test', 'Test', 4, 4710426017, 4710426017, 1, 0, 1, 424, 0);
INSERT INTO `weborg_job` VALUES (1297, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 1, 4710426023, 4710426023, 0, 0, 1, 501, 0);
INSERT INTO `weborg_job` VALUES (1298, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 1, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1299, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426055, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1300, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426056, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1301, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426042, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1302, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426043, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1303, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426044, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1304, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426045, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1305, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426046, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1306, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426047, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1307, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426048, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1308, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426049, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1309, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426050, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1310, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426051, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1311, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426052, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1312, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426053, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1313, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426054, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1314, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426003, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1315, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426004, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1316, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426005, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1317, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426006, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1318, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426007, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1319, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426008, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1320, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426009, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1321, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426010, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1322, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426011, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1323, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426012, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1324, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426013, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1325, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426014, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1326, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426015, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1327, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426016, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1328, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426017, 4710426023, 0, 0, 1, 501, 1297);
INSERT INTO `weborg_job` VALUES (1329, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426018, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1330, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426019, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1331, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426020, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1332, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426021, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1333, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426022, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1334, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426023, 4710426023, 0, 0, 1, 501, 1297);
INSERT INTO `weborg_job` VALUES (1335, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426024, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1336, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426025, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1337, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426026, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1338, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426027, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1339, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426028, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1340, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426029, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1341, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426030, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1342, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426031, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1343, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426032, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1344, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426033, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1345, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426034, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1346, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426035, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1347, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426036, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1348, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426037, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1349, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426038, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1350, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426039, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1351, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426040, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1352, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426041, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1353, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426001, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1354, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 4710426002, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1355, 1, '20050403', '20050406', '214629', '0900', 0, '', '', 'meeting Present Web Programming', '<H1><FONT color=#cc0000><EM>06.04.05 ที่ 13เหรียญนะครับ 09.00 น.</EM></FONT></H1>', 0, 10003, 4710426023, 0, 0, 0, 501, 1297);
INSERT INTO `weborg_job` VALUES (1356, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 1, 4710426055, 4710426055, 0, 0, 1, 438, 0);
INSERT INTO `weborg_job` VALUES (1357, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 1, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1358, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426055, 4710426055, 0, 0, 1, 438, 1356);
INSERT INTO `weborg_job` VALUES (1359, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426056, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1360, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426042, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1361, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426043, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1362, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426044, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1363, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426045, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1364, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426046, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1365, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426047, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1366, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426048, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1367, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426049, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1368, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426050, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1369, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426051, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1370, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426052, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1371, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426053, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1372, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426054, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1373, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426003, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1374, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426004, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1375, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426005, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1376, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426006, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1377, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426007, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1378, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426008, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1379, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426009, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1380, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426010, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1381, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426011, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1382, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426012, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1383, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426013, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1384, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426014, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1385, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426015, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1386, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426016, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1387, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426017, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1388, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426018, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1389, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426019, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1390, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426020, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1391, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426021, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1392, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426022, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1393, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426023, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1394, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426024, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1395, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426025, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1396, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426026, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1397, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426027, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1398, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426028, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1399, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426029, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1400, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426030, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1401, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426031, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1402, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426032, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1403, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426033, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1404, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426034, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1405, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426035, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1406, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426036, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1407, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426037, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1408, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426038, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1409, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426039, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1410, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426040, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1411, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426041, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1412, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426001, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1413, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 4710426002, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1414, 1, '20050403', '20050403', '215118', '0900', 0, '', '', 'send to everyone', 'hello in the night', 0, 10003, 4710426055, 0, 0, 0, 438, 1356);
INSERT INTO `weborg_job` VALUES (1415, 5, '20050403', '20050406', '222252', '0900', 0, '', '', 'Fwd: test private', 'hello', 1, 4710426023, 4710426023, 1, 4710426017, 1, 425, 0);
INSERT INTO `weborg_job` VALUES (1416, 5, '20050403', '20050406', '222252', '0900', 0, '', '', 'Fwd: test private', 'hello', 0, 4710426017, 4710426023, 1, 4710426017, 1, 425, 1415);
INSERT INTO `weborg_job` VALUES (1417, 5, '20050403', '20050404', '225234', '1000', 0, '', '', 'Reply', 'test reply to tao', 1, 4710426023, 4710426023, 1, 4710426055, 1, 437, 0);
INSERT INTO `weborg_job` VALUES (1418, 5, '20050403', '20050404', '225234', '1000', 0, '', '', 'Reply', 'test reply to tao', 0, 4710426055, 4710426023, 1, 4710426055, 0, 437, 1417);
INSERT INTO `weborg_job` VALUES (1420, 5, '20050403', '20050407', '225801', '0900', 0, '', '', 'ree', 'testreee', 5, 4710426023, 4710426023, 1, 0, 1, 428, 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_job_seq`
-- 

DROP TABLE IF EXISTS `weborg_job_seq`;
CREATE TABLE `weborg_job_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=93398 ;

-- 
-- dump ตาราง `weborg_job_seq`
-- 

INSERT INTO `weborg_job_seq` VALUES (1420);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_msg`
-- 

DROP TABLE IF EXISTS `weborg_msg`;
CREATE TABLE `weborg_msg` (
  `msg_id` bigint(20) NOT NULL auto_increment,
  `msg_date` varchar(8) NOT NULL default '',
  `msg_time` varchar(6) NOT NULL default '',
  `user_id` bigint(20) NOT NULL default '0',
  `dep_id` bigint(20) NOT NULL default '0',
  `group_id` bigint(20) NOT NULL default '0',
  `msg_detail` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`msg_id`),
  UNIQUE KEY `msg_id` (`msg_id`),
  KEY `msg_date` (`msg_date`,`msg_time`,`user_id`,`dep_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=163 ;

-- 
-- dump ตาราง `weborg_msg`
-- 

INSERT INTO `weborg_msg` VALUES (18, '20050331', '214031', 4710426023, 0, 0, 'สวัสดีจ้า');
INSERT INTO `weborg_msg` VALUES (19, '20050331', '214234', 4710426047, 0, 0, 'ทราบแล้วจ้า');
INSERT INTO `weborg_msg` VALUES (20, '20050331', '214346', 4710426034, 0, 0, 'สวัสดีครับ');
INSERT INTO `weborg_msg` VALUES (21, '20050331', '214433', 4710426034, 0, 0, 'เครื่องต้อมครับ');
INSERT INTO `weborg_msg` VALUES (22, '20050331', '214503', 4710426034, 0, 0, 'ทดสอบทดสอบ');
INSERT INTO `weborg_msg` VALUES (23, '20050331', '222907', 4710426034, 0, 0, 'ทดสอบ');
INSERT INTO `weborg_msg` VALUES (24, '20050331', '223212', 4710426047, 0, 0, 'hello');
INSERT INTO `weborg_msg` VALUES (25, '20050331', '223239', 4710426047, 0, 0, 'hi');
INSERT INTO `weborg_msg` VALUES (26, '20050331', '223317', 4710426047, 0, 0, 'this is a book');
INSERT INTO `weborg_msg` VALUES (27, '20050331', '223509', 4710426017, 0, 0, 'Present 6.03.48');
INSERT INTO `weborg_msg` VALUES (28, '20050331', '223557', 4710426055, 0, 0, 'test page');
INSERT INTO `weborg_msg` VALUES (29, '20050331', '231714', 4710426017, 0, 0, 'Test chat');
INSERT INTO `weborg_msg` VALUES (30, '20050331', '231724', 4710426055, 0, 0, 'hello');
INSERT INTO `weborg_msg` VALUES (31, '20050331', '231859', 4710426017, 0, 0, 'hello');
INSERT INTO `weborg_msg` VALUES (32, '20050331', '231911', 4710426055, 0, 0, 'abc');
INSERT INTO `weborg_msg` VALUES (33, '20050331', '232127', 4710426017, 0, 0, 'hello');
INSERT INTO `weborg_msg` VALUES (34, '20050331', '232142', 4710426017, 0, 0, 'asfasfasfdasfd');
INSERT INTO `weborg_msg` VALUES (35, '20050331', '232217', 4710426055, 0, 0, 'error?');
INSERT INTO `weborg_msg` VALUES (36, '20050331', '232304', 4710426017, 0, 0, 'ไม่ error แล้ว');
INSERT INTO `weborg_msg` VALUES (37, '20050402', '190001', 4710426013, 0, 0, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz');
INSERT INTO `weborg_msg` VALUES (38, '20050402', '190352', 4710426013, 0, 0, 'asdfasdfasdf');
INSERT INTO `weborg_msg` VALUES (39, '20050402', '205053', 4710426013, 0, 0, 'asdfasdfadfadsf');
INSERT INTO `weborg_msg` VALUES (40, '20050402', '205055', 4710426013, 0, 0, 'asdfasdfadfadsf');
INSERT INTO `weborg_msg` VALUES (41, '20050402', '205058', 4710426013, 0, 0, 'sdfasdfasdfasfasdf');
INSERT INTO `weborg_msg` VALUES (42, '20050402', '205059', 4710426013, 0, 0, 'asdfasdfasdf');
INSERT INTO `weborg_msg` VALUES (43, '20050402', '205100', 4710426013, 0, 0, 'asdfasdfasdf');
INSERT INTO `weborg_msg` VALUES (44, '20050402', '205137', 4710426013, 0, 0, 'สวัสดี');
INSERT INTO `weborg_msg` VALUES (45, '20050402', '205141', 4710426013, 0, 0, 'เต่า');
INSERT INTO `weborg_msg` VALUES (46, '20050402', '205148', 4710426055, 0, 0, 'send by enter');
INSERT INTO `weborg_msg` VALUES (47, '20050402', '205150', 4710426013, 0, 0, 'เต่าสุดหล่อ');
INSERT INTO `weborg_msg` VALUES (48, '20050402', '205200', 4710426013, 0, 0, 'นี่จิ๊บเองนะ');
INSERT INTO `weborg_msg` VALUES (49, '20050402', '205209', 4710426013, 0, 0, 'เต่าน่ารักที่สุด');
INSERT INTO `weborg_msg` VALUES (50, '20050402', '205219', 4710426055, 0, 0, 'นี่จริงอ่ะ');
INSERT INTO `weborg_msg` VALUES (51, '20050402', '205235', 4710426013, 0, 0, 'จิงจิ๊');
INSERT INTO `weborg_msg` VALUES (52, '20050402', '205237', 4710426055, 0, 0, 'จิงเหรอ');
INSERT INTO `weborg_msg` VALUES (53, '20050402', '205302', 4710426013, 0, 0, 'บ้านอยู่ไหน');
INSERT INTO `weborg_msg` VALUES (54, '20050402', '205316', 4710426055, 0, 0, 'อยู่แถวนี้ล่ะ');
INSERT INTO `weborg_msg` VALUES (55, '20050402', '205602', 4710426055, 0, 0, 'ไม่พูดมาก....ขอเบอร์หน่อยดิ');
INSERT INTO `weborg_msg` VALUES (56, '20050402', '210006', 4710426013, 0, 0, 'นี่...มีลีลาหน่อยดิ');
INSERT INTO `weborg_msg` VALUES (57, '20050402', '210011', 4710426004, 0, 0, 'หวัดดี ชาวโลก');
INSERT INTO `weborg_msg` VALUES (58, '20050402', '210038', 4710426013, 0, 0, 'เป็นต่างดาวเหรอ');
INSERT INTO `weborg_msg` VALUES (59, '20050402', '210058', 4710426004, 0, 0, 'ยู้ฮู เต่ากะจิ๊');
INSERT INTO `weborg_msg` VALUES (60, '20050402', '210209', 4710426013, 0, 0, 'นี่...งานน่ะเสร็จแล้วเหรอ');
INSERT INTO `weborg_msg` VALUES (61, '20050402', '210223', 4710426013, 0, 0, 'มันนักใช่มะ');
INSERT INTO `weborg_msg` VALUES (62, '20050402', '210237', 4710426004, 0, 0, 'ยังเลย โอ้เศร้าจัย');
INSERT INTO `weborg_msg` VALUES (63, '20050402', '210256', 4710426004, 0, 0, 'ตาอ้วนยังนังกินข้วอยู่เลย');
INSERT INTO `weborg_msg` VALUES (64, '20050402', '210307', 4710426013, 0, 0, 'แก้ง่วงอ่ะดิ');
INSERT INTO `weborg_msg` VALUES (65, '20050402', '210322', 4710426013, 0, 0, 'ไม่ไปช่วยกินน่ะ');
INSERT INTO `weborg_msg` VALUES (66, '20050402', '210324', 4710426004, 0, 0, 'อาจรย์ขา หุหุ');
INSERT INTO `weborg_msg` VALUES (67, '20050402', '210359', 4710426013, 0, 0, 'ไงคะลูกศิษย์แขน');
INSERT INTO `weborg_msg` VALUES (68, '20050402', '210404', 4710426004, 0, 0, 'ดูพี่เจเด่ะ ดุยังกะ...');
INSERT INTO `weborg_msg` VALUES (69, '20050402', '210426', 4710426013, 0, 0, 'แกถึงช่วงน่ะ');
INSERT INTO `weborg_msg` VALUES (70, '20050402', '210515', 4710426004, 0, 0, 'มันถามอีกแล้ว');
INSERT INTO `weborg_msg` VALUES (71, '20050402', '210544', 4710426004, 0, 0, 'บอกกันเด่ะ คำถามละ 5 บาท');
INSERT INTO `weborg_msg` VALUES (72, '20050402', '210545', 4710426013, 0, 0, 'อ้าวไม่ดีเหรองานกลุ่มนะ');
INSERT INTO `weborg_msg` VALUES (73, '20050402', '210610', 4710426004, 0, 0, 'ดีดี แต่เป๋าแบน แฟนตรึม คริคริ');
INSERT INTO `weborg_msg` VALUES (74, '20050402', '210613', 4710426013, 0, 0, 'ก็ไม่ใช่คนจ่ายนี่');
INSERT INTO `weborg_msg` VALUES (75, '20050402', '210643', 4710426013, 0, 0, 'ถามได้ไม่จำกัด...');
INSERT INTO `weborg_msg` VALUES (76, '20050402', '210724', 4710426013, 0, 0, 'ไม่ได้ทะลึ่ง...');
INSERT INTO `weborg_msg` VALUES (77, '20050402', '210727', 4710426004, 0, 0, 'ทำให้เลยดีก่า จได้ไม่ต้องถามบ่อย');
INSERT INTO `weborg_msg` VALUES (78, '20050402', '210731', 4710426013, 0, 0, 'ก็อ้อเมียพี่');
INSERT INTO `weborg_msg` VALUES (79, '20050402', '210743', 4710426004, 0, 0, 'เบื่อไอ้แห้งตรงหน้าจังเลย');
INSERT INTO `weborg_msg` VALUES (80, '20050402', '210806', 4710426013, 0, 0, 'อ้าวเบื่อแล้วหรือ');
INSERT INTO `weborg_msg` VALUES (81, '20050402', '210816', 4710426004, 0, 0, 'ว๊าย นี่น้องอ้อไม่ใช่พี่อ้อ');
INSERT INTO `weborg_msg` VALUES (82, '20050402', '210818', 4710426013, 0, 0, 'ต้องอยู่ด้วยไปตลอดเลยนี่');
INSERT INTO `weborg_msg` VALUES (83, '20050402', '210903', 4710426004, 0, 0, 'อยู่กะหน้าผีใส่แว่นน่ะเหรอ 555  ;-)');
INSERT INTO `weborg_msg` VALUES (84, '20050402', '210942', 4710426004, 0, 0, 'ลุงมาแล้น');
INSERT INTO `weborg_msg` VALUES (85, '20050402', '210942', 4710426013, 0, 0, 'อ้าว..ก็เลือกเองนี่หว่า');
INSERT INTO `weborg_msg` VALUES (86, '20050402', '210947', 4710426004, 0, 0, 'แอบดูรัยวะ');
INSERT INTO `weborg_msg` VALUES (87, '20050402', '210954', 4710426013, 0, 0, 'ไป ไปทำงานเลย');
INSERT INTO `weborg_msg` VALUES (88, '20050402', '210955', 4710426004, 0, 0, 'ไอ้อ้วน');
INSERT INTO `weborg_msg` VALUES (89, '20050402', '211033', 4710426004, 0, 0, 'เสียอีก 5 บาทแล้ว');
INSERT INTO `weborg_msg` VALUES (90, '20050402', '211044', 4710426013, 0, 0, 'เห็นป่าว...เอนกประสงค์');
INSERT INTO `weborg_msg` VALUES (91, '20050402', '211049', 4710426004, 0, 0, 'มันเอาใหญ่เลย');
INSERT INTO `weborg_msg` VALUES (92, '20050402', '211057', 4710426004, 0, 0, 'นั่นเปิดหนังสือขู่แล้ว');
INSERT INTO `weborg_msg` VALUES (93, '20050402', '211100', 4710426013, 0, 0, 'ได้หมดทั้ง');
INSERT INTO `weborg_msg` VALUES (94, '20050402', '211109', 4710426013, 0, 0, 'php jsp');
INSERT INTO `weborg_msg` VALUES (95, '20050402', '211123', 4710426004, 0, 0, 'นั่นมันามทำงัยแล้ว อิอิ  เข้าทาง เราล่ะ พี่ต้อมเสร็จแน่');
INSERT INTO `weborg_msg` VALUES (96, '20050402', '211137', 4710426013, 0, 0, 'javascript ด้วยนะเอ้า');
INSERT INTO `weborg_msg` VALUES (97, '20050402', '211200', 4710426004, 0, 0, 'ปวดเยี่ยวอ่ะ');
INSERT INTO `weborg_msg` VALUES (98, '20050402', '211203', 4710426004, 0, 0, 'ไปก่อนะ');
INSERT INTO `weborg_msg` VALUES (99, '20050402', '211216', 4710426004, 0, 0, 'อาจารย์ขา');
INSERT INTO `weborg_msg` VALUES (100, '20050402', '211220', 4710426013, 0, 0, 'ก็ไปแจ้งอำเภอก่อนดิ');
INSERT INTO `weborg_msg` VALUES (101, '20050402', '211229', 4710426004, 0, 0, '(^_-)');
INSERT INTO `weborg_msg` VALUES (102, '20050402', '211235', 4710426013, 0, 0, 'ต้องให้พาไปมะ');
INSERT INTO `weborg_msg` VALUES (103, '20050402', '211249', 4710426004, 0, 0, 'นั่น ปรากฎการณ์ใหม่ จิ๊บคิดตังเลย');
INSERT INTO `weborg_msg` VALUES (104, '20050402', '211255', 4710426013, 0, 0, 'แค่นี้ก็ไปไม่ถูกเหรอ');
INSERT INTO `weborg_msg` VALUES (105, '20050402', '211305', 4710426013, 0, 0, 'หรือว่าจะฝาก');
INSERT INTO `weborg_msg` VALUES (106, '20050402', '211318', 4710426004, 0, 0, 'ไอ้จิ๊บตลกบริโภค');
INSERT INTO `weborg_msg` VALUES (107, '20050402', '211336', 4710426004, 0, 0, 'ดูมัน');
INSERT INTO `weborg_msg` VALUES (108, '20050402', '211344', 4710426013, 0, 0, 'ฉลาดไง');
INSERT INTO `weborg_msg` VALUES (109, '20050402', '211347', 4710426004, 0, 0, 'ได้ทีใหญ่เลย');
INSERT INTO `weborg_msg` VALUES (110, '20050402', '211355', 4710426013, 0, 0, 'พี่เขาใจดี');
INSERT INTO `weborg_msg` VALUES (111, '20050402', '211406', 4710426004, 0, 0, 'เฮ้ย ไม่ไหวแล้ว  โอย  มายก็อต');
INSERT INTO `weborg_msg` VALUES (112, '20050402', '220350', 4710426055, 0, 1, 'test group admin');
INSERT INTO `weborg_msg` VALUES (113, '20050402', '220521', 4710426013, 0, 0, 'พี่เขาใจดี');
INSERT INTO `weborg_msg` VALUES (114, '20050402', '220830', 4710426013, 0, 0, 'พี่เขาใจดี');
INSERT INTO `weborg_msg` VALUES (115, '20050402', '224035', 4710426055, 0, 0, 'test group admin');
INSERT INTO `weborg_msg` VALUES (116, '20050402', '224334', 4710426055, 0, 30, 'send to grp php4');
INSERT INTO `weborg_msg` VALUES (117, '20050402', '224853', 4710426055, 0, 30, 'send to grp php4');
INSERT INTO `weborg_msg` VALUES (118, '20050402', '225028', 4710426055, 0, 30, 'send to grp php4');
INSERT INTO `weborg_msg` VALUES (119, '20050402', '230240', 4710426055, 0, 30, 'send to grp php4');
INSERT INTO `weborg_msg` VALUES (130, '20050402', '232402', 4710426055, 22, 0, 'message for ism7 only');
INSERT INTO `weborg_msg` VALUES (131, '20050402', '232430', 4710426055, 0, 27, 'message for Javascript report only');
INSERT INTO `weborg_msg` VALUES (132, '20050402', '232720', 4710426013, 0, 1, 'test');
INSERT INTO `weborg_msg` VALUES (133, '20050403', '160332', 4710426013, 0, 27, 'Test');
INSERT INTO `weborg_msg` VALUES (134, '20050403', '162726', 1, 0, 1, 'Test send to  admin');
INSERT INTO `weborg_msg` VALUES (135, '20050403', '162755', 1, 0, 1, 'Test send to JSP');
INSERT INTO `weborg_msg` VALUES (136, '20050403', '163203', 1, 0, 26, 'Test send to JSP');
INSERT INTO `weborg_msg` VALUES (137, '20050403', '172327', 4710426027, 0, 0, 'Test send to All');
INSERT INTO `weborg_msg` VALUES (138, '20050403', '172352', 4710426027, 22, 0, 'Test send toISM7');
INSERT INTO `weborg_msg` VALUES (139, '20050403', '172413', 4710426027, 0, 26, 'Test send to JSP');
INSERT INTO `weborg_msg` VALUES (140, '20050403', '172437', 4710426027, 0, 1, 'Test send to Admin');
INSERT INTO `weborg_msg` VALUES (141, '20050403', '172825', 4710426027, 0, 28, 'send to PHP1');
INSERT INTO `weborg_msg` VALUES (142, '20050403', '175639', 4710426017, 0, 28, 'Test send to PHP1');
INSERT INTO `weborg_msg` VALUES (143, '20050403', '175655', 4710426027, 0, 31, 'send to php3 na');
INSERT INTO `weborg_msg` VALUES (144, '20050403', '175735', 4710426017, 0, 26, 'Send to pla');
INSERT INTO `weborg_msg` VALUES (145, '20050403', '175742', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (146, '20050403', '180717', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (147, '20050403', '180831', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (148, '20050403', '180858', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (149, '20050403', '181027', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (150, '20050403', '181130', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (151, '20050403', '181326', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (152, '20050403', '181538', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (153, '20050403', '181708', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (154, '20050403', '181736', 4710426017, 0, 26, 'Send to pla');
INSERT INTO `weborg_msg` VALUES (155, '20050403', '181859', 4710426017, 0, 26, 'Send to pla');
INSERT INTO `weborg_msg` VALUES (156, '20050403', '181909', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (157, '20050403', '182047', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (158, '20050403', '182146', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (159, '20050403', '182308', 4710426027, 0, 34, 'test sent to Servlet3');
INSERT INTO `weborg_msg` VALUES (160, '20050403', '182324', 4710426017, 0, 26, 'Send to pla');
INSERT INTO `weborg_msg` VALUES (161, '20050403', '182659', 4710426017, 0, 26, 'Send to pla');
INSERT INTO `weborg_msg` VALUES (162, '20050403', '185404', 4710426017, 0, 0, 'sent to group  PHP');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_msg_seq`
-- 

DROP TABLE IF EXISTS `weborg_msg_seq`;
CREATE TABLE `weborg_msg_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=163 ;

-- 
-- dump ตาราง `weborg_msg_seq`
-- 

INSERT INTO `weborg_msg_seq` VALUES (162);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_room`
-- 

DROP TABLE IF EXISTS `weborg_room`;
CREATE TABLE `weborg_room` (
  `room_id` bigint(20) NOT NULL auto_increment,
  `room_name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=12 ;

-- 
-- dump ตาราง `weborg_room`
-- 

INSERT INTO `weborg_room` VALUES (7, 'ห้อง 2/203');
INSERT INTO `weborg_room` VALUES (8, 'ห้องสมุด');
INSERT INTO `weborg_room` VALUES (9, 'ห้องประชุมจิรบุญมาก');
INSERT INTO `weborg_room` VALUES (10, 'ห้อง 5/203');
INSERT INTO `weborg_room` VALUES (11, 'ห้องเอนกประสงค์ MBA');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_room_seq`
-- 

DROP TABLE IF EXISTS `weborg_room_seq`;
CREATE TABLE `weborg_room_seq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=12 ;

-- 
-- dump ตาราง `weborg_room_seq`
-- 

INSERT INTO `weborg_room_seq` VALUES (11);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_user`
-- 

DROP TABLE IF EXISTS `weborg_user`;
CREATE TABLE `weborg_user` (
  `user_id` bigint(20) NOT NULL auto_increment,
  `login` varchar(20) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `level` int(11) NOT NULL default '0',
  `title` varchar(20) NOT NULL default '',
  `user_name` varchar(50) NOT NULL default '',
  `user_surname` varchar(50) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `dep_id` bigint(20) NOT NULL default '0',
  `login_status` tinyint(4) NOT NULL default '0',
  `usage_space` bigint(20) NOT NULL default '0',
  `user_status` tinyint(4) NOT NULL default '1',
  `student_id` varchar(10) NOT NULL default '',
  `nickname` varchar(20) NOT NULL default '',
  `birthdate` varchar(8) NOT NULL default '',
  `home_address` varchar(100) NOT NULL default '',
  `company_name` varchar(100) NOT NULL default '',
  `position` varchar(50) NOT NULL default '',
  KEY `user_id` (`user_id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=4710426058 ;

-- 
-- dump ตาราง `weborg_user`
-- 

INSERT INTO `weborg_user` VALUES (1, 'admin', 'admin', 1, '', 'ผู้ดูแลระบบ', '', '', '', '', 0, 0, 5816, 1, '1', '', '', '', '', '');
INSERT INTO `weborg_user` VALUES (4710426055, 'tepprawo', '123', 0, 'นาย', 'เทพประทีป', 'ว่องวัฒน์อนันต์', '', '09-1756759', 'tepprawo@yipintsoi.com', 22, 0, 14007, 1, '4710426055', 'เต่า', '19790308', 'คลองเตย', 'กรมศุลกากร', 'System Admin');
INSERT INTO `weborg_user` VALUES (4710426056, 'matheera', '123', 0, 'น.ส.', 'มทิรา', 'ถาวรศรี', '', '', 'matheera@yahoo.co.uk', 22, 0, 1799, 1, '4710426056', 'กุ้ง', '19560101', '', '', '');
INSERT INTO `weborg_user` VALUES (4710426042, 'malinee_dol', '123', 0, 'นาง', 'มาลินี', 'วินิจสร', '', '06-1570242', 'malinee_dol@hotmail.com', 22, 0, 1799, 1, '4710426042', 'มา', '19740323', 'พระนั่งเกล้า', 'ศูนย์คอมพิวเตอร์ กรมที่ดิน', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426043, 'chaiwut-ism', '123', 0, 'นาย', 'ชัยวุฒิ', 'พุฒพิสุทธิ์', '', '09-1578278', 'chaiwut-ism@dol.go.th', 22, 0, 1799, 1, '4710426043', 'โจ', '19711226', 'วงศ์สว่าง', 'ศูนย์คอมพิวเตอร์ กรมที่ดิน', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426044, 'mrwoon0819', '123', 0, 'นาย', 'ธนสิทธิ์', 'มูลวิริยกิจ', '', '06-3264053', 'mrwoon0819@yahoo.com', 22, 0, 1799, 1, '4710426044', 'หวุ่น', '19750819', 'อุดมสุข', 'บริษัทเซนต์-โกเบน เวเบอร์ จำกัด (SGW)', 'System Admin / Analyst');
INSERT INTO `weborg_user` VALUES (4710426045, 'suwalakc', '123', 0, 'น.ส.', 'สุวลักษณ์', 'ฉิมวงศ์', '', '01-9355355', 'suwalakc@ais.co.th', 22, 0, 1799, 1, '4710426045', 'เปิ้ล', '19780520', 'ลาดพร้าว', 'AIS', 'Analyst');
INSERT INTO `weborg_user` VALUES (4710426046, 'nongnuta', '123', 0, 'น.ส.', 'นงนุช', 'อารีประยูรกิจ', '', '09-2226263', 'nongnuta@ais.co.th', 22, 0, 1799, 1, '4710426046', 'นุช', '19770930', 'พุทธมณฑล', 'AIS', 'System Design');
INSERT INTO `weborg_user` VALUES (4710426047, 'iiple', '123', 0, 'น.ส.', 'สุวิสา', 'สุวรรณทวีกุล', '', '06-8889767', 'iiple@yahoo.com', 22, 0, 8827, 1, '4710426047', 'เปิ้ล', '19760809', 'สุขาภิบาล 3', 'บรรษัทบริหารสินทรัพย์ สถาบันการเงิน (AMC)', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426048, 'ake', '123', 0, 'นาย', 'เอก', 'บุญญปุรานนท์', '', '01-7529567', 'ake@tkkgroup.com', 22, 0, 1799, 1, '4710426048', 'เอก', '19780726', 'ดินแดง', 'TKK', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426049, 'supawan', '123', 0, 'น.ส.', 'ศุภวรรณ', 'หอมทรัพย์', '', '01-3103482', 'supawan@softcontrol.net', 22, 0, 1799, 1, '4710426049', 'แนน', '19790101', 'บางจาก', 'Intercontinental', 'Analyst / Programmer');
INSERT INTO `weborg_user` VALUES (4710426050, 'duagkamon.ch', '123', 0, 'น.ส.', 'ดวงกมล', 'จีนเกิด', '', '06-6695220', 'duagkamon.ch@rd.go.th', 22, 0, 1799, 1, '4710426050', 'นู๋เล็ก', '19771121', 'รามคำแหง', 'กรมสรรพากร / หน้ารามฯ', '');
INSERT INTO `weborg_user` VALUES (4710426051, 'credorw', '123', 0, 'นาย', 'พงศ์พันธุ์', 'จิรพรจรัส', '', '09-3122086', 'credorw@yahoo.com', 22, 0, 1799, 1, '4710426051', 'พงศ์', '19750304', 'อ่อนนุช', 'Frontware / ลาดพร้าว', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426052, 'mhoodang', '123', 0, 'น.ส.', 'บงกช', 'บงกชเกตุสกุล', '', '01-6134377', 'mhoodang@yahoo.com', 22, 0, 1799, 1, '4710426052', 'หน่อง', '19760619', 'บางกะปิ', 'Summit Auto Seats', 'BASIS');
INSERT INTO `weborg_user` VALUES (4710426053, 'praseart', '123', 0, 'นาย', 'ประเสริฐ', 'กึ่งพุทธพงศ์', '', '01-4973638', 'praseart@scb.co.th', 22, 0, 1799, 1, '4710426053', 'อู', '19700803', 'จรัญฯ 13', 'ธนาคารไทยพาณิชย์', 'สินเชื่อ');
INSERT INTO `weborg_user` VALUES (4710426054, 'pronthep_00', '123', 0, 'นาย', 'พรเทพ', 'กาญจนวรุตม์', '', '06-7555449', 'pronthep_00@hotmail.com', 22, 0, 1799, 1, '4710426054', 'เทพ', '19741025', 'ปทุมวัน', 'บริษัทเพนนีฟูล', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426003, 'pongsakj', '123', 0, 'นาย', 'พงศ์ศักดิ์', 'จ้อยชู', '', '09-1298744', 'pongsakj@homepro.co.th', 22, 0, 1799, 1, '4710426003', 'กบ', '19790718', 'ลาดกระบัง', 'Home Product Center', 'Webmaster');
INSERT INTO `weborg_user` VALUES (4710426004, 'aorarmy', '123', 0, 'น.ส.', 'พัชรินทร์', 'วิมลมาลา', '', '09-4420553', 'aorarmy@hotmail.com', 22, 0, 2668, 1, '4710426004', 'อ้อ', '19760923', 'งามวงศ์วาน', 'สำนักงาน ก.ค. กระทรวงศึกษาธิการ', '');
INSERT INTO `weborg_user` VALUES (4710426005, 'jirapa', '123', 0, 'น.ส.', 'จิราภา', 'นิรมลไพสิฐ', '', '01-5654667', 'jirapa@thaiadmen.com', 22, 0, 1799, 1, '4710426005', 'เอ', '19730403', 'บางมด', 'Freelance Programmer', 'Application & Web Program');
INSERT INTO `weborg_user` VALUES (4710426006, 'chainsv', '123', 0, 'นาย', 'ราเชนท์', 'วงศ์โท', '', '06-6140057', 'chainsv@hotmail.com', 22, 0, 1799, 1, '4710426006', 'หนุ่ย', '19770721', 'ลาดพร้าว', 'TEAM', '');
INSERT INTO `weborg_user` VALUES (4710426007, 'dksornkaew', '123', 0, 'น.ส.', 'ร้อยตรีดุสิต', 'เกษรแก้ว', '', '09-1642621', 'dksornkaew@yahoo.com', 22, 0, 1799, 1, '4710426007', 'ตั๋น', '19681211', 'บ้านพักของกรมฯ', 'กรมยุทธโยธา ทบ.', 'วิศวกร ประจำกองทัพบก');
INSERT INTO `weborg_user` VALUES (4710426008, 'ptuyyoungyern', '123', 0, 'น.ส.', 'นางสุรีพร', 'พรโสภณวิชญ์', '', '09-5333912', 'ptuyyoungyern@yahoo.com', 22, 0, 1799, 1, '4710426008', 'ปู', '19700418', 'สะพานใหม่', 'กรมที่ดิน', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426009, 'kung_ism7', '123', 0, 'น.ส.', 'นพรัตน์', 'บุญสุภาพ', '', '09-1302590', 'kung_ism7@yahoo.com', 22, 0, 1799, 1, '4710426009', 'กุ้ง', '19730901', 'ปากเกร็ด', 'กรมที่ดิน', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426010, 'pipat', '123', 0, 'นาย', 'พิพัฒน์', 'พงศ์ไพจิตร', '', '01-6609900', 'pipat@glo.or.th', 22, 0, 1799, 1, '4710426010', 'โต้ง', '19690702', 'รัชโยธิน', 'สนง.สลากกินแบ่งรัฐบาล', 'Network');
INSERT INTO `weborg_user` VALUES (4710426011, 'air', '123', 0, 'น.ส.', 'บัวทิพย์', 'จันทร์จริยากุล', '', '01-5505076', 'air@glo.or.th', 22, 0, 1799, 1, '4710426011', 'แอร์', '19730711', 'นนทบุรี', 'สนง.สลากกินแบ่งรัฐบาล', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426012, 'pook_ism7', '123', 0, 'นาย', 'ภัทรกร', 'เหล่าพาณิชกร', '', '06-7333129', 'pook_ism7@yahoo.com', 22, 0, 1799, 1, '4710426012', 'ปุก', '19760310', 'ปากน้ำ', 'COT', 'GIS');
INSERT INTO `weborg_user` VALUES (4710426013, 'benj_tt', '123', 0, 'น.ส.', 'เบญจมาส', 'ทิพย์พิทักษ์', '', '01-4007797', 'benj_tt@yahoo.com', 22, 0, 2668, 1, '4710426013', 'จิ๊บ', '19790629', 'ลาดพร้าว', 'Tesco-Lotus', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426014, 'nattkrit', '123', 0, 'นาย', 'ณัทกฤช', 'เจริญตาม', '', '09-1188029', 'nattkrit@pccth.com', 22, 0, 1799, 1, '4710426014', 'เจ', '19710201', 'นิมิตใหม่ (KC)', 'Professional Computer Co.,Ltd. (PCC)', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426015, 'jarndee', '123', 0, 'นาย', 'จารย์ดี', 'จันทโรทัย', '', '01-1738466', 'jarndee@hotmail.com', 22, 0, 1799, 1, '4710426015', 'ขาว', '19740602', 'รามอินทรา กม.8', 'บริษัทโสมาภา', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426016, 'ninekao_ism7', '123', 0, 'นาย', 'พรศักดิ์', 'เลิศศรีนภาพร', '', '01-9049720', 'ninekao_ism7@yahoo.com', 22, 0, 1799, 1, '4710426016', 'เก้า', '19721221', 'บางนา', 'บริษัทดอกบัวคู่', 'Support & Admin');
INSERT INTO `weborg_user` VALUES (4710426017, 'keerati', '123', 0, 'นาย', 'กีรติ', 'ชัยศิริ', '', '09-7707713', 'keerati@sisea.co.th', 22, 0, 1243444, 1, '4710426017', 'กี', '19790321', 'มีนบุรี', 'sisea', '');
INSERT INTO `weborg_user` VALUES (4710426018, 'lurtrat.r', '123', 0, 'นาย', 'เลิศรัตน์', 'รุ่งอัญมณี', '', '09-7944834', 'lurtrat.r@cdg.co.th', 22, 0, 1799, 1, '4710426018', 'โอ', '19760921', 'ประชานุกูล', 'CDGS', 'System Developer');
INSERT INTO `weborg_user` VALUES (4710426019, 'suriyak5', '123', 0, 'นาย', 'สุริยา', 'คงปลอด', '', '01-5150309', 'suriyak5@ais.co.th', 22, 0, 1799, 1, '4710426019', 'เท่ง', '19730506', 'ซ.นวลจันทร์', 'บริษัทพันธกิจ', 'Porgrammer');
INSERT INTO `weborg_user` VALUES (4710426020, 'casanoteva', '123', 0, 'นาย', 'สิทธินาถ', 'พลจันทร', '', '09-8862552', 'casanoteva@yahoo.com', 22, 0, 1799, 1, '4710426020', 'โน้ต', '19780927', 'บางกะปิ', 'Hanson Concrete', 'System Support / Asst. Admin');
INSERT INTO `weborg_user` VALUES (4710426021, 'aoo61', '123', 0, 'น.ส.', 'นิสารัตน์', 'ไกรพลรักษ์', '', '01-3402117', 'aoo61@yahoo.com', 22, 0, 1799, 1, '4710426021', 'โอ๋', '19770907', 'สารทร', 'Soft Square', 'Software Developer');
INSERT INTO `weborg_user` VALUES (4710426022, 'jenwit.j', '123', 0, 'นาย', 'เจนวิทย์', 'แจงบำรุง', '', '01-4895684', 'jenwit.j@egat.co.th', 22, 0, 1799, 1, '4710426022', 'บอล', '19780523', 'พรานนก', 'กฟผ.', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426023, 'celerity_kk', '123', 0, 'นาย', 'กิตติพล', 'เพิ่มสินทวี', '', '01-8453239', 'celerity_kk@yahoo.com', 22, 0, 11054, 1, '4710426023', 'อุ้ม', '19661109', 'ดอนเมือง', 'BAAC', '');
INSERT INTO `weborg_user` VALUES (4710426024, 'amornthep_son', '123', 0, 'นาย', 'อมรเทพ', 'ส่งแสง', '', '06-5654227', 'amornthep_son@freewillsolutions.com', 22, 0, 1799, 1, '4710426024', 'โอ้ค', '19770731', 'ถนนจันทน์', 'Frewillsolutions', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426025, 's_anumas2004', '123', 0, 'น.ส.', 'อนุมาศ', 'แสงสว่าง', '', '09-1320950', 's_anumas2004@yahoo.com', 22, 0, 1799, 1, '4710426025', 'ปิ๋ม', '19740505', 'รามคำแหง', 'Advanced Comm. Co.,Ltd.', 'System Admin');
INSERT INTO `weborg_user` VALUES (4710426026, 'kuengs', '123', 0, 'นาย', 'เอกพจน์', 'วณิชชานัย', '', '01-6395671', 'kuengs@ego.co.th', 22, 0, 2668, 1, '4710426026', 'กึ้ง', '19691030', 'สาธุประดิษฐ์', 'บง.ธนชาติ', 'Project Leader (รักษาการ)');
INSERT INTO `weborg_user` VALUES (4710426027, 'pla', '123', 0, 'น.ส.', 'พวงผกา', 'อดิศัยเดชรินทร์', '', '06-3042633', 'pla@spd.diethelm.co.th', 22, 0, 1799, 1, '4710426027', 'ปลา', '19730315', 'รามคำแหง', 'Diethelm & Co.,Ltd.', 'Senior Programmer');
INSERT INTO `weborg_user` VALUES (4710426028, 'kritsada_ism7', '123', 0, 'นาย', 'กฤษฎา', 'ถิ่นทับปุด', '', '09-2064028', 'kritsada_ism7@yahoo.com', 22, 0, 1799, 1, '4710426028', 'ต่อ', '19700826', 'สุทธิสาร', 'สนง.ปรมาณูเพื่อสันติ', 'Network');
INSERT INTO `weborg_user` VALUES (4710426029, 'surarak_pro', '123', 0, 'น.ส.', 'สุรารักษ์', 'ประสงค์', '', '01-7517795', 'surarak_pro@truecorp.co.th', 22, 0, 1799, 1, '4710426029', 'โอ๋', '19771027', 'สวนหลวง ร.9', 'TRUE', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426030, 'siveeraporn', '123', 0, 'น.ส.', 'วีราภรณ์', 'ซิดดู', '', '01-7350072', 'siveeraporn@central.co.th', 22, 0, 1799, 1, '4710426030', 'ก้อย', '19790727', 'กม.8', 'Robinson / รัชดา', 'Oracl Application / Support');
INSERT INTO `weborg_user` VALUES (4710426031, 'small_lekja', '123', 0, 'น.ส.', 'จุไรรัตน์', 'อยู่ไพศาล', '', '01-8129354', 'small_lekja@yahoo.com', 22, 0, 2668, 1, '4710426031', 'เล็ก', '19720605', 'รังสิต', 'ธนาคารทหารไทย', 'IT AUDIT');
INSERT INTO `weborg_user` VALUES (4710426032, 'akeorn', '123', 0, 'น.ส.', 'เอกอร', 'พุ่มพระคุณ', '', '01-8893181', 'akeorn@shinee.com', 22, 0, 1799, 1, '4710426032', 'เก๋', '19751222', 'ลาดพร้าว', 'SHINEE.COM', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426033, 'p_potj', '123', 0, 'น.ส.', 'พจนา', 'พานิชนิตินนท์', '', '01-8374260', 'p_potj@pea.co.th', 22, 0, 1799, 1, '4710426033', 'หญิง', '19740205', 'สะพานใหม่', 'กฟภ.', 'Programmer');
INSERT INTO `weborg_user` VALUES (4710426034, 'kasamsun_s', '123', 0, 'นาย', 'เกษมสันต์', 'สุวรรณจิตร์', '', '01-6412677', 'kasamsun_s@yahoo.com', 22, 0, 11429, 1, '4710426034', 'ต้อม', '19730622', 'รามอินทรา กม.5', 'Siebiz', 'System Analyst & Programmer');
INSERT INTO `weborg_user` VALUES (4710426035, 'paweesa_boo', '123', 0, 'น.ส.', 'ปวีสา', 'บุญเง็ก', '', '01-8083889', 'paweesa_boo@truecorp.co.th', 22, 0, 1799, 1, '4710426035', 'เอ', '19780603', 'ปากน้ำ / รัชดาภิเษก', 'TRUE', 'System Analyst');
INSERT INTO `weborg_user` VALUES (4710426036, 'nisagems', '123', 0, 'นาง', 'เอื้อมพร', 'ภาคพิเศษ', '', '01-6321830', 'nisagems@loxinfo.co.th', 22, 0, 1799, 1, '4710426036', 'เอ๋', '19690818', 'มีนบุรี', 'Gems Collection International Co., Ltd.', 'Admin');
INSERT INTO `weborg_user` VALUES (4710426037, 'koy1967', '123', 0, 'น.ส.', 'จิรวรรณ', 'โกยโภไคสวรรค์', '', '09-3192292', 'koy1967@yahoo.com', 22, 0, 2660, 1, '4710426037', 'จิ', '19670815', 'มีนบุรี', 'บริษัท ทศท คอร์ปอเรชั่น จำกัด (มหาชน)', 'System Analyst & Programmer');
INSERT INTO `weborg_user` VALUES (4710426038, 'p_thanatorn', '123', 0, 'นาย', 'ธนาธร', 'กลั่นบุศย์', '', '09-1350217', 'p_thanatorn@yahoo.com', 22, 0, 1799, 1, '4710426038', 'ปิ๊ก', '19741111', 'บางรัก', 'Bank Thai', 'IT Manager');
INSERT INTO `weborg_user` VALUES (4710426039, 'give_graph', '123', 0, 'น.ส.', 'อารยา', 'รามสูต', '', '01-1747658', 'give_graph@yahoo.com', 22, 0, 1799, 1, '4710426039', 'กราฟ', '19740320', 'รามอินทรา', 'บริษัทกลางฯ', 'System Admin');
INSERT INTO `weborg_user` VALUES (4710426040, 'pla_013', '123', 0, 'น.ส.', 'นิดา', 'หุตะจูฑะ', '', '09-1199013', 'pla_013@yahoo.com', 22, 0, 1799, 1, '4710426040', 'ปลา', '19790616', 'ลาดพร้าว', 'Thaisugar Terminal Public', 'Support , ดูแลระบบ');
INSERT INTO `weborg_user` VALUES (4710426041, 'sunisa.c', '123', 0, 'น.ส.', 'สุนิสา', 'ชื่นบุญงาม', '', '01-7349860', 'sunisa.c@hcwml.com', 22, 0, 1799, 1, '4710426041', 'จ๋า', '19780414', 'บึงกุ่ม', 'Hutch', 'Analyst Programmer');
INSERT INTO `weborg_user` VALUES (4710426001, 'somphngj', '123', 0, 'นาย', 'สมพงษ์', 'จิรนิธิรัตน์', 'xxx', '06-8974362', 'somphngj@scb.co.th', 22, 0, 1799, 1, '4710426001', 'ต๋อง', '19711003', 'พระราม 7', 'SCB Park', 'ดูแลระบบข้อมูลสินเชื่อ');
INSERT INTO `weborg_user` VALUES (4710426002, 'suwit.p', '123', 0, 'นาย', 'สุวิช', 'พึ่งวงศ์ตระกูล', '', '06-6635859', 'suwit.p@cdg.co.th', 22, 0, 2668, 1, '4710426002', 'จุ้ย', '19761216', 'สวนพลู สาทร', 'CDGS', 'Programmer');
INSERT INTO `weborg_user` VALUES (10003, 'sukanya', '123', 0, 'อ.ดร.', 'สุกัญญา', 'สุรเนาวรัตน์', '', '', '', 0, 0, 939, 1, '', '', '', '', 'Nida', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `weborg_user_seq`
-- 

DROP TABLE IF EXISTS `weborg_user_seq`;
CREATE TABLE `weborg_user_seq` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=4710426059 ;

-- 
-- dump ตาราง `weborg_user_seq`
-- 

INSERT INTO `weborg_user_seq` VALUES (10003);
