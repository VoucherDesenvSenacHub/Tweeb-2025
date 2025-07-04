CREATE DATABASE  IF NOT EXISTS `140p2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `140p2`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 192.168.22.9    Database: 140p2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_usuario` int(11) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (110,'ADM001','Administrador Geral','2025-06-26 11:26:21','2025-07-04 11:51:44');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_produto`
--

DROP TABLE IF EXISTS `avaliacao_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacao_produto` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `notas` tinyint(4) NOT NULL CHECK (`notas` between 1 and 5),
  `comentario` varchar(255) DEFAULT NULL,
  `data_avaliacao` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_avaliacao`),
  KEY `id` (`id`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `avaliacao_produto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `avaliacao_produto_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_produto`
--

LOCK TABLES `avaliacao_produto` WRITE;
/*!40000 ALTER TABLE `avaliacao_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_usuario` int(11) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cpf` (`cpf`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (73,'08436089197','2025-05-29 12:03:49','2025-05-29 12:03:49'),(77,'193.847.234-95','2025-06-02 11:51:28','2025-06-02 11:51:28'),(79,'193.872.349-44','2025-06-02 12:02:55','2025-06-02 12:02:55'),(80,'11122233312','2025-06-02 12:06:05','2025-06-02 12:06:05'),(86,'123.132.132-13','2025-06-06 08:17:16','2025-06-06 08:17:16'),(88,'05563710114','2025-06-06 09:48:19','2025-06-06 09:48:19'),(92,'846.562.354-55','2025-06-11 10:43:58','2025-06-11 10:43:58'),(93,'123.123.132-12','2025-06-11 12:16:24','2025-06-11 12:16:24'),(94,'111.111.111-11','2025-06-12 10:23:54','2025-06-12 10:23:54'),(95,'222.222.222-22','2025-06-16 09:34:32','2025-06-16 09:34:32'),(98,'109.493.922-11','2025-06-17 11:44:00','2025-06-17 11:44:00'),(99,'999.999.999-99','2025-06-17 21:08:48','2025-06-17 21:08:48'),(102,'454.545.454-54','2025-06-23 09:07:24','2025-06-23 09:07:24'),(103,'888.888.888-88','2025-06-23 20:17:22','2025-06-23 20:17:22');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_departamento` varchar(150) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'hardwares'),(2,'computadores'),(3,'perifericos'),(4,'energia'),(5,'audio'),(6,'jogos'),(7,'VENDAS'),(8,'VENDAS'),(9,'VENDAS');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `nome_endereco` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_endereco`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (1,86,'Casa do Linguicinha','Rua da Saudade','234','79041210','Tiradentes','Campo Grande','MS','2025-06-12 11:30:56','2025-06-12 11:30:56'),(4,102,'casa','Rua da Saudade','189','79041210','Tiradentes','Campo Grande','MS','2025-06-23 09:20:30','2025-06-23 09:20:30'),(5,88,'casinha','Rua Capiatã','240','79034-33','Parque dos Novos Estados','Campo Grande','MS','2025-06-26 09:32:18','2025-06-26 09:32:18'),(6,73,'casa','Rua da Saudade','189','79041210','Tiradentes','Campo Grande','MS','2025-06-30 09:18:29','2025-06-30 09:18:29');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(150) NOT NULL,
  `marca_fornecedor` varchar(150) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `endereco_fornecedor` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `id_usuario` int(11) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (124,'231312',NULL,'2025-06-26 10:12:59','2025-06-26 10:12:59'),(126,'231312',NULL,'2025-06-26 10:13:13','2025-06-26 10:13:13'),(127,'func005','Funcionário','2025-06-26 10:13:20','2025-06-26 10:13:20'),(128,'231312','Funcionario','2025-06-26 10:14:45','2025-06-26 10:14:45'),(130,'2234453','Funcionario','2025-06-26 11:43:07','2025-06-26 11:43:07'),(131,'111111','Funcionario','2025-06-26 11:58:41','2025-06-26 11:58:41'),(138,'9090',NULL,'2025-06-30 11:19:37','2025-06-30 11:19:37'),(140,'9090',NULL,'2025-06-30 11:20:39','2025-06-30 11:20:39'),(141,'9797','Funcionario','2025-06-30 11:25:52','2025-06-30 11:25:52'),(142,'1212','Funcionario','2025-06-30 11:48:26','2025-06-30 11:48:26'),(143,'44444','Funcionario','2025-06-30 11:50:30','2025-06-30 11:50:30'),(144,'303030','Funcionario','2025-06-30 11:52:47','2025-06-30 11:52:47'),(145,'func080','Funcionario','2025-06-30 11:54:01','2025-06-30 11:54:01'),(146,'eu memo','Funcionario','2025-06-30 12:05:19','2025-06-30 12:05:19'),(147,'3245','Funcionario','2025-06-30 12:06:57','2025-06-30 12:06:57'),(148,'7565464','Funcionario','2025-06-30 12:08:02','2025-06-30 12:08:02'),(149,'123432','Funcionario','2025-07-01 09:27:07','2025-07-01 09:27:07'),(151,'qweewqe','Funcionario','2025-07-02 10:25:37','2025-07-02 10:25:37'),(152,'rick001','Funcionario','2025-07-02 11:45:17','2025-07-02 11:45:17'),(154,'453637','tecnico','2025-07-03 10:02:24','2025-07-03 10:02:24'),(155,'4874782','tecnico','2025-07-04 09:36:12','2025-07-04 09:36:12'),(160,'777777','tecnico','2025-07-04 10:18:43','2025-07-04 10:18:43'),(161,'777777','tecnico','2025-07-04 10:34:52','2025-07-04 10:34:52'),(162,'7222222','tecnico','2025-07-04 10:35:28','2025-07-04 10:35:28'),(163,'5463546','tecnico','2025-07-04 10:38:57','2025-07-04 10:38:57'),(164,'7474747','tecnico','2025-07-04 10:43:16','2025-07-04 10:43:16'),(165,'211111111111','tecnico','2025-07-04 10:44:34','2025-07-04 10:44:34'),(167,'qweqweqe','Funcionario','2025-07-04 10:50:30','2025-07-04 10:50:30'),(168,'111111','tecnico','2025-07-04 11:52:27','2025-07-04 11:52:27'),(169,'7474747','vendedor','2025-07-04 12:09:34','2025-07-04 12:09:34');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orcamento`
--

DROP TABLE IF EXISTS `orcamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `prazo` varchar(30) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `status_orcamento` enum('pendente','aceito') DEFAULT NULL,
  PRIMARY KEY (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orcamento`
--

LOCK TABLES `orcamento` WRITE;
/*!40000 ALTER TABLE `orcamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `orcamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordem_servico`
--

DROP TABLE IF EXISTS `ordem_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordem_servico` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `data_abertura` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_equipamento` varchar(100) DEFAULT NULL,
  `nome_cliente` varchar(150) DEFAULT NULL,
  `email_cliente` varchar(150) DEFAULT NULL,
  `marca_modelo` varchar(100) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `numero_serie` varchar(50) DEFAULT NULL,
  `acessorios_entregues` text DEFAULT NULL,
  `relato_cliente` text DEFAULT NULL,
  `tecnico_responsavel` varchar(150) DEFAULT NULL,
  `servicos_solicitados` enum('atualização de firmware','backup e recuperação','configuração de sistema','formatação','limpeza e manutenção preventiva','serviços de software: instalação, configuração e atualização','substituição peças') DEFAULT NULL,
  `estimativa_custo` decimal(10,2) DEFAULT NULL,
  `aprovacao_cliente` enum('aceito') DEFAULT 'aceito',
  `servicos_realizados` text DEFAULT NULL,
  `pecas_substituidas` text DEFAULT NULL,
  `testes_realizados` text DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordem_servico`
--

LOCK TABLES `ordem_servico` WRITE;
/*!40000 ALTER TABLE `ordem_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordem_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `marca_modelo` varchar(100) NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  `imagem_produto` varchar(250) NOT NULL,
  `numero_serie` varchar(25) NOT NULL,
  `custo_produto` decimal(10,2) NOT NULL,
  `cor_produto` varchar(20) NOT NULL,
  `preco_unid` decimal(10,2) NOT NULL,
  `descricao_produto` varchar(250) NOT NULL,
  `detalhes_produto` varchar(500) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `entrega_gratis` tinyint(4) NOT NULL CHECK (`entrega_gratis` in (0,1)),
  `em_estoque` tinyint(4) NOT NULL CHECK (`em_estoque` in (0,1)),
  `garantia` tinyint(4) NOT NULL CHECK (`garantia` in (0,1)),
  `status_produto` tinyint(4) DEFAULT NULL CHECK (`status_produto` in (0,1)),
  PRIMARY KEY (`id_produto`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Cadeira Gamer','Flexform',52,'ad-produtos.png','123456789123',500.00,'',900.00,'Cadeira gamer tempest CG500, ótima para escritório, alcochoada, ergonômica, com várias cores','Rgb: rgb não, Overclocked não, Conector de alimentação 8pin, Categoria do produto: Placas Gráficas de Desktop,\nCenário de uso: GAMING, Áudio & Video, Família, Escritório de escritório, DESIGN, Estação de trabalho, Características do produto: CROSSFIRE',3,1,1,1,NULL),(2,'Cadeira Gamer','Flexform',52,'ad-produtos.png','123456789123',500.00,'preto',900.00,'Cadeira gamer tempest CG500, ótima para escritório, alcochoada, ergonômica, com várias cores','Rgb: rgb não, Overclocked não, Conector de alimentação 8pin, Categoria do produto: Placas Gráficas de Desktop,\nCenário de uso: GAMING, Áudio & Video, Família, Escritório de escritório, DESIGN, Estação de trabalho, Características do produto: CROSSFIRE',3,1,1,1,NULL),(4,'galaxy book 3','samsung',456,'../../../../public/uploads/684195edd4162.jpg','32165',700.00,'prata',800.00,'Notebook Samsung Galaxy Book3 360, Windows 11 Home, Intel Core i5-1335U, 8 GB, 256 GB SSD, 13.3\" Full HD AMOLED','Processador Intel Core i5-1335U, Memória RAM de 8 GB, 256 GB SSD de capacidade, Tela de 13.3 polegadas, Sistema Operacional Windows 11 Home\r\n',2,1,1,1,NULL),(5,'fone de ouvido kk','qcy kkk',852,'../../../../public/uploads/6852cf746ce4a.png','852963',785.15,'azul',999.00,'De acordo com os comentários, este item se destaca pela qualidade sonora, conforto excepcional e eficiente cancelamento de ruído. A maioria dos usuários relatou alta satisfação com a bateria de longa duração e a facilidade de uso, considerando-o um e','Fone de Ouvido Bluetooth QCY H3 ANC, Cancelamento de Ruído Ativo Headphone Bluetooth 5.4 Headset com Microfone',3,0,1,1,1),(6,'fone de ouvido','qcy',852,'../../../../public/uploads/68419a628581f.jpg','852963',785.15,'azul',896.52,'De acordo com os comentários, este item se destaca pela qualidade sonora, conforto excepcional e eficiente cancelamento de ruído. A maioria dos usuários relatou alta satisfação com a bateria de longa duração e a facilidade de uso, considerando-o um e','Fone de Ouvido Bluetooth QCY H3 ANC, Cancelamento de Ruído Ativo Headphone Bluetooth 5.4 Headset com Microfone',3,0,1,1,NULL),(7,'outro produto','qcy',852,'../../../../public/uploads/68419a6ce0ca6.jpg','852963',785.15,'azul',896.52,'De acordo com os comentários, este item se destaca pela qualidade sonora, conforto excepcional e eficiente cancelamento de ruído. A maioria dos usuários relatou alta satisfação com a bateria de longa duração e a facilidade de uso, considerando-o um e','Fone de Ouvido Bluetooth QCY H3 ANC, Cancelamento de Ruído Ativo Headphone Bluetooth 5.4 Headset com Microfone',3,0,1,1,0),(8,'produtoteste','teste',2,'../../../../public/uploads/684ae739693d5.jpg','537262354',600.00,'red',800.00,'sdasdasmdnamsd','smadbmasbd',1,0,0,0,1),(9,'fone de ouvido 452','qcy',852,'../../../../public/uploads/68517da22eeea.jpg','852963',785.15,'azul',896.52,'De acordo com os comentários, este item se destaca pela qualidade sonora, conforto excepcional e eficiente cancelamento de ruído. A maioria dos usuários relatou alta satisfação com a bateria de longa duração e a facilidade de uso, considerando-o um e','Fone de Ouvido Bluetooth QCY H3 ANC, Cancelamento de Ruído Ativo Headphone Bluetooth 5.4 Headset com Microfone',3,0,1,1,1),(10,'fone de ouvido','qcy',852,'../../../../public/uploads/68517e8971fa5.jpg','852963',785.15,'azul',896.52,'De acordo com os comentários, este item se destaca pela qualidade sonora, conforto excepcional e eficiente cancelamento de ruído. A maioria dos usuários relatou alta satisfação com a bateria de longa duração e a facilidade de uso, considerando-o um e','Fone de Ouvido Bluetooth QCY H3 ANC, Cancelamento de Ruído Ativo Headphone Bluetooth 5.4 Headset com Microfone',3,0,1,1,1),(11,'MOUSE','LOGITECH',520,'../../../../public/uploads/68594e7b18f37.png','741852',142.50,'PRATA',200.00,'Mouse Gamer Logitech G G203 Lightsync Rgb Até 8.000 Dpi Preto','Com luzes para melhorar a experiência de uso.\r\nLIGHTSYNC RGB colorido - Jogue com cores, com efeitos de ondas de cores personalizáveis.',3,1,1,1,1),(12,'teste placa','marca',25,'../../../../public/uploads/685952f75f125.webp','321',123.00,'red',526.00,'teste teste teste teste teste teste teste teste teste teste teste teste v teste  teste teste teste teste','teste teste teste teste teste teste teste teste teste teste teste teste v teste  teste teste teste teste',1,1,1,1,0),(13,'pc gamer','alienwere',1,'../../../../public/uploads/6859e9c30790d.jpg','34532223',7950.98,'Preto',5000.00,'pc gamer','detalhess',2,1,1,1,1),(14,'Mouse sem fio ',' Logitech',400,'../../../../public/uploads/685e99eda9c02.png','2654789652',200.00,'Preto',280.00,'Mouse sem fio Logitech M720 Triathlon','Conexão USB Unifying ou Bluetooth com Easy-Switch para até 3 dispositivos.',3,0,1,1,1);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionario`
--

DROP TABLE IF EXISTS `questionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionario` (
  `id_questionario` int(11) NOT NULL AUTO_INCREMENT,
  `conhecimento_tecnico` tinyint(4) NOT NULL CHECK (`conhecimento_tecnico` in (0,1)),
  `tipo_hardware_periferico` tinyint(4) NOT NULL CHECK (`tipo_hardware_periferico` in (0,1)),
  `tipo_compra_pessoal_corporativa` tinyint(4) NOT NULL CHECK (`tipo_compra_pessoal_corporativa` in (0,1)),
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_questionario`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `questionario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionario`
--

LOCK TABLES `questionario` WRITE;
/*!40000 ALTER TABLE `questionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `questionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas_preferencias`
--

DROP TABLE IF EXISTS `respostas_preferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostas_preferencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resposta1` varchar(255) DEFAULT NULL,
  `resposta2` varchar(255) DEFAULT NULL,
  `resposta3` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `respostas_preferencias_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas_preferencias`
--

LOCK TABLES `respostas_preferencias` WRITE;
/*!40000 ALTER TABLE `respostas_preferencias` DISABLE KEYS */;
INSERT INTO `respostas_preferencias` VALUES (1,80,'muito','games_computadores_hardwares','pessoal','2025-06-02 12:06:18');
/*!40000 ALTER TABLE `respostas_preferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('cliente','funcionario','administrador') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto_perfil` varchar(255) DEFAULT NULL,
  `token_recuperacao` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (73,'Arthur','Santoro teste','arthursantorogomes92@gmail.com','2222222222','$2y$10$o7/hl0MF5a18LI69.FbB8uJJ/q3VqtXg1ADM5sEvUWbEcEBdctxN6','cliente','2025-05-29 12:03:49','2025-06-17 11:42:01','foto_73_1750076318.jfif',NULL),(77,'Leandrrex',NULL,'234@sd',NULL,'1231','cliente','2025-06-02 11:51:28','2025-06-02 11:51:28',NULL,NULL),(79,'testando',NULL,'234444@gmail.com',NULL,'$2y$10$73nuByhh7kVLD9/I40RMtOD.vc.kAdr6Ej3z28BGBuOz479TL3bOO','cliente','2025-06-02 12:02:55','2025-06-02 12:02:55',NULL,NULL),(80,'João Almeida 17cm',NULL,'joaofavel@gmail.com',NULL,'$2y$10$HzA6XJRzAtnDarhD7WgS6eSRZpOJ2XAPbln1hauHuFEM3tK43mzOe','cliente','2025-06-02 12:06:05','2025-06-16 09:29:58',NULL,NULL),(86,'teste10',NULL,'teste10@gmail.com',NULL,'$2y$10$Uvn6PlJBBZ.2OXZeCmZNK.WXJ4WhVGvO5L9T1SOGn2VHfNdQvn9HS','cliente','2025-06-06 08:17:15','2025-06-16 10:32:18','foto_86_1750080701.jfif',NULL),(88,'Igor2','medeiros','igor@gmail.com','6499871523','$2y$10$LHORWNnyvQ4299iUGrZOG.PPYckQbP3vVgN3C2AK22WN8IVP.9p3G','cliente','2025-06-06 09:48:19','2025-06-18 11:59:55','6846f86ce4247_euzin2.jpg',NULL),(91,'aloha',NULL,'aloha@aloha.com',NULL,'$2y$10$0R9qIzv7u3pMD6MueZV1TOLqGG/I5ktV8daR8LzhN2CPgZmuESfC2','cliente','2025-06-09 09:40:07','2025-06-09 09:40:07','imagem_padrao.png',NULL),(92,'Guilhermekkkkkkkkkkkkkk','fdsfsfs','guilhermemiranda123@gmail.com','fasfafa','$2y$10$sXtcxRClY7QNFKNAphWWUOowBBYKNjWfNPikBplHRxY/AwiAtlyXS','cliente','2025-06-11 10:43:58','2025-06-12 09:11:49','684ac39f53fd7_logo-removebg-preview.png',NULL),(93,'bia','carvalho','bia123@gmail.com','12312123123','$2y$10$KbbofdK4O49xazgjr6oagurgOviYA5cZAtXGscGPJhPkKFTxr6sry','cliente','2025-06-11 12:16:24','2025-06-12 09:02:18','',NULL),(94,'cristiano','ronaldo','cristianoronaldo@gmail.com','3223233','$2y$10$rmUnR0wSwqw46MpPVi2zq./R/jDcUcasT.JFC3HzCyMlTdG5rW1lS','cliente','2025-06-12 10:23:54','2025-06-16 09:07:53','foto_94_1750075066.jfif',NULL),(95,'Marcos Tamedio','Joao','macosteste@gmail.com','67993473172','$2y$10$6QpFPtyWHYJL8O6L.xrlnecTK0WChfqBvQIamiCXagiK4r00q0ske','cliente','2025-06-16 09:34:32','2025-06-16 09:42:21','foto_95_1750077737.png',NULL),(98,'Clertt','','clert@gmail.com','','$2y$10$7LS50GFJtnm7SlIrpkUSqOArD77kO.5fHCezsrA8O/ON4tihBwBMS','cliente','2025-06-17 11:44:00','2025-06-18 09:21:59','imagem_padrao.png',NULL),(99,'maycon',NULL,'maycon123@gmail.com',NULL,'$2y$10$4jBRr1TG3LgF5P3h30l4huEEBF5xq1dCNm2XdEdiVciZbn3/sfJbW','cliente','2025-06-17 21:08:48','2025-06-17 21:53:30','imagem_padrao.png',NULL),(102,'pedro',NULL,'pedrosantorogomes90@gmail.com',NULL,'$2y$10$pefHf5NPrdN9vE1saYnXIe5/YdS.fIMGNEvqFcMblz6o93uIPBgUu','cliente','2025-06-23 09:07:24','2025-06-23 10:05:36','foto_102_1750683940.jfif',NULL),(103,'bruno',NULL,'bruno@gmail.com',NULL,'$2y$10$fdccgEqjaTzHBXPHK70/LOnJ.rhPj8L2D9Dhf3o.3BuLaNwT/JBSW','cliente','2025-06-23 20:17:22','2025-06-23 20:17:47','foto_103_1750720655.jpg',NULL),(110,'Leandro','Silva','admgeral@empresa.com','(67)99999-9999','adm123','administrador','2025-06-26 09:25:36','2025-07-04 11:51:44','perfil_6867ea71bb1fb.jpg',NULL),(113,'funcionario1','teste','funcionario1@gmail.com','5467875645','$2y$10$Qzny2YMX3U8Texrrimu/Cu6j.O6VvJI8PTNZpFfyLH.g6EuKcEZFO','funcionario','2025-06-26 09:28:49','2025-06-26 09:52:45','foto_113_1750942366.jfif',NULL),(116,'funcionario2 teste',NULL,'funcionario2@gmail.com','12345678','$2y$10$E09AYd3ir6iNjrXotqa/O.bHY14RcV68EqUZWintWgoO/hgj3s7ja','funcionario','2025-06-26 09:56:37','2025-06-26 09:56:37','imagem_padrao.png',NULL),(118,'funcionario3 teste',NULL,'funcionario3@gmail.com','(67) 9 9633-14444','$2y$10$twLr1GLnRVtt0nUN0T6NnuNBtUS1oD.lPwxTkz6VuM/zAmcHlDf1O','funcionario','2025-06-26 09:59:07','2025-06-26 09:59:07','padrao.png',NULL),(119,'funcionario4','teste','funcionario4@gmail.com','(67) 9 9633-1772','$2y$10$czHYL6Mjf18EOKVMpfT.NutA7933VzhmJqnKUAWGQNI/L.Pqo6LEq','funcionario','2025-06-26 10:01:41','2025-06-26 10:01:41','padrao.png',NULL),(123,'dsvsd','vcvcxvcx','fdhsbfhbs@gmail.com','67992253681','$2y$10$QcV0rb4YtuA5S8d4GTPb/uGoS6xDAsy.Vi/IR8aUV8XKR.5OIBUUu','funcionario','2025-06-26 10:10:42','2025-06-26 10:10:42','padrao.png',NULL),(124,'dsvsd','vcvcxvcx','nfvbsuafs@gmail.com','67992253681','$2y$10$YQnL4OAbildcDO8s1qDLX.Q0x9OG2PbSn/dQSxyOgJkSYBprYkX9q','funcionario','2025-06-26 10:12:59','2025-06-26 10:12:59','padrao.png',NULL),(126,'dsvsd','vcvcxvcx','nfvbsuaaafs@gmail.com','67992253681','$2y$10$JrZzvOKobP.oMVKVBiaJwOidzcNJQQUvLLv6lZgwCZyvQNxPLpRC2','funcionario','2025-06-26 10:13:13','2025-06-26 10:13:13','padrao.png',NULL),(127,'funcionario5','teste','funcionario5@gmail.com','12345678','$2y$10$G4Ox9xTh7aA.eeD1truNjOIW3h0mHKBomuDFL3v4pL2PSPK/6KMk6','funcionario','2025-06-26 10:13:20','2025-06-26 10:13:20','padrao.png',NULL),(128,'dsvsd','vcvcxvcx','vhdbfgdug@gmail.com','67992253681','$2y$10$4XY0ppwx.cWZ2.BE/5Cfi.Ofr8pgBdFC6V7/MtAKfVeHoNdbHHvUm','funcionario','2025-06-26 10:14:45','2025-06-26 10:14:45','padrao.png',NULL),(130,'Leandro','Oliveira','lelelelele@gmail.com','67992253647','$2y$10$D9BPh/C6eLaJppxS5I8LyOo9JROJ6WiqpUJA7NIH3VonQm/c2Uzz2','funcionario','2025-06-26 11:43:07','2025-06-26 11:43:07','padrao.png',NULL),(131,'teste','teste','testenovo@gmail.com','67992253681','$2y$10$92rEjGnMj/euH5i2MXNn7eh4ryHeYo3eZ99wHhwEGMCDIs9d2ARui','funcionario','2025-06-26 11:58:41','2025-06-26 11:58:41','padrao.png',NULL),(132,'kkkk','kkkkk','kkkkkk','kkkkk','$2y$10$e45NOc3KnMPa1rxMS/icbe0hMVeBhXJ3OUNVMUju8CNvhfA5gO7Qu','funcionario','2025-06-30 11:14:01','2025-06-30 11:14:01','imagem_padrao.png',NULL),(134,'kkkk','kkkkk','thiagoalmeida@live.com','kkkkk','$2y$10$EI0KndF.xRn5J3Sm2e1FH.xIf7EjedGZQjYSu7EyI.prdeGP3.25O','funcionario','2025-06-30 11:16:34','2025-06-30 11:16:34','imagem_padrao.png',NULL),(136,'kkkk','kkkkk','thiagoalmeida2@live.com','kkkkk','$2y$10$2mWeO0ho8bLiYTNoJzE8JOcTXGhN7jy11hhLsfGpfQk/PIDwHdBMy','funcionario','2025-06-30 11:17:57','2025-06-30 11:17:57','imagem_padrao.png',NULL),(138,'kkkk','kkkkk','thiagoalmeida3@live.com','kkkkk','$2y$10$W/jNfRhg.5POi8qQSpMquOB2yy6XW57T2pdz37hLyc/Ld2cm3Ipuq','funcionario','2025-06-30 11:19:37','2025-06-30 11:19:37','imagem_padrao.png',NULL),(140,'kkkk','kkkkk','thiagoalmeida4@live.com','kkkkk','$2y$10$DLC/LeWhCIjQuZQqqJlQh.Q6XODAwDs0QI3IRHr/B4574XrSVxDxa','funcionario','2025-06-30 11:20:39','2025-06-30 11:20:39','imagem_padrao.png',NULL),(141,'ARR','TUR','arthurrrr5@live.com','67999999','$2y$10$ugIGf7HE/lKpfSAVznVKp.5SAk7UjxsLHC.0A5cgJ/9.jPtaThDQ.','funcionario','2025-06-30 11:25:52','2025-06-30 11:25:52','imagem_padrao.png',NULL),(142,'ze da manga','Santoro Gomes','teste432111@gmail.com','(67) 9 9633-1772','$2y$10$aUNk7WhK1FCxsagL0MOh6OjABC4IP2Hrw0wCXI7dn02ZuMvWCEfki','funcionario','2025-06-30 11:48:26','2025-06-30 11:48:26','imagem_padrao.png',NULL),(143,'ze da goiaba','arthuurr','44444@gememme.com','(67) 9 9633-1772','$2y$10$ho35ZDFxjBg1A/bAx6h3O.epZ3o8WErjfOxyWroCUEiYYnT00znv2','funcionario','2025-06-30 11:50:30','2025-06-30 11:50:30','imagem_padrao.png',NULL),(144,'funcinario30','teste','funcionario30@gmail.com','67992253681','$2y$10$4iGxEEm6uGlLMS7XIIXNB.eAvEwwANWRSVt1XbS.LMdvOurMASixy','funcionario','2025-06-30 11:52:47','2025-06-30 11:52:47','imagem_padrao.png',NULL),(145,'funcionario80','ronaldo','funcionario80@gmail.com','5467875645','$2y$10$0GFOOxaysgtPw8xJoVgR6ejuFLtUwW/yM.eN2Jy4KkUyAXhTpRqIK','funcionario','2025-06-30 11:54:01','2025-06-30 11:54:01','imagem_padrao.png',NULL),(146,'funcionarioeumemo','eu memo','funcionarioeumemo@gmail.com','3131314','$2y$10$ZGMnKZ7NRcDqoa4l14nAw.oc.P8zcczRbj3j9pLsQh4xvrQYl3Ec.','funcionario','2025-06-30 12:05:19','2025-06-30 12:05:19','imagem_padrao.png',NULL),(147,'limpar','forms','limparForms@gmail.com','4534423234','$2y$10$DsAznCMg7Hq20MvURpAvNuuqemC60N/aGXtDenWUJLXNeDY4E5ms6','funcionario','2025-06-30 12:06:57','2025-06-30 12:06:57','imagem_padrao.png',NULL),(148,'teste1000@gmail.com','toledo','teste1000@gmail.com','12234567','$2y$10$O2mcGMjhvRlyqzFeJPeFv...M3Oi8vNCoJK6az8Hs5/bCP/StZzkK','funcionario','2025-06-30 12:08:02','2025-07-04 11:39:30','imagem_padrao.png',NULL),(149,'Matias','Fernandez','mat22@gmail.com','6799223512','$2y$10$THbDCRPyvTdPirT0Mwt4RuFZCCxlDHALyRVBqYiljBfGrardv/fUq','funcionario','2025-07-01 09:27:07','2025-07-01 09:27:07','padrao.png',NULL),(151,'funcinario137','Sanchez','funcionario137@gmail.com','76854','$2y$10$xgOQbhQW5dz9q5VXcHbGoOfIyT9eoYAQ10Zkg583K.9d4ufbajkem','funcionario','2025-07-02 10:25:37','2025-07-04 11:55:40','imagem_padrao.png',NULL),(152,'rick','sanchez','funcionariorick@gmail.com','765665','$2y$10$TkJe27ilavUS9JVZtlP7zejYnrRlHktGg/BLFGS8efs.DTH6ODugS','funcionario','2025-07-02 11:45:17','2025-07-02 12:08:59','perfil_68654b8fe11cb.jpg',NULL),(154,'funcionarioOFC','Oficial','funcionarioOFC@gmail.com','67883345621','$2y$10$miXM2dCKjEsVXRraEekTgulnZhO.sXCog0ZtTP40SLGvB67jKnJfK','funcionario','2025-07-03 10:02:24','2025-07-03 10:02:24',NULL,NULL),(155,'merge','meeeerg','merg@gmail.com','67984322113','$2y$10$jBJSyACnMx2zqBDiHWnJ4.OO/BlsHqUxLfZQuoqbO1ItYxlYBSFN.','funcionario','2025-07-04 09:36:12','2025-07-04 09:36:12',NULL,NULL),(160,'novofunc','novofunc','tvbfh@gmail.com','6788443882','$2y$10$FVHvRqFAXxN1tyXcilYNt.I9JODovBZQ1Bk4uzLh0YKfAsjVyYYry','funcionario','2025-07-04 10:18:43','2025-07-04 10:18:43',NULL,NULL),(161,'novofunc','novofunc','tfdnsjo@gmail.com','6788443882','$2y$10$E9fNUc9sbmxRPF4p0uYqo.XMuqVE.KqOJwhEZYiWffyAzFiMZpeMy','funcionario','2025-07-04 10:34:52','2025-07-04 10:34:52',NULL,NULL),(162,'novofuncd','novofuncds','tfdnsj21o@gmail.com','67884421213','$2y$10$X0AQLtneYE4x4KHemaSbku71N3NQJstVBZ7di8aBz3X0uefkEeT7C','funcionario','2025-07-04 10:35:28','2025-07-04 10:35:28',NULL,NULL),(163,'t7fevwtf','bfd','vdcvdcvd@gmail.com','54353245342','$2y$10$U1QDhS4AD5gXUHC48f4hWeIvfVugow5g.mgca6hWGXKf6.uVSejqO','funcionario','2025-07-04 10:38:56','2025-07-04 10:38:56',NULL,NULL),(164,'jfbhgbfs','fd bh difhb','bhdhdh@gmail.com','679922534123','$2y$10$daBOlUOB.RWQBD48BOfvbea5xGRZBUWvdwWCOsdWtUn1w0c4LOhRa','funcionario','2025-07-04 10:43:16','2025-07-04 10:43:16',NULL,NULL),(165,'ffffffffffff','ffffffffffffffffffffffffff','sssssssssss@gmail.com','67364t236','$2y$10$faCSBS41F23pzaqFZdj.O.27zMr7leAmGITQ9GfUyHisr9S7IADkC','funcionario','2025-07-04 10:44:34','2025-07-04 10:44:34',NULL,NULL),(167,'wknfksfjrf','adffddffd','empresa@gmail.com','133434234','$2y$10$wnnIS8lYrFHoXMGdVi8l5eEAN6DQUUA441ufLBs5ouGsD7IrsDYTO','funcionario','2025-07-04 10:50:30','2025-07-04 10:50:30','imagem_padrao.png',NULL),(168,'maarcos','Atacadista','marcosatacadista@gmail.com','32323232323','$2y$10$F9Wi3reGOQPILxS1b7omx.NkEov7ebPrtUSK/rHmuDW0K2L0vdOa2','funcionario','2025-07-04 11:52:27','2025-07-04 11:52:27',NULL,NULL),(169,'maaarcos','Atacadistaaa','marcosdafacil221@gmail.com','32323232323','$2y$10$OOrIrvcd9XmznrfzjgNuP.NOjo6nxlrbJyFygkfDXNLvtyVPr4q3m','funcionario','2025-07-04 12:09:34','2025-07-04 12:09:34',NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-04 11:12:48
