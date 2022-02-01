-- Adminer 4.8.1 MySQL 5.7.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) COLLATE utf8_bin NOT NULL,
  `goodId` varchar(36) COLLATE utf8_bin NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `timeCreate` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `cart` (`id`, `userId`, `goodId`, `quantity`, `timeCreate`) VALUES
(47,	'81245000-a273-0c97-04e8-f99b5b199795',	'81245312-a273-0c97-04e8-f99b5b199795',	5,	1643650396642),
(49,	'81245000-a273-0c97-04e8-f99b5b199795',	'b53e01e9-baf4-6fe2-09e4-5cd132d59a79',	2,	1643650396642),
(50,	'81245000-a273-0c97-04e8-f99b5b199795',	'7e606fd5-678c-7669-b972-fe3fa3179867',	2,	1643650396642),
(51,	'81245000-a273-0c97-04e8-f99b5b199795',	'7d8b04dd-c403-2c1d-7a22-ff1d671341be',	2,	1643650396642),
(52,	'81245000-a273-0c97-04e8-f99b5b199795',	'81245456-a273-0c97-04e8-f99b5b199795',	1,	1643650396642);

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodId` varchar(36) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `title` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `color` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size` char(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` float unsigned NOT NULL,
  `discount` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `goods` (`id`, `goodId`, `title`, `description`, `image`, `color`, `size`, `price`, `discount`) VALUES
(1,	'81245312-a273-0c97-04e8-f99b5b199795',	'NEW ELLERY X MO CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-1.jpg',	'black',	'XL',	45,	15),
(2,	'81207332-a273-0c57-04e8-f99b5b199795',	'NEW ELLERY X MO CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-2.jpg',	'black',	'XL',	45,	23),
(3,	'81296312-a273-0c97-04e8-f99b5b199795',	'NEW ELLERY X MO CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian<br> arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-3.jpg',	'black',	'XXL',	65,	15),
(5,	'b53e01e9-baf4-6fe2-09e4-5cd132d59a79',	'NEW ELLERY CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian\r\narbiter of cool Kym Ellery teams up with Operandi',	'prod-item-6.jpg',	'red',	'XXX',	75,	15),
(6,	'7e606fd5-678c-7669-b972-fe3fa3179867',	'NEW ELLERY CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-5.jpg',	'black',	'XM',	35,	5),
(7,	'7d8b04dd-c403-2c1d-7a22-ff1d671341be',	'NEW ELLERY MO CAPSULE',	'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-4.jpg',	'green',	'XXXL',	52,	18),
(8,	'7d8b08dd-c403-2c1d-7a22-ff1d671341bc',	'NEW ELLERY MO CAPSULE ZHOPA',	'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Operandi',	'prod-item-3.jpg',	'green',	'XXXL',	45,	10);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) COLLATE utf8_bin DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `passwd` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `role` tinyint(3) unsigned DEFAULT NULL,
  `time_create` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `user_id`, `lastName`, `firstName`, `email`, `sex`, `login`, `passwd`, `role`, `time_create`) VALUES
(1,	'86396712-a243-0c87-04e7-f88b5b199793',	'Ivanov',	'Ivan',	'admin@admin.ru',	'male',	'admin',	'3cf108a4e0a498347a5a75a792f232123cf108a4e0a498347a5a75a792f232122f41e93663bfd5016bd453da04bc100d',	0,	1641233642),
(2,	'4d679301-e8d3-b70b-6f42-5eae03ae12dd',	'Petr',	'Petrov',	'user@user.ru',	'male',	'user',	'ee32c060ac0caa70b04e25091bbc11eeee32c060ac0caa70b04e25091bbc11ee2f41e93663bfd5016bd453da04bc100d',	1,	1641233710),
(6,	'cfd950d4-614c-ac30-21a5-93d8ca6b2b7f',	'Lena',	'Lenina',	'name@user.ru',	'female',	'user1',	'd9f1eeb7e757b522c74cfa25e51e9c42ee32c060ac0caa70b04e25091bbc11ee2f41e93663bfd5016bd453da04bc100d',	1,	1641325585);

-- 2022-02-01 03:34:29
