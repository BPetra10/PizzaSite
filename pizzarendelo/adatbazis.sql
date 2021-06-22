CREATE DATABASE registration 
DEFAULT CHARACTER SET utf8
COLLATE utf8_hungarian_ci;

CREATE TABLE `registration`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usertype`varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `registration`.`rendeles` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `felhasznalonev` VARCHAR(100) NOT NULL , 
  `cim` VARCHAR(100) NOT NULL,
  `rendeltek` VARCHAR(1000) NOT NULL, 
  `vegosszeg` INT(255) NOT NULL,
  `megjegyzes` VARCHAR(255),
   `datum` VARCHAR(100) NOT NULL 
  ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `registration`. `pizzak`( 
`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`nev` VARCHAR(100) NOT NULL , 
`kep` varchar(100) NOT NULL , 
`ar` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;
