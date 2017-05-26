<?php
if ( ! function_exists( 'anissa_setup' ) ) :
	function anissa_setup() {
		load_theme_textdomain( 'anissa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		
		/**
		Custom Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 300,
			'width'       => 600,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array('site-title', 'site-description'),
		));

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support('post-thumbnails');
		add_image_size('anissa-home', 900, 450, true);
		add_image_size('anissa-header', 1400, 400, true);
		add_image_size('anissa-carousel-pic', 480, 320, true);
		add_image_size('anissa-blog', 800, 400, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'anissa' ),
			'social'  => esc_html__( 'Social Links', 'anissa' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'anissa_custom_background_args', array(
			'default-color' => 'ffffff',
		) ) );
	}
endif; // anissa_setup
add_action( 'after_setup_theme', 'anissa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anissa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'anissa_content_width', 900 );
}
add_action( 'after_setup_theme', 'anissa_content_width', 0 );

if ( ! function_exists( 'anissa_continue_reading_link' ) ) :
/**
 * Returns an ellipsis and "Continue reading" plus off-screen title link for excerpts
 */
function anissa_continue_reading_link() {
	return '&hellip; <a class="more-link" href="'. esc_url( get_permalink() ) . '">' . sprintf( __( 'Read More <span class="screen-reader-text">%1$s</span>', 'anissa' ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>';
}
endif; // anissa_continue_reading_link

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with anissa_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function anissa_auto_excerpt_more( $more ) {
	return anissa_continue_reading_link();
}
add_filter( 'excerpt_more', 'anissa_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function anissa_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= anissa_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'anissa_custom_excerpt_more' );
