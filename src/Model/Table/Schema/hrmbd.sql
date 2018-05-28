-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 08:57 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrmbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE IF NOT EXISTS `advances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(16) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_machines`
--

CREATE TABLE IF NOT EXISTS `attendance_machines` (
  `id` int(11) NOT NULL,
  `card_unique_id` int(16) NOT NULL,
  `card_number` int(16) NOT NULL,
  `attendance_date` varchar(16) NOT NULL,
  `office_in_time` varchar(16) NOT NULL,
  `office_out_time` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'Brack Bank', 'active', '2018-05-25 15:53:26', '2018-05-25 15:53:26'),
(2, 'dutch bangla bank', 'active', '2018-05-25 15:53:26', '2018-05-25 15:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `bank_branchs`
--

CREATE TABLE IF NOT EXISTS `bank_branchs` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_branchs`
--

INSERT INTO `bank_branchs` (`id`, `bank_id`, `title`, `status`, `created`, `modified`) VALUES
(1, 1, 'Badda', 'active', '2018-05-25 16:11:26', '2018-05-25 16:11:26'),
(2, 1, 'Gulshan', 'active', '2018-05-25 16:11:39', '2018-05-25 16:11:39'),
(3, 2, 'Banani', 'active', '2018-05-25 16:11:39', '2018-05-25 16:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'IT & Web Development', 'active', '2018-05-25 16:45:01', '2018-05-25 16:45:01'),
(2, 'Business', 'active', '2018-05-25 16:45:12', '2018-05-25 16:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `department_sections`
--

CREATE TABLE IF NOT EXISTS `department_sections` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department_sections`
--

INSERT INTO `department_sections` (`id`, `department_id`, `title`, `status`, `created`, `modified`) VALUES
(1, 1, 'IT', 'active', '2018-05-25 17:12:32', '2018-05-25 17:12:32'),
(2, 1, 'Web', 'active', '2018-05-25 17:14:18', '2018-05-25 17:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `duty_schedules`
--

CREATE TABLE IF NOT EXISTS `duty_schedules` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `start_time` varchar(16) NOT NULL,
  `late_time` varchar(16) NOT NULL,
  `end_time` varchar(16) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duty_schedules`
--

INSERT INTO `duty_schedules` (`id`, `title`, `start_time`, `late_time`, `end_time`, `status`, `created`, `modified`) VALUES
(1, 'General', '9:00 AM', '9:15 AM', '6:00 PM', 'active', '2018-05-25 17:40:03', '2018-05-25 17:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

CREATE TABLE IF NOT EXISTS `employee_types` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'Regular', 'active', '2018-05-27 07:05:52', '2018-05-27 07:05:52'),
(2, 'Intern/Probition Period/ Temporary Contractual', 'active', '2018-05-27 07:06:08', '2018-05-27 07:06:08'),
(3, 'Annual Contractual', 'active', '2018-05-27 07:06:25', '2018-05-27 07:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type_designations`
--

CREATE TABLE IF NOT EXISTS `employee_type_designations` (
  `id` int(11) NOT NULL,
  `employee_type_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_type_designations`
--

INSERT INTO `employee_type_designations` (`id`, `employee_type_id`, `title`, `status`, `created`, `modified`) VALUES
(1, 1, 'Sr. Software Engineer', 'active', '2018-05-27 07:53:06', '2018-05-27 07:53:06'),
(2, 1, 'Software Engineer', 'active', '2018-05-27 07:53:23', '2018-05-27 07:53:23'),
(3, 1, 'Web Developer', 'active', '2018-05-27 07:53:42', '2018-05-27 07:53:42'),
(4, 1, 'System Engineer', 'active', '2018-05-27 07:54:30', '2018-05-27 07:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(8) NOT NULL,
  `date` varchar(16) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `title`, `year`, `month`, `date`, `status`, `created`, `modified`) VALUES
(1, 'Shab-E-Qadar', '2018', '06', '2018-06-12', 'active', '2018-05-27 15:47:50', '2018-05-27 15:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `kpis`
--

CREATE TABLE IF NOT EXISTS `kpis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `kpi_status` enum('add','deduct') NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_categorys`
--

CREATE TABLE IF NOT EXISTS `leave_categorys` (
  `id` int(11) NOT NULL,
  `title` varchar(16) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_categorys`
--

INSERT INTO `leave_categorys` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'Casual', 'active', '2018-05-28 03:58:32', '2018-05-28 03:58:32'),
(2, 'Earned', 'active', '2018-05-28 03:58:52', '2018-05-28 03:58:52'),
(3, 'Medical', 'active', '2018-05-28 03:59:09', '2018-05-28 03:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `leave_packages`
--

CREATE TABLE IF NOT EXISTS `leave_packages` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `casual` int(4) NOT NULL,
  `sick` int(4) NOT NULL,
  `earned` int(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_packages`
--

INSERT INTO `leave_packages` (`id`, `title`, `casual`, `sick`, `earned`, `status`, `created`, `modified`) VALUES
(1, 'Regular Leave Package', 7, 7, 7, 'active', '2018-05-27 16:11:24', '2018-05-27 16:11:24'),
(2, 'Probation Package', 0, 0, 0, 'active', '2018-05-27 16:12:02', '2018-05-27 16:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `leave_payable_types`
--

CREATE TABLE IF NOT EXISTS `leave_payable_types` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_payable_types`
--

INSERT INTO `leave_payable_types` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'with_pay', 'active', '2018-05-28 04:17:52', '2018-05-28 04:17:52'),
(2, 'without_pay', 'active', '2018-05-28 04:18:40', '2018-05-28 04:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `leave_quarters`
--

CREATE TABLE IF NOT EXISTS `leave_quarters` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `start_date` varchar(16) NOT NULL,
  `end_date` varchar(16) NOT NULL,
  `casual_duration` varchar(4) NOT NULL,
  `sick_duration` varchar(4) NOT NULL,
  `earned_duration` varchar(4) NOT NULL,
  `total_duration` varchar(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_quarters`
--

INSERT INTO `leave_quarters` (`id`, `title`, `start_date`, `end_date`, `casual_duration`, `sick_duration`, `earned_duration`, `total_duration`, `created`, `modified`) VALUES
(1, '1st', '2018-01-01', '2018-04-30', '2', '3', '2', '7', '2018-05-28 03:40:50', '2018-05-28 03:40:50'),
(2, '2nd', '2018-05-01', '2018-08-31', '2', '2', '3', '7', '2018-05-28 03:42:14', '2018-05-28 03:42:14'),
(3, '3rd', '2018-09-01', '2018-12-31', '3', '2', '2', '7', '2018-05-28 03:43:23', '2018-05-28 03:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Issue_date` varchar(16) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `monthly_installment` varchar(8) NOT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(16) NOT NULL,
  `total_deduct` varchar(16) NOT NULL,
  `remain_amount` varchar(16) NOT NULL,
  `remarks` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_deductions`
--

CREATE TABLE IF NOT EXISTS `loan_deductions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(16) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `over_times`
--

CREATE TABLE IF NOT EXISTS `over_times` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(16) NOT NULL,
  `hour` int(8) NOT NULL,
  `amount_of_salary_per_hour` varchar(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salarys`
--

CREATE TABLE IF NOT EXISTS `salarys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `join_date` varchar(16) NOT NULL,
  `gross_salary` varchar(16) NOT NULL,
  `basic` varchar(8) NOT NULL,
  `house_rent` varchar(8) NOT NULL,
  `medical` varchar(8) NOT NULL,
  `conveyance` varchar(8) NOT NULL,
  `special` varchar(8) NOT NULL,
  `mobile_bill` varchar(8) NOT NULL,
  `kpi` varchar(8) NOT NULL,
  `gross_payable` varchar(8) NOT NULL,
  `total_month_day` varchar(8) NOT NULL,
  `present` varchar(8) NOT NULL,
  `late` varchar(8) NOT NULL,
  `absent` varchar(8) NOT NULL,
  `pf_employee` varchar(8) NOT NULL,
  `pf_employeer` varchar(8) NOT NULL,
  `total_pf` varchar(8) NOT NULL,
  `loan` varchar(8) NOT NULL,
  `tax` varchar(8) NOT NULL,
  `mobile_bill_deduction` varchar(8) NOT NULL,
  `advance` varchar(8) NOT NULL,
  `absent_deduction` varchar(8) NOT NULL,
  `bonus` varchar(8) NOT NULL,
  `over_time` varchar(8) NOT NULL,
  `net_salary` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `card_uniqueid` int(16) NOT NULL,
  `card_number` varchar(32) NOT NULL,
  `join_date` varchar(16) NOT NULL,
  `confirmation_date` varchar(16) NOT NULL,
  `personal_email` varchar(128) NOT NULL,
  `present_address` varchar(128) NOT NULL,
  `permanent_address` varchar(128) NOT NULL,
  `date_of_birth` varchar(16) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `marital_status` enum('single','married') NOT NULL,
  `nationalid` varchar(32) NOT NULL,
  `blood` varchar(8) NOT NULL,
  `emergency_number` varchar(11) NOT NULL,
  `emergency_number_relation` varchar(32) NOT NULL,
  `notice_period` int(11) NOT NULL,
  `provident_fund` enum('yes','no') NOT NULL,
  `salary_bank_payment_mode` enum('yes','no') NOT NULL DEFAULT 'no',
  `bank_id` int(11) NOT NULL,
  `bank_branch_id` int(11) NOT NULL,
  `account_number` varchar(32) NOT NULL,
  `reference_name` varchar(64) NOT NULL,
  `reference_contact_number` int(11) NOT NULL,
  `reference_email` varchar(64) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_section_id` int(11) NOT NULL,
  `employee_type_id` int(11) NOT NULL,
  `employee_type_designation_id` int(11) NOT NULL,
  `duty_schedule_id` int(11) NOT NULL,
  `leave_package_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `supervisor_designation_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `full_name`, `photo`, `phone`, `email`, `password`, `card_uniqueid`, `card_number`, `join_date`, `confirmation_date`, `personal_email`, `present_address`, `permanent_address`, `date_of_birth`, `gender`, `marital_status`, `nationalid`, `blood`, `emergency_number`, `emergency_number_relation`, `notice_period`, `provident_fund`, `salary_bank_payment_mode`, `bank_id`, `bank_branch_id`, `account_number`, `reference_name`, `reference_contact_number`, `reference_email`, `department_id`, `department_section_id`, `employee_type_id`, `employee_type_designation_id`, `duty_schedule_id`, `leave_package_id`, `supervisor_id`, `supervisor_designation_id`, `active`, `created`, `modified`) VALUES
(31, 1, 'Kamal', 'user.png', '01920025943', 'kamal@windmillbd.net', '$2y$10$hMMcumBQvOGuF7PPXQlU6.kc9Rifpka2rc0NQxulmZ1ydlr/SZGYe', 0, '', '', '', '', '', '', '', 'male', 'single', '', '', '', '', 0, 'yes', 'no', 0, 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, '2017-11-20 06:59:55', '2017-11-20 06:59:55'),
(35, 1, 'Robeul', 'user.png', '01920000000', 'robeul@windmillbd.net', '$2y$10$fRdRK.02pp9XT6HKJ2DtVOySbh4HL4a7.knbMTz2YnmZ3AW4MfZL2', 121212, '232323', '2018-05-01', '2018-05-14', 'test@gmail.com', 'test a', 'test b', '2018-03-01', 'male', 'single', '2322345', '0+', '01799999900', 'bro', 30, 'no', 'yes', 0, 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, '2018-01-16 06:28:15', '2018-05-28 06:23:35'),
(36, 2, 'Robi', 'user.png', '01922088046', 'robicse8@gmail.com', '$2y$10$fRdRK.02pp9XT6HKJ2DtVOySbh4HL4a7.knbMTz2YnmZ3AW4MfZL2', 0, '', '', '', '', '', '', '', 'male', 'single', '', '', '', '', 0, 'yes', 'no', 0, 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, '2018-01-16 06:28:15', '2018-01-16 06:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_academics`
--

CREATE TABLE IF NOT EXISTS `user_academics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_name` varchar(32) NOT NULL,
  `institute_name` varchar(64) NOT NULL,
  `passing_year` varchar(8) NOT NULL,
  `result` varchar(8) NOT NULL,
  `note` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_appraisals`
--

CREATE TABLE IF NOT EXISTS `user_appraisals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_type_designation_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `effective_date` varchar(16) NOT NULL,
  `salary_pay_scale` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_attendances`
--

CREATE TABLE IF NOT EXISTS `user_attendances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(16) NOT NULL,
  `year` int(16) NOT NULL,
  `month` int(16) NOT NULL,
  `attendance_date` int(16) NOT NULL,
  `office_in_time` int(16) NOT NULL,
  `office_out_time` int(16) NOT NULL,
  `status` enum('present','late','absent','holiday','weekend') NOT NULL,
  `user_comment` text NOT NULL,
  `supervisor_comment` text NOT NULL,
  `supervisor_approve` enum('not decided','approved','deny') NOT NULL,
  `hr_comment` text NOT NULL,
  `hr_approve` enum('not decided','approved','deny') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_attendance_requests`
--

CREATE TABLE IF NOT EXISTS `user_attendance_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `year` varchar(16) NOT NULL,
  `month` varchar(16) NOT NULL,
  `supervisor_status` varchar(8) NOT NULL,
  `hr_status` varchar(8) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_career_historys`
--

CREATE TABLE IF NOT EXISTS `user_career_historys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `designation` varchar(64) NOT NULL,
  `start_date` varchar(32) NOT NULL,
  `end_date` varchar(32) NOT NULL,
  `note` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE IF NOT EXISTS `user_documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
(8, 'User Group Menu Items', 'UserGroupMenuItems', '2017-10-15 05:06:09', '2018-01-02 10:06:26'),
(9, 'Banks', 'Banks', '2018-05-25 15:47:52', '2018-05-25 15:47:52'),
(10, 'Bank Branchs', 'BankBranchs', '2018-05-25 16:06:22', '2018-05-25 16:06:22'),
(11, 'Departments', 'Departments', '2018-05-25 16:36:30', '2018-05-25 16:36:30'),
(12, 'Department Sections', 'DepartmentSections', '2018-05-25 17:06:10', '2018-05-25 17:06:10'),
(13, 'Duty Schedules', 'DutySchedules', '2018-05-25 17:34:12', '2018-05-25 17:34:12'),
(14, 'Employee Types', 'EmployeeTypes', '2018-05-27 06:57:20', '2018-05-27 06:57:20'),
(15, 'Employee Type Designations', 'EmployeeTypeDesignations', '2018-05-27 07:16:54', '2018-05-27 07:16:54'),
(16, 'Weekends', 'Weekends', '2018-05-27 08:01:01', '2018-05-27 08:01:01'),
(17, 'Holidays', 'Holidays', '2018-05-27 15:35:16', '2018-05-27 15:35:16'),
(19, 'Leave Packages ', 'LeavePackages', '2018-05-27 16:01:27', '2018-05-27 16:01:27'),
(20, 'Leave Quarters', 'LeaveQuarters', '2018-05-27 16:33:26', '2018-05-27 16:33:26'),
(21, 'Leave Categorys', 'LeaveCategorys', '2018-05-28 03:54:04', '2018-05-28 03:54:04'),
(22, 'Leave Payable Types', 'LeavePayableTypes', '2018-05-28 04:14:02', '2018-05-28 04:14:02');

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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

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
(44, 8, 'Delete', 'delete', '2018-01-02 08:59:42', '2018-01-02 08:59:42'),
(45, 9, 'Index', 'index', '2018-05-25 15:48:10', '2018-05-25 15:48:10'),
(46, 9, 'View', 'view', '2018-05-25 15:48:11', '2018-05-25 15:48:11'),
(47, 9, 'Add', 'add', '2018-05-25 15:48:12', '2018-05-25 15:48:12'),
(48, 9, 'Edit', 'edit', '2018-05-25 15:48:13', '2018-05-25 15:48:13'),
(49, 9, 'Delete', 'delete', '2018-05-25 15:48:15', '2018-05-25 15:48:15'),
(50, 10, 'Index', 'index', '2018-05-25 16:06:34', '2018-05-25 16:06:34'),
(51, 10, 'View', 'view', '2018-05-25 16:06:36', '2018-05-25 16:06:36'),
(52, 10, 'Add', 'add', '2018-05-25 16:06:37', '2018-05-25 16:06:37'),
(53, 10, 'Edit', 'edit', '2018-05-25 16:06:37', '2018-05-25 16:06:37'),
(54, 10, 'Delete', 'delete', '2018-05-25 16:06:38', '2018-05-25 16:06:38'),
(55, 11, 'Index', 'index', '2018-05-25 16:40:01', '2018-05-25 16:40:01'),
(56, 11, 'View', 'view', '2018-05-25 16:40:02', '2018-05-25 16:40:02'),
(57, 11, 'Add', 'add', '2018-05-25 16:40:03', '2018-05-25 16:40:03'),
(58, 11, 'Edit', 'edit', '2018-05-25 16:40:04', '2018-05-25 16:40:04'),
(59, 11, 'Delete', 'delete', '2018-05-25 16:40:05', '2018-05-25 16:40:05'),
(60, 12, 'Index', 'index', '2018-05-25 17:06:23', '2018-05-25 17:06:23'),
(61, 12, 'View', 'view', '2018-05-25 17:06:24', '2018-05-25 17:06:24'),
(62, 12, 'Add', 'add', '2018-05-25 17:06:25', '2018-05-25 17:06:25'),
(63, 12, 'Edit', 'edit', '2018-05-25 17:06:26', '2018-05-25 17:06:26'),
(64, 12, 'Delete', 'delete', '2018-05-25 17:06:27', '2018-05-25 17:06:27'),
(65, 13, 'Index', 'index', '2018-05-25 17:34:22', '2018-05-25 17:34:22'),
(66, 13, 'View', 'view', '2018-05-25 17:34:24', '2018-05-25 17:34:24'),
(67, 13, 'Add', 'add', '2018-05-25 17:34:25', '2018-05-25 17:34:25'),
(68, 13, 'Edit', 'edit', '2018-05-25 17:34:26', '2018-05-25 17:34:26'),
(69, 13, 'Delete', 'delete', '2018-05-25 17:34:27', '2018-05-25 17:34:27'),
(70, 14, 'Index', 'index', '2018-05-27 06:58:49', '2018-05-27 06:58:49'),
(71, 14, 'View', 'view', '2018-05-27 06:58:50', '2018-05-27 06:58:50'),
(72, 14, 'Add', 'add', '2018-05-27 06:58:51', '2018-05-27 06:58:51'),
(73, 14, 'Edit', 'edit', '2018-05-27 06:58:52', '2018-05-27 06:58:52'),
(74, 14, 'Delete', 'delete', '2018-05-27 06:58:53', '2018-05-27 06:58:53'),
(75, 15, 'Index', 'index', '2018-05-27 07:17:05', '2018-05-27 07:17:05'),
(76, 15, 'View', 'view', '2018-05-27 07:17:06', '2018-05-27 07:17:06'),
(77, 15, 'Add', 'add', '2018-05-27 07:17:07', '2018-05-27 07:17:07'),
(78, 15, 'Edit', 'edit', '2018-05-27 07:17:07', '2018-05-27 07:17:07'),
(79, 15, 'Delete', 'delete', '2018-05-27 07:17:08', '2018-05-27 07:17:08'),
(80, 16, 'Index', 'index', '2018-05-27 08:01:13', '2018-05-27 08:01:13'),
(81, 16, 'View', 'view', '2018-05-27 08:01:14', '2018-05-27 08:01:14'),
(82, 16, 'Add', 'add', '2018-05-27 08:01:15', '2018-05-27 08:01:15'),
(83, 16, 'Edit', 'edit', '2018-05-27 08:01:15', '2018-05-27 08:01:15'),
(84, 16, 'Delete', 'delete', '2018-05-27 08:01:16', '2018-05-27 08:01:16'),
(85, 17, 'Index', 'index', '2018-05-27 15:35:58', '2018-05-27 15:35:58'),
(86, 17, 'View', 'view', '2018-05-27 15:35:59', '2018-05-27 15:35:59'),
(87, 17, 'Add', 'add', '2018-05-27 15:36:00', '2018-05-27 15:36:00'),
(88, 17, 'Edit', 'edit', '2018-05-27 15:36:01', '2018-05-27 15:36:01'),
(89, 17, 'Delete', 'delete', '2018-05-27 15:36:02', '2018-05-27 15:36:02'),
(90, 19, 'Index', 'index', '2018-05-27 16:02:18', '2018-05-27 16:02:18'),
(91, 19, 'View', 'view', '2018-05-27 16:02:19', '2018-05-27 16:02:19'),
(92, 19, 'Add', 'add', '2018-05-27 16:02:21', '2018-05-27 16:02:21'),
(93, 19, 'Edit', 'edit', '2018-05-27 16:02:21', '2018-05-27 16:02:21'),
(94, 19, 'Delete', 'delete', '2018-05-27 16:02:22', '2018-05-27 16:02:22'),
(95, 20, 'Index', 'index', '2018-05-27 16:33:37', '2018-05-27 16:33:37'),
(96, 20, 'View', 'view', '2018-05-27 16:33:38', '2018-05-27 16:33:38'),
(97, 20, 'Add', 'add', '2018-05-27 16:33:39', '2018-05-27 16:33:39'),
(98, 20, 'Edit', 'edit', '2018-05-27 16:33:41', '2018-05-27 16:33:41'),
(99, 20, 'Delete', 'delete', '2018-05-27 16:33:42', '2018-05-27 16:33:42'),
(100, 21, 'Index', 'index', '2018-05-28 03:54:24', '2018-05-28 03:54:24'),
(101, 21, 'View', 'view', '2018-05-28 03:54:25', '2018-05-28 03:54:25'),
(102, 21, 'Add', 'add', '2018-05-28 03:54:25', '2018-05-28 03:54:25'),
(103, 21, 'Edit', 'edit', '2018-05-28 03:54:27', '2018-05-28 03:54:27'),
(104, 21, 'Delete', 'delete', '2018-05-28 03:54:29', '2018-05-28 03:54:29'),
(105, 22, 'Index', 'index', '2018-05-28 04:14:25', '2018-05-28 04:14:25'),
(106, 22, 'View', 'view', '2018-05-28 04:14:26', '2018-05-28 04:14:26'),
(107, 22, 'Add', 'add', '2018-05-28 04:14:26', '2018-05-28 04:14:26'),
(108, 22, 'Edit', 'edit', '2018-05-28 04:14:28', '2018-05-28 04:14:28'),
(109, 22, 'Delete', 'delete', '2018-05-28 04:14:29', '2018-05-28 04:14:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(17, 1, 'Group Permissions', 'fa fa-object-group', 1, 1, 'UserGroupPermissions', 'index', '2018-01-02 09:40:43', '2018-01-02 09:40:43'),
(18, 1, 'Banks', 'fa fa-object-group', 0, 1, 'Banks', 'index', '2018-05-25 15:48:49', '2018-05-25 15:48:49'),
(19, 1, 'Bank Branchs', 'fa fa-object-group', 0, 1, 'BankBranchs', 'index', '2018-05-25 16:07:03', '2018-05-25 16:07:03'),
(20, 1, 'Departments', 'fa fa-object-group', 0, 1, 'Departments', 'index', '2018-05-25 16:40:44', '2018-05-25 16:40:44'),
(21, 1, 'Department Sections', 'fa fa-object-group', 0, 1, 'DepartmentSections', 'index', '2018-05-25 17:06:53', '2018-05-25 17:06:53'),
(22, 1, 'Duty Schedules', 'fa fa-object-group', 0, 1, 'DutySchedules', 'index', '2018-05-25 17:34:47', '2018-05-25 17:34:47'),
(23, 1, 'Employee Types', 'fa fa-object-group', 0, 1, 'EmployeeTypes', 'index', '2018-05-27 06:59:19', '2018-05-27 06:59:19'),
(24, 1, 'Employee Type Designations', 'fa fa-object-group', 0, 1, 'EmployeeTypeDesignations', 'index', '2018-05-27 07:17:35', '2018-05-27 07:17:35'),
(25, 1, 'Weekends', 'fa fa-object-group', 0, 1, 'Weekends', 'index', '2018-05-27 08:01:36', '2018-05-27 08:01:36'),
(26, 1, 'Holidays', 'fa fa-object-group', 0, 1, 'Holidays', 'index', '2018-05-27 15:36:21', '2018-05-27 15:36:21'),
(27, 1, 'LeavePackages', 'fa fa-object-group', 0, 1, 'LeavePackages', 'index', '2018-05-27 16:02:42', '2018-05-27 16:02:42'),
(28, 1, 'Leave Quarters', 'fa fa-object-group', 0, 1, 'LeaveQuarters', 'index', '2018-05-27 16:34:09', '2018-05-27 16:34:09'),
(29, 1, 'LeaveCategorys', 'fa fa-object-group', 0, 1, 'LeaveCategorys', 'index', '2018-05-28 03:54:52', '2018-05-28 03:54:52'),
(30, 1, 'Leave Payable Types', 'fa fa-object-group', 0, 1, 'LeavePayableTypes', 'index', '2018-05-28 04:14:49', '2018-05-28 04:14:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

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
(112, 1, 8, 44, '2018-01-16 06:17:58', '2018-01-16 06:17:58'),
(113, 1, 9, 45, '2018-05-25 15:49:15', '2018-05-25 15:49:15'),
(114, 1, 9, 46, '2018-05-25 15:49:16', '2018-05-25 15:49:16'),
(115, 1, 9, 47, '2018-05-25 15:49:17', '2018-05-25 15:49:17'),
(116, 1, 9, 48, '2018-05-25 15:49:17', '2018-05-25 15:49:17'),
(117, 1, 9, 49, '2018-05-25 15:49:18', '2018-05-25 15:49:18'),
(118, 1, 10, 50, '2018-05-25 16:07:15', '2018-05-25 16:07:15'),
(119, 1, 10, 51, '2018-05-25 16:07:16', '2018-05-25 16:07:16'),
(120, 1, 10, 52, '2018-05-25 16:07:17', '2018-05-25 16:07:17'),
(121, 1, 10, 53, '2018-05-25 16:07:18', '2018-05-25 16:07:18'),
(122, 1, 10, 54, '2018-05-25 16:07:19', '2018-05-25 16:07:19'),
(123, 1, 11, 55, '2018-05-25 16:41:12', '2018-05-25 16:41:12'),
(124, 1, 11, 56, '2018-05-25 16:41:13', '2018-05-25 16:41:13'),
(125, 1, 11, 57, '2018-05-25 16:41:14', '2018-05-25 16:41:14'),
(126, 1, 11, 58, '2018-05-25 16:41:15', '2018-05-25 16:41:15'),
(127, 1, 11, 59, '2018-05-25 16:41:16', '2018-05-25 16:41:16'),
(128, 1, 12, 60, '2018-05-25 17:07:04', '2018-05-25 17:07:04'),
(129, 1, 12, 61, '2018-05-25 17:07:05', '2018-05-25 17:07:05'),
(130, 1, 12, 62, '2018-05-25 17:07:06', '2018-05-25 17:07:06'),
(131, 1, 12, 63, '2018-05-25 17:07:07', '2018-05-25 17:07:07'),
(132, 1, 12, 64, '2018-05-25 17:07:08', '2018-05-25 17:07:08'),
(133, 1, 13, 65, '2018-05-25 17:34:58', '2018-05-25 17:34:58'),
(134, 1, 13, 66, '2018-05-25 17:34:59', '2018-05-25 17:34:59'),
(135, 1, 13, 67, '2018-05-25 17:35:01', '2018-05-25 17:35:01'),
(136, 1, 13, 68, '2018-05-25 17:35:02', '2018-05-25 17:35:02'),
(137, 1, 13, 69, '2018-05-25 17:35:03', '2018-05-25 17:35:03'),
(138, 1, 14, 70, '2018-05-27 06:59:35', '2018-05-27 06:59:35'),
(139, 1, 14, 71, '2018-05-27 06:59:36', '2018-05-27 06:59:36'),
(140, 1, 14, 72, '2018-05-27 06:59:37', '2018-05-27 06:59:37'),
(141, 1, 14, 73, '2018-05-27 06:59:38', '2018-05-27 06:59:38'),
(142, 1, 14, 74, '2018-05-27 06:59:39', '2018-05-27 06:59:39'),
(143, 1, 15, 75, '2018-05-27 07:18:00', '2018-05-27 07:18:00'),
(144, 1, 15, 76, '2018-05-27 07:18:01', '2018-05-27 07:18:01'),
(145, 1, 15, 77, '2018-05-27 07:18:02', '2018-05-27 07:18:02'),
(146, 1, 15, 78, '2018-05-27 07:18:03', '2018-05-27 07:18:03'),
(147, 1, 15, 79, '2018-05-27 07:18:04', '2018-05-27 07:18:04'),
(148, 1, 16, 80, '2018-05-27 08:02:12', '2018-05-27 08:02:12'),
(149, 1, 16, 81, '2018-05-27 08:02:14', '2018-05-27 08:02:14'),
(150, 1, 16, 82, '2018-05-27 08:02:14', '2018-05-27 08:02:14'),
(151, 1, 16, 83, '2018-05-27 08:02:15', '2018-05-27 08:02:15'),
(152, 1, 16, 84, '2018-05-27 08:02:16', '2018-05-27 08:02:16'),
(153, 1, 17, 85, '2018-05-27 15:36:35', '2018-05-27 15:36:35'),
(154, 1, 17, 86, '2018-05-27 15:36:37', '2018-05-27 15:36:37'),
(155, 1, 17, 87, '2018-05-27 15:36:38', '2018-05-27 15:36:38'),
(156, 1, 17, 88, '2018-05-27 15:36:39', '2018-05-27 15:36:39'),
(157, 1, 17, 89, '2018-05-27 15:36:40', '2018-05-27 15:36:40'),
(158, 1, 19, 90, '2018-05-27 16:03:00', '2018-05-27 16:03:00'),
(159, 1, 19, 91, '2018-05-27 16:03:02', '2018-05-27 16:03:02'),
(160, 1, 19, 92, '2018-05-27 16:03:03', '2018-05-27 16:03:03'),
(161, 1, 19, 93, '2018-05-27 16:03:04', '2018-05-27 16:03:04'),
(162, 1, 19, 94, '2018-05-27 16:03:05', '2018-05-27 16:03:05'),
(164, 1, 20, 96, '2018-05-27 16:34:33', '2018-05-27 16:34:33'),
(165, 1, 20, 97, '2018-05-27 16:34:34', '2018-05-27 16:34:34'),
(166, 1, 20, 98, '2018-05-27 16:34:35', '2018-05-27 16:34:35'),
(167, 1, 20, 99, '2018-05-27 16:34:37', '2018-05-27 16:34:37'),
(168, 1, 20, 95, '2018-05-27 16:35:03', '2018-05-27 16:35:03'),
(169, 1, 21, 100, '2018-05-28 03:55:05', '2018-05-28 03:55:05'),
(170, 1, 21, 101, '2018-05-28 03:55:06', '2018-05-28 03:55:06'),
(171, 1, 21, 102, '2018-05-28 03:55:07', '2018-05-28 03:55:07'),
(172, 1, 21, 103, '2018-05-28 03:55:08', '2018-05-28 03:55:08'),
(173, 1, 21, 104, '2018-05-28 03:55:09', '2018-05-28 03:55:09'),
(174, 1, 22, 105, '2018-05-28 04:15:13', '2018-05-28 04:15:13'),
(175, 1, 22, 106, '2018-05-28 04:15:15', '2018-05-28 04:15:15'),
(176, 1, 22, 107, '2018-05-28 04:15:15', '2018-05-28 04:15:15'),
(177, 1, 22, 108, '2018-05-28 04:15:17', '2018-05-28 04:15:17'),
(178, 1, 22, 109, '2018-05-28 04:15:18', '2018-05-28 04:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_leaves`
--

CREATE TABLE IF NOT EXISTS `user_leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(32) NOT NULL,
  `nominated_persion_id` int(11) NOT NULL COMMENT 'from table users',
  `leave_quarter_id` int(11) NOT NULL,
  `leave_category_id` int(11) NOT NULL,
  `leave_payable_type_id` int(11) NOT NULL,
  `start_date` varchar(16) NOT NULL,
  `end_date` varchar(16) NOT NULL,
  `approved_date` varchar(12) NOT NULL,
  `duration` int(4) NOT NULL,
  `note` text NOT NULL,
  `supervisor_approved_status` enum('not decided','approved','deny') NOT NULL,
  `hr_approved_status` enum('not decided','approved','deny') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_provident_funds`
--

CREATE TABLE IF NOT EXISTS `user_provident_funds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(16) NOT NULL,
  `month` varchar(16) NOT NULL,
  `employee_amount` varchar(16) NOT NULL,
  `employeer_amount` varchar(16) NOT NULL,
  `total_amount` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_releases`
--

CREATE TABLE IF NOT EXISTS `user_releases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `application_date` varchar(16) NOT NULL,
  `effective_date` varchar(16) NOT NULL,
  `email_id_status` enum('running','closed') NOT NULL,
  `responsible_official_closing` text NOT NULL,
  `closed` enum('yes','no') NOT NULL,
  `accounts_id` int(11) NOT NULL COMMENT 'from users table',
  `accounts_comments` text NOT NULL,
  `accounts_approve` enum('not decided','approved','canceled') NOT NULL,
  `it_name_id` int(11) NOT NULL COMMENT 'from users table',
  `it_comments` int(11) NOT NULL,
  `it_approve` enum('not decided','approved','canceled') NOT NULL,
  `admin_or_hr_name_id` int(11) NOT NULL COMMENT 'from users table',
  `admin_or_hr_comments` text NOT NULL,
  `admin_or_hr_approve` enum('not decided','approved','canceled') NOT NULL,
  `lineman_name_id` int(11) NOT NULL COMMENT 'from users table',
  `lineman_comments` text NOT NULL,
  `lineman_approve` enum('not decided','approved','canceled') NOT NULL,
  `ceo_approve` enum('not decided','approved','canceled') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weekends`
--

CREATE TABLE IF NOT EXISTS `weekends` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_section_id` int(11) NOT NULL,
  `date` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weekends`
--

INSERT INTO `weekends` (`id`, `department_id`, `department_section_id`, `date`, `status`, `created`, `modified`) VALUES
(1, 1, 2, '2018-06-01', 'active', '2018-05-27 09:36:12', '2018-05-27 09:36:12'),
(2, 1, 2, '2018-06-02', 'active', '2018-05-27 09:36:25', '2018-05-27 09:36:25'),
(3, 1, 2, '2018-06-08', 'active', '2018-05-27 09:36:52', '2018-05-27 09:36:52'),
(4, 1, 2, '2018-06-09', 'active', '2018-05-27 09:37:04', '2018-05-27 09:37:04'),
(5, 1, 1, '2018-06-01', 'active', '2018-05-27 09:37:12', '2018-05-27 09:37:12'),
(6, 1, 1, '2018-06-08', 'active', '2018-05-27 09:37:21', '2018-05-27 09:37:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_machines`
--
ALTER TABLE `attendance_machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_branchs`
--
ALTER TABLE `bank_branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_sections`
--
ALTER TABLE `department_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_schedules`
--
ALTER TABLE `duty_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type_designations`
--
ALTER TABLE `employee_type_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpis`
--
ALTER TABLE `kpis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_categorys`
--
ALTER TABLE `leave_categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_packages`
--
ALTER TABLE `leave_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_payable_types`
--
ALTER TABLE `leave_payable_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_quarters`
--
ALTER TABLE `leave_quarters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `over_times`
--
ALTER TABLE `over_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarys`
--
ALTER TABLE `salarys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`), ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_academics`
--
ALTER TABLE `user_academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_appraisals`
--
ALTER TABLE `user_appraisals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attendances`
--
ALTER TABLE `user_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attendance_requests`
--
ALTER TABLE `user_attendance_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_career_historys`
--
ALTER TABLE `user_career_historys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_leaves`
--
ALTER TABLE `user_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_provident_funds`
--
ALTER TABLE `user_provident_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_releases`
--
ALTER TABLE `user_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekends`
--
ALTER TABLE `weekends`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance_machines`
--
ALTER TABLE `attendance_machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank_branchs`
--
ALTER TABLE `bank_branchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department_sections`
--
ALTER TABLE `department_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `duty_schedules`
--
ALTER TABLE `duty_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_type_designations`
--
ALTER TABLE `employee_type_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kpis`
--
ALTER TABLE `kpis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave_categorys`
--
ALTER TABLE `leave_categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_packages`
--
ALTER TABLE `leave_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leave_payable_types`
--
ALTER TABLE `leave_payable_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leave_quarters`
--
ALTER TABLE `leave_quarters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `over_times`
--
ALTER TABLE `over_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarys`
--
ALTER TABLE `salarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user_academics`
--
ALTER TABLE `user_academics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_appraisals`
--
ALTER TABLE `user_appraisals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_attendances`
--
ALTER TABLE `user_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_attendance_requests`
--
ALTER TABLE `user_attendance_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_career_historys`
--
ALTER TABLE `user_career_historys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_group_controllers`
--
ALTER TABLE `user_group_controllers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_group_controller_actions`
--
ALTER TABLE `user_group_controller_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `user_group_menus`
--
ALTER TABLE `user_group_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_group_menu_items`
--
ALTER TABLE `user_group_menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `user_leaves`
--
ALTER TABLE `user_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_provident_funds`
--
ALTER TABLE `user_provident_funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_releases`
--
ALTER TABLE `user_releases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weekends`
--
ALTER TABLE `weekends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
