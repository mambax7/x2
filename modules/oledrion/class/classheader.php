<?php
/**
 * ****************************************************************************
 * oledrion - MODULE FOR XOOPS
 * Copyright (c) Hervé Thouzard (http://www.herve-thouzard.com/)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Hervé Thouzard (http://www.herve-thouzard.com/)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         oledrion
 * @author 			Hervé Thouzard (http://www.herve-thouzard.com/)
 *
 * Version : $Id:
 * ****************************************************************************
 */
/**
 * Entête pour les classes d'ORM
 */
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

include_once XOOPS_ROOT_PATH.'/kernel/object.php';
if (!class_exists('Oledrion_XoopsPersistableObjectHandler')) {
	include_once XOOPS_ROOT_PATH.'/modules/oledrion/class/PersistableObjectHandler.php';
}
?>