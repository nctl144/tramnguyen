<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package anissa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'anissa' ); ?></a>
	<div id="menu-mobile">
		<?php
			wp_nav_menu(array( 
				'theme_location' => 'primary', 
				'menu_id' => 'primary-menu',
				'container' => 'nav' 
			));
		?>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php if (has_nav_menu('social')) : ?>
				<?php wp_nav_menu( array(
									'theme_location'  => 'social',
									'depth'           => 1,
									'link_before'     => '<span class="screen-reader-text">',
									'link_after'      => '</span>',
									'container_class' => 'social-links grid-66', ) ); ?>
			<?php endif; ?>
			<button id="menu-button-open" class="<?php 
				if (has_nav_menu('social')) {
					echo "grid-33";
				} else {
					echo "grid-100";
				}; 
			?> hamburger hamburger--collapse" type="button">
			   <span class="hamburger-box">
			      <span class="hamburger-inner"></span>
			   </span>
			</button>
		</nav><!-- #site-navigation -->

		<div class="site-branding"><?php the_custom_logo(); ?>
			<?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) : ?>
				<?php jetpack_the_site_logo(); ?>
			<?php endif; ?>
			<div class="page-heading">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<?php if (is_front_page()): ?>
		<div id="blog-grid-container">
		<div class="grid-sizer"></div>
			<?php
				$args = array(
					'orderby'          => 'date',
				    'order'            => 'DESC',
				    'posts_per_page'   => 9,
					'post_type'        => 'post',
				);

				$postslist = new WP_Query($args);

				if ($postslist->have_posts()) :
			        while ($postslist->have_posts()) : 
			        	$postslist->the_post(); 
			    		get_template_part( 'template-parts/content', 'isotope' );
			        endwhile;
			        wp_reset_postdata();
			    endif;
			?>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
		<div class="wrap clear">
			<?php if (is_home()) : ?>
				<div id="slider">
			 
			    <?php
			    $carousel_cat = get_theme_mod('carousel_setting','1');
			    $carousel_count = get_theme_mod('count_setting','4');
			    $new_query = new WP_Query( array( 'cat' => $carousel_cat  , 'showposts' => $carousel_count ));
			    while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
			 
			    <div class="item">
			        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'anissa-carousel-pic' ); ?></a>
			         <div class="entry-dateslide">
						<?php the_time( get_option( 'date_format' ) ); ?>
					</div><!-- .entry-datetop -->
			        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			    </div>
			 
			    <?php 
			        endwhile;
			        wp_reset_postdata(); 
			    ?>
			 
				</div><!-- #slider -->

			<?php endif; ?>