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
 * News index file
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Andricq Nicolas (AKA MusS)
 * @version     $Id$
 */

require dirname(__FILE__) . '/header.php';
if (!isset($NewsModule)) exit('Module not found'); 

error_reporting(0);
$GLOBALS['xoopsLogger']->activated = false;

// Initialize content handler
$story_handler = xoops_getmodulehandler ( 'story', 'news' );
$topic_handler = xoops_getmodulehandler ( 'topic', 'news' );
$file_handler = xoops_getmodulehandler('file', 'news');

// Set option
$op = NewsUtils::News_CleanVars ( $_REQUEST, 'op', '', 'string' );

if(!empty($op)) {
	switch($op) {
		// Get last story as json
		case 'story':
		   $story_infos =  array();
		   $story_infos['story_id'] = NewsUtils::News_CleanVars ( $_REQUEST, 'storyid', 0, 'int' );
		   $story_infos['story_topic'] = NewsUtils::News_CleanVars ( $_REQUEST, 'storytopic', 0, 'int' );
		   $story_infos['story_limit'] = NewsUtils::News_CleanVars ( $_REQUEST, 'limit', 50, 'int' );
		   $return = $story_handler->News_Json($NewsModule, $story_infos);
			break;
	}
	echo $return;	
}
?>