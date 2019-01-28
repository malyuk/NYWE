<?php

namespace NYWE;

function generate_lazy_load_params( $content = '' ) {

	if ( empty( $content ) ) {
		return false;
	}

	if ( ! function_exists( 'lazyload_images_add_placeholders' ) ) {
		return $content;
	}

	return \lazyload_images_add_placeholders( $content );

}