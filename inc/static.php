<?php
/**
 * Enqueue scripts and styles.
 */
function anissa_scripts() {
	wp_enqueue_style('anissa-style',  get_template_directory_uri() . '/static/css/main.css', false, STATIC_VERSION);

	wp_enqueue_style('anissa-fonts', anissa_fonts_url(), array(), null);
	wp_enqueue_style( 'anissa-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.css', array(), '4.3.0' );
	
	wp_enqueue_script( 'anissa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'anissa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anissa_scripts' );



function anissa_carousel_scripts() {
   wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'anissa-effects', get_template_directory_uri() . '/js/effects.js', array('jquery'), '20120206', true );
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
