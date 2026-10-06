-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema livro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema livro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `livro` DEFAULT CHARACTER SET utf8 ;
USE `livro` ;

-- -----------------------------------------------------
-- Table `livro`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Categoria` (
  `id_Categoria` INT NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(50) NULL,
  PRIMARY KEY (`id_Categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Livro` (
  `id_Livro` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NULL,
  `autor` VARCHAR(100) NULL,
  `editora` VARCHAR(100) NULL,
  `preco` DECIMAL(10,2) NULL,
  `estoque` INT NULL,
  `id_Categoria` INT NOT NULL,
  PRIMARY KEY (`id_Livro`),
  INDEX `fk_Livro_Categoria1_idx` (`id_Categoria` ASC) VISIBLE,
  CONSTRAINT `fk_Livro_Categoria1`
    FOREIGN KEY (`id_Categoria`)
    REFERENCES `livro`.`Categoria` (`id_Categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Pagamento` (
  `id_Pagamento` INT NOT NULL AUTO_INCREMENT,
  `forma_pagamento` VARCHAR(30) NULL,
  PRIMARY KEY (`id_Pagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Cliente` (
  `id_Cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `senha` VARCHAR(255) NULL,
  `telefone` VARCHAR(20) NULL,
  `tipo_usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Pedido` (
  `id_Pedido` INT NOT NULL AUTO_INCREMENT,
  `data_pedido` DATE NULL,
  `valor_total` DECIMAL(10,2) NULL,
  `status` VARCHAR(30) NULL,
  `Pagamento_id_Pagamento` INT NOT NULL,
  `Cliente_id_Cliente` INT NOT NULL,
  PRIMARY KEY (`id_Pedido`),
  INDEX `fk_Pedido_Pagamento1_idx` (`Pagamento_id_Pagamento` ASC) VISIBLE,
  INDEX `fk_Pedido_Cliente1_idx` (`Cliente_id_Cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_Pagamento1`
    FOREIGN KEY (`Pagamento_id_Pagamento`)
    REFERENCES `livro`.`Pagamento` (`id_Pagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Cliente1`
    FOREIGN KEY (`Cliente_id_Cliente`)
    REFERENCES `livro`.`Cliente` (`id_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Item_Pedido_has_Livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Item_Pedido_has_Livro` (
  `Item_Pedido_id_Item` INT NOT NULL,
  `Item_Pedido_id_Pedido` INT NOT NULL,
  `Item_Pedido_id_Livro` INT NOT NULL,
  `Livro_id_Livro` INT NOT NULL,
  PRIMARY KEY (`Item_Pedido_id_Item`, `Item_Pedido_id_Pedido`, `Item_Pedido_id_Livro`, `Livro_id_Livro`),
  INDEX `fk_Item_Pedido_has_Livro_Livro1_idx` (`Livro_id_Livro` ASC) VISIBLE,
  CONSTRAINT `fk_Item_Pedido_has_Livro_Livro1`
    FOREIGN KEY (`Livro_id_Livro`)
    REFERENCES `livro`.`Livro` (`id_Livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Pedido_has_Livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Pedido_has_Livro` (
  `Pedido_id_Pedido` INT NOT NULL,
  `Pedido_Pagamento_id_Pagamento` INT NOT NULL,
  `Pedido_Pagamento_id_Pedido` INT NOT NULL,
  `Livro_id_Livro` INT NOT NULL,
  PRIMARY KEY (`Pedido_id_Pedido`, `Pedido_Pagamento_id_Pagamento`, `Pedido_Pagamento_id_Pedido`, `Livro_id_Livro`),
  INDEX `fk_Pedido_has_Livro_Livro1_idx` (`Livro_id_Livro` ASC) VISIBLE,
  INDEX `fk_Pedido_has_Livro_Pedido1_idx` (`Pedido_id_Pedido` ASC, `Pedido_Pagamento_id_Pagamento` ASC, `Pedido_Pagamento_id_Pedido` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_has_Livro_Pedido1`
    FOREIGN KEY (`Pedido_id_Pedido`)
    REFERENCES `livro`.`Pedido` (`id_Pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Livro_Livro1`
    FOREIGN KEY (`Livro_id_Livro`)
    REFERENCES `livro`.`Livro` (`id_Livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livro`.`Pedido_has_Livro1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livro`.`Pedido_has_Livro1` (
  `Pedido_id_Pedido` INT NOT NULL,
  `Livro_id_Livro` INT NOT NULL,
  `quantidade` INT NULL,
  PRIMARY KEY (`Pedido_id_Pedido`, `Livro_id_Livro`),
  INDEX `fk_Pedido_has_Livro1_Livro1_idx` (`Livro_id_Livro` ASC) VISIBLE,
  INDEX `fk_Pedido_has_Livro1_Pedido1_idx` (`Pedido_id_Pedido` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_has_Livro1_Pedido1`
    FOREIGN KEY (`Pedido_id_Pedido`)
    REFERENCES `livro`.`Pedido` (`id_Pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Livro1_Livro1`
    FOREIGN KEY (`Livro_id_Livro`)
    REFERENCES `livro`.`Livro` (`id_Livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
