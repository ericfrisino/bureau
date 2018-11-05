<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Bureau Theme
 */

//if ( ! is_active_sidebar( 'sidebar-1' ) ) {
//	return;
//}
?>

<div id="secondary" class="widget-area column three" role="complementary">

	<? dynamic_sidebar( 'infographic-single-top' ); ?>

	<!-- Infographic Title -->
	<aside class="widget assigned-cards">
		<h1 class="widget-title" style="text-align:center; line-height:1.25em;"><?php the_title(); ?></h1>
		<?php // Check if there is a description, if there is, display it.
		$infographic_description = get_post_meta( $id, 'infographic_description', true );

		if( !empty( $infographic_description ) ) {
			echo '<p>' . $infographic_description . '</p>';
		}

	  // Check if there is a featured image, if there is display it.
		the_post_thumbnail( 'medium' ); ?>
	</aside>

	<?php // Retrieve the sharing option.
	$infographic_share = get_post_meta( $id, 'infographic_share', true );
	// If the sharing option is engaged, show the sharing buttons.
	if( $infographic_share ) { ?>
		<aside class="widget assigned-cards">
			<h1 class="widget-title" style="line-height:1.25em;"><? if( class_exists( 'Polylang') ) { pll__( 'Share this infographic!' ); } else { echo 'Share this infographic!'; } ?></h1>
			<?php // write some code to share this. ?>
		</aside>
	<?php } // end if( $infographic_share )?>

	<?php // Retrieve download link information
	$infographic_link_large_img = get_post_meta( $id, 'infographic_link_large_img', true );
	$infographic_link_tall_img  = get_post_meta( $id, 'infographic_link_tall_img', true );
	$infographic_link_tall_pdf  = get_post_meta( $id, 'infographic_link_tall_pdf', true );
	$infographic_link_split_img = get_post_meta( $id, 'infographic_link_split_img', true );
	$infographic_link_split_pdf = get_post_meta( $id, 'infographic_link_split_pdf', true );
	// If any of the above data exists show it.
	if( $infographic_link_large_img || $infographic_link_tall_img || $infographic_link_tall_pdf || $infographic_link_split_img || $infographic_link_split_pdf ) { ?>
		<aside class="widget assigned-cards">
			<h1 class="widget-title" style="line-height:1.25em;">View &amp; Download</h1>
			<? if( class_exists( 'Polylang') ) { ?>
				<ul>
					<?php if( $infographic_link_large_img ) { echo '<li><a href="' . $infographic_link_large_img . '">' . pll__( "View full image" ) . '</a></li>'; } ?>
					<?php if( $infographic_link_tall_img ) { echo '<li><a href="' . $infographic_link_tall_img . '">' . pll__( "Download tall image" ) . '</a></li>'; } ?>
					<?php if( $infographic_link_tall_pdf ) { echo '<li><a href="' . $infographic_link_tall_pdf . '">' . pll__( "Download tall pdf" ) . '</a></li>'; } ?>
					<?php if( $infographic_link_split_img ) { echo '<li><a href="' . $infographic_link_split_img . '">' . pll__( "Download split image" ) . '</a></li>'; } ?>
					<?php if( $infographic_link_split_pdf ) { echo '<li><a href="' . $infographic_link_split_pdf . '">' . pll__( "Download split pdf" ) . '</a></li>'; } ?>
				</ul>
			<? } else { ?>
				<ul>
					<?php if( $infographic_link_large_img ) { echo '<li><a href="' . $infographic_link_large_img . '">View full image</a></li>'; } ?>
					<?php if( $infographic_link_tall_img ) { echo '<li><a href="' . $infographic_link_tall_img . '">Download tall image</a></li>'; } ?>
					<?php if( $infographic_link_tall_pdf ) { echo '<li><a href="' . $infographic_link_tall_pdf . '">Download tall pdf</a></li>'; } ?>
					<?php if( $infographic_link_split_img ) { echo '<li><a href="' . $infographic_link_split_img . '">Download paged image</a></li>'; } ?>
					<?php if( $infographic_link_split_pdf ) { echo '<li><a href="' . $infographic_link_split_pdf . '">Download paged pdf</a></li>'; } ?>
				</ul>
			<? } //End class_exists ?>
		</aside>
	<?php } // end if( $infographic_link_large_img || $infographic_link_tall_img || $infographic_link_tall_pdf || $infographic_link_split_img || $infographic_link_split_pdf ) ?>

	<?php dynamic_sidebar( 'infographic-single-bottom' ); ?>
	
</div><!-- #secondary -->