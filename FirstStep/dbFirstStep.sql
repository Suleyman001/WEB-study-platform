CREATE DATABASE `dbFirstStep`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `dbFirstStep`;

-- Users Table
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `user_name` varchar(12) NOT NULL UNIQUE,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Sample data for Users Table
INSERT INTO `users` (`first_name`, `last_name`, `user_name`, `password`) VALUES
('John', 'Doe', 'john', sha1('johnpassword')),
('Jane', 'Smith', 'jane', sha1('jane'));

-- Messages Table
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `contact_messages` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Images Table
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;
