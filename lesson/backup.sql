CREATE DATABASE todo_db;


CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(20) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`login`)
);

INSERT INTO `users` (`login`, `password`) VALUES ('admin', md5('admin'));

SELECT `id`, `login`, `password` FROM `users`;

DROP TABLE `users`;

CREATE TABLE `todo_list` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `message` TEXT,
  `status` VARCHAR (20) DEFAULT 'show',
  PRIMARY KEY (`id`)
);

INSERT INTO `todo_list` (`id_user` , `message`, `status`) VALUES (1, 'test message', 'show');

SELECT `id`, `id_user`, `message`, `status` FROM `todo_list` WHERE `id_user`=1;