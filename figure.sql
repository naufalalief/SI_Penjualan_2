/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.16-MariaDB : Database - figure
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`figure` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `figure`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`) values ('admin','admin');

/*Table structure for table `figure` */

DROP TABLE IF EXISTS `figure`;

CREATE TABLE `figure` (
  `id_figure` int(5) NOT NULL AUTO_INCREMENT,
  `id_jenis_figure` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_figure`,`id_jenis_figure`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `figure` */

insert  into `figure`(`id_figure`,`id_jenis_figure`,`name`,`series`,`description`,`price`,`nama`,`ukuran`,`tipe`,`path`) values (18,3,'Barbatos HG','Mobile Suit Gundam: Iron Blooded Orphans','Main Character from Mobile Suit Gundam: Iron Blooded Orphans anime',150000,'barbatoshg.jpg','22404','image/jpeg','images/barbatoshg.jpg'),(19,6,'Rias Gremory','High School DxD','Main Heroine from High School DxD anime',600000,'dxdrias.jpg','62799','image/jpeg','images/dxdrias.jpg'),(20,7,'Yunyun','Kono Subarashii Sekai ni Shukufuku wo!','Yunyun (&#12422;&#12435;&#12422;&#12435;) is a member of the Crimson Magic Clan, and she and Megumin are friends as well as rivals. She is a supporting character in the Konosuba series.',650000,'14128-nendoroid-yunyun-konosuba.jpg','103126','image/jpeg','images/14128-nendoroid-yunyun-konosuba.jpg');

/*Table structure for table `jenis_figure` */

DROP TABLE IF EXISTS `jenis_figure`;

CREATE TABLE `jenis_figure` (
  `id_jenis_figure` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_figure` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_figure`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_figure` */

insert  into `jenis_figure`(`id_jenis_figure`,`jenis_figure`) values (3,'Gundam Model Kits'),(6,'Action Figure'),(7,'Nendroid');

/*Table structure for table `jenis_member` */

DROP TABLE IF EXISTS `jenis_member`;

CREATE TABLE `jenis_member` (
  `id_jenis_member` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_member` char(100) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_member`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_member` */

insert  into `jenis_member`(`id_jenis_member`,`jenis_member`) values (8,'VIP'),(9,'General');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id_member` int(5) NOT NULL AUTO_INCREMENT,
  `id_jenis_member` int(5) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `member` */

insert  into `member`(`id_member`,`id_jenis_member`,`nama`,`alamat`,`username`,`password`) values (8,9,'afal','pangsud','afal','afal');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) DEFAULT NULL,
  `id_figure` int(10) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_member`,`id_figure`,`tgl_transaksi`,`price`) values (20,8,16,'2018-10-07',100000),(21,8,17,'2018-10-07',600000),(22,8,17,'2018-10-07',600000),(23,8,19,'2018-10-07',600000),(24,8,19,'2018-10-07',600000),(25,8,19,'2018-10-07',600000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
