-- auco_test.celebrities definition

CREATE TABLE `celebrities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `celebrity_name` varchar(60) NOT NULL,
  `autograph_count` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`celebrity_name`),
  CONSTRAINT `celebrity_name` CHECK (regexp_like(`celebrity_name`,_utf8mb4'^(?=.{2,60}$)([A-Za-zŽžÀ-ÿ]{1,}\\.?(((\\s|-)?[A-Za-zŽžÀ-ÿ](\\.)?))+)$'))
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
