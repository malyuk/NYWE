
<?php 
// set a max file size for the html upload form 
$max_file_size = 9000000; //  size in bytes 
?>

        <form id="submit_profile_form" method="post" action="<?php echo get_template_directory_uri(); ?>/library/leandroarts_wufoo_controller/create_profile.php" enctype="multipart/form-data">

            <!-- profile_title -->       
            <h4 style="margin: 2% 0;">Company Name</h4>
            <input type="text" value="My sample Company profile name inc." name="profile_title" id="profile_title" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>

            <!-- profile_website_url -->       
            <h4 style="margin: 2% 0;">Website URL</h4>
            <input type="text" value="http://www.mywebsite.com" name="profile_website_url" id="profile_website_url" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>

            <!-- Featured Image -->
            <h4 style="margin: 2% 0;">Featured Image</h4>
           <p>For best results, upload images 800px x 600px in JPEG format.</p>
           <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">             
           <input id="profile_image" type="file" name="profile_image"> 


            <!-- Description -->
            <h4 style="margin: 2% 0;">Profile Description</h4>
            <?php
            $profile_mytext_var="Your profile description"; // this var may contain previous data that was stored in mysql.
            wp_editor($profile_mytext_var,"profile_description", array('textarea_rows'=>12, 'editor_class'=>'profile_description_class', 'media_buttons' => false));
            ?>        


            <button id="profile_submit_button" type="submit" name="btnevent" class="button" style="                    
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
                jQuery('#profile_submit_button').click(
                    function(e){
                        e.preventDefault();
                        if (jQuery('#profile_image').get(0).files.length === 0) {
                            alert('Profile Image file is required');
                        }                        
                        else{
                            jQuery('#profile_submit_button').unbind('click').click();
                        }
                    }
                );
            });
            </script>


            <p style="background: lightcyan; padding: .25em 1em;"><e>Upon submission, a draft profile will be created and an Administrator will review before publishing.</e></p>

        </form>
