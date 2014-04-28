<?php

class andersenFunctions {

	function __construct(){

		// Set some constants
		define('ANDERSEN_THEME_VERSION', '1.0');

		define('ANDERSEN_THEME_DIR', get_template_directory());
		define('ANDERSEN_THEME_URL', get_template_directory_uri());

		// Includes
		require_once(ANDERSEN_THEME_DIR.'/inc/helpers.php' );
		require_once(ANDERSEN_THEME_DIR.'/inc/options.php' );
		require_once(ANDERSEN_THEME_DIR.'/inc/scripts.php' );

		if( !class_exists( 'TGM_Plugin_Activation' ) && is_admin() ) {
			require_once(ANDERSEN_THEME_DIR.'/class-tgm-plugin-activation.php');
		}

		if (is_admin()) {
			require_once(ANDERSEN_THEME_DIR.'/activator.php');
		}

		// Load Updater
		if( !class_exists( 'EDD_SL_Theme_Updater' ) ) {
			// load our custom updater
			include( ANDERSEN_THEME_DIR.'/EDD_SL_Theme_Updater.php' );
		}

		require_once(ANDERSEN_THEME_DIR.'/updater.php');

		add_action('after_setup_theme', 			array($this,'setup'));
		add_filter('aesop_chapter_scroll_offset', 	array($this,'aesop_chapter_scroll_offset'));
		add_filter('aesop_timeline_scroll_offset', 	array($this,'aesop_timeline_scroll_offset'));
		add_filter('body_class', 					array($this,'body_class'));
		add_filter('widget_text', 					'do_shortcode');
	}

	function setup(){

		// set theme width
		if ( ! isset( $content_width ) ) {
			$width = get_theme_mod('andersen_width', 780);
			$content_width = $width;

		}

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		add_image_size('andersen-index-cover', 800, 300, true);

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
		) );

		if ( function_exists( 'register_nav_menus' ) ){
			register_nav_menus(
				array(
				  'main_nav' => __('Main Nav','andersen')
				)
			);
		}

		// front page sidebar
		register_sidebars(1, array(
			'name' 			=> __('Default Sidebar', 'andersen'),
			'id' 			=> 'andersen_sb',
	      	'before_title' 	=> '<h6 class="andersen-sb-heading">',
	      	'after_title' 	=> '</h6>',
			'before_widget' => '<div class="andersen-widget">',
			'after_widget' 	=> '</div>'
	    ));

		// Single sidebar
	    register_sidebars(1, array(
			'name' 			=> __('Single Sidebar', 'andersen'),
			'id' 			=> 'andersen_single_sb',
	      	'before_title' 	=> '<h6 class="andersen-sb-heading">',
	      	'after_title' 	=> '</h6>',
			'before_widget' => '<div class="andersen-widget">',
			'after_widget' 	=> '</div>'
	    ));

	    // i18n
	    load_theme_textdomain('andersen', ANDERSEN_THEME_DIR. '/languages');
	}

	function aesop_chapter_scroll_offset(){

		return 70;
	}

	function aesop_timeline_scroll_offset(){

		return 70;
	}

	function body_class($classes){

		$classes[] = 'andersen';
		return $classes;
	}
}
new andersenFunctions;



