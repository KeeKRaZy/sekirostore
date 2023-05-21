-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `shop`;

-- Дамп структуры для таблица shop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `nr` int NOT NULL AUTO_INCREMENT,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fullPrice` float DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nr`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы shop.orders: ~8 rows (приблизительно)
INSERT INTO `orders` (`nr`, `status`, `fullPrice`, `date`, `email`) VALUES
	(1, 'Shipped', 103.13, '2023-05-16 15:51:46', 'palcevskis43@gmail.com'),
	(2, 'Shipped', 205, '2023-05-16 15:51:46', 'palcevskis43@gmail.com'),
	(3, 'Pending', 120.01, '2023-05-16 15:51:46', 'palcevskis43@gmail.com'),
	(40, 'Shipped', 60.06, '2023-05-16 16:50:47', 'palcevskis43@gmail.com'),
	(41, 'Pending', 60.06, '2023-05-16 16:51:51', 'palcevskis43@gmail.com'),
	(117, 'Pending', 70.07, '2023-05-16 18:05:26', 'palcevskis43@gmail.com'),
	(118, 'Pending', 70.07, '2023-05-16 18:06:05', 'palcevskis43@gmail.com'),
	(119, 'Shipped', 10.01, '2023-05-16 18:06:23', 'palcevskis43@gmail.com');

-- Дамп структуры для таблица shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `discription` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы shop.products: ~11 rows (приблизительно)
INSERT INTO `products` (`id`, `title`, `type`, `price`, `material`, `discription`) VALUES
	(1, 'The Gentle Blade', 'T-shirt', 19.99, 'Polyester', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(2, 'Embodiment of Greed', 'T-shirt', 19.99, 'Viscose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(3, 'Prepare to die', 'Phone case', 10.01, 'Nylon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(4, 'Guardian Ape', 'Hoodie', 29.99, 'Futer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(5, 'Roberrrrrrt!!', 'Bag', 99.99, 'Nylon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(6, 'Leap to Heaven', 'Cap', 10.01, 'Cotton', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(8, 'A Heart Attack', 'Mask', 10.01, 'Cotton', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(9, 'Wolf... Thank... You...', 'T-shirt', 19.99, 'Viscose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(10, 'Hesitation is Defeat', 'Hoodie', 29.99, 'Polyester', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(11, 'Shadow Of A Death', 'Hoodie', 39.99, 'Futer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.'),
	(22, 'Blood Enemy', 'T-shirt', 19.99, 'Viscose', 'Smert blizko bratan');

-- Дамп структуры для таблица shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `surname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adress` varchar(30) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы shop.users: ~2 rows (приблизительно)
INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `adress`, `role`) VALUES
	(59, 'palcevskis43@gmail.com', '685e045f7dd68b5425772956a269e5d0', 'Nikita', 'Palcevskis', NULL, 'user'),
	(60, 'goolgap000@gmail.com', '685e045f7dd68b5425772956a269e5d0', 'Nikita', 'Palcevskis', NULL, 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
