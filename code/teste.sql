-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pessoa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`pessoa` (
  `idPessoa` INT NOT NULL,
  `nomPessoa` VARCHAR(45) NULL,
  `datNasc` DATE NULL,
  `sexPessoa` VARCHAR(5) NULL,
  `cpfPessoa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPessoa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`empresa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`empresa` (
  `idEmpresa` INT NOT NULL,
  `nomEmpresa` VARCHAR(45) NOT NULL,
  `dscCpfCnpj` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(25) NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idEmpresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`endereco` ;

CREATE TABLE IF NOT EXISTS `mydb`.`endereco` (
  `idEnd` INT NOT NULL,
  `dscLogradouro` VARCHAR(45) NULL,
  `numero` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`idEnd`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`estacionamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`estacionamento` ;

CREATE TABLE IF NOT EXISTS `mydb`.`estacionamento` (
  `idEstac` INT NOT NULL,
  `nomEstac` VARCHAR(45) NOT NULL,
  `qtdVagas` INT NOT NULL,
  `valFixo` DOUBLE NOT NULL,
  `valAcresc` DOUBLE NULL,
  `idEmpresa` INT NOT NULL,
  `idEnd` INT NOT NULL,
  PRIMARY KEY (`idEstac`),
  INDEX `fk_estacionamento_empresa_idx` (`idEmpresa` ASC) VISIBLE,
  INDEX `fk_estacionamento_endereco1_idx` (`idEnd` ASC) VISIBLE,
  CONSTRAINT `fk_estacionamento_empresa`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `mydb`.`empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estacionamento_endereco1`
    FOREIGN KEY (`idEnd`)
    REFERENCES `mydb`.`endereco` (`idEnd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`vaga`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`vaga` ;

CREATE TABLE IF NOT EXISTS `mydb`.`vaga` (
  `idVaga` INT NOT NULL,
  `condVaga` TINYINT NULL,
  `idEstac` INT NOT NULL,
  PRIMARY KEY (`idVaga`),
  INDEX `fk_vaga_estacionamento1_idx` (`idEstac` ASC) VISIBLE,
  CONSTRAINT `fk_vaga_estacionamento1`
    FOREIGN KEY (`idEstac`)
    REFERENCES `mydb`.`estacionamento` (`idEstac`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aloca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`aloca` ;

CREATE TABLE IF NOT EXISTS `mydb`.`aloca` (
  `idPessoa` INT NOT NULL,
  `idVaga` INT NOT NULL,
  `idAloca` INT NOT NULL,
  `hrEntrada` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hrSaida` TIMESTAMP NULL,
  `valTotal` DOUBLE NULL,
  `dscPlaca` VARCHAR(25) NULL,
  INDEX `fk_pessoa_has_vaga_vaga1_idx` (`idVaga` ASC) VISIBLE,
  INDEX `fk_pessoa_has_vaga_pessoa1_idx` (`idPessoa` ASC) VISIBLE,
  PRIMARY KEY (`idAloca`),
  CONSTRAINT `fk_pessoa_has_vaga_pessoa1`
    FOREIGN KEY (`idPessoa`)
    REFERENCES `mydb`.`pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_has_vaga_vaga1`
    FOREIGN KEY (`idVaga`)
    REFERENCES `mydb`.`vaga` (`idVaga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`imagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`imagem` ;

CREATE TABLE IF NOT EXISTS `mydb`.`imagem` (
  `idImg` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `data` DATETIME NULL,
  `idEmpresa` INT NOT NULL,
  PRIMARY KEY (`idImg`),
  INDEX `fk_imagem_empresa1_idx` (`idEmpresa` ASC) VISIBLE,
  CONSTRAINT `fk_imagem_empresa1`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `mydb`.`empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`pessoa` (`idPessoa`, `nomPessoa`, `datNasc`, `sexPessoa`, `cpfPessoa`) VALUES (1, 'João Abreu', '1974-12-31', 'M', '908.443.740-32');
INSERT INTO `mydb`.`pessoa` (`idPessoa`, `nomPessoa`, `datNasc`, `sexPessoa`, `cpfPessoa`) VALUES (2, 'Juriscreide', '1983-10-24', 'F', '103.421.541-56');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`empresa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`empresa` (`idEmpresa`, `nomEmpresa`, `dscCpfCnpj`, `email`, `telefone`, `senha`) VALUES (1, 'Empresa de Teste', '12345678966', 'teste@empresa.com', NULL, '$2y$10$VJVFrXnbIt1SyD2Ht8UY1O1Evywx4Sp/cJ/9stJV6ntqYjQio9yaC');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`endereco`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`endereco` (`idEnd`, `dscLogradouro`, `numero`, `cep`, `bairro`, `cidade`, `estado`) VALUES (1, 'Rua Alceu Valença', '63', '29174938', 'São Vincente', 'Serra', 'ES');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`estacionamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`estacionamento` (`idEstac`, `nomEstac`, `qtdVagas`, `valFixo`, `valAcresc`, `idEmpresa`, `idEnd`) VALUES (1, 'Teste', 30, 5, 2.5, 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`vaga`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`vaga` (`idVaga`, `condVaga`, `idEstac`) VALUES (1, 1, 1);
INSERT INTO `mydb`.`vaga` (`idVaga`, `condVaga`, `idEstac`) VALUES (2, 1, 1);
INSERT INTO `mydb`.`vaga` (`idVaga`, `condVaga`, `idEstac`) VALUES (3, 0, 1);
INSERT INTO `mydb`.`vaga` (`idVaga`, `condVaga`, `idEstac`) VALUES (4, 0, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`aloca`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`aloca` (`idPessoa`, `idVaga`, `idAloca`, `hrEntrada`, `hrSaida`, `valTotal`, `dscPlaca`) VALUES (1, 1, 1, '2022-01-19 16:51:57', NULL, NULL, 'dfj4839');
INSERT INTO `mydb`.`aloca` (`idPessoa`, `idVaga`, `idAloca`, `hrEntrada`, `hrSaida`, `valTotal`, `dscPlaca`) VALUES (2, 2, 2, '2022-01-19 16:51:57', NULL, NULL, 'abc1234');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`imagem`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`imagem` (`idImg`, `nome`, `data`, `idEmpresa`) VALUES (1, '00beb17e71130576fc17486ae1981b8a', '2022-01-20 13:22:46', 1);

COMMIT;

