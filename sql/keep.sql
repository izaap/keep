-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 04:20 PM
-- Server version: 5.5.40-0ubuntu1
-- PHP Version: 5.5.12-2ubuntu4.1

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
`id` int(11) NOT NULL,
  `log_id` tinyint(10) NOT NULL,
  `action` varchar(75) NOT NULL,
  `type` enum('user management','admin') DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_collections`
--

CREATE TABLE IF NOT EXISTS `jwb_collections` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_favourites`
--

CREATE TABLE IF NOT EXISTS `jwb_favourites` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_follows`
--

CREATE TABLE IF NOT EXISTS `jwb_follows` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_likes`
--

CREATE TABLE IF NOT EXISTS `jwb_likes` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_messages`
--

CREATE TABLE IF NOT EXISTS `jwb_messages` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` enum('site','users') NOT NULL,
  `users` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_roles`
--

CREATE TABLE IF NOT EXISTS `jwb_roles` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
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
`id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ip` varchar(75) NOT NULL,
  `user_agent` varchar(100) DEFAULT 'not null',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_usermeta`
--

CREATE TABLE IF NOT EXISTS `jwb_usermeta` (
`id` int(11) NOT NULL,
  `meta_key` tinyint(10) NOT NULL,
  `meta_value` varchar(75) NOT NULL,
  `total` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_users`
--

CREATE TABLE IF NOT EXISTS `jwb_users` (
`id` int(11) NOT NULL,
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
  `location` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jwb_users`
--

INSERT INTO `jwb_users` (`id`, `first_name`, `last_name`, `about`, `profile_name`, `user_name`, `password`, `email`, `role`, `phone`, `email_notification`, `hide_profile`, `gender`, `is_blocked`, `dob`, `created_id`, `updated_id`, `created_time`, `updated_time`, `location`) VALUES
(8, 'admin', '', '', 'admin', 'admin', '0192023a7bbd73250516f069df18b500', '', 1, '', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-03-13 09:03:07', '0000-00-00 00:00:00', ''),
(9, 'rr', 'k', '', 'rk', 'rk', 'rk123', '', 1, '', 0, 0, 'female', 0, '0000-00-00', 0, 0, '2015-03-14 14:21:19', '0000-00-00 00:00:00', ''),
(10, 'jk', 'k', '', 'jk', 'jk', 'jk123', '', 1, '', 0, 0, NULL, 0, '0000-00-00', 0, 0, '2015-03-14 14:21:41', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `jwb_user_follow`
--

CREATE TABLE IF NOT EXISTS `jwb_user_follow` (
`id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL,
  `follower_user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jwb_views`
--

CREATE TABLE IF NOT EXISTS `jwb_views` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jwb_action_logs`
--
ALTER TABLE `jwb_action_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_ci_sessions`
--
ALTER TABLE `jwb_ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `jwb_collections`
--
ALTER TABLE `jwb_collections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_favourites`
--
ALTER TABLE `jwb_favourites`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_follows`
--
ALTER TABLE `jwb_follows`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_likes`
--
ALTER TABLE `jwb_likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_messages`
--
ALTER TABLE `jwb_messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_roles`
--
ALTER TABLE `jwb_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_site_traffic`
--
ALTER TABLE `jwb_site_traffic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_usermeta`
--
ALTER TABLE `jwb_usermeta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_users`
--
ALTER TABLE `jwb_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_user_follow`
--
ALTER TABLE `jwb_user_follow`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwb_views`
--
ALTER TABLE `jwb_views`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jwb_action_logs`
--
ALTER TABLE `jwb_action_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_collections`
--
ALTER TABLE `jwb_collections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_favourites`
--
ALTER TABLE `jwb_favourites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_follows`
--
ALTER TABLE `jwb_follows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_likes`
--
ALTER TABLE `jwb_likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_messages`
--
ALTER TABLE `jwb_messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_roles`
--
ALTER TABLE `jwb_roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jwb_site_traffic`
--
ALTER TABLE `jwb_site_traffic`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_usermeta`
--
ALTER TABLE `jwb_usermeta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_users`
--
ALTER TABLE `jwb_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jwb_user_follow`
--
ALTER TABLE `jwb_user_follow`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jwb_views`
--
ALTER TABLE `jwb_views`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
