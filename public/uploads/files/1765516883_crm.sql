-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 05:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent','Leave','Half-Day') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `employee_id`, `date`, `status`) VALUES
(1, 1, '2025-01-10', 'Present'),
(2, 2, '2025-01-10', 'Present'),
(3, 3, '2025-01-10', 'Absent'),
(4, 4, '2025-01-10', 'Present'),
(5, 5, '2025-01-10', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budget_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `fiscal_year` year(4) DEFAULT NULL,
  `allocated` decimal(12,2) DEFAULT NULL,
  `spent` decimal(12,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budget_id`, `department_id`, `fiscal_year`, `allocated`, `spent`) VALUES
(1, 1, '2025', 50000.00, 12000.00),
(2, 2, '2025', 70000.00, 15000.00),
(3, 4, '2025', 120000.00, 30000.00);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `address`, `website`) VALUES
(1, 'TechNova Solutions', '123 Silicon Way', 'www.technova.com'),
(2, 'GreenEarth Industries', '501 Green St', 'www.greenearth.com'),
(3, 'SkyLine Corp', '77 Cloud Ave', 'www.skylinecorp.com');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `company_id`, `name`, `email`, `phone`) VALUES
(1, 1, 'John', 'jwalker@technova.com', '555001'),
(2, 1, 'Sara', 'slee@technova.com', '555002'),
(3, 2, 'Michael', 'mray@greenearth.com', '555003'),
(4, 3, 'Linda', 'lstone@skyline.com', '555004');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `value` decimal(12,2) DEFAULT NULL,
  `stage` enum('Lead','Negotiation','Proposal','Closed Won','Closed Lost') DEFAULT NULL,
  `expected_close_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `company_id`, `title`, `value`, `stage`, `expected_close_date`) VALUES
(1, 1, 'CRM Integration Deal', 15000.00, 'Negotiation', '2025-02-15'),
(2, 2, 'Sustainability Dashboard', 22000.00, 'Lead', '2025-03-01'),
(3, 3, 'Cloud Migration Project', 40000.00, 'Proposal', '2025-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `name`) VALUES
(1, 'Human Resources'),
(2, 'Finance'),
(3, 'Sales'),
(4, 'Development'),
(5, 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `title`) VALUES
(1, 'HR Manager'),
(2, 'Accountant'),
(3, 'Sales Executive'),
(4, 'Software Engineer'),
(5, 'Support Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `logo` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `phone`, `department_id`, `designation_id`, `date_joined`, `status`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Johnson', 'Alice', 'alice@company.com', 123456789, 1, 1, '2025-12-26', 'Active', '1765459018.png', '2025-12-11 13:16:58', '2025-12-11 07:46:58'),
(2, 'Miller', 'Bob', 'bob@company.com', 1234567891, 2, 2, '2021-01-15', 'Active', '1765458160.png', '2025-12-11 13:16:28', '2025-12-11 13:16:28'),
(3, 'Smith', 'Charlie', 'charlie@company.com', 1234567892, 3, 3, '2022-03-12', 'Active', '1765458918.png', '2025-12-11 13:15:18', '2025-12-11 07:45:18'),
(4, 'Diana', 'Brown', 'diana@company.com', 1234567893, 4, 4, '2025-12-10', 'Active', '1765459304.webp', '2025-12-11 13:21:44', '2025-12-11 07:51:44'),
(5, 'Davis', 'Evan', 'evan@company.com', 1234567894, 5, 5, '2023-02-01', 'Active', '1765459315.webp', '2025-12-11 13:21:55', '2025-12-11 07:51:55'),
(47, 'saritha', 'nalajam', 'sarithanalajam6@gmail.com', 9100608531, NULL, NULL, '2025-12-03', 'Active', '1765459365.png', '2025-12-11 13:22:45', '2025-12-11 07:52:45'),
(49, 'test', 'test', 'sari345@gmail.com', 9100608531, NULL, NULL, '2025-12-14', 'Active', '1765459383.png', '2025-12-11 13:23:03', '2025-12-11 07:53:03'),
(59, '12', 'test', 'qwew@gmail.com', 1234567890, NULL, NULL, '2025-12-12', 'Active', '1765459327.png', '2025-12-11 13:22:07', '2025-12-11 07:52:07'),
(60, 'mmk', 'kishore', 'krish@gmail.com', 9100608531, NULL, NULL, '2025-12-11', 'Active', '1765459210.png', '2025-12-11 13:20:10', '2025-12-11 07:50:10'),
(61, 'new', 'year', 'new@gmail.com', 9100608531, NULL, NULL, '2025-12-27', 'Active', '1765459342.jpg', '2025-12-11 13:22:22', '2025-12-11 07:52:22'),
(62, 'kishore', 'test', 'sari@gmail.com', 9100608531, NULL, NULL, '2025-12-19', 'Active', '1765458946.png', '2025-12-11 13:15:46', '2025-12-11 07:45:46'),
(64, 'dfwfdhwgevzdgm', 'retr3iuhtilgjkrf v', 'sawqeqwerri@gmail.com', 9100608531, NULL, NULL, '2025-12-12', 'Inactive', '1765455596_plates.webp', '2025-12-11 06:49:56', '2025-12-11 06:49:56'),
(66, 'asdfghjkl;', '1234567890p', 'sari23344@gmail.com', 9100608531, NULL, NULL, '2025-12-26', 'Active', '1765456285_nut.webp', '2025-12-11 07:01:25', '2025-12-11 07:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `category`, `amount`, `expense_date`, `description`) VALUES
(1, 'Software Licenses', 1200.00, '2025-01-03', 'Annual cloud subscription'),
(2, 'Travel', 450.00, '2025-01-12', 'Client meeting travel'),
(3, 'Office Supplies', 200.00, '2025-01-16', 'Printer ink & paper');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interactions`
--

CREATE TABLE `interactions` (
  `interaction_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `interaction_type` enum('Call','Email','Meeting','Other') DEFAULT NULL,
  `interaction_date` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`interaction_id`, `contact_id`, `employee_id`, `interaction_type`, `interaction_date`, `notes`) VALUES
(1, 1, 3, 'Call', '2025-01-10 10:00:00', 'Discussed new proposal'),
(2, 2, 3, 'Email', '2025-01-11 09:30:00', 'Sent pricing PDF'),
(3, 3, 1, 'Meeting', '2025-01-09 14:00:00', 'Quarterly review'),
(4, 4, 2, 'Call', '2025-01-14 11:15:00', 'Support inquiry');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `tax` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('Pending','Paid','Overdue') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `company_id`, `amount`, `tax`, `total`, `issue_date`, `due_date`, `status`) VALUES
(1, 1, 14000.00, 1400.00, 15400.00, '2025-01-05', '2025-01-20', 'Pending'),
(2, 2, 20000.00, 2000.00, 22000.00, '2025-01-10', '2025-01-25', 'Paid'),
(3, 3, 35000.00, 3500.00, 38500.00, '2025-01-08', '2025-01-23', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` enum('Sick','Casual','Annual','Maternity','Other') DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `employee_id`, `start_date`, `end_date`, `type`, `status`) VALUES
(1, 3, '2025-01-05', '2025-01-07', 'Sick', 'Approved'),
(2, 5, '2025-01-15', '2025-01-16', 'Casual', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `amount_paid` decimal(12,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `method` enum('Bank','Cash','Card','Online') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount_paid`, `payment_date`, `method`) VALUES
(1, 2, 22000.00, '2025-01-15', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `pay_period` date DEFAULT NULL,
  `basic_salary` decimal(12,2) DEFAULT NULL,
  `deductions` decimal(12,2) DEFAULT NULL,
  `net_salary` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `employee_id`, `pay_period`, `basic_salary`, `deductions`, `net_salary`) VALUES
(1, 1, '2025-01-31', 5000.00, 300.00, 4700.00),
(2, 2, '2025-01-31', 4500.00, 250.00, 4250.00),
(3, 4, '2025-01-31', 6000.00, 400.00, 5600.00);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Not Started','In Progress','On Hold','Completed') DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `priority` varchar(500) DEFAULT NULL,
  `project_value` varchar(500) DEFAULT NULL,
  `price_type` varchar(500) DEFAULT NULL,
  `project_file` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `name`, `client_id`, `start_date`, `end_date`, `status`, `logo`, `priority`, `project_value`, `price_type`, `project_file`, `created_at`, `updated_at`) VALUES
(1, 'CRM Implementation', 1, '2025-01-01', '2025-03-01', 'In Progress', '1765366375_69395a67e04e3.png', 'Low', '20000004', 'RS.', '1765366405_69395a854a18f.php', '2025-12-10 11:33:25', '2025-12-10 06:03:25'),
(2, 'Eco Reporting Portal', 2, '2025-01-10', '2025-04-10', 'Not Started', '1765366510_69395aeea8404.png', 'Low', '345678', 'rs', '1765366312_69395a285993f.sql', '2025-12-10 11:35:10', '2025-12-10 06:05:10'),
(3, 'Cloud Transformation', 4, '2025-01-05', '2025-03-20', 'On Hold', '1765366528_69395b00b56c7.png', 'Medium', '20000004', 'RS', '1765366431_69395a9f549d0.php', '2025-12-10 11:35:28', '2025-12-10 06:05:28'),
(4, 'wetuio', 3, '2025-12-25', '2020-05-21', 'Completed', '1765347119_wbsl_logo.png', 'High', '23456', 'RS', '1765356695_6939349775af0.sql', '2025-12-10 11:34:19', '2025-12-10 06:04:19'),
(9, 'sdfghj', 4, '2025-12-02', '2025-12-18', 'In Progress', '1765366090_6939594a4efd6.png', 'Medium', '2000000', 'RS.', '1765363105_69394da1ee869.sql', '2025-12-10 11:28:10', '2025-12-10 05:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `old_designation_id` int(11) DEFAULT NULL,
  `new_designation_id` int(11) DEFAULT NULL,
  `promotion_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `employee_id`, `old_designation_id`, `new_designation_id`, `promotion_date`) VALUES
(1, 4, 4, 4, '2025-02-01'),
(2, 1, 1, 1, '2025-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('Pending','In Progress','Completed','On Hold','Not Started') DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `task_file` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `title`, `description`, `due_date`, `status`, `employee_id`, `task_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Setup Database', 'Initial DB schema creation', '2025-01-17', 'Not Started', 2, NULL, '2025-12-11 13:28:01', '2025-12-11 07:58:01'),
(2, 1, 'Create API Layer', 'REST API for CRM operations', '2025-01-25', 'In Progress', 47, NULL, '2025-12-11 12:00:21', '2025-12-11 12:00:21'),
(3, 2, 'UI Wireframes', 'Design initial UX', '2025-02-05', 'Not Started', 59, NULL, '2025-12-11 12:00:16', '2025-12-11 12:00:16'),
(4, 3, 'Migrate Servers', '<p><u><b style=\"background-color: rgb(255, 0, 0);\">change</b></u></p>', '2026-01-31', 'Not Started', 4, NULL, '2025-12-11 11:59:50', '2025-12-11 11:59:50'),
(5, 1, 'kishore', '<p>testing</p>', '2025-05-05', 'In Progress', 60, NULL, '2025-12-11 11:59:42', '2025-12-11 11:59:42'),
(6, 2, 'testing1', '<p><strong>good</strong></p>', '2025-12-13', 'Completed', 2, NULL, '2025-12-11 11:59:37', '2025-12-11 11:59:37'),
(7, 3, 'qwertyuiop', '<b>    just checking for testing\r\n</b>', '2025-12-18', 'On Hold', 1, '1765371264_contact.blade.php', '2025-12-11 11:59:34', '2025-12-11 11:59:34'),
(12, 2, 'Newyear', '<p><strong>welcome to New Year</strong></p>', '2026-01-01', 'Pending', 5, '1765449313_contact.blade.php', '2025-12-11 11:59:14', '2025-12-11 11:59:14'),
(13, 1, 'qwertyuiop[asdfghjkl;sasdfjklfj', '<p>asdfghjklwertyuiop[asdfghjkl;zxcvbnm,</p>', '2025-12-26', 'On Hold', 2, NULL, '2025-12-11 13:25:00', '2025-12-11 07:55:00'),
(14, 3, 'qwertyuiopsadfghjkl;zxcvbnm,.;lkjhfdsaqwertyuiop', '<blockquote>\r\n<p>sadsadazdsadsassasadadsadsadsas</p>\r\n</blockquote>', '2025-12-20', 'Not Started', 4, NULL, '2025-12-11 12:03:42', '2025-12-11 06:33:42'),
(15, 9, 'fdASDGDSTHQFHTFRFGXCZFDCFGDSSCGVJMVCJVDJSCVJV', '<p>ASDFGHJKERTYUIO</p>', '2025-12-07', 'On Hold', 3, '1765450424_index.blade.php', '2025-12-11 11:41:36', '2025-12-11 11:41:36'),
(16, 4, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '<p>fdgdgdhtrdjtdgdttdgcgdtrd</p>', '2025-12-28', 'Not Started', 47, '1765454594_contact.blade.php', '2025-12-11 06:33:14', '2025-12-11 06:33:14'),
(17, 3, 'ASDFGHJKL;', '<p>GHGFHFYHFCJGFGFGVJVMN</p>', '2025-12-20', 'On Hold', 5, NULL, '2025-12-11 06:35:28', '2025-12-11 06:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

CREATE TABLE `task_assignments` (
  `assignment_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `assigned_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_assignments`
--

INSERT INTO `task_assignments` (`assignment_id`, `task_id`, `employee_id`, `assigned_date`) VALUES
(1, 1, 4, '2025-01-01'),
(2, 2, 4, '2025-01-10'),
(3, 3, 1, '2025-01-12'),
(4, 4, 4, '2025-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `training_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`training_id`, `employee_id`, `title`, `date`, `description`) VALUES
(1, 4, 'Advanced Python', '2025-01-05', 'Backend development training'),
(2, 2, 'Tax Compliance Workshop', '2025-01-08', 'Annual tax updates');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`interaction_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `old_designation_id` (`old_designation_id`),
  ADD KEY `new_designation_id` (`new_designation_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`training_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`designation_id`);

--
-- Constraints for table `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `interactions_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`),
  ADD CONSTRAINT `interactions_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `promotions_ibfk_2` FOREIGN KEY (`old_designation_id`) REFERENCES `designations` (`designation_id`),
  ADD CONSTRAINT `promotions_ibfk_3` FOREIGN KEY (`new_designation_id`) REFERENCES `designations` (`designation_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD CONSTRAINT `task_assignments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`),
  ADD CONSTRAINT `task_assignments_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
