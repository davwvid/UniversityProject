CREATE TABLE `course` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `shortDescription` VARCHAR(100) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `expirationDate` DATE NOT NULL,
  `fkUniversity` INT NOT NULL
)ENGINE = INNODB;

CREATE TABLE `university` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `link` VARCHAR(100) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `fkPricePackage` INT NOT NULL
)ENGINE = INNODB;

CREATE TABLE `invoice` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `price` DOUBLE NOT NULL,
  `type` INT NOT NULL,
  `date` DATE NOT NULL,
  `fkUniversity` INT NOT NULL
)ENGINE = INNODB;

CREATE TABLE `pricePackage` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `price` DOUBLE NOT NULL
)ENGINE = INNODB;

CREATE TABLE `advertising` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL,
  `price` DOUBLE NOT NULL,
  `fkUniversity` INT NOT NULL
)ENGINE = INNODB;

CREATE TABLE `administrator` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL
)ENGINE = INNODB;