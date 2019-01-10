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

