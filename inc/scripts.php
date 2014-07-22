<?php

class andersenScriptLoader {

	public function __construct(){

		add_action('template_redirect', array($this,'load_posts'));
		add_action('wp_enqueue_scripts', array($this,'load_scripts'));

	}

	public function load_scripts(){

		wp_enqueue_script('andersen-script', ANDERSEN_THEME_URL.'/assets/js/andersen.min.js', array('jquery','ai-core'), ANDERSEN_THEME_VERSION, true);
		wp_enqueue_style('andersen-style', get_stylesheet_directory_uri().'/style.css', 1.0, true);
	}

	public function load_posts() {

	 	global $wp_query;

	 	// Add code to index pages.
	 	if ( is_home() || is_archive() ) {
	 		// Queue JS and CSS
	 		wp_enqueue_script('andersen-post-loader',ANDERSEN_THEME_URL.'/assets/js/load-posts.min.js',array('jquery'),ANDERSEN_THEME_VERSION,true);

	 		// What page are we on? And what is the pages limit?
	 		$max = $wp_query->max_num_pages;
	 		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

	 		// Add some parameters for the JS.
	 		wp_localize_script(
	 			'andersen-post-loader',
	 			'pbd_alp',
	 			array(
	 				'startPage' => $paged,
	 				'maxPages' => $max,
	 				'nextLink' => next_posts($max, false)
	 			)
	 		);
	 	}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		    wp_enqueue_script( 'comment-reply' );
		}
	}
}
new andersenScriptLoader;