<?php

// =================================================================
//   MEMBERSHIP PAGE METABOXES
// =================================================================


// Config:  
add_action( 'add_meta_boxes', 'membership_meta_box_add' );
function membership_meta_box_add() {    
    // Template specific conditional:
        // NOTE: To echo values on template, you cant use the regular get_post_custom_values, instead use:
        // $x =  get_post_meta($post->ID); echo end( $x['about_zigzag_1_image'] );
    global $post;
    if( !empty($post) ){        
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if( $pageTemplate == 'page-membership.php' ){
            add_meta_box(
                'membership-id', // $id
                'Configuration', // $title
                'membership_meta_box_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}


// Panel:
function membership_meta_box_cb( $post ) {
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    // Values:
    $values = get_post_custom( $post->ID );
    $membership_zigzag_image = isset( $values['membership_zigzag_image'] ) ? esc_attr( $values['membership_zigzag_image'][0] ) : '';
    $membership_zigzag_title = isset( $values['membership_zigzag_title'] ) ? esc_attr( $values['membership_zigzag_title'][0] ) : '';
    $membership_zigzag_text = isset( $values['membership_zigzag_text'] ) ? esc_attr( $values['membership_zigzag_text'][0] ) : '';
    $membership_zigzag_price = isset( $values['membership_zigzag_price'] ) ? esc_attr( $values['membership_zigzag_price'][0] ) : '';    
    $membership_zigzag_purchase = isset( $values['membership_zigzag_purchase'] ) ? esc_attr( $values['membership_zigzag_purchase'][0] ) : '';

    $membership_description_title = isset( $values['membership_description_title'] ) ? esc_attr( $values['membership_description_title'][0] ) : '';
    $membership_description_intro = isset( $values['membership_description_intro'] ) ? esc_attr( $values['membership_description_intro'][0] ) : '';
    $membership_description_text = isset( $values['membership_description_text'] ) ? esc_attr( $values['membership_description_text'][0] ) : '';
    $membership_description_terms = isset( $values['membership_description_terms'] ) ? esc_attr( $values['membership_description_terms'][0] ) : '';
  

?>
  <!--  PANEL CONTENT   -->
 
  <!-- Purchase Module -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>PURCHASE MODULE</h3>
    <h3>Image</h3>    
    <h4>Upload Image:</h4>
    <input id="membership_zigzag_image" type="text" size="36" style="max-width: 90%;" name="membership_zigzag_image" value="<?php echo $membership_zigzag_image; ?>" /> 
    <input id="upload_membership_zigzag_image" class="button" type="button" value="Upload Image" /> 
    <br /><em> - Recommended size of 740px x 740px. Save as JPG, and always save for web, with minimum 60% compression.</em>
    <?php // Preview:
    if ( $membership_zigzag_image ) {
        echo '
            <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
            src="' . (string)$membership_zigzag_image . '" />
        ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_membership_zigzag_image').click(function(e) {
                e.preventDefault();
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                custom_uploader.on('select', function() {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    jQuery('#membership_zigzag_image').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
    <hr />
    <h3>Title</h3>    
    <textarea name="membership_zigzag_title" id="membership_zigzag_title" cols="65" rows="1"><?php echo $membership_zigzag_title; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <textarea name="membership_zigzag_text" id="membership_zigzag_text" cols="65" rows="10"><?php echo $membership_zigzag_text; ?></textarea>
    <hr />
    <h3>Price</h3>    
    <textarea name="membership_zigzag_price" id="membership_zigzag_price" cols="65" rows="1"><?php echo $membership_zigzag_price; ?></textarea>
    <br /><em> - Example: $149 </em>   
    <hr />
    <h3>Purchase URL</h3>    
    <textarea name="membership_zigzag_purchase" id="membership_zigzag_purchase" cols="65" rows="1"><?php echo $membership_zigzag_purchase; ?></textarea>
    <br /><em> - Example: http://www.noodle.com</em>
</div><!-- end Cell -->
 

  <!-- Description -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>DESCRIPTION</h3>
    <h3>Title</h3>    
    <textarea name="membership_description_title" id="membership_description_title" cols="65" rows="1"><?php echo $membership_description_title; ?></textarea>
    <hr />
    <h3>Intro</h3>    
    <textarea name="membership_description_intro" id="membership_description_intro" cols="65" rows="10"><?php echo $membership_description_intro; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <?php 
	    wp_editor(htmlspecialchars_decode($membership_description_text), 'membership_description_text', array(
	            'wpautop' => false,
	            'media_buttons' => true,
	            'textarea_name' => 'membership_description_text',
	            'textarea_rows' => 10,
	            'teeny' => false,
	            'drag_drop_upload' => true,
	            'tinymce' => array(
  					'valid_elements' => '*[*]'
		         )
	    )); 
    ?>
    <hr />
    <h3>Terms &amp; Conditions</h3>    
    <?php 
	    wp_editor(htmlspecialchars_decode($membership_description_terms), 'membership_description_terms', array(
	            'wpautop' => false,
	            'media_buttons' => true,
	            'textarea_name' => 'membership_description_terms',
	            'textarea_rows' => 10,
	            'teeny' => false,
	            'drag_drop_upload' => true,
	            'tinymce' => array(
  					'valid_elements' => '*[*]'
		         )
	    )); 
    ?> 
</div><!-- end Cell -->



  <?php     
}

// SAVE
//add_action( 'save_post', 'membership_meta_box_save' );
function membership_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    if ( isset($_POST['membership_zigzag_image']) ) {
        update_post_meta( $post_id, 'membership_zigzag_image', $_POST['membership_zigzag_image'] );
    }

    if ( isset($_POST['membership_zigzag_title']) ) {
        update_post_meta( $post_id, 'membership_zigzag_title', $_POST['membership_zigzag_title'] );
    }

    if ( isset($_POST['membership_zigzag_text']) ) {
        update_post_meta( $post_id, 'membership_zigzag_text', $_POST['membership_zigzag_text'] );
    }

    if ( isset($_POST['membership_zigzag_price']) ) {
        update_post_meta( $post_id, 'membership_zigzag_price', $_POST['membership_zigzag_price'] );
    }

    if ( isset($_POST['membership_zigzag_purchase']) ) {
        update_post_meta( $post_id, 'membership_zigzag_purchase', $_POST['membership_zigzag_purchase'] );
    }

    if ( isset($_POST['membership_description_title']) ) {
        update_post_meta( $post_id, 'membership_description_title', $_POST['membership_description_title'] );
    }

    if ( isset($_POST['membership_description_intro']) ) {
        update_post_meta( $post_id, 'membership_description_intro', $_POST['membership_description_intro'] );
    }

    if ( isset($_POST['membership_description_text']) ) {
        update_post_meta( $post_id, 'membership_description_text', $_POST['membership_description_text'] );
    }

    if ( isset($_POST['membership_description_terms']) ) {
        update_post_meta( $post_id, 'membership_description_terms', $_POST['membership_description_terms'] );
    }
    
    
}


