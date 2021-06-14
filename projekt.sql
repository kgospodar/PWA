-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 09:24 AM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Pero', 'Perić', 'pperic', '$2y$10$17XGULi6u.mOtwl/E5Fx3OlauWgORT/quC4Wams0fMdx4hqPTSGnS', 0),
(2, 'Karla', 'Gospodarić', 'kgospodar', '$2y$10$.q1tK4MvIIefT9hTjjA6oenv4Doqi/duwQyrlGtrBmj6mWEQyy8ju', 1),
(3, 'Ivan', 'Ivić', 'iivic', '$2y$10$XimDpq3JRYw4uGMhsb6L1e626zDnX23pw0HmEB2xVkI9Ju1zaI2D.', 0),
(6, 'Ivan', 'Ivić', 'lgosp', '$2y$10$L1OSuDwLpD2bj/h6vdzbwOebI7IGt5N5.1vBoIjnbsEnYkJBtQ3qC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int NOT NULL,
  `datum` varchar(32) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '12.06.2021.', 'Vijest', 'aegzhrhetjhsaet', 'tsjsrikztriktz', 'cetiri.jpg', 'sport', 1),
(2, '12.06.2021.', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.', 'dva.jpg', 'glazba', 0),
(3, '12.06.2021.', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.', 'dva.jpg', 'glazba', 0),
(4, '12.06.2021.', 'Vijest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', 'jedan.jpeg', 'glazba', 0),
(5, '12.06.2021.', 'Vijest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', 'jedan.jpeg', 'glazba', 0),
(6, '12.06.2021.', 'Vijest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', 'jedan.jpeg', 'glazba', 0),
(7, '12.06.2021.', 'Sport', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', 'pet.png', 'sport', 0),
(8, '12.06.2021.', 'Vijest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien.', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', '', 'sport', 1),
(9, '12.06.2021.', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nisi ultricies, pulvinar lacus id, malesuada urna. Duis ut porta sapien. Nullam sed lacinia lorem, sit amet rhoncus arcu. Phasellus cursus leo vel tincidunt eleifend. Aliquam erat volutpat. Integer pellentesque maximus nisi, in scelerisque dolor molestie eu. Curabitur sollicitudin ac dolor varius facilisis. Quisque vitae porta erat, sed euismod erat. Nunc sit amet sagittis lacus, quis eleifend odio. Curabitur cursus nibh id neque egestas, vel iaculis erat rhoncus. Etiam nec nibh non libero luctus pharetra quis et turpis. Sed dapibus at justo non ultrices. Vestibulum ut dui a ex efficitur.\r\n\r\n', 'sest.png', 'sport', 0),
(39, '13.06.2021.', 'Vijest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elit magna.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elit magna, et iaculis nulla vulputate id. Curabitur tempus erat eu sem interdum commodo. Integer enim sem, euismod ac pharetra a, lacinia sit amet nisl. Aliquam ornare sapien vel elit placerat accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi ac placerat est, nec tempor leo. Nunc porttitor, risus vel hendrerit blandit, mi risus maximus dui, eu ullamcorper est ex quis elit. Mauris et eleifend neque. Proin eget ex metus. Cras tellus dui, dapibus fermentum velit aliquam, gravida cursus sapien. Cras enim augue, commodo ut commodo volutpat, faucibus non nunc.\r\n\r\nCurabitur quis est lorem. Cras commodo velit sit amet risus rutrum auctor. Integer nunc leo, bibendum congue ornare ut, lobortis eu mauris. Donec ut hendrerit risus. Nulla facilisi. Curabitur vulputate mollis nisl, ac auctor quam euismod ac. Nam tempor interdum molestie. In efficitur turpis eget semper posuere. In quam dolor, suscipit ac sem id, rutrum tempus lorem. Aenean non convallis quam.\r\n\r\nMaecenas ac lacinia felis, et porta nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus et pellentesque mi. Nam maximus, sapien quis feugiat semper, ipsum neque egestas dui, sit amet auctor purus orci at purus. Morbi neque turpis, pretium vel dui in, fermentum molestie nisi. Etiam turpis felis, tristique vel consectetur at, rutrum ornare massa. Maecenas rhoncus malesuada accumsan. Sed viverra suscipit nibh eu tristique. Etiam egestas nec ex sed pellentesque. Aliquam tempus lorem eget mi cursus tempor. Donec efficitur bibendum quam ut molestie. Sed felis massa, egestas eget velit sit amet, elementum porttitor purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent nibh risus, cursus in pulvinar vel, placerat vehicula dolor.\r\n\r\nPraesent sagittis eget urna eget ullamcorper. Pellentesque blandit ullamcorper libero. Integer tincidunt iaculis eros vehicula hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec elit dolor, dapibus eu lectus pharetra, auctor tempor nisl. Nam gravida libero at tortor imperdiet, malesuada cursus tellus efficitur. Fusce ac massa eros. In rhoncus suscipit mauris, hendrerit dignissim nulla vestibulum eget. Donec eget hendrerit urna, in cursus enim. Morbi in elementum orci. Duis purus nisl, euismod eget diam ac, varius dictum risus. Vestibulum eget auctor nisl. Nulla facilisi. Aliquam erat volutpat.\r\n\r\nVestibulum non vulputate ligula. Nunc facilisis accumsan dignissim. Nam at nisi sed purus congue tempus. Pellentesque pharetra a leo vitae accumsan. Aenean eget ultrices nulla. Duis pharetra ligula id lacus lobortis dapibus. Vivamus dapibus vitae purus vel cursus. Nam semper eleifend aliquet. Sed tempor quam sed erat rutrum convallis.\r\n\r\nDonec id felis nulla. Nulla cursus tellus eu iaculis mollis. Integer aliquet bibendum enim id sagittis. Vivamus a elit ut lacus suscipit aliquam a in orci. Aliquam tincidunt mauris non massa hendrerit maximus. Morbi viverra auctor maximus. Proin pretium et enim eget facilisis. Morbi dolor dolor, pharetra et cursus quis, ullamcorper ut nulla. Integer eleifend at sapien vel rutrum.', 'tri.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
