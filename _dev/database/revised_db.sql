/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.0.19-MariaDB : Database - db_2015_q2_toshiba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_2015_q2_toshiba` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_2015_q2_toshiba`;

/*Table structure for table `tbl_clients_info` */

DROP TABLE IF EXISTS `tbl_clients_info`;

CREATE TABLE `tbl_clients_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `contract_id` bigint(20) unsigned NOT NULL,
  `sales_id` bigint(20) unsigned NOT NULL,
  `country` varchar(45) NOT NULL,
  `town_city` varchar(45) NOT NULL,
  `postalcode` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_id_idx` (`contract_id`),
  KEY `company_id_idx` (`company_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `tbl_companies` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `contract_id` FOREIGN KEY (`contract_id`) REFERENCES `tbl_contracts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_clients_info` */

/*Table structure for table `tbl_companies` */

DROP TABLE IF EXISTS `tbl_companies`;

CREATE TABLE `tbl_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_companies` */

/*Table structure for table `tbl_contracts` */

DROP TABLE IF EXISTS `tbl_contracts`;

CREATE TABLE `tbl_contracts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_path` varchar(100) NOT NULL,
  `client_info_id` bigint(20) unsigned NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_info_id_idx` (`client_info_id`),
  CONSTRAINT `clients_info_id` FOREIGN KEY (`client_info_id`) REFERENCES `tbl_clients_info` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contracts` */

/*Table structure for table `tbl_groups` */

DROP TABLE IF EXISTS `tbl_groups`;

CREATE TABLE `tbl_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `permission` text NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_groups` */

/*Table structure for table `tbl_invoices` */

DROP TABLE IF EXISTS `tbl_invoices`;

CREATE TABLE `tbl_invoices` (
  `id` bigint(20) unsigned NOT NULL,
  `request_id` bigint(20) unsigned NOT NULL,
  `supply_id` bigint(20) unsigned NOT NULL,
  `date_purchased` date NOT NULL,
  `total_amount` double NOT NULL,
  `status` varchar(45) NOT NULL,
  `number_of_supply` int(11) NOT NULL,
  `item` varchar(45) NOT NULL,
  `client_info_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supply_id_idx` (`supply_id`),
  KEY `request_id_idx` (`request_id`),
  KEY `client_info_id_idx` (`client_info_id`),
  CONSTRAINT `client_info_id` FOREIGN KEY (`client_info_id`) REFERENCES `tbl_clients_info` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `request_id` FOREIGN KEY (`request_id`) REFERENCES `tbl_requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `supply_id` FOREIGN KEY (`supply_id`) REFERENCES `tbl_users` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_invoices` */

/*Table structure for table `tbl_promotions` */

DROP TABLE IF EXISTS `tbl_promotions`;

CREATE TABLE `tbl_promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` text NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `discount` smallint(5) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `useridid` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_promotions` */

/*Table structure for table `tbl_requests` */

DROP TABLE IF EXISTS `tbl_requests`;

CREATE TABLE `tbl_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `request_item` varchar(100) NOT NULL,
  `date_requested` datetime NOT NULL,
  `date_needed` datetime NOT NULL,
  `delivery_address` varchar(45) NOT NULL,
  `request_type` enum('pending','approved') NOT NULL,
  `request_status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `useruser` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_requests` */

/*Table structure for table `tbl_supplies` */

DROP TABLE IF EXISTS `tbl_supplies`;

CREATE TABLE `tbl_supplies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` bigint(20) unsigned NOT NULL,
  `promotion_id` bigint(20) unsigned NOT NULL,
  `item` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hardware_type` varchar(100) NOT NULL,
  `number_of_supply` smallint(5) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `date_acquired` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promotion_id_idx` (`promotion_id`),
  KEY `request_id_idx` (`request_id`),
  CONSTRAINT `promotion_id` FOREIGN KEY (`promotion_id`) REFERENCES `tbl_promotions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `request_ids` FOREIGN KEY (`request_id`) REFERENCES `tbl_requests` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_supplies` */

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `group_id_idx` (`group_id`),
  CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`group_id`,`username`,`password`,`firstname`,`lastname`,`address`) values (1,NULL,'administrator','admin','Iris Jennifer','Farnacio','Baguio City'),(2,NULL,'administrator2','admin2','Ivan Jules','De Vera','Baguio City');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
