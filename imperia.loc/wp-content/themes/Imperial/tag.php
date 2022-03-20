<?php get_header();?>
<div class="mainpadding">
  <div class="blockin">
    <h1><?php single_cat_title(); ?></h1>
    <div class="row">
      <div class="col-xs-12">
        <?php  if(is_array(get_tags())){ ?>
          <ul class="tags">
            <?php foreach(get_tags() as $val){ ?>
              <li class="<?php   if($val->name == single_cat_title('' , false)){ echo 'active'; } ?>"><a href="<?= get_tag_link($val->term_id); ?>"><?= $val->name; ?></a></li>
            <?php } ?>
          </ul>
        <?php } ?>
      </div>
      <div class="col-md-12">
        <?php
        if ( have_posts() ) :
          ?>
          <div class="news row flex sertificats">
            <?php
            while ( have_posts() ) : the_post();
              ?>

              <?php get_template_part( 'partials/loopsertificat', get_post_format() ); ?>

              <?php
            endwhile;
            ?>
          </div>
          <?php
          get_template_part( 'partials/paginate' );
        endif;
        ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>