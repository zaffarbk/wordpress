<?php 

/**
 * Enqueue scripts and styles.
 */
function wellmed_scripts() {
	// wp_enqueue_style( 'wellmed-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', '' );
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
	wp_enqueue_style( 'style-csss', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'media-css', get_template_directory_uri() . '/assets/css/media.css' );


	wp_style_add_data( 'wellmed-style', 'rtl', 'replace' );


	// wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAGhMCJ69HR9zEhLWF-NnnO-YFgaXTWxYA&amp;callback=initMap&amp;libraries=&amp;v=weekly' );
	// wp_enqueue_script('google-maps');
	wp_enqueue_script( 'wellmed-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wellmed_scripts' );