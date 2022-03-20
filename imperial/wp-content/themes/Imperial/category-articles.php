<?php get_header();?>
<!-- SERTS -->
<div class="news page">
    <div class="wrapper">
        <div class="page__head ">Новости и статьи</div>
        <div class="news__tabs">
            <a href="/news" class="news__tabs-item">Новости</a>
            <a href="/articles" class="news__tabs-item active">Статьи</a>
        </div>
        <?php  if ( have_posts() ) : ?>
        <div class="news__articles active">
            <div class="news__list">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'partials/loopnews', get_post_format() ); 
                endwhile;
                ?>
            </div>
        </div>
        <?php get_template_part( 'partials/paginate' ); endif; ?>
    </div>   
</div>   
<!-- SERTS -->
<!-- ORDER FORM -->
<?php get_template_part('templates/siteblock/form2'); ?>
<!-- ORDER FORM -->
<?php get_footer();?>