<?php
/*
Template Name: leandroarts-member-portal
*/
?>

<?php get_header('global'); ?>

<div style="margin: 0px auto 20px; width: 100%; overflow: hidden; background: #fafafa; display: block; float: left; clear: both; padding: 2% 10%;">
    <div style="margin: 4% auto 8%; width: 100%; overflow: hidden; background: #fff; display: block; float: left; clear: both; padding: 2% 0%;">

        <!-- LOGGED IN -->
        <?php if ( is_user_logged_in() ) : ?>


            <!-- ALERTS -->
            <div style="margin: 10px auto 40px;">            
                <?php 
                $alert = $_GET['display'];
                if ( $alert == 'created' ) {
                    echo '<p style="padding: 2em;
                                    background: #316094;
                                    font-weight: bold;
                                    color: #fff;">Your New Event has been submitted for review.</p>';
                }
                if ( $alert == 'created2' ) {
                    echo '<p style="padding: 2em;
                                    background: #d8b98b;
                                    font-weight: bold;
                                    color: #fff;">Your New Profile has been submitted for review.</p>';
                }
                if ( $alert == 'errorfile' ) {
                    echo '<p style="padding: 2em;
                                    background: red;
                                    font-weight: bold;
                                    color: #fff;">There was an error uploading your image. Please make sure to include one on submission, and to upload images close to the suggested size of 800px x 600px, in JPEG or PNG format.</p>';
                }                
                ?>
            </div>


            <!-- INTRO -->
            <div style="margin: 10px auto 40px;">            
                <?php
                // Setup:
                $current_user = wp_get_current_user(); 
                ?>
                <h3>Welcome <?php echo $current_user->user_login; ?></h3>                
                <?php
                // Premium:
                if ( $current_user->member == 'yes' ) {
                    echo '<h4 style="color: #eab75f;">You are a PREMIUM MEMBER</h4>';
                    echo '<p style="margin: 10px auto 40px;">Unlimited Event submissions.</p>';
                    echo '<h4>Usage Stats</h4>';
                    // Event Totals:
                    $events_query = new WP_Query( array( 'post_type' => 'LIWC-events' , 'author' => $current_user->ID ));
                    $events_myCount = $events_query->found_posts;                
                    echo '<p>Number of Events published: <strong>' . $events_myCount . '</strong></p>';
                    // Profile Totals:
                    echo '<p>Number of Profiles published: <strong>' . count_user_posts( $current_user->ID , "profile" ) . '</strong></p>';
                }          
                // Affiliate:     
                else {
                    // BASIC or ENHANCED?
                    if ( $current_user->gate == '1' ) {
                        echo '<h4 style="color: #eab75f;">You are an AFFILIATE MEMBER - Basic</h4>';                        
                        echo '<p style="margin: 10px auto 40px;">You can Create a Profile Listing on LIWines.com<br/>'; 
                        echo 'You are entitled to posting 2 Events annually on LIWines.com</p>';                   
                    }
                    if ( $current_user->gate == '12' ) {
                        echo '<h4 style="color: #eab75f;">You are an AFFILIATE MEMBER - Enhanced</h4>';
                        echo '<p style="margin: 10px auto 40px;">You can Create a featured Profile Listing on LIWines.com<br/>'; 
                        echo 'You are entitled to posting 5 Events annually on LIWines.com</p>';                        
                    }                    
                    echo '<h4>Usage Stats</h4>';
                    // Event Totals:
                    $events_query = new WP_Query( array( 'post_type' => 'LIWC-events' , 'author' => $current_user->ID ));
                    $events_myCount = $events_query->found_posts;                
                    echo '<p>Number of Events published: <strong>' . $events_myCount . '</strong></p>';
                    // Profile Totals:
                    echo '<p>Number of Profiles published: <strong>' . count_user_posts( $current_user->ID , "profile" ) . '</strong></p>';                    
                }
                // Return Totals:
                $events_count = $events_myCount;
                $profiles_count =  count_user_posts( $current_user->ID , "profile" );                
                ?>
                <p style="margin: 10px auto 40px; color: #f3f3f3;">
                    Category = <?php echo $current_user->category; ?> 
                </p>
            </div>

            <hr />

            <!-- CREATE A PROFILE -->
            <div style="margin: 10px auto 40px;">                
                <?php
                // Threshold:
                if ( $profiles_count >= 1 ) {
                    echo '<h3 style="color: gray;">Limit Reached - Create a Profile</h3>'; 
                }
                else {
                    echo '<h3><a id="create_profile" class="toggle" href="#">Create a Profile</a></h3>';
                }
                ?>                   
                <div id="create_profile_toggle" style="display: none;">         
                    <?php require_once('library/leandroarts_wufoo_controller/create_profile_form.php'); ?>
                </div>
            </div>
            <script type="text/javascript">
            jQuery(function(){
                jQuery('a#create_profile').click(function(e){
                    e.preventDefault();
                    jQuery('#create_profile_toggle').slideToggle();
                });
            });
            </script>


            <hr />

            <!-- CREATE AN EVENT -->
            <div style="margin: 10px auto 40px;">                
                <?php
                // PREMIUM?
                if ( $current_user->member == 'yes' ) {
                    echo '<h3><a id="create_event" class="toggle" href="#">Create an Event</a></h3>';
                }
                // AFFILIATE?
                if ( $current_user->member != 'yes' ) {
                    // Basic:
                    if ( $current_user->gate == '1' ) {
                        // Threshold:
                        if ( $events_count >= 2 ) {
                            echo '<h3 style="color: gray;">Limit Reached - Create an Event</h3>'; 
                        }
                        else {
                            echo '<h3><a id="create_event" class="toggle" href="#">Create an Event</a></h3>';
                        }              
                    }
                    if ( $current_user->gate == '12' ) {
                    // Enhanced:
                        // Threshold:
                        if ( $events_count >= 5 ) {
                            echo '<h3 style="color: gray;">Limit Reached - Create an Event</h3>'; 
                        }
                        else {
                            echo '<h3><a id="create_event" class="toggle" href="#">Create an Event</a></h3>';
                        }              
                    }

                }
                ?>
                <div id="create_event_toggle" style="display: none;">         
                    <?php require_once('library/leandroarts_wufoo_controller/create_event_form.php'); ?>
                </div>
            </div>
            <script type="text/javascript">
            jQuery(function(){
                jQuery('a#create_event').click(function(e){
                    e.preventDefault();
                    jQuery('#create_event_toggle').slideToggle();
                });
            });
            </script>

            <hr />


            <!-- Your Submissions -->
            <div style="margin: 10px auto 40px;">                
                <h3><a id="submissions" class="toggle" href="#" style="color: #cba876;">Your Submissions</a></h3>
                <div id="submissions_toggle" style="display: none;">
                    <p><strong>These are your Events and Profiles awaiting review to be publish:</strong></p>

                    <!-- LIST OF EVENTS -->
                    <h4>Draft Events</h4>
                    <div id="events_list">
                        <?php 
                        $events_list = new WP_Query( array( 'post_type' => 'LIWC-events', 'posts_per_page' => 50, 'post_status' => 'draft', 'author' => $current_user->ID )); 
                        while ( $events_list->have_posts() ) : $events_list->the_post(); 
                        ?>
                        <div class="events_list_cell" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                            <span class="events_list_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>            
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                            <h3 class="events_list_cell_image_overlay_date"><?php $value = get_post_custom_values('event_date'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?></h3>
                            <hr />
                            <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <hr />
                            <h4 class="events_list_cell_image_overlay_time">
                                <?php $value = get_post_custom_values('event_time'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>
                                &nbsp;-&nbsp;
                                <?php $value = get_post_custom_values('event_time_end'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>    
                            </h4>                            
                            <hr />
                            <?php the_excerpt(); ?>
                            <hr />
                            <?php echo '<h4><a class="events_list_cell_card_purchase" href="' . get_permalink( $post->ID) . '">PURCHASE TICKETS</a></h4>'; ?>                   
                        </div><!-- cell -->                        
                        <?php endwhile; ?> 
                    </div><!-- events_list -->

                    <!-- LIST OF PROFILES -->
                    <h4>Draft Profile</h4>
                    <div id="events_list">
                        <?php 
                        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'posts_per_page' => 50, 'post_status' => 'draft', 'author' => $current_user->ID )); 
                        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
                        ?>
                        <div class="events_list_cell" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                            <span class="events_list_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>            
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                            <h3 class="events_list_cell_image_overlay_date"><?php $value = get_post_custom_values('event_date'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?></h3>
                            <hr />
                            <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <hr />
                            <h4 class="events_list_cell_image_overlay_time">
                                <?php $value = get_post_custom_values('event_time'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>
                                &nbsp;-&nbsp;
                                <?php $value = get_post_custom_values('event_time_end'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>    
                            </h4>                            
                            <hr />
                            <?php the_excerpt(); ?>
                            <hr />
                            <?php echo '<h4><a class="events_list_cell_card_purchase" href="' . get_permalink( $post->ID) . '">PURCHASE TICKETS</a></h4>'; ?>                   
                        </div><!-- cell -->                        
                        <?php endwhile; ?> 
                    </div><!-- events_list -->
                </div><!-- submissions_toggle -->
            </div><!-- your submissions -->
            <script type="text/javascript">
            jQuery(function(){
                jQuery('a#submissions').click(function(e){
                    e.preventDefault();
                    jQuery('#submissions_toggle').slideToggle();
                });
            });
            </script>

            <hr />
            <!-- LOGOUT -->
            <?php
            $redirect = get_site_url() . '/login';
            echo '<br/><a href="' . wp_logout_url( $redirect ) . '" style="background: #bbbbbb; border-radius: 6px; color: #fff; font-weight: bold; padding: 1em;">Log out</a>';
            ?>

            <!-- NOT LOGGED IN -->
            <?php else : ?>    
                <?php
                $url = get_site_url() . '/login'; 
                header('Location: ' . $url);
                die();    
                ?>        
            <?php endif; ?>

        <hr />

        <!-- SUPPORT -->
        <div style="margin: 10px auto 40px;">
            <h4>Need Support?</h4>
            <p>You can contact us at info@liwines.com</p>
        </div>
    </div><!-- form container -->
</div><!-- container -->

<div id="footer">
</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>
