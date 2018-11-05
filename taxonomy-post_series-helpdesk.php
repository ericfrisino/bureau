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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					// the_archive_title( '<h1 class="page-title">', '</h1>' );
					// the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>

				<div class="regulatory-helpdesk-header-container">
					<div class="reg-help-inner-container">
						<h1 class="page-title">Regulatory Helpdesk</h1>
						<? the_archive_description( '<p class="taxonomy-description">', '</p>' ); ?>
				</div>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
