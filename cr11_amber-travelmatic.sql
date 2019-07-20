-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 12:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_amber-travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `concerts_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `price` float(6,2) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`concerts_id`, `name`, `address`, `description`, `date`, `price`, `url`, `image`) VALUES
(1, 'Elbow', 'Huxley\'s New World\r\nHasenheide 107 - 113 \r\nD-10967 Berlin', 'Formed in Bury in the 90’s when all the members were in sixth form, elbow’s history now encompasses seven studio albums, a long list of awards and a place in the roll call of great British Bands', '2019-11-14 19:00:00', 40.05, 'https://huxleysneuewelt.com/shows/elbow', 'https://huxleysneuewelt.com/wp-content/uploads/2019/03/Press-Photo-credit-Andrew-Whitton-Andere.jpg'),
(2, 'The Proclaimers', 'Edinburgh Castle, Castlehill, Edinburgh EH1 2NG', 'The Proclaimers are returning to Edinburgh Castle for the first time in over 10 years.', '2019-07-21 19:00:00', 45.20, 'https://www.edinburghcastle.scot/whats-on/concerts/the-proclaimers', 'https://i2-prod.dailyrecord.co.uk/incoming/article13617620.ece/ALTERNATES/s615/1_TheProclaimers_4_15_by_MurdoMacleodJPG.jpg'),
(3, 'Death Cab for Cutie', 'Esplanade Theatre, Singapore, Singapore', 'After more than a decade, Grammy-nominated indie rock darlings Death Cab for Cutie return to Esplanade for a one-night-only concert.', '2019-07-25 20:00:00', 68.00, 'https://www.esplanade.com/festivals-and-series/mosaic-music-series/2019/death-cab-for-cutie', 'https://www.esplanade.com/-/media/images/events/2019/d/death-cab-for-cutie-02.jpg?mw=1920'),
(4, 'Pixies', 'Gasometer, Guglgasse 6, 1110 Wien, Austria', 'Pixies will be releasing their new studio album in the fall and starting their world tour at the same time!', '2019-10-09 20:00:00', 54.90, 'https://www.oeticket.com/artist/pixies/', 'https://bankaustria.wien-ticket.at/tools/imager/imager.php?file=%2Fmedia%2Fimage%2Foriginal%2F4070.jpg&width=1500');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `places_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`places_id`, `name`, `address`, `type`, `description`, `url`, `image`) VALUES
(1, 'Gorgie City Farm', '51 Gorgie Rd, Edinburgh EH11 2LA', 'Urban Farm', 'Gorgie City Farm is a city farm in Gorgie. south-west Edinburgh. Animals include cows, sheep and goats. There is a small play park encouraging imagination led play.', 'https://www.gorgiecityfarm.org.uk/', 'https://media-cdn.tripadvisor.com/media/photo-s/0d/77/2c/35/entrance-to-the-farm.jpg'),
(2, 'Kahlenberg', '1190 Vienna, Austria', 'Nature', 'The Kahlenberg is a hill located in the 19th District of Vienna, Austria.', 'https://www.wien.info/en/sightseeing/green-vienna/Kahlenberg', 'https://www.wien.info/media/images/40419-buschenschank-weinberge-blick-auf-wien-wieninger-am-nussberg-kahlenberg-19to1.jpeg'),
(3, 'Sepilok Orangutan Rehabilitation Centre', 'Sabah Wildlife Department, W.D.T. 200, Sandakan, Jalan Sepilok, 90000 Sandakan, Sabah, Malaysia', 'Animal Sanctuary', 'The first official orangutan rehabilitation project for rescued orphaned baby orangutans from logging sites, plantations, illegal hunting or kept as pets.', 'https://www.orangutan-appeal.org.uk/about-us/sepilok-orangutan-rehabilitation-centre', 'https://cheeseweb.eu/wp-content/uploads/2013/05/SEPILOK-ORANG-UTAN-REHABILITATION-CENTRE-sabah-malaysia.png'),
(4, 'Etihad Stadium', 'Ashton New Rd, Manchester M11 3FF', 'Sports Stadium', 'The Etihad Stadium is the home of Manchester City', 'https://www.mancity.com/ticket-information/visiting-the-campus/visiting-the-etihad-stadium', 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Etihad_Stadium.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cuisine` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `long` decimal(10,6) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `restaurant_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`name`, `phone`, `cuisine`, `description`, `address`, `lat`, `long`, `url`, `image`, `restaurant_id`) VALUES
('Mono', '+44131 466 4726', 'Italian', 'Fresh cuisine that follows the roots of culinary principles in Italy: excellent quality ingredients, honest cooking and the belief that food is culture.', '85 South Bridge\r\nEdinburgh, EH1 1HN', '55.948868', '-3.187019', 'https://monorestaurant.co.uk/', 'https://foodinburgh.com/wp-content/uploads/2018/09/IMG_0267.jpg', 1),
('Restaurant Al Borgo', '+43 1 5128559', 'Italian', 'Smart contemporary dining room with a daily changing menu of seasonal specialties from around Italy.', 'An der Hülben 1, 1010 Wien, Austria', '48.206788', '16.377445', 'https://www.alborgo.at/', 'https://www.alborgo.at/images/showcase/bg-5.jpg', 2),
('Tree Tops Sky Dining & Bar', '+66 77 960 333', 'Thai', 'Savor the beauty and flavors of Koh Samui and the elegance of Anantara Lawana in Thailand’s most romantic setting at Tree Tops Sky Dining and Bar.', '92/1 2 Tambon Bo Put, Amphoe Ko Samui, Chang Wat Surat Thani 84320, Thailand', '9.542357', '100.074382', 'https://www.anantara.com/en/lawana-koh-samui/restaurants/tree-tops-sky-dining-bar', 'http://www.kohsamuitips.com/wp-content/uploads/2017/12/TreeTops-Restaurant-Koh-Samui-777x437.jpg', 3),
('Almost Famous', '+44161 244 9422', 'Burgers', 'Urban graffiti-style decor in a gourmet burger joint with inventive sauces and sides.', 'UNIT 2,GREAT NORTHERN, Peter St, Manchester M3 4EN', '53.477755', '-2.248526', 'http://www.almostfamousburgers.com/index.html', 'https://ilovemanchester.com/media/51574/AlmostFamous-Manchester_16.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userAdmin`) VALUES
(1, 'User', 'user@gmail.com', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', 0),
(2, 'Admin', 'admin@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`concerts_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`places_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `concerts_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `places_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
