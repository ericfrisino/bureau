<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Federation Theme
 */

get_header();

/**
 * Used by theme to test to see if the current user can access the current page.
 *
 * @hooked  fdn_can_user_view - 10
 */
do_action( 'fdn_after_get_header', $post_type, wp_get_current_user(), $wp_query ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">Press Releases</h1>
			</header><!-- .page-header -->

			<? // Get the year of the first post. ?>
			<? $the_first_post_date = iccwebsec_first_post_date(); ?>

			<? // Change the year from a string to an int. ?>
			<? $the_first_post_date_number = intval( $the_first_post_date ); ?>

			<? // Get the current year. ?>
			<? $the_current_year = date( 'Y' ); ?>

			<? // change the current year from an string to an int. ?>
			<? $the_current_year_number = intval( $the_current_year ); ?>

			<? $x = $the_current_year_number;
			while ( $x >= $the_first_post_date_number ) {

				// WP_Query arguments
				$args = array(
					'post_type'             => array( 'press' ),
					'post_status'           => array( 'publish' ),
					'order'                 => 'DESC',
					'orderby'               => 'date',
					'posts_per_page'				=> -1,
					'nopaging'							=> TRUE,
					'date_query' 						=> array(
																			array(
																				'year'  => $x,
																			),
																		),
				);

// The Query
				$yearly_query = new WP_Query( $args );

// The Loop
				if ( $yearly_query->have_posts() ) { ?>
					<table style="margin-bottom: 50px;">
						<tr>
							<th><? echo $x; ?></th>
						</tr>

						<? while ( $yearly_query->have_posts() ) {
							$yearly_query->the_post();
							get_template_part( 'content', 'press-archive' );
						} ?>
					</table>
				<? }
				// Restore original Post Data
				wp_reset_postdata();
				$x--;
			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
