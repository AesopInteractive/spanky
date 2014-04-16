<?php

class spankyScriptLoader {

	public function __construct(){

		add_action('wp_enqueue_scripts', array($this,'load_scripts'));

	}

	public function load_scripts(){

		wp_enqueue_script('jorgen-script', SPANKY_THEME_URL.'/assets/js/spanky.js', array('jquery','ai-core'), SPANKY_THEME_VERSION, true);
		wp_enqueue_style('spanky-style', get_stylesheet_directory_uri().'/assets/css/style.css', 1.0, true);
	}

}
new spankyScriptLoader;