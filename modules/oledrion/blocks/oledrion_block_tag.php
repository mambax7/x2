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

function oledrion_tag_block_cloud_show($options)
{
	require_once XOOPS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_cloud_show($options, 'oledrion');
}
function oledrion_tag_block_cloud_edit($options)
{
	require_once XOOPS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_cloud_edit($options);
}
function oledrion_tag_block_top_show($options)
{
	require_once XOOPS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_top_show($options, 'oledrion');
}
function oledrion_tag_block_top_edit($options)
{
	require_once XOOPS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_top_edit($options);
}

?>