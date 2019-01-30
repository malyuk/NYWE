<?php

/* DAYTRIP POST
====================== */

function daytrip_post() {

	register_post_type( 'daytrip',
		array(
			'labels'              => array(
				'name'               => __( 'Daytrips', 'post type general name' ),
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
add_action( 'init', 'daytrip_post' );


// ------------------------
// METABOX:
// ------------------------
add_action( 'add_meta_boxes', 'daytrip_meta_box_add' );

function daytrip_meta_box_add() {
	add_meta_box( 'daytrip-id', 'Daytrip UI', 'daytrip_meta_box_cb', 'daytrip', 'normal', 'high' );
}

// ALLOW MULTI FILE: 
// (I believe this conflicts because it has been previously loaded in the them..)
// function update_edit_form() { echo ' enctype="multipart/form-data"'; } add_action('post_edit_form_tag', 'update_edit_form'); 

function daytrip_meta_box_cb( $post ) {

	// Config:
	$values             = get_post_custom( $post->ID );
	$daytripSoldout     = isset( $values['daytripSoldout'] ) ? esc_attr( $values['daytripSoldout'][0] ) : '';
	$daytripDate        = isset( $values['daytripDate'] ) ? esc_attr( $values['daytripDate'][0] ) : '';
	$daytripCity        = isset( $values['daytripCity'] ) ? esc_attr( $values['daytripCity'][0] ) : '';
	$daytrip_image      = isset( $values['daytrip_image'] ) ? esc_attr( $values['daytrip_image'][0] ) : '';
	$daytrip_image_logo = isset( $values['daytrip_image_logo'] ) ? esc_attr( $values['daytrip_image_logo'][0] ) : '';
	$daytripTimePreview = isset( $values['daytripTimePreview'] ) ? esc_attr( $values['daytripTimePreview'][0] ) : '';

	$daytripIntroImage         = isset( $values['daytripIntroImage'] ) ? esc_attr( $values['daytripIntroImage'][0] ) : '';
	$daytripIntroHeading       = isset( $values['daytripIntroHeading'] ) ? esc_attr( $values['daytripIntroHeading'][0] ) : '';
	$daytripIntroText          = isset( $values['daytripIntroText'] ) ? esc_attr( $values['daytripIntroText'][0] ) : '';
	$daytripIntroItem1_heading = isset( $values['daytripIntroItem1_heading'] ) ? esc_attr( $values['daytripIntroItem1_heading'][0] ) : '';
	$daytripIntroItem1_text    = isset( $values['daytripIntroItem1_text'] ) ? esc_attr( $values['daytripIntroItem1_text'][0] ) : '';
	$daytripIntroItem2_heading = isset( $values['daytripIntroItem2_heading'] ) ? esc_attr( $values['daytripIntroItem2_heading'][0] ) : '';
	$daytripIntroItem2_text    = isset( $values['daytripIntroItem2_text'] ) ? esc_attr( $values['daytripIntroItem2_text'][0] ) : '';

	$daytripTicksInc_heading_1 = isset( $values['daytripTicksInc_heading_1'] ) ? esc_attr( $values['daytripTicksInc_heading_1'][0] ) : '';
	$daytripTicksInc_text_1    = isset( $values['daytripTicksInc_text_1'] ) ? esc_attr( $values['daytripTicksInc_text_1'][0] ) : '';
	$daytripTicksInc_heading_2 = isset( $values['daytripTicksInc_heading_2'] ) ? esc_attr( $values['daytripTicksInc_heading_2'][0] ) : '';
	$daytripTicksInc_text_2    = isset( $values['daytripTicksInc_text_2'] ) ? esc_attr( $values['daytripTicksInc_text_2'][0] ) : '';
	$daytripTicksInc_heading_3 = isset( $values['daytripTicksInc_heading_3'] ) ? esc_attr( $values['daytripTicksInc_heading_3'][0] ) : '';
	$daytripTicksInc_text_3    = isset( $values['daytripTicksInc_text_3'] ) ? esc_attr( $values['daytripTicksInc_text_3'][0] ) : '';
	$daytripTicksInc_heading_4 = isset( $values['daytripTicksInc_heading_4'] ) ? esc_attr( $values['daytripTicksInc_heading_4'][0] ) : '';
	$daytripTicksInc_text_4    = isset( $values['daytripTicksInc_text_4'] ) ? esc_attr( $values['daytripTicksInc_text_4'][0] ) : '';
	$daytripTicksInc_heading_5 = isset( $values['daytripTicksInc_heading_5'] ) ? esc_attr( $values['daytripTicksInc_heading_5'][0] ) : '';
	$daytripTicksInc_text_5    = isset( $values['daytripTicksInc_text_5'] ) ? esc_attr( $values['daytripTicksInc_text_5'][0] ) : '';
	$daytripTicksInc_heading_6 = isset( $values['daytripTicksInc_heading_6'] ) ? esc_attr( $values['daytripTicksInc_heading_6'][0] ) : '';
	$daytripTicksInc_text_6    = isset( $values['daytripTicksInc_text_6'] ) ? esc_attr( $values['daytripTicksInc_text_6'][0] ) : '';


	$daytripFeedback_heading_1 = isset( $values['daytripFeedback_heading_1'] ) ? esc_attr( $values['daytripFeedback_heading_1'][0] ) : '';
	$daytripFeedback_client_1  = isset( $values['daytripFeedback_client_1'] ) ? esc_attr( $values['daytripFeedback_client_1'][0] ) : '';
	$daytripFeedback_date_1    = isset( $values['daytripFeedback_date_1'] ) ? esc_attr( $values['daytripFeedback_date_1'][0] ) : '';
	$daytripFeedback_excerpt_1 = isset( $values['daytripFeedback_excerpt_1'] ) ? esc_attr( $values['daytripFeedback_excerpt_1'][0] ) : '';

	$daytripFeedback_heading_2 = isset( $values['daytripFeedback_heading_2'] ) ? esc_attr( $values['daytripFeedback_heading_2'][0] ) : '';
	$daytripFeedback_client_2  = isset( $values['daytripFeedback_client_2'] ) ? esc_attr( $values['daytripFeedback_client_2'][0] ) : '';
	$daytripFeedback_date_2    = isset( $values['daytripFeedback_date_2'] ) ? esc_attr( $values['daytripFeedback_date_2'][0] ) : '';
	$daytripFeedback_excerpt_2 = isset( $values['daytripFeedback_excerpt_2'] ) ? esc_attr( $values['daytripFeedback_excerpt_2'][0] ) : '';

	$daytripFeedback_heading_3 = isset( $values['daytripFeedback_heading_3'] ) ? esc_attr( $values['daytripFeedback_heading_3'][0] ) : '';
	$daytripFeedback_client_3  = isset( $values['daytripFeedback_client_3'] ) ? esc_attr( $values['daytripFeedback_client_3'][0] ) : '';
	$daytripFeedback_date_3    = isset( $values['daytripFeedback_date_3'] ) ? esc_attr( $values['daytripFeedback_date_3'][0] ) : '';
	$daytripFeedback_excerpt_3 = isset( $values['daytripFeedback_excerpt_3'] ) ? esc_attr( $values['daytripFeedback_excerpt_3'][0] ) : '';

	$daytripVideo = isset( $values['daytripVideo'] ) ? esc_attr( $values['daytripVideo'][0] ) : '';

	$advert = isset( $values['advert'] ) ? esc_attr( $values['advert'][0] ) : '';

	$daytripMap    = isset( $values['daytripMap'] ) ? esc_attr( $values['daytripMap'][0] ) : '';
	$daytripMapUrl = isset( $values['daytripMapUrl'] ) ? esc_attr( $values['daytripMapUrl'][0] ) : '';

	$daytripSlide_1 = isset( $values['daytripSlide_1'] ) ? esc_attr( $values['daytripSlide_1'][0] ) : '';
	$daytripSlide_2 = isset( $values['daytripSlide_2'] ) ? esc_attr( $values['daytripSlide_2'][0] ) : '';
	$daytripSlide_3 = isset( $values['daytripSlide_3'] ) ? esc_attr( $values['daytripSlide_3'][0] ) : '';
	$daytripSlide_4 = isset( $values['daytripSlide_4'] ) ? esc_attr( $values['daytripSlide_4'][0] ) : '';
	$daytripSlide_5 = isset( $values['daytripSlide_5'] ) ? esc_attr( $values['daytripSlide_5'][0] ) : '';

	$daytripTicket                = isset( $values['daytripTicket'] ) ? esc_attr( $values['daytripTicket'][0] ) : '';
	$daytripTicketPrice           = isset( $values['daytripTicketPrice'] ) ? esc_attr( $values['daytripTicketPrice'][0] ) : '';
	$daytripTicketText            = isset( $values['daytripTicketText'] ) ? esc_attr( $values['daytripTicketText'][0] ) : '';
	$daytripTicketHeading         = isset( $values['daytripTicketHeading'] ) ? esc_attr( $values['daytripTicketHeading'][0] ) : '';
	$daytripTicketTimelineTime_1  = isset( $values['daytripTicketTimelineTime_1'] ) ? esc_attr( $values['daytripTicketTimelineTime_1'][0] ) : '';
	$daytripTicketTimelineText_1  = isset( $values['daytripTicketTimelineText_1'] ) ? esc_attr( $values['daytripTicketTimelineText_1'][0] ) : '';
	$daytripTicketTimelineTime_2  = isset( $values['daytripTicketTimelineTime_2'] ) ? esc_attr( $values['daytripTicketTimelineTime_2'][0] ) : '';
	$daytripTicketTimelineText_2  = isset( $values['daytripTicketTimelineText_2'] ) ? esc_attr( $values['daytripTicketTimelineText_2'][0] ) : '';
	$daytripTicketTimelineTime_3  = isset( $values['daytripTicketTimelineTime_3'] ) ? esc_attr( $values['daytripTicketTimelineTime_3'][0] ) : '';
	$daytripTicketTimelineText_3  = isset( $values['daytripTicketTimelineText_3'] ) ? esc_attr( $values['daytripTicketTimelineText_3'][0] ) : '';
	$daytripTicketTimelineTime_4  = isset( $values['daytripTicketTimelineTime_4'] ) ? esc_attr( $values['daytripTicketTimelineTime_4'][0] ) : '';
	$daytripTicketTimelineText_4  = isset( $values['daytripTicketTimelineText_4'] ) ? esc_attr( $values['daytripTicketTimelineText_4'][0] ) : '';
	$daytripTicketTimelineTime_5  = isset( $values['daytripTicketTimelineTime_5'] ) ? esc_attr( $values['daytripTicketTimelineTime_5'][0] ) : '';
	$daytripTicketTimelineText_5  = isset( $values['daytripTicketTimelineText_5'] ) ? esc_attr( $values['daytripTicketTimelineText_5'][0] ) : '';
	$daytripTicketTimelineTime_6  = isset( $values['daytripTicketTimelineTime_6'] ) ? esc_attr( $values['daytripTicketTimelineTime_6'][0] ) : '';
	$daytripTicketTimelineText_6  = isset( $values['daytripTicketTimelineText_6'] ) ? esc_attr( $values['daytripTicketTimelineText_6'][0] ) : '';
	$daytripTicketTimelineTime_7  = isset( $values['daytripTicketTimelineTime_7'] ) ? esc_attr( $values['daytripTicketTimelineTime_7'][0] ) : '';
	$daytripTicketTimelineText_7  = isset( $values['daytripTicketTimelineText_7'] ) ? esc_attr( $values['daytripTicketTimelineText_7'][0] ) : '';
	$daytripTicketTimelineTime_8  = isset( $values['daytripTicketTimelineTime_8'] ) ? esc_attr( $values['daytripTicketTimelineTime_8'][0] ) : '';
	$daytripTicketTimelineText_8  = isset( $values['daytripTicketTimelineText_8'] ) ? esc_attr( $values['daytripTicketTimelineText_8'][0] ) : '';
	$daytripTicketTimelineTime_9  = isset( $values['daytripTicketTimelineTime_9'] ) ? esc_attr( $values['daytripTicketTimelineTime_9'][0] ) : '';
	$daytripTicketTimelineText_9  = isset( $values['daytripTicketTimelineText_9'] ) ? esc_attr( $values['daytripTicketTimelineText_9'][0] ) : '';
	$daytripTicketTimelineTime_10 = isset( $values['daytripTicketTimelineTime_10'] ) ? esc_attr( $values['daytripTicketTimelineTime_10'][0] ) : '';
	$daytripTicketTimelineText_10 = isset( $values['daytripTicketTimelineText_10'] ) ? esc_attr( $values['daytripTicketTimelineText_10'][0] ) : '';


	// Media Uploader:
	add_action( 'admin_enqueue_scripts', 'media_uploader' );
	function media_uploader() {
		wp_enqueue_media();
	}

	// SECURITY:
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	// DISPLAY:
	?>

	<!-- SOLD OUT -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<!-- Enabled -->
		<?php if ( $daytripSoldout == 'on' ) : ?>
			<h3>EVENT SOLD OUT?</h3>
			CURRENT STATUS - <input type="checkbox" name="daytripSoldout"
			                        id="daytripSoldout" <?php if ( $daytripSoldout == 'on' ) {
				echo 'CHECKED';
			} ?> />
			<strong><?php print_r( $daytripSoldout ); ?></strong>
		<?php endif; ?>
		<!--  Disabled -->
		<?php if ( $daytripSoldout != 'on' ) : ?>
			<h3>EVENT SOLD OUT?</h3>
			CURRENT STATUS - <input type="checkbox" name="daytripSoldout"
			                        id="daytripSoldout" <?php if ( $daytripSoldout == 'on' ) {
				echo 'CHECKED';
			} ?> />
			<strong><?php print_r( $daytripSoldout ); ?></strong>
		<?php endif; ?>
	</div><!-- soldout -->

	<!-- DAYTRIP DATE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Daytrip Date</h3>
		<textarea name="daytripDate" id="daytripDate" cols="65" rows="1"><?php echo $daytripDate; ?></textarea>
		<br/>
		<em>* This will show up on the Homepage listings as a brief date desctiption. Note, the event listing logic is
			based on the POST Published date, not this field.</em>
	</div><!-- date -->

	<!-- DAYTRIP TIME -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Daytrip Time Preview (SHORT)</h3>
		<textarea name="daytripTimePreview" id="daytripTimePreview" cols="65"
		          rows="1"><?php echo $daytripTimePreview; ?></textarea>
		<br/>
		<em>* This will show up on the Daytrip page image header. Example: 7 - 11pm</em>
	</div><!-- city -->


	<!-- DAYTRIP CITY -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Daytrip City (SHORT)</h3>
		<textarea name="daytripCity" id="daytripCity" cols="65" rows="1"><?php echo $daytripCity; ?></textarea>
		<br/>
		<em>* This will show up on the Homepage listings as a brief location desctiption.</em>
	</div><!-- city -->


	<!-- DAYTRIP IMAGE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Desktop Banner Image</h3>
		<input id="daytrip_image" type="text" size="36" style="max-width: 90%;" name="daytrip_image"
		       value="<?php echo $daytrip_image; ?>"/>
		<input id="upload_daytrip_image" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image proportion of (16:9). Biggest size of 1920 x 1080 pixels, smaller images will also
			work. ALWAYS OPTIMIZE FOR WEB! AND SAVE AS JPG.</em>

		<!-- Preview: -->
		<?php
		if ( $daytrip_image ) {
			echo '
            <img id="daytrip_image_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytrip_image . '" />
        ';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytrip_image' ).click( function ( e ) {
					e.preventDefault();
					//If the uploader object has already been created, reopen the dialog
					if ( custom_uploader ) {
						custom_uploader.open();
						return;
					}
					//Extend the wp.media object
					custom_uploader = wp.media.frames.file_frame = wp.media( {
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					} );
					//When a file is selected, grab the URL and set it as the text field's value
					custom_uploader.on( 'select', function () {
						attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						jQuery( '#daytrip_image' ).val( attachment.url );
					} );
					//Open the uploader dialog
					custom_uploader.open();
					//Open the uploader dialog
					custom_uploader.open();
				} );
			} );
		</script>
	</div>


	<!-- IMAGE LOGO -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>Logo Image (optional)</h3>
		<input id="daytrip_image_logo" type="text" size="36" style="max-width: 90%;" name="daytrip_image_logo"
		       value="<?php echo $daytrip_image_logo; ?>"/>
		<input id="upload_daytrip_image_logo" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 200 x 200 pixels max, smaller images will also work.</em>

		<!-- Preview: -->
		<?php
		if ( $daytrip_image_logo ) {
			echo '
            <img id="daytrip_image_logo_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytrip_image_logo . '" />
        ';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytrip_image_logo' ).click( function ( e ) {
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
						jQuery( '#daytrip_image_logo' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
	</div>


	<!-- DAYTRIP INTRODUCTION -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>INTRODUCTION MODULE</h3>
		<h3>Daytrip Intro Image</h3>
		<input id="daytripIntroImage" type="text" size="36" style="max-width: 90%;" name="daytripIntroImage"
		       value="<?php echo $daytripIntroImage; ?>"/>
		<input id="upload_daytripIntroImage" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 740 x 740 pixels.</em>
		<!-- Preview: -->
		<?php
		if ( $daytripIntroImage ) {
			echo '<img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripIntroImage . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripIntroImage' ).click( function ( e ) {
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
						jQuery( '#daytripIntroImage' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<!-- Heading -->
		<h3>Daytrip Intro Heading</h3>
		<textarea name="daytripIntroHeading" id="daytripIntroHeading" cols="65"
		          rows="1"><?php echo $daytripIntroHeading; ?></textarea>
		<br/><em>Example: Introduction</em>
		<!-- Text -->
		<h3>Daytrip Intro Text</h3>
		<textarea name="daytripIntroText" id="daytripIntroText" cols="65"
		          rows="4"><?php echo $daytripIntroText; ?></textarea>
		<!-- Item Heading -->
		<h3>Daytrip Intro Item 1 - Heading</h3>
		<textarea name="daytripIntroItem1_heading" id="daytripIntroItem1_heading" cols="65"
		          rows="1"><?php echo $daytripIntroItem1_heading; ?></textarea>
		<!-- Item text -->
		<h3>Daytrip Intro Item 1 - Text</h3>
		<textarea name="daytripIntroItem1_text" id="daytripIntroItem1_text" cols="65"
		          rows="4"><?php echo $daytripIntroItem1_text; ?></textarea>
		<!-- Item2 Heading -->
		<h3>Daytrip Intro Item 2 - Heading</h3>
		<textarea name="daytripIntroItem2_heading" id="daytripIntroItem2_heading" cols="65"
		          rows="1"><?php echo $daytripIntroItem2_heading; ?></textarea>
		<!-- Item2 txt -->
		<h3>Daytrip Intro Item 2 - Text</h3>
		<textarea name="daytripIntroItem2_text" id="daytripIntroItem2_text" cols="65"
		          rows="4"><?php echo $daytripIntroItem2_text; ?></textarea>
	</div><!-- daytripIntro -->


	<!-- TICKETS INCLUDE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>TICKETS INCLUDE</h3>
		<!-- 1 -->
		<!-- Heading -->
		<h3>Heading 1</h3>
		<textarea name="daytripTicksInc_heading_1" id="daytripTicksInc_heading_1" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_1; ?></textarea>
		<!-- Text -->
		<h3>Text 1</h3>
		<textarea name="daytripTicksInc_text_1" id="daytripTicksInc_text_1" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_1; ?></textarea>
		<hr/>
		<!-- 2 -->
		<!-- Heading -->
		<h3>Heading 2</h3>
		<textarea name="daytripTicksInc_heading_2" id="daytripTicksInc_heading_2" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_2; ?></textarea>
		<!-- Text -->
		<h3>Text 2</h3>
		<textarea name="daytripTicksInc_text_2" id="daytripTicksInc_text_2" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_2; ?></textarea>
		<hr/>
		<!-- 3 -->
		<!-- Heading -->
		<h3>Heading 3</h3>
		<textarea name="daytripTicksInc_heading_3" id="daytripTicksInc_heading_3" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_3; ?></textarea>
		<!-- Text -->
		<h3>Text 3</h3>
		<textarea name="daytripTicksInc_text_3" id="daytripTicksInc_text_3" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_3; ?></textarea>
		<hr/>
		<!-- 4 -->
		<!-- Heading -->
		<h3>Heading 4</h3>
		<textarea name="daytripTicksInc_heading_4" id="daytripTicksInc_heading_4" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_4; ?></textarea>
		<!-- Text -->
		<h3>Text 4</h3>
		<textarea name="daytripTicksInc_text_4" id="daytripTicksInc_text_4" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_4; ?></textarea>
		<hr/>
		<!-- 5 -->
		<!-- Heading -->
		<h3>Heading 5</h3>
		<textarea name="daytripTicksInc_heading_5" id="daytripTicksInc_heading_5" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_5; ?></textarea>
		<!-- Text -->
		<h3>Text 5</h3>
		<textarea name="daytripTicksInc_text_5" id="daytripTicksInc_text_5" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_5; ?></textarea>
		<hr/>
		<!-- 6 -->
		<!-- Heading -->
		<h3>Heading 6</h3>
		<textarea name="daytripTicksInc_heading_6" id="daytripTicksInc_heading_6" cols="65"
		          rows="1"><?php echo $daytripTicksInc_heading_6; ?></textarea>
		<!-- Text -->
		<h3>Text 6</h3>
		<textarea name="daytripTicksInc_text_6" id="daytripTicksInc_text_6" cols="65"
		          rows="4"><?php echo $daytripTicksInc_text_6; ?></textarea>
	</div><!-- tickets include -->


	<!-- FEEDBACK -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>DAYTRIP FEEDBACK</h3>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="daytripFeedback_heading_1" id="daytripFeedback_heading_1" cols="65"
			          rows="1"><?php echo $daytripFeedback_heading_1; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="daytripFeedback_client_1" id="daytripFeedback_client_1" cols="65"
			          rows="1"><?php echo $daytripFeedback_client_1; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="daytripFeedback_date_1" id="daytripFeedback_date_1" cols="65"
			          rows="1"><?php echo $daytripFeedback_date_1; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="daytripFeedback_excerpt_1" id="daytripFeedback_excerpt_1" cols="65"
			          rows="5"><?php echo $daytripFeedback_excerpt_1; ?></textarea>
		</div>
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="daytripFeedback_heading_2" id="daytripFeedback_heading_2" cols="65"
			          rows="1"><?php echo $daytripFeedback_heading_2; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="daytripFeedback_client_2" id="daytripFeedback_client_2" cols="65"
			          rows="1"><?php echo $daytripFeedback_client_2; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="daytripFeedback_date_2" id="daytripFeedback_date_2" cols="65"
			          rows="1"><?php echo $daytripFeedback_date_2; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="daytripFeedback_excerpt_2" id="daytripFeedback_excerpt_2" cols="65"
			          rows="5"><?php echo $daytripFeedback_excerpt_2; ?></textarea>
		</div>
		<hr/>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Heading - Card 1</h3>
			<textarea name="daytripFeedback_heading_3" id="daytripFeedback_heading_3" cols="65"
			          rows="1"><?php echo $daytripFeedback_heading_3; ?></textarea>
			<h3>Client - Card 1</h3>
			<textarea name="daytripFeedback_client_3" id="daytripFeedback_client_3" cols="65"
			          rows="1"><?php echo $daytripFeedback_client_3; ?></textarea>
			<h3>Date - Card 1</h3>
			<textarea name="daytripFeedback_date_3" id="daytripFeedback_date_3" cols="65"
			          rows="1"><?php echo $daytripFeedback_date_3; ?></textarea>
			<h3>Testimonial - Card 1</h3>
			<textarea name="daytripFeedback_excerpt_3" id="daytripFeedback_excerpt_3" cols="65"
			          rows="5"><?php echo $daytripFeedback_excerpt_3; ?></textarea>
		</div>
	</div><!-- feedback -->


	<!-- VIDEO EMBED -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>VIDEO EMBED</h3>
		<textarea name="daytripVideo" id="daytripVideo" cols="65" rows="8"><?php echo $daytripVideo; ?></textarea>
		<br/><em> - Paste your video embed code here.
			<br/> - For best results size videos to 1280px x 670px. Sample:
			<br/>&lt;iframe width="1280" height="670" src="https://www.youtube.com/embed/HM2i8WkI2uQ?rel=0&amp;controls=0&amp;showinfo=0"
			frameborder="0" allow="autoplay; encrypted-media" allowfullscreen&gt;&lt;/iframe&gt;</em>
	</div>
	<!-- video -->


	<!-- MAP -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>DAYTRIP MAP (directions)</h3>
		<h3>Image</h3>
		<input id="daytripMap" type="text" size="36" style="max-width: 90%;" name="daytripMap"
		       value="<?php echo $daytripMap; ?>"/>
		<input id="upload_daytripMap" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1920x 400 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripMap ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripMap . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripMap' ).click( function ( e ) {
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
						jQuery( '#daytripMap' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<h3>Map URL (Directions)</h3>
		<textarea name="daytripMapUrl" id="daytripMapUrl" cols="65" rows="1"><?php echo $daytripMapUrl; ?></textarea>
		<br/><em>Example: http://yourmaps.com/youraddress</em>
	</div><!-- map -->


	<!-- SLIDES -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>SLIDES</h3>
		<h3>Slide 1</h3>
		<input id="daytripSlide_1" type="text" size="36" style="max-width: 90%;" name="daytripSlide_1"
		       value="<?php echo $daytripSlide_1; ?>"/>
		<input id="upload_daytripSlide_1" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripSlide_1 ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripSlide_1 . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripSlide_1' ).click( function ( e ) {
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
						jQuery( '#daytripSlide_1' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<hr/>
		<h3>Slide 2</h3>
		<input id="daytripSlide_2" type="text" size="36" style="max-width: 90%;" name="daytripSlide_2"
		       value="<?php echo $daytripSlide_2; ?>"/>
		<input id="upload_daytripSlide_2" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripSlide_2 ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripSlide_2 . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripSlide_2' ).click( function ( e ) {
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
						jQuery( '#daytripSlide_2' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<hr/>
		<h3>Slide 3</h3>
		<input id="daytripSlide_3" type="text" size="36" style="max-width: 90%;" name="daytripSlide_3"
		       value="<?php echo $daytripSlide_3; ?>"/>
		<input id="upload_daytripSlide_3" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripSlide_3 ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripSlide_3 . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripSlide_3' ).click( function ( e ) {
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
						jQuery( '#daytripSlide_3' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<hr/>
		<h3>Slide 4</h3>
		<input id="daytripSlide_4" type="text" size="36" style="max-width: 90%;" name="daytripSlide_4"
		       value="<?php echo $daytripSlide_4; ?>"/>
		<input id="upload_daytripSlide_4" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripSlide_4 ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripSlide_4 . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripSlide_4' ).click( function ( e ) {
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
						jQuery( '#daytripSlide_4' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
		<hr/>
		<h3>Slide 5</h3>
		<input id="daytripSlide_5" type="text" size="36" style="max-width: 90%;" name="daytripSlide_5"
		       value="<?php echo $daytripSlide_5; ?>"/>
		<input id="upload_daytripSlide_5" class="button" type="button" value="Upload Image"/>
		<br/><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web
			(minimum 60% compression).</em>
		<!-- Preview: -->
		<?php
		if ( $daytripSlide_5 ) {
			echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string) $daytripSlide_5 . '" />';
		}
		?>
		<!-- Logic: -->
		<script type="text/javascript">
			jQuery( document ).ready( function () {
				var custom_uploader;
				jQuery( '#upload_daytripSlide_5' ).click( function ( e ) {
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
						jQuery( '#daytripSlide_5' ).val( attachment.url );
					} );
					custom_uploader.open();
					custom_uploader.open();
				} );
			} );
		</script>
	</div>
	<!-- slides -->


	<!-- TICKET -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>DAYTRIP TICKET</h3>
		<h3>Purchase Button URL</h3>
		<textarea name="daytripTicket" id="daytripTicket" cols="65" rows="1"><?php echo $daytripTicket; ?></textarea>
		<br/><em>Example: https://www.eventpurchaseticket.com</em>
		<h3>Ticket Price</h3>
		<textarea name="daytripTicketPrice" id="daytripTicketPrice" cols="65"
		          rows="1"><?php echo $daytripTicketPrice; ?></textarea>
		<br/><em>Example: $99</em>
		<h3>Ticket Heading</h3>
		<textarea name="daytripTicketHeading" id="daytripTicketHeading" cols="65"
		          rows="1"><?php echo $daytripTicketHeading; ?></textarea>
		<br/><em>Example: GET YOUR TICKETS NOW!</em>
		<h3>Ticket Intro Text</h3>
		<textarea name="daytripTicketText" id="daytripTicketText" cols="65"
		          rows="3"><?php echo $daytripTicketText; ?></textarea>
		<br/><em>Example: Get early access to the event and enjoy a welcome.. (Best not to exceed 2 sentences)</em>
	</div><!-- ticket -->


	<!-- TIMELINE -->
	<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
		<h3>DAYTRIP TIMELINE</h3>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 1 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_1" id="daytripTicketTimelineTime_1" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_1; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 1 - Text</h3>
			<textarea name="daytripTicketTimelineText_1" id="daytripTicketTimelineText_1" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_1; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 2 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_2" id="daytripTicketTimelineTime_2" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_2; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 2 - Text</h3>
			<textarea name="daytripTicketTimelineText_2" id="daytripTicketTimelineText_2" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_2; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 3 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_3" id="daytripTicketTimelineTime_3" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_3; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 3 - Text</h3>
			<textarea name="daytripTicketTimelineText_3" id="daytripTicketTimelineText_3" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_3; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 4 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_4" id="daytripTicketTimelineTime_4" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_4; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 4 - Text</h3>
			<textarea name="daytripTicketTimelineText_4" id="daytripTicketTimelineText_4" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_4; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 5 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_5" id="daytripTicketTimelineTime_5" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_5; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 5 - Text</h3>
			<textarea name="daytripTicketTimelineText_5" id="daytripTicketTimelineText_5" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_5; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 6 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_6" id="daytripTicketTimelineTime_6" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_6; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 6 - Text</h3>
			<textarea name="daytripTicketTimelineText_6" id="daytripTicketTimelineText_6" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_6; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 7 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_7" id="daytripTicketTimelineTime_7" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_7; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 7 - Text</h3>
			<textarea name="daytripTicketTimelineText_7" id="daytripTicketTimelineText_7" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_7; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 8 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_8" id="daytripTicketTimelineTime_8" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_8; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 8 - Text</h3>
			<textarea name="daytripTicketTimelineText_8" id="daytripTicketTimelineText_8" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_8; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 9 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_9" id="daytripTicketTimelineTime_9" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_9; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 9 - Text</h3>
			<textarea name="daytripTicketTimelineText_9" id="daytripTicketTimelineText_9" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_9; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
		<div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9;">
			<h3>Entry 10 - Hour</h3>
			<textarea name="daytripTicketTimelineTime_10" id="daytripTicketTimelineTime_10" cols="65"
			          rows="1"><?php echo $daytripTicketTimelineTime_10; ?></textarea>
			<br/><em>Example: 8:30 AM</em>
			<h3>Entry 10 - Text</h3>
			<textarea name="daytripTicketTimelineText_10" id="daytripTicketTimelineText_10" cols="65"
			          rows="4"><?php echo $daytripTicketTimelineText_10; ?></textarea>
			<br/><em>Example: Gather at the bus terminal at corner of 23rd Street and 5th Avenue.</em>
		</div>
	</div><!-- timeline -->


	<?php // end Display


} // end Metabox


// SAVE:
add_action( 'save_post', 'daytrip_meta_box_save' );
function daytrip_meta_box_save( $post_id ) {

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
	$chk = ( isset( $_POST['daytripSoldout'] ) && $_POST['daytripSoldout'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'daytripSoldout', $chk );

	if ( isset( $_POST['daytripDate'] ) ) {
		update_post_meta( $post_id, 'daytripDate', $_POST['daytripDate'] );
	}

	if ( isset( $_POST['daytripCity'] ) ) {
		update_post_meta( $post_id, 'daytripCity', $_POST['daytripCity'] );
	}

	if ( isset( $_POST['daytrip_image'] ) ) {
		update_post_meta( $post_id, 'daytrip_image', $_POST['daytrip_image'] );
	}

	if ( isset( $_POST['daytrip_image_logo'] ) ) {
		update_post_meta( $post_id, 'daytrip_image_logo', $_POST['daytrip_image_logo'] );
	}

	if ( isset( $_POST['daytripTimePreview'] ) ) {
		update_post_meta( $post_id, 'daytripTimePreview', $_POST['daytripTimePreview'] );
	}

	if ( isset( $_POST['daytripIntroImage'] ) ) {
		update_post_meta( $post_id, 'daytripIntroImage', $_POST['daytripIntroImage'] );
	}

	if ( isset( $_POST['daytripIntroHeading'] ) ) {
		update_post_meta( $post_id, 'daytripIntroHeading', $_POST['daytripIntroHeading'] );
	}

	if ( isset( $_POST['daytripIntroText'] ) ) {
		update_post_meta( $post_id, 'daytripIntroText', $_POST['daytripIntroText'] );
	}

	if ( isset( $_POST['daytripIntroItem1_heading'] ) ) {
		update_post_meta( $post_id, 'daytripIntroItem1_heading', $_POST['daytripIntroItem1_heading'] );
	}

	if ( isset( $_POST['daytripIntroItem1_text'] ) ) {
		update_post_meta( $post_id, 'daytripIntroItem1_text', $_POST['daytripIntroItem1_text'] );
	}

	if ( isset( $_POST['daytripIntroItem2_heading'] ) ) {
		update_post_meta( $post_id, 'daytripIntroItem2_heading', $_POST['daytripIntroItem2_heading'] );
	}

	if ( isset( $_POST['daytripIntroItem2_text'] ) ) {
		update_post_meta( $post_id, 'daytripIntroItem2_text', $_POST['daytripIntroItem2_text'] );
	}


	if ( isset( $_POST['daytripTicksInc_heading_1'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_1', $_POST['daytripTicksInc_heading_1'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_1'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_1', $_POST['daytripTicksInc_text_1'] );
	}

	if ( isset( $_POST['daytripTicksInc_heading_2'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_2', $_POST['daytripTicksInc_heading_2'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_2'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_2', $_POST['daytripTicksInc_text_2'] );
	}

	if ( isset( $_POST['daytripTicksInc_heading_3'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_3', $_POST['daytripTicksInc_heading_3'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_3'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_3', $_POST['daytripTicksInc_text_3'] );
	}

	if ( isset( $_POST['daytripTicksInc_heading_4'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_4', $_POST['daytripTicksInc_heading_4'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_4'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_4', $_POST['daytripTicksInc_text_4'] );
	}

	if ( isset( $_POST['daytripTicksInc_heading_5'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_5', $_POST['daytripTicksInc_heading_5'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_5'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_5', $_POST['daytripTicksInc_text_5'] );
	}

	if ( isset( $_POST['daytripTicksInc_heading_6'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_heading_6', $_POST['daytripTicksInc_heading_6'] );
	}

	if ( isset( $_POST['daytripTicksInc_text_6'] ) ) {
		update_post_meta( $post_id, 'daytripTicksInc_text_6', $_POST['daytripTicksInc_text_6'] );
	}


	if ( isset( $_POST['daytripVideo'] ) ) {
		update_post_meta( $post_id, 'daytripVideo', $_POST['daytripVideo'] );
	}


	if ( isset( $_POST['daytripMap'] ) ) {
		update_post_meta( $post_id, 'daytripMap', $_POST['daytripMap'] );
	}

	if ( isset( $_POST['daytripMapUrl'] ) ) {
		update_post_meta( $post_id, 'daytripMapUrl', $_POST['daytripMapUrl'] );
	}


	if ( isset( $_POST['advert'] ) ) {
		update_post_meta( $post_id, 'advert', $_POST['advert'] );
	}


	if ( isset( $_POST['daytripFeedback_heading_1'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_heading_1', $_POST['daytripFeedback_heading_1'] );
	}

	if ( isset( $_POST['daytripFeedback_client_1'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_client_1', $_POST['daytripFeedback_client_1'] );
	}

	if ( isset( $_POST['daytripFeedback_date_1'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_date_1', $_POST['daytripFeedback_date_1'] );
	}

	if ( isset( $_POST['daytripFeedback_excerpt_1'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_excerpt_1', $_POST['daytripFeedback_excerpt_1'] );
	}

	if ( isset( $_POST['daytripFeedback_heading_2'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_heading_2', $_POST['daytripFeedback_heading_2'] );
	}

	if ( isset( $_POST['daytripFeedback_client_2'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_client_2', $_POST['daytripFeedback_client_2'] );
	}

	if ( isset( $_POST['daytripFeedback_date_2'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_date_2', $_POST['daytripFeedback_date_2'] );
	}

	if ( isset( $_POST['daytripFeedback_excerpt_2'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_excerpt_2', $_POST['daytripFeedback_excerpt_2'] );
	}

	if ( isset( $_POST['daytripFeedback_heading_3'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_heading_3', $_POST['daytripFeedback_heading_3'] );
	}

	if ( isset( $_POST['daytripFeedback_client_3'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_client_3', $_POST['daytripFeedback_client_3'] );
	}

	if ( isset( $_POST['daytripFeedback_date_3'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_date_3', $_POST['daytripFeedback_date_3'] );
	}

	if ( isset( $_POST['daytripFeedback_excerpt_3'] ) ) {
		update_post_meta( $post_id, 'daytripFeedback_excerpt_3', $_POST['daytripFeedback_excerpt_3'] );
	}


	if ( isset( $_POST['daytripSlide_1'] ) ) {
		update_post_meta( $post_id, 'daytripSlide_1', $_POST['daytripSlide_1'] );
	}

	if ( isset( $_POST['daytripSlide_2'] ) ) {
		update_post_meta( $post_id, 'daytripSlide_2', $_POST['daytripSlide_2'] );
	}

	if ( isset( $_POST['daytripSlide_3'] ) ) {
		update_post_meta( $post_id, 'daytripSlide_3', $_POST['daytripSlide_3'] );
	}

	if ( isset( $_POST['daytripSlide_4'] ) ) {
		update_post_meta( $post_id, 'daytripSlide_4', $_POST['daytripSlide_4'] );
	}

	if ( isset( $_POST['daytripSlide_5'] ) ) {
		update_post_meta( $post_id, 'daytripSlide_5', $_POST['daytripSlide_5'] );
	}


	if ( isset( $_POST['daytripTicket'] ) ) {
		update_post_meta( $post_id, 'daytripTicket', $_POST['daytripTicket'] );
	}
	if ( isset( $_POST['daytripTicketPrice'] ) ) {
		update_post_meta( $post_id, 'daytripTicketPrice', $_POST['daytripTicketPrice'] );
	}
	if ( isset( $_POST['daytripTicketText'] ) ) {
		update_post_meta( $post_id, 'daytripTicketText', $_POST['daytripTicketText'] );
	}
	if ( isset( $_POST['daytripTicketHeading'] ) ) {
		update_post_meta( $post_id, 'daytripTicketHeading', $_POST['daytripTicketHeading'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_1'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_1', $_POST['daytripTicketTimelineTime_1'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_1'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_1', $_POST['daytripTicketTimelineText_1'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_2'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_2', $_POST['daytripTicketTimelineTime_2'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_2'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_2', $_POST['daytripTicketTimelineText_2'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_3'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_3', $_POST['daytripTicketTimelineTime_3'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_3'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_3', $_POST['daytripTicketTimelineText_3'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_4'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_4', $_POST['daytripTicketTimelineTime_4'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_4'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_4', $_POST['daytripTicketTimelineText_4'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_5'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_5', $_POST['daytripTicketTimelineTime_5'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_5'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_5', $_POST['daytripTicketTimelineText_5'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_6'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_6', $_POST['daytripTicketTimelineTime_6'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_6'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_6', $_POST['daytripTicketTimelineText_6'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_7'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_7', $_POST['daytripTicketTimelineTime_7'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_7'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_7', $_POST['daytripTicketTimelineText_7'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_8'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_8', $_POST['daytripTicketTimelineTime_8'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_8'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_8', $_POST['daytripTicketTimelineText_8'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_9'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_9', $_POST['daytripTicketTimelineTime_9'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_9'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_9', $_POST['daytripTicketTimelineText_9'] );
	}
	if ( isset( $_POST['daytripTicketTimelineTime_10'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineTime_10', $_POST['daytripTicketTimelineTime_10'] );
	}
	if ( isset( $_POST['daytripTicketTimelineText_10'] ) ) {
		update_post_meta( $post_id, 'daytripTicketTimelineText_10', $_POST['daytripTicketTimelineText_10'] );
	}

} // end Save


