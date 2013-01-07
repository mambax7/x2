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
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */
 
$photoId = isset($_GET['photoId']) ? intval($_GET['photoId']) : 0;
if ($photoId > 0) {
	$photoHandler = xoops_getmodulehandler('publicphoto', 'extgallery');
	$photo = $photoHandler->getPhoto($photoId);
		if($photo->getVar('photo_title')){
			$title = $photo->getVar('photo_title');
		} else {
			$title = $photo->getVar('photo_desc');
		}
	$com_replytitle = $title;
}
?>