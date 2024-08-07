-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 10:10 AM
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
-- Database: `chart`
--

-- --------------------------------------------------------

--
-- Table structure for table `spotify_quarterly_1`
--

CREATE TABLE `spotify_quarterly_1` (
  `date` varchar(50) DEFAULT NULL,
  `total_revenue` int(11) DEFAULT NULL,
  `cost_of_revenue` int(11) DEFAULT NULL,
  `gross_profit` int(11) DEFAULT NULL,
  `premium_revenue` int(11) DEFAULT NULL,
  `premium_cost_revenue` int(11) DEFAULT NULL,
  `premium_gross_profit` int(11) DEFAULT NULL,
  `ad_revenue` int(11) DEFAULT NULL,
  `ad_cost_revenue` int(11) DEFAULT NULL,
  `ad_gross_profit` int(11) DEFAULT NULL,
  `mau` int(11) DEFAULT NULL,
  `premium_mau` int(11) DEFAULT NULL,
  `ad_mau` int(11) DEFAULT NULL,
  `premium_arpu` int(11) DEFAULT NULL,
  `salesandmarketing_cost` int(11) DEFAULT NULL,
  `researchanddev_cost` int(11) DEFAULT NULL,
  `generalandadmin_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `spotify_quarterly_1`
--

INSERT INTO `spotify_quarterly_1` (`date`, `total_revenue`, `cost_of_revenue`, `gross_profit`, `premium_revenue`, `premium_cost_revenue`, `premium_gross_profit`, `ad_revenue`, `ad_cost_revenue`, `ad_gross_profit`, `mau`, `premium_mau`, `ad_mau`, `premium_arpu`, `salesandmarketing_cost`, `researchanddev_cost`, `generalandadmin_cost`) VALUES
('Date', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('31-03-2023', 3042, 2276, 776, 2713, 1937, 776, 329, 339, -10, 515, 210, 317, 4, 347, 435, 140),
('31-12-2022', 3166, 2365, 801, 2717, 1939, 778, 449, 426, 23, 489, 205, 295, 4, 453, 415, 164),
('30-09-2022', 3036, 2286, 750, 2651, 1908, 743, 385, 378, 7, 456, 195, 273, 4, 432, 386, 160),
('30-06-2022', 2864, 2160, 704, 2504, 1804, 700, 360, 356, 4, 433, 188, 265, 4, 391, 336, 171),
('31-03-2022', 2661, 1990, 671, 2379, 1704, 675, 282, 286, -4, 422, 182, 252, 4, 296, 250, 131),
('31-12-2021', 2689, 1977, 712, 2295, 1625, 670, 394, 352, 42, 406, 180, 236, 4, 340, 253, 126),
('30-09-2021', 2501, 1833, 668, 2178, 1545, 633, 323, 288, 35, 381, 172, 220, 4, 280, 208, 105),
('30-06-2021', 2331, 1668, 663, 2056, 1423, 633, 275, 245, 30, 365, 165, 210, 4, 279, 255, 117),
('31-03-2021', 2147, 1599, 548, 1931, 1393, 538, 216, 206, 10, 356, 158, 208, 4, 236, 196, 102),
('31-12-2020', 2168, 1593, 575, 1887, 1342, 545, 281, 251, 30, 345, 155, 199, 4, 294, 232, 118),
('30-09-2020', 1975, 1486, 489, 1790, 1302, 488, 185, 184, 1, 320, 144, 185, 4, 256, 176, 97),
('30-06-2020', 1889, 1410, 479, 1758, 1263, 495, 131, 147, -16, 299, 138, 170, 4, 248, 267, 131),
('31-03-2020', 1848, 1376, 472, 1700, 1219, 481, 148, 157, -9, 286, 130, 163, 4, 231, 162, 96),
('31-12-2019', 1855, 1381, 474, 1638, 1189, 449, 217, 192, 25, 271, 124, 153, 4, 276, 173, 102),
('30-09-2019', 1731, 1290, 441, 1561, 1142, 419, 170, 148, 22, 248, 113, 141, 4, 178, 136, 73),
('30-06-2019', 1667, 1233, 434, 1502, 1089, 413, 165, 144, 21, 232, 108, 129, 4, 200, 151, 86),
('31-03-2019', 1511, 1138, 373, 1385, 1023, 362, 126, 115, 11, 217, 100, 123, 4, 172, 155, 93),
('31-12-2018', 1495, 1096, 399, 1320, 959, 361, 175, 147, 28, 207, 96, 116, 4, 163, 100, 42),
('30-09-2018', 1352, 1010, 342, 1210, 894, 316, 142, 116, 26, 191, 87, 109, 4, 146, 135, 67),
('30-06-2018', 1273, 944, 329, 1150, 841, 309, 123, 103, 20, 180, 83, 101, 4, 173, 143, 103),
('31-03-2018', 1139, 856, 283, 1037, 767, 270, 102, 89, 13, 170, 75, 99, 4, 138, 115, 71),
('31-12-2017', 1449, 867, 582, 1018, 761, 257, 130, 106, 24, 160, 71, 93, 5, 173, 123, 73),
('30-09-2017', 1032, 802, 230, 923, 711, 212, 109, 91, 18, 150, 62, 91, 5, 138, 98, 67),
('30-06-2017', 1007, 775, 232, 904, 686, 218, 103, 89, 14, 138, 59, 83, 5, 146, 95, 70),
('31-03-2017', 902, 797, 105, 828, 710, 118, 74, 87, -13, 131, 52, 82, 5, 110, 80, 54),
('31-12-2016', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
