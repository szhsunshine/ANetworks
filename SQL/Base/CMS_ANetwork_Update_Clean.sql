/*
SQLyog Community v12.5.0 (64 bit)
MySQL - 10.1.28-MariaDB : Database - anetwork
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`anetwork` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `anetwork`;

/*Table structure for table `ac_addons` */

DROP TABLE IF EXISTS `ac_addons`;

CREATE TABLE `ac_addons` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `addon_name` tinytext NOT NULL,
  `addon_version` varchar(50) NOT NULL,
  `addon_uploader` varchar(50) NOT NULL,
  `addon_description` text NOT NULL,
  `status` int(8) NOT NULL,
  `downloads` int(128) NOT NULL,
  `category` int(16) NOT NULL,
  `updated` int(16) NOT NULL,
  `uploaded` int(16) NOT NULL,
  `expansion` int(8) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1 COMMENT='Addon System';

/*Table structure for table `ac_applications` */

DROP TABLE IF EXISTS `ac_applications`;

CREATE TABLE `ac_applications` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `active` int(8) NOT NULL,
  `time` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Uploader Application System';

/*Table structure for table `ac_category` */

DROP TABLE IF EXISTS `ac_category`;

CREATE TABLE `ac_category` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `category` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Addon Categories';

/*Table structure for table `ac_config` */

DROP TABLE IF EXISTS `ac_config`;

CREATE TABLE `ac_config` (
  `id_cnf` int(25) NOT NULL AUTO_INCREMENT,
  `config_item` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  KEY `id_cnf` (`id_cnf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_discussion` */

DROP TABLE IF EXISTS `ac_discussion`;

CREATE TABLE `ac_discussion` (
  `id` int(128) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(155) NOT NULL,
  `category` int(16) NOT NULL,
  `date` int(16) NOT NULL,
  `announcement` int(2) NOT NULL,
  `sticky` int(2) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion System';

/*Table structure for table `ac_discussion_category` */

DROP TABLE IF EXISTS `ac_discussion_category`;

CREATE TABLE `ac_discussion_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Isfather` int(1) NOT NULL,
  `idfather` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_discussion_replies` */

DROP TABLE IF EXISTS `ac_discussion_replies`;

CREATE TABLE `ac_discussion_replies` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `id_thread` int(128) NOT NULL,
  `msg` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` int(16) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Discussion Thread System';

/*Table structure for table `ac_discussion_thread` */

DROP TABLE IF EXISTS `ac_discussion_thread`;

CREATE TABLE `ac_discussion_thread` (
  `id` int(128) NOT NULL,
  `id_cat` int(128) NOT NULL,
  `title` tinytext NOT NULL,
  `msg` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` int(16) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion Thread System';

/*Table structure for table `ac_downloads` */

DROP TABLE IF EXISTS `ac_downloads`;

CREATE TABLE `ac_downloads` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `file_id` varchar(50) NOT NULL,
  `ip` tinytext NOT NULL,
  `user_agent` text NOT NULL,
  `time` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Download Logging System';

/*Table structure for table `ac_expansion` */

DROP TABLE IF EXISTS `ac_expansion`;

CREATE TABLE `ac_expansion` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `expansion` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT 'status column',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_external_download` */

DROP TABLE IF EXISTS `ac_external_download`;

CREATE TABLE `ac_external_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addon_id` int(11) NOT NULL,
  `external` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_faq` */

DROP TABLE IF EXISTS `ac_faq`;

CREATE TABLE `ac_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content1` varchar(50) NOT NULL,
  `longcontent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='FAQ System';

/*Table structure for table `ac_files` */

DROP TABLE IF EXISTS `ac_files`;

CREATE TABLE `ac_files` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `file_id` varchar(50) NOT NULL,
  `file_name` tinytext NOT NULL,
  `file_tmp` tinytext NOT NULL,
  `file_size` int(128) NOT NULL,
  `file_url` tinytext NOT NULL,
  `added` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1 COMMENT='Stores Addon File Information';

/*Table structure for table `ac_logs` */

DROP TABLE IF EXISTS `ac_logs`;

CREATE TABLE `ac_logs` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `page` tinytext NOT NULL,
  `data` text NOT NULL,
  `user_agent` text NOT NULL,
  `ip` tinytext NOT NULL,
  `time` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COMMENT='General Logging System';

/*Table structure for table `ac_modules` */

DROP TABLE IF EXISTS `ac_modules`;

CREATE TABLE `ac_modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `ac_news` */

DROP TABLE IF EXISTS `ac_news`;

CREATE TABLE `ac_news` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `news_title` tinytext NOT NULL,
  `news_content` text NOT NULL,
  `news_author` varchar(50) NOT NULL,
  `post_date` int(10) NOT NULL,
  `news_short` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='News System';

/*Table structure for table `ac_news_comments` */

DROP TABLE IF EXISTS `ac_news_comments`;

CREATE TABLE `ac_news_comments` (
  `id_comment` int(255) NOT NULL AUTO_INCREMENT,
  `id_new` int(255) NOT NULL,
  `Nick` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_ranks` */

DROP TABLE IF EXISTS `ac_ranks`;

CREATE TABLE `ac_ranks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `permission` int(3) NOT NULL DEFAULT '1',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `ac_ranks_permissions` */

DROP TABLE IF EXISTS `ac_ranks_permissions`;

CREATE TABLE `ac_ranks_permissions` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `perm_id` int(50) NOT NULL,
  `has_admin` int(2) NOT NULL,
  `has_kick` int(2) NOT NULL,
  `has_ban` int(2) NOT NULL,
  `has_acp` int(2) NOT NULL,
  `has_forum_mod` int(2) NOT NULL,
  `has_addons_mod` int(2) NOT NULL,
  PRIMARY KEY (`perm_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `perm_id` (`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `ac_users` */

DROP TABLE IF EXISTS `ac_users`;

CREATE TABLE `ac_users` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` int(16) NOT NULL DEFAULT '0',
  `registered` int(16) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `post` int(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='User System';

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
