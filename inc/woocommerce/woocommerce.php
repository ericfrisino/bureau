<?php
/**
 * User: Eric Frisino
 * Date: 12/12/16
 * Time: 6:01 PM
 */


// Declare WooCommerce Support
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

// Change number or products per row to anything
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 5; // 3 products per row
	}
}
// add_filter('loop_shop_columns', 'loop_columns');


// Remove Breadcrumbs from default location.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


// TODO: Tackle this sometime, its creating a problem where there are two IDs of 'content' on a product page.
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );





/**
 * Before the standard add to cart button is called, check for the product type
 * and if it is a non-stocking product, dump the standard add to cart button
 * and sub in the non-stocking add to cart button.
 */
function icc_get_product_type() {

	// load up the woocommerce product global.
	global $product;

	// Grab the product type array
	$icc_product_type = get_the_terms( $product->id, 'product_type');

	// Select the product type name
	$icc_product_type = $icc_product_type[0]->name;

	// If WP_DEBUG is active dump data to PHP Log
	if(defined('WP_DEBUG') && true === WP_DEBUG) {
		error_log( '$icc_product_type: ' . $icc_product_type);
	}

	// Test for a non-stocking product type.
	if( $icc_product_type == 'non_stocking' ) {
		// If so, swap out the add to cart button section.
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
		add_action('woocommerce_single_product_summary', 'woocommerce_template_non_stocking_add_to_cart', 30);
		// If its not a non-stocking product type, check to see if it is a service.
	} elseif( $icc_product_type == 'service' ) {
		// If it is a service...

		// Remove the Add to Cart Button.
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
		// add_action('woocommerce_single_product_summary', 'woocommerce_template_service_add_to_cart', 30);

		// Remove the left column container
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	}
}
add_action('woocommerce_before_main_content', 'icc_get_product_type', 5 );