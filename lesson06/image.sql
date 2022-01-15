-- Adminer 4.8.1 MySQL 5.7.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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
(1,	'Lorem',	1000,	'pics01.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.'),
(2,	'Lorem dolor',	1500,	'pics02.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.'),
(3,	'Lorem ipsum 12',	2500,	'pics03.jpg',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, quidem?',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nam omnis perspiciatis suscipit voluptatum. Consequuntur distinctio fuga illum in ipsum, maiores modi necessitatibus pariatur placeat quam quibusdam, repudiandae veritatis voluptatum.');

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
(6,	'Юзер.',	'Добавил еще один отзыв.',	1640649984);

-- 2021-12-28 22:40:45
