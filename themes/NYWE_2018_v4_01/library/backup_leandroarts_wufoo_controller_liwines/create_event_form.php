<?php 
// set a max file size for the html upload form 
$max_file_size = 9000000; //  size in bytes 
?>

        <form id="submit_event_form" method="post" action="<?php echo get_template_directory_uri(); ?>/library/leandroarts_wufoo_controller/create_event.php" enctype="multipart/form-data">
            
            <h4 style="margin: 2% 0;">Event Name</h4>
            <input type="text" value="My sample event name" name="event_name" id="event_name" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>
            
            <h4 style="margin: 2% 0;">Event Date</h4>
            <input type="text" value="November 13th, 2018" name="event_date" id="event_date" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>
            
            <script>
                jQuery(function() {
                    jQuery("#event_date").datepicker();
                });
            </script>

            <h4 style="margin: 2% 0;">Event Time (START)</h4>
            <input type="text" value="7:00 pm" name="event_time" id="event_time" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>


            <h4 style="margin: 2% 0;">Event Time (END)</h4>
            <input type="text" value="10:00 pm" name="event_time_end" id="event_time_end" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>


            <h4 style="margin: 2% 0;">Event Location</h4>
            <input type="text" value="Manhattan" name="event_place" id="event_place" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>                  
            
            <h4 style="margin: 2% 0;">Event Ticket URL</h4>
            <input type="text" value="http://www.myticketurl.com" name="event_ticket_url" id="event_ticket_url" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>            
            
            <h4 style="margin: 2% 0;">Event Description</h4>
            <?php
            $mytext_var="Your event description"; // this var may contain previous data that was stored in mysql.
            wp_editor($mytext_var,"event_description", array('textarea_rows'=>12, 'editor_class'=>'event_description_class', 'media_buttons' => false));
            ?>        

           <h4 style="margin: 2% 0;">Event Featured Image</h4>
           <p>For best results, upload images 800px x 600px in JPEG format.</p>
           <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">             
           <input id="event_image" type="file" name="event_image"> 


           <h4 style="margin: 2% 0;">Event Video</h4>
           <p>Optional - paste your event video embed code</p>
            <textarea rows="4" cols="50" name="event_video" id="event_video"
            style="padding: 1% 2%; width: 80%; height: auto; font-weight: bold; font-size: 1.25em; color: #2e6091;"></textarea>


            <button id="submit_button" type="submit" name="btnevent" class="button" style="                    
                clear: both;
                display: block;
                margin: 20px 0px;
                padding: 1.55% 3%;
                background: #326094;
                color: #fff;
                font-weight: bold;
                text-transform: uppercase;
                border: none;
                border-radius: 6px;
                ">Submit
            </button>

            <script>
            // VALIDATE:
            jQuery(function(){
                jQuery('#submit_button').click(
                    function(e){
                        e.preventDefault();
                        if (jQuery('#event_image').get(0).files.length === 0) {
                            alert('Event Image file is required');
                        }                        
                        else{
                            jQuery('#submit_button').unbind('click').click();
                        }
                    }
                );
            });
            </script>


            <p style="background: lightcyan; padding: .25em 1em;"><e>Upon submission, a draft event will be created and an Administrator will review before publishing.</e></p>

        </form>

