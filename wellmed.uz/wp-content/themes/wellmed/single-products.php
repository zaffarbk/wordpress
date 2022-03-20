<?php get_header() ?>
<div class="container-xl">
	<nav class="breadcrumb">
		<?= do_shortcode( '[flexy_breadcrumb]'); ?>
	</nav>
</div>
<?php the_post() ?>
<section class="drug">
	<div class="container-xl">
		<div class="drug__inner">
			<div class="drug__photo-wrapper">
				<?php the_post_thumbnail() ?>
			</div>
			<div class="drug__info">
				<h4 class="drug__title"><?php the_title() ?></h4>
				<div class="drug__info-wrapper">
					<?php if ($row = get_field('products_descriptions')): ?>
						<?php foreach ($row as $rows): ?>
							<div class="drug__brandname">
								<div><span><?= $rows['products_description_title']  ?></span></div> <span><?= $rows['products_description_text']  ?></span>
							</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
				<a class="drug__btn" href="#!">
					Download instructions file <svg width='18' height='18' fill="#1761AC"><use xlink:href='#download'></use></svg>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="anyquestion anyquestion2">
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

<section class="similarproducts">
	<div class="container-xl">
		<div class="catalogoofproducts__header">
			<svg class="catalogoofproducts__heart-beat" width="50" height="33" fill="#16B8C2">
				<use xlink:href="#heart-beat"></use>
			</svg>
			<h3 class="default-title catalogoofproducts__title">Similar products</h3>
			<svg class="catalogoofproducts__heart-beat" width="50" height="33" fill="#16B8C2">
				<use xlink:href="#heart-beat"></use>
			</svg>
		</div>
		<div class="similarproducts__content">
			<div class="row">
				<?= do_shortcode('[yarpp]') ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>