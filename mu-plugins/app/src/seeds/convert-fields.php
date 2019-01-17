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
	'description' => 'Migrates all meta box data on the Event custom post type to the correct ACF fields.',
	'callback'    => function() {

		$events = get_posts([
			'post_type'      => 'events',
			'post_status'    => 'publish',
			'posts_per_page' => -1
		]);

		$old_key_map = get_old_event_key_map();

		foreach( $events as $event ) {

			if ( $event->ID !== 24338 ) {
				continue;
			}

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

				$acf = get_field( $old_key_map[$key], $event->ID );
				update_field( $old_key_map[$key], $val, $event->ID );
				
			}
		}
	}
]);

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
		'eventIntroItem1_heading' => 'repeater_event_intro_item',
		'eventIntroItem1_text' => 'repeater_event_intro_item',
		'eventIntroItem2_heading' => 'repeater_event_intro_item',
		'eventIntroItem2_text' => 'repeater_event_intro_item',
		'eventFeedback_heading_1' => 'repeater_event_feedback',
		'eventFeedback_client_1' => 'repeater_event_feedback',
		'eventFeedback_date_1' => 'repeater_event_feedback',
		'eventFeedback_excerpt_1' => 'repeater_event_feedback',
		'eventFeedback_heading_2' => 'repeater_event_feedback',
		'eventFeedback_client_2' => 'repeater_event_feedback',
		'eventFeedback_date_2' => 'repeater_event_feedback',
		'eventFeedback_excerpt_2' => 'repeater_event_feedback',
		'eventFeedback_heading_3' => 'repeater_event_feedback',
		'eventFeedback_client_3' => 'repeater_event_feedback',
		'eventFeedback_date_3' => 'repeater_event_feedback',
		'eventFeedback_excerpt_3' => 'repeater_event_feedback',
//		'eventVideo',
//		'eventIntro2Image',
//		'eventIntro2Heading',
//		'eventContinuedIntroText',
//		'eventIntro3Image',
//		'eventIntro3Heading',
//		'eventContinuedIntroText3',
//		'eventIntro4Image',
//		'eventIntro4Heading',
//		'eventContinuedIntroText4',
//		'eventIntro5Image',
//		'eventIntro5Heading',
//		'eventContinuedIntroText5',
//		'eventMap',
//		'eventMapUrl',
//		'eventTicketsCard_1_subHeading',
//		'eventTicketsCard_1_heading',
//		'eventTicketsCard_1_text',
//		'eventTicketsCard_1_price',
//		'eventTicketsCard_1_purchase',
//		'eventTicketsCard_1_also_1',
//		'eventTicketsCard_1_also_2',
//		'eventTicketsCard_1_also_3',
//		'eventTicketsCard_1_also_4',
//		'eventTicketsCard_2_subHeading',
//		'eventTicketsCard_2_heading',
//		'eventTicketsCard_2_text',
//		'eventTicketsCard_2_price',
//		'eventTicketsCard_2_purchase',
//		'eventTicketsCard_2_also_1',
//		'eventTicketsCard_2_also_2',
//		'eventTicketsCard_2_also_3',
//		'eventTicketsCard_2_also_4',
//		'eventTicketsCard_3_subHeading',
//		'eventTicketsCard_3_heading',
//		'eventTicketsCard_3_text',
//		'eventTicketsCard_3_price',
//		'eventTicketsCard_3_purchase',
//		'eventTicketsCard_3_also_1',
//		'eventTicketsCard_3_also_2',
//		'eventTicketsCard_3_also_3',
//		'eventTicketsCard_3_also_4',
//		'advert',
//		'advertHead',
	];
}