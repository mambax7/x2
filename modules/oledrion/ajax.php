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
 * Script pour tout ce qui est relatif à Ajax et JSON
 *
 * @since 2.3.2009.03.17
 */
require_once 'header.php';
error_reporting(0);
@$xoopsLogger->activated = false;

$op = isset($_POST['op']) ? $_POST['op'] : '';
if($op =='') {
	$op = isset($_GET['op']) ? $_GET['op'] : '';
}
$return = '';
$uid = oledrion_utils::getCurrentUserID();
$isAdmin = oledrion_utils::isAdmin();


switch($op) {
	// ****************************************************************************************************************
	case 'updatePrice':	// Mise à jour du prix du produit en fonction des attributs sélectionnés
	// ****************************************************************************************************************
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
	    if(isset($_POST['formcontent']) && $product_id > 0) {
	        $data = $data = $attributesIds = $attributes = $templateProduct = array();
	        $handlers = oledrion_handler::getInstance();
	        $product = null;
	        $product = $handlers->h_oledrion_products->get($product_id);
	        if(!is_object($product)) {
	            return _OLEDRION_NA;
	        }
            if(!$product->isProductVisible()) {
                return _OLEDRION_NA;
            }
            $vat_id = $product->getVar('product_vat_id');

            if( intval($product->getVar('product_discount_price', '')) != 0 ) {
                $productPrice = floatval($product->getVar('product_discount_price', 'e'));
            } else {
                $productPrice = floatval($product->getVar('product_price', 'e'));
            }

            parse_str(urldecode($_POST['formcontent']), $data);
/*
            require_once 'FirePHPCore/FirePHP.class.php';
            $firephp = FirePHP::getInstance(true);
            $firephp->log($data, 'Iterators');
*/
            // On récupère les ID des attributs valorisés
            foreach($data as $key => $value) {
                $attributesIds[] = oledrion_utils::getId($key);
            }
            if(count($attributesIds) == 0) {
                return _OLEDRION_NA;
            }
            // Puis les attributs
            $attributes = $handlers->h_oledrion_attributes->getItemsFromIds($attributesIds);
            if(count($attributes) == 0) {
                return _OLEDRION_NA;
            }

            // Et on recalcule le prix
            foreach($attributes as $attribute) {
                $attributeNameInForm = xoops_trim($attribute->getVar('attribute_name').'_'.$attribute->getVar('attribute_id'));
                if(isset($data[$attributeNameInForm])) {
                    $attributeValues = $data[$attributeNameInForm];
                    if(is_array($attributeValues)) {
                        foreach($attributeValues as $attributeValue) {
                            $optionName = oledrion_utils::getName($attributeValue);
                            $optionPrice = $attribute->getOptionPriceFromValue($optionName);
                            $productPrice += $optionPrice;
                        }
                    } else {
                        $optionPrice = $attribute->getOptionPriceFromValue(oledrion_utils::getName($attributeValues));
                        $productPrice += $optionPrice;
                    }
                }
            }
            // Mise en template
			include_once XOOPS_ROOT_PATH.'/class/template.php';
			$template = new XoopsTpl();
            $vat = null;
            $vat = $handlers->h_oledrion_vat->get($vat_id);
            $productPriceTTC = oledrion_utils::getAmountWithVat($productPrice, $vat_id);

            $oledrion_Currency = oledrion_Currency::getInstance();

            $templateProduct = $product->toArray();
            $templateProduct['product_final_price_ht_formated_long'] = $oledrion_Currency->amountForDisplay($productPrice, 'l');
            $templateProduct['product_final_price_ttc_formated_long'] = $oledrion_Currency->amountForDisplay($productPriceTTC, 'l');
            if(is_object($vat)) {
                $templateProduct['product_vat_rate'] = $vat->toArray();
            }
            $templateProduct['product_vat_amount_formated_long'] = $oledrion_Currency->amountForDisplay($productPriceTTC - $productPrice, 'l');
            $template->assign('product', $templateProduct);
            $return = $template->fetch('db:oledrion_product_price.html');
        }
	    break;
	// ajax search
	case 'search':	// ajax search
		 $key = $_GET['part'];
       if(isset($key) && $key != '') {
       	 // Set captul 
		    $i = 1;
		    // Query 1
		    $query = "SELECT `product_id` AS `id` , `product_cid` AS `cid`, `product_title` AS `title`, `product_thumb_url` AS `image`, `product_price` AS `price` FROM `" . $xoopsDB->prefix('oledrion_products') . "` WHERE (`product_online` = 1) AND (`product_title` LIKE '%" . $key ."%' OR `product_title` LIKE '%" . ucfirst($key) ."%') LIMIT 0, 10";
			 $result = $xoopsDB->query($query);
			 while ($row = $xoopsDB->fetchArray($result)) {
				 $items[$i]['title'] = $row['title'];
				 $items[$i]['type'] = 'product';
				 $items[$i]['link'] = XOOPS_URL . '/modules/oledrion/product.php?product_id=' . $row['id'];
				 $items[$i]['image'] = XOOPS_URL . '/uploads/' . $row['image'];
				 //$items[$i]['price'] = oledrion_utils::getTTC($row['price']);
				 $category = $h_oledrion_cat->get($row['cid']);
				 $items[$i]['cat_cid'] = $category->getVar('cat_cid');
				 $items[$i]['cat_title'] = $category->getVar('cat_title');
				 $i++;
			 }
			 // Query 2
			 $query = "SELECT `cat_cid` AS `id` , `cat_title` AS `title`, `cat_imgurl` AS `image`  FROM `" . $xoopsDB->prefix('oledrion_cat') . "` WHERE (`cat_title` LIKE '%" . $key ."%') OR (`cat_title` LIKE '%" . ucfirst($key) ."%') LIMIT 0, 5";
			 $result = $xoopsDB->query($query);
			 while ($row = $xoopsDB->fetchArray($result)) {
				 $items[$i]['title'] = $row['title'];
				 $items[$i]['type'] = 'cat';
				 $items[$i]['link'] = XOOPS_URL . '/modules/oledrion/manufacturer.php?manu_id=' . $row['id'];
				 $items[$i]['image'] = XOOPS_URL . '/uploads/' . $row['image'];
				 $items[$i]['price'] = '';
				 $i++;
			 }
       	 // Set array
       	 $results = array();
       	 // search colors
			 foreach($items as $item) {
				 // if it starts with 'part' add to results
				 //if( strpos($item['title'], $key) === 0 || strpos($item['title'], ucfirst($key)) === 0 ){
				 if($item['type'] == 'product') {
				 	$results[] = '<div class="searchbox">
						 <div class="searchboxright"><img src="' . $item['image'] . '" alt="" /></div>
						 <div class="searchboxleft">
							 <div class="searchboxitem"><a href="' . $item['link'] . '">' . $item['title'] . '</a></div>
							 <div class="searchboxcat"><a href="' . XOOPS_URL . '/modules/oledrion/category.php?cat_cid=' . $item['cat_cid'] . '">' . $item['cat_title'] . '</a></div>
						 </div>
						 <div class="clear"></div>
					 </div>';
				 } else {
				 	$results[] = '<div class="searchbox">
						 <div class="searchboxright"><img src="' . $item['image'] . '" alt="" /></div>
						 <div class="searchboxleft">
							 <div class="searchboxitem"><a href="' . $item['link'] . '">' . $item['title'] . '</a></div>
						 </div>
						 <div class="clear"></div>
					 </div>';
				 }			 
				 //}
			 }	
			 $return = json_encode($results);
		 }  
	    break;
	// Product output as json    
	case 'product': 
	    $start = intval($_GET['start']);
	    $limit = intval($_GET['limit']);
       if(isset($start) && $start != '') {
			$oledrion_shelf_parameters->resetDefaultValues()->setProductsType('recent')->setStart($start)->setLimit($limit)->setSort('product_submitted ASC, product_id');
	      $products = $oledrion_shelf->getProducts($oledrion_shelf_parameters);
			unset($products['lastTitle']);
			$l = $start + $limit;
			for ($s = 0; $s <= $l; $s++) {
	         unset(
					$products[$s]['product_category'],
					$products[$s]['product_image_full_url'],
					$products[$s]['product_thumb_full_url'],
					$products[$s]['product_manufacturers'],
					$products[$s]['product_joined_manufacturers'],
					$products[$s]['product_sku'], 
					$products[$s]['product_extraid'], 
					$products[$s]['product_width'],
					$products[$s]['product_length'],
					$products[$s]['product_unitmeasure1'],
					$products[$s]['product_url'],
					$products[$s]['product_submitter'],
					$products[$s]['product_online'],
					$products[$s]['product_date'],
					$products[$s]['product_hits'],
					$products[$s]['product_rating'],
					$products[$s]['product_votes'],
					$products[$s]['product_comments'],
					$products[$s]['product_price'],
					$products[$s]['product_shipping_price'],
					$products[$s]['product_discount_price'],
					$products[$s]['product_stock'],
					$products[$s]['product_alert_stock'],
					$products[$s]['product_attachment'],
					$products[$s]['product_weight'],
					$products[$s]['product_unitmeasure2'],
					$products[$s]['product_vat_id'],
					$products[$s]['product_download_url'], 
					$products[$s]['product_recommended'],
					$products[$s]['product_metakeywords'],
					$products[$s]['product_metadescription'], 
					$products[$s]['product_metatitle'],
					$products[$s]['product_delivery_time'],
					$products[$s]['product_ecotaxe'],
					$products[$s]['dohtml'],
					$products[$s]['product_ecotaxe_formated'],
					$products[$s]['product_price_formated'],
					$products[$s]['product_shipping_price_formated'],
					$products[$s]['product_discount_price_formated'],
					$products[$s]['product_price_ttc'],
					$products[$s]['product_price_ttc_long'],
					$products[$s]['product_discount_price_ttc'],
					$products[$s]['product_discount_price_ttc_long'],
					$products[$s]['product_attributes_count'],
					$products[$s]['product_final_price_ht_formated_long'],
					$products[$s]['product_final_price_ttc'],
					$products[$s]['product_final_price_ttc_javascript'], 
					$products[$s]['product_final_price_ttc_formated'],
					$products[$s]['product_final_price_ttc_formated_long'],
					$products[$s]['product_vat_amount_formated_long'],
					$products[$s]['product_tooltip'],
					$products[$s]['product_href_title'],
					$products[$s]['product_recommended_picture'],
					$products[$s]['product_shorten_summary'],
					$products[$s]['product_shorten_description'],
					$products[$s]['product_vendor'],
					$products[$s]['product_count'],
					$products[$s]['product_property5'],
					$products[$s]['product_thumb_full_path'],
					$products[$s]['product_image_full_path'],
					$products[$s]['product_vendor_id'],
               $products[$s]['product_summary'],
               $products[$s]['product_url_rewrited']
				);
		   }
		   if(empty($products)) {
		   	$products['end'] = 1;
		   }
       	$return = json_encode($products);
       }	
	    break;
	// Product output as json    
	case 'category':
	    $start = intval($_GET['start']);
       if(isset($start) && $start != '') {
	       $ret = array ();
			 $criteria = new CriteriaCompo();
			 $criteria->setStart($start);
			 $criteria->setSort('cat_cid');
		    $criteria->setOrder('ASC' );
			 $obj = $h_oledrion_cat->getObjects($criteria, false);
			 if ($obj) {
				 foreach ($obj as $root) {
					 $tab = array();
					 $tab = $root->toArray();
					 unset(
						 $tab['cat_description'],
						 $tab['cat_full_imgurl'],
						 $tab['cat_advertisement'],
						 $tab['cat_metakeywords'],
						 $tab['cat_metadescription'],
						 $tab['cat_metatitle'],
						 $tab['cat_footer'],
						 $tab['dohtml'],
						 $tab['cat_href_title'],
						 $tab['cat_url_rewrited']
					 );
					 $ret[] = $tab;
				 }	
			 }
	       $return = json_encode($ret); 
       }
	    break;
}
echo $return;
?>