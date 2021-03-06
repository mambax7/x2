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
 * News Admin page
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Andricq Nicolas (AKA MusS)
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

require dirname(__FILE__) . '/header.php';
if (!isset($NewsModule)) exit('Module not found');

// Display Admin header
xoops_cp_header();

// Check admin have access to this page
$group = $xoopsUser->getGroups ();
$groups = xoops_getModuleOption ( 'admin_groups', $NewsModule->getVar ( 'dirname' ) );
if (count ( array_intersect ( $group, $groups ) ) <= 0) {
	redirect_header ( 'index.php', 3, _NOPERM );
}

// Define default value
$op = NewsUtils::News_CleanVars($_REQUEST, 'op', 'display', 'string');
// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $NewsModule->getVar('dirname') . '/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
// Initialize content handler
$topic_handler = xoops_getmodulehandler('topic', 'news');
$story_handler = xoops_getmodulehandler('story', 'news');
        
switch ($op) {

    case 'display':
    default:
        
        // Add clone
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_FORMFOLDER_TITLE, 'tools', 'tools.php', 'post');
        $form->addElement(new XoopsFormText(_NEWS_AM_TOOLS_FORMFOLDER_NAME, 'folder_name', 50, 255, ''), true);
        $form->addElement(new XoopsFormHidden('op', 'clone'));
        $button_tray = new XoopsFormElementTray('', '');
        $submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
        $button_tray->addElement($submit_btn);
        $form->addElement($button_tray);
        $xoopsTpl->assign('folder', $form->render());
        
        // remove contents form 
        $module_handler = xoops_gethandler('module');
        $result = $GLOBALS["xoopsDB"]->query("SELECT DISTINCT(story_modid) FROM " . $GLOBALS["xoopsDB"]->prefix('news_story'));
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_FORMPURGE_TITLE, 'tools', 'tools.php', 'post');
        $form->addElement(new XoopsFormHidden('op', 'purge'));
        $clone = array();
        while ($myrow = $GLOBALS["xoopsDB"]->fetchArray($result)) {
            if ($myrow['story_modid'] != $NewsModule->getVar('mid')) {
                if (!$module_handler->get($myrow['story_modid'])) {
                    $clone[] = $myrow['story_modid'];
                    $form->addElement(new XoopsFormHidden('modid[]', $myrow['story_modid']));
                }
            }
        }
        $button_tray = new XoopsFormElementTray('', '');
        $submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
        $button_tray->addElement($submit_btn);
        $form->addElement($button_tray);
        if (count($clone)) {
            $xoopsTpl->assign('purge', $form->render());
        }
        
        // rebuild alias
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_ALIAS_CONTENT, 'tools', 'tools.php', 'post');  
        $form->addElement(new XoopsFormRadioYN ( _NEWS_AM_TOOLS_ALIAS_CONTENT, 'content', "1" ));
        $form->addElement(new XoopsFormHidden('op', 'alias'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('alias', $form->render());
        
        // rebuild topic alias
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_ALIAS_TOPIC, 'tools', 'tools.php', 'post');  
        $form->addElement(new XoopsFormRadioYN ( _NEWS_AM_TOOLS_ALIAS_TOPIC, 'topic', "1" ));
        $form->addElement(new XoopsFormHidden('op', 'topicalias'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('topicalias', $form->render());
        
        // rebuild description
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_META_DESCRIPTION, 'tools', 'tools.php', 'post');  
        $form->addElement(new XoopsFormRadioYN ( _NEWS_AM_TOOLS_META_DESCRIPTION, 'description', "1" ));
        $form->addElement(new XoopsFormHidden('op', 'description'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('description', $form->render());
        
        // rebuild keyword
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_META_KEYWORD, 'tools', 'tools.php', 'post');  
        $form->addElement(new XoopsFormRadioYN ( _NEWS_AM_TOOLS_META_KEYWORD, 'keyword', "1" ));
        $form->addElement(new XoopsFormHidden('op', 'keyword'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('keyword', $form->render());
        
        // prune manager
        $form = new XoopsThemeForm(_NEWS_AM_TOOLS_PRUNE, 'tools', 'tools.php', 'post'); 
        $form->addElement(new XoopsFormTextDateSelect(_NEWS_AM_TOOLS_PRUNE_BEFORE, 'prune_date', 15,  time()));
	     $onlyexpired=new xoopsFormCheckBox('', 'onlyexpired');
	     $onlyexpired->addOption(1, _NEWS_AM_TOOLS_PRUNE_EXPIREDONLY);
	     $form->addElement($onlyexpired, false);
	     $form->addElement(new XoopsFormHidden('op', 'confirmbeforetoprune'), false);
	     $form->addElement(new XoopsFormHidden('op', 'confirmbeforetoprune'), false);
        $topiclist = new XoopsFormSelect(_NEWS_AM_TOOLS_PRUNE_TOPICS, 'pruned_topics','',5,true);
	     $criteria = new CriteriaCompo ();
	     $criteria->add ( new Criteria ( 'topic_modid', $NewsModule->getVar ( 'mid' ) ) );
	     $criteria->setSort ( 'topic_id' );
		  $criteria->setOrder ( 'DESC' );
	     $allTopics = $topic_handler->getObjects ( $criteria );
	     $topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
	     $topics_arr = $topic_tree->getAllChild(0);
	     foreach ($topics_arr as $onetopic) {
			  $topiclist->addOption($onetopic->getVar ( 'topic_id' ),$onetopic->getVar ( 'topic_title', 'e' ));
	     }
	     $topiclist->setDescription(_NEWS_AM_TOOLS_PRUNE_EXPORT_DSC);
	     $form->addElement($topiclist,false);
		  $form->addElement(new XoopsFormHidden('op', 'prune'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));	
        $xoopsTpl->assign('prune', $form->render());
        
        // other options  
        $xoopsTpl->assign('header', true );
        break;

    case 'clone':
        $folder = NewsUtils::News_CleanVars($_REQUEST, 'folder_name', '', 'string');
        if (!is_dir(XOOPS_ROOT_PATH . '/modules/' . $folder)) {
            $folder_handler = new FolderHandler(XOOPS_ROOT_PATH . '/modules/' . $folder);
            $optn = array('to' => XOOPS_ROOT_PATH . '/modules/' . $folder, 'from' => XOOPS_ROOT_PATH . '/modules/news');
            $folder_handler->copy($optn);
            if (is_array($folder_handler->messages)) {
                $xoopsTpl->assign('messages', $folder_handler->messages);
            } else {
                $xoopsTpl->assign('messages', $folder_handler->erros);
            }
        } else {
            NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_CLONE_ERROR);
        }
        break;

    case 'purge':
        $modid = $_REQUEST['modid'];
        foreach ($modid as $id) {
            $story_handler->deleteAll(new Criteria('story_modid', $id));
            $topic_handler->deleteAll(new Criteria('topic_modid', $id));
        }
        NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_WAIT);
        break;
      
    case 'alias':
        $start_id = NewsUtils::News_CleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id = NewsUtils::News_CleanVars($_REQUEST, 'end_id', '1', 'int');	
        NewsUtils::News_Rebuild ($story_handler , 'story_id' , 'alias' , 'story_alias' , 'story_title' , $start_id , $end_id);	   
        NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_WAIT);
	     break;
	         
    case 'topicalias': 
        $start_id = NewsUtils::News_CleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id = NewsUtils::News_CleanVars($_REQUEST, 'end_id', '1', 'int');	
        NewsUtils::News_Rebuild ($topic_handler , 'topic_id' , 'topicalias' , 'topic_alias' , 'topic_title' , $start_id , $end_id);	   
        NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_WAIT);
	     break; 
    
    case 'keyword':
        $start_id = NewsUtils::News_CleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id = NewsUtils::News_CleanVars($_REQUEST, 'end_id', '1', 'int');	
        NewsUtils::News_Rebuild ($story_handler , 'story_id' , 'keyword' , 'story_words' , 'story_title' , $start_id , $end_id);  
        NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_WAIT);
	     break; 
       
    case 'description':
        $start_id = NewsUtils::News_CleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id = NewsUtils::News_CleanVars($_REQUEST, 'end_id', '1', 'int');	
        NewsUtils::News_Rebuild ($story_handler , 'story_id' , 'description' , 'story_desc' , 'story_title' , $start_id , $end_id); 
        NewsUtils::News_Redirect('tools.php', 1, _NEWS_AM_MSG_WAIT);
	     break; 
	     
	 case 'prune':
	     $timestamp = NewsUtils::News_CleanVars ( $_REQUEST, 'prune_date', '', 'int' );
	     $expired = NewsUtils::News_CleanVars ( $_REQUEST, 'onlyexpired', 0, 'int' );
		  $timestamp = strtotime($_REQUEST ['prune_date']);
		  $topiclist = '';
		  if(isset($_REQUEST['pruned_topics'])) {
			  $topiclist = implode ( ',', $_REQUEST['pruned_topics'] );
		  }
		  $count = $story_handler->News_PruneCount($NewsModule,$timestamp,$expired,$topiclist);
        $story_handler->News_DeleteBeforeDate($NewsModule,$timestamp,$expired,$topiclist);
	     NewsUtils::News_Redirect('tools.php', 100, sprintf(_NEWS_AM_MSG_PRUNE_DELETED,$count));
		  break;    
}

$xoopsTpl->assign('navigation', 'tools');
$xoopsTpl->assign('navtitle', _NEWS_MI_TOOLS);

// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/' . $NewsModule->getVar('dirname') . '/templates/admin/news_tools.html');

// Display Xoops footer
include "footer.php";
xoops_cp_footer();

?>