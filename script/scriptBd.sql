-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema examen_final
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema examen_final
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `examen_final` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `examen_final` ;

-- -----------------------------------------------------
-- Table `examen_final`.`perfiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`perfiles` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion` VARCHAR(300) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `examen_final`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`usuarios` (
  `id_usuario` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `login_usuario` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `pass_usuario` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `nombre_usuario` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `apellido_usuario` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `correo_usuario` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `edad_usuario` INT(11) NOT NULL COMMENT '',
  `codigo_perfil` INT(11) UNSIGNED NOT NULL DEFAULT '1' COMMENT '',
  `fechaNacimiento_usuario` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id_usuario`)  COMMENT '',
  UNIQUE INDEX `login_usuario` (`login_usuario` ASC, `correo_usuario` ASC)  COMMENT '',
  INDEX `codigo_perfil` (`codigo_perfil` ASC)  COMMENT '',
  CONSTRAINT `fk_perfiles`
    FOREIGN KEY (`codigo_perfil`)
    REFERENCES `examen_final`.`perfiles` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `examen_final`.`ordenes_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`ordenes_compra` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha_emision` DATETIME NOT NULL COMMENT '',
  `monto_total` INT NOT NULL COMMENT '',
  `estado` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '',
  `usuarios_id_usuario` INT(10) UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_ordenes_compra_usuarios1_idx` (`usuarios_id_usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_ordenes_compra_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `examen_final`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examen_final`.`tipo_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`tipo_productos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NOT NULL COMMENT '',
  `descripcion` VARCHAR(300) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `examen_final`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`productos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NOT NULL COMMENT '',
  `descripcion` VARCHAR(300) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `precio` INT(10) UNSIGNED NOT NULL COMMENT '',
  `unidades` INT(10) UNSIGNED NOT NULL COMMENT '',
  `tipo_productos_id` INT(10) UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_productos_tipo_productos1_idx` (`tipo_productos_id` ASC)  COMMENT '',
  CONSTRAINT `fk_productos_tipo_productos1`
    FOREIGN KEY (`tipo_productos_id`)
    REFERENCES `examen_final`.`tipo_productos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `examen_final`.`detalle_oc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen_final`.`detalle_oc` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `cantidad` INT(10) UNSIGNED NOT NULL COMMENT '',
  `sub_total` INT(10) UNSIGNED NOT NULL COMMENT '',
  `ordenes_compra_id` INT UNSIGNED NOT NULL COMMENT '',
  `productos_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_detalle_oc_ordenes_compra1_idx` (`ordenes_compra_id` ASC)  COMMENT '',
  INDEX `fk_detalle_oc_productos1_idx` (`productos_id` ASC)  COMMENT '',
  CONSTRAINT `fk_detalle_oc_ordenes_compra1`
    FOREIGN KEY (`ordenes_compra_id`)
    REFERENCES `examen_final`.`ordenes_compra` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_oc_productos1`
    FOREIGN KEY (`productos_id`)
    REFERENCES `examen_final`.`productos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `examen_final`.`perfiles` (`id`, `nombre`, `descripcion`) VALUES (NULL, 'Consulta', 'Usuario que solo puede realizar consultas de los datos y OCs');

INSERT INTO `examen_final`.`usuarios` (`id_usuario`, `login_usuario`, `pass_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `edad_usuario`, `codigo_perfil`, `fechaNacimiento_usuario`) VALUES (NULL, 'test', MD5('test'), 'Usuario', 'Basico', 'user@basico.cl', '20', '1', CURRENT_TIMESTAMP);