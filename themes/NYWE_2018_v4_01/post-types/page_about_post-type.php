<?php

// =================================================================
//   ABOUT PAGE METABOXES
// =================================================================


// Config:  
add_action( 'add_meta_boxes', 'about_meta_box_add' );
function about_meta_box_add() {    
    // Template specific conditional:
        // NOTE: To echo values on template, you cant use the regular get_post_custom_values, instead use:
        // $x =  get_post_meta($post->ID); echo end( $x['about_zigzag_1_image'] );
    global $post;
    if( !empty($post) ){        
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if( $pageTemplate == 'page-about.php' ){
            add_meta_box(
                'about-id', // $id
                'Configuration', // $title
                'about_meta_box_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}


// Panel:
function about_meta_box_cb( $post ) {
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    // Values:
    $values = get_post_custom( $post->ID );
    $about_zigzag_1_image = isset( $values['about_zigzag_1_image'] ) ? esc_attr( $values['about_zigzag_1_image'][0] ) : '';
    $about_zigzag_1_title = isset( $values['about_zigzag_1_title'] ) ? esc_attr( $values['about_zigzag_1_title'][0] ) : '';
    $about_zigzag_1_text = isset( $values['about_zigzag_1_text'] ) ? esc_attr( $values['about_zigzag_1_text'][0] ) : '';
    $about_zigzag_2_image = isset( $values['about_zigzag_2_image'] ) ? esc_attr( $values['about_zigzag_2_image'][0] ) : '';
    $about_zigzag_2_title = isset( $values['about_zigzag_2_title'] ) ? esc_attr( $values['about_zigzag_2_title'][0] ) : '';
    $about_zigzag_2_text = isset( $values['about_zigzag_2_text'] ) ? esc_attr( $values['about_zigzag_2_text'][0] ) : '';
    $about_zigzag_3_image = isset( $values['about_zigzag_3_image'] ) ? esc_attr( $values['about_zigzag_3_image'][0] ) : '';
    $about_zigzag_3_title = isset( $values['about_zigzag_3_title'] ) ? esc_attr( $values['about_zigzag_3_title'][0] ) : '';
    $about_zigzag_3_text = isset( $values['about_zigzag_3_text'] ) ? esc_attr( $values['about_zigzag_3_text'][0] ) : '';


?>
  <!--  PANEL CONTENT   -->
 
  <!-- Zig Zag 1 -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>ZIG ZAG 1</h3>
    <h3>Image</h3>    
    <h4>Upload Image:</h4>
    <input id="about_zigzag_1_image" type="text" size="36" style="max-width: 90%;" name="about_zigzag_1_image" value="<?php echo $about_zigzag_1_image; ?>" /> 
    <input id="upload_about_zigzag_1_image" class="button" type="button" value="Upload Image" /> 
    <br /><em> - Recommended size of 750px x 400px. Save as JPG, and always save for web, with minimum 60% compression.</em>
    <?php // Preview:
    if ( $about_zigzag_1_image ) {
        echo '
            <img id="page_banner_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
            src="' . (string)$about_zigzag_1_image . '" />
        ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_about_zigzag_1_image').click(function(e) {
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
                    jQuery('#about_zigzag_1_image').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
    <hr />
    <h3>Title</h3>    
    <textarea name="about_zigzag_1_title" id="about_zigzag_1_title" cols="65" rows="1"><?php echo $about_zigzag_1_title; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <textarea name="about_zigzag_1_text" id="about_zigzag_1_text" cols="65" rows="10"><?php echo $about_zigzag_1_text; ?></textarea>
  </div><!-- end Cell -->
 

  <!-- Zig Zag 2 -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>ZIG ZAG 2</h3>
    <h3>Image</h3>    
    <h4>Upload Image:</h4>
    <input id="about_zigzag_2_image" type="text" size="36" style="max-width: 90%;" name="about_zigzag_2_image" value="<?php echo $about_zigzag_2_image; ?>" /> 
    <input id="upload_about_zigzag_2_image" class="button" type="button" value="Upload Image" /> 
    <br /><em> - Recommended size of 750px x 400px. Save as JPG, and always save for web, with minimum 60% compression.</em>
    <?php // Preview:
    if ( $about_zigzag_2_image ) {
        echo '
            <img id="page_banner_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
            src="' . (string)$about_zigzag_2_image . '" />
        ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_about_zigzag_2_image').click(function(e) {
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
                    jQuery('#about_zigzag_2_image').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
    <hr />
    <h3>Title</h3>    
    <textarea name="about_zigzag_2_title" id="about_zigzag_2_title" cols="65" rows="1"><?php echo $about_zigzag_2_title; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <textarea name="about_zigzag_2_text" id="about_zigzag_2_text" cols="65" rows="10"><?php echo $about_zigzag_2_text; ?></textarea>
  </div><!-- end Cell -->

  
  <!-- Zig Zag 1 -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>ZIG ZAG 3</h3>
    <h3>Image</h3>    
    <h4>Upload Image:</h4>
    <input id="about_zigzag_3_image" type="text" size="36" style="max-width: 90%;" name="about_zigzag_3_image" value="<?php echo $about_zigzag_3_image; ?>" /> 
    <input id="upload_about_zigzag_3_image" class="button" type="button" value="Upload Image" /> 
    <br /><em> - Recommended size of 750px x 400px. Save as JPG, and always save for web, with minimum 60% compression.</em>
    <?php // Preview:
    if ( $about_zigzag_3_image ) {
        echo '
            <img id="page_banner_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
            src="' . (string)$about_zigzag_3_image . '" />
        ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_about_zigzag_3_image').click(function(e) {
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
                    jQuery('#about_zigzag_3_image').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
    <hr />
    <h3>Title</h3>    
    <textarea name="about_zigzag_3_title" id="about_zigzag_3_title" cols="65" rows="1"><?php echo $about_zigzag_3_title; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <textarea name="about_zigzag_3_text" id="about_zigzag_3_text" cols="65" rows="10"><?php echo $about_zigzag_3_text; ?></textarea>
  </div><!-- end Cell -->



  <?php     
}

// SAVE
add_action( 'save_post', 'about_meta_box_save' );
function about_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    if ( isset($_POST['about_zigzag_1_image']) ) {
        update_post_meta( $post_id, 'about_zigzag_1_image', $_POST['about_zigzag_1_image'] );
    }

    if ( isset($_POST['about_zigzag_1_title']) ) {
        update_post_meta( $post_id, 'about_zigzag_1_title', $_POST['about_zigzag_1_title'] );
    }

    if ( isset($_POST['about_zigzag_1_text']) ) {
        update_post_meta( $post_id, 'about_zigzag_1_text', $_POST['about_zigzag_1_text'] );
    }

    if ( isset($_POST['about_zigzag_2_image']) ) {
        update_post_meta( $post_id, 'about_zigzag_2_image', $_POST['about_zigzag_2_image'] );
    }

    if ( isset($_POST['about_zigzag_2_title']) ) {
        update_post_meta( $post_id, 'about_zigzag_2_title', $_POST['about_zigzag_2_title'] );
    }

    if ( isset($_POST['about_zigzag_2_text']) ) {
        update_post_meta( $post_id, 'about_zigzag_2_text', $_POST['about_zigzag_2_text'] );
    }

    if ( isset($_POST['about_zigzag_3_image']) ) {
        update_post_meta( $post_id, 'about_zigzag_3_image', $_POST['about_zigzag_3_image'] );
    }

    if ( isset($_POST['about_zigzag_3_title']) ) {
        update_post_meta( $post_id, 'about_zigzag_3_title', $_POST['about_zigzag_3_title'] );
    }

    if ( isset($_POST['about_zigzag_3_text']) ) {
        update_post_meta( $post_id, 'about_zigzag_3_text', $_POST['about_zigzag_3_text'] );
    }


    
}


