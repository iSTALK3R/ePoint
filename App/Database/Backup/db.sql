-- MySQL Script generated by MySQL Workbench
-- Wed May  5 00:24:45 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema eponto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eponto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eponto` DEFAULT CHARACTER SET utf8 ;
USE `eponto` ;

-- -----------------------------------------------------
-- Table `eponto`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eponto`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `setor` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eponto`.`pontos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eponto`.`pontos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(255) NOT NULL,
  `data_hora` TIMESTAMP NULL,
  `id_funcionario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pontos_users_idx` (`id_funcionario` ASC),
  CONSTRAINT `fk_pontos_users`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `eponto`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
