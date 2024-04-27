-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: paginatutorias
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
INSERT INTO `asignatura` VALUES (1,1400,NULL,'MATEMÁTICAS IV','MATEMÁTICAS'),(2,1401,NULL,'FÍSICA III','FÍSICA'),(3,1402,NULL,'LENGUA ESPAÑOLA','LITERATURA'),(4,1403,NULL,'HISTORIA UNIVERSAL III','HISTORIA'),(5,1404,NULL,'LÓGICA','FILOSOFÍA'),(6,1405,NULL,'GEOGRAFÍA','GEOGRAFÍA'),(7,1406,NULL,'DIBUJO II','DIBUJO Y MODELADO'),(8,1407,NULL,'LENG. EXTR. INGLÉS IV','INGLÉS'),(9,1408,NULL,'LENG. EXTR. FRANCÉS IV','FRANCÉS'),(10,1409,NULL,'DANZA CLÁSICA IV','EDUC ESTÉTICA-ARTÍST.'),(11,1409,NULL,'DANZA CONTEMPORÁNEA IV','EDUC ESTÉTICA-ARTÍST.'),(12,1409,NULL,'DANZA ESPAÑOLA IV','EDUC ESTÉTICA-ARTÍST.'),(13,1409,NULL,'DANZA REGIONAL MEXICANA IV','EDUC ESTÉTICA-ARTÍST.'),(14,1409,NULL,'ESCULTURA IV','EDUC ESTÉTICA-ARTÍST.'),(15,1409,NULL,'FOTOGRAFÍA IV','EDUC ESTÉTICA-ARTÍST.'),(16,1409,NULL,'GRABADO IV','EDUC ESTÉTICA-ARTÍST.'),(17,1409,NULL,'MÚSICA IV','EDUC ESTÉTICA-ARTÍST.'),(18,1409,NULL,'PINTURA IV','EDUC ESTÉTICA-ARTÍST.'),(19,1409,NULL,'TEATRO IV','EDUC ESTÉTICA-ARTÍST.'),(20,1410,NULL,'EDUCACIÓN FÍSICA IV','EDUCACIÓN FÍSICA'),(21,1411,NULL,'ORIENTACIÓN EDUCATIVA IV','ORIENTACIÓN EDUCATIVA'),(22,1412,NULL,'INFORMÁTICA','INFORMÁTICA'),(23,1500,NULL,'MATEMÁTICAS V','MATEMÁTICAS'),(24,1501,NULL,'QUÍMICA III','QUÍMICA'),(25,1502,NULL,'BIOLOGÍA IV','BIOLOGÍA'),(26,1503,NULL,'EDUCACIÓN PARA LA SALUD','MORFOLOGÍA, FISIOLOGÍA Y SALUD'),(27,1504,NULL,'HISTORIA DE MÉXICO II','HISTORIA'),(28,1505,NULL,'ETIMOLOGÍAS GRECOLATINAS','LETRAS CLÁSICAS'),(29,1506,NULL,'LENG. EXTR. INGLÉS V','INGLÉS'),(30,1507,NULL,'LENG. EXTR. FRANCÉS V','FRANCÉS'),(31,1508,NULL,'LENG. EXTR. ITALIANO I','ITALIANO'),(32,1511,NULL,'LENG. EXTR, FRANCÉS I','FRANCÉS'),(33,1512,NULL,'ÉTICA','FILOSOFÍA'),(34,1513,NULL,'EDUCACIÓN FÍSICA V','EDUCACIÓN FÍSICA'),(35,1514,NULL,'DANZA CONTEMPORÁNEA V','EDUC ESTÉTICA-ARTÍST.'),(36,1514,NULL,'DANZA ESPAÑOLA V','EDUC ESTÉTICA-ARTÍST.'),(37,1514,NULL,'DANZA REGIONAL MEXICANA V','EDUC ESTÉTICA-ARTÍST.'),(38,1514,NULL,'DANZA CLÁSICA V','EDUC ESTÉTICA-ARTÍST.'),(39,1514,NULL,'ESCULTURA V','EDUC ESTÉTICA-ARTÍST.'),(40,1514,NULL,'FOTOGRAFÍA V','EDUC ESTÉTICA-ARTÍST.'),(41,1514,NULL,'ORIENTACIÓN EDUCATIVA V','ORIENTACIÓN EDUCATIVA'),(42,1516,NULL,'LITERATURA UNIVERSAL','LITERATURA'),(43,1601,NULL,'DERECHO','CIENCIAS SOCIALES'),(44,1602,NULL,'LITERATURA MEX E IBEROAM.','LITERATURA'),(45,1603,NULL,'INGLÉS VI','INGLÉS'),(46,1604,NULL,'FRANCÉS VI','FRANCÉS'),(47,1605,NULL,'ALEMAN II','ALEMÁN'),(48,1606,NULL,'ITALIANO II','ITALIANO'),(49,1607,NULL,'INGLÉS II','INGLÉS'),(50,1608,NULL,'FRANCÉS II','FRANCÉS'),(51,1609,NULL,'PSICOLOGÍA','PSICOLOGÍA E HIGIENE MENTAL'),(52,1700,NULL,'HIGIENE MENTAL','PSICOLOGÍA E HIGIENE MENTAL'),(53,1701,NULL,'TEATRO VI','EDUC ESTÉTICA-ARTÍST.'),(54,1702,NULL,'MÚSICA VI','EDUC ESTÉTICA-ARTÍST.'),(55,1712,NULL,'ESTADÍSTICA Y PROB','MATEMÁTICAS'),(56,1600,NULL,'MATEMÁTICAS VI','MATEMÁTICAS'),(57,1610,NULL,'DIBUJO CONSTRUCTIVO II','DIBUJO Y MODELADO'),(58,1611,NULL,'FÍSICA IV','FÍSICA'),(59,1612,NULL,'QUÍMICA IV','QUÍMICA'),(60,1613,NULL,'BIOLOGÍA V','BIOLOGÍA'),(61,1706,NULL,'GEOLOGÍA Y MINEROLOGÍA','QUÍMICA'),(62,1709,NULL,'FÍSICO-QUÍMICA','FÍSICA Y QUÍMICA'),(63,1710,NULL,'TEMAS SELEC. MATEMÁTICAS','MATEMÁTICAS'),(64,1719,NULL,'INFORMÁTICA APLICADA A LA CIENCIA Y LA INDUSTRIA','INFORMÁTICA'),(65,1721,NULL,'COSMOGRAFÍA','GEOGRAFÍA Y COSMOGRAFÍA'),(66,1621,NULL,'FÍSICA IV','FÍSICA'),(67,1622,NULL,'QUÍMICA IV','QUÍMICA'),(68,1711,NULL,'TEMAS SELEC. BIOLOGÍA','BIOLOGÍA'),(69,1614,NULL,'GEOGRAFÍA ECONÓMICA','GEOGRAFÍA Y COSMOGRAFÍA'),(70,1615,NULL,'INTRODUCC. AL ESTUDIO DE LAS CIENCIAS SOCIALES Y EC.','CIENCIAS SOCIALES'),(71,1616,NULL,'PROBLEMAS SOC. POLIT. Y ECONÓMICOS DE MÉXICO','CIENCIAS SOCIALES'),(72,1619,NULL,'MATEMÁTICAS VI','MATEMÁTICAS'),(73,1704,NULL,'CONTABILIDAD Y GESTIÓN ADMINISTRATIVA','CIENCIAS SOCIALES'),(74,1707,NULL,'GEOGRAFÍA POLÍTICA','GEOGRAFÍA Y COSMOGRAFÍA'),(75,1720,NULL,'SOCIOLOGÍA','CIENCIAS SOCIALES'),(76,1617,NULL,'HISTORIA DE LA CULTURA','HISTORIA'),(77,1620,NULL,'MATEMÁTICAS VI','MATEMÁTICAS'),(78,1703,NULL,'REVOLUCIÓN MEXICANA','HISTORIA'),(79,1705,NULL,'PENSAMIENTO FILOSÓFICO DE MÉXICO','FILOSOFÍA'),(80,1708,NULL,'MODELADO II','DIBUJO Y MODELADO'),(81,1713,NULL,'LATÍN','LETRAS CLÁSICAS'),(82,1714,NULL,'GRIEGO','LETRAS CLÁSICAS'),(83,1715,NULL,'COMUNICACIÓN VISUAL','DIBUJO Y MODELADO'),(84,1717,NULL,'ESTÉTICA','FILOSOFÍA'),(85,1718,NULL,'HISTORIA DEL ARTE','HISTORIA');
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
  `idCoordinador` int(11) DEFAULT NULL,
  `ruta` varchar(75) NOT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `idCoordinador` (`idCoordinador`),
  CONSTRAINT `carrusel_ibfk_1` FOREIGN KEY (`idCoordinador`) REFERENCES `coordinadores` (`idCoordinador`)
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
-- Table structure for table `coordinadores`
--

DROP TABLE IF EXISTS `coordinadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordinadores` (
  `idCoordinador` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(14) DEFAULT NULL,
  `turno` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `ciclo` year(4) NOT NULL,
  PRIMARY KEY (`idCoordinador`),
  KEY `rfc` (`rfc`),
  CONSTRAINT `coordinadores_ibfk_1` FOREIGN KEY (`rfc`) REFERENCES `profesores` (`rfc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinadores`
--

LOCK TABLES `coordinadores` WRITE;
/*!40000 ALTER TABLE `coordinadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `coordinadores` ENABLE KEYS */;
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

-- Dump completed on 2024-04-07 14:23:49
