<?php

// =================================================================
//   DEFAULT POST METABOXES
// =================================================================

// ============================================ 
//  POST BANNER IMAGE METABOX
// ============================================
// Config:  
add_action( 'add_meta_boxes', 'post_banner_meta_box_add' );
function post_banner_meta_box_add() {
  add_meta_box( 'post-id', 'Configuration', 'post_banner_meta_box_cb', 'post', 'normal', 'high' );
}
// Panel:
function post_banner_meta_box_cb( $post ) {
    // Values:
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );    
    $values = get_post_custom( $post->ID );
    $page_banner = isset( $values['page_banner'] ) ? esc_attr( $values['page_banner'][0] ) : '';
    $advert = isset( $values['advert'] ) ? esc_attr( $values['advert'][0] ) : '';
    $postIntro = isset( $values['postIntro'] ) ? esc_attr( $values['postIntro'][0] ) : '';

    $postBulletHeading_1 = isset( $values['postBulletHeading_1'] ) ? esc_attr( $values['postBulletHeading_1'][0] ) : '';
    $postBulletText_1 = isset( $values['postBulletText_1'] ) ? esc_attr( $values['postBulletText_1'][0] ) : '';
    $postBulletHeading_2 = isset( $values['postBulletHeading_2'] ) ? esc_attr( $values['postBulletHeading_2'][0] ) : '';
    $postBulletText_2 = isset( $values['postBulletText_2'] ) ? esc_attr( $values['postBulletText_2'][0] ) : '';
    $postBulletHeading_3 = isset( $values['postBulletHeading_3'] ) ? esc_attr( $values['postBulletHeading_3'][0] ) : '';
    $postBulletText_3 = isset( $values['postBulletText_3'] ) ? esc_attr( $values['postBulletText_3'][0] ) : '';

?>
    <!--  PANEL CONTENT   -->

    <!-- FEATURED IMAGE -->
    <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
        <h3>FEATURED IMAGE</h3>
        <p>
            Use the Wordpress default Featured Image functionality. Images should all be a consistent height for best results. Any size will work, 480px x 250px is the recommended size as per design. ** Always ** optimize for web when saving and use JPG format. 
        </p>
    </div>


  <!-- BANER IMAGE -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Page Banner Image (Optional)</h3>    
    <!-- IMAGE -->
    <h4>Upload Image:</h4>
    <input id="page_banner" type="text" size="36" style="max-width: 90%;" name="page_banner" value="<?php echo $page_banner; ?>" /> 
    <input id="upload_page_banner" class="button" type="button" value="Upload Image" /> 
    <br /><em>- Optimized for 1920px x 800px images. ** Always optimize for web **, save as a JPG and use minimum 60% compression.</em>
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
                    jQuery('#page_banner').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
  </div><!-- banner -->


  <!--  POST INTRO TEXT   -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Intro Text</h3>    
    <textarea name="postIntro" id="postIntro" cols="65" rows="10"><?php echo $postIntro; ?></textarea>
  </div><!-- intro -->  


  <!--  POST BULLETS  -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>BULLET ITEMS</h3>
    <h3>Heading 1</h3>    
    <textarea name="postBulletHeading_1" id="postBulletHeading_1" cols="65" rows="1"><?php echo $postBulletHeading_1; ?></textarea>
    <h3>Text 1</h3>    
    <textarea name="postBulletText_1" id="postBulletText_1" cols="65" rows="5"><?php echo $postBulletText_1; ?></textarea>    
    <hr />
    <h3>Heading 2</h3>    
    <textarea name="postBulletHeading_2" id="postBulletHeading_2" cols="65" rows="1"><?php echo $postBulletHeading_2; ?></textarea>
    <h3>Text 2</h3>    
    <textarea name="postBulletText_2" id="postBulletText_2" cols="65" rows="5"><?php echo $postBulletText_2; ?></textarea>    
    <hr />
    <h3>Heading 3</h3>    
    <textarea name="postBulletHeading_3" id="postBulletHeading_3" cols="65" rows="1"><?php echo $postBulletHeading_3; ?></textarea>
    <h3>Text 3</h3>    
    <textarea name="postBulletText_3" id="postBulletText_3" cols="65" rows="5"><?php echo $postBulletText_3; ?></textarea>    
    <hr />
  </div><!-- bullets -->  

    
  <!--  ADVERT OVERRIDE   -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Advertizing Embed Override</h3>    
    <textarea name="advert" id="advert" cols="65" rows="10"><?php echo $advert; ?></textarea>
    <br /><em>- If left blank, the template will load the Global Advert (#4).</em>
    <br /><em>- If filled in, it will override and show this Post specific one instead.</em>
  </div><!-- advert -->  

    
  <!--  CMS   -->
  <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>Wordpress WYSIWYG Editor (above) Placeholder</h3>    
  </div><!-- cms -->  



  <?php     
}

// SAVE
add_action( 'save_post', 'post_banner_meta_box_save' );
function post_banner_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['page_banner'] ) ) {
        update_post_meta( $post_id, 'page_banner', $_POST['page_banner'] ); 
    }

    if ( isset($_POST['advert']) ) {
        update_post_meta( $post_id, 'advert', $_POST['advert'] );
    }
    
    if ( isset($_POST['postIntro']) ) {
        update_post_meta( $post_id, 'postIntro', $_POST['postIntro'] );
    }    
    
    if ( isset($_POST['postBulletHeading_1']) ) {
        update_post_meta( $post_id, 'postBulletHeading_1', $_POST['postBulletHeading_1'] );
    }    
    
    if ( isset($_POST['postBulletText_1']) ) {
        update_post_meta( $post_id, 'postBulletText_1', $_POST['postBulletText_1'] );
    }    
    
    if ( isset($_POST['postBulletHeading_2']) ) {
        update_post_meta( $post_id, 'postBulletHeading_2', $_POST['postBulletHeading_2'] );
    }    
    
    if ( isset($_POST['postBulletText_2']) ) {
        update_post_meta( $post_id, 'postBulletText_2', $_POST['postBulletText_2'] );
    }    
    
    if ( isset($_POST['postBulletHeading_3']) ) {
        update_post_meta( $post_id, 'postBulletHeading_3', $_POST['postBulletHeading_3'] );
    }    
    
    if ( isset($_POST['postBulletText_3']) ) {
        update_post_meta( $post_id, 'postBulletText_3', $_POST['postBulletText_3'] );
    }    
    


} // save




