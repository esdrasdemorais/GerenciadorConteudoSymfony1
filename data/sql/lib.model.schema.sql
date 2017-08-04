
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- ct_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_inox_star_`;


CREATE TABLE `ct_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nam` VARCHAR(255)  NOT NULL,
	`en` CHAR(1) default '0',
	`par` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `nam_ct_U` (`nam`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pr_ct_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pr_ct_inox_star_`;


CREATE TABLE `pr_ct_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pr_id` INTEGER  NOT NULL,
	`ct_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pr_id_ct_id_pr_ct_U` (`pr_id`, `ct_id`),
	KEY `pr_ct_ct_id_FK`(`ct_id`),
	CONSTRAINT `pr_ct_inox_star__FK_1`
		FOREIGN KEY (`pr_id`)
		REFERENCES `pr_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pr_ct_inox_star__FK_2`
		FOREIGN KEY (`ct_id`)
		REFERENCES `ct_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pr_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pr_inox_star_`;


CREATE TABLE `pr_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nam` VARCHAR(255)  NOT NULL,
	`price` FLOAT,
	`us_id` INTEGER  NOT NULL,
	`en` CHAR(1) default '0',
	`descr` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `nam_pr_U` (`nam`),
	KEY `pr_us_id_FK`(`us_id`),
	CONSTRAINT `pr_inox_star__FK_1`
		FOREIGN KEY (`us_id`)
		REFERENCES `us_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pr_ph_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pr_ph_inox_star_`;


CREATE TABLE `pr_ph_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pr_id` INTEGER  NOT NULL,
	`nam` VARCHAR(170)  NOT NULL,
	`ext` VARCHAR(4)  NOT NULL,
	`typ` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `nam_pr_ph_U` (`nam`),
	KEY `pr_ph_pr_id_FK`(`pr_id`),
	CONSTRAINT `pr_ph_inox_star__FK_1`
		FOREIGN KEY (`pr_id`)
		REFERENCES `pr_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pr_tg_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pr_tg_inox_star_`;


CREATE TABLE `pr_tg_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pr_id` INTEGER  NOT NULL,
	`tg_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pr_id_td_id_pr_tg_U` (`pr_id`, `tg_id`),
	KEY `pr_tg_tg_id_FK`(`tg_id`),
	CONSTRAINT `pr_tg_inox_star__FK_1`
		FOREIGN KEY (`pr_id`)
		REFERENCES `pr_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pr_tg_inox_star__FK_2`
		FOREIGN KEY (`tg_id`)
		REFERENCES `tg_inox_star_` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tg_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tg_inox_star_`;


CREATE TABLE `tg_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nam` VARCHAR(255)  NOT NULL,
	`en` CHAR(1) default '0',
	PRIMARY KEY (`id`),
	UNIQUE KEY `nam_us_U` (`nam`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- us_inox_star_
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `us_inox_star_`;


CREATE TABLE `us_inox_star_`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nam` VARCHAR(170)  NOT NULL,
	`pas` VARCHAR(70)  NOT NULL,
	`en` CHAR(1) default '0',
	`admin` CHAR(1) default '0',
	`sal` VARCHAR(70)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `nam_us_U` (`nam`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
