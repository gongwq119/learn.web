-- MySQL dump 10.13  Distrib 5.5.8, for Linux (i686)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.8

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `action_list` text NOT NULL,
  `nav_list` text NOT NULL,
  `lang_type` varchar(50) NOT NULL DEFAULT '',
  `agency_id` smallint(5) unsigned NOT NULL,
  `suppliers_id` smallint(5) unsigned DEFAULT '0',
  `todolist` longtext,
  `role_id` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'admin','','bed128365216c019988915ed3add75fb',0,0,'','','','',0,0,NULL,NULL);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) NOT NULL,
  `brand_logo_url` varchar(80) NOT NULL,
  `brand_desc` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'三菱','','<p>没有</p>\r\n'),(2,'迅达','','<p>没有</p>\r\n'),(3,'奥的斯','','<p>没有</p>\r\n'),(4,'永大','','<p><strong>上海永大</strong></p>\r\n'),(32,'通力','',''),(31,'森赫','',''),(30,'讯达','',''),(29,'日立','','');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(90) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `cat_desc` varchar(255) NOT NULL DEFAULT '',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (58,'滑块系列','滑块','',0,0,1),(56,'轮系列','曳引轮 门轮','',0,0,1),(57,'按钮系列','','',0,0,1),(55,'开关系列','开关','',0,0,1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `it_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `it_sn` varchar(45) NOT NULL,
  `it_name` varchar(45) NOT NULL,
  `it_price` decimal(10,0) NOT NULL DEFAULT '0',
  `it_desc` text NOT NULL,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `brand_id` int(10) unsigned NOT NULL DEFAULT '0',
  `click_count` int(11) NOT NULL DEFAULT '0',
  `it_quant` int(10) NOT NULL DEFAULT '0',
  `img_id` mediumint(8) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_on_sale` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`it_id`),
  UNIQUE KEY `id_UNIQUE` (`it_id`,`it_name`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_images`
--

DROP TABLE IF EXISTS `items_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_images` (
  `img_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `it_id` mediumint(8) unsigned NOT NULL,
  `stand_url` varchar(255) NOT NULL DEFAULT '',
  `thumb_url` varchar(255) NOT NULL DEFAULT '',
  `large_url` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_images`
--

LOCK TABLES `items_images` WRITE;
/*!40000 ALTER TABLE `items_images` DISABLE KEYS */;
INSERT INTO `items_images` VALUES (60,80,'/upload/201307/stand/1374467683800549716.jpg','/upload/201307/thumb/1374467683285674089.jpg','/upload/201307/large/1374467683232423320.jpg'),(59,80,'/upload/201307/stand/1374467667507070614.jpg','/upload/201307/thumb/1374467667329674125.jpg','/upload/201307/large/1374467668133814030.jpg'),(61,82,'/upload/201308/stand/1377148938621220246.jpg','/upload/201308/thumb/1377148938976117910.jpg','/upload/201308/large/1377148938899810325.jpg'),(62,2,'/upload/201308/stand/1377151252899018795.jpg','/upload/201308/thumb/1377151252653575490.jpg','/upload/201308/large/1377151252711218018.jpg'),(63,2,'/upload/201308/stand/1377151252872261033.jpg','/upload/201308/thumb/1377151252991654860.jpg','/upload/201308/large/1377151252805646964.jpg');
/*!40000 ALTER TABLE `items_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navis`
--

DROP TABLE IF EXISTS `navis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navis` (
  `navi_id` int(11) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`navi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navis`
--

LOCK TABLES `navis` WRITE;
/*!40000 ALTER TABLE `navis` DISABLE KEYS */;
/*!40000 ALTER TABLE `navis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-05 17:02:24
