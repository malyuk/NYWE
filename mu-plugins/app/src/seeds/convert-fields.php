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

		add_admin_notice( 'Metadata updated' );

	}
] );

function get_image_id( $image_url ) {
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

	return $attachment[0];
}