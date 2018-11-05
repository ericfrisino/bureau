<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Federation Theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function fdn_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'fdn_jetpack_setup' );
