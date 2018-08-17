/*
Navicat MySQL Data Transfer

Source Server         : Local Xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : colegio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-16 20:04:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumno
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `procedencia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `distrito` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  `apoderado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alumno_usuarios1_idx` (`usuarios_id`),
  KEY `fk_alumno_apoderado1_idx` (`apoderado_id`),
  CONSTRAINT `fk_alumno_apoderado1` FOREIGN KEY (`apoderado_id`) REFERENCES `apoderado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES ('1', '52417485', 'nacional', 'huanuco', 'huanuco', 'peru', '2009-06-16', 'm', '457889', 'sdffder@fgght.com', '40151643', '1');
INSERT INTO `alumno` VALUES ('2', '34456789', 'nacional', 'huanuco', 'huanuco', 'peru', '2009-05-11', 'f', '235689', 'wererer@dfgfg.com', '22568945', '1');

-- ----------------------------
-- Table structure for apoderado
-- ----------------------------
DROP TABLE IF EXISTS `apoderado`;
CREATE TABLE `apoderado` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `distrito` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apoderado
-- ----------------------------
INSERT INTO `apoderado` VALUES ('1', '52638596', 'asdsad@sdf', 'los nogales 123', '344556', 'profesor', 'huanuco', 'huanuco', 'peru');

-- ----------------------------
-- Table structure for aula
-- ----------------------------
DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `aforo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aula
-- ----------------------------

-- ----------------------------
-- Table structure for contenido
-- ----------------------------
DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id` int(11) NOT NULL,
  `contenido` varchar(45) DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contenido_curso1_idx` (`curso_id`),
  CONSTRAINT `fk_contenido_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contenido
-- ----------------------------

-- ----------------------------
-- Table structure for curso
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `grado_nivel_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curso_grado_nivel1_idx` (`grado_nivel_id`),
  KEY `fk_curso_docente1_idx` (`docente_id`),
  CONSTRAINT `fk_curso_docente1` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_grado_nivel1` FOREIGN KEY (`grado_nivel_id`) REFERENCES `grado_nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES ('1', 'Personal Social', '1', '0');
INSERT INTO `curso` VALUES ('2', 'Educación Física', '1', '0');
INSERT INTO `curso` VALUES ('3', 'Comunicación', '1', '0');
INSERT INTO `curso` VALUES ('4', 'Arte y Cultura', '1', '0');
INSERT INTO `curso` VALUES ('5', 'Castellano', '1', '0');
INSERT INTO `curso` VALUES ('6', 'Ingles', '1', '0');
INSERT INTO `curso` VALUES ('7', 'Matemática', '1', '0');
INSERT INTO `curso` VALUES ('8', 'Ciencia y Tecnología', '1', '0');
INSERT INTO `curso` VALUES ('9', 'Educación Religiosa', '1', '0');
INSERT INTO `curso` VALUES ('10', 'Personal Social', '8', '0');
INSERT INTO `curso` VALUES ('11', 'Educación Física', '8', '0');
INSERT INTO `curso` VALUES ('12', 'Comunicación', '8', '0');
INSERT INTO `curso` VALUES ('13', 'Arte y Cultura', '8', '0');
INSERT INTO `curso` VALUES ('14', 'Castellano', '8', '0');
INSERT INTO `curso` VALUES ('15', 'Ingles', '8', '0');
INSERT INTO `curso` VALUES ('16', 'Matemática', '8', '0');
INSERT INTO `curso` VALUES ('17', 'Ciencia y Tecnología', '8', '0');
INSERT INTO `curso` VALUES ('18', 'Educación Religiosa', '8', '0');

-- ----------------------------
-- Table structure for docente
-- ----------------------------
DROP TABLE IF EXISTS `docente`;
CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_docente_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_docente_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docente
-- ----------------------------

-- ----------------------------
-- Table structure for grado_nivel
-- ----------------------------
DROP TABLE IF EXISTS `grado_nivel`;
CREATE TABLE `grado_nivel` (
  `id` int(11) NOT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `limite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grado_nivel
-- ----------------------------
INSERT INTO `grado_nivel` VALUES ('1', 'primero', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('2', 'segundo', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('3', 'tercero', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('4', 'cuarto', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('5', 'quinto', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('6', 'sexto', 'primaria', null);
INSERT INTO `grado_nivel` VALUES ('7', 'primero', 'secundaria', null);
INSERT INTO `grado_nivel` VALUES ('8', 'segundo', 'secundaria', null);
INSERT INTO `grado_nivel` VALUES ('9', 'tercero', 'secundaria', null);
INSERT INTO `grado_nivel` VALUES ('10', 'cuarto', 'secundaria', null);
INSERT INTO `grado_nivel` VALUES ('11', 'quinto', 'secundaria', null);

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `anio` year(4) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `grado_nivel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_curso1_idx` (`curso_id`),
  KEY `fk_horario_grado_nivel1_idx` (`grado_nivel_id`),
  CONSTRAINT `fk_horario_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_grado_nivel1` FOREIGN KEY (`grado_nivel_id`) REFERENCES `grado_nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of horario
-- ----------------------------

-- ----------------------------
-- Table structure for matricula
-- ----------------------------
DROP TABLE IF EXISTS `matricula`;
CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `fecha_matricula` date DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `descuento` decimal(5,2) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `anulado` varchar(45) DEFAULT NULL,
  `fecha_anulacion` date DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `grado_nivel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matricula_alumno1_idx` (`alumno_id`),
  KEY `fk_matricula_grado_nivel1_idx` (`grado_nivel_id`),
  CONSTRAINT `fk_matricula_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_grado_nivel1` FOREIGN KEY (`grado_nivel_id`) REFERENCES `grado_nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matricula
-- ----------------------------
INSERT INTO `matricula` VALUES ('1', '150.00', '2018', '2018-08-01', null, null, null, 'activo', 'no', null, '1', '1');
INSERT INTO `matricula` VALUES ('2', '150.00', '2018', '2018-08-01', null, null, null, 'activo', 'no', null, '2', '8');

-- ----------------------------
-- Table structure for nota
-- ----------------------------
DROP TABLE IF EXISTS `nota`;
CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `nota` decimal(3,1) DEFAULT NULL,
  `periodo` int(11) DEFAULT NULL,
  `matricula_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `nota_descripcion_id` int(11) NOT NULL,
  `docente` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nota_matricula1_idx` (`matricula_id`),
  KEY `fk_nota_curso1_idx` (`curso_id`),
  KEY `fk_nota_nota_descripcion1_idx` (`nota_descripcion_id`),
  CONSTRAINT `fk_nota_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nota_matricula1` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nota_nota_descripcion1` FOREIGN KEY (`nota_descripcion_id`) REFERENCES `nota_descripcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nota
-- ----------------------------

-- ----------------------------
-- Table structure for nota_descripcion
-- ----------------------------
DROP TABLE IF EXISTS `nota_descripcion`;
CREATE TABLE `nota_descripcion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nota_descripcion
-- ----------------------------
INSERT INTO `nota_descripcion` VALUES ('1', 'parcial');
INSERT INTO `nota_descripcion` VALUES ('2', 'final');
INSERT INTO `nota_descripcion` VALUES ('3', 'Trabajo Academico');

-- ----------------------------
-- Table structure for pensiones
-- ----------------------------
DROP TABLE IF EXISTS `pensiones`;
CREATE TABLE `pensiones` (
  `id` int(11) NOT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `matricula_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pensiones_matricula1_idx` (`matricula_id`),
  CONSTRAINT `fk_pensiones_matricula1` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pensiones
-- ----------------------------

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'alumno');
INSERT INTO `perfil` VALUES ('2', 'docente');
INSERT INTO `perfil` VALUES ('3', 'administrador');

-- ----------------------------
-- Table structure for tutor
-- ----------------------------
DROP TABLE IF EXISTS `tutor`;
CREATE TABLE `tutor` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tutor
-- ----------------------------

-- ----------------------------
-- Table structure for tutor_grado_nivel
-- ----------------------------
DROP TABLE IF EXISTS `tutor_grado_nivel`;
CREATE TABLE `tutor_grado_nivel` (
  `tutor_id` int(11) NOT NULL,
  `grado_nivel_id` int(11) NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tutor_id`,`grado_nivel_id`),
  KEY `fk_tutor_has_grado_nivel_grado_nivel1_idx` (`grado_nivel_id`),
  KEY `fk_tutor_has_grado_nivel_tutor1_idx` (`tutor_id`),
  CONSTRAINT `fk_tutor_has_grado_nivel_grado_nivel1` FOREIGN KEY (`grado_nivel_id`) REFERENCES `grado_nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tutor_has_grado_nivel_tutor1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tutor_grado_nivel
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_perfil_idx` (`perfil_id`),
  CONSTRAINT `fk_usuarios_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('22154849', 'emartel', '2222', 'Erick Alexis', 'Martel Salazar', '2');
INSERT INTO `usuarios` VALUES ('22568945', 'nmori', '3333', 'Nitza Jackeline', 'Mori Sumaran', '1');
INSERT INTO `usuarios` VALUES ('40151643', 'cmartel', '1111', 'César Augusto', 'Martel Salazar', '1');
