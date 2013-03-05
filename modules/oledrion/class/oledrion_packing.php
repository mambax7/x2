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

class oledrion_packing extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('packing_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('packing_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('packing_width',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('packing_length',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('packing_weight',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('packing_image',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('packing_description',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('packing_price',XOBJ_DTYPE_INT,null,false);
		$this->initVar('packing_online',XOBJ_DTYPE_INT,null,false);
	}	
}


class OledrionOledrion_packingHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'oledrion_packing', 'oledrion_packing', 'packing_id');
	}	
}
?>