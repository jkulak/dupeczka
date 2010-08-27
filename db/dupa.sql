/*
SQLyog Enterprise - MySQL GUI v7.12 
MySQL - 5.1.35-community : Database - omnicom7
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`omnicom7` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `omnicom7`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `lead` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
  `content` varchar(10000) COLLATE utf8_polish_ci DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `activate_date` datetime DEFAULT NULL,
  `deactivate_date` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Table structure for table `articles_categories` */

DROP TABLE IF EXISTS `articles_categories`;

CREATE TABLE `articles_categories` (
  `cat_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  KEY `fk_CATEGORIES_has_ARTICLES_CATEGORIES` (`cat_id`),
  KEY `fk_CATEGORIES_has_ARTICLES_ARTICLES` (`art_id`),
  CONSTRAINT `fk_CATEGORIES_has_ARTICLES_ARTICLES` FOREIGN KEY (`ARTICLES_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CATEGORIES_has_ARTICLES_CATEGORIES` FOREIGN KEY (`CATEGORIES_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
