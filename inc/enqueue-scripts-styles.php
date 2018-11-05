<?php

function fdn_scripts() {

  // Enqueue jQuery
  wp_enqueue_script('jquery');


  wp_enqueue_script( 'fdn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  wp_enqueue_script( 'fdn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }


  // Enqueue Selectize
  // wp_enqueue_style( 'fdn-selectize-style', get_template_directory_uri() . '/inc/selectize/selectize.css' );
  // wp_enqueue_script( 'fdn-selectize-script', get_template_directory_uri() . '/inc/selectize/selectize.js' );
  // wp_enqueue_script( 'fdn-selectize-initalize', get_template_directory_uri() . '/js/selectize.js' );
  // wp_enqueue_script( 'fdn-website-alive', get_template_directory_uri() . '/js/websitealive.js', '', '', 1 );


  // Enqueue WooCommerce Scripts
	wp_enqueue_script( 'icc-preprinted-forms', get_template_directory_uri() . '/js/preprinted-forms.js', '', '', 1 );



  wp_enqueue_style( 'fdn-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'fdn_scripts' );


function fdn_admin_scripts() {
  // Enqueue Selectize
  wp_enqueue_style( 'fdn-selectize-style', get_template_directory_uri() . '/inc/selectize/selectize.css' );
  wp_enqueue_script( 'fdn-selectize-script', get_template_directory_uri() . '/inc/selectize/selectize.js' );
  wp_enqueue_script( 'fdn-selectize-initalize', get_template_directory_uri() . '/js/selectize.js' );
}
// add_action( 'admin_enqueue_scripts', 'fdn_admin_scripts' );