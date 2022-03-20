<?php get_header();?>
<!-- BRENDS -->
<div class="brends brends_page ">
    <div class="wrapper">
        <div class="brends__head-page "><?php single_cat_title(); ?></div>
        <div class="brends__lead-page "><?= category_description() ?></div>
         <?php  if ( have_posts() ) : ?>
        <div class="brends__list">
            <?php
            while ( have_posts() ) : the_post();
             ?>
             <a href="<?php the_permalink(); ?>" class="brends__item">
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" />
            </a>
            <?php
            endwhile;
            ?>
    </div>
</div>
<?php  endif;  ?>
</div>
<!-- BRENDS -->
<!-- ORDER FORM -->
<?php get_template_part('templates/siteblock/form1'); ?>
<!-- ORDER FORM -->
<?php get_footer();?>