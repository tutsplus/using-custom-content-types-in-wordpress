<?php
/*
Plugin Name: Tuts+ Moons Metaboxes
Plugin URI: http://rachelmccollin.co.uk/tutsplus-custom-content-types/
Description: Plugin to support tuts+ course on Getting to Grips with WordPress Custom Content Types.
Version: 4.3
Author: Rachel McCollin
Author URI: http://rachelmccollin.co.uk
Text domain: tutsplus
License: GPLv2
*/

/*************************************************************
Metabox for diameter
*************************************************************/
// function to create metabox
function tutsplus_diameter_metabox() {
	
	add_meta_box(
		'tutsplus_diameter_metabox', 
		__( 'Diameter of Moon', 'tutsplus' ), 
		'tutsplus_diameter_metabox_callback', 
		'moon', 
		'normal',
		'high', 
		''	
	);
	
}
add_action( 'add_meta_boxes', 'tutsplus_diameter_metabox' );

// metabox callback function
function tutsplus_diameter_metabox_callback( $post ) {
	
	//nonce 
	wp_nonce_field( 'tutsplus_metabox_nonce_action', 'tutsplus_diameter_nonce_field' );
	
	//field and label
	$value = get_post_meta( $post->ID, 'Diameter (km)', true );
	echo '<label for="tutsplus_moon_diameter">';
	_e( 'Diameter of moon in km', 'tutsplus' );
	echo '</label> ';
	echo '<input type="number" id="tutsplus_moon_diameter" name="tutsplus_moon_diameter" value="' . esc_attr( $value ) . '" size="6" />';

}

// save metadata
function tutsplus_save_diameter_meta( $post_id ) {

	//nonce check
	if ( ! isset ( $_POST[ 'tutsplus_diameter_nonce_field' ]) || ! wp_verify_nonce ( $_POST[ 'tutsplus_diameter_nonce_field' ], 'tutsplus_metabox_nonce_action' )) {
		return;
	}
	
	//user permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	//save data
	if ( isset ( $_POST [ 'tutsplus_moon_diameter' ] ) ) {
		$new_value = sanitize_text_field( $_POST [ 'tutsplus_moon_diameter' ] );
		update_post_meta( $post_id, 'Diameter (km)', $new_value );
	}
	
}
add_action( 'save_post', 'tutsplus_save_diameter_meta' );