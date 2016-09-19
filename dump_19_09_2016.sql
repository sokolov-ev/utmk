-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: metallvsem
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `office_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin',2,'Юрий','metallvsem@ukr.net',1474296593,10,'$2y$10$XGe99NxtIqmFSMHh4LhHx.t8O3jdZVN9L5aj.kYYonrS8WKthoG9K','ZZEQKHh18Qze8jE953HbdTXfXkFYnAfqpKqoEkZ11vP5xQTmv0k8dX0K4VCJ',1469075870,1474296593),(7,'Moderator',2,'Иван Луценко','luci@mail.com',1474305575,10,'$2y$10$PfIfrsPPkuz.BzrvrNAb5.yCVZ3ED3Qh8Y1ME/cnZ/54MxUULnY6.','jCcm0FqSrxOPdkgtw1whwrYy2HqpbDmskFJJsSylirdXkUpn9z6DDFHEPKD3',1470308189,1474305575),(8,'Moderator',2,'Михаил Варнавский','vara@mail.com',NULL,10,'$2y$10$VnAIOhFp7RPMnTsVZdjOyeze/SgwhOMpaC7u.yxfvftRp/auknAy.',NULL,1470308252,1471624917);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (20,2,'accounting-tel','(044) 502 50 45',1471613454,1473686625),(22,2,'mobile','(097) 901 51 68',1471613454,1473686625),(23,2,'email','metallvsem@ukr.net',1472728000,1473686625);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (6,3,0,2,'1472551579_723493.jpg',1472551579,1472560868),(7,3,0,1,'1472551901_723140.jpg',1472551901,1472560868),(8,4,0,0,'1472553477_723495.jpg',1472553477,1472553477),(9,6,0,0,'1472556411_723493.jpg',1472556411,1472556411),(10,5,0,0,'1472632277_723140.jpg',1472632277,1472632277);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `parent_exist` smallint(6) NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (4,0,0,'1','{\"en\":\"Two\",\"ru\":\"Два\",\"uk\":\"Два\"}','two',1470911429,1474282586),(6,0,0,'2','{\"en\":\"Tree\",\"ru\":\"Третий\",\"uk\":\"Третій\"}','tree',1470912285,1474282968),(7,8,0,'4','{\"en\":\"4\",\"ru\":\"Четыре\",\"uk\":\"4\"}','4',1472465106,1474282968),(8,0,1,'3','{\"en\":\"five\",\"ru\":\"Пять\",\"uk\":\"Пиять\"}','five',1473769047,1474282968);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_07_19_082056_create_admin_table',1),('2016_08_04_123735_create_menu_table',2),('2016_08_11_105658_create_offices_table',3),('2016_08_11_120647_create_contacts_table',3),('2016_08_12_121923_create_products_table',3),('2016_08_12_122649_create_images_table',3),('2016_08_30_125644_create_order_table',4),('2016_08_30_131044_create_order-products_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offices`
--

LOCK TABLES `offices` WRITE;
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT INTO `offices` VALUES (2,'main','{\"en\":\"\",\"ru\":\"Металлобаза Киев\",\"uk\":\"\"}','{\"en\":\"\",\"ru\":\"Компания  ООО«ЮТМК» – ведущий производитель электротехнического оборудования от 0,4 кВ до 10 кВ на рынке Украины. Мы имеем возможность производства низковольтного и высоковольтного распределительного электрооборудования для промышленных нужд  предприятия до 10 кВа.\\r\\n\\r\\nПанели и шкафы управления для грузоподъемных механизмов, мостовых, козловых, портальных, башенных кранов, спецкранов для предприятий горно-металлургического и машиностроительного комплекса со степенью защиты IP00, IP10, IP 21, IP54.\",\"uk\":\"\"}','{\"en\":\"Kiev\",\"ru\":\"Киев\",\"uk\":\"Київ\"}','{\"en\":\"Verkhovnoi Rady Blvd, 34, Kyiv, Ukraine\",\"ru\":\"бул. Верховного Совета, 34, Киев, город Киев, Украина\",\"uk\":\"бульвар Верховної Ради, 34, Київ, Україна\"}',50.45194499999999,30.63284299999998,1471613454,1471613454);
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `formed` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `contacts` text COLLATE utf8_unicode_ci NOT NULL,
  `wish` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,0,0,1,0,'096-2859 4654 65 46541 564','хочу, много чего хотеть!',1473777477,1474024475);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products`
--

LOCK TABLES `orders_products` WRITE;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` VALUES (3,1,3,3,1473779766,1474023107),(5,1,4,5,1474018219,1474023104);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `show_my` smallint(6) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,4,2,'balka_stalnaya_dvutavrovaya_st3_09g2s_ipe_hea_heb','{\"en\":\"\",\"ru\":\"Балка стальная двутавровая Ст3, 09Г2С, IPE, HEA, HEB\",\"uk\":\"\"}','{\"en\":\"\",\"ru\":\"Балка двутавровая – изделие для промышленного, крупнопанельного строительства. Используется для строительства мостов, опорных сооружений, массивных металлоконструкций.\\r\\n\\r\\nДвутавровая балка делится на несколько типов: горячекатаная, стальная специальная, нормальная «Б», широкополочная «Ш», колонная «К», среднеполочная «Д»,  низколегированная «09Г2С». Длиной двутавровые балки бывают от 4 до 12 метров. Вес стальной балки достигает 108 км\\/м.\",\"uk\":\"\"}',900,0,1,1,1472481698,1473762671),(4,4,2,'list_stalnoy','{\"en\":\"\",\"ru\":\"Лист стальной\",\"uk\":\"\"}','{\"en\":\"\",\"ru\":\"Купить лист стальной горячекатаный, стальной квадрат, стальной круг, арматуру и другую продукцию, по хорошим ценам можно в компании «ЮТМК». Мы следим за тем, чтобы качество продукции и качество предоставленых нами услуг, были на высшем уровне. Наши клиенты получают самые выгодные условия сотрудничества. Убедитесь в этом лично. Не зависимо от того, будет ли это единоразовая покупка, или же Вы станете нашим постоянным клиентом, мы предоставим Вам самые низкие цены на всю необходимую продукцию.\",\"uk\":\"\"}',10000,1000,1,1,1472553477,1473762681),(5,6,2,'vapsai','{\"en\":\"\",\"ru\":\"вапсаи\",\"uk\":\"\"}','{\"en\":\"\",\"ru\":\"чапрампрчапрсмопрот\",\"uk\":\"\"}',345234,0,1,1,1472553546,1473762692),(6,6,2,'pro_pro_pnropvnovpn','{\"en\":\"\",\"ru\":\"про про пнропвновпн\",\"uk\":\"\"}','{\"en\":\"\",\"ru\":\"про пнопснгоспнорчаепрваер вапр\",\"uk\":\"\"}',34563245,0,1,1,1472556411,1473762702);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note_user` text COLLATE utf8_unicode_ci,
  `activity` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Григорий Иващенко','УкрСибГаз','mail@mail.ru','093-56-5656-02',NULL,NULL,'$2y$10$VyEPbC4PQbrSfkQTeoZf5Og5k2vjrh7gwpGTsDRZE1ewa1HQ7PCRm',NULL,1474303047,1474303075,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-19 20:20:56
