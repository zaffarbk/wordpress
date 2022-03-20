<?php
    $inc_path = get_template_directory() . '/inc';
    define('STM_DOMAIN', 'stm_domain');
    define('THEME_VERSION', 3);

    /* Initials*/
    require_once( $inc_path . '/post_types.class.php' );

    /* Admin only */
    require_once( $inc_path . '/sforms.class.php' );

    require_once( $inc_path . '/customizer.php' );

    /* Custom post types*/
    //require_once( $inc_path . '/posts/news.php' );
    //require_once( $inc_path . '/posts/partners.php' );

    /* Customize theme */
    require_once( $inc_path . '/setup.php' );
    require_once( $inc_path . '/scripts_styles.php' );


    /* Functions && template tags */
    require_once( $inc_path . '/pagination.php' );
    require_once( $inc_path . '/navigation.php' );


    /* Custom functions */
    require_once( $inc_path . '/custom.php' );

    add_filter('get_child_category', 'get_child_cat', 10, 1);