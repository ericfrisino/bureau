<?php
/**
 * @package Federation Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<? if( has_post_thumbnail() ) { ?>
			<div class="entry-title-container">
				<div class="entry-image"><?php the_post_thumbnail( 'full' ); ?></div>
				<div class="entry-title h1">
					<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a>
				</div>

				<div class="clear"></div>
			</div>
		<? } else { ?>
			<div class="entry-title-container no-post-image">
				<div class="entry-title h1">
					<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a>
				</div>

				<div class="clear"></div>
			</div>
		<? } ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php fdn_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fdn' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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