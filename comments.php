<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Federation Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'fdn' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php if( class_exists( 'Polylang') ) { pll_e( 'Comment navigation' ); } else { echo 'Comment navigation'; } ?></h1>
			<div class="nav-previous"><?php if( class_exists( 'Polylang') ) { previous_comments_link( pll__( '&larr; Older Comments' ) ); } else { previous_comments_link( '&larr; Older Comments' ); } ?></div>
			<div class="nav-next"><?php if( class_exists( 'Polylang') ) { next_comments_link( pll__( 'Newer Comments &rarr;' ) ); } else { next_comments_link( 'Newer Comments &rarr;' ); } ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php if( class_exists( 'Polylang') ) { pll_e( 'Comment navigation' ); } else { echo 'Comment navigation'; } ?></h1>
			<div class="nav-previous"><?php if( class_exists( 'Polylang') ) { previous_comments_link( pll__( '&larr; Older Comments' ) ); } else { previous_comments_link( '&larr; Older Comments' ); } ?></div>
			<div class="nav-next"><?php if( class_exists( 'Polylang') ) { next_comments_link( pll__( 'Newer Comments &rarr;' ) ); } else { next_comments_link( 'Newer Comments &rarr;' ); } ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php if( class_exists( 'Polylang') ) { pll_e( 'Comments are closed.' ); } else { echo 'Comments are closed.'; } ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
