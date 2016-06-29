-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 11:00 PM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `xyz`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `damage`
-- 

CREATE TABLE `damage` (
  `id` int(5) NOT NULL auto_increment,
  `iduser` int(5) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `nameitem` varchar(50) NOT NULL,
  `damageitem` text NOT NULL,
  `priority` int(1) NOT NULL,
  `targetdate` datetime NOT NULL,
  `noteadd` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `damage`
-- 

INSERT INTO `damage` VALUES (1, 1, '2016-06-28 09:46:02', 'Monitor', 'blinking,power loose', 1, '2016-06-29 09:47:14', 'Pernah Rusak ');
INSERT INTO `damage` VALUES (2, 2, '2016-06-27 09:52:26', 'CPU', 'panas,bunyi', 0, '2016-06-30 09:52:56', 'pernah rusak');
INSERT INTO `damage` VALUES (4, 1, '2016-06-29 21:58:19', 'Printer', 'Blinking', 2, '2016-06-28 15:54:38', 'Pernah Rusak');
INSERT INTO `damage` VALUES (5, 2, '2016-06-29 21:58:19', 'Other', 'Fax Rusak', 2, '2016-06-28 15:56:40', 'Tidak mau nyala');
INSERT INTO `damage` VALUES (6, 2, '2016-06-29 21:58:19', 'Cpu', 'Lemot', 1, '2016-06-28 15:59:08', 'Komputer lama');
INSERT INTO `damage` VALUES (7, 1, '2016-06-28 22:53:47', 'CPU', 'bad  bad bad', 1, '2016-06-28 23:53:47', 'need be good');

-- --------------------------------------------------------

-- 
-- Table structure for table `damage_status`
-- 

CREATE TABLE `damage_status` (
  `id_damage` int(5) NOT NULL,
  `status` int(1) NOT NULL default '0',
  `dateinput` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `idfixer` int(5) NOT NULL default '0',
  `Report` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `damage_status`
-- 

INSERT INTO `damage_status` VALUES (1, 0, '2016-06-28 10:27:55', 5, '');
INSERT INTO `damage_status` VALUES (2, 0, '2016-06-28 10:28:10', 6, '');
INSERT INTO `damage_status` VALUES (6, 0, '2016-06-28 15:59:08', 0, 'start');
INSERT INTO `damage_status` VALUES (4, 0, '2016-06-28 15:18:04', 0, 'start');
INSERT INTO `damage_status` VALUES (5, 0, '2016-06-28 15:20:04', 0, 'start');
INSERT INTO `damage_status` VALUES (4, 1, '2016-06-29 21:59:13', 5, 'sudah ditangani');
INSERT INTO `damage_status` VALUES (0, 2, '2016-06-29 21:59:13', 6, 'sudah beres');
INSERT INTO `damage_status` VALUES (1, 1, '2016-06-29 21:59:13', 5, 'butuh hardware');
INSERT INTO `damage_status` VALUES (7, 0, '2016-06-28 23:53:47', 0, 'start');

-- --------------------------------------------------------

-- 
-- Table structure for table `dept`
-- 

CREATE TABLE `dept` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `dept`
-- 

INSERT INTO `dept` VALUES (1, 'Dept AAA');
INSERT INTO `dept` VALUES (2, 'Dept BBB');
INSERT INTO `dept` VALUES (3, 'Dept CCC');
INSERT INTO `dept` VALUES (4, 'Dept IT');
INSERT INTO `dept` VALUES (5, 'IT Support');
INSERT INTO `dept` VALUES (6, 'Manager IT');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dept` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 'Anton', '12345', 1);
INSERT INTO `user` VALUES (2, 'Budi', '12345', 2);
INSERT INTO `user` VALUES (3, 'Celo', '12345', 3);
INSERT INTO `user` VALUES (4, 'AdminIT', '12345', 4);
INSERT INTO `user` VALUES (5, 'John', '12345', 5);
INSERT INTO `user` VALUES (6, 'Mike', '12345', 5);
INSERT INTO `user` VALUES (7, 'Wade', '12345', 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_privilage`
-- 

CREATE TABLE `user_privilage` (
  `iduser` int(5) NOT NULL,
  `privilage` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `user_privilage`
-- 

INSERT INTO `user_privilage` VALUES (1, 0);
INSERT INTO `user_privilage` VALUES (2, 0);
INSERT INTO `user_privilage` VALUES (3, 0);
INSERT INTO `user_privilage` VALUES (4, 0);
INSERT INTO `user_privilage` VALUES (4, 1);
INSERT INTO `user_privilage` VALUES (6, 0);
INSERT INTO `user_privilage` VALUES (6, 1);
INSERT INTO `user_privilage` VALUES (5, 0);
INSERT INTO `user_privilage` VALUES (5, 1);
INSERT INTO `user_privilage` VALUES (7, 0);
INSERT INTO `user_privilage` VALUES (7, 1);
