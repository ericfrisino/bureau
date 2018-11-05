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
				<? //  the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<h1 class="page-title"><? single_term_title( 'Downloads: ' ); ?> </h1>
				<? the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</header><!-- .page-header -->

			<table class="icc-download">
				<thead>
				<tr>
					<th>Name</th>
					<th width="40px" style="text-align: center;">US</th>
					<th width="40px" style="text-align: center;">CA</th>
					<th width="40px" style="text-align: center;">FR</th>
				</tr>
				</thead>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'download-archive' );
					?>

				<?php endwhile; ?>

			</table>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
