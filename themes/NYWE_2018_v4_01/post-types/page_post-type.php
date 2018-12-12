<?php

/*

// =================================================================
//   DEFAULT PAGES METABOXES
// =================================================================

// ============================================ 
//  PAGE BANNER IMAGE METABOX
// ============================================
// Config:  
add_action( 'add_meta_boxes', 'pages_banner_meta_box_add' );
function pages_banner_meta_box_add() {
  add_meta_box( 'banner-id', 'Configuration', 'pages_banner_meta_box_cb', 'page', 'normal', 'high' );
}
// Panel:
function pages_banner_meta_box_cb( $post ) {
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    // Values:
    $values = get_post_custom( $post->ID );
    $page_banner = isset( $values['page_banner'] ) ? esc_attr( $values['page_banner'][0] ) : '';
    $advert = isset( $values['advert'] ) ? esc_attr( $values['advert'][0] ) : '';    

?>
  <!--  PANEL CONTENT   -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Page Banner Image</h3>    
    <!-- IMAGE -->
    <h4>Upload Image:</h4>
    <input id="page_banner" type="text" size="36" style="max-width: 90%;" name="page_banner" value="<?php echo $page_banner; ?>" /> 
    <input id="upload_page_banner" class="button" type="button" value="Upload Image" /> 
    
    <!-- PREVIEW IMAGE -->
    <?php 
    if ( $page_banner ) {
    echo '
        <img id="page_banner_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$page_banner . '" />
    ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_page_banner').click(function(e) {
                e.preventDefault();
                //If the uploader object has already been created, reopen the dialog
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }
                //Extend the wp.media object
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                //When a file is selected, grab the URL and set it as the text field's value
                custom_uploader.on('select', function() {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    jQuery('#page_banner').val(attachment.url);
                });
                //Open the uploader dialog
                custom_uploader.open();
                //Open the uploader dialog
                custom_uploader.open();
            });
        });
    </script>           

  </div><!-- end Cell -->

  <!--  PANEL CONTENT   -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Advertizing Embed Override</h3>    
    <textarea name="advert" id="advert" cols="65" rows="10"><?php echo $advert; ?></textarea>
    <br /><em>- If left blank, the template will load the Global Advert (#1).</em>
    <br /><em>- If filled in, it will override and show this Post specific one instead.</em>
  </div><!-- end Cell -->  
  

  <?php     
}

// SAVE
add_action( 'save_post', 'pages_banner_meta_box_save' );
function pages_banner_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['page_banner'] ) ) {
        update_post_meta( $post_id, 'page_banner',$_POST['page_banner'] ); 
    }

    if ( isset($_POST['advert']) ) {
        update_post_meta( $post_id, 'advert', $_POST['advert'] );
    }
    
}


*/