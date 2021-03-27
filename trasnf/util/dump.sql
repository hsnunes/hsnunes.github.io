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
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`generos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(255) NOT NULL,
  `atualizacao` DATETIME NOT NULL,
  `criacao` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `usuario` VARCHAR(8) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `tipo` CHAR(1) NOT NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`artistas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`artistas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `imagem` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`musicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`musicas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `letra` TEXT NOT NULL,
  `artistas_id` INT NULL,
  `generos_id` INT NOT NULL,
  `media` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `generos_id`),
  INDEX `fk_musicas_generos1_idx` (`generos_id` ASC) VISIBLE,
  INDEX `fk_musicas_artistas1_idx` (`artistas_id` ASC) VISIBLE,
  CONSTRAINT `fk_musicas_generos1`
    FOREIGN KEY (`generos_id`)
    REFERENCES `mydb`.`generos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_musicas_artistas1`
    FOREIGN KEY (`artistas_id`)
    REFERENCES `mydb`.`artistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`compositores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`compositores` (
  `id` INT NOT NULL,
  `artistas_id` INT NOT NULL,
  `musicas_id` INT NOT NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `musicas_id`),
  INDEX `fk_compositores_musicas1_idx` (`musicas_id` ASC) VISIBLE,
  CONSTRAINT `fk_compositores_artistas`
    FOREIGN KEY (`artistas_id`)
    REFERENCES `mydb`.`artistas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compositores_musicas1`
    FOREIGN KEY (`musicas_id`)
    REFERENCES `mydb`.`musicas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cifras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cifras` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `musicas_id` INT NOT NULL,
  `cifras` TEXT NOT NULL,
  `autor` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cifras_musicas1_idx` (`musicas_id` ASC) VISIBLE,
  CONSTRAINT `fk_cifras_musicas1`
    FOREIGN KEY (`musicas_id`)
    REFERENCES `mydb`.`musicas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`grupos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `representante` VARCHAR(45) NULL,
  `fundacao` VARCHAR(45) NULL,
  `historico` TEXT NULL,
  `contato` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`artista-grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`artista-grupos` (
  `id_artista` INT NOT NULL,
  `id-grupos` INT NOT NULL,
  `funcao` VARCHAR(255) NULL,
  `insercao` DATETIME NULL,
  PRIMARY KEY (`id_artista`, `id-grupos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`acessos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`acessos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuarios_id` INT NOT NULL,
  `acesso` DATETIME NOT NULL,
  `saida` DATETIME NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_acessos_usuarios1_idx` (`usuarios_id` ASC) VISIBLE,
  CONSTRAINT `fk_acessos_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `mydb`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`stats_musicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`stats_musicas` (
  `musicas_id` INT NOT NULL,
  `view` DATETIME NOT NULL,
  PRIMARY KEY (`musicas_id`),
  CONSTRAINT `fk_stats_musica_musicas1`
    FOREIGN KEY (`musicas_id`)
    REFERENCES `mydb`.`musicas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
