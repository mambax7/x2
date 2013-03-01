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
 * Gestion des textes affichés sur certaines pages pour les utilisateurs
 */
if(!defined("OLEDRION_ADMIN")) exit();

$configHandler =& xoops_gethandler('config');
$moduleIdCriteria = new Criteria('conf_modid',$xoopsModule->getVar('mid'));

switch($action) {

	case 'default':	

        xoops_cp_header();
        
        $sform = new XoopsThemeForm(_MI_OLEDRION_ADMENU17, 'property', $baseurl);
		  $sform->addElement(new XoopsFormHidden('op', 'property'));
		  $sform->addElement(new XoopsFormHidden('action', 'fromproperty'));
		  
		  $property1 = new XoopsFormElementTray ( _AM_OLEDRION_PRODUCT_PROPERTY1, '<br />' );
		  $property1->addElement(new XoopsFormText( _AM_OLEDRION_PRODUCT_PROPERTY_TITLE, 'product_property1_title', 50, 255, oledrion_utils::getModuleOption('product_property1_title') ));
		  $property1->addElement(new XoopsFormTextArea ( '', 'product_property1', oledrion_utils::getModuleOption('product_property1'), 5, 90 ));
        $property1->setDescription ( _AM_OLEDRION_PRODUCT_PROPERTY_DESC );
        $sform->addElement ( $property1 );
		  
		  $property2 = new XoopsFormElementTray ( _AM_OLEDRION_PRODUCT_PROPERTY2, '<br />' );
		  $property2->addElement(new XoopsFormText( _AM_OLEDRION_PRODUCT_PROPERTY_TITLE, 'product_property2_title', 50, 255, oledrion_utils::getModuleOption('product_property2_title') ));
		  $property2->addElement(new XoopsFormTextArea ( '', 'product_property2', oledrion_utils::getModuleOption('product_property2'), 5, 90 ));
        $property2->setDescription ( _AM_OLEDRION_PRODUCT_PROPERTY_DESC );
        $sform->addElement ( $property2 );

		  $property3 = new XoopsFormElementTray ( _AM_OLEDRION_PRODUCT_PROPERTY3, '<br />' );
		  $property3->addElement(new XoopsFormText( _AM_OLEDRION_PRODUCT_PROPERTY_TITLE, 'product_property3_title', 50, 255, oledrion_utils::getModuleOption('product_property3_title') ));
		  $property3->addElement(new XoopsFormTextArea ( '', 'product_property3', oledrion_utils::getModuleOption('product_property3'), 5, 90 ));
        $property3->setDescription ( _AM_OLEDRION_PRODUCT_PROPERTY_DESC );
        $sform->addElement ( $property3 );
		  
		  $property4 = new XoopsFormElementTray ( _AM_OLEDRION_PRODUCT_PROPERTY4, '<br />' );
		  $property4->addElement(new XoopsFormText( _AM_OLEDRION_PRODUCT_PROPERTY_TITLE, 'product_property4_title', 50, 255, oledrion_utils::getModuleOption('product_property4_title') ));
		  $property4->addElement(new XoopsFormTextArea ( '', 'product_property4', oledrion_utils::getModuleOption('product_property4'), 5, 90 ));
        $property4->setDescription ( _AM_OLEDRION_PRODUCT_PROPERTY_DESC );
        $sform->addElement ( $property4 );
        
        $property5 = new XoopsFormElementTray ( _AM_OLEDRION_PRODUCT_PROPERTY5, '<br />' );
		  $property5->addElement(new XoopsFormText( _AM_OLEDRION_PRODUCT_PROPERTY_TITLE, 'product_property5_title', 50, 255, oledrion_utils::getModuleOption('product_property5_title') ));
		  $property5->addElement(new XoopsFormTextArea ( '', 'product_property5', oledrion_utils::getModuleOption('product_property5'), 5, 90 ));
        $property5->setDescription ( _AM_OLEDRION_PRODUCT_PROPERTY_DESC );
        $sform->addElement ( $property5 );
        
        $button_tray = new XoopsFormElementTray('' ,'');
		  $submit_btn = new XoopsFormButton('', 'post', _AM_OLEDRION_MODIFY, 'submit');
		  $button_tray->addElement($submit_btn);
		  $sform->addElement($button_tray);
		  $sform = oledrion_utils::formMarkRequiredFields($sform);
		  $sform->display(); 
		  
        include_once OLEDRION_ADMIN_PATH . 'admin_footer.php';

		break;
		
	case 'fromproperty':

		if(isset($_POST['product_property1'])) {
			   if(oledrion_utils::getModuleOption('product_property1') != $_POST['product_property1']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property1'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property1',
			          'conf_value'=>$_POST['product_property1'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property1_title'])) {
			   if(oledrion_utils::getModuleOption('product_property1_title') != $_POST['product_property1_title']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property1_title'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property1_title',
			          'conf_value'=>$_POST['product_property1_title'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property2'])) {
			   if(oledrion_utils::getModuleOption('product_property2') != $_POST['product_property2']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property2'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property2',
			          'conf_value'=>$_POST['product_property2'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property2_title'])) {
			   if(oledrion_utils::getModuleOption('product_property2_title') != $_POST['product_property2_title']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property2_title'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property2_title',
			          'conf_value'=>$_POST['product_property2_title'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property3'])) {
			   if(oledrion_utils::getModuleOption('product_property3') != $_POST['product_property3']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property3'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property3',
			          'conf_value'=>$_POST['product_property3'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property3_title'])) {
			   if(oledrion_utils::getModuleOption('product_property3_title') != $_POST['product_property3_title']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property3_title'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property3_title',
			          'conf_value'=>$_POST['product_property3_title'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property4'])) {
			   if(oledrion_utils::getModuleOption('product_property4') != $_POST['product_property4']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property4'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property4',
			          'conf_value'=>$_POST['product_property4'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property4_title'])) {
			   if(oledrion_utils::getModuleOption('product_property4_title') != $_POST['product_property4_title']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property4_title'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property4_title',
			          'conf_value'=>$_POST['product_property4_title'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
		  
		  if(isset($_POST['product_property5'])) {
			   if(oledrion_utils::getModuleOption('product_property5') != $_POST['product_property5']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property5'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property5',
			          'conf_value'=>$_POST['product_property5'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  }
        
        if(isset($_POST['product_property5_title'])) {
			   if(oledrion_utils::getModuleOption('product_property5_title') != $_POST['product_property5_title']) {
			    $criteria = new CriteriaCompo();
			    $criteria->add($moduleIdCriteria);
			    $criteria->add(new Criteria('conf_name','product_property5_title'));
			    $config = $configHandler->getConfigs($criteria);
			    $config = $config[0];
			    $configValue = array(
			          'conf_modid'=>$xoopsModule->getVar('mid'),
			          'conf_catid'=>0,
			          'conf_name'=>'product_property5_title',
			          'conf_value'=>$_POST['product_property5_title'],
			          'conf_formtype'=>'hidden',
			          'conf_valuetype'=>'text'
			         );
			    $config->setVars($configValue);
			    $configHandler->insertConfig($config);
			   }
		  } 
		  
	   oledrion_utils::updateCache();
		oledrion_utils::redirect(_AM_OLEDRION_SAVE_OK, $baseurl.'?op=property', 2);
		break;
}
?>