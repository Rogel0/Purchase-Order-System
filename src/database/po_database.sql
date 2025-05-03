-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 08:40 PM
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
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `active_products`
-- (See below for the actual view)
--
CREATE TABLE `active_products` (
`productid` bigint(20)
,`productnumber` bigint(20)
,`productname` varchar(255)
,`category` varchar(100)
,`description` text
,`stockquantity` int(11)
,`threshold_limit` int(11)
,`unitofmeasurement` varchar(50)
,`unitprice` decimal(10,2)
,`status` varchar(50)
,`linkedsupplier` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `active_vendors`
-- (See below for the actual view)
--
CREATE TABLE `active_vendors` (
`vendor_id` int(11)
,`vendor_name` varchar(255)
,`contact_person` varchar(255)
,`email` varchar(100)
,`phone_number` varchar(50)
,`address` text
,`status` enum('active','pending','rejected','inactive')
);

-- --------------------------------------------------------

--
-- Table structure for table `archive_orders`
--

CREATE TABLE `archive_orders` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `record_type` varchar(50) DEFAULT NULL,
  `po_number` varchar(50) DEFAULT NULL,
  `vendor_number` varchar(50) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_orders`
--

INSERT INTO `archive_orders` (`id`, `record_id`, `record_type`, `po_number`, `vendor_number`, `data`, `archived_at`) VALUES
(1, 12011, 'order', '012011', '2', '{\"po_number\":\"012011\",\"vendor_number\":2,\"invoice_number\":\"INV-000000\",\"product_number\":1005,\"order_date\":\"2025-05-01\",\"po_type\":\"Standard\",\"priority_level\":\"High\",\"po_status\":\"pending\",\"delivery_status\":\"pending\",\"delivery_address\":\"33558 Elody Valleys\",\"expected_delivery\":\"2024-11-06\",\"order_notes\":\"excepturi modi vero\",\"quantity\":374,\"unit_price\":\"800.00\",\"payment_method\":\"Credit Card\",\"created_at\":\"2025-05-01 20:21:17\",\"updated_at\":\"2025-05-01 20:21:17\"}', '2025-05-01 15:12:49'),
(2, 12150, 'order', '012150', '2', '{\"po_number\":\"012150\",\"vendor_number\":2,\"invoice_number\":null,\"product_number\":1002,\"order_date\":\"2025-05-01\",\"po_type\":\"Urgent\",\"priority_level\":\"Low\",\"po_status\":\"pending\",\"delivery_status\":\"pending\",\"delivery_address\":\"70383 Fritsch Divide\",\"expected_delivery\":\"2025-01-16\",\"order_notes\":\"temporibus dolorum nihil\",\"quantity\":196,\"unit_price\":\"150.00\",\"payment_method\":\"Bank Transfer\",\"created_at\":\"2025-05-01 21:25:00\",\"updated_at\":\"2025-05-01 21:25:00\"}', '2025-05-01 15:12:53'),
(3, 12137, 'order', '012137', '2', '{\"po_number\":\"012137\",\"vendor_number\":2,\"invoice_number\":\"INV-78F3C5\",\"product_number\":1004,\"order_date\":\"2025-05-01\",\"po_type\":\"Urgent\",\"priority_level\":\"Medium\",\"po_status\":\"pending\",\"delivery_status\":\"pending\",\"delivery_address\":\"348 Sophia Dam\",\"expected_delivery\":\"2026-03-19\",\"order_notes\":\"ipsum quos laboriosam\",\"quantity\":571,\"unit_price\":\"25.00\",\"payment_method\":\"Credit Card\",\"created_at\":\"2025-05-01 21:54:47\",\"updated_at\":\"2025-05-01 21:54:47\"}', '2025-05-01 15:14:49'),
(4, 12121, 'order', '012121', '2', '{\"po_number\":\"012121\",\"vendor_number\":2,\"invoice_number\":\"INV-80DA4F\",\"product_number\":1002,\"order_date\":\"2025-05-01\",\"po_type\":\"Urgent\",\"priority_level\":\"High\",\"po_status\":\"pending\",\"delivery_status\":\"pending\",\"delivery_address\":\"9771 Marilie Mills\",\"expected_delivery\":\"2024-12-30\",\"order_notes\":\"ducimus nostrum magni\",\"quantity\":259,\"unit_price\":\"150.00\",\"payment_method\":\"Bank Transfer\",\"created_at\":\"2025-05-01 21:43:52\",\"updated_at\":\"2025-05-01 21:43:52\"}', '2025-05-01 15:15:15'),
(5, 40027, 'order', '040027', '1', '{\"po_number\": \"040027\", \"vendor_number\": 1, \"invoice_number\": \"INV-307322\", \"po_status\": \"rejected\"}', '2025-05-03 16:43:56'),
(6, 40027, 'order', '040027', '1', '{\"po_number\":\"040027\",\"vendor_number\":1,\"invoice_number\":null,\"product_number\":1002,\"order_date\":\"2025-05-03\",\"po_type\":\"Standard\",\"priority_level\":\"High\",\"po_status\":\"rejected\",\"delivery_status\":\"pending\",\"delivery_address\":\"3902 Koss Branch\",\"expected_delivery\":\"2025-12-07\",\"order_notes\":\"optio rerum animi\",\"quantity\":38,\"unit_price\":\"150.00\",\"payment_method\":\"Bank Transfer\",\"created_at\":\"2025-05-04 00:37:39\",\"updated_at\":\"2025-05-04 00:43:56\"}', '2025-05-03 16:44:08'),
(7, 40054, 'order', '040054', '1', '{\"po_number\":\"040054\",\"vendor_number\":1,\"invoice_number\":null,\"product_number\":1001,\"order_date\":\"2025-05-03\",\"po_type\":\"Urgent\",\"priority_level\":\"High\",\"po_status\":\"rejected\",\"delivery_status\":\"pending\",\"delivery_address\":\"81864 Marielle Fork\",\"expected_delivery\":\"2025-01-08\",\"order_notes\":\"libero et itaque\",\"quantity\":411,\"unit_price\":\"1200.00\",\"payment_method\":\"Credit Card\",\"created_at\":\"2025-05-04 00:45:01\",\"updated_at\":\"2025-05-04 00:45:21\"}', '2025-05-03 16:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `archive_products`
--

CREATE TABLE `archive_products` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `record_type` enum('product') NOT NULL,
  `product_number` varchar(50) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `archived_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_products`
--

INSERT INTO `archive_products` (`id`, `record_id`, `record_type`, `product_number`, `data`, `archived_at`) VALUES
(1, 1005, 'product', '1005', '{\"product_number\":1005,\"product_name\":\"Conference Table\",\"category_id\":3,\"description\":\"Large conference table for meeting rooms\",\"unit_of_measurement\":\"pcs\",\"unit_price\":\"800.00\",\"status\":\"active\",\"vendor_number\":3,\"quantity\":10,\"threshold_limit\":2}', '2025-05-03 14:30:16'),
(2, 1001, 'product', '1001', '{\"product_number\":1001,\"product_name\":\"Laptop\",\"category_id\":1,\"description\":\"High-performance laptop for office use\",\"unit_of_measurement\":\"pcs\",\"unit_price\":\"1200.00\",\"status\":\"active\",\"vendor_number\":1,\"quantity\":50,\"threshold_limit\":10}', '2025-05-03 14:54:41'),
(3, 1004, 'product', '1004', '{\"product_number\":1004,\"product_name\":\"Desk Organizer\",\"category_id\":2,\"description\":\"Multi-compartment desk organizer for office supplies\",\"unit_of_measurement\":\"pcs\",\"unit_price\":\"25.00\",\"status\":\"active\",\"vendor_number\":2,\"quantity\":100,\"threshold_limit\":20}', '2025-05-03 14:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `archive_vendors`
--

CREATE TABLE `archive_vendors` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `record_type` enum('product') NOT NULL,
  `vendor_number` varchar(50) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `archived_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_vendors`
--

INSERT INTO `archive_vendors` (`id`, `record_id`, `record_type`, `vendor_number`, `data`, `archived_at`) VALUES
(1, 1, '', '1', '{\"vendor_number\":1,\"vendor_name\":\"Vendor A\",\"vendor_description\":\"Supplier of electronics\",\"category_id\":1,\"status\":\"active\",\"contact_person\":\"John Doe\",\"phone_number\":\"1234567890\",\"email\":\"vendorA@example.com\",\"address\":\"123 Main St, City A\",\"tax_id\":\"TAX123\",\"payment_terms\":\"Net 30\",\"supporting_info\":\"Preferred supplier\",\"created_at\":\"2025-05-01 20:16:36\",\"updated_at\":\"2025-05-01 20:16:36\"}', '2025-05-03 15:19:36'),
(2, 1, '', '1', '{\"vendor_number\":1,\"vendor_name\":\"Vendor A\",\"vendor_description\":\"Supplier of electronics\",\"category_id\":1,\"status\":\"active\",\"contact_person\":\"John Doe\",\"phone_number\":\"1234567890\",\"email\":\"vendorA@example.com\",\"address\":\"123 Main St, City A\",\"tax_id\":\"TAX123\",\"payment_terms\":\"Net 30\",\"supporting_info\":\"Preferred supplier\",\"created_at\":\"2025-05-01 20:16:36\",\"updated_at\":\"2025-05-01 20:16:36\"}', '2025-05-03 15:23:30'),
(3, 1, '', '1', '{\"vendor_number\":1,\"vendor_name\":\"Vendor A\",\"vendor_description\":\"Supplier of electronics\",\"category_id\":1,\"status\":\"active\",\"contact_person\":\"John Doe\",\"phone_number\":\"1234567890\",\"email\":\"vendorA@example.com\",\"address\":\"123 Main St, City A\",\"tax_id\":\"TAX123\",\"payment_terms\":\"Net 30\",\"supporting_info\":\"Preferred supplier\",\"created_at\":\"2025-05-01 20:16:36\",\"updated_at\":\"2025-05-01 20:16:36\"}', '2025-05-03 15:24:33'),
(4, 2, '', '2', '{\"vendor_number\":2,\"vendor_name\":\"Vendor B\",\"vendor_description\":\"Supplier of office supplies\",\"category_id\":2,\"status\":\"active\",\"contact_person\":\"Jane Smith\",\"phone_number\":\"0987654321\",\"email\":\"vendorB@example.com\",\"address\":\"456 Elm St, City B\",\"tax_id\":\"TAX456\",\"payment_terms\":\"Net 15\",\"supporting_info\":\"Reliable delivery\",\"created_at\":\"2025-05-01 20:16:36\",\"updated_at\":\"2025-05-01 20:16:36\"}', '2025-05-03 15:26:04'),
(5, 1, '', '1', '{\"vendor_number\":1,\"vendor_name\":\"Vendor A\",\"vendor_description\":\"Supplier of electronics\",\"category_id\":1,\"status\":\"active\",\"contact_person\":\"John Doe\",\"phone_number\":\"1234567890\",\"email\":\"vendorA@example.com\",\"address\":\"123 Main St, City A\",\"tax_id\":\"TAX123\",\"payment_terms\":\"Net 30\",\"supporting_info\":\"Preferred supplier\",\"created_at\":\"2025-05-01 20:16:36\",\"updated_at\":\"2025-05-01 20:16:36\"}', '2025-05-03 15:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Office Supplies'),
(3, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_number` varchar(100) NOT NULL,
  `vendor_number` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `company_from` varchar(255) DEFAULT NULL,
  `company_to` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('active','void','canceled') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_number`, `vendor_number`, `invoice_date`, `company_from`, `company_to`, `type`, `description`, `status`) VALUES
('INV-6EE419', 2, '2025-05-04', 'Your Company', '2', 'Standard', 'Invoice for PO #040212', 'active'),
('INV-7D15B3', 1, '2025-05-04', 'Your Company', '1', 'Urgent', 'Invoice for PO #040256', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `po_number` varchar(100) NOT NULL,
  `vendor_number` int(11) DEFAULT NULL,
  `invoice_number` varchar(100) DEFAULT NULL,
  `product_number` bigint(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `po_type` varchar(50) DEFAULT NULL,
  `priority_level` varchar(50) DEFAULT NULL,
  `po_status` enum('pending','approved','rejected') DEFAULT NULL,
  `delivery_status` enum('pending','delivered','cancelled') DEFAULT NULL,
  `delivery_address` text DEFAULT NULL,
  `expected_delivery` date DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`po_number`, `vendor_number`, `invoice_number`, `product_number`, `order_date`, `po_type`, `priority_level`, `po_status`, `delivery_status`, `delivery_address`, `expected_delivery`, `order_notes`, `quantity`, `unit_price`, `payment_method`, `created_at`, `updated_at`) VALUES
('040212', 2, 'INV-6EE419', 1002, '2025-05-03', 'Standard', 'High', 'pending', 'pending', '7207 Batz Station', '2025-04-21', 'consequatur saepe aut', 596, 150.00, 'Credit Card', '2025-05-03 18:39:18', '2025-05-03 18:39:18'),
('040256', 1, 'INV-7D15B3', 1001, '2025-05-03', 'Urgent', 'Low', 'approved', 'pending', '827 Bechtelar Rapid', '2025-03-27', 'ipsum est quaerat', 474, 1200.00, 'Bank Transfer', '2025-05-03 18:19:03', '2025-05-03 18:36:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details_view`
-- (See below for the actual view)
--
CREATE TABLE `order_details_view` (
`order_id` varchar(100)
,`po_number` varchar(100)
,`order_date` date
,`po_status` enum('pending','approved','rejected')
,`delivery_status` enum('pending','delivered','cancelled')
,`productid` bigint(20)
,`productname` varchar(255)
,`linkedsupplier` int(11)
,`vendor_id` int(11)
,`supplier_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`term_id`, `term_name`) VALUES
(1, 'Net 30'),
(2, 'Net 60'),
(3, 'Net 90'),
(4, 'Cash on Delivery (COD)'),
(5, 'Cash in Advance (CIA)'),
(6, '2/10 Net 30'),
(7, '50% Upfront, 50% on Completion'),
(8, 'Upon Receipt');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_number` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_of_measurement` varchar(50) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `vendor_number` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `threshold_limit` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_number`, `product_name`, `category_id`, `description`, `unit_of_measurement`, `unit_price`, `status`, `vendor_number`, `quantity`, `threshold_limit`) VALUES
(1001, 'Laptop', 1, 'High-performance laptop for office use', 'pcs', 1200.00, 'active', 1, 50, 30),
(1002, 'Office Chair', 3, 'Ergonomic office chair with lumbar support', 'pcs', 150.00, 'active', 2, 30, 20),
(1003, 'Printer', 1, 'All-in-one printer with scanning and copying features', 'pcs', 300.00, 'inactive', 1, 20, 3),
(12114, 'Feeney', 1, 'Doloribus illo quaerat libero ratione nisi nulla earum nostrum.', NULL, 529.00, 'rejected', 2, 0, 10),
(32303, 'Price', 3, 'Velit error voluptas minus provident asperiores cupiditate.', NULL, 281.00, 'rejected', 1, 0, 10),
(32305, 'Ferry', 3, 'Sunt commodi nulla saepe eaque est rerum voluptas consequatur eos.', NULL, 198.00, 'active', 2, 0, 10),
(32312, 'Donnelly', 3, 'Molestias aut nisi fugiat inventore ad aliquid nostrum laboriosam atque.', NULL, 523.00, 'pending', 2, 0, 10),
(32313, 'Quigley-Haley', 2, 'Recusandae nihil nemo exercitationem repudiandae nostrum perspiciatis.', NULL, 398.00, 'pending', 2, 0, 10),
(32317, 'Cassin', 2, 'Quaerat nesciunt ipsum laboriosam exercitationem dolorem ex labore in aliquam.', NULL, 366.00, 'pending', 2, 0, 10),
(32326, 'Bechtelar', 1, 'Sequi quam voluptate itaque nostrum deleniti libero.', NULL, 439.00, 'pending', 2, 0, 10),
(32342, 'Hodkiewicz', 2, 'Cumque non odit nihil aperiam numquam corporis voluptatem ea quos.', NULL, 61.00, 'pending', 1, 0, 10),
(32351, 'Gleason', 1, 'Ex quas ab.', NULL, 490.00, 'pending', 2, 0, 10),
(32357, 'Powlowski', 2, 'Et beatae quae blanditiis.', NULL, 365.00, 'pending', 2, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userID`, `firstname`, `middlename`, `lastname`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'test@gmail.com', 'test', 'user', '2025-04-12 13:13:56', '2025-04-12 13:13:56'),
(3, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', '2025-04-12 13:31:48', '2025-04-12 13:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_number` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` enum('active','pending','rejected','inactive') DEFAULT 'pending',
  `contact_person` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tax_id` varchar(50) DEFAULT NULL,
  `payment_terms` varchar(50) DEFAULT NULL,
  `supporting_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_number`, `vendor_name`, `vendor_description`, `category_id`, `status`, `contact_person`, `phone_number`, `email`, `address`, `tax_id`, `payment_terms`, `supporting_info`, `created_at`, `updated_at`) VALUES
(1, 'Vendor A', 'Supplier of electronics', 1, 'active', 'John Doe', '1234567890', 'vendorA@example.com', '123 Main St, City A', 'TAX123', 'Net 30', 'Preferred supplier', '2025-05-01 12:16:36', '2025-05-03 16:23:06'),
(2, 'Vendor B', 'Supplier of office supplies', 2, 'active', 'Jane Smith', '0987654321', 'vendorB@example.com', '456 Elm St, City B', 'TAX456', 'Net 15', 'Reliable delivery', '2025-05-01 12:16:36', '2025-05-03 18:35:53'),
(3, 'Vendor C', 'Supplier of furniture', 3, 'rejected', 'Alice Johnson', '1122334455', 'vendorC@example.com', '789 Oak St, City C', 'TAX789', 'Net 45', 'Occasional delays', '2025-05-01 12:16:36', '2025-05-03 14:53:37'),
(12119, 'Cum ut vero accusantium ratione a id laudantium ratione.', 'Odio iusto ratione blanditiis quos quo saepe nemo quasi.', 3, 'pending', 'Temporibus magnam saepe reiciendis.', '636', 'your.email+fakedata13863@gmail.com', '8369 Louisa Fort', '636', '2', NULL, '2025-05-01 07:42:25', '2025-05-01 13:42:25'),
(12154, 'Temporibus aliquam omnis explicabo possimus enim ipsa architecto.', 'Odit sint iste aut nam magni.', 1, 'pending', 'Tempora molestiae quos aliquam occaecati deserunt ut earum.', '394', 'your.email+fakedata31274@gmail.com', '70416 Rath Shoal', '394', '5', NULL, '2025-05-01 07:42:03', '2025-05-01 13:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Furniture'),
(3, 'Clothing'),
(4, 'Food'),
(5, 'Automotive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vendor_details_view`
-- (See below for the actual view)
--
CREATE TABLE `vendor_details_view` (
`vendor_number` int(11)
,`vendor_name` varchar(255)
,`vendor_description` text
,`category_id` int(11)
,`category_name` varchar(100)
,`status` enum('active','pending','rejected','inactive')
,`contact_person` varchar(255)
,`phone_number` varchar(50)
,`email` varchar(100)
,`address` text
,`tax_id` varchar(50)
,`payment_terms` varchar(50)
,`supporting_info` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `active_products`
--
DROP TABLE IF EXISTS `active_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active_products`  AS SELECT `p`.`product_number` AS `productid`, `p`.`product_number` AS `productnumber`, `p`.`product_name` AS `productname`, `c`.`category_name` AS `category`, `p`.`description` AS `description`, `p`.`quantity` AS `stockquantity`, `p`.`threshold_limit` AS `threshold_limit`, `p`.`unit_of_measurement` AS `unitofmeasurement`, `p`.`unit_price` AS `unitprice`, `p`.`status` AS `status`, `p`.`vendor_number` AS `linkedsupplier` FROM (`products` `p` join `categories` `c` on(`p`.`category_id` = `c`.`category_id`)) WHERE `p`.`status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `active_vendors`
--
DROP TABLE IF EXISTS `active_vendors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active_vendors`  AS SELECT `vendors`.`vendor_number` AS `vendor_id`, `vendors`.`vendor_name` AS `vendor_name`, `vendors`.`contact_person` AS `contact_person`, `vendors`.`email` AS `email`, `vendors`.`phone_number` AS `phone_number`, `vendors`.`address` AS `address`, `vendors`.`status` AS `status` FROM `vendors` WHERE `vendors`.`status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `order_details_view`
--
DROP TABLE IF EXISTS `order_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view`  AS SELECT `o`.`po_number` AS `order_id`, `o`.`po_number` AS `po_number`, `o`.`order_date` AS `order_date`, `o`.`po_status` AS `po_status`, `o`.`delivery_status` AS `delivery_status`, `p`.`product_number` AS `productid`, `p`.`product_name` AS `productname`, `p`.`vendor_number` AS `linkedsupplier`, `v`.`vendor_number` AS `vendor_id`, `v`.`vendor_name` AS `supplier_name` FROM ((`orders` `o` join `products` `p` on(`o`.`product_number` = `p`.`product_number`)) join `vendors` `v` on(`o`.`vendor_number` = `v`.`vendor_number`)) WHERE `o`.`po_status` is not null ;

-- --------------------------------------------------------

--
-- Structure for view `vendor_details_view`
--
DROP TABLE IF EXISTS `vendor_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vendor_details_view`  AS SELECT `v`.`vendor_number` AS `vendor_number`, `v`.`vendor_name` AS `vendor_name`, `v`.`vendor_description` AS `vendor_description`, `v`.`category_id` AS `category_id`, `c`.`category_name` AS `category_name`, `v`.`status` AS `status`, `v`.`contact_person` AS `contact_person`, `v`.`phone_number` AS `phone_number`, `v`.`email` AS `email`, `v`.`address` AS `address`, `v`.`tax_id` AS `tax_id`, `v`.`payment_terms` AS `payment_terms`, `v`.`supporting_info` AS `supporting_info`, `v`.`created_at` AS `created_at`, `v`.`updated_at` AS `updated_at` FROM (`vendors` `v` left join `categories` `c` on(`v`.`category_id` = `c`.`category_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_orders`
--
ALTER TABLE `archive_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_products`
--
ALTER TABLE `archive_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_vendors`
--
ALTER TABLE `archive_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `invoices_ibfk_1` (`vendor_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`po_number`),
  ADD KEY `vendor_number` (`vendor_number`),
  ADD KEY `invoice_number` (`invoice_number`),
  ADD KEY `product_number` (`product_number`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_number`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `products_ibfk_2` (`vendor_number`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_number`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_orders`
--
ALTER TABLE `archive_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `archive_products`
--
ALTER TABLE `archive_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archive_vendors`
--
ALTER TABLE `archive_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`vendor_number`) REFERENCES `vendors` (`vendor_number`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`vendor_number`) REFERENCES `vendors` (`vendor_number`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`invoice_number`) REFERENCES `invoices` (`invoice_number`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_number`) REFERENCES `products` (`product_number`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`vendor_number`) REFERENCES `vendors` (`vendor_number`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
