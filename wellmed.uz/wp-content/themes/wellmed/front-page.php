 <?php get_header(); ?>
 <div class="intro">
    <div class="container-xl">
        <div class="intro__inner">
            <div class="intro__swiper-container swiper-container">
                <div class="intro__swiper-wrapper swiper-wrapper">
                    <?php $row = get_field('banner_area_content') ?>
                    <?php if ($row): ?>
                        <?php foreach ($row as $rows): ?>
                         <div class="intro__swiper-slide swiper-slide">
                            <div class="intro__swiper-item">
                                <article>
                                    <h1 class="intro__title"><?= $rows['banner_title'] ?></span>
                                    </h1>
                                    <?= $rows['banner_description'] ?>
                                </article>
                                <a class="intro__btn default-btn" href="#!">Read more</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <div class="intro__swiper-pagination swiper-pagination"></div>

    </div>
</div>
</div>

<section class="intro-bottom">
    <div class="container-xl">
        <div class="intro-bottom__inner">
            <div class="row">
                <?php $row = get_field('card_items_container') ?>
                <?php if ($row): ?>
                    <?php foreach ($row as $rows): ?>
                     <div class="col-sm-6 col-lg-3">
                        <article class="intro-bottom__card">
                            <svg class="intro-bottom__card-icon" width='42px' height='42px' fill='white'>
                                <use xlink:href='#intro-bottom-card1'></use>
                            </svg>
                            <h6 class="intro-bottom__card-title"><?= $rows['cards_title']  ?></h6>
                            <?= $rows['card_description'] ?>
                        </article>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>
</section>

<section class="whowe">
    <div class="container-xl">
        <div class="whowe__inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="whowe__photo-wrapper">
                        <img class="whowe__photo" src="<?= the_field('about_us_img') ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="whowe__content">
                        <h5 class="whowe__suptitle default-suptitle">
                            <svg width="24" height="18" fill="#16B8C2">
                                <use xlink:href='#heart-beat'></use>
                            </svg>
                            About us
                        </h5>
                        <h3 class="whowe__title default-title"><?php the_field('abouts_us_title') ?></h3>
                        <?php the_field('about_us_description') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contactus">
    <div class="container-xl">
        <div class="contactus__inner">
            <h5 class="default-suptitle">
                <svg width="24" height="18" fill="#16B8C2">
                    <use xlink:href='#heart-beat'></use>
                </svg>
                Contact us
            </h5>
            <h2 class="contactus__title title"><?php the_field('contact_us_title') ?></h2>
            <?php the_field('contact_us_description') ?>
            <a class="default-btn contactus__btn" href="#!">Contact us</a>
        </div>
    </div>
</section>

<section class="catalogoofproducts">
    <div class="container-xl">
        <div class="catalogoofproducts__inner">
            <div class="catalogoofproducts__header">
                <svg class="catalogoofproducts__heart-beat" width='50' height='33' fill='#16B8C2'>
                    <use xlink:href='#heart-beat'></use>
                </svg>
                <h3 class="default-title catalogoofproducts__title">Catalog of products</h3>
                <svg class="catalogoofproducts__heart-beat" width='50' height='33' fill='#16B8C2'>
                    <use xlink:href='#heart-beat'></use>
                </svg>
            </div>
            <div class="catalogoofproducts__content">
                <ul class="nav nav-tabs catalogofproducts__sort" id="myTab" role="tablist">
                    <?php  
                    $args = array(
                        'taxonomy' => 'cats',
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => false
                    );
                    $cat = get_categories($args); 
                    $i = 0;
                    ?>
                    <?php foreach ($cat as $cats): $i++ ?>
                       <li class="nav-item <?php if( $i == 1 ){ echo "active"; } ?>">
                        <a class="nav-link catalogofproducts__sort-item" id="<?= $cats->id ?>" data-toggle="tab" href="#<?= $cats->slug ?>" role="tab" aria-controls="home" aria-selected="true"><?= $cats->name ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="tab-content" id="myTabContent">
             <?php  
             $args = array(
                'taxonomy' => 'cats',
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => false
            );
             $cat = get_categories($args); 
             $i = 0;
             ?>
             <?php foreach ($cat as $cats): $i++ ?>
                 <div class="tab-pane fade show <?php if( $i ==1 ){ echo "active"; } ?>" id="<?= $cats->slug ?>" role="tabpanel" aria-labelledby="<?= $cats->slug ?>">
                  <div class="row">
                    <?php
                // Query Arguments
                    $args = array(
                    'post_type' => 'products', // the post type
                    'order'     => 'asc',
                    'numberposts' => -1,
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'cats', // the custom vocabulary
                            'field'    => 'term_id',          // term_id, slug or name  (Define by what you want to search the below term)    
                            'terms'    => $cats->term_id,      // provide the term slugs
                        ),
                    ),
                );

                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :  ?>
                        <?php   while ($the_query->have_posts()): $the_query->the_post(); ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="catalogoofproducts__product product">
                                    <a class="product__img-wrapper" href="<?= the_permalink() ?>">
                                        <?php the_post_thumbnail() ?>
                                    </a>
                                    <span class="product__suptitle">Stardom Pharma</span>
                                    <?php
                                    $term = wp_get_post_terms( $post->ID, 'cats',  array("fields" => "names") );
                                    if ($term) {
                                        foreach($term as $terms) : ?>              
                                         <h6 class="product__title">
                                            <?= $terms ?>
                                         </h6>
                                     <?php endforeach;
                                 }
                                 ?>


                                 <a class="product__name" href="#!"><?php the_title() ?></a>
                                 <p class="product__text"><?php the_field('product_sostav') ?></p>
                                 <span class="product__info"><?php the_field('izmirenie') ?></span>
                                 <a class="default-btn product__btn" href="<?= the_permalink() ?>">More information</a>
                             </div>
                         </div>
                         <?php 
                     endwhile;
                 endif;
                 wp_reset_postdata();
                 ?>
             </div>
         </div>
     <?php endforeach ?>
 </div>
</div>
<div class="catalogoofproducts__footer">
    <a class="catalogoofproducts__btn default-btn" href="#!">Посмотреть все товары</a>
</div>
</div>
</div>
</section>

<section class="anyquestion">
    <div class="container-xl">
        <div class="anyquestion__inner">
            <div class="anyquestion__header">
                <h5 class="default-suptitle anyquestion__suptitle">
                    <svg width="24" height="18" fill="#16B8C2">
                        <use xlink:href="#heart-beat"></use>
                    </svg>
                    Contact us
                </h5>
                <h2 class="anyquestion__title title">
                    <?php the_field('contact_form_title') ?>
                </h2>
            </div>
            <?= do_shortcode( '[contact-form-7 id="77" title="Связаться с нами" html_class="anyquestion__content form"]' ); ?>
        </div>
    </div>
</section>

<div class="map">
    <div class="container-xl">
        <div class="map-card">
            <div class="map-card__main">Main</div>
            <div class="map-card__content">
                <a class="map-card__address"
                href="https://www.google.ru/maps/search/117,+st.+Usta+Shirin+house,+Almazar+district,+Tashkent+Uzbekistan+++Get+direction/@41.3531653,69.2509896,17z/data=!3m1!4b1">
                <svg class="map-card__map-icon" width='14' height='18' fill='#26C7E3'>
                    <use xlink:href='#map-icon'></use>
                </svg>
                117, st. Usta Shirin house, Almazar district, Tashkent Uzbekistan
            </a>
            <div class="map-card__phone">
                <svg class="map-card__phone-icon" width='16' height='16' fill='#26C7E3'>
                    <use xlink:href='#phone-icon'></use>
                </svg>
                <a href="tel:+998712281692">+(998-71) 228-16-92</a> <br>
                <a href="tel:+998712281693">+(998-71) 228-16-93</a> <br>
                <a href="tel:+998712281694">+(998-71) 228-16-94</a>
            </div>
            <a class="map-card__mail" href="mailto:info@stardompharma.com">
                <svg class="map-card__mail-icon" width="18" height="12" fill='#26C7E3'>
                    <use xlink:href='#envelope'></use>
                </svg>
                info@stardompharma.com
            </a>
        </div>
    </div>
</div>
<div id="map__content" class="map__content"></div>
</div>
<?php get_footer() ?>