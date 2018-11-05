<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bureau Theme
 *
 * Template Name: Home - Canada
 */

get_header(); ?>

	<div id="" class="content-area">
		<main id="main" class="site-main" role="main">


			<!-- ROW NUMBER 1 : SLIDER & ADS -->
			<div class="page-block">
				<div class="grid12-9">
					<? if ( function_exists( 'soliloquy' ) ) { soliloquy( '235' ); } ?>
				</div>

				<div class="grid12-3" >
					<img src="http://icc.pub/cms/homepage/slider-right/whmis-2015-ticker-xm.png" alt="" title="" width="100%" height="auto" />
					<img src="http://icc.pub/cms/homepage/slider-right/infographics-xm.png" alt="" title="" width="100%" height="auto" />
				</div>
			</div>

			<div class="clear"></div>
			<hr style="height:2px; background-color:#AAA; display:block;"/>


			<!-- ROW NUMBER 2 : PRODUCTS SERVICES TRAINING -->
			<div class="page-block">
				<div class="grid12-4" style="padding-bottom: 10px;">
					<img src="http://icc.pub/cms/homepage/pst/products-xm.png" alt="" title="" width="100%" height="auto" />
				</div>

				<div class="grid12-4" >
					<img src="http://icc.pub/cms/homepage/pst/services-xm.png" alt="" title="" width="100%" height="auto" />
				</div>

				<div class="grid12-4" >
					<img src="http://icc.pub/cms/homepage/pst/training-xm.png" alt="" title="" width="100%" height="auto" />
				</div>
			</div>

			<div class="clear"></div>
			<hr style="height:2px; background-color:#AAA; display:block;"/>


			<!-- ROW NUMBER 3 : INDUSTRIES WE SERVE -->
			<div class="page-block">
				<div class="grid12-12" style="padding-bottom: 10px;">
					<img src="http://icc.pub/cms/homepage/rows/industries-we-serve.png" alt="" title="" width="100%" height="auto" />
				</div>

			<div class="clear"></div>
			<hr style="height:2px; background-color:#AAA; display:block;"/>


			<!-- ROW NUMBER 4 : RECENT BLOG ENTRIES -->
			<div class="page-block">
				<? // Get current site url in order determine if it is a local dev site or production site.
				$bureau_current_site_url =  get_site_url();

				// if the site is a local dev site
				if( $bureau_current_site_url == 'http://shop-us.network.icc' ) {
					// Switch to the dev blog.
					switch_to_blog( 4 );
				// Otherwise if the site is the production site
				} elseif( $bureau_current_site_url == 'http://shop-us.thecompliancecenter.info/') {
					// Switch to the production blog
					switch_to_blog( 7 );
				// Otherwise
				} else {
					// Throw an error and let the user know to contact me.
					echo 'This theme is not configured for the current network, please contact Eric F. to get this setup :)';
				}

				// Get 6 most recent blog posts
				$args = array(
					'numberposts' => 4,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish',
					'suppress_filters' => true
				);
				$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

				// Cycle though each post retrieved from the above query.
				foreach( $recent_posts as $recent ){
					// Build Post Author Query
					$post_author_query = new WP_User_Query( array( 'include' => array( $recent['post_author'], 'blog_id' => 4 ) ) );
					// Get the results of the Post Author Query
					$post_author_meta = $post_author_query->get_results();

					// Extract the Post Author's display name and archive link
					// loop through each author
					foreach ($post_author_meta as $author) {
						// get all the user's data
						$author_info         = get_userdata( $author->ID );
						// Set Author display name.
						$author_display_name = $author_info->display_name;
						//$author_archive =
					}

					// Collect and truncate the post content.
					$post_content = $recent['post_content'];
					// Strip all html.
					$post_content_clean = strip_tags( $post_content );
					// Truncate the content.
					$the_content = substr( $post_content_clean, 0, 150 );

					// Display the content of the blogs :)
					echo '<div class="grid12-3" style="padding-bottom: 10px;">';
						echo '<h3 style="font-size: 14px;"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </h3> ';
						echo 'by: ' . $author_display_name;
						echo '<p>' . $the_content . '...</p>';
						echo '<a href="' . $recent['guid'] . '">Read More!</a>';
					echo '</div>';
				}
				// Reset Query.
				wp_reset_query();
				// Return to current blog.
				restore_current_blog(); ?>
			</div>

			<div class="clear"></div>
			<hr style="height:2px; background-color:#AAA; display:block;"/>


			<!-- ROW NUMBER 5 : FEATURED PRODUCTS -->
			<div class="page-block homepage-product-list">
					<? if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("homepage-featured-products") ) { } ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
