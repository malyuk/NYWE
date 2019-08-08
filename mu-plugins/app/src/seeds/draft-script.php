<?php
/**
 * Automate moving old posts to draft status.
 *
 * @author Freeshifter LLC
 */

namespace NYWE;

use function A7\Seeder\add_seed;

add_seed( [
	'name'        => 'Update Post Status',
	'description' => 'Transfers published posts before a specified date to draft status.',
	'callback'    => function () {

		$posts = new \WP_Query([
			'post_type'   => 'events',
			'post_status' => 'publish',
			'date_query'  => [
				[
					'before' => [
						'year'  => 2018,
						'month' => 8,
						'day'   => 25
					],
					'inclusive' => false
				]
			]
		]);

		if ( $posts->have_posts() ) {
			while( $posts->have_posts() ) {
				$posts->the_post();
				wp_update_post([
					'ID'          => get_the_ID(),
					'post_status' => 'draft'
				]);
			}
		}
	}
] );