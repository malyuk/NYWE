<?php
// =======================================
// EVENTS POST
// =======================================

// REGISTER:
register_post_type( 'LIWC-events',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'author' ),
      'menu_icon' => 'dashicons-tickets-alt',
      'labels' => array(
          'name' => __( 'Events_v2' ),
          'singular_name' => __( 'Event_v2' )
      ),
      'public' => true,
      'has_archive' => true
    )
);



// ===========================
//  UI NETA BOX
// =========================== 

add_action( 'add_meta_boxes', 'v2_event_meta_box_add' );

function v2_event_meta_box_add() { 
  add_meta_box( 'v2-event-id', 'v2 Event UI', 'v2_event_meta_box_cb', 'LIWC-events', 'normal', 'high' );
} 

// ALLOW MULTI FILE: 
// (I believe this conflicts because it has been previously loaded in the them..)
// function update_edit_form() { echo ' enctype="multipart/form-data"'; } add_action('post_edit_form_tag', 'update_edit_form'); 

// v4 META BOX
function v2_event_meta_box_cb( $post ) {

  // Config:
  $values = get_post_custom( $post->ID );

  $event_date = isset($values['event_date']) ? esc_attr($values['event_date'][0]) : '';
  $event_time = isset($values['event_time']) ? esc_attr($values['event_time'][0]) : ''; 
  $event_time_end = isset($values['event_time_end']) ? esc_attr($values['event_time_end'][0]) : '';  
  $event_place = isset($values['event_place']) ? esc_attr($values['event_place'][0]) : '';
  $event_ticket_url = isset($values['event_ticket_url']) ? esc_attr($values['event_ticket_url'][0]) : '';  
  $event_video = isset($values['event_video']) ? esc_attr($values['event_video'][0]) : '';  
  
  // MEDIA UPLOADER:
	add_action('admin_enqueue_scripts', 'media_uploader');
	function media_uploader() {
		wp_enqueue_media();
  }   
  
  // SECURITY:
  wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
  

// =========================== 
// DISPLAY: 
// ===========================
?>


<!-- EVENT DATE -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Event Date</h3>
<textarea name="event_date" id="event_date" cols="65" rows="1"><?php echo $event_date; ?></textarea>
<br />
<em>* Note, the event listing logic is based on the POST Published date, not this field.</em>
</div><!-- event date -->


<!-- EVENT TIME -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Event Time (START)</h3>
<textarea name="event_time" id="event_time" cols="65" rows="1"><?php echo $event_time; ?></textarea>
<br />
</div><!-- event time -->

<!-- EVENT TIME END -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Event Time (END)</h3>
<textarea name="event_time_end" id="event_time_end" cols="65" rows="1"><?php echo $event_time_end; ?></textarea>
<br />
</div><!-- event time -->

<!-- EVENT PLACE -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Event City / Place</h3>
<textarea name="event_place" id="event_place" cols="65" rows="1"><?php echo $event_place; ?></textarea>
<br />
</div><!-- event place -->

<!-- EVENT PURCHASE LINK -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Purchase Ticket Link</h3>
<textarea name="event_ticket_url" id="event_ticket_url" cols="65" rows="1"><?php echo $event_ticket_url; ?></textarea>
<br />
<em>* Example: http://www.leandroarts.com</em>
</div><!-- purchase link -->


<!-- VIDEO EMBED -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>VIDEO EMBED</h3>
    <textarea name="event_video" id="event_video" cols="65" rows="8"><?php echo $event_video; ?></textarea>
    <br /><em> - Paste your video embed code here. 
    <br /> - For best results size videos to 1280px x 670px. Sample:
    <br />&lt;iframe width="1280" height="670" src="https://www.youtube.com/embed/HM2i8WkI2uQ?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen&gt;&lt;/iframe&gt;</em>
</div>
<!-- video -->


    
<?php // end Display


} // end Metabox


// ------------------------
// SAVE:
// ------------------------

add_action( 'save_post', 'v2_event_meta_box_save' );

function v2_event_meta_box_save( $post_id ) {
  // Setup:
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !isset($_POST['meta_box_nonce']) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
  if( !current_user_can( 'edit_post' ) ) return;

  // Save:
  
  if ( isset($_POST['event_date']) ) {
    update_post_meta( $post_id, 'event_date', $_POST['event_date'] );
  }

  if ( isset($_POST['event_time']) ) {
    update_post_meta( $post_id, 'event_time', $_POST['event_time'] );
  }

  if ( isset($_POST['event_time_end']) ) {
    update_post_meta( $post_id, 'event_time_end', $_POST['event_time_end'] );
  }

  if ( isset($_POST['event_place']) ) {
    update_post_meta( $post_id, 'event_place', $_POST['event_place'] );
  }

  if ( isset($_POST['event_ticket_url']) ) {
    update_post_meta( $post_id, 'event_ticket_url', $_POST['event_ticket_url'] );
  }

  if ( isset($_POST['event_video']) ) {
    update_post_meta( $post_id, 'event_video', $_POST['event_video'] );
  }
  

  
} // end Save



// ADD AUTHOR SORTING:
function add_author_support_to_posts() {
    add_post_type_support( 'LIWC-events', 'author' ); 
 }
 add_action( 'init', 'add_author_support_to_posts' );