<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fdn_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'fdn' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 1', 'fdn' ),
    'id'            => 'footer-1',
    'description'   => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1 class="footer-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 2', 'fdn' ),
    'id'            => 'footer-2',
    'description'   => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1 class="footer-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 3', 'fdn' ),
    'id'            => 'footer-3',
    'description'   => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1 class="footer-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 4', 'fdn' ),
    'id'            => 'footer-4',
    'description'   => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1 class="footer-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Social Media', 'fdn' ),
    'id'            => 'social-media',
    'description'   => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h1 class="footer-title">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Infographic Top', 'fdn' ),
    'id'            => 'infographic-single-top',
    'description'   => 'Widgets above hardcoded widgets (language switcher)',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );

	register_sidebar( array(
		'name'          => __( 'Infographic Bottom', 'fdn' ),
		'id'            => 'infographic-single-bottom',
		'description'   => 'Widgets below hardcoded widgets.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

//  register_sidebar( array(
//    'name'          => __( 'Branding Archive', 'fdn' ),
//    'id'            => 'branding-archive',
//    'description'   => '',
//    'before_widget' => '',
//    'after_widget'  => '',
//    'before_title'  => '<h1 class="widget-title">',
//    'after_title'   => '</h1>',
//  ) );

	register_sidebar( array(
		'name'          => __( 'Homepage Featured Products', 'fdn' ),
		'id'            => 'homepage-featured-products',
		'description'   => 'Put Featured Products here',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Below Single Post Ad', 'fdn' ),
		'id'            => 'below-single-post-ad',
		'description'   => 'Show an ad below a single post',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'fdn_widgets_init' );