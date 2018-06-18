CREATE DATABASE post_db;

use post_db;


CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `salt` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`email`)
);

SELECT `id`, `email`, `password`, `salt` FROM `users`;


CREATE TABLE `posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `user_id` INT NOT NULL,
  `timestamp` TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`title`, `body`, `user_id`, `timestamp`) VALUES ('test title', 'test body', 1, NOW());

SELECT `id`, `title`, `body`, `user_id`, `timestamp` FROM `posts`;


CREATE TABLE `comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` TEXT NOT NULL,
  `post_id` INT NOT NULL,
  `timestamp` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

SELECT * FROM `comments`;