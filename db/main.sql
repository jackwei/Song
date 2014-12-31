
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lovesong` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lovesong`;

/*Table structure for table `action` */

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `action_name` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `client_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `action` */

/*Table structure for table `lottery` */

DROP TABLE IF EXISTS `lottery`;

CREATE TABLE `lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `phone` varchar(16) NOT NULL DEFAULT '',
  `address` varchar(512) NOT NULL DEFAULT '',
  `create_time` datetime DEFAULT NULL,
  `create_ip` varchar(64) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL,
  `modify_ip` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8;

/*Table structure for table `lottery_history` */

DROP TABLE IF EXISTS `lottery_history`;

CREATE TABLE `lottery_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL DEFAULT '',
  `create_time` datetime DEFAULT NULL,
  `craete_ip` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1450 DEFAULT CHARSET=utf8;

