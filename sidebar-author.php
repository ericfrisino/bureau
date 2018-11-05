<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Federation Theme
 */

// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 	return;
// }
?>

<div id="secondary" class="widget-area column three" role="complementary">
  
  <!-- Author Biography -->
  <aside class="widget assigned-cards">
    <h1 class="widget-title"><?php the_author_meta( 'display_name' ); ?></h1>
    <p><span style="float:left; margin: 8px 10px 0 0;"><?php echo get_simple_local_avatar( get_the_author_meta( 'id' ) ); ?></span> <?php the_author_meta( 'description' ); ?></p>
    <div class="clear"></div>
  </aside>

  <!-- TODO: Convert to 'Author Teaches' Sidebar -->
  <!-- AUTHOR TEACHES -->
  <!--<aside class="widget assigned-projects">-->
  <!--  <h1 class="widget-title">Classes --><?php //the_author_meta( 'first_name' ); ?><!-- Teaches</h1>-->
  <!--  <ul>-->
  <!--    <li>List of Upcoming classes.</li>-->
  <!--  </ul>-->
  <!--</aside>-->

  <!-- TODO: Convert to 'Speaking Engatements' Sidebar -->
  <!-- SPEAKING ENGAGEMENTS -->
  <!--<aside class="widget assigned-projects">-->
  <!--  <h1 class="widget-title">Speaking Engagements</h1>-->
  <!--  <ul>-->
  <!--    <li>List of Upcoming speaking engagements.</li>-->
  <!--  </ul>-->
  <!--</aside>-->

  <!-- TODO: Convert to 'Author Post List' Sidebar -->
  <!-- AUTHOR POST LIST -->
  <!--<aside class="widget assigned-projects">-->
  <!--  <h1 class="widget-title">--><?php //the_author_meta( 'first_name' ); ?><!--'s Posts</h1>-->
  <!--  <ul>-->
  <!--    <li>List of posts...</li>-->
  <!--  </ul>-->
  <!--</aside>-->


</div><!-- #secondary -->
