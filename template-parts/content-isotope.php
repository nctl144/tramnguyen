<?php
/**
 * the template for isotope homepage
 *
 *
 * @package anissa
 */

?>

<div id="post-<?php the_ID(); ?>"  
     <?php post_class('blog-items'); ?> 
	 style="background-image:url('<?php echo the_post_thumbnail_url() ?>');
	 		background-size: cover;
	 		background-position: center;">
	<h2> <?php echo get_the_title() ?> </h2>
</div>
