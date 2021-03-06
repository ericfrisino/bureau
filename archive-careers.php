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


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">Work With Us!</h1>
			</header><!-- .page-header -->

			<p><strong>Careers with ICC Compliance Center</strong> ICC Compliance Center is a leader in providing an extensive range of products and services to help industry comply with domestic and international regulations for shipping or handling hazardous materials. You can become part of ICC's team and benefit from a challenging and rewarding work environment. <a href="aboutus">Learn more about us »</a></p>

			<p><em>As we continue to grow, we are always looking to fill positions with talented individuals. Feel free to submit a resume, even if you do not see a posting for your desired position. Email resumes to hr@thecompliancecenter.com.</em></p>

			<h2>Current Career Opportunities Available:</h2>

			<? $terms = get_terms( array(
				'taxonomy' => 'careers-country',
				'hide_empty' => false,
			) );

			// echo '<pre>'; print_r( $terms ); echo '</pre>'; ?>

			<div class="careers-by-country-outer-container">

				<? foreach ( $terms as $term ) {

					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'careers' ),
						'post_status'            => array( 'publish' ),
						'posts_per_page'         => '-1',
						'order'                  => 'ASC',
						'orderby'                => 'title',
						'tax_query' => array(
							array(
								'taxonomy' => 'careers-country',
								'field'    => 'slug',
								'terms'    => $term->slug,
							),
						),
					);

					// The Query
					$query_careers_by_country = new WP_Query( $args ); ?>

					<div class="careers-by-country-inner-container">
						<h3><? echo $term->name; ?></h3>

						<? // The Loop
						if ( $query_careers_by_country->have_posts() ) {
							while ( $query_careers_by_country->have_posts() ) {
								$query_careers_by_country->the_post(); ?>
								<div class="career-container">
									<a href="<? esc_url( the_permalink() ); ?>"><h4><? the_title(); ?></h4></a>
									<div class="the-location">Miss</div>
								</div>
							<? }
						} else { ?>
							<div class="career-container">
								There are currently no opportunities here, however as we continue to grow, we are always looking to fill positions with talented individuals. Feel free to submit a resume, even if you do not see a posting for your desired position. Email resumes to hr@thecompliancecenter.com.
							</div>
						<? }

						// Restore original Post Data
						wp_reset_postdata(); ?>
					</div>


				<? } ?>
			</div>


			<h2>Accessibility for Ontarians with Disabilities</h2>

			<h3>Accessibility</h3>
			<p>ICC Compliance Center is committed to improving and maintaining excellence in serving all persons including persons with disabilities. Our actions and interactions will be based on the principles of:<p>
			<ul class="disc">
				<li><strong>Independence</strong> - allowing a person with a disability to do things on their own without unnecessary help, or interference from others; Dignity – service is provided in a way that allows the person with a disability to maintain self-respect and the respect of other people. Persons with disabilities are not treated as an afterthought or forced to accept lesser service, quality, or convenience;</li>
				<li><strong>Integration</strong> – service is provided in a way that allows the person with a disability to benefit from the same services, in the same place, and in the same or similar way as other customers, unless an alternate measure is necessary to enable the person to access products or services; and</li>
				<li><strong>Equal opportunity</strong> – persons with disabilities have an opportunity equal to that given to others to access products or services We will put policies into practice as required by the Accessibility for Ontarians with Disabilities Act. All staff are trained and know how to communicate with persons with disabilities. Ongoing training will be provided to staff who interact with the public on behalf of ICC Compliance Center.</li>
			</ul>

			<h3>Service Dogs</h3>
			<p>Persons with disabilities and their service dogs are welcome; however, there may be areas where service animals may not be permitted due to health and safety reasons. Where access may be restricted alternate arrangements will be considered.</p>

			<h3>Disruption to Services</h3>
			<p>Notification will be provided to the public if there is an interruption in ICC Compliance Center’s ability to provide service to persons with disabilities. The notification will include the length of disruption, cause, and how persons with disabilities can access our facilities.</p>

			<h3>Information and Communications</h3>
			<p>ICC Compliance Center is committed to meeting the communication needs of persons with disabilities. When asked, we will provide information and communications materials in accessible formats or with communication supports. This includes publicly available information about our products, services, training, and facilities, as well as publicly available emergency information. We will consult with persons with disabilities to determine their information and communication needs. A copy of ICC Compliance Center’s customer service standard is available upon request.</p>

			<h3>Feedback Process</h3>
			<p>Customers or applicants who wish to provide feedback on the way ICC Compliance Center provides products, services, or training to persons with disabilities, or the AODA may send a confidential email to Access.Ontario@thecompliancecenter.com or call 905-890-7228. A response will be provided within five (5) business days. Alternatively, an appointment can be made with ICC Compliance Center’s VP and General Manager.</p>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
