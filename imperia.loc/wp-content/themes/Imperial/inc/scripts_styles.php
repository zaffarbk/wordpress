<?php
	if( ! is_admin() )
		add_action( 'wp_enqueue_scripts', 'stm_load_theme_ss' );
	
	function stm_load_theme_ss(){
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css', NULL, THEME_VERSION, 'all' );
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css', NULL, THEME_VERSION, 'all' );


		/* Register own jquery */		
		wp_deregister_script('jquery');
		
		/* Scripts */ 
		wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', '', THEME_VERSION, false );
        wp_enqueue_script( 'main',   get_template_directory_uri() . '/assets/js/main.js', 'jquery', THEME_VERSION, TRUE );
        wp_enqueue_script( 'custom',   get_template_directory_uri() . '/assets/js/custom.js', 'jquery', THEME_VERSION, TRUE );
	}