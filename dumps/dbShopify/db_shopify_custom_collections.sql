-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: db_shopify
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `custom_collections`
--

DROP TABLE IF EXISTS `custom_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_collections` (
  `id_num` int(11) NOT NULL AUTO_INCREMENT,
  `body_html` text,
  `handle` text,
  `images` text,
  `id_custom_collection` bigint(12) NOT NULL,
  `metafield` varchar(255) DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `published_scope` enum('global') DEFAULT NULL,
  `sort_order` enum('alpha-asc','alpha-desc','best-selling','created','created-desc','manual','price-asc','price-desc') DEFAULT NULL,
  `template_suffix` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_num`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_collections`
--

LOCK TABLES `custom_collections` WRITE;
/*!40000 ALTER TABLE `custom_collections` DISABLE KEYS */;
INSERT INTO `custom_collections` VALUES (6,NULL,NULL,NULL,41059876915,NULL,NULL,NULL,NULL,NULL,NULL,'Home page',NULL),(7,NULL,NULL,NULL,42277273651,NULL,NULL,NULL,NULL,NULL,NULL,'New collection',NULL),(8,NULL,NULL,NULL,41073410099,NULL,NULL,NULL,NULL,NULL,NULL,'Мужская обувь',NULL),(9,NULL,NULL,NULL,41074425907,NULL,NULL,NULL,NULL,NULL,NULL,'Обувь для женщин',NULL),(10,NULL,NULL,NULL,41074982963,NULL,NULL,NULL,NULL,NULL,NULL,'Сумки',NULL);
/*!40000 ALTER TABLE `custom_collections` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-09 14:49:50
