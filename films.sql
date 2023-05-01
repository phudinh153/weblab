-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 06:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `release_year` int(4) NOT NULL,
  `poster` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `release_year`, `poster`, `created_at`, `updated_at`) VALUES
(1, 'Lost In Mekong Delta', 2022, 'https://m.media-amazon.com/images/M/MV5BMzQ1NTA4MmMtMmU0Mi00MTQ3LTkxMDktMDc3MDdkOTIwNTlhXkEyXkFqcGdeQXVyMTE2NTUzNzc5._V1_.jpg', '2023-03-14 08:41:52', '2023-04-28 09:02:53'),
(2, 'Thor: Love and Thunder', 2022, 'https://m.media-amazon.com/images/M/MV5BYmMxZWRiMTgtZjM0Ny00NDQxLWIxYWQtZDdlNDNkOTEzYTdlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UY2500_.jpg', '2023-03-14 08:51:14', '2023-04-28 08:54:38'),
(3, 'Spiderman: No way home', 2021, 'https://upload.wikimedia.org/wikipedia/vi/7/71/%C3%81p_ph%C3%ADch_phim_Ng%C6%B0%E1%BB%9Di_Nh%E1%BB%87n_kh%C3%B4ng_c%C3%B2n_nh%C3%A0.jpg', '2023-04-25 06:29:36', '2023-04-25 06:29:36'),
(4, 'Megan', 2022, 'https://m.media-amazon.com/images/M/MV5BMDk4MTdhYzEtODk3OS00ZDBjLWFhNTQtMDI2ODdjNzQzZTA3XkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_FMjpg_UY2500_.jpg', '2023-04-25 06:32:36', '2023-04-28 09:07:16'),
(5, 'Naruto', 1999, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:34:12', '2023-04-28 09:09:04'),
(6, 'Naruto 2', 2001, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:39:02', '2023-04-28 09:09:09'),
(7, 'Naruto 3', 2002, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:39:34', '2023-04-28 09:09:12'),
(8, 'Naruto 4', 2005, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:40:27', '2023-04-28 09:09:16'),
(9, 'Naruto 5', 2008, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:41:03', '2023-04-28 09:09:20'),
(10, 'Naruto 6', 2010, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:44:48', '2023-04-28 09:09:24'),
(11, 'Naruto 7', 2011, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:45:32', '2023-04-28 09:09:28'),
(12, 'Naruto 8', 2012, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1080_.jpg', '2023-04-25 06:46:12', '2023-04-28 09:09:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
