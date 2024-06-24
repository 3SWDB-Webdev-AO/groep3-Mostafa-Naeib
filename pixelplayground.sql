-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 11:51 PM
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
-- Database: `pixelplayground`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(10) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `badge_condition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) NOT NULL,
  `game_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`) VALUES
(1, 'wordle'),
(2, 'connect 4'),
(3, 'galgje'),
(4, 'tictactoe');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `geheime_vraag` varchar(255) NOT NULL,
  `antwoord_geheime_vraag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`, `geheime_vraag`, `antwoord_geheime_vraag`) VALUES
(1, 'admin', 'admin', '', ''),
(11, 'mos', '$2y$10$wkwOyNCcntDWcBU3bZr/s.T.1SVgWaUQqPPIkZi5eaU86j1qYlo1e', 'ja', '$2y$10$CU5KnoDSwvhoRvIs8jQ2jOfqp65utqe08cAKzDklq6Hf1SdXnWEzO'),
(12, 'jin', '$2y$10$v5JZNfqVFGljWOQWVlIioesnHe8wtqu81QYqG7/jSEOqawpqc34GW', 'wanneer ben ik jarig', '$2y$10$2Oc68JD9VmeGvZLykMKb5eYFve7Yv88AF89J7ZTtNoad1v9RRQ0ZK'),
(13, 'test1', '$2y$10$adronCIEa.5uYNhgK/P82eJAmDVCiPJB1awiF2TVTKwaHLIfp05FW', 'ww', '$2y$10$hjmuipivL7CdWeDhKaBKceShguIwoTAsuAtmIWjnxpm/nDBspRXmm'),
(14, 'rr', '$2y$10$cOBngHXtyWxWrcXrJaKqkO/m/zeOR2m.grlhePLpUFpK/ZpypsJd2', '777', '$2y$10$1FaGFQPk2Nperu4T9kve9eN6Ccd19ZG48WTrZsUGA.O8cT.Fl.Y3q'),
(15, 'ii', '$2y$10$pqoNUdZrTiIFsva8ixMVmuMdPS20dT7gsHtnAEdLd1c4rR7Bd81nm', 'ii', '$2y$10$Gb1c/1gL0YM3dMC8IHw4buPr1FnAPdpNct7ZwUZFBIfxhiRaXaaye'),
(16, '43f43', '$2y$10$04.qmS/7J93m10kNvtckv.W3MXCCVm.QJN113kEi/NXJW1QqFLGye', 'frf', '$2y$10$nNdf5pO52GBmZGUPGYAISe//qonnAPBeXbDktqmUfEk.chtWwl0V2'),
(17, 'bb', '$2y$10$onSvUERHUmDEJ6Q/8R2nSOlX29wvroOk6pJhxK/GXEezcxz40r.1u', 'nn', '$2y$10$sA6s7oHebTaguRE3qTiDxuY5GQ0zjQvJJ/0p0g6U3AJ1vzgdZwDoG'),
(18, 'tt', '$2y$10$eCFKnqiKKdgqx2RGSPLpnuhKjBW1mbCH2fuowu7PMi2gtt4OZC3G2', 'tt', '$2y$10$DqAuRuxlElzDblqWDvYlWuRKXkkhksMnG/QVRbtmRIbziYJZyYTUu'),
(19, 'naeib', '$2y$10$x004JH4LIm.dUaGSDlI1NeiEvRgN/T1PH50l9MjR1bae3nssYkMxm', 'hoi', '$2y$10$1xbAsr3YgKuAAuBIVjf2w.a7w7IWBiH//9uHJJTxGA9cq0i/iTulK'),
(20, 'sdfsdf', '$2y$10$SgPjEb.14NeLArjy40PNjeJpe1in3NjARsPNq5z3GULdOSBUwlxta', 'dsf', '$2y$10$MDS6u5AvXr7J7v2d1QrYp./YZi6aqJgXdJ5/XQiZKVeIEty5mAFs6'),
(21, 'test12', '$2y$10$YSD6rY1Nz8kbx7vCvhQkP.vcLkbOvFadKc3Hbn0l1YpibBIGBkfqO', '123', '$2y$10$ZWHRlEAGGE3adLxmaaS7AO242.T3lM9yXrjWdlBmEKb4XIqR4vTbq'),
(22, 'test13', '$2y$10$3K8QK89cCwedKXx3gewRV.ZFaZ27zyjl52g9nlv9RHpEKBh1Ek8UC', '123', '$2y$10$AjpiDVgA/lm8EYxnjGwGIOM0jmL5b4X2h8Qobb7vqfOpTahAZqCl6'),
(23, 'test11', '$2y$10$AzY4z5Fite5WVz4Er6a7v.u2RdWtnyZqBnyx/9lOpuNYAcgxTfL7i', '123', '$2y$10$tVNmcjWhr9kDZPHJrzBQKe4V0oNmtDgsbtIyySix9Mo8Gp4HEI.LK');

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_badge`
--

CREATE TABLE `gebruiker_badge` (
  `gebruiker_id` int(10) NOT NULL,
  `badge_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_toernooien`
--

CREATE TABLE `gebruiker_toernooien` (
  `gebruiker_id` int(10) NOT NULL,
  `toernooi_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `highscores`
--

CREATE TABLE `highscores` (
  `game_id` int(10) NOT NULL,
  `gebruiker_id` int(10) NOT NULL,
  `highscore` int(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highscores`
--

INSERT INTO `highscores` (`game_id`, `gebruiker_id`, `highscore`, `timestamp`) VALUES
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 1050, '2024-04-15 09:48:35'),
(1, 1, 1750, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 1, 1450, '2024-04-15 09:48:35'),
(1, 1, 1250, '2024-04-15 09:48:35'),
(1, 1, 900, '2024-04-15 09:48:35'),
(1, 1, 600, '2024-04-15 09:48:35'),
(1, 1, -500, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 1100, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 850, '2024-04-15 09:48:35'),
(1, 0, 2080, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2220, '2024-04-15 09:48:35'),
(1, 0, 2060, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2100, '2024-04-15 09:48:35'),
(1, 0, 1880, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(2, 1, 1000, '2024-04-15 09:48:35'),
(4, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:51:22'),
(2, 0, 1000, '2024-04-15 09:52:31'),
(0, 0, 18, '2024-06-21 08:13:12'),
(0, 0, 18, '2024-06-21 08:13:18'),
(0, 0, 18, '2024-06-21 08:13:22'),
(0, 0, 18, '2024-06-21 08:13:27'),
(0, 0, 18, '2024-06-21 08:13:33'),
(0, 0, 18, '2024-06-21 08:13:37'),
(0, 0, 18, '2024-06-21 08:13:42'),
(0, 0, 18, '2024-06-21 08:13:49'),
(0, 0, 18, '2024-06-21 08:13:53'),
(0, 0, 18, '2024-06-21 08:14:02'),
(0, 0, 18, '2024-06-21 08:30:07'),
(0, 0, 18, '2024-06-21 08:30:23'),
(0, 0, 18, '2024-06-21 08:30:26'),
(0, 0, 18, '2024-06-21 08:30:28'),
(0, 0, 18, '2024-06-21 08:30:32'),
(0, 0, 18, '2024-06-21 21:38:18'),
(0, 0, 18, '2024-06-21 21:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `toernooien`
--

CREATE TABLE `toernooien` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vrienden`
--

CREATE TABLE `vrienden` (
  `gebruiker_id` int(10) NOT NULL,
  `vriend_id` int(10) NOT NULL,
  `status` enum('pending','accepted') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrienden`
--

INSERT INTO `vrienden` (`gebruiker_id`, `vriend_id`, `status`) VALUES
(0, 1043, 'pending'),
(21, 11, 'pending'),
(21, 22, 'accepted'),
(22, 22, 'pending'),
(23, 1, 'pending'),
(23, 11, 'pending'),
(12, 11, 'pending'),
(22, 23, 'pending'),
(1, 2, 'accepted'),
(12, 23, 'pending'),
(123232, 2332432, 'pending'),
(1, 1, 'pending'),
(1, 1, 'pending'),
(33, 34, 'accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`);

--
-- Indexes for table `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vrienden`
--
ALTER TABLE `vrienden`
  ADD KEY `idx_gebruiker_id` (`gebruiker_id`),
  ADD KEY `idx_vriend_id` (`vriend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
