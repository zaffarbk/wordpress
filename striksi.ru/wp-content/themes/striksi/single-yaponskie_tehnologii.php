<?php get_header() ?>
<div class="topb">
	<div class="topb__wrapper wrapper">
		<h1 class="topb__stitle stitle stitle_lg"><?php the_title() ?></h1>
	</div>
</div>
<?php the_post() ?>
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
</ul>
</div>

</div><!-- .body__sidebar -->

<div class="body__content">

	<div class="info">

		<div class="info__stitle stitle stitle_sm"><!-- Каждая шестая стрижка в подарок! --> </div>

		<div class="info__text textb">

			<?php the_content(); ?>
		</div>

	</div>

</div><!-- .body__content -->

</div><!-- .body -->

<?php get_footer() ?>