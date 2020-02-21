<?php

try{
  $db = new PDO("mysql:dbname=vdg;host=127.0.0.1;port=3306;charsert=UTF8");
  $db->prepare("CREATE TABLE `vdg`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;
");
$db->execute();

}catch (\PDOExeption $e) {
  echo $e->getMessage();
}

 ?>
