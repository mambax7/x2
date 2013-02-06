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
 * @copyright       Hossein Azizabadi
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         oledrion
 * @author 			Hossein Azizabadi
 *
 * Version : $Id:
 * ****************************************************************************
 */

 /**
  * block to display ajax search
  */
function b_oledrion_ajax_search_show($options)
{
	 global $xoTheme;
	 
	 if($options[0] == 1) {
		 $xoTheme->addScript("browse.php?Frameworks/jquery/jquery.js");
		 $xoTheme->addScript(XOOPS_URL . '/modules/oledrion/js/autocomplete.js');
		 $xoTheme->addStylesheet(XOOPS_URL . '/modules/oledrion/css/autocomplete.css');
	 }

	 $block = array();
	 $block['custom'] = $options[0];
	 return $block;
}

function b_oledrion__ajax_search_edit($options)
{
	$form = '';
	$checkeds = array('','');
	$checkeds[$options[0]] = 'checked';
	$form .= "<table border='0'>";
	$form .= '<tr><td>'._MB_OLEDRION_USE_STYLE_JS."</td><td><input type='radio' name='options[]' id='options[]' value='0' ".$checkeds[0]." />"._NO." <input type='radio' name='options[]' id='options[]' value='1' ".$checkeds[1]." />"._YES.'</td></tr>';
	$form .= '</table>';
	return $form;
}
?>
	 
