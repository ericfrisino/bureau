<?php
/**
 * @package Federation Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"></header><!-- .entry-header -->

	<div class="entry-content">
		<div class="sign">
			<div class="title thankyou">THANK YOU</div>
			<?php the_content(); ?>
		</div>
		<?php do_action( 'icc_after_the_content' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fdn_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
