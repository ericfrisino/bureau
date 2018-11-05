<?php
/**
 * @package Federation Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
      <div class="entry-title h1" style="text-align: center; "> <?php the_title( '', '' ); ?></div>
      <div class="clear"></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php do_action( 'icc_after_the_content' ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'fdn' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fdn_entry_footer(); ?>
		<?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
