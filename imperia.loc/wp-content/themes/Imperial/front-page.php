<?php get_header();?>

<!-- CARUSEL -->
<div class="carousel-head">
	<?php foreach(get_field('slider') as $val){ ?>
		<div class="carousel-head__cell">
			<div class="carousel-head__cell-img">
				<img src="<?= $val['img']['url']; ?>" alt="" />
			</div>
			<div class="carousel-head__cell-inner">
				<div class="wrapper">
					<div class="carousel-head__cell-head"><?= $val['title']; ?></div>
					<div class="carousel-head__cell-txt"><?= $val['text']; ?></div>
					<a href="<?= $val['link']['link']; ?>" class="btn carousel-head__cell-btn"><?= $val['link']['title']; ?></a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- CARUSEL -->

<!-- FOLDER -->
<div class="catalog-gallery">
	<div class="catalog-gallery__wrapper">
		<?php foreach(get_field('folder') as $val){ ?>
			<a href="<?= $val['link']; ?>" class="catalog-gallery__item">
				<img src="<?= $val['img']['url']; ?>" alt="" />
				<div class="catalog-gallery__head"><?= $val['title']; ?></div>
			</a>
		<?php } ?>
	</div>
</div>
<!-- FOLDER -->

<!-- OUR SERVICE -->
<div class="our-service">
	<div class="wrapper">
		<div class="our-service__head"><?= get_field('servicestitle'); ?></div>
		<ul class="our-service__list">
			<?php foreach(get_field('services') as $k => $val){ ?>
				<li class="our-service__item our-service__item_<?= $k ?>">
					<div class="our-service__item-head"><?= $val['title']; ?></div>
					<div class="our-service__item-txt"><?= $val['text']; ?></div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
<!-- OUR SERVICE -->

<div class="order-form">
	<?= do_shortcode('[contact-form-7 id="35" title="Оставить заявку на подбор или позвоните нам"]'); ?>
</div>

<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => '8',
	'category_name' => 'brands',
);
$posts = get_posts ($args);
if ($posts) :
	?>
	<!-- BRENDS -->
	<div class="brends">
		<div class="wrapper">
			<div class="brends__head"><?= get_field('brendstitle'); ?></div>
			<div class="brends__list">
				<?php foreach ($posts as $post) : setup_postdata ($post); ?>
					<a href="<?php the_permalink() ?>" class="brends__item">
						<img src="<?php the_post_thumbnail_url() ?>" alt="" />
					</a>
				<?php endforeach; wp_reset_postdata(); ?>
			</div>
			<?php if(is_array(get_field('brendslink'))){ ?>
				<div class="brends__btn">
					<a href="<?= get_field('brendslink')['url']; ?>" class="btn btn_transp"><?= get_field('brendslink')['title']; ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- BRENDS -->
<?php endif; ?>

<!-- OFFERS -->
<div class="offers">
	<div class="offers__wrapper wrapper">
		<?php if(is_array(get_field('reviewslink'))){ ?>
			<a href="<?= get_field('reviewslink')['url'] ?>" class="offers__link section-link"><?= get_field('reviewslink')['title'] ?></a>
		<?php } ?>
		<div class="offers__head"><?= get_field('reviewstitle'); ?></div>
		<div class="offers__lead"><?= get_field('reviewstext'); ?></div>
		<div class="offers-slder">
			<?php foreach(get_field('reviews' , 61) as $k => $val){ if($k < 4){ ?>
				<div class="offers-slder__cell">
					<div class="offers-slder__cell-sert">
						<img src="<?= $val['img']['url']; ?>" alt="" />
					</div>
					<div class="offers-slder__cell-text">
						<p>
							<?= $val['text']; ?>
						</p>
						<p class="offers-slder__cell-text-sign"><?= $val['title']; ?></p>
						<p class="offers-slder__cell-text-city"><?= $val['city']; ?></p>
					</div>
				</div>
			<?php }} ?>
		</div>
	</div>
</div>
<!-- OFFERS -->

<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => '3',
	'category_name' => 'news',
);
$posts = get_posts ($args);
if ($posts) :
	?>
	<!-- NEWS -->
	<div class="news">
		<div class="news__wrapper wrapper">
			<?php if(is_array(get_field('newslink'))){ ?>
				<a href="<?= get_field('newslink')['url'] ?>" class="news__link section-link"><?= get_field('newslink')['title'] ?></a>
			<?php } ?>
			<div class="news__head"><?= get_field('newstitle'); ?></div>
			<div class="news__list news__list_main">
				<?php foreach ($posts as $post) : setup_postdata ($post); ?>
					<div class="news__item">
						<div class="news__item-img">
							<img src="<?php the_post_thumbnail_url() ?>" alt="" />
							<div class="news__item-date"><?php get_the_date() ?></div>
						</div>
						<div class="news__item-txt">
							<a href="<?php the_permalink() ?>" class="news__item-head"><?php the_title(); ?></a>
							<a href="<?php the_permalink() ?>" class="news__item-lead"><?= get_the_excerpt() ?> <span>→</span></a>
						</div>
					</div>
				<?php endforeach; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<!-- NEWS -->
<?php endif; ?>

<?php get_footer(); ?>