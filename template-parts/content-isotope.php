<?php
/**
 * the template for isotope homepage
 *
 *
 * @package anissa
 */

?>

<div id="post-<?php the_ID(); ?>"  <?php post_class('blog-items'); ?>>
	<?php the_post_thumbnail('anissa-blog'); ?>
</div>
