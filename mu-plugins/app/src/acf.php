<?php

namespace NYWE;

/*
 * Use ACFs local-json format instead of exporting/importing custom fields.
 *
 * @ref https://www.advancedcustomfields.com/resources/local-json/
 */

add_filter( 'acf/settings/save_json', function ( $path ) {
	return NYWE_CORE_PATH . 'acf-sync';
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
	return [ NYWE_CORE_PATH . 'acf-sync' ];
} );

/**
 * Add options page.
 */
add_action( 'acf/init', function() {
	$options = acf_add_options_page([
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme_settings',
	]);

	acf_add_options_sub_page([
		'page_title'  => 'General Settings',
		'menu_title'  => 'General Settings',
		'parent_slug' => $options['menu_slug']
	]);
});

