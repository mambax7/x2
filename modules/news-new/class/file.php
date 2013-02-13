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
 * News page class
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */ 

class news_file extends XoopsObject {
		
	public $db;
	public $table;
	
	/**
	 * Class constructor
	 */
	public function news_file() {
		$this->initVar ( "file_id", XOBJ_DTYPE_INT, '' );
		$this->initVar ( "file_title", XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( "file_name", XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( "file_story", XOBJ_DTYPE_INT, '' );
		$this->initVar ( "file_date", XOBJ_DTYPE_INT, '' );
		$this->initVar ( "file_type", XOBJ_DTYPE_TXTBOX, '' );
		$this->initVar ( "file_status", XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'file_hits', XOBJ_DTYPE_INT, '' );

		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'news_file' );
	}
	
	/**
	 * File form
	 */
	public function getForm() {
		$form = new XoopsThemeForm ( _NEWS_AM_FILE_FORM, 'file', 'backend.php', 'post' );
		$form->setExtra ( 'enctype="multipart/form-data"' );
		
		if ($this->isNew ()) {
			$form->addElement ( new XoopsFormHidden ( 'op', 'add_file' ) );
		} else {
			$form->addElement ( new XoopsFormHidden ( 'op', 'edit_file' ) );
			$form->addElement ( new XoopsFormHidden ( 'file_previous', $this->getVar ( "file_story" ) ) );
		}
		$form->addElement ( new XoopsFormHidden ( 'file_id', $this->getVar ( 'file_id', 'e' ) ) );
		$form->addElement ( new XoopsFormText ( _NEWS_AM_FILE_TITLE, "file_title", 50, 255, $this->getVar ( "file_title" ) ), true );
		
		$story_Handler = xoops_getModuleHandler ( "story", "news" );
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'story_status', '1' ) );
		$story = $story_Handler->getObjects ( $criteria );
		
		$select_content = new XoopsFormSelect(_NEWS_AM_FILE_CONTENT, 'file_story', $this->getVar("file_story"));
      foreach (array_keys($story) as $i) {
          $select_content->addOption($story[$i]->getVar("story_id"), $story[$i]->getVar("story_title"));
      }  
      $form->addElement ( $select_content ); 

		$form->addElement ( new XoopsFormRadioYN ( _NEWS_AM_FILE_STATUS, 'file_status', $this->getVar ( 'file_status', 'e' ) ) );
		
		if ($this->isNew ()) {
		$uploadirectory_file = xoops_getModuleOption ( 'file_dir', 'news' );
		$fileseltray_file = new XoopsFormElementTray ( _NEWS_AM_FILE, '<br />' );
		$fileseltray_file->addElement ( new XoopsFormFile ( _NEWS_AM_FILE_SELECT, 'file_name', xoops_getModuleOption ( 'file_size', 'news' ) ), false );
		$form->addElement ( $fileseltray_file );
		}
		// Submit buttons
		$button_tray = new XoopsFormElementTray ( '', '' );
		$submit_btn = new XoopsFormButton ( '', 'post', _SUBMIT, 'submit' );
		$button_tray->addElement ( $submit_btn );
		$cancel_btn = new XoopsFormButton ( '', 'cancel', _CANCEL, 'cancel' );
		$cancel_btn->setExtra ( 'onclick="javascript:history.go(-1);"' );
		$button_tray->addElement ( $cancel_btn );
		$form->addElement ( $button_tray );
		$form->display ();
		
		return $form;
	}		
	
	/**
	 * Returns an array representation of the object
	 *
	 * @return array
	 **/
	public function toArray() {
		$ret = array ();
		$vars = $this->getVars ();
		foreach ( array_keys ( $vars ) as $i ) {
			$ret [$i] = $this->getVar ( $i );
		}
		return $ret;
	}
	
}

class NewsFileHandler extends XoopsPersistableObjectHandler {
	
	public function NewsFileHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'news_file', 'news_file', 'file_id', 'file_title' );
	}

   /**
	 * Get file list in admin side
	 */
	public function News_GetAdminFiles($file , $story) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		if(isset($file['content'])) {
			$criteria->add ( new Criteria ( 'file_story', $file['content'] ) );
			$criteria->add ( new Criteria ( 'file_status', 1 ) );
		}	
		$criteria->setSort ( $file['sort'] );
		$criteria->setOrder ( $file['order'] );
		if(isset($file['limit'])) {
		$criteria->setLimit ( $file['limit'] );
		}
		$criteria->setStart ( $file['start'] );
		$files = $this->getObjects ( $criteria, false );
		if ($files) {
			foreach ( $files as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				if(is_array($story)) {
					foreach ( array_keys ( $story ) as $i ) {
						$list [$i] ['file_title'] = $story [$i]->getVar ( "story_title" );
						$list [$i] ['file_id'] = $story [$i]->getVar ( "story_id" );
					}
					if ($root->getVar ( 'file_story' )) {
						$tab ['content'] = $list [$root->getVar ( 'file_story' )] ['file_title'];
						$tab ['contentid'] = $list [$root->getVar ( 'file_story' )] ['file_id'];
					}
				} else {
					$tab ['content'] = $story->getVar ( "story_title" );
					$tab ['contentid'] = $story->getVar ( "story_id" );
				}	
				$tab ['fileurl'] = XOOPS_URL . xoops_getModuleOption ( 'file_dir', 'news' ) . $root->getVar ( 'file_name' );
				$ret [] = $tab;
			}
		}
		return $ret;
	}
	
	/**
	 * Get file list for each content
	 */
	public function News_GetFiles( $file) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'file_story', $file['content'] ) );
		$criteria->add ( new Criteria ( 'file_status', 1 ) );
		$criteria->setSort ( $file['sort'] );
		$criteria->setOrder ( $file['order'] );
		$criteria->setStart ( $file['start'] );
		$files = $this->getObjects ( $criteria, false );
		if ($files) {
			foreach ( $files as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['fileurl'] = XOOPS_URL . xoops_getModuleOption ( 'file_dir', 'news' ) . '/' . $root->getVar ( 'file_name' );
				$ret [] = $tab;
			}
		}
		return $ret;
	}
		
	/**
	 * Get file Count
	 */	
	public function News_GetFileCount () {
		$criteria = new CriteriaCompo ();
		return $this->getCount ( $criteria );
	}	
}
?>