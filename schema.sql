-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `tclients`
--

DROP TABLE IF EXISTS `tclients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tclients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tclients`
--

LOCK TABLES `tclients` WRITE;
/*!40000 ALTER TABLE `tclients` DISABLE KEYS */;
INSERT INTO `tclients` VALUES (1,'Quentin','Martinez','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','qmz@algobreizh.fr',1,'qmz'),(2,'Paul','Besret','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','bst@algobreizh.fr',1,'bst'),(3,'Dorian','Pilorge','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','dpe@algobreizh.fr',0,'dpe');
/*!40000 ALTER TABLE `tclients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torders`
--

DROP TABLE IF EXISTS `torders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_clientId` (`client_id`),
  CONSTRAINT `FK_clientId` FOREIGN KEY (`client_id`) REFERENCES `tclients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torders`
--

LOCK TABLES `torders` WRITE;
/*!40000 ALTER TABLE `torders` DISABLE KEYS */;
INSERT INTO `torders` VALUES (1,'2017-09-28 07:18:22',1,0);
/*!40000 ALTER TABLE `torders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torderscontent`
--

DROP TABLE IF EXISTS `torderscontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torderscontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_OrderId` (`order_id`),
  KEY `FK_ProductId` (`product_id`),
  CONSTRAINT `FK_OrderId` FOREIGN KEY (`order_id`) REFERENCES `torders` (`id`),
  CONSTRAINT `FK_ProductId` FOREIGN KEY (`product_id`) REFERENCES `tproducts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torderscontent`
--

LOCK TABLES `torderscontent` WRITE;
/*!40000 ALTER TABLE `torderscontent` DISABLE KEYS */;
INSERT INTO `torderscontent` VALUES (1,1,1,1);
/*!40000 ALTER TABLE `torderscontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproducts`
--

DROP TABLE IF EXISTS `tproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproducts`
--

LOCK TABLES `tproducts` WRITE;
/*!40000 ALTER TABLE `tproducts` DISABLE KEYS */;
INSERT INTO `tproducts` VALUES (1,'chrondus crispus','chrondus-crispus',10,'P001'),(2,'conserves','conserves',8,'P002'),(3,'court-bouillon','court-bouillon',12,'P003'),(4,'emiette-de-thon-wakame','emiette-de-thon-wakame',10,'P004'),(5,'epices-marines','epices-marines',9,'P005'),(6,'haricot-de-mer-en-saumure-500-g','haricot-de-mer-en-saumure-500-g',9,'P006'),(8,'haricot-de-mer-en-saumure-500-g','haricot-de-mer-en-saumure-500-g',19,'P007'),(9,'haricots-marins','haricots-marins',12.5,'P008'),(10,'laitue-de-mer-feuilles','laitue-de-mer-feuilles',11.9,'P010'),(11,'laitue-de-mer-paillete','laitue-de-mer-paillete',18.5,'P011'),(12,'moutarde-salicorne','moutarde-salicorne',15.5,'P012'),(13,'nori-en-feuilles','nori-en-feuilles',15.1,'P013'),(14,'nori-paillette','nori-paillette',7.5,'P014'),(15,'nori-saupoudreur-aromate-10g','nori-saupoudreur-aromate-10g',5,'P015'),(16,'pates-aux-algues','pates-aux-algues',8,'P016'),(18,'salicornes_au_naturel','salicornes_au_naturel',9.5,'P018'),(19,'salicornes_au_vinaigre','salicornes_au_vinaigre',13.8,'P019'),(20,'sels-aux-algues','sels-aux-algues',17,'P020'),(21,'tisane-aux-algues','tisane-aux-algues',7,'P021'),(22,'wakame_feuille','wakame_feuille',5,'P022'),(23,'wakame-paillette','wakame-paillette',8,'P023');
/*!40000 ALTER TABLE `tproducts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-28 11:48:31
