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

	<?php // end Display


} // end Metabox


// ------------------------
// v4 SAVE:
// ------------------------

//add_action( 'save_post', 'v4_event_meta_box_save' );
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

} // end Save
