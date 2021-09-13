-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 06:05 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_route`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `act_id` int(3) NOT NULL,
  `act_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`act_id`, `act_title`) VALUES
(1, 'City'),
(2, 'Cultural'),
(3, 'Holiday & Seasonal Tour'),
(4, 'Luxury Tour'),
(5, 'Outdoor Activities'),
(6, 'Relaxation'),
(7, 'Wild & Adventurer'),
(8, 'Beaches'),
(9, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` int(5) NOT NULL,
  `amenities` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `amenities`, `image`) VALUES
(1, 'Air conditioning', 'air-condition.png'),
(2, 'Parking', 'parking.png'),
(3, 'Free breakfast', 'breakfast.png'),
(4, 'Free wifi', 'wifi.png'),
(5, 'Pool', 'swimming.png'),
(6, 'Bar', 'bar.png'),
(7, 'Restaurant', 'restaurent.png'),
(8, 'Room service', 'room-service.png'),
(9, 'Airport shuttle', 'airport-shuttle.png'),
(10, 'Full service laundry', 'laundry.png'),
(11, 'Wheelchair accessible ', 'wheelchaire.png'),
(12, 'Gym', 'gym.png'),
(13, 'Televison', 'tv.png'),
(14, 'Spa', 'spa.png'),
(15, 'No dogs', 'no-pets.png'),
(16, 'Nature views', 'nature-friendly.png'),
(17, 'Translators', 'language-independent.png'),
(18, 'Hot tub', 'hottub.png'),
(19, 'Conference hall', 'conference-hall.png'),
(20, 'Business classes', 'business center.png'),
(21, 'Beaches', 'beach.png'),
(22, 'Playground', 'playground.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities_rooms`
--

CREATE TABLE `tbl_amenities_rooms` (
  `id` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `amenities_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities_rooms`
--

INSERT INTO `tbl_amenities_rooms` (`id`, `hotel_id`, `room_id`, `amenities_id`) VALUES
(1, 1, '1', 1),
(2, 1, '1', 2),
(3, 1, '1', 3),
(4, 1, '1', 4),
(5, 1, '1', 5),
(6, 1, '1', 6),
(7, 1, '1', 7),
(8, 1, '1', 8),
(9, 1, '1', 9),
(10, 1, '1', 10),
(11, 1, '1', 11),
(12, 1, '1', 14),
(13, 1, '1', 15),
(14, 1, '1', 16),
(15, 1, '1', 17),
(16, 1, '1', 18),
(17, 1, '1', 19),
(18, 1, '1', 21),
(20, 1, '2', 1),
(21, 1, '2', 2),
(22, 1, '2', 3),
(23, 1, '2', 4),
(24, 1, '2', 5),
(25, 1, '2', 6),
(26, 1, '2', 7),
(27, 1, '2', 8),
(28, 1, '2', 11),
(29, 1, '2', 13),
(30, 1, '2', 14),
(31, 1, '2', 15),
(32, 1, '2', 16),
(33, 1, '2', 17),
(35, 1, '3', 1),
(36, 1, '3', 2),
(37, 1, '3', 3),
(38, 1, '3', 4),
(39, 1, '3', 6),
(40, 1, '3', 7),
(41, 1, '3', 8),
(42, 1, '3', 9),
(43, 1, '3', 10),
(44, 1, '3', 12),
(45, 1, '3', 13),
(46, 1, '3', 14),
(47, 1, '3', 16),
(48, 1, '3', 17),
(49, 1, '3', 18),
(50, 13, '4', 1),
(51, 13, '4', 3),
(52, 13, '4', 4),
(53, 13, '4', 6),
(54, 13, '4', 7),
(55, 13, '4', 11),
(56, 13, '4', 14),
(57, 13, '4', 15),
(58, 13, '4', 17),
(59, 13, '4', 18),
(60, 13, '5', 1),
(61, 13, '5', 2),
(62, 13, '5', 3),
(63, 13, '5', 4),
(64, 13, '5', 5),
(65, 13, '5', 6),
(66, 13, '5', 7),
(67, 13, '5', 8),
(68, 13, '5', 9),
(69, 13, '5', 10),
(70, 13, '5', 11),
(71, 13, '5', 12),
(72, 13, '5', 13),
(73, 13, '5', 14),
(74, 13, '5', 16),
(75, 13, '5', 19),
(76, 13, '5', 21),
(77, 1, '6', 1),
(78, 1, '6', 2),
(79, 1, '6', 4),
(80, 1, '6', 5),
(81, 1, '6', 6),
(82, 1, '6', 7),
(83, 1, '6', 9),
(84, 1, '6', 14),
(85, 1, '6', 16),
(86, 1, '6', 17),
(88, 13, '7', 1),
(89, 13, '7', 2),
(90, 13, '7', 3),
(91, 13, '7', 4),
(92, 13, '7', 5),
(93, 13, '7', 6),
(94, 13, '7', 7),
(95, 13, '7', 8),
(96, 13, '7', 11),
(97, 13, '7', 12),
(98, 13, '7', 14),
(99, 13, '7', 17),
(100, 13, '7', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `district_id` int(3) NOT NULL,
  `district_title` varchar(30) NOT NULL,
  `province_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`district_id`, `district_title`, `province_id`) VALUES
(1, 'Kandy', 1),
(2, 'Colombo', 2),
(3, 'Matale', 1),
(4, 'Nuwara Eliya', 1),
(5, 'Dambulla', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotels`
--

CREATE TABLE `tbl_hotels` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district_id` int(3) NOT NULL,
  `city` varchar(50) NOT NULL,
  `image` longblob NOT NULL,
  `description` text NOT NULL,
  `tel_no` int(12) NOT NULL,
  `lat` decimal(8,6) NOT NULL,
  `lan` decimal(9,6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotels`
--

INSERT INTO `tbl_hotels` (`id`, `name`, `address`, `district_id`, `city`, `image`, `description`, `tel_no`, `lat`, `lan`, `type`, `status`, `date`, `email`, `password`) VALUES
(1, 'OZO Kandy Sri Lanka', ' 31 Saranankara Rd, Kandy 20000', 1, 'Lakeside, Kandy', 0x686f74656c2d332e6a7067, 'Surrounded by lush mountains dotted with residences, this sophisticated hotel is less than 1 km from Kandy Lake and 2 km from Kandy Railway Station.\r\nModern rooms, some with mountain views, have free Wi-Fi, flat-screens and sitting areas, as well as rainfall showers, minifridges, and tea and coffeemaking facilities. Upgraded rooms add balconies with lake views, while suites provide separate living areas. Room service is available.\r\nThere is a colourful rooftop terrace with a pool and a bar serving light bites. Other perks include a simple eatery, a terrace with lake views, and an airy lounge, plus a fitness centre. Breakfast is offered for a fee.', 812030700, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'ozo@gmail.com', '123'),
(2, 'The Grand Kandyan Hotel', ' 89, 10 Lady Gordern Road, Kandy', 1, 'Kandy', 0x3134393631333036353833372e6a7067, 'At The Grand Kandyan, guests are treated with the reverence, respect and care given to royalty. With the plethora of thing to do and see, one loses track of time at this majestic, luxurious retreat. Unwind in our swimming pool, take a tour with one of our own tour guides, indulge in a productive workout or drift off under the soothing hands of our expert masseuses in our spa. At The Grand Kandyan, guests are treated with the reverence, respect and care given to royalty. With the plethora of thing to do and see, one loses track of time at this majestic, luxurious retreat. Unwind in our swimming pool, take a tour with one of our own tour guides, indulge in a productive workout or drift off under the soothing hands of our expert masseuses in our spa.', 812030400, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'gk@gmail.com', '123'),
(3, 'Earls Regent Hotel', '40/1 Deveni Rajasinghe Mawatha, Kandy', 1, 'Ampitiya, Kandy', 0x68312e6a7067, 'Overlooking the Hanthana Mountain Range, this elegant hotel is 3 km from Randles Hill train station, and 6 km from the Temple of the Sacred Tooth Relic.\r\n\r\nFeaturing traditional hand-painted murals, the polished rooms come with free Wi-Fi, TVs and minibars, plus tea and coffeemaking facilities. Upgraded rooms add whirlpool baths and balconies or patios. Some offer mountain views. Room service is available.\r\n\r\nParking is complimentary. There are 2 restaurants (1 buffet; 1 grill), and a bar with live music. Breakfast is extra. Other amenities include an Ayurvedic spa, a gym, and an outdoor pool surrounded by landscaped gardens.', 812221144, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'earls@gmail.com', '123'),
(4, 'Cinnamon Citadel', 'Srimath Kudarathwatta Mawatha, Kandy 20000', 1, 'Katugastota, Kandy', 0x31303139323031353131333734383031312e6a7067, 'Overlooking the Mahaweli River, this upscale hotel is 4 km from the Sacred Temple of the Tooth Relic in the city center. It is 8 km from the Peradeniya Royal Botanic Gardens.\r\nThe airy, stylish rooms have minibars, cable TV and free Wi-Fi, as well as garden or river views. Upgraded rooms have balconies and living areas, and suites add living rooms and mountain views.\r\nAmenities include an airy restaurant featuring a terrace, a polished bar with regular live music, and a romantic eatery offering river views. There is also an outdoor pool and a fitness centre, as well as gardens and BBQ facilities.', 812234365, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'Cinnamonkandy@gmail.com', '123'),
(5, 'Queens Hotel Kandy', 'DS Senanayake Veediya, Kandy 20000', 1, 'Kandy', 0x36363631365f31343031323331393530303031383133393630382e6a7067, 'A 5-minute walk from Sri Dalada Maligawa, a Buddhist temple, this British Colonial style upscale hotel overlooks Kandy Lake and is a 6-minute walk from the Royal Palace of Kandy.\r\nFeaturing private terraces with views of the lake or temple, the traditionally furnished rooms have hardwood floors and come with free Wi-Fi, cable TV, minibars, and tea and coffeemakers. Some have 4-poster beds. Suites add living rooms and flat-screens. Room service is available.\r\nDining options include 2 upscale Asian restaurants, a cafe and BBQ facilities. There is an outdoor pool, a kids pool and a sundeck. Meeting and function venues are available. Parking is free.', 812233026, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'queens@gmail.com', '123'),
(6, 'Mahaweli Reach Hotel', '35 P B A Weerakoon Mawatha, Kandy 20000', 1, 'Katugastota, Kandy', 0x64656661756c742d6865616465722d696d616765732d6d6f622d352e6a7067, 'Overlooking the Mahaweli Ganga river, this upscale hotel lies 5 km from the Temple of the Sacred Tooth Relic and 7 km from Kandy Lake.\r\nElegant rooms feature free Wi-Fi, flat-screen TVs and minibars, plus tea and coffeemaking facilities. All have balconies with pool, river, or garden views. Suites add separate living areas and whirlpool tubs. A luxe 2-bedroom suite has a dining room, a pantry and a gym area. Room service is available.\r\nAmenities include a formal restaurant and an open-air eatery, plus a casual bar, an outdoor pool and a fitness centre. There is also a spa, as well as a tennis court, a billiards room and a business center.', 812472727, '7.291418', '80.636696', 'Hotel & Restaurant', 'Draft', '2019-10-19', 'mahaveli@gmail.com', '123'),
(7, 'Royal Kandyan Kandy', '833 Peradeniya Rd, Kandy 20000', 1, 'Peradeniya, Kandy', 0x3738353737313935352e6a7067, 'This unassuming block-style hotel lies on an urban thoroughfare 2 km from Rajawatta train station. It is also 4 km from Temple of the Tooth, said to contain a tooth of Buddha.\r\nCasual, airy rooms all feature free Wi-Fi, satellite TV and minifridges. Upgraded rooms and suites add sitting areas and balconies. Room service is offered 24/7.\r\nBreakfast is available at a low-key restaurant. Other amenities include an outdoor pool and a bar, plus a lobby lounge and a gym.', 812060466, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'royalkandyan@gmail.com', '123'),
(8, 'Hotel Galadari Colombo', '64 Lotus Rd, Colombo 00100', 2, 'Colombo', 0x63353637643437363661633531396264353935373430393033386536353636622e6a7067, 'Overlooking the Laccadive Sea, this upscale hotel is a 15-minute walk from Galle Face Green park, 3 km from Gangaramaya Buddhist Temple and 11 km from the National Zoological Gardens of Sri Lanka.\r\nWarmly decorated rooms with wood furniture feature free Wi-Fi and flat-screen TVs, plus minibars, and tea and coffeemakers. Upgraded rooms provide access to a private lounge offering free breakfast. Polished suites add sitting areas and sea views; some have whirlpool tubs.\r\nThere is a business centre, a gym and a sauna, plus an outdoor pool, a tennis court and 2 bars. Other perks include a coffee shop, a patisserie and 3 restaurants, plus meeting space.', 112544544, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'galadaricolombo@gmail.com', '123'),
(9, 'Marino Beach Colombo', '590 Marine Drive, Colombo 00300', 2, 'kollupitiya', 0x6d6172696e6f2d62656163682e6a7067, 'Across from a railway along the Laccadive Sea, this contemporary hotel is 5 km from Galle Face Beach and a 9-minute walk from Bambalapitiya railway station.\r\nRelaxed rooms feature balconies, glass-enclosed bathrooms, free Wi-Fi and minibars, plus smart TVs, safes, and tea and coffeemaking facilities. Upgraded rooms have sea views. The 1- and 2-bedroom suites add separate living and dining space. Room service is available 24/7.\r\nParking is complimentary. There is a rooftop garden and terrace with an infinity pool and a hot tub overlooking the sea, as well as a gym. A breakfast buffet is offered in an airy dining room (fee).', 112375375, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'mariano@gmail.com', '123'),
(10, 'Mandarina Colombo', '433 A2, Colombo 00300', 2, 'Galle face', 0x4164646974696f6e616c2d4d61696e2d47616c6c6572792d31312d383030783830302e6a7067, 'Set on a thoroughfare lined with shops and restaurants, this polished hotel is 1 km from Bambalapitiya railway station on the Laccadive Sea, and 3 km from the 19th-century Gangaramaya Temple.\r\nModern rooms offer free Wi-Fi, flat-screen TVs and minifridges, plus rainfall showers, balconies, and tea and coffeemaking facilities. Upgraded rooms have sea views, and some add sitting areas. Room service is offered.\r\nThere is a warm restaurant with floor-to-ceiling windows and a terrace overlooking the city and the sea; a breakfast buffet is available for a fee. Other amenities include a relaxed cafe, an infinity pool and an exercise room.', 112550660, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'mandarina@gmail.com', '123'),
(11, 'Cinnamon Colombo', '117 Sir Chittampalam A Gardiner Mawath, Colombo', 2, 'Galle face', 0x312e6a7067, 'Nestled between Beira Lake and the city, this upscale hotel is 2 km from Galle Face Green park.\r\nThe elegant rooms provide city or lake views, and feature minibars, Wi-Fi and cable TV, along with tea and coffeemakers. Upgraded rooms provide access to an executive lounge offering free breakfast, snacks and drinks. Suites add living rooms and personal butler service, and some have terraces. An upgraded suite adds a dining area, a kitchen, a grand piano and a whirlpool bath.\r\nThere are 3 restaurants, including a polished Thai eatery. There is also a cafe, a lobby lounge and an exclusive library (members only), plus a gym, an outdoor pool and a spa.', 112491000, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'cinnamoncolombo@gmail.com', '123'),
(12, 'Galle Face Hotel Colombo', '3, 2 Galle Main Rd, Colombo 00300', 2, 'Galle face', 0x3434373836325f4558545f5a35414235332e6a7067, 'Overlooking the Indian Ocean, this luxe hotel dating from 1864 is 1 km from Galle Face Green park and 2 km from Gangaramaya Buddhist Temple.\r\nWarmly decorated rooms have free Wi-Fi and minibars, along with flat-screens and safes. Suites add sitting areas, and upgraded suites offer access to a lounge serving hot snacks.\r\nParking and breakfast are complimentary. There are 3 refined restaurants, including a modern European option, along with 3 vibrant bars. Other amenities include an outdoor, beachfront pool with a deck and sunloungers, plus beach access, a gym and spa treatments. There is a cultural museum, and a library with chess and backgammon.', 112541010, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-15', 'GalleFaceHotel@gmail.com', '123'),
(13, 'Kingsbury Colombo', '48 Janadhipathi Mawatha, Colombo', 2, 'Galle face', 0x6578746572696f722d766965772e6a7067, 'Overlooking the Indian Ocean, this refined hotel is 2 km from Galle Face Green park and Beira Lake.\r\n\r\nChic, traditionally furnished rooms with ocean or harbour views and warm decor feature marble bathrooms, free Wi-Fi, flat-screen TVs, and tea and coffeemaking equipment. Upgraded rooms offer more floor space and access to the executive lounge. Luxe suites add living rooms. Room/butler service is available 24/7.\r\n\r\nThere are 4 restaurants offering international fare, as well as 3 bars. There is also an outdoor pool, a plush spa and a fitness centre, plus meeting and function areas. Breakfast is extra.', 112421221, '7.291418', '80.636696', 'Hotel & Restaurant', 'Published', '2019-10-16', 'kingsbury@gmail.com', '123'),
(14, 'OZO Colombo', '36, 38 Clifford Pl, Colombo 00400', 2, 'Maradana', 0x686f74656c2d322e6a7067, 'Overlooking the Indian Ocean, this chic, modern hotel is 5 km from Gangaramaya Buddhist Temple and 4 km from the National Zoological Gardens of Sri Lanka. \r\nBright contemporary rooms offer free Wi-Fi, minibars and flat-screen TVs, plus tea and coffeemaking facilities. Upgraded rooms have ocean views. Suites add living rooms. Room service is available.\r\nBreakfast is included. There is a casual restaurant and a trendy rooftop bar/lounge. Other amenities include a rooftop infinity pool and a fitness room.', 112555570, '5.291418', '6.636696', 'Hotel & Restaurant', 'Published', '2019-10-16', 'ozo_col@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel_images`
--

CREATE TABLE `tbl_hotel_images` (
  `id` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel_images`
--

INSERT INTO `tbl_hotel_images` (`id`, `hotel_id`, `image`) VALUES
(1, 1, 0x686f74656c2d332e6a7067),
(2, 2, 0x3134393631333036353833372e6a7067),
(3, 2, 0x32323032307a3030303030306e34696633334533305f525f313133365f3735305f52355f442e6a7067),
(4, 2, 0x3134393631333036353733362e6a7067),
(5, 3, 0x68332e6a7067),
(6, 3, 0x68312e6a7067),
(7, 3, 0x68322e6a7067),
(8, 4, 0x38393332322e6a7067),
(9, 4, 0x3131393734343933382e6a7067),
(10, 4, 0x31303139323031353131333734383031312e6a7067),
(11, 4, 0x79696d675f5856644b78722d363430783432372e6a7067),
(12, 5, 0x36363631365f31343031323331393530303031383133393630382e6a7067),
(13, 5, 0x517565656e735f486f74656c20283133292e6a7067),
(14, 5, 0x517565656e732d526f6f6d392e6a7067),
(15, 5, 0x736c69646572312e6a7067),
(16, 5, 0x736c69646572332e6a7067),
(17, 6, 0x30312e6a7067),
(18, 6, 0x34383237332d6d61686177656c692d72656163682d686f74656c2d6b616e64792e6a7067),
(19, 6, 0x64656661756c742d6865616465722d696d616765732d6d6f622d352e6a7067),
(20, 6, 0x4d61686177656c695f52656163685f486f74656c5f4b616e647920283133292e6a7067),
(21, 6, 0x34343534325f3132303931303134313934383831312e6a7067),
(22, 7, 0x3738353737313935352e6a7067),
(23, 7, 0x3131303237323032392e6a7067),
(24, 7, 0x3532363633383433382e6a7067),
(25, 7, 0x726f79616c2d6b616e6479616e2d696e746572696f722e33312e6a7067),
(26, 8, 0x63353637643437363661633531396264353935373430393033386536353636622e6a7067),
(27, 8, 0x32303837332e6a7067),
(28, 8, 0x67616c61312e6a7067),
(29, 8, 0x6578656375746976652d726f6f6d2d7631343034353932392d313434302d31303234783638332e6a7067),
(30, 9, 0x6d6172696e6f2d62656163682e6a7067),
(31, 9, 0x6d61722e6a7067),
(32, 9, 0x63353563616364363632366639366265323766323763383237666238393364642e6a7067),
(33, 9, 0x7375706572696f722d7477696e2d726f6f6d2e6a7067),
(34, 9, 0x63656339363666665f7a2e6a7067),
(35, 10, 0x4164646974696f6e616c2d4d61696e2d47616c6c6572792d31312d383030783830302e6a7067),
(36, 10, 0x3135323434303236302e6a7067),
(37, 10, 0x3039365072696e745f446576616b612d53656e6576695f666d742e6a7067),
(38, 10, 0x34323841383531372e6a7067),
(39, 11, 0x6c616b65736964652d666f6f7465722d44322d31343430583830302e706e67),
(40, 11, 0x312e6a7067),
(41, 11, 0x41657269616c5f766965775f6f665f38c2b05f6f6e5f7468655f4c616b652e6a7067),
(42, 11, 0x3131323531383635382e6a7067),
(43, 11, 0x6c616b65736964652d7375706572696f722d6b696e672d726f6f6d2d353330583432305f30342e6a7067),
(44, 12, 0x696d6167655f356463376635376165312e6a7067),
(45, 12, 0x3434373836325f4558545f5a35414235332e6a7067),
(46, 12, 0x313330393433392e6a7067),
(47, 12, 0x313330393434332e6a7067),
(48, 12, 0x313436393630313831313134312e6a7067),
(49, 13, 0x6d617872657364656661756c742e6a7067),
(50, 13, 0x706f6f6c2d76353132383138312d313434302d31303234783638332e6a7067),
(51, 13, 0x6578746572696f722d766965772e6a7067),
(52, 13, 0x6c6f6262792e6a7067),
(53, 1, 0x3131323531383635382e6a7067),
(54, 14, 0x686f74656c2d322e6a7067),
(55, 14, 0x67616c61312e6a7067),
(56, 14, 0x686f74656c2d362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `loc_id` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `district_id` int(3) NOT NULL,
  `city` varchar(50) NOT NULL,
  `lat` decimal(8,6) NOT NULL,
  `lan` decimal(9,6) NOT NULL,
  `img` longblob NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`loc_id`, `title`, `district_id`, `city`, `lat`, `lan`, `img`, `keyword`, `description`, `u_date`) VALUES
(1, 'kandy', 1, 'Kandy', '7.291418', '80.636696', 0x356439316165393937306461322e6a7067, 'kandy, city, culture, central, cool, ', 'Kandy (Sinhala: à¶¸à·„à¶±à·”à·€à¶» Mahanuwara, pronounced [mahanuÊ‹É™rÉ™]; Tamil: à®•à®£à¯à®Ÿà®¿ Kandy) is a major city in Sri Lanka located in the Central Province. It was the last capital of the ancient kings era of Sri Lanka.The city lies in the midst of hills in the Kandy plateau, which crosses an area of tropical plantations, mainly tea. Kandy is both an administrative and religious city and is also the capital of the Central Province. Kandy is the home of the Temple of the Tooth Relic (Sri Dalada Maligawa), one of the most sacred places of worship in the Buddhist world. It was declared a world heritage site by UNESCO in 1988.', '2019-10-15'),
(2, 'Kandy Lake', 1, 'Kandy', '7.291418', '80.636696', 0x356439316163356435613232632e6a7067, 'kandy, lake, water, boating', 'Kandy Lake also known as Kiri Muhuda or the Sea of Milk, is an artificial lake in the heart of the hill city of Kandy, Sri Lanka, built in 1807 by King Sri Wickrama Rajasinghe next to the Temple of the Tooth. Over the years, it was reduced in size. It is a protected lake, with fishing banned.', '2019-10-15'),
(3, 'Udawattekele ', 1, 'Udawattekele, Kandy', '7.291418', '80.636696', 0x356439316164363433373534372e6a7067, 'Udawattekele Sanctuary, forest, kandy', 'Located at the hilly terrains of the temple of the tooth relic, this sanctuary served as the retreat for the Kandyan kings in the older times. Later, converted into a sanctuary, it is an important bio reserve of Kandy. The sanctuary is spread over 104 hectares and is primarily known for the different species of birds residing in it. Offering as many as 80 species of birds and animals like mammals and insects, it is one of the visiting places in Kandy. Along with the wildlife, you can also visit the three Buddhist forest monasteries present at this place. Another attraction is the three Buddhist cave dwellings. Tourists will love the thick forest cover of the area which looks beautiful in the monsoon months. If you are an animal lover and visiting Kandy, you must go here!', '2019-10-15'),
(4, 'Pinnawala Elephant', 1, 'Pinnawala, Kandy', '7.291418', '80.636696', 0x47726f75702d6f662d656c657068616e74732d63726f7373696e672d612d73747265616d2d696e2d50696e6e6177616c612d456c657068616e742d4f727068616e6167652d535330383035323031372e6a7067, 'Pinnawala Elephant Orphanage, elephant, pinnawala', 'Plan a day out with wild Asian elephants at Pinnawala Elephant Orphanage. This is a -popular breeding ground of 90 plus elephants who stay in their natural habitat. Watch these adorable elephants bathe, play around, and feed them fruits. Tourists can see them when they take a tour around the orphanage to see the majestic animals. This place is perfect if you want to have a small picnic along with your friends or family.\r\nPinnawala is the place where abandoned elephants are raised. Not only orphans but also elephants who are seriously injured or those who get aloof from their group are given proper shelter & care at the orphanage. The place is situated in the Pinnawala village present in the Sabaragamuwa Province of Sri Lanka. The orphanage was started in 1975 by the Sri Lanka Department of Wildlife Conservation. The place has evolved into an amazing tourist destination in recent years. The elephants are kept quite well and you may definitely see that while at this place. The orphanage also accepts elephants that are donated to them and they bring them back to their health. The elephants have mahouts for them who give them baths and proper food on a timely basis. If youâ€™re looking for natural bathing places in Kandy, then this is it!', '2019-10-15'),
(5, 'Temple Of Tooth Relic', 1, 'Kandy', '7.291418', '80.636696', 0x356439316164343938366630322e6a7067, 'Temple Of Tooth Relic, dalada maliga, kandy, buddha', 'Considered as one of the most important temples of Buddhists in Sri Lanka, the Temple of Tooth Relic is located to the north of Kandy Lake and is one of the most remarkable places to visit in Kandy Sri Lanka. The sacred tooth of Lord Buddha enshrined in the temple makes it one of the popular Kandy tourist places. The room housing the tooth is open to devotees to offer their prayers. However, nobody gets to see the tooth because it is kept in a golden casket inside a stupa-like structure. The temple is housed in the royal palace complex of the former Kingdom of Kandy. The place is of great importance due to the belief of the country on the tooth. The temple has rituals thrice a day. The temple was designated a UNESCO World Heritage Site 1988. The temple still stands strong even after facing attacks twice.\r\nAlong with the outside, tourists need to visit the inside of the temple to actually appreciate the architecture. There are holes in the walls which contain lamps lit using coconut oil. Tourists need to pay the entry fees and they should visit between 5:30 AM and 8:00 PM.\r\nPrime attractions of Temple of Tooth Relic: World Buddhist Museum, Audience Hall, Alut Maligawa â€“ a newer shrine to the rear of the temple with statues of Buddha donated by Thai devotees', '2019-10-15'),
(6, 'Hulu River Waterfall', 1, 'Huluganga, Kandy', '7.291418', '80.636696', 0x356439316164373661643465382e6a7067, 'river, bathing, adventure, water rafting', '30 km from Kandy into the quiet town of Dumbara lies Huluganga Falls on the Hulu River. The river originating from the scenic Knuckles Mountain Range is the perfect escape to leave the onlookers awed. The 75-meter high waterfall, located in the Dumbara town, is a-true beauty enclosed by natures allure. And itâ€™s no wonder that-Hulu is considered as one of the popular Kandy places to visit! The Huluganga falls still maintains its pristine condition because of its natural setting. Tourists will definitely enjoy the numerous rocks present in the bed of the waterfall. If they are feeling adventurous they can click pictures sitting on them. When looking for the places to visit near Kandy, then donâ€™t forget to stop by this majestic waterfall.\r\nCaution: The place experiences sudden and rapid increase in water level. Be wary!', '2019-10-15'),
(7, 'Knuckles Mountain Range', 3, 'Matale', '7.291418', '80.636696', 0x4b6e75636b6c65732d4d6f756e7461696e2d52616e67652e6a7067, 'Knuckles Mountain Range, matale, climbing, camping', 'This is one of the top places to visit in Kandy Resembling the shape of a knuckle of a clenched fist from the top, Knuckles Mountain Range is probably one of the most scenic visiting places in Kandy. The mountain Range in the region towards the northern end of Sri Lankan highlands (39 km from Kandy) is the place to be. Perfect place to try your hands on adventure traveling and camping, the Knuckles Mountain Range spans from Matale to Kandy and is a treat for the nature lovers. Look around and embrace the wilderness brought to you by sprawling grasslands, jagged peaks, torrents of streams, and gushing waterfalls. Enjoy the series of painted canvas around.\r\nThe best view of the range is the thick clouds that gather in the higher Montane area. Adventurous tourists can try their hands at hiking to visit the cloud forests which house a lot of the flora and fauna of the place. They are mostly unique to the place and you cannot find them in the rest of the island country. If you want to reach the highest point of the terrain, then you need to climb 1863 m above the sea level.\r\nAnother key wildlife attraction of the place are lizards which include the unique Crestless lizard, Kangaroo lizard, and Pygmy lizard. People who want to enjoy serious trekking may take part in the 3-day guided trekking tour which lasts for more than 40 KM and takes them through some of the main areas.\r\nThe great biodiversity of the Knuckles brings you wild boar, spotted deer, giant squirrel, barking deer, purple-faced leaf monkey, and mongoose.\r\nPrime attractions of Knuckles Range: Mini Worlds End (1192 m) towards the southern end of the mountains, hiking, and wild trekking', '2019-10-15'),
(8, 'Ceylon Tea Museum', 4, 'Mabolwela, Nuwareliya', '7.291418', '80.636696', 0x4365796c6f6e2d5465612d4d757365756d2e6a7067, 'Ceylon Tea Museum, kandy', 'The museum located in Hantane the 1925 vintage tea museum built on four floors where the first two floors consist of vintage tea making equipment, machinery, libraries, museum. To taste the authentic Sri Lankan flavored tea. Visitors can savor a free cup of the tee to relish the flavor\r\nPrime Attraction: One can enjoy the view of the mountains with the help of the telescope present here.', '2019-10-15'),
(9, 'Riverton Gap', 3, 'Matale', '7.295500', '80.636696', 0x5269766572746f6e2d4761702e6a7067, 'Riverton Gap, walking, hiking, climbing, camping', 'A trip to the Riverton Gap in Sri Lanka: This place is located a few kilometers away from the Matale town.It takes a few hours to reach from Kandy. The main attractions of this place include the scenic beauty and trekking. The two spectacular waterfalls present here, Sera Ella and Bambarakiri Ella. To reach the waterfalls one must trek through the marvelous forest and witness the beauty.\r\nPrime attraction: The two waterfalls present here with its breathtaking beauty.', '2019-10-15'),
(10, 'Pallekele Cricket Stadium', 1, 'Digana, Kandy', '7.295500', '80.636696', 0x466f746f4a65742d31342e6a7067, 'Pallekele Cricket Stadium, sports', 'This stadium is also known by the name Muttiah Muralitharan International Cricket Stadium since July 2010 when the Central Provincial Council of Kandy declared the plan of naming it after the amazing cricketer Muttiah Muralitharan. However, the name hasnt yet been officially sanctioned. This stadium was built along Hambantota International Cricket Stadium for the 2011 World Cup. It was inaugurated on November 27th, 2009 and even became 104th Test Venue of the world. For all the cricket lovers out there, this will definitely be one of the best places to visit in Kandy city.', '2019-10-15'),
(11, 'Royal Botanical Gardens', 1, 'Peradeniya, Kandy', '7.295500', '80.636696', 0x356439316166326461326437362e6a7067, 'Royal Botanical Gardens, peradeniya', 'Royal Botanic Gardens, Peradeniya are about 5.5 km to the west of the city of Kandy in the Central Province of Sri Lanka. It attracts 2 million visitors annually. It is near the Mahaweli River (the longest in Sri Lanka). It is renowned for its collection of orchids. The garden includes more than 4000 species of plants, including orchids, spices, medicinal plants and palm trees. Attached to it is the National Herbarium of Sri Lanka. The total area of the botanical garden is 147 acres (0.59 km2), at 460 meters above sea level, and with a 200-day annual rainfall. It is managed by the Division of National Botanic Gardens of the Department of Agriculture.', '2019-10-15'),
(12, 'Hanthana Mountain Range', 1, 'Hanthana, Kandy', '7.295500', '80.636696', 0x34653834333432312d383664342d343962382d613666332d6465313232623534366663642e6a7067, 'Hanthana Mountain Range, climbing, camping, walking, safari, adventurer', 'The Hanthana Mountain Range lies in central Sri Lanka, south-west of the city of Kandy. It was declared as an environmental protection area in February 2010 under the National Environment Act. The maximum height of the range is 3800 ft. The mountain range consists of seven peaks. The highest one being the Uura Kanda. The range is a favourite destination among the mountain hikers in Sri Lanka. University of Peradeniya is situated adjacent to the Hanthana mountain range.', '2019-10-15'),
(13, 'Horton Plains, Ohiya', 4, 'Ohiya, Nuwareliya', '7.295500', '80.636696', 0x31343637343038373033335f363638383339666637325f6f2e6a70672e6a7067, 'Horton Plains National Park, Ohiya, adventurer,  climbing', 'Horton National Park is a â€˜food for the soulâ€™ kind of mesmerizing locale. The park is perched in the shadows of the countryâ€™s 2nd and 3rd highest mountains, Kirigalpota and Totapola. The place is also termed as worldâ€™s end due to its undaunting mysterious views of waterfalls, misted lakes and earthy species of flora and fauna. The national park is actually a plateau and is 2000m high.\r\nIt is better to start early in the morning to witness this heavenly place. \r\nHighlights: An array of wildlife such as Samba deers, leopards, wild boars, purple faced langoor; an ideal site for birdwatchers as you may encounter a variety of flying wonders such as bulbul, Ceylon blackbird, Ceylon white eyed arrenga, mountain hawk etc; the epic walk to worldâ€™s end(4kms) and Farr Inn hunting lodge.\r\nLocation: 11 kms approx from Ohiya.\r\nPrice: Adult â€“ 1895 Child: 1011. \r\nTimings: 6 am to 6 pm', '2019-10-15'),
(14, 'Buddhist Museum, Kandy', 1, 'Kandy', '7.295500', '80.636696', 0x313531363335373138365f34303633612e6a70672e6a7067, 'Visit International Buddhist Museum, Kandy', 'Located close to the Temple of the Tooth, inside the royal palace complex, The International Buddhist Museum is a complete knowledge base and a showcase of the spread of Buddhism throughout Asia. It is one of the famous religious places to visit in Sri Lanka.\r\nThere are separate rooms dedicated to different countries illustrating Buddhism in that location. There are photographs, models and gigantic statues which portray the spread and influence of Buddhism on people in various places.\r\nLocation: Close to Temple of Tooth, Kandy\r\nHighlights: To get a better knowledge about the spread of Buddhism displayed here one can opt for a free audio guide which is available at the ticket counter or can opt for a tourist guide at 1070LKR who explains the whole location. Do wear covered clothes from shoulder to toe and remove the shoes. Thereâ€™s an elevator in the Museum which allows disabled visitors to access the Museum. \r\nTime: 8:00 AM to 7:00 PM\r\n\r\nPrice: Approximate price starts from 1070 LKR per adult', '2019-10-15'),
(15, 'British Garrison Cemetery', 1, 'Ampitiya, Kandy', '7.295500', '80.636696', 0x5472696e636f6d616c65655f5761725f43656d65746572792e6a7067, 'British Garrison Cemetery,', 'This striking European style graveyard has many stories to tell of the young souls who died during the British Colonisation of SriLanka.  The most heartfelt part of this beautiful old churchyard is the 163 graves of young men, women, and children that take us back to time immemorial. Most of the tombs have inscriptions written on the lives of these good souls (few brave soldiers, many infants, and land owners).The cemetery was established in 1817 and today is being nurtured by a Caretaker, Charles Carmichael. \r\nHighlights: Shadowed by trees and overlooking a gorgeous lake, this place is completely sound free. Charles, who also acts as a guide, tours you through the entire cemetery and narrates each life of the rested bodies quite fascinatingly. \r\nLocation: Few meters uphill from the National Museum, Kandy.\r\nTimings: 8:00 AM to 6:00 PM every day', '2019-10-15'),
(16, 'Wales Park', 1, 'Mahakande, Kandy', '7.295500', '80.636696', 0x313438323733383030335f63376338363662396439383334353933386533616437306139653238616134652e6a7067, 'Wales Park, kandy, garden', 'For that perfect fun time along with your family and friends Wales Park is the best option for you while you are visiting Sri Lanka. For your bucket list this is another best places to visit in Sri Lanka. Situated at the top of a small hill this park overlooks the Kandy Lake, this park is known for its majestic view. This park is also known as The Royal Palace Park. \r\nHighlights: There is one Japanese field gun in the park which was captured by the British 14th Army in Burma during World War II and presented to the city of Kandy by Lord Mountbatten. \r\nLocation: The Wales Park is located at Rajapihilla Mawatha, Kandy 20000, Sri Lanka \r\nPrice: The approximate price for the entry is 219 LKR. ', '2019-10-15'),
(17, 'Sembuwatta Lake', 3, 'Elkaduwa, Matale', '7.291418', '80.636696', 0x73332e6a7067, 'Sembuwatta Lake, adventure, sports, matale', 'Sembuwatta Lake is a tourist attraction situated at Elkaduwa in the Matale District of Sri Lanka, adjacent to the Campbellâ€™s Lane Forest Reserve. Sembuwatta Lake is a man-made lake created from natural spring water. Alongside the lake is a natural swimming pool.\r\nSembuwatta Lake is believed to be 9 m (30 ft) to 12 m (39 ft) deep. Currently the lake belongs to the Elkaduwa Plantations and produces electricity for the nearby villagers.', '2019-10-15'),
(18, 'Madulkelle ', 3, 'Madulkelle, Matale', '7.291418', '80.636696', 0x6d322e706e67, 'Madulkelle, adventure, season, sports, tea', 'Imagine waking up to the sounds of birds chirping outside your room, you then open your front door to one of the most spectacular views imaginable â€“ majestic mountains, lush green valleys and tea plantations, crystal clear streams and even the occasional deer or giant squirrel. Take a deep breath of the fresh air and pinch yourself â€“ no, youâ€™re not dreamingâ€¦\r\n\r\nThis is Madulkelle Tea and Eco Lodge, the first of its kind in Sri Lanka offering a revolutionary and contemporary concept to the traditional warmth and hospitality that Sri Lanka is famous for.\r\n\r\nNestled on a picturesque tea plantation, on the Knuckles Mountain Range 1000 meters above sea level, Madulkelle Tea and Eco Lodge will treat travelers to magnificent views, top class facilities, friendly and courteous service and plenty of things to see and do.', '2019-10-15'),
(19, 'Pedro Tea Estate', 4, 'Mobola, Nuwaraeliya', '7.291418', '80.636696', 0x356439316166663630386363342e6a7067, 'Pedro Tea Estate, season, nuwareliya', 'Sri Lanka has a huge number of the plantation. In Nuwara Eliya, there are few tea plantation factories and is best places to visit in Nuwara Eliya. It is very enjoyable to see the process that goes in to create this simple drink everyday. This will also very educational for the kids. They also let visitors go around the plantation sites and enjoy the aroma and the beauty. It can be reached by local buses or rickshaw. It is one of the most uncommon places to visit in Nuwara Eliya.\r\nEntry Fees: INR 90/- person\r\nHighlights: You can take a 20-minute guided tour of the plantation factories, originally built in 1885 and still packed with 19th-century engineering marvels.\r\nLocation: About 3.5km east of Nuwara Eliya on the way to Kandapola', '2019-10-15'),
(20, 'Ramboda Falls', 4, 'Pusallawa, Nuwareliya', '7.291418', '80.636696', 0x3242616c6942616e79756d616c612d576174657266616c6c73303331302e6a7067, 'Ramboda Falls, adventure, bathing, cool', 'Located in the Pussellawa district, in the city of Kandy, it is known for scenic landscapes comprising of highlands, ridges, plains, streams and hilly mountains. The best attractions include the Ramboda Falls.', '2019-10-15'),
(21, 'Colombo Galle Face', 2, 'Galle face, Colombo', '7.291418', '80.636696', 0x636f6c6f6d626f2d67616c6c652d666163652d677265656e2d3136323132363933323632382d6f72696a67702e6a7067, 'Colombo Galle Face, adventurer, relax', 'Galle Face is a 5 ha (12 acres) ocean-side urban park, which stretches for 500 m (1,600 ft) along the coast, in the heart of Colombo, the financial and business capital of Sri Lanka. The promenade was initially laid out in 1859 by Governor Sir Henry George Ward, although the original Galle Face Green extended over a much larger area than is seen today. The Galle Face Green was initially used for horse racing and as a golf course, but was also used for cricket, polo, football, tennis and rugby.', '2019-10-15'),
(22, 'Colombo City', 2, 'Colombo', '7.291418', '80.636696', 0x7a5f7069762d436f6c6f6d626f2d436974792d2d312e6a7067, 'Colombo, city', 'Colombo, the capital of Sri Lanka, has a long history as a port on ancient east-west trade routes, ruled successively by the Portuguese, Dutch and British. That heritage is reflected in its its architecture, mixing colonial buildings with high-rises and shopping malls. The imposing Colombo National Museum, dedicated to Sri Lankan history, borders sprawling Viharamahadevi Park and its giant Buddha.', '2019-10-16'),
(23, 'Sigiriya Fortress', 5, 'Sigiriya, Dambulla', '7.254418', '76.636696', 0x73696769726979612e6a7067, 'Sigiriya Fortress, dambulla, sinharaja', 'Sigiriya or Sinhagiri is an ancient rock fortress located in the northern Matale District near the town of Dambulla in the Central Province, Sri Lanka. The name refers to a site of historical and archaeological significance that is dominated by a massive column of rock nearly 200 meters high.\r\nAccording to the ancient Sri Lankan chronicle the Culavamsa, this site was selected by King Kashyapa for his new capital. He built his palace on the top of this rock and decorated its sides with colourful frescoes. On a small plateau about halfway up the side of this rock he built a gateway in the form of an enormous lion. (The) name of this place is derived from this structure SÄ«nhÄgiri, the Lion Rock.\r\nThe capital and the royal palace was abandoned after the kings death. It was used as a Buddhist monastery until the 14th century. Sigiriya today is a UNESCO listed World Heritage Site. It is one of the best preserved examples of ancient urban planning.\r\n', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_activities`
--

CREATE TABLE `tbl_location_activities` (
  `id` int(5) NOT NULL,
  `location_id` int(4) NOT NULL,
  `activity_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location_activities`
--

INSERT INTO `tbl_location_activities` (`id`, `location_id`, `activity_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 5),
(5, 2, 6),
(6, 3, 5),
(7, 3, 6),
(8, 3, 7),
(9, 4, 5),
(10, 4, 6),
(11, 4, 7),
(12, 5, 2),
(13, 5, 6),
(14, 6, 3),
(15, 6, 5),
(16, 6, 6),
(17, 6, 7),
(18, 6, 9),
(19, 7, 5),
(20, 7, 6),
(21, 7, 7),
(22, 7, 9),
(23, 8, 5),
(24, 8, 6),
(25, 9, 5),
(26, 9, 6),
(27, 9, 7),
(28, 9, 9),
(29, 10, 5),
(30, 10, 6),
(31, 10, 9),
(32, 11, 3),
(33, 11, 5),
(34, 11, 6),
(35, 12, 3),
(36, 12, 5),
(37, 12, 6),
(38, 12, 7),
(39, 13, 3),
(40, 13, 5),
(41, 13, 6),
(42, 13, 7),
(43, 14, 2),
(44, 15, 2),
(45, 15, 5),
(46, 15, 6),
(47, 16, 1),
(48, 16, 3),
(49, 16, 5),
(50, 16, 6),
(51, 17, 5),
(52, 17, 6),
(53, 17, 7),
(54, 17, 9),
(55, 18, 1),
(56, 18, 2),
(57, 18, 3),
(58, 18, 4),
(59, 18, 5),
(60, 18, 6),
(61, 18, 7),
(62, 18, 9),
(63, 19, 3),
(64, 19, 4),
(65, 19, 5),
(66, 19, 6),
(67, 20, 2),
(68, 20, 3),
(69, 20, 5),
(70, 20, 6),
(71, 21, 1),
(72, 21, 5),
(73, 21, 8),
(74, 22, 1),
(75, 22, 3),
(76, 22, 4),
(77, 22, 5),
(78, 22, 6),
(79, 22, 8),
(80, 22, 9),
(81, 23, 2),
(82, 23, 3),
(83, 23, 4),
(84, 23, 5),
(85, 23, 6),
(86, 23, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_images`
--

CREATE TABLE `tbl_location_images` (
  `id` int(5) NOT NULL,
  `location_id` int(4) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location_images`
--

INSERT INTO `tbl_location_images` (`id`, `location_id`, `image`) VALUES
(1, 1, 0x356439316165393937306461322e6a7067),
(2, 1, 0x356439316163356435613232632e6a7067),
(3, 1, 0x356439316164343938366630322e6a7067),
(4, 1, 0x356439316164316635653661362e6a7067),
(5, 1, 0x356439316164363433373534372e6a7067),
(6, 2, 0x356439316163356435613232632e6a7067),
(7, 2, 0x356439316163666532386539302e6a7067),
(8, 2, 0x356439316163336464643634662e6a7067),
(9, 3, 0x356439316164363433373534372e6a7067),
(10, 4, 0x47726f75702d6f662d656c657068616e74732d63726f7373696e672d612d73747265616d2d696e2d50696e6e6177616c612d456c657068616e742d4f727068616e6167652d535330383035323031372e6a7067),
(11, 5, 0x356439316164343938366630322e6a7067),
(12, 5, 0x356439316139373164616231632e6a7067),
(13, 5, 0x356439316139373164616231632e6a7067),
(14, 6, 0x356439316165633735316630372e6a7067),
(15, 6, 0x356439316164373661643465382e6a7067),
(16, 7, 0x4b6e75636b6c65732d4d6f756e7461696e2d52616e67652e6a7067),
(17, 8, 0x4365796c6f6e2d5465612d4d757365756d202831292e6a7067),
(18, 9, 0x5269766572746f6e2d4761702e6a7067),
(19, 9, 0x356439316139633938363364642e6a7067),
(20, 10, 0x466f746f4a65742d31342e6a7067),
(21, 11, 0x356439316166326461326437362e6a7067),
(22, 11, 0x356439316166346233613533362e6a7067),
(23, 11, 0x356439316166356135656463622e6a7067),
(24, 12, 0x34653834333432312d383664342d343962382d613666332d6465313232623534366663642e6a7067),
(25, 12, 0x68616e7468616e612d6d6f756e7461696e2d72616e67652e6a7067),
(26, 12, 0x6d617872657364656661756c742e6a7067),
(27, 13, 0x31343637343038373033335f363638383339666637325f6f2e6a70672e6a7067),
(28, 13, 0x356439316164393135396263642e6a7067),
(29, 14, 0x313531363335373138365f34303633612e6a70672e6a7067),
(30, 15, 0x5472696e636f6d616c65655f5761725f43656d65746572792e6a7067),
(31, 15, 0x427269746973685f4761727269736f6e5f43656d65746572792e6a70672e6a7067),
(32, 2, 0x31333935363831333431325f373237353865306236315f6f2e6a7067),
(33, 8, 0x383432393838303633325f613734316665363361335f6f2e6a7067),
(34, 16, 0x313438323733383030335f63376338363662396439383334353933386533616437306139653238616134652e6a7067),
(35, 16, 0x356439316166346233613533362e6a7067),
(36, 17, 0x73312e6a7067),
(37, 17, 0x73322e6a7067),
(38, 17, 0x73332e6a7067),
(39, 18, 0x6d312e6a7067),
(40, 18, 0x6d322e706e67),
(41, 18, 0x6d332e6a7067),
(42, 18, 0x6d342e706e67),
(43, 18, 0x6d352e6a7067),
(44, 18, 0x6d362e6a7067),
(45, 19, 0x356439316166663630386363342e6a7067),
(46, 19, 0x356439316164626534343237362e6a7067),
(47, 19, 0x356439316164393135396263642e6a7067),
(48, 20, 0x3242616c6942616e79756d616c612d576174657266616c6c73303331302e6a7067),
(49, 21, 0x636f6c6f6d626f2d67616c6c652d666163652d677265656e2d3136323132363933323632382d6f72696a67702e6a7067),
(50, 21, 0x67616c6c652d666163652d677265656e2d322e6a7067),
(51, 21, 0x5461727576696c6c61732d67616c6c652d666163652e6a7067),
(52, 21, 0x7a5f7033312d67616c6c652d666163652e6a7067),
(53, 22, 0x7a5f7069762d436f6c6f6d626f2d436974792d2d312e6a7067),
(54, 23, 0x5369676972697961202831292e6a7067),
(55, 23, 0x73696769726979612e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinces`
--

CREATE TABLE `tbl_provinces` (
  `province_id` int(3) NOT NULL,
  `province_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinces`
--

INSERT INTO `tbl_provinces` (`province_id`, `province_title`) VALUES
(1, 'Central Province'),
(2, 'Western Province');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservations`
--

CREATE TABLE `tbl_reservations` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date DEFAULT NULL,
  `no_of_guests` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`id`, `user_id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `no_of_guests`, `status`, `date`) VALUES
(1, 23, 1, 1, '2019-10-10', '2019-10-15', 1, 'CheckOut', '2019-10-10'),
(2, 5, 1, 1, '2019-10-16', '2019-10-18', 1, 'CheckOut', '2019-10-10'),
(3, 24, 13, 4, '2019-10-15', '2019-10-17', 3, 'CheckOut', '2019-10-14'),
(4, 23, 13, 5, '2019-10-17', '2019-10-20', 4, 'Approved', '2019-10-16'),
(5, 25, 13, 4, '2019-10-18', '2019-10-21', 4, 'Pending', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` longblob NOT NULL,
  `description` text NOT NULL,
  `available_rooms` int(4) NOT NULL,
  `price_perday` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `hotel_id`, `room_id`, `type`, `image`, `description`, `available_rooms`, `price_perday`, `status`, `date`) VALUES
(1, 1, 'Ref1', 'Single', 0x43463234323130302d7472696f2e6a7067, 'Our comfortable single rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Amsterdam Forest Hotel, the single room is fully equipped with all comforts.\r\nIn addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 mÂ², our single rooms offer all the space and comfort you need during your stay in Amsterdam.', 0, '20.00', 'Published', '2019-10-15'),
(2, 1, 'Ref2', 'Double', 0x352d312d7374616e646172642d646f75626c652d4d41494e2d312d373030783430302e6a7067, 'Our comfortable double rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Hotel, the double room is fully equipped with all comforts.\r\nIn addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5, our single rooms offer all the space and comfort you need during your stay in hotel.', 0, '30.00', 'Published', '2019-10-15'),
(3, 1, 'Ref3', 'Triple', 0x4c656564732d6275646765742d686f74656c2d747269706c652d726f6f6d2d363432783333352e6a7067, 'Our comfortable triple rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Amsterdam Forest Hotel, the triple room is fully equipped with all comforts.\r\nIn addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 mÂ², our single rooms offer all the space and comfort you need during your stay in Amsterdam.', 0, '50.00', 'Draft', '2019-10-19'),
(4, 13, 'Ref1', 'Quad', 0x717561645f726f6f6d2e6a7067, 'Our comfortable quad rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Amsterdam Forest Hotel, the quad room is fully equipped with all comforts.\r\nIn addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 mÂ², our single rooms offer all the space and comfort you need during your stay in Amsterdam.', 0, '50.00', 'Published', '2019-10-16'),
(5, 13, 'Ref2', 'Quad', 0x717561642d726f6f6d2d312e6a7067, 'Our comfortable quad rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Amsterdam Forest Hotel, the quad room is fully equipped with all comforts. In addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 mÂ², our single rooms offer all the space and comfort you need during your stay in Amsterdam.', 0, '55.00', 'Published', '2019-10-15'),
(6, 1, 'Ref1', 'Single', 0x7374616e646172642d73696e676c652d726f6f6d2d686f74656c2d707265736964656e742d62756461706573742e6a7067, 'Our comfortable quad rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Amsterdam Forest Hotel, the quad room is fully equipped with all comforts. In addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 mÂ², our single rooms offer all the space and comfort you need during your stay in Amsterdam..', 0, '20.00', 'Published', '2016-10-19'),
(7, 13, 'Ref3', 'Suite', 0x64653962393832342d663935622d343635372d623231642d6135316635353065313662312e6a7067, 'Overlooking the Indian Ocean, this refined hotel is 2 km from Galle Face Green park and Beira Lake. Chic, traditionally furnished rooms with ocean or harbour views and warm decor feature marble bathrooms, free Wi-Fi, flat-screen TVs, and tea and coffeemaking equipment. Upgraded rooms offer more floor space and access to the executive lounge. Luxe suites add living rooms. Room/butler service is available 24/7. There are 4 restaurants offering international fare, as well as 3 bars. There is also an outdoor pool, a plush spa and a fitness centre, plus meeting and function areas. Breakfast is extra.. Overlooking the Indian Ocean, this refined hotel is 2 km from Galle Face Green park and Beira Lake. Chic, traditionally furnished rooms with ocean or harbour views and warm decor feature marble bathrooms, free Wi-Fi, flat-screen TVs, and tea and coffeemaking equipment. Upgraded rooms offer more floor space and access to the executive lounge. Luxe suites add living rooms. Room/butler service is available 24/7. There are 4 restaurants offering international fare, as well as 3 bars. There is also an outdoor pool, a plush spa and a fitness centre, plus meeting and function areas. Breakfast is extra..', 0, '120.00', 'Published', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_images`
--

CREATE TABLE `tbl_room_images` (
  `id` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room_images`
--

INSERT INTO `tbl_room_images` (`id`, `hotel_id`, `room_id`, `image`) VALUES
(4, 1, 1, 0x43463234323130302d7472696f2e6a7067),
(5, 1, 1, 0x62382e6a7067),
(6, 1, 1, 0x76332e6a7067),
(7, 1, 2, 0x352d312d7374616e646172642d646f75626c652d4d41494e2d312d373030783430302e6a7067),
(8, 1, 2, 0x62392e6a7067),
(9, 1, 2, 0x76342e6a7067),
(10, 1, 3, 0x4c656564732d6275646765742d686f74656c2d747269706c652d726f6f6d2d363432783333352e6a7067),
(11, 1, 3, 0x6231302e6a7067),
(12, 1, 3, 0x76312e6a7067),
(13, 13, 4, 0x717561645f726f6f6d2e6a7067),
(14, 13, 4, 0x76332e6a7067),
(15, 13, 4, 0x62352e6a7067),
(16, 13, 5, 0x717561642d726f6f6d2d312e6a7067),
(17, 13, 5, 0x62372e6a7067),
(18, 13, 5, 0x76352e6a7067),
(19, 13, 5, 0x706f6f6c2d76353132383138312d313434302d31303234783638332e6a7067),
(20, 1, 6, 0x7374616e646172642d73696e676c652d726f6f6d2d686f74656c2d707265736964656e742d62756461706573742e6a7067),
(21, 1, 6, 0x74686f6e2d686f74656c2d7465726d696e75732d736d616c6c2d73696e676c652d726f6f6d2d312e6a7067),
(22, 1, 6, 0x6231302e6a7067),
(23, 13, 7, 0x64653962393832342d663935622d343635372d623231642d6135316635353065313662312e6a7067),
(24, 13, 7, 0x73756974652d6e6f766f74656c2d62616e676b6f6b2d706c6f656e636869742d73756b68756d7669742d312e6a7067),
(25, 13, 7, 0x62372e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(5) NOT NULL,
  `title` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `nationality` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL,
  `tel_no` char(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `title`, `full_name`, `username`, `email`, `password`, `gender`, `nationality`, `role`, `tel_no`, `date`) VALUES
(1, 'Mr', 'jazal ahamed', 'jazal', 'jazalahamed19@gmail.com', '123', 1, 'Sri Lanka', 'Admin', '0774429520', '2019-09-19'),
(5, 'Mrs', 'zakiya', 'zakiya', 'zakiya@gmail.co', '123', 0, 'Sri Lanka', 'Subscriber', '0774429520', '2019-09-20'),
(11, 'Mrs', 'Hikma Jahid', 'hikma', 'hikma@gmail.com', '123', 0, 'Sri Lanka', 'Subscriber', '0776603939', '2019-09-24'),
(23, 'Mrs', 'Mark Anthony', 'Mark', 'mark@gmail.com', '123', 0, 'United Kindom', 'Subscriber', '0254215985', '2019-10-15'),
(24, 'Mrs', 'Mary Churchill ', 'Mary', 'mary@gmail.com', '123', 0, 'United Kindom', 'Subscriber', '0752489525', '2019-10-16'),
(25, 'Mr', 'Kumar Perera', 'Kumar', 'kumar@gmail.com', '123', 0, 'Sri Lanka', 'Subscriber', '075256986', '2019-10-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_amenities_rooms`
--
ALTER TABLE `tbl_amenities_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel_images`
--
ALTER TABLE `tbl_hotel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `tbl_location_activities`
--
ALTER TABLE `tbl_location_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location_images`
--
ALTER TABLE `tbl_location_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_provinces`
--
ALTER TABLE `tbl_provinces`
  ADD PRIMARY KEY (`province_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room_images`
--
ALTER TABLE `tbl_room_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `act_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_amenities_rooms`
--
ALTER TABLE `tbl_amenities_rooms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `district_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_hotel_images`
--
ALTER TABLE `tbl_hotel_images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `loc_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_location_activities`
--
ALTER TABLE `tbl_location_activities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_location_images`
--
ALTER TABLE `tbl_location_images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_provinces`
--
ALTER TABLE `tbl_provinces`
  MODIFY `province_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_room_images`
--
ALTER TABLE `tbl_room_images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD CONSTRAINT `tbl_districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `tbl_provinces` (`province_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
