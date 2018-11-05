<?php
/**
 * Created by PhpStorm.
 * User: holmes
 * Date: 8/17/17
 * Time: 3:09 PM
 */

// Register and load the widget
function iccwebsec_load_widget() {
	register_widget( 'yearly_archives' );
}
add_action( 'widgets_init', 'iccwebsec_load_widget' );

// Creating the widget
class yearly_archives extends WP_Widget {

	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'yearly-archives',

			// Widget name will appear in UI
			__('Yearly Archives', 'yearly_archives_domain'),

			// Widget description
			array( 'description' => __( 'Show Yearly Archives', 'yearly_archives_domain' ), )
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) { echo $args['before_title'] . $title . $args['after_title']; }

			// This is where you run the code and display the output
			this:$this->display_yearly_archive();

			// After widget arguments are defined by themes and displayed here.
			echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Yearly Archives', 'yearly_archives_domain' );
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

	public function display_yearly_archive() {


		$args = array(
			'type'            => 'yearly',
			'limit'           => '',
			'format'          => 'html',
			'before'          => '',
			'after'           => '',
			'show_post_count' => false,
			'echo'            => 1,
			'order'           => 'DESC',
			'post_type'     => 'press'
		);
		echo '<ul class="widget_yearly-archives">';
			wp_get_archives( $args );
			echo '<li><a href="' . get_site_url( NULL, '/press/' ) .'">See All Press Releases</a></li>';
		echo "</ul>";


	}
} // Class yearly_archives ends here