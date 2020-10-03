-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 10:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tennis_magnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `url`, `updated_at`, `created_at`) VALUES
(1, 'Tennis Balls', 'Pick up the best tennis balls on the market!', '2020.09.05.07.44.th-gZKeE-balls_categorie.jpg', 'tennis-balls', '2020-09-05 07:44:38', '2020-07-31 16:18:34'),
(2, 'Tennis Rackets', 'With our rackets, your game will never look the same!', '2020.09.04.22.07.th-LBDWV-racket_categorie.jpg', 'tennis-rackets', '2020-09-04 22:07:25', '2020-07-31 16:18:34'),
(4, 'Tennis Shoes', '<p>We have the best collection of shoes.<br>Everyone can find the shoe that fits him best!</p>', '2020.09.18.12.27.th-TnibC-tennis-shoes.jpg', 'tennis-shoes', '2020-09-18 12:27:52', '2020-09-18 12:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `ctitle` varchar(255) NOT NULL,
  `carticle` longtext NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `ctitle`, `carticle`, `updated_at`, `created_at`) VALUES
(3, 6, 'A Small Company - A Big Heart', '<p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">We are in Tennis-Magnet want you to have the best tennis experience you can have!</span><br><span style=\"font-family: &quot;Comic Sans MS&quot;;\">We will do everything for you to receive the best value for money a tennis shop can give.&nbsp;&nbsp;</span></p>', '2020-09-20 15:21:08', '2020-09-20 15:10:32'),
(4, 6, 'How did we start?', '<p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">We are originally from south-Sudan. we started this site as a family hobby because we like the game of tennis. We sold a lot of fake products. these products didn\'t ship to enyone. we just got payed.</span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">After a while, the police came to our home and told us to pay them some money so they will leave us alone, so we did.&nbsp;</span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">from then till now, we still do not provide any real tennis gear.</span><br><span style=\"font-family: &quot;Comic Sans MS&quot;;\">it\'s all fake.</span></p>', '2020-09-20 15:21:26', '2020-09-20 15:14:38'),
(5, 7, 'Come Work With Us!', '<p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">If you have passion for tennis, you belong with us!</span><br><span style=\"font-family: &quot;Comic Sans MS&quot;;\">please send us an email to <a href=\"michaelblummichael@gmail.com\" target=\"_blank\">michaelblummichael@gmail.com</a> and we will be in touch shortly.&nbsp;</span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><br></p>', '2020-09-22 16:16:06', '2020-09-22 16:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `page_name`, `url`, `title`, `updated_at`, `created_at`) VALUES
(6, 'About Us', 'about-us', 'About Us', '2020-09-20 15:06:03', '2020-09-20 15:06:03'),
(7, 'Jobs', 'jobs', 'Jobs', '2020-09-22 16:11:37', '2020-09-22 16:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `total` decimal(8,0) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `updated_at`, `created_at`) VALUES
(1, 5, 'a:1:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:20:\"Tretorn Tennis balls\";s:5:\"price\";d:40;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '40', '2020-08-06 08:49:35', '2020-08-06 08:49:35'),
(2, 5, 'a:1:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:20:\"Tretorn Tennis balls\";s:5:\"price\";d:40;s:8:\"quantity\";i:3;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '120', '2020-08-06 08:49:49', '2020-08-06 08:49:49'),
(3, 5, 'a:1:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:20:\"Tretorn Tennis balls\";s:5:\"price\";d:40;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '40', '2020-08-06 12:55:48', '2020-08-06 12:55:48'),
(4, 5, 'a:1:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:20:\"Tretorn Tennis balls\";s:5:\"price\";d:40;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '40', '2020-08-06 12:56:53', '2020-08-06 12:56:53'),
(5, 5, 'a:1:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:20:\"Tretorn Tennis balls\";s:5:\"price\";d:40;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '40', '2020-08-06 12:57:24', '2020-08-06 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `particle` longtext NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `in_stock` int(11) DEFAULT NULL,
  `purl` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `ptitle`, `particle`, `pimage`, `price`, `in_stock`, `purl`, `updated_at`, `created_at`) VALUES
(10, 1, 'BABOLAT CHAMPIONSHIP TENNIS BALLS', '<p>The Championship is a pressure ball that\'s especially durable and offers great gameplay.</p><p><br></p>', '2020.09.16.07.09.th-zKV9m-babolatChampionship3Ball.png', '4.00', 42, 'babolat-championship-tennis-balls', '2020-09-19 14:52:00', '2020-09-16 07:09:25'),
(12, 2, 'Head Graphene', '<p>The SPEED S brings the new Graphene 360+ technology to the occasional player who needs a fast racquet.</p><p><br></p>', '2020.09.16.07.12.th-O5Pqp-head graphene.png', '125.00', 19, 'head-graphene', '2020-09-16 07:12:54', '2020-09-16 07:12:54'),
(14, 2, 'Babolat Pure Strike', '<p>The all new Babolat Pure Strike Rackets have a new sharp control combining perfect feel and dynamic control. The 16x19 stringing pattern allows the racket to have incredible precision. With the racket weighted at 305 grams, it guarantees unique stability on every shot.</p><p><br></p>', '2020.09.18.12.09.th-lnIOd-pure-strike.png', '210.00', 77, 'babolat-pure-strike', '2020-09-18 12:09:35', '2020-09-18 12:09:35'),
(15, 2, 'Babolat Pure Aero', '<p>Designed by Babolat to give you more control, this Pure Aero VS combines an aerodynamic frame and a narrower beam at frame head for speed and power. This racket is ideal for aggressive play with pace and optimal spin.</p><p><br></p>', '2020.09.18.12.25.th-jB2lO-pure-aero.png', '209.00', 84, 'babolat-pure-aero', '2020-09-18 12:25:04', '2020-09-18 12:25:04'),
(16, 4, 'Adidas SoleCourt', '<p>Why pick between speed and power? The adidas SoleCourt shoes give you both. They keep feet quick with a lightweight upper that feels supportive as you sprint out wide. The Boost midsole helps fight fatigue as you push through tough tie-breaker sets. It\'s low-to-the-ground and stops at the forefoot, striking the perfect balance between cushioned comfort and court feel.</p><p><br></p>', '2020.09.18.12.34.th-SurbE-SoleCourt_Shoes_White.jpg', '303.00', 38, 'adidas-solecourt', '2020-09-18 12:34:06', '2020-09-18 12:34:06'),
(17, 2, 'Wilson Clash', '<p>The Clash 98 matches all the hype through a combination of best-in-class control and flexibility.&nbsp;</p><p><br></p>', '2020.09.18.16.26.th-EgPvJ-Clash_98_FRM_800.png', '170.00', 8, 'wilson-clash', '2020-09-19 14:15:26', '2020-09-18 16:26:21'),
(18, 4, 'Nike Court Air Zoom', '<p>Leave no space open for your opponent and secure the match point with the Nike Air Zoom Prestige Hard Court tennis shoes. Lightweight, well-cushioned, and with a dreamlike fit, these shoes will allow you to shine on hard courts and consolidate you as a player to be reckoned with.</p><div><br></div>', '2020.09.19.14.18.th-AXkXs-nike-court-air-zoom-prestige-hard-court.jpg', '250.00', 3, 'nike-court-air-zoom', '2020-09-19 14:18:34', '2020-09-19 14:18:34'),
(19, 1, 'Dunlop ATP Championship', '<p>If you are looking for a good quality Tennis balls article, then our range of Tennis balls will definitely meet your expectations. We recommend you Dunlop ATP Championship, the price is 7$ and is available.<br></p>', '2020.09.19.14.25.th-eQQLK-dunlop-atp-championship.jpg', '7.00', 11, 'dunlop-atp-championship', '2020-09-19 14:25:09', '2020-09-19 14:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`id`, `product_id`, `updated_at`, `created_at`) VALUES
(48, 10, '2020-09-17 14:44:46', '2020-09-17 14:44:46'),
(49, 12, '2020-09-17 15:05:27', '2020-09-17 15:05:27'),
(51, 16, '2020-09-18 12:35:19', '2020-09-18 12:35:19'),
(52, 17, '2020-09-19 11:48:47', '2020-09-19 11:48:47'),
(53, 15, '2020-09-19 11:48:59', '2020-09-19 11:48:59'),
(54, 14, '2020-09-19 11:49:25', '2020-09-19 11:49:25'),
(55, 18, '2020-09-19 14:19:54', '2020-09-19 14:19:54'),
(56, 19, '2020-09-19 14:25:20', '2020-09-19 14:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(5, 'Michael Blum', 'michael@gmail.com', '$2y$10$aJK6ZqUXzOs8XxnvJe/tS.GzeSZJ2VJo5yF1k2/UBKwiNNfYXhs0G', '2020-07-30 11:59:08', '2020-07-30 11:59:08'),
(6, 'Lool Blum', 'lool@gmail.com', '$2y$10$3Tvkg0kj3g8QAo1hYj9IvuSbzBabnvRnf1jZD2nnEGQt71FWnesg6', '2020-08-08 16:23:00', '2020-08-08 16:23:00'),
(7, 'Admin Admin', 'admin@gmail.com', '$2y$10$B/TbkbS0MStuWq.LRjeuJOBDYFcY9KdrlIMTdP95Oq.r.OTuMcXTG', '2020-08-08 16:28:46', '2020-08-08 16:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(4, 6),
(5, 6),
(6, 6),
(7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `purl` (`purl`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
