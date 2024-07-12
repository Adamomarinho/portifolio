/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: blogapi
-- ------------------------------------------------------
-- Server version	10.6.18-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `nomecat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'categoria 1'),(2,'categoria 2'),(3,'categoria 3'),(4,'categoria 4');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `acao` varchar(255) DEFAULT NULL,
  `data_acao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6587 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (6579,'Lei','::1','Este usuario acessou a pagina de gerenciamento de Posts','2024-07-12 10:46:06'),(6580,'Lei','::1','Este usuario acessou a pagina de gerenciamento de Posts','2024-07-12 10:49:30'),(6581,'Lei','::1','Este usuario acessou a pagina de gerenciamento de Posts','2024-07-12 10:51:57'),(6582,'Lei','::1','Este usuario acessou a pagina de visualizacao de Posts de id =14','2024-07-12 10:53:03'),(6583,'Lei','::1','Este usuario acessou a pagina de gerenciamento de Posts','2024-07-12 10:53:19'),(6584,'Lei','::1','Este usuario acessou a pagina de visualizacao de Posts de id =4','2024-07-12 10:53:21'),(6585,'Lei','::1','Este usuario acessou a pagina de criacao de novo Post','2024-07-12 10:55:00'),(6586,'Lei','::1','Este usuario acessou a pagina de gerenciamento de Posts','2024-07-12 10:55:14');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `idnivel` int(11) NOT NULL AUTO_INCREMENT,
  `nomenivel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'Admin'),(2,'Escritor'),(3,'Inativo');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `conteudo` varchar(255) DEFAULT NULL,
  `situacao` varchar(7) DEFAULT NULL,
  `criado` date DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Titulo 1','Conteudo 1','1','2024-05-22',1),(2,2,'Titulo 2','Conteudo 2','1','2024-05-21',2),(3,3,'Titulo 3','Conteudo 3','1','2024-07-10',1),(4,4,'Titulo 4','Conteudo 4','1','2024-07-10',3),(5,4,'Titulo 5','Conteudo 5','1','2024-07-10',1),(6,3,'Titulo 6','Conteudo 6','1','2024-07-10',3),(7,2,'Titulo 7','Conteudo 7','1','2024-07-10',3),(8,1,'Titulo 8','Conteudo 8','1','2024-07-10',1),(9,3,'Nao aprovado','Postagem banida','2','2024-07-10',2),(10,2,'Verificando','Aprovacao pendente','3','2024-07-10',2),(11,1,'Titulo 11','Conteudo 11','1','2024-07-11',2),(12,3,'Titulo 12','Conteudo 12','1','2024-07-11',2),(13,2,'Titulo 13','Conteudo 13','1','2024-07-11',2),(14,2,'Titulo 14','Conteudo 14','3','2024-07-12',3);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacao`
--

DROP TABLE IF EXISTS `situacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacao` (
  `idsit` int(11) NOT NULL AUTO_INCREMENT,
  `nomesit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacao`
--

LOCK TABLES `situacao` WRITE;
/*!40000 ALTER TABLE `situacao` DISABLE KEYS */;
INSERT INTO `situacao` VALUES (1,'Ativo'),(2,'Inativo'),(3,'Processando');
/*!40000 ALTER TABLE `situacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeuser` varchar(255) DEFAULT NULL,
  `emailuser` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `recuperasenha` varchar(255) DEFAULT NULL,
  `situacaouser` int(11) DEFAULT NULL,
  `idnivel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Adamo','admin@admin.com.br','$2y$10$8GC8/Ur/wKzUwhZjo8IA6.M9DiAwOoPGxsVkyQQoAREVlpvTbUGrK',NULL,1,'1'),(2,'Teste','teste@testando.com.br','$2y$10$j9KoCmC0RUl26GByPlu2suGq7JrO9kMCRXXwchPIX8eMR9HVEJWLK',NULL,1,'2'),(3,'Lei','lei@gmail.com','$2y$10$4s7ieLuU3WezhLaHp3Q6TenW2Xwwbw5WC7du/li6aBSGnsZHTyDva',NULL,1,'2'),(4,'teste','teste@teste.com.br','$2y$10$ZsnIrxFTlXP4udZZgXSuIeLYvRKjjLaDytFIDJOEBicyARPJdn12q',NULL,3,'3'),(5,'testando','testando@teste.com.br','$2y$10$Zs3PjNyUeEOkQQp5bQ9VyuPWb3GgI//HftPWgS4CVswLnZQ9JYx2S',NULL,2,'3');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-12 13:12:53
