<?php
/**
 * Allows the server to generate gallery markup.
 * @author Calvin Koepke <hello@calvinkoepke.com>
 */
add_action( 'rest_api_init', function() {
	register_rest_route(
		'nywe/v1',
		'/gallery/',
		[
			'method'            => 'GET',
			'callback'          => function( $data ) {
				if ( ! class_exists( 'Modula' ) ) {
					return new WP_REST_Response( 'Modula not found. Make sure the plugin is installed and activated.', 400 );
				}

				$id = $data['id'] ?? '';

				if ( empty( $id ) ) {
					return new \WP_REST_Response( 'No ID found.', 400 );
				}

				$html = do_shortcode( "[Modula id='" . esc_attr( $id ) . "']" );

				if ( ! empty( $html ) ) {
					return new \WP_REST_Response( $html, 200 );
				}
			},
			'args' => [
				'id' => [
					'sanitize_callback' => function( $id ) {
						return absint( $id );
					}
				]
			],
		]
	);
});