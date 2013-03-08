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
        $this->initVar('packing_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('packing_title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('packing_width', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('packing_length', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('packing_weight', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('packing_image', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('packing_description', XOBJ_DTYPE_TXTAREA, null, false);
        $this->initVar('packing_price', XOBJ_DTYPE_INT, null, false);
        $this->initVar('packing_online', XOBJ_DTYPE_INT, null, false);
    }

    /**
     * Retourne l'URL de l'image de la catégorie courante
     * @return string    L'URL
     */
    function getPictureUrl()
    {
        return OLEDRION_PICTURES_URL . '/' . $this->getVar('packing_image');
    }

    /**
     * Indique si l'image de la catégorie existe
     *
     * @return boolean    Vrai si l'image existe sinon faux
     */
    function pictureExists()
    {
        $return = false;
        if (xoops_trim($this->getVar('packing_image')) != '' && file_exists(OLEDRION_PICTURES_PATH . DIRECTORY_SEPARATOR . $this->getVar('packing_image'))) {
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
        if ($this->pictureExists()) {
            @unlink(OLEDRION_PICTURES_PATH . DIRECTORY_SEPARATOR . $this->getVar('packing_image'));
        }
        $this->setVar('packing_image', '');
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


class OledrionOledrion_packingHandler extends Oledrion_XoopsPersistableObjectHandler
{
    function __construct($db)
    { //							           Table					Classe				Id
        parent::__construct($db, 'oledrion_packing', 'oledrion_packing', 'packing_id');
    }

    function getAllPacking(oledrion_parameters $parameters)
    {
        $parameters = $parameters->extend(new oledrion_parameters(array('start' => 0, 'limit' => 0, 'sort' => 'packing_id', 'order' => 'ASC')));
        $critere = new Criteria('packing_id', 0, '<>');
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