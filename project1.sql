-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 10:39 AM
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
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` char(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'clocks'),
(2, 'plants'),
(5, 'Morning'),
(6, 'BUS'),
(7, 'NEW YORK'),
(8, 'Peace'),
(9, 'Turtle'),
(10, 'Rocki'),
(11, 'Rosy'),
(12, 'Abstract'),
(13, 'Sea'),
(14, 'Flowers'),
(16, 'Perfumes');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `tittle` varchar(70) NOT NULL,
  `license` varchar(70) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `formate` varchar(50) NOT NULL,
  `active` tinyint(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `tittle`, `license`, `dimension`, `formate`, `active`, `image`, `views`, `tag`, `created_at`) VALUES
(1, 'pinky', 'Free for both personal and commercial use. No need to pay anything. No', '1920x1080', 'JPG', 1, 'picture.jpg', 1, 1, '2024-02-29 22:37:58'),
(4, 'tree', 'License free', '1920x1080', 'pja', 1, 'e0ad39f69f4814e62a98e4c22eccc90c.jpeg', 0, 9, '2024-03-07 22:00:00'),
(5, 'Bus', 'License', '1930x1090', 'JPG', 1, '121a8a5564bbed824b8f52ebe1effb0d.jpeg', 0, 6, '2024-02-28 22:00:00'),
(6, 'sea', 'License', '1930x1090', 'JPG', 1, '600214a8f045aa73c381e9e3d94c57de.jpeg', 0, 13, '2024-02-28 22:00:00'),
(8, 'real', 'License', '1930x1090', 'JPG', 1, '1e8a436eec533cc368194d3782443549.jpeg', 0, 14, '2024-02-29 22:00:00'),
(9, 'clock', 'License', '1930x1090', 'JPG', 1, '9d585bd5af3e735a42cbf7cca171fecb.jpeg', 0, 1, '2024-03-14 22:00:00'),
(10, 'peces', 'License', '1930x1090', 'JPG', 1, '7985c2a624f35d1b86682d4d2d8a22b9.jpeg', 0, 8, '2024-03-14 22:00:00'),
(11, 'rock', 'License free for all', '1930x1090', 'JPG', 1, 'd4e2a7bc71fb69c0de420996a385efc2.jpeg', 0, 10, '2024-02-29 22:00:00'),
(12, 'nn', 'License', '1920x1080', 'pja', 1, '97cb296329bc1a56327913679841fe16.jpeg', 0, 16, '2024-03-10 22:00:00'),
(13, 'nn', 'License', '1920x1080', 'pja', 1, 'ee20bd6468edc35851426f5e6baf5f0b.jpeg', 0, 16, '2024-03-10 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `active`, `created_at`) VALUES
(1, 'menon', 'manaa', 'mahmoud.j@yahoo.com', '$2y$10$yFb3AsCNVOrS2cdTKDeboe14cqEgBVpafruk5Ne1yd4itW/2PnEzC', 1, '2024-02-23 00:48:33'),
(2, 'Eman ELspagh', 'heba', 'eman.el_spagh@yahoo.com', '$2y$10$gG5SV/JtqhvnC6gYlx.HFeea0kZFvcLXujylawKGse8btoyIudNwK', 1, '2024-02-23 00:48:33'),
(4, 'Eman Ibrahim ELspagh', 'mahmoud.ibrahim792@yahoo.com', 'ggg@gamil.com', '$2y$10$v87S70mjaxKUH/1zWBdVj.Q2Vc2n9Il6fGU4T32v4ejaZ.juSif0e', 1, '2024-02-23 23:00:54'),
(9, 'amaany', 'men', 'mahmoud@yahoo.com', '$2y$10$WW/CVS/3ODy8IKKt1PXiJeDXWAuHkre0WsYxYMC6mmoZ9wgRJdMie', 1, '2024-02-23 23:17:50'),
(10, 'AHMED FAHMY', 'AHMED', 'hhg@gamil.com', '$2y$10$D58CgPLq.hWYw', 1, '2024-02-23 23:18:33'),
(11, 'Eman ELspagh', 'emaneman', 'eman@yahoo.com', '$2y$10$TIryrplq7iXPd', 0, '2024-02-23 23:24:44'),
(12, 'EmanELspagh', 'ema', 'em@yahoo.com', '$2y$10$b.k2a5zu/ZrsK', 0, '2024-02-23 23:25:49'),
(13, 'EmanELspagh', 'mana', 'gkgg@gamil', '$2y$10$jmOcfESZLuFWp', 1, '2024-02-23 23:32:43'),
(15, 'Eman Ibrahim ELspagh', 'emann', 'mahd.j@yahoo.com', '$2y$10$Nwe2aNyIeij2V', 0, '2024-02-24 00:12:42'),
(17, 'mena', 'mena', 'e.elspag2362@sci.dmu.ed', '$2y$10$/2mAB8VQw5V8O', 0, '2024-02-24 13:05:57'),
(18, 'Eman Ibrahim ', 'amona', 'e@yahoo.com', '$2y$10$oQ1lhRtYp0GoMWdAHykEzObVPSg7gnFeepaAOQ3rSxURCSuEI/0B2', 1, '2024-02-24 17:55:58'),
(19, 'jj', 'bb', 'mahmou@yahoo.com', '000', 0, '2024-02-24 18:02:17'),
(20, 'mmmm', 'mm', 'mahm@yahoo.com', '00', 0, '2024-02-24 18:36:41'),
(23, 'emaann', 'emma', 'o@yahoo.com', '$2y$10$fKLZpe5ahYVFn', 0, '2024-02-24 19:25:46'),
(25, 'jj', 'em', '.ahmou@yahoo.com', '$2y$10$7tiTbOumjiAn7XbEMlAn7euq0aSzC7yy149xGtzLM3XV.GWxR8AYa', 0, '2024-02-24 22:00:52'),
(26, 'hala ', 'hala', 'hala@gamil', '$2y$10$Q/Tq/alMqIGJbNMJUrPpQuyCfh8sZHkaMSF9i9xciN6CeguNmWteS', 1, '2024-02-25 21:54:41'),
(27, 'hhhhh', 'root', 'ahmoud.j@yahoo.com', '$2y$10$Ev1X9bWIgx012wNrKFhw0OUuTxB3lJCo3fRoglz5U2UvbLnl34irO', 1, '2024-02-26 22:09:52'),
(38, 'bbbb', 'emann', 'klkkmahmoud.ibrahim792@yahoo.com', '$2y$10$DaXsTNZHw7YFftQ1Pou65ee/Tre36GQauZbD8Y/KDAlYfU2xfs5NS', 0, '2024-02-28 21:00:43'),
(40, 'Eman Ibrahim ELspagh', 'hal', 'gjgg@gamil.com', '$2y$10$i7m22Vg8jXEmTiEZJKW03OvPSCfrcqOBpbrh2KIhCcSGYgUwh5yBy', 0, '2024-02-28 21:02:46'),
(41, 'Eman Ibrahim ELspagh', 'pp', 'ema@yahoo.com', '$2y$10$7mgaQ8PHVRrKQZlCMe3.KebABXm3gr1qgvUuAcHlL.zkfM17cxwWe', 1, '2024-02-28 22:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tittle` (`tittle`),
  ADD KEY `tag` (`tag`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`tag`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
