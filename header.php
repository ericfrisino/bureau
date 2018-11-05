<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Federation Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Disable Compatability Mode -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Set Character Set -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- Set Scale -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Set Profile -->
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <!-- Set Pingback URL -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Import cloud.typography styles -->
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6579332/617026/css/fonts.css" />

  <!-- Import FontAwesome -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Call pinit.js -->
  <!--<script async defer data-pin-hover="true" data-pin-color="red" src="//assets.pinterest.com/js/pinit.js"></script>-->

  <!-- Proclaim to Google that we are Mobile Friendly. -->
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- Load Everything Else -->
  <?php wp_head(); ?>
</head>

<body <?php if( $post_type != 'ads' ) { body_class(); } ?>>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fdn' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <?php if ( is_user_logged_in() ) { // Test if the user is logged in ?>
      <div class="fdn-welcome-notice">
        <?php $uid = get_current_user_id(); ?>
        <div class="fdn-welcome name"><? if( class_exists( 'Polylang') ) { pll_e( 'Welcome' ); } else { echo 'Welcome'; }; ?> <?php the_author_meta( 'first_name', get_current_user_id() ); ?> <?php the_author_meta( 'last_name', get_current_user_id() ); ?> </div>


        <div class="fdn-user-info">
          <? $curuser = wp_get_current_user(); ?>
          <span class="fdn-info view-profile"><a href="<? bloginfo( 'url' ); ?>/author/<? echo $curuser->user_nicename; ?>/"><? if( class_exists( 'Polylang') ) { pll_e( 'View Profile' ); } else { echo 'View Provile'; } ?></a></span>
          <span class="fdn-info edit-profile"><a href="<? bloginfo( 'url' ); ?>/edit-profile/"><? if( class_exists( 'Polylang') ) { pll_e( 'Edit Profile' ); } else { echo 'Edit Profile'; } ?></a></span>
          <span class="fdn-info logout"><a href="<? echo wp_logout_url(); ?>"><? if( class_exists( 'Polylang') ) { pll_e( 'Log Out' ); } else { echo 'Log Out'; } ?></a></span>
        </div><!-- .dn-user-info -->
      </div><!-- .fdn-welcome-notice -->
    <?php } ?>

    <div class="site-branding">
      <?php //var_dump( pll_the_languages( array( 'raw'=>1 ) ) );
      //$lang_array = pll_the_languages( array( 'raw'=>1 ) );
      //$array_count = count( $lang_array );
      //echo 'Array Count: ' . $array_count;
      //echo '<br/>';
      //echo '<br/>';
      //foreach( $lang_array as $lang ) {
      //  echo 'Language Slug: ' . $lang['slug'] . '<br />';
      //} ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <!-- 458 x 125 -->
        <!--<img src="--><?php //header_image(); ?><!--" width="--><?php //echo get_custom_header()->width; ?><!--" height="--><?php //echo get_custom_header()->height; ?><!--" alt="" />-->
        <? if( class_exists( 'Polylang' ) ) {
          $bureau_current_language = pll_current_language('slug');

          if( $bureau_current_language == 'en') { ?>
            <img src="<? echo get_theme_mod( 'bureau_translated_site_logo_en' ); ?>" class="regulatory-blog-logo" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" width="458px" height="auto" />
          <? } elseif ( $bureau_current_language == 'fr' ) { ?>
            <img src="<? echo get_theme_mod( 'bureau_translated_site_logo_fr' ); ?>" class="regulatory-blog-logo" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"  width="458px" height="auto" />
          <? }
        } else { ?>
          <img src="http://icc.pub/cms/blog/theme-icon-default.png" class="regulatory-blog-logo" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" width="458px" height="auto" />
        <? }?>
      </a>

      <!-- Call images loaded from the customizer for the image on the right side of the header. -->
      <? if( class_exists( 'Polylang' ) ) {
        $bureau_current_language = pll_current_language('slug');

        if( $bureau_current_language == 'us' || $bureau_current_language == 'ca' ) {
          $bureau_en_right_icon = get_theme_mod( 'bureau_translated_site_icon_right_en' );
            if( ! empty( $bureau_en_right_icon ) ) { ?>
							<a href="<? echo get_site_url(); ?>">
								<img src="<? echo get_theme_mod( 'bureau_translated_site_icon_right_en' ); ?>" height="125" width="auto" alt="site-icon" style="height: 125px !important; width: auto !important;" />
							</a>
            <? }  // end if ! empty( $bureau_en_right_icon )
        } elseif ( $bureau_current_language == 'fr' ) {
          $bureau_fr_right_icon = get_theme_mod( 'bureau_translated_site_icon_right_en' );
          if( ! empty( $bureau_fr_right_icon ) ) {?>
            <div style="float: right;">
              <img src="<? echo get_theme_mod( 'bureau_translated_site_icon_right_en' ); ?>" height="125" width="auto" alt="site-icon" style="height: 125px !important; width: auto !important;" />
            </div>
          <? }  // end if ! empty( $bureau_fr_right_icon )
        }  // end if $bureau_current_language == 'fr'
      } else {
          $bureau_universal_right_icon = get_theme_mod( 'bureau_translated_site_icon_right_universal' );
          if( ! empty( $bureau_universal_right_icon ) ) {?>
            <div style="float: right;">
              <img src="<? echo get_theme_mod( 'bureau_translated_site_icon_right_universal' ); ?>" height="125" width="auto" alt="site-icon" style="height: 125px !important; width: auto !important;" />
            </div>
          <? } // end if ! empty( $bureau_universal_right_icon )
      } // end if class_exists( 'Polylang' ) ?>


    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation" role="navigation">
      <div class="menu-toggle">
        <!--<div class="show-small-menu">--><?// // pll__( 'Menu' ); ?><!-- Menu</div>-->
        <?php wp_nav_menu( array( 'theme_location' => 'primary-small' ) ); ?>
      </div>

      <div class="main-menu-toggle">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
      </div>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="site-content" class="site-content">

  <? do_action( 'icc_before_main_content' ); ?>
