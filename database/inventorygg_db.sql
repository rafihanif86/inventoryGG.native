/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.27 : Database - inventorygg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventorygg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventorygg`;

/*Table structure for table `alat` */

DROP TABLE IF EXISTS `alat`;

CREATE TABLE `alat` (
  `id_alat` varchar(25) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_kat` int(11) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alat` */

/*Table structure for table `checklist_record` */

DROP TABLE IF EXISTS `checklist_record`;

CREATE TABLE `checklist_record` (
  `id_check` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_checklist` datetime DEFAULT NULL,
  `id_alat` varchar(25) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `keterangan` tinytext,
  `id_user` int(11) DEFAULT NULL,
  `dipinjam` varchar(11) DEFAULT NULL,
  `id_detail` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_check`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `checklist_record` */

/*Table structure for table `detail_peminjaman` */

DROP TABLE IF EXISTS `detail_peminjaman`;

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `jumlah_permintaan` varchar(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `jumlah_yang dikeluarkan` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_peminjaman` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

/*Table structure for table `peminjaman_masuk` */

DROP TABLE IF EXISTS `peminjaman_masuk`;

CREATE TABLE `peminjaman_masuk` (
  `id_peminjaman_masuk` varchar(25) NOT NULL,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `email_peminjam` varchar(50) DEFAULT NULL,
  `nama_kegiatan` varchar(50) DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `no_wa` varchar(13) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman_masuk` */

insert  into `peminjaman_masuk`(`id_peminjaman_masuk`,`nama_instansi`,`email_peminjam`,`nama_kegiatan`,`tgl_ambil`,`tgl_kembali`,`no_wa`,`status`) values ('pe001','jongring salaka','jonggring@gmail.com','pendakian','2019-09-25','2019-09-30','086528102319','proses');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nia` varchar(11) DEFAULT NULL,
  `posisi` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
