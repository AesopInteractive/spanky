<?php
/**
* create custom meta boxes for project meta
*
* @since version 1.0
* @param null
* @return custom meta boxes
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'cmb_meta_boxes', 'ba_spanky_metaboxes' );
function ba_spanky_metaboxes( array $meta_boxes ) {

	$opts = array(
		array(
			'id' 			=> 'spanky_story_highlights',
			'name' 			=> __('Story Highlights', 'aesop-core'),
			'type' 			=> 'wysiwyg',
			'options'		=> array(
				'textarea_rows'	=> 3
			),
			'repeatable'     => true,
			'repeatable_max' => 20,
			'desc'			=> __('Assign latitude and longitude for each marker.', 'aesop-core')
		)
	);

	$meta_boxes[] = array(
		'title' => __('Story Highlights', 'spanky-core'),
		'pages' => 'post',
		'fields' => $opts
	);

	return $meta_boxes;

}	