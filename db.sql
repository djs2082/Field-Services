-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: DBS_PROJECT
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admins` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admins`
--

LOCK TABLES `Admins` WRITE;
/*!40000 ALTER TABLE `Admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `Admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Class` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `class` int(2) NOT NULL,
  `Division` char(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Class`
--

LOCK TABLES `Class` WRITE;
/*!40000 ALTER TABLE `Class` DISABLE KEYS */;
INSERT INTO `Class` VALUES (0000000001,2,'B'),(0000000002,7,'A'),(0000000003,2,'B');
/*!40000 ALTER TABLE `Class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customers`
--

DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pin_code` varchar(6) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `cookie_hash` varchar(32) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customers`
--

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;
INSERT INTO `Customers` VALUES (1,'Dilip','Joshi','2017bcs042@sggs.ac.in','9834091079','Male','kalamandier','431601','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded');
/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Parents`
--

DROP TABLE IF EXISTS `Parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Parents` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `MObile` int(10) NOT NULL,
  `Relation` varchar(15) NOT NULL,
  `SID` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `SID` (`SID`),
  CONSTRAINT `Parents_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `Students` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Parents`
--

LOCK TABLES `Parents` WRITE;
/*!40000 ALTER TABLE `Parents` DISABLE KEYS */;
/*!40000 ALTER TABLE `Parents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Service_Providers`
--

DROP TABLE IF EXISTS `Service_Providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Service_Providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) DEFAULT NULL,
  `week_start` int(10) DEFAULT NULL,
  `week_end` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pin_code` varchar(6) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `cookie_hash` varchar(32) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `busy` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Service_Providers`
--

LOCK TABLES `Service_Providers` WRITE;
/*!40000 ALTER TABLE `Service_Providers` DISABLE KEYS */;
INSERT INTO `Service_Providers` VALUES (1,'Electrician',0,6,'09:00:00','22:00:00','Aniket','Mathpati','2017bcs050@sggs.ac.in','7840982738','Male','vishnupuri','431606','25d55ad283aa400af464c76d713c07ad',NULL,'Rajasthan','Dungarpur',0),(2,'Electrician',0,6,'09:00:00','22:00:00','Dilip','Joshi','2017bcs042@sggs.ac.in','9834091079','Male','kalamandier','431601','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded',0),(3,'Electrician',0,6,'09:00:00','22:00:00','Amol','Patil','2017bec006@sggs.ac.in','9537483193','Male','vishnupuri','431601','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded',0),(4,'Electrician',0,6,'09:00:00','22:00:00','Shrikant','Gajewar','2017bec036@sggs.ac.in','9537483332','Male','vishnupuri','431602','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded',0),(5,'Electrician',0,6,'09:00:00','22:00:00','Nikita','Dhake','2017bcs036@sggs.ac.in','9537483331','Female','vishnupuri','431603','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded',0),(6,'Electrician',0,6,'09:00:00','22:00:00','Bhushan','Nawale','2017bcs060@sggs.ac.in','9537483336','Male','vishnupuri','431604','25d55ad283aa400af464c76d713c07ad',NULL,'Maharashtra','Nanded',0),(7,'Laundary Service',0,6,'09:00:00','22:00:00','Prajyot','Mahatme','2017bcs046@sggs.ac.in','6284761933','Male','Vishnupuri','431608','14b203a7f25303e2b102795d1222866e',NULL,'Maharashtra','Nanded',0);
/*!40000 ALTER TABLE `Service_Providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `DOB` varchar(15) DEFAULT NULL,
  `Class_id` int(10) unsigned zerofill DEFAULT NULL,
  `PID` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PID` (`PID`),
  KEY `Class_id` (`Class_id`),
  CONSTRAINT `Students_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `Parents` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Students_ibfk_2` FOREIGN KEY (`Class_id`) REFERENCES `Class` (`ID`),
  CONSTRAINT `Students_ibfk_3` FOREIGN KEY (`Class_id`) REFERENCES `Class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Students_ibfk_4` FOREIGN KEY (`Class_id`) REFERENCES `Class` (`ID`),
  CONSTRAINT `Students_ibfk_5` FOREIGN KEY (`Class_id`) REFERENCES `Class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students`
--

LOCK TABLES `Students` WRITE;
/*!40000 ALTER TABLE `Students` DISABLE KEYS */;
/*!40000 ALTER TABLE `Students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Subjects`
--

DROP TABLE IF EXISTS `Subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Subjects` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `class_Id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `class_Id` (`class_Id`),
  CONSTRAINT `Subjects_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Class` (`ID`),
  CONSTRAINT `Subjects_ibfk_2` FOREIGN KEY (`class_Id`) REFERENCES `Class` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Subjects`
--

LOCK TABLES `Subjects` WRITE;
/*!40000 ALTER TABLE `Subjects` DISABLE KEYS */;
INSERT INTO `Subjects` VALUES (0000000001,'science',0000000002);
/*!40000 ALTER TABLE `Subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Teacher_and_Subjects`
--

DROP TABLE IF EXISTS `Teacher_and_Subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teacher_and_Subjects` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `TID` int(10) unsigned zerofill NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject_id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TID` (`TID`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `Teacher_and_Subjects_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `Teachers` (`ID`),
  CONSTRAINT `Teacher_and_Subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `Subjects` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teacher_and_Subjects`
--

LOCK TABLES `Teacher_and_Subjects` WRITE;
/*!40000 ALTER TABLE `Teacher_and_Subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `Teacher_and_Subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Teachers`
--

DROP TABLE IF EXISTS `Teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teachers` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Mobile` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teachers`
--

LOCK TABLES `Teachers` WRITE;
/*!40000 ALTER TABLE `Teachers` DISABLE KEYS */;
INSERT INTO `Teachers` VALUES (0000000001,'Rahul','Sharma','Shimla',123456789);
/*!40000 ALTER TABLE `Teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forgot_password`
--

DROP TABLE IF EXISTS `forgot_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forgot_password` (
  `id` int(11) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forgot_password`
--

LOCK TABLES `forgot_password` WRITE;
/*!40000 ALTER TABLE `forgot_password` DISABLE KEYS */;
INSERT INTO `forgot_password` VALUES (1,'f42b88f35dfec37431f68d0305853c88',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'5bf5c9dfee6141877d409fb9c7361ef9',NULL),(1,'7c02e58d3ceff37194ebb7dfd274f8e7','Customer');
/*!40000 ALTER TABLE `forgot_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_requested`
--

DROP TABLE IF EXISTS `services_requested`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_requested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `rpid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `accept` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_requested`
--

LOCK TABLES `services_requested` WRITE;
/*!40000 ALTER TABLE `services_requested` DISABLE KEYS */;
INSERT INTO `services_requested` VALUES (1,1,2,431601,431601,0),(2,2,3,431601,431601,0),(3,4,4,431601,431602,0),(4,0,6,431601,431604,0);
/*!40000 ALTER TABLE `services_requested` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-10 23:49:51
