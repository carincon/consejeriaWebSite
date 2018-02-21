<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global  $product;

$attributes = $product->get_attributes();
$currency 	= '';
foreach($attributes as $taxonomy => $value){
	if($taxonomy=='pa_currency'){
		$attributeValues = get_terms($taxonomy);
		foreach($attributeValues as $attributeValue){
			//var_dump($attributeValue->name,$attributeValue->slug);
			$currency = strtolower($attributeValue->slug);
		}
	}
}


/**
 *This function was implement in functions.php
 **/
$newPrice = 0;
if(!empty($currency) && isset($product->price))
	$newPrice 	= getExchangeRate($currency,$product->price);


echo 'Nuevo Precio <p class="price"> $'.number_format(round($newPrice,-3) , 0, '.', '.').'</p> Valor dado en <strong>'.$currency.'</strong>';

?>

<p class="price">
	<?php
	 echo $product->get_price_html();	
	//$price = $product->price;
	//echo $price * 2; 
	?>
</p>

