<?php

namespace NYWE;

/**
 * Checks if current post has a gallery.
 *
 * @return bool
 */
function post_has_gallery() {
	$gallery     = get_field( 'gallery', get_the_ID() );
	$gallery     = $gallery[0] ?? '';
	$has_gallery = ! empty( $gallery );
	return $has_gallery;
}

/**
 * Checks if current post has a gallery.
 *
 * @return bool
 */
function get_post_gallery_id() {
	$gallery     = get_field( 'gallery', get_the_ID() );
	$gallery     = $gallery[0] ?? false;
	return $gallery;
}

/**
 * Load gallery assets on a post if gallery selected.
 */
add_action( 'wp_head', function() {
	if ( post_has_gallery() ) {
		$shortcode = new \Modula_Shortcode();
	}
} );