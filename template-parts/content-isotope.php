<?php
/**
 * the template for isotope homepage
 *
 *
 * @package anissa
 */

?>

<div id="post-<?php the_ID(); ?>"  
     class="blog-items" 
	 style="background-image:url('<?php echo the_post_thumbnail_url() ?>');
	 		background-size: cover;
	 		background-position: center;">
	<h2> <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a> </h2>
</div>
