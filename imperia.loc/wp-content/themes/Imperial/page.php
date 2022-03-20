<?php get_header();?>
<div class="content">
    <div class="blockin page">
        <h1><?php the_title(); ?></h1>
        <div class="textpage">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>  
    </div>
</div>
<?php get_footer();?>