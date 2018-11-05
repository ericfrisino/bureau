<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Federation Theme
 */

get_header(); ?>

<div id="primary" class="forms" style="width: 100%;">
	<main id="main" class="site-main" role="main">


			<div class="sign">

        <div class="title notice">
          notice
        </div><!-- .notice-title -->

        <div class="main-copy">
          <span style="font-size:200px;">404</span><br />
          Page not found
        </div><!-- .notice-main-copy -->

        <div class="sub-copy">
          <?php get_search_form(); ?>
        </div><!-- .notice-sub-copy -->

      </div><!-- .notice-sign -->

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
