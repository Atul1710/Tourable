-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 11:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourable`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `LocID` bigint(20) UNSIGNED NOT NULL,
  `Name` text NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Address` longtext DEFAULT NULL,
  `MapLat` float(10,6) DEFAULT NULL,
  `MapLong` float(10,6) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`LocID`, `Name`, `Description`, `Address`, `MapLat`, `MapLong`, `uploaded_on`) VALUES
(349, 'Area 51', 'Area 51 is the common name of a highly classified United States Air Force facility located within the Nevada Test and Training Range. A remote detachment administered by Edwards Air Force Base, the facility is officially called Homey Airport or Groom Lake, named after the salt flat situated next to its airfield', NULL, 37.306210, -115.856827, '2020-10-25 12:55:42'),
(350, 'Lakshadweep', 'Lakshadweep is a tropical archipelago of 36 atolls and coral reefs in the Laccadive Sea, off the coast of Kerala, India. Not all of the islands are inhabited, and only a few are open to visitors (permits required). Kavaratti, one of the more developed islands, is home to dozens of mosques, including the ornately decorated Ujra Mosque, as well as Kavaratti Aquarium, showcasing regional fish, shark and coral species.', NULL, 10.564701, 72.638451, '2020-10-25 13:30:34'),
(353, 'Sea', 'Sea', NULL, 37.932426, -123.484245, '2020-10-25 13:44:03'),
(355, 'Meenakshi temple', 'Meenakshi Temple is a historic Hindu temple located on the southern bank of the Vaigai River in the temple city of Madurai, Tamil Nadu, India.', NULL, NULL, NULL, '2020-10-31 11:02:55'),
(356, 'Meenakshi Temple', 'Historic temple', NULL, NULL, NULL, '2020-10-31 12:08:22'),
(357, 'Munnar', 'Munnar is a town and hill station located in the Idukki district of the southwestern Indian state of Kerala. Munnar is situated at around 1,600 metres (5,200 ft) above mean sea level,[2] in the Western Ghats mountain range. Munnar is also called the \"Kashmir of South India\" and is a popular honeymoon destination.', NULL, 21.468819, -149.216278, '2020-10-31 16:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `location_images`
--

CREATE TABLE `location_images` (
  `LocID` int(100) NOT NULL,
  `loc_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_images`
--

INSERT INTO `location_images` (`LocID`, `loc_image`) VALUES
(0, 'beach.jpeg'),
(349, 'area51.jpg'),
(350, 'big.jpg'),
(352, 'area51.jpg'),
(353, 'area51.jpg'),
(354, 'dog2.jpg'),
(355, 'SrirangamTemple.jpg'),
(357, 'big.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `locimages`
--

CREATE TABLE `locimages` (
  `LocID` bigint(20) UNSIGNED NOT NULL,
  `Image_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UID` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UID`, `Username`, `Password`) VALUES
(1, 'Katie_Louise5144', 'Huff3395'),
(2, 'Matias1569', 'Acevedo4716'),
(3, 'Alissia1802', 'Kenny1521'),
(4, 'Willie2121', 'Oconnor3163'),
(5, 'Martine4464', 'Ashton9098'),
(6, 'Rhyley5469', 'Cano7294'),
(7, 'Cormac7282', 'Potter8582'),
(8, 'Hina5426', 'Reid7953'),
(9, 'Kristi8249', 'Cuevas9113'),
(10, 'Rhydian4847', 'Dunkley3784'),
(11, 'Dixie6063', 'Petersen5950'),
(12, 'Manha8087', 'Bevan9400'),
(13, 'Mandeep3463', 'Hughes1135'),
(14, 'Bluebell5306', 'Forrest9493'),
(15, 'Irfan4057', 'Harwood7991'),
(16, 'Jasmine6629', 'Arellano7230'),
(17, 'Rudra1376', 'Wilkes6421'),
(18, 'Amanda3393', 'Wilson9939'),
(19, 'Rojin1711', 'Atkins5743'),
(20, 'Jean_Luc5672', 'Lynn7502'),
(21, 'Georgiana6538', 'Fraser7738'),
(22, 'Kajetan1075', 'Coffey4023'),
(23, 'Shaurya9369', 'Kelley6798'),
(24, 'Jana7086', 'Rowe1377'),
(25, 'Lisa_Marie2860', 'Hall7262'),
(26, 'Zaid1806', 'Milner1404'),
(27, 'Safiyah9302', 'Warren5719'),
(28, 'Albert6245', 'Tomlinson3384'),
(29, 'Ayyan3531', 'Maguire1505'),
(30, 'Lianne4127', 'Black7269'),
(31, 'Tate3002', 'Trujillo8628'),
(32, 'Dora4701', 'Munoz6794'),
(33, 'Jasleen5672', 'Elliott7673'),
(34, 'Koa9265', 'Kline7832'),
(35, 'Arian4932', 'Bowman9623'),
(36, 'Elin8575', 'Parkinson7252'),
(37, 'Zaynah7187', 'Huang9386'),
(38, 'Sioned4171', 'Hawkins8082'),
(39, 'Atticus1329', 'Bains4082'),
(40, 'Noor6716', 'Mahoney8548'),
(41, 'Aliza9207', 'Spooner1887'),
(42, 'Rafferty3463', 'Scott9875'),
(43, 'Ashleigh9718', 'Mac7449'),
(44, 'Rachael5351', 'Mcdermott8505'),
(45, 'Bjorn1160', 'Waters7830'),
(46, 'Adeel1089', 'Larson7793'),
(47, 'Penelope8259', 'Bowler6948'),
(48, 'Olivia_Mae6152', 'Devlin2786'),
(49, 'Kenzo6789', 'Buckley6586'),
(50, 'Thomas1778', 'Zimmerman9656'),
(51, 'Paula3435', 'Weston8200'),
(52, 'Missy5427', 'David8291'),
(53, 'Miley3974', 'Schroeder1075'),
(54, 'Haidar8716', 'Morin8516'),
(55, 'Blane3950', 'Mcnamara8350'),
(56, 'Alaya7854', 'Bain8911'),
(57, 'Heather1223', 'Hampton8152'),
(58, 'Jill2565', 'Carter2589'),
(59, 'Abubakar6127', 'Livingston2350'),
(60, 'Destiny7049', 'Schaefer2101'),
(61, 'Frances4718', 'Roy7299'),
(62, 'Esa6273', 'Blackburn8368'),
(63, 'Rhiannon8467', 'Brook1606'),
(64, 'Penny1902', 'Porter6651'),
(65, 'Lily_Mae2425', 'Wilde8521'),
(66, 'Zara4260', 'Delarosa4023'),
(67, 'Neel9551', 'Donaldson3321'),
(68, 'Lyle7420', 'Marquez9592'),
(69, 'Oscar2485', 'Hutchinson6522'),
(70, 'Hadi3166', 'Miller8730'),
(71, 'Dominykas7530', 'Alexander7579'),
(72, 'Kasey6659', 'Hackett3464'),
(73, 'Ianis5751', 'Mcarthur3544'),
(74, 'Marisa8918', 'Nichols1279'),
(75, 'Jeffery5843', 'Bates1576'),
(76, 'Nadeem6280', 'Lowery5657'),
(77, 'Murray1927', 'Cassidy7009'),
(78, 'Sumaiyah5881', 'Hawes1220'),
(79, 'Jace5957', 'Rollins8965'),
(80, 'Mohamed7412', 'Mcdonald5337'),
(81, 'Adyan4575', 'Bone2687'),
(82, 'Kamila5755', 'Garza9968'),
(83, 'Rafael4072', 'Poole9261'),
(84, 'Kristian9012', 'Sexton2023'),
(85, 'Kurt5130', 'Hopper8715'),
(86, 'Keyan7357', 'Marin9816'),
(87, 'Priyanka5793', 'Beard3868'),
(88, 'Kristy5420', 'Lutz9924'),
(89, 'Gillian5263', 'Coleman5757'),
(90, 'Aneesah6257', 'Mooney7995'),
(91, 'Jozef2301', 'Higgs4584'),
(92, 'Siya3315', 'Curtis8966'),
(93, 'Pharrell2323', 'Yoder7678'),
(94, 'Acacia8479', 'Feeney9228'),
(95, 'Ciaran7124', 'Martins3688'),
(96, 'Cooper1181', 'Tait5456'),
(97, 'Clive9175', 'Jeffery4402'),
(98, 'Viaan4355', 'Gordon4521'),
(99, 'Trinity4915', 'Howe3420'),
(100, 'Donnie2651', 'Maldonado9106');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(100) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `locname` varchar(100) NOT NULL,
  `rev` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `username`, `locname`, `rev`) VALUES
(1, 'Katie', 'Lakshadweep', 'Great place, must visit'),
(2, 'Kristi8249', 'Lakshadweep', 'very nice place!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` bigint(20) UNSIGNED NOT NULL,
  `Name` text NOT NULL,
  `DOB` date NOT NULL,
  `Gender` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Moderator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Name`, `DOB`, `Gender`, `Email`, `Contact`, `Moderator`) VALUES
(1, 'Katie-Louise Huff', '1989-01-30', 'Female', 'katie-louise@hotmail.com', 8331730626, 0),
(2, 'Matias Acevedo', '1988-04-03', 'Male', 'matias@outlook.com', 8553944890, 0),
(3, 'Alissia Kenny', '1992-11-13', 'Female', 'alissia@outlook.com', 7162195549, 0),
(4, 'Willie Oconnor', '1986-04-01', 'Male', 'willie@outlook.com', 7006274598, 0),
(5, 'Martine Ashton', '1987-09-29', 'Female', 'martine@yahoo.com', 8878128402, 0),
(6, 'Rhyley Cano', '1985-08-21', 'Female', 'rhyley@gmail.com', 8792621071, 0),
(7, 'Cormac Potter', '1986-01-17', 'Male', 'cormac@hotmail.com', 7010808246, 0),
(8, 'Hina Reid', '1991-12-31', 'Female', 'hina@gmail.com', 7916539032, 0),
(9, 'Kristi Cuevas', '1987-10-11', 'Female', 'kristi@outlook.com', 7870808904, 1),
(10, 'Rhydian Dunkley', '1988-01-23', 'Male', 'rhydian@yahoo.com', 7621531034, 1),
(11, 'Dixie Petersen', '1992-03-21', 'Female', 'dixie@hotmail.com', 9034994161, 0),
(12, 'Manha Bevan', '1989-04-29', 'Female', 'manha@outlook.com', 7234633240, 0),
(13, 'Mandeep Hughes', '1994-10-05', 'Male', 'mandeep@outlook.com', 9869526909, 0),
(14, 'Bluebell Forrest', '1986-01-18', 'Female', 'bluebell@outlook.com', 7213447931, 1),
(15, 'Irfan Harwood', '1991-01-06', 'Male', 'irfan@hotmail.com', 7893809344, 0),
(16, 'Jasmine Arellano', '1988-06-18', 'Female', 'jasmine@yahoo.com', 9521113243, 0),
(17, 'Rudra Wilkes', '1990-01-15', 'Female', 'rudra@outlook.com', 9794446649, 0),
(18, 'Amanda Wilson', '1988-04-09', 'Female', 'amanda@gmail.com', 7654943404, 0),
(19, 'Rojin Atkins', '1987-06-14', 'Male', 'rojin@gmail.com', 9346496689, 0),
(20, 'Jean-Luc Lynn', '1986-03-14', 'Female', 'jean-luc@yahoo.com', 9998068384, 0),
(21, 'Georgiana Fraser', '1995-05-27', 'Female', 'georgiana@gmail.com', 9025761592, 0),
(22, 'Kajetan Coffey', '1995-06-30', 'Male', 'kajetan@outlook.com', 8091340911, 1),
(23, 'Shaurya Kelley', '1992-08-13', 'Female', 'shaurya@gmail.com', 8307234411, 0),
(24, 'Jana Rowe', '1990-02-27', 'Female', 'jana@outlook.com', 9138191323, 1),
(25, 'Lisa-Marie Hall', '1988-08-20', 'Female', 'lisa-marie@outlook.com', 7928606275, 0),
(26, 'Zaid Milner', '1992-04-16', 'Male', 'zaid@gmail.com', 8902780275, 0),
(27, 'Safiyah Warren', '1995-03-07', 'Female', 'safiyah@outlook.com', 8576893184, 0),
(28, 'Albert Tomlinson', '1995-08-07', 'Male', 'albert@outlook.com', 9570248261, 0),
(29, 'Ayyan Maguire', '1985-04-12', 'Male', 'ayyan@hotmail.com', 7326709677, 1),
(30, 'Lianne Black', '1986-02-09', 'Female', 'lianne@gmail.com', 9847867926, 0),
(31, 'Tate Trujillo', '1985-07-08', 'Male', 'tate@gmail.com', 7638628701, 0),
(32, 'Dora Munoz', '1987-07-19', 'Female', 'dora@hotmail.com', 8188160584, 0),
(33, 'Jasleen Elliott', '1988-10-05', 'Female', 'jasleen@gmail.com', 9928063131, 1),
(34, 'Koa Kline', '1993-05-12', 'Female', 'koa@gmail.com', 9988778507, 1),
(35, 'Arian Bowman', '1988-08-21', 'Male', 'arian@yahoo.com', 8737575053, 0),
(36, 'Elin Parkinson', '1985-01-16', 'Male', 'elin@hotmail.com', 7001705272, 0),
(37, 'Zaynah Huang', '1986-05-11', 'Female', 'zaynah@outlook.com', 9158580019, 0),
(38, 'Sioned Hawkins', '1988-11-24', 'Male', 'sioned@yahoo.com', 8729634180, 0),
(39, 'Atticus Bains', '1988-05-06', 'Male', 'atticus@outlook.com', 8647219827, 0),
(40, 'Noor Mahoney', '1991-05-27', 'Male', 'noor@outlook.com', 7614585714, 0),
(41, 'Aliza Spooner', '1991-08-10', 'Female', 'aliza@yahoo.com', 8804761319, 0),
(42, 'Rafferty Scott', '1992-02-18', 'Male', 'rafferty@outlook.com', 7284432345, 0),
(43, 'Ashleigh Mac', '1988-03-13', 'Female', 'ashleigh@hotmail.com', 8247931052, 1),
(44, 'Rachael Mcdermott', '1986-09-30', 'Female', 'rachael@hotmail.com', 7484682459, 0),
(45, 'Bjorn Waters', '1994-09-08', 'Male', 'bjorn@outlook.com', 7589648489, 0),
(46, 'Adeel Larson', '1991-10-16', 'Male', 'adeel@hotmail.com', 7109215420, 1),
(47, 'Penelope Bowler', '1991-08-29', 'Female', 'penelope@hotmail.com', 8053598777, 0),
(48, 'Olivia-Mae Devlin', '1990-10-06', 'Female', 'olivia-mae@hotmail.com', 9421364827, 0),
(49, 'Kenzo Buckley', '1985-05-26', 'Male', 'kenzo@yahoo.com', 9054010290, 1),
(50, 'Thomas Zimmerman', '1991-02-02', 'Male', 'thomas@gmail.com', 8241874430, 0),
(51, 'Paula Weston', '1988-03-30', 'Female', 'paula@gmail.com', 8004453250, 0),
(52, 'Missy David', '1991-09-25', 'Female', 'missy@outlook.com', 8782977191, 1),
(53, 'Miley Schroeder', '1987-01-26', 'Male', 'miley@outlook.com', 7930327424, 1),
(54, 'Haidar Morin', '1995-01-26', 'Male', 'haidar@gmail.com', 9784761756, 0),
(55, 'Blane Mcnamara', '1988-12-27', 'Male', 'blane@yahoo.com', 9118783499, 0),
(56, 'Alaya Bain', '1986-12-07', 'Female', 'alaya@yahoo.com', 8213040378, 1),
(57, 'Heather Hampton', '1993-06-09', 'Female', 'heather@outlook.com', 9995908345, 0),
(58, 'Jill Carter', '1995-11-19', 'Female', 'jill@outlook.com', 9392306791, 0),
(59, 'Abubakar Livingston', '1987-04-13', 'Male', 'abubakar@outlook.com', 8737256309, 0),
(60, 'Destiny Schaefer', '1991-03-19', 'Female', 'destiny@outlook.com', 7676278534, 1),
(61, 'Frances Roy', '1991-12-29', 'Male', 'frances@hotmail.com', 8832680902, 0),
(62, 'Esa Blackburn', '1988-12-08', 'Female', 'esa@gmail.com', 7712041170, 0),
(63, 'Rhiannon Brook', '1991-12-28', 'Female', 'rhiannon@gmail.com', 9114935036, 0),
(64, 'Penny Porter', '1987-07-03', 'Female', 'penny@hotmail.com', 9236589603, 0),
(65, 'Lily-Mae Wilde', '1990-03-18', 'Female', 'lily-mae@hotmail.com', 8758915026, 0),
(66, 'Zara Delarosa', '1991-04-23', 'Female', 'zara@hotmail.com', 9027454273, 0),
(67, 'Neel Donaldson', '1989-06-27', 'Male', 'neel@hotmail.com', 7910764203, 0),
(68, 'Lyle Marquez', '1986-03-02', 'Female', 'lyle@yahoo.com', 8468550924, 0),
(69, 'Oscar Hutchinson', '1986-05-27', 'Male', 'oscar@yahoo.com', 7626449633, 1),
(70, 'Hadi Miller', '1994-01-11', 'Male', 'hadi@yahoo.com', 7565948899, 0),
(71, 'Dominykas Alexander', '1992-12-12', 'Male', 'dominykas@hotmail.com', 7100471316, 0),
(72, 'Kasey Hackett', '1988-03-11', 'Female', 'kasey@gmail.com', 8775633568, 1),
(73, 'Ianis Mcarthur', '1986-08-20', 'Male', 'ianis@outlook.com', 8403289735, 0),
(74, 'Marisa Nichols', '1994-10-23', 'Female', 'marisa@outlook.com', 7961148473, 0),
(75, 'Jeffery Bates', '1986-01-20', 'Male', 'jeffery@outlook.com', 9554991571, 0),
(76, 'Nadeem Lowery', '1993-05-25', 'Male', 'nadeem@yahoo.com', 7991465843, 0),
(77, 'Murray Cassidy', '1990-10-28', 'Male', 'murray@gmail.com', 9365182693, 1),
(78, 'Sumaiyah Hawes', '1986-02-12', 'Female', 'sumaiyah@outlook.com', 7769836705, 0),
(79, 'Jace Rollins', '1989-09-24', 'Female', 'jace@gmail.com', 9582715479, 0),
(80, 'Mohamed Mcdonald', '1989-10-31', 'Male', 'mohamed@outlook.com', 9303191805, 1),
(81, 'Adyan Bone', '1985-03-16', 'Male', 'adyan@hotmail.com', 9315187254, 1),
(82, 'Kamila Garza', '1991-11-12', 'Female', 'kamila@hotmail.com', 9958441140, 0),
(83, 'Rafael Poole', '1986-04-24', 'Male', 'rafael@outlook.com', 7864571896, 1),
(84, 'Kristian Sexton', '1988-07-26', 'Male', 'kristian@outlook.com', 7931062178, 0),
(85, 'Kurt Hopper', '1987-09-09', 'Male', 'kurt@hotmail.com', 9577984865, 1),
(86, 'Keyan Marin', '1992-06-24', 'Male', 'keyan@outlook.com', 7323682353, 0),
(87, 'Priyanka Beard', '1993-09-11', 'Female', 'priyanka@yahoo.com', 8647397956, 1),
(88, 'Kristy Lutz', '1991-01-04', 'Female', 'kristy@yahoo.com', 9676028859, 0),
(89, 'Gillian Coleman', '1988-05-03', 'Female', 'gillian@gmail.com', 8166208654, 0),
(90, 'Aneesah Mooney', '1991-05-04', 'Female', 'aneesah@yahoo.com', 9298718522, 0),
(91, 'Jozef Higgs', '1985-11-07', 'Male', 'jozef@gmail.com', 9106254494, 1),
(92, 'Siya Curtis', '1989-10-02', 'Female', 'siya@gmail.com', 9835674636, 0),
(93, 'Pharrell Yoder', '1994-09-18', 'Male', 'pharrell@hotmail.com', 7795876089, 1),
(94, 'Acacia Feeney', '1985-07-09', 'Female', 'acacia@gmail.com', 7162691885, 0),
(95, 'Ciaran Martins', '1995-09-05', 'Male', 'ciaran@gmail.com', 7569125648, 1),
(96, 'Cooper Tait', '1989-03-26', 'Male', 'cooper@gmail.com', 7003388229, 0),
(97, 'Clive Jeffery', '1994-03-03', 'Male', 'clive@gmail.com', 7892946596, 0),
(98, 'Viaan Gordon', '1989-04-16', 'Male', 'viaan@yahoo.com', 8985808405, 1),
(99, 'Trinity Howe', '1993-03-08', 'Female', 'trinity@hotmail.com', 9062108617, 0),
(100, 'Donnie Maldonado', '1986-09-17', 'Female', 'donnie@hotmail.com', 7936029482, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`LocID`),
  ADD UNIQUE KEY `LocID` (`LocID`);

--
-- Indexes for table `location_images`
--
ALTER TABLE `location_images`
  ADD UNIQUE KEY `LocID` (`LocID`);

--
-- Indexes for table `locimages`
--
ALTER TABLE `locimages`
  ADD UNIQUE KEY `LocID` (`LocID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `LocID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `locimages`
--
ALTER TABLE `locimages`
  MODIFY `LocID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `UID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locimages`
--
ALTER TABLE `locimages`
  ADD CONSTRAINT `locimages_ibfk_1` FOREIGN KEY (`LocID`) REFERENCES `locations` (`LocID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `login` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
