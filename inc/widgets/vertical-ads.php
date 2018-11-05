<?php
/**
 * Created by PhpStorm.
 * User: holmes
 * Date: 8/17/17
 * Time: 3:09 PM
 */

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'icc-vertical-feet',

			// Widget name will appear in UI
			__('Vertical Ads', 'wpb_widget_domain'),

			// Widget description
			array( 'description' => __( 'Show ads in the sidebar', 'wpb_widget_domain' ), )
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) { echo $args['before_title'] . $title . $args['after_title']; }

			// This is where you run the code and display the output
			this:$this->display_ad();

			// After widget arguments are defined by themes and displayed here.
			echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
	// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

	public function display_ad() {
		// WP_Query arguments

		// Get current post id.
		$current_post_id = get_the_ID();
		// display the current post id.
		// echo '<span style="color:black;">Current Post ID: ' . get_the_ID() . '</span><br />';

		// Get the tags associated with the current posts.
		$current_post_tags = wp_get_post_tags( $current_post_id );
		// Display the tags associated with the current post.
		// echo '<span style="color:black;">';
		// var_dump( $current_post_tags );
		// echo '</span>';

		// Create variable to assign terms to for querying vertical ads.
		$current_post_tags_for_query = array();

		// Build array of tags associated with the current post.
		foreach ( $current_post_tags as $current_post_tag ) {
			// echo '<span style="color:black;">' . $current_post_tag->term_id . '</span><br />';
			// Add each tag to an array.
			array_push( $current_post_tags_for_query, $current_post_tag->term_id  );
			// Show array as it is being built.
			// echo '<span style="color:black;">';
			// var_dump( $current_post_tags_for_query );
			// echo '</span>';
		}


		$args = array(
			'post_type'              => array( 'vertical_feet' ),
			'post_status'            => array( 'publish' ),
			'nopaging'               => false,
			'posts_per_page'         => '2',
			'orderby'                => 'rand',
			'tag__in'								 => $current_post_tags_for_query,
		);

		// The Query
		$vertical_ad_query = new WP_Query( $args );

		// Dump the Query.
		// echo '<span style="color:black;">';
		// var_dump( $vertical_ad_query );
		// echo '</span>';

		// The Loop
		if ( $vertical_ad_query->have_posts() ) {
			while ( $vertical_ad_query->have_posts() ) {
				$vertical_ad_query->the_post();
				the_content();
			}

			// Restore original Post Data
			wp_reset_postdata();
		} else {

			// echo '<span style="color:black;"> no ads found </span>';

			$args_generic = array(
				'post_type'              => array( 'vertical_feet' ),
				'post_status'            => array( 'publish' ),
				'nopaging'               => false,
				'posts_per_page'         => '2',
				'orderby'                => 'rand',
			);

			// The Query
			$vertical_ad_query_generic = new WP_Query( $args_generic );

			// The Loop
			if ( $vertical_ad_query_generic->have_posts() ) {
				while ( $vertical_ad_query_generic->have_posts() ) {
					$vertical_ad_query_generic->the_post();
					the_content();
				}

				// Restore original Post Data
				wp_reset_postdata();
			} else {
				// echo '<span style="color:black;"> no generic ads found </span>';
			}

		}


	}
} // Class wpb_widget ends here