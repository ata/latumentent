-- MySQL dump 10.13  Distrib 5.1.57, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: billing
-- ------------------------------------------------------
-- Server version	5.1.57-1~dotdeb.1

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
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartment`
--

LOCK TABLES `apartment` WRITE;
/*!40000 ALTER TABLE `apartment` DISABLE KEYS */;
INSERT INTO `apartment` VALUES (1,'001','Tipe Anggrek'),(2,'002','Tipe Anggrek'),(3,'003','Tipe Anggrek'),(4,'004','Tipe Anggrek'),(5,'005','Tipe Anggrek'),(6,'006','Tipe Anggrek'),(7,'007','Tipe Anggrek'),(8,'008','Tipe Anggrek'),(9,'009','Tipe Anggrek'),(10,'010','Tipe Anggrek'),(11,'011','Tipe Melati'),(12,'012','Tipe Melati'),(13,'013','Tipe Melati'),(14,'014','Tipe Melati'),(15,'015','Tipe Melati'),(16,'016','Tipe Melati'),(17,'017','Tipe Melati'),(18,'018','Tipe Melati'),(19,'019','Tipe Melati'),(20,'020','Tipe Melati'),(21,'021','Tipe Mawar'),(22,'022','Tipe Mawar'),(23,'023','Tipe Mawar'),(24,'024','Tipe Mawar'),(25,'025','Tipe Mawar'),(26,'026','Tipe Mawar'),(27,'027','Tipe Mawar'),(28,'028','Tipe Mawar'),(29,'029','Tipe Mawar'),(30,'030','Tipe Mawar'),(31,'031','Tipe Dahlia'),(32,'032','Tipe Dahlia'),(33,'033','Tipe Dahlia'),(34,'034','Tipe Dahlia'),(35,'035','Tipe Dahlia');
/*!40000 ALTER TABLE `apartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compensation_schema`
--

DROP TABLE IF EXISTS `compensation_schema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compensation_schema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uptime` int(11) NOT NULL,
  `downtime` int(11) NOT NULL,
  `percentdown` int(11) NOT NULL,
  `percentup` int(11) NOT NULL,
  `compensation` double NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compensation_schema`
--

LOCK TABLES `compensation_schema` WRITE;
/*!40000 ALTER TABLE `compensation_schema` DISABLE KEYS */;
/*!40000 ALTER TABLE `compensation_schema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cost`
--

DROP TABLE IF EXISTS `cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text,
  `status` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_handle_id` int(11) DEFAULT NULL,
  `paying_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cost`
--

LOCK TABLES `cost` WRITE;
/*!40000 ALTER TABLE `cost` DISABLE KEYS */;
INSERT INTO `cost` VALUES (1,2000000,1,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(2,1500000,1,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(3,2000000,1,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(4,1500000,1,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(5,2000000,2,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(6,1500000,2,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(7,2000000,3,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(8,1500000,3,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(9,2000000,4,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(10,1500000,4,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(11,2000000,5,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(12,1500000,5,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(13,2,4,5,11,4,NULL,0,'kabel',NULL,NULL),(14,2000000,4,3,24,17,NULL,0,'pemancar TV',NULL,NULL),(15,2000000,6,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(16,1500000,6,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL),(17,2000000,7,1,NULL,NULL,NULL,0,'Biaya Internet',NULL,NULL),(18,1500000,7,2,NULL,NULL,NULL,0,'Biaya TV Digital',NULL,NULL);
/*!40000 ALTER TABLE `cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `ownership` int(11) NOT NULL,
  `hire_up_to` date NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `delay_count` int(11) NOT NULL,
  `advance_count` int(11) NOT NULL,
  `service_package_id` int(11) DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,8,1,'082115147945',1,'0000-00-00',1,0,0,0,2,'2011-01-01'),(2,9,1,'085222888249',1,'0000-00-00',2,0,0,0,3,'2011-01-01'),(3,10,1,'085222888249',1,'0000-00-00',3,0,0,0,4,'2011-01-01'),(4,11,1,'085222888249',1,'0000-00-00',4,0,0,0,1,'2011-01-01'),(5,12,1,'082115147945',1,'0000-00-00',5,0,0,0,4,'2011-01-01'),(6,13,1,'082115147945',1,'0000-00-00',6,0,0,0,3,'2011-01-01'),(7,14,1,'082115147945',1,'0000-00-00',7,0,0,0,2,'2011-01-01'),(8,15,1,'082115147945',1,'0000-00-00',8,0,0,0,4,'2011-01-01'),(9,16,1,'082115147945',1,'0000-00-00',9,0,0,0,3,'2011-01-01'),(10,17,1,'082115147945',1,'0000-00-00',10,0,0,0,3,'2011-01-01'),(11,18,1,'082115147945',1,'0000-00-00',11,0,0,0,2,'2011-01-01'),(12,19,1,'082115147945',1,'0000-00-00',12,0,0,0,5,'2011-01-01'),(13,20,1,'082115147945',1,'0000-00-00',13,0,0,0,3,'2011-01-01'),(14,21,1,'082115147945',1,'0000-00-00',14,0,0,0,4,'2011-01-01'),(15,22,1,'082115147945',1,'0000-00-00',15,0,0,0,5,'2011-01-01'),(16,23,1,'082115147945',1,'0000-00-00',16,0,0,0,4,'2011-01-01'),(17,24,1,'085222888249',1,'0000-00-00',17,0,0,0,4,'2011-01-01'),(18,25,1,'085222888249',1,'0000-00-00',18,0,0,0,5,'2011-01-01'),(19,26,1,'082115147945',1,'0000-00-00',19,0,0,0,3,'2011-01-01'),(20,27,1,'082115147945',1,'0000-00-00',20,0,0,0,3,'2011-01-01'),(21,28,1,'085222888249',1,'0000-00-00',21,0,0,0,3,'2011-01-01'),(22,29,1,'082115147945',1,'0000-00-00',22,0,0,0,3,'2011-01-01'),(23,30,1,'085222888249',1,'0000-00-00',23,0,0,0,3,'2011-01-01'),(24,31,1,'085222888249',1,'0000-00-00',24,0,0,0,4,'2011-01-01'),(25,32,1,'082115147945',1,'0000-00-00',25,0,0,0,1,'2011-01-01'),(26,33,1,'082115147945',1,'0000-00-00',26,0,0,0,5,'2011-01-01'),(27,34,1,'082115147945',2,'2011-03-11',27,0,0,0,1,'2011-01-01'),(28,35,1,'082115147945',1,'0000-00-00',28,0,0,0,3,'2011-01-01'),(29,36,1,'085222888249',1,'0000-00-00',29,0,0,0,1,'2011-01-01'),(30,37,1,'085222888249',1,'0000-00-00',30,0,0,0,2,'2011-01-01'),(31,38,1,'08756567',1,'0000-00-00',31,0,0,0,2,'2011-03-04'),(32,39,1,'08756567',1,'0000-00-00',32,0,0,0,4,'2011-03-04'),(33,40,1,'08756567',1,'0000-00-00',33,0,0,0,3,'2011-03-04'),(34,41,1,'08756567',1,'0000-00-00',34,0,0,0,4,'2011-03-04'),(35,42,1,'08756567',1,'0000-00-00',35,0,0,0,5,'2011-03-04');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_has_service`
--

DROP TABLE IF EXISTS `customer_has_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_has_service` (
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_has_service`
--

LOCK TABLES `customer_has_service` WRITE;
/*!40000 ALTER TABLE `customer_has_service` DISABLE KEYS */;
INSERT INTO `customer_has_service` VALUES (1,5),(1,4),(3,7),(2,6),(2,4),(3,4),(5,7),(4,3),(5,4),(6,6),(6,4),(7,5),(7,4),(8,7),(8,4),(9,6),(9,4),(10,6),(10,4),(11,5),(11,4),(23,4),(12,8),(13,6),(13,4),(14,7),(14,4),(16,7),(15,8),(16,4),(17,7),(17,4),(20,6),(18,8),(19,6),(19,4),(20,4),(21,6),(21,4),(22,6),(22,4),(23,6),(24,4),(24,7),(25,3),(26,8),(27,3),(28,4),(28,6),(29,3),(30,4),(30,5),(31,4),(31,5),(32,4),(32,7),(33,4),(33,6),(34,4),(34,7),(35,8);
/*!40000 ALTER TABLE `customer_has_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` double NOT NULL,
  `total_compensation` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `paying_date` date DEFAULT NULL,
  `fine` double NOT NULL,
  `user_handle_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,270000,0,7,1,1,1,8,NULL,NULL,0,1),(2,380000,0,7,2,1,1,9,NULL,NULL,0,1),(3,775000,0,7,3,1,1,10,NULL,NULL,0,1),(4,170000,0,7,4,1,1,11,NULL,NULL,0,1),(5,775000,0,7,5,1,1,12,NULL,NULL,0,1),(6,380000,0,7,6,1,1,13,NULL,NULL,0,1),(7,270000,0,7,7,1,1,14,NULL,NULL,0,1),(8,775000,0,7,8,1,1,15,NULL,NULL,0,1),(9,380000,0,7,9,1,1,16,NULL,NULL,0,1),(10,380000,0,7,10,1,1,17,NULL,NULL,0,1),(11,270000,0,7,11,1,1,18,NULL,NULL,0,1),(12,120000,0,7,12,1,1,19,NULL,NULL,0,1),(13,380000,0,7,13,1,1,20,NULL,NULL,0,1),(14,775000,0,7,14,1,1,21,NULL,NULL,0,1),(15,120000,0,7,15,0,NULL,22,NULL,NULL,0,NULL),(16,775000,0,7,16,0,NULL,23,NULL,NULL,0,NULL),(17,775000,0,7,17,0,NULL,24,NULL,NULL,0,NULL),(18,120000,0,7,18,0,NULL,25,NULL,NULL,0,NULL),(19,380000,0,7,19,0,NULL,26,NULL,NULL,0,NULL),(20,380000,0,7,20,0,NULL,27,NULL,NULL,0,NULL),(21,380000,0,7,21,0,NULL,28,NULL,NULL,0,NULL),(22,380000,0,7,22,0,NULL,29,NULL,NULL,0,NULL),(23,380000,0,7,23,0,NULL,30,NULL,NULL,0,NULL),(24,775000,0,7,24,0,NULL,31,NULL,NULL,0,NULL),(25,170000,0,7,25,0,NULL,32,NULL,NULL,0,NULL),(26,120000,0,7,26,0,NULL,33,NULL,NULL,0,NULL),(27,170000,0,7,27,0,NULL,34,NULL,NULL,0,NULL),(28,380000,0,7,28,0,NULL,35,NULL,NULL,0,NULL),(29,170000,0,7,29,0,NULL,36,NULL,NULL,0,NULL),(30,270000,0,7,30,0,NULL,37,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `subtotal_compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_item`
--

LOCK TABLES `invoice_item` WRITE;
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
INSERT INTO `invoice_item` VALUES (1,120000,0,1,7,1,5),(2,150000,0,1,7,1,4),(3,230000,0,2,7,2,6),(4,150000,0,2,7,2,4),(5,625000,0,3,7,3,7),(6,150000,0,3,7,3,4),(7,170000,0,4,7,4,3),(8,625000,0,5,7,5,7),(9,150000,0,5,7,5,4),(10,230000,0,6,7,6,6),(11,150000,0,6,7,6,4),(12,120000,0,7,7,7,5),(13,150000,0,7,7,7,4),(14,625000,0,8,7,8,7),(15,150000,0,8,7,8,4),(16,230000,0,9,7,9,6),(17,150000,0,9,7,9,4),(18,230000,0,10,7,10,6),(19,150000,0,10,7,10,4),(20,120000,0,11,7,11,5),(21,150000,0,11,7,11,4),(22,120000,0,12,7,12,8),(23,230000,0,13,7,13,6),(24,150000,0,13,7,13,4),(25,625000,0,14,7,14,7),(26,150000,0,14,7,14,4),(27,120000,0,15,7,15,8),(28,625000,0,16,7,16,7),(29,150000,0,16,7,16,4),(30,625000,0,17,7,17,7),(31,150000,0,17,7,17,4),(32,120000,0,18,7,18,8),(33,230000,0,19,7,19,6),(34,150000,0,19,7,19,4),(35,230000,0,20,7,20,6),(36,150000,0,20,7,20,4),(37,230000,0,21,7,21,6),(38,150000,0,21,7,21,4),(39,230000,0,22,7,22,6),(40,150000,0,22,7,22,4),(41,150000,0,23,7,23,4),(42,230000,0,23,7,23,6),(43,150000,0,24,7,24,4),(44,625000,0,24,7,24,7),(45,170000,0,25,7,25,3),(46,120000,0,26,7,26,8),(47,170000,0,27,7,27,3),(48,150000,0,28,7,28,4),(49,230000,0,28,7,28,6),(50,170000,0,29,7,29,3),(51,150000,0,30,7,30,4),(52,120000,0,30,7,30,5);
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'Cash'),(2,'Debit Card BCA'),(3,'Debit Card Mandiri'),(4,'Debit Card Visa'),(5,'Debit Card Mastercard');
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `period`
--

DROP TABLE IF EXISTS `period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `period`
--

LOCK TABLES `period` WRITE;
/*!40000 ALTER TABLE `period` DISABLE KEYS */;
INSERT INTO `period` VALUES (1,'21 Maret 2011 - 20 April 2011','2011-03-21','2011-04-20'),(2,'21 April 2011 - 20 Mei 2011','2011-04-21','2011-05-20'),(3,'21 Mei 2011 - 20 Juni 2011','2011-05-21','2011-06-20'),(4,'21 Juni 2011 - 20 Juli 2011','2011-06-21','2011-07-20'),(5,'21 Juli 2011 - 20 Agustus 2011','2011-07-21','2011-08-20'),(6,'21 Agustus 2011 - 20 September 2011','2011-08-21','2011-09-20'),(7,'21 September 2011 - 20 Oktober 2011','2011-09-21','2011-10-20');
/*!40000 ALTER TABLE `period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodic_cost`
--

DROP TABLE IF EXISTS `periodic_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodic_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `note` text,
  `service_id` int(11) DEFAULT NULL,
  `payment_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodic_cost`
--

LOCK TABLES `periodic_cost` WRITE;
/*!40000 ALTER TABLE `periodic_cost` DISABLE KEYS */;
INSERT INTO `periodic_cost` VALUES (1,'Biaya Internet',2000000,NULL,1,0),(2,'Biaya TV Digital',1500000,NULL,2,0),(3,'maintace',200000,'bayar teknisi ahli',NULL,3);
/*!40000 ALTER TABLE `periodic_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_type`
--

DROP TABLE IF EXISTS `problem_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `down` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_type`
--

LOCK TABLES `problem_type` WRITE;
/*!40000 ALTER TABLE `problem_type` DISABLE KEYS */;
INSERT INTO `problem_type` VALUES (1,'Intenet Mati',NULL,1),(2,'TV tidak memiliki channel',NULL,1);
/*!40000 ALTER TABLE `problem_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revenue`
--

DROP TABLE IF EXISTS `revenue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revenue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_handle_id` int(11) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revenue`
--

LOCK TABLES `revenue` WRITE;
/*!40000 ALTER TABLE `revenue` DISABLE KEYS */;
INSERT INTO `revenue` VALUES (1,200000,-9999,0,8,1,1,'Registration Fee from Dewi Nurmayasari',NULL,NULL),(2,200000,-9999,0,9,2,1,'Registration Fee from Silmi Kaaffah Zakiyyah',NULL,NULL),(3,200000,-9999,0,10,3,1,'Registration Fee from Dhandhanggula Prawira',NULL,NULL),(4,200000,-9999,0,11,4,1,'Registration Fee from Cucun Rohaeti',NULL,NULL),(5,200000,-9999,0,12,5,1,'Registration Fee from Iqbal Rickaka Aditya',NULL,NULL),(6,200000,-9999,0,13,6,1,'Registration Fee from Ria Chandra Puspita',NULL,NULL),(7,200000,-9999,0,14,7,1,'Registration Fee from Agung Prasetiyo',NULL,NULL),(8,200000,-9999,0,15,8,1,'Registration Fee from Isnanda Saputra',NULL,NULL),(9,200000,-9999,0,16,9,1,'Registration Fee from Andri Rosdiawan',NULL,NULL),(10,200000,-9999,0,17,10,1,'Registration Fee from Irfan Ibn Abidin',NULL,NULL),(11,200000,-9999,0,18,11,1,'Registration Fee from Kardiyah Azhe',NULL,NULL),(12,200000,-9999,0,19,12,1,'Registration Fee from Mardliyah Chea',NULL,NULL),(13,200000,-9999,0,20,13,1,'Registration Fee from Raditya Eka Abdul Ghafur',NULL,NULL),(14,200000,-9999,0,21,14,1,'Registration Fee from Siti Nurani Hikmah',NULL,NULL),(15,200000,-9999,0,22,15,1,'Registration Fee from Afif Naofal Pramana',NULL,NULL),(16,200000,-9999,0,23,16,1,'Registration Fee from Listia Fuji Lestari',NULL,NULL),(17,200000,-9999,0,24,17,1,'Registration Fee from Dwi Nur Fachmi',NULL,NULL),(18,200000,-9999,0,25,18,1,'Registration Fee from Nadri Taja',NULL,NULL),(19,200000,-9999,0,26,19,1,'Registration Fee from Istia Hamdiati Nuri Al-musthofa',NULL,NULL),(20,200000,-9999,0,27,20,1,'Registration Fee from M Jhohan Charnelish A',NULL,NULL),(21,200000,-9999,0,28,21,1,'Registration Fee from Oky Abraham David Solomon',NULL,NULL),(22,200000,-9999,0,29,22,1,'Registration Fee from Adhi Ismail Hasan',NULL,NULL),(23,625000,1,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(24,150000,1,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(25,625000,1,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(26,150000,1,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(27,230000,1,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',NULL,NULL),(28,150000,1,4,13,6,1,'Pembayaran TV dari Ria Chandra Puspita',NULL,NULL),(29,150000,1,4,15,8,1,'Pembayaran TV dari Isnanda Saputra',NULL,NULL),(30,120000,1,8,15,8,1,'Pembayaran Mighty Net Prepaid dari Isnanda Saputra',NULL,NULL),(31,170000,1,3,17,10,1,'Pembayaran TV Only dari Irfan Ibn Abidin',NULL,NULL),(32,120000,1,5,17,10,1,'Pembayaran Mighty Net Starter dari Irfan Ibn Abidin',NULL,NULL),(33,120000,1,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(34,150000,1,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(35,230000,1,6,9,2,1,'Pembayaran Mighty Net Personal dari Silmi Kaaffah Zakiyyah',NULL,NULL),(36,150000,1,4,9,2,1,'Pembayaran TV dari Silmi Kaaffah Zakiyyah',NULL,NULL),(37,170000,1,3,11,4,1,'Pembayaran TV Only dari Cucun Rohaeti',NULL,NULL),(38,170000,1,3,14,7,1,'Pembayaran TV Only dari Agung Prasetiyo',NULL,NULL),(39,120000,1,5,14,7,1,'Pembayaran Mighty Net Starter dari Agung Prasetiyo',NULL,NULL),(40,170000,1,3,16,9,1,'Pembayaran TV Only dari Andri Rosdiawan',NULL,NULL),(41,120000,1,5,16,9,1,'Pembayaran Mighty Net Starter dari Andri Rosdiawan',NULL,NULL),(42,150000,1,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(43,120000,1,8,18,11,1,'Pembayaran Mighty Net Prepaid dari Kardiyah Azhe',NULL,NULL),(44,170000,1,3,19,12,1,'Pembayaran TV Only dari Mardliyah Chea',NULL,NULL),(45,625000,1,7,19,12,1,'Pembayaran Mighty Net Pro dari Mardliyah Chea',NULL,NULL),(46,150000,1,4,20,13,1,'Pembayaran TV dari Raditya Eka Abdul Ghafur',NULL,NULL),(47,120000,1,8,20,13,1,'Pembayaran Mighty Net Prepaid dari Raditya Eka Abdul Ghafur',NULL,NULL),(48,150000,1,4,21,14,1,'Pembayaran TV dari Siti Nurani Hikmah',NULL,NULL),(49,120000,1,5,21,14,1,'Pembayaran Mighty Net Starter dari Siti Nurani Hikmah',NULL,NULL),(50,150000,1,4,22,15,1,'Pembayaran TV dari Afif Naofal Pramana',NULL,NULL),(51,120000,1,5,22,15,1,'Pembayaran Mighty Net Starter dari Afif Naofal Pramana',NULL,NULL),(52,150000,1,4,23,16,1,'Pembayaran TV dari Listia Fuji Lestari',NULL,NULL),(53,120000,2,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(54,150000,2,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(55,625000,2,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(56,150000,2,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(57,625000,2,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(58,150000,2,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(59,230000,2,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',NULL,NULL),(60,150000,2,4,13,6,1,'Pembayaran TV dari Ria Chandra Puspita',NULL,NULL),(61,625000,2,7,15,8,1,'Pembayaran Mighty Net Pro dari Isnanda Saputra',NULL,NULL),(62,150000,2,4,15,8,1,'Pembayaran TV dari Isnanda Saputra',NULL,NULL),(63,120000,2,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',NULL,NULL),(64,150000,2,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(65,625000,2,7,24,17,1,'Pembayaran Mighty Net Pro dari Dwi Nur Fachmi',NULL,NULL),(66,150000,2,4,24,17,1,'Pembayaran TV dari Dwi Nur Fachmi',NULL,NULL),(67,625000,2,7,23,16,1,'Pembayaran Mighty Net Pro dari Listia Fuji Lestari',NULL,NULL),(68,150000,2,4,23,16,1,'Pembayaran TV dari Listia Fuji Lestari',NULL,NULL),(69,625000,2,7,21,14,1,'Pembayaran Mighty Net Pro dari Siti Nurani Hikmah',NULL,NULL),(70,150000,2,4,21,14,1,'Pembayaran TV dari Siti Nurani Hikmah',NULL,NULL),(71,230000,2,6,20,13,1,'Pembayaran Mighty Net Personal dari Raditya Eka Abdul Ghafur',NULL,NULL),(72,150000,2,4,20,13,1,'Pembayaran TV dari Raditya Eka Abdul Ghafur',NULL,NULL),(73,120000,3,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(74,150000,3,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(75,230000,3,6,9,2,1,'Pembayaran Mighty Net Personal dari Silmi Kaaffah Zakiyyah',NULL,NULL),(76,150000,3,4,9,2,1,'Pembayaran TV dari Silmi Kaaffah Zakiyyah',NULL,NULL),(77,625000,3,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(78,150000,3,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(79,170000,3,3,11,4,1,'Pembayaran TV Only dari Cucun Rohaeti',NULL,NULL),(80,625000,3,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(81,150000,3,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(82,230000,3,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',NULL,NULL),(83,150000,3,4,13,6,1,'Pembayaran TV dari Ria Chandra Puspita',NULL,NULL),(84,120000,3,5,14,7,1,'Pembayaran Mighty Net Starter dari Agung Prasetiyo',NULL,NULL),(85,150000,3,4,14,7,1,'Pembayaran TV dari Agung Prasetiyo',NULL,NULL),(86,625000,3,7,15,8,1,'Pembayaran Mighty Net Pro dari Isnanda Saputra',NULL,NULL),(87,150000,3,4,15,8,1,'Pembayaran TV dari Isnanda Saputra',NULL,NULL),(88,230000,3,6,16,9,1,'Pembayaran Mighty Net Personal dari Andri Rosdiawan',NULL,NULL),(89,150000,3,4,16,9,1,'Pembayaran TV dari Andri Rosdiawan',NULL,NULL),(90,120000,3,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',NULL,NULL),(91,150000,3,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(92,230000,3,6,20,13,1,'Pembayaran Mighty Net Personal dari Raditya Eka Abdul Ghafur',NULL,NULL),(93,150000,3,4,20,13,1,'Pembayaran TV dari Raditya Eka Abdul Ghafur',NULL,NULL),(94,120000,3,8,22,15,1,'Pembayaran Mighty Net Prepaid dari Afif Naofal Pramana',NULL,NULL),(95,625000,3,7,24,17,1,'Pembayaran Mighty Net Pro dari Dwi Nur Fachmi',NULL,NULL),(96,150000,3,4,24,17,1,'Pembayaran TV dari Dwi Nur Fachmi',NULL,NULL),(97,625000,3,7,21,14,1,'Pembayaran Mighty Net Pro dari Siti Nurani Hikmah',NULL,NULL),(98,150000,3,4,21,14,1,'Pembayaran TV dari Siti Nurani Hikmah',NULL,NULL),(99,120000,4,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(100,150000,4,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(101,625000,4,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(102,150000,4,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(103,625000,4,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(104,150000,4,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(105,230000,4,6,16,9,1,'Pembayaran Mighty Net Personal dari Andri Rosdiawan',NULL,NULL),(106,150000,4,4,16,9,1,'Pembayaran TV dari Andri Rosdiawan',NULL,NULL),(107,120000,4,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',NULL,NULL),(108,150000,4,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(109,120000,4,8,19,12,1,'Pembayaran Mighty Net Prepaid dari Mardliyah Chea',NULL,NULL),(110,625000,4,7,24,17,1,'Pembayaran Mighty Net Pro dari Dwi Nur Fachmi',NULL,NULL),(111,150000,4,4,24,17,1,'Pembayaran TV dari Dwi Nur Fachmi',NULL,NULL),(112,120000,4,8,22,15,1,'Pembayaran Mighty Net Prepaid dari Afif Naofal Pramana',NULL,NULL),(113,200000,4,0,30,23,1,'Registration Fee from Dina Herdiani',NULL,NULL),(114,200000,4,0,31,24,1,'Registration Fee from Filda Dewi Wijayakusumah',NULL,NULL),(115,200000,4,0,32,25,1,'Registration Fee from Panji Shofiyullah',NULL,NULL),(116,200000,4,0,33,26,1,'Registration Fee from Danti Faramita Sari',NULL,NULL),(117,200000,4,0,34,27,1,'Registration Fee from Jane Andriani Ardhie',NULL,NULL),(118,200000,4,0,35,28,1,'Registration Fee from Abdan Rabbani',NULL,NULL),(119,200000,4,0,36,29,1,'Registration Fee from Abdulah Safei',NULL,NULL),(120,200000,4,0,37,30,1,'Registration Fee from Abdul Wahab',NULL,NULL),(121,120000,5,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(122,150000,5,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(123,230000,5,6,9,2,1,'Pembayaran Mighty Net Personal dari Silmi Kaaffah Zakiyyah',NULL,NULL),(124,150000,5,4,9,2,1,'Pembayaran TV dari Silmi Kaaffah Zakiyyah',NULL,NULL),(125,625000,5,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(126,150000,5,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(127,170000,5,3,11,4,1,'Pembayaran TV Only dari Cucun Rohaeti',NULL,NULL),(128,625000,5,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(129,150000,5,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(130,230000,5,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',NULL,NULL),(131,150000,5,4,13,6,1,'Pembayaran TV dari Ria Chandra Puspita',NULL,NULL),(132,120000,5,5,14,7,1,'Pembayaran Mighty Net Starter dari Agung Prasetiyo',NULL,NULL),(133,150000,5,4,14,7,1,'Pembayaran TV dari Agung Prasetiyo',NULL,NULL),(134,625000,5,7,15,8,1,'Pembayaran Mighty Net Pro dari Isnanda Saputra',NULL,NULL),(135,150000,5,4,15,8,1,'Pembayaran TV dari Isnanda Saputra',NULL,NULL),(136,230000,5,6,16,9,1,'Pembayaran Mighty Net Personal dari Andri Rosdiawan',NULL,NULL),(137,150000,5,4,16,9,1,'Pembayaran TV dari Andri Rosdiawan',NULL,NULL),(138,230000,5,6,17,10,1,'Pembayaran Mighty Net Personal dari Irfan Ibn Abidin',NULL,NULL),(139,150000,5,4,17,10,1,'Pembayaran TV dari Irfan Ibn Abidin',NULL,NULL),(140,120000,5,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',NULL,NULL),(141,150000,5,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(142,120000,5,8,19,12,1,'Pembayaran Mighty Net Prepaid dari Mardliyah Chea',NULL,NULL),(143,230000,5,6,20,13,1,'Pembayaran Mighty Net Personal dari Raditya Eka Abdul Ghafur',NULL,NULL),(144,150000,5,4,20,13,1,'Pembayaran TV dari Raditya Eka Abdul Ghafur',NULL,NULL),(145,625000,5,7,21,14,1,'Pembayaran Mighty Net Pro dari Siti Nurani Hikmah',NULL,NULL),(146,150000,5,4,21,14,1,'Pembayaran TV dari Siti Nurani Hikmah',NULL,NULL),(147,120000,5,8,22,15,1,'Pembayaran Mighty Net Prepaid dari Afif Naofal Pramana',NULL,NULL),(148,625000,5,7,23,16,1,'Pembayaran Mighty Net Pro dari Listia Fuji Lestari',NULL,NULL),(149,150000,5,4,23,16,1,'Pembayaran TV dari Listia Fuji Lestari',NULL,NULL),(150,625000,5,7,24,17,1,'Pembayaran Mighty Net Pro dari Dwi Nur Fachmi',NULL,NULL),(151,150000,5,4,24,17,1,'Pembayaran TV dari Dwi Nur Fachmi',NULL,NULL),(152,120000,6,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',NULL,NULL),(153,150000,6,4,8,1,1,'Pembayaran TV dari Dewi Nurmayasari',NULL,NULL),(154,230000,6,6,9,2,1,'Pembayaran Mighty Net Personal dari Silmi Kaaffah Zakiyyah',NULL,NULL),(155,150000,6,4,9,2,1,'Pembayaran TV dari Silmi Kaaffah Zakiyyah',NULL,NULL),(156,625000,6,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',NULL,NULL),(157,150000,6,4,10,3,1,'Pembayaran TV dari Dhandhanggula Prawira',NULL,NULL),(158,170000,6,3,11,4,1,'Pembayaran TV Only dari Cucun Rohaeti',NULL,NULL),(159,625000,6,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',NULL,NULL),(160,150000,6,4,12,5,1,'Pembayaran TV dari Iqbal Rickaka Aditya',NULL,NULL),(161,230000,6,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',NULL,NULL),(162,150000,6,4,13,6,1,'Pembayaran TV dari Ria Chandra Puspita',NULL,NULL),(163,120000,6,5,14,7,1,'Pembayaran Mighty Net Starter dari Agung Prasetiyo',NULL,NULL),(164,150000,6,4,14,7,1,'Pembayaran TV dari Agung Prasetiyo',NULL,NULL),(165,625000,6,7,15,8,1,'Pembayaran Mighty Net Pro dari Isnanda Saputra',NULL,NULL),(166,150000,6,4,15,8,1,'Pembayaran TV dari Isnanda Saputra',NULL,NULL),(167,230000,6,6,16,9,1,'Pembayaran Mighty Net Personal dari Andri Rosdiawan',NULL,NULL),(168,150000,6,4,16,9,1,'Pembayaran TV dari Andri Rosdiawan',NULL,NULL),(169,230000,6,6,17,10,1,'Pembayaran Mighty Net Personal dari Irfan Ibn Abidin',NULL,NULL),(170,150000,6,4,17,10,1,'Pembayaran TV dari Irfan Ibn Abidin',NULL,NULL),(171,120000,6,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',NULL,NULL),(172,150000,6,4,18,11,1,'Pembayaran TV dari Kardiyah Azhe',NULL,NULL),(173,120000,6,8,19,12,1,'Pembayaran Mighty Net Prepaid dari Mardliyah Chea',NULL,NULL),(174,230000,6,6,20,13,1,'Pembayaran Mighty Net Personal dari Raditya Eka Abdul Ghafur',NULL,NULL),(175,150000,6,4,20,13,1,'Pembayaran TV dari Raditya Eka Abdul Ghafur',NULL,NULL),(176,625000,6,7,21,14,1,'Pembayaran Mighty Net Pro dari Siti Nurani Hikmah',NULL,NULL),(177,150000,6,4,21,14,1,'Pembayaran TV dari Siti Nurani Hikmah',NULL,NULL),(178,120000,6,8,22,15,1,'Pembayaran Mighty Net Prepaid dari Afif Naofal Pramana',NULL,NULL),(179,625000,6,7,23,16,1,'Pembayaran Mighty Net Pro dari Listia Fuji Lestari',NULL,NULL),(180,150000,6,4,23,16,1,'Pembayaran TV dari Listia Fuji Lestari',NULL,NULL),(181,625000,6,7,24,17,1,'Pembayaran Mighty Net Pro dari Dwi Nur Fachmi',NULL,NULL),(182,150000,6,4,24,17,1,'Pembayaran TV dari Dwi Nur Fachmi',NULL,NULL),(183,120000,6,8,25,18,1,'Pembayaran Mighty Net Prepaid dari Nadri Taja',NULL,NULL),(184,200000,7,0,38,31,1,'Registration Fee from Rudy hartono',1,'2011-03-04 08:03:08'),(185,200000,7,0,39,32,1,'Registration Fee from Adhi ismail hasan',1,'2011-03-04 08:04:15'),(186,200000,7,0,40,33,1,'Registration Fee from deden Rohman Gumilang',1,'2011-03-04 08:05:44'),(187,200000,7,0,41,34,1,'Registration Fee from Erika Susilo',1,'2011-03-04 08:06:33'),(188,200000,7,0,42,35,1,'Registration Fee from Didin Nurdiansyah',1,'2011-03-04 08:08:01'),(189,120000,7,5,8,1,1,'Pembayaran Mighty Net Starter dari Dewi Nurmayasari',1,'2011-03-04 08:08:50'),(190,150000,7,4,8,1,1,'Pembayaran My TV (include) dari Dewi Nurmayasari',1,'2011-03-04 08:08:50'),(191,230000,7,6,9,2,1,'Pembayaran Mighty Net Personal dari Silmi Kaaffah Zakiyyah',1,'2011-03-04 08:09:02'),(192,150000,7,4,9,2,1,'Pembayaran My TV (include) dari Silmi Kaaffah Zakiyyah',1,'2011-03-04 08:09:02'),(193,625000,7,7,10,3,1,'Pembayaran Mighty Net Pro dari Dhandhanggula Prawira',1,'2011-03-04 08:09:07'),(194,150000,7,4,10,3,1,'Pembayaran My TV (include) dari Dhandhanggula Prawira',1,'2011-03-04 08:09:07'),(195,170000,7,3,11,4,1,'Pembayaran TV Only dari Cucun Rohaeti',1,'2011-03-04 08:10:06'),(196,625000,7,7,12,5,1,'Pembayaran Mighty Net Pro dari Iqbal Rickaka Aditya',1,'2011-03-04 08:10:12'),(197,150000,7,4,12,5,1,'Pembayaran My TV (include) dari Iqbal Rickaka Aditya',1,'2011-03-04 08:10:12'),(198,230000,7,6,13,6,1,'Pembayaran Mighty Net Personal dari Ria Chandra Puspita',1,'2011-03-04 08:10:17'),(199,150000,7,4,13,6,1,'Pembayaran My TV (include) dari Ria Chandra Puspita',1,'2011-03-04 08:10:17'),(200,120000,7,5,14,7,1,'Pembayaran Mighty Net Starter dari Agung Prasetiyo',1,'2011-03-04 08:10:40'),(201,150000,7,4,14,7,1,'Pembayaran My TV (include) dari Agung Prasetiyo',1,'2011-03-04 08:10:40'),(202,625000,7,7,15,8,1,'Pembayaran Mighty Net Pro dari Isnanda Saputra',1,'2011-03-04 08:10:47'),(203,150000,7,4,15,8,1,'Pembayaran My TV (include) dari Isnanda Saputra',1,'2011-03-04 08:10:47'),(204,230000,7,6,16,9,1,'Pembayaran Mighty Net Personal dari Andri Rosdiawan',1,'2011-03-04 08:10:55'),(205,150000,7,4,16,9,1,'Pembayaran My TV (include) dari Andri Rosdiawan',1,'2011-03-04 08:10:55'),(206,230000,7,6,17,10,1,'Pembayaran Mighty Net Personal dari Irfan Ibn Abidin',1,'2011-03-04 08:11:02'),(207,150000,7,4,17,10,1,'Pembayaran My TV (include) dari Irfan Ibn Abidin',1,'2011-03-04 08:11:02'),(208,120000,7,5,18,11,1,'Pembayaran Mighty Net Starter dari Kardiyah Azhe',1,'2011-03-04 08:11:09'),(209,150000,7,4,18,11,1,'Pembayaran My TV (include) dari Kardiyah Azhe',1,'2011-03-04 08:11:09'),(210,120000,7,8,19,12,1,'Pembayaran Mighty Net Prepaid dari Mardliyah Chea',1,'2011-03-04 08:11:18'),(211,230000,7,6,20,13,1,'Pembayaran Mighty Net Personal dari Raditya Eka Abdul Ghafur',1,'2011-03-04 08:11:31'),(212,150000,7,4,20,13,1,'Pembayaran My TV (include) dari Raditya Eka Abdul Ghafur',1,'2011-03-04 08:11:31'),(213,625000,7,7,21,14,1,'Pembayaran Mighty Net Pro dari Siti Nurani Hikmah',1,'2011-03-04 08:11:41'),(214,150000,7,4,21,14,1,'Pembayaran My TV (include) dari Siti Nurani Hikmah',1,'2011-03-04 08:11:41');
/*!40000 ALTER TABLE `revenue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin','Administrator'),(2,'customer','Customer'),(3,'management','Management'),(4,'technical_support','Technical Support'),(5,'customer_services','Customer Services');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'TV',0,NULL,'Paket TV 50'),(2,'Internet',0,NULL,'Paket TV dan Internet'),(3,'TV Only',170000,1,'Paket TV 50 Channel'),(4,'My TV (include)',150000,1,'Paket TV 50 Channel'),(5,'Mighty Net Starter',120000,2,'Internet up to 256kbps'),(6,'Mighty Net Personal',230000,2,'Internet up to 512kbps'),(7,'Mighty Net Pro',625000,2,'Internet up to 1024kbps'),(8,'Mighty Net Prepaid',120000,2,'Internet up to 256kbps');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_package`
--

DROP TABLE IF EXISTS `service_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_package`
--

LOCK TABLES `service_package` WRITE;
/*!40000 ALTER TABLE `service_package` DISABLE KEYS */;
INSERT INTO `service_package` VALUES (1,'My TV (TV Only)','50 TV Channel'),(2,'Mighty Net Starter','Paket TV 50 channel dan paket Internet up to 256kbps'),(3,'Mighty Net Personal','Paket TV 50 channel dan paket Internet up to 512kbps'),(4,'Mighty Net Pro','Paket TV 50 channel dan paket Internet up to 1024kbps'),(5,'Mighty Net Prepaid','Paket Internet  Prepaid up to 256kbps');
/*!40000 ALTER TABLE `service_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_package_has_service`
--

DROP TABLE IF EXISTS `service_package_has_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_package_has_service` (
  `service_id` int(11) NOT NULL,
  `service_package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_package_has_service`
--

LOCK TABLES `service_package_has_service` WRITE;
/*!40000 ALTER TABLE `service_package_has_service` DISABLE KEYS */;
INSERT INTO `service_package_has_service` VALUES (3,1),(4,2),(5,2),(4,3),(6,3),(4,4),(7,4),(8,5);
/*!40000 ALTER TABLE `service_package_has_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'PERIOD_START_DATE','21'),(2,'PERIOD_END_DATE','20'),(3,'REGISTER_FEE','200000');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_arpu`
--

DROP TABLE IF EXISTS `statistic_arpu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic_arpu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_arpu`
--

LOCK TABLES `statistic_arpu` WRITE;
/*!40000 ALTER TABLE `statistic_arpu` DISABLE KEYS */;
INSERT INTO `statistic_arpu` VALUES (1,1,268863.63636364),(2,2,270454.54545455),(3,3,295227.27272727),(4,4,158409.09090909),(5,5,259000),(6,6,263000),(7,7,202857.14285714);
/*!40000 ALTER TABLE `statistic_arpu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_client`
--

DROP TABLE IF EXISTS `statistic_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_client`
--

LOCK TABLES `statistic_client` WRITE;
/*!40000 ALTER TABLE `statistic_client` DISABLE KEYS */;
INSERT INTO `statistic_client` VALUES (1,1,22),(2,2,22),(3,3,22),(4,4,22),(5,5,30),(6,6,30),(7,7,35);
/*!40000 ALTER TABLE `statistic_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_cost_client`
--

DROP TABLE IF EXISTS `statistic_cost_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic_cost_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_cost_client`
--

LOCK TABLES `statistic_cost_client` WRITE;
/*!40000 ALTER TABLE `statistic_cost_client` DISABLE KEYS */;
INSERT INTO `statistic_cost_client` VALUES (1,1,0),(2,2,0),(3,3,0),(4,4,0),(5,5,0),(6,6,0),(7,7,0);
/*!40000 ALTER TABLE `statistic_cost_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base',1298883728),('m110117_012547_init',1299195801),('m110117_025939_init_data',1299195801),('m110117_090847_user_customer_state',1299195801),('m110117_102801_user_add_fullname_column',1299195801),('m110118_033338_service_add_column_price',1299195801),('m110118_120640_ticket_add_column_service_id',1299195801),('m110119_041753_invoice_item_add_column_service_id',1299195801),('m110119_152939_period_add_name_column',1299195801),('m110119_153306_period_drop_year_month_column',1299195801),('m110120_164040_ticket_alter_body_column',1299195801),('m110120_165041_insert_dummy_data',1299195801),('m110121_234243_add_detail_tables',1299195801),('m110126_230329_completing_customer_table',1299195801),('m110127_002440_add_user_id_to_revenue_and_outlay',1299195801),('m110127_053620_add_table_ticket_reply',1299195801),('m110127_101245_add_columns_to_ticket_reply',1299195801),('m110202_043210_rename_outlay_to_cost',1299195801),('m110202_043806_create_table_apartment_and_compensation_schmema',1299195801),('m110204_041136_change_ticket_schema',1299195801),('m110206_075248_add_custumer_rating_column',1299195801),('m110206_151810_apartment_update',1299195801),('m110207_043137_add_cost_columns',1299195801),('m110207_060645_insert_problem_types',1299195801),('m110209_021225_create_table_payment_menthod',1299195801),('m110209_022113_create_statistic_tables',1299195801),('m110209_025021_alter_cost_user',1299195801),('m110209_025717_add_status_on_invoice_and_cost',1299195801),('m110209_040617_add_payment_method_id_on_invoice',1299195801),('m110209_050826_chage_table_payment',1299195801),('m110209_095516_add_customer_id_column',1299195801),('m110210_015103_update_users',1299195801),('m110210_025516_create_table_periodic_cost',1299195801),('m110210_031457_alter_revenue_user_id_null',1299195801),('m110210_080501_rename_periode_id',1299195801),('m110210_170302_add_name',1299195801),('m110210_173430_set_invoice_to_not_paid',1299195801),('m110210_192155_periodic_cost_insert',1299195801),('m110221_072141_add_user_by',1299195802),('m110222_012842_create_table_notification',1299195802),('m110222_015335_truncate_period',1299195802),('m110222_032858_add_aging_paid_date_to_invoice',1299195802),('m110222_075246_insert_payment_methods',1299195802),('m110222_081135_add_parent_id_in_service',1299195802),('m110223_053418_add_status_to_notification',1299195802),('m110228_025750_change_many',1299195802),('m110228_032515_add_table_service_package',1299195802),('m110228_045910_change_service_data',1299195802),('m110228_051553_insert_service_packages',1299195802),('m110228_055159_change_payment_date',1299195802),('m110228_080528_alter_user_id',1299195802),('m110228_084448_fix_null',1299195802),('m110301_023202_add_column_service_package',1299195802),('m110301_025341_empty_customer',1299195802),('m110301_064321_change_tables_to_innodb',1299195802),('m110301_070032_add_column_registed_date',1299195802),('m110302_042005_add_user_hande',1299195802),('m110302_060304_add_date_to_cost_and_revenue',1299195802),('m110302_071309_change',1299195802);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `status` int(11) NOT NULL,
  `compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `time_open` datetime DEFAULT NULL,
  `time_closed` datetime DEFAULT NULL,
  `problem_type_id` int(11) NOT NULL,
  `solved` tinyint(1) DEFAULT NULL,
  `down` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,'mati','internet di ruangan saya 3 hari mati.. mohon untuk di tanggulangi.. trimakasih',1,0,1,1,1,1,0,8,5,'2011-03-01 11:33:48',NULL,1,1,1),(2,'tv mati','sudah 1 minggu tv tidak bisa berjalan mohon bantuannya..',1,0,90,164,5,2,0,9,6,'2011-03-02 11:40:50',NULL,2,1,1);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_reply`
--

DROP TABLE IF EXISTS `ticket_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `message` text,
  `author_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_reply`
--

LOCK TABLES `ticket_reply` WRITE;
/*!40000 ALTER TABLE `ticket_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','ac43724f16e9241d990427ab7c8f4228','admin@gmail.com',1,1,'Administrator'),(5,'m1','ac43724f16e9241d990427ab7c8f4228','management1@gmail.com',3,1,'Management 1'),(6,'ts1','ac43724f16e9241d990427ab7c8f4228','techincal_support1@gmail.com',4,1,'Technical Support 1'),(7,'cs1','ac43724f16e9241d990427ab7c8f4228','customer_services1@gmail.com',5,1,'Customer Service 1'),(8,'Dewi','ac43724f16e9241d990427ab7c8f4228','dewi@nevisa.web.id',2,1,'Dewi Nurmayasari'),(9,'Silmi','ac43724f16e9241d990427ab7c8f4228','silmi@nevisa.web.id',2,1,'Silmi Kaaffah Zakiyyah'),(10,'bakti','ac43724f16e9241d990427ab7c8f4228','bakti@nevisa.web.id',2,1,'Dhandhanggula Prawira'),(11,'cuncun','ac43724f16e9241d990427ab7c8f4228','cuncun@nevisa.web.id',2,1,'Cucun Rohaeti'),(12,'iqbal','ac43724f16e9241d990427ab7c8f4228','iqbal@nevisa.web.id',2,1,'Iqbal Rickaka Aditya'),(13,'ria','ac43724f16e9241d990427ab7c8f4228','ria@nevisa.web.id',2,1,'Ria Chandra Puspita'),(14,'agung','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Agung Prasetiyo'),(15,'isnanda','ac43724f16e9241d990427ab7c8f4228','isnanda@nevisa.web.id',2,1,'Isnanda Saputra'),(16,'andri','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Andri Rosdiawan'),(17,'irfan','ac43724f16e9241d990427ab7c8f4228','irfan@nevisa.web.id',2,1,'Irfan Ibn Abidin'),(18,'kardiah','ac43724f16e9241d990427ab7c8f4228','kardia@nevisa.web.id',2,1,'Kardiyah Azhe'),(19,'mardi','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Mardliyah Chea'),(20,'radi','ac43724f16e9241d990427ab7c8f4228','ria@nevisa.web.id',2,1,'Raditya Eka Abdul Ghafur'),(21,'siti','ac43724f16e9241d990427ab7c8f4228','silmi@nevisa.web.id',2,1,'Siti Nurani Hikmah'),(22,'afif','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Afif Naofal Pramana'),(23,'listia','ac43724f16e9241d990427ab7c8f4228','isnanda@nevisa.web.id',2,1,'Listia Fuji Lestari'),(24,'dwi','ac43724f16e9241d990427ab7c8f4228','dewi@nevisa.web.id',2,1,'Dwi Nur Fachmi'),(25,'nadri','ac43724f16e9241d990427ab7c8f4228','bakti@nevisa.web.id',2,1,'Nadri Taja'),(26,'hamdi','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Istia Hamdiati Nuri Al-musthofa'),(27,'johan','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'M Jhohan Charnelish A'),(28,'oki','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Oky Abraham David Solomon'),(29,'adhi','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Adhi Ismail Hasan'),(30,'dina','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Dina Herdiani'),(31,'filda','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Filda Dewi Wijayakusumah'),(32,'panji','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Panji Shofiyullah'),(33,'danti','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Danti Faramita Sari'),(34,'jane','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Jane Andriani Ardhie'),(35,'abdan','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Abdan Rabbani'),(36,'abdul','ac43724f16e9241d990427ab7c8f4228','andri@nevisa.web.id',2,1,'Abdulah Safei'),(37,'wahab','ac43724f16e9241d990427ab7c8f4228','agung@nevisa.web.id',2,1,'Abdul Wahab'),(38,'rudy','ac43724f16e9241d990427ab7c8f4228','ata@nevisa.web.id',2,1,'Rudy hartono'),(39,'ismail','ac43724f16e9241d990427ab7c8f4228','ata@nevisa.web.id',2,1,'Adhi ismail hasan'),(40,'dedenrg','ac43724f16e9241d990427ab7c8f4228','ata@nevisa.web.id',2,1,'deden Rohman Gumilang'),(41,'erika','ac43724f16e9241d990427ab7c8f4228','ata@nevisa.web.id',2,1,'Erika Susilo'),(42,'didinn','ac43724f16e9241d990427ab7c8f4228','ata@nevisa.web.id',2,1,'Didin Nurdiansyah');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-07-14  8:31:35
