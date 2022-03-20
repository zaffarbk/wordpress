<?php 
/*
YARPP Template: Starter Template
Description: A simple starter example template that you can edit.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<!-- <h3>Related Posts</h3> -->
<?php if ( have_posts() ) : ?>
	<div class="row">
		<?php 
		while ( have_posts() ) :
			the_post(); 
			?>
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
		<?php endwhile; ?>
	</div>
	<?php else : ?>
		<p>No related posts.</p>
	<?php endif; ?>

	