ALTER TABLE `ac_expansion`
CHANGE `Expansion` `expansion` VARCHAR(255)
CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
CHANGE `Status` `status` INT(2) DEFAULT 1 NOT NULL
COMMENT 'status column';

/*
* ac_config for ACP
*/

CREATE TABLE `ac_config`
( `id_cnf` INT(25) NOT NULL AUTO_INCREMENT,
`config_item` VARCHAR(255),
`value` VARCHAR(255),
KEY(`id_cnf`) );

INSERT INTO `ac_config` (`id_cnf`, `config_item`, `value`) VALUES ('1', 'site_name', 'ANetwork Hub');
INSERT INTO `ac_config` (`id_cnf`, `config_item`, `value`) VALUES ('2', 'is_maintenance', '1');
INSERT INTO `ac_config` (`id_cnf`, `config_item`, `value`) VALUES ('3', 'is_allow_upload', '1');
INSERT INTO `ac_config` (`id_cnf`, `config_item`, `value`) VALUES ('4', 'is_allow_download', '1');
