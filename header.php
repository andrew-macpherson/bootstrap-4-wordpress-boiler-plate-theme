<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!-- header -->
<header class="header clear" role="banner">
	<div class="container">
			<div class="logo d-flex">
				<div class="col-12">
					<img src="https://www.netgainseo.com/wp-content/uploads/2017/02/NetgainSEOLogo.png" />
				</div>
			</div>

			<nav class="navbar navbar-toggleable-md navbar-light bg-faded" role="navigation">

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="mainMenu" class="collapse navbar-collapse">
					<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'main',
							'container'         => 'false',
							'menu_class'        => 'navbar-nav mr-auto',
							'walker'			=> new bootstrap_Walker(true)
						)
					);
					?>
				</div>
		    </nav>
	</div>
</header>
<!-- /header -->
