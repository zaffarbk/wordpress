<?php get_header() ?>

<div class="topb">
	<div class="topb__wrapper wrapper">
		<h1 class="topb__stitle stitle stitle_lg">Японские технологии</h1>
	</div>
</div>

<div class="body wrapper">
	
	<div class="body__sidebar">
		
		<div class="wmenu">
			<ul>

				<?php 
				$posts = get_posts( array(
					'numberposts' => -1,
					'category'    => 0,
					'orderby'     => 'date',
					'order'       => 'asc',
					'post_type'   => 'yaponskie_tehnologii',
					'suppress_filters' => true, 
				) );

				foreach( $posts as $post ):
					setup_postdata($post); ?>
					<li><a href="<?php the_permalink() ?>" class="ic-a"><?php the_title() ?></a></li>
					<?php 
				endforeach;
wp_reset_postdata(); // сброс
?>
<!-- <li><a href="kazhdomu-klientu-novaya-rascheska.php" class="ic-a">Каждому клиенту новая расческа</a></li>
<li><a href="vse-strizhki-po-odnoj-cene.php" class="ic-a">Все стрижки по одной цене</a></li>
<li><a href="strizhki-ot-15-minut.php" class="ic-a">Стрижки от 15 минут</a></li>
<li><a href="garantiya-chistoty.php" class="ic-a">Гарантия чистоты </a></li>
<li><a href="vmesto-mytya-pylesosim-golovu.php" class="ic-a">Воздушная мойка головы </a></li>
<li><a href="bez-zapisi.php" class="ic-a">Без записи</a></li> -->
</ul>
</div>

</div><!-- .body__sidebar -->

<div class="body__content">

	<div class="info">

		<div class="info__stitle stitle stitle_sm"><?php the_field('title') ?></div>

		<div class="info__text textb">
			<?php the_field('content') ?>

		</div>

	</div>

</div><!-- .body__content -->

</div><!-- .body -->

<?php get_footer() ?>