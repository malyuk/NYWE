<?php 

function leandroarts_register_settings(){
  register_setting( 'theme_settings', 'theme_settings' );
}
add_action( 'admin_init', 'leandroarts_register_settings' );


function leandroarts_theme_settings() {
  add_theme_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', 'leandroarts_theme_settings_page');
}
add_action( 'admin_menu', 'leandroarts_theme_settings' );


// Start settings page
function leandroarts_theme_settings_page() {

  if ( ! isset($_REQUEST['updated']) ) { 
    $_REQUEST['updated'] = false;
  }

  ?>

    <div id="theme_settings">
        <!-- HEADER -->              
        <h2>Theme Settings</h2>

        <!-- ALERTS -->
        <?php if ( false !== $_REQUEST['updated'] ) : //show saved options message ?>
            <div>
              <p><strong style="color: #0074A2;">Options saved</strong></p>
            </div>
        <?php endif; ?>


        <!-- PANELS -->
        <form method="post" action="options.php">

            <!-- SETUP
            ================ -->
            <!-- GLOBALS -->
            <?php settings_fields( 'theme_settings' ); ?>
            <?php $options = get_option( 'theme_settings' ); ?>
            

            <!-- ADVANCED OPTIONS 
            =========================== -->
            <div style="padding: 14px; margin: 14px 4px 14px; background: #fafafa; border-radius: 8px;">
                <h3 style="display: block; padding: 14px; background: #0074A2; color: #fff;">ADVANCED OPTIONS <em style="color: #ffffff; font-size: 0.7em; opacity: 0.5;">(Optional)</em></h3>
  
                <!-- CUSTOM SCRIPTS -->
                <h4>'Head Loading' Custom Scripts</h4>
                <textarea style="padding: 8px;" id="theme_settings[header_custom_scripts]" name="theme_settings[header_custom_scripts]" rows="7" cols="100"><?php echo $options['header_custom_scripts']; ?></textarea>
                <p>
                  <strong>Tip:</strong> Your code will be included within the head tag of every page.
                </p>

                <!-- CUSTOM SCRIPTS -->
                <h4>'Footer Loading' Custom Scripts</h4>
                <textarea style="padding: 8px;" id="theme_settings[footer_custom_scripts]" name="theme_settings[footer_custom_scripts]" rows="7" cols="100"><?php echo $options['footer_custom_scripts']; ?></textarea>
                <p>
                  <strong>Tip:</strong> Your code will be included at the footer of every page.
                </p>    

            </div><!-- end ADVANCED OPTIONS -->

            

            <!-- GLOBAL ADVERTS 
            =========================== -->
            <div style="padding: 14px; margin: 14px 4px 14px; background: #fafafa; border-radius: 8px;">
                <h3 style="display: block; padding: 14px; background: #0074A2; color: #fff;">GLOBAL ADVERTISING <em style="color: #ffffff; font-size: 0.7em; opacity: 0.5;">(Optional)</em></h3>
  
                <!-- ADVERT 1 -->
                <h4>Advertizing #1</h4>
                <textarea style="padding: 8px;" id="theme_settings[global_advert_1]" name="theme_settings[global_advert_1]" rows="7" cols="100"><?php echo $options['global_advert_1']; ?></textarea>
                <p>
                  <strong>Tip:</strong> This will load on pages (Homepage, Pages, Pages Wide, Blog), unless specifically overidden within the page itself.
                </p>

                <!-- ADVERT 2 -->
                <h4>Advertizing #2</h4>
                <textarea style="padding: 8px;" id="theme_settings[global_advert_2]" name="theme_settings[global_advert_2]" rows="7" cols="100"><?php echo $options['global_advert_2']; ?></textarea>
                <p>
                  <strong>Tip:</strong> This will load on pages (Homepage, Blog), unless specifically overidden within the page itself.
                </p>

                <!-- ADVERT 3 -->
                <h4>Advertizing #3</h4>
                <textarea style="padding: 8px;" id="theme_settings[global_advert_3]" name="theme_settings[global_advert_3]" rows="7" cols="100"><?php echo $options['global_advert_3']; ?></textarea>
                <p>
                  <strong>Tip:</strong> This will load on pages (Events, Daytrips), unless specifically overidden within the page itself.
                </p>

                <!-- ADVERT 4 -->
                <h4>Advertizing #4</h4>
                <textarea style="padding: 8px;" id="theme_settings[global_advert_4]" name="theme_settings[global_advert_4]" rows="7" cols="100"><?php echo $options['global_advert_4']; ?></textarea>
                <p>
                  <strong>Tip:</strong> This will load on pages (Blog Posts), unless specifically overidden within the page itself.
                </p>

            </div><!-- end ADVANCED OPTIONS -->



            <!-- SAVE 
            ============ -->
            <p style="margin-top: 40px;"><input name="submit" id="submit" value="Save Changes" type="submit" style="background: #009F19; color: #fff; font-weight: bold; padding: 14px; border: none; cursor: pointer;"></p>
        
        </form>




    </div><!-- END wrap -->

<?php
  } // end THEME OPTIONS
?>