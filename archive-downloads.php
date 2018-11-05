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
				<h1 class="page-title">Downloads</h1>
			</header><!-- .page-header -->

			<? // Get Array of Existing Categories
			$categories = get_terms( array(
				'taxonomy' => 'download-section',
				'orderby' => 'name',
				'order'   => 'ASC'
			) );

			// echo '<pre>'; print_r( $categories ); echo '</pre>';

			// Count Existing Categories
			$category_count = count( $categories );

			// DEBUG : Print Total Category Count to Screen.
			// echo 'TOTAL CATEGORIES : ' . $category_count;

			// DEBUG : Print $categories Array to Screen.
			// var_dump( $categories );

			// If there are categories go ahead and run the proper queries.
			if( $category_count > 0 && is_array( $categories ) ) {

				// Run a query for each category.
				foreach( $categories as $single_cat ) {

					// Build Query.
					$cat_posts_args = array(
						'post_type'       => 'downloads',
						'order'           => 'ASC',
						'orderby'         => 'title',
						'posts_per_page'  => -1,
						'post_status'     => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'download-section',
								'field'    => 'term_id',
								'terms'    => $single_cat->term_id,
							),
						),
					);

					// Run Query.
					$cat_posts = new WP_Query( $cat_posts_args );

					// DEBUG : Print Query to screen.
					// var_dump( $cat_posts );

					// Check to see if the Category has any posts in it.
					// If posts exist print table info for the posts.
					if ( $cat_posts->have_posts() ) { ?>

						<h2 class="h4"><?php echo $single_cat->name; ?></h2>
						<table class="icc-download">
							<thead>
							<tr>
								<th>Name</th>
								<th width="40px" style="text-align: center;">US</th>
								<th width="40px" style="text-align: center;">CA</th>
								<th width="40px" style="text-align: center;">FR</th>
							</tr>
							</thead>


							<? /* Start the Loop */ ?>
							<? while ( $cat_posts->have_posts() ) { $cat_posts->the_post(); ?>

								<? get_template_part( 'content', 'download-archive' ); ?>

							<? } // endwhile; ?>

						</table>

					<? } else { ?>

						<? get_template_part( 'content', 'none' ); ?>

					<? } // endif; ?>

				<? } // foreach ?>

			<? } // end if ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();