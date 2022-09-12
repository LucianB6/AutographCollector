-- auco_test.users definition

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(128) NOT NULL,
  `registerDate` timestamp NULL DEFAULT NULL,
  `profilePicture` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/images/profile/default.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  CONSTRAINT `emailRegex` CHECK (regexp_like(`email`,_utf8mb4'^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$')),
  CONSTRAINT `nameRegex` CHECK (regexp_like(`name`,_utf8mb4'^(?=.{2,25}$)([A-Za-zŽžÀ-ÿ]{2,}(\\s?[A-Za-zŽžÀ-ÿ]{2,})?)$')),
  CONSTRAINT `phoneRegex` CHECK (regexp_like(`phone`,_utf8mb4'^07[0-9]{8,15}$')),
  CONSTRAINT `unameRegex` CHECK (regexp_like(`uname`,_utf8mb4'^(\\w|\\d){5,}$'))
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
