<?php

class andersenFunctions {

	function __construct(){

		// Set some constants
		define('SPANKY_THEME_VERSION', '1.0');

		define('SPANKY_THEME_DIR', get_template_directory());
		define('SPANKY_THEME_URL', get_template_directory_uri());

		// Includes
		require_once(SPANKY_THEME_DIR.'/inc/helpers.php' );
		require_once(SPANKY_THEME_DIR.'/inc/options.php' );
		require_once(SPANKY_THEME_DIR.'/inc/scripts.php' );

		add_action('after_setup_theme', array($this,'setup'));
		add_filter('aesop_chapter_scroll_offset', array($this,'aesop_chapter_scroll_offset'));
		add_filter('aesop_timeline_scroll_offset', array($this,'aesop_timeline_scroll_offset'));
		add_filter('body_class', 		array($this,'body_class'));


		add_filter('widget_text', 'do_shortcode');
		add_filter('aesop_video_component_classes', array($this,'aesop_video_component_classes'));
		add_filter('aesop_content_component_classes', array($this,'aesop_content_component_classes'));
	}

	function setup(){

		// set theme width
		if ( ! isset( $content_width ) ) {
			$width = get_theme_mod('jorgen_width', 780);
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
				  'main_nav' => 'Main Nav'
				)
			);
		}

		// front page sidebar
		register_sidebars(1, array(
			'name' 			=> __('Spanky Front Page Sidebar', 'andersen'),
			'id' 			=> 'andersen_sb',
	      	'before_title' 	=> '<h6 class="andersen-sb-heading">',
	      	'after_title' 	=> '</h6>',
			'before_widget' => '<div class="andersen-widget">',
			'after_widget' 	=> '</div>'
	    ));

		// Single sidebar
	    register_sidebars(1, array(
			'name' 			=> __('Spanky Single Sidebar', 'andersen'),
			'id' 			=> 'andersen_single_sb',
	      	'before_title' 	=> '<h6 class="andersen-sb-heading">',
	      	'after_title' 	=> '</h6>',
			'before_widget' => '<div class="andersen-widget">',
			'after_widget' 	=> '</div>'
	    ));
	}

	function aesop_chapter_scroll_offset(){

		return 70;
	}

	function aesop_timeline_scroll_offset(){

		return 70;
	}
	function aesop_video_component_classes(){

		return 'test test';
	}

		function aesop_content_component_classes(){

		return 'brandi';
	}

	function body_class($classes){

		$classes[] = 'andersen';
		return $classes;
	}
}
new andersenFunctions;



