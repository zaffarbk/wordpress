<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package striksi
 */

?>
<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title() ?></title>
	<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="icon">
	<?php wp_head(); ?>

	<?php if (is_home() || is_front_page()) : ?>
	<style id="my-internal-css">
		.footer:before {
			display: block; content: ''; background: url(/wp-content/themes/striksi/images/el.png) no-repeat; width: 463px; height: 132px; position: absolute; left: 50%; margin-left: -980px; top: 0; z-index: -1;
		}
	</style>
<?php endif; ?>

</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="viewport-wrapper">

		<header class="header">

			<div class="header__wrapper wrapper">

				<div class="header__logo logo">
					<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt=""/><span>японские <br/>парикмахерские</span></a>
				</div>

				<div class="header__menu-layout"></div>
				<div class="header__menu">
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

				<div class="header__mail">
					<span>Предложения и пожелания</span>
					<a href="mailto://info@striksi.ru">info@striksi.ru</a>
				</div>

				<div class="header__burger"><span></span></div>

			</div>

		</header><!-- .header -->
