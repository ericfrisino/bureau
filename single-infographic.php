<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Federation Theme
 *
 * Template Name: Infographics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main infographic" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'infographic' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'infographic' ); ?>
<?php get_footer(); ?>
