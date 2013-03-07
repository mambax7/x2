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

class oledrion_delivery extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('delivery_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('delivery_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('delivery_description',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('delivery_online',XOBJ_DTYPE_INT,null,false);
		$this->initVar('delivery_image',XOBJ_DTYPE_TXTBOX,null,false);
		
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}	

	/**
	 * Retourne l'URL de l'image de la catégorie courante
	 * @return string	L'URL
	 */
	function getPictureUrl()
	{
		return OLEDRION_PICTURES_URL.'/'.$this->getVar('delivery_image');
	}
	
	/**
	 * Indique si l'image de la catégorie existe
	 *
	 * @return boolean	Vrai si l'image existe sinon faux
	 */
	function pictureExists()
	{
		$return = false;
		if(xoops_trim($this->getVar('delivery_image')) != '' && file_exists(OLEDRION_PICTURES_PATH.DIRECTORY_SEPARATOR.$this->getVar('delivery_image'))) {
			$return = true;
		}
		return $return;
	}
	
	/**
	 * Supprime l'image associée à une catégorie
	 * @return void
	 */
	function deletePicture()
	{
		if($this->pictureExists()) {
			@unlink(OLEDRION_PICTURES_PATH.DIRECTORY_SEPARATOR.$this->getVar('delivery_image'));
		}
		$this->setVar('delivery_image', '');
	}
	
	/**
	 * Retourne les éléments du produits formatés pour affichage
	 *
	 * @param string $format
	 * @return array
	 */
	function toArray($format = 's')
    {
		$ret = array();
		$ret = parent::toArray($format);
		return $ret;
    }
}


class OledrionOledrion_deliveryHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							            Table					Classe				Id
		parent::__construct($db, 'oledrion_delivery', 'oledrion_delivery', 'delivery_id');
	}	
	
	function getAllDelivery(oledrion_parameters $parameters)
	{
		$parameters = $parameters->extend(new oledrion_parameters(array('start' => 0, 'limit' => 0, 'sort' => 'delivery_id', 'order' => 'ASC')));
		$critere = new Criteria('delivery_id', 0 ,'<>');
		$critere->setLimit($parameters['limit']);
		$critere->setStart($parameters['start']);
		$critere->setSort($parameters['sort']);
		$critere->setOrder($parameters['order']);
		$categories = array();
		$categories = $this->getObjects($critere);
		return $categories;
	}
}
?>