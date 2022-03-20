<?php

    add_action( "customize_register", "ruth_sherman_theme_customize_register" );
    function ruth_sherman_theme_customize_register( $wp_customize ) {
        // $wp_customize->remove_section("static_front_page");
        $wp_customize->remove_section("custom_css");
    }


    add_filter( 'big_image_size_threshold', '__return_false' );

    function dco_remove_default_image_sizes( $sizes) {
        return array_diff( $sizes, array( 'medium', 'medium_large', 'large' ) );
    }

    remove_image_size('340x160');
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    add_theme_support( 'post-thumbnails' );

    function remove_menus(){
        remove_menu_page( 'edit-comments.php' );
        // remove_menu_page( 'users.php' );
    }
    add_action( 'admin_menu', 'remove_menus' );


    function new_subcategory_hierarchy() { 
    $category = get_queried_object();

    $parent_id = $category->category_parent;

    $templates = array();

    $templates[] = "category-{$category->slug}.php";
    $templates[] = "category-{$category->term_id}.php";
    $templates[] = 'category.php';     


    return locate_template( $templates );
}

add_filter( 'category_template', 'new_subcategory_hierarchy' );

        function wpdocs_excerpt_more( $more ) {
            return '...';
        }
        add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
function wpdocs_custom_excerpt_length( $length ) {
    return 5;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function codernote_request($query_string ) {
  if ( isset( $query_string['page'] ) ) {
    if ( ''!=$query_string['page'] ) {
      if ( isset( $query_string['name'] ) ) {
        unset( $query_string['name'] ); }
      }
    }
    return $query_string;
}
add_filter('request', 'codernote_request');

