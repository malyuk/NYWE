<?php

// =================================================================
//   SPONSORSHIP PAGE METABOXES
// =================================================================


// Config:  
add_action( 'add_meta_boxes', 'sponsorship_meta_box_add' );
function sponsorship_meta_box_add() {    
    // Template specific conditional:
        // NOTE: To echo values on template, you cant use the regular get_post_custom_values, instead use:
        // $x =  get_post_meta($post->ID); echo end( $x['about_zigzag_1_image'] );
    global $post;
    if( !empty($post) ){        
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if( $pageTemplate == 'page-sponsorship.php' ){
            add_meta_box(
                'sponsorship-id', // $id
                'Configuration', // $title
                'sponsorship_meta_box_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}


// Panel:
function sponsorship_meta_box_cb( $post ) {
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    // Values:
    $values = get_post_custom( $post->ID );

    $sponsorship_intro_heading = isset( $values['sponsorship_intro_heading'] ) ? esc_attr( $values['sponsorship_intro_heading'][0] ) : '';
    $sponsorship_intro_text = isset( $values['sponsorship_intro_text'] ) ? esc_attr( $values['sponsorship_intro_text'][0] ) : '';
    $sponsorship_intro_contact_url = isset( $values['sponsorship_intro_contact_url'] ) ? esc_attr( $values['sponsorship_intro_contact_url'][0] ) : '';
    
    $sponsorship_demo_banner = isset( $values['sponsorship_demo_banner'] ) ? esc_attr( $values['sponsorship_demo_banner'][0] ) : '';
    $sponsorship_demo_highlight_1_title = isset( $values['sponsorship_demo_highlight_1_title'] ) ? esc_attr( $values['sponsorship_demo_highlight_1_title'][0] ) : '';
    $sponsorship_demo_highlight_1_text = isset( $values['sponsorship_demo_highlight_1_text'] ) ? esc_attr( $values['sponsorship_demo_highlight_1_text'][0] ) : '';
    $sponsorship_demo_highlight_2_title = isset( $values['sponsorship_demo_highlight_2_title'] ) ? esc_attr( $values['sponsorship_demo_highlight_2_title'][0] ) : '';
    $sponsorship_demo_highlight_2_text = isset( $values['sponsorship_demo_highlight_2_text'] ) ? esc_attr( $values['sponsorship_demo_highlight_2_text'][0] ) : '';
    $sponsorship_demo_highlight_3_title = isset( $values['sponsorship_demo_highlight_3_title'] ) ? esc_attr( $values['sponsorship_demo_highlight_3_title'][0] ) : '';
    $sponsorship_demo_highlight_3_text = isset( $values['sponsorship_demo_highlight_3_text'] ) ? esc_attr( $values['sponsorship_demo_highlight_3_text'][0] ) : '';
    
    $sponsorship_channel_1_logo = isset( $values['sponsorship_channel_1_logo'] ) ? esc_attr( $values['sponsorship_channel_1_logo'][0] ) : '';
    $sponsorship_channel_1_title = isset( $values['sponsorship_channel_1_title'] ) ? esc_attr( $values['sponsorship_channel_1_title'][0] ) : '';
    $sponsorship_channel_1_text = isset( $values['sponsorship_channel_1_text'] ) ? esc_attr( $values['sponsorship_channel_1_text'][0] ) : '';
    $sponsorship_channel_2_logo = isset( $values['sponsorship_channel_2_logo'] ) ? esc_attr( $values['sponsorship_channel_2_logo'][0] ) : '';
    $sponsorship_channel_2_title = isset( $values['sponsorship_channel_2_title'] ) ? esc_attr( $values['sponsorship_channel_2_title'][0] ) : '';
    $sponsorship_channel_2_text = isset( $values['sponsorship_channel_2_text'] ) ? esc_attr( $values['sponsorship_channel_2_text'][0] ) : '';
    $sponsorship_channel_3_logo = isset( $values['sponsorship_channel_3_logo'] ) ? esc_attr( $values['sponsorship_channel_3_logo'][0] ) : '';
    $sponsorship_channel_3_title = isset( $values['sponsorship_channel_3_title'] ) ? esc_attr( $values['sponsorship_channel_3_title'][0] ) : '';
    $sponsorship_channel_3_text = isset( $values['sponsorship_channel_3_text'] ) ? esc_attr( $values['sponsorship_channel_3_text'][0] ) : '';
    $sponsorship_channel_4_logo = isset( $values['sponsorship_channel_4_logo'] ) ? esc_attr( $values['sponsorship_channel_4_logo'][0] ) : '';
    $sponsorship_channel_4_title = isset( $values['sponsorship_channel_4_title'] ) ? esc_attr( $values['sponsorship_channel_4_title'][0] ) : '';
    $sponsorship_channel_4_text = isset( $values['sponsorship_channel_4_text'] ) ? esc_attr( $values['sponsorship_channel_4_text'][0] ) : '';
    $sponsorship_channel_5_logo = isset( $values['sponsorship_channel_5_logo'] ) ? esc_attr( $values['sponsorship_channel_5_logo'][0] ) : '';
    $sponsorship_channel_5_title = isset( $values['sponsorship_channel_5_title'] ) ? esc_attr( $values['sponsorship_channel_5_title'][0] ) : '';
    $sponsorship_channel_5_text = isset( $values['sponsorship_channel_5_text'] ) ? esc_attr( $values['sponsorship_channel_5_text'][0] ) : '';
    $sponsorship_channel_6_logo = isset( $values['sponsorship_channel_6_logo'] ) ? esc_attr( $values['sponsorship_channel_6_logo'][0] ) : '';
    $sponsorship_channel_6_title = isset( $values['sponsorship_channel_6_title'] ) ? esc_attr( $values['sponsorship_channel_6_title'][0] ) : '';
    $sponsorship_channel_6_text = isset( $values['sponsorship_channel_6_text'] ) ? esc_attr( $values['sponsorship_channel_6_text'][0] ) : '';
    $sponsorship_channel_7_logo = isset( $values['sponsorship_channel_7_logo'] ) ? esc_attr( $values['sponsorship_channel_7_logo'][0] ) : '';
    $sponsorship_channel_7_title = isset( $values['sponsorship_channel_7_title'] ) ? esc_attr( $values['sponsorship_channel_7_title'][0] ) : '';
    $sponsorship_channel_7_text = isset( $values['sponsorship_channel_7_text'] ) ? esc_attr( $values['sponsorship_channel_7_text'][0] ) : '';
    $sponsorship_channel_8_logo = isset( $values['sponsorship_channel_8_logo'] ) ? esc_attr( $values['sponsorship_channel_8_logo'][0] ) : '';
    $sponsorship_channel_8_title = isset( $values['sponsorship_channel_8_title'] ) ? esc_attr( $values['sponsorship_channel_8_title'][0] ) : '';
    $sponsorship_channel_8_text = isset( $values['sponsorship_channel_8_text'] ) ? esc_attr( $values['sponsorship_channel_8_text'][0] ) : '';
        
    $sponsorship_slide_1 = isset( $values['sponsorship_slide_1'] ) ? esc_attr( $values['sponsorship_slide_1'][0] ) : '';
    $sponsorship_slide_2 = isset( $values['sponsorship_slide_2'] ) ? esc_attr( $values['sponsorship_slide_2'][0] ) : '';
    $sponsorship_slide_3 = isset( $values['sponsorship_slide_3'] ) ? esc_attr( $values['sponsorship_slide_3'][0] ) : '';
    $sponsorship_slide_4 = isset( $values['sponsorship_slide_4'] ) ? esc_attr( $values['sponsorship_slide_4'][0] ) : '';
    $sponsorship_slide_5 = isset( $values['sponsorship_slide_5'] ) ? esc_attr( $values['sponsorship_slide_5'][0] ) : '';

    $sponsorship_partner_1_image = isset( $values['sponsorship_partner_1_image'] ) ? esc_attr( $values['sponsorship_partner_1_image'][0] ) : '';
    $sponsorship_partner_1_link = isset( $values['sponsorship_partner_1_link'] ) ? esc_attr( $values['sponsorship_partner_1_link'][0] ) : '';
    $sponsorship_partner_2_image = isset( $values['sponsorship_partner_2_image'] ) ? esc_attr( $values['sponsorship_partner_2_image'][0] ) : '';
    $sponsorship_partner_2_link = isset( $values['sponsorship_partner_2_link'] ) ? esc_attr( $values['sponsorship_partner_2_link'][0] ) : '';
    $sponsorship_partner_3_image = isset( $values['sponsorship_partner_3_image'] ) ? esc_attr( $values['sponsorship_partner_3_image'][0] ) : '';
    $sponsorship_partner_3_link = isset( $values['sponsorship_partner_3_link'] ) ? esc_attr( $values['sponsorship_partner_3_link'][0] ) : '';
    $sponsorship_partner_4_image = isset( $values['sponsorship_partner_4_image'] ) ? esc_attr( $values['sponsorship_partner_4_image'][0] ) : '';
    $sponsorship_partner_4_link = isset( $values['sponsorship_partner_4_link'] ) ? esc_attr( $values['sponsorship_partner_4_link'][0] ) : '';
    $sponsorship_partner_5_image = isset( $values['sponsorship_partner_5_image'] ) ? esc_attr( $values['sponsorship_partner_5_image'][0] ) : '';
    $sponsorship_partner_5_link = isset( $values['sponsorship_partner_5_link'] ) ? esc_attr( $values['sponsorship_partner_5_link'][0] ) : '';
    $sponsorship_partner_6_image = isset( $values['sponsorship_partner_6_image'] ) ? esc_attr( $values['sponsorship_partner_6_image'][0] ) : '';
    $sponsorship_partner_6_link = isset( $values['sponsorship_partner_6_link'] ) ? esc_attr( $values['sponsorship_partner_6_link'][0] ) : '';
    $sponsorship_partner_7_image = isset( $values['sponsorship_partner_7_image'] ) ? esc_attr( $values['sponsorship_partner_7_image'][0] ) : '';
    $sponsorship_partner_7_link = isset( $values['sponsorship_partner_7_link'] ) ? esc_attr( $values['sponsorship_partner_7_link'][0] ) : '';
    $sponsorship_partner_8_image = isset( $values['sponsorship_partner_8_image'] ) ? esc_attr( $values['sponsorship_partner_8_image'][0] ) : '';
    $sponsorship_partner_8_link = isset( $values['sponsorship_partner_8_link'] ) ? esc_attr( $values['sponsorship_partner_8_link'][0] ) : '';
        
    
?>
  <!--  PANEL CONTENT   -->
 

<!-- Intro Module -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>INTRO</h3>
    <h3>Heading</h3>    
    <textarea name="sponsorship_intro_heading" id="sponsorship_intro_heading" cols="65" rows="5"><?php echo $sponsorship_intro_heading; ?></textarea>
    <hr />
    <h3>Text</h3>    
    <textarea name="sponsorship_intro_text" id="sponsorship_intro_text" cols="65" rows="10"><?php echo $sponsorship_intro_text; ?></textarea>
    <hr />
    <h3>Contact URL</h3>    
    <textarea name="sponsorship_intro_contact_url" id="sponsorship_intro_contact_url" cols="65" rows="1"><?php echo $sponsorship_intro_contact_url; ?></textarea>
</div><!-- end Cell -->

<!-- Demo Module -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>DEMOGRAPHICS</h3>
    <h3>Banner Image</h3>    
    <h4>Upload Image:</h4>
    <input id="sponsorship_demo_banner" type="text" size="36" style="max-width: 90%;" name="sponsorship_demo_banner" value="<?php echo $sponsorship_demo_banner; ?>" /> 
    <input id="upload_sponsorship_demo_banner" class="button" type="button" value="Upload Image" /> 
    <br /><em> - Recommended size of 1520px x 460px. Save as JPG, and always save for web, with minimum 60% compression.</em>
    <?php // Preview:
    if ( $sponsorship_demo_banner ) {
        echo '
            <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
            src="' . (string)$sponsorship_demo_banner . '" />
        ';
    }   
    ?>
    <!-- Logic: -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var custom_uploader;
            jQuery('#upload_sponsorship_demo_banner').click(function(e) {
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
                    jQuery('#sponsorship_demo_banner').val(attachment.url);
                });
                custom_uploader.open();
                custom_uploader.open();
            });
        });
    </script>           
    <hr />    
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Highlight 1 - Title</h3>    
        <textarea name="sponsorship_demo_highlight_1_title" id="sponsorship_demo_highlight_1_title" cols="65" rows="1"><?php echo $sponsorship_demo_highlight_1_title; ?></textarea>
        <hr />
        <h3>Highlight 1 - Text</h3>    
        <textarea name="sponsorship_demo_highlight_1_text" id="sponsorship_demo_highlight_1_text" cols="65" rows="2"><?php echo $sponsorship_demo_highlight_1_text; ?></textarea>
    </div>
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Highlight 2 - Title</h3>    
        <textarea name="sponsorship_demo_highlight_2_title" id="sponsorship_demo_highlight_2_title" cols="65" rows="1"><?php echo $sponsorship_demo_highlight_2_title; ?></textarea>
        <hr />
        <h3>Highlight 2 - Text</h3>    
        <textarea name="sponsorship_demo_highlight_2_text" id="sponsorship_demo_highlight_2_text" cols="65" rows="2"><?php echo $sponsorship_demo_highlight_2_text; ?></textarea>
    </div>
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Highlight 3 - Title</h3>    
        <textarea name="sponsorship_demo_highlight_3_title" id="sponsorship_demo_highlight_3_title" cols="65" rows="1"><?php echo $sponsorship_demo_highlight_3_title; ?></textarea>
        <hr />
        <h3>Highlight 3 - Text</h3>    
        <textarea name="sponsorship_demo_highlight_3_text" id="sponsorship_demo_highlight_3_text" cols="65" rows="2"><?php echo $sponsorship_demo_highlight_3_text; ?></textarea>
    </div>
</div><!-- end Cell -->
 

<!-- Channel Module -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>CHANNELS</h3>

    <!-- Channel 1 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 1 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_1_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_1_logo" value="<?php echo $sponsorship_channel_1_logo; ?>" /> 
        <input id="upload_sponsorship_channel_1_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_1_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_1_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_1_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_1_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 1 - Title</h3>    
        <textarea name="sponsorship_channel_1_title" id="sponsorship_channel_1_title" cols="65" rows="1"><?php echo $sponsorship_channel_1_title; ?></textarea>
        <hr />
        <h3>Channel 1 - Text</h3>    
        <textarea name="sponsorship_channel_1_text" id="sponsorship_channel_1_text" cols="65" rows="2"><?php echo $sponsorship_channel_1_text; ?></textarea>
    </div>

    <!-- Channel 2 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 2 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_2_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_2_logo" value="<?php echo $sponsorship_channel_2_logo; ?>" /> 
        <input id="upload_sponsorship_channel_2_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_2_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_2_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_2_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_2_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 2 - Title</h3>    
        <textarea name="sponsorship_channel_2_title" id="sponsorship_channel_2_title" cols="65" rows="1"><?php echo $sponsorship_channel_2_title; ?></textarea>
        <hr />
        <h3>Channel 2 - Text</h3>    
        <textarea name="sponsorship_channel_2_text" id="sponsorship_channel_2_text" cols="65" rows="2"><?php echo $sponsorship_channel_2_text; ?></textarea>
    </div>

    <!-- Channel 3 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 3 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_3_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_3_logo" value="<?php echo $sponsorship_channel_3_logo; ?>" /> 
        <input id="upload_sponsorship_channel_3_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_3_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_3_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_3_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_3_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 3 - Title</h3>    
        <textarea name="sponsorship_channel_3_title" id="sponsorship_channel_3_title" cols="65" rows="1"><?php echo $sponsorship_channel_3_title; ?></textarea>
        <hr />
        <h3>Channel 3 - Text</h3>    
        <textarea name="sponsorship_channel_3_text" id="sponsorship_channel_3_text" cols="65" rows="2"><?php echo $sponsorship_channel_3_text; ?></textarea>
    </div>

    <!-- Channel 4 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 4 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_4_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_4_logo" value="<?php echo $sponsorship_channel_4_logo; ?>" /> 
        <input id="upload_sponsorship_channel_4_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_4_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_4_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_4_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_4_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 4 - Title</h3>    
        <textarea name="sponsorship_channel_4_title" id="sponsorship_channel_4_title" cols="65" rows="1"><?php echo $sponsorship_channel_4_title; ?></textarea>
        <hr />
        <h3>Channel 4 - Text</h3>    
        <textarea name="sponsorship_channel_4_text" id="sponsorship_channel_4_text" cols="65" rows="2"><?php echo $sponsorship_channel_4_text; ?></textarea>
    </div>

    <!-- Channel 5 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 5 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_5_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_5_logo" value="<?php echo $sponsorship_channel_5_logo; ?>" /> 
        <input id="upload_sponsorship_channel_5_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_5_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_5_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_5_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_5_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 5 - Title</h3>    
        <textarea name="sponsorship_channel_5_title" id="sponsorship_channel_5_title" cols="65" rows="1"><?php echo $sponsorship_channel_5_title; ?></textarea>
        <hr />
        <h3>Channel 5 - Text</h3>    
        <textarea name="sponsorship_channel_5_text" id="sponsorship_channel_5_text" cols="65" rows="2"><?php echo $sponsorship_channel_5_text; ?></textarea>
    </div>

    <!-- Channel 6 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 6 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_6_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_6_logo" value="<?php echo $sponsorship_channel_6_logo; ?>" /> 
        <input id="upload_sponsorship_channel_6_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_6_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_6_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_6_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_6_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 6 - Title</h3>    
        <textarea name="sponsorship_channel_6_title" id="sponsorship_channel_6_title" cols="65" rows="1"><?php echo $sponsorship_channel_6_title; ?></textarea>
        <hr />
        <h3>Channel 6 - Text</h3>    
        <textarea name="sponsorship_channel_6_text" id="sponsorship_channel_6_text" cols="65" rows="2"><?php echo $sponsorship_channel_6_text; ?></textarea>
    </div>

    <!-- Channel 7 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 7 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_7_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_7_logo" value="<?php echo $sponsorship_channel_7_logo; ?>" /> 
        <input id="upload_sponsorship_channel_7_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_7_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_7_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_7_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_7_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 7 - Title</h3>    
        <textarea name="sponsorship_channel_7_title" id="sponsorship_channel_7_title" cols="65" rows="1"><?php echo $sponsorship_channel_7_title; ?></textarea>
        <hr />
        <h3>Channel 7 - Text</h3>    
        <textarea name="sponsorship_channel_7_text" id="sponsorship_channel_7_text" cols="65" rows="2"><?php echo $sponsorship_channel_7_text; ?></textarea>
    </div>

    <!-- Channel 8 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Channel 8 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_channel_8_logo" type="text" size="36" style="max-width: 90%;" name="sponsorship_channel_8_logo" value="<?php echo $sponsorship_channel_8_logo; ?>" /> 
        <input id="upload_sponsorship_channel_8_logo" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 160px x 160px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_channel_8_logo ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_channel_8_logo . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_channel_8_logo').click(function(e) {
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
                        jQuery('#sponsorship_channel_8_logo').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Channel 8 - Title</h3>    
        <textarea name="sponsorship_channel_8_title" id="sponsorship_channel_8_title" cols="65" rows="1"><?php echo $sponsorship_channel_8_title; ?></textarea>
        <hr />
        <h3>Channel 8 - Text</h3>    
        <textarea name="sponsorship_channel_8_text" id="sponsorship_channel_8_text" cols="65" rows="2"><?php echo $sponsorship_channel_8_text; ?></textarea>
    </div>
    
</div><!-- end Cell -->
 


<!-- Slideshow Module -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>SLIDES</h3>
    <!-- Slide 1 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Slide 1 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_slide_1" type="text" size="36" style="max-width: 90%;" name="sponsorship_slide_1" value="<?php echo $sponsorship_slide_1; ?>" /> 
        <input id="upload_sponsorship_slide_1" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 1500px x 800px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_slide_1 ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_slide_1 . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_slide_1').click(function(e) {
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
                        jQuery('#sponsorship_slide_1').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>         
    </div><!-- cell -->            
    <!-- Slide 2 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Slide 2 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_slide_2" type="text" size="36" style="max-width: 90%;" name="sponsorship_slide_2" value="<?php echo $sponsorship_slide_2; ?>" /> 
        <input id="upload_sponsorship_slide_2" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 1500px x 800px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_slide_2 ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_slide_2 . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_slide_2').click(function(e) {
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
                        jQuery('#sponsorship_slide_2').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
    </div><!-- cell -->     
    <!-- Slide 3 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Slide 3 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_slide_3" type="text" size="36" style="max-width: 90%;" name="sponsorship_slide_3" value="<?php echo $sponsorship_slide_3; ?>" /> 
        <input id="upload_sponsorship_slide_3" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 1500px x 800px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_slide_3 ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_slide_3 . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_slide_3').click(function(e) {
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
                        jQuery('#sponsorship_slide_3').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
    </div><!-- cell -->
    <!-- Slide 4 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Slide 4 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_slide_4" type="text" size="36" style="max-width: 90%;" name="sponsorship_slide_4" value="<?php echo $sponsorship_slide_4; ?>" /> 
        <input id="upload_sponsorship_slide_4" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 1500px x 800px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_slide_4 ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_slide_4 . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_slide_4').click(function(e) {
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
                        jQuery('#sponsorship_slide_4').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
    </div><!-- cell -->
    <!-- Slide 5 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Slide 5 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_slide_5" type="text" size="36" style="max-width: 90%;" name="sponsorship_slide_5" value="<?php echo $sponsorship_slide_5; ?>" /> 
        <input id="upload_sponsorship_slide_5" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 1500px x 800px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_slide_5 ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_slide_5 . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_slide_5').click(function(e) {
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
                        jQuery('#sponsorship_slide_5').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script> 
    </div>          
</div><!-- SLIDES -->




<!-- Partners Module -->
<div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3>PARTNERS</h3>

    <!-- Partner 1 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 1 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_1_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_1_image" value="<?php echo $sponsorship_partner_1_image; ?>" /> 
        <input id="upload_sponsorship_partner_1_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 125px. Any proportion image will work, but keep widths under 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_1_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_1_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_1_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_1_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 1 -  link</h3>    
        <textarea name="sponsorship_partner_1_link" id="sponsorship_partner_1_link" cols="65" rows="1"><?php echo $sponsorship_partner_1_link; ?></textarea>
    </div>

    <!-- Partner 2 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 2 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_2_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_2_image" value="<?php echo $sponsorship_partner_2_image; ?>" /> 
        <input id="upload_sponsorship_partner_2_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 125px. Any proportion image will work, but keep widths under 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_2_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_2_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_2_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_2_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 2 -  link</h3>    
        <textarea name="sponsorship_partner_2_link" id="sponsorship_partner_2_link" cols="65" rows="1"><?php echo $sponsorship_partner_2_link; ?></textarea>
    </div>

    <!-- Partner 3 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 3 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_3_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_3_image" value="<?php echo $sponsorship_partner_3_image; ?>" /> 
        <input id="upload_sponsorship_partner_3_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 125px. Any proportion image will work, but keep widths under 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_3_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_3_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_3_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_3_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 3 -  link</h3>    
        <textarea name="sponsorship_partner_3_link" id="sponsorship_partner_3_link" cols="65" rows="1"><?php echo $sponsorship_partner_3_link; ?></textarea>
    </div>

    <!-- Partner 4 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 4 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_4_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_4_image" value="<?php echo $sponsorship_partner_4_image; ?>" /> 
        <input id="upload_sponsorship_partner_4_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 125px. Any proportion image will work, but keep widths under 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_4_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_4_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_4_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_4_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 4 -  link</h3>    
        <textarea name="sponsorship_partner_4_link" id="sponsorship_partner_4_link" cols="65" rows="1"><?php echo $sponsorship_partner_4_link; ?></textarea>
    </div>

    <!-- Partner 5 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 5 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_5_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_5_image" value="<?php echo $sponsorship_partner_5_image; ?>" /> 
        <input id="upload_sponsorship_partner_5_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 125px. Any proportion image will work, but keep widths under 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_5_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_5_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_5_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_5_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 5 -  link</h3>    
        <textarea name="sponsorship_partner_5_link" id="sponsorship_partner_5_link" cols="65" rows="1"><?php echo $sponsorship_partner_5_link; ?></textarea>
    </div>

    <!-- Partner 6 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 6 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_6_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_6_image" value="<?php echo $sponsorship_partner_6_image; ?>" /> 
        <input id="upload_sponsorship_partner_6_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_6_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_6_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_6_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_6_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 6 -  link</h3>    
        <textarea name="sponsorship_partner_6_link" id="sponsorship_partner_6_link" cols="65" rows="1"><?php echo $sponsorship_partner_6_link; ?></textarea>
    </div>

    <!-- Partner 7 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 7 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_7_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_7_image" value="<?php echo $sponsorship_partner_7_image; ?>" /> 
        <input id="upload_sponsorship_partner_7_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_7_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_7_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_7_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_7_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 7 -  link</h3>    
        <textarea name="sponsorship_partner_7_link" id="sponsorship_partner_7_link" cols="65" rows="1"><?php echo $sponsorship_partner_7_link; ?></textarea>
    </div>

    <!-- Partner 8 -->
    <div style="padding: 2% 4%; background: #f7f7f9; margin: 2px 0 20px;">
        <h3>Partner 8 - Image</h3>    
        <h4>Upload Image:</h4>
        <input id="sponsorship_partner_8_image" type="text" size="36" style="max-width: 90%;" name="sponsorship_partner_8_image" value="<?php echo $sponsorship_partner_8_image; ?>" /> 
        <input id="upload_sponsorship_partner_8_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 300px x 300px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $sponsorship_partner_8_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$sponsorship_partner_8_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_sponsorship_partner_8_image').click(function(e) {
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
                        jQuery('#sponsorship_partner_8_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />    
        <h3>Partner 8 -  link</h3>    
        <textarea name="sponsorship_partner_8_link" id="sponsorship_partner_8_link" cols="65" rows="1"><?php echo $sponsorship_partner_8_link; ?></textarea>
    </div>

</div><!-- PARTNERS -->



  <?php     
}

// SAVE
add_action( 'save_post', 'sponsorship_meta_box_save' );
function sponsorship_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;


    if ( isset($_POST['sponsorship_intro_heading']) ) {
        update_post_meta( $post_id, 'sponsorship_intro_heading', $_POST['sponsorship_intro_heading'] );
    }

    if ( isset($_POST['sponsorship_intro_text']) ) {
        update_post_meta( $post_id, 'sponsorship_intro_text', $_POST['sponsorship_intro_text'] );
    }

    if ( isset($_POST['sponsorship_intro_contact_url']) ) {
        update_post_meta( $post_id, 'sponsorship_intro_contact_url', $_POST['sponsorship_intro_contact_url'] );
    }

    if ( isset($_POST['sponsorship_demo_banner']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_banner', $_POST['sponsorship_demo_banner'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_1_title']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_1_title', $_POST['sponsorship_demo_highlight_1_title'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_1_text']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_1_text', $_POST['sponsorship_demo_highlight_1_text'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_2_title']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_2_title', $_POST['sponsorship_demo_highlight_2_title'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_2_text']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_2_text', $_POST['sponsorship_demo_highlight_2_text'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_3_title']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_3_title', $_POST['sponsorship_demo_highlight_3_title'] );
    }

    if ( isset($_POST['sponsorship_demo_highlight_3_text']) ) {
        update_post_meta( $post_id, 'sponsorship_demo_highlight_3_text', $_POST['sponsorship_demo_highlight_3_text'] );
    }

    if ( isset($_POST['sponsorship_channel_1_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_1_logo', $_POST['sponsorship_channel_1_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_1_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_1_title', $_POST['sponsorship_channel_1_title'] );
    }

    if ( isset($_POST['sponsorship_channel_1_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_1_text', $_POST['sponsorship_channel_1_text'] );
    }

    if ( isset($_POST['sponsorship_channel_2_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_2_logo', $_POST['sponsorship_channel_2_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_2_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_2_title', $_POST['sponsorship_channel_2_title'] );
    }

    if ( isset($_POST['sponsorship_channel_2_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_2_text', $_POST['sponsorship_channel_2_text'] );
    }

    if ( isset($_POST['sponsorship_channel_3_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_3_logo', $_POST['sponsorship_channel_3_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_3_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_3_title', $_POST['sponsorship_channel_3_title'] );
    }

    if ( isset($_POST['sponsorship_channel_3_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_3_text', $_POST['sponsorship_channel_3_text'] );
    }

    if ( isset($_POST['sponsorship_channel_3_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_3_text', $_POST['sponsorship_channel_3_text'] );
    }

    if ( isset($_POST['sponsorship_channel_4_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_4_logo', $_POST['sponsorship_channel_4_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_4_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_4_title', $_POST['sponsorship_channel_4_title'] );
    }

    if ( isset($_POST['sponsorship_channel_4_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_4_text', $_POST['sponsorship_channel_4_text'] );
    }

    if ( isset($_POST['sponsorship_channel_5_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_5_logo', $_POST['sponsorship_channel_5_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_5_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_5_title', $_POST['sponsorship_channel_5_title'] );
    }

    if ( isset($_POST['sponsorship_channel_5_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_5_text', $_POST['sponsorship_channel_5_text'] );
    }

    if ( isset($_POST['sponsorship_channel_6_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_6_logo', $_POST['sponsorship_channel_6_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_6_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_6_title', $_POST['sponsorship_channel_6_title'] );
    }

    if ( isset($_POST['sponsorship_channel_6_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_6_text', $_POST['sponsorship_channel_6_text'] );
    }

    if ( isset($_POST['sponsorship_channel_7_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_7_logo', $_POST['sponsorship_channel_7_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_7_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_7_title', $_POST['sponsorship_channel_7_title'] );
    }

    if ( isset($_POST['sponsorship_channel_7_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_7_text', $_POST['sponsorship_channel_7_text'] );
    }

    if ( isset($_POST['sponsorship_channel_8_logo']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_8_logo', $_POST['sponsorship_channel_8_logo'] );
    }

    if ( isset($_POST['sponsorship_channel_8_title']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_8_title', $_POST['sponsorship_channel_8_title'] );
    }

    if ( isset($_POST['sponsorship_channel_8_text']) ) {
        update_post_meta( $post_id, 'sponsorship_channel_8_text', $_POST['sponsorship_channel_8_text'] );
    }

    if ( isset($_POST['sponsorship_slide_1']) ) {
        update_post_meta( $post_id, 'sponsorship_slide_1', $_POST['sponsorship_slide_1'] );
    }

    if ( isset($_POST['sponsorship_slide_2']) ) {
        update_post_meta( $post_id, 'sponsorship_slide_2', $_POST['sponsorship_slide_2'] );
    }

    if ( isset($_POST['sponsorship_slide_3']) ) {
        update_post_meta( $post_id, 'sponsorship_slide_3', $_POST['sponsorship_slide_3'] );
    }

    if ( isset($_POST['sponsorship_slide_4']) ) {
        update_post_meta( $post_id, 'sponsorship_slide_4', $_POST['sponsorship_slide_4'] );
    }

    if ( isset($_POST['sponsorship_slide_5']) ) {
        update_post_meta( $post_id, 'sponsorship_slide_5', $_POST['sponsorship_slide_5'] );
    }

    if ( isset($_POST['sponsorship_partner_1_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_1_image', $_POST['sponsorship_partner_1_image'] );
    }

    if ( isset($_POST['sponsorship_partner_1_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_1_link', $_POST['sponsorship_partner_1_link'] );
    }

    if ( isset($_POST['sponsorship_partner_2_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_2_image', $_POST['sponsorship_partner_2_image'] );
    }

    if ( isset($_POST['sponsorship_partner_2_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_2_link', $_POST['sponsorship_partner_2_link'] );
    }

    if ( isset($_POST['sponsorship_partner_3_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_3_image', $_POST['sponsorship_partner_3_image'] );
    }

    if ( isset($_POST['sponsorship_partner_3_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_3_link', $_POST['sponsorship_partner_3_link'] );
    }

    if ( isset($_POST['sponsorship_partner_4_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_4_image', $_POST['sponsorship_partner_4_image'] );
    }

    if ( isset($_POST['sponsorship_partner_4_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_4_link', $_POST['sponsorship_partner_4_link'] );
    }

    if ( isset($_POST['sponsorship_partner_5_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_5_image', $_POST['sponsorship_partner_5_image'] );
    }

    if ( isset($_POST['sponsorship_partner_5_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_5_link', $_POST['sponsorship_partner_5_link'] );
    }

    if ( isset($_POST['sponsorship_partner_5_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_5_link', $_POST['sponsorship_partner_5_link'] );
    }

    if ( isset($_POST['sponsorship_partner_6_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_6_image', $_POST['sponsorship_partner_6_image'] );
    }

    if ( isset($_POST['sponsorship_partner_6_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_6_link', $_POST['sponsorship_partner_6_link'] );
    }

    if ( isset($_POST['sponsorship_partner_7_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_7_image', $_POST['sponsorship_partner_7_image'] );
    }

    if ( isset($_POST['sponsorship_partner_7_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_7_link', $_POST['sponsorship_partner_7_link'] );
    }

    if ( isset($_POST['sponsorship_partner_8_image']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_8_image', $_POST['sponsorship_partner_8_image'] );
    }

    if ( isset($_POST['sponsorship_partner_8_link']) ) {
        update_post_meta( $post_id, 'sponsorship_partner_8_link', $_POST['sponsorship_partner_8_link'] );
    }

    
}


