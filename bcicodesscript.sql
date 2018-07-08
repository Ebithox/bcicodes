SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema hackatondb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hackatondb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `hackatondb` ;

-- -----------------------------------------------------
-- Table `hackatondb`.`EMPRESA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hackatondb`.`EMPRESA` (
  `correo` VARCHAR(50) NOT NULL,
  `pass` VARCHAR(50) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `web` VARCHAR(100) NOT NULL,
  `saldo` INT NOT NULL,
  PRIMARY KEY (`correo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackatondb`.`PEDIDO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hackatondb`.`PEDIDO` (
  `nroPedido` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  INDEX `fk_PEDIDO_EMPRESA_idx` (`correo` ASC),
  PRIMARY KEY (`nroPedido`),
  CONSTRAINT `fk_PEDIDO_EMPRESA`
    FOREIGN KEY (`correo`)
    REFERENCES `hackatondb`.`EMPRESA` (`correo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackatondb`.`CODIGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hackatondb`.`CODIGO` (
  `nroCodigo` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(10) NOT NULL,
  `precio` INT NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `nroPedido` INT NOT NULL,
  PRIMARY KEY (`nroCodigo`),
  INDEX `fk_CODIGO_PEDIDO1_idx` (`nroPedido` ASC),
  CONSTRAINT `fk_CODIGO_PEDIDO1`
    FOREIGN KEY (`nroPedido`)
    REFERENCES `hackatondb`.`PEDIDO` (`nroPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackatondb`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hackatondb`.`CLIENTE` (
  `user` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  `nombreCompleto` VARCHAR(45) NOT NULL,
  `saldo` INT NOT NULL,
  PRIMARY KEY (`user`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
