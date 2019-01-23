<?php

namespace MarcPro;

use function A7\Admin_Notices\add_admin_notice;
use function A7\Seeder\add_seed;
use function Zeek\WP_Util\get_raw_post_meta_value;

add_seed( [
	'name'        => 'Convert Fields',
	'description' => 'Converts data from old meta fields data to ACF.',
	'callback'    => function () {

		global $wpdb;

		$args = array( 'post_type' => 'events' );

		$sql = "SELECT ID FROM $wpdb->posts WHERE post_type = 'events'";
		$results = $wpdb->get_results($sql);
		foreach( $results as $row ) {

			$post_id = $row->ID;

			$sql = "DELETE FROM $wpdb->postmeta WHERE post_id = $post_id AND meta_key LIKE '%sponsors_%_image'";
			$wpdb->query( $sql );
			$sql = "DELETE FROM $wpdb->postmeta WHERE post_id = $post_id AND meta_key LIKE '%sponsors_%_url'";
			$wpdb->query( $sql );
			$sql = "DELETE FROM $wpdb->postmeta WHERE post_id = $post_id AND meta_key = 'sponsors'";
			$wpdb->query( $sql );
			$sql = "DELETE FROM $wpdb->postmeta WHERE post_id = $post_id AND meta_key = '_sponsors'";
			$wpdb->query( $sql );

			$count = 0;
			for ( $i = 1; $i < 61; $i ++ ) {
				$image_url = get_raw_post_meta_value( $post_id, ( 'custom_sponsors_' . $i ) );
				if ( $image_url ) {
					$image_id    = get_image_id( $image_url );
					$sponsor_url = get_raw_post_meta_value( $post_id, ( 'custom_sponsors_url_' . $i ) );

					$sql = "INSERT INTO $wpdb->postmeta 
					(post_id, meta_key, meta_value) 
					VALUES 
					($post_id, 'sponsors_" . $count . "_image', $image_id)";
					$wpdb->query( $sql );

					$sql = "INSERT INTO $wpdb->postmeta 
					(post_id, meta_key, meta_value) 
					VALUES 
					($post_id, '_sponsors_" . $count . "_image', 'field_5c3f6a16ba471')";
					$wpdb->query( $sql );

					$sql = "INSERT INTO $wpdb->postmeta 
					(post_id, meta_key, meta_value) 
					VALUES 
					($post_id, 'sponsors_" . $count . "_url', '$sponsor_url')";
					$wpdb->query( $sql );

					$sql = "INSERT INTO $wpdb->postmeta 
					(post_id, meta_key, meta_value) 
					VALUES 
					($post_id, '_sponsors_" . $count . "_url', 'field_5c3f6a4bba472')";
					$wpdb->query( $sql );

					$count ++;
				}
			}

			$sql = "INSERT INTO $wpdb->postmeta 
			(post_id, meta_key, meta_value) 
			VALUES 
			($post_id, 'sponsors', $count)";
			$wpdb->query( $sql );

			$sql = "INSERT INTO $wpdb->postmeta 
			(post_id, meta_key, meta_value) 
			VALUES 
			($post_id, '_sponsors', 'field_5c3f69ffba470')";
			$wpdb->query( $sql );

		}

		echo 'Metadata updated';

	}
] );

add_seed([
	'name'        => 'Migrate Events to ACF',
	'description' => 'Migrates all meta box data on the Event custom post type to the correct ACF fields (batches 200 events at a time).',
	'callback'    => function() {

		$offset = get_transient( 'events-to-acf-offset' );
		if ( empty( $offset ) ) {
			$offset = 0;
		}

		$events = get_posts([
			'post_type'      => 'events',
			'post_status'    => 'publish',
			'posts_per_page' => 200,
			'offset'         => absint( $offset )
		]);

		$old_key_map = get_old_event_key_map();

		foreach( $events as $event ) {

			// Get all metadata.
			$data = get_metadata( 'post', $event->ID, '' );

			// Filter the metadata to only contain the old keys.
			$data = array_intersect_key( $data, $old_key_map );

			foreach( $data as $key => $meta ) {

				$val = isset( $meta[0] ) ? $meta[0] : null;

				if ( is_null( $val ) ) {
					continue;
				}

				// Convert image url to ID.
				$image = get_image_id( $val );
				if ( false !== $image ) {
					$val = $image;
				}

				if ( is_array( $old_key_map[$key] ) ) {
					update_repeater_fields( $old_key_map[$key], $event->ID );
				} else {
					$val     = apply_filters( 'seeder_migrate_before_update', $val, $old_key_map[$key], $data );
					$updated = update_field( $old_key_map[$key], $val, $event->ID );
				}

			}
		}

		// Update offset
		$new_offset = absint( $offset ) + count( $events );
		set_transient( 'events-to-acf-offset', $new_offset );

		if ( $new_offset - $offset < 200 ) {
			echo 'All done!';
		} {
			echo "Updated events {$offset} - {$new_offset}. Run it again!";
		}

	}
]);

add_filter( 'seeder_migrate_before_update', function( $val, $map ) {
	if ( in_array( $map, [
		'event_sold_out'
	] ) ) {
		return $val === 'off' ? 0 : 1;
	}

	return $val;
}, 10, 2 );

function update_repeater_fields( $meta = [], $id = 0, $parent = '', $current_index = '' ) {

	if ( empty( $meta ) || empty( $id ) ) {
		return false;
	}

	foreach( $meta['old_keys'] as $index => $field ) {

		// Check for nested values.
		foreach( $field as $old_key => $new_key ) {
			if ( is_array( $new_key ) ) {
				update_repeater_fields( $new_key, $id, $meta['name'], $index );
			}
		}

		$values = get_repeater_values( $field, $id );

		if ( ! empty( $values ) ) {
			if ( empty( $parent ) && empty( $current_index) ) {
				update_row( $meta['name'], $index + 1, $values, $id );
			} else {
				update_sub_row( [$parent, $current_index + 1, $meta['name']], $index + 1, $values, $id );
			}
		}

	}

}

function get_repeater_values( $field = [], $id = 0 ) {

	if ( empty( $field ) || empty( $id ) ) {
		return false;
	}

	$values = [];

	foreach( $field as $old_key => $new_key ) {

		if ( is_array( $new_key ) ) {
			continue;
		}

		$val = get_post_meta( $id, $old_key, true );
		if ( ! empty( $val ) ) {

			// Convert to image ID.
			$image = get_image_id( $val );
			if ( $image ) {
				$val = $image;
			}

			$val = apply_filters( 'seeder_migrate_before_update', $val, $field );

			$values[$new_key] = $val;
		}

	}

	return $values;

}

function get_image_id( $image_url ) {

	global $wpdb;

	if ( empty( $image_url ) ) {
		return false;
	}

	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

	return (isset( $attachment[0] ) && ! empty( $attachment[0] ) ) ? $attachment[0] : false;

}

function get_old_event_key_map() {
	return [
		'eventSoldout' => 'event_sold_out',
		'events_list_cell_image' => 'event_image',
		'events_list_cell_image_logo' => 'event_image_logo',
		'eventDate' => 'event_date',
		'eventTime' => 'event_time',
		'eventCity' => 'event_city',
		'eventPurchaseLink' => 'event_purchase_link',
		'eventPresentingSponsor' => 'event_presenting_sponsor',
		'eventPresentingSponsorUrl' => 'event_presenting_sponsor_url',
		'eventIntroImage' => 'event_intro_image',
		'eventIntroHeading' => 'event_intro_heading',
		'eventIntroText' => 'event_intro_text',
		'eventIntroItem1_heading' => [
			'name'     => 'repeater_event_intro_item',
			'old_keys' => [
				[
					'eventIntroItem1_heading' => 'heading',
					'eventIntroItem1_text' => 'text'
				],
				[
					'eventIntroItem2_heading' => 'heading',
					'eventIntroItem2_text' => 'text'
				]
			]
		],
		'eventFeedback_heading_1' => [
			'name'     => 'repeater_event_feedback',
			'old_keys' => [
				[
					'eventFeedback_heading_1' => 'heading',
					'eventFeedback_client_1' => 'client',
					'eventFeedback_date_1' => 'date',
					'eventFeedback_excerpt_1' => 'excerpt',
				],
				[
					'eventFeedback_heading_2' => 'heading',
					'eventFeedback_client_2' => 'client',
					'eventFeedback_date_2' => 'date',
					'eventFeedback_excerpt_2' => 'excerpt',
				],
				[
					'eventFeedback_heading_3' => 'heading',
					'eventFeedback_client_3' => 'client',
					'eventFeedback_date_3' => 'date',
					'eventFeedback_excerpt_3' => 'excerpt',
				]
			]
		],
		'eventVideo' => 'event_video',
		'eventIntro2Image' => [
			'name' => 'repeater_continued_intros',
			'old_keys' => [
				[
					'eventIntro2Image' => 'image',
					'eventIntro2Heading' => 'heading',
					'eventContinuedIntroText' => 'introduction_text',
				],
				[
					'eventIntro3Image' => 'image',
					'eventIntro3Heading' => 'heading',
					'eventContinuedIntroText3' => 'introduction_text',
				],
				[
					'eventIntro5Image' => 'image',
					'eventIntro5Heading' => 'heading',
					'eventContinuedIntroText5' => 'introduction_text',
				]
			]
		],
		'eventMap' => 'event_map',
		'eventMapUrl' => 'event_map_url',
		'eventTicketsCard_1_subHeading' => [
			'name' => 'repeater_event_ticket_cards',
			'old_keys' => [
				[
					'eventTicketsCard_1_subHeading' => 'subheading',
					'eventTicketsCard_1_heading' => 'heading',
					'eventTicketsCard_1_text' => 'text',
					'eventTicketsCard_1_price' => 'price',
					'eventTicketsCard_1_purchase' => 'purchase_link',
					'eventTicketsCard_1_also_1' => [
						'name' => 'includes',
						'old_keys' => [
							['eventTicketsCard_1_also_1' => 'text'],
							['eventTicketsCard_1_also_2' => 'text'],
							['eventTicketsCard_1_also_3' => 'text'],
							['eventTicketsCard_1_also_4' => 'text'],
						]
					],
				],
				[
					'eventTicketsCard_2_subHeading' => 'subheading',
					'eventTicketsCard_2_heading' => 'heading',
					'eventTicketsCard_2_text' => 'text',
					'eventTicketsCard_2_price' => 'price',
					'eventTicketsCard_2_purchase' => 'purchase_link',
					'eventTicketsCard_2_also_1' => [
						'name' => 'includes',
						'old_keys' => [
							['eventTicketsCard_2_also_1' => 'text'],
							['eventTicketsCard_2_also_2' => 'text'],
							['eventTicketsCard_2_also_3' => 'text'],
							['eventTicketsCard_2_also_4' => 'text'],
						]
					]
				],
				[
					'eventTicketsCard_3_subHeading' => 'subheading',
					'eventTicketsCard_3_heading' => 'heading',
					'eventTicketsCard_3_text' => 'text',
					'eventTicketsCard_3_price' => 'price',
					'eventTicketsCard_3_purchase' => 'purchase_link',
					'eventTicketsCard_3_also_1' => [
						'name' => 'includes',
						'old_keys' => [
							['eventTicketsCard_3_also_1' => 'text'],
							['eventTicketsCard_3_also_2' => 'text'],
							['eventTicketsCard_3_also_3' => 'text'],
							['eventTicketsCard_3_also_4' => 'text'],
						]
					]
				]
			]
		],
		'advert' => 'advert_body',
		'advertHead' => 'advert_head',
	];
}