<?php get_header();?>
<!-- PROD LIST -->
<div class="catalog ">
	<div class="wrapper">
		<div class="wrapper path">
			<?php if(function_exists('bcn_display')){ bcn_display(); }?>
		</div>
		<div class="page__head fullwidth"><?php single_cat_title(); ?>
		<span class="page__head-badge"><?= $my_post_count = $wp_query->post_count; ?> товаров</span>
	</div>
	<?php
	$category = get_queried_object();
	$current_cat_id = $category->term_id;
	$sub_cats = get_terms(
		'category',
		array(
			'parent' => $current_cat_id,
			'hide_empty'    => false, 
		)
	);
	if(count($sub_cats) > 0){
		?>
		<div class="catalog__section-list">
			<?php
			foreach( $sub_cats as $cat ){
				?>
				<a href="/<?= $cat->slug ?>" class="catalog__section-item">
					<div class="catalog__section-item-img">
						<img src="<?= get_field('img' , $cat)['url']; ?>" alt="">
					</div>
					<div class="catalog__section-head"><?= $cat->name ?></div>
				</a>
				<?php
			}
			?>
		</div>
	<?php } ?>
	<div class="catalog__controlls">
		<div class="catalog__controlls-left">
			<div class="select">
				<div class="select__placeholder">Тип</div>
				<div class="select__list">
					<div class="select__item">
						<label for="">
							<input type="checkbox" class="select__checkbox" name="" id="">
							Цилиндрический
						</label>
					</div>
					<div class="select__item">
						<label for="">
							<input type="checkbox" class="select__checkbox" name="" id="">
							Цилиндрический
						</label>
					</div>
					<div class="select__item">
						<label for="">
							<input type="checkbox" class="select__checkbox" name="" id="">
							Цилиндрический
						</label>
					</div>
					<div class="select__item">
						<label for="">
							<input type="checkbox" class="select__checkbox" name="" id="">
							Цилиндрический
						</label>
					</div>
				</div>
			</div>
			
			<?php
			

			?>
		</div>
		<div class="catalog__controlls-right">
			<button class="catalog__controlls-col"></button>
			<button class="catalog__controlls-row"></button>
		</div>
	</div>
	<?php  if ( have_posts() ) : ?>
		<div class="catalog__list catalog__list_row">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'partials/loop', get_post_format() ); 
			endwhile;
			?>
		</div>
		<?php get_template_part( 'partials/paginate' ); endif; ?>
	</div>
</div>
<!-- PROD LIST -->
<!-- ORDER FORM -->
<?php get_template_part('templates/siteblock/form1'); ?>
<!-- ORDER FORM -->
<?php get_footer();?>