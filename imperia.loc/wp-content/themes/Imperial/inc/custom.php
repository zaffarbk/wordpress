<?php
    function theme_body_class($classes)
    {
        return $classes;
    }
    add_filter('body_class', 'theme_body_class');

    function stm_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $add_below = 'div-comment';

        ?>
        <li id="li-comment-<?php echo $comment->comment_ID; ?>" class="comment">
            <div id="comment-<?php echo $comment->comment_ID; ?>">
                <div class="comment-author">
                    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

                </div><!-- .comment-author .vcard -->
                <div class="comment-meta">
                    <?php printf( __( '<cite class="fn highlight">%s</cite>' ), get_comment_author_link() ); ?>
                    <?php printf( __('%1$s at %2$s', STM_DOMAIN), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', STM_DOMAIN ), '  ', '' ); ?>
                </div><!-- .comment-meta .commentmetadata -->
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
                <div class="comment-body">
                    <p><?php comment_text(); ?></p>
                </div>
            </div><!-- #comment-##  -->
        </li>


        <?php
    }

    function get_relative_permalink( $url ) {
        $url = get_permalink();
        return str_replace( home_url(), "", $url );
    }

    function stm_svg_mime($mimes) {
        $mimes['ico'] = 'image/icon';
        return $mimes;
    }
    add_filter('upload_mimes', 'stm_svg_mime');

    function theme_name_wp_title( $title, $sep ) {
        if ( is_feed() ) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo( 'name', 'display' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title .= " $sep $site_description";
        }

        // Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
            $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
        }

        return $title;
    }
    add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

    add_filter('single_template', 'check_for_category_single_template');
    function check_for_category_single_template( $t )
    {
        foreach( (array) get_the_category() as $cat )
        {
            if ( file_exists(get_stylesheet_directory() . "/single-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-{$cat->slug}.php";
            if($cat->parent)
            {
                $cat = get_the_category_by_ID( $cat->parent );
                if ( file_exists(get_stylesheet_directory() . "/single-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-{$cat->slug}.php";
            }
        }
        return $t;
    }

    remove_action( 'load-update-core.php', 'wp_update_plugins' );
    add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
    wp_clear_scheduled_hook( 'wp_update_plugins' );

    function del_upgrade_nag() {
        echo '<style type="text/css">
                .notice-alt , .update-message{display: none}
              </style>';
    }
    add_action('admin_head', 'del_upgrade_nag');

    add_action( 'pre_get_posts', 'mp_design_cat_posts_per_page' );
    function mp_design_cat_posts_per_page( $query ) {
        if( $query->is_main_query() && is_category( 'voprosy-i-otvety' ) && ! is_admin() ) {
            $query->set( 'posts_per_page', '10' );
        }
    }