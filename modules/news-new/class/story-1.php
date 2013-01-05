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
 * News story class
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

class news_story extends XoopsObject {
	
	public $mod;
	public $db;
	public $table;
	
	/**
	 * Class constructor
	 */
	function news_story() {
		$this->initVar ( 'story_id', XOBJ_DTYPE_INT );
		$this->initVar ( 'story_title', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_subtitle', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_topic', XOBJ_DTYPE_INT );
		$this->initVar ( 'story_type', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_short', XOBJ_DTYPE_TXTAREA, '' );
		$this->initVar ( 'story_text', XOBJ_DTYPE_TXTAREA, '' );
		$this->initVar ( 'story_words', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_desc', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_alias', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_status', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'story_slide', XOBJ_DTYPE_INT, 0 );
      $this->initVar ( 'story_marquee', XOBJ_DTYPE_INT, 0 );		
		$this->initVar ( 'story_important', XOBJ_DTYPE_INT, 0 );
		$this->initVar ( 'story_default', XOBJ_DTYPE_INT, 0 );
		$this->initVar ( 'story_create', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_update', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_publish', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_expire', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_uid', XOBJ_DTYPE_INT, 0 );
		$this->initVar ( 'story_author', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_source', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_modid', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_hits', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_img', XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( 'story_comments', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'story_file', XOBJ_DTYPE_INT, '' );
		$this->initVar ( 'dohtml', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'doxcode', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'dosmiley', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'doimage', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'dobr', XOBJ_DTYPE_INT, 0 );
		
		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'news_story' );
	}


}

/**
 * Content handler class
 *
 **/
class NewsStoryHandler extends XoopsPersistableObjectHandler {
	
	function NewsStoryHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'news_story', 'news_story', 'story_id', 'story_alias' );
	}
	

}

?> 