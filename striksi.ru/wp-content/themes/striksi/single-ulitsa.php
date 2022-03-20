<?php get_header() ?>
<?
?>

<div class="topb">
	<?php the_post(); ?>
	<div class="topb__wrapper wrapper">
		<h1 class="topb__stitle stitle stitle_lg"><?php the_title() ?></h1>
	</div>
</div>

<div class="body wrapper">
	
	<div class="body__sidebar">
		
		<div class="waddrs">
			<div class="waddrs__roll ic-a">Показать города</div>
			<ul>


				<?php
    // Get list of all taxonomy terms  -- In simple categories title
				$args = array(
					'taxonomy' => 'gorod',
					'orderby' => 'name',
					'order'   => 'ASC'
				);
				$cats = get_categories($args);

    // For every Terms of custom taxonomy get their posts by term_id
				foreach($cats as $cat) {
					?>
					<li>
						<a href="<?php echo get_category_link( $cat->term_id ) ?>" class="ic-a">
							<?php echo $cat->name; ?> <br>
							<?php // echo $cat->term_id; ?> <br>
						</a>


						<?php
                // Query Arguments
						$args = array(
                    'post_type' => 'ulitsa', // the post type
                    'order'     =>'asc',
                    'tax_query' => array(
                    	array(
                            'taxonomy' => 'gorod', // the custom vocabulary
                            'field'    => 'term_id',          // term_id, slug or name  (Define by what you want to search the below term)    
                            'terms'    => $cat->term_id,      // provide the term slugs
                        ),
                    ),
                );

                // The query
						$the_query = new WP_Query( $args );

                // The Loop
						if ( $the_query->have_posts() ) {

							echo '<ul class="show">';
							$html_list_items = '';
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$html_list_items .= '<li>';
								$html_list_items .= '<a href="' . get_permalink() . '">';
								$html_list_items .= get_the_title();
								$html_list_items .= '</a>';
								$html_list_items .= '</li>';
							}
							echo $html_list_items;
							echo '</ul>';

						} else {
                    // no posts found
						}

                wp_reset_postdata(); // reset global $post;

                ?>
            </li>
        <?php } ?>

    </ul>
</div><!-- .waddrs -->

</div><!-- .body__sidebar -->

<div class="body__content">

	<div class="salon">

		<div class="salon__title stitle stitle_sm"><?php the_title() ?></div>

		<div class="salon__ct">

			<div class="salon__ct-item">
				<div class="salon__ct-ic">
					<span class="icon-clock"></span>
				</div>
				<div class="salon__ct-info">
					<div class="salon__ct-l">Часы работы</div>
					<div class="salon__ct-v">
						<?php the_field('time_work') ?>
					</div>
				</div>
			</div>

			<div class="salon__ct-item">
				<div class="salon__ct-ic">
					<span class="icon-phone"></span>
				</div>
				<div class="salon__ct-info">
					<div class="salon__ct-l">Телефон</div>
					<div class="salon__ct-v">
						<a href="tel://<?php the_field('number_telephone') ?>"><?php the_field('number_telephone') ?></a>
					</div>
				</div>
			</div>

		</div>

		<div class="salon__soc">
			<div class="salon__soc-l">Мы в социальных сетях:</div>
			<div class="salon__soc-v">
				<a href="<?php the_field('vk_link') ?>" target=_blank><img src="/wp-content/themes/striksi/images/vk.svg" alt=""/></a>
				<a href="<?php the_field('vk_insta') ?> ?>" target=_blank><img src="/wp-content/themes/striksi/images/ig.svg" alt=""/></a>
			</div>
		</div>

		<div class="salon__map" id="map_salon">
			<?php the_content() ?>
		</div>

		<div class="salon__prices">


			<ul>
				<?php $pricelist = get_field('price_list') ?>
				<?php if ($pricelist): ?>
					<?php while( have_rows('price_list') ): the_row(); ?>
						<li>
							<div class="salon__prices-title"><?= the_sub_field('title_price') ?> </div>
							<?php $subfield = get_sub_field('list'); ?>
							<?php if ($subfield && is_array($subfield)): ?>
								<?php foreach ($subfield as $subfields): ?>
									<li>
										<div class="salon__prices-l"><span> <?= $subfields['price_name'] ?></span></div>
										<div class="salon__prices-v"><?= $subfields['price'] ?></div>
									</li>
								<?php endforeach ?>
							<?php endif ?>

						</li>
					<?php endwhile; ?>
				<?php endif; ?>

			</ul> 
<!--
				<div class="salon__prices-title">Маникюр</div>

				<ul>
					<li>
						<div class="salon__prices-l"><span>Фейд</span></div>
						<div class="salon__prices-v">200 Р</div>
					</li>
					<li>
						<div class="salon__prices-l"><span>Стрижка с маской</span></div>
						<div class="salon__prices-v">350 Р</div>
					</li>
					<li>
						<div class="salon__prices-l"><span>Стрижка</span></div>
						<div class="salon__prices-v">300 Р</div>
					</li>
					<li>
						<div class="salon__prices-l"><span>Стрижка наголо</span></div>
						<div class="salon__prices-v">200 Р</div>
					</li>
					<li>
						<div class="salon__prices-l"><span>Стрижка челки</span></div>
						<div class="salon__prices-v">250 Р</div>
					</li>
					<li>
						<div class="salon__prices-l"><span>Стрижка ветеров ВОВ</span></div>
						<div class="salon__prices-v">150 Р</div>
					</li>
				</ul>
			-->
		</div>

	</div><!-- .salon -->

</div><!-- .body__content -->

</div><!-- .body -->

<?php get_footer() ?>