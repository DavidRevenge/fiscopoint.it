-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: fiscopoint
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `servizi`
--

DROP TABLE IF EXISTS `servizi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servizi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servizi`
--

LOCK TABLES `servizi` WRITE;
/*!40000 ALTER TABLE `servizi` DISABLE KEYS */;
INSERT INTO `servizi` VALUES (1,'CAF - Assistenza Fiscale'),(2,'Servizio di Patronato'),(3,'Gestione Contabilità e Paghe'),(4,'Colf e Badanti'),(5,' Pratiche telematiche'),(6,'Fatturazione Elettronica'),(7,' Formazione'),(8,' Privacy'),(9,' Assicurazioni'),(10,' Accesso al Credito'),(11,' Moneta Elettronica'),(12,'Centro raccolta CAF');
/*!40000 ALTER TABLE `servizi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sezioni`
--

DROP TABLE IF EXISTS `sezioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sezioni` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sezioni`
--

LOCK TABLES `sezioni` WRITE;
/*!40000 ALTER TABLE `sezioni` DISABLE KEYS */;
INSERT INTO `sezioni` VALUES (0,'CAF'),(1,'Altre Pratiche'),(2,'Assicurazioni');
/*!40000 ALTER TABLE `sezioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipologia_pratica`
--

DROP TABLE IF EXISTS `tipologia_pratica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipologia_pratica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `id_sezione` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipologia_pratica`
--

LOCK TABLES `tipologia_pratica` WRITE;
/*!40000 ALTER TABLE `tipologia_pratica` DISABLE KEYS */;
INSERT INTO `tipologia_pratica` VALUES (1,'MOD. 730',0),(2,'ISEE',0),(3,'RED',0),(4,'MOD. ICLAV',0),(5,'MOD. ICRIC',0),(6,'MOD. PSAS/ACC',0),(7,'UNICO PF',0),(8,'IMU',0),(9,'ALTRO',0),(10,'PATRONATO',1),(11,'SUCCESSIONI',1),(12,'CONTRATTI DI LOCAZIONE',1),(13,'VISURE CATASTALI',1),(14,'VISURE CAMERALI',1),(15,'VISURE CONSERVATORIA IMM.',1),(16,'FORMAZIONE',1),(17,'MONETA ELETTRONICA',1),(18,'PRIVACY',1),(19,'PERMESSI RINNOVI DI SOGGIORNO',1),(20,'ASSICURAZIONI',2);
/*!40000 ALTER TABLE `tipologia_pratica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-17  0:15:28
