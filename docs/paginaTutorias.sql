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
  `clave` int(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `colegio` varchar(50) NOT NULL,
  PRIMARY KEY (`clave`),
  KEY `idGrupo` (`idGrupo`),
  CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
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
  `clave` int(11) NOT NULL,
  `ciclo` year(4) NOT NULL,
  PRIMARY KEY (`idTutor`),
  KEY `rfc` (`rfc`),
  KEY `idGrupo` (`idGrupo`),
  KEY `clave` (`clave`),
  CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`rfc`) REFERENCES `profesores` (`rfc`),
  CONSTRAINT `tutores_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `tutores_ibfk_3` FOREIGN KEY (`clave`) REFERENCES `asignatura` (`clave`)
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

-- Dump completed on 2024-03-13 21:05:15
