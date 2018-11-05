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


	<div id="primary" class="content-area ads-archive">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header"> </header><!-- .page-header -->

			<? /* Start the Loop */ ?>
			<? while ( have_posts() ) { the_post(); ?>

				<? // Check to see if the article has expired ?>
				<? $expiration = get_post_meta( get_the_ID(), 'advertisement_expire', true ); ?>

				<? // Does the article have an expiration date set? ?>
				<? if ( empty( $expiration ) ) { ?>
					<? // If there is no expiration date set, print the article to the screen ?>
					<article class="ads-article <? if ( ! has_post_thumbnail( $post->ID ) ) { echo "no-feature"; }?>">
						<span>
							<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
								<? if ( has_post_thumbnail( $post->ID ) ) { ?>
									<? the_post_thumbnail( 'full' ); ?>
								<? } else { ?>
									<? the_title( '', '' ); ?>
								<? } ?>
							</a>
						</span>
					</article>
				<? } else { ?>
					<? // If there is an expiration date set, put it into a format the computer can read ?>
					<? $the_expiration_date = strtotime( $expiration );  // var_dump( $the_expiration_date ); ?>
					<? // Set the current date ?>
					<? $the_current_date = strtotime( date( 'Y-m-d' ) ); // var_dump( $the_current_date ); ?>
					<? // Check to see if the expiration date has passed ?>
					<? if( $the_current_date < $the_expiration_date ) { ?>
						<? // if it has not, display the post. ?>
						<article class="ads-article <? if ( ! has_post_thumbnail( $post->ID ) ) { echo "no-feature"; }?>">
							<span>
								<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
									<? if ( has_post_thumbnail( $post->ID ) ) { ?>
										<? the_post_thumbnail( 'full' ); ?>
									<? } else { ?>
										<? the_title( '', '' ); ?>
									<? } ?>
								</a>
							</span>
						</article>
					<? } else {
						// if it has update the posts status to expired.
						$the_expired_post = array(
							'ID'           => $post->ID,
							'post_status'   => 'expired',
						);
						// var_dump( $the_expired_post );
						wp_update_post( $the_expired_post );
					} ?>

				<? } ?>

				<? // If the article has expired fire a function to update the articles status to `expired` ?>

				<? // Otherwise print the article to the screen ?>

				<!--<article class="ads-article --><?// if ( ! has_post_thumbnail( $post->ID ) ) { echo "no-feature"; }?><!--">-->
				<!--	<span>-->
				<!--		<a href="--><?php //esc_url( the_permalink() ); ?><!--" rel="bookmark">-->
				<!--			--><?// if ( has_post_thumbnail( $post->ID ) ) { ?>
				<!--				--><?// the_post_thumbnail( 'full' ); ?>
				<!--			--><?// } else { ?>
				<!--				--><?// the_title( '', '' ); ?>
				<!--			--><?// } ?>
				<!--		</a>-->
				<!--	</span>-->
				<!--</article>-->
			<?php } // endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
