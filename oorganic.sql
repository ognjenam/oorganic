-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 03:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oorganic`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_ID` int(255) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `name`) VALUES
(1, 'dried fruit'),
(2, 'dark chocolate'),
(3, 'superfoods'),
(4, 'seeds');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_ID` int(255) NOT NULL,
  `product_ID` int(255) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_ID`, `product_ID`, `path`) VALUES
(1, 4, 'vanilla_marshmallow_twists.jpg'),
(2, 3, 'strawberry_granola_bark.jpg'),
(3, 2, 'pumpkin_spice_granola_bark.jpg'),
(4, 1, 'dark_chocolate_dipped_oranges.jpg'),
(5, 5, 'coconut_toffee_granola_bark.jpg'),
(6, 10, 'california_apricots.jpg'),
(7, 9, 'dried_apricots.jpg'),
(8, 6, 'dried_mango.jpg'),
(9, 7, 'dried_oranges.jpg'),
(10, 8, 'freeze_dried_apples.jpg'),
(11, 11, 'natural_tart_apples.jpg'),
(12, 12, 'alfalfa_seed.jpg'),
(13, 14, 'flax_seed.jpg'),
(14, 15, 'golden_flax_seed.jpg'),
(15, 16, 'hemp_seeds.jpg'),
(16, 13, 'poppy_seeds.jpg'),
(17, 21, 'pistachios.jpg'),
(18, 17, 'walnuts.jpg'),
(19, 20, 'cashews.jpg'),
(20, 19, 'brasil_nuts.jpg'),
(21, 18, 'almonds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(255) NOT NULL,
  `category_ID` int(255) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `category_ID`, `name`, `description`, `price`, `available`) VALUES
(1, 2, 'chocolate dipped oranges', 'Our dark chocolate-dipped oranges are a must-try! Glazed orange slices are generously dipped in luscious dark chocolate. The sweet citrus flavor complements the rich flavor of dark chocolate. ', '10.99', 1),
(2, 2, 'pumpkin spice granola bark', 'If you agree pumpkin spice is nice all year long, you’ll definitely want to pick up our Organic Pumpkin Spice Granola Bark! Easy on the eyes and full of all natural goodness inside to boot. ', '5.99', 1),
(3, 2, 'strawberry granola bark', 'Organic Strawberry Granola Bark makes us excited to snack. This beautiful bark is free of preservatives, made with real ingredients like almonds, sprouted quinoa, oats and freeze-dried strawberries.', '5.99', 1),
(4, 2, 'vanilla marshmallow twists', 'Our vanilla marshmallow twists are a Joyva classic. The finest dark chocolate envelops a smooth and sweet marshmallow center. They’re soft, fresh, and absolutely delicious.', '11.99', 1),
(5, 2, 'coconut toffee granola bark', 'Toffee break! Organic Coconut Toffee Granola Bark is a sweet snack that’ll have you in chocolate heaven in a snap. This eye-catching, handmade granola bark combines pure, all-natural ingredients.', '5.99', 1),
(6, 1, 'dried mango', 'Our dried mango is naturally sweet and rich. It’s simply mango with no additives or sweeteners. We source the sweetest and choicest mango “cheeks” we could find, so the pieces are large and delicious.', '13.99', 1),
(7, 1, 'dried oranges', 'Organic dried oranges are an all natural treat. These dried orange slices are simply wonderful to snack on or to add to beverages such as tea. They have an invigorating citrus taste and aroma. ', '7.99', 1),
(8, 1, 'freeze dried apples', 'Organic freeze-dried apples are a crunchy and delicious snack. Made from Granny Smith green apples and a touch of lemon juice to preserve color, they have a tangy and sweet flavor. ', '6.99', 1),
(9, 1, 'dried apricots', 'Our dried apricots are vibrant in flavor thanks to their size. That’s right, we source the largest graded size of apricots available in the market for any apricot connoisseurs out there!', '8.99', 1),
(10, 1, 'california apricots', 'Extra-fancy sized dried California apricots are sweet with a subtle tartness. Moist and juicy, these apricots are delicious and perfect for snacking. They have high levels of vitamin A.', '17.99', 1),
(11, 1, 'natural tart apples', 'Savor Mother Nature’s “green apple” flavor with Natural Dried Tart Apples. Just Granny Smith apple slices and nothing else! Dried apples offer fiber and vitamins in every serving.', '12.99', 1),
(12, 4, 'alfalfa seed', 'Alfalfa is a rich source of vitamins A, C, E and K. These are ideal for sprouting. Mix them in salads, soups, or sprinkle in any other food. These are raw, natural, and organic.', '14.99', 1),
(13, 4, 'poppy seeds', 'These blue, beautiful pre-washed poppy seeds are bursting with bold, nutty flavor and have dozens of popular applications. Poppy seeds add both flavor and texture to breads, cookies, muffins, ...', '5.99', 1),
(14, 4, 'flax seed', 'Organic flax seed grown free from pesticides and chemicals. Flax seed is an extremely healthy addition to any diet.', '4.99', 1),
(15, 4, 'golden flax seed', 'Organic golden flax seed is an extremely rich plant source of omega-3s, the essential fatty acids that protect the heart and reduce excess inflammation in the body. ', '4.99', 1),
(16, 4, 'hemp seeds', 'All natural, raw organic hemp seeds out of the shell, also known as hemp hearts. These are one of the world’s most nutritious seeds. Shelled hemp seeds are 33% protein and with Omega-3 fatty acids. ', '16.99', 1),
(17, 3, 'walnuts', 'So rich, buttery and full of flavor that you’d swear they were just picked yesterday. Not all Walnuts grow up the same—we harvest our California-grown walnuts when they’re at their peak.', '16.99', 1),
(18, 3, 'almonds', 'Our raw organic almonds are just that truly raw and unpasteurized and certified organic. Perfectly delicious and loaded with nutrients, these unpasteurized almonds are among our best selling products.', '14.99', 1),
(19, 3, 'brazil nuts', 'Organic Brazil nuts arrive out of the shell and ready for snacking, cooking, or baking. They are a complete protein, boasting all nine essential amino acids.', '15.99', 1),
(20, 3, 'cashews', 'Cashews are a satisfying and nutritious snack. These nuts are high in protein, fiber and healthy fats. We love adding these tasty raw cashews to rice dishes and curries for an extra bite of protein.', '12.99', 1),
(21, 3, 'pistachios', 'Raw pistachios are a healthy, nutrient-rich snack that you can eat anytime, anywhere. Enliven your favorite salad or rice dish with a sprinkling of gorgeous green no shell pistachios. ', '17.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_ID` int(255) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_ID`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(255) NOT NULL,
  `role_ID` int(255) NOT NULL,
  `username` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `role_ID`, `username`, `email`, `password`, `active`, `last_active`, `registration_date`) VALUES
(1, 1, 'itsogii', 'oorganicfoodshop@gmail.com\r\n', 'cacd7af198e3680052d25d2f3aba6689', 1, '2020-03-27 14:14:38', '0000-00-00 00:00:00'),
(2, 2, 'test', 'test@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, '2020-03-27 13:57:41', '2020-03-27 13:37:45'),
(3, 2, 'test1', 'test1@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, '2020-03-27 13:59:54', '2020-03-27 13:38:01'),
(4, 2, 'test2', 'test2@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:38:16'),
(5, 2, 'test3', 'test3@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, '2020-03-27 14:01:08', '2020-03-27 13:38:44'),
(6, 2, 'test4', 'test4@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, '2020-03-27 14:02:21', '2020-03-27 13:39:04'),
(7, 2, 'primer', 'primer@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:40:41'),
(8, 2, 'primer1', 'primer1@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:40:51'),
(9, 2, 'primer2', 'primer2@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:00'),
(10, 2, 'primer3', 'primer3@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:10'),
(11, 2, 'primer4', 'primer4@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:19'),
(12, 2, 'primer5', 'primer5@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:34'),
(13, 2, 'primer6', 'primer6@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:44'),
(14, 2, 'primer7', 'primer7@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:41:53'),
(15, 2, 'primer8', 'primer8@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, NULL, '2020-03-27 13:42:36'),
(16, 2, 'testtest', 'obakeryshop@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 0, '2020-03-27 13:51:08', '2020-03-27 13:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_cart_ID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `product_ID` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `ordered` tinyint(1) NOT NULL DEFAULT '0',
  `user_order_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`user_cart_ID`, `user_ID`, `product_ID`, `date`, `ordered`, `user_order_ID`) VALUES
(1, 1, 1, '2020-03-27 13:44:01', 1, 1),
(2, 1, 2, '2020-03-27 13:44:03', 1, 1),
(3, 1, 3, '2020-03-27 13:44:06', 1, 1),
(4, 1, 4, '2020-03-27 13:44:08', 1, 1),
(5, 1, 6, '2020-03-27 13:47:13', 1, 2),
(6, 1, 7, '2020-03-27 13:47:15', 1, 2),
(7, 1, 19, '2020-03-27 13:47:18', 1, 2),
(11, 1, 5, '2020-03-27 13:47:33', 1, 2),
(12, 1, 6, '2020-03-27 13:47:35', 1, 2),
(13, 1, 3, '2020-03-27 13:47:37', 1, 2),
(14, 1, 7, '2020-03-27 13:48:39', 1, 3),
(15, 1, 3, '2020-03-27 13:48:41', 1, 3),
(16, 1, 4, '2020-03-27 13:48:43', 1, 3),
(17, 16, 2, '2020-03-27 13:52:09', 1, 4),
(18, 16, 1, '2020-03-27 13:52:11', 1, 4),
(19, 16, 2, '2020-03-27 13:52:37', 1, 5),
(20, 16, 4, '2020-03-27 13:53:09', 1, 6),
(21, 16, 3, '2020-03-27 13:53:12', 1, 6),
(22, 2, 4, '2020-03-27 13:57:52', 1, 7),
(23, 2, 2, '2020-03-27 13:57:54', 1, 7),
(24, 3, 10, '2020-03-27 14:00:04', 1, 8),
(25, 3, 6, '2020-03-27 14:00:07', 1, 8),
(27, 3, 15, '2020-03-27 14:00:44', 1, 9),
(28, 5, 1, '2020-03-27 14:01:19', 1, 10),
(29, 5, 13, '2020-03-27 14:01:40', 1, 11),
(30, 5, 11, '2020-03-27 14:02:00', 1, 12),
(31, 6, 17, '2020-03-27 14:02:31', 1, 13),
(32, 6, 9, '2020-03-27 14:02:53', 1, 14),
(33, 6, 5, '2020-03-27 14:03:17', 1, 15),
(34, 6, 6, '2020-03-27 14:03:21', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `user_image_ID` int(255) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`user_image_ID`, `path`, `user_ID`) VALUES
(1, 'itsogii_1585312431_47447987_10210349612495955_338549998243282944_n.jpg', 1),
(2, 'test_1585317579_30724618_1753512278076020_5619710496291684352_o.jpg', 2),
(3, NULL, 3),
(4, NULL, 4),
(5, NULL, 5),
(6, NULL, 6),
(7, NULL, 7),
(8, NULL, 8),
(9, NULL, 9),
(10, NULL, 10),
(11, NULL, 11),
(12, NULL, 12),
(13, NULL, 13),
(14, NULL, 14),
(15, NULL, 15),
(16, 'testtest_1585317118_12274461_905001696249600_5322067956021225530_n.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_order_ID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` decimal(50,2) DEFAULT NULL,
  `ordered` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`user_order_ID`, `user_ID`, `name`, `address`, `phone`, `total_price`, `ordered`, `date`) VALUES
(1, 1, 'Test', 'Test 11000', '+1111111', '34.96', 1, '2020-03-27 13:46:37'),
(2, 1, 'Test', 'Adr 13245', '+1111111', '63.94', 1, '2020-03-27 13:48:00'),
(3, 1, 'Test', 'Test test 11000', '+1111111', '25.97', 1, '2020-03-27 13:49:03'),
(4, 16, 'Mika Zika', 'Testtt', '+1323232', '16.98', 1, '2020-03-27 13:52:24'),
(5, 16, 'Mika Zika', 'Testtt', '+1323232', '5.99', 1, '2020-03-27 13:52:46'),
(6, 16, 'Mika Zika Zzz', 'Test 11000', '+1333666', '17.98', 1, '2020-03-27 13:53:30'),
(7, 2, 'Test', 'test', '+1111111', '17.98', 1, '2020-03-27 13:58:05'),
(8, 3, 'Tester', 'Address', '+1323232', '31.98', 1, '2020-03-27 14:00:18'),
(9, 3, 'Test', 'Test', '+1222454', '4.99', 1, '2020-03-27 14:00:55'),
(10, 5, 'Test', 'Test 25000', '+1323232', '10.99', 1, '2020-03-27 14:01:31'),
(11, 5, 'Test', 'Test', '+1222454', '5.99', 1, '2020-03-27 14:01:47'),
(12, 5, 'Test', 'Nusiceva 5', '+1111111', '12.99', 1, '2020-03-27 14:02:09'),
(13, 6, 'Primer', 'Primer', '+1323232', '16.99', 1, '2020-03-27 14:02:40'),
(14, 6, 'Test', 'TEST', '+1222454', '8.99', 1, '2020-03-27 14:03:03'),
(15, 6, 'Last One', 'Finally', '+1323232', '19.98', 1, '2020-03-27 14:03:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `category_ID` (`category_ID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD UNIQUE KEY `image_ID` (`image_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `product_ID` (`product_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD UNIQUE KEY `role_ID` (`role_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_ID` (`user_ID`),
  ADD KEY `role_ID` (`role_ID`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`user_cart_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `user_order_ID` (`user_order_ID`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`user_image_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `user_cart_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `user_image_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_ID`) REFERENCES `role` (`role_ID`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `user_image`
--
ALTER TABLE `user_image`
  ADD CONSTRAINT `user_image_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
