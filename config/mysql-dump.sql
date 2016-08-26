CREATE DATABASE  IF NOT EXISTS `carrinho_compras` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `carrinho_compras`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: carrinho_compras
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `autenticacao`
--

DROP TABLE IF EXISTS `autenticacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autenticacao` (
  `autenticacao_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`autenticacao_id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autenticacao`
--

LOCK TABLES `autenticacao` WRITE;
/*!40000 ALTER TABLE `autenticacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `autenticacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristica`
--

DROP TABLE IF EXISTS `caracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracteristica` (
  `caracteristica_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`caracteristica_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristica`
--

LOCK TABLES `caracteristica` WRITE;
/*!40000 ALTER TABLE `caracteristica` DISABLE KEYS */;
INSERT INTO `caracteristica` VALUES (1,'Marca'),(2,'Modelo'),(3,'Medidas'),(4,'Peso'),(5,'Conteudo'),(6,'Garantia');
/*!40000 ALTER TABLE `caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `categoria_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Audio e Video'),(2,'Computadores'),(3,'Sala'),(4,'Quarto'),(5,'Cozinha'),(6,'Dormitório'),(7,'Livros'),(8,'Automotivos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cliente_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (21,'DINEY LUIZ ANTUNES','13445453','3345-04-05','diney.dla@gmail.com','11969140823'),(22,'DINEY LUIZ ANTUNES','13445453','3345-04-05','diney.dla@gmail.com','11969140823'),(23,'DINEY LUIZ ANTUNES','345678','0033-02-12','diney.dla@gmail.com','11969140823');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `endereco_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(100) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cep` int(10) unsigned NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`endereco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (21,'Rua Amélia Marques De Oliveira',11,'12321',6365370,'31321','Casa Branca','SP'),(22,'Rua Amélia Marques De Oliveira',11,'12321',6365370,'31321','Casa Branca','SP'),(23,'Rua Amélia Marques De Oliveira',11,'4535',23456,'345678','Casa Branca','SP');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco_cliente`
--

DROP TABLE IF EXISTS `endereco_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco_cliente` (
  `endereco_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`endereco_id`,`cliente_id`),
  KEY `cliente_id_idx_idx` (`cliente_id`),
  CONSTRAINT `cliente_id_fk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `endereco_id_fk_2` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco_cliente`
--

LOCK TABLES `endereco_cliente` WRITE;
/*!40000 ALTER TABLE `endereco_cliente` DISABLE KEYS */;
INSERT INTO `endereco_cliente` VALUES (21,21),(22,22),(23,23);
/*!40000 ALTER TABLE `endereco_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_pagamento` (
  `forma_pagamento_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`forma_pagamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagamento`
--

LOCK TABLES `forma_pagamento` WRITE;
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` VALUES (1,'Boleto'),(2,'Cartão de Crédito'),(3,'Débito');
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `pedido_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned NOT NULL,
  `endereco_id` int(10) unsigned NOT NULL,
  `forma_pagamento_id` tinyint(3) unsigned NOT NULL,
  `valor_total` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `cliente_id_idx_idx` (`cliente_id`),
  KEY `endereco_id_idx_idx` (`endereco_id`),
  KEY `forma_pag_id_fk_idx` (`forma_pagamento_id`),
  CONSTRAINT `cliente_id_fk` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `endereco_id_fk` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `forma_pag_id_fk` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamento` (`forma_pagamento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (20,21,21,3,6000.00),(21,22,22,3,6000.00),(22,23,23,3,4780.00);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_produto`
--

DROP TABLE IF EXISTS `pedido_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_produto` (
  `pedido_id` int(10) unsigned NOT NULL,
  `produto_id` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`pedido_id`,`produto_id`),
  KEY `pedido_id_fk_idx` (`pedido_id`),
  KEY `produto_id_fk` (`produto_id`),
  CONSTRAINT `pedido_id_fk` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produto_id_fk` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_produto`
--

LOCK TABLES `pedido_produto` WRITE;
/*!40000 ALTER TABLE `pedido_produto` DISABLE KEYS */;
INSERT INTO `pedido_produto` VALUES (20,2,2,3000.00,6000.00),(21,2,2,3000.00,6000.00),(22,3,4,1195.00,4780.00);
/*!40000 ALTER TABLE `pedido_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `produto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Televisao Samsung 42','Televisao Samsung 42, Smart, Led, Ultra Slim','Samsung',1700.00,'http://img.ijacotei.com.br/produtos/200/200/53/47/11064753.jpg'),(2,'Televisao Sony 50 Exemplo Categoria +','Televisao Sony 50 Smart tv, Funcao Torcida','Sony',3000.00,'http://thumbs.buscape.com.br/tv/smart-tv-sony-bravia-kdl-50w705a-50-polegadas-led-plana_200x200-PU7da40_1.jpg'),(3,'Computador Intel Dual Core','Computador Intel Dual Core 2.41ghz 4gb Hd 500gb Monitor Led 15,6 3green Triumph Business Desktop','Intel',1195.00,'http://imagens.americanas.com.br/produtos/01/00/item/13331/8/13331803_3GG.jpg'),(4,'Notebook Vaio Fit 15F VJF153B0411W','Notebook Vaio Fit 15F VJF153B0411W Intel Core i7 8GB 1TB Tela LED 15,6\" Windows 10 - Branco','Vaio ',3899.00,'http://imagens.americanas.com.br/produtos/01/00/item/124534/4/124534442_1GG.jpg');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_caracteristica`
--

DROP TABLE IF EXISTS `produto_caracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_caracteristica` (
  `produto_id` int(10) unsigned NOT NULL,
  `caracteristica_id` int(10) unsigned NOT NULL,
  `informacao` varchar(255) NOT NULL,
  PRIMARY KEY (`produto_id`,`caracteristica_id`),
  KEY `categoria_id_idx_idx` (`caracteristica_id`),
  CONSTRAINT `caracteristica_id_fk` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristica` (`caracteristica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produto_id_fk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_caracteristica`
--

LOCK TABLES `produto_caracteristica` WRITE;
/*!40000 ALTER TABLE `produto_caracteristica` DISABLE KEYS */;
INSERT INTO `produto_caracteristica` VALUES (1,1,'SAMSUMG'),(1,2,'Modelo Teste'),(1,3,'Altura 30cm, 30cm comprimento'),(1,4,'7kg'),(1,5,'1 Monitor, 1 apoio para parede'),(1,6,'3 anos'),(2,1,'SONY'),(2,2,'TV MODELO'),(2,3,'Altura 50cm, 40cm comprimento'),(2,4,'8kg'),(2,5,'1 Monitor, 1 apoio para parede'),(2,6,'4 anos');
/*!40000 ALTER TABLE `produto_caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_categoria`
--

DROP TABLE IF EXISTS `produto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_categoria` (
  `produto_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`produto_id`,`categoria_id`),
  KEY `categoria_id_fk` (`categoria_id`),
  CONSTRAINT `categoria_id_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produto_id_fk_3` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_categoria`
--

LOCK TABLES `produto_categoria` WRITE;
/*!40000 ALTER TABLE `produto_categoria` DISABLE KEYS */;
INSERT INTO `produto_categoria` VALUES (1,1),(2,1),(3,2),(4,2),(2,3);
/*!40000 ALTER TABLE `produto_categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-26  1:46:40
