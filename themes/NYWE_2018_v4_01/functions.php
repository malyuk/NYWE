<?php

// ====================
// SETUP:
// ====================

// Register Sidebar:
if ( function_exists( "register_sidebar" ) ) {
	register_sidebar(
		array(
			'id'   => 'sidebar-1',
			'name' => 'sidebar-1',
		)
	);
}

// Register Menus:
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'header_main_menu' => 'Header Main Menu',
			'header_sub_menu'  => 'Header Sub Menu',
			'footer_about_us'  => 'Footer: About Us',
		)
	);
}


// Theme Support:
add_theme_support( 'post-thumbnails' );


// CUSTOM EXCERPT READ MORE LINK:
function new_excerpt_more( $more ) {
	return ' - <a class="read-more" href="' . get_permalink( get_the_ID() ) . '"><strong>Read More</strong></a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


// PUBLISH FUTURE EVENTS POSTS-TYPE:
remove_action( 'future_post', '_future_post_hook' );
add_filter( 'wp_insert_post_data', 'nacin_do_not_set_posts_to_future' );
function nacin_do_not_set_posts_to_future( $data ) {
	if ( $data['post_status'] == 'future' ) {
		$data['post_status'] = 'publish';
	}

	return $data;
}

// end FUTURE POSTS

// NAV MENUS REVERSE OPTION
// wp_nav_menu(array('reverse' => TRUE, ...));
function my_reverse_nav_menu( $menu, $args ) {
	if ( isset( $args->reverse ) && $args->reverse ) {
		return array_reverse( $menu );
	}

	return $menu;
}

add_filter( 'wp_nav_menu_objects', 'my_reverse_nav_menu', 10, 2 );


/* ========================================= */
/*  SETTONGS + POST TYPES + METABOXES        */
/* ========================================= */

// Global:
require_once( 'theme_settings/theme_settings.php' );

// Post:
require_once( 'post-types/post_post-type.php' );
// Page:
require_once( 'post-types/page_post-type.php' );
// Homepage Page:
require_once( 'post-types/page_homepage_post-type.php' );
// Events:
require_once( 'post-types/events_post-type.php' );
// Daytrip:
require_once( 'post-types/daytrip_post-type.php' );
// Globla Sponsors:
require_once( 'post-types/global_sponsors_post-type.php' );
// Gallery:
require_once( 'post-types/gallery_post-type.php' );
// About Page:
require_once( 'post-types/page_about_post-type.php' );
// Membership Page:
require_once( 'post-types/page_membership_post-type.php' );
// Sponsorship Page:
require_once( 'post-types/page_sponsorship_post-type.php' );
// Shop Page:
require_once( 'post-types/page_shop_post-type.php' );


// WOOCOMMERCE THEME SUPPORT:
// add_theme_support( 'woocommerce' );

// GUTENBER POST TYPE HACK..
// 'daytrip', 'events', 'gallery', 'sponsors'
/*
add_filter( 'gutenberg_can_edit_post_type', 'my_gutenberg_can_edit_post_types' );
function my_gutenberg_can_edit_post_types( $can_edit, $post_type ) {
    If ( in_array( $post_type, array( 'daytrip', 'events', 'gallery', 'sponsors' ) ) {
        return false;
    }
    return $can_edit;
}
*/

/* End Functions.php */


add_action( 'wp_enqueue_scripts', function () {

	$version = '3';

	wp_enqueue_script( 'jquery' );

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		$version
	);

	wp_enqueue_style(
		'wpb-google-fonts',
		'https://fonts.googleapis.com/css?family=Oswald:400,300',
		false
	);

} );

