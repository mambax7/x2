<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * News action script file
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

/**
 * This function work just for update version 1.68 ( or 1.66 ) to version 1.8 and upper. 
 * If your version is under 1.68 ( or 1.66 ) please first update your old version to 1.68.
 */
function xoops_module_update_news($module, $version) {
    
    $db = $GLOBALS["xoopsDB"];
	 $error = false;
	    
	 include_once XOOPS_ROOT_PATH . '/modules/news/include/functions.php';
	 include_once XOOPS_ROOT_PATH . '/modules/news/class/perm.php';
	 include_once XOOPS_ROOT_PATH . '/modules/news/class/utils.php';
	 include_once XOOPS_ROOT_PATH . '/class/template.php';
	 include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';

    // start update to version 1.83
    if($version < 183) {
	    // story_link
	    if(NewsUtils::News_UtilityFieldExists('story_link', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_link', $db->prefix('news_story'));
	    }
	    // story_order
	    if(NewsUtils::News_UtilityFieldExists('story_order', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_order', $db->prefix('news_story'));
	    }
	    // story_groups
	    if(NewsUtils::News_UtilityFieldExists('story_groups', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_groups', $db->prefix('news_story'));
	    }
	    // story_next
	    if(NewsUtils::News_UtilityFieldExists('story_next', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_next', $db->prefix('news_story'));
	    }
	    // story_prev
	    if(NewsUtils::News_UtilityFieldExists('story_prev', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_prev', $db->prefix('news_story'));
	    }
	    // story_titleview
	    if(NewsUtils::News_UtilityFieldExists('story_titleview', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_titleview', $db->prefix('news_story'));
	    }
	    // story_modid
	    if(NewsUtils::News_UtilityFieldExists('story_modid', $db->prefix('news_story')))
	    {
		    NewsUtils::News_UtilityDropField('story_modid', $db->prefix('news_story'));
	    }
	    // topic sub
	    if(!NewsUtils::News_UtilityFieldExists('topic_showsub', $db->prefix('news_topic')))
	    {
		    $sql = 'ALTER TABLE `' . $db->prefix('news_topic') . '` ADD  `topic_showsub` tinyint(1) NOT NULL default "1"';
			 $db->query($sql);
	    }
    }
    // end update to version 1.83
    	
    // start update to version 1.80
	 if($version < 180) {
	 
	    $indexFile = XOOPS_ROOT_PATH . "/uploads/index.html";
	    $blankFile = XOOPS_ROOT_PATH . "/uploads/blank.gif";
	    
	    //Creation du fichier creator dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/index.html");
	    }
	
	    //Creation du fichier price dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news/image";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/image/index.html");
		    copy($blankFile, XOOPS_ROOT_PATH . "/uploads/news/image/blank.gif");
	    }
	    
	    //Creation du fichier price dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news/image/original";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/image/original/index.html");
		    copy($blankFile, XOOPS_ROOT_PATH . "/uploads/news/image/original/blank.gif");
	    }
	    
	    //Creation du fichier price dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news/image/medium";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/image/medium/index.html");
		    copy($blankFile, XOOPS_ROOT_PATH . "/uploads/news/image/medium/blank.gif");
	    }
	    
	    //Creation du fichier price dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news/image/thumb";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/image/thumb/index.html");
		    copy($blankFile, XOOPS_ROOT_PATH . "/uploads/news/image/thumb/blank.gif");
	    }
	    
	    //Creation du fichier price dans uploads
	    $module_uploads = XOOPS_ROOT_PATH . "/uploads/news/file";
	    if (!is_dir($module_uploads)) {
		    mkdir($module_uploads, 0777);
		    chmod($module_uploads, 0777);
		    copy($indexFile, XOOPS_ROOT_PATH . "/uploads/news/file/index.html");
		    copy($blankFile, XOOPS_ROOT_PATH . "/uploads/news/file/blank.gif");
	    }
	    
	    // Add news_story table
	    if(!NewsUtils::News_UtilityTableExists($db->prefix('news_story'))) {
		    $sql = "RENAME TABLE `" . $db->prefix('stories') . "` TO `" . $db->prefix('news_story') . "`";
		    if ($db->query($sql)) {
				 /* 
				  * Rename fields
				  */
				 // story_id
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `storyid` `story_id` INT( 8 ) UNSIGNED NOT NULL AUTO_INCREMENT';
				 $db->query($sql);
				 // story_uid
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `uid` `story_uid` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_title
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `title` `story_title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_create
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `created` `story_create` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_publish
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `published` `story_publish` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_expire
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `expired` `story_expire` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_short
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `hometext` `story_short` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_text
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `bodytext` `story_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_words
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `keywords` `story_words` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_desc
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `description` `story_desc` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_hits
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `counter` `story_hits` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_topic
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `topicid` `story_topic` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_img
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `picture` `story_img` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
				 $db->query($sql);
				 // story_comments
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `comments` `story_comments` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 // story_rating
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `rating` `story_rating` DOUBLE(6,4) NOT NULL';
				 $db->query($sql);
				 // story_votes
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` CHANGE `votes` `story_votes` INT( 10 ) UNSIGNED NOT NULL';
				 $db->query($sql);
				 /* 
				  * Add new fields 
				  */
				 // story_subtitle
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD `story_subtitle` varchar(255) NOT NULL';
				 $db->query($sql);
				 // story_type
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_type` varchar(25) NOT NULL';
				 $db->query($sql);
				 // story_alias
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_alias` varchar(255) NOT NULL';
				 $db->query($sql);
				 // story_important
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_important` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // story_default
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_default` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // story_status
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_status` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // story_slide
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_slide` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // story_marquee
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_marquee` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // story_update
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_update` int (10) NOT NULL';
				 $db->query($sql);
				 // story_author
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_author` varchar(255) NOT NULL';
				 $db->query($sql);
				 // story_source
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_source` varchar(255) NOT NULL';
				 $db->query($sql);
				 // story_file
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `story_file` tinyint(3) NOT NULL';
				 $db->query($sql);
				 // dohtml
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `dohtml` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // dobr
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `dobr` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // doimage
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `doimage` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // dosmiley
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `dosmiley` tinyint(1) NOT NULL';
				 $db->query($sql);
				 // doxcode
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD  `doxcode` tinyint(1) NOT NULL'; 
				 $db->query($sql);
				 /* 
				  * Remove old fields
				  */
				 // hostname
			    $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP `hostname`';
				 $db->query($sql);
			    // ihome
			    $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP `ihome`';
				 $db->query($sql);
			    // notifypub
			    $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP `notifypub`';
				 $db->query($sql);
			    // topicdisplay
			    $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP `topicdisplay`';
				 $db->query($sql);
			    // topicalign
			    $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP `topicalign`';
				 $db->query($sql);
				 /* 
				  * Remove index
				  */
				 // idxstoriestopic 
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `idxstoriestopic`'; 
				 $db->query($sql);
				 // ihome
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `ihome`'; 
				 $db->query($sql);
				 // uid
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `uid`'; 
				 $db->query($sql);
				 // published
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `published`'; 
				 $db->query($sql);
				 // title
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `title`'; 
				 $db->query($sql);
				 // created
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `created`'; 
				 $db->query($sql);
				 // search
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` DROP INDEX `search`'; 
				 $db->query($sql);
				 /* 
				  * Add index
				  */
             // story_alias				  
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD UNIQUE `story_alias` ( `story_alias` )';
				 $db->query($sql);
				 // story_topic
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_topic` ( `story_topic` )';
				 $db->query($sql);
				 // story_title
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_title` ( `story_title` )';
				 $db->query($sql);
				 // story_create
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_create` ( `story_create` )';
				 $db->query($sql);
				 // story_publish
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_publish` ( `story_publish` )';
				 $db->query($sql);
				 // story_expire
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_expire` ( `story_expire` )';
				 $db->query($sql);
				 // story_uid
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_uid` ( `story_uid` )';
				 $db->query($sql);
				 // story_type
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `story_type` ( `story_type` )';
				 $db->query($sql);
				 // select
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD INDEX `select` (`story_topic`, `story_status`, `story_publish`, `story_expire`)';
				 $db->query($sql);
				 // search
				 $sql = 'ALTER TABLE `' . $db->prefix('news_story') . '` ADD FULLTEXT `search` (`story_title` ,`story_short` ,`story_text` ,`story_subtitle`)';
			    $db->query($sql);
			 } else {
				 return false;
			 }	
	    }
       
       // Add news_topic table
       if(!NewsUtils::News_UtilityTableExists($db->prefix('news_topic'))) {
		    $sql = "RENAME TABLE `" . $db->prefix('topics') . "` TO `" . $db->prefix('news_topic') . "`";
		    if ($db->query($sql)) {
		    // TODO	
		    }
		 }
		 
		 // Add news_file table
       if(!NewsUtils::News_UtilityTableExists($db->prefix('news_file'))) {
		    $sql = "RENAME TABLE `" . $db->prefix('stories_files') . "` TO `" . $db->prefix('news_file') . "`";
		    if ($db->query($sql)) {
		    // TODO	
		    }
		 }
		 
		 // Add news_rate table
       if(!NewsUtils::News_UtilityTableExists($db->prefix('news_rate'))) {
		    $sql = "RENAME TABLE `" . $db->prefix('stories_votedata') . "` TO `" . $db->prefix('news_rate') . "`";
		    if ($db->query($sql)) {
			    /* 
				  * Rename fields
				  */
				 // rate_id
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `ratingid` `rate_id` int(10) unsigned NOT NULL auto_increment';
				 $db->query($sql);
				 // rate_story
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `storyid` `rate_story` int(8) unsigned NOT NULL';
				 $db->query($sql);
				 // rate_user
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `ratinguser` `rate_user` int(10) NOT NULL';
				 $db->query($sql);
				 // rate_rating
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `rating` `rate_rating` tinyint(3) unsigned NOT NULL';
				 $db->query($sql);
				 // rate_hostname
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `ratinghostname` `rate_hostname` varchar(60) NOT NULL default ""';
				 $db->query($sql);
				 // rate_created
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` CHANGE `ratingtimestamp` `rate_created` int(10) NOT NULL';
				 $db->query($sql);
				 /* 
				  * Remove index
				  */
				 // ratinguser
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` DROP INDEX `ratinguser`'; 
				 $db->query($sql);
				 // ratinghostname
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` DROP INDEX `ratinghostname`'; 
				 $db->query($sql);
				 // storyid
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` DROP INDEX `storyid`'; 
				 $db->query($sql);
				 /* 
				  * Add index
				  */
             // rate_user	  
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` ADD INDEX `rate_user` ( `rate_user` )';
				 $db->query($sql);
				 // rate_user	  
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` ADD INDEX `rate_hostname` ( `rate_hostname` )';
				 $db->query($sql);
				 // rate_user	  
				 $sql = 'ALTER TABLE `' . $db->prefix('news_rate') . '` ADD INDEX `rate_story` ( `rate_story` )';
				 $db->query($sql);
		    }
		 }   	
	}
	// end update to version 1.80	
}

?>