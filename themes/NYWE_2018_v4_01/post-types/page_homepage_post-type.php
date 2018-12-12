<?php 

// =================================================================
//   HOMEPAGE PAGE METABOXES
// =================================================================


// Config:  
add_action( 'add_meta_boxes', 'home_meta_box_add' );
function home_meta_box_add() {    
    // Template specific conditional:
        // NOTE: To echo values on template, you cant use the regular get_post_custom_values, instead use:
        // $x =  get_post_meta($post->ID); echo end( $x['about_zigzag_1_image'] );
    global $post;
    if( !empty($post) ){        
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if( $pageTemplate == 'home.php' ){
            add_meta_box(
                'home-id', // $id
                'Configuration', // $title
                'home_meta_box_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}


// Panel:
function home_meta_box_cb( $post ) {
    // Setup:
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	add_action('admin_enqueue_scripts', 'media_uploader');
	function media_uploader() {
		wp_enqueue_media();
    }   
  
    // Values:
    $values = get_post_custom( $post->ID );
    $urlOveride = isset( $values['urlOveride'] ) ? esc_attr( $values['urlOveride'][0] ) : '';
    $slideshow_button = isset( $values['slideshow_button'] ) ? esc_attr( $values['slideshow_button'][0] ) : '';
    $slideshow_image = isset( $values['slideshow_image'] ) ? esc_attr( $values['slideshow_image'][0] ) : '';
    $slideshow_image_mobile = isset( $values['slideshow_image_mobile'] ) ? esc_attr( $values['slideshow_image_mobile'][0] ) : '';
    $slideshow_heading_1 = isset( $values['slideshow_heading_1'] ) ? esc_attr( $values['slideshow_heading_1'][0] ) : '';
    $slideshow_heading_2 = isset( $values['slideshow_heading_2'] ) ? esc_attr( $values['slideshow_heading_2'][0] ) : '';


    $home_testimonial_name_1 = isset( $values['home_testimonial_name_1'] ) ? esc_attr( $values['home_testimonial_name_1'][0] ) : '';
    $home_testimonial_quote_1 = isset( $values['home_testimonial_quote_1'] ) ? esc_attr( $values['home_testimonial_quote_1'][0] ) : '';
    $home_testimonial_name_2 = isset( $values['home_testimonial_name_2'] ) ? esc_attr( $values['home_testimonial_name_2'][0] ) : '';
    $home_testimonial_quote_2 = isset( $values['home_testimonial_quote_2'] ) ? esc_attr( $values['home_testimonial_quote_2'][0] ) : '';
    $home_testimonial_name_3 = isset( $values['home_testimonial_name_3'] ) ? esc_attr( $values['home_testimonial_name_3'][0] ) : '';
    $home_testimonial_quote_3 = isset( $values['home_testimonial_quote_3'] ) ? esc_attr( $values['home_testimonial_quote_3'][0] ) : '';
    $home_testimonial_name_4 = isset( $values['home_testimonial_name_4'] ) ? esc_attr( $values['home_testimonial_name_4'][0] ) : '';
    $home_testimonial_quote_4 = isset( $values['home_testimonial_quote_4'] ) ? esc_attr( $values['home_testimonial_quote_4'][0] ) : '';
    $home_testimonial_name_5 = isset( $values['home_testimonial_name_5'] ) ? esc_attr( $values['home_testimonial_name_5'][0] ) : '';
    $home_testimonial_quote_5 = isset( $values['home_testimonial_quote_5'] ) ? esc_attr( $values['home_testimonial_quote_5'][0] ) : '';
    $home_testimonial_name_6 = isset( $values['home_testimonial_name_6'] ) ? esc_attr( $values['home_testimonial_name_6'][0] ) : '';
    $home_testimonial_quote_6 = isset( $values['home_testimonial_quote_6'] ) ? esc_attr( $values['home_testimonial_quote_6'][0] ) : '';
    
    $home_tastevip = isset( $values['home_tastevip'] ) ? esc_attr( $values['home_tastevip'][0] ) : '';

?>
<!--  PANEL CONTENT   -->

<!-- BUTTON -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>BUTTON URL</h3>
    <input type="text" name="urlOveride" id="urlOveride" value="<?php echo $urlOveride; ?>" size="100" />
    <br /><em> - Example: http://leandroarts.com</em>

    <h3>BUTTON TEXT</h3>
    <input type="text" name="slideshow_button" id="slideshow_button" value="<?php echo $slideshow_button; ?>" size="100" />
    <br /><em> - Example: Learn More</em>
</div>


<!-- HEADING -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>HEADING 1</h3>
    <input type="text" name="slideshow_heading_1" id="slideshow_heading_1" value="<?php echo $slideshow_heading_1; ?>" size="100" />
    <br /><em> - Example: Looking for an unforgettable experience?</em>

    <h3>HEADING 2</h3>
    <input type="text" name="slideshow_heading_2" id="slideshow_heading_2" value="<?php echo $slideshow_heading_2; ?>" size="100" />
    <br /><em> - Example: RAISE YOUR GLASS!</em>
</div>

<!-- Cell Desktop Image -->  
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>BANNER IMAGE (Desktop)</h3>
    <input id="slideshow_image" type="text" size="36" style="max-width: 90%;" name="slideshow_image" value="<?php echo $slideshow_image; ?>" /> 
    <input id="upload_slideshow_image" class="button" type="button" value="Upload Image" />	
    <br /><em> - Recommended image size of 1920 x 940 pixels, height is flexible.</em>
    <!-- Preview: -->
    <?php 
    if ( $slideshow_image ) {
    echo '
        <img id="slideshow_image_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$slideshow_image . '" />
    ';
    }	
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_slideshow_image').click(function(e) {
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
                    jQuery('#slideshow_image').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>       	    
</div><!-- end Cell -->


<!-- Cell Mobile Image-->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>BANNER IMAGE (Mobile)</h3>
    <input id="slideshow_image_mobile" type="text" size="36" style="max-width: 90%;" name="slideshow_image_mobile" value="<?php echo $slideshow_image_mobile; ?>" /> 
    <input id="upload_slideshow_image_mobile" class="button" type="button" value="Upload Image" />	
    <br /><em> - Recommended image size of 600 x 600 pixels, height is flexible.</em>
    <!-- Preview: -->
    <?php 
    if ( $slideshow_image_mobile ) {
    echo '
        <img id="slideshow_image_mobile_preview" style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$slideshow_image_mobile . '" />
    ';
    }	
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_slideshow_image_mobile').click(function(e) {
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
                    jQuery('#slideshow_image_mobile').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>       	
</div><!-- end cell -->



<!-- Taste VIP -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>TASTE VIP Button</h3>            
        <textarea name="home_tastevip" id="home_tastevip" cols="65" rows="1"><?php echo $home_tastevip; ?></textarea>
        <br /><em>* https://www.joinit.org/o/new-york-wine-events/NAcs8WdZowthb9Hx4</em>
</div><!-- tastevip -->



<!-- Testimonials -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>TESTIMONIALS</h3>
    <!-- 1 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 1</h3>
        <textarea name="home_testimonial_name_1" id="home_testimonial_name_1" cols="65" rows="1"><?php echo $home_testimonial_name_1; ?></textarea>
        <hr />            
        <h3>Quote - 1</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_1), 'home_testimonial_quote_1', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_1',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
    <!-- 2 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 2</h3>
        <textarea name="home_testimonial_name_2" id="home_testimonial_name_2" cols="65" rows="1"><?php echo $home_testimonial_name_2; ?></textarea>
        <hr />            
        <h3>Quote - 2</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_2), 'home_testimonial_quote_2', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_2',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
    <!-- 3 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 3</h3>
        <textarea name="home_testimonial_name_3" id="home_testimonial_name_3" cols="65" rows="1"><?php echo $home_testimonial_name_3; ?></textarea>
        <hr />            
        <h3>Quote - 3</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_3), 'home_testimonial_quote_3', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_3',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
    <!-- 4 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 4</h3>
        <textarea name="home_testimonial_name_4" id="home_testimonial_name_4" cols="65" rows="1"><?php echo $home_testimonial_name_4; ?></textarea>
        <hr />            
        <h3>Quote - 4</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_4), 'home_testimonial_quote_4', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_4',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
    <!-- 5 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 5</h3>
        <textarea name="home_testimonial_name_5" id="home_testimonial_name_5" cols="65" rows="1"><?php echo $home_testimonial_name_5; ?></textarea>
        <hr />            
        <h3>Quote - 5</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_5), 'home_testimonial_quote_5', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_5',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
    <!-- 6 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Name - 6</h3>
        <textarea name="home_testimonial_name_6" id="home_testimonial_name_6" cols="65" rows="1"><?php echo $home_testimonial_name_6; ?></textarea>
        <hr />            
        <h3>Quote - 6</h3>    
        <?php 
        wp_editor(htmlspecialchars_decode($home_testimonial_quote_6), 'home_testimonial_quote_6', array(
                'wpautop' => false,
                'media_buttons' => true,
                'textarea_name' => 'home_testimonial_quote_6',
                'textarea_rows' => 5,
                'teeny' => false,
                'drag_drop_upload' => true,
                'tinymce' => array(
                    'valid_elements' => '*[*]'
                    )
        )); 
        ?>
    </div>
</div><!-- testimonials -->


  <?php     
}

// SAVE
add_action( 'save_post', 'home_meta_box_save' );
function home_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;


    if ( isset($_POST['urlOveride']) ) {
        update_post_meta( $post_id, 'urlOveride', $_POST['urlOveride'] );
    }

    if ( isset($_POST['slideshow_button']) ) {
        update_post_meta( $post_id, 'slideshow_button', $_POST['slideshow_button'] );
    }

    if ( isset($_POST['slideshow_heading_1']) ) {
        update_post_meta( $post_id, 'slideshow_heading_1', $_POST['slideshow_heading_1'] );
    }

    if ( isset($_POST['slideshow_heading_2']) ) {
        update_post_meta( $post_id, 'slideshow_heading_2', $_POST['slideshow_heading_2'] );
    }

    if( isset($_POST['slideshow_image']) ) {
        update_post_meta( $post_id, 'slideshow_image', $_POST['slideshow_image'] );
    }
		
    if ( isset($_POST['slideshow_image_mobile']) ) {
		update_post_meta( $post_id, 'slideshow_image_mobile', $_POST['slideshow_image_mobile'] );			            
    }

    if ( isset($_POST['home_testimonial_name_1']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_1', $_POST['home_testimonial_name_1'] );
    }

    if ( isset($_POST['home_testimonial_quote_1']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_1', $_POST['home_testimonial_quote_1'] );
    }

    if ( isset($_POST['home_testimonial_name_2']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_2', $_POST['home_testimonial_name_2'] );
    }

    if ( isset($_POST['home_testimonial_quote_2']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_2', $_POST['home_testimonial_quote_2'] );
    }

    if ( isset($_POST['home_testimonial_name_3']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_3', $_POST['home_testimonial_name_3'] );
    }

    if ( isset($_POST['home_testimonial_quote_3']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_3', $_POST['home_testimonial_quote_3'] );
    }

    if ( isset($_POST['home_testimonial_name_4']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_4', $_POST['home_testimonial_name_4'] );
    }

    if ( isset($_POST['home_testimonial_quote_4']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_4', $_POST['home_testimonial_quote_4'] );
    }

    if ( isset($_POST['home_testimonial_name_5']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_5', $_POST['home_testimonial_name_5'] );
    }

    if ( isset($_POST['home_testimonial_quote_5']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_5', $_POST['home_testimonial_quote_5'] );
    }

    if ( isset($_POST['home_testimonial_name_6']) ) {
        update_post_meta( $post_id, 'home_testimonial_name_6', $_POST['home_testimonial_name_6'] );
    }

    if ( isset($_POST['home_testimonial_quote_6']) ) {
        update_post_meta( $post_id, 'home_testimonial_quote_6', $_POST['home_testimonial_quote_6'] );
    }
    
    if ( isset($_POST['home_tastevip']) ) {
        update_post_meta( $post_id, 'home_tastevip', $_POST['home_tastevip'] );
    }
        
}


