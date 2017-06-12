-- MySQL Script generated by MySQL Workbench
-- 06/12/17 08:42:32
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema findmeadoctor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema findmeadoctor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `findmeadoctor` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `findmeadoctor` ;

-- -----------------------------------------------------
-- Table `findmeadoctor`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `dob` DATE NULL,
  `location` VARCHAR(255) BINARY NULL,
  `address_line1` VARCHAR(255) NULL,
  `address_line2` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  `state` VARCHAR(255) NULL,
  `postal_code` VARCHAR(255) NULL,
  `country` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  `user_level` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `contactno` VARCHAR(45) NULL,
  `gender` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`doctor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`doctor` (
  `doctor_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `dob` DATE NULL,
  `location` VARCHAR(255) NULL,
  `address_line1` VARCHAR(255) NULL,
  `address_line2` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  `state` VARCHAR(255) NULL,
  `postcode` VARCHAR(45) NULL,
  `country` VARCHAR(255) NULL,
  `specialization` INT(11) NULL,
  `status` TINYINT(1) NULL,
  `email` VARCHAR(45) NULL,
  `contactno` VARCHAR(45) NULL,
  `gender` VARCHAR(45) NULL,
  PRIMARY KEY (`doctor_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`specialization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`specialization` (
  `specialization_id` INT NOT NULL AUTO_INCREMENT,
  `specialization_name` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`specialization_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`symptoms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`symptoms` (
  `symptoms_id` INT NOT NULL AUTO_INCREMENT,
  `symptoms_description` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`symptoms_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`medical_condition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`medical_condition` (
  `medical_cond_id` INT NOT NULL AUTO_INCREMENT,
  `medical_condition_name` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`medical_cond_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`symptom_medical_condition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`symptom_medical_condition` (
  `symp_medi_con_id` INT NOT NULL AUTO_INCREMENT,
  `medical_cond_id` INT(11) NULL,
  `symptom_id` INT(11) NULL,
  PRIMARY KEY (`symp_medi_con_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`specialization_medical_con`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`specialization_medical_con` (
  `specialization_medical_con_id` INT NOT NULL AUTO_INCREMENT,
  `medical_cond_id` INT(11) NULL,
  `specialization_id` INT(11) NULL,
  PRIMARY KEY (`specialization_medical_con_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`medical_service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`medical_service` (
  `medical_service_id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NULL,
  `location` VARCHAR(255) NULL,
  `address_line1` VARCHAR(255) NULL,
  `address_line2` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  `state` VARCHAR(255) NULL,
  `postal_code` VARCHAR(255) NULL,
  `country` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  `medical_service_type_id` INT(11) NULL,
  PRIMARY KEY (`medical_service_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`doctor_schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`doctor_schedule` (
  `doctor_schedule_id` INT NOT NULL AUTO_INCREMENT,
  `doctor_id` INT(11) NULL,
  `monday_start_hour` TIME NULL,
  `monday_end_hour` TIME NULL,
  `tuesday_start_hour` TIME NULL,
  `tuesday_end_hour` TIME NULL,
  `wednesday_start_hour` TIME NULL,
  `wednesday_end_hour` TIME NULL,
  `thursday_start_hour` TIME NULL,
  `thursday_end_hour` TIME NULL,
  `friday_start_hour` TIME NULL,
  `friday_end_hour` TIME NULL,
  `saturday_start_hour` TIME NULL,
  `saturday_end_hour` TIME NULL,
  `sunday_start_hour` TIME NULL,
  `sunday_end_hour` TIME NULL,
  PRIMARY KEY (`doctor_schedule_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`appointment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`appointment` (
  `appointment_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL,
  `doctor_id` INT(11) NULL,
  `medical_condition` INT(11) NULL,
  `date` DATE NULL,
  `time` TIME NULL,
  `location` VARCHAR(255) NULL,
  `status` TINYINT(1) NULL,
  `feedback` VARCHAR(255) NULL,
  `ratings` INT(11) NULL,
  `medical_service_id` INT(11) NULL,
  PRIMARY KEY (`appointment_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `findmeadoctor`.`medical_service_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `findmeadoctor`.`medical_service_type` (
  `medical_service_type_id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`medical_service_type_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;