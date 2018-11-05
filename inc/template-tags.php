<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Federation Theme
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php if( class_exists( 'Polylang') ) { pll_e( 'Posts navigation' ); } else { echo 'Post navigation'; } ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) {
				if( class_exists( 'Polylang') ) {
					$old_post = pll__( 'Older posts' );
					$new_post = pll__( 'Newer posts' );
				} else {
					$old_post = 'Older posts';
					$new_post = 'Newer posts';
				}?>

			<div class="nav-previous"><?php next_posts_link( $old_post ); ?></div>
			<?php } ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( $new_post ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'fdn' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'fdn_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function fdn_posted_on() {

		if( class_exists( 'Polylang') ) {
			$posted_on = pll__( 'Posted on' ) . ' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date( 'M j, Y' ) . '</a> ';
			$byline    = pll__( 'by' ) . ' <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		} else {
			$posted_on = 'Posted on' . ' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date( 'M j, Y' ) . '</a> ';
			$byline    = 'by' . ' <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		}

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

	}// function fdn_posted_on()
}// if ! function_exists( 'fdn_posted_on' )

if ( ! function_exists( 'fdn_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fdn_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ' ', 'fdn' ) );
		if ( $categories_list && fdn_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '%1$s', 'fdn' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( '', 'fdn' ) );
		if ( $tags_list ) {
			printf( '<span class="tag-links">' . __( '%1$s', 'fdn' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		if( class_exists( 'Polylang') ) {
			comments_popup_link( pll__( 'Leave a comment' ), pll__( '1 Comment' ), pll__( '% Comments' ) );
		} else {
			comments_popup_link( 'Leave a comment' , '1 Comment' , '% Comments' );
		}
		echo '</span>';
	}

	if( class_exists( 'Polylang') ) {
		edit_post_link( pll__( 'Edit' ), '<span class="edit-link">', '</span>' );
	} else {
		edit_post_link( 'Edit', '<span class="edit-link">', '</span>' );
	}
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if( class_exists( 'Polylang') ) {
		if ( is_category() ) {
			$title = sprintf( pll__( 'Category: %s' ), single_cat_title( '', FALSE ) );
		} elseif ( is_tag() ) {
			$title = sprintf( pll__( 'Tag: %s' ), single_tag_title( '', FALSE ) );
		} elseif ( is_author() ) {
			$title = sprintf( pll__( 'Author: %s' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( pll__( 'Year: %s' ), get_the_date( _x( 'Y', pll__( 'Yearly archives date format' ) ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( pll__( 'Month: %s' ), get_the_date( _x( 'F Y', pll__( 'Monthly archives date format' ) ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( pll__( 'Day: %s' ), get_the_date( _x( 'F j, Y', pll__( 'Daily archives date format' ) ) ) );
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( '%s', 'fdn' ), post_type_archive_title( '', FALSE ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%2$s', 'fdn' ), single_term_title( '', FALSE ) );
		} else {
			$title = __( 'Archives', 'fdn' );
		}
	} else {
		if ( is_category() ) {
			$title = sprintf( 'Category: %s', single_cat_title( '', FALSE ) );
		} elseif ( is_tag() ) {
			$title = sprintf( 'Tag: %s', single_tag_title( '', FALSE ) );
		} elseif ( is_author() ) {
			$title = sprintf( 'Author: %s', '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( 'Year: %s', get_the_date( _x( 'Y', pll__( 'Yearly archives date format' ) ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( 'Month: %s', get_the_date( _x( 'F Y', pll__( 'Monthly archives date format' ) ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( 'Day: %s', get_the_date( _x( 'F j, Y', pll__( 'Daily archives date format' ) ) ) );
		}  elseif ( is_post_type_archive() ) {
			$title = sprintf( __( '%s', 'fdn' ), post_type_archive_title( '', FALSE ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%2$s', 'fdn' ), single_term_title( '', FALSE ) );
		} else {
			$title = __( 'Archives', 'fdn' );
		}
	}
	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fdn_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fdn_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fdn_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fdn_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fdn_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in fdn_categorized_blog.
 */
function fdn_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fdn_categories' );
}
add_action( 'edit_category', 'fdn_category_transient_flusher' );
add_action( 'save_post',     'fdn_category_transient_flusher' );
