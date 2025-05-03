-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 04:14 PM
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
-- Database: `po_database`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `active_products`
-- (See below for the actual view)
--
CREATE TABLE `active_products` (
`productid` int(11)
,`productnumber` bigint(20)
,`productname` varchar(255)
,`category` varchar(100)
,`description` text
,`stockquantity` int(11)
,`quantitynumber` int(11)
,`unitofmeasurement` varchar(50)
,`unitprice` decimal(10,2)
,`status` varchar(50)
,`imageurl` varchar(255)
,`linkedsupplier` varchar(255)
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
-- Stand-in structure for view `all_orders`
-- (See below for the actual view)
--
CREATE TABLE `all_orders` (
`order_id` int(11)
,`po_number` varchar(100)
,`order_date` date
,`supplier_name` varchar(255)
,`po_status` enum('pending','approved','rejected','completed')
,`delivery_status` enum('pending','delivered','cancelled')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `delivered_orders`
-- (See below for the actual view)
--
CREATE TABLE `delivered_orders` (
`order_id` int(11)
,`po_number` varchar(100)
,`order_date` date
,`supplier_name` varchar(255)
,`product_name` varchar(255)
,`quantity` int(11)
,`unitprice` decimal(10,2)
,`total_price` decimal(10,2)
,`po_status` enum('pending','approved','rejected','completed')
,`delivery_status` enum('pending','delivered','cancelled')
);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceid` int(11) NOT NULL,
  `invoicenumber` varchar(100) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoicedate` date NOT NULL,
  `companyfrom` varchar(255) NOT NULL,
  `companyto` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('active','void','canceled') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceid`, `invoicenumber`, `invoice_date`, `invoicedate`, `companyfrom`, `companyto`, `type`, `description`, `qty`, `amount`, `subtotal`, `total`, `status`) VALUES
(1, 'INV-000015', '2025-04-26', '0000-00-00', 'Your Company', '13', 'Standard', 'Invoice for PO #262306', 488, 25.00, 12200.00, 12200.00, 'active'),
(2, 'INV-000016', '2025-04-27', '0000-00-00', 'Your Company', '13', 'Standard', 'Invoice for PO #272139', 147, 20.00, 2940.00, 2940.00, 'active'),
(3, 'INV-000017', '2025-04-28', '0000-00-00', 'Your Company', '13', 'Standard', 'Invoice for PO #282031', 579, 20.00, 11580.00, 11580.00, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `po_number` varchar(100) NOT NULL,
  `linkedsupplier` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `po_type` varchar(50) DEFAULT NULL,
  `priority_level` varchar(50) DEFAULT NULL,
  `po_status` enum('pending','approved','rejected','completed') DEFAULT 'pending',
  `delivery_status` enum('pending','delivered','cancelled') DEFAULT 'pending',
  `delivery_address` text DEFAULT NULL,
  `expected_delivery` date DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unitprice`) STORED,
  `payment_method` varchar(50) DEFAULT NULL,
  `invoice_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `po_number`, `linkedsupplier`, `vendor_id`, `order_date`, `po_type`, `priority_level`, `po_status`, `delivery_status`, `delivery_address`, `expected_delivery`, `order_notes`, `productid`, `quantity`, `unitprice`, `payment_method`, `invoice_number`, `created_at`, `updated_at`) VALUES
(15, '262306', '13', 15, '2025-04-26', 'Standard', 'High', 'pending', 'pending', '8318 Franey Turnpike', '2025-01-15', 'officia natus maxime', 2, 488, 25.00, 'Bank Transfer', 'INV-000015', '2025-04-26 15:01:16', '2025-04-26 15:01:16'),
(16, '272139', '13', 11, '2025-04-27', 'Standard', 'High', 'pending', 'pending', '6130 Ankunding Branch', '2024-05-15', 'facilis aspernatur architecto', 1, 147, 20.00, 'Cash', 'INV-000016', '2025-04-27 13:50:05', '2025-04-27 13:50:05'),
(17, '282031', '13', 15, '2025-04-28', 'Standard', 'High', 'pending', 'pending', '4685 Kiehn Passage', '2024-05-09', 'voluptas dolore consequuntur', 1, 579, 20.00, 'Bank Transfer', 'INV-000017', '2025-04-28 12:52:40', '2025-04-28 12:52:40');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details_view`
-- (See below for the actual view)
--
CREATE TABLE `order_details_view` (
`order_id` int(11)
,`po_number` varchar(100)
,`order_date` date
,`po_status` enum('pending','approved','rejected','completed')
,`delivery_status` enum('pending','delivered','cancelled')
,`productid` int(11)
,`productname` varchar(255)
,`linkedsupplier` varchar(255)
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
(6, '2/10 Net 30'),
(7, '50% Upfront, 50% on Completion'),
(5, 'Cash in Advance (CIA)'),
(4, 'Cash on Delivery (COD)'),
(1, 'Net 30'),
(2, 'Net 60'),
(3, 'Net 90'),
(8, 'Upon Receipt');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productnumber` bigint(20) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `stockquantity` int(11) NOT NULL DEFAULT 0,
  `quantitynumber` int(11) DEFAULT NULL,
  `unitofmeasurement` varchar(50) DEFAULT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `imageurl` varchar(255) DEFAULT NULL,
  `linkedsupplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productnumber`, `productname`, `category`, `description`, `stockquantity`, `quantitynumber`, `unitofmeasurement`, `unitprice`, `status`, `imageurl`, `linkedsupplier`) VALUES
(1, 100001, 'Cotton', 'Raw Material', 'High-quality cotton for textiles', 49, 50, 'kg', 20.00, 'active', 'cotton.jpg', '13'),
(2, 100002, 'Wool', 'Raw Material', 'Premium wool for garments', 300, 30, 'kg', 25.00, 'active', 'wool.jpg', '13'),
(3, 100003, 'Leather', 'Raw Material', 'Durable leather for manufacturing', 200, 20, 'sqft', 50.00, 'pending', 'leather.jpg', '14'),
(4, 100004, 'Logs', 'Raw Material', 'High-quality logs for construction', 100, 10, 'pieces', 100.00, 'active', 'logs.jpg', '15'),
(5, 100005, 'Sand', 'Raw Material', 'Fine sand for construction and glassmaking', 1000, 100, 'kg', 5.00, 'rejected', 'sand.jpg', '15'),
(12, 262135, 'Ledner', 'category3', 'Eos dolore occaecati corrupti cupiditate.', 0, NULL, NULL, 423.00, 'pending', NULL, '12'),
(13, 272220, 'Bergnaum', 'category3', 'Nobis harum vero enim.', 0, NULL, NULL, 427.00, 'pending', NULL, '15'),
(14, 272223, 'Ruecker', 'category3', 'Ducimus quasi molestias vel ad accusantium soluta necessitatibus ab.', 0, NULL, NULL, 383.00, 'pending', NULL, '15'),
(15, 272229, 'Towne', 'category3', 'Sit commodi quia nisi quia iusto nemo maiores.', 0, NULL, NULL, 173.00, 'pending', NULL, '12'),
(16, 272236, 'Keebler', 'category1', 'Natus placeat rem modi placeat.', 0, NULL, NULL, 25.00, 'pending', NULL, '11'),
(17, 282004, 'Stamm', 'category3', 'In eos odit incidunt alias animi inventore explicabo omnis dolorem.', 0, NULL, NULL, 580.00, 'pending', NULL, '15'),
(18, 282009, 'Buckridge', 'category1', 'Inventore doloremque ab illum ex laudantium eos sint.', 0, NULL, NULL, 200.00, 'pending', NULL, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userID`, `firstname`, `middlename`, `lastname`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'test@gmail.com', 'test', 'user', '2025-04-12 05:13:56', '2025-04-12 05:13:56'),
(3, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', '2025-04-12 05:31:48', '2025-04-12 05:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_number` int(40) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('active','pending','rejected','inactive') NOT NULL DEFAULT 'pending',
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

INSERT INTO `vendors` (`vendor_id`, `vendor_number`, `vendor_name`, `vendor_description`, `category_id`, `status`, `contact_person`, `phone_number`, `email`, `address`, `tax_id`, `payment_terms`, `supporting_info`, `created_at`, `updated_at`) VALUES
(11, 1001, 'Supplier A', NULL, 1, 'active', 'John Doe', '123-456-7890', 'supplierA@example.com', '123 Main St, City A', NULL, NULL, NULL, '2025-04-18 00:30:43', '2025-04-18 00:30:43'),
(12, 1002, 'Supplier B', NULL, 2, 'active', 'Jane Smith', '987-654-3210', 'supplierB@example.com', '456 Elm St, City B', NULL, NULL, NULL, '2025-04-18 00:31:47', '2025-04-18 00:31:47'),
(13, 1003, 'Supplier C', NULL, 3, 'pending', 'Alice Johnson', '555-123-4567', 'supplierC@example.com', '789 Oak St, City C', NULL, NULL, NULL, '2025-04-18 00:31:47', '2025-04-18 00:31:47'),
(14, 1004, 'Supplier D', NULL, 4, 'inactive', 'Bob Brown', '444-987-6543', 'supplierD@example.com', '321 Pine St, City D', NULL, NULL, NULL, '2025-04-18 00:31:47', '2025-04-18 00:31:47'),
(15, 1005, 'Supplier E', NULL, 5, 'active', 'Charlie White', '333-555-7777', 'supplierE@example.com', '654 Maple St, City E', NULL, NULL, NULL, '2025-04-18 00:31:47', '2025-04-18 00:31:47'),
(19, 181237, 'Voluptas iure hic voluptas.', 'Quia eaque ipsam quas assumenda nobis repellendus cupiditate maxime.', 5, 'pending', 'Perspiciatis voluptatem quo ducimus at iure.', '536', 'your.email+fakedata62377@gmail.com', '12671 Goyette Lake', '536', '2', '../uploads/downloadImage.png', '2025-04-17 22:43:48', '2025-04-18 04:43:48'),
(20, 282051, 'Quaerat deleniti officia consequatur accusantium aperiam.', 'Veniam atque fugit ipsa sapiente pariatur beatae suscipit quisquam repellat.', 5, 'pending', 'Atque quo placeat eligendi ducimus repudiandae pariatur.', '567', 'your.email+fakedata37635@gmail.com', '5683 Sydnee Fort', '567', '2', NULL, '2025-04-28 06:53:00', '2025-04-28 12:53:00'),
(21, 282000, 'Autem dicta consequuntur doloribus asperiores perferendis mollitia illum sunt.', 'Maiores illo perspiciatis corrupti debitis distinctio aliquid aut.', 2, 'pending', 'Eveniet quibusdam ea maiores vero.', '128', 'your.email+fakedata29908@gmail.com', '142 Maverick Summit', '128', '8', NULL, '2025-04-28 06:53:10', '2025-04-28 12:53:10'),
(22, 282046, 'At autem eum doloribus animi corrupti cum necessitatibus.', 'Enim id amet.', 4, 'pending', 'Quas iusto vitae ipsam sit doloribus dignissimos illo.', '633', 'your.email+fakedata85893@gmail.com', '5637 Joshuah Burgs', '633', '7', NULL, '2025-04-28 06:53:54', '2025-04-28 12:53:54'),
(23, 282055, 'Aliquam minima omnis.', 'Dolorum totam beatae officia totam error.', 4, 'pending', 'Laudantium repellat totam eius est provident.', '71', 'your.email+fakedata66988@gmail.com', '5340 Leannon Views', '71', '7', NULL, '2025-04-28 06:54:09', '2025-04-28 12:54:09'),
(24, 282009, 'Omnis perferendis nihil.', 'Sequi at dolorum numquam.', 4, 'pending', 'Nesciunt aspernatur maxime minus dicta voluptas voluptatibus architecto ratione.', '403', 'your.email+fakedata65078@gmail.com', '1964 Stiedemann Orchard', '403', '1', NULL, '2025-04-28 06:54:22', '2025-04-28 12:54:22');

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
(5, 'Automotive'),
(3, 'Clothing'),
(1, 'Electronics'),
(4, 'Food'),
(2, 'Furniture');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vendor_details_view`
-- (See below for the actual view)
--
CREATE TABLE `vendor_details_view` (
`vendor_id` int(11)
,`vendor_number` int(40)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active_products`  AS SELECT `products`.`productid` AS `productid`, `products`.`productnumber` AS `productnumber`, `products`.`productname` AS `productname`, `products`.`category` AS `category`, `products`.`description` AS `description`, `products`.`stockquantity` AS `stockquantity`, `products`.`quantitynumber` AS `quantitynumber`, `products`.`unitofmeasurement` AS `unitofmeasurement`, `products`.`unitprice` AS `unitprice`, `products`.`status` AS `status`, `products`.`imageurl` AS `imageurl`, `products`.`linkedsupplier` AS `linkedsupplier` FROM `products` WHERE `products`.`status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `active_vendors`
--
DROP TABLE IF EXISTS `active_vendors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active_vendors`  AS SELECT `vendors`.`vendor_id` AS `vendor_id`, `vendors`.`vendor_name` AS `vendor_name`, `vendors`.`contact_person` AS `contact_person`, `vendors`.`email` AS `email`, `vendors`.`phone_number` AS `phone_number`, `vendors`.`address` AS `address`, `vendors`.`status` AS `status` FROM `vendors` WHERE `vendors`.`status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `all_orders`
--
DROP TABLE IF EXISTS `all_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_orders`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`po_number` AS `po_number`, `o`.`order_date` AS `order_date`, `v`.`vendor_name` AS `supplier_name`, `o`.`po_status` AS `po_status`, `o`.`delivery_status` AS `delivery_status` FROM (`orders` `o` join `vendors` `v` on(`o`.`vendor_id` = `v`.`vendor_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `delivered_orders`
--
DROP TABLE IF EXISTS `delivered_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `delivered_orders`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`po_number` AS `po_number`, `o`.`order_date` AS `order_date`, `v`.`vendor_name` AS `supplier_name`, `p`.`productname` AS `product_name`, `o`.`quantity` AS `quantity`, `o`.`unitprice` AS `unitprice`, `o`.`total_price` AS `total_price`, `o`.`po_status` AS `po_status`, `o`.`delivery_status` AS `delivery_status` FROM ((`orders` `o` join `vendors` `v` on(`o`.`vendor_id` = `v`.`vendor_id`)) join `products` `p` on(`o`.`productid` = `p`.`productid`)) WHERE `o`.`delivery_status` = 'delivered' ;

-- --------------------------------------------------------

--
-- Structure for view `order_details_view`
--
DROP TABLE IF EXISTS `order_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`po_number` AS `po_number`, `o`.`order_date` AS `order_date`, `o`.`po_status` AS `po_status`, `o`.`delivery_status` AS `delivery_status`, `o`.`productid` AS `productid`, `p`.`productname` AS `productname`, `p`.`linkedsupplier` AS `linkedsupplier`, `v`.`vendor_id` AS `vendor_id`, `v`.`vendor_name` AS `supplier_name` FROM ((`orders` `o` left join `products` `p` on(`o`.`productid` = `p`.`productid`)) left join `vendors` `v` on(`p`.`linkedsupplier` = `v`.`vendor_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vendor_details_view`
--
DROP TABLE IF EXISTS `vendor_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vendor_details_view`  AS SELECT `v`.`vendor_id` AS `vendor_id`, `v`.`vendor_number` AS `vendor_number`, `v`.`vendor_name` AS `vendor_name`, `v`.`vendor_description` AS `vendor_description`, `v`.`category_id` AS `category_id`, `vc`.`category_name` AS `category_name`, `v`.`status` AS `status`, `v`.`contact_person` AS `contact_person`, `v`.`phone_number` AS `phone_number`, `v`.`email` AS `email`, `v`.`address` AS `address`, `v`.`tax_id` AS `tax_id`, `v`.`payment_terms` AS `payment_terms`, `v`.`supporting_info` AS `supporting_info`, `v`.`created_at` AS `created_at`, `v`.`updated_at` AS `updated_at` FROM (`vendors` `v` left join `vendor_categories` `vc` on(`v`.`category_id` = `vc`.`category_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `invoicenumber` (`invoicenumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `po_number` (`po_number`),
  ADD KEY `linkedsupplier` (`linkedsupplier`),
  ADD KEY `productid` (`productid`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `fk_invoice` (`invoice_number`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD UNIQUE KEY `term_name` (`term_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productnumber` (`productnumber`),
  ADD KEY `linkedsupplier` (`linkedsupplier`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `emailaddress` (`emailaddress`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_invoice` FOREIGN KEY (`invoice_number`) REFERENCES `invoice` (`invoicenumber`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`linkedsupplier`) REFERENCES `products` (`linkedsupplier`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
