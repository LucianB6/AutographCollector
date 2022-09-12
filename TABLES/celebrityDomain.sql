-- auco_test.celebrityDomain definition

CREATE TABLE `celebrityDomain` (
  `celebrityId` int NOT NULL,
  `domainId` int NOT NULL,
  KEY `celebDomain_FK` (`celebrityId`),
  KEY `celebrityDomain_FK` (`domainId`),
  CONSTRAINT `celebDomain_FK` FOREIGN KEY (`celebrityId`) REFERENCES `celebrities` (`id`),
  CONSTRAINT `celebrityDomain_FK` FOREIGN KEY (`domainId`) REFERENCES `domains` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
