<?php

/* GALLERY POST
====================== */

function gallery_post() { 

  register_post_type( 'gallery', 
    array('labels' => array(
      'name' => __('Gallery', 'post type general name'),
      'singular_name' => __('Item Post', 'post type singular name'),
      'add_new' => __('Add New', 'custom post type item'), 
      'add_new_item' => __('Add New item'), 
      'edit' => __( 'Edit' ), 
      'edit_item' => __('Edit item'),
      'new_item' => __('New item'), 
      'view_item' => __('View item'),
      'search_items' => __('Search items'), 
      'not_found' =>  __('Nothing found in the Database.'),  
      'not_found_in_trash' => __('Nothing found in Trash'), 
      'parent_item_colon' => ''
      ), 
      'description' => __( 'This is a custom post type' ),
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */ 
      'menu_icon' => get_stylesheet_directory_uri() . '/post-types/images/custom-post-icon.png', 
      'rewrite' => true,
      'hierarchical' => false,
      'has_archive' => true,
      'capability_type' => array('admin' , 'admins' ), // 'capability_type' => 'post',
      'map_meta_cap' => true,      
      /* 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky') */
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
    ) /* end of options */
  ); /* end of register post type */
  
} 

  // adding the function to the Wordpress init
  add_action( 'init', 'gallery_post');


// ===========================
// v4 GALLERY MODULE
// =========================== 
// REGISTER:
add_action( 'add_meta_boxes', 'gallery_meta_box_add' );
// CONFIG:
function gallery_meta_box_add() { 
  add_meta_box( 'gallery-id', 'Gallery', 'gallery_meta_box_cb', 'gallery', 'normal', 'high' );
} 

// ALLOW MULTI FILE: 
// (I believe this conflicts because it has been previously loaded in the them..)
// function update_edit_form() { echo ' enctype="multipart/form-data"'; } add_action('post_edit_form_tag', 'update_edit_form'); 

// v4 META BOX
function gallery_meta_box_cb( $post ) {

    // Config:
    add_action('admin_enqueue_scripts', 'media_uploader');
    function media_uploader() {
        wp_enqueue_media();
    }   
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );        
    $values = get_post_custom( $post->ID );

    // Values:
    $gallerySlide_1 = isset($values['gallerySlide_1']) ? esc_attr($values['gallerySlide_1'][0]) : '';
    $gallerySlide_2 = isset($values['gallerySlide_2']) ? esc_attr($values['gallerySlide_2'][0]) : '';
    $gallerySlide_3 = isset($values['gallerySlide_3']) ? esc_attr($values['gallerySlide_3'][0]) : '';
    $gallerySlide_4 = isset($values['gallerySlide_4']) ? esc_attr($values['gallerySlide_4'][0]) : '';
    $gallerySlide_5 = isset($values['gallerySlide_5']) ? esc_attr($values['gallerySlide_5'][0]) : '';
    
    $gallery_video = isset($values['gallery_video']) ? esc_attr($values['gallery_video'][0]) : '';


  
  
  // =========================== 
  //  DISPLAY: 
  // ===========================
  ?>
   

    <!-- FEATURED IMAGE -->
    <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
        <h3>FEATURED IMAGE</h3>
        <p>
            Use the Wordpress default Featured Image functionality. Images should all be a consistent height for best results. Any size will work, 480px x 250px is the recommended size as per design. ** Always ** optimize for web when saving and use JPG format. 
        </p>
    </div>


    <!-- SLIDES -->
    <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
        <h3>SLIDES</h3>
        <h3>Slide 1</h3>
        <input id="gallerySlide_1" type="text" size="36" style="max-width: 90%;" name="gallerySlide_1" value="<?php echo $gallerySlide_1; ?>" /> 
        <input id="upload_gallerySlide_1" class="button" type="button" value="Upload Image" />	
        <br /><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web (minimum 60% compression).</em>
        <!-- Preview: -->
        <?php 
        if ( $gallerySlide_1 ) {
        echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$gallerySlide_1 . '" />';
        }	
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_gallerySlide_1').click(function(e) {
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
                        jQuery('#gallerySlide_1').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>       
        <hr />
        <h3>Slide 2</h3>
        <input id="gallerySlide_2" type="text" size="36" style="max-width: 90%;" name="gallerySlide_2" value="<?php echo $gallerySlide_2; ?>" /> 
        <input id="upload_gallerySlide_2" class="button" type="button" value="Upload Image" />	
        <br /><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web (minimum 60% compression).</em>
        <!-- Preview: -->
        <?php 
        if ( $gallerySlide_2 ) {
        echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$gallerySlide_2 . '" />';
        }	
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_gallerySlide_2').click(function(e) {
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
                        jQuery('#gallerySlide_2').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>       
        <hr />
        <h3>Slide 3</h3>
        <input id="gallerySlide_3" type="text" size="36" style="max-width: 90%;" name="gallerySlide_3" value="<?php echo $gallerySlide_3; ?>" /> 
        <input id="upload_gallerySlide_3" class="button" type="button" value="Upload Image" />	
        <br /><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web (minimum 60% compression).</em>
        <!-- Preview: -->
        <?php 
        if ( $gallerySlide_3 ) {
        echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$gallerySlide_3 . '" />';
        }	
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_gallerySlide_3').click(function(e) {
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
                        jQuery('#gallerySlide_3').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>       
        <hr />
        <h3>Slide 4</h3>
        <input id="gallerySlide_4" type="text" size="36" style="max-width: 90%;" name="gallerySlide_4" value="<?php echo $gallerySlide_4; ?>" /> 
        <input id="upload_gallerySlide_4" class="button" type="button" value="Upload Image" />	
        <br /><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web (minimum 60% compression).</em>
        <!-- Preview: -->
        <?php 
        if ( $gallerySlide_4 ) {
        echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$gallerySlide_4 . '" />';
        }	
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_gallerySlide_4').click(function(e) {
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
                        jQuery('#gallerySlide_4').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>       
        <hr />
        <h3>Slide 5</h3>
        <input id="gallerySlide_5" type="text" size="36" style="max-width: 90%;" name="gallerySlide_5" value="<?php echo $gallerySlide_5; ?>" /> 
        <input id="upload_gallerySlide_5" class="button" type="button" value="Upload Image" />	
        <br /><em> - Recommended image size of 1500x 800 pixels. Save as JPG image, ** Always ** Optimize for web (minimum 60% compression).</em>
        <!-- Preview: -->
        <?php 
        if ( $gallerySlide_5 ) {
        echo '<img  style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" src="' . (string)$gallerySlide_5 . '" />';
        }	
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_gallerySlide_5').click(function(e) {
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
                        jQuery('#gallerySlide_5').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>       
    </div>
    <!-- slides -->



    <!-- VIDEO EMBED -->
    <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
        <h3>VIDEO EMBED</h3>
        <textarea name="gallery_video" id="gallery_video" cols="65" rows="8"><?php echo $gallery_video; ?></textarea>
        <br /><em> - Paste your video embed code here. 
        <br /> - For best results size videos to 1280px x 670px. Sample:
        <br />&lt;iframe width="1280" height="670" src="https://www.youtube.com/embed/HM2i8WkI2uQ?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen&gt;&lt;/iframe&gt;</em>
    </div>
    <!-- video -->


      

  <?php // end Display


} // end Metabox




// ------------------------
// v4 SAVE:
// ------------------------

add_action( 'save_post', 'gallery_meta_box_save' );
function gallery_meta_box_save( $post_id ) {
  // Setup:
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !isset($_POST['meta_box_nonce']) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
  if( !current_user_can( 'edit_post' ) ) return;

/*
  // Save:
  $chk = ( isset($_POST['eventSoldout']) && $_POST['eventSoldout'] ) ? 'on' : 'off';
  update_post_meta( $post_id, 'eventSoldout', $chk );  
*/

  if ( isset($_POST['gallery_video']) ) {
    update_post_meta( $post_id, 'gallery_video', $_POST['gallery_video'] );
  }

  if ( isset($_POST['gallerySlide_1']) ) {
    update_post_meta( $post_id, 'gallerySlide_1', $_POST['gallerySlide_1'] );
  }

  if ( isset($_POST['gallerySlide_2']) ) {
    update_post_meta( $post_id, 'gallerySlide_2', $_POST['gallerySlide_2'] );
  }

  if ( isset($_POST['gallerySlide_3']) ) {
    update_post_meta( $post_id, 'gallerySlide_3', $_POST['gallerySlide_3'] );
  }

  if ( isset($_POST['gallerySlide_4']) ) {
    update_post_meta( $post_id, 'gallerySlide_4', $_POST['gallerySlide_4'] );
  }

  if ( isset($_POST['gallerySlide_5']) ) {
    update_post_meta( $post_id, 'gallerySlide_5', $_POST['gallerySlide_5'] );
  }


} // end Save
