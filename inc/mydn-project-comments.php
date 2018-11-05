<?php
/**
 * Custom comments function
 */
function mydn_project_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);
  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }

  $mydn_comment_class = get_comment_meta( $comment->comment_ID, 'mydn-task-comment-class', true );
  if ( empty($mydn_comment_class) ){ ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php } else { ?>
    <<?php echo $tag ?> <?php comment_class( $mydn_comment_class ) ?> id="comment-<?php comment_ID() ?>">
  <?php } ?>
  <?php if ( 'div' != $args['style'] ) : ?>
  
  <div id="div-comment-<?php comment_ID() ?>" class="comment-content">
    <?php endif; ?>

    <?php if ( empty($mydn_comment_class) ){ ?>
      <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      </div>
      <!-- <div class="the-comment"> -->
      <div class="comment-meta commentmetadata">
        <span class="comment-author"><?php comment_author(); ?></span> <br />
        <span class="comment-time"><?php comment_date(); ?> at <?php comment_time(); ?></span>
      </div>

      <div class="clear"> </div>
    <?php } ?>
    <div class="comment-text">
      <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
        <br />
      <?php endif; ?>

      <?php comment_text(); ?>
    </div>

    <?php if ( empty($mydn_comment_class) ){ ?>
    <div class="reply">
      <?php edit_comment_link( __( '<i class="fa fa-pencil"></i> Edit' ), '', '' ); ?>
      <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      <a class="comment-link" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><i class="fa fa-link"></i> Comment Permalink</a>
    </div>
    <?php } else { ?>
      <cite>- <?php comment_author(); ?> - <?php comment_date(); ?> at <?php comment_time(); ?></cite>
    <?php } ?>
    <!-- </div> -->
    <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif; ?>
<?php
}