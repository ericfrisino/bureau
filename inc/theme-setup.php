<?php
if ( ! function_exists( 'fdn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fdn_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Federation Theme, use a find and replace
   * to change 'fdn' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'fdn', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'fdn' ),
    'primary-small' => __( 'Primary Menu - Small Screen', 'fdn' ),
    'footer-left' => __( 'Above Footer - Left', 'fdn' ),
    'footer-right' => __( 'Above Footer - Right', 'fdn' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  //add_theme_support( 'post-formats', array(
  //  'aside', 'image', 'video', 'quote', 'link',
  //) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'fdn_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif; // fdn_setup
add_action( 'after_setup_theme', 'fdn_setup' );