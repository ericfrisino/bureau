<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Federation Theme
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="footer-content top-footer-menu">
    <div class="menu-left">
      <?php wp_nav_menu( array( 'theme_location' => 'footer-left' ) ); ?>
    </div>

    <div class="menu-right">
      <?php wp_nav_menu( array( 'theme_location' => 'footer-right' ) ); ?>
    </div>
  </div><!-- .footer-content .top-footer-menu -->

  <div class="clear"> </div>

	<div class="site-info">
    <div class="footer-content-container">
        <div class="container row">
          <div class="footer-column one">
            <?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } else { ?>
              <h1 class="footer-title">Footer 1</h1>
              <p>you can set up this footer column in the admin under Appearance > Widgets</p>
            <?php } ?>
          </div>
          <div class="footer-column two">
            <?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } else { ?>
              <h1 class="footer-title">Footer 2</h1>
              <p>you can set up this footer column in the admin under Appearance > Widgets</p>
            <?php } ?>
          </div>
          <div class="footer-column three">
            <?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } else { ?>
              <h1 class="footer-title">Footer 3</h1>
              <p>you can set up this footer column in the admin under Appearance > Widgets</p>
            <?php } ?>
          </div>
          <div class="footer-column four">
            <?php if ( is_active_sidebar( 'footer-4' ) ) { dynamic_sidebar( 'footer-4' ); } else { ?>
              <h1 class="footer-title">Footer 4</h1>
              <p>you can set up this footer column in the admin under Appearance > Widgets</p>
            <?php } ?>
          </div>
          <div class="clear"></div>
        </div><!-- .row -->
        <div class="footer-social-media">
        <?php if ( is_active_sidebar( 'social-media' ) ) { dynamic_sidebar( 'social-media' ); } else { ?>
              <p style="margin-bottom: 0px;">you can set up this social media section in the admin under Appearance > Widgets using the FDN Social Media widget</p>
            <?php } ?>
        </div><!-- .footer-social-media -->
    </div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
