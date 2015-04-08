-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 11:04 AM
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
('fc5e451cdb0d15722801e10e33e5fc44', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0', 1428409606, 'a:10:{s:9:"user_data";s:0:"";s:11:"user_detail";a:20:{s:2:"id";s:1:"9";s:10:"first_name";s:5:"saran";s:9:"last_name";s:4:"doss";s:5:"about";s:14:"Really Good ..";s:12:"profile_name";s:5:"saran";s:9:"user_name";s:5:"saran";s:8:"password";s:32:"2208639860dda3f5c6bf627bbe3657c7";s:5:"email";s:15:"saran@gmail.com";s:4:"role";s:1:"1";s:5:"phone";s:10:"9659362508";s:18:"email_notification";s:1:"0";s:12:"hide_profile";s:1:"0";s:6:"gender";s:4:"male";s:10:"is_blocked";s:1:"0";s:3:"dob";s:10:"0000-00-00";s:10:"created_id";s:1:"0";s:10:"updated_id";s:1:"0";s:12:"created_time";s:19:"2015-03-14 19:51:19";s:12:"updated_time";s:19:"0000-00-00 00:00:00";s:8:"location";s:7:"Chennai";}s:7:"user_id";s:1:"9";s:10:"first_name";s:5:"saran";s:9:"last_name";s:4:"doss";s:9:"user_name";s:5:"saran";s:5:"email";s:15:"saran@gmail.com";s:5:"phone";s:10:"9659362508";s:8:"location";s:7:"Chennai";s:5:"about";s:14:"Really Good ..";}'),
('7fa8a4b522c90b07d7a797186163d5bb', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0', 1428471167, '');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_collections`
--

CREATE TABLE IF NOT EXISTS `jwb_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_favourites`
--

CREATE TABLE IF NOT EXISTS `jwb_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `jwb_likes`
--

CREATE TABLE IF NOT EXISTS `jwb_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT AUTO_INCREMENT=10 ;

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
(9, 'Product#12 (Kids wear for summer) record has been created.', 12, 'product', 8, 8, '2015-04-06 13:46:34', '2015-04-06 08:16:34');

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
(1, 'Test Product', 'new product', '3420-500x500.png', '1', 'http://keep.com/product/23', 23, 5, 4, 6, 7, 8, 8, '2015-04-06 07:53:40', '2015-04-06 07:53:40'),
(2, 'Neckles jewl', 'new neckles jewl', '0081873600750_500X500.jpg', '', 'http://keep.com/product/24', 45, 2, 3, 4, 5, 8, 8, '2015-04-06 08:00:20', '2015-04-06 08:00:20'),
(3, 'Chain jewl', 'chain is new product', '30021940_i2.jpg', '1', 'http://keep.com/product/25', 456, 4, 6, 7, 8, 8, 8, '2015-04-06 07:46:12', '2015-04-06 07:46:12'),
(4, 'Latest configure laptop', 'Latest configuration laptop for deal price..', 'Dell-Inspiron-N3521-Laptop-Features.jpg', '1', 'www.google.com', 123, 0, 0, 0, 0, 8, 8, '2015-04-06 08:00:04', '2015-04-06 08:00:04'),
(5, 'Water bottle for students', 'Water bottle for school students', 'Nalgene-water-bottle.jpg', '1', 'www.google.com', 12, 0, 0, 0, 0, 8, 0, '2015-04-06 07:57:42', '0000-00-00 00:00:00'),
(6, '4G mobile latest', 'Latest 4G technology mobiles ', 'Huawei.jpg', '1', 'www.google.com', 245, 0, 0, 0, 0, 8, 0, '2015-04-06 07:59:20', '0000-00-00 00:00:00'),
(7, 'Sample product', 'Sample product for sale ', 'Riti-Riwaz-Net-Brasso-Dress-Material-Pink-28011-1.jpg', '1', 'www.google.com', 54, 0, 0, 0, 0, 8, 0, '2015-04-06 08:07:47', '0000-00-00 00:00:00'),
(8, 'Party wear', 'Party wear for women clothing', 'Free-Shipping-New-Casual-font-b-dress-b-font-Two-pieces-T-shirt-and-font-b.jpg', '1', 'www.google.com', 78, 0, 0, 0, 0, 8, 0, '2015-04-06 08:08:27', '0000-00-00 00:00:00'),
(9, 'Cotton clothings', 'Cotton clothings for women ', 'clubl-womens-sequin-panel-skater-dress_black-gold.jpg', '1', 'www.google.com', 88, 0, 0, 0, 0, 8, 0, '2015-04-06 08:09:09', '0000-00-00 00:00:00'),
(10, 'Mens wear', 'Cool wear for mens', '17a-500x500.jpg', '1', 'www.google.com', 34, 0, 0, 0, 0, 8, 0, '2015-04-06 08:11:40', '0000-00-00 00:00:00'),
(11, 'Cool wear for Mens', 'Cool wear for men clothings', 'Coolibar-UPF-50+-Mens-Short-Sleeve-Fitness-Shirt.jpg', '1', 'www.google.com', 80, 0, 0, 0, 0, 8, 0, '2015-04-06 08:12:23', '0000-00-00 00:00:00'),
(12, 'Kids wear for summer', 'Kids wear for summer session', 'summer-baby-girls-clothes-children-s-cotton-lace-floral-dress-for-girl-princess-kids-sports-party.jpg', '1', 'www.google.com', 12, 0, 0, 0, 0, 8, 0, '2015-04-06 08:16:34', '0000-00-00 00:00:00');

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
(2, 'Customer', 0, 0, '2015-03-13 09:01:46', '0000-00-00 00:00:00');

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
  `email` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email_notification` tinyint(1) NOT NULL,
  `hide_profile` tinyint(1) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `jwb_users`
--

INSERT INTO `jwb_users` (`id`, `first_name`, `last_name`, `about`, `profile_name`, `user_name`, `password`, `email`, `role`, `phone`, `email_notification`, `hide_profile`, `gender`, `is_blocked`, `dob`, `created_id`, `updated_id`, `created_time`, `updated_time`, `location`) VALUES
(8, 'admin', '', '', 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 'sarandossit@gmail.com', 1, '', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-03-13 09:03:07', '0000-00-00 00:00:00', ''),
(9, 'saran', 'doss', 'Really Good ..', 'saran', 'saran', '2208639860dda3f5c6bf627bbe3657c7', 'saran@gmail.com', 1, '9659362508', 0, 0, 'male', 0, '0000-00-00', 0, 0, '2015-03-14 14:21:19', '0000-00-00 00:00:00', 'Chennai'),
(13, 'sadham', 'hussian', '', '', 'sadhamhussian', '90a8b8319e36717759419103c65759d7', 'sadham@gmail.com', 0, '9659362508', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-04-07 07:17:55', '0000-00-00 00:00:00', ''),
(12, 'test', 'user', '', '', 'testuser', '098f6bcd4621d373cade4e832627b4f6', 'test@gmailcom', 0, '9659362508', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-04-07 07:16:19', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_user_follow`
--

CREATE TABLE IF NOT EXISTS `jwb_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `followed_user_id` int(11) NOT NULL,
  `follower_user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
