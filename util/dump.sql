-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hsn
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hsn
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hsn` ;
USE `hsn` ;

-- -----------------------------------------------------
-- Table `hsn`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`registro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_requerente` INT NOT NULL,
  `requerente` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `registro` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`tipo_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`tipo_acesso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_acesso` VARCHAR(45) NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `registro_id`),
  INDEX `fk_tipo_acesso_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_tipo_acesso_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo_acesso_id` INT NOT NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `tipo_acesso_id`, `registro_id`),
  INDEX `fk_usuario_tipo_acesso1_idx` (`tipo_acesso_id` ASC) VISIBLE,
  INDEX `fk_usuario_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_tipo_acesso1`
    FOREIGN KEY (`tipo_acesso_id`)
    REFERENCES `hsn`.`tipo_acesso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`acesso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`, `registro_id`),
  INDEX `fk_acesso_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_acesso_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_acesso_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `hsn`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acesso_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`orcamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`orcamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `registro_id`),
  INDEX `fk_orcamento_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_orcamento_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `orcamento_id` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`, `orcamento_id`, `registro_id`),
  INDEX `fk_servico_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_servico_orcamento1_idx` (`orcamento_id` ASC) VISIBLE,
  INDEX `fk_servico_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_servico_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `hsn`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_orcamento1`
    FOREIGN KEY (`orcamento_id`)
    REFERENCES `hsn`.`orcamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`pendecias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`pendecias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `registro_id` INT NOT NULL,
  PRIMARY KEY (`id`, `registro_id`),
  INDEX `fk_pendecias_registro1_idx` (`registro_id` ASC) VISIBLE,
  CONSTRAINT `fk_pendecias_registro1`
    FOREIGN KEY (`registro_id`)
    REFERENCES `hsn`.`registro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`servico_has_pendecias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`servico_has_pendecias` (
  `servico_id` INT NOT NULL,
  `servico_usuario_id` INT NOT NULL,
  `servico_orcamento_id` INT NOT NULL,
  `pendecias_id` INT NOT NULL,
  PRIMARY KEY (`servico_id`, `servico_usuario_id`, `servico_orcamento_id`, `pendecias_id`),
  INDEX `fk_servico_has_pendecias_pendecias1_idx` (`pendecias_id` ASC) VISIBLE,
  INDEX `fk_servico_has_pendecias_servico1_idx` (`servico_id` ASC, `servico_usuario_id` ASC, `servico_orcamento_id` ASC) VISIBLE,
  CONSTRAINT `fk_servico_has_pendecias_servico1`
    FOREIGN KEY (`servico_id` , `servico_usuario_id` , `servico_orcamento_id`)
    REFERENCES `hsn`.`servico` (`id` , `usuario_id` , `orcamento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_has_pendecias_pendecias1`
    FOREIGN KEY (`pendecias_id`)
    REFERENCES `hsn`.`pendecias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsn`.`gerente_aplicacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsn`.`gerente_aplicacoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aplicacao` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255) NULL,
  `motivo` VARCHAR(255) NULL,
  `branch` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `criado` DATETIME NOT NULL,
  `atualizado` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
