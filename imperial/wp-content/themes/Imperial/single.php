<?php get_header(); ?>
<!-- MAIN -->
<div class="wrapper path">
	<?php if(function_exists('bcn_display')){ bcn_display(); }?>
</div>
<!-- PROD PAGE -->
<div class="prod">
	<div class="wrapper prod__wrapper">
		<h1 class="prod__head"><?= the_title(); ?></h1>
		<div class="prod__img">
			<?php if(is_array(get_field('gallery'))){ ?>
			<div class="prod__img-left">
				<div class="prod__img-prew">
					<div class="prod__img-prew-carusel">
						<div class="prod__img-link-list-wrapper">  
							<ul class="prod__img-link-list">
								<?php foreach(get_field('gallery') as $val){ ?>
								<li class="prod__img-link">
									<img src="<?= $val['img']['url']; ?>" alt="">
								</li>
								<?php } ?>
							</ul>
						</div>
						<div class="prod__img-arr prod__img-arr_up"></div>  
						<div class="prod__img-arr prod__img-arr_down"></div>  
					</div>
					<div class="prod__img-screen">
						<img src="<?= get_field('gallery')[0]['img']['url']; ?>" alt="">
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="prod__img-right">
				<div class="prod__img-txt">
					<?php the_content(); ?>
				</div>
				<div class="prod__tab-list">
					<?php if(get_field('description')){ ?>
						<a href="#" data-tab="1" class="prod__tab-link">Описание</a>
					<?php } ?>
					<?php if(is_array(get_field( 'param' ))){ ?>
					<a href="#" data-tab="2" class="prod__tab-link">Характеристики</a>
					<?php } ?>
					<?php if(is_array(get_field('documents'))){ ?>
						<a href="#" data-tab="3" class="prod__tab-link">Документация</a>
					<?php } ?>
				</div>
				<?= do_shortcode('[contact-form-7 id="255" title="Заказать товар"]'); ?>
			</div>
		</div>
		<div class="prod__tab-result-list">
			<?php if(get_field('description')){ ?>
				<div class="prod__tab-result prod__tab-result-desc active" data-item="1">
					<div class="prod__sub-head">Описание</div>
					<?= get_field('description'); ?>
				</div>
			<?php } ?>
			<?php if(is_array(get_field( 'param' ))){ ?>
			<div class="prod__tab-result prod__tab-result-options" data-item="2">
				<div class="prod__sub-head">Характеристики</div>
				<?php
				$table = get_field( 'param' );

				if ( $table ) {

					echo '<table border="0">';

					if ( $table['header'] ) {

						echo '<thead>';

						echo '<tr>';

						foreach ( $table['header'] as $th ) {

							echo '<th>';
							echo $th['c'];
							echo '</th>';
						}

						echo '</tr>';

						echo '</thead>';
					}

					echo '<tbody>';

					foreach ( $table['body'] as $tr ) {

						echo '<tr>';

						foreach ( $tr as $td ) {

							echo '<td>';
							echo $td['c'];
							echo '</td>';
						}

						echo '</tr>';
					}

					echo '</tbody>';

					echo '</table>';
				}
				?>
			</div>
			<?php } ?>
			<?php if(is_array(get_field('documents'))){ ?>
				<div class="prod__tab-result prod__tab-result-docs " data-item="3">
					<div class="prod__sub-head">Описание</div>
					<div class="prod__tab-result-docs-list">
						<?php foreach(get_field('documents') as $val){ ?>
							<a href="<?= $val['file']['url']; ?>" target="_blank"><?= $val['text']; ?></a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>   
</div>
<!-- PROD PAGE -->
<!-- ORDER FORM -->
<?php get_template_part('templates/siteblock/form1'); ?>
<!-- ORDER FORM -->
<?php get_footer();?>