<?php
/**
 * @package Federation Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php	the_content(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fdn_entry_footer(); ?>
		<?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->