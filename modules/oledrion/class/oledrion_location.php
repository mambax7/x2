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
 * @author      Hossein Azizabadi (azizabadi@faragostaresh.com)
 * @version     $Id$
 */

require 'classheader.php';

class oledrion_location extends Oledrion_Object
{
	function __construct()
	{
		
	}	
}


class OledrionOledrion_locationHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							            Table					Classe				Id
		parent::__construct($db, 'oledrion_location', 'oledrion_location', 'location_id');
	}	
}
?>