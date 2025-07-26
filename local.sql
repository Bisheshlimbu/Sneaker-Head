-- AdminNeo 4.17.2 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `local` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `local`;

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `attachments` (`id`, `product_id`, `url`, `created_at`, `updated_at`) VALUES
(60,	34,	'/assets/uploads/1243096-1200-1200.jpg',	'june-01-2025',	'june-01-2025'),
(61,	34,	'/assets/uploads/1246751-1200-1200.jpg',	'june-01-2025',	'june-01-2025'),
(62,	34,	'/assets/uploads/1248183-1200-1200.jpg',	'june-01-2025',	'june-01-2025'),
(63,	34,	'/assets/uploads/Nikejun1.jpg',	'june-01-2025',	'june-01-2025'),
(64,	34,	'/assets/uploads/nikejun2.jpg',	'june-01-2025',	'june-01-2025'),
(69,	36,	'/assets/uploads/AIR+JORDAN+1+LOW+G (1).png',	'june-01-2025',	'june-01-2025'),
(70,	36,	'/assets/uploads/AIR+JORDAN+1+LOW+G (2).png',	'june-01-2025',	'june-01-2025'),
(71,	36,	'/assets/uploads/AIR+JORDAN+1+LOW+G (3).png',	'june-01-2025',	'june-01-2025'),
(72,	36,	'/assets/uploads/AIR+JORDAN+1+LOW+G (4).png',	'june-01-2025',	'june-01-2025'),
(73,	36,	'/assets/uploads/AIR+JORDAN+1+LOW+G (5).png',	'june-01-2025',	'june-01-2025'),
(79,	38,	'/assets/uploads/AIR+JORDAN+1+MID+SE (1).png',	'june-01-2025',	'june-01-2025'),
(80,	38,	'/assets/uploads/AIR+JORDAN+1+MID+SE (2).png',	'june-01-2025',	'june-01-2025'),
(81,	38,	'/assets/uploads/AIR+JORDAN+1+MID+SE (3).png',	'june-01-2025',	'june-01-2025'),
(82,	38,	'/assets/uploads/AIR+JORDAN+1+MID+SE (4).png',	'june-01-2025',	'june-01-2025'),
(83,	38,	'/assets/uploads/AIR+JORDAN+1+MID+SE (5).png',	'june-01-2025',	'june-01-2025'),
(94,	41,	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5 (1).png',	'june-01-2025',	'june-01-2025'),
(95,	41,	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5 (2).png',	'june-01-2025',	'june-01-2025'),
(96,	41,	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5 (3).png',	'june-01-2025',	'june-01-2025'),
(97,	41,	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5 (4).png',	'june-01-2025',	'june-01-2025'),
(98,	41,	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5 (5).png',	'june-01-2025',	'june-01-2025'),
(109,	44,	'/assets/uploads/NIKE+C1TY+PRM (1).png',	'june-01-2025',	'june-01-2025'),
(110,	44,	'/assets/uploads/NIKE+C1TY+PRM (2).png',	'june-01-2025',	'june-01-2025'),
(111,	44,	'/assets/uploads/NIKE+C1TY+PRM (3).png',	'june-01-2025',	'june-01-2025'),
(112,	44,	'/assets/uploads/NIKE+C1TY+PRM (4).png',	'june-01-2025',	'june-01-2025'),
(113,	44,	'/assets/uploads/NIKE+C1TY+PRM (5).png',	'june-01-2025',	'june-01-2025'),
(114,	45,	'/assets/uploads/u740st2_nb_02_i.webp',	'june-01-2025',	'june-01-2025'),
(115,	45,	'/assets/uploads/u740st2_nb_03_i.webp',	'june-01-2025',	'june-01-2025'),
(116,	45,	'/assets/uploads/u740st2_nb_04_i.webp',	'june-01-2025',	'june-01-2025'),
(117,	45,	'/assets/uploads/u740st2_nb_06_i.webp',	'june-01-2025',	'june-01-2025'),
(118,	45,	'/assets/uploads/u740st2_nb_07_i.webp',	'june-01-2025',	'june-01-2025'),
(119,	46,	'/assets/uploads/bbklslv4_nb_02_i.webp',	'june-01-2025',	'june-01-2025'),
(120,	46,	'/assets/uploads/bbklslv4_nb_04_i.webp',	'june-01-2025',	'june-01-2025'),
(121,	46,	'/assets/uploads/bbklslv4_nb_05_i.webp',	'june-01-2025',	'june-01-2025'),
(122,	46,	'/assets/uploads/bbklslv4_nb_06_i.webp',	'june-01-2025',	'june-01-2025'),
(123,	46,	'/assets/uploads/bbklslv4_nb_07_i.webp',	'june-01-2025',	'june-01-2025'),
(124,	47,	'/assets/uploads/u991lg2_nb_05_i.webp',	'june-01-2025',	'june-01-2025'),
(125,	47,	'/assets/uploads/u991lg2_nb_06_i.webp',	'june-01-2025',	'june-01-2025'),
(126,	47,	'/assets/uploads/u991lg2_nb_02_i - Copy.webp',	'june-01-2025',	'june-01-2025'),
(127,	47,	'/assets/uploads/u991lg2_nb_04_i - Copy.webp',	'june-01-2025',	'june-01-2025'),
(128,	47,	'/assets/uploads/u991lg2_nb_07_i - Copy.webp',	'june-01-2025',	'june-01-2025'),
(129,	48,	'/assets/uploads/NIKE+FIELD+GENERAL (1).png',	'june-01-2025',	'june-01-2025'),
(130,	48,	'/assets/uploads/NIKE+FIELD+GENERAL (2).png',	'june-01-2025',	'june-01-2025'),
(131,	48,	'/assets/uploads/NIKE+FIELD+GENERAL (3).png',	'june-01-2025',	'june-01-2025'),
(132,	48,	'/assets/uploads/NIKE+FIELD+GENERAL (4).png',	'june-01-2025',	'june-01-2025'),
(133,	48,	'/assets/uploads/NIKE+FIELD+GENERAL (5).png',	'june-01-2025',	'june-01-2025'),
(134,	49,	'/assets/uploads/u991lg2_nb_02_i.webp',	'june-01-2025',	'june-01-2025'),
(135,	49,	'/assets/uploads/u991lg2_nb_04_i - Copy.webp',	'june-01-2025',	'june-01-2025'),
(136,	49,	'/assets/uploads/u991lg2_nb_05_i.webp',	'june-01-2025',	'june-01-2025'),
(137,	49,	'/assets/uploads/u991lg2_nb_06_i.webp',	'june-01-2025',	'june-01-2025'),
(138,	49,	'/assets/uploads/u991lg2_nb_07_i - Copy.webp',	'june-01-2025',	'june-01-2025'),
(154,	53,	'/assets/uploads/u740cr2_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(155,	53,	'/assets/uploads/u740cr2_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(156,	53,	'/assets/uploads/u740cr2_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(157,	53,	'/assets/uploads/u740cr2_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(158,	53,	'/assets/uploads/u740cr2_nb_07_i.webp',	'june-07-2025',	'june-07-2025'),
(159,	54,	'/assets/uploads/m2002rbl_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(160,	54,	'/assets/uploads/m2002rbl_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(161,	54,	'/assets/uploads/m2002rbl_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(162,	54,	'/assets/uploads/m2002rbl_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(163,	54,	'/assets/uploads/m2002rbl_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(164,	55,	'/assets/uploads/mr530sg_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(165,	55,	'/assets/uploads/mr530sg_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(166,	55,	'/assets/uploads/mr530sg_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(167,	55,	'/assets/uploads/mr530sg_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(168,	55,	'/assets/uploads/mr530sg_nb_15_i.webp',	'june-07-2025',	'june-07-2025'),
(169,	56,	'/assets/uploads/u740cr2_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(170,	56,	'/assets/uploads/u740cr2_nb_07_i.webp',	'june-07-2025',	'june-07-2025'),
(171,	56,	'/assets/uploads/u740cr2_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(172,	56,	'/assets/uploads/u740cr2_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(173,	56,	'/assets/uploads/u740cr2_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(174,	57,	'/assets/uploads/mfcxla5_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(175,	57,	'/assets/uploads/mfcxla5_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(176,	57,	'/assets/uploads/mfcxla5_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(177,	57,	'/assets/uploads/mfcxla5_nb_07_i.webp',	'june-07-2025',	'june-07-2025'),
(178,	57,	'/assets/uploads/mfcxla5_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(179,	58,	'/assets/uploads/mfcxla5_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(180,	58,	'/assets/uploads/mfcxla5_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(181,	58,	'/assets/uploads/mfcxla5_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(182,	58,	'/assets/uploads/mfcxla5_nb_07_i.webp',	'june-07-2025',	'june-07-2025'),
(183,	58,	'/assets/uploads/mfcxla5_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(184,	59,	'/assets/uploads/mrcelcw4_nb_02_i.webp',	'june-07-2025',	'june-07-2025'),
(185,	59,	'/assets/uploads/mrcelcw4_nb_04_i.webp',	'june-07-2025',	'june-07-2025'),
(186,	59,	'/assets/uploads/mrcelcw4_nb_05_i.webp',	'june-07-2025',	'june-07-2025'),
(187,	59,	'/assets/uploads/mrcelcw4_nb_06_i.webp',	'june-07-2025',	'june-07-2025'),
(188,	59,	'/assets/uploads/mrcelcw4_nb_07_i.webp',	'june-07-2025',	'june-07-2025'),
(189,	60,	'/assets/uploads/m2002rbl_nb_02_i.webp',	'june-08-2025',	'june-08-2025'),
(190,	60,	'/assets/uploads/m2002rbl_nb_03_i.webp',	'june-08-2025',	'june-08-2025'),
(191,	60,	'/assets/uploads/m2002rbl_nb_04_i.webp',	'june-08-2025',	'june-08-2025'),
(192,	60,	'/assets/uploads/m2002rbl_nb_05_i.webp',	'june-08-2025',	'june-08-2025'),
(193,	60,	'/assets/uploads/m2002rbl_nb_06_i.webp',	'june-08-2025',	'june-08-2025'),
(194,	61,	'/assets/uploads/m1906ree_nb_02_i.webp',	'june-15-2025',	'june-15-2025'),
(195,	61,	'/assets/uploads/m1906ree_nb_03_i.webp',	'june-15-2025',	'june-15-2025'),
(196,	61,	'/assets/uploads/m1906ree_nb_04_i.webp',	'june-15-2025',	'june-15-2025'),
(197,	61,	'/assets/uploads/m1906ree_nb_05_i.webp',	'june-15-2025',	'june-15-2025'),
(198,	61,	'/assets/uploads/m1906ree_nb_06_i.webp',	'june-15-2025',	'june-15-2025');

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `highlights`;
CREATE TABLE `highlights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `highlights` (`id`, `title`, `image`, `status`, `created_at`) VALUES
(6,	'jj',	'/assets/uploads/m1906ree_nb_02_i.webp',	1,	'2025-06-19 18:45:43'),
(7,	'New Arrivals',	'/assets/uploads/mr530sg_nb_15_i.webp',	1,	'2025-06-19 18:48:50'),
(8,	'Favourites',	'/assets/uploads/download (3).jpg',	1,	'2025-06-19 18:49:54');

DROP TABLE IF EXISTS `product_meta`;
CREATE TABLE `product_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_meta` (`id`, `user_id`, `product_id`, `like`) VALUES
(47,	10,	34,	1),
(48,	10,	41,	0),
(49,	8,	36,	1),
(50,	1,	38,	1);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `brand` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `title`, `price`, `category`, `brand`, `type`, `size`, `description`, `product_image`, `created_at`, `updated_at`) VALUES
(34,	'Nike Juniper Trail 3',	4600,	'women',	'new-balance',	'casuals',	'[30,34,36,38]',	'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',	'/assets/uploads/Nikejun1.jpg',	'june-01-2025',	'june-19-2025'),
(36,	'Air Jordan 1 Low G',	3500,	'men',	'jordan',	'casuals',	'[30,32,33,34,36]',	'Feel unbeatable, from the tee box to the final putt. Inspired by one of the most iconic sneakers of all time, the Air Jordan 1 G is an instant classic on the course.',	'/assets/uploads/AIR+JORDAN+1+LOW+G.png',	'june-01-2025',	'june-04-2025'),
(38,	'Air Jordan 1 Mid SE',	1500,	'men',	'jordan',	'casuals',	'[32,34,36,40]',	'Summer vibes are alive and well in this special pair of AJ1s. Genuine leather gives them a premium look ',	'/assets/uploads/AIR+JORDAN+1+MID+SE.png',	'june-01-2025',	'june-05-2025'),
(41,	'Nike Pegasus Trail 5',	1500,	'women',	'nike',	'running',	'[30,36,34,40]',	'Spread your wings and see what nature brings as you chase earthy paths in the Peg Trail 5. Now equipped with an ultra-responsive ReactX foam midsole',	'/assets/uploads/W+NIKE+REACTX+PEGASUS+TRAIL+5.png',	'june-01-2025',	'june-05-2025'),
(44,	'Nike C1TY Premium CORDURA®',	115,	'men',	'nike',	'casuals',	'[42,43,44,45]',	'Nike C1TY is engineered to overcome anything the city throws your way. A CORDURA® upper keeps the fit breathable',	'/assets/uploads/NIKE+C1TY+PRM.png',	'june-01-2025',	'june-01-2025'),
(45,	'New Balance740',	139,	'men',	'new-balance',	'casuals',	'[36,40,41,42,44]',	'The original 740 was the kind of daily runner that would be worn into the ground with heavy miles and bought all over again.',	'/assets/uploads/u740st2_nb_03_i.webp',	'june-01-2025',	'june-01-2025'),
(46,	'KAWHI IV',	209,	'men',	'new-balance',	'basketball',	'[42,43,44,45]',	'The KAWHI IV captures the unmistakable skill and style of Kawhi Leonard, with a design that’s built for explosive performance, with a modern edge. ',	'/assets/uploads/bbklslv4_nb_03_i.webp',	'june-01-2025',	'june-01-2025'),
(47,	'Made in UK 991v2',	324,	'men',	'new-balance',	'casuals',	'[36,34,40,41,42,44]',	'Since its original release in 2001, the 991 has been synonymous with superlative quality. As the first 99X model of the 21st century, the original 991 set the standard for modern running design. ',	'/assets/uploads/u991lg2_nb_03_i.webp',	'june-01-2025',	'june-01-2025'),
(48,	'Nike Field General \"Blue Suede\"',	105,	'men',	'nike',	'casuals',	'[30,36,34,40,41,42]',	'The Field General returns from its gritty football roots to shake up the sneaker scene. Drenched in blue suede',	'/assets/uploads/NIKE+FIELD+GENERAL.png',	'june-01-2025',	'june-01-2025'),
(49,	'New Balance740',	135,	'women',	'new-balance',	'running',	'[36,34,39,40,41,42,43]',	'If we only made one running shoe, it would be the Fresh Foam X 1080. The unique combination of reliable comfort and high performance offers versatility that spans from every day to race day.',	'/assets/uploads/u991lg2_nb_03_i.webp',	'june-01-2025',	'june-01-2025'),
(53,	'New Balance 740',	12000,	'men',	'new-balance',	'casuals',	'[30,36,38,44,43]',	'The original 740 was the kind of daily runner that would be worn into the ground with heavy miles and bought all over again. This longtime fan favorite returns from the archives,',	'/assets/uploads/u740cr2_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(54,	'NewBalance 2002R',	13000,	'men',	'new-balance',	'casuals',	'[37,36,34,40,41,42,44]',	'A modern twist on 2000s running designs, the 2002R men\'s sneaker will elevate your everyday style. This throwback silhouette is crafted with premium suede and mesh material for a look that sets you apart.',	'/assets/uploads/m2002rbl_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(55,	'NewBalance 530',	5300,	'men',	'new-balance',	'casuals',	'[30,36,34,40,41,42,44]',	'The original MR530 combined turn of the millennium aesthetics with the reliability of a high milage running shoe. The reintroduced 530 applies a contemporary, everyday style ',	'/assets/uploads/mr530sg_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(56,	'NewBalance 1906R',	19000,	'men',	'new-balance',	'casuals',	'[30,36,34,40,41,42,44]',	'The 1906R, like its cousins the 2002R and the 860v2, is led by a sole unit featuring a combination of flexible ACTEVA LITE cushioning, shock absorbing N-ergy, and segmented ABZORB SBS pods at the heel',	'/assets/uploads/u740cr2_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(57,	'FuelCell Rebel v5',	8000,	'men',	'new-balance',	'running',	'[30,36,34,40,41,42,44]',	'The FuelCell Rebel v5 was built to look and feel fast. With its streamlined, race-inspired mesh upper and colorblocking designs, the resulting silhouette boasts a modern style that inspires, surprises,',	'/assets/uploads/mfcxla5_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(58,	'FuelCell Rebel v5',	8000,	'men',	'new-balance',	'running',	'[30,36,34,40,41,42,44]',	'The FuelCell Rebel v5 was built to look and feel fast. With its streamlined, race-inspired mesh upper and colorblocking designs, the resulting silhouette boasts a modern style that inspires, surprises,',	'/assets/uploads/mfcxla5_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(59,	'Fresh Foam X Hierro v9',	7500,	'men',	'new-balance',	'running',	'[30,36,34,40,41,42,44]',	'The Fresh Foam X Hierro v9 offers ultimate reliability for adventurous terrain, with technical features designed specifically for the trail runner. ',	'/assets/uploads/mrcelcw4_nb_03_i.webp',	'june-07-2025',	'june-07-2025'),
(60,	'Adidsas',	5000,	'men',	'adidas',	'running',	'[36]',	'comfort and style is beyond',	'/assets/uploads/m2002rbl_nb_03_i.webp',	'june-08-2025',	'june-15-2025'),
(61,	'New',	4900,	'men',	'nike',	'casuals',	'[37,38,39,40]',	'des',	'/assets/uploads/mfcxla5_nb_03_i.webp',	'june-15-2025',	'june-15-2025');

DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(25,	8,	'_brand_preferences',	''),
(26,	8,	'_category_preferences',	''),
(27,	8,	'_type_preferences',	''),
(28,	10,	'_brand_preferences',	'a:3:{i:0;s:6:\"ascics\";i:1;s:10:\"newbalance\";i:2;s:6:\"jordan\";}'),
(29,	10,	'_category_preferences',	''),
(30,	10,	'_type_preferences',	'a:1:{i:0;s:10:\"basketball\";}');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'customer',
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `email`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1,	'Bishesh',	'Limbu',	'2025-05-24',	'bca22061024_bishesh@achsnepal.edu.np',	'bishesh55',	'test',	'admin',	'may-04-2025',	'may-04-2025'),
(7,	'Gokran',	'chaudary',	'2025-05-29',	'gokarnachy28@gmail.com',	'gok',	'gokarnabis',	'customer',	'may-04-2025',	'may-04-2025'),
(8,	'Rohan',	'Limbu',	'2025-05-23',	'bisheshlimbu50@gmail.com',	'Rohan',	'rohan',	'customer',	'may-09-2025',	'may-09-2025'),
(9,	'Snadesh ',	'Ghartu',	'2002-12-02',	'sandeshgharti@gmail.com',	'sondesh',	'sandesh',	'customer',	'june-07-2025',	'june-07-2025'),
(10,	'xyz',	'xyz',	'2025-07-03',	'xyz@gmail.com',	'xtzzzz',	'xyz',	'customer',	'june-08-2025',	'june-08-2025');

-- 2025-07-26 15:00:38 UTC
