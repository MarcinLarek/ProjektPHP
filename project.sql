-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 07:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `user_id`, `product_id`, `order_date`, `status`) VALUES
(1, 1, 17, '2022-12-01', 'W koszyku');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `price` float NOT NULL,
  `photo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL,
  `dostępność` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `name`, `category`, `price`, `photo`, `description`, `dostępność`) VALUES
(1, 'Logitech MX Keys', 'Klawiatura', 450, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2019/9/pr_2019_9_23_10_17_10_931_04.jpg', 'Bezprzewodowa klawiatura z przełącznikami membranowymi', 1),
(2, 'Logitech K120 Keyboard czarna USB', 'Klawiatura', 59, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2019/4/pr_2019_4_2_10_50_15_342_03.jpg', 'Przewodowa klawiatura z przełącznikami membranowymi', 1),
(3, 'Razer Ornata V2', 'Klawiatura', 259, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/7/pr_2020_7_2_11_27_48_364_02.jpg', 'Przewodowa klawiatura z przełącznikami mechaniczno-membranowymi', 1),
(4, 'KRUX ATAX 65% Pro RGB Wireless (Gateron Yellow Pro)', 'Klawiatura', 259, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/9/pr_2022_9_13_14_10_5_978_08.jpg', 'Bezprzewodowa klawiatura z przełącznikami mechanicznymi', 1),
(5, 'Logitech MX Master 3 Grafit', 'Myszka', 499, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/4/pr_2020_4_22_8_50_55_153_00.jpg', 'Mysz bezprzewodowa', 1),
(6, 'Logitech M705 Marathon', 'Myszka', 149, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/4/pr_2020_4_22_8_41_20_378_00.jpg', 'Mysz bezprzewodowa', 1),
(7, 'Dell MS7421W Srebrna', 'Myszka', 199, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/5/pr_2022_5_16_14_0_15_333_01.jpg', 'Mysz bezprzewodowa', 1),
(8, 'Silver Monkey M90 Wireless Comfort Mouse Black Silent', 'Myszka', 59, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/1/pr_2022_1_20_8_29_15_338_00.jpg', 'Mysz bezprzewodowa', 1),
(9, 'Logitech G PRO X GAMING HEADSET', 'Słuchawki', 459, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/3/pr_2021_3_18_17_10_13_635_01.jpg', 'Przewodowe słuchawki nauszne, zamknięte z mikrofonem', 1),
(10, 'Razer Blackshark V2 X Black', 'Słuchawki', 289, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/9/pr_2020_9_16_10_2_52_401_01.jpg', 'Przewodowe słuchawki nauszne, zamknięte z mikrofonem', 1),
(11, 'SPC Gear VIRO', 'Słuchawki', 189, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/7/pr_2020_7_16_13_55_58_462_00.jpg', 'Przewodowe słuchawki nauszne, zamknięte z mikrofonem', 1),
(12, 'Sony WH-1000XM5 Czarne', 'Słuchawki', 1499, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/5/pr_2022_5_12_19_16_15_20_05.jpg', 'Bezprzewodowe słuchawki nauszne, zamknięte z mikrofonem wbudowanym w słuchawkę', 1),
(13, 'Dell S2721DGFA nanoIPS HDR', 'Monitor', 1799, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/9/pr_2020_9_2_11_10_57_978_00.jpg', 'Przekątna:27\"; Rozdzielczość:2560 x 1440; Matryca:LED, Nano IPS', 1),
(14, 'Dell P2422H', 'Monitor', 799, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_14_9_53_35_764_00.jpg', 'Przekątna:23,8\"; Rozdzielczość:1920 x 1080; Matryca:LED, IPS 8-bit', 1),
(15, 'Gigabyte G24F', 'Monitor', 899, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/11/pr_2022_11_29_9_29_57_31_00.jpg', 'Przekątna:23,8\"; Rozdzielczość:1920 x 1080; Matryca:LED, IPS', 1),
(17, 'Acer SB271BMIX czarny', 'Monitor', 699, 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/7/pr_2022_7_19_15_37_16_305_02.jpg', 'Przekątna:27\"; Rozdzielczość:1920 x 1080; Matryca:LED, IPS 8-bit', 1),
(18, 'Poradnik Bootstrap', 'Poradnik', 69, 'https://images-ext-1.discordapp.net/external/qP6_giIvQJydlOv8BGBjBOwv6BR8ll0GORngPSvrSxU/https/miro.medium.com/max/1200/1%2AEkWwAdxaCYHABs7dDop-NA.png?width=832&height=468', 'Poradnik do popularnej biblioteki CSS, która powinna być używana przy tworzeniu K-A-Ż-D-E-J strony internetowej.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `admin`) VALUES
(1, 'BootstrapFan331', '$2y$10$lcZrqPnY2iFAeoveD0wYjeP//4IWHq2AGnaxENc4kVN.FOX.VFI7i', 1),
(2, 'TestUser', '$2y$10$at6DQsyUvwcoRUQ3MVC4uuL92CsJi4qobPpYMOhgJa5Q3eKSvN0cW', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
