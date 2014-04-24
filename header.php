<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

	<a class="spanky-menu-toggle" href="#">Menu</a>

	<header id="spanky-header" class="spanky-header">

		<?php if (is_page() && !is_page_template('template-sidebar.php')){
			get_template_part('partials/brand-block');
		}

		wp_nav_menu( array( 'theme_location' => 'main_nav','menu_class' => 'spanky-nav-menu unstyled','container_id' => 'spanky-primary-nav', 'container' => false ) ); ?>

	</header>