/* New Table */
CREATE `xoopscomments` (
  `com_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `com_pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `com_rootid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `com_modid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `com_itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `com_icon` varchar(25) NOT NULL DEFAULT '',
  `com_created` int(10) unsigned NOT NULL DEFAULT '0',
  `com_modified` int(10) unsigned NOT NULL DEFAULT '0',
  `com_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `com_user` varchar(60) NOT NULL,
  `com_email` varchar(60) NOT NULL,
  `com_url` varchar(60) NOT NULL,
  `com_ip` varchar(15) NOT NULL DEFAULT '',
  `com_title` varchar(255) NOT NULL DEFAULT '',
  `com_text` text,
  `com_sig` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `com_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `com_exparams` varchar(255) NOT NULL DEFAULT '',
  `dohtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dosmiley` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `doxcode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `doimage` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dobr` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`com_id`),
  KEY `com_pid` (`com_pid`),
  KEY `com_itemid` (`com_itemid`),
  KEY `com_uid` (`com_uid`),
  KEY `com_title` (`com_title`(40)),
  KEY `com_status` (`com_status`),
  KEY `com_user` (`com_user`),
  KEY `com_email` (`com_email`)
) ENGINE=MyISAM; 

/* Update */
ALTER TABLE `xoopscomments` ADD `com_user` VARCHAR( 60 ) NOT NULL AFTER `com_uid`, ADD INDEX ( `com_user` );
ALTER TABLE `xoopscomments` ADD `com_email` VARCHAR( 60 ) NOT NULL AFTER `com_user`, ADD INDEX ( `com_email` );
ALTER TABLE `xoopscomments` ADD `com_url` VARCHAR( 60 ) NOT NULL AFTER `com_email`;