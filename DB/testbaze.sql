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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`surname`,`email`,`username`,`password`,`country`,`city`,`street`,`birthdate`) values 
(5,'testko','testni','test@test.com',NULL,'$2y$10$EtcrqwQenntEgfim1iFTW.SedDITHhNcPIuyP5Ef5iGKNPQBss5Gm','BD','gradograd','uliÄna','0000-00-00'),
(6,'pero','testni','smrk@mrk.com',NULL,'$2y$10$NbYfGLFx0H7Am9SEx54M/ukGLp2tpBgBwwm76lVVBbSR40RN859yW','IT','gradograd','ulica','0000-00-00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
