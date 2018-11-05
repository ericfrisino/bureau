<?php
/**
 * @package Federation Theme
 */
?>


<tr>
	<td><? echo get_the_date(); ?> - <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></td>
</tr>