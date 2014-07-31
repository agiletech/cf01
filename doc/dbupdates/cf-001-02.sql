SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `donation`
ADD INDEX `fk_donation_donor1_idx` (`donor_id` ASC);

ALTER TABLE `donor`
ADD COLUMN `person_id` INT(11) NULL DEFAULT NULL AFTER `postcode`,
ADD INDEX `fk_donor_person1_idx` (`person_id` ASC);

ALTER TABLE `user`
DROP COLUMN `name`;

CREATE TABLE IF NOT EXISTS `person` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `surname` VARCHAR(255) NULL DEFAULT NULL,
  `is_lead` TINYINT(1) NULL DEFAULT NULL,
  `is_staff` TINYINT(1) NULL DEFAULT NULL,
  `is_councelor` TINYINT(1) NULL DEFAULT NULL,
  `is_trainee` TINYINT(1) NULL DEFAULT NULL,
  `is_tutor` TINYINT(1) NULL DEFAULT NULL,
  `is_donor` TINYINT(1) NULL DEFAULT NULL,
  `is_admin` TINYINT(1) NULL DEFAULT NULL,
  `is_superadmin` TINYINT(1) NULL DEFAULT NULL,
  `is_client` TINYINT(1) NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_person_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_person_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `center` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `address` TEXT NULL DEFAULT NULL,
  `availability` TEXT NULL DEFAULT NULL,
  `contact_info` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `activity_trace` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `ts` TIMESTAMP NULL DEFAULT NULL,
  `model_class` VARCHAR(255) NULL DEFAULT NULL,
  `model_id` INT(11) NULL DEFAULT NULL,
  `model_name` VARCHAR(255) NULL DEFAULT NULL,
  `action` VARCHAR(255) NULL DEFAULT NULL,
  `old_data` TEXT NULL DEFAULT NULL,
  `new_data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_activity_trace_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_activity_trace_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `trainee` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `person_id` INT(11) NOT NULL,
  `supervisor_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_trainee_person1_idx` (`person_id` ASC),
  INDEX `fk_trainee_person2_idx` (`supervisor_id` ASC),
  CONSTRAINT `fk_trainee_person1`
    FOREIGN KEY (`person_id`)
    REFERENCES `person` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainee_person2`
    FOREIGN KEY (`supervisor_id`)
    REFERENCES `person` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `course` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `next_course_id` INT(11) NULL DEFAULT NULL,
  `current_price` DECIMAL(8,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_course1_idx` (`next_course_id` ASC),
  CONSTRAINT `fk_course_course1`
    FOREIGN KEY (`next_course_id`)
    REFERENCES `course` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `course_schedule` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `center_id` INT(11) NOT NULL,
  `course_id` INT(11) NOT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `is_completed` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_schedule_center1_idx` (`center_id` ASC),
  INDEX `fk_course_schedule_course1_idx` (`course_id` ASC),
  CONSTRAINT `fk_course_schedule_center1`
    FOREIGN KEY (`center_id`)
    REFERENCES `center` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_schedule_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `issued_certificate` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `trainee_id` INT(11) NOT NULL,
  `course_id` INT(11) NOT NULL,
  `ts_issued` DATE NULL DEFAULT NULL,
  `is_sent` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_certificate_trainee1_idx` (`trainee_id` ASC),
  INDEX `fk_certificate_course1_idx` (`course_id` ASC),
  CONSTRAINT `fk_certificate_trainee1`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `trainee` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_certificate_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `notification_type` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `short_name` VARCHAR(255) NULL DEFAULT NULL,
  `template` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `short_name` (`short_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `notification` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `notification_type_id` INT(11) NOT NULL,
  `person_id` INT(11) NOT NULL,
  `is_sent` TINYINT(1) NULL DEFAULT NULL,
  `ts` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notification_notification_type1_idx` (`notification_type_id` ASC),
  INDEX `fk_notification_person1_idx` (`person_id` ASC),
  CONSTRAINT `fk_notification_notification_type1`
    FOREIGN KEY (`notification_type_id`)
    REFERENCES `notification_type` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_person1`
    FOREIGN KEY (`person_id`)
    REFERENCES `person` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `course_application` (
  `id` INT(11) NOT NULL,
  `trainee_id` INT(11) NOT NULL,
  `course_id` INT(11) NOT NULL,
  `applied_ts` DATE NULL DEFAULT NULL,
  `assigned_ts` DATE NULL DEFAULT NULL,
  `is_waiting` VARCHAR(255) NULL DEFAULT NULL,
  `course_schedule_id` INT(11) NULL DEFAULT NULL,
  `price` DECIMAL(8,2) NULL DEFAULT NULL,
  `is_completed` TINYINT(1) NULL DEFAULT NULL,
  `is_terminated` TINYINT(1) NULL DEFAULT NULL,
  `location_preference` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_application_trainee1_idx` (`trainee_id` ASC),
  INDEX `fk_course_application_course1_idx` (`course_id` ASC),
  INDEX `fk_course_application_course_schedule1_idx` (`course_schedule_id` ASC),
  CONSTRAINT `fk_course_application_trainee1`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `trainee` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_application_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_application_course_schedule1`
    FOREIGN KEY (`course_schedule_id`)
    REFERENCES `course_schedule` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `course_payment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ts` DATE NULL DEFAULT NULL,
  `amount` DECIMAL(8,2) NULL DEFAULT NULL,
  `course_application_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_payment_course_application1_idx` (`course_application_id` ASC),
  CONSTRAINT `fk_course_payment_course_application1`
    FOREIGN KEY (`course_application_id`)
    REFERENCES `course_application` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `trainee_struggle` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `trainee_id` INT(11) NOT NULL,
  `course_application_id` INT(11) NOT NULL,
  `ts` DATE NULL DEFAULT NULL,
  `type` VARCHAR(255) NULL DEFAULT NULL,
  `details` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_trainee_alert_trainee1_idx` (`trainee_id` ASC),
  INDEX `fk_trainee_alert_course_application1_idx` (`course_application_id` ASC),
  CONSTRAINT `fk_trainee_alert_trainee1`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `trainee` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainee_alert_course_application1`
    FOREIGN KEY (`course_application_id`)
    REFERENCES `course_application` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `client` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `person_id` INT(11) NOT NULL,
  `company_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_client_person1_idx` (`person_id` ASC),
  INDEX `fk_client_company1_idx` (`company_id` ASC),
  CONSTRAINT `fk_client_person1`
    FOREIGN KEY (`person_id`)
    REFERENCES `person` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `company` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `company` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `payment_info` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `donation`
ADD CONSTRAINT `fk_donation_donor1`
  FOREIGN KEY (`donor_id`)
  REFERENCES `donor` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `donor`
ADD CONSTRAINT `fk_donor_person1`
  FOREIGN KEY (`person_id`)
  REFERENCES `person` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
