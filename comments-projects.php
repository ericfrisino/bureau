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
		<!-- <h2 class="comments-title">
			<?php
				printf( _nx( 'One Project Update', '%1$s Project Updates', get_comments_number(), 'comments title', 'aeq' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2> -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'aeq' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'aeq' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'aeq' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'mydn_project_comments' // this is where you call your function.
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'aeq' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'aeq' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'aeq' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'aeq' ); ?></p>
	<?php endif; ?>

	<?php
	$form_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => __( 'Add Project Update' ),
	  'title_reply_to'    => __( 'Leave a Project Update to %s' ),
	  'cancel_reply_link' => __( 'Cancel Project Update' ),
	  'label_submit'      => __( 'Post Project Update' ),

	  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Add Project Update', 'noun' ) .
	    '</label><textarea id="comment" name="comment" rows="8" aria-required="true" style="width:100%;">' .
	    '</textarea></p>',

	  'must_log_in' => '', /*<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post an update.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>*/

	  'logged_in_as' => '', /*<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>*/

	  'comment_notes_before' => '', /*'<p class="comment-notes">' .
	    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	    '</p>',*/

	  'comment_notes_after' => '',

	  'fields' => '', //apply_filters( 'comment_form_default_fields', $fields ),
	);



	comment_form( $form_args ); ?>

</div><!-- #comments -->
