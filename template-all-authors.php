<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bureau Theme
 *
 * Template Name: Regulatory Team
 */

get_header(); ?>

	<div id="primary" class="content-area column nine">
		<main id="main" class="site-main" role="main">
      <h1 class="page-title">Meet ICC's Regulatory Team</h1>
      <?php while ( have_posts() ) { the_post(); the_content(); }

      $users = new WP_User_Query( array( 'role' => 'contributor' ) );
      if( ! empty( $users->results ) ) {
        foreach( $users->results as $user ) { ?>
          <div class="regulatory-team-member">
            <div class="team-member-image"><?php echo get_avatar( $user->ID ); ?></div>
            <div class="team-member-info">
              <div class="team-member-name"><?php echo $user->display_name; ?></div>
              <div class="team-member-bio"><p><?php the_author_meta( 'description', $user->ID ); ?></p></div>
              <div class="team-member-links"><a href="">View <?php the_author_meta( 'first_name', $user->ID ); ?>'s Posts</a></div>
            </div>
            <div class="clear"></div>
          </div>
        <?php }
      } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
