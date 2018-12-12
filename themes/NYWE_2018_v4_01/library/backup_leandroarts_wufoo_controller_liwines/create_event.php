<?php

// -------------------------
// CREATE DRAFT EVENT
// -------------------------
// Notes: https://developer.wordpress.org/reference/functions/wp_insert_post/
// https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/

function leandroarts_create_post() {

    // ------------------------------
    // LOAD WORDPRESS FUNCTIONS:
    // ------------------------------
    require_once("../../../../../wp-load.php");


    // ------------------------------
    // IF LOGGED IN:
    // ------------------------------
    if ( is_user_logged_in() ) {


        // ------------------------------
        //  VALUES:
        // ------------------------------        
        // Form:
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $event_time = $_POST['event_time'];
        $event_time_end = $_POST['event_time_end'];
        $event_place = $_POST['event_place'];
        $event_ticket_url = $_POST['event_ticket_url'];
        $event_description = $_POST['event_description'];
        $event_image = $_POST['event_image'];
        $event_video = $_POST['event_video'];
        // Wordpress 
        $author_id = $current_user->ID;
        $title = $event_name;
        $content = $event_description;
        

        // Handle Image uploads and featured image assign:
        // https://voodoopress.com/including-images-as-attachments-or-featured-image-in-post-from-front-end-form/
        function insert_attachment($file_handler,$post_id,$setthumb='false') {
            // check to make sure its a successful upload
            if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            require_once(ABSPATH . "wp-admin" . '/includes/file.php');
            require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            $attach_id = media_handle_upload( $file_handler, $post_id );
            if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
            return $attach_id;
        }
        $pid = wp_insert_post(
            array(
                'comment_status'	=>	'closed',
                'ping_status'		=>	'closed',
                'post_author'		=>	$author_id,
                'post_title'		=>	$title,
                'post_content'  	=> 	$content,
                'post_status'		=>	'draft',  // publish
                'post_type'			=>	'LIWC-events',
                'meta_input' => array(
                    'event_date' => $event_date,
                    'event_time' => $event_time,
                    'event_time_end' => $event_time_end,
                    'event_place' => $event_place,
                    'event_ticket_url' => $event_ticket_url,
                    'event_video' => $event_video
                )
            )
        );	
        if ($_FILES) {
            foreach ($_FILES as $file => $array) {
                $newupload = insert_attachment($file,$pid);
                // $newupload returns the attachment id of the file that
                // was just uploaded. Do whatever you want with that now.
                if ( $newupload == false ) {
                    header("Location: http://liwines.wpengine.com/member-dashboard/?display=errorfile");
                    exit();                        
                }    
            }
        } 


        // ---------------------------------------------
        // REDIRECT:
        // ---------------------------------------------             
            header("Location: http://liwines.wpengine.com/member-dashboard/?display=created");
            exit();    
        // end Redirect

    }

} // end function

leandroarts_create_post();

