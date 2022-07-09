-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

-- -----------------------------------------------------
-- Table `mydb`.`tabuleiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tabuleiro` (
  `idtabuleiro` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idtabuleiro`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`circulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`circulo` (
  `idcirculo` INT NOT NULL AUTO_INCREMENT,
  `raio` INT NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  PRIMARY KEY (`idcirculo`),
  INDEX `fk_circulo_tabuleiro_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  CONSTRAINT `fk_circulo_tabuleiro`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `mydb`.`tabuleiro` (`idtabuleiro`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`quadrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`quadrado` (
  `idquadrado` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  PRIMARY KEY (`idquadrado`),
  INDEX `fk_quadrado_tabuleiro_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  CONSTRAINT `fk_quadrado_tabuleiro`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `mydb`.`tabuleiro` (`idtabuleiro`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`cubo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cubo` (
  `idcubo` INT NOT NULL AUTO_INCREMENT,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  `quadrado_idquadrado` INT NOT NULL,
  PRIMARY KEY (`idcubo`),
  INDEX `fk_cubo_tabuleiro1_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  INDEX `fk_cubo_quadrado1_idx` (`quadrado_idquadrado` ASC) VISIBLE,
  CONSTRAINT `fk_cubo_tabuleiro1`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `mydb`.`tabuleiro` (`idtabuleiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cubo_quadrado1`
    FOREIGN KEY (`quadrado_idquadrado`)
    REFERENCES `mydb`.`quadrado` (`idquadrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `quadrado`.`retangulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`retangulo` (
  `idretangulo` INT NOT NULL AUTO_INCREMENT,
  `base` INT NULL DEFAULT NULL,
  `altura` INT NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  PRIMARY KEY (`idretangulo`),
  INDEX `fk_retangulo_tabuleiro_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  CONSTRAINT `fk_retangulo_tabuleiro`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `mydb`.`tabuleiro` (`idtabuleiro`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`triangulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`triangulo` (
  `idtriangulo` INT NOT NULL AUTO_INCREMENT,
  `base` INT NULL DEFAULT NULL,
  `lado1` INT NULL DEFAULT NULL,
  `lado2` INT NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  PRIMARY KEY (`idtriangulo`),
  INDEX `fk_triangulo_tabuleiro1_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  CONSTRAINT `fk_triangulo_tabuleiro1`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `mydb`.`tabuleiro` (`idtabuleiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb3;
