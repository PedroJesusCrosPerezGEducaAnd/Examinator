-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema examinator
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema examinator
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `examinator` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `examinator` ;

-- -----------------------------------------------------
-- Table `examinator`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `role` VARCHAR(40) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `examinator`.`examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`examen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_examen_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_examen_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `examinator`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examinator`.`tries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`tries` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `try` JSON NULL,
  `user_id` INT NOT NULL,
  `examen_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tries_user_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_tries_examen1_idx` (`examen_id` ASC) VISIBLE,
  CONSTRAINT `fk_tries_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `examinator`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tries_examen1`
    FOREIGN KEY (`examen_id`)
    REFERENCES `examinator`.`examen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examinator`.`dificulty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`dificulty` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `level` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `level_UNIQUE` (`level` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examinator`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examinator`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examinator`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `statement` VARCHAR(80) NOT NULL,
  `questions` JSON NOT NULL,
  `source` JSON NOT NULL,
  `examen_id` INT UNSIGNED NOT NULL,
  `dificulty_id` INT NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_questions_examen1_idx` (`examen_id` ASC) VISIBLE,
  INDEX `fk_questions_dificulty1_idx` (`dificulty_id` ASC) VISIBLE,
  INDEX `fk_questions_category1_idx` (`category_id` ASC) VISIBLE,
  CONSTRAINT `fk_questions_examen1`
    FOREIGN KEY (`examen_id`)
    REFERENCES `examinator`.`examen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_dificulty1`
    FOREIGN KEY (`dificulty_id`)
    REFERENCES `examinator`.`dificulty` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `examinator`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
