<?php
/**
 * Federation Theme Theme Customizer
 *
 * @package Federation Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fdn_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'fdn_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fdn_customize_preview_js() {
	wp_enqueue_script( 'fdn_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fdn_customize_preview_js' );



/**
 * Site Logo Translation
 */
function bureau_site_logo( $wp_customize ) {
	$wp_customize->add_section( 'bureau_translated_site_logo', array(
		'title' => 'Header Images',
		'priority' => 1000,
	) );

	$wp_customize->add_setting( 'bureau_translates_site_logo_hidden', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bureau_translates_site_logo_hidden', array(
		'label' => '',
		'description' => 'Upload English and French versions of the site logo here. Create the images at <b>960 x 250</b>.',
		'section' => 'bureau_translated_site_logo',
		'settings' => 'bureau_translates_site_logo_hidden',
		'type' => 'hidden'
	) ) );

	$wp_customize->add_setting( 'bureau_translated_site_logo_en', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bureau_translated_site_logo_en', array(
		'label'         => 'English Header Image',
		'description'   => '',
		'section'       => 'bureau_translated_site_logo',
		'settings'      => 'bureau_translated_site_logo_en',
	) ) );

	$wp_customize->add_setting( 'bureau_translated_site_logo_fr', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bureau_translated_site_logo_fr', array(
		'label'         => 'French Header Image',
		'description'   => '',
		'section'       => 'bureau_translated_site_logo',
		'settings'      => 'bureau_translated_site_logo_fr',
	) ) );

	// var_dump( pll_the_languages( array( 'raw'=>1 ) ) );
	//$bureau_lang_array = pll_the_languages( array( 'raw'=>1 ) );
	//var_dump( $bureau_lang_array );

	//foreach( $bureau_lang_array as $bureau_lang ) {
	//	//echo 'Language Slug: ' . $bureau_lang['slug'] . '<br />';
	//
	//	$bureau_setting_name = 'bureau_translates_site_logo_' . $bureau_lang[ 'slug' ];
	//	//echo 'Setting Name: ' . $bureau_setting_name . '<br />';
	//
	//	$wp_customize->add_setting( $bureau_setting_name, array( 'default' => '' ) );
	//
	//	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $bureau_setting_name, array(
	//		'label' => 'Header Image',
	//		'description' => '',
	//		'section' => 'bureau_translated_site_logo',
	//		'settings' => $bureau_setting_name,
	//	) ));
	//}

}
add_action( 'customize_register', 'bureau_site_logo' );





/**
 * Site Logo Translation
 */
function bureau_site_icon_right( $wp_customize ) {
	$wp_customize->add_section( 'bureau_translated_site_icon_right', array(
		'title' => 'Header Images',
		'priority' => 1000,
	) );

	$wp_customize->add_setting( 'bureau_translates_site_icon_right_hidden_1', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bureau_translates_site_icon_right_hidden_1', array(
		'label' => '',
		'description' => '<strong>ONLY USE THE INPUTS BELOW IF POLYLANG IS TURNED OFF</strong><br />Upload English and French versions of the site icon to be displayed on the right side of the header here. Create the images at <b>125px</b> tall by a reasonable width wide.',
		'section' => 'bureau_translated_site_icon_right',
		'settings' => 'bureau_translates_site_icon_right_hidden_1',
		'type' => 'hidden'
	) ) );

	$wp_customize->add_setting( 'bureau_translated_site_icon_right_universal', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bureau_translated_site_icon_right_universal', array(
		'label'         => 'English Header Icon',
		'description'   => '',
		'section'       => 'bureau_translated_site_icon_right',
		'settings'      => 'bureau_translated_site_icon_right_universal',
	) ) );
	



	$wp_customize->add_setting( 'bureau_translates_site_icon_right_hidden_2', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bureau_translates_site_icon_right_hidden_2', array(
		'label' => '',
		'description' => '<strong>ONLY USE THE INPUTS BELOW IF POLYLANG IS TURNED ON AND SETUP</strong><br />Upload English and French versions of the site icon to be displayed on the right side of the header here. Create the images at <b>125px</b> tall by a reasonable width wide.',
		'section' => 'bureau_translated_site_icon_right',
		'settings' => 'bureau_translates_site_icon_right_hidden_2',
		'type' => 'hidden'
	) ) );

	$wp_customize->add_setting( 'bureau_translated_site_icon_right_en', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bureau_translated_site_icon_right_en', array(
		'label'         => 'English Header Icon',
		'description'   => '',
		'section'       => 'bureau_translated_site_icon_right',
		'settings'      => 'bureau_translated_site_icon_right_en',
	) ) );

	$wp_customize->add_setting( 'bureau_translated_site_icon_right_fr', array( 'default' => '' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bureau_translated_site_icon_right_fr', array(
		'label'         => 'French Header Icon',
		'description'   => '',
		'section'       => 'bureau_translated_site_icon_right',
		'settings'      => 'bureau_translated_site_icon_right_fr',
	) ) );

	// var_dump( pll_the_languages( array( 'raw'=>1 ) ) );
	//$bureau_lang_array = pll_the_languages( array( 'raw'=>1 ) );
	//var_dump( $bureau_lang_array );

	//foreach( $bureau_lang_array as $bureau_lang ) {
	//	//echo 'Language Slug: ' . $bureau_lang['slug'] . '<br />';
	//
	//	$bureau_setting_name = 'bureau_translates_site_logo_' . $bureau_lang[ 'slug' ];
	//	//echo 'Setting Name: ' . $bureau_setting_name . '<br />';
	//
	//	$wp_customize->add_setting( $bureau_setting_name, array( 'default' => '' ) );
	//
	//	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $bureau_setting_name, array(
	//		'label' => 'Header Image',
	//		'description' => '',
	//		'section' => 'bureau_translated_site_logo',
	//		'settings' => $bureau_setting_name,
	//	) ));
	//}

}
add_action( 'customize_register', 'bureau_site_icon_right' );