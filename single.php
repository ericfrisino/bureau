<?php
/**
 * The template for displaying all single posts.
 *
 * @package Federation Theme
 */

get_header(); ?>

	<div id="primary" class="content-area column nine">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<? if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				return;
			} else {
				dynamic_sidebar( 'below-single-post-ad' );
			}?>

			<?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) { echo do_shortcode( '[jetpack-related-posts]' ); } ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
