<?php
/**
 * Federation Theme functions and definitions
 *
 * @package Federation Theme
 */


define("THEME_DIR", get_template_directory() );


@ini_set( 'upload_max_size' , '512M' );
@ini_set( 'post_max_size', '512M');
@ini_set( 'max_execution_time', '3000' );


/**
 * Add theme support for custom logos.
 *
 * REMOVED AND REPLACED WITH TRANSLATEABLE SETUP!
 */
//add_theme_support( 'custom-header' );

function icc_site_logo() {
	$args = array(
		'width'         => 458,
		'height'        => 125,
		'default-image' => 'http://icc.pub/cms/blog/theme-icon-default.png',
	);
	add_theme_support( 'custom-header', $args );
}
// add_action( 'after_setup_theme', 'icc_site_logo' );


/**
 * Setup Federation Theme
 */
require THEME_DIR . '/inc/theme-setup.php';

/**
 * Setup Federation Theme
 */
require THEME_DIR . '/inc/register-widget-areas.php';

/**
 * Enqueue scripts and styles.
 */
require THEME_DIR . '/inc/enqueue-scripts-styles.php';

/**
 * Implement the Custom Header feature.
 */
require THEME_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THEME_DIR . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require THEME_DIR . '/inc/extras.php';

/**
 * Customizer additions.
 */
require THEME_DIR . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require THEME_DIR . '/inc/jetpack.php';

/**
 * Load Project Comments.
 */
require THEME_DIR . '/inc/mydn-project-comments.php';

/**
 * Load WooCommerce Customization.
 */
require THEME_DIR . '/inc/woocommerce/woocommerce.php';

/**
 * Load Custom Widgets.
 */
require THEME_DIR . '/inc/widgets/vertical-ads.php';
require THEME_DIR . '/inc/widgets/horizontal-ads.php';
require THEME_DIR . '/inc/widgets/yearly-archives.php';


add_theme_support( 'post-thumbnails' );

/**
 * Allow HTML in the User Description.
 */
remove_filter('pre_user_description', 'wp_filter_kses');


/**
 * Register strings for translation
 */
if( class_exists( 'Polylang') ) {
	// Hopemage - header
	pll_register_string( 'Welcome [NAME]', 'Welcome', 'Theme - Header', false );
	pll_register_string( 'Edit Profile', 'Edit Profile', 'Theme - Header', false );
	pll_register_string( 'View Profile', 'View Profile', 'Theme - Header', false );
	pll_register_string( 'Log Out', 'Log Out', 'Theme - Header', false );
	pll_register_string( 'Primary Menu', 'Primary Menu', 'Theme - Header', false );
	pll_register_string( 'Logo', 'Logo', 'Theme - Header', false );


	// Post Pages
	pll_register_string( 'Edit Post', 'Edit', 'Theme - Posts', false );
	pll_register_string( 'Leave a Comment', 'Leave a Comment', 'Theme - Posts', false );
	pll_register_string( 'Posted on', 'Posted on', 'Theme - Posts', false );
	pll_register_string( 'by', 'by', 'Theme - Posts', false );
	pll_register_string( 'Continue Reading »', 'Continue Reading »', 'Theme - Posts', false );


	// Template Tags
	pll_register_string( 'Older posts', 'Older posts', 'Theme - Template Tags', false );
	pll_register_string( 'Newer Posts', 'Newer Posts', 'Theme - Template Tags', false );
	pll_register_string( 'Thought on', 'Thought on', 'Theme - Template Tags', false );
	pll_register_string( 'Thoughts on', 'Thoughts on', 'Theme - Template Tags', false );
	pll_register_string( 'Posts Navigation', 'Posts Navigation', 'Theme - Template Tags', false );
	pll_register_string( 'Comment navigation', 'Comment navigation', 'Theme - Template Tags', false );
	pll_register_string( 'Leave a Comment', 'Leave a Comment', 'Theme - Template Tags', false );
	pll_register_string( 'Older Comments', 'Older Comments', 'Theme - Template Tags', false );
	pll_register_string( 'Newer Comments', 'Newer Comments', 'Theme - Template Tags', false );
	pll_register_string( 'Comments are closed.', 'Comments are closed.', 'Theme - Template Tags', false );
	pll_register_string( 'Yearly archives date format', 'Yearly archives date format', 'Theme - Template Tags', false );
	pll_register_string( 'Monthly archives date format', 'Monthly archives date format', 'Theme - Template Tags', false );
	pll_register_string( 'Daily archives date format', 'Daily archives date format', 'Theme - Template Tags', false );
	pll_register_string( 'Menu', 'Menu', 'Plugin - Theme - Template Tags', false );



	// Infographic
	pll_register_string( 'View full image', 'View full image', 'Plugin - Infographics', false );
	pll_register_string( 'Download tall image', 'Download tall image', 'Plugin - Infographics', false );
	pll_register_string( 'Download tall pdf', 'Download tall pdf', 'Plugin - Infographics', false );
	pll_register_string( 'Download split image', 'Download split image', 'Plugin - Infographics', false );
	pll_register_string( 'Download split pdf', 'Download split pdf', 'Plugin - Infographics', false );
	pll_register_string( 'Share this infographic!', 'Share this infographic!', 'Plugin - Infographics', false );


	// Plugin - Press Contact
	pll_register_string( 'For more information please contact:', 'For more information please contact:', 'Plugin - Press Contact', FALSE );
	pll_register_string( 'Marketing Manager', 'Marketing Manager', 'Plugin - Press Contact', FALSE );
	pll_register_string( 'Tel:', 'Tel:', 'Plugin - Press Contact', FALSE );

	
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
//	pll_register_string( 'by', 'by', 'Plugin - Infographics', false );
}




//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');


/**
 * do not allow WP to auto insert paragraphs in Infographics content
 */
function disable_wpautop_cpt( $content ) {
	'infographic' === get_post_type() && remove_filter( 'the_content', 'wpautop' );
	return $content;
}
add_filter( 'the_content', 'disable_wpautop_cpt', 0 );


/**
 * Enable shortcodes in widgets.
 * Used for footers, so they can be changes network-wide.
 */
add_filter('widget_text', 'do_shortcode');






















/**
 * Adds icc_author_bio_widget widget.
 */
class icc_author_bio_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'icc-author-bio', // Base ID
			__( 'Author Biography', 'text_domain' ), // Name
			array( 'description' => __( 'Adds avatar & biography of author.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( is_singular( 'post' ) ) {
			echo $args['before_widget'];
			//if ( ! empty( $instance['title'] ) ) {
			//	echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			//}

			echo $args['before_title'];
			the_author_meta( 'display_name' );
			echo $args['after_title'];

			?><p>
				<span style="float:left; margin: 8px 10px 0 0;"><?php echo get_simple_local_avatar( get_the_author_meta( 'id' ) ); ?></span>
				<? $author_bio = get_the_author_meta( 'description' );
				if( empty( $author_bio ) ) {
					echo '<div class="clear"></div>';
				} else {
					the_author_meta( 'description' );
				}; ?>
			</p><?

			echo $args['after_widget'];
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<!--<p>-->
		<!--	<label for="--><?php //echo $this->get_field_id( 'title' ); ?><!--">--><?php //_e( 'Title:' ); ?><!--</label>-->
		<!--	<input class="widefat" id="--><?php //echo $this->get_field_id( 'title' ); ?><!--" name="--><?php //echo $this->get_field_name( 'title' ); ?><!--" type="text" value="--><?php //echo esc_attr( $title ); ?><!--">-->
		<!--</p>-->
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class icc_author_bio_widget


// register icc_author_bio_widget widget
function register_icc_author_bio_widget() {
	register_widget( 'icc_author_bio_widget' );
}
add_action( 'widgets_init', 'register_icc_author_bio_widget' );






















/* Removing Tags for users */
if (is_admin()) {
	function my_remove_meta_boxes() {
		if ( ! current_user_can( 'publish_posts' ) ) {
			remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
			remove_meta_box( 'categorydiv', 'post', 'normal' );
		}
	}

	add_action( 'admin_menu', 'my_remove_meta_boxes' );
}












add_filter( 'slack_get_events', function( $events ) {
	$events['user_login'] = array(
		'action'      => 'wp_login',
		'description' => __( 'When user logs in', 'slack' ),
		'message'     => function( $user_login ) {
			return sprintf( '%s Just Logged-in to the Regulatory Blog', $user_login );
		}
	);

	return $events;
} );






















// Remove the sharing buttons from default location
// Put them back in in the theme files where you want them with the following code...
// if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); }
function jptweak_remove_share() {
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}

add_action( 'loop_start', 'jptweak_remove_share' );


















// Remove the related posts.
// Put them back in the theme where you want them with the following code...
// if ( class_exists( 'Jetpack_RelatedPosts' ) ) { echo do_shortcode( '[jetpack-related-posts]' ); }
function jetpackme_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );
















// Show Info will be sent in email.
function bureau_email_coming() {
	// 50 - Generic Contact form
	// 72 - SecurePack Quote Request
	if ( is_page( array( 50, 'assembly-quote-request-thank' ) ) ) {
		echo '<div class="email-coming">You will receive an email shortly summarizing your submission.</div>';
	}
}
add_action( 'icc_after_the_content', 'bureau_email_coming', 10 );



// Show Link to referring page.
// 72 - SecurePack Quote Request
function bureau_link_to_referrer() {
	if( is_page( 'assembly-quote-request-thank'  ) ) {
		$referrer = isset( $_GET['referrer'] ) ? $_GET['referrer'] : null;
		if ( $referrer != null ) {
			echo '<div class="referrer-link"><a href="' . $referrer . '">Return to referring page</div>';
		}
	}
}
add_action( 'icc_after_the_content', 'bureau_link_to_referrer', 20 );






/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */

if( class_exists( 'woocommerce') ) {
	function grd_woocommerce_script_cleaner() {
		//remove generator meta tag
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

		//first check that woo exists to prevent fatal errors
		if ( function_exists( 'is_woocommerce' ) ) {
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
				//wp_dequeue_style( 'woocommerce_frontend_styles' );
				//wp_dequeue_style( 'woocommerce_fancybox_styles' );
				//wp_dequeue_style( 'woocommerce_chosen_styles' );
				//wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				//wp_dequeue_script( 'wc_price_slider' );
				//wp_dequeue_script( 'wc-single-product' );
				//wp_dequeue_script( 'wc-add-to-cart' );
				//wp_dequeue_script( 'wc-cart-fragments' );
				//wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				//wp_dequeue_script( 'wc-single-product' );
				//wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				//wp_dequeue_script( 'woocommerce' );
				//wp_dequeue_script( 'prettyPhoto' );
				//wp_dequeue_script( 'prettyPhoto-init' );
				//wp_dequeue_script( 'jquery-blockui' );
				//wp_dequeue_script( 'jquery-placeholder' );
				//wp_dequeue_script( 'fancybox' );
				//wp_dequeue_script( 'jqueryui' );
			}
		}

	}

	add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 200 );
}












// Remove Auto P from custom post types added with this plugin.
$cpts = ['ads', 'horizontal_ads', 'vertical_ads'];
if ( in_array( get_post_type(), $cpts ) ) {
	remove_filter( 'the_content', 'wpautop' );
}















