<?php get_header(); ?>
<div class="container-xl">
  <nav class="breadcrumb">
    <?= do_shortcode( '[flexy_breadcrumb]'); ?>
  </nav>
</div>

   <?php if(have_posts()) : ?>
    <?php while(have_posts())  : the_post(); ?>
      <?php the_content(); ?>          
      <?php comments_template( '', true ); ?> 
    <?php endwhile; ?>                   
      <?php else : ?>                       
        <h3><?php _e('404 Error&#58; Not Found'); ?></h3>
<?php endif; ?>     
<?php get_footer() ?>