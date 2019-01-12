<?php

/* EVENTS POST
====================== */

function event_post() {

	register_post_type( 'events',
		array(
			'labels'              => array(
				'name'               => __( 'Events v4', 'post type general name' ),
				'singular_name'      => __( 'Item Post', 'post type singular name' ),
				'add_new'            => __( 'Add New', 'custom post type item' ),
				'add_new_item'       => __( 'Add New item' ),
				'edit'               => __( 'Edit' ),
				'edit_item'          => __( 'Edit item' ),
				'new_item'           => __( 'New item' ),
				'view_item'          => __( 'View item' ),
				'search_items'       => __( 'Search items' ),
				'not_found'          => __( 'Nothing found in the Database.' ),
				'not_found_in_trash' => __( 'Nothing found in Trash' ),
				'parent_item_colon'  => ''
			),
			'description'         => __( 'This is a custom post type' ),
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 7,
			/* this is what order you want it to appear in on the left hand side menu */
			'menu_icon'           => get_stylesheet_directory_uri() . '/post-types/images/custom-post-icon.png',
			'rewrite'             => true,
			'hierarchical'        => false,
			'has_archive'         => true,
			'capability_type'     => array( 'admin', 'admins' ),
			// 'capability_type' => 'post',
			'map_meta_cap'        => true,
			/* 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky') */
			'supports'            => array( 'title', 'editor', 'excerpt' )
		) /* end of options */
	); /* end of register post type */

}

// adding the function to the Wordpress init
add_action( 'init', 'event_post' );


// ===========================
// v4 EVENT UI MODULE
// ===========================
// REGISTER:
add_action( 'add_meta_boxes', 'v4_event_meta_box_add' );
// CONFIG:
function v4_event_meta_box_add() {
	add_meta_box( 'v4-event-id', 'v4 Event UI', 'v4_event_meta_box_cb', 'events', 'normal', 'high' );
}

// ALLOW MULTI FILE:
// (I believe this conflicts because it has been previously loaded in the them..)
// function update_edit_form() { echo ' enctype="multipart/form-data"'; } add_action('post_edit_form_tag', 'update_edit_form');

// v4 META BOX
function v4_event_meta_box_cb( $post ) {

	// Config:
	$values = get_post_custom( $post->ID );

	$foo = isset( $values['foo'] ) ? esc_attr( $values['foo'][0] ) : '';

	$eventSoldout = isset( $values['eventSoldout'] ) ? esc_attr( $values['eventSoldout'][0] ) : '';

	$events_list_cell_image      = isset( $values['events_list_cell_image'] ) ? esc_attr( $values['events_list_cell_image'][0] ) : '';
	$events_list_cell_image_logo = isset( $values['events_list_cell_image_logo'] ) ? esc_attr( $values['events_list_cell_image_logo'][0] ) : '';
	$eventDate                   = isset( $values['eventDate'] ) ? esc_attr( $values['eventDate'][0] ) : '';
	$eventTime                   = isset( $values['eventTime'] ) ? esc_attr( $values['eventTime'][0] ) : '';
	$eventCity                   = isset( $values['eventCity'] ) ? esc_attr( $values['eventCity'][0] ) : '';
	$eventPurchaseLink           = isset( $values['eventPurchaseLink'] ) ? esc_attr( $values['eventPurchaseLink'][0] ) : '';

	$eventPresentingSponsor    = isset( $values['eventPresentingSponsor'] ) ? esc_attr( $values['eventPresentingSponsor'][0] ) : '';
	$eventPresentingSponsorUrl = isset( $values['eventPresentingSponsorUrl'] ) ? esc_attr( $values['eventPresentingSponsorUrl'][0] ) : '';

	$eventIntroImage         = isset( $values['eventIntroImage'] ) ? esc_attr( $values['eventIntroImage'][0] ) : '';
	$eventIntroHeading       = isset( $values['eventIntroHeading'] ) ? esc_attr( $values['eventIntroHeading'][0] ) : '';
	$eventIntroText          = isset( $values['eventIntroText'] ) ? esc_attr( $values['eventIntroText'][0] ) : '';
	$eventIntroItem1_heading = isset( $values['eventIntroItem1_heading'] ) ? esc_attr( $values['eventIntroItem1_heading'][0] ) : '';
	$eventIntroItem1_text    = isset( $values['eventIntroItem1_text'] ) ? esc_attr( $values['eventIntroItem1_text'][0] ) : '';
	$eventIntroItem2_heading = isset( $values['eventIntroItem2_heading'] ) ? esc_attr( $values['eventIntroItem2_heading'][0] ) : '';
	$eventIntroItem2_text    = isset( $values['eventIntroItem2_text'] ) ? esc_attr( $values['eventIntroItem2_text'][0] ) : '';

	$eventFeedback_heading_1 = isset( $values['eventFeedback_heading_1'] ) ? esc_attr( $values['eventFeedback_heading_1'][0] ) : '';
	$eventFeedback_client_1  = isset( $values['eventFeedback_client_1'] ) ? esc_attr( $values['eventFeedback_client_1'][0] ) : '';
	$eventFeedback_date_1    = isset( $values['eventFeedback_date_1'] ) ? esc_attr( $values['eventFeedback_date_1'][0] ) : '';
	$eventFeedback_excerpt_1 = isset( $values['eventFeedback_excerpt_1'] ) ? esc_attr( $values['eventFeedback_excerpt_1'][0] ) : '';

	$eventFeedback_heading_2 = isset( $values['eventFeedback_heading_2'] ) ? esc_attr( $values['eventFeedback_heading_2'][0] ) : '';
	$eventFeedback_client_2  = isset( $values['eventFeedback_client_2'] ) ? esc_attr( $values['eventFeedback_client_2'][0] ) : '';
	$eventFeedback_date_2    = isset( $values['eventFeedback_date_2'] ) ? esc_attr( $values['eventFeedback_date_2'][0] ) : '';
	$eventFeedback_excerpt_2 = isset( $values['eventFeedback_excerpt_2'] ) ? esc_attr( $values['eventFeedback_excerpt_2'][0] ) : '';

	$eventFeedback_heading_3 = isset( $values['eventFeedback_heading_3'] ) ? esc_attr( $values['eventFeedback_heading_3'][0] ) : '';
	$eventFeedback_client_3  = isset( $values['eventFeedback_client_3'] ) ? esc_attr( $values['eventFeedback_client_3'][0] ) : '';
	$eventFeedback_date_3    = isset( $values['eventFeedback_date_3'] ) ? esc_attr( $values['eventFeedback_date_3'][0] ) : '';
	$eventFeedback_excerpt_3 = isset( $values['eventFeedback_excerpt_3'] ) ? esc_attr( $values['eventFeedback_excerpt_3'][0] ) : '';

	$eventVideo = isset( $values['eventVideo'] ) ? esc_attr( $values['eventVideo'][0] ) : '';

	$eventIntro2Image        = isset( $values['eventIntro2Image'] ) ? esc_attr( $values['eventIntro2Image'][0] ) : '';
	$eventIntro2Heading      = isset( $values['eventIntro2Heading'] ) ? esc_attr( $values['eventIntro2Heading'][0] ) : '';
	$eventContinuedIntroText = isset( $values['eventContinuedIntroText'] ) ? esc_attr( $values['eventContinuedIntroText'][0] ) : '';

	$eventIntro3Image         = isset( $values['eventIntro3Image'] ) ? esc_attr( $values['eventIntro3Image'][0] ) : '';
	$eventIntro3Heading       = isset( $values['eventIntro3Heading'] ) ? esc_attr( $values['eventIntro3Heading'][0] ) : '';
	$eventContinuedIntroText3 = isset( $values['eventContinuedIntroText3'] ) ? esc_attr( $values['eventContinuedIntroText3'][0] ) : '';

	$eventIntro4Image         = isset( $values['eventIntro4Image'] ) ? esc_attr( $values['eventIntro4Image'][0] ) : '';
	$eventIntro4Heading       = isset( $values['eventIntro4Heading'] ) ? esc_attr( $values['eventIntro4Heading'][0] ) : '';
	$eventContinuedIntroText4 = isset( $values['eventContinuedIntroText4'] ) ? esc_attr( $values['eventContinuedIntroText4'][0] ) : '';

	$eventIntro5Image         = isset( $values['eventIntro5Image'] ) ? esc_attr( $values['eventIntro5Image'][0] ) : '';
	$eventIntro5Heading       = isset( $values['eventIntro5Heading'] ) ? esc_attr( $values['eventIntro5Heading'][0] ) : '';
	$eventContinuedIntroText5 = isset( $values['eventContinuedIntroText5'] ) ? esc_attr( $values['eventContinuedIntroText5'][0] ) : '';

	$eventMap    = isset( $values['eventMap'] ) ? esc_attr( $values['eventMap'][0] ) : '';
	$eventMapUrl = isset( $values['eventMapUrl'] ) ? esc_attr( $values['eventMapUrl'][0] ) : '';

	$eventTicketsCard_1_subHeading = isset( $values['eventTicketsCard_1_subHeading'] ) ? esc_attr( $values['eventTicketsCard_1_subHeading'][0] ) : '';
	$eventTicketsCard_1_heading    = isset( $values['eventTicketsCard_1_heading'] ) ? esc_attr( $values['eventTicketsCard_1_heading'][0] ) : '';
	$eventTicketsCard_1_text       = isset( $values['eventTicketsCard_1_text'] ) ? esc_attr( $values['eventTicketsCard_1_text'][0] ) : '';
	$eventTicketsCard_1_price      = isset( $values['eventTicketsCard_1_price'] ) ? esc_attr( $values['eventTicketsCard_1_price'][0] ) : '';
	$eventTicketsCard_1_purchase   = isset( $values['eventTicketsCard_1_purchase'] ) ? esc_attr( $values['eventTicketsCard_1_purchase'][0] ) : '';
	$eventTicketsCard_1_also_1     = isset( $values['eventTicketsCard_1_also_1'] ) ? esc_attr( $values['eventTicketsCard_1_also_1'][0] ) : '';
	$eventTicketsCard_1_also_2     = isset( $values['eventTicketsCard_1_also_2'] ) ? esc_attr( $values['eventTicketsCard_1_also_2'][0] ) : '';
	$eventTicketsCard_1_also_3     = isset( $values['eventTicketsCard_1_also_3'] ) ? esc_attr( $values['eventTicketsCard_1_also_3'][0] ) : '';
	$eventTicketsCard_1_also_4     = isset( $values['eventTicketsCard_1_also_4'] ) ? esc_attr( $values['eventTicketsCard_1_also_4'][0] ) : '';

	$eventTicketsCard_2_subHeading = isset( $values['eventTicketsCard_2_subHeading'] ) ? esc_attr( $values['eventTicketsCard_2_subHeading'][0] ) : '';
	$eventTicketsCard_2_heading    = isset( $values['eventTicketsCard_2_heading'] ) ? esc_attr( $values['eventTicketsCard_2_heading'][0] ) : '';
	$eventTicketsCard_2_text       = isset( $values['eventTicketsCard_2_text'] ) ? esc_attr( $values['eventTicketsCard_2_text'][0] ) : '';
	$eventTicketsCard_2_price      = isset( $values['eventTicketsCard_2_price'] ) ? esc_attr( $values['eventTicketsCard_2_price'][0] ) : '';
	$eventTicketsCard_2_purchase   = isset( $values['eventTicketsCard_2_purchase'] ) ? esc_attr( $values['eventTicketsCard_2_purchase'][0] ) : '';
	$eventTicketsCard_2_also_1     = isset( $values['eventTicketsCard_2_also_1'] ) ? esc_attr( $values['eventTicketsCard_2_also_1'][0] ) : '';
	$eventTicketsCard_2_also_2     = isset( $values['eventTicketsCard_2_also_2'] ) ? esc_attr( $values['eventTicketsCard_2_also_2'][0] ) : '';
	$eventTicketsCard_2_also_3     = isset( $values['eventTicketsCard_2_also_3'] ) ? esc_attr( $values['eventTicketsCard_2_also_3'][0] ) : '';
	$eventTicketsCard_2_also_4     = isset( $values['eventTicketsCard_2_also_4'] ) ? esc_attr( $values['eventTicketsCard_2_also_4'][0] ) : '';

	$eventTicketsCard_3_subHeading = isset( $values['eventTicketsCard_3_subHeading'] ) ? esc_attr( $values['eventTicketsCard_3_subHeading'][0] ) : '';
	$eventTicketsCard_3_heading    = isset( $values['eventTicketsCard_3_heading'] ) ? esc_attr( $values['eventTicketsCard_3_heading'][0] ) : '';
	$eventTicketsCard_3_text       = isset( $values['eventTicketsCard_3_text'] ) ? esc_attr( $values['eventTicketsCard_3_text'][0] ) : '';
	$eventTicketsCard_3_price      = isset( $values['eventTicketsCard_3_price'] ) ? esc_attr( $values['eventTicketsCard_3_price'][0] ) : '';
	$eventTicketsCard_3_purchase   = isset( $values['eventTicketsCard_3_purchase'] ) ? esc_attr( $values['eventTicketsCard_3_purchase'][0] ) : '';
	$eventTicketsCard_3_also_1     = isset( $values['eventTicketsCard_3_also_1'] ) ? esc_attr( $values['eventTicketsCard_3_also_1'][0] ) : '';
	$eventTicketsCard_3_also_2     = isset( $values['eventTicketsCard_3_also_2'] ) ? esc_attr( $values['eventTicketsCard_3_also_2'][0] ) : '';
	$eventTicketsCard_3_also_3     = isset( $values['eventTicketsCard_3_also_3'] ) ? esc_attr( $values['eventTicketsCard_3_also_3'][0] ) : '';
	$eventTicketsCard_3_also_4     = isset( $values['eventTicketsCard_3_also_4'] ) ? esc_attr( $values['eventTicketsCard_3_also_4'][0] ) : '';

	$advert     = isset( $values['advert'] ) ? esc_attr( $values['advert'][0] ) : '';
	$advertHead = isset( $values['advertHead'] ) ? esc_attr( $values['advertHead'][0] ) : '';

	/* Sponsor 1 */
	$custom_sponsors_1     = isset( $values['custom_sponsors_1'] ) ? esc_attr( $values['custom_sponsors_1'][0] ) : '';
	$custom_sponsors_url_1 = isset( $values['custom_sponsors_url_1'] ) ? esc_attr( $values['custom_sponsors_url_1'][0] ) : '';
	/* Sponsor 2 */
	$custom_sponsors_2     = isset( $values['custom_sponsors_2'] ) ? esc_attr( $values['custom_sponsors_2'][0] ) : '';
	$custom_sponsors_url_2 = isset( $values['custom_sponsors_url_2'] ) ? esc_attr( $values['custom_sponsors_url_2'][0] ) : '';
	/* Sponsor 3 */
	$custom_sponsors_3     = isset( $values['custom_sponsors_3'] ) ? esc_attr( $values['custom_sponsors_3'][0] ) : '';
	$custom_sponsors_url_3 = isset( $values['custom_sponsors_url_3'] ) ? esc_attr( $values['custom_sponsors_url_3'][0] ) : '';
	/* Sponsor 4 */
	$custom_sponsors_4     = isset( $values['custom_sponsors_4'] ) ? esc_attr( $values['custom_sponsors_4'][0] ) : '';
	$custom_sponsors_url_4 = isset( $values['custom_sponsors_url_4'] ) ? esc_attr( $values['custom_sponsors_url_4'][0] ) : '';
	/* Sponsor 5 */
	$custom_sponsors_5     = isset( $values['custom_sponsors_5'] ) ? esc_attr( $values['custom_sponsors_5'][0] ) : '';
	$custom_sponsors_url_5 = isset( $values['custom_sponsors_url_5'] ) ? esc_attr( $values['custom_sponsors_url_5'][0] ) : '';
	/* Sponsor 6 */
	$custom_sponsors_6     = isset( $values['custom_sponsors_6'] ) ? esc_attr( $values['custom_sponsors_6'][0] ) : '';
	$custom_sponsors_url_6 = isset( $values['custom_sponsors_url_6'] ) ? esc_attr( $values['custom_sponsors_url_6'][0] ) : '';
	/* Sponsor 7 */
	$custom_sponsors_7     = isset( $values['custom_sponsors_7'] ) ? esc_attr( $values['custom_sponsors_7'][0] ) : '';
	$custom_sponsors_url_7 = isset( $values['custom_sponsors_url_7'] ) ? esc_attr( $values['custom_sponsors_url_7'][0] ) : '';
	/* Sponsor 8 */
	$custom_sponsors_8     = isset( $values['custom_sponsors_8'] ) ? esc_attr( $values['custom_sponsors_8'][0] ) : '';
	$custom_sponsors_url_8 = isset( $values['custom_sponsors_url_8'] ) ? esc_attr( $values['custom_sponsors_url_8'][0] ) : '';
	/* Sponsor 9 */
	$custom_sponsors_9     = isset( $values['custom_sponsors_9'] ) ? esc_attr( $values['custom_sponsors_9'][0] ) : '';
	$custom_sponsors_url_9 = isset( $values['custom_sponsors_url_9'] ) ? esc_attr( $values['custom_sponsors_url_9'][0] ) : '';
	/* Sponsor 10 */
	$custom_sponsors_10     = isset( $values['custom_sponsors_10'] ) ? esc_attr( $values['custom_sponsors_10'][0] ) : '';
	$custom_sponsors_url_10 = isset( $values['custom_sponsors_url_10'] ) ? esc_attr( $values['custom_sponsors_url_10'][0] ) : '';
	/* Sponsor 11 */
	$custom_sponsors_11     = isset( $values['custom_sponsors_11'] ) ? esc_attr( $values['custom_sponsors_11'][0] ) : '';
	$custom_sponsors_url_11 = isset( $values['custom_sponsors_url_11'] ) ? esc_attr( $values['custom_sponsors_url_11'][0] ) : '';
	/* Sponsor 12 */
	$custom_sponsors_12     = isset( $values['custom_sponsors_12'] ) ? esc_attr( $values['custom_sponsors_12'][0] ) : '';
	$custom_sponsors_url_12 = isset( $values['custom_sponsors_url_12'] ) ? esc_attr( $values['custom_sponsors_url_12'][0] ) : '';
	/* Sponsor 13 */
	$custom_sponsors_13     = isset( $values['custom_sponsors_13'] ) ? esc_attr( $values['custom_sponsors_13'][0] ) : '';
	$custom_sponsors_url_13 = isset( $values['custom_sponsors_url_13'] ) ? esc_attr( $values['custom_sponsors_url_13'][0] ) : '';
	/* Sponsor 14 */
	$custom_sponsors_14     = isset( $values['custom_sponsors_14'] ) ? esc_attr( $values['custom_sponsors_14'][0] ) : '';
	$custom_sponsors_url_14 = isset( $values['custom_sponsors_url_14'] ) ? esc_attr( $values['custom_sponsors_url_14'][0] ) : '';
	/* Sponsor 15 */
	$custom_sponsors_15     = isset( $values['custom_sponsors_15'] ) ? esc_attr( $values['custom_sponsors_15'][0] ) : '';
	$custom_sponsors_url_15 = isset( $values['custom_sponsors_url_15'] ) ? esc_attr( $values['custom_sponsors_url_15'][0] ) : '';
	/* Sponsor 16 */
	$custom_sponsors_16     = isset( $values['custom_sponsors_16'] ) ? esc_attr( $values['custom_sponsors_16'][0] ) : '';
	$custom_sponsors_url_16 = isset( $values['custom_sponsors_url_16'] ) ? esc_attr( $values['custom_sponsors_url_16'][0] ) : '';
	/* Sponsor 17 */
	$custom_sponsors_17     = isset( $values['custom_sponsors_17'] ) ? esc_attr( $values['custom_sponsors_17'][0] ) : '';
	$custom_sponsors_url_17 = isset( $values['custom_sponsors_url_17'] ) ? esc_attr( $values['custom_sponsors_url_17'][0] ) : '';
	/* Sponsor 18 */
	$custom_sponsors_18     = isset( $values['custom_sponsors_18'] ) ? esc_attr( $values['custom_sponsors_18'][0] ) : '';
	$custom_sponsors_url_18 = isset( $values['custom_sponsors_url_18'] ) ? esc_attr( $values['custom_sponsors_url_18'][0] ) : '';
	/* Sponsor 19 */
	$custom_sponsors_19     = isset( $values['custom_sponsors_19'] ) ? esc_attr( $values['custom_sponsors_19'][0] ) : '';
	$custom_sponsors_url_19 = isset( $values['custom_sponsors_url_19'] ) ? esc_attr( $values['custom_sponsors_url_19'][0] ) : '';
	/* Sponsor 20 */
	$custom_sponsors_20     = isset( $values['custom_sponsors_20'] ) ? esc_attr( $values['custom_sponsors_20'][0] ) : '';
	$custom_sponsors_url_20 = isset( $values['custom_sponsors_url_20'] ) ? esc_attr( $values['custom_sponsors_url_20'][0] ) : '';
	/* Sponsor 21 */
	$custom_sponsors_21     = isset( $values['custom_sponsors_21'] ) ? esc_attr( $values['custom_sponsors_21'][0] ) : '';
	$custom_sponsors_url_21 = isset( $values['custom_sponsors_url_21'] ) ? esc_attr( $values['custom_sponsors_url_21'][0] ) : '';
	/* Sponsor 22 */
	$custom_sponsors_22     = isset( $values['custom_sponsors_22'] ) ? esc_attr( $values['custom_sponsors_22'][0] ) : '';
	$custom_sponsors_url_22 = isset( $values['custom_sponsors_url_22'] ) ? esc_attr( $values['custom_sponsors_url_22'][0] ) : '';
	/* Sponsor 23 */
	$custom_sponsors_23     = isset( $values['custom_sponsors_23'] ) ? esc_attr( $values['custom_sponsors_23'][0] ) : '';
	$custom_sponsors_url_23 = isset( $values['custom_sponsors_url_23'] ) ? esc_attr( $values['custom_sponsors_url_23'][0] ) : '';
	/* Sponsor 24 */
	$custom_sponsors_24     = isset( $values['custom_sponsors_24'] ) ? esc_attr( $values['custom_sponsors_24'][0] ) : '';
	$custom_sponsors_url_24 = isset( $values['custom_sponsors_url_24'] ) ? esc_attr( $values['custom_sponsors_url_24'][0] ) : '';
	/* Sponsor 25 */
	$custom_sponsors_25     = isset( $values['custom_sponsors_25'] ) ? esc_attr( $values['custom_sponsors_25'][0] ) : '';
	$custom_sponsors_url_25 = isset( $values['custom_sponsors_url_25'] ) ? esc_attr( $values['custom_sponsors_url_25'][0] ) : '';
	/* Sponsor 26 */
	$custom_sponsors_26     = isset( $values['custom_sponsors_26'] ) ? esc_attr( $values['custom_sponsors_26'][0] ) : '';
	$custom_sponsors_url_26 = isset( $values['custom_sponsors_url_26'] ) ? esc_attr( $values['custom_sponsors_url_26'][0] ) : '';
	/* Sponsor 27 */
	$custom_sponsors_27     = isset( $values['custom_sponsors_27'] ) ? esc_attr( $values['custom_sponsors_27'][0] ) : '';
	$custom_sponsors_url_27 = isset( $values['custom_sponsors_url_27'] ) ? esc_attr( $values['custom_sponsors_url_27'][0] ) : '';
	/* Sponsor 28 */
	$custom_sponsors_28     = isset( $values['custom_sponsors_28'] ) ? esc_attr( $values['custom_sponsors_28'][0] ) : '';
	$custom_sponsors_url_28 = isset( $values['custom_sponsors_url_28'] ) ? esc_attr( $values['custom_sponsors_url_28'][0] ) : '';
	/* Sponsor 29 */
	$custom_sponsors_29     = isset( $values['custom_sponsors_29'] ) ? esc_attr( $values['custom_sponsors_29'][0] ) : '';
	$custom_sponsors_url_29 = isset( $values['custom_sponsors_url_29'] ) ? esc_attr( $values['custom_sponsors_url_29'][0] ) : '';
	/* Sponsor 30 */
	$custom_sponsors_30     = isset( $values['custom_sponsors_30'] ) ? esc_attr( $values['custom_sponsors_30'][0] ) : '';
	$custom_sponsors_url_30 = isset( $values['custom_sponsors_url_30'] ) ? esc_attr( $values['custom_sponsors_url_30'][0] ) : '';
	/* Sponsor 31 */
	$custom_sponsors_31     = isset( $values['custom_sponsors_31'] ) ? esc_attr( $values['custom_sponsors_31'][0] ) : '';
	$custom_sponsors_url_31 = isset( $values['custom_sponsors_url_31'] ) ? esc_attr( $values['custom_sponsors_url_31'][0] ) : '';
	/* Sponsor 32 */
	$custom_sponsors_32     = isset( $values['custom_sponsors_32'] ) ? esc_attr( $values['custom_sponsors_32'][0] ) : '';
	$custom_sponsors_url_32 = isset( $values['custom_sponsors_url_32'] ) ? esc_attr( $values['custom_sponsors_url_32'][0] ) : '';
	/* Sponsor 33 */
	$custom_sponsors_33     = isset( $values['custom_sponsors_33'] ) ? esc_attr( $values['custom_sponsors_33'][0] ) : '';
	$custom_sponsors_url_33 = isset( $values['custom_sponsors_url_33'] ) ? esc_attr( $values['custom_sponsors_url_33'][0] ) : '';
	/* Sponsor 34 */
	$custom_sponsors_34     = isset( $values['custom_sponsors_34'] ) ? esc_attr( $values['custom_sponsors_34'][0] ) : '';
	$custom_sponsors_url_34 = isset( $values['custom_sponsors_url_34'] ) ? esc_attr( $values['custom_sponsors_url_34'][0] ) : '';
	/* Sponsor 35 */
	$custom_sponsors_35     = isset( $values['custom_sponsors_35'] ) ? esc_attr( $values['custom_sponsors_35'][0] ) : '';
	$custom_sponsors_url_35 = isset( $values['custom_sponsors_url_35'] ) ? esc_attr( $values['custom_sponsors_url_35'][0] ) : '';
	/* Sponsor 36 */
	$custom_sponsors_36     = isset( $values['custom_sponsors_36'] ) ? esc_attr( $values['custom_sponsors_36'][0] ) : '';
	$custom_sponsors_url_36 = isset( $values['custom_sponsors_url_36'] ) ? esc_attr( $values['custom_sponsors_url_36'][0] ) : '';
	/* Sponsor 37 */
	$custom_sponsors_37     = isset( $values['custom_sponsors_37'] ) ? esc_attr( $values['custom_sponsors_37'][0] ) : '';
	$custom_sponsors_url_37 = isset( $values['custom_sponsors_url_37'] ) ? esc_attr( $values['custom_sponsors_url_37'][0] ) : '';
	/* Sponsor 38 */
	$custom_sponsors_38     = isset( $values['custom_sponsors_38'] ) ? esc_attr( $values['custom_sponsors_38'][0] ) : '';
	$custom_sponsors_url_38 = isset( $values['custom_sponsors_url_38'] ) ? esc_attr( $values['custom_sponsors_url_38'][0] ) : '';
	/* Sponsor 39 */
	$custom_sponsors_39     = isset( $values['custom_sponsors_39'] ) ? esc_attr( $values['custom_sponsors_39'][0] ) : '';
	$custom_sponsors_url_39 = isset( $values['custom_sponsors_url_39'] ) ? esc_attr( $values['custom_sponsors_url_39'][0] ) : '';
	/* Sponsor 40 */
	$custom_sponsors_40     = isset( $values['custom_sponsors_40'] ) ? esc_attr( $values['custom_sponsors_40'][0] ) : '';
	$custom_sponsors_url_40 = isset( $values['custom_sponsors_url_40'] ) ? esc_attr( $values['custom_sponsors_url_40'][0] ) : '';
	/* Sponsor 41 */
	$custom_sponsors_41     = isset( $values['custom_sponsors_41'] ) ? esc_attr( $values['custom_sponsors_41'][0] ) : '';
	$custom_sponsors_url_41 = isset( $values['custom_sponsors_url_41'] ) ? esc_attr( $values['custom_sponsors_url_41'][0] ) : '';
	/* Sponsor 42 */
	$custom_sponsors_42     = isset( $values['custom_sponsors_42'] ) ? esc_attr( $values['custom_sponsors_42'][0] ) : '';
	$custom_sponsors_url_42 = isset( $values['custom_sponsors_url_42'] ) ? esc_attr( $values['custom_sponsors_url_42'][0] ) : '';
	/* Sponsor 43 */
	$custom_sponsors_43     = isset( $values['custom_sponsors_43'] ) ? esc_attr( $values['custom_sponsors_43'][0] ) : '';
	$custom_sponsors_url_43 = isset( $values['custom_sponsors_url_43'] ) ? esc_attr( $values['custom_sponsors_url_43'][0] ) : '';
	/* Sponsor 44 */
	$custom_sponsors_44     = isset( $values['custom_sponsors_44'] ) ? esc_attr( $values['custom_sponsors_44'][0] ) : '';
	$custom_sponsors_url_44 = isset( $values['custom_sponsors_url_44'] ) ? esc_attr( $values['custom_sponsors_url_44'][0] ) : '';
	/* Sponsor 45 */
	$custom_sponsors_45     = isset( $values['custom_sponsors_45'] ) ? esc_attr( $values['custom_sponsors_45'][0] ) : '';
	$custom_sponsors_url_45 = isset( $values['custom_sponsors_url_45'] ) ? esc_attr( $values['custom_sponsors_url_45'][0] ) : '';
	/* Sponsor 46 */
	$custom_sponsors_46     = isset( $values['custom_sponsors_46'] ) ? esc_attr( $values['custom_sponsors_46'][0] ) : '';
	$custom_sponsors_url_46 = isset( $values['custom_sponsors_url_46'] ) ? esc_attr( $values['custom_sponsors_url_46'][0] ) : '';
	/* Sponsor 47 */
	$custom_sponsors_47     = isset( $values['custom_sponsors_47'] ) ? esc_attr( $values['custom_sponsors_47'][0] ) : '';
	$custom_sponsors_url_47 = isset( $values['custom_sponsors_url_47'] ) ? esc_attr( $values['custom_sponsors_url_47'][0] ) : '';
	/* Sponsor 48 */
	$custom_sponsors_48     = isset( $values['custom_sponsors_48'] ) ? esc_attr( $values['custom_sponsors_48'][0] ) : '';
	$custom_sponsors_url_48 = isset( $values['custom_sponsors_url_48'] ) ? esc_attr( $values['custom_sponsors_url_48'][0] ) : '';
	/* Sponsor 49 */
	$custom_sponsors_49     = isset( $values['custom_sponsors_49'] ) ? esc_attr( $values['custom_sponsors_49'][0] ) : '';
	$custom_sponsors_url_49 = isset( $values['custom_sponsors_url_49'] ) ? esc_attr( $values['custom_sponsors_url_49'][0] ) : '';
	/* Sponsor 50 */
	$custom_sponsors_50     = isset( $values['custom_sponsors_50'] ) ? esc_attr( $values['custom_sponsors_50'][0] ) : '';
	$custom_sponsors_url_50 = isset( $values['custom_sponsors_url_50'] ) ? esc_attr( $values['custom_sponsors_url_50'][0] ) : '';
	/* Sponsor 51 */
	$custom_sponsors_51     = isset( $values['custom_sponsors_51'] ) ? esc_attr( $values['custom_sponsors_51'][0] ) : '';
	$custom_sponsors_url_51 = isset( $values['custom_sponsors_url_51'] ) ? esc_attr( $values['custom_sponsors_url_51'][0] ) : '';
	/* Sponsor 52 */
	$custom_sponsors_52     = isset( $values['custom_sponsors_52'] ) ? esc_attr( $values['custom_sponsors_52'][0] ) : '';
	$custom_sponsors_url_52 = isset( $values['custom_sponsors_url_52'] ) ? esc_attr( $values['custom_sponsors_url_52'][0] ) : '';
	/* Sponsor 53 */
	$custom_sponsors_53     = isset( $values['custom_sponsors_53'] ) ? esc_attr( $values['custom_sponsors_53'][0] ) : '';
	$custom_sponsors_url_53 = isset( $values['custom_sponsors_url_53'] ) ? esc_attr( $values['custom_sponsors_url_53'][0] ) : '';
	/* Sponsor 54 */
	$custom_sponsors_54     = isset( $values['custom_sponsors_54'] ) ? esc_attr( $values['custom_sponsors_54'][0] ) : '';
	$custom_sponsors_url_54 = isset( $values['custom_sponsors_url_54'] ) ? esc_attr( $values['custom_sponsors_url_54'][0] ) : '';
	/* Sponsor 55 */
	$custom_sponsors_55     = isset( $values['custom_sponsors_55'] ) ? esc_attr( $values['custom_sponsors_55'][0] ) : '';
	$custom_sponsors_url_55 = isset( $values['custom_sponsors_url_55'] ) ? esc_attr( $values['custom_sponsors_url_55'][0] ) : '';
	/* Sponsor 56 */
	$custom_sponsors_56     = isset( $values['custom_sponsors_56'] ) ? esc_attr( $values['custom_sponsors_56'][0] ) : '';
	$custom_sponsors_url_56 = isset( $values['custom_sponsors_url_56'] ) ? esc_attr( $values['custom_sponsors_url_56'][0] ) : '';
	/* Sponsor 57 */
	$custom_sponsors_57     = isset( $values['custom_sponsors_57'] ) ? esc_attr( $values['custom_sponsors_57'][0] ) : '';
	$custom_sponsors_url_57 = isset( $values['custom_sponsors_url_57'] ) ? esc_attr( $values['custom_sponsors_url_57'][0] ) : '';
	/* Sponsor 58 */
	$custom_sponsors_58     = isset( $values['custom_sponsors_58'] ) ? esc_attr( $values['custom_sponsors_58'][0] ) : '';
	$custom_sponsors_url_58 = isset( $values['custom_sponsors_url_58'] ) ? esc_attr( $values['custom_sponsors_url_58'][0] ) : '';
	/* Sponsor 59 */
	$custom_sponsors_59     = isset( $values['custom_sponsors_59'] ) ? esc_attr( $values['custom_sponsors_59'][0] ) : '';
	$custom_sponsors_url_59 = isset( $values['custom_sponsors_url_59'] ) ? esc_attr( $values['custom_sponsors_url_59'][0] ) : '';
	/* Sponsor 60 */
	$custom_sponsors_60     = isset( $values['custom_sponsors_60'] ) ? esc_attr( $values['custom_sponsors_60'][0] ) : '';
	$custom_sponsors_url_60 = isset( $values['custom_sponsors_url_60'] ) ? esc_attr( $values['custom_sponsors_url_60'][0] ) : '';


	// MEDIA UPLOADER:
	add_action( 'admin_enqueue_scripts', 'media_uploader' );
	function media_uploader() {
		wp_enqueue_media();
	}

	// SECURITY:
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );


	// ===========================
	// v4 DISPLAY:
	// ===========================
	?>


	<!-- SOLD OUT -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<!-- Enabled -->
		<?php if ( $eventSoldout == 'on' ) : ?>
			<h3>EVENT SOLD OUT?</h3>
			CURRENT STATUS - <input type="checkbox" name="eventSoldout"
			                        id="eventSoldout" <?php if ( $eventSoldout == 'on' ) {
				echo 'CHECKED';
			} ?> />
			<strong><?php print_r( $eventSoldout ); ?></strong>
		<?php endif; ?>
		<!--  Disabled -->
		<?php if ( $eventSoldout != 'on' ) : ?>
			<h3>EVENT SOLD OUT?</h3>
			CURRENT STATUS - <input type="checkbox" name="eventSoldout"
			                        id="eventSoldout" <?php if ( $eventSoldout == 'on' ) {
				echo 'CHECKED';
			} ?> />
			<strong><?php print_r( $eventSoldout ); ?></strong>
		<?php endif; ?>
	</div><!-- soldout -->


	<!-- IMAGE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Event Image</h3>
		<input id="events_list_cell_image" type="text" size="36" style="max-width: 90%;" name="events_list_cell_image"
		       value="<?php echo $events_list_cell_image; ?>"/>
		<input id="upload_events_list_cell_image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1920 x 720 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $events_list_cell_image ) {
			echo '<img id="events_list_cell_image_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $events_list_cell_image . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_events_list_cell_image' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#events_list_cell_image' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
	</div><!-- image -->


	<!-- LOGO -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Event Logo</h3>
		<input id="events_list_cell_image_logo" type="text" size="36" style="max-width: 90%;"
		       name="events_list_cell_image_logo" value="<?php echo $events_list_cell_image_logo; ?>"/>
		<input id="upload_events_list_cell_image_logo" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 200 x 200 pixels. JPG or PNG image formats will work, but for best
			results, a round PNG image with transparency is suggested.</em>
		<!-- Preview: -->
		<?php
		if ( $events_list_cell_image ) {
			echo '<img id="events_list_cell_image_logo_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $events_list_cell_image_logo . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_events_list_cell_image_logo' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#events_list_cell_image_logo' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
	</div><!-- logo -->


	<!-- EVENT DATE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Event Date</h3>
		<textarea name="eventDate" id="eventDate" cols="65" rows="1"><?php echo $eventDate; ?></textarea>
		<br/>
		<em>* This will show up on the Homepage listings as a brief date desctiption. Note, the event listing logic is
			based on the POST Published date, not this field.</em>
	</div><!-- event date -->


	<!-- EVENT TIME -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Event Time</h3>
		<textarea name="eventTime" id="eventTime" cols="65" rows="5"><?php echo $eventTime; ?></textarea>
		<br/>
		<em>* This will show up on the Events details as a full desctiption, no lenght limit.</em>
	</div><!-- event time -->

	<!-- EVENT CITY -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Event City (SHORT)</h3>
		<textarea name="eventCity" id="eventCity" cols="65" rows="1"><?php echo $eventCity; ?></textarea>
		<br/>
	</div><!-- event city -->

	<!-- EVENT PURCHASE LINK -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Purchase Ticket Link</h3>
		<textarea name="eventPurchaseLink" id="eventPurchaseLink" cols="65"
		          rows="1"><?php echo $eventPurchaseLink; ?></textarea>
		<br/>
		<em>* This is the link out to the "Purchase Ticket" button on the Event specific page.
			<br/>* If its left blank, the button will default to "SOLD OUT".
			<br/>Example: http://www.leandroarts.com</em>
	</div><!-- purchase link -->


	<!-- PRESENTING SPONSOR -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Presenting Sponsor</h3>
		<h4>Presenting Sponsor URL</h4>
		<textarea name="eventPresentingSponsorUrl" id="eventPresentingSponsorUrl" cols="65"
		          rows="1"><?php echo $eventPresentingSponsorUrl; ?></textarea>
		<br/><em>Example: http://www.leandroarts.com</em>
		<h4>Presenting Sponsor Image</h4>
		<input id="eventPresentingSponsor" type="text" size="36" style="max-width: 90%;" name="eventPresentingSponsor"
		       value="<?php echo $eventPresentingSponsor; ?>"/>
		<input id="upload_eventPresentingSponsor" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 200 x 200 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventPresentingSponsor ) {
			echo '<img id="eventPresentingSponsor_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventPresentingSponsor . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventPresentingSponsor' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventPresentingSponsor' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
	</div><!-- presenting sponsor -->


	<!-- EVENT INTRODUCTION -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>INTRODUCTION MODULE</h3>
		<h3>Event Intro Image</h3>
		<input id="eventIntroImage" type="text" size="36" style="max-width: 90%;" name="eventIntroImage"
		       value="<?php echo $eventIntroImage; ?>"/>
		<input id="upload_eventIntroImage" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventIntroImage ) {
			echo '<img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventIntroImage . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventIntroImage' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventIntroImage' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>

		<h3>Event Intro Heading</h3>
		<textarea name="eventIntroHeading" id="eventIntroHeading" cols="65"
		          rows="1"><?php echo $eventIntroHeading; ?></textarea>
		<br/><em>Example: Introduction</em>

		<h3>Event Intro Text</h3>
		<textarea name="eventIntroText" id="eventIntroText" cols="65" rows="4"><?php echo $eventIntroText; ?></textarea>

		<h3>Event Intro Item 1 - Heading</h3>
		<textarea name="eventIntroItem1_heading" id="eventIntroItem1_heading" cols="65"
		          rows="1"><?php echo $eventIntroItem1_heading; ?></textarea>

		<h3>Event Intro Item 1 - Text</h3>
		<textarea name="eventIntroItem1_text" id="eventIntroItem1_text" cols="65"
		          rows="4"><?php echo $eventIntroItem1_text; ?></textarea>

		<h3>Event Intro Item 2 - Heading</h3>
		<textarea name="eventIntroItem2_heading" id="eventIntroItem2_heading" cols="65"
		          rows="1"><?php echo $eventIntroItem2_heading; ?></textarea>

		<h3>Event Intro Item 2 - Text</h3>
		<textarea name="eventIntroItem2_text" id="eventIntroItem2_text" cols="65"
		          rows="4"><?php echo $eventIntroItem2_text; ?></textarea>

	</div><!-- eventIntro -->


	<!-- FEEDBACK -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>EVENT FEEDBACK</h3>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="eventFeedback_heading_1" id="eventFeedback_heading_1" cols="65"
			          rows="1"><?php echo $eventFeedback_heading_1; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="eventFeedback_client_1" id="eventFeedback_client_1" cols="65"
			          rows="1"><?php echo $eventFeedback_client_1; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="eventFeedback_date_1" id="eventFeedback_date_1" cols="65"
			          rows="1"><?php echo $eventFeedback_date_1; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="eventFeedback_excerpt_1" id="eventFeedback_excerpt_1" cols="65"
			          rows="5"><?php echo $eventFeedback_excerpt_1; ?></textarea>
		</div>
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="eventFeedback_heading_2" id="eventFeedback_heading_2" cols="65"
			          rows="1"><?php echo $eventFeedback_heading_2; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="eventFeedback_client_2" id="eventFeedback_client_2" cols="65"
			          rows="1"><?php echo $eventFeedback_client_2; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="eventFeedback_date_2" id="eventFeedback_date_2" cols="65"
			          rows="1"><?php echo $eventFeedback_date_2; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="eventFeedback_excerpt_2" id="eventFeedback_excerpt_2" cols="65"
			          rows="5"><?php echo $eventFeedback_excerpt_2; ?></textarea>
		</div>
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="eventFeedback_heading_3" id="eventFeedback_heading_3" cols="65"
			          rows="1"><?php echo $eventFeedback_heading_3; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="eventFeedback_client_3" id="eventFeedback_client_3" cols="65"
			          rows="1"><?php echo $eventFeedback_client_3; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="eventFeedback_date_3" id="eventFeedback_date_3" cols="65"
			          rows="1"><?php echo $eventFeedback_date_3; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="eventFeedback_excerpt_3" id="eventFeedback_excerpt_3" cols="65"
			          rows="5"><?php echo $eventFeedback_excerpt_3; ?></textarea>
		</div>
	</div><!-- feedback -->


	<!-- VIDEO EMBED -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>VIDEO EMBED</h3>
		<textarea name="eventVideo" id="eventVideo" cols="65" rows="8"><?php echo $eventVideo; ?></textarea>
		<br/><em> - Paste your video embed code here.
			<br/> - For best results size videos to 1280px x 670px. Sample:
			<br/>&lt;iframe width="1280" height="670" src="https://www.youtube.com/embed/HM2i8WkI2uQ?rel=0&amp;controls=0&amp;showinfo=0"
			frameborder="0" allow="autoplay; encrypted-media" allowfullscreen&gt;&lt;/iframe&gt;</em>
	</div>
	<!-- video -->


	<!-- EVENT CONTINUED INTRODUCTION -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>CONTINUED INTRODUCTION MODULE</h3>
		<h3>Image</h3>
		<input id="eventIntro2Image" type="text" size="36" style="max-width: 90%;" name="eventIntro2Image"
		       value="<?php echo $eventIntro2Image; ?>"/>
		<input id="upload_eventIntro2Image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventIntro2Image ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventIntro2Image . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventIntro2Image' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventIntro2Image' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Heading</h3>
		<textarea name="eventIntro2Heading" id="eventIntro2Heading" cols="65"
		          rows="1"><?php echo $eventIntro2Heading; ?></textarea>
		<br/><em>Example: Continued Description</em>
		<h3>Text Body</h3>
		<?php
		wp_editor( htmlspecialchars_decode( $eventContinuedIntroText ), 'eventContinuedIntroText', array(
			'wpautop'          => false,
			'media_buttons'    => true,
			'textarea_name'    => 'eventContinuedIntroText',
			'textarea_rows'    => 10,
			'teeny'            => false,
			'drag_drop_upload' => true,
			'tinymce'          => array(
				'valid_elements' => '*[*]'
			)
		) );
		?>
	</div><!-- eventIntro2 -->


	<!-- EVENT CONTINUED INTRODUCTION x3 -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>ADDITIONAL INTRODUCTION MODULE 3</h3>
		<h3>Image</h3>
		<input id="eventIntro3Image" type="text" size="36" style="max-width: 90%;" name="eventIntro3Image"
		       value="<?php echo $eventIntro3Image; ?>"/>
		<input id="upload_eventIntro3Image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventIntro3Image ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventIntro3Image . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventIntro3Image' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventIntro3Image' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Heading</h3>
		<textarea name="eventIntro3Heading" id="eventIntro3Heading" cols="65"
		          rows="1"><?php echo $eventIntro3Heading; ?></textarea>
		<br/><em>Example: Continued Description</em>
		<h3>Text Body</h3>
		<?php
		wp_editor( htmlspecialchars_decode( $eventContinuedIntroText3 ), 'eventContinuedIntroText3', array(
			'wpautop'          => false,
			'media_buttons'    => true,
			'textarea_name'    => 'eventContinuedIntroText3',
			'textarea_rows'    => 10,
			'teeny'            => false,
			'drag_drop_upload' => true,
			'tinymce'          => array(
				'valid_elements' => '*[*]'
			)
		) );
		?>
	</div><!-- eventIntro3 -->


	<!-- EVENT CONTINUED INTRODUCTION x4 -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>ADDITIONAL INTRODUCTION MODULE 4</h3>
		<h3>Image</h3>
		<input id="eventIntro4Image" type="text" size="36" style="max-width: 90%;" name="eventIntro4Image"
		       value="<?php echo $eventIntro4Image; ?>"/>
		<input id="upload_eventIntro4Image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventIntro4Image ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventIntro4Image . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventIntro4Image' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventIntro4Image' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Heading</h3>
		<textarea name="eventIntro4Heading" id="eventIntro4Heading" cols="65"
		          rows="1"><?php echo $eventIntro4Heading; ?></textarea>
		<br/><em>Example: Continued Description</em>
		<h3>Text Body</h3>
		<?php
		wp_editor( htmlspecialchars_decode( $eventContinuedIntroText4 ), 'eventContinuedIntroText4', array(
			'wpautop'          => false,
			'media_buttons'    => true,
			'textarea_name'    => 'eventContinuedIntroText4',
			'textarea_rows'    => 10,
			'teeny'            => false,
			'drag_drop_upload' => true,
			'tinymce'          => array(
				'valid_elements' => '*[*]'
			)
		) );
		?>
	</div><!-- eventIntro4 -->


	<!-- EVENT CONTINUED INTRODUCTION x5 -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>ADDITIONAL INTRODUCTION MODULE 5</h3>
		<h3>Image</h3>
		<input id="eventIntro5Image" type="text" size="36" style="max-width: 90%;" name="eventIntro5Image"
		       value="<?php echo $eventIntro5Image; ?>"/>
		<input id="upload_eventIntro5Image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $eventIntro5Image ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventIntro5Image . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventIntro5Image' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventIntro5Image' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Heading</h3>
		<textarea name="eventIntro5Heading" id="eventIntro5Heading" cols="65"
		          rows="1"><?php echo $eventIntro5Heading; ?></textarea>
		<br/><em>Example: Continued Description</em>
		<h3>Text Body</h3>
		<?php
		wp_editor( htmlspecialchars_decode( $eventContinuedIntroText5 ), 'eventContinuedIntroText5', array(
			'wpautop'          => false,
			'media_buttons'    => true,
			'textarea_name'    => 'eventContinuedIntroText5',
			'textarea_rows'    => 10,
			'teeny'            => false,
			'drag_drop_upload' => true,
			'tinymce'          => array(
				'valid_elements' => '*[*]'
			)
		) );
		?>
	</div><!-- eventIntro5 -->


	<!-- MAP -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>EVENT MAP (directions)</h3>
		<h3>Image</h3>
		<input id="eventMap" type="text" size="36" style="max-width: 90%;" name="eventMap"
		       value="<?php echo $eventMap; ?>"/>
		<input id="upload_eventMap" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1920x 400 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $eventMap ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $eventMap . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_eventMap' ).click( function ( e ) {
					e.preventDefault();
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#eventMap' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Map URL (Directions)</h3>
		<textarea name="eventMapUrl" id="eventMapUrl" cols="65" rows="1"><?php echo $eventMapUrl; ?></textarea>
		<br/><em>Example: http://yourmaps.com/youraddress</em>
	</div><!-- map -->


	<!-- TICKET OPTIONS -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>TICKET OPTIONS</h3>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h4>OPTION 1</h4>
			<h3>Sub Heading</h3>
			<input type="text" name="eventTicketsCard_1_subHeading" id="eventTicketsCard_1_subHeading"
			       value="<?php echo $eventTicketsCard_1_subHeading; ?>" size="80"/>
			<br/><em> - Example: Our most popular choice!</em>
			<h3>Heading</h3>
			<input type="text" name="eventTicketsCard_1_heading" id="eventTicketsCard_1_heading"
			       value="<?php echo $eventTicketsCard_1_heading; ?>" size="80"/>
			<br/><em> - Example: Early Bird</em>
			<h3>Text</h3>
			<input type="text" name="eventTicketsCard_1_text" id="eventTicketsCard_1_text"
			       value="<?php echo $eventTicketsCard_1_text; ?>" size="80"/>
			<h3>Price</h3>
			<input type="text" name="eventTicketsCard_1_price" id="eventTicketsCard_1_price"
			       value="<?php echo $eventTicketsCard_1_price; ?>" size="80"/>
			<br/><em> - Example: $99</em>
			<h3>Purchase URL</h3>
			<input type="text" name="eventTicketsCard_1_purchase" id="eventTicketsCard_1_purchase"
			       value="<?php echo $eventTicketsCard_1_purchase; ?>" size="80"/>
			<br/><em> - Example: http://leandroarts.com</em>
			<br/><em> - If this is left blank, button will be labed as SOLD OUT</em>
			<h3>Also includes #1</h3>
			<input type="text" name="eventTicketsCard_1_also_1" id="eventTicketsCard_1_also_1"
			       value="<?php echo $eventTicketsCard_1_also_1; ?>" size="80"/>
			<h3>Also includes #2</h3>
			<input type="text" name="eventTicketsCard_1_also_2" id="eventTicketsCard_1_also_2"
			       value="<?php echo $eventTicketsCard_1_also_2; ?>" size="80"/>
			<h3>Also includes #3</h3>
			<input type="text" name="eventTicketsCard_1_also_3" id="eventTicketsCard_1_also_3"
			       value="<?php echo $eventTicketsCard_1_also_3; ?>" size="80"/>
			<h3>Also includes #4</h3>
			<input type="text" name="eventTicketsCard_1_also_4" id="eventTicketsCard_1_also_4"
			       value="<?php echo $eventTicketsCard_1_also_4; ?>" size="80"/>
		</div><!-- card -->
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h4>OPTION 2</h4>
			<h3>Sub Heading</h3>
			<input type="text" name="eventTicketsCard_2_subHeading" id="eventTicketsCard_2_subHeading"
			       value="<?php echo $eventTicketsCard_2_subHeading; ?>" size="80"/>
			<br/><em> - Example: Our most popular choice!</em>
			<h3>Heading</h3>
			<input type="text" name="eventTicketsCard_2_heading" id="eventTicketsCard_2_heading"
			       value="<?php echo $eventTicketsCard_2_heading; ?>" size="80"/>
			<br/><em> - Example: Early Bird</em>
			<h3>Text</h3>
			<input type="text" name="eventTicketsCard_2_text" id="eventTicketsCard_2_text"
			       value="<?php echo $eventTicketsCard_2_text; ?>" size="80"/>
			<h3>Price</h3>
			<input type="text" name="eventTicketsCard_2_price" id="eventTicketsCard_2_price"
			       value="<?php echo $eventTicketsCard_2_price; ?>" size="80"/>
			<br/><em> - Example: $99</em>
			<h3>Purchase URL</h3>
			<input type="text" name="eventTicketsCard_2_purchase" id="eventTicketsCard_2_purchase"
			       value="<?php echo $eventTicketsCard_2_purchase; ?>" size="80"/>
			<br/><em> - Example: http://leandroarts.com</em>
			<br/><em> - If this is left blank, button will be labed as SOLD OUT</em>
			<h3>Also includes #1</h3>
			<input type="text" name="eventTicketsCard_2_also_1" id="eventTicketsCard_2_also_1"
			       value="<?php echo $eventTicketsCard_2_also_1; ?>" size="80"/>
			<h3>Also includes #2</h3>
			<input type="text" name="eventTicketsCard_2_also_2" id="eventTicketsCard_2_also_2"
			       value="<?php echo $eventTicketsCard_2_also_2; ?>" size="80"/>
			<h3>Also includes #3</h3>
			<input type="text" name="eventTicketsCard_2_also_3" id="eventTicketsCard_2_also_3"
			       value="<?php echo $eventTicketsCard_2_also_3; ?>" size="80"/>
			<h3>Also includes #4</h3>
			<input type="text" name="eventTicketsCard_2_also_4" id="eventTicketsCard_2_also_4"
			       value="<?php echo $eventTicketsCard_2_also_4; ?>" size="80"/>
		</div><!-- card -->
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h4>OPTION 3</h4>
			<h3>Sub Heading</h3>
			<input type="text" name="eventTicketsCard_3_subHeading" id="eventTicketsCard_3_subHeading"
			       value="<?php echo $eventTicketsCard_3_subHeading; ?>" size="80"/>
			<br/><em> - Example: Our most popular choice!</em>
			<h3>Heading</h3>
			<input type="text" name="eventTicketsCard_3_heading" id="eventTicketsCard_3_heading"
			       value="<?php echo $eventTicketsCard_3_heading; ?>" size="80"/>
			<br/><em> - Example: Early Bird</em>
			<h3>Text</h3>
			<input type="text" name="eventTicketsCard_3_text" id="eventTicketsCard_3_text"
			       value="<?php echo $eventTicketsCard_3_text; ?>" size="80"/>
			<h3>Price</h3>
			<input type="text" name="eventTicketsCard_3_price" id="eventTicketsCard_3_price"
			       value="<?php echo $eventTicketsCard_3_price; ?>" size="80"/>
			<br/><em> - Example: $99</em>
			<h3>Purchase URL</h3>
			<input type="text" name="eventTicketsCard_3_purchase" id="eventTicketsCard_3_purchase"
			       value="<?php echo $eventTicketsCard_3_purchase; ?>" size="80"/>
			<br/><em> - Example: http://leandroarts.com</em>
			<br/><em> - If this is left blank, button will be labed as SOLD OUT</em>
			<h3>Also includes #1</h3>
			<input type="text" name="eventTicketsCard_3_also_1" id="eventTicketsCard_3_also_1"
			       value="<?php echo $eventTicketsCard_3_also_1; ?>" size="80"/>
			<h3>Also includes #2</h3>
			<input type="text" name="eventTicketsCard_3_also_2" id="eventTicketsCard_3_also_2"
			       value="<?php echo $eventTicketsCard_3_also_2; ?>" size="80"/>
			<h3>Also includes #3</h3>
			<input type="text" name="eventTicketsCard_3_also_3" id="eventTicketsCard_3_also_3"
			       value="<?php echo $eventTicketsCard_3_also_3; ?>" size="80"/>
			<h3>Also includes #4</h3>
			<input type="text" name="eventTicketsCard_3_also_4" id="eventTicketsCard_3_also_4"
			       value="<?php echo $eventTicketsCard_3_also_4; ?>" size="80"/>
		</div><!-- card -->
	</div><!-- tickets -->


	<!--  PANEL CONTENT   -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Advertizing Embed Override - Body Embed</h3>
		<textarea name="advert" id="advert" cols="65" rows="10"><?php echo $advert; ?></textarea>
		<br/><em>- If left blank, the template will load the Global Advert (#3).</em>
		<br/><em>- If filled in, it will override and show this Post specific one instead.</em>
		<br/><em>- For the override to work, you must also enter the Advert Head script below.</em>
		<h3>Advertizing Embed Override - Head Embed</h3>
		<textarea name="advertHead" id="advertHead" cols="65" rows="10"><?php echo $advertHead; ?></textarea>
	</div><!-- end Cell -->


	<!-- SPONSORS -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>EVENT SPONSORS</h3>

		<!-- SPONSOR 1 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 1</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_1" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_1"
			       value="<?php echo $custom_sponsors_1; ?>"/>
			<input id="upload_custom_sponsors_1" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_1 ) {
				echo '<img src="' . (string) $custom_sponsors_1 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_1" id="custom_sponsors_url_1"
			       value="<?php echo $custom_sponsors_url_1; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_1' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_1' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 2 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 2</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_2" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_2"
			       value="<?php echo $custom_sponsors_2; ?>"/>
			<input id="upload_custom_sponsors_2" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_2 ) {
				echo '<img src="' . (string) $custom_sponsors_2 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?> <br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_2" id="custom_sponsors_url_2"
			       value="<?php echo $custom_sponsors_url_2; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_2' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_2' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 3 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 3</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_3" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_3"
			       value="<?php echo $custom_sponsors_3; ?>"/>
			<input id="upload_custom_sponsors_3" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_3 ) {
				echo '<img src="' . (string) $custom_sponsors_3 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?> <br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_3" id="custom_sponsors_url_3"
			       value="<?php echo $custom_sponsors_url_3; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_3' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_3' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 4 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 4</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_4" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_4"
			       value="<?php echo $custom_sponsors_4; ?>"/>
			<input id="upload_custom_sponsors_4" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_4 ) {
				echo '<img src="' . (string) $custom_sponsors_4 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_4" id="custom_sponsors_url_4"
			       value="<?php echo $custom_sponsors_url_4; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_4' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_4' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 5 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 5</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_5" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_5"
			       value="<?php echo $custom_sponsors_5; ?>"/>
			<input id="upload_custom_sponsors_5" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_6 ) {
				echo '<img src="' . (string) $custom_sponsors_6 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_5" id="custom_sponsors_url_5"
			       value="<?php echo $custom_sponsors_url_5; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_5' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_5' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 6 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 6</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_6" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_6"
			       value="<?php echo $custom_sponsors_6; ?>"/>
			<input id="upload_custom_sponsors_6" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_6 ) {
				echo '<img src="' . (string) $custom_sponsors_6 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_6" id="custom_sponsors_url_6"
			       value="<?php echo $custom_sponsors_url_6; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_6' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_6' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 7 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 7</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_7" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_7"
			       value="<?php echo $custom_sponsors_7; ?>"/>
			<input id="upload_custom_sponsors_7" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_7 ) {
				echo '<img src="' . (string) $custom_sponsors_7 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?> <br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_7" id="custom_sponsors_url_7"
			       value="<?php echo $custom_sponsors_url_7; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_7' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_7' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 8 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 8</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_8" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_8"
			       value="<?php echo $custom_sponsors_8; ?>"/>
			<input id="upload_custom_sponsors_8" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_8 ) {
				echo '<img src="' . (string) $custom_sponsors_8 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?> <br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_8" id="custom_sponsors_url_8"
			       value="<?php echo $custom_sponsors_url_8; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_8' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_8' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 9 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 9</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_9" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_9"
			       value="<?php echo $custom_sponsors_9; ?>"/>
			<input id="upload_custom_sponsors_9" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_9 ) {
				echo '<img src="' . (string) $custom_sponsors_9 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?> <br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_9" id="custom_sponsors_url_9"
			       value="<?php echo $custom_sponsors_url_9; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_9' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_9' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 10 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 10</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_10" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_10"
			       value="<?php echo $custom_sponsors_10; ?>"/>
			<input id="upload_custom_sponsors_10" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_10 ) {
				echo '<img src="' . (string) $custom_sponsors_10 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_10" id="custom_sponsors_url_10"
			       value="<?php echo $custom_sponsors_url_10; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_10' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_10' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 11 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 11</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_11" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_11"
			       value="<?php echo $custom_sponsors_11; ?>"/>
			<input id="upload_custom_sponsors_11" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_11 ) {
				echo '<img src="' . (string) $custom_sponsors_11 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_11" id="custom_sponsors_url_11"
			       value="<?php echo $custom_sponsors_url_11; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_11' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_11' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 12 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 12</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_12" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_12"
			       value="<?php echo $custom_sponsors_12; ?>"/>
			<input id="upload_custom_sponsors_12" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_12 ) {
				echo '<img src="' . (string) $custom_sponsors_12 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_12" id="custom_sponsors_url_12"
			       value="<?php echo $custom_sponsors_url_12; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_12' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_12' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 13 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 13</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_13" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_13"
			       value="<?php echo $custom_sponsors_13; ?>"/>
			<input id="upload_custom_sponsors_13" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_13 ) {
				echo '<img src="' . (string) $custom_sponsors_13 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_13" id="custom_sponsors_url_13"
			       value="<?php echo $custom_sponsors_url_13; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_13' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_13' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 14 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 14</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_14" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_14"
			       value="<?php echo $custom_sponsors_14; ?>"/>
			<input id="upload_custom_sponsors_14" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_14 ) {
				echo '<img src="' . (string) $custom_sponsors_14 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_14" id="custom_sponsors_url_14"
			       value="<?php echo $custom_sponsors_url_14; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_14' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_14' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 15 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 15</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_15" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_15"
			       value="<?php echo $custom_sponsors_15; ?>"/>
			<input id="upload_custom_sponsors_15" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_15 ) {
				echo '<img src="' . (string) $custom_sponsors_15 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_15" id="custom_sponsors_url_15"
			       value="<?php echo $custom_sponsors_url_15; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_15' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_15' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 16 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 16</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_16" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_16"
			       value="<?php echo $custom_sponsors_16; ?>"/>
			<input id="upload_custom_sponsors_16" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_16 ) {
				echo '<img src="' . (string) $custom_sponsors_16 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_16" id="custom_sponsors_url_16"
			       value="<?php echo $custom_sponsors_url_16; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_16' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_16' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 17 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 17</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_17" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_17"
			       value="<?php echo $custom_sponsors_17; ?>"/>
			<input id="upload_custom_sponsors_17" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_17 ) {
				echo '<img src="' . (string) $custom_sponsors_17 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_17" id="custom_sponsors_url_17"
			       value="<?php echo $custom_sponsors_url_17; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_17' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_17' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 18 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 18</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_18" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_18"
			       value="<?php echo $custom_sponsors_18; ?>"/>
			<input id="upload_custom_sponsors_18" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_18 ) {
				echo '<img src="' . (string) $custom_sponsors_18 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_18" id="custom_sponsors_url_18"
			       value="<?php echo $custom_sponsors_url_18; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_18' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_18' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 19 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 19</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_19" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_19"
			       value="<?php echo $custom_sponsors_19; ?>"/>
			<input id="upload_custom_sponsors_19" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_19 ) {
				echo '<img src="' . (string) $custom_sponsors_19 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_19" id="custom_sponsors_url_19"
			       value="<?php echo $custom_sponsors_url_19; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_19' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_19' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 20 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 20</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_20" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_20"
			       value="<?php echo $custom_sponsors_20; ?>"/>
			<input id="upload_custom_sponsors_20" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_20 ) {
				echo '<img src="' . (string) $custom_sponsors_20 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_20" id="custom_sponsors_url_20"
			       value="<?php echo $custom_sponsors_url_20; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_20' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_20' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 21 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 21</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_21" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_21"
			       value="<?php echo $custom_sponsors_21; ?>"/>
			<input id="upload_custom_sponsors_21" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_21 ) {
				echo '<img src="' . (string) $custom_sponsors_21 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_21" id="custom_sponsors_url_21"
			       value="<?php echo $custom_sponsors_url_21; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_21' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_21' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 22 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 22</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_22" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_22"
			       value="<?php echo $custom_sponsors_22; ?>"/>
			<input id="upload_custom_sponsors_22" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_22 ) {
				echo '<img src="' . (string) $custom_sponsors_22 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_22" id="custom_sponsors_url_22"
			       value="<?php echo $custom_sponsors_url_22; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_22' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_22' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 23 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 23</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_23" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_23"
			       value="<?php echo $custom_sponsors_23; ?>"/>
			<input id="upload_custom_sponsors_23" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_23 ) {
				echo '<img src="' . (string) $custom_sponsors_23 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_23" id="custom_sponsors_url_23"
			       value="<?php echo $custom_sponsors_url_23; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_23' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_23' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 24 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 24</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_24" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_24"
			       value="<?php echo $custom_sponsors_24; ?>"/>
			<input id="upload_custom_sponsors_24" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_24 ) {
				echo '<img src="' . (string) $custom_sponsors_24 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_24" id="custom_sponsors_url_24"
			       value="<?php echo $custom_sponsors_url_24; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_24' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_24' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 25 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 25</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_25" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_25"
			       value="<?php echo $custom_sponsors_25; ?>"/>
			<input id="upload_custom_sponsors_25" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_25 ) {
				echo '<img src="' . (string) $custom_sponsors_25 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_25" id="custom_sponsors_url_25"
			       value="<?php echo $custom_sponsors_url_25; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_25' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_25' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 26 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 26</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_26" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_26"
			       value="<?php echo $custom_sponsors_2; ?>"/>
			<input id="upload_custom_sponsors_26" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_26 ) {
				echo '<img src="' . (string) $custom_sponsors_26 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_26" id="custom_sponsors_url_26"
			       value="<?php echo $custom_sponsors_url_26; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_26' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_26' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 27 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 27</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_27" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_27"
			       value="<?php echo $custom_sponsors_27; ?>"/>
			<input id="upload_custom_sponsors_27" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_27 ) {
				echo '<img src="' . (string) $custom_sponsors_27 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_27" id="custom_sponsors_url_27"
			       value="<?php echo $custom_sponsors_url_27; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_27' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_27' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 28 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 28</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_28" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_28"
			       value="<?php echo $custom_sponsors_28; ?>"/>
			<input id="upload_custom_sponsors_28" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_28 ) {
				echo '<img src="' . (string) $custom_sponsors_28 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_28" id="custom_sponsors_url_28"
			       value="<?php echo $custom_sponsors_url_28; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_28' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_28' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 29 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 29</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_29" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_29"
			       value="<?php echo $custom_sponsors_29; ?>"/>
			<input id="upload_custom_sponsors_29" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_29 ) {
				echo '<img src="' . (string) $custom_sponsors_29 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_29" id="custom_sponsors_url_29"
			       value="<?php echo $custom_sponsors_url_29; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_29' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_29' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 30 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 30</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_30" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_30"
			       value="<?php echo $custom_sponsors_30; ?>"/>
			<input id="upload_custom_sponsors_30" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_30 ) {
				echo '<img src="' . (string) $custom_sponsors_30 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_30" id="custom_sponsors_url_30"
			       value="<?php echo $custom_sponsors_url_30; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_30' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_30' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>


		<hr/>

		<!-- SPONSOR 31 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 31</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_31" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_31"
			       value="<?php echo $custom_sponsors_31; ?>"/>
			<input id="upload_custom_sponsors_31" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_31 ) {
				echo '<img src="' . (string) $custom_sponsors_31 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_31" id="custom_sponsors_url_31"
			       value="<?php echo $custom_sponsors_url_31; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_31' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_31' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 32 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 32</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_32" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_32"
			       value="<?php echo $custom_sponsors_32; ?>"/>
			<input id="upload_custom_sponsors_32" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_32 ) {
				echo '<img src="' . (string) $custom_sponsors_32 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_32" id="custom_sponsors_url_32"
			       value="<?php echo $custom_sponsors_url_32; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_32' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_32' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 33 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 33</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_33" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_33"
			       value="<?php echo $custom_sponsors_33; ?>"/>
			<input id="upload_custom_sponsors_33" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_33 ) {
				echo '<img src="' . (string) $custom_sponsors_33 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_33" id="custom_sponsors_url_33"
			       value="<?php echo $custom_sponsors_url_33; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_33' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_33' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 34 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 34</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_34" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_34"
			       value="<?php echo $custom_sponsors_34; ?>"/>
			<input id="upload_custom_sponsors_34" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_34 ) {
				echo '<img src="' . (string) $custom_sponsors_34 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_34" id="custom_sponsors_url_34"
			       value="<?php echo $custom_sponsors_url_34; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_34' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_34' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 35 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 35</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_35" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_35"
			       value="<?php echo $custom_sponsors_35; ?>"/>
			<input id="upload_custom_sponsors_35" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_35 ) {
				echo '<img src="' . (string) $custom_sponsors_35 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_35" id="custom_sponsors_url_35"
			       value="<?php echo $custom_sponsors_url_35; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_35' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_35' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 36 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 36</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_36" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_36"
			       value="<?php echo $custom_sponsors_36; ?>"/>
			<input id="upload_custom_sponsors_36" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_36 ) {
				echo '<img src="' . (string) $custom_sponsors_36 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_36" id="custom_sponsors_url_36"
			       value="<?php echo $custom_sponsors_url_36; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_36' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_36' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 37 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 37</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_37" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_37"
			       value="<?php echo $custom_sponsors_37; ?>"/>
			<input id="upload_custom_sponsors_37" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_37 ) {
				echo '<img src="' . (string) $custom_sponsors_37 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_37" id="custom_sponsors_url_37"
			       value="<?php echo $custom_sponsors_url_37; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_37' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_37' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 38 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 38</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_38" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_38"
			       value="<?php echo $custom_sponsors_38; ?>"/>
			<input id="upload_custom_sponsors_38" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_38 ) {
				echo '<img src="' . (string) $custom_sponsors_38 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_38" id="custom_sponsors_url_38"
			       value="<?php echo $custom_sponsors_url_38; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_38' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_38' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 39 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 39</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_39" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_39"
			       value="<?php echo $custom_sponsors_39; ?>"/>
			<input id="upload_custom_sponsors_39" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_39 ) {
				echo '<img src="' . (string) $custom_sponsors_39 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_39" id="custom_sponsors_url_39"
			       value="<?php echo $custom_sponsors_url_39; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_39' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_39' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 40 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 40</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_40" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_40"
			       value="<?php echo $custom_sponsors_40; ?>"/>
			<input id="upload_custom_sponsors_40" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_40 ) {
				echo '<img src="' . (string) $custom_sponsors_40 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_40" id="custom_sponsors_url_40"
			       value="<?php echo $custom_sponsors_url_40; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_40' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_40' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 41 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 41</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_41" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_41"
			       value="<?php echo $custom_sponsors_41; ?>"/>
			<input id="upload_custom_sponsors_41" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_41 ) {
				echo '<img src="' . (string) $custom_sponsors_41 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_41" id="custom_sponsors_url_41"
			       value="<?php echo $custom_sponsors_url_41; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_41' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_41' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 42 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 42</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_42" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_42"
			       value="<?php echo $custom_sponsors_42; ?>"/>
			<input id="upload_custom_sponsors_42" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_42 ) {
				echo '<img src="' . (string) $custom_sponsors_42 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_42" id="custom_sponsors_url_42"
			       value="<?php echo $custom_sponsors_url_42; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_42' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_42' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 43 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 43</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_43" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_43"
			       value="<?php echo $custom_sponsors_43; ?>"/>
			<input id="upload_custom_sponsors_43" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_43 ) {
				echo '<img src="' . (string) $custom_sponsors_43 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_43" id="custom_sponsors_url_43"
			       value="<?php echo $custom_sponsors_url_43; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_43' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_43' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 44 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 44</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_44" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_44"
			       value="<?php echo $custom_sponsors_44; ?>"/>
			<input id="upload_custom_sponsors_44" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_44 ) {
				echo '<img src="' . (string) $custom_sponsors_44 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_44" id="custom_sponsors_url_44"
			       value="<?php echo $custom_sponsors_url_44; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_44' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_44' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 45 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 45</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_45" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_45"
			       value="<?php echo $custom_sponsors_45; ?>"/>
			<input id="upload_custom_sponsors_45" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_45 ) {
				echo '<img src="' . (string) $custom_sponsors_45 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_45" id="custom_sponsors_url_45"
			       value="<?php echo $custom_sponsors_url_45; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_45' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_45' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 46 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 46</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_46" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_46"
			       value="<?php echo $custom_sponsors_46; ?>"/>
			<input id="upload_custom_sponsors_46" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_46 ) {
				echo '<img src="' . (string) $custom_sponsors_46 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_46" id="custom_sponsors_url_46"
			       value="<?php echo $custom_sponsors_url_46; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_46' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_46' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 47 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 47</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_47" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_47"
			       value="<?php echo $custom_sponsors_47; ?>"/>
			<input id="upload_custom_sponsors_47" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_47 ) {
				echo '<img src="' . (string) $custom_sponsors_47 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_47" id="custom_sponsors_url_47"
			       value="<?php echo $custom_sponsors_url_47; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_47' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_47' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 48 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 48</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_48" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_48"
			       value="<?php echo $custom_sponsors_48; ?>"/>
			<input id="upload_custom_sponsors_48" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_48 ) {
				echo '<img src="' . (string) $custom_sponsors_48 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_48" id="custom_sponsors_url_48"
			       value="<?php echo $custom_sponsors_url_48; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_48' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_48' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 49 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 49</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_49" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_49"
			       value="<?php echo $custom_sponsors_49; ?>"/>
			<input id="upload_custom_sponsors_49" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_49 ) {
				echo '<img src="' . (string) $custom_sponsors_49 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_49" id="custom_sponsors_url_49"
			       value="<?php echo $custom_sponsors_url_49; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_49' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_49' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 50 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 50</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_50" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_50"
			       value="<?php echo $custom_sponsors_50; ?>"/>
			<input id="upload_custom_sponsors_50" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_50 ) {
				echo '<img src="' . (string) $custom_sponsors_50 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_50" id="custom_sponsors_url_50"
			       value="<?php echo $custom_sponsors_url_50; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_50' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_50' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 51 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 51</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_51" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_51"
			       value="<?php echo $custom_sponsors_51; ?>"/>
			<input id="upload_custom_sponsors_51" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_51 ) {
				echo '<img src="' . (string) $custom_sponsors_51 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_51" id="custom_sponsors_url_51"
			       value="<?php echo $custom_sponsors_url_51; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_51' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_51' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 52 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 52</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_52" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_52"
			       value="<?php echo $custom_sponsors_52; ?>"/>
			<input id="upload_custom_sponsors_52" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_52 ) {
				echo '<img src="' . (string) $custom_sponsors_52 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_52" id="custom_sponsors_url_52"
			       value="<?php echo $custom_sponsors_url_52; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_52' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_52' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 53 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 53</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_53" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_53"
			       value="<?php echo $custom_sponsors_53; ?>"/>
			<input id="upload_custom_sponsors_53" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_53 ) {
				echo '<img src="' . (string) $custom_sponsors_53 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_53" id="custom_sponsors_url_53"
			       value="<?php echo $custom_sponsors_url_53; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_53' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_53' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 54 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 54</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_54" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_54"
			       value="<?php echo $custom_sponsors_54; ?>"/>
			<input id="upload_custom_sponsors_54" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_54 ) {
				echo '<img src="' . (string) $custom_sponsors_54 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_54" id="custom_sponsors_url_54"
			       value="<?php echo $custom_sponsors_url_54; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_54' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_54' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 55 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 55</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_55" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_55"
			       value="<?php echo $custom_sponsors_55; ?>"/>
			<input id="upload_custom_sponsors_55" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_55 ) {
				echo '<img src="' . (string) $custom_sponsors_55 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_55" id="custom_sponsors_url_55"
			       value="<?php echo $custom_sponsors_url_55; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_55' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_55' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 56 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 56</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_56" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_56"
			       value="<?php echo $custom_sponsors_56; ?>"/>
			<input id="upload_custom_sponsors_56" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_56 ) {
				echo '<img src="' . (string) $custom_sponsors_56 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_56" id="custom_sponsors_url_56"
			       value="<?php echo $custom_sponsors_url_56; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_56' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_56' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 57 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 57</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_57" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_57"
			       value="<?php echo $custom_sponsors_57; ?>"/>
			<input id="upload_custom_sponsors_57" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_57 ) {
				echo '<img src="' . (string) $custom_sponsors_57 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_57" id="custom_sponsors_url_57"
			       value="<?php echo $custom_sponsors_url_57; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_57' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_57' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 58 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 58</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_58" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_58"
			       value="<?php echo $custom_sponsors_58; ?>"/>
			<input id="upload_custom_sponsors_58" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_58 ) {
				echo '<img src="' . (string) $custom_sponsors_58 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_58" id="custom_sponsors_url_58"
			       value="<?php echo $custom_sponsors_url_58; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_58' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_58' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 59 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 59</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_59" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_59"
			       value="<?php echo $custom_sponsors_59; ?>"/>
			<input id="upload_custom_sponsors_59" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_59 ) {
				echo '<img src="' . (string) $custom_sponsors_59 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_59" id="custom_sponsors_url_59"
			       value="<?php echo $custom_sponsors_url_59; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_59' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_59' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

		<hr/>

		<!-- SPONSOR 60 -->
		<div style="padding: 10px; margin: 0px 0px 10px 0px; background: #ffff;">
			<h2 style="margin: 2px 0px 4px 0px;">SPONSOR 60</h2>
			<h5>UPLOAD NEW IMAGE:</h5>
			<input id="custom_sponsors_60" type="text" size="36" style="max-width: 90%;" name="custom_sponsors_60"
			       value="<?php echo $custom_sponsors_60; ?>"/>
			<input id="upload_custom_sponsors_60" class="button" type="button" value="Upload Image"/>
			<br/>
			<h5>CURRENT IMAGE:</h5>
			<?php
			if ( $custom_sponsors_60 ) {
				echo '<img src="' . (string) $custom_sponsors_60 . '" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" />';
			}
			?>
			<br/>
			<h5>URL</h5>
			<input type="text" name="custom_sponsors_url_60" id="custom_sponsors_url_60"
			       value="<?php echo $custom_sponsors_url_60; ?>" size="80"/>
			<em> - Example: http://leandroarts.com</em>
			<!-- Logic: -->
			<script type="text/javascript">
				jQuery( document ).ready( function () {
					var custom_uploader;
					jQuery( '#upload_custom_sponsors_60' ).click( function ( e ) {
						e.preventDefault();
						if ( custom_uploader ) {
							custom_uploader.open();
							return;
						}
						custom_uploader = wp.media.frames.file_frame = wp.media( {
							title: 'Choose Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						} );
						custom_uploader.on( 'select', function () {
							attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
							jQuery( '#custom_sponsors_60' ).val( attachment.url );
						} );
						custom_uploader.open();
						custom_uploader.open();
					} );
				} );
			</script>
		</div>

	</div><!-- SPONSORS -->


	<?php // end Display


} // end Metabox


// ------------------------
// v4 SAVE:
// ------------------------

add_action( 'save_post', 'v4_event_meta_box_save' );

function v4_event_meta_box_save( $post_id ) {
	// Setup:
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post' ) ) {
		return;
	}

	// Save:

	$chk = ( isset( $_POST['eventSoldout'] ) && $_POST['eventSoldout'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'eventSoldout', $chk );

	if ( isset( $_POST['events_list_cell_image'] ) ) {
		update_post_meta( $post_id, 'events_list_cell_image', $_POST['events_list_cell_image'] );
	}

	if ( isset( $_POST['events_list_cell_image_logo'] ) ) {
		update_post_meta( $post_id, 'events_list_cell_image_logo', $_POST['events_list_cell_image_logo'] );
	}

	if ( isset( $_POST['eventDate'] ) ) {
		update_post_meta( $post_id, 'eventDate', $_POST['eventDate'] );
	}

	if ( isset( $_POST['eventTime'] ) ) {
		update_post_meta( $post_id, 'eventTime', $_POST['eventTime'] );
	}

	if ( isset( $_POST['eventCity'] ) ) {
		update_post_meta( $post_id, 'eventCity', $_POST['eventCity'] );
	}

	if ( isset( $_POST['eventPurchaseLink'] ) ) {
		update_post_meta( $post_id, 'eventPurchaseLink', $_POST['eventPurchaseLink'] );
	}

	if ( isset( $_POST['eventPresentingSponsor'] ) ) {
		update_post_meta( $post_id, 'eventPresentingSponsor', $_POST['eventPresentingSponsor'] );
	}

	if ( isset( $_POST['eventPresentingSponsorUrl'] ) ) {
		update_post_meta( $post_id, 'eventPresentingSponsorUrl', $_POST['eventPresentingSponsorUrl'] );
	}


	if ( isset( $_POST['eventIntroImage'] ) ) {
		update_post_meta( $post_id, 'eventIntroImage', $_POST['eventIntroImage'] );
	}

	if ( isset( $_POST['eventIntroHeading'] ) ) {
		update_post_meta( $post_id, 'eventIntroHeading', $_POST['eventIntroHeading'] );
	}

	if ( isset( $_POST['eventIntroText'] ) ) {
		update_post_meta( $post_id, 'eventIntroText', $_POST['eventIntroText'] );
	}

	if ( isset( $_POST['eventIntroItem1_heading'] ) ) {
		update_post_meta( $post_id, 'eventIntroItem1_heading', $_POST['eventIntroItem1_heading'] );
	}

	if ( isset( $_POST['eventIntroItem1_text'] ) ) {
		update_post_meta( $post_id, 'eventIntroItem1_text', $_POST['eventIntroItem1_text'] );
	}

	if ( isset( $_POST['eventIntroItem2_heading'] ) ) {
		update_post_meta( $post_id, 'eventIntroItem2_heading', $_POST['eventIntroItem2_heading'] );
	}

	if ( isset( $_POST['eventIntroItem2_text'] ) ) {
		update_post_meta( $post_id, 'eventIntroItem2_text', $_POST['eventIntroItem2_text'] );
	}


	if ( isset( $_POST['eventVideo'] ) ) {
		update_post_meta( $post_id, 'eventVideo', $_POST['eventVideo'] );
	}


	if ( isset( $_POST['eventIntro2Image'] ) ) {
		update_post_meta( $post_id, 'eventIntro2Image', $_POST['eventIntro2Image'] );
	}

	if ( isset( $_POST['eventIntro2Heading'] ) ) {
		update_post_meta( $post_id, 'eventIntro2Heading', $_POST['eventIntro2Heading'] );
	}

	if ( isset( $_POST['eventContinuedIntroText'] ) ) {
		update_post_meta( $post_id, 'eventContinuedIntroText', $_POST['eventContinuedIntroText'] );
	}


	if ( isset( $_POST['eventIntro3Image'] ) ) {
		update_post_meta( $post_id, 'eventIntro3Image', $_POST['eventIntro3Image'] );
	}

	if ( isset( $_POST['eventIntro3Heading'] ) ) {
		update_post_meta( $post_id, 'eventIntro3Heading', $_POST['eventIntro3Heading'] );
	}

	if ( isset( $_POST['eventContinuedIntroText3'] ) ) {
		update_post_meta( $post_id, 'eventContinuedIntroText3', $_POST['eventContinuedIntroText3'] );
	}


	if ( isset( $_POST['eventIntro4Image'] ) ) {
		update_post_meta( $post_id, 'eventIntro4Image', $_POST['eventIntro4Image'] );
	}

	if ( isset( $_POST['eventIntro4Heading'] ) ) {
		update_post_meta( $post_id, 'eventIntro4Heading', $_POST['eventIntro4Heading'] );
	}

	if ( isset( $_POST['eventContinuedIntroText4'] ) ) {
		update_post_meta( $post_id, 'eventContinuedIntroText4', $_POST['eventContinuedIntroText4'] );
	}


	if ( isset( $_POST['eventIntro5Image'] ) ) {
		update_post_meta( $post_id, 'eventIntro5Image', $_POST['eventIntro5Image'] );
	}

	if ( isset( $_POST['eventIntro5Heading'] ) ) {
		update_post_meta( $post_id, 'eventIntro5Heading', $_POST['eventIntro5Heading'] );
	}

	if ( isset( $_POST['eventContinuedIntroText5'] ) ) {
		update_post_meta( $post_id, 'eventContinuedIntroText5', $_POST['eventContinuedIntroText5'] );
	}


	if ( isset( $_POST['eventMap'] ) ) {
		update_post_meta( $post_id, 'eventMap', $_POST['eventMap'] );
	}

	if ( isset( $_POST['eventMapUrl'] ) ) {
		update_post_meta( $post_id, 'eventMapUrl', $_POST['eventMapUrl'] );
	}

	if ( isset( $_POST['advert'] ) ) {
		update_post_meta( $post_id, 'advert', $_POST['advert'] );
	}

	if ( isset( $_POST['advertHead'] ) ) {
		update_post_meta( $post_id, 'advertHead', $_POST['advertHead'] );
	}

	if ( isset( $_POST['eventFeedback_heading_1'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_heading_1', $_POST['eventFeedback_heading_1'] );
	}

	if ( isset( $_POST['eventFeedback_client_1'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_client_1', $_POST['eventFeedback_client_1'] );
	}

	if ( isset( $_POST['eventFeedback_date_1'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_date_1', $_POST['eventFeedback_date_1'] );
	}

	if ( isset( $_POST['eventFeedback_excerpt_1'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_excerpt_1', $_POST['eventFeedback_excerpt_1'] );
	}

	if ( isset( $_POST['eventFeedback_heading_2'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_heading_2', $_POST['eventFeedback_heading_2'] );
	}

	if ( isset( $_POST['eventFeedback_client_2'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_client_2', $_POST['eventFeedback_client_2'] );
	}

	if ( isset( $_POST['eventFeedback_date_2'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_date_2', $_POST['eventFeedback_date_2'] );
	}

	if ( isset( $_POST['eventFeedback_excerpt_2'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_excerpt_2', $_POST['eventFeedback_excerpt_2'] );
	}

	if ( isset( $_POST['eventFeedback_heading_3'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_heading_3', $_POST['eventFeedback_heading_3'] );
	}

	if ( isset( $_POST['eventFeedback_client_3'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_client_3', $_POST['eventFeedback_client_3'] );
	}

	if ( isset( $_POST['eventFeedback_date_3'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_date_3', $_POST['eventFeedback_date_3'] );
	}

	if ( isset( $_POST['eventFeedback_excerpt_3'] ) ) {
		update_post_meta( $post_id, 'eventFeedback_excerpt_3', $_POST['eventFeedback_excerpt_3'] );
	}


	/* Ticket Options */

	if ( isset( $_POST['eventTicketsCard_1_subHeading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_subHeading', $_POST['eventTicketsCard_1_subHeading'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_heading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_heading', $_POST['eventTicketsCard_1_heading'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_text'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_text', $_POST['eventTicketsCard_1_text'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_price'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_price', $_POST['eventTicketsCard_1_price'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_purchase'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_purchase', $_POST['eventTicketsCard_1_purchase'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_also_1'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_also_1', $_POST['eventTicketsCard_1_also_1'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_also_2'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_also_2', $_POST['eventTicketsCard_1_also_2'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_also_3'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_also_3', $_POST['eventTicketsCard_1_also_3'] );
	}
	if ( isset( $_POST['eventTicketsCard_1_also_4'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_1_also_4', $_POST['eventTicketsCard_1_also_4'] );
	}


	if ( isset( $_POST['eventTicketsCard_2_subHeading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_subHeading', $_POST['eventTicketsCard_2_subHeading'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_heading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_heading', $_POST['eventTicketsCard_2_heading'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_text'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_text', $_POST['eventTicketsCard_2_text'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_price'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_price', $_POST['eventTicketsCard_2_price'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_purchase'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_purchase', $_POST['eventTicketsCard_2_purchase'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_also_1'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_also_1', $_POST['eventTicketsCard_2_also_1'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_also_2'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_also_2', $_POST['eventTicketsCard_2_also_2'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_also_3'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_also_3', $_POST['eventTicketsCard_2_also_3'] );
	}
	if ( isset( $_POST['eventTicketsCard_2_also_4'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_2_also_4', $_POST['eventTicketsCard_2_also_4'] );
	}


	if ( isset( $_POST['eventTicketsCard_3_subHeading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_subHeading', $_POST['eventTicketsCard_3_subHeading'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_heading'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_heading', $_POST['eventTicketsCard_3_heading'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_text'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_text', $_POST['eventTicketsCard_3_text'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_price'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_price', $_POST['eventTicketsCard_3_price'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_purchase'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_purchase', $_POST['eventTicketsCard_3_purchase'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_also_1'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_also_1', $_POST['eventTicketsCard_3_also_1'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_also_2'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_also_2', $_POST['eventTicketsCard_3_also_2'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_also_3'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_also_3', $_POST['eventTicketsCard_3_also_3'] );
	}
	if ( isset( $_POST['eventTicketsCard_3_also_4'] ) ) {
		update_post_meta( $post_id, 'eventTicketsCard_3_also_4', $_POST['eventTicketsCard_3_also_4'] );
	}


	// SPONSORS:

	if ( isset( $_POST['custom_sponsors_1'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_1', $_POST['custom_sponsors_1'] );
	}

	if ( isset( $_POST['custom_sponsors_2'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_2', $_POST['custom_sponsors_2'] );
	}

	if ( isset( $_POST['custom_sponsors_3'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_3', $_POST['custom_sponsors_3'] );
	}

	if ( isset( $_POST['custom_sponsors_4'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_4', $_POST['custom_sponsors_4'] );
	}

	if ( isset( $_POST['custom_sponsors_5'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_5', $_POST['custom_sponsors_5'] );
	}

	if ( isset( $_POST['custom_sponsors_6'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_6', $_POST['custom_sponsors_6'] );
	}

	if ( isset( $_POST['custom_sponsors_7'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_7', $_POST['custom_sponsors_7'] );
	}

	if ( isset( $_POST['custom_sponsors_8'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_8', $_POST['custom_sponsors_8'] );
	}

	if ( isset( $_POST['custom_sponsors_9'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_9', $_POST['custom_sponsors_9'] );
	}

	if ( isset( $_POST['custom_sponsors_10'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_10', $_POST['custom_sponsors_10'] );
	}

	if ( isset( $_POST['custom_sponsors_11'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_11', $_POST['custom_sponsors_11'] );
	}

	if ( isset( $_POST['custom_sponsors_12'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_12', $_POST['custom_sponsors_12'] );
	}

	if ( isset( $_POST['custom_sponsors_13'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_13', $_POST['custom_sponsors_13'] );
	}

	if ( isset( $_POST['custom_sponsors_14'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_14', $_POST['custom_sponsors_14'] );
	}

	if ( isset( $_POST['custom_sponsors_15'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_15', $_POST['custom_sponsors_15'] );
	}

	if ( isset( $_POST['custom_sponsors_16'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_16', $_POST['custom_sponsors_16'] );
	}

	if ( isset( $_POST['custom_sponsors_17'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_17', $_POST['custom_sponsors_17'] );
	}

	if ( isset( $_POST['custom_sponsors_18'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_18', $_POST['custom_sponsors_18'] );
	}

	if ( isset( $_POST['custom_sponsors_19'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_19', $_POST['custom_sponsors_19'] );
	}

	if ( isset( $_POST['custom_sponsors_20'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_20', $_POST['custom_sponsors_20'] );
	}

	if ( isset( $_POST['custom_sponsors_21'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_21', $_POST['custom_sponsors_21'] );
	}

	if ( isset( $_POST['custom_sponsors_22'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_22', $_POST['custom_sponsors_22'] );
	}

	if ( isset( $_POST['custom_sponsors_23'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_23', $_POST['custom_sponsors_23'] );
	}

	if ( isset( $_POST['custom_sponsors_24'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_24', $_POST['custom_sponsors_24'] );
	}

	if ( isset( $_POST['custom_sponsors_25'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_25', $_POST['custom_sponsors_25'] );
	}

	if ( isset( $_POST['custom_sponsors_26'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_26', $_POST['custom_sponsors_26'] );
	}

	if ( isset( $_POST['custom_sponsors_27'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_27', $_POST['custom_sponsors_27'] );
	}

	if ( isset( $_POST['custom_sponsors_28'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_28', $_POST['custom_sponsors_28'] );
	}

	if ( isset( $_POST['custom_sponsors_29'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_29', $_POST['custom_sponsors_29'] );
	}

	if ( isset( $_POST['custom_sponsors_30'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_30', $_POST['custom_sponsors_30'] );
	}

	if ( isset( $_POST['custom_sponsors_31'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_31', $_POST['custom_sponsors_31'] );
	}

	if ( isset( $_POST['custom_sponsors_32'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_32', $_POST['custom_sponsors_32'] );
	}

	if ( isset( $_POST['custom_sponsors_33'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_33', $_POST['custom_sponsors_33'] );
	}

	if ( isset( $_POST['custom_sponsors_34'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_34', $_POST['custom_sponsors_34'] );
	}

	if ( isset( $_POST['custom_sponsors_35'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_35', $_POST['custom_sponsors_35'] );
	}

	if ( isset( $_POST['custom_sponsors_36'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_36', $_POST['custom_sponsors_36'] );
	}

	if ( isset( $_POST['custom_sponsors_37'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_37', $_POST['custom_sponsors_37'] );
	}

	if ( isset( $_POST['custom_sponsors_38'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_38', $_POST['custom_sponsors_38'] );
	}

	if ( isset( $_POST['custom_sponsors_39'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_39', $_POST['custom_sponsors_39'] );
	}

	if ( isset( $_POST['custom_sponsors_40'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_40', $_POST['custom_sponsors_40'] );
	}

	if ( isset( $_POST['custom_sponsors_41'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_41', $_POST['custom_sponsors_41'] );
	}

	if ( isset( $_POST['custom_sponsors_42'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_42', $_POST['custom_sponsors_42'] );
	}

	if ( isset( $_POST['custom_sponsors_43'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_43', $_POST['custom_sponsors_43'] );
	}

	if ( isset( $_POST['custom_sponsors_44'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_44', $_POST['custom_sponsors_44'] );
	}

	if ( isset( $_POST['custom_sponsors_45'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_45', $_POST['custom_sponsors_45'] );
	}

	if ( isset( $_POST['custom_sponsors_46'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_46', $_POST['custom_sponsors_46'] );
	}

	if ( isset( $_POST['custom_sponsors_47'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_47', $_POST['custom_sponsors_47'] );
	}

	if ( isset( $_POST['custom_sponsors_48'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_48', $_POST['custom_sponsors_48'] );
	}

	if ( isset( $_POST['custom_sponsors_49'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_49', $_POST['custom_sponsors_49'] );
	}

	if ( isset( $_POST['custom_sponsors_50'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_50', $_POST['custom_sponsors_50'] );
	}

	if ( isset( $_POST['custom_sponsors_51'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_51', $_POST['custom_sponsors_51'] );
	}

	if ( isset( $_POST['custom_sponsors_52'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_52', $_POST['custom_sponsors_52'] );
	}

	if ( isset( $_POST['custom_sponsors_53'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_53', $_POST['custom_sponsors_53'] );
	}

	if ( isset( $_POST['custom_sponsors_54'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_54', $_POST['custom_sponsors_54'] );
	}

	if ( isset( $_POST['custom_sponsors_55'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_55', $_POST['custom_sponsors_55'] );
	}

	if ( isset( $_POST['custom_sponsors_56'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_56', $_POST['custom_sponsors_56'] );
	}

	if ( isset( $_POST['custom_sponsors_57'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_57', $_POST['custom_sponsors_57'] );
	}

	if ( isset( $_POST['custom_sponsors_58'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_58', $_POST['custom_sponsors_58'] );
	}

	if ( isset( $_POST['custom_sponsors_59'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_59', $_POST['custom_sponsors_59'] );
	}

	if ( isset( $_POST['custom_sponsors_60'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_60', $_POST['custom_sponsors_60'] );
	}

	/* sponsor url */

	if ( isset( $_POST['custom_sponsors_url_1'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_1', $_POST['custom_sponsors_url_1'] );
	}

	if ( isset( $_POST['custom_sponsors_url_2'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_2', $_POST['custom_sponsors_url_2'] );
	}

	if ( isset( $_POST['custom_sponsors_url_3'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_3', $_POST['custom_sponsors_url_3'] );
	}

	if ( isset( $_POST['custom_sponsors_url_4'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_4', $_POST['custom_sponsors_url_4'] );
	}

	if ( isset( $_POST['custom_sponsors_url_5'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_5', $_POST['custom_sponsors_url_5'] );
	}

	if ( isset( $_POST['custom_sponsors_url_6'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_6', $_POST['custom_sponsors_url_6'] );
	}

	if ( isset( $_POST['custom_sponsors_url_7'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_7', $_POST['custom_sponsors_url_7'] );
	}

	if ( isset( $_POST['custom_sponsors_url_8'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_8', $_POST['custom_sponsors_url_8'] );
	}

	if ( isset( $_POST['custom_sponsors_url_9'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_9', $_POST['custom_sponsors_url_9'] );
	}

	if ( isset( $_POST['custom_sponsors_url_10'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_10', $_POST['custom_sponsors_url_10'] );
	}

	if ( isset( $_POST['custom_sponsors_url_11'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_11', $_POST['custom_sponsors_url_11'] );
	}

	if ( isset( $_POST['custom_sponsors_url_12'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_12', $_POST['custom_sponsors_url_12'] );
	}

	if ( isset( $_POST['custom_sponsors_url_13'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_13', $_POST['custom_sponsors_url_13'] );
	}

	if ( isset( $_POST['custom_sponsors_url_14'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_14', $_POST['custom_sponsors_url_14'] );
	}

	if ( isset( $_POST['custom_sponsors_url_15'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_15', $_POST['custom_sponsors_url_15'] );
	}

	if ( isset( $_POST['custom_sponsors_url_16'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_16', $_POST['custom_sponsors_url_16'] );
	}

	if ( isset( $_POST['custom_sponsors_url_17'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_17', $_POST['custom_sponsors_url_17'] );
	}

	if ( isset( $_POST['custom_sponsors_url_18'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_18', $_POST['custom_sponsors_url_18'] );
	}

	if ( isset( $_POST['custom_sponsors_url_19'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_19', $_POST['custom_sponsors_url_19'] );
	}

	if ( isset( $_POST['custom_sponsors_url_20'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_20', $_POST['custom_sponsors_url_20'] );
	}

	if ( isset( $_POST['custom_sponsors_url_21'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_21', $_POST['custom_sponsors_url_21'] );
	}

	if ( isset( $_POST['custom_sponsors_url_22'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_22', $_POST['custom_sponsors_url_22'] );
	}

	if ( isset( $_POST['custom_sponsors_url_23'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_23', $_POST['custom_sponsors_url_23'] );
	}

	if ( isset( $_POST['custom_sponsors_url_24'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_24', $_POST['custom_sponsors_url_24'] );
	}

	if ( isset( $_POST['custom_sponsors_url_25'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_25', $_POST['custom_sponsors_url_25'] );
	}

	if ( isset( $_POST['custom_sponsors_url_26'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_26', $_POST['custom_sponsors_url_26'] );
	}

	if ( isset( $_POST['custom_sponsors_url_27'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_27', $_POST['custom_sponsors_url_27'] );
	}

	if ( isset( $_POST['custom_sponsors_url_28'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_28', $_POST['custom_sponsors_url_28'] );
	}

	if ( isset( $_POST['custom_sponsors_url_29'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_29', $_POST['custom_sponsors_url_29'] );
	}

	if ( isset( $_POST['custom_sponsors_url_30'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_30', $_POST['custom_sponsors_url_30'] );
	}

	if ( isset( $_POST['custom_sponsors_url_31'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_31', $_POST['custom_sponsors_url_31'] );
	}

	if ( isset( $_POST['custom_sponsors_url_32'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_32', $_POST['custom_sponsors_url_32'] );
	}

	if ( isset( $_POST['custom_sponsors_url_33'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_33', $_POST['custom_sponsors_url_33'] );
	}

	if ( isset( $_POST['custom_sponsors_url_34'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_34', $_POST['custom_sponsors_url_34'] );
	}

	if ( isset( $_POST['custom_sponsors_url_35'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_35', $_POST['custom_sponsors_url_35'] );
	}

	if ( isset( $_POST['custom_sponsors_url_36'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_36', $_POST['custom_sponsors_url_36'] );
	}

	if ( isset( $_POST['custom_sponsors_url_37'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_37', $_POST['custom_sponsors_url_37'] );
	}

	if ( isset( $_POST['custom_sponsors_url_38'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_38', $_POST['custom_sponsors_url_38'] );
	}

	if ( isset( $_POST['custom_sponsors_url_39'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_39', $_POST['custom_sponsors_url_39'] );
	}

	if ( isset( $_POST['custom_sponsors_url_40'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_40', $_POST['custom_sponsors_url_40'] );
	}

	if ( isset( $_POST['custom_sponsors_url_41'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_41', $_POST['custom_sponsors_url_41'] );
	}

	if ( isset( $_POST['custom_sponsors_url_42'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_42', $_POST['custom_sponsors_url_42'] );
	}

	if ( isset( $_POST['custom_sponsors_url_43'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_43', $_POST['custom_sponsors_url_43'] );
	}

	if ( isset( $_POST['custom_sponsors_url_44'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_44', $_POST['custom_sponsors_url_44'] );
	}

	if ( isset( $_POST['custom_sponsors_url_45'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_45', $_POST['custom_sponsors_url_45'] );
	}

	if ( isset( $_POST['custom_sponsors_url_46'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_46', $_POST['custom_sponsors_url_46'] );
	}

	if ( isset( $_POST['custom_sponsors_url_47'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_47', $_POST['custom_sponsors_url_47'] );
	}

	if ( isset( $_POST['custom_sponsors_url_48'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_48', $_POST['custom_sponsors_url_48'] );
	}

	if ( isset( $_POST['custom_sponsors_url_49'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_49', $_POST['custom_sponsors_url_49'] );
	}

	if ( isset( $_POST['custom_sponsors_url_50'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_50', $_POST['custom_sponsors_url_50'] );
	}

	if ( isset( $_POST['custom_sponsors_url_51'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_51', $_POST['custom_sponsors_url_51'] );
	}

	if ( isset( $_POST['custom_sponsors_url_52'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_52', $_POST['custom_sponsors_url_52'] );
	}

	if ( isset( $_POST['custom_sponsors_url_53'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_53', $_POST['custom_sponsors_url_53'] );
	}

	if ( isset( $_POST['custom_sponsors_url_54'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_54', $_POST['custom_sponsors_url_54'] );
	}

	if ( isset( $_POST['custom_sponsors_url_55'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_55', $_POST['custom_sponsors_url_55'] );
	}

	if ( isset( $_POST['custom_sponsors_url_56'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_56', $_POST['custom_sponsors_url_56'] );
	}

	if ( isset( $_POST['custom_sponsors_url_57'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_57', $_POST['custom_sponsors_url_57'] );
	}

	if ( isset( $_POST['custom_sponsors_url_58'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_58', $_POST['custom_sponsors_url_58'] );
	}

	if ( isset( $_POST['custom_sponsors_url_59'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_59', $_POST['custom_sponsors_url_59'] );
	}

	if ( isset( $_POST['custom_sponsors_url_60'] ) ) {
		update_post_meta( $post_id, 'custom_sponsors_url_60', $_POST['custom_sponsors_url_60'] );
	}

} // end Save
