<?php
// =======================================
// PROFILE POST TYPE
// =======================================

register_post_type( 'profile',
    array(
    'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'author' ),
    'menu_icon' => 'dashicons-tickets-alt',
    'labels' => array(
        'name' => __( 'Profiles' ),
        'singular_name' => __( 'Profile' )
    ),
    'public' => true,
    'has_archive' => true,
    )
);


// ===========================
//  UI NETA BOX
// =========================== 

add_action( 'add_meta_boxes', 'profile_meta_box_add' );

function profile_meta_box_add() { 
  add_meta_box( 'profile-id', 'Profile UI', 'profile_meta_box_cb', 'profile', 'normal', 'high' );
} 

// ALLOW MULTI FILE: 
// (I believe this conflicts because it has been previously loaded in the them..)
// function update_edit_form() { echo ' enctype="multipart/form-data"'; } add_action('post_edit_form_tag', 'update_edit_form'); 

// META BOX
function profile_meta_box_cb( $post ) {

  // Config:
  $values = get_post_custom( $post->ID );

  $profile_website_url = isset($values['profile_website_url']) ? esc_attr($values['profile_website_url'][0]) : '';
  
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


<!-- profile_website_url -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
<h3>Website URL</h3>
<textarea name="profile_website_url" id="profile_website_url" cols="65" rows="1"><?php echo $profile_website_url; ?></textarea>
<br />
<em>* http://www.yourcompany.com</em>
</div><!-- profile_website_url -->

    
<?php // end Display


} // end Metabox


// ------------------------
// SAVE:
// ------------------------

add_action( 'save_post', 'profile_meta_box_save' );

function profile_meta_box_save( $post_id ) {
  // Setup:
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !isset($_POST['meta_box_nonce']) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
  if( !current_user_can( 'edit_post' ) ) return;

  // Save:
  
  if ( isset($_POST['profile_website_url']) ) {
    update_post_meta( $post_id, 'profile_website_url', $_POST['profile_website_url'] );
  }
  

  
} // end Save

