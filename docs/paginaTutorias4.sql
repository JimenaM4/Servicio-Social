-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: paginaTutorias3
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(12) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `sal` varchar(255) NOT NULL,
  `noTrabajador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `fk_noTrabajador` (`noTrabajador`),
  CONSTRAINT `fk_noTrabajador` FOREIGN KEY (`noTrabajador`) REFERENCES `profesores` (`noTrabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (2,'AdminP9T1','973d9269030ff08de7adb01dd39649b197d82031f8897b1b1fa83cda7726e3ca','669ec3ced0a93',NULL),(4,'AdminP9T2','ed48b846f6cc0afea77bd289d6ce82cb7fcff3d714ddd22bac33313f290993a5','669ed618393e5',12345);
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `noCuenta` int(9) NOT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fechaNacimiento` int(8) NOT NULL,
  `ciclo` year(4) NOT NULL,
  PRIMARY KEY (`noCuenta`),
  KEY `idGrupo` (`idGrupo`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (322145876,108,'Jimena','Martinez','Mendez','322145876@alumno.enp.unam.mx',20061225,2024);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `clave` int(11) NOT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `nombre` varchar(60) NOT NULL,
  `colegio` varchar(60) NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `idGrupo` (`idGrupo`),
  CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,1400,NULL,'MATEM?TICAS IV','MATEM?TICAS'),(2,1401,NULL,'F?SICA III','F?SICA'),(3,1402,NULL,'LENGUA ESPA?OLA','LITERATURA'),(4,1403,NULL,'HISTORIA UNIVERSAL III','HISTORIA'),(5,1404,NULL,'L?GICA','FILOSOF?A'),(6,1405,NULL,'GEOGRAF?A','GEOGRAF?A'),(7,1406,NULL,'DIBUJO II','DIBUJO Y MODELADO'),(8,1407,NULL,'LENG. EXTR. INGL?S IV','INGL?S'),(9,1408,NULL,'LENG. EXTR. FRANC?S IV','FRANC?S'),(10,1409,NULL,'DANZA CL?SICA IV','EDUC EST?TICA-ART?ST.'),(11,1409,NULL,'DANZA CONTEMPOR?NEA IV','EDUC EST?TICA-ART?ST.'),(12,1409,NULL,'DANZA ESPA?OLA IV','EDUC EST?TICA-ART?ST.'),(13,1409,NULL,'DANZA REGIONAL MEXICANA IV','EDUC EST?TICA-ART?ST.'),(14,1409,NULL,'ESCULTURA IV','EDUC EST?TICA-ART?ST.'),(15,1409,NULL,'FOTOGRAF?A IV','EDUC EST?TICA-ART?ST.'),(16,1409,NULL,'GRABADO IV','EDUC EST?TICA-ART?ST.'),(17,1409,NULL,'M?SICA IV','EDUC EST?TICA-ART?ST.'),(18,1409,NULL,'PINTURA IV','EDUC EST?TICA-ART?ST.'),(19,1409,NULL,'TEATRO IV','EDUC EST?TICA-ART?ST.'),(20,1410,NULL,'EDUCACI?N F?SICA IV','EDUCACI?N F?SICA'),(21,1411,NULL,'ORIENTACI?N EDUCATIVA IV','ORIENTACI?N EDUCATIVA'),(22,1412,NULL,'INFORM?TICA','INFORM?TICA'),(23,1500,NULL,'MATEM?TICAS V','MATEM?TICAS'),(24,1501,NULL,'QU?MICA III','QU?MICA'),(25,1502,NULL,'BIOLOG?A IV','BIOLOG?A'),(26,1503,NULL,'EDUCACI?N PARA LA SALUD','MORFOLOG?A, FISIOLOG?A Y SALUD'),(27,1504,NULL,'HISTORIA DE M?XICO II','HISTORIA'),(28,1505,NULL,'ETIMOLOG?AS GRECOLATINAS','LETRAS CL?SICAS'),(29,1506,NULL,'LENG. EXTR. INGL?S V','INGL?S'),(30,1507,NULL,'LENG. EXTR. FRANC?S V','FRANC?S'),(31,1508,NULL,'LENG. EXTR. ITALIANO I','ITALIANO'),(32,1511,NULL,'LENG. EXTR, FRANC?S I','FRANC?S'),(33,1512,NULL,'?TICA','FILOSOF?A'),(34,1513,NULL,'EDUCACI?N F?SICA V','EDUCACI?N F?SICA'),(35,1514,NULL,'DANZA CONTEMPOR?NEA V','EDUC EST?TICA-ART?ST.'),(36,1514,NULL,'DANZA ESPA?OLA V','EDUC EST?TICA-ART?ST.'),(37,1514,NULL,'DANZA REGIONAL MEXICANA V','EDUC EST?TICA-ART?ST.'),(38,1514,NULL,'DANZA CL?SICA V','EDUC EST?TICA-ART?ST.'),(39,1514,NULL,'ESCULTURA V','EDUC EST?TICA-ART?ST.'),(40,1514,NULL,'FOTOGRAF?A V','EDUC EST?TICA-ART?ST.'),(41,1514,NULL,'ORIENTACI?N EDUCATIVA V','ORIENTACI?N EDUCATIVA'),(42,1516,NULL,'LITERATURA UNIVERSAL','LITERATURA'),(43,1601,NULL,'DERECHO','CIENCIAS SOCIALES'),(44,1602,NULL,'LITERATURA MEX E IBEROAM.','LITERATURA'),(45,1603,NULL,'INGL?S VI','INGL?S'),(46,1604,NULL,'FRANC?S VI','FRANC?S'),(47,1605,NULL,'ALEMAN II','ALEM?N'),(48,1606,NULL,'ITALIANO II','ITALIANO'),(49,1607,NULL,'INGL?S II','INGL?S'),(50,1608,NULL,'FRANC?S II','FRANC?S'),(51,1609,NULL,'PSICOLOG?A','PSICOLOG?A E HIGIENE MENTAL'),(52,1700,NULL,'HIGIENE MENTAL','PSICOLOG?A E HIGIENE MENTAL'),(53,1701,NULL,'TEATRO VI','EDUC EST?TICA-ART?ST.'),(54,1702,NULL,'M?SICA VI','EDUC EST?TICA-ART?ST.'),(55,1712,NULL,'ESTAD?STICA Y PROB','MATEM?TICAS'),(56,1600,NULL,'MATEM?TICAS VI','MATEM?TICAS'),(57,1610,NULL,'DIBUJO CONSTRUCTIVO II','DIBUJO Y MODELADO'),(58,1611,NULL,'F?SICA IV','F?SICA'),(59,1612,NULL,'QU?MICA IV','QU?MICA'),(60,1613,NULL,'BIOLOG?A V','BIOLOG?A'),(61,1706,NULL,'GEOLOG?A Y MINEROLOG?A','QU?MICA'),(62,1709,NULL,'F?SICO-QU?MICA','F?SICA Y QU?MICA'),(63,1710,NULL,'TEMAS SELEC. MATEM?TICAS','MATEM?TICAS'),(64,1719,NULL,'INFORM?TICA APLICADA A LA CIENCIA Y LA INDUSTRIA','INFORM?TICA'),(65,1721,NULL,'COSMOGRAF?A','GEOGRAF?A Y COSMOGRAF?A'),(66,1621,NULL,'F?SICA IV','F?SICA'),(67,1622,NULL,'QU?MICA IV','QU?MICA'),(68,1711,NULL,'TEMAS SELEC. BIOLOG?A','BIOLOG?A'),(69,1614,NULL,'GEOGRAF?A ECON?MICA','GEOGRAF?A Y COSMOGRAF?A'),(70,1615,NULL,'INTRODUCC. AL ESTUDIO DE LAS CIENCIAS SOCIALES Y EC.','CIENCIAS SOCIALES'),(71,1616,NULL,'PROBLEMAS SOC. POLIT. Y ECON?MICOS DE M?XICO','CIENCIAS SOCIALES'),(72,1619,NULL,'MATEM?TICAS VI','MATEM?TICAS'),(73,1704,NULL,'CONTABILIDAD Y GESTI?N ADMINISTRATIVA','CIENCIAS SOCIALES'),(74,1707,NULL,'GEOGRAF?A POL?TICA','GEOGRAF?A Y COSMOGRAF?A'),(75,1720,NULL,'SOCIOLOG?A','CIENCIAS SOCIALES'),(76,1617,NULL,'HISTORIA DE LA CULTURA','HISTORIA'),(77,1620,NULL,'MATEM?TICAS VI','MATEM?TICAS'),(78,1703,NULL,'REVOLUCI?N MEXICANA','HISTORIA'),(79,1705,NULL,'PENSAMIENTO FILOS?FICO DE M?XICO','FILOSOF?A'),(80,1708,NULL,'MODELADO II','DIBUJO Y MODELADO'),(81,1713,NULL,'LAT?N','LETRAS CL?SICAS'),(82,1714,NULL,'GRIEGO','LETRAS CL?SICAS'),(83,1715,NULL,'COMUNICACI?N VISUAL','DIBUJO Y MODELADO'),(84,1717,NULL,'EST?TICA','FILOSOF?A'),(85,1718,NULL,'HISTORIA DEL ARTE','HISTORIA');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrusel`
--

DROP TABLE IF EXISTS `carrusel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrusel` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin` int(11) DEFAULT NULL,
  `ruta` varchar(75) NOT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `idAdmin` (`idAdmin`),
  CONSTRAINT `carrusel_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `administradores` (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrusel`
--

LOCK TABLES `carrusel` WRITE;
/*!40000 ALTER TABLE `carrusel` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrusel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionarios`
--

DROP TABLE IF EXISTS `cuestionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionarios` (
  `idCuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `idTutor` int(11) DEFAULT NULL,
  `titulo` varchar(75) NOT NULL,
  `creacion` date NOT NULL,
  `inicioAplicacion` date DEFAULT NULL,
  `finAplicacion` date DEFAULT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCuestionario`),
  KEY `idTutor` (`idTutor`),
  CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`idTutor`) REFERENCES `tutores` (`idTutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios`
--

LOCK TABLES `cuestionarios` WRITE;
/*!40000 ALTER TABLE `cuestionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacionalumnos`
--

DROP TABLE IF EXISTS `evaluacionalumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacionalumnos` (
  `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idTutor` int(11) DEFAULT NULL,
  `noCuenta` int(9) DEFAULT NULL,
  `idCuestionario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `idTutor` (`idTutor`),
  KEY `noCuenta` (`noCuenta`),
  KEY `idCuestionario` (`idCuestionario`),
  CONSTRAINT `evaluacionalumnos_ibfk_1` FOREIGN KEY (`idTutor`) REFERENCES `tutores` (`idTutor`),
  CONSTRAINT `evaluacionalumnos_ibfk_2` FOREIGN KEY (`noCuenta`) REFERENCES `alumno` (`noCuenta`),
  CONSTRAINT `evaluacionalumnos_ibfk_3` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionarios` (`idCuestionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacionalumnos`
--

LOCK TABLES `evaluacionalumnos` WRITE;
/*!40000 ALTER TABLE `evaluacionalumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacionalumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,401),(2,402),(3,403),(4,404),(5,405),(6,406),(7,407),(8,408),(9,409),(10,410),(11,411),(12,412),(13,413),(14,414),(15,415),(16,416),(17,417),(18,418),(19,419),(20,420),(21,451),(22,452),(23,453),(24,454),(25,455),(26,456),(27,457),(28,458),(29,459),(30,460),(31,461),(32,462),(33,463),(34,464),(35,465),(36,466),(37,467),(38,468),(39,469),(40,470),(41,471),(42,501),(43,502),(44,503),(45,504),(46,505),(47,506),(48,507),(49,508),(50,509),(51,510),(52,511),(53,512),(54,513),(55,514),(56,515),(57,516),(58,517),(59,518),(60,519),(61,551),(62,552),(63,553),(64,554),(65,555),(66,556),(67,557),(68,558),(69,559),(70,560),(71,561),(72,562),(73,563),(74,564),(75,565),(76,566),(77,567),(78,568),(79,601),(80,602),(81,603),(82,604),(83,605),(84,606),(85,607),(86,608),(87,609),(88,610),(89,611),(90,612),(91,613),(92,614),(93,615),(94,616),(95,617),(96,618),(97,619),(98,620),(99,621),(100,622),(101,623),(102,651),(103,652),(104,653),(105,654),(106,655),(107,656),(108,657),(109,658),(110,659),(111,660),(112,661),(113,662),(114,663),(115,664),(116,665),(117,666),(118,667),(119,668);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opciones` (
  `idOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `idPregunta` int(11) DEFAULT NULL,
  `opcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idOpcion`),
  KEY `idPregunta` (`idPregunta`),
  CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idCuestionario` int(11) DEFAULT NULL,
  `pregunta` varchar(255) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `idCuestionario` (`idCuestionario`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionarios` (`idCuestionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesores` (
  `rfc` varchar(14) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `noTrabajador` int(8) NOT NULL,
  PRIMARY KEY (`rfc`),
  UNIQUE KEY `noTrabajador` (`noTrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` VALUES ('MEMJ0612251H0','Diego','Martinez','Mendez','diego.martinez@dgenp.unam.mx',12345);
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `idRecurso` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `tipoArchivo` varchar(10) DEFAULT NULL,
  `urll` varchar(100) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  `rfc` varchar(14) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `visualizacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idRecurso`),
  KEY `rfc` (`rfc`),
  CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`rfc`) REFERENCES `profesores` (`rfc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recursos`
--

LOCK TABLES `recursos` WRITE;
/*!40000 ALTER TABLE `recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idCuestionario` int(11) DEFAULT NULL,
  `noCuenta` int(9) DEFAULT NULL,
  `idPregunta` int(11) DEFAULT NULL,
  `idOpcion` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `idCuestionario` (`idCuestionario`),
  KEY `noCuenta` (`noCuenta`),
  KEY `idPregunta` (`idPregunta`),
  KEY `idOpcion` (`idOpcion`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idCuestionario`) REFERENCES `cuestionarios` (`idCuestionario`),
  CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`noCuenta`) REFERENCES `alumno` (`noCuenta`),
  CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`),
  CONSTRAINT `respuestas_ibfk_4` FOREIGN KEY (`idOpcion`) REFERENCES `opciones` (`idOpcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutores`
--

DROP TABLE IF EXISTS `tutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutores` (
  `idTutor` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(14) DEFAULT NULL,
  `idGrupo` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `ciclo` year(4) NOT NULL,
  PRIMARY KEY (`idTutor`),
  KEY `rfc` (`rfc`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`rfc`) REFERENCES `profesores` (`rfc`),
  CONSTRAINT `tutores_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `tutores_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutores`
--

LOCK TABLES `tutores` WRITE;
/*!40000 ALTER TABLE `tutores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-22 16:14:21
