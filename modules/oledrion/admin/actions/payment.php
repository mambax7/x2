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
 
/**
 * Check is admin
 */
if(!defined("OLEDRION_ADMIN")) exit();

switch($action) {
	case 'default':
	xoops_cp_header();
        
   include_once OLEDRION_ADMIN_PATH . 'admin_footer.php';
   break;
   
   case 'add':
   case 'edit':
	xoops_cp_header();
        
   include_once OLEDRION_ADMIN_PATH . 'admin_footer.php';
   break;
   
   case 'save':
	xoops_cp_header();
        
   include_once OLEDRION_ADMIN_PATH . 'admin_footer.php';
   break;
   
   case 'delete':
	xoops_cp_header();
        
   include_once OLEDRION_ADMIN_PATH . 'admin_footer.php';
   break;
}	 
?>