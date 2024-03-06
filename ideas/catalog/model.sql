# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.31)
# Database: effcore-catalog
# Generation Time: 2021-10-09 17:44:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`)
VALUES
	('notes','Notebooks'),
	('smarts','Smartphones');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_category` varchar(256) NOT NULL,
  `id_model` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `year` text,
  PRIMARY KEY (`id_model`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id_category`, `id_model`, `title`, `year`)
VALUES
	('smarts','A2481','iPhone 13 mini','2021'),
	('smarts','A2482','iPhone 13','2021'),
	('smarts','A2483 ','iPhone 13 Pro','2021'),
	('smarts','A2484','iPhone 13 Pro Max','2021'),
	('smarts','A2626','iPhone 13 mini','2021'),
	('smarts','A2628','iPhone 13 mini','2021'),
	('smarts','A2629','iPhone 13 mini','2021'),
	('smarts','A2630','iPhone 13 mini','2021'),
	('smarts','A2631','iPhone 13','2021'),
	('smarts','A2633','iPhone 13','2021'),
	('smarts','A2634','iPhone 13','2021'),
	('smarts','A2635','iPhone 13','2021'),
	('smarts','A2636','iPhone 13 Pro','2021'),
	('smarts','A2638','iPhone 13 Pro','2021'),
	('smarts','A2639','iPhone 13 Pro','2021'),
	('smarts','A2640','iPhone 13 Pro','2021'),
	('smarts','A2641','iPhone 13 Pro Max','2021'),
	('smarts','A2643','iPhone 13 Pro Max','2021'),
	('smarts','A2644','iPhone 13 Pro Max','2021'),
	('smarts','A2645','iPhone 13 Pro Max','2021'),
	('notes','MacBookPro16,2','MacBook Pro (13-inch, 2020, 4 Thunderbolt v.3 ports)','2020'),
	('notes','MacBookPro16,3','MacBook Pro (13-inch, 2020, 2 Thunderbolt v.3 ports)','2020'),
	('notes','MacBookPro17,1','MacBook Pro (13-inch, M1, 2020)','2020');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
