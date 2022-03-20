<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wellMed
 */

?>

<footer class="footer">
	<div class="container-xl">
		<div class="footer__inner">
			<div class="row">
				<div class="col-lg-2">
					<div class="footer__logo-wrapper">
						<a href="/" class="header__logoLink">
							<img class="header__logo" src="<?php the_field('logo', 'options') ?>" alt="logo">
						</a>
						<p class="footer__logo-text"><?php the_field('site_description', 'options') ?></p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer__link-store">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_menu-1',
								'menu_id'        => 'footer_menu-1',
								'container'       => false, 
								'menu_class'     =>'footer__list'
							)
						);
						?>  
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_menu-2',
								'menu_id'        => 'footer_menu-2',
								'container'       => false, 
								'menu_class'     =>'footer__list'
							)
						);
						?>  
						<ul class="footer__list footer__list-info">
							<li class="footer__list-item">
								<a class="footer__list-link" href="<?php 
								if(pll_current_language() == 'en') {
									echo 'сontacts-2';
									} else if(pll_current_language() == 'ru') {
										echo 'contacts'; 
									}  
									?>">
									<?php 
									if(pll_current_language() == 'en') {
										echo 'Contacts';
									} else if(pll_current_language() == 'ru') {
										echo 'Контакты'; 
									}  
									?>
								</a>
							</li>
							<li class="footer__list-item">
								<svg width='16' height='10' fill='#16B8C2'>
									<use xlink:href='#envelope'></use>
								</svg>
								<a href="#!" class="footer__list-mail"><?php the_field('pochta', 'options') ?></a>
							</li>
							<li class="footer__list-item">
								<svg width='12' height='12' fill='#16B8C2'>
									<use xlink:href='#phone-icon'></use>
								</svg>
								<a href="tel:+998712281692" class="footer__list-phone"><?php the_field('tel_number', 'options') ?></a>
							</li>
							<li class="footer__list-item">
								<svg width='11' height='16' fill='#16B8C2'>
									<use xlink:href='#map-icon'></use>
								</svg>
								<a href="#!" class="footer__list-map"><?php the_field('adress', 'options') ?></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer__socials">
						<h4 class="footer__socials-title">
							<?php 
							if(pll_current_language() == 'en') {
								echo 'Social networks';
							} else if(pll_current_language() == 'ru') {
								echo 'Социальные сети'; 
							}  
							?>
						</h4>
						<div class="footer__socials-store">
							<a class="footer__socials-link" href="#!">
								<svg width="25" height="25" fill="#C7C7C7">
									<use xlink:href="#facebook"></use>
								</svg>
							</a>
							<a class="footer__socials-link" href="#!">
								<svg width="23" height="23" fill="#C7C7C7">
									<use xlink:href="#instagram"></use>
								</svg>
							</a>
							<a class="default-btn footer__btn modal-btn" href="#!">
								<?php 
								if(pll_current_language() == 'en') {
									echo 'Request a call';
								} else if(pll_current_language() == 'ru') {
									echo 'заказать звонок'; 
								}  
								?>
							</a>
							<p class="footer__license">
								Copyright © 2021 <?php 
								if(pll_current_language() == 'en') {
									echo 'All rights reserved';
								} else if(pll_current_language() == 'ru') {
									echo 'Все права защищены'; 
								}  
								?> 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<?= do_shortcode('[contact-form-7 id="76" title="Заказать звонок" html_class="Modal"]') ?>

<div class="wrapper"></div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGhMCJ69HR9zEhLWF-NnnO-YFgaXTWxYA&amp;callback=initMap&amp;libraries=&amp;v=weekly"
defer=""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php wp_footer() ?>
</body>

</html>
