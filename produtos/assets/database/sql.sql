-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema produtos
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `produtos` ;

-- -----------------------------------------------------
-- Schema produtos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `produtos` DEFAULT CHARACTER SET utf8 ;
USE `produtos` ;

-- -----------------------------------------------------
-- Table `produtos`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `senha_UNIQUE` (`senha` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produtos`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`produto` (
  `idproduto_user` INT NOT NULL AUTO_INCREMENT,
  `prod_nome` VARCHAR(100) NOT NULL,
  `prod_preco` DOUBLE NOT NULL,
  `prod_descricao` VARCHAR(300) NOT NULL,
  `prod_estoque` INT NULL,
  `prod_img` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idproduto_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produtos`.`users_has_produto_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`users_has_produto_user` (
  `users_idusers` INT NOT NULL,
  `produto_user_idproduto_user` INT NOT NULL,
  INDEX `fk_users_has_produto_user_produto_user1_idx` (`produto_user_idproduto_user` ASC),
  INDEX `fk_users_has_produto_user_users_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_users_has_produto_user_users`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `produtos`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_produto_user_produto_user1`
    FOREIGN KEY (`produto_user_idproduto_user`)
    REFERENCES `produtos`.`produto` (`idproduto_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
