-- MySQL dump 10.13  Distrib 5.5.40, for Linux (x86_64)
--
-- Host: localhost    Database: phpsites_demomatrixmpsf
-- ------------------------------------------------------
-- Server version	5.5.40-cll

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
-- Table structure for table `adminclicks`
--

DROP TABLE IF EXISTS `adminclicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminclicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '0',
  `adid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminclicks`
--

LOCK TABLES `adminclicks` WRITE;
/*!40000 ALTER TABLE `adminclicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminclicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminlinks`
--

DROP TABLE IF EXISTS `adminlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminlinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL DEFAULT '0',
  `adid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlinks`
--

LOCK TABLES `adminlinks` WRITE;
/*!40000 ALTER TABLE `adminlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminnotes`
--

DROP TABLE IF EXISTS `adminnotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminnotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `htmlcode` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminnotes`
--

LOCK TABLES `adminnotes` WRITE;
/*!40000 ALTER TABLE `adminnotes` DISABLE KEYS */;
INSERT INTO `adminnotes` (`id`, `name`, `htmlcode`) VALUES (1,'Admin Notes','');
/*!40000 ALTER TABLE `adminnotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminsolos`
--

DROP TABLE IF EXISTS `adminsolos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminsolos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `adbody` longtext NOT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  `datesent` int(15) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminsolos`
--

LOCK TABLES `adminsolos` WRITE;
/*!40000 ALTER TABLE `adminsolos` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminsolos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adpacks`
--

DROP TABLE IF EXISTS `adpacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adpacks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `howmanytimeschosen` int(10) unsigned NOT NULL DEFAULT '0',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `surfcredits` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_num` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_views` int(10) unsigned NOT NULL DEFAULT '0',
  `solo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_views` int(10) unsigned NOT NULL DEFAULT '0',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_views` int(10) unsigned NOT NULL DEFAULT '0',
  `button_num` int(10) unsigned NOT NULL DEFAULT '0',
  `button_views` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_num` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_views` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_views` int(10) unsigned NOT NULL DEFAULT '0',
  `enabled` varchar(4) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adpacks`
--

LOCK TABLES `adpacks` WRITE;
/*!40000 ALTER TABLE `adpacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `adpacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertise`
--

DROP TABLE IF EXISTS `advertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `bannerurl` varchar(70) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise`
--

LOCK TABLES `advertise` WRITE;
/*!40000 ALTER TABLE `advertise` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoresponder`
--

DROP TABLE IF EXISTS `autoresponder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoresponder` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `days` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `memtype` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoresponder`
--

LOCK TABLES `autoresponder` WRITE;
/*!40000 ALTER TABLE `autoresponder` DISABLE KEYS */;
/*!40000 ALTER TABLE `autoresponder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banned_emails`
--

DROP TABLE IF EXISTS `banned_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banned_emails` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banned_emails`
--

LOCK TABLES `banned_emails` WRITE;
/*!40000 ALTER TABLE `banned_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `banned_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banneddomains`
--

DROP TABLE IF EXISTS `banneddomains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banneddomains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banneddomains`
--

LOCK TABLES `banneddomains` WRITE;
/*!40000 ALTER TABLE `banneddomains` DISABLE KEYS */;
/*!40000 ALTER TABLE `banneddomains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_clicks`
--

DROP TABLE IF EXISTS `banner_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_clicks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bannerid` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_clicks`
--

LOCK TABLES `banner_clicks` WRITE;
/*!40000 ALTER TABLE `banner_clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `bannerurl` varchar(100) NOT NULL DEFAULT '',
  `targeturl` varchar(70) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `shown` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `show_views` int(9) NOT NULL DEFAULT '0',
  `show_clicks` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bannerviews`
--

DROP TABLE IF EXISTS `bannerviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bannerviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `blid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blid` (`blid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bannerviews`
--

LOCK TABLES `bannerviews` WRITE;
/*!40000 ALTER TABLE `bannerviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `bannerviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `botnav`
--

DROP TABLE IF EXISTS `botnav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `botnav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `targeturl` varchar(70) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `shown` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `show_views` int(9) NOT NULL DEFAULT '0',
  `show_clicks` int(9) NOT NULL DEFAULT '0',
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `botnav`
--

LOCK TABLES `botnav` WRITE;
/*!40000 ALTER TABLE `botnav` DISABLE KEYS */;
/*!40000 ALTER TABLE `botnav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `botnavviews`
--

DROP TABLE IF EXISTS `botnavviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `botnavviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `blid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blid` (`blid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `botnavviews`
--

LOCK TABLES `botnavviews` WRITE;
/*!40000 ALTER TABLE `botnavviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `botnavviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `builder`
--

DROP TABLE IF EXISTS `builder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder` (
  `userid` varchar(20) NOT NULL DEFAULT '',
  `fav1_title` varchar(100) NOT NULL DEFAULT '',
  `fav1_desc` varchar(100) NOT NULL DEFAULT '',
  `fav1_url` varchar(250) NOT NULL DEFAULT '',
  `fav2_title` varchar(100) NOT NULL DEFAULT '',
  `fav2_desc` varchar(100) NOT NULL DEFAULT '',
  `fav2_url` varchar(250) NOT NULL DEFAULT '',
  `fav3_title` varchar(100) NOT NULL DEFAULT '',
  `fav3_desc` varchar(100) NOT NULL DEFAULT '',
  `fav3_url` varchar(250) NOT NULL DEFAULT '',
  `fav1_bold` tinyint(4) NOT NULL DEFAULT '0',
  `fav2_bold` tinyint(4) NOT NULL DEFAULT '0',
  `fav3_bold` tinyint(4) NOT NULL DEFAULT '0',
  `fav1_color` varchar(15) NOT NULL DEFAULT '',
  `fav2_color` varchar(15) NOT NULL DEFAULT '',
  `fav3_color` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder`
--

LOCK TABLES `builder` WRITE;
/*!40000 ALTER TABLE `builder` DISABLE KEYS */;
/*!40000 ALTER TABLE `builder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `builder_cat`
--

DROP TABLE IF EXISTS `builder_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder_cat` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `order` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder_cat`
--

LOCK TABLES `builder_cat` WRITE;
/*!40000 ALTER TABLE `builder_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `builder_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `builder_fav`
--

DROP TABLE IF EXISTS `builder_fav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder_fav` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `bold` tinyint(4) NOT NULL DEFAULT '0',
  `color` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder_fav`
--

LOCK TABLES `builder_fav` WRITE;
/*!40000 ALTER TABLE `builder_fav` DISABLE KEYS */;
/*!40000 ALTER TABLE `builder_fav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `builder_sites`
--

DROP TABLE IF EXISTS `builder_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder_sites` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `order` int(9) NOT NULL DEFAULT '0',
  `category` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder_sites`
--

LOCK TABLES `builder_sites` WRITE;
/*!40000 ALTER TABLE `builder_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `builder_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buttons`
--

DROP TABLE IF EXISTS `buttons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buttons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `bannerurl` varchar(100) NOT NULL DEFAULT '',
  `targeturl` varchar(70) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `shown` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `show_views` int(9) NOT NULL DEFAULT '0',
  `show_clicks` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttons`
--

LOCK TABLES `buttons` WRITE;
/*!40000 ALTER TABLE `buttons` DISABLE KEYS */;
/*!40000 ALTER TABLE `buttons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buttonviews`
--

DROP TABLE IF EXISTS `buttonviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buttonviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `blid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blid` (`blid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttonviews`
--

LOCK TABLES `buttonviews` WRITE;
/*!40000 ALTER TABLE `buttonviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `buttonviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cashoutrequests`
--

DROP TABLE IF EXISTS `cashoutrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cashoutrequests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `paypal` varchar(255) NOT NULL,
  `payza` varchar(255) NOT NULL,
  `egopay` varchar(255) NOT NULL,
  `perfectmoney` varchar(255) NOT NULL,
  `okpay` varchar(255) NOT NULL,
  `solidtrustpay` varchar(255) NOT NULL,
  `moneybookers` varchar(255) NOT NULL,
  `amountrequested` decimal(9,2) NOT NULL DEFAULT '0.00',
  `owed` decimal(9,2) NOT NULL DEFAULT '0.00',
  `daterequested` datetime NOT NULL,
  `paid` decimal(9,2) NOT NULL,
  `lastpaid` datetime NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cashoutrequests`
--

LOCK TABLES `cashoutrequests` WRITE;
/*!40000 ALTER TABLE `cashoutrequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashoutrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clicks`
--

DROP TABLE IF EXISTS `clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '0',
  `adid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clicks`
--

LOCK TABLES `clicks` WRITE;
/*!40000 ALTER TABLE `clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `iso_code2` char(2) NOT NULL DEFAULT '',
  `iso_code3` char(3) NOT NULL DEFAULT '',
  `reserved1` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`),
  KEY `IDX_COUNTRIES_NAME` (`country_name`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`country_id`, `country_name`, `iso_code2`, `iso_code3`, `reserved1`) VALUES (1,'Afghanistan','AF','AFG',0),(2,'Albania','AL','ALB',0),(3,'Algeria','DZ','DZA',0),(4,'American Samoa','AS','ASM',0),(5,'Andorra','AD','AND',0),(6,'Angola','AO','AGO',0),(7,'Anguilla','AI','AIA',0),(8,'Antarctica','AQ','ATA',0),(9,'Antigua and Barbuda','AG','ATG',0),(10,'Argentina','AR','ARG',0),(11,'Armenia','AM','ARM',0),(12,'Aruba','AW','ABW',0),(13,'Australia','AU','AUS',0),(14,'Austria','AT','AUT',0),(15,'Azerbaijan','AZ','AZE',0),(16,'Bahamas','BS','BHS',0),(17,'Bahrain','BH','BHR',0),(18,'Bangladesh','BD','BGD',0),(19,'Barbados','BB','BRB',0),(20,'Belarus','BY','BLR',0),(21,'Belgium','BE','BEL',0),(22,'Belize','BZ','BLZ',0),(23,'Benin','BJ','BEN',0),(24,'Bermuda','BM','BMU',0),(25,'Bhutan','BT','BTN',0),(26,'Bolivia','BO','BOL',0),(27,'Bosnia and Herzegowina','BA','BIH',0),(28,'Botswana','BW','BWA',0),(29,'Bouvet Island','BV','BVT',0),(30,'Brazil','BR','BRA',0),(31,'British Indian Ocean Territory','IO','IOT',0),(32,'Brunei Darussalam','BN','BRN',0),(33,'Bulgaria','BG','BGR',0),(34,'Burkina Faso','BF','BFA',0),(35,'Burundi','BI','BDI',0),(36,'Cambodia','KH','KHM',0),(37,'Cameroon','CM','CMR',0),(38,'Canada','CA','CAN',0),(39,'Cape Verde','CV','CPV',0),(40,'Cayman Islands','KY','CYM',0),(41,'Central African Republic','CF','CAF',0),(42,'Chad','TD','TCD',0),(43,'Chile','CL','CHL',0),(44,'China','CN','CHN',0),(45,'Christmas Island','CX','CXR',0),(46,'Cocos (Keeling) Islands','CC','CCK',0),(47,'Colombia','CO','COL',0),(48,'Comoros','KM','COM',0),(49,'Congo','CG','COG',0),(50,'Cook Islands','CK','COK',0),(51,'Costa Rica','CR','CRI',0),(52,'Cote D\'Ivoire','CI','CIV',0),(53,'Croatia','HR','HRV',0),(54,'Cuba','CU','CUB',0),(55,'Cyprus','CY','CYP',0),(56,'Czech Republic','CZ','CZE',0),(57,'Denmark','DK','DNK',0),(58,'Djibouti','DJ','DJI',0),(59,'Dominica','DM','DMA',0),(60,'Dominican Republic','DO','DOM',0),(61,'East Timor','TP','TMP',0),(62,'Ecuador','EC','ECU',0),(63,'Egypt','EG','EGY',0),(64,'El Salvador','SV','SLV',0),(65,'Equatorial Guinea','GQ','GNQ',0),(66,'Eritrea','ER','ERI',0),(67,'Estonia','EE','EST',0),(68,'Ethiopia','ET','ETH',0),(69,'Falkland Islands (Malvinas)','FK','FLK',0),(70,'Faroe Islands','FO','FRO',0),(71,'Fiji','FJ','FJI',0),(72,'Finland','FI','FIN',0),(73,'France','FR','FRA',0),(74,'France, Metropolitan','FX','FXX',0),(75,'French Guiana','GF','GUF',0),(76,'French Polynesia','PF','PYF',0),(77,'French Southern Territories','TF','ATF',0),(78,'Gabon','GA','GAB',0),(79,'Gambia','GM','GMB',0),(80,'Georgia','GE','GEO',0),(81,'Germany','DE','DEU',0),(82,'Ghana','GH','GHA',0),(83,'Gibraltar','GI','GIB',0),(84,'Greece','GR','GRC',0),(85,'Greenland','GL','GRL',0),(86,'Grenada','GD','GRD',0),(87,'Guadeloupe','GP','GLP',0),(88,'Guam','GU','GUM',0),(89,'Guatemala','GT','GTM',0),(90,'Guinea','GN','GIN',0),(91,'Guinea-bissau','GW','GNB',0),(92,'Guyana','GY','GUY',0),(93,'Haiti','HT','HTI',0),(94,'Heard and Mc Donald Islands','HM','HMD',0),(95,'Honduras','HN','HND',0),(96,'Hong Kong','HK','HKG',0),(97,'Hungary','HU','HUN',0),(98,'Iceland','IS','ISL',0),(99,'India','IN','IND',0),(100,'Indonesia','ID','IDN',0),(101,'Iran (Islamic Republic of)','IR','IRN',0),(102,'Iraq','IQ','IRQ',0),(103,'Ireland','IE','IRL',0),(104,'Israel','IL','ISR',0),(105,'Italy','IT','ITA',0),(106,'Jamaica','JM','JAM',0),(107,'Japan','JP','JPN',0),(108,'Jordan','JO','JOR',0),(109,'Kazakhstan','KZ','KAZ',0),(110,'Kenya','KE','KEN',0),(111,'Kiribati','KI','KIR',0),(112,'Korea','KP','PRK',0),(114,'Kuwait','KW','KWT',0),(115,'Kyrgyzstan','KG','KGZ',0),(116,'Lao People\'s Democratic Republic','LA','LAO',0),(117,'Latvia','LV','LVA',0),(118,'Lebanon','LB','LBN',0),(119,'Lesotho','LS','LSO',0),(120,'Liberia','LR','LBR',0),(121,'Libyan Arab Jamahiriya','LY','LBY',0),(122,'Liechtenstein','LI','LIE',0),(123,'Lithuania','LT','LTU',0),(124,'Luxembourg','LU','LUX',0),(125,'Macau','MO','MAC',0),(126,'Macedonia','MK','MKD',0),(127,'Madagascar','MG','MDG',0),(128,'Malawi','MW','MWI',0),(129,'Malaysia','MY','MYS',0),(130,'Maldives','MV','MDV',0),(131,'Mali','ML','MLI',0),(132,'Malta','MT','MLT',0),(133,'Marshall Islands','MH','MHL',0),(134,'Martinique','MQ','MTQ',0),(135,'Mauritania','MR','MRT',0),(136,'Mauritius','MU','MUS',0),(137,'Mayotte','YT','MYT',0),(138,'Mexico','MX','MEX',0),(139,'Micronesia, Federated States of','FM','FSM',0),(140,'Moldova, Republic of','MD','MDA',0),(141,'Monaco','MC','MCO',0),(142,'Mongolia','MN','MNG',0),(143,'Montserrat','MS','MSR',0),(144,'Morocco','MA','MAR',0),(145,'Mozambique','MZ','MOZ',0),(146,'Myanmar','MM','MMR',0),(147,'Namibia','NA','NAM',0),(148,'Nauru','NR','NRU',0),(149,'Nepal','NP','NPL',0),(150,'Netherlands','NL','NLD',0),(151,'Netherlands Antilles','AN','ANT',0),(152,'New Caledonia','NC','NCL',0),(153,'New Zealand','NZ','NZL',0),(154,'Nicaragua','NI','NIC',0),(155,'Niger','NE','NER',0),(156,'Nigeria','NG','NGA',0),(157,'Niue','NU','NIU',0),(158,'Norfolk Island','NF','NFK',0),(159,'Northern Mariana Islands','MP','MNP',0),(160,'Norway','NO','NOR',0),(161,'Oman','OM','OMN',0),(162,'Pakistan','PK','PAK',0),(163,'Palau','PW','PLW',0),(164,'Panama','PA','PAN',0),(165,'Papua New Guinea','PG','PNG',0),(166,'Paraguay','PY','PRY',0),(167,'Peru','PE','PER',0),(168,'Philippines','PH','PHL',0),(169,'Pitcairn','PN','PCN',0),(170,'Poland','PL','POL',0),(171,'Portugal','PT','PRT',0),(172,'Puerto Rico','PR','PRI',0),(173,'Qatar','QA','QAT',0),(174,'Reunion','RE','REU',0),(175,'Romania','RO','ROM',0),(176,'Russian Federation','RU','RUS',0),(177,'Rwanda','RW','RWA',0),(178,'Saint Kitts and Nevis','KN','KNA',0),(179,'Saint Lucia','LC','LCA',0),(180,'Saint Vincent and the Grenadines','VC','VCT',0),(181,'Samoa','WS','WSM',0),(182,'San Marino','SM','SMR',0),(183,'Sao Tome and Principe','ST','STP',0),(184,'Saudi Arabia','SA','SAU',0),(185,'Senegal','SN','SEN',0),(186,'Seychelles','SC','SYC',0),(187,'Sierra Leone','SL','SLE',0),(188,'Singapore','SG','SGP',0),(189,'Slovakia (Slovak Republic)','SK','SVK',0),(190,'Slovenia','SI','SVN',0),(191,'Solomon Islands','SB','SLB',0),(192,'Somalia','SO','SOM',0),(193,'South Africa','ZA','ZAF',0),(194,'South Georgia','GS','SGS',0),(195,'Spain','ES','ESP',0),(196,'Sri Lanka','LK','LKA',0),(197,'St. Helena','SH','SHN',0),(198,'St. Pierre and Miquelon','PM','SPM',0),(199,'Sudan','SD','SDN',0),(200,'Suriname','SR','SUR',0),(201,'Svalbard and Jan Mayen Islands','SJ','SJM',0),(202,'Swaziland','SZ','SWZ',0),(203,'Sweden','SE','SWE',0),(204,'Switzerland','CH','CHE',0),(205,'Syrian Arab Republic','SY','SYR',0),(206,'Taiwan','TW','TWN',0),(207,'Tajikistan','TJ','TJK',0),(208,'Tanzania, United Republic of','TZ','TZA',0),(209,'Thailand','TH','THA',0),(210,'Togo','TG','TGO',0),(211,'Tokelau','TK','TKL',0),(212,'Tonga','TO','TON',0),(213,'Trinidad and Tobago','TT','TTO',0),(214,'Tunisia','TN','TUN',0),(215,'Turkey','TR','TUR',0),(216,'Turkmenistan','TM','TKM',0),(217,'Turks and Caicos Islands','TC','TCA',0),(218,'Tuvalu','TV','TUV',0),(219,'Uganda','UG','UGA',0),(220,'Ukraine','UA','UKR',0),(221,'United Arab Emirates','AE','ARE',0),(222,'United Kingdom','GB','GBR',0),(223,'United States','US','USA',0),(224,'United States Minor Outlying Islands','UM','UMI',0),(225,'Uruguay','UY','URY',0),(226,'Uzbekistan','UZ','UZB',0),(227,'Vanuatu','VU','VUT',0),(228,'Vatican City State (Holy See)','VA','VAT',0),(229,'Venezuela','VE','VEN',0),(230,'Viet Nam','VN','VNM',0),(231,'Virgin Islands (British)','VG','VGB',0),(232,'Virgin Islands (U.S.)','VI','VIR',0),(233,'Wallis and Futuna Islands','WF','WLF',0),(234,'Western Sahara','EH','ESH',0),(235,'Yemen','YE','YEM',0),(236,'Yugoslavia','YU','YUG',0),(237,'Zaire','ZR','ZAR',0),(238,'Zambia','ZM','ZMB',0),(239,'Zimbabwe','ZW','ZWE',0);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailybonus`
--

DROP TABLE IF EXISTS `dailybonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailybonus` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `rented` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `clicks` int(10) NOT NULL,
  `added` tinyint(4) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailybonus`
--

LOCK TABLES `dailybonus` WRITE;
/*!40000 ALTER TABLE `dailybonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `dailybonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawing`
--

DROP TABLE IF EXISTS `drawing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drawing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawing`
--

LOCK TABLES `drawing` WRITE;
/*!40000 ALTER TABLE `drawing` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_promotion`
--

DROP TABLE IF EXISTS `email_promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject1` varchar(250) NOT NULL DEFAULT '',
  `subject2` varchar(250) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_promotion`
--

LOCK TABLES `email_promotion` WRITE;
/*!40000 ALTER TABLE `email_promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` (`id`, `title`, `subject`, `message`) VALUES (1,'newticket','New Support Request','Dear ~fullname~, Your support request has been received.  You will receive a response as quickly as possible. Thank You for using ~sitename~! Sincerely, ~sitename~ Support'),(2,'ticketreply','Support Ticket Updated','--------------------PLEASE DO NOT REPLY TO THIS EMAIL.  GO TO THE ONLINE HELP DESK INSTEAD--------------------\r\n~domain~\r\nSubject: ~subj~ \r\nCreated: ~timesubmitted~ \r\nName: ~fullname~ Hello ~fullname~, Your ticket has been updated.  \r\nPlease visit our online support center to view our response to you. \r\nThank you for using our Online Support Center. Best Regards, ~domain~ Support Center \r\nContext of your support request\r\nStatus: ~ticketstatus~ ~mesg~'),(3,'reply','New Reply Added','Dear ~fullname~,Your added reply has been received.  You will receive a response as quickly as possible. Thank You for using ~sitename~! Sincerely, ~sitename~ Support');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featuredadclicks`
--

DROP TABLE IF EXISTS `featuredadclicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featuredadclicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `featuredadid` int(11) NOT NULL DEFAULT '0',
  `dateviewed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `featuredadid` (`featuredadid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featuredadclicks`
--

LOCK TABLES `featuredadclicks` WRITE;
/*!40000 ALTER TABLE `featuredadclicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `featuredadclicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featuredads`
--

DROP TABLE IF EXISTS `featuredads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featuredads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `headinghighlight` varchar(255) NOT NULL DEFAULT '#ffff00',
  `description` text NOT NULL,
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `purchase` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featuredads`
--

LOCK TABLES `featuredads` WRITE;
/*!40000 ALTER TABLE `featuredads` DISABLE KEYS */;
/*!40000 ALTER TABLE `featuredads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footerads`
--

DROP TABLE IF EXISTS `footerads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footerads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(35) DEFAULT NULL,
  `desc1` varchar(35) DEFAULT NULL,
  `desc2` varchar(35) DEFAULT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `clicks` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footerads`
--

LOCK TABLES `footerads` WRITE;
/*!40000 ALTER TABLE `footerads` DISABLE KEYS */;
/*!40000 ALTER TABLE `footerads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fullloginads`
--

DROP TABLE IF EXISTS `fullloginads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fullloginads` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL,
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `hits` int(9) NOT NULL DEFAULT '0',
  `rented` varchar(20) NOT NULL,
  `purchase` datetime NOT NULL,
  `lastshown` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fullloginads`
--

LOCK TABLES `fullloginads` WRITE;
/*!40000 ALTER TABLE `fullloginads` DISABLE KEYS */;
/*!40000 ALTER TABLE `fullloginads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fullloginadviews`
--

DROP TABLE IF EXISTS `fullloginadviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fullloginadviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `fullloginadid` int(11) NOT NULL DEFAULT '0',
  `dateviewed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fullloginadid` (`fullloginadid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fullloginadviews`
--

LOCK TABLES `fullloginadviews` WRITE;
/*!40000 ALTER TABLE `fullloginadviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `fullloginadviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hheaderadclicks`
--

DROP TABLE IF EXISTS `hheaderadclicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hheaderadclicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `hheaderadid` int(11) NOT NULL DEFAULT '0',
  `dateviewed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hheaderadid` (`hheaderadid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hheaderadclicks`
--

LOCK TABLES `hheaderadclicks` WRITE;
/*!40000 ALTER TABLE `hheaderadclicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `hheaderadclicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hheaderads`
--

DROP TABLE IF EXISTS `hheaderads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hheaderads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `bgcolor` varchar(255) NOT NULL DEFAULT '#ffff00',
  `url` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `headingfontcolor` varchar(255) NOT NULL DEFAULT '#000000',
  `description` text NOT NULL,
  `descriptionfontcolor` varchar(255) NOT NULL DEFAULT '#000000',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `purchase` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hheaderads`
--

LOCK TABLES `hheaderads` WRITE;
/*!40000 ALTER TABLE `hheaderads` DISABLE KEYS */;
/*!40000 ALTER TABLE `hheaderads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hheadlineadclicks`
--

DROP TABLE IF EXISTS `hheadlineadclicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hheadlineadclicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `hheadlineadid` int(11) NOT NULL DEFAULT '0',
  `dateviewed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hheadlineadid` (`hheadlineadid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hheadlineadclicks`
--

LOCK TABLES `hheadlineadclicks` WRITE;
/*!40000 ALTER TABLE `hheadlineadclicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `hheadlineadclicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hheadlineads`
--

DROP TABLE IF EXISTS `hheadlineads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hheadlineads` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(250) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `color` varchar(10) NOT NULL DEFAULT '',
  `bgcolor` varchar(10) NOT NULL DEFAULT '',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(15) NOT NULL DEFAULT '0',
  `max` int(15) NOT NULL DEFAULT '0',
  `clicks` int(15) NOT NULL DEFAULT '0',
  `bold` tinyint(4) NOT NULL DEFAULT '0',
  `purchase` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hheadlineads`
--

LOCK TABLES `hheadlineads` WRITE;
/*!40000 ALTER TABLE `hheadlineads` DISABLE KEYS */;
/*!40000 ALTER TABLE `hheadlineads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotlink_clicks`
--

DROP TABLE IF EXISTS `hotlink_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotlink_clicks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotlinkid` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotlink_clicks`
--

LOCK TABLES `hotlink_clicks` WRITE;
/*!40000 ALTER TABLE `hotlink_clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotlink_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotlinks`
--

DROP TABLE IF EXISTS `hotlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotlinks` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `subject` varchar(150) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(9) NOT NULL DEFAULT '0',
  `max` int(9) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `purchase` int(15) NOT NULL DEFAULT '0',
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotlinks`
--

LOCK TABLES `hotlinks` WRITE;
/*!40000 ALTER TABLE `hotlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL DEFAULT '0',
  `adid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginads`
--

DROP TABLE IF EXISTS `loginads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginads` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `adbody` text NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginads`
--

LOCK TABLES `loginads` WRITE;
/*!40000 ALTER TABLE `loginads` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matrixconfiguration`
--

DROP TABLE IF EXISTS `matrixconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matrixconfiguration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matrixlevelname` varchar(255) NOT NULL,
  `matrixwidth` int(10) unsigned NOT NULL DEFAULT '2',
  `matrixdepth` int(10) unsigned NOT NULL DEFAULT '2',
  `matrixprice` decimal(9,2) NOT NULL DEFAULT '1.00',
  `matrixpayout` decimal(9,2) NOT NULL DEFAULT '4.00',
  `givereentrythislevel` varchar(4) NOT NULL DEFAULT 'yes',
  `matrixactive` varchar(4) NOT NULL DEFAULT 'yes',
  `matrixsequence` int(10) unsigned NOT NULL DEFAULT '0',
  `cyclecommissionforsponsor` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matrixconfiguration`
--

LOCK TABLES `matrixconfiguration` WRITE;
/*!40000 ALTER TABLE `matrixconfiguration` DISABLE KEYS */;
/*!40000 ALTER TABLE `matrixconfiguration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `contact_email` varchar(255) NOT NULL DEFAULT '',
  `subscribed_email` varchar(255) NOT NULL DEFAULT '',
  `paypal_email` varchar(255) NOT NULL DEFAULT '',
  `payza_email` varchar(255) NOT NULL DEFAULT '',
  `egopay_account` varchar(255) NOT NULL DEFAULT '',
  `perfectmoney_account` varchar(255) NOT NULL DEFAULT '',
  `okpay_account` varchar(255) NOT NULL DEFAULT '',
  `solidtrustpay_account` varchar(255) NOT NULL DEFAULT '',
  `moneybookers_email` varchar(255) NOT NULL DEFAULT '',
  `pword` varchar(20) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `referid` varchar(20) NOT NULL DEFAULT '',
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `solos` tinyint(4) NOT NULL DEFAULT '0',
  `points` double NOT NULL DEFAULT '0',
  `commission` double NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL DEFAULT '',
  `joindate` date NOT NULL DEFAULT '0000-00-00',
  `subscribed` date NOT NULL DEFAULT '0000-00-00',
  `memtype` varchar(14) NOT NULL DEFAULT '',
  `confirmed` date NOT NULL DEFAULT '0000-00-00',
  `vacation` tinyint(4) NOT NULL DEFAULT '0',
  `vacation_date` int(15) NOT NULL DEFAULT '0',
  `referrer` varchar(255) NOT NULL DEFAULT '',
  `lastlogin` varchar(20) NOT NULL DEFAULT '',
  `traffic_clicks` int(15) NOT NULL DEFAULT '0',
  `solo_clicks` int(15) NOT NULL DEFAULT '0',
  `textad_clicks` int(15) NOT NULL DEFAULT '0',
  `super_clicks` int(8) NOT NULL DEFAULT '0',
  `super_clicks1` int(8) NOT NULL DEFAULT '0',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `upgrade_points` tinyint(4) NOT NULL DEFAULT '0',
  `banner_clicks` int(15) NOT NULL DEFAULT '0',
  `button_clicks` int(15) NOT NULL DEFAULT '0',
  `hotlink_clicks` int(15) NOT NULL DEFAULT '0',
  `htmlad_clicks` int(15) NOT NULL DEFAULT '0',
  `traffic1_clicks` int(15) NOT NULL DEFAULT '0',
  `solo1_clicks` int(15) NOT NULL DEFAULT '0',
  `textad1_clicks` int(15) NOT NULL DEFAULT '0',
  `banner1_clicks` int(15) NOT NULL DEFAULT '0',
  `button1_clicks` int(15) NOT NULL DEFAULT '0',
  `hotlink1_clicks` int(15) NOT NULL DEFAULT '0',
  `htmlad1_clicks` int(15) NOT NULL DEFAULT '0',
  `propoints` tinyint(4) NOT NULL DEFAULT '0',
  `navtop_clicks` int(15) NOT NULL DEFAULT '0',
  `navbot_clicks` int(15) NOT NULL DEFAULT '0',
  `powersolo_clicks` int(15) NOT NULL DEFAULT '0',
  `ptc_clicks` int(15) NOT NULL DEFAULT '0',
  `navtop1_clicks` int(15) NOT NULL DEFAULT '0',
  `navbot1_clicks` int(15) NOT NULL DEFAULT '0',
  `powersolo1_clicks` int(15) NOT NULL DEFAULT '0',
  `ptc1_clicks` int(15) NOT NULL DEFAULT '0',
  `lastfullloginadseen` varchar(20) NOT NULL,
  `lastsolopost` varchar(20) NOT NULL,
  `surfcredits` int(10) unsigned NOT NULL,
  `surf_clicks` int(10) unsigned NOT NULL,
  `surf1_clicks` int(10) unsigned NOT NULL,
  `surf_last_id` int(10) unsigned NOT NULL,
  `tickets` int(10) unsigned NOT NULL,
  `sitessurfedtoday` int(10) unsigned NOT NULL,
  `surfratiocounter` int(10) unsigned NOT NULL,
  `totalsitessurfedever` int(10) unsigned NOT NULL,
  `sitessurfedforcontest` int(10) unsigned NOT NULL,
  `lastmonthlybonus` datetime NOT NULL,
  `nextmonthlybonus` datetime NOT NULL,
  `hheaderad_clicks` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_clicks` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_clicks1` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_clicks1` int(10) unsigned NOT NULL DEFAULT '0',
  `country` varchar(255) NOT NULL,
  `bonus_viewed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthly_transactions`
--

DROP TABLE IF EXISTS `monthly_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthly_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `action` text NOT NULL,
  `date` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthly_transactions`
--

LOCK TABLES `monthly_transactions` WRITE;
/*!40000 ALTER TABLE `monthly_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `monthly_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthlybonusesjv`
--

DROP TABLE IF EXISTS `monthlybonusesjv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthlybonusesjv` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_num` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_views` int(10) unsigned NOT NULL DEFAULT '0',
  `solo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_views` int(10) unsigned NOT NULL DEFAULT '0',
  `nav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_views` int(10) unsigned NOT NULL DEFAULT '0',
  `super_num` int(10) unsigned NOT NULL DEFAULT '0',
  `supersolo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_views` int(10) unsigned NOT NULL DEFAULT '0',
  `button_num` int(10) unsigned NOT NULL DEFAULT '0',
  `button_views` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_num` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_views` int(10) unsigned NOT NULL DEFAULT '0',
  `topnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `botnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_views` int(10) unsigned NOT NULL DEFAULT '0',
  `surfcredits` int(10) unsigned NOT NULL DEFAULT '0',
  `lastbonusdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthlybonusesjv`
--

LOCK TABLES `monthlybonusesjv` WRITE;
/*!40000 ALTER TABLE `monthlybonusesjv` DISABLE KEYS */;
INSERT INTO `monthlybonusesjv` (`id`, `points`, `banner_num`, `banner_views`, `solo_num`, `traffic_num`, `traffic_views`, `nav_num`, `login_num`, `login_views`, `super_num`, `supersolo_num`, `hotlink_num`, `hotlink_views`, `button_num`, `button_views`, `ptc_num`, `ptc_views`, `topnav_num`, `botnav_num`, `featuredad_num`, `featuredad_views`, `hheaderad_num`, `hheaderad_views`, `hheadlinead_num`, `hheadlinead_views`, `surfcredits`, `lastbonusdate`) VALUES (1,5000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,50,'2011-09-05 01:16:29');
/*!40000 ALTER TABLE `monthlybonusesjv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthlybonusespro`
--

DROP TABLE IF EXISTS `monthlybonusespro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthlybonusespro` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_num` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_views` int(10) unsigned NOT NULL DEFAULT '0',
  `solo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_views` int(10) unsigned NOT NULL DEFAULT '0',
  `nav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_views` int(10) unsigned NOT NULL DEFAULT '0',
  `super_num` int(10) unsigned NOT NULL DEFAULT '0',
  `supersolo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_views` int(10) unsigned NOT NULL DEFAULT '0',
  `button_num` int(10) unsigned NOT NULL DEFAULT '0',
  `button_views` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_num` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_views` int(10) unsigned NOT NULL DEFAULT '0',
  `topnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `botnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_views` int(10) unsigned NOT NULL DEFAULT '0',
  `surfcredits` int(10) unsigned NOT NULL DEFAULT '0',
  `lastbonusdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthlybonusespro`
--

LOCK TABLES `monthlybonusespro` WRITE;
/*!40000 ALTER TABLE `monthlybonusespro` DISABLE KEYS */;
INSERT INTO `monthlybonusespro` (`id`, `points`, `banner_num`, `banner_views`, `solo_num`, `traffic_num`, `traffic_views`, `nav_num`, `login_num`, `login_views`, `super_num`, `supersolo_num`, `hotlink_num`, `hotlink_views`, `button_num`, `button_views`, `ptc_num`, `ptc_views`, `topnav_num`, `botnav_num`, `featuredad_num`, `featuredad_views`, `hheaderad_num`, `hheaderad_views`, `hheadlinead_num`, `hheadlinead_views`, `surfcredits`, `lastbonusdate`) VALUES (1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2011-08-27 01:15:13');
/*!40000 ALTER TABLE `monthlybonusespro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthlybonusessuperjv`
--

DROP TABLE IF EXISTS `monthlybonusessuperjv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthlybonusessuperjv` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_num` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_views` int(10) unsigned NOT NULL DEFAULT '0',
  `solo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_num` int(10) unsigned NOT NULL DEFAULT '0',
  `traffic_views` int(10) unsigned NOT NULL DEFAULT '0',
  `nav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0',
  `login_views` int(10) unsigned NOT NULL DEFAULT '0',
  `super_num` int(10) unsigned NOT NULL DEFAULT '0',
  `supersolo_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hotlink_views` int(10) unsigned NOT NULL DEFAULT '0',
  `button_num` int(10) unsigned NOT NULL DEFAULT '0',
  `button_views` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_num` int(10) unsigned NOT NULL DEFAULT '0',
  `ptc_views` int(10) unsigned NOT NULL DEFAULT '0',
  `topnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `botnav_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `featuredad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheaderad_views` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_num` int(10) unsigned NOT NULL DEFAULT '0',
  `hheadlinead_views` int(10) unsigned NOT NULL DEFAULT '0',
  `surfcredits` int(10) unsigned NOT NULL DEFAULT '0',
  `lastbonusdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthlybonusessuperjv`
--

LOCK TABLES `monthlybonusessuperjv` WRITE;
/*!40000 ALTER TABLE `monthlybonusessuperjv` DISABLE KEYS */;
INSERT INTO `monthlybonusessuperjv` (`id`, `points`, `banner_num`, `banner_views`, `solo_num`, `traffic_num`, `traffic_views`, `nav_num`, `login_num`, `login_views`, `super_num`, `supersolo_num`, `hotlink_num`, `hotlink_views`, `button_num`, `button_views`, `ptc_num`, `ptc_views`, `topnav_num`, `botnav_num`, `featuredad_num`, `featuredad_views`, `hheaderad_num`, `hheaderad_views`, `hheadlinead_num`, `hheadlinead_views`, `surfcredits`, `lastbonusdate`) VALUES (1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1000,'2011-09-03 01:15:16');
/*!40000 ALTER TABLE `monthlybonusessuperjv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navbanner`
--

DROP TABLE IF EXISTS `navbanner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navbanner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(250) NOT NULL DEFAULT '',
  `target` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navbanner`
--

LOCK TABLES `navbanner` WRITE;
/*!40000 ALTER TABLE `navbanner` DISABLE KEYS */;
/*!40000 ALTER TABLE `navbanner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navigation`
--

DROP TABLE IF EXISTS `navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navigation` (
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `status` char(3) NOT NULL DEFAULT 'ON',
  `seq` int(11) NOT NULL DEFAULT '0',
  `memtype` varchar(25) NOT NULL DEFAULT '',
  `showforhigherlevel` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `category` varchar(255) NOT NULL DEFAULT 'Main',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navigation`
--

LOCK TABLES `navigation` WRITE;
/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` (`name`, `id`, `url`, `status`, `seq`, `memtype`, `showforhigherlevel`, `category`) VALUES ('View Traffic Links',1,'tlinkview.php','ON',3,'',1,'Main'),('Edit My Details',2,'edit.php','ON',15,'',1,'Main'),('Browse HTML Ads',3,'browseads_html.php','ON',7,'',1,'Main'),('Upgrade Account',4,'upgrade.php','ON',1,'',1,'Main'),('Contact Support',5,'support.php','ON',17,'',1,'Main'),('Delete Account',6,'delete.php','ON',19,'',1,'Main'),('<b>Purchase Advertising</b>',7,'advertise.php','ON',1,'',1,'Main'),('Start Here',8,'index.php','ON',0,'',1,'Main'),('Logout',9,'logout.php','ON',35,'',1,'Main'),('Post Text Ads',10,'post.php','ON',4,'',1,'Main'),('Paid To Click Ads',11,'ptcadview.php','OFF',2,'',1,'Main'),('JV Bonuses',12,'jv_bonus.php','ON',14,'JV Member',1,'Main'),('SUPER JV Bonuses',13,'superjv_bonus.php','ON',13,'SUPER JV',0,'Main'),('Email My Referrals',14,'refmail.php','ON',11,'',1,'Main'),('Downline Builder',15,'builder.php','ON',12,'',1,'Main'),('Referral Contest',16,'../contest.php','ON',16,'',1,'Main'),('Viral Url Cloaker',17,'link.php','ON',21,'',1,'Main'),('Browse Text Ads',18,'browseads.php','ON',5,'',1,'Main'),('Post HTML Ads',19,'post_html.php','ON',6,'',1,'Main'),('Tools & Stats',20,'stats.php','ON',9,'',1,'Main'),('Special Offer',21,'../offerpage.php','ON',26,'',1,'Main'),('Full Page Login Ads',22,'fullloginadbuy.php','ON',1,'',1,'Main'),('Clicking Prizes',23,'prizeinfo.php','ON',2,'',1,'Main'),('<b>SET UP YOUR ADS</b>',24,'advertisestats.php','ON',1,'',1,'Main'),('<b>** SURF! **</b>',25,'surf.php','ON',1,'',1,'Main'),('<b>Add Surf Pages</b>',26,'mysurf.php','ON',1,'',1,'Main'),('Browse Admin Emails',27,'browseadmincontact.php','ON',7,'',1,'Main'),('Request Cash Out',28,'requestcashout.php','ON',10,'',1,'Main'),('Submit Testimonial',29,'testimonialsadd.php','ON',15,'',1,'Main'),('Get Your Own Site!',30,'http://phpsitescripts.com','ON',40,'',1,'Main'),('Sunshine Hosting',31,'http://sunshinehosting.net','ON',40,'',1,'Main'),('Matrix Stats',32,'matrixselect.php','ON',1,'',1,'Main'),('BUY POSITIONS',33,'matrixselect.php','ON',1,'',1,'Main');
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navlink`
--

DROP TABLE IF EXISTS `navlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navlink`
--

LOCK TABLES `navlink` WRITE;
/*!40000 ALTER TABLE `navlink` DISABLE KEYS */;
/*!40000 ALTER TABLE `navlink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerpage`
--

DROP TABLE IF EXISTS `offerpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offerpage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL DEFAULT '0',
  `points` int(8) NOT NULL DEFAULT '0',
  `banner_num` int(8) NOT NULL DEFAULT '0',
  `banner_views` int(8) NOT NULL DEFAULT '0',
  `solo_num` int(8) NOT NULL DEFAULT '0',
  `traffic_num` int(8) NOT NULL DEFAULT '0',
  `traffic_views` int(8) NOT NULL DEFAULT '0',
  `memtype` varchar(14) NOT NULL DEFAULT '0',
  `enable` tinyint(4) NOT NULL DEFAULT '0',
  `upgrade` varchar(14) NOT NULL DEFAULT '0',
  `login_num` varchar(15) NOT NULL DEFAULT '',
  `login_views` varchar(15) NOT NULL DEFAULT '',
  `upgrade10_price` int(15) NOT NULL DEFAULT '0',
  `upgrade10_super` int(15) NOT NULL DEFAULT '0',
  `upgrade10_text` varchar(100) NOT NULL,
  `super_num` int(15) NOT NULL DEFAULT '0',
  `upgrade_pro` tinyint(4) NOT NULL DEFAULT '0',
  `hotlink_num` int(8) NOT NULL DEFAULT '0',
  `hotlink_views` int(8) NOT NULL DEFAULT '0',
  `button_num` int(8) NOT NULL DEFAULT '0',
  `button_views` int(8) NOT NULL DEFAULT '0',
  `ptc_num` int(15) NOT NULL DEFAULT '0',
  `ptc_views` int(15) NOT NULL DEFAULT '0',
  `topnav_num` int(8) NOT NULL DEFAULT '0',
  `botnav_num` int(8) NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL,
  `featuredad_views` int(10) unsigned NOT NULL,
  `hheaderad_num` int(10) unsigned NOT NULL,
  `hheaderad_views` int(10) unsigned NOT NULL,
  `hheadlinead_num` int(10) unsigned NOT NULL,
  `hheadlinead_views` int(10) unsigned NOT NULL,
  `surfcredits` int(10) unsigned NOT NULL,
  `priceinterval` varchar(255) NOT NULL DEFAULT 'onetime',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerpage`
--

LOCK TABLES `offerpage` WRITE;
/*!40000 ALTER TABLE `offerpage` DISABLE KEYS */;
INSERT INTO `offerpage` (`id`, `price`, `points`, `banner_num`, `banner_views`, `solo_num`, `traffic_num`, `traffic_views`, `memtype`, `enable`, `upgrade`, `login_num`, `login_views`, `upgrade10_price`, `upgrade10_super`, `upgrade10_text`, `super_num`, `upgrade_pro`, `hotlink_num`, `hotlink_views`, `button_num`, `button_views`, `ptc_num`, `ptc_views`, `topnav_num`, `botnav_num`, `featuredad_num`, `featuredad_views`, `hheaderad_num`, `hheaderad_views`, `hheadlinead_num`, `hheadlinead_views`, `surfcredits`, `priceinterval`) VALUES (1,99,1000,50,1000,50,20,100,'ALL',1,'0','20','100',0,0,'',3,2,0,0,20,100,2,200,0,0,20,100,20,10,0,0,5000,'onetime');
/*!40000 ALTER TABLE `offerpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oto`
--

DROP TABLE IF EXISTS `oto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL DEFAULT '0',
  `points` int(8) NOT NULL DEFAULT '0',
  `banner_num` int(8) NOT NULL DEFAULT '0',
  `banner_views` int(8) NOT NULL DEFAULT '0',
  `solo_num` int(8) NOT NULL DEFAULT '0',
  `traffic_num` int(8) NOT NULL DEFAULT '0',
  `traffic_views` int(8) NOT NULL DEFAULT '0',
  `upgrade` varchar(14) NOT NULL DEFAULT '',
  `login_num` varchar(15) NOT NULL DEFAULT '',
  `login_views` varchar(15) NOT NULL DEFAULT '',
  `upgrade10_price` int(15) NOT NULL DEFAULT '0',
  `upgrade10_super` int(15) NOT NULL DEFAULT '0',
  `upgrade10_text` varchar(100) NOT NULL,
  `super_num` int(15) NOT NULL DEFAULT '0',
  `memtype` varchar(10) NOT NULL DEFAULT '0',
  `enable` tinyint(4) NOT NULL DEFAULT '0',
  `upgrade_pro` tinyint(4) NOT NULL DEFAULT '0',
  `hotlink_num` int(8) NOT NULL DEFAULT '0',
  `hotlink_views` int(8) NOT NULL DEFAULT '0',
  `button_num` int(8) NOT NULL DEFAULT '0',
  `button_views` int(8) NOT NULL DEFAULT '0',
  `ptc_num` int(15) NOT NULL DEFAULT '0',
  `ptc_views` int(15) NOT NULL DEFAULT '0',
  `topnav_num` int(8) NOT NULL DEFAULT '0',
  `botnav_num` int(8) NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL,
  `featuredad_views` int(10) unsigned NOT NULL,
  `hheaderad_num` int(10) unsigned NOT NULL,
  `hheaderad_views` int(10) unsigned NOT NULL,
  `hheadlinead_num` int(10) unsigned NOT NULL,
  `hheadlinead_views` int(10) unsigned NOT NULL,
  `surfcredits` int(10) unsigned NOT NULL,
  `priceinterval` varchar(255) NOT NULL DEFAULT 'onetime',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oto`
--

LOCK TABLES `oto` WRITE;
/*!40000 ALTER TABLE `oto` DISABLE KEYS */;
INSERT INTO `oto` (`id`, `price`, `points`, `banner_num`, `banner_views`, `solo_num`, `traffic_num`, `traffic_views`, `upgrade`, `login_num`, `login_views`, `upgrade10_price`, `upgrade10_super`, `upgrade10_text`, `super_num`, `memtype`, `enable`, `upgrade_pro`, `hotlink_num`, `hotlink_views`, `button_num`, `button_views`, `ptc_num`, `ptc_views`, `topnav_num`, `botnav_num`, `featuredad_num`, `featuredad_views`, `hheaderad_num`, `hheaderad_views`, `hheadlinead_num`, `hheadlinead_views`, `surfcredits`, `priceinterval`) VALUES (1,49,0,10,1000,20,5,200,'JVPARTNER','10','100',0,0,'',2,'0',0,1,5,100,5,100,2,100,0,0,10,1000,0,0,10,1000,5000,'onetime');
/*!40000 ALTER TABLE `oto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `htmlcode` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `name`, `htmlcode`) VALUES (1,'Index (Main) Page',''),(2,'Advertiser Instructions',''),(3,'Prizes','Prizes Content Here'),(4,'Login #1',''),(5,'Login #2',''),(6,'Login #3',''),(7,'Login #4',''),(8,'Login #5',''),(9,'Login #6',''),(10,'Login #7',''),(11,'Login #8',''),(12,'Login #9',''),(13,'Login #10',''),(14,'Contest','Contest Information Content Here'),(15,'Members Area Main Page',''),(16,'OTO','One Time Offer Content Here'),(17,'Downline Builder',''),(18,'Offer Page','Special Offer Content Here'),(19,'Referral Contest',''),(20,'Notes',''),(21,'Drawing',''),(22,'Solo Footer Ad',''),(23,'Admin Email Footer Ad',''),(24,'Pro Bonuses',''),(25,'JV Bonuses',''),(26,'SUPER JV Bonuses',''),(27,'Full Page Login Ads',''),(28,'Affiliate Program Description',''),(29,'Already Cycled Page',''),(30,'Next To Cycle Page',''),(31,'Program Details Page',''),(32,'FAQ Page',''),(33,'Terms',''),(34,'Thank-You Page After a Position is Purchased',''),(35,'Member Order Page To Buy Positions',''),(36,'Spam/Privacy Page',''),(37,'Earnings Disclaimer',''),(38,'Member Downline Stats Page',''),(39,'Request Cash Out Page',''),(40,'Testimonial Page',''),(41,'Matrix Order and Stats Page','');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `paid` decimal(9,2) NOT NULL,
  `datepaid` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payouts`
--

LOCK TABLES `payouts` WRITE;
/*!40000 ALTER TABLE `payouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `payouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adbody` longtext NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `posted` int(15) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '0',
  `saved_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_html`
--

DROP TABLE IF EXISTS `post_html`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adbody` longtext NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `posted` int(15) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '0',
  `saved_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_html`
--

LOCK TABLES `post_html` WRITE;
/*!40000 ALTER TABLE `post_html` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_html` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prizes`
--

DROP TABLE IF EXISTS `prizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prizes` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `clicks` int(15) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '',
  `solo_num` int(15) NOT NULL DEFAULT '0',
  `traffic_num` int(15) NOT NULL DEFAULT '0',
  `traffic_views` int(15) NOT NULL DEFAULT '0',
  `nav_num` int(15) NOT NULL DEFAULT '0',
  `banner_num` int(15) NOT NULL DEFAULT '0',
  `banner_views` int(15) NOT NULL DEFAULT '0',
  `points` int(15) NOT NULL DEFAULT '0',
  `commission` float NOT NULL DEFAULT '0',
  `ptc_num` int(15) NOT NULL DEFAULT '0',
  `ptc_views` int(15) NOT NULL DEFAULT '0',
  `super_num` int(15) NOT NULL DEFAULT '0',
  `botnav_num` int(15) NOT NULL DEFAULT '0',
  `hotlink_num` int(15) NOT NULL DEFAULT '0',
  `hotlink_views` int(15) NOT NULL DEFAULT '0',
  `login_num` int(15) NOT NULL DEFAULT '0',
  `login_views` int(15) NOT NULL DEFAULT '0',
  `button_num` int(15) NOT NULL DEFAULT '0',
  `button_views` int(15) NOT NULL DEFAULT '0',
  `topnav_num` int(15) NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL,
  `featuredad_views` int(10) unsigned NOT NULL,
  `hheaderad_num` int(10) unsigned NOT NULL,
  `hheaderad_views` int(10) unsigned NOT NULL,
  `hheadlinead_num` int(10) unsigned NOT NULL,
  `hheadlinead_views` int(10) unsigned NOT NULL,
  `surfcredits` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prizes`
--

LOCK TABLES `prizes` WRITE;
/*!40000 ALTER TABLE `prizes` DISABLE KEYS */;
/*!40000 ALTER TABLE `prizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prizes_won`
--

DROP TABLE IF EXISTS `prizes_won`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prizes_won` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `won` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prizes_won`
--

LOCK TABLES `prizes_won` WRITE;
/*!40000 ALTER TABLE `prizes_won` DISABLE KEYS */;
/*!40000 ALTER TABLE `prizes_won` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prizetrans`
--

DROP TABLE IF EXISTS `prizetrans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prizetrans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `action` text NOT NULL,
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prizetrans`
--

LOCK TABLES `prizetrans` WRITE;
/*!40000 ALTER TABLE `prizetrans` DISABLE KEYS */;
/*!40000 ALTER TABLE `prizetrans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo_codes`
--

DROP TABLE IF EXISTS `promo_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promo_codes` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `code` varchar(50) NOT NULL DEFAULT '',
  `max` int(9) NOT NULL DEFAULT '0',
  `count` int(9) NOT NULL DEFAULT '0',
  `points` int(8) NOT NULL DEFAULT '0',
  `banner_num` int(8) NOT NULL DEFAULT '0',
  `banner_views` int(8) NOT NULL DEFAULT '0',
  `solo_num` int(8) NOT NULL DEFAULT '0',
  `traffic_num` int(8) NOT NULL DEFAULT '0',
  `traffic_views` int(8) NOT NULL DEFAULT '0',
  `nav_num` int(8) NOT NULL DEFAULT '0',
  `upgrade` varchar(14) NOT NULL DEFAULT '',
  `time` int(15) NOT NULL DEFAULT '0',
  `members` varchar(10) NOT NULL DEFAULT '',
  `login_num` varchar(15) NOT NULL DEFAULT '',
  `login_views` varchar(15) NOT NULL DEFAULT '',
  `super_num` int(8) NOT NULL DEFAULT '0',
  `supersolo_num` int(10) NOT NULL DEFAULT '0',
  `hotlink_num` int(15) NOT NULL DEFAULT '0',
  `hotlink_views` int(15) NOT NULL DEFAULT '0',
  `button_num` int(15) NOT NULL DEFAULT '0',
  `button_views` int(15) NOT NULL DEFAULT '0',
  `ptc_num` int(15) NOT NULL DEFAULT '0',
  `ptc_views` int(8) NOT NULL DEFAULT '0',
  `topnav_num` int(8) NOT NULL DEFAULT '0',
  `botnav_num` int(8) NOT NULL DEFAULT '0',
  `featuredad_num` int(10) unsigned NOT NULL,
  `featuredad_views` int(10) unsigned NOT NULL,
  `hheaderad_num` int(10) unsigned NOT NULL,
  `hheaderad_views` int(10) unsigned NOT NULL,
  `hheadlinead_num` int(10) unsigned NOT NULL,
  `hheadlinead_views` int(10) unsigned NOT NULL,
  `surfcredits` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo_codes`
--

LOCK TABLES `promo_codes` WRITE;
/*!40000 ALTER TABLE `promo_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo_used`
--

DROP TABLE IF EXISTS `promo_used`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promo_used` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `promoid` int(9) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo_used`
--

LOCK TABLES `promo_used` WRITE;
/*!40000 ALTER TABLE `promo_used` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo_used` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptcads`
--

DROP TABLE IF EXISTS `ptcads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptcads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(100) DEFAULT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `sent` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptcads`
--

LOCK TABLES `ptcads` WRITE;
/*!40000 ALTER TABLE `ptcads` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptcads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptcadviews`
--

DROP TABLE IF EXISTS `ptcadviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptcadviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `tlid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tlid` (`tlid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptcadviews`
--

LOCK TABLES `ptcadviews` WRITE;
/*!40000 ALTER TABLE `ptcadviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptcadviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptclinks`
--

DROP TABLE IF EXISTS `ptclinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptclinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(100) DEFAULT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `sent` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptclinks`
--

LOCK TABLES `ptclinks` WRITE;
/*!40000 ALTER TABLE `ptclinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptclinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptcviews`
--

DROP TABLE IF EXISTS `ptcviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptcviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `ptcid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ptcid` (`ptcid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptcviews`
--

LOCK TABLES `ptcviews` WRITE;
/*!40000 ALTER TABLE `ptcviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptcviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommendedsystems`
--

DROP TABLE IF EXISTS `recommendedsystems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommendedsystems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `htmlcode` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommendedsystems`
--

LOCK TABLES `recommendedsystems` WRITE;
/*!40000 ALTER TABLE `recommendedsystems` DISABLE KEYS */;
INSERT INTO `recommendedsystems` (`id`, `htmlcode`) VALUES (1,'');
/*!40000 ALTER TABLE `recommendedsystems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refmail`
--

DROP TABLE IF EXISTS `refmail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refmail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '0',
  `timestamp` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refmail`
--

LOCK TABLES `refmail` WRITE;
/*!40000 ALTER TABLE `refmail` DISABLE KEYS */;
/*!40000 ALTER TABLE `refmail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_html`
--

DROP TABLE IF EXISTS `saved_html`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saved_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adbody` longtext NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_html`
--

LOCK TABLES `saved_html` WRITE;
/*!40000 ALTER TABLE `saved_html` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_html` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_post`
--

DROP TABLE IF EXISTS `saved_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saved_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adbody` longtext NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_post`
--

LOCK TABLES `saved_post` WRITE;
/*!40000 ALTER TABLE `saved_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_solos`
--

DROP TABLE IF EXISTS `saved_solos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saved_solos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `adbody` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_solos`
--

LOCK TABLES `saved_solos` WRITE;
/*!40000 ALTER TABLE `saved_solos` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_solos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `name` varchar(255) NOT NULL,
  `setting` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`name`, `setting`) VALUES ('row1','x'),('adminid','Admin'),('adminpw','admin'),('adminemail','Admin Email'),('basecolour',''),('contrastcolour',''),('fonttype',''),('fontcolour',''),('domain','http://demomatrixmpsf.phpsitescripts.com'),('sitename','Matrix Demo - Multi-Phase Follow-Me Sponsor Forced with Spillover'),('pointrate','10000'),('adminname','Admin Name'),('adminaddress',''),('navmax','3'),('conteststart','2011-10-01'),('paypal',''),('adminpayza','Admin Payza'),('adminpayzaseccode','Admin Payza Seccode'),('egopay_store_id',''),('egopay_store_password',''),('adminperfectmoney',''),('adminperfectmoneyalternatepassphrase',''),('adminokpay',''),('adminsolidtrustpay',''),('adminmoneybookers',''),('moneybookers_id',''),('pay_with','a:1:{s:8:\"payza\";s:1:\"1\";}'),('drawing','0'),('drawwinner',''),('drawprice',''),('nav_bg',''),('nav_hover',''),('nav_text',''),('buttondisplay','10'),('bannerprice','3.00'),('soloprice','3.00'),('pointprice','0.50'),('navprice','3.00'),('hotlinkprice1','4.00'),('hotlinkpointprice1','4000000'),('hotlinkprice2','5.00'),('hotlinkpointprice2','6000000'),('hotlinkprice3','6.00'),('hotlinkpointprice3','8000000'),('buttonpointprice','2000000'),('buttonprice','4.00'),('tlinkprice1','3.00'),('tlinkprice2','4.00'),('tlinkprice3','5.00'),('tlinkpoints1','300000'),('tlinkpoints2','400000'),('tlinkpoints3','600000'),('navpricepoints','6000000'),('loginpricepoints','800000'),('bannerpointprice','15000'),('sopointprice','200000000'),('safprice','6.00'),('safpointprice','100000'),('adminnotice','1'),('supersoloprice','5.00'),('loginprice','5.00'),('solopointprice','600000'),('propoints','5000'),('propointsmonthly','0'),('prointerval','Lifetime'),('proreadearn','75'),('prohtmlearn','125'),('probannerearn','75'),('proclickearn','125'),('protrafficearn','50'),('prohotlinkearn','125'),('probuttonclick','50'),('prosupersoloearn','200'),('adminproclickearn','500'),('propost','2'),('proposthtml','2'),('prosave','2'),('prosavehtml','5'),('prosavesolos','5'),('prourls','2'),('proreflogin','5'),('prorefpoints','5000'),('procommission','0.00'),('propercent','0'),('probuycom','0'),('prosupercom','0'),('projvcom','0.00'),('jvpoints','1000'),('jvpointsmonthly','25000'),('jvinterval','Lifetime'),('jvprice','20'),('jvpointprice','1000000000'),('jvreadearn','75'),('jvhtmlearn','125'),('jvbannerearn','75'),('jvclickearn','500'),('jvtrafficearn','50'),('jvhotlinkearn','125'),('jvbuttonclick','50'),('jvsupersoloearn','400'),('adminjvclickearn','1000'),('jvpost','3'),('jvposthtml','2'),('jvsave','2'),('jvsavehtml','5'),('jvsavesolos','5'),('jvurls','5'),('jvreflogin','50'),('jvrefpoints','1000'),('jvcommission','0.00'),('jvpercent','5'),('jvbuycom','0'),('jvsupercom','1.00'),('jvjvcom','0.00'),('jvsignup','1'),('superjvpoints','10000'),('superjvpointsmonthly','250000'),('superjvprice','30'),('superjvinterval','Lifetime'),('superjvpricepoints','10000000000'),('superjvreadearn','400'),('superjvhtmlearn','500'),('superjvbannerclick','450'),('superjvclickearn','500'),('superjvtrafficearn','375'),('superjvhotlinkearn','500'),('superjvbuttonclick','350'),('jvssupersoloearn','650'),('adminsuperjvclickearn','1000'),('superjvpost','25'),('superjvposthtml','15'),('superjvsave','25'),('superjvsavehtml','20'),('superjvsavesolos','20'),('superjvurls','25'),('superjvreflogin','150'),('superjvrefpoints','10000'),('superjvcommission','0.50'),('superjvpercent','25'),('superjvbuycom','10'),('superjvjvcom','0.00'),('superjv2supercom','1.50'),('proptcearn','0'),('jvptcearn','0.001'),('superjvptcearn','0.001'),('ptc1points','10000000'),('ptc2points','15000000'),('ptc3points','20000000'),('ptc1','5.00'),('ptc2','7.00'),('ptc3','10.00'),('pronavtopearn','100'),('jvnavtopearn','100'),('superjvnavtopearn','250'),('navtopprice','5.00'),('navtoppointprice','8000000'),('probotnavearn','75'),('jvbotnavearn','75'),('superjvbotnavearn','200'),('topnavmax','3'),('linkgood','15'),('superjvfullloginadearn','500'),('jvfullloginadearn','300'),('profullloginadearn','125'),('superjvfullloginadprice','2'),('jvfullloginadprice','5'),('profullloginadprice','10'),('fullloginadpointpricesuperjv','0'),('fullloginadpointpricejv','0'),('fullloginadpointpricepro','0'),('superjvfullloginadcredittimer','7'),('jvfullloginadcredittimer','20'),('profullloginadcredittimer','20'),('featuredadwidth','175'),('featuredadheight','100'),('featuredadheightheading','18'),('featuredadmaxheadingchars','24'),('featuredadheadingfontcolor','#ffffff'),('featuredadheadingfontface','Tahoma'),('featuredadheadingfontsize','10pt'),('featuredadheadingbgcolor','#000000'),('featuredadheadingbordercolor','#000000'),('featuredadmaxdescchars',''),('featuredaddescmaxbodylines','5'),('featuredaddescmaxcharsperline','24'),('featuredadnumberofboxes','10'),('featuredaddescfontcolor','#000000'),('featuredaddescfontface','Tahoma'),('featuredaddescfontsize','10pt'),('featuredaddescbgcolor','#ffffff'),('featuredaddescbordercolor','#000000'),('featuredadadsbytext','Matrix Demo - Multi-Phase Follow-Me Sponsor Forced with Spillover'),('featuredadadsbyurl','http://demomatrixmpsf.phpsitescripts.com'),('featuredadadsbyheight','22'),('featuredadadsbyfontcolor','#ffffff'),('featuredadadsbyfontface','Tahoma'),('featuredadadsbyfontsize','10pt'),('featuredadadsbybgcolor','#000000'),('featuredadadsbybordercolor','#000000'),('superjvfeaturedadearn','250'),('jvfeaturedadearn','75'),('profeaturedadearn','75'),('superjvfeaturedadprice','1.25'),('jvfeaturedadprice','2.00'),('profeaturedadprice','3.00'),('featuredadpointpricesuperjv','500000'),('featuredadpointpricejv','0'),('featuredadpointpricepro','0'),('superjvfeaturedadcredittimer','7'),('jvfeaturedadcredittimer','20'),('profeaturedadcredittimer','20'),('superjvfeaturedadmaxhits','5000'),('jvfeaturedadmaxhits','5000'),('profeaturedadmaxhits','0'),('superjvhheaderadearn','250'),('jvhheaderadearn','75'),('prohheaderadearn','75'),('superjvhheaderadprice','1.50'),('jvhheaderadprice','2.75'),('prohheaderadprice','4.00'),('hheaderadpointpricesuperjv','500000'),('hheaderadpointpricejv','0'),('hheaderadpointpricepro','0'),('superjvhheaderadcredittimer','7'),('jvhheaderadcredittimer','20'),('prohheaderadcredittimer','20'),('superjvhheaderadmaxhits','1000'),('jvhheaderadmaxhits','500'),('prohheaderadmaxhits','250'),('hheaderadmaxheadingchars','50'),('hheaderadmaxdescchars','300'),('hheaderadtopnotefontcolor','#ffffff'),('hheaderadtopnotefontface','Tahoma'),('hheaderadtopnotefontsize','10pt'),('hheaderadtopnotebgcolor','#000000'),('hheaderadbottomnotefontcolor','#000000'),('hheaderadbottomnotefontface','Tahoma'),('hheaderadbottomnotefontsize','10pt'),('hheaderadbottomnotebgcolor','#ffff33'),('superjvhheadlineadearn','250'),('jvhheadlineadearn','75'),('prohheadlineadearn','75'),('superjvhheadlineadprice','1.25'),('jvhheadlineadprice','2.50'),('prohheadlineadprice','4.00'),('hheadlineadpointpricesuperjv','500000'),('hheadlineadpointpricejv','0'),('hheadlineadpointpricepro','0'),('superjvhheadlineadcredittimer','7'),('jvhheadlineadcredittimer','20'),('prohheadlineadcredittimer','20'),('superjvhheadlineadmaxhits','1000'),('jvhheadlineadmaxhits','500'),('prohheadlineadmaxhits','250'),('autoapproveenable','yes'),('autoapproveenablesurf','yes'),('prosurfurls','2'),('jvsurfurls','10'),('superjvsurfurls','25'),('prosurfcreditspersite','1'),('jvsurfcreditspersite','1'),('superjvsurfcreditspersite','5'),('prosurftimer','10'),('jvsurftimer','10'),('superjvsurftimer','5'),('prosurfratio','2'),('jvsurfratio','2'),('superjvsurfratio','1'),('prosurfcreditsignupbonus','25'),('jvsurfcreditsignupbonus','1000'),('superjvcreditsignupbonus','2500'),('prodailysurfsitestopostads','0'),('jvdailysurfsitestopostads','0'),('superjvdailysurfsitestopostads','0'),('superjvsurfcreditsignupbonus','30'),('lowerlevel','Pro'),('middlelevel','JV Member'),('toplevel','Super JV'),('admintablebgcolor',''),('testimonialgroupmax','5'),('testimonialrotateorgroup','rotate'),('testimonialphotopath','/home/phpsites/public_html/demos/demomatrixmpsf/photos/'),('showmembercount','yes'),('showperlevelmembercount','yes'),('paymentprocessorfeepercentagetoadd','5'),('minimumbalancetowithdraw','2.00'),('minimumpayout','5.00'),('canbuymultiplepositionsatonce','yes'),('bonusurl', 'http://phpsitescripts.com'),('bonusmin', '1000'),('bonusmax', '2000'),('dailybonusprice', '3.75');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solos`
--

DROP TABLE IF EXISTS `solos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `adbody` longtext NOT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `date` int(15) NOT NULL DEFAULT '0',
  `datesent` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solos`
--

LOCK TABLES `solos` WRITE;
/*!40000 ALTER TABLE `solos` DISABLE KEYS */;
/*!40000 ALTER TABLE `solos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `paymentdate` varchar(12) NOT NULL,
  `amountreceived` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(25) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subj` varchar(200) DEFAULT NULL,
  `mesg` text,
  `timesubmitted` datetime DEFAULT NULL,
  `membertype` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `origid` int(11) NOT NULL DEFAULT '0',
  `span` int(11) NOT NULL DEFAULT '0',
  `ticketstatus` varchar(20) DEFAULT NULL,
  `replyto` varchar(100) DEFAULT NULL,
  `lastreply` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support`
--

LOCK TABLES `support` WRITE;
/*!40000 ALTER TABLE `support` DISABLE KEYS */;
/*!40000 ALTER TABLE `support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surfurls`
--

DROP TABLE IF EXISTS `surfurls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surfurls` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `surfname` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `surfurl` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `surfview` int(15) NOT NULL DEFAULT '0',
  `surfclicks` int(15) NOT NULL DEFAULT '0',
  `surfpoint` int(15) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No, 1= Yes',
  `shownyet` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No, 1= Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Surf URL table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surfurls`
--

LOCK TABLES `surfurls` WRITE;
/*!40000 ALTER TABLE `surfurls` DISABLE KEYS */;
/*!40000 ALTER TABLE `surfurls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `rating` int(10) unsigned NOT NULL DEFAULT '10',
  `dateadded` datetime NOT NULL,
  `approved` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tlinks`
--

DROP TABLE IF EXISTS `tlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tlinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `subject` varchar(100) DEFAULT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `sent` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tlinks`
--

LOCK TABLES `tlinks` WRITE;
/*!40000 ALTER TABLE `tlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tlviews`
--

DROP TABLE IF EXISTS `tlviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tlviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `tlid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tlid` (`tlid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tlviews`
--

LOCK TABLES `tlviews` WRITE;
/*!40000 ALTER TABLE `tlviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topnav`
--

DROP TABLE IF EXISTS `topnav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topnav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `targeturl` varchar(70) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `shown` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `added` tinyint(4) NOT NULL DEFAULT '0',
  `show_views` int(9) NOT NULL DEFAULT '0',
  `show_clicks` int(9) NOT NULL DEFAULT '0',
  `date` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topnav`
--

LOCK TABLES `topnav` WRITE;
/*!40000 ALTER TABLE `topnav` DISABLE KEYS */;
/*!40000 ALTER TABLE `topnav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topnavviews`
--

DROP TABLE IF EXISTS `topnavviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topnavviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `blid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blid` (`blid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topnavviews`
--

LOCK TABLES `topnavviews` WRITE;
/*!40000 ALTER TABLE `topnavviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `topnavviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `action` text NOT NULL,
  `date` int(15) NOT NULL DEFAULT '0',
  `quantity` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urls`
--

DROP TABLE IF EXISTS `urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urls` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `url_location` tinytext NOT NULL,
  `url_tag` tinytext NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urls`
--

LOCK TABLES `urls` WRITE;
/*!40000 ALTER TABLE `urls` DISABLE KEYS */;
/*!40000 ALTER TABLE `urls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viewed`
--

DROP TABLE IF EXISTS `viewed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viewed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL DEFAULT '',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viewed`
--

LOCK TABLES `viewed` WRITE;
/*!40000 ALTER TABLE `viewed` DISABLE KEYS */;
/*!40000 ALTER TABLE `viewed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viewed_html`
--

DROP TABLE IF EXISTS `viewed_html`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viewed_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL DEFAULT '',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viewed_html`
--

LOCK TABLES `viewed_html` WRITE;
/*!40000 ALTER TABLE `viewed_html` DISABLE KEYS */;
/*!40000 ALTER TABLE `viewed_html` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'phpsites_demomatrixmpsf'
--

--
-- Dumping routines for database 'phpsites_demomatrixmpsf'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-30  9:49:24
