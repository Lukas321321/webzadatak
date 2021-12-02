/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - webdip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `slike` */

DROP TABLE IF EXISTS `slike`;

CREATE TABLE `slike` (
  `slika` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `clanakId` int(255) DEFAULT NULL,
  `opis` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  PRIMARY KEY (`slika`),
  KEY `clanakId` (`clanakId`),
  CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`clanakId`) REFERENCES `vijesti` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `slike` */

insert  into `slike`(`slika`,`clanakId`,`opis`) values 
('img/banzek.jpg',1,'Banzek'),
('img/banzek2.jpg',1,'Pilomobil'),
('img/banzek3.jpg',NULL,'Pokretna Pila');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(31) COLLATE utf8_croatian_ci DEFAULT NULL,
  `surname` varchar(31) COLLATE utf8_croatian_ci DEFAULT NULL,
  `email` varchar(63) COLLATE utf8_croatian_ci DEFAULT NULL,
  `username` varchar(63) COLLATE utf8_croatian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `country` enum('AF','AX','AL','DZ','AS','AD','AO','AI','AQ','AG','AR','AM','AW','AU','AT','AZ','BH','BS','BD','BB','BY','BE','BZ','BJ','BM','BT','BO','BQ','BA','BW','BV','BR','IO','BN','BG','BF','BI','KH','CM','CA','CV','KY','CF','TD','CL','CN','CX','CC','CO','KM','CG','CD','CK','CR','CI','HR','CU','CW','CY','CZ','DK','DJ','DM','DO','EC','EG','SV','GQ','ER','EE','ET','FK','FO','FJ','FI','FR','GF','PF','TF','GA','GM','GE','DE','GH','GI','GR','GL','GD','GP','GU','GT','GG','GN','GW','GY','HT','HM','VA','HN','HK','HU','IS','IN','ID','IR','IQ','IE','IM','IL','IT','JM','JP','JE','JO','KZ','KE','KI','KP','KR','KW','KG','LA','LV','LB','LS','LR','LY','LI','LT','LU','MO','MK','MG','MW','MY','MV','ML','MT','MH','MQ','MR','MU','YT','MX','FM','MD','MC','MN','ME','MS','MA','MZ','MM','NA','NR','NP','NL','NC','NZ','NI','NE','NG','NU','NF','MP','NO','OM','PK','PW','PS','PA','PG','PY','PE','PH','PN','PL','PT','PR','QA','RE','RO','RU','RW','BL','SH','KN','LC','MF','PM','VC','WS','SM','ST','SA','SN','RS','SC','SL','SG','SX','SK','SI','SB','SO','ZA','GS','SS','ES','LK','SD','SR','SJ','SZ','SE','CH','SY','TW','TJ','TZ','TH','TL','TG','TK','TO','TT','TN','TR','TM','TC','TV','UG','UA','AE','GB','US','UM','UY','UZ','VU','VE','VN','VG','VI','WF','EH','YE','ZM','ZW') COLLATE utf8_croatian_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `level` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`surname`,`email`,`username`,`password`,`country`,`city`,`street`,`birthdate`,`level`) values 
(7,'mrvica','mrvan','mrva@mrva.com',NULL,'$2y$10$bkr1WlcLVr1O4fgWYl0RVOC0OmYIjklsSCroc70V.7iFCuh.UyyaS','PT','selograd','gradoselska','0000-00-00',2),
(8,'mrga','grozni','grozni@grozmail.com',NULL,'$2y$10$gqgjzAB6xpE.4fz5k57ZeeIVeFGldhUPXDBs4PH4kTKWg8NW7T6cK','FR','selograd','gradoselska','0000-00-00',0),
(9,'mrko','mrki','mrkan@mail.com',NULL,'$2y$10$QB2K3Y4Z4xLLrQUnowrv0ei2YvNnmpbNADEXs4E9pZXK8byxOrgqi','NC','selograd','gradoselska','0000-00-00',2);

/*Table structure for table `vijesti` */

DROP TABLE IF EXISTS `vijesti`;

CREATE TABLE `vijesti` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `tekst` text COLLATE utf8_croatian_ci,
  `datum` datetime NOT NULL DEFAULT '2002-02-02 00:00:00',
  `arhiva` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `vijesti` */

insert  into `vijesti`(`id`,`naslov`,`slika`,`tekst`,`datum`,`arhiva`) values 
(1,'Gemišt poskupio, Zagorje u kaosu','img/gemist.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget auctor turpis. Nullam ac ullamcorper turpis. Maecenas sit amet finibus libero, in semper dolor. Curabitur eros odio, tempor vulputate ultrices quis, accumsan quis ipsum. Pellentesque non fermentum nisl. Phasellus ullamcorper sapien turpis, eget condimentum enim volutpat id. Nunc laoreet risus justo, ac dapibus nibh malesuada eu. Mauris rutrum pharetra augue. Sed ullamcorper laoreet tellus id venenatis. Aliquam sollicitudin leo lacinia massa lobortis malesuada. Mauris purus mauris, maximus id mi ut, ullamcorper venenatis tellus. Ut scelerisque nibh id viverra congue. Duis orci velit, cursus et ligula non, laoreet placerat risus. Etiam rutrum hendrerit molestie. Vestibulum feugiat massa et molestie egestas.\r\n				','2019-09-09 07:50:20',0),
(2,'Vijesna vijest','img/Albert_Ein_Stein.png','Mrgudno','2021-06-09 00:00:00',0),
(4,'mrkvica','img/ecoli.png','Lorem ipsum ipsum lorem lalalalalalalalalala test','2007-01-02 00:00:00',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
