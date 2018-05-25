-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 09:23 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_group_permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `photo` varchar(128) DEFAULT 'user.png',
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `full_name`, `photo`, `phone`, `email`, `password`, `active`, `created`, `modified`) VALUES
(31, 1, 'Sumon Sarker', 'user.png', '01920025943', 'sumon@windmillbd.net', '$2y$10$hMMcumBQvOGuF7PPXQlU6.kc9Rifpka2rc0NQxulmZ1ydlr/SZGYe', 1, '2017-11-20 06:59:55', '2017-11-20 06:59:55'),
(35, 1, 'Robeul', 'user.png', '01920000000', 'robeul@windmillbd.net', '$2y$10$fRdRK.02pp9XT6HKJ2DtVOySbh4HL4a7.knbMTz2YnmZ3AW4MfZL2', 1, '2018-01-16 06:28:15', '2018-01-16 06:28:15'),
(36, 2, 'Rob1', 'user.png', '01922088046', 'robicse8@gmail.com', '$2y$10$fRdRK.02pp9XT6HKJ2DtVOySbh4HL4a7.knbMTz2YnmZ3AW4MfZL2', 1, '2018-01-16 06:28:15', '2018-01-16 06:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `title` varchar(64) CHARACTER SET utf8 NOT NULL,
  `prefix` varchar(32) CHARACTER SET utf8 DEFAULT '0' COMMENT 'For Prefix Routing',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `title`, `prefix`, `created`, `modified`) VALUES
(1, 'Administrators', 'administrator', '2017-01-10 16:07:42', '2017-10-29 08:09:36'),
(2, 'Supervisors', 'supervisor', '2017-11-06 02:56:25', '2017-11-06 02:56:25'),
(3, 'Agents', 'agent', '2018-05-09 04:45:24', '2018-05-09 04:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_controllers`
--

CREATE TABLE IF NOT EXISTS `user_group_controllers` (
  `id` int(11) NOT NULL,
  `controller_title` varchar(128) NOT NULL,
  `controller` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_controllers`
--

INSERT INTO `user_group_controllers` (`id`, `controller_title`, `controller`, `created`, `modified`) VALUES
(1, 'User Groups', 'UserGroups', '2017-10-15 05:03:04', '2018-01-02 10:05:26'),
(2, 'Users', 'Users', '2017-10-15 05:03:26', '2017-10-15 05:03:26'),
(4, 'User Group Controllers', 'UserGroupControllers', '2017-10-15 05:05:02', '2018-01-02 10:05:33'),
(5, 'User Group Controller Actions', 'UserGroupControllerActions', '2017-10-15 05:05:17', '2018-01-02 10:05:48'),
(6, 'User Group Permissions', 'UserGroupPermissions', '2017-10-15 05:05:40', '2018-01-02 10:05:56'),
(7, 'User Group Menus', 'UserGroupMenus', '2017-10-15 05:05:54', '2018-01-02 10:06:04'),
(8, 'User Group Menu Items', 'UserGroupMenuItems', '2017-10-15 05:06:09', '2018-01-02 10:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_controller_actions`
--

CREATE TABLE IF NOT EXISTS `user_group_controller_actions` (
  `id` int(11) NOT NULL,
  `user_group_controller_id` int(11) NOT NULL,
  `action_title` varchar(128) NOT NULL,
  `action` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_controller_actions`
--

INSERT INTO `user_group_controller_actions` (`id`, `user_group_controller_id`, `action_title`, `action`, `created`, `modified`) VALUES
(2, 5, 'Actions', 'index', '2018-01-01 00:00:00', '2018-01-01 00:00:00'),
(3, 1, 'Index', 'index', '2018-01-02 08:57:03', '2018-01-02 08:57:03'),
(4, 1, 'View', 'view', '2018-01-02 08:57:12', '2018-01-02 08:57:12'),
(5, 1, 'Add', 'add', '2018-01-02 08:57:13', '2018-01-02 08:57:13'),
(6, 1, 'Edit', 'edit', '2018-01-02 08:57:13', '2018-01-02 08:57:13'),
(7, 1, 'Delete', 'delete', '2018-01-02 08:57:14', '2018-01-02 08:57:14'),
(8, 2, 'Dashboard', 'dashboard', '2018-01-02 08:57:30', '2018-01-02 08:57:30'),
(9, 2, 'Index', 'index', '2018-01-02 08:57:31', '2018-01-02 08:57:31'),
(10, 2, 'View', 'view', '2018-01-02 08:57:32', '2018-01-02 08:57:32'),
(11, 2, 'Add', 'add', '2018-01-02 08:57:33', '2018-01-02 08:57:33'),
(14, 2, 'Delete', 'delete', '2018-01-02 08:57:37', '2018-01-02 08:57:37'),
(15, 2, 'Edit', 'edit', '2018-01-02 08:57:37', '2018-01-02 08:57:37'),
(16, 4, 'Index', 'index', '2018-01-02 08:58:56', '2018-01-02 08:58:56'),
(17, 4, 'View', 'view', '2018-01-02 08:58:57', '2018-01-02 08:58:57'),
(18, 4, 'Add', 'add', '2018-01-02 08:58:57', '2018-01-02 08:58:57'),
(19, 4, 'Edit', 'edit', '2018-01-02 08:58:58', '2018-01-02 08:58:58'),
(20, 4, 'Delete', 'delete', '2018-01-02 08:58:59', '2018-01-02 08:58:59'),
(21, 5, 'View', 'view', '2018-01-02 08:59:04', '2018-01-02 08:59:04'),
(22, 5, 'Add', 'add', '2018-01-02 08:59:04', '2018-01-02 08:59:04'),
(23, 5, 'Edit', 'edit', '2018-01-02 08:59:09', '2018-01-02 08:59:09'),
(24, 5, 'Delete', 'delete', '2018-01-02 08:59:11', '2018-01-02 08:59:11'),
(25, 5, 'AjaxGetActions', 'ajaxGetActions', '2018-01-02 08:59:11', '2018-01-02 08:59:11'),
(26, 5, 'AjaxAddOrDelete', 'ajaxAddOrDelete', '2018-01-02 08:59:12', '2018-01-02 08:59:12'),
(27, 6, 'Index', 'index', '2018-01-02 08:59:16', '2018-01-02 08:59:16'),
(28, 6, 'View', 'view', '2018-01-02 08:59:16', '2018-01-02 08:59:16'),
(29, 6, 'Add', 'add', '2018-01-02 08:59:17', '2018-01-02 08:59:17'),
(30, 6, 'Edit', 'edit', '2018-01-02 08:59:18', '2018-01-02 08:59:18'),
(31, 6, 'Delete', 'delete', '2018-01-02 08:59:18', '2018-01-02 08:59:18'),
(32, 6, 'AjaxGetActions', 'ajaxGetActions', '2018-01-02 08:59:19', '2018-01-02 08:59:19'),
(33, 6, 'AjaxAddOrDelete', 'ajaxAddOrDelete', '2018-01-02 08:59:22', '2018-01-02 08:59:22'),
(34, 7, 'Index', 'index', '2018-01-02 08:59:28', '2018-01-02 08:59:28'),
(35, 7, 'View', 'view', '2018-01-02 08:59:29', '2018-01-02 08:59:29'),
(36, 7, 'Add', 'add', '2018-01-02 08:59:30', '2018-01-02 08:59:30'),
(37, 7, 'Edit', 'edit', '2018-01-02 08:59:30', '2018-01-02 08:59:30'),
(38, 7, 'Delete', 'delete', '2018-01-02 08:59:32', '2018-01-02 08:59:32'),
(39, 7, 'AjaxGetActions', 'ajaxGetActions', '2018-01-02 08:59:35', '2018-01-02 08:59:35'),
(40, 8, 'Index', 'index', '2018-01-02 08:59:38', '2018-01-02 08:59:38'),
(41, 8, 'View', 'view', '2018-01-02 08:59:38', '2018-01-02 08:59:38'),
(42, 8, 'Add', 'add', '2018-01-02 08:59:40', '2018-01-02 08:59:40'),
(43, 8, 'Edit', 'edit', '2018-01-02 08:59:41', '2018-01-02 08:59:41'),
(44, 8, 'Delete', 'delete', '2018-01-02 08:59:42', '2018-01-02 08:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_menus`
--

CREATE TABLE IF NOT EXISTS `user_group_menus` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `menu_icon` varchar(64) NOT NULL DEFAULT 'fa fa-object-group',
  `left_sidebar` tinyint(4) NOT NULL,
  `dashboard` tinyint(4) NOT NULL,
  `controller` varchar(64) NOT NULL,
  `action` varchar(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_menus`
--

INSERT INTO `user_group_menus` (`id`, `user_group_id`, `title`, `menu_icon`, `left_sidebar`, `dashboard`, `controller`, `action`, `created`, `modified`) VALUES
(4, 1, 'User Groups', 'fa fa-users', 1, 1, 'UserGroups', 'index', '2018-01-02 09:04:49', '2018-01-02 10:38:09'),
(5, 1, 'Users', 'fa fa-user', 1, 1, 'Users', 'index', '2018-01-02 09:05:37', '2018-01-02 10:38:44'),
(6, 1, 'Controllers', 'fa fa-object-group', 1, 1, 'UserGroupControllers', 'index', '2018-01-02 09:05:57', '2018-01-02 09:05:57'),
(7, 1, 'Actions', 'fa fa-object-group', 1, 1, 'UserGroupControllerActions', 'index', '2018-01-02 09:39:33', '2018-01-02 09:39:33'),
(8, 1, 'Menus', 'fa fa-object-group', 1, 1, 'UserGroupMenus', 'index', '2018-01-02 09:40:18', '2018-01-02 09:40:18'),
(9, 1, 'Menu Items', 'fa fa-object-group', 1, 1, 'UserGroupMenuItems', 'index', '2018-01-02 09:40:43', '2018-01-02 09:40:43'),
(17, 1, 'Group Permissions', 'fa fa-object-group', 1, 1, 'UserGroupPermissions', 'index', '2018-01-02 09:40:43', '2018-01-02 09:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_menu_items`
--

CREATE TABLE IF NOT EXISTS `user_group_menu_items` (
  `id` int(11) NOT NULL,
  `user_group_menu_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `controller` varchar(128) NOT NULL,
  `action` varchar(128) NOT NULL,
  `menu_icon` varchar(64) NOT NULL DEFAULT 'fa fa-object-group',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_menu_items`
--

INSERT INTO `user_group_menu_items` (`id`, `user_group_menu_id`, `title`, `controller`, `action`, `menu_icon`, `created`, `modified`) VALUES
(1, 4, 'List View', 'UserGroups', 'index', 'fa fa-object-group', '2018-01-02 11:22:26', '2018-01-02 11:22:26'),
(2, 4, 'Add', 'UserGroups', 'add', 'fa fa-object-group', '2018-01-02 11:22:26', '2018-01-02 11:22:26'),
(3, 5, 'List View', 'Users', 'index', 'fa fa-object-group', '2018-01-02 11:23:02', '2018-01-02 11:23:02'),
(4, 5, 'Add', 'Users', 'add', 'fa fa-object-group', '2018-01-02 11:23:02', '2018-01-02 11:23:02'),
(5, 6, 'List View', 'UserGroupControllers', 'index', 'fa fa-object-group', '2018-01-02 11:25:46', '2018-01-02 11:25:46'),
(6, 6, 'Add', 'UserGroupControllers', 'add', 'fa fa-object-group', '2018-01-02 11:25:46', '2018-01-02 11:25:46'),
(7, 7, 'List View', 'UserGroupControllerActions', 'index', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59'),
(8, 7, 'Add', 'UserGroupControllerActions', 'add', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59'),
(9, 8, 'List View', 'UserGroupMenus', 'index', 'fa fa-object-group', '2018-01-16 05:59:57', '2018-01-16 05:59:59'),
(10, 8, 'Add', 'UserGroupMenus', 'add', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59'),
(11, 9, 'List View', 'UserGroupMenuItems', 'index', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:57:59'),
(12, 9, 'Add', 'UserGroupMenuItems', 'add', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59'),
(13, 17, 'List View', 'UserGroupPermissions', 'index', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59'),
(14, 17, 'Add', 'UserGroupPermissions', 'add', 'fa fa-object-group', '2018-01-16 05:59:59', '2018-01-16 05:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_group_controller_id` int(11) NOT NULL,
  `user_group_controller_action_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_permissions`
--

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `user_group_controller_id`, `user_group_controller_action_id`, `created`, `modified`) VALUES
(72, 1, 1, 3, '2018-01-16 06:17:11', '2018-01-16 06:17:11'),
(73, 1, 1, 4, '2018-01-16 06:17:12', '2018-01-16 06:17:12'),
(74, 1, 1, 5, '2018-01-16 06:17:13', '2018-01-16 06:17:13'),
(75, 1, 1, 6, '2018-01-16 06:17:13', '2018-01-16 06:17:13'),
(76, 1, 1, 7, '2018-01-16 06:17:14', '2018-01-16 06:17:14'),
(77, 1, 2, 8, '2018-01-16 06:17:17', '2018-01-16 06:17:17'),
(78, 1, 2, 9, '2018-01-16 06:17:17', '2018-01-16 06:17:17'),
(79, 1, 2, 10, '2018-01-16 06:17:18', '2018-01-16 06:17:18'),
(80, 1, 2, 11, '2018-01-16 06:17:18', '2018-01-16 06:17:18'),
(81, 1, 2, 15, '2018-01-16 06:17:19', '2018-01-16 06:17:19'),
(82, 1, 2, 14, '2018-01-16 06:17:20', '2018-01-16 06:17:20'),
(83, 1, 4, 16, '2018-01-16 06:17:23', '2018-01-16 06:17:23'),
(84, 1, 4, 17, '2018-01-16 06:17:23', '2018-01-16 06:17:23'),
(85, 1, 4, 19, '2018-01-16 06:17:24', '2018-01-16 06:17:24'),
(86, 1, 4, 18, '2018-01-16 06:17:25', '2018-01-16 06:17:25'),
(87, 1, 4, 20, '2018-01-16 06:17:26', '2018-01-16 06:17:26'),
(88, 1, 5, 2, '2018-01-16 06:17:29', '2018-01-16 06:17:29'),
(89, 1, 5, 21, '2018-01-16 06:17:30', '2018-01-16 06:17:30'),
(90, 1, 5, 22, '2018-01-16 06:17:31', '2018-01-16 06:17:31'),
(91, 1, 5, 23, '2018-01-16 06:17:33', '2018-01-16 06:17:33'),
(92, 1, 5, 26, '2018-01-16 06:17:33', '2018-01-16 06:17:33'),
(93, 1, 5, 25, '2018-01-16 06:17:34', '2018-01-16 06:17:34'),
(94, 1, 5, 24, '2018-01-16 06:17:35', '2018-01-16 06:17:35'),
(95, 1, 6, 27, '2018-01-16 06:17:39', '2018-01-16 06:17:39'),
(96, 1, 6, 28, '2018-01-16 06:17:40', '2018-01-16 06:17:40'),
(97, 1, 6, 29, '2018-01-16 06:17:40', '2018-01-16 06:17:40'),
(98, 1, 6, 30, '2018-01-16 06:17:41', '2018-01-16 06:17:41'),
(99, 1, 6, 33, '2018-01-16 06:17:42', '2018-01-16 06:17:42'),
(100, 1, 6, 32, '2018-01-16 06:17:42', '2018-01-16 06:17:42'),
(101, 1, 6, 31, '2018-01-16 06:17:43', '2018-01-16 06:17:43'),
(102, 1, 7, 34, '2018-01-16 06:17:47', '2018-01-16 06:17:47'),
(103, 1, 7, 36, '2018-01-16 06:17:49', '2018-01-16 06:17:49'),
(104, 1, 7, 35, '2018-01-16 06:17:49', '2018-01-16 06:17:49'),
(105, 1, 7, 37, '2018-01-16 06:17:50', '2018-01-16 06:17:50'),
(106, 1, 7, 39, '2018-01-16 06:17:51', '2018-01-16 06:17:51'),
(107, 1, 7, 38, '2018-01-16 06:17:52', '2018-01-16 06:17:52'),
(108, 1, 8, 40, '2018-01-16 06:17:55', '2018-01-16 06:17:55'),
(109, 1, 8, 41, '2018-01-16 06:17:56', '2018-01-16 06:17:56'),
(110, 1, 8, 42, '2018-01-16 06:17:57', '2018-01-16 06:17:57'),
(111, 1, 8, 43, '2018-01-16 06:17:57', '2018-01-16 06:17:57'),
(112, 1, 8, 44, '2018-01-16 06:17:58', '2018-01-16 06:17:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`), ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`title`), ADD UNIQUE KEY `prefix` (`prefix`);

--
-- Indexes for table `user_group_controllers`
--
ALTER TABLE `user_group_controllers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `controller` (`controller`);

--
-- Indexes for table `user_group_controller_actions`
--
ALTER TABLE `user_group_controller_actions`
  ADD PRIMARY KEY (`id`), ADD KEY `user_group_controller_id` (`user_group_controller_id`);

--
-- Indexes for table `user_group_menus`
--
ALTER TABLE `user_group_menus`
  ADD PRIMARY KEY (`id`), ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_group_menu_items`
--
ALTER TABLE `user_group_menu_items`
  ADD PRIMARY KEY (`id`), ADD KEY `user_group_menu_id` (`user_group_menu_id`);

--
-- Indexes for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD PRIMARY KEY (`id`), ADD KEY `user_group_id` (`user_group_id`), ADD KEY `user_group_controller_id` (`user_group_controller_id`), ADD KEY `user_group_controller_action_id` (`user_group_controller_action_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_group_controllers`
--
ALTER TABLE `user_group_controllers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_group_controller_actions`
--
ALTER TABLE `user_group_controller_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user_group_menus`
--
ALTER TABLE `user_group_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_group_menu_items`
--
ALTER TABLE `user_group_menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`);

--
-- Constraints for table `user_group_controller_actions`
--
ALTER TABLE `user_group_controller_actions`
ADD CONSTRAINT `user_group_controller_actions_ibfk_1` FOREIGN KEY (`user_group_controller_id`) REFERENCES `user_group_controllers` (`id`);

--
-- Constraints for table `user_group_menus`
--
ALTER TABLE `user_group_menus`
ADD CONSTRAINT `user_group_menus_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`);

--
-- Constraints for table `user_group_menu_items`
--
ALTER TABLE `user_group_menu_items`
ADD CONSTRAINT `user_group_menu_items_ibfk_1` FOREIGN KEY (`user_group_menu_id`) REFERENCES `user_group_menus` (`id`);

--
-- Constraints for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
ADD CONSTRAINT `user_group_permissions_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`),
ADD CONSTRAINT `user_group_permissions_ibfk_2` FOREIGN KEY (`user_group_controller_id`) REFERENCES `user_group_controllers` (`id`),
ADD CONSTRAINT `user_group_permissions_ibfk_3` FOREIGN KEY (`user_group_controller_action_id`) REFERENCES `user_group_controller_actions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
