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
 * Oledrion index file
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

$com_itemid = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
if ($com_itemid > 0) {
	$product = null;
	$product = $h_oledrion_products->get($com_itemid);
	if(is_object($product)) {
    	$com_replytitle = $product->getVar('product_title');
    	require XOOPS_ROOT_PATH.'/include/comment_new.php';
	} else {
		exit();
	}
}
?>