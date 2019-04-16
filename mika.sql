/*
SQLyog Community v8.71 
MySQL - 5.5.5-10.1.38-MariaDB : Database - mika
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mika` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mika`;

/*Table structure for table `campanas_correo_estadistica` */

DROP TABLE IF EXISTS `campanas_correo_estadistica`;

CREATE TABLE `campanas_correo_estadistica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_det_correo` int(11) DEFAULT NULL,
  `cant_descargas` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `campanas_correo_estadistica` */

LOCK TABLES `campanas_correo_estadistica` WRITE;

UNLOCK TABLES;

/*Table structure for table `campanas_correos` */

DROP TABLE IF EXISTS `campanas_correos`;

CREATE TABLE `campanas_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `campanas_correos` */

LOCK TABLES `campanas_correos` WRITE;

insert  into `campanas_correos`(`id`,`campana`,`date_create`,`date_update`) values (1,'intiv','2019-04-15 19:00:06','2019-04-15 19:00:06'),(2,'Pru2','2019-04-15 19:00:06','2019-04-15 19:00:06');

UNLOCK TABLES;

/*Table structure for table `campanas_detalle_correo` */

DROP TABLE IF EXISTS `campanas_detalle_correo`;

CREATE TABLE `campanas_detalle_correo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campana` int(11) DEFAULT NULL,
  `nombre_correo` varchar(100) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `email_mensaje` blob,
  `email_asunto` blob,
  `email_destinatario` blob,
  `email_remitente` blob,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `campanas_detalle_correo` */

LOCK TABLES `campanas_detalle_correo` WRITE;

insert  into `campanas_detalle_correo`(`id`,`id_campana`,`nombre_correo`,`dia`,`email_mensaje`,`email_asunto`,`email_destinatario`,`email_remitente`,`date_create`,`date_update`) values (1,1,'registro',0,'hola buen día\r\n','[GRATIS] 3 pasos para limpiar tu zona V para evitar hongos','leonardo.jimenezp@gmail.com','',NULL,NULL),(2,1,'correo1',1,'prueba                       ','[GRATIS] SOLO por estos dos días, prueba',NULL,'prueba_correo@tiindo.com','2019-04-16 22:45:00','2019-04-16 22:45:00'),(3,1,'correo2',2,'prueba2','[GRATIS] SOLO por estos dos días, prueba2',NULL,'prueba_correo@tiindo.com','2019-04-16 22:52:11','2019-04-16 22:52:11'),(4,1,'correo3',2,'prueba4','[GRATIS] SOLO por estos dos días, prueba',NULL,'prueba_correo@tiindo.com','2019-04-16 22:56:46','2019-04-16 22:56:46'),(5,1,'correo4',4,'hola                       ','[GRATIS] SOLO por estos dos días, prueba2',NULL,'prueba_correo@tiindo.com','2019-04-16 22:57:54','2019-04-16 22:57:54');

UNLOCK TABLES;

/*Table structure for table `campanas_piv_clientes_correos` */

DROP TABLE IF EXISTS `campanas_piv_clientes_correos`;

CREATE TABLE `campanas_piv_clientes_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) DEFAULT NULL,
  `id_camp_correos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `campanas_piv_clientes_correos` */

LOCK TABLES `campanas_piv_clientes_correos` WRITE;

UNLOCK TABLES;

/*Table structure for table `cliente_piv_estado` */

DROP TABLE IF EXISTS `cliente_piv_estado`;

CREATE TABLE `cliente_piv_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) DEFAULT NULL,
  `id_estado_clientes` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente_piv_estado` */

LOCK TABLES `cliente_piv_estado` WRITE;

UNLOCK TABLES;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

UNLOCK TABLES;

/*Table structure for table `clientes_estados` */

DROP TABLE IF EXISTS `clientes_estados`;

CREATE TABLE `clientes_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `clientes_estados` */

LOCK TABLES `clientes_estados` WRITE;

insert  into `clientes_estados`(`id`,`estado`,`date_create`,`date_update`) values (1,'REGISTRADO','2019-04-15 19:00:06','2019-04-15 19:00:06'),(2,'SEGUIMIENTO','2019-04-15 19:00:06','2019-04-15 19:00:06'),(3,'COMPRA','2019-04-15 19:00:06','2019-04-15 19:00:06');

UNLOCK TABLES;

/*Table structure for table `config_correos` */

DROP TABLE IF EXISTS `config_correos`;

CREATE TABLE `config_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `config_correos` */

LOCK TABLES `config_correos` WRITE;

insert  into `config_correos`(`id`,`correo`,`contrasena`,`date_create`,`date_update`) values (1,'prueba_correo@tiindo.com',')42tYnJ9cyxW',NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `config_landing` */

DROP TABLE IF EXISTS `config_landing`;

CREATE TABLE `config_landing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_landing` varchar(100) DEFAULT NULL,
  `head_text` blob,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `config_landing` */

LOCK TABLES `config_landing` WRITE;

insert  into `config_landing`(`id`,`nombre_landing`,`head_text`,`date_create`,`date_update`) values (1,'intiv_cap','aquí va el pixcel de facebook',NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `dg_envio_email` */

DROP TABLE IF EXISTS `dg_envio_email`;

CREATE TABLE `dg_envio_email` (
  `int` int(10) DEFAULT NULL,
  `email_tipo` varchar(120) DEFAULT NULL,
  `email_remitente` blob,
  `email_destinatario` blob,
  `email_asunto` blob,
  `email_mensaje` blob,
  `preparado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dg_envio_email` */

LOCK TABLES `dg_envio_email` WRITE;

UNLOCK TABLES;

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `date_pago` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pagos` */

LOCK TABLES `pagos` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `img_perfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`user`,`contrasena`,`date`,`nombre`,`correo`,`tipo`,`img_perfil`) values (1,'juli','123',NULL,'juliana','juli@gmail.com','admin',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
