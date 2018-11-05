<?php
/**
 * @package Federation Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->

	<div class="entry-content">
		<? // Get expiration meta ?>
		<? $expiration = get_post_meta( get_the_ID(), 'advertisement_expire', true ); ?>
		<? // Convert to a comparable format ?>
		<? $the_expiration_date = strtotime( $expiration ); ?>
		<? // Set the current date ?>
		<? $the_current_date = strtotime( date( 'Y-m-d' ) ); // var_dump( $the_current_date ); ?>
		<? // Check to see if the expiration date has passed ?>
		<? if( $the_current_date < $the_expiration_date ) { ?>
			<? if ( ! empty( $expiration ) ) { ?>
				<? $date = date_create( $expiration ); ?>
				<div class="promotion-expiration">
					Promotion Expires: <? echo date_format( $date, "F j, Y" ); ?>
				</div>
			<? } ?>
		<? } else { ?>
			<!--<div class="sign">-->
			<!---->
			<!--	<div class="title notice">-->
			<!--		notice-->
			<!--	</div><!-- .notice-title -->
			<!---->
			<!--	<div class="main-copy">-->
			<!--		This promotion has expired-->
			<!--	</div><!-- .notice-main-copy -->
			<!---->
			<!--	<div class="sub-copy">-->
			<!--		Please return to the<br />-->
			<!--		<a href="--><?// echo site_url(); ?><!--/ads">product buzz</a> page to see current promotions-->
			<!--	</div><!-- .notice-sub-copy -->
			<!---->
			<!--</div><!-- .notice-sign -->
		<? } ?>

			<?php	the_content(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fdn_entry_footer(); ?>
		<?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->