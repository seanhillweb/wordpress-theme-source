<!DOCTYPE html>

<html <?php language_attributes(); ?> >

<head>

	<?php // Meta Data ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

	<?php // Force Internet Explorer to use the latest rendering engine available ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php // End of Meta Data ?>

	<?php // Site Title ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php // End of Site Title ?>

	<?php // Wordpress Head ?>
	<?php wp_head(); ?>
	<?php // End of Wordpress Head ?>

</head>

<body <?php body_class(); ?> >

	<header class="site-header" role="header">

		<div class="container">

			<div class="row">

				<div class="col s12 m12 l12">

					<div class="header-content">

						<h4 class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Source</a></h4>

						<nav class="header-navigation" role="navigation">

							<a href="#primary-navigation" id="toggle-menu" class="toggle-menu"><i class="fa fa-navicon"></i>Menu</a>

							<?php wp_nav_menu(array(
								'container' 		=> false,					// remove nav container
								'menu_id'	 		=> 'primary-navigation',	// adding custom nav id
								'menu_class' 		=> 'primary-navigation',	// adding custom nav class
								'theme_location' 	=> 'primary-navigation',	// where it's located in the theme
								'depth' 			=> 0,						// limit the depth of the nav
								'fallback_cb' 		=> ''						// fallback function (if there is one)
							)); ?>

						</nav>

					</div>

				</div>

			</div>

		</div>

	</header>