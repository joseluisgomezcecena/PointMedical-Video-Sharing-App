-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: point_medical_videos
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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
							`category_id` int(11) NOT NULL AUTO_INCREMENT,
							`category_name` varchar(255) NOT NULL,
							PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'General'),(2,'Assembly'),(3,'Documentation');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
						 `user_id` int(11) NOT NULL AUTO_INCREMENT,
						 `user_name` varchar(255) NOT NULL,
						 `user_email` varchar(255) NOT NULL,
						 `user_password` varchar(255) NOT NULL,
						 `super` int(1) NOT NULL DEFAULT 0,
						 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jgomezcecena','jgomez@martechmedical.com','$2y$10$R2jtwatTpYiYI.ck19VvEOBjsKFT6rYHmTbK8om9aiNaF/ILdYlaK',1),(2,'awintek','awintek@pointmedical.com','$2y$10$5M74Z.q3JMgVWrvW/w9OCenmXGXGn5mJV2oAQl1ws9YlQYrnGB0cO',1),(3,'jvargas','jvargas@martechmedical.com','$2y$10$l5J5JwZQ//01cb71hfcwruv7By5AFtntltkUQZct4OuDwb.Jbr/.2',0),(4,'Default user!!','default@email.com','$2y$10$WJvDqkO20wyBFNNBwXE/KeYz53SK4i7f6ebumN2YKTLNI4Q0c6/Ky',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
						  `video_id` int(11) NOT NULL AUTO_INCREMENT,
						  `video_title` varchar(255) NOT NULL,
						  `document_no` varchar(255) NOT NULL,
						  `video_description` text NOT NULL,
						  `video_url` text NOT NULL,
						  `screenshot_url` text NOT NULL,
						  `user_id` int(11) NOT NULL,
						  `category_id` int(11) NOT NULL,
						  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
						  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
						  `views` int(11) NOT NULL,
						  `active` int(1) NOT NULL DEFAULT 1,
						  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (14,'Test Video','V001','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet arcu vel dolor congue pharetra quis eu lectus. Maecenas scelerisque ornare nisi at venenatis. Praesent nec metus aliquam felis mattis ullamcorper in vitae nisi. Proin molestie iaculis lorem, vel sodales ante dapibus ut. Sed tellus dolor, dignissim in est ut, ultrices ultricies ex. Vivamus ac felis sed ante tempor malesuada ut at lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.','pexels-anastasia-shuraeva-5126333-2048x1080-24fps.mp4','pexels-anastasia-shuraeva-5126333-2048x1080-24fps.mp4.jpg',0,1,'2023-04-11 17:22:47','2023-04-11 17:22:47',0,1),(16,'Fox Video','V002','This is a video with a fox in it,  its being used to test what happens when we upload a file with spaces in it. ','fox_video_spaces.mp4','fox_video_spaces.mp4.jpg',0,2,'2023-04-11 17:34:09','2023-04-11 17:34:09',0,1),(17,'Wolf Video','V003','This video has a wolf in it because wolves are cool but its also testing what happens if a user  uploads a file with the same file name  in our database and uploads folder.','fox_video_spaces1.mp4','fox_video_spaces1.mp4.jpg',0,3,'2023-04-11 17:38:28','2023-04-11 17:38:28',0,1),(18,'Video to Edit','V004','this video should be updated. this video is now updated with updated content.','pexels-nicky-pe-8462000-1920x1080-25fps1.mp4','pexels-nicky-pe-8462000-1920x1080-25fps1.mp4.jpg',0,1,'2023-04-11 18:32:24','2023-04-11 18:49:31',0,1);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `views` (
						 `view_id` int(11) NOT NULL AUTO_INCREMENT,
						 `video_id` int(11) NOT NULL,
						 `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
						 PRIMARY KEY (`view_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `views`
--

LOCK TABLES `views` WRITE;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
INSERT INTO `views` VALUES (1,11,'2023-04-10 19:32:58'),(2,11,'2023-04-10 19:33:54'),(3,11,'2023-04-10 19:34:01'),(4,11,'2023-04-11 00:55:37'),(5,11,'2023-04-11 00:55:43');
/*!40000 ALTER TABLE `views` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-11 17:52:28
