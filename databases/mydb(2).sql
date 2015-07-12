-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2015 at 05:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients_info`
--

CREATE TABLE IF NOT EXISTS `tbl_clients_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `contract_id` bigint(20) unsigned DEFAULT NULL,
  `sales_id` bigint(20) unsigned DEFAULT NULL,
  `country` varchar(45) NOT NULL,
  `town_city` varchar(45) NOT NULL,
  `postalcode` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_id_idx` (`contract_id`),
  KEY `company_id_idx` (`company_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE IF NOT EXISTS `tbl_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_no` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contracts`
--

CREATE TABLE IF NOT EXISTS `tbl_contracts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_path` varchar(100) NOT NULL,
  `client_info_id` bigint(20) unsigned NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `del_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `clients_info_id_idx` (`client_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `permission` text NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `permission`, `level`, `date_created`) VALUES
(1, 'Administrator', '["Can_edit_user''s_information", "Can_delete_Users", "Can_add_Users", "Can_view_Users", "Can_edit_hardware", "Can_delete_hardware", "Can_view_Hardware", "Can_add_Hardware", "Can_edit_merchant", "Can_delete_Merchants", "Can_add_Merchants", "Can_view_Merchants", "Can_edit_notification", "Can_delete_notification", "Can_add_equipment", "Can_view_request", "Can_edit_request", "Can_delete_request", "Can_add_orders", "Can_view_Notification", "Can_edit_equipment", "Can_delete_equipment", "Can_create_request", "Can_view_orders", "Can_edit_orders", "Can_delete_orders", "Can_create_notification", "Can_view_equipment", "Can_edit_group", "Can_delete_group", "Can_add_group", "Can_view_group", "Can_view_products_of_specific_Merchant", "Can_recommend_product_to_order","Can_view_logs"]', 99, '0000-00-00 00:00:00'),
(2, 'Sales Clerk', 'can_view_supplies_page : 1, can_view_promotion_page : 1, can_view_users_page : 1, can_view_requests_page : 1, can_add_invoice : 1, can_add_request : 1', 50, '0000-00-00 00:00:00'),
(3, 'Technical Clerk', 'can_add_supply : 1, can_view_supplies_page : 1', 30, '0000-00-00 00:00:00'),
(4, 'Client', 'can_view_supplies_page : 1, can_view_requests_page : 1, can_view_promotions_page : 1, can_add_request : 1', 20, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoices`
--

CREATE TABLE IF NOT EXISTS `tbl_invoices` (
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
  KEY `client_info_id_idx` (`client_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotions`
--

CREATE TABLE IF NOT EXISTS `tbl_promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` text NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `discount` smallint(5) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `promotion_title` varchar(45) NOT NULL,
  `supply_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `supply_id_idx` (`supply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_promotions`
--

INSERT INTO `tbl_promotions` (`id`, `user_id`, `description`, `status`, `discount`, `start_date`, `end_date`, `promotion_title`, `supply_id`) VALUES
(1, 1, 'avsgsfgs', 'enabled', 20, '2015-07-15 00:00:00', '2015-07-27 00:00:00', 'refgfsdfsd', 0),
(2, 1, 'avsgsfgs', 'enabled', 20, '2015-07-15 00:00:00', '2015-07-27 00:00:00', 'refgfsdfsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_requests` (
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
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplies`
--

CREATE TABLE IF NOT EXISTS `tbl_supplies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `promotion_id` bigint(20) unsigned DEFAULT NULL,
  `item` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hardware_type` varchar(100) NOT NULL,
  `number_of_supply` smallint(5) unsigned NOT NULL,
  `price` int(20) unsigned NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `date_acquired` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `del_status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `promotion_id_idx` (`promotion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_supplies`
--

INSERT INTO `tbl_supplies` (`id`, `promotion_id`, `item`, `description`, `hardware_type`, `number_of_supply`, `price`, `manufacturer`, `date_acquired`, `status`, `del_status`) VALUES
(1, NULL, 'Aurora R4 Barebones Chassis', 'With Cooler Harness', 'Computer Cases', 200, 8500, 'Alienware', '2015-07-14 00:00:00', 'Available', 'active'),
(2, NULL, 'Aurora R4 ALX Barebones Chassis', 'With Harness', 'Computer Cases', 200, 6116, 'Alienware', '2015-07-01 08:08:08', 'Available', 'active'),
(3, NULL, 'Aurora R4 ALX Chassis Desktop Tower Black Case She', 'With Fan', 'Computer Cases', 1000, 9457, 'Alienware', '2015-07-05 10:10:20', 'Available', 'active'),
(4, NULL, 'Aurora R4 Black Case', 'With Dell FPV4P Motherboard & Power Supply', 'Computer Cases', 500, 17690, 'Alienware', '2015-07-06 08:56:00', 'Available', 'active'),
(5, NULL, 'Aurora (Late 2009) Tower Case', 'With Windows 7 COA,0K613M', 'Computer Cases', 2500, 4400, 'Alienware', '2015-07-06 09:30:00', 'Available', 'inactive'),
(6, NULL, 'Aurora R4 Standard Chassis Desktop Tower Black Cas', 'With Fan', 'Computer Cases', 3500, 8600, 'Alienware', '2015-07-06 11:30:33', 'Available', 'active'),
(7, NULL, '', '', '', 0, 0, '', '0000-00-00 00:00:00', '', 'inactive'),
(8, NULL, 'Hello', 'sderewfr', 'graphics card', 2000, 2000, 'Alienware', '0000-00-00 00:00:00', 'Available', 'active'),
(9, NULL, 'AMD 6', 'elite', 'graphics card', 5000, 8000, 'Alienware', '2015-09-26 11:11:11', 'Available', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplies_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_supplies_requests` (
  `supp_id` bigint(20) unsigned NOT NULL,
  `req_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`supp_id`,`req_id`),
  KEY `req_id_idx` (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `email` varchar(45) NOT NULL,
  `del_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `group_id_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `group_id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `del_status`) VALUES
(1, 1, 'administrator', 'admin', 'Iris Jennifer', 'Farnacio', 'Baguio City', 'jennfarnacio@outlook.com', 'active'),
(2, 1, 'administrator2', 'admin2', 'Ivan Jules', 'De Vera', 'Baguio City', 'devera.ivanjules@outlook.com', 'active'),
(3, 2, 'sales1', 'sales1', 'Kimberly ', 'Ragudo', 'La Union', 'kimmylovesma@gmail.com', 'active'),
(4, 2, 'sales2', 'qwerty', 'Daphne', 'Pulido', 'Pangasinan', 'sweetpanda@yahoo.com', 'active'),
(5, 3, 'tech2', 'tech2', 'Rose ', 'Lay Yu', 'Baguio City', 'roseb1996@gmail.com', 'active'),
(6, 3, 'tech3', 'tech3', 'Frankxen', 'Pinzon', 'Baguio City', 'fx.epong@gmail.com', 'active'),
(7, 4, 'client', 'client1', 'Philip', 'Gomez', 'Baguio City', 'philip.gomez@yahoo.com', 'active'),
(8, 4, 'client2', 'client2', 'KC Marie', 'Arce', 'Baguio City', 'arcekc@gmail.com', 'active'),
(9, 4, 'client3', 'client3', 'Mark Adriel', 'Bermillo', 'Baguio City', 'markadrielbermillo@gmail.com', 'active'),
(10, 4, 'client4', 'client4', 'Glenn', 'Andres', 'Baguio City', 'glennandres@gmail.com', 'active'),
(11, 4, 'client5', 'client5', 'Elghie', 'Batuyong', 'Baguio City', 'elghiebatuyong@yahoo.com', 'active'),
(12, 4, 'client6', 'client6', 'Marielle', 'Casem', 'Pangasinan', 'mariellecasem@gmail.com', 'active'),
(13, 3, 'tech4', 'tech4', 'Chung Him', 'Chan', 'Ilocos Sur', 'chunghimchan@gmail.com', 'active'),
(14, 2, 'sales3', 'sales3', 'Corina Jean', 'Oviedo', 'Isabela', 'corinajeanoviedo@gmail.com', 'active'),
(15, 3, 'tech5', 'tech5', 'Justin Mari', 'Gutierrez', 'Ilocos Sur', 'sablewings@gmail.com', 'active'),
(16, 4, 'client7', 'client7', 'Kevin John', 'Portento', 'Tarlac', 'iambitch@gmail.com', 'active'),
(17, 4, 'client8', 'client8', 'Kathleen Faye', 'Barroga', 'Pangasinan', 'kathbarroga@gmail.com', 'active'),
(18, 3, 'tech6', 'tech6', 'Ressie Lauren', 'Bandonill', 'Baguio City', 'rezbandonill@gmail.com', 'active'),
(19, 3, 'tech7', 'tech7', 'Severino III', 'Solis', 'Baguio City', 'sevsolis@gmail.com', 'active'),
(20, 2, 'sales5', 'sales5', 'Rafael Brian', 'Butche', 'Baguio City', 'rafbutche@gmail.com', 'active'),
(21, 4, 'client10', 'client10', 'Irvin Denzel', 'Torcuato', 'Baguio City', 'identor@gmail.com', 'active'),
(22, 4, 'client11', 'client11', 'Kit Christian', 'Rosalin', 'Zamboanga City', 'kitrosalin_18@yahoo.com', 'active'),
(23, 3, 'tech9', 'tech9', 'Florangel', 'Rillera', 'Baguio City', 'rilleradflorangel@yahoo.com', 'active'),
(24, 4, 'client12', 'client12', 'Mark Herbert', 'Cabuang', 'Tarlac', 'markherbertcabuang@gmail.com', 'active'),
(25, 4, 'client14', 'client14', 'Kathreen Ann', 'Silen', 'La Union', 'katsilen@gmail.com', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_clients_info`
--
ALTER TABLE `tbl_clients_info`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `tbl_companies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_id` FOREIGN KEY (`contract_id`) REFERENCES `tbl_contracts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_contracts`
--
ALTER TABLE `tbl_contracts`
  ADD CONSTRAINT `clients_info_id` FOREIGN KEY (`client_info_id`) REFERENCES `tbl_clients_info` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD CONSTRAINT `client_info_id` FOREIGN KEY (`client_info_id`) REFERENCES `tbl_clients_info` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `request_id` FOREIGN KEY (`request_id`) REFERENCES `tbl_requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supply_id` FOREIGN KEY (`supply_id`) REFERENCES `tbl_users` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  ADD CONSTRAINT `useridid` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD CONSTRAINT `useruser` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_supplies`
--
ALTER TABLE `tbl_supplies`
  ADD CONSTRAINT `promotion_id` FOREIGN KEY (`promotion_id`) REFERENCES `tbl_promotions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_supplies_requests`
--
ALTER TABLE `tbl_supplies_requests`
  ADD CONSTRAINT `req_id` FOREIGN KEY (`req_id`) REFERENCES `tbl_requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supp_id` FOREIGN KEY (`supp_id`) REFERENCES `tbl_supplies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
