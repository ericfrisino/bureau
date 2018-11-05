<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bureau Theme
 *
 * Template Name: One Column Wide
 */

get_header(); ?>

<div id="primary" class="forms" style="width: 100%;">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
