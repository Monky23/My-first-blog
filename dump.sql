-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: blogdb_jm
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'Anonyme',
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_comment` (`user_id`),
  KEY `fk_post_comment` (`post_id`),
  CONSTRAINT `fk_post_comment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_tag` (`post_id`),
  KEY `fk_tag_post` (`tag_id`),
  CONSTRAINT `fk_post_tag` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_tag_post` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (253,107,4),(261,109,1),(262,110,3),(263,111,3),(264,112,1);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'logo.png',
  `content` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (107,NULL,'Article non publié','chapou','Capture d’écran (56).png','Hey CodeLand!\r\n\r\nThroughout your experience at this year\'s event, we hope you get a chance to explore CodeNewbie Community on your own a bit and engage in some discussions. You can even start one of your own using this template (or by starting a new post and adding the #discuss tag).\r\n\r\nThis thread is part of an ongoing series of discussions before and during CodeLand 2022. Each post in the CodeLand 2022 Discussions series will be part of a special prize raffle after the event concludes. In other words you\'ll be automatically entered into a prize raffle just for commenting on this post before 11:59 PM PT on Friday, June 17, 2022.','2022-06-21 18:01:39',0),(109,NULL,'PHP anywhere','Pour coder en ligne  directement depuis le navigateur','php.jpg','Je ne sais pas exactement ce que les développeurs PHP chevronnés penseront de ce service mais de prime abord, et pour un usage ponctuel en déplacement, je sais qu’il va rejoindre très probablement mon arsenal d’outils favoris en ligne, entre Google Docs et Picnik par exemple, pour des retouches ponctuelles de code.\r\n\r\n\r\nPHPanywhere est un éditeur de code PHP en ligne qui a tout d’un grand puisqu’il propose une palette de fonctions qui n’ont pas grand chose à envier aux ténors du marché, le tout exécutable directement dans le navigateur sans aucun logiciel à installer.\r\n\r\nPHPanywhere offre donc toutes les fonctionnalités que l’on a l’habitude de trouver dans un bon éditeur de code, comme par exemple la coloration syntaxique, l’indentation pour chaque langage présent dans une page web, le pliage de code, annuler-refaire illimité, numérotation des lignes, rechercher-remplacer, permissions sur les dossiers, et encore de nombreuses autres possibilités.\r\n\r\n\r\nLe seul écueil que rencontrera le codeur un peu soucieux de la sécurité de ses données résidera dans le fait qu’il est nécessaire d’indiquer ses identifiants FTP pour créer un nouveau projet. Ecueil contournable en créant un répertoire dédié à PHPanywhere, mais qui interdit alors tout travail en direct sur le code d’un site que l’on souhaite modifier à distance, sauf à passer ensuite par son propre client FTP.\r\n\r\nPHPanywhere fonctionne dans Firefox, Opera 9+ et tous les navigateurs basés sur le moteur Gecko, et permet en outre le travail collaboratif grâce au partage de fichiers en temps réel.\r\n\r\nLes possibilités du navigateur web n’ont pas fini de nous surprendre en nous livrant peu à peu leurs secrets.','2022-07-19 16:49:36',1),(110,NULL,'Le code','Coder la logique prime sur le langage.','hack.jpg','Je ne sais pas exactement ce que les développeurs PHP chevronnés penseront de ce service mais de prime abord, et pour un usage ponctuel en déplacement, je sais qu’il va rejoindre très probablement mon arsenal d’outils favoris en ligne, entre Google Docs et Picnik par exemple, pour des retouches ponctuelles de code.\r\n\r\n\r\nPHPanywhere est un éditeur de code PHP en ligne qui a tout d’un grand puisqu’il propose une palette de fonctions qui n’ont pas grand chose à envier aux ténors du marché, le tout exécutable directement dans le navigateur sans aucun logiciel à installer.\r\n\r\nPHPanywhere offre donc toutes les fonctionnalités que l’on a l’habitude de trouver dans un bon éditeur de code, comme par exemple la coloration syntaxique, l’indentation pour chaque langage présent dans une page web, le pliage de code, annuler-refaire illimité, numérotation des lignes, rechercher-remplacer, permissions sur les dossiers, et encore de nombreuses autres possibilités.\r\n\r\n\r\nLe seul écueil que rencontrera le codeur un peu soucieux de la sécurité de ses données résidera dans le fait qu’il est nécessaire d’indiquer ses identifiants FTP pour créer un nouveau projet. Ecueil contournable en créant un répertoire dédié à PHPanywhere, mais qui interdit alors tout travail en direct sur le code d’un site que l’on souhaite modifier à distance, sauf à passer ensuite par son propre client FTP.\r\n\r\nPHPanywhere fonctionne dans Firefox, Opera 9+ et tous les navigateurs basés sur le moteur Gecko, et permet en outre le travail collaboratif grâce au partage de fichiers en temps réel.\r\n\r\nLes possibilités du navigateur web n’ont pas fini de nous surprendre en nous livrant peu à peu leurs secrets.','2022-07-19 16:51:01',1),(111,NULL,'Coder en pensant à l\'environnement','Les eco-coders en actions.','greencoding.jpg',' Je ne sais pas exactement ce que les développeurs PHP chevronnés penseront de ce service mais de prime abord, et pour un usage ponctuel en déplacement, je sais qu’il va rejoindre très probablement mon arsenal d’outils favoris en ligne, entre Google Docs et Picnik par exemple, pour des retouches ponctuelles de code.\r\n\r\n\r\nPHPanywhere est un éditeur de code PHP en ligne qui a tout d’un grand puisqu’il propose une palette de fonctions qui n’ont pas grand chose à envier aux ténors du marché, le tout exécutable directement dans le navigateur sans aucun logiciel à installer.\r\n\r\nPHPanywhere offre donc toutes les fonctionnalités que l’on a l’habitude de trouver dans un bon éditeur de code, comme par exemple la coloration syntaxique, l’indentation pour chaque langage présent dans une page web, le pliage de code, annuler-refaire illimité, numérotation des lignes, rechercher-remplacer, permissions sur les dossiers, et encore de nombreuses autres possibilités.\r\n\r\n\r\nLe seul écueil que rencontrera le codeur un peu soucieux de la sécurité de ses données résidera dans le fait qu’il est nécessaire d’indiquer ses identifiants FTP pour créer un nouveau projet. Ecueil contournable en créant un répertoire dédié à PHPanywhere, mais qui interdit alors tout travail en direct sur le code d’un site que l’on souhaite modifier à distance, sauf à passer ensuite par son propre client FTP.\r\n\r\nPHPanywhere fonctionne dans Firefox, Opera 9+ et tous les navigateurs basés sur le moteur Gecko, et permet en outre le travail collaboratif grâce au partage de fichiers en temps réel.\r\n\r\nLes possibilités du navigateur web n’ont pas fini de nous surprendre en nous livrant peu à peu leurs secrets.   ','2022-07-19 16:52:46',1),(112,NULL,'Erreur 404','  Que veut dire l\'erreur 404?','error.jpg','Je ne sais pas exactement ce que les développeurs PHP chevronnés penseront de ce service mais de prime abord, et pour un usage ponctuel en déplacement, je sais qu’il va rejoindre très probablement mon arsenal d’outils favoris en ligne, entre Google Docs et Picnik par exemple, pour des retouches ponctuelles de code.\r\n\r\n\r\nPHPanywhere est un éditeur de code PHP en ligne qui a tout d’un grand puisqu’il propose une palette de fonctions qui n’ont pas grand chose à envier aux ténors du marché, le tout exécutable directement dans le navigateur sans aucun logiciel à installer.\r\n\r\nPHPanywhere offre donc toutes les fonctionnalités que l’on a l’habitude de trouver dans un bon éditeur de code, comme par exemple la coloration syntaxique, l’indentation pour chaque langage présent dans une page web, le pliage de code, annuler-refaire illimité, numérotation des lignes, rechercher-remplacer, permissions sur les dossiers, et encore de nombreuses autres possibilités.\r\n\r\n\r\nLe seul écueil que rencontrera le codeur un peu soucieux de la sécurité de ses données résidera dans le fait qu’il est nécessaire d’indiquer ses identifiants FTP pour créer un nouveau projet. Ecueil contournable en créant un répertoire dédié à PHPanywhere, mais qui interdit alors tout travail en direct sur le code d’un site que l’on souhaite modifier à distance, sauf à passer ensuite par son propre client FTP.\r\n\r\nPHPanywhere fonctionne dans Firefox, Opera 9+ et tous les navigateurs basés sur le moteur Gecko, et permet en outre le travail collaboratif grâce au partage de fichiers en temps réel.\r\n\r\nLes possibilités du navigateur web n’ont pas fini de nous surprendre en nous livrant peu à peu leurs secrets.','2022-07-19 16:54:07',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'PHP','2022-04-08 20:29:37'),(2,'MySQL','2022-04-08 20:29:37'),(3,'Technologie','2022-04-08 20:29:37'),(4,'Photographie','2022-04-08 20:29:37');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL DEFAULT 0,
  `subscriber` int(11) NOT NULL DEFAULT 1,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ft_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(23) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,0,'jeanmi','$2y$10$npIoVwF6X/FPA0Ksom5MTeKM5pLJgQRY4F1DIwAWcpdELYq9j4cm.',NULL,'Je suis le créateur de ce blog et je vous souhaite à tous la bienvenue !','luffy6377@live.fr',NULL,'2022-04-02 15:18:27'),(3,0,1,'popov','$2y$10$4UZvjstOssRPoTR.WJkwbev8.vHbb/AJ6Mcx1YwTdkv/4LzdXqT3m',NULL,'Je suis le premier adhérant de ce blog.','polpot@gpouet.com',NULL,'2022-04-14 20:09:06'),(4,0,1,'albert','$argon2i$v=19$m=65536,t=4,p=1$VnJOVDZyY2kyYmMzNFA5Qg$qb70jElM33l0ou2P6rSzbz211Zwe4R/wI80pFCwb63E',NULL,NULL,'albert@mail.com',NULL,'2022-04-26 15:55:10'),(5,0,1,'bob','bob','','        ','bob@mail.com','','2022-05-14 00:46:22'),(6,0,1,'kiki','kiki','','        ','kiki@mail.com','','2022-05-14 10:24:16'),(7,0,1,'coco','coco','','        ','coco@mail.com','','2022-05-14 11:42:31'),(8,0,1,'huhu','huhu','','        ','huhu@mail.com','','2022-05-14 11:56:27'),(9,0,1,'lolo','lolo','','        ','lolo@mail.com','','2022-05-14 11:57:45'),(11,0,1,'bobo','bobo','','        ','bobo@mail.com','','2022-05-14 11:59:29'),(13,0,1,'saul','saul','','        ','saul@mail.com','','2022-06-22 20:30:08'),(15,0,1,'target','target','','        ','target@mail.com','','2022-06-22 20:32:54'),(16,0,1,'kakoo','kakoo','','        ','kakoo@mail.com','','2022-06-23 19:00:08'),(17,0,1,'bonobo','bonobo','','        ','bonobo@mail.com','','2022-06-23 19:04:07'),(18,0,1,'naruto','$argon2i$v=19$m=65536,t=4,p=1$aUticGJvbWt5c052ZE5sQg$sSff8L/XidOdTQOoQVOYkHpkwxWUtS61YFxcEsI7YHQ','','        ','naruto@mail.com','','2022-06-24 17:47:16'),(19,0,1,'Monkymonk','$argon2i$v=19$m=65536,t=4,p=1$MmoweG1uLk1pRm5CeU9wcg$OSriQtPMPp/n28Bh0vR1YFeA21vYPE9rhA3askau9RM','','        ','Monkymonk@mail.com','','2022-06-24 17:52:30'),(20,0,1,'katacomb','$argon2i$v=19$m=65536,t=4,p=1$d0p1VG9vRWZKYzVmeDJUMg$MklRjJH1ZCgn9Zob9lSthGoRRexCN5u0AYmqi4s9JC4','','        ','katacomb@mail.com','','2022-06-24 17:55:31'),(21,0,1,'plastikman','$argon2i$v=19$m=65536,t=4,p=1$WEJjRmYxUzBHWDZaSkx4RA$VCcsjbpLSAqqpGQANNTygJnxFNFUGsoky8bwOUVgkhY','','        ','plastikman@gmail.fr','','2022-06-24 18:01:25'),(22,0,1,'slipkangouroux','$argon2i$v=19$m=65536,t=4,p=1$bTRhcVVBZFpvc2lUWWhySA$7t9DoIK7qpDvtkarvEXH/X3pDOXuq1IwbjygjvOgFU0','','        ','slipkangouroux@mail.com','','2022-06-24 18:04:19'),(23,0,1,'whatsnewsdoc','$argon2i$v=19$m=65536,t=4,p=1$SE5zZTBzbml5cWhXMzJpUQ$rSd3Qc62uVlN+olY68KmwOCGNpyXEUQjbuFb6R8xUMw','','        ','whatsnewsdoc@mail.ru','','2022-06-24 18:11:21'),(24,0,1,'jenpeuplu','$argon2i$v=19$m=65536,t=4,p=1$MGFxSUpzUTdCZ05DODVWbg$HtqKVeHW/tYR0TlQdUBTWgfEhYBPs+9+WEiIh8avleA','','        ','jenpeuplu@mail.com','','2022-06-24 18:24:01'),(25,0,1,'chouchou','$argon2i$v=19$m=65536,t=4,p=1$UlBBejIyL28zNVFoRWV2cQ$jyp8llaOtUiVuhl1sTaph6yPON87UcnROCTWX6P3A7w','','        ','chouchou@mail.com','','2022-06-24 18:55:22'),(33,0,1,'kali','$argon2i$v=19$m=65536,t=4,p=1$VU5Kb0JDWExlN0V3RjhGLg$XfnhEIufkFOc2/hMEkUjCa6gVwhbXfNlkQs6AYOvo+4','','        ','kali@mail.fr','','2022-06-25 14:57:43'),(37,0,1,'jojo','$argon2i$v=19$m=65536,t=4,p=1$Q3J1Y0pzOU50dlV6TUxVdQ$r3nA16JvJ3tDS6WxTqkNGJSKMTRgopMBV3FzU3H0Wds','','        ','jojo@mail.fr','','2022-07-05 14:45:54'),(41,0,1,'<? php echo (\'popo\')?>','$argon2i$v=19$m=65536,t=4,p=1$TDV1QmhTSThNbDAwN05Wdg$tadTlCnKSLhAQr+QvzcWYF9EuMUizE4geEneCQ3mRXg','','        ','love@mail.com','','2022-07-05 15:41:50'),(42,0,1,'<?php echo($this->username); ?>','$argon2i$v=19$m=65536,t=4,p=1$Qms1N1ZNV3pIaXI4NzJkeQ$UsqePYgjbL3FfPbpN1Lnzi211lpaGUpcJScAws8eqBY','','        ','luffy6377@live.com','','2022-07-05 15:50:32'),(43,0,1,'yooyoo','$argon2i$v=19$m=65536,t=4,p=1$R1BqcDRtWFBkVEVVSDdCWA$reaLn/V545OCLwGsYYCCnv/1jJX/q2KplvOK+z8z+98',NULL,'       Je suis passionné par le développement web et je suis très ouvert d\'esprit.','yooyoo@mail.com','+33 720814321','2022-07-05 16:00:57');
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

-- Dump completed on 2022-07-19 23:09:57
