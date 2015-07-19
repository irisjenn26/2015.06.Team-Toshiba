-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_clients_info`
--

DROP TABLE IF EXISTS `tbl_clients_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  CONSTRAINT `contract_id` FOREIGN KEY (`contract_id`) REFERENCES `tbl_contracts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `tbl_companies` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clients_info`
--

LOCK TABLES `tbl_clients_info` WRITE;
/*!40000 ALTER TABLE `tbl_clients_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_clients_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_companies`
--

DROP TABLE IF EXISTS `tbl_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_companies`
--

LOCK TABLES `tbl_companies` WRITE;
/*!40000 ALTER TABLE `tbl_companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contracts`
--

DROP TABLE IF EXISTS `tbl_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contracts`
--

LOCK TABLES `tbl_contracts` WRITE;
/*!40000 ALTER TABLE `tbl_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_groups`
--

DROP TABLE IF EXISTS `tbl_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_groups`
--

LOCK TABLES `tbl_groups` WRITE;
/*!40000 ALTER TABLE `tbl_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promotions`
--

DROP TABLE IF EXISTS `tbl_promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promotions`
--

LOCK TABLES `tbl_promotions` WRITE;
/*!40000 ALTER TABLE `tbl_promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requests`
--

DROP TABLE IF EXISTS `tbl_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `request_item` varchar(100) NOT NULL,
  `date_requested` datetime NOT NULL,
  `date_needed` datetime NOT NULL,
  `delivery_address` varchar(45) NOT NULL,
  `request_type` enum('order','purchase') NOT NULL,
  `request_status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `useruser` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requests`
--

LOCK TABLES `tbl_requests` WRITE;
/*!40000 ALTER TABLE `tbl_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sales`
--

DROP TABLE IF EXISTS `tbl_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `request_id` bigint(20) unsigned NOT NULL,
  `supply_id` bigint(20) unsigned NOT NULL,
  `client_info_id` bigint(20) unsigned NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `reciept_no` varchar(100) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `request_id_idx` (`request_id`),
  KEY `supply_id_idx` (`supply_id`),
  KEY `client_info_id_idx` (`client_info_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `requestid` FOREIGN KEY (`request_id`) REFERENCES `tbl_requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `supplyid` FOREIGN KEY (`supply_id`) REFERENCES `tbl_supplies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `client_infoid` FOREIGN KEY (`client_info_id`) REFERENCES `tbl_clients_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_ids` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sales`
--

LOCK TABLES `tbl_sales` WRITE;
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplies`
--

DROP TABLE IF EXISTS `tbl_supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` bigint(20) unsigned NOT NULL,
  `promotion_id` bigint(20) unsigned NOT NULL,
  `item` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `serial_no` smallint(5) unsigned NOT NULL,
  `hardware_type` varchar(100) NOT NULL,
  `supply` varchar(45) NOT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplies`
--

LOCK TABLES `tbl_supplies` WRITE;
/*!40000 ALTER TABLE `tbl_supplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `group_id_idx` (`group_id`),
  CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-18 16:21:50
