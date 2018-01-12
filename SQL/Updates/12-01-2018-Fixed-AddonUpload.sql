ALTER TABLE `ac_addons` CHANGE `status` `status` INT(8) DEFAULT 2 NOT NULL, CHANGE `downloads` `downloads` INT(128) DEFAULT 0 NOT NULL;


CREATE TABLE `ac_version`
( `id` INT(255) AUTO_INCREMENT,
`gameversion` INT(255) DEFAULT 0,
KEY(`id`) ); 
