<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package striksi
 */

?>



<footer class="footer">
	
	<div class="footer__wrapper wrapper">
		
		<div class="footer__logo logo">
			<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt=""/><span>японские <br/>парикмахерские</span></a>
		</div>

		<div class="footer__menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => false,

				)
			);
			?>
		</div>

		<div class="footer__r">

			<div class="footer__mail">
				<span>Предложения и пожелания</span>
				<a href="mailto://info@striksi.ru">info@striksi.ru</a>
			</div>

			<div class="footer__pp">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'footer-menu',
						'container'      => false,

					)
				);
				?>
			</div>

		</div>
		
	</div>

</footer><!-- .footer -->

</div>

<?php wp_footer() ?>
</body>
</html>

