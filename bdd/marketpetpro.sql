
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MarketPet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema MarketPet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MarketPet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `MarketPet` ;

-- -----------------------------------------------------
-- Table `MarketPet`.`tipo_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`tipo_us` (
  `id_tipo_us` TINYINT NOT NULL AUTO_INCREMENT,
  `nombre_tipo` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`id_tipo_us`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`usuario` (
  `id_usuario` SMALLINT NOT NULL AUTO_INCREMENT,
  `nombre_us` VARCHAR(20) NOT NULL,
  `apellidos_us` VARCHAR(20) NOT NULL,
  `edad` DATE NOT NULL,
  `dni_us` VARCHAR(13) NOT NULL,
  `contrasena_us` VARCHAR(20) NOT NULL,
  `telefono_us` INT NULL DEFAULT NULL,
  `residencia_us` VARCHAR(40) NULL DEFAULT NULL,
  `correo_us` VARCHAR(30) NULL DEFAULT NULL,
  `sexo_us` VARCHAR(6) NULL DEFAULT NULL,
  `adicional_us` VARCHAR(100) NULL DEFAULT NULL,
  `avatar` VARCHAR(30) NULL DEFAULT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  `us_tipo` TINYINT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_usuario_tipo_us_idx` (`us_tipo` ASC) ,
  CONSTRAINT `fk_usuario_tipo_us`
    FOREIGN KEY (`us_tipo`)
    REFERENCES `MarketPet`.`tipo_us` (`id_tipo_us`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`cliente` (
  `id_cliente` SMALLINT NOT NULL AUTO_INCREMENT,
  `nombre_client` VARCHAR(20) NOT NULL,
  `apellido_client` VARCHAR(20) NOT NULL,
  `dni_client` VARCHAR(12) NOT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MarketPet`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`venta` (
  `id_venta` SMALLINT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NULL DEFAULT NULL,
  `cliente` VARCHAR(35) NULL DEFAULT NULL,
  `dni` VARCHAR(12) NULL DEFAULT NULL,
  `total` FLOAT(5,2) NULL DEFAULT NULL,
  `vendedor` SMALLINT NOT NULL,
  `venta_id_cliente` SMALLINT NOT NULL,
  PRIMARY KEY (`id_venta`),
  INDEX `fk_venta_usuario1_idx` (`vendedor` ASC) ,
  INDEX `fk_venta_cliente1_idx` (`venta_id_cliente` ASC),
  CONSTRAINT `fk_venta_usuario1`
    FOREIGN KEY (`vendedor`)
    REFERENCES `MarketPet`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_cliente1`
    FOREIGN KEY (`venta_id_cliente`)
    REFERENCES `MarketPet`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`detalle_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`detalle_venta` (
  `id_detalle` SMALLINT NOT NULL AUTO_INCREMENT,
  `det_cantidad` TINYINT NOT NULL,
  `det_vencimiento` DATE NOT NULL,
  `id__det_lote` SMALLINT NOT NULL,
  `id__det_prod` SMALLINT NOT NULL,
  `lote_id_prov` TINYINT NOT NULL,
  `id_det_venta` SMALLINT NOT NULL,
  PRIMARY KEY (`id_detalle`),
  INDEX `fk_detalle_venta_venta1_idx` (`id_det_venta` ASC) ,
  CONSTRAINT `fk_detalle_venta_venta1`
    FOREIGN KEY (`id_det_venta`)
    REFERENCES `MarketPet`.`venta` (`id_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`laboratorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`laboratorio` (
  `id_laboratorio` TINYINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `avatar` VARCHAR(30) NULL DEFAULT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id_laboratorio`))
ENGINE = InnoDB
AUTO_INCREMENT = 169
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`tipo_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`tipo_producto` (
  `id_tip_prod` TINYINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NOT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id_tip_prod`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`presentacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`presentacion` (
  `id_presentacion` SMALLINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id_presentacion`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`producto` (
  `id_producto` SMALLINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NOT NULL,
  `concentracion` VARCHAR(10) NULL DEFAULT NULL,
  `adicional` VARCHAR(100) NULL DEFAULT NULL,
  `precio` FLOAT(6,2) NOT NULL,
  `avatar` VARCHAR(30) NULL DEFAULT NULL,
  `prod_lab` TINYINT NOT NULL,
  `prod_tip_prod` TINYINT NOT NULL,
  `prod_present` SMALLINT NOT NULL,
  PRIMARY KEY (`id_producto`),
  INDEX `fk_producto_tipo_producto1_idx` (`prod_tip_prod` ASC) ,
  INDEX `fk_producto_presentacion1_idx` (`prod_present` ASC) ,
  INDEX `fk_producto_laboratorio1_idx` (`prod_lab` ASC) ,
  CONSTRAINT `fk_producto_tipo_producto1`
    FOREIGN KEY (`prod_tip_prod`)
    REFERENCES `MarketPet`.`tipo_producto` (`id_tip_prod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_presentacion1`
    FOREIGN KEY (`prod_present`)
    REFERENCES `MarketPet`.`presentacion` (`id_presentacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_laboratorio1`
    FOREIGN KEY (`prod_lab`)
    REFERENCES `MarketPet`.`laboratorio` (`id_laboratorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`proveedor` (
  `id_proveedor` TINYINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NOT NULL,
  `telefono` INT NOT NULL,
  `correo` VARCHAR(30) NULL DEFAULT NULL,
  `direccion` VARCHAR(40) NOT NULL,
  `avatar` VARCHAR(30) NULL DEFAULT NULL,
  `estado` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id_proveedor`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`lote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`lote` (
  `id_lote` SMALLINT NOT NULL AUTO_INCREMENT,
  `stock` TINYINT NOT NULL,
  `vencimiento` DATE NOT NULL,
  `lote_id_prod` SMALLINT NOT NULL,
  `lote_id_prov` TINYINT NOT NULL,
  PRIMARY KEY (`id_lote`),
  INDEX `fk_lote_producto1_idx` (`lote_id_prod` ASC) ,
  INDEX `fk_lote_proveedor1_idx` (`lote_id_prov` ASC),
  CONSTRAINT `fk_lote_producto1`
    FOREIGN KEY (`lote_id_prod`)
    REFERENCES `MarketPet`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lote_proveedor1`
    FOREIGN KEY (`lote_id_prov`)
    REFERENCES `MarketPet`.`proveedor` (`id_proveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MarketPet`.`venta_mensual`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`venta_mensual` (
  `mensual` DOUBLE NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `MarketPet`.`venta_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MarketPet`.`venta_producto` (
  `id_ventaproducto` SMALLINT NOT NULL AUTO_INCREMENT,
  `cantidad` TINYINT NOT NULL,
  `subtotal` FLOAT(5,2) NOT NULL,
  `producto_id_producto` SMALLINT NOT NULL,
  `venta_id_venta` SMALLINT NOT NULL,
  PRIMARY KEY (`id_ventaproducto`),
  INDEX `fk_venta_producto_producto1_idx` (`producto_id_producto` ASC) ,
  INDEX `fk_venta_producto_venta1_idx` (`venta_id_venta` ASC) ,
  CONSTRAINT `fk_venta_producto_producto1`
    FOREIGN KEY (`producto_id_producto`)
    REFERENCES `MarketPet`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_producto_venta1`
    FOREIGN KEY (`venta_id_venta`)
    REFERENCES `MarketPet`.`venta` (`id_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;