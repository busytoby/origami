CREATE TABLE `eav_text` (
  `id` CHAR(36)  NOT NULL  ,
  `value` TEXT  NOT NULL    ,
PRIMARY KEY(`id`))
TYPE=InnoDB;



CREATE TABLE `eav_varchars` (
  `id` CHAR(36)  NOT NULL  ,
  `value` VARCHAR(255)  NOT NULL    ,
PRIMARY KEY(`id`)  ,
INDEX `value_index`(`value`(32)))
TYPE=InnoDB;



CREATE TABLE `eav_files` (
  `id` CHAR(36)  NOT NULL  ,
  `value` MEDIUMBLOB  NOT NULL    ,
PRIMARY KEY(`id`))
TYPE=InnoDB;



CREATE TABLE `eav_integers` (
  `id` CHAR(36)  NOT NULL  ,
  `value` INTEGER UNSIGNED  NOT NULL    ,
PRIMARY KEY(`id`)  ,
INDEX `value_index`(`value`))
TYPE=InnoDB;



CREATE TABLE `eav_datetimes` (
  `id` CHAR(36)  NOT NULL  ,
  `value` DATETIME  NOT NULL    ,
PRIMARY KEY(`id`)  ,
INDEX `value_index`(`value`))
TYPE=InnoDB;



CREATE TABLE `datatypes` (
  `id` CHAR(36)  NOT NULL  ,
  `name` VARCHAR(255)  NOT NULL  ,
  `validation_proc` TEXT  NULL  ,
  `format` VARCHAR(255)  NULL  ,
  `table` ENUM('VARCHAR','INTEGER','DATETIME','TEXT','FILE')  NOT NULL DEFAULT 'VARCHAR'   ,
PRIMARY KEY(`id`))
TYPE=InnoDB;



CREATE TABLE `attributes` (
  `id` CHAR(36)  NOT NULL  ,
  `datatype_id` CHAR(36)  NOT NULL  ,
  `name` VARCHAR(255)  NOT NULL  ,
  `multiple` TINYINT(1) UNSIGNED  NOT NULL DEFAULT '0'   ,
PRIMARY KEY(`id`)  ,
INDEX `name_index`(`name`),
  FOREIGN KEY(`datatype_id`)
    REFERENCES `datatypes`(`id`)
      ON DELETE RESTRICT
      ON UPDATE CASCADE)
TYPE=InnoDB;



CREATE TABLE `eav_data` (
  `id` CHAR(36)  NOT NULL  ,
  `entity_id` CHAR(36)  NOT NULL  ,
  `attribute_id` CHAR(36)  NOT NULL  ,
  `value_id` CHAR(36)  NOT NULL    ,
PRIMARY KEY(`id`)  ,
INDEX `entity_attribute_index`(`attribute_id`, `entity_id`)  ,
INDEX `entity_index`(`entity_id`)  ,
INDEX `attribute_index`(`attribute_id`)  ,
INDEX `attribute_value_index`(`attribute_id`, `value_id`),
  FOREIGN KEY(`attribute_id`)
    REFERENCES `attributes`(`id`)
      ON DELETE RESTRICT
      ON UPDATE CASCADE)
TYPE=InnoDB;
