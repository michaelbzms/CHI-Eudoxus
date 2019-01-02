-- MySQL Script generated by MySQL Workbench
-- Sun Dec 30 15:01:13 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema eudoxusdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eudoxusdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eudoxusdb` DEFAULT CHARACTER SET utf8 ;
USE `eudoxusdb` ;

-- -----------------------------------------------------
-- Table `eudoxusdb`.`USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`USERS` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(256) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `user_type` ENUM('student', 'secretary', 'publisher', 'distribution_point') NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`SECRETARIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`SECRETARIES` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `university` VARCHAR(256) NOT NULL,
  `department` VARCHAR(256) NOT NULL,
  `number_of_semesters` INT NOT NULL,
  `phone` VARCHAR(16) NOT NULL,
  `address` VARCHAR(256) NOT NULL,
  `TK` INT NOT NULL,
  `county` VARCHAR(128) NOT NULL,
  `city` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_idSecretary`
    FOREIGN KEY (`idUser`)
    REFERENCES `eudoxusdb`.`USERS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`STUDENTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`STUDENTS` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `SECRETARIES_id` INT UNSIGNED NOT NULL,
  `AM` VARCHAR(32) NOT NULL,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `current_semester` INT NOT NULL,
  `phone` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_idStudent`
    FOREIGN KEY (`idUser`)
    REFERENCES `eudoxusdb`.`USERS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_STUDENTS_SECRETARIES1`
    FOREIGN KEY (`SECRETARIES_id`)
    REFERENCES `eudoxusdb`.`SECRETARIES` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`PUBLISHERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`PUBLISHERS` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `AFM` VARCHAR(32) NOT NULL,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `phone` VARCHAR(128) NOT NULL,
  `address` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_idPublisher`
    FOREIGN KEY (`idUser`)
    REFERENCES `eudoxusdb`.`USERS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`DISTRIBUTION_POINTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`DISTRIBUTION_POINTS` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(256) NOT NULL,
  `address` VARCHAR(256) NOT NULL,
  `email` VARCHAR(256) NOT NULL,
  `phone` VARCHAR(16) NOT NULL,
  `working_hours` VARCHAR(256) NOT NULL,
  `map_url` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_idDistPoint`
    FOREIGN KEY (`idUser`)
    REFERENCES `eudoxusdb`.`USERS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`BOOKS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`BOOKS` (
  `idBook` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `published_by` INT UNSIGNED NOT NULL,
  `title` VARCHAR(128) NOT NULL,
  `ISBN` VARCHAR(16) NOT NULL,
  `authors` VARCHAR(256) NOT NULL,
  `published_year` YEAR(4) NOT NULL,
  `pagecount` INT UNSIGNED NOT NULL,
  `keywords` VARCHAR(256) NOT NULL DEFAULT '',
  `version` VARCHAR(32) NULL,
  `front_page_url` VARCHAR(128) NULL,
  `back_page_url` VARCHAR(128) NULL,
  `webpage_url` VARCHAR(128) NULL,
  `contents_url` VARCHAR(128) NULL,
  `excerpt_url` VARCHAR(128) NULL,
  `dimensions` VARCHAR(16) NULL,
  `Tie` VARCHAR(32) NULL,
  PRIMARY KEY (`idBook`),
  CONSTRAINT `fk_BOOKS_PUBLISHERS1`
    FOREIGN KEY (`published_by`)
    REFERENCES `eudoxusdb`.`PUBLISHERS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`DISTRIBUTION_POINTS_has_BOOKS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`DISTRIBUTION_POINTS_has_BOOKS` (
  `DISTRIBUTION_POINTS_id` INT UNSIGNED NOT NULL,
  `BOOKS_id` INT UNSIGNED NOT NULL,
  `count` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`DISTRIBUTION_POINTS_id`, `BOOKS_id`),
  CONSTRAINT `fk_DISTRIBUTION_POINTS_has_BOOKS_DISTRIBUTION_POINTS1`
    FOREIGN KEY (`DISTRIBUTION_POINTS_id`)
    REFERENCES `eudoxusdb`.`DISTRIBUTION_POINTS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DISTRIBUTION_POINTS_has_BOOKS_BOOKS1`
    FOREIGN KEY (`BOOKS_id`)
    REFERENCES `eudoxusdb`.`BOOKS` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`ANNOUNCEMENTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`ANNOUNCEMENTS` (
  `idAnnouncment` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(256) NOT NULL,
  `text` MEDIUMTEXT NOT NULL,
  `category` ENUM('all', 'students', 'secretaries', 'publishers', 'dist_points', 'general') NULL,
  PRIMARY KEY (`idAnnouncment`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`GLOBAL_SEARCH`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`GLOBAL_SEARCH` (
  `idSearchItem` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(128) NOT NULL,
  `keywords` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`idSearchItem`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`UNIVERSITY_CLASSES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`UNIVERSITY_CLASSES` (
  `idClass` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `SECRETARIES_id` INT UNSIGNED NOT NULL,
  `FREE_CLASS_SECRETARIES_id` INT UNSIGNED NULL COMMENT 'If NULL then a class of SECRETARIES_id\'s department, else it\'s a \"FREE Class\" from this \"foreign\" department.',
  `title` VARCHAR(128) NOT NULL,
  `code` VARCHAR(16) NOT NULL,
  `professors` VARCHAR(256) NOT NULL,
  `semester` INT NOT NULL,
  `comments` VARCHAR(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`idClass`),
  CONSTRAINT `fk_UNIVERSITY_CLASSES_SECRETARIES1`
    FOREIGN KEY (`SECRETARIES_id`)
    REFERENCES `eudoxusdb`.`SECRETARIES` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UNIVERSITY_CLASSES_SECRETARIES2`
    FOREIGN KEY (`FREE_CLASS_SECRETARIES_id`)
    REFERENCES `eudoxusdb`.`SECRETARIES` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`BOOK_DECLARATION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`BOOK_DECLARATION` (
  `idDeclaration` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `STUDENTS_id` INT UNSIGNED NOT NULL,
  `PIN` INT NOT NULL,
  `declaration_period` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idDeclaration`),
  CONSTRAINT `fk_BOOK_DECLARATION_STUDENTS1`
    FOREIGN KEY (`STUDENTS_id`)
    REFERENCES `eudoxusdb`.`STUDENTS` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`BOOK_CLASS_TUPLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`BOOK_CLASS_TUPLES` (
  `BOOK_DECLARATION_id` INT UNSIGNED NOT NULL,
  `UNIVERSITY_CLASSES_id` INT UNSIGNED NOT NULL,
  `BOOKS_id` INT UNSIGNED NOT NULL,
  `received` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`BOOK_DECLARATION_id`, `UNIVERSITY_CLASSES_id`, `BOOKS_id`),
  CONSTRAINT `fk_BOOK_CLASS_TUPLES_BOOK_DECLARATION1`
    FOREIGN KEY (`BOOK_DECLARATION_id`)
    REFERENCES `eudoxusdb`.`BOOK_DECLARATION` (`idDeclaration`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BOOK_CLASS_TUPLES_UNIVERSITY_CLASSES1`
    FOREIGN KEY (`UNIVERSITY_CLASSES_id`)
    REFERENCES `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BOOK_CLASS_TUPLES_BOOKS1`
    FOREIGN KEY (`BOOKS_id`)
    REFERENCES `eudoxusdb`.`BOOKS` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eudoxusdb`.`UNIVERSITY_CLASSES_has_BOOKS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eudoxusdb`.`UNIVERSITY_CLASSES_has_BOOKS` (
  `UNIVERSITY_CLASSES_id` INT UNSIGNED NOT NULL,
  `BOOKS_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`UNIVERSITY_CLASSES_id`, `BOOKS_id`),
  CONSTRAINT `fk_UNIVERSITY_CLASSES_has_BOOKS_UNIVERSITY_CLASSES1`
    FOREIGN KEY (`UNIVERSITY_CLASSES_id`)
    REFERENCES `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UNIVERSITY_CLASSES_has_BOOKS_BOOKS1`
    FOREIGN KEY (`BOOKS_id`)
    REFERENCES `eudoxusdb`.`BOOKS` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;