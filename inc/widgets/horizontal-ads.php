<?php
/**
 * Created by PhpStorm.
 * User: holmes
 * Date: 8/21/17
 * Time: 1:47 PM
 */


// Register and load the widget
function load_horizontal_feet_widget() {
	register_widget( 'horizontal_feet_widget' );
}
add_action( 'widgets_init', 'load_horizontal_feet_widget' );

// Creating the widget
class horizontal_feet_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

		// Base ID of your widget
			'icc-horizontal-feet',

			// Widget name will appear in UI
			__('Horizontal Ads', 'horizontal_feet_widget_domain'),

			// Widget description
			array( 'description' => __( 'Show ads under single posts', 'horizontal_feet_widget_domain' ), )
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
			$title = __( 'New title', 'horizontal_feet_widget_domain' );
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
		$args = array(
			'post_type'              => array( 'horizontal_feet' ),
			'post_status'            => array( 'publish' ),
			'nopaging'               => true,
			'posts_per_page'         => '2',
			'orderby'                => 'rand',
		);

		// The Query
		$horizontal_ad_query = new WP_Query( $args );

		// The Loop
		if ( $horizontal_ad_query->have_posts() ) {
			while ( $horizontal_ad_query->have_posts() ) {
				$horizontal_ad_query->the_post();
				the_content();
			}
		} else {
			echo 'no ads found';
		}

		// Restore original Post Data
		wp_reset_postdata();
	}
} // Class horizontal_feet_widget ends here