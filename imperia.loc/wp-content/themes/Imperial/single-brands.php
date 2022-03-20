<?php get_header(); ?>
<!-- MAIN -->
<div class="wrapper path">
	<?php if(function_exists('bcn_display')){ bcn_display(); }?>
</div>

<!-- BREND -->
<div class="brends brends_page ">
	<div class="brend">
		<div class="wrapper brend__wrapper">
			<div class="brend__left">
				<div class="brend__head"><?php the_title(); ?></div>
				<div class="brend__txt">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="brend__right">
				<div class="brend__logo">
					 <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" />
				</div>
			</div>
		</div>
	</div>
	<?php if(is_array(get_field('blocks'))){ ?>
	<div class="brend-catalog">
		<div class="wrapper">
			<div class="brend-catalog__head"><?= get_field('title'); ?></div>
			<div class="brend-catalog__list">
				<?php foreach(get_field('blocks') as $val){ ?>
				<a href="<?= $val['link'] ?>" class="brend-catalog__item">
					<img src="<?= $val['img']['url']; ?>" alt="" />
					<div class="brend-catalog__item-head"><?= $val['title'] ?></div>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<!-- BREND -->

<!-- ORDER FORM -->
<?php get_template_part('templates/siteblock/form1'); ?>
<!-- ORDER FORM -->
<?php get_footer();?>