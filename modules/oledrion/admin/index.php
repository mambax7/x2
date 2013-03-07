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
 * oledrion
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hervé Thouzard (http://www.herve-thouzard.com/)
 * @version     $Id$
 */

require_once '../../../include/cp_header.php';
require_once '../include/common.php';
require_once 'admin_header.php';

require_once OLEDRION_PATH.'admin/functions.php';
require_once XOOPS_ROOT_PATH.'/class/tree.php';
require_once XOOPS_ROOT_PATH.'/class/uploader.php';
require_once XOOPS_ROOT_PATH.'/class/pagenav.php';
require_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
require_once OLEDRION_PATH.'class/tree.php';
require_once OLEDRION_ADMIN_PATH.'tablefunctions.php';

$op = 'dashboard';
if (isset($_POST['op'])) {
	$op = $_POST['op'];
} elseif ( isset($_GET['op'])) {
   	$op = $_GET['op'];
}

$action = 'default';
if (isset($_POST['action'])) {
	$action = $_POST['action'];
} elseif ( isset($_GET['action'])) {
   	$action = $_GET['action'];
}


// Lecture de certains param�tres de l'application ********************************************************************
$limit = oledrion_utils::getModuleOption('items_count');	// Nombre maximum d'�l�ments � afficher dans l'admin
$baseurl = OLEDRION_URL.'admin/'.basename(__FILE__);	// URL de ce script
$conf_msg = oledrion_utils::javascriptLinkConfirm(_AM_OLEDRION_CONF_DELITEM);
$oledrion_Currency = & oledrion_Currency::getInstance();
$manual_meta = oledrion_utils::getModuleOption('manual_meta');

oledrion_utils::loadLanguageFile('modinfo.php');
oledrion_utils::loadLanguageFile('main.php');

// V�rification de l'existance du r�pertoire de cache
oledrion_utils::prepareFolder(OLEDRION_UPLOAD_PATH);
oledrion_utils::prepareFolder(OLEDRION_ATTACHED_FILES_PATH);
oledrion_utils::prepareFolder(OLEDRION_PICTURES_PATH);
oledrion_utils::prepareFolder(OLEDRION_CSV_PATH);
if(!is_dir(OLEDRION_CACHE_PATH)) {
	oledrion_utils::prepareFolder(OLEDRION_CACHE_PATH);
}

// Est-ce que le r�pertoire du cache est ouvert en �criture ?
if(!is_writable(OLEDRION_CACHE_PATH)) {
	exit("Your cache folder, ".OLEDRION_CACHE_PATH." is not writable !");
}

// ********************************************************************************************************************
$destname = '';
define("OLEDRION_ADMIN", true);

// Mise � jour des structures de donn�es
require 'dbupdate.php';

$op = str_replace('..', '', $op);
$controler = OLEDRION_ADMIN_PATH.'actions/'.$op.'.php';
if(file_exists($controler)) {
	require $controler;
}


// ******************************************************************************************************************************************
// **** Main ********************************************************************************************************************************
// ******************************************************************************************************************************************
switch ($op) {

	// ****************************************************************************************************************
	case 'maintain':	// Maintenance des tables
	// ****************************************************************************************************************
    	xoops_cp_header();
    	
    	require '../xoops_version.php';
    	$tables = array();
		foreach ($modversion['tables'] as $table) {
			$tables[] = $xoopsDB->prefix($table);
		}
		if(count($tables) > 0) {
			$list = implode(',', $tables);
			$xoopsDB->queryF('CHECK TABLE '.$list);
			$xoopsDB->queryF('ANALYZE TABLE '.$list);
			$xoopsDB->queryF('OPTIMIZE TABLE '.$list);
		}
		oledrion_utils::updateCache();
		$h_oledrion_products->forceCacheClean();
		oledrion_utils::redirect(_AM_OLEDRION_SAVE_OK, $baseurl, 2);
    	break;
}
//xoops_cp_footer();
include_once 'admin_footer.php';
?>