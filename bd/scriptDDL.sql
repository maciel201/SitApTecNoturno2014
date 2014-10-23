SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sitap
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sitap` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- -----------------------------------------------------
-- Schema sitapnot2014
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sitapnot2014` DEFAULT CHARACTER SET latin1 ;
USE `sitap` ;

-- -----------------------------------------------------
-- Table `sitap`.`tblCategorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`tblCategorias` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`tblFotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`tblFotos` (
  `idFoto` INT NOT NULL AUTO_INCREMENT,
  `caminho` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idFoto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `dtNacimento` DATE NULL,
  `foto` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `bairro` INT NULL,
  `endereco` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`noticia` (
  `idnoticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `texto` TEXT NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  `idusuario` INT NOT NULL,
  `positivo` INT NULL,
  `negativo` INT NULL,
  PRIMARY KEY (`idnoticia`),
  INDEX `fk_noticia_usuario_idx` (`idusuario` ASC),
  CONSTRAINT `fk_noticia_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitap`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`cometario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`cometario` (
  `idcometario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  `idnoticia` INT NOT NULL,
  `idusuario` INT NOT NULL,
  `positivo` INT NULL,
  `negativo` INT NULL,
  PRIMARY KEY (`idcometario`),
  INDEX `fk_cometario_noticia1_idx` (`idnoticia` ASC),
  INDEX `fk_cometario_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_cometario_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cometario_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitap`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `cateoria` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`categoria_tem_noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`categoria_tem_noticia` (
  `idcategoria` INT NOT NULL,
  `idnoticia` INT NOT NULL,
  PRIMARY KEY (`idcategoria`, `idnoticia`),
  INDEX `fk_categoria_has_noticia_noticia1_idx` (`idnoticia` ASC),
  INDEX `fk_categoria_has_noticia_categoria1_idx` (`idcategoria` ASC),
  CONSTRAINT `fk_categoria_has_noticia_categoria1`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `sitap`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_has_noticia_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`foto` (
  `idfoto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `url` VARCHAR(70) NULL,
  `idnoticia` INT NOT NULL,
  PRIMARY KEY (`idfoto`),
  INDEX `fk_foto_noticia1_idx` (`idnoticia` ASC),
  CONSTRAINT `fk_foto_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `sitapnot2014` ;

-- -----------------------------------------------------
-- Table `sitapnot2014`.`tblComentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitapnot2014`.`tblComentarios` (
  `idComentarios` INT(11) NOT NULL AUTO_INCREMENT,
  `dtCriacao` DATETIME NOT NULL,
  `dtAtualiza` DATETIME NOT NULL,
  `comentarios` TEXT NOT NULL,
  PRIMARY KEY (`idComentarios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sitapnot2014`.`tblNoticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitapnot2014`.`tblNoticias` (
  `idNoticias` INT(11) NOT NULL AUTO_INCREMENT,
  `noticia` TEXT NOT NULL,
  `assunto` VARCHAR(30) NOT NULL,
  `dtCriacao` DATETIME NOT NULL,
  `dtAtualiza` DATETIME NOT NULL,
  `tblCategorias_idCategoria` INT NOT NULL,
  `tblComentarios_idComentarios` INT(11) NOT NULL,
  PRIMARY KEY (`idNoticias`),
  INDEX `idNoticias` (`idNoticias` ASC),
  INDEX `idNoticias_2` (`idNoticias` ASC),
  INDEX `fk_tblNoticias_tblCategorias_idx` (`tblCategorias_idCategoria` ASC),
  INDEX `fk_tblNoticias_tblComentarios1_idx` (`tblComentarios_idComentarios` ASC),
  CONSTRAINT `fk_tblNoticias_tblCategorias`
    FOREIGN KEY (`tblCategorias_idCategoria`)
    REFERENCES `sitap`.`tblCategorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblNoticias_tblComentarios1`
    FOREIGN KEY (`tblComentarios_idComentarios`)
    REFERENCES `sitapnot2014`.`tblComentarios` (`idComentarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sitapnot2014`.`tblUsers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitapnot2014`.`tblUsers` (
  `idUsers` INT(11) NOT NULL AUTO_INCREMENT,
  `dtCriacao` DATETIME NULL DEFAULT NULL,
  `dtAtualiza` DATETIME NULL DEFAULT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `login` VARCHAR(15) CHARACTER SET 'utf8mb4' NOT NULL,
  `endereco` VARCHAR(45) NULL,
  `fotoPerfil` VARCHAR(45) NULL,
  `tblNoticias_idNoticias` INT(11) NOT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE INDEX `login` (`login` ASC),
  UNIQUE INDEX `email` (`email` ASC),
  INDEX `fk_tblUsers_tblNoticias1_idx` (`tblNoticias_idNoticias` ASC),
  CONSTRAINT `fk_tblUsers_tblNoticias1`
    FOREIGN KEY (`tblNoticias_idNoticias`)
    REFERENCES `sitapnot2014`.`tblNoticias` (`idNoticias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sitapnot2014`.`tblNoticias_has_tblFotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitapnot2014`.`tblNoticias_has_tblFotos` (
  `tblNoticias_idNoticias` INT(11) NOT NULL,
  `tblFotos_idFoto` INT NOT NULL,
  PRIMARY KEY (`tblNoticias_idNoticias`, `tblFotos_idFoto`),
  INDEX `fk_tblNoticias_has_tblFotos_tblFotos1_idx` (`tblFotos_idFoto` ASC),
  INDEX `fk_tblNoticias_has_tblFotos_tblNoticias1_idx` (`tblNoticias_idNoticias` ASC),
  CONSTRAINT `fk_tblNoticias_has_tblFotos_tblNoticias1`
    FOREIGN KEY (`tblNoticias_idNoticias`)
    REFERENCES `sitapnot2014`.`tblNoticias` (`idNoticias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblNoticias_has_tblFotos_tblFotos1`
    FOREIGN KEY (`tblFotos_idFoto`)
    REFERENCES `sitap`.`tblFotos` (`idFoto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
