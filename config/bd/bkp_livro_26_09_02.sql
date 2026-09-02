-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: livro
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_Categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Fantasia'),(2,'Romance');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_Cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Alice','alice123@gmail.com','123','2222222222','cadastrado'),(2,'Matheus','matheus1234@gmail.com','1234','33333333333','anonimo');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_pedido_has_livro`
--

DROP TABLE IF EXISTS `item_pedido_has_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_pedido_has_livro` (
  `Item_Pedido_id_Item` int NOT NULL,
  `Item_Pedido_id_Pedido` int NOT NULL,
  `Item_Pedido_id_Livro` int NOT NULL,
  `Livro_id_Livro` int NOT NULL,
  PRIMARY KEY (`Item_Pedido_id_Item`,`Item_Pedido_id_Pedido`,`Item_Pedido_id_Livro`,`Livro_id_Livro`),
  KEY `fk_Item_Pedido_has_Livro_Livro1_idx` (`Livro_id_Livro`),
  CONSTRAINT `fk_Item_Pedido_has_Livro_Livro1` FOREIGN KEY (`Livro_id_Livro`) REFERENCES `livro` (`id_Livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_pedido_has_livro`
--

LOCK TABLES `item_pedido_has_livro` WRITE;
/*!40000 ALTER TABLE `item_pedido_has_livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_pedido_has_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `id_Livro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editora` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `id_Categoria` int NOT NULL,
  PRIMARY KEY (`id_Livro`),
  KEY `fk_Livro_Categoria1_idx` (`id_Categoria`),
  CONSTRAINT `fk_Livro_Categoria1` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagamento` (
  `id_Pagamento` int NOT NULL AUTO_INCREMENT,
  `forma_pagamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_Pagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento`
--

LOCK TABLES `pagamento` WRITE;
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
INSERT INTO `pagamento` VALUES (1,'Débito');
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_Pedido` int NOT NULL AUTO_INCREMENT,
  `data_pedido` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `Pagamento_id_Pagamento` int NOT NULL,
  `Cliente_id_Cliente` int NOT NULL,
  PRIMARY KEY (`id_Pedido`),
  KEY `fk_Pedido_Pagamento1_idx` (`Pagamento_id_Pagamento`),
  KEY `fk_Pedido_Cliente1_idx` (`Cliente_id_Cliente`),
  CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_id_Cliente`) REFERENCES `cliente` (`id_Cliente`),
  CONSTRAINT `fk_Pedido_Pagamento1` FOREIGN KEY (`Pagamento_id_Pagamento`) REFERENCES `pagamento` (`id_Pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_has_livro`
--

DROP TABLE IF EXISTS `pedido_has_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido_has_livro` (
  `Pedido_id_Pedido` int NOT NULL,
  `Pedido_Pagamento_id_Pagamento` int NOT NULL,
  `Pedido_Pagamento_id_Pedido` int NOT NULL,
  `Livro_id_Livro` int NOT NULL,
  PRIMARY KEY (`Pedido_id_Pedido`,`Pedido_Pagamento_id_Pagamento`,`Pedido_Pagamento_id_Pedido`,`Livro_id_Livro`),
  KEY `fk_Pedido_has_Livro_Livro1_idx` (`Livro_id_Livro`),
  KEY `fk_Pedido_has_Livro_Pedido1_idx` (`Pedido_id_Pedido`,`Pedido_Pagamento_id_Pagamento`,`Pedido_Pagamento_id_Pedido`),
  CONSTRAINT `fk_Pedido_has_Livro_Livro1` FOREIGN KEY (`Livro_id_Livro`) REFERENCES `livro` (`id_Livro`),
  CONSTRAINT `fk_Pedido_has_Livro_Pedido1` FOREIGN KEY (`Pedido_id_Pedido`) REFERENCES `pedido` (`id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_has_livro`
--

LOCK TABLES `pedido_has_livro` WRITE;
/*!40000 ALTER TABLE `pedido_has_livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_has_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_has_livro1`
--

DROP TABLE IF EXISTS `pedido_has_livro1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido_has_livro1` (
  `Pedido_id_Pedido` int NOT NULL,
  `Livro_id_Livro` int NOT NULL,
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`Pedido_id_Pedido`,`Livro_id_Livro`),
  KEY `fk_Pedido_has_Livro1_Livro1_idx` (`Livro_id_Livro`),
  KEY `fk_Pedido_has_Livro1_Pedido1_idx` (`Pedido_id_Pedido`),
  CONSTRAINT `fk_Pedido_has_Livro1_Livro1` FOREIGN KEY (`Livro_id_Livro`) REFERENCES `livro` (`id_Livro`),
  CONSTRAINT `fk_Pedido_has_Livro1_Pedido1` FOREIGN KEY (`Pedido_id_Pedido`) REFERENCES `pedido` (`id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_has_livro1`
--

LOCK TABLES `pedido_has_livro1` WRITE;
/*!40000 ALTER TABLE `pedido_has_livro1` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_has_livro1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-02 13:55:40
