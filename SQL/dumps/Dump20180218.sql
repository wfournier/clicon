-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: clicon
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAST_NAME` varchar(20) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `PREF_BADGE_NAME` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASS_HASH` varchar(255) NOT NULL,
  `PASS_RESET_TOKEN` varchar(64) DEFAULT NULL,
  `TOKEN_EXPIRY` datetime DEFAULT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `ZIP` varchar(7) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL,
  `STATE_ID` int(11) NOT NULL,
  `IS_ADULT` varchar(5) NOT NULL,
  `EMERGENCY_CONTACT_PHONE` varchar(20) DEFAULT NULL,
  `EMERGENCY_CONTACT_NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  KEY `ACCOUNT_FK_COUNTRY_ID_idx` (`COUNTRY_ID`),
  KEY `ACCOUNT_FK_STATE_ID_idx` (`STATE_ID`),
  CONSTRAINT `ACCOUNT_FK_COUNTRY_ID` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `countries` (`COUNTRY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ACCOUNT_FK_STATE_ID` FOREIGN KEY (`STATE_ID`) REFERENCES `states` (`STATE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (11,'Martel','Remi','luxor37','luxor37@gmail.com','$2y$10$br.3nKtu9/DOGbJLj8KF5OF9k2p1YD.ceDZG0laRfoWI5M7uTW/Ay',NULL,NULL,'1998-01-01','4506473481','1800 Basset','Longueuil','J4M1W5',38,11,'TRUE','','');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendee`
--

DROP TABLE IF EXISTS `attendee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendee` (
  `ATTENDEE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `IS_VOLUNTEER` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`ATTENDEE_ID`),
  KEY `ATTENDEE_FK_ACCOUNT_ID_idx` (`ACCOUNT_ID`),
  CONSTRAINT `ATTENDEE_FK_ACCOUNT_ID` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `account` (`ACCOUNT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendee`
--

LOCK TABLES `attendee` WRITE;
/*!40000 ALTER TABLE `attendee` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COUNTRY_CODE` varchar(2) NOT NULL DEFAULT '',
  `COUNTRY_NAME` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`COUNTRY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'DS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'KH','Cambodia'),(37,'CM','Cameroon'),(38,'CA','Canada'),(39,'CV','Cape Verde'),(40,'KY','Cayman Islands'),(41,'CF','Central African Republic'),(42,'TD','Chad'),(43,'CL','Chile'),(44,'CN','China'),(45,'CX','Christmas Island'),(46,'CC','Cocos (Keeling) Islands'),(47,'CO','Colombia'),(48,'KM','Comoros'),(49,'CG','Congo'),(50,'CK','Cook Islands'),(51,'CR','Costa Rica'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'TP','East Timor'),(61,'EC','Ecuador'),(62,'EG','Egypt'),(63,'SV','El Salvador'),(64,'GQ','Equatorial Guinea'),(65,'ER','Eritrea'),(66,'EE','Estonia'),(67,'ET','Ethiopia'),(68,'FK','Falkland Islands (Malvinas)'),(69,'FO','Faroe Islands'),(70,'FJ','Fiji'),(71,'FI','Finland'),(72,'FR','France'),(73,'FX','France, Metropolitan'),(74,'GF','French Guiana'),(75,'PF','French Polynesia'),(76,'TF','French Southern Territories'),(77,'GA','Gabon'),(78,'GM','Gambia'),(79,'GE','Georgia'),(80,'DE','Germany'),(81,'GH','Ghana'),(82,'GI','Gibraltar'),(83,'GK','Guernsey'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'IM','Isle of Man'),(101,'ID','Indonesia'),(102,'IR','Iran (Islamic Republic of)'),(103,'IQ','Iraq'),(104,'IE','Ireland'),(105,'IL','Israel'),(106,'IT','Italy'),(107,'CI','Ivory Coast'),(108,'JE','Jersey'),(109,'JM','Jamaica'),(110,'JP','Japan'),(111,'JO','Jordan'),(112,'KZ','Kazakhstan'),(113,'KE','Kenya'),(114,'KI','Kiribati'),(115,'KP','Korea, Democratic People\'s Republic of'),(116,'KR','Korea, Republic of'),(117,'XK','Kosovo'),(118,'KW','Kuwait'),(119,'KG','Kyrgyzstan'),(120,'LA','Lao People\'s Democratic Republic'),(121,'LV','Latvia'),(122,'LB','Lebanon'),(123,'LS','Lesotho'),(124,'LR','Liberia'),(125,'LY','Libyan Arab Jamahiriya'),(126,'LI','Liechtenstein'),(127,'LT','Lithuania'),(128,'LU','Luxembourg'),(129,'MO','Macau'),(130,'MK','Macedonia'),(131,'MG','Madagascar'),(132,'MW','Malawi'),(133,'MY','Malaysia'),(134,'MV','Maldives'),(135,'ML','Mali'),(136,'MT','Malta'),(137,'MH','Marshall Islands'),(138,'MQ','Martinique'),(139,'MR','Mauritania'),(140,'MU','Mauritius'),(141,'TY','Mayotte'),(142,'MX','Mexico'),(143,'FM','Micronesia, Federated States of'),(144,'MD','Moldova, Republic of'),(145,'MC','Monaco'),(146,'MN','Mongolia'),(147,'ME','Montenegro'),(148,'MS','Montserrat'),(149,'MA','Morocco'),(150,'MZ','Mozambique'),(151,'MM','Myanmar'),(152,'NA','Namibia'),(153,'NR','Nauru'),(154,'NP','Nepal'),(155,'NL','Netherlands'),(156,'AN','Netherlands Antilles'),(157,'NC','New Caledonia'),(158,'NZ','New Zealand'),(159,'NI','Nicaragua'),(160,'NE','Niger'),(161,'NG','Nigeria'),(162,'NU','Niue'),(163,'NF','Norfolk Island'),(164,'MP','Northern Mariana Islands'),(165,'NO','Norway'),(166,'OM','Oman'),(167,'PK','Pakistan'),(168,'PW','Palau'),(169,'PS','Palestine'),(170,'PA','Panama'),(171,'PG','Papua New Guinea'),(172,'PY','Paraguay'),(173,'PE','Peru'),(174,'PH','Philippines'),(175,'PN','Pitcairn'),(176,'PL','Poland'),(177,'PT','Portugal'),(178,'PR','Puerto Rico'),(179,'QA','Qatar'),(180,'RE','Reunion'),(181,'RO','Romania'),(182,'RU','Russian Federation'),(183,'RW','Rwanda'),(184,'KN','Saint Kitts and Nevis'),(185,'LC','Saint Lucia'),(186,'VC','Saint Vincent and the Grenadines'),(187,'WS','Samoa'),(188,'SM','San Marino'),(189,'ST','Sao Tome and Principe'),(190,'SA','Saudi Arabia'),(191,'SN','Senegal'),(192,'RS','Serbia'),(193,'SC','Seychelles'),(194,'SL','Sierra Leone'),(195,'SG','Singapore'),(196,'SK','Slovakia'),(197,'SI','Slovenia'),(198,'SB','Solomon Islands'),(199,'SO','Somalia'),(200,'ZA','South Africa'),(201,'GS','South Georgia South Sandwich Islands'),(202,'ES','Spain'),(203,'LK','Sri Lanka'),(204,'SH','St. Helena'),(205,'PM','St. Pierre and Miquelon'),(206,'SD','Sudan'),(207,'SR','Suriname'),(208,'SJ','Svalbard and Jan Mayen Islands'),(209,'SZ','Swaziland'),(210,'SE','Sweden'),(211,'CH','Switzerland'),(212,'SY','Syrian Arab Republic'),(213,'TW','Taiwan'),(214,'TJ','Tajikistan'),(215,'TZ','Tanzania, United Republic of'),(216,'TH','Thailand'),(217,'TG','Togo'),(218,'TK','Tokelau'),(219,'TO','Tonga'),(220,'TT','Trincountry_idad and Tobago'),(221,'TN','Tunisia'),(222,'TR','Turkey'),(223,'TM','Turkmenistan'),(224,'TC','Turks and Caicos Islands'),(225,'TV','Tuvalu'),(226,'UG','Uganda'),(227,'UA','Ukraine'),(228,'AE','United Arab Emirates'),(229,'GB','United Kingdom'),(230,'US','United States'),(231,'UM','United States minor outlying islands'),(232,'UY','Uruguay'),(233,'UZ','Uzbekistan'),(234,'VU','Vanuatu'),(235,'VA','Vatican City State'),(236,'VE','Venezuela'),(237,'VN','Vietnam'),(238,'VG','Virgin Islands (British)'),(239,'VI','Virgin Islands (U.S.)'),(240,'WF','Wallis and Futuna Islands'),(241,'EH','Western Sahara'),(242,'YE','Yemen'),(243,'ZR','Zaire'),(244,'ZM','Zambia'),(245,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) DEFAULT NULL,
  `BANDANA_COLOR` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `HOTEL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) DEFAULT NULL,
  `ADDRESS` varchar(30) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`HOTEL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelroom`
--

DROP TABLE IF EXISTS `hotelroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelroom` (
  `HOTEL_ROOM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HOTEL_ID` int(11) DEFAULT NULL,
  `ROOM_NUM` int(11) DEFAULT NULL,
  PRIMARY KEY (`HOTEL_ROOM_ID`),
  KEY `HOTEL_ROOM_FK_HOTEL_ID_idx` (`HOTEL_ID`),
  CONSTRAINT `HOTEL_ROOM_FK_HOTEL_ID` FOREIGN KEY (`HOTEL_ID`) REFERENCES `hotel` (`HOTEL_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelroom`
--

LOCK TABLES `hotelroom` WRITE;
/*!40000 ALTER TABLE `hotelroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotelroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_accountid` int(11) DEFAULT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `session_serial` int(11) DEFAULT NULL,
  `session_date` date DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `FK_ACCOUNTID_idx` (`session_accountid`),
  CONSTRAINT `SESSIONS_FK_ACCOUNT_ID` FOREIGN KEY (`session_accountid`) REFERENCES `account` (`ACCOUNT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (5,11,'0f04d7054079e0626e23efab9a8aa2d7a728daf6c49de421c06e873ccd1534f5',NULL,NULL);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `DEPT_ID` int(11) DEFAULT NULL,
  `HOTEL_ROOM_ID` int(11) DEFAULT NULL,
  `SHIRT_SIZE` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`STAFF_ID`),
  KEY `STAFF_FK_ACCOUNT_ID_idx` (`ACCOUNT_ID`),
  KEY `STAFF_FK_DEPT_ID_idx` (`DEPT_ID`),
  KEY `STAFF_FK_HOTEL_ROOM_ID_idx` (`HOTEL_ROOM_ID`),
  CONSTRAINT `STAFF_FK_ACCOUNT_ID` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `account` (`ACCOUNT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `STAFF_FK_DEPT_ID` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `STAFF_FK_HOTEL_ROOM_ID` FOREIGN KEY (`HOTEL_ROOM_ID`) REFERENCES `hotelroom` (`HOTEL_ROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `STATE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COUNTRY_ID` int(11) NOT NULL,
  `STATE_CODE` varchar(2) NOT NULL,
  `STATE_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`STATE_ID`,`COUNTRY_ID`),
  KEY `STATES_FK_COUNTRY_ID_idx` (`COUNTRY_ID`),
  CONSTRAINT `STATES_FK_COUNTRY_ID` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `countries` (`COUNTRY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,38,'AB','Alberta'),(2,38,'BC','British Columbia'),(3,38,'MB','Manitoba'),(4,38,'NB','New Brunswick'),(5,38,'NL','Newfoundland and Labrador'),(6,38,'NT','Northwest Territories'),(7,38,'NS','Nova Scotia'),(8,38,'NU','Nunavut'),(9,38,'ON','Ontario'),(10,38,'PE','Prince Edward Island'),(11,38,'QC','Quebec'),(12,38,'SK','Saskatchewan'),(13,38,'YT','Yukon'),(14,230,'AL','Alabama'),(15,230,'AK','Alaska'),(16,230,'AZ','Arizona'),(17,230,'AR','Arkansas'),(18,230,'CA','California'),(19,230,'CO','Colorado'),(20,230,'CT','Connecticut'),(21,230,'DE','Delaware'),(22,230,'FL','Florida'),(23,230,'GA','Georgia'),(24,230,'HI','Hawaii'),(25,230,'ID','Idaho'),(26,230,'IL','Illinois'),(27,230,'IN','Indiana'),(28,230,'IA','Iowa'),(29,230,'KS','Kansas'),(30,230,'KY','Kentucky'),(31,230,'LA','Louisiana'),(32,230,'ME','Maine'),(33,230,'MD','Maryland'),(34,230,'MA','Massachusetts'),(35,230,'MI','Michigan'),(36,230,'MN','Minnesota'),(37,230,'MS','Mississippi'),(38,230,'MO','Missouri'),(39,230,'MT','Montana'),(40,230,'NE','Nebraska'),(41,230,'NV','Nevada'),(42,230,'NH','New Hampshire'),(43,230,'NJ','New Jersey'),(44,230,'NM','New Mexico'),(45,230,'NY','New York'),(46,230,'NC','North Carolina'),(47,230,'ND','North Dakota'),(48,230,'OH','Ohio'),(49,230,'OK','Oklahoma'),(50,230,'OR','Oregon'),(51,230,'PA','Pennsylvania'),(52,230,'RI','Rhode Island'),(53,230,'SC','South Carolina'),(54,230,'SD','South Dakota'),(55,230,'TN','Tennessee'),(56,230,'TX','Texas'),(57,230,'UT','Utah'),(58,230,'VT','Vermont'),(59,230,'VA','Virginia'),(60,230,'WA','Washington'),(61,230,'WV','West Virginia'),(62,230,'WI','Wisconsin'),(63,230,'WY','Wyoming');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANSACTION_ID` int(11) NOT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `EXTRAS` varchar(50) DEFAULT NULL,
  `TICKET_TYPE` varchar(20) DEFAULT NULL,
  `BADGE_NAME` varchar(20) DEFAULT NULL,
  `ID_TOKEN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TICKET_ID`),
  KEY `TICKET_FK_ACCOUNT_ID_idx` (`TRANSACTION_ID`),
  CONSTRAINT `TICKET_FK_TRANSACTION_ID` FOREIGN KEY (`TRANSACTION_ID`) REFERENCES `transaction` (`TRANSACTION_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `PRICE_TOTAL` int(11) DEFAULT NULL,
  `PURCHASE_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_TOKEN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TRANSACTION_ID`),
  KEY `TRANSACTION_FK_ACCOUNT_ID_idx` (`ACCOUNT_ID`),
  CONSTRAINT `TRANSACTION_FK_ACCOUNT_ID` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `account` (`ACCOUNT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-18 22:13:50
