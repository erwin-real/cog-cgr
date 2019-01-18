-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: reporting
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8_general_ci */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8_general_ci */;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'member',
  `is_leader` tinyint(1) NOT NULL DEFAULT '0',
  `head_cluster_area` varchar(30) DEFAULT NULL,
  `cluster_area` varchar(30) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `group_age` varchar(10) NOT NULL,
  `journey` varchar(20) NOT NULL,
  `cldp` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account`
VALUES (1,'master','master','master',0,NULL,'Angeles',0,1,'Master','Master','1990-03-20',NULL,'Male','Men','None',NULL),
(2,'admin','admin','admin',1,NULL,'Malabanias',0,1,'Ptra. Sharon Rose Tiru','Church of God Clarkview','1990-03-20',NULL,'Female','Women','Leader',NULL),
(4,'machelle','machelle','cluster head',1,'Clark','Clark',3,1,'Machelle Del Mundo','Machelle Del Mundo address','1994-04-04','4','Female','Women','Leader',NULL),
(5,NULL,NULL,'member',0,NULL,'Clark',4,1,'Alpha Bansil','Alpha Bansil address','1990-01-01','12312312','Female','Women','Believer',NULL),
(6,NULL,NULL,'member',0,NULL,'Clark',4,1,'Alice Dioquino','Alice Dioquino address','1992-02-02','2','Female','Women','Believer',NULL),
(7,NULL,NULL,'member',0,NULL,'Clark',4,1,'Mhel Magbitang','Mhel Magbitang address','1993-03-03','3','Female','Women','Believer',NULL),
(8,NULL,NULL,'member',0,NULL,'Clark',4,1,'Joy Malondon','Joy Malondon address','1994-04-04','4','Female','Women','Believer',NULL),
(9,NULL,NULL,'member',0,NULL,'Clark',4,1,'Lyra Sagao','Lyra Sagao address','1995-05-05','5','Female','Women','Believer',NULL),
(10,'narlyn','narlyn','leader',1,NULL,'Clark',4,1,'Narlyn Soberano','Narlyn Soberano address','1996-06-06','6','Female','Women','Leader',NULL),
(11,NULL,NULL,'member',0,NULL,'Clark',4,0,'Sonia Pili','Sonia Pili address','1997-07-07','7','Female','Women','Believer',NULL),
(12,NULL,NULL,'member',0,NULL,'Clark',4,0,'Jen','Jen address','1998-08-08','8','Female','Women','Believer',NULL),
(13,'beth','beth','leader',1,NULL,'Clark',3,1,'Beth Sales','Bamban','1990-01-01','321','Female','Women','Leader',NULL),
(14,NULL,NULL,'member',0,NULL,'Clark',13,1,'Wennie Abejero','Wennie Abejero address','1991-01-01','1','Female','Women','Believer',NULL),
(15,NULL,NULL,'member',0,NULL,'Clark',13,1,'Mercy Asakil','Mercy Asakil address','1992-02-02','2','Female','Women','Believer',NULL),
(16,NULL,NULL,'member',0,NULL,'Clark',13,1,'Marie Joyce Catalan','Marie Joyce Catalan address','1993-03-03','3','Female','Women','Believer',NULL),
(17,NULL,NULL,'member',0,NULL,'Clark',13,1,'Felina Diño','Felina Diño address','1994-04-04','4','Female','Women','Believer',NULL),
(18,NULL,NULL,'member',0,NULL,'Clark',13,1,'Ruby Flores','Ruby Flores address','1995-05-05','5','Female','Women','Believer',NULL),
(19,NULL,NULL,'member',0,NULL,'Clark',13,1,'Elizabeth Lardizabal','Elizabeth Lardizabal address','1996-06-06','6','Female','Women','Believer',NULL),
(20,NULL,NULL,'member',0,NULL,'Clark',13,1,'Catherine Malimban','Catherine Malimban address','1997-07-07','7','Female','Women','Believer',NULL),
(21,NULL,NULL,'member',0,NULL,'Clark',13,1,'Lilibeth Mangalao','Lilibeth Mangalao address','1998-08-08','8','Female','Women','Believer',NULL),
(22,NULL,NULL,'member',0,NULL,'Clark',13,1,'Elma Palis','Elma Palis address','1999-09-09','9','Female','Women','Believer',NULL),
(23,NULL,NULL,'member',0,NULL,'Clark',13,1,'Chin Rufo','Chin Rufo address','2000-10-10','10','Female','Women','Believer',NULL),
(24,NULL,NULL,'member',0,NULL,'Clark',13,1,'Jenny Tanguilig','Jenny Tanguilig address','2001-11-11','11','Female','Women','Believer',NULL),
(25,NULL,NULL,'member',0,NULL,'Clark',13,0,'Felina Meneses','Felina Meneses address','2002-12-12','12','Female','Women','Believer',NULL),
(26,'mary joyce','mary joyce','leader',1,NULL,'Clark',3,1,'Mary Joyce','Mary Joyce address','1991-01-01','1','Female','Women','Leader',NULL),
(27,NULL,NULL,'member',0,NULL,'Clark',26,1,'Katrine Kate Mercado','Katrine Kate Mercado address','1991-01-01','1','Female','Women','Believer',NULL),
(28,NULL,NULL,'member',0,NULL,'Clark',26,1,'Carolyn Villa','Carolyn Villa address','1992-02-02','2','Female','Women','Believer',NULL),
(29,NULL,NULL,'member',0,NULL,'Clark',26,1,'Anna Angela Cortero','Anna Angela Cortero address','1993-03-03','3','Female','Women','Believer',NULL),
(30,NULL,NULL,'member',0,NULL,'Clark',26,0,'Leah Flores','Leah Flores address','1994-04-04','4','Female','Women','Believer',NULL),
(31,NULL,NULL,'member',0,NULL,'Clark',26,0,'Ruvelyn Fernandez','Ruvelyn Fernandez address','1995-05-05','5','Female','Women','Believer',NULL),
(32,NULL,NULL,'member',0,NULL,'Clark',26,0,'Niña Jereza Burloza','Niña Jereza Burloza address','1996-06-06','6','Female','Women','Believer',NULL),
(33,NULL,NULL,'member',0,NULL,'Clark',26,0,'Dahlia Cuarto','Dahlia Cuarto address','1997-07-07','7','Female','Women','Believer',NULL),
(34,NULL,NULL,'member',0,NULL,'Clark',26,0,'Ma. Fatima Alcoberes','Ma. Fatima Alcoberes address','1998-08-08','8','Female','Women','Believer',NULL),
(35,NULL,NULL,'member',0,NULL,'Clark',10,1,'Cecilia Vesperas','Cecilia Vesperas address','1991-01-01','1','Female','Women','Believer',NULL),
(36,NULL,NULL,'member',0,NULL,'Clark',10,1,'Naneth Ramos','Naneth Ramos address','1992-02-02','2','Female','Women','Believer',NULL),
(37,'lorie','lorie','leader',1,NULL,'Clark',3,1,'Lorie Olan','Lorie Olan address','1990-01-01','1','Female','Women','Leader',NULL),
(38,NULL,NULL,'member',0,NULL,'Clark',37,1,'Maybel Micutuan','Maybel Micutuan address','1991-01-01','1','Female','Women','Believer',NULL),
(39,'nancy','nancy','leader',1,NULL,'Clark',37,1,'Nancy Isip','Nancy Isip address','1992-02-02','2','Female','Women','Leader',NULL),
(40,NULL,NULL,'member',0,NULL,'Clark',37,1,'Enali Dimaano','Enali Dimaano address','1993-03-03','3','Female','Women','Believer',NULL),
(41,NULL,NULL,'member',0,NULL,'Clark',37,0,'Micah Albano','Micah Albano address','1994-04-04','4','Female','Women','Believer',NULL),
(42,NULL,NULL,'member',0,NULL,'Clark',37,0,'Ruth Majan','Ruth Majan address','1995-05-05','5','Female','Women','Believer',NULL),
(43,NULL,NULL,'member',0,NULL,'Clark',39,1,'Dina Meneses','Dina Meneses address','1991-01-01','1','Female','Women','Believer',NULL),
(44,NULL,NULL,'member',0,NULL,'Clark',39,1,'Sabina Dela Cruz','Sabina Dela Cruz address','1992-02-02','2','Female','Women','Believer',NULL),
(45,NULL,NULL,'member',0,NULL,'Clark',39,1,'Lanie Gulawed','Lanie Gulawed address','1993-03-03','3','Female','Women','Believer',NULL),
(46,NULL,NULL,'member',0,NULL,'Clark',39,0,'Elena Brazil','Elena Brazil address','1994-04-04','4','Female','Women','Believer',NULL),
(47,NULL,NULL,'member',0,NULL,'Clark',39,0,'Susan Lacandula','Susan Lacandula address','1995-05-05','5','Female','Women','Believer',NULL),
(48,NULL,NULL,'member',0,NULL,'Clark',39,0,'Fe Santos','Fe Santos address','1996-06-06','6','Female','Women','Believer',NULL),
(49,NULL,NULL,'member',0,NULL,'Clark',39,1,'Jane Sagun','Jane Sagun address','1991-01-01','1','Female','Women','Believer',NULL),
(50,NULL,NULL,'member',0,NULL,'Clark',39,1,'Resie Valdeuiso','Resie Valdeuiso address','1992-02-02','2','Female','Women','Believer',NULL),
(51,NULL,NULL,'member',0,NULL,'Clark',39,0,'Aiko Dias','Aiko Dias address','1993-03-03','3','Female','Women','Believer',NULL),
(52,NULL,NULL,'member',0,NULL,'Clark',39,0,'Cory Sagun','Cory Sagun address','1993-03-03','3','Female','Women','Believer',NULL),
(53,NULL,NULL,'member',0,NULL,'Clark',39,0,'Juliet Espirito','Juliet Espirito address','1995-05-05','5','Female','Women','Believer',NULL),
(54,NULL,NULL,'member',0,NULL,'Clark',39,0,'Ella Salazar','Ella Salazar address','1996-06-06','6','Female','Women','Believer',NULL),
(55,NULL,NULL,'member',0,NULL,'Clark',39,0,'Grehin Martil','Grehin Martil address','1997-07-07','7','Female','Women','Believer',NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8_general_ci */;
CREATE TABLE `report` (
  `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leader_id` int(11) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `c2s_leader` varchar(100) DEFAULT NULL,
  `date_verified` timestamp NULL DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `cluster_area` varchar(30) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_cg` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `topic` varchar(50) NOT NULL,
  `offering` float DEFAULT NULL,
  `present` varchar(255) NOT NULL,
  `absent` varchar(255),
  `consolidation_report` text,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-24 14:08:50
