<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wellMed
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-6 col-md-4 col-lg-3'); ?>>
	<div class="catalogoofproducts__product product">
		<a class="product__img-wrapper" href="<?= the_permalink() ?>">
			<?php the_post_thumbnail() ?>
		</a>
		<span class="product__suptitle">WELL MED PHARM</span>
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
		<a class="default-btn product__btn" href="<?= the_permalink() ?>">
			<?php 
			if(pll_current_language() == 'en') {
				echo 'More information';
			} else if(pll_current_language() == 'ru') {
				echo 'Подробнее'; 
			} else if(pll_current_language() == 'uz') {
				echo 'Batafsil'; 
			}    
			?>
		</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
