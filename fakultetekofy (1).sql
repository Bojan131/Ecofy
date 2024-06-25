-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 11:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fakultetekofy`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `song_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `song_id`) VALUES
(95, 14, 51),
(96, 14, 52),
(99, 24, 9),
(100, 24, 10),
(101, 14, 47),
(104, 25, 14),
(105, 25, 15),
(106, 25, 48),
(107, 25, 49),
(108, 14, 20),
(109, 14, 51),
(111, 14, 53);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) NOT NULL,
  `artist` varchar(191) NOT NULL,
  `song` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `artist`, `song`) VALUES
(1, 'Phil Colins', 'In the air tonight'),
(8, 'Bonnie Tyler', 'Holding out for a hero'),
(9, 'Abba', 'Dancing Queen'),
(10, 'Abba', 'Chiquitita'),
(11, 'Abba', 'Mamma Mia'),
(12, 'New Order', 'Blue Monday'),
(13, 'New Order', 'True faith'),
(14, 'Acdc', 'Highway to Hell'),
(15, 'Acdc', 'Thunderstruck'),
(16, 'Acdc', 'Back In Black'),
(17, 'Guns N Roses', 'Welcome to the jungle'),
(18, 'Guns N Roses', 'Sweet child o mine'),
(19, 'Queen', 'Another one bites the dust'),
(20, 'Queen', 'Bohemian rhapsody'),
(21, 'Ramones', 'Poison heart'),
(22, 'Dire Straits', 'Money for nothing'),
(23, 'Dire Straits', 'Sultans of swing'),
(24, 'Metallica', 'The unforgiven'),
(25, 'Metallica', 'Enter sandman'),
(26, 'Metallica', 'One'),
(27, 'Depeche Mode', 'Enjoy the silence'),
(28, 'Bronski Beat', 'Smalltown boy'),
(29, 'Alphaville', 'Big in Japan'),
(30, 'Alphaville', 'Forever young'),
(31, 'Alphaville', 'Summer in Berlin'),
(32, 'Alphaville', 'Sounds like a melody'),
(33, 'Bryan Adams', 'Summer of 69'),
(34, 'Bryan Adams', 'Please forgive me'),
(35, 'Bryan Adams', 'Run to you'),
(36, 'Bryan Adams', 'Heaven'),
(37, 'Led zeppelin', 'Stairway to heaven'),
(38, 'Led zeppelin', 'Black dog'),
(39, 'Cutting Crew', 'Died in your arms'),
(40, 'Flashdance', 'Final dance'),
(41, 'ZZ Top', 'La grange'),
(42, 'ZZ Top', 'Tush'),
(43, 'Gala', 'Freed from desire'),
(44, 'Phil Collins', 'Do you remember'),
(45, 'Acdc', 'Whole lotta rosie'),
(46, 'Acdc', 'Tnt'),
(47, 'Acdc', 'Shoot the thrill'),
(48, 'Billy Idol', 'Mony mony'),
(49, 'Billy Idol', 'Hot in the city'),
(50, 'Billy Idol', 'Rebel yell'),
(51, 'Billy Idol', 'White wedding'),
(52, 'Donna Summer', 'Hot stuff'),
(53, 'Queen', 'The show must go on'),
(54, 'Queen', 'I want to break free'),
(55, 'A-ha', 'Take on Me'),
(56, 'bojan', 'bojanMP3');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `start_date`, `expiry_date`, `user_id`) VALUES
(40, '2020-12-15 00:00:00', '2024-01-29 00:00:00', 16),
(62, '2020-12-21 00:00:00', '2021-05-20 00:00:00', 23),
(61, '2020-12-21 00:00:00', '2021-01-20 00:00:00', 21),
(55, '2020-12-15 00:00:00', '2021-01-14 00:00:00', 17),
(59, '2020-12-20 00:00:00', '2021-02-18 00:00:00', 19),
(56, '2020-12-16 00:00:00', '2021-09-12 00:00:00', 18),
(57, '2020-12-18 00:00:00', '2021-11-13 00:00:00', 14),
(63, '2020-12-21 00:00:00', '2021-01-20 00:00:00', 24),
(65, '2020-12-28 00:00:00', '2021-03-28 00:00:00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(21, 'i', 'a', 'ekof@mail.com', '123'),
(19, 'Marija', 'Rakic', 'marija@mail.com', '123'),
(20, 'asd', 'ds', 'abc@mail.com', '123'),
(18, 'klk', 'asd', 'asdd@mail.com', '123'),
(17, 'Ivana', 'Iv', 'ivana@mail.com', '123'),
(16, 'mare', '123', 'mare@mail.com', '123'),
(15, '1233', '123', '12@mail.com', '123'),
(14, 'Marko', 'Dzelajlija', 'marko@mail.com', '123'),
(22, 'asd', 'dsa', 'ab@mail.com', '123'),
(23, 'Aleksandra', 'ekof', 'aleksandra@mail.com', '123'),
(24, 'd', 's', 'k@mail.com', '123'),
(25, 'Bojan', 'Colic', 'bojan@mail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
