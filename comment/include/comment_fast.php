<?php
/**
 * XOOPS comment fast
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @since           2.0.0
 * @author          Hossein Azizabadi (AKA voltan)
 * @version         $Id: $
 */

if (!defined('XOOPS_ROOT_PATH') || !is_object($xoopsModule)) {
    die('Restricted access');
} 

xoops_load('XoopsLists');
xoops_load('XoopsFormLoader');
xoops_loadLanguage('comment');

// set form
$cform = new XoopsThemeForm(_CM_POSTCOMMENT, "commentfastform", 'comment_post.php', 'post', true);
$cform->addElement(new XoopsFormElementTray(''));
if (isset($xoopsModuleConfig['com_rule'])) {
    include_once $GLOBALS['xoops']->path('include/comment_constants.php');
    switch ($xoopsModuleConfig['com_rule']) {
        case XOOPS_COMMENT_APPROVEALL:
            $rule_text = _CM_COMAPPROVEALL;
            break;
        case XOOPS_COMMENT_APPROVEUSER:
            $rule_text = _CM_COMAPPROVEUSER;
            break;
        case XOOPS_COMMENT_APPROVEADMIN:
        default:
            $rule_text = _CM_COMAPPROVEADMIN;
            break;
    }
    $cform->addElement(new XoopsFormLabel(_CM_COMRULES, $rule_text));
}
$cform->addElement(new XoopsFormText(_CM_TITLE, 'com_title', 50, 255, ''), true);
if (!$xoopsUser) {
	$cform->addElement(new XoopsFormText(_CM_USER, 'com_user', 50, 60, ''), true);
	$cform->addElement(new XoopsFormText(_CM_EMAIL, 'com_email', 50, 60, ''), true);	
}
$cform->addElement(new XoopsFormTextArea(_CM_MESSAGE, 'com_text', '', 10, 65), true);
if (!$xoopsUser) {
    $cform->addElement(new XoopsFormCaptcha());
}

$cform->addElement(new XoopsFormHidden('com_id', 0));
$cform->addElement(new XoopsFormHidden('com_pid', 0));
$cform->addElement(new XoopsFormHidden('com_rootid', 0));
$cform->addElement(new XoopsFormHidden('com_order', 0));
$cform->addElement(new XoopsFormHidden('com_itemid', $com_itemid));
$cform->addElement(new XoopsFormHidden('com_mode', $com_mode));
$cform->addElement(new xoopsFormHidden('dohtml', 0));
$cform->addElement(new xoopsFormHidden('dobr', 0));
$cform->addElement(new xoopsFormHidden('dosmiley', 0));
$cform->addElement(new xoopsFormHidden('doxcode', 0));

// add module specific extra params
if ('system' != $xoopsModule->getVar('dirname')) {
    $comment_config = $xoopsModule->getInfo('comments');
    if (isset($comment_config['extraParams']) && is_array($comment_config['extraParams'])) {
        $myts =& MyTextSanitizer::getInstance();
        foreach ($comment_config['extraParams'] as $extra_param) {
            // This routine is included from forms accessed via both GET and POST
            if (isset($_POST[$extra_param])) {
                $hidden_value = $myts->stripSlashesGPC($_POST[$extra_param]);
            } else if (isset($_GET[$extra_param])) {
                $hidden_value = $myts->stripSlashesGPC($_GET[$extra_param]);
            } else {
                $hidden_value = '';
            }
            $cform->addElement(new XoopsFormHidden($extra_param, $hidden_value));
        }
    }
}

$button_tray = new XoopsFormElementTray('', '&nbsp;');
$button_tray->addElement(new XoopsFormButton('', 'com_dopreview', _PREVIEW, 'submit'));
$button_tray->addElement(new XoopsFormButton('', 'com_dopost', _CM_POSTCOMMENT, 'submit'));
$cform->addElement($button_tray);
$cform->display();
?>