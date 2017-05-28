<?php
/**
 * Enqueue scripts and styles.
 */
function anissa_scripts() {
	wp_enqueue_style('anissa-style',  get_template_directory_uri() . '/static/css/main.css', false, STATIC_VERSION);
	wp_enqueue_style('anissa-hamburgers',  get_template_directory_uri() . '/static/css/hamburgers.css', false, '0.8.1');
	wp_enqueue_style('anissa-mmenucss', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/6.1.0/jquery.mmenu.all.css', array(), '6.1.0');
	wp_enqueue_style('anissa-unsemantic', '//cdnjs.cloudflare.com/ajax/libs/unsemantic/1.1.3/unsemantic-grid-responsive-tablet.min.css', array(), '1.1.3');
	wp_enqueue_style('anissa-fonts', anissa_fonts_url(), array(), null);
	wp_enqueue_style('anissa-fontawesome', get_template_directory_uri() . '/static/fonts/font-awesome.css', array(), '4.3.0');

	wp_enqueue_script('anissa-isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', ['jquery'], '3.0.4', true);
	wp_enqueue_script('anissa-imagesloaded', '//unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', ['jquery'], '4.1.2', true);
	wp_enqueue_script('anissa-mmenujs', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/6.1.0/jquery.mmenu.all.js', ['jquery'], '6.1.0', true);
	wp_enqueue_script('anissa-fixedmmenu', get_template_directory_uri() . '/static/js/jquery.mmenu.fixedelements.js', ['jquery'], '6.1.0', true);
	wp_enqueue_script('anissa-script', get_template_directory_uri() . '/static/js/main.js', ['jquery'], STATIC_VERSION, true);
	wp_enqueue_script('anissa-navigation', get_template_directory_uri() . '/static/js/navigation.js', ['jquery'], STATIC_VERSION, true);
	wp_enqueue_script('anissa-skip-link-focus-fix', get_template_directory_uri() . '/static/js/skip-link-focus-fix.js', array(), '20130115', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'anissa_scripts');



function anissa_carousel_scripts() {
   wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/static/js/owl.carousel.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'anissa-effects', get_template_directory_uri() . '/static/js/effects.js', array('jquery'), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'anissa_carousel_scripts' );

/**
 * Register Google Fonts
 */
function anissa_fonts_url() {
    $fonts_url = '';

   	/* Translators: If there are characters in your language that are not
	 * supported by Playfair, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$playfair = esc_html_x( 'on', 'Playfair font: on or off', 'anissa' );
	
	/* Translators: If there are characters in your language that are not
	 * supported by Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'anissa' );
	
	 /* Translators: If there are characters in your language that are not
	 * supported by Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'anissa' );
	

	if ( 'off' !== $playfair && 'off' !== $montserrat && 'off' !== $merriweather ) {
		$font_families = array();

		if ( 'off' !== $playfair ) {
			$font_families[] = 'Playfair Display:400,700';
		}
		
		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:400,700';
		}
		
		if ( 'off' !== $merriweather ) {
			$font_families[] = 'Merriweather:400,300,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google Fonts for custom headers
 */
function anissa_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'anissa-fonts', anissa_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'anissa_admin_scripts' );
