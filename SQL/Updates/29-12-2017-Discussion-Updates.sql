DROP TABLE IF EXISTS `ac_discussion_replies`;
CREATE TABLE `ac_discussion_replies`
( `id` int(128) NOT NULL,
`id_thread` int(128) NOT NULL,
`msg` text NOT NULL,
`author` varchar(255) NOT NULL,
`date` int(16) NOT NULL )
ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion Thread System';

ALTER TABLE `ac_discussion_replies` ADD `category` INT NOT NULL AFTER `msg`;
ALTER TABLE `ac_discussion_replies` ADD UNIQUE(`id`);
ALTER TABLE `ac_discussion_replies` CHANGE `id` `id` INT(128) NOT NULL AUTO_INCREMENT;
