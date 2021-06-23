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
`ar` INT(255) NOT NULL ) ENGINE = InnoDB;

INSERT INTO `registration`.`pizzak` (`id`, `nev`, `kep`, `ar`) VALUES 
(NULL, 'Gombás pizza', 'gombas.jpg', 1600), 
(NULL, 'Hawaii pizza', 'hawaii.jpg', 1800), 
(NULL, 'Kukoricás pizza', 'kukoricas.jpg', 1700), 
(NULL, 'Mexikói pizza', 'mexikoi.jpg', 1800), 
(NULL, 'Szalámis pizza', 'szalamis.jpg', 1700), 
(NULL, 'Négysajtos pizza', 'negysajtos.jpg', 1700), 
(NULL, 'Baconos-tojásos pizza', 'bacon.jpg', 1900), 
(NULL, 'Sonkás pizza', 'sonkas.jpg', 1900), 
(NULL, 'Kívánság pizza', 'kivansag.png', 2200), 
(NULL, 'Gyrosos pizza', 'gyrosos.jpg', 2000), 
(NULL, 'Húsimádó pizza', 'husimado.jpg', 2100), 
(NULL, 'Manhattan pizza', 'manhattan.jpg', 1900);