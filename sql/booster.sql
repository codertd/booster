-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: booster
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `fundraisers`
--

DROP TABLE IF EXISTS `fundraisers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fundraisers` (
  `fundraiser_id` int(11) NOT NULL AUTO_INCREMENT,
  `fundraiser_name` varchar(255) NOT NULL,
  PRIMARY KEY (`fundraiser_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fundraisers`
--

LOCK TABLES `fundraisers` WRITE;
/*!40000 ALTER TABLE `fundraisers` DISABLE KEYS */;
INSERT INTO `fundraisers` VALUES (1,'Fundraiser 1'),(2,'Fundraiser 2'),(3,'Fundraiser 3'),(4,'test'),(5,'Fundraiser 4'),(6,'test1');
/*!40000 ALTER TABLE `fundraisers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `fundraiser_id` int(11) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_text` text,
  `review_name` varchar(255) DEFAULT NULL,
  `review_email` varchar(255) DEFAULT NULL,
  `review_date` datetime NOT NULL,
  `review_ip` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,5,'What a great fundraiser!','Tim Doyle','coder.td@gmail.com','2017-05-17 05:08:17','192.168.1.64'),(2,2,3,'I loved this fundraiser!','Tim Doyle','coder.td@gmail.com','2017-05-17 05:43:59','192.168.1.33'),(3,2,1,'This fundraiser could have been better.','Tim Doyle','coder.td@gmail.com','2017-05-17 05:44:18','192.168.1.32'),(4,1,1,'This fundraiser could have been better.','Tim Doyle','coder.td@gmail.com','2017-05-17 05:45:55','192.168.1.32'),(5,1,3,'I loved this fundraiser!','Tim Doyle','coder.td@gmail.com','2017-05-17 05:46:08','192.168.1.33'),(6,2,5,'test test 123','Tim Doyle','coder.td@gmail.com','2017-05-17 07:09:56',NULL),(7,2,5,'asfasfasdf\r\nasdf\r\nasdf\r\nasdf\r\nasd\r\nfas\r\ndfas\r\ndfasdfasdfasdf','asdfasfasdf','tim@test.com','2017-05-17 07:10:51','10.0.2.2'),(8,2,3,'test','tim doyle','test@test.com','2017-05-17 07:11:34','10.0.2.2'),(9,2,4,'test\r\222','test test','test@test.com','2017-05-17 07:13:40','10.0.2.2'),(10,2,5,'xyz','Tim Doyle','test@test.com','2017-05-17 03:27:36','10.0.2.2'),(11,1,5,'This was a good fundraiser.','Tim Doyle','tdoyle12345@gmail.com','2017-05-17 03:53:46','10.0.2.2'),(12,4,1,'test test test test test','Tim Doyle','tdoyle12345@gmail.com','2017-05-17 04:36:09','10.0.2.2'),(13,5,3,'test test test test','tim doyle','coder.td@gmail.com','2017-05-17 04:57:51','10.0.2.2'),(14,6,2,'test test test test test','asdfasdf','test@test.com','2017-05-17 05:11:31','10.0.2.2');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18  4:12:47
