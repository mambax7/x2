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
	    if(NewsUtils::News_FieldExists('story_link', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_link', $db->prefix('news_story'));
	    }
	    // story_order
	    if(NewsUtils::News_FieldExists('story_order', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_order', $db->prefix('news_story'));
	    }
	    // story_groups
	    if(NewsUtils::News_FieldExists('story_groups', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_groups', $db->prefix('news_story'));
	    }
	    // story_next
	    if(NewsUtils::News_FieldExists('story_next', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_next', $db->prefix('news_story'));
	    }
	    // story_prev
	    if(NewsUtils::News_FieldExists('story_prev', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_prev', $db->prefix('news_story'));
	    }
	    // story_titleview
	    if(NewsUtils::News_FieldExists('story_titleview', $db->prefix('news_story')))
	    {
		    NewsUtils::News_DropField('story_titleview', $db->prefix('news_story'));
	    }
    }
    // end update to version 1.80	
    	
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
	
		if(!NewsUtils::News_TableExists($db->prefix('news_story')))
		{
			$sql = "CREATE TABLE " . $db->prefix('news_story') . " (
				`story_id` int(10) NOT NULL auto_increment,
				`story_title` varchar(255) NOT NULL,
				`story_subtitle` varchar(255) NOT NULL,
				`story_topic` int(11) NOT NULL,
				`story_type` varchar(25) NOT NULL,
				`story_short` text NOT NULL,
				`story_text` text NOT NULL,
				`story_words` varchar(255) NOT NULL,
				`story_desc` varchar(255) NOT NULL,
				`story_alias` varchar(255) NOT NULL,
				`story_important` tinyint(1) NOT NULL,
				`story_default` tinyint(1) NOT NULL,
				`story_status` tinyint(1) NOT NULL,
				`story_slide` tinyint(1) NOT NULL,
				`story_marquee` tinyint(1) NOT NULL,
				`story_create` int (10) NOT NULL default '0',
				`story_update` int (10) NOT NULL default '0',
				`story_publish` int (10) NOT NULL default '0',
				`story_expire` int (10) NOT NULL default '0',
				`story_uid` int(11) NOT NULL,
				`story_author` varchar(255) NOT NULL,
				`story_source` varchar(255) NOT NULL,
				`story_modid` int(11) NOT NULL,
				`story_hits` int(11) NOT NULL,
				`story_img` varchar(255) NOT NULL,
				`story_comments` int(11) unsigned NOT NULL default '0',
				`story_file` tinyint(3) NOT NULL,
				`dohtml` tinyint(1) NOT NULL,
				`dobr` tinyint(1) NOT NULL,
				`doimage` tinyint(1) NOT NULL,
				`dosmiley` tinyint(1) NOT NULL,
				`doxcode` tinyint(1) NOT NULL,
				PRIMARY KEY (`story_id`),
				KEY `idxstoriestopic` (`story_topic`),
				KEY `story_title` (`story_title`),
				KEY `story_create` (`story_create`),
				FULLTEXT KEY `search` (`story_title`,`story_short`,`story_text`,`story_subtitle`)
				) ENGINE=MyISAM;";
			if (!$db->queryF($sql)) {
				return false;
			}
		}
		
		if(!NewsUtils::News_TableExists($db->prefix('news_topic')))
		{
			$sql = "CREATE TABLE " . $db->prefix('news_topic') . " (
				`topic_id` int (11) unsigned NOT NULL  auto_increment,
				`topic_pid` int (5) unsigned NOT NULL ,
				`topic_title` varchar (255)   NOT NULL ,
				`topic_desc` text   NOT NULL ,
				`topic_img` varchar (255)   NOT NULL ,
				`topic_weight` int (5)   NOT NULL ,
				`topic_showtype` tinyint (4)   NOT NULL ,
				`topic_perpage` tinyint (4)   NOT NULL ,
				`topic_columns` tinyint (4)   NOT NULL ,
				`topic_submitter` int (10)   NOT NULL default '0',
				`topic_date_created` int (10)   NOT NULL default '0',
				`topic_date_update` int (10)   NOT NULL default '0',
				`topic_asmenu` tinyint (1)   NOT NULL default '1',
				`topic_online` tinyint (1)   NOT NULL default '1',
				`topic_modid` int(11) NOT NULL,
				`topic_showtopic` tinyint (1)   NOT NULL default '0',
				`topic_showauthor` tinyint (1)   NOT NULL default '1',
				`topic_showdate` tinyint (1)   NOT NULL default '1',
				`topic_showpdf` tinyint (1)   NOT NULL default '1',
				`topic_showprint` tinyint (1)   NOT NULL default '1',
				`topic_showmail` tinyint (1)   NOT NULL default '1',
				`topic_shownav` tinyint (1)   NOT NULL default '1',
				`topic_showhits` tinyint (1)   NOT NULL default '1',
				`topic_showcoms` tinyint (1)   NOT NULL default '1',
				`topic_alias` varchar(255) NOT NULL,
				`topic_homepage` tinyint (4)   NOT NULL ,
				`topic_show` tinyint (1)   NOT NULL default '1',
				`topic_style` varchar(64)   NOT NULL,
				PRIMARY KEY (`topic_id`,`topic_modid`),
				UNIQUE KEY `file_id` (`topic_id`,`topic_modid`)
				) ENGINE=MyISAM;";
			if (!$db->queryF($sql)) {
				return false;
			}
		}
		
		if(!NewsUtils::News_TableExists($db->prefix('news_file')))
		{
			$sql = "CREATE TABLE " . $db->prefix('news_file') . " (
				`file_id` int (11) unsigned NOT NULL  auto_increment,
				`file_modid` int(11) NOT NULL,
				`file_title` varchar (255)   NOT NULL ,
				`file_name` varchar (255)   NOT NULL ,
				`file_content` int(11) NOT NULL,
				`file_date` int(10) NOT NULL default '0',
				`file_type` varchar(64) NOT NULL default '',
				`file_status` tinyint(1) NOT NULL,
				`file_hits` int(11) NOT NULL,
				PRIMARY KEY (`file_id`,`file_modid`),
				UNIQUE KEY `file_id` (`file_id`,`file_modid`)
				) ENGINE=MyISAM;";
			if (!$db->queryF($sql)) {
				return false;
			}
		}
		
		if(!NewsUtils::News_TableExists($db->prefix('news_rate')))
		{
			$sql = "CREATE TABLE " . $db->prefix('news_rate') . " (
				`rate_id` int(11) unsigned NOT NULL auto_increment,
				`rate_modid` int(11) NOT NULL,
				`rate_story` int(8) unsigned NOT NULL default '0',
				`rate_user` int(11) NOT NULL default '0',
				`rate_rating` tinyint(3) unsigned NOT NULL default '0',
				`rate_hostname` varchar(60) NOT NULL default '',
				`rate_created` int(10) NOT NULL default '0',
				PRIMARY KEY  (rate_id),
				KEY rate_user (rate_user),
				KEY rate_hostname (rate_hostname),
				KEY rate_story (rate_story)
				) ENGINE=MyISAM;";
			if (!$db->queryF($sql)) {
				return false;
			}
		}	
	}
	// end update to version 1.80	
}

?>