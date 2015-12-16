<?php
/*
Plugin Name: Tuts+ Custom Content Types
Plugin URI: http://rachelmccollin.co.uk/tutsplus-custom-content-types/
Description: Plugin to support tuts+ course on Getting to Grips with WordPress Custom Content Types.
Version: 2.2
Author: Rachel McCollin
Author URI: http://rachelmccollin.co.uk
Text domain: tutsplus
License: GPLv2
*/

/*************************************************************
Register post types
*************************************************************/
function tutsplus_register_post_types() {
	
	$labels = array(
		'name' => __('Moons', 'tutsplus'),
		'singular_name' => __('Moon', 'tutsplus'),
		'add_new' => __('Add New Moon', 'tutsplus'),
		'edit_item' => __('Edit Moon', 'tutsplus'),
		'new_item' => __('New Moon', 'tutsplus'),
		'view_item' => __('View Moon', 'tutsplus'),
		'search_items' => __('Search All Moons', 'tutsplus'),
		'not_found' => __('No Moons Found', 'tutsplus'),
		'not_found_in_trash' => __('No Moons Found in Trash', 'tutsplus'),

	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		)
	);
	register_post_type( 'moon', $args );
	
}
add_action( 'init', 'tutsplus_register_post_types' );
?>