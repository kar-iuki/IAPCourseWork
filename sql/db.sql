
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `gender` (
  `genderId` tinyint(1) NOT NULL,
  `gender` varchar(20) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `roles` (
  `roleId` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `users` (
  `userId` bigint(10) NOT NULL,
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ver_code` int(11) NOT NULL,
  `ver_code_time` datetime NOT NULL,
  `genderId` tinyint(1) NOT NULL DEFAULT 0,
  `roleId` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`),
  ADD UNIQUE KEY `gender` (`gender`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`),
  ADD UNIQUE KEY `role` (`role`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `genderId` (`genderId`),
  ADD KEY `roleId` (`roleId`);


ALTER TABLE `gender`
  MODIFY `genderId` tinyint(1) NOT NULL AUTO_INCREMENT;


ALTER TABLE `roles`
  MODIFY `roleId` tinyint(1) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `userId` bigint(10) NOT NULL AUTO_INCREMENT;


ALTER TABLE `gender`
  ADD CONSTRAINT `gender_ibfk_1` FOREIGN KEY (`genderId`) REFERENCES `users` (`genderId`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `users` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;


