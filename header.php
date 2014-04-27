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

	<?php do_action('ase_theme_body_before'); //action ?>
	<body <?php body_class(); ?>>

	<?php do_action('ase_theme_header_before'); //action ?>

	<a class="andersen-menu-toggle" href="#"><?php apply_filters('andersen_menu_text', _e('Menu','andersen'));?></a>

	<header id="andersen-header" class="andersen-header">

		<?php do_action('ase_theme_header_inside_top'); //action ?>

		<?php if ( ( is_page() && !is_page_template('template-sidebar.php') ) || is_404() ){
			get_template_part('partials/brand-block');
		}

		wp_nav_menu( array( 'theme_location' => 'main_nav','menu_class' => 'andersen-nav-menu unstyled','container_id' => 'andersen-primary-nav', 'container' => false ) );

		do_action('ase_theme_header_inside_bottom'); //action ?>
	</header>

	<?php do_action('ase_theme_header_after'); //action ?>