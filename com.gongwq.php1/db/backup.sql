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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'主板类','电梯主板，电梯主板，电梯主板'),(2,'按钮类','外招按钮，外招按钮，外招按钮');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `brand_id` int(10) unsigned NOT NULL DEFAULT '0',
  `click_count` int(11) NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'000001','不锈钢按钮',3,'按钮按钮',1,0,0,0),(2,'000002','控制主板',1990,'三菱主板',2,0,0,0),(3,'000003','压克力按钮',3,'按钮按钮',1,0,0,0),(4,'','苹果',1,'ffff',2,0,0,0),(5,'','鸭梨',2,'ffff',1,0,0,0),(6,'','鼠标',3,'ffff',2,0,0,0),(7,'','键盘',234,'ffff',1,0,0,0),(8,'','水杯',56,'ffff',2,0,0,0),(9,'','卫生纸',78,'ffff',1,0,0,0),(10,'','激光测距仪',1223,'ffff',2,0,0,0),(11,'','油笔',1,'ffff',1,0,0,0),(12,'','笔记本',0,'ffff',2,0,0,0),(13,'','',0,'ffff',1,0,0,0),(14,'','苹果',1,'ffff',2,0,0,0),(15,'','鸭梨',2,'ffff',1,0,0,0),(16,'','鼠标',3,'ffff',2,0,0,0),(17,'','键盘',234,'ffff',1,0,0,0),(18,'','水杯',56,'ffff',2,0,0,0),(19,'','卫生纸',78,'ffff',1,0,0,0),(20,'','激光测距仪',1223,'ffff',2,0,0,0),(21,'','油笔',1,'ffff',1,0,0,0),(22,'','笔记本',0,'ffff',2,0,0,0),(23,'','',0,'ffff',1,0,0,0),(24,'000003','苹果',1,'ffff',2,0,0,0),(25,'','鼠标',3,'ffff',2,0,0,0),(26,'','键盘',234,'ffff',1,0,0,0),(27,'','水杯',56,'ffff',2,0,0,0),(28,'','卫生纸',78,'ffff',1,0,0,0),(29,'','激光测距仪',1223,'ffff',2,0,0,0),(30,'','油笔',1,'ffff',1,0,0,0),(31,'','笔记本',0,'ffff',2,0,0,0),(32,'','你没',12,'ffff',1,0,0,0),(33,'','haohao',190,'ffff',2,0,0,0),(34,'000003','苹果',1,'ffff',2,0,0,0),(35,'000005','鼠标',3,'ffff',2,0,0,0),(36,'000006','键盘',234,'ffff',1,0,0,0),(37,'000007','水杯',56,'ffff',2,0,0,0),(38,'000008','卫生纸',78,'ffff',1,0,0,0),(39,'000009','激光测距仪',1223,'ffff',2,0,0,0),(40,'000010','油笔',1,'ffff',1,0,0,0),(41,'000011','笔记本',0,'ffff',2,0,0,0),(42,'000012','你没',12,'ffff',1,0,0,0),(43,'','haohao',190,'ffff',2,0,0,0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-26 18:13:20