CREATE TABLE `course` (
  `id`     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`   VARCHAR(100) NOT NULL,
  `shortDescription`  VARCHAR(100) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `expirationDate` DATE(100) NOT NULL,
  `fkUniversity` INT NOT NULL
)ENGINE = INNODB;

CREATE TABLE `university` (
  `id`     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`   VARCHAR(100) NOT NULL,
  `link`  VARCHAR(100) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `email` DATE(100) NOT NULL,
  `password` DATE(100) NOT NULL,
  `fkUniversity` INT NOT NULL
)ENGINE = INNODB;