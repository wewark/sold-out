-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: soldout
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (18,'Books & Audible'),(19,'Movies, Music & Games'),(20,'Electronics & Computers'),(21,'Home, Garden & Tools'),(22,'Beauty, Health & Grocery'),(23,'Toys, Kids & Baby'),(24,'Clothing, Shoes & Jewelry'),(25,'Handmade'),(26,'Sports & Outdoors'),(27,'Automotive & Industrial'),(28,'Other');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `fromto` int(10) DEFAULT NULL,
  `item_id` int(10) DEFAULT NULL,
  `price` decimal(65,4) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total` decimal(65,4) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (33,9,'Purchase','Science',20,23,45.4500,6,272.7000,'2016-10-13 16:19:13'),(34,20,'Sale','Science',9,23,45.4500,6,272.7000,'2016-10-13 16:19:13'),(35,9,'Purchase','Some guys',20,22,0.0100,2,0.0200,'2016-10-13 16:19:20'),(36,20,'Sale','Some guys',9,22,0.0100,2,0.0200,'2016-10-13 16:19:20'),(37,9,'Deposite',NULL,NULL,NULL,NULL,NULL,1234.0000,'2016-10-13 16:31:15'),(38,21,'Deposite',NULL,NULL,NULL,NULL,NULL,1000000.0000,'2016-10-15 15:51:49'),(39,21,'Purchase','BMW X6',9,24,250000.0000,1,250000.0000,'2016-10-15 15:51:54'),(40,9,'Sale','BMW X6',21,24,250000.0000,1,250000.0000,'2016-10-15 15:51:54'),(41,21,'Purchase','Science',20,23,45.4500,5,227.2500,'2016-10-15 15:52:04'),(42,20,'Sale','Science',21,23,45.4500,5,227.2500,'2016-10-15 15:52:04'),(43,21,'Deposite',NULL,NULL,NULL,NULL,NULL,1000000.0000,'2016-10-15 16:25:43'),(44,21,'Purchase','BMW X6',9,24,250000.0000,3,750000.0000,'2016-10-15 16:25:49'),(45,9,'Sale','BMW X6',21,24,250000.0000,3,750000.0000,'2016-10-15 16:25:49'),(46,9,'Purchase','Science',20,23,45.4500,12,545.4000,'2016-10-15 16:31:31'),(47,20,'Sale','Science',9,23,45.4500,12,545.4000,'2016-10-15 16:31:31');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(65,4) unsigned NOT NULL,
  `category` int(10) unsigned NOT NULL,
  `description` mediumtext,
  `quantity` int(10) unsigned NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (21,20,'A dude',69.6900,0,'A dude that does absolutely nothing.',2,'0000-00-00 00:00:00'),(22,20,'Some guys',0.0100,0,'Some worthless guys.\r\nTotally worthless. Just trying to make a bigger description.',1,'0000-00-00 00:00:00'),(25,21,'BMW X6',250000.0000,27,'FEARLESS DESIGN. UNBRIDLED CHARACTER. By the time imitators come along, the X6 is long gone. With its aggressively tuned TwinPower Turbo engines, an exterior that expresses its power, and a beautifully unique cabin, this Sports Activity Coupe® manages to steal every single scene.',5,'2016-10-15 16:26:23'),(26,9,'Glasses',18.0000,28,'Brown sunglasses to protect your eyes from the sun.',16,'2016-10-15 16:38:44');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shares`
--

DROP TABLE IF EXISTS `shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `shares` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shares`
--

LOCK TABLES `shares` WRITE;
/*!40000 ALTER TABLE `shares` DISABLE KEYS */;
INSERT INTO `shares` VALUES (12,9,'FREE',100),(15,9,'GOOG',12),(16,9,'AAPL',10),(17,15,'GOOG',10),(18,15,'JACK',11);
/*!40000 ALTER TABLE `shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','Andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','Ceasar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','Eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','Hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(6,'john','John','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','Levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','Rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','President Skroob','$2y$10$O86aQ9DWBON3V.ZIcUE3Eu8gJzd1cb1kTCAE.3XQTiEmpZRNPg3y2',1008110.6100),(10,'zamyla','Zamyla Chan','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(14,'asd','Asd','$2y$10$daM9Orn9TieLBTY8ZeWw..bNnBLEPxjENfhaogRWrrzbGreAjevle',20004.0000),(15,'kha','Khaled Hamed','$2y$10$rxnRepMXNNvCrBXau4r9/.CWCaATuIYW2eVCphCOwKHExpCb669kq',1300.8900),(16,'test','Test','$2y$10$K1eI8QTKeUiUG62uLYJj5eg8/Fv.FT.KUYLD2ACvTsgxKpUXNThJC',10000.0000),(17,'ss','ss','$2y$10$T98xin9hHjTFH948eglqtObV36RGO5eatDHBJ4FqVJP1TmE1MSi/2',0.0000),(18,'rrr','rrr','$2y$10$1fpIW7TLYAqGrQC4mMr8DuUNynb01q/YVD1Z07lrr22j5qkhY6d/S',0.0000),(20,'khaa','Khaled Hamed','$2y$10$Gm7Sy3dm97OKtB1rZjeoDOkhMAZz3DB1sJxUk6mW58SS0P0EmWau6',21018.7200),(21,'richguy','Rich Guy','$2y$10$ViMVhixtimGLWQYSpa6cjOBKrAYcobMlP9SQKCO80ubDb0f3rFKya',999772.7500);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-15 16:41:35
