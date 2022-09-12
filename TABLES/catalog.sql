-- auco_test.`catalog` definition

CREATE TABLE `catalog` (
  `autographId` int NOT NULL AUTO_INCREMENT,
  `celebrityId` int NOT NULL,
  `userId` int NOT NULL,
  `imageLink` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/catalog/default.jpg',
  `descriptionLink` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/catalog/default.txt',
  `forSale` tinyint(1) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '99999',
  `year` year DEFAULT NULL,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`autographId`),
  KEY `catalog_FK` (`celebrityId`),
  KEY `catalog_FK_1` (`userId`),
  CONSTRAINT `catalog_FK` FOREIGN KEY (`celebrityId`) REFERENCES `celebrities` (`id`),
  CONSTRAINT `catalog_FK_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
