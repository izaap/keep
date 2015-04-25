-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2015 at 12:14 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keep`
--

-- --------------------------------------------------------

--
-- Table structure for table `jwb_action_logs`
--

CREATE TABLE IF NOT EXISTS `jwb_action_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` tinyint(10) NOT NULL,
  `action` varchar(75) NOT NULL,
  `type` enum('user management','admin') DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `jwb_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jwb_ci_sessions`
--

INSERT INTO `jwb_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('75eece91cba5a2a2d2518062af3c5c23', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0', 1429884814, ''),
('66759df80aa5412fd3828c91e3540e97', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0', 1429942610, 'a:13:{s:9:"user_data";s:0:"";s:11:"user_detail";a:25:{s:2:"id";s:1:"9";s:10:"first_name";s:5:"saran";s:9:"last_name";s:4:"doss";s:5:"about";s:26:"Really Good ..Great..Wow..";s:12:"profile_name";s:5:"saran";s:9:"user_name";s:5:"saran";s:8:"password";s:32:"2208639860dda3f5c6bf627bbe3657c7";s:12:"ori_password";s:5:"saran";s:5:"email";s:15:"saran@gmail.com";s:4:"role";s:1:"1";s:5:"phone";s:10:"9659362508";s:18:"email_notification";s:1:"1";s:12:"hide_profile";s:1:"0";s:6:"gender";s:4:"male";s:10:"is_blocked";s:1:"0";s:3:"dob";s:10:"0000-00-00";s:10:"created_id";s:1:"0";s:10:"updated_id";s:1:"0";s:12:"created_time";s:19:"2015-03-14 19:51:19";s:12:"updated_time";s:19:"0000-00-00 00:00:00";s:8:"location";s:7:"Chennai";s:10:"user_image";s:14:"user-5-big.jpg";s:17:"user_jewelry_type";s:1:"2";s:15:"following_count";s:1:"2";s:14:"followed_count";s:1:"1";}s:7:"user_id";s:1:"9";s:10:"first_name";s:5:"saran";s:9:"last_name";s:4:"doss";s:9:"user_name";s:5:"saran";s:5:"email";s:15:"saran@gmail.com";s:5:"phone";s:10:"9659362508";s:8:"location";s:7:"Chennai";s:5:"about";s:26:"Really Good ..Great..Wow..";s:10:"user_image";s:14:"user-5-big.jpg";s:15:"following_count";s:1:"2";s:14:"followed_count";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_collections`
--

CREATE TABLE IF NOT EXISTS `jwb_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `jwb_collections`
--

INSERT INTO `jwb_collections` (`id`, `user_id`, `name`, `created_time`) VALUES
(1, 9, 'dress', '0000-00-00 00:00:00'),
(2, 9, 'toys', '0000-00-00 00:00:00'),
(3, 9, 'mobile', '0000-00-00 00:00:00'),
(4, 17, 'television', '0000-00-00 00:00:00'),
(13, 9, 'saran', '0000-00-00 00:00:00'),
(15, 9, 'saran test', '0000-00-00 00:00:00'),
(16, 17, 'xczcxZCZz', '0000-00-00 00:00:00'),
(17, 13, 'asdsadf', '0000-00-00 00:00:00'),
(19, 13, 'poiuyt', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_comments`
--

CREATE TABLE IF NOT EXISTS `jwb_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `comment_created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `jwb_comments`
--

INSERT INTO `jwb_comments` (`id`, `product_id`, `user_id`, `comment`, `comment_created_time`) VALUES
(14, 2, 9, 'First reply..', '2015-04-17 10:33:50'),
(24, 1, 9, '12345', '2015-04-17 10:41:16'),
(25, 1, 9, '12345', '2015-04-17 10:41:17'),
(26, 1, 12, 'Time check..', '2015-04-17 11:47:13'),
(27, 12, 9, 'saran', '2015-04-17 13:39:50'),
(28, 12, 9, 'sfgu.fklo', '2015-04-17 13:40:06'),
(29, 1, 9, 'dgdfghfgkjhl', '2015-04-21 07:03:29'),
(30, 1, 9, 'asdfsf', '2015-04-21 13:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_favourites`
--

CREATE TABLE IF NOT EXISTS `jwb_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `jwb_favourites`
--

INSERT INTO `jwb_favourites` (`id`, `product_id`, `collection_id`, `user_id`, `created_time`) VALUES
(53, 1, 1, 9, '0000-00-00 00:00:00'),
(54, 2, 1, 9, '0000-00-00 00:00:00'),
(55, 3, 1, 9, '0000-00-00 00:00:00'),
(56, 4, 1, 9, '0000-00-00 00:00:00'),
(57, 5, 17, 13, '0000-00-00 00:00:00'),
(58, 6, 17, 13, '0000-00-00 00:00:00'),
(59, 7, 4, 17, '0000-00-00 00:00:00'),
(60, 8, 4, 17, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_follows`
--

CREATE TABLE IF NOT EXISTS `jwb_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_jewelry`
--

CREATE TABLE IF NOT EXISTS `jwb_jewelry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jewelry_type` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jwb_jewelry`
--

INSERT INTO `jwb_jewelry` (`id`, `jewelry_type`, `created_time`) VALUES
(1, 'Georgian', '2015-04-20 11:20:49'),
(2, 'Victorian', '2015-04-20 11:20:49'),
(3, 'Rings', '2015-04-20 11:21:07'),
(4, 'Necklaces', '2015-04-20 11:21:07'),
(5, 'Moonstone', '2015-04-20 11:21:30'),
(6, 'Diamond', '2015-04-20 11:21:30'),
(7, 'Turquoise', '2015-04-20 11:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_likes`
--

CREATE TABLE IF NOT EXISTS `jwb_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `jwb_likes`
--

INSERT INTO `jwb_likes` (`id`, `product_id`, `user_id`, `created_time`) VALUES
(24, 2, 9, '0000-00-00 00:00:00'),
(27, 1, 9, '0000-00-00 00:00:00'),
(28, 3, 9, '0000-00-00 00:00:00'),
(29, 4, 9, '0000-00-00 00:00:00'),
(30, 8, 9, '0000-00-00 00:00:00'),
(32, 9, 9, '0000-00-00 00:00:00'),
(33, 7, 13, '0000-00-00 00:00:00'),
(34, 7, 9, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_log`
--

CREATE TABLE IF NOT EXISTS `jwb_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text NOT NULL,
  `action_id` int(11) NOT NULL,
  `line` text NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sales_channel_user1` (`created_id`),
  KEY `fk_sales_channel_user2` (`updated_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jwb_log`
--

INSERT INTO `jwb_log` (`id`, `action`, `action_id`, `line`, `created_id`, `updated_id`, `created_time`, `updated_time`) VALUES
(1, 'Product#4 (Latest configure laptop) record has been created.', 4, 'product', 8, 8, '2015-04-06 13:26:40', '2015-04-06 07:56:40'),
(2, 'Product#5 (Water bottle for students) record has been created.', 5, 'product', 8, 8, '2015-04-06 13:27:42', '2015-04-06 07:57:42'),
(3, 'Product#6 (4G mobile latest) record has been created.', 6, 'product', 8, 8, '2015-04-06 13:29:21', '2015-04-06 07:59:21'),
(4, 'Product#7 (Sample product) record has been created.', 7, 'product', 8, 8, '2015-04-06 13:37:47', '2015-04-06 08:07:47'),
(5, 'Product#8 (Party wear) record has been created.', 8, 'product', 8, 8, '2015-04-06 13:38:27', '2015-04-06 08:08:27'),
(6, 'Product#9 (Cotton clothings) record has been created.', 9, 'product', 8, 8, '2015-04-06 13:39:09', '2015-04-06 08:09:09'),
(7, 'Product#10 (Mens wear) record has been created.', 10, 'product', 8, 8, '2015-04-06 13:41:40', '2015-04-06 08:11:40'),
(8, 'Product#11 (Cool wear for Mens) record has been created.', 11, 'product', 8, 8, '2015-04-06 13:42:23', '2015-04-06 08:12:23'),
(9, 'Product#12 (Kids wear for summer) record has been created.', 12, 'product', 8, 8, '2015-04-06 13:46:34', '2015-04-06 08:16:34'),
(10, 'Role#2 (Customer) record has been updated.', 2, 'role', 8, 8, '2015-04-09 14:22:57', '2015-04-09 08:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_messages`
--

CREATE TABLE IF NOT EXISTS `jwb_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` enum('site','users') NOT NULL,
  `users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_products`
--

CREATE TABLE IF NOT EXISTS `jwb_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `upcoming_product` enum('0','1') NOT NULL DEFAULT '0',
  `buylink` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `favorites` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `buycount` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jwb_products`
--

INSERT INTO `jwb_products` (`id`, `product_name`, `description`, `product_image`, `upcoming_product`, `buylink`, `price`, `favorites`, `likes`, `followed`, `buycount`, `created_id`, `updated_id`, `created_time`, `updated_time`) VALUES
(1, 'Test Product', 'I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.', 'rvlt-revolution-7322-two-in-one-jacket.jpg', '1', 'http://keep.com/product/23', 23, 1, 1, 6, 9, 8, 8, '2015-04-23 11:57:05', '2015-04-15 12:12:03'),
(2, 'Neckles jewl', 'new neckles jewl', 'BGD-120-1JF.jpg', '', 'http://keep.com/product/24', 45, 1, 2, 4, 7, 8, 8, '2015-04-23 11:57:15', '2015-04-15 12:25:50'),
(3, 'Chain jewl', 'chain is new product', '63051.jpg', '1', 'http://keep.com/product/25', 456, 1, 1, 7, 8, 8, 8, '2015-04-21 12:23:56', '2015-04-15 12:26:24'),
(4, 'Latest configure laptop', 'Latest configuration laptop for deal price..', 'car.png', '1', 'www.google.com', 123, 1, 1, 0, 1, 8, 8, '2015-04-23 09:09:23', '2015-04-15 12:26:44'),
(5, 'Water bottle for students', 'Water bottle for school students', 'f53ff4cb83ca0d0aa8f9ade1d3793b12.jpg', '1', 'www.google.com', 12, 1, 0, 0, 2, 8, 8, '2015-04-23 09:07:22', '2015-04-15 12:27:11'),
(6, '4G mobile latest', 'Latest 4G technology mobiles ', 'DD_cup.png', '1', 'www.google.com', 245, 1, 0, 0, 1, 8, 8, '2015-04-23 09:07:39', '2015-04-15 12:27:32'),
(7, 'Sample product', 'Sample product for sale ', 'girl.jpg', '1', 'www.google.com', 54, 1, 2, 0, 0, 8, 8, '2015-04-23 15:29:46', '2015-04-15 12:27:47'),
(8, 'Party wear', 'Party wear for women clothing', 'image.jpg', '1', 'www.google.com', 78, 1, 1, 0, 1, 8, 8, '2015-04-23 11:59:27', '2015-04-15 12:28:00'),
(9, 'Cotton clothings', 'Cotton clothings for women ', 'imagenew.jpg', '1', 'www.google.com', 88, 1, 1, 0, 0, 8, 8, '2015-04-21 12:34:00', '2015-04-15 12:28:17'),
(10, 'Mens wear', 'Cool wear for mens', 'imagesdress.jpg', '1', 'www.google.com', 34, 0, 0, 0, 1, 8, 8, '2015-04-15 12:34:12', '2015-04-15 12:34:12'),
(11, 'Cool wear for Mens', 'Cool wear for men clothings', 'slide_92.png', '1', 'www.google.com', 80, 1, 0, 0, 0, 8, 8, '2015-04-21 12:34:25', '2015-04-15 12:34:29'),
(12, 'Kids wear for summer', 'Kids wear for summer session', 'thb_0580.jpg', '1', 'www.google.com', 12, 0, 0, 0, 1, 8, 8, '2015-04-15 12:34:42', '2015-04-15 12:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_roles`
--

CREATE TABLE IF NOT EXISTS `jwb_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jwb_roles`
--

INSERT INTO `jwb_roles` (`id`, `name`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 'Admin', 0, 0, '2015-03-13 09:01:46', '0000-00-00 00:00:00'),
(2, 'Customer', 8, 8, '2015-03-13 09:01:46', '2015-04-09 14:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_site_traffic`
--

CREATE TABLE IF NOT EXISTS `jwb_site_traffic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `ip` varchar(75) NOT NULL,
  `user_agent` varchar(100) DEFAULT 'not null',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_usermeta`
--

CREATE TABLE IF NOT EXISTS `jwb_usermeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` tinyint(10) NOT NULL,
  `meta_value` varchar(75) NOT NULL,
  `total` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_users`
--

CREATE TABLE IF NOT EXISTS `jwb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ori_password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email_notification` tinyint(1) NOT NULL,
  `hide_profile` tinyint(1) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_jewelry_type` int(10) NOT NULL,
  `following_count` int(10) NOT NULL,
  `followed_count` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `jwb_users`
--

INSERT INTO `jwb_users` (`id`, `first_name`, `last_name`, `about`, `profile_name`, `user_name`, `password`, `ori_password`, `email`, `role`, `phone`, `email_notification`, `hide_profile`, `gender`, `is_blocked`, `dob`, `created_id`, `updated_id`, `created_time`, `updated_time`, `location`, `user_image`, `user_jewelry_type`, `following_count`, `followed_count`) VALUES
(8, 'admin', '', '', 'admin', 'admin', '0192023a7bbd73250516f069df18b500', '', 'sarandossit@gmail.com', 1, '', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-03-13 09:03:07', '0000-00-00 00:00:00', '', '', 0, 0, 0),
(9, 'saran', 'doss', 'Really Good ..Great..Wow..', 'saran', 'saran', '2208639860dda3f5c6bf627bbe3657c7', 'saran', 'saran@gmail.com', 1, '9659362508', 1, 0, 'male', 0, '0000-00-00', 0, 0, '2015-03-14 14:21:19', '0000-00-00 00:00:00', 'Chennai', 'user-5-big.jpg', 2, 2, 1),
(13, 'sadham', 'hussian', '', '', 'sadhamhussian', '90a8b8319e36717759419103c65759d7', 'sadham', 'sadham@gmail.com', 0, '9659362508', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-04-07 07:17:55', '0000-00-00 00:00:00', '', 'img2.png', 0, 2, 1),
(12, 'test', 'user', '', '', 'testuser', '098f6bcd4621d373cade4e832627b4f6', '', 'test@gmailcom', 0, '9659362508', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-04-07 07:16:19', '0000-00-00 00:00:00', '', 'img2.png', 0, 0, 0),
(17, 'raj', 'sekar', '', '', 'rajsekar', 'cac5ff630494aa784ce97b9fafac2500', 'raj123', 'raj@gmail.com', 0, '9876543212', 0, 0, 'male', 0, '0000-00-00', 0, 0, '2015-04-08 10:25:24', '0000-00-00 00:00:00', '', 'user-5-big.jpg', 0, 0, 2),
(18, 'skdsdj', 'asdsa', '', '', 'asds', '2208639860dda3f5c6bf627bbe3657c7', 'saran', 'sdkjsjf@gmail.com', 0, '9659362508', 0, 0, 'male', 0, '1989-11-19', 0, 0, '2015-04-17 12:57:01', '0000-00-00 00:00:00', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jwb_user_follow`
--

CREATE TABLE IF NOT EXISTS `jwb_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_user_id` int(11) NOT NULL,
  `following_user_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jwb_user_follow`
--

INSERT INTO `jwb_user_follow` (`id`, `follow_user_id`, `following_user_id`, `created_time`) VALUES
(11, 9, 13, '2015-04-23 12:00:11'),
(12, 9, 17, '2015-04-23 12:00:44'),
(13, 13, 9, '2015-04-23 12:01:26'),
(14, 13, 17, '2015-04-23 12:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_views`
--

CREATE TABLE IF NOT EXISTS `jwb_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jwb_views`
--

INSERT INTO `jwb_views` (`id`, `product_id`, `user_id`, `created_time`) VALUES
(1, 1, 9, '0000-00-00 00:00:00'),
(2, 5, 9, '0000-00-00 00:00:00'),
(3, 2, 9, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
