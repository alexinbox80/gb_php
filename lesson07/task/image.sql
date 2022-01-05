-- admin/admin
-- user/user
-- user1/user
-- Adminer 4.8.1 MySQL 5.7.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) COLLATE utf8_bin DEFAULT NULL,
  `good_id` int(10) unsigned DEFAULT NULL,
  `count` int(10) unsigned DEFAULT NULL,
  `time_add` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `cart` (`id`, `user_id`, `good_id`, `count`, `time_add`) VALUES
(27,	'4d679301-e8d3-b70b-6f42-5eae03ae12dd',	1,	1,	1641374531),
(29,	'4d679301-e8d3-b70b-6f42-5eae03ae12dd',	3,	1,	1641374534),
(30,	'cfd950d4-614c-ac30-21a5-93d8ca6b2b7f',	1,	1,	1641374566),
(32,	'cfd950d4-614c-ac30-21a5-93d8ca6b2b7f',	3,	3,	1641374588),
(41,	'86396712-a243-0c87-04e7-f88b5b199793',	1,	1,	1641376300),
(43,	'86396712-a243-0c87-04e7-f88b5b199793',	3,	1,	1641376304),
(46,	'86396712-a243-0c87-04e7-f88b5b199793',	2,	1,	1641377434);

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` float unsigned NOT NULL,
  `img` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `short_info` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `full_info` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `goods` (`id`, `title`, `price`, `img`, `short_info`, `full_info`) VALUES
(1,	'Lorem qwerty',	1200,	'pics01.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.'),
(2,	'Lorem dolor',	1500,	'pics02.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.'),
(3,	' Lorem ipsum dolor sit',	1700,	'pics03.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.');

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `size` int(10) unsigned DEFAULT NULL,
  `count` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `images` (`id`, `photo`, `size`, `count`) VALUES
(1,	'pics01.jpg',	165888,	11),
(2,	'pics02.jpg',	235520,	13),
(3,	'pics03.jpg',	158720,	4),
(4,	'pics04.jpg',	195375,	9),
(5,	'pics05.jpg',	127451,	7),
(6,	'pics06.jpg',	222455,	4);

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` char(128) COLLATE utf8_bin DEFAULT NULL,
  `review` text COLLATE utf8_bin,
  `date` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `reviews` (`id`, `author`, `review`, `date`) VALUES
(3,	'Иван',	'Отзыв о сайте.',	1640635267),
(4,	'Петр',	'Отзыв о новом сайте.',	1640636677),
(5,	'Николай.',	'Добавил новый отзыв на сайт.',	1640639045),
(6,	'Юзер.',	'Добавил еще один отзыв.',	1640649984),
(7,	'test',	'test',	1640742348);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `passwd` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `role` tinyint(3) unsigned DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `time_create` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `user_id`, `name`, `login`, `passwd`, `role`, `email`, `time_create`) VALUES
(1,	'86396712-a243-0c87-04e7-f88b5b199793',	'admin',	'admin',	'3cf108a4e0a498347a5a75a792f232123cf108a4e0a498347a5a75a792f232122f41e93663bfd5016bd453da04bc100d',	0,	'admin@admin.ru',	1641233642),
(2,	'4d679301-e8d3-b70b-6f42-5eae03ae12dd',	'user',	'user',	'ee32c060ac0caa70b04e25091bbc11eeee32c060ac0caa70b04e25091bbc11ee2f41e93663bfd5016bd453da04bc100d',	1,	'user@user.ru',	1641233710),
(6,	'cfd950d4-614c-ac30-21a5-93d8ca6b2b7f',	'name',	'user1',	'd9f1eeb7e757b522c74cfa25e51e9c42ee32c060ac0caa70b04e25091bbc11ee2f41e93663bfd5016bd453da04bc100d',	1,	'name@user.ru',	1641325585);

-- 2022-01-05 10:36:02
