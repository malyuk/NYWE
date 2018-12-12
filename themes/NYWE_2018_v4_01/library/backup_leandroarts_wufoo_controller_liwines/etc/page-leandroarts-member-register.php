<?php
/*
Template Name: leandroarts-member-register
*/
// https://smallenvelop.com/how-to-make-a-custom-wordpress-registration-page/
?>

<?php get_header('global'); ?>

<div style="
    margin: 0px auto 20px;
    width: 100%;
    overflow: hidden;
    background: #fafafa;
    display: block;
    float: left;
    clear: both;
    padding: 2% 10%;  
">


  <div style="
    margin: 4% auto 8%;
    width: 100%;
    overflow: hidden;
    background: #fff;
    display: block;
    float: left;
    clear: both;
    padding: 2% 0%;  
  ">


    
        <?php

        $err = '';
        $success = '';
        global $wpdb, $PasswordHash, $current_user, $user_ID;

        if (isset($_POST['task']) && $_POST['task'] == 'register') {
            $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
            $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
            $first_name = $wpdb->escape(trim($_POST['first_name']));
            $last_name = $wpdb->escape(trim($_POST['last_name']));
            $email = $wpdb->escape(trim($_POST['email']));
            $username = $wpdb->escape(trim($_POST['username']));

            if ($email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
                $err = 'Please dont leave the required fields empty.';
            }     
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err = 'Invalid email address.';
            } 
            elseif (email_exists($email)) {
                $err = 'Email already exist.';
            } 
            elseif ($pwd1 <> $pwd2) {
                $err = 'Password do not match.';
            } 
            else {
                // Create User: 
                // Insert Default Meta
                $user_id = wp_insert_user(array(
                    'first_name' => apply_filters('pre_user_first_name', $first_name),
                    'last_name' => apply_filters('pre_user_last_name', $last_name),
                    'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
                    'user_login' => apply_filters('pre_user_user_login', $username),
                    'user_email' => apply_filters('pre_user_user_email', $email),                    
                    'role' => 'member' // 'role' => 'subscriber'
                ));
                // Insert Custom Meta
                // category:
                    $category = $_GET['category'];
                    update_user_meta( $user_id, 'category', $category );
                // gate:
                    $gate = $_GET['gate'];
                    update_user_meta( $user_id, 'gate', $gate );
            
                if (is_wp_error($user_id)) {
                    $err = 'Error on user creation.';
                } 
                else {
                    do_action('user_register', $user_id);
                    $success = 'You are successfully register';
                }
            }
        }
        ?>

        <!--display error/success message-->
        <div id="message">
            <?php
            if (!empty($err)):
            echo '<p class="error" style="color: red; border: 1px solid; padding: 1em 1em; margin: 0 auto 18px; font-weight: bold;">' . $err . '</p>';
            endif;
            ?>
            <?php
            if (!empty($success)):
            echo '<p class="error" style="color: green; border: 1px solid; padding: 1em 1em; margin: 0 auto 18px; font-weight: bold;">' . $success . '</p>';
            // REDIRECT:
                $firstname = $_GET['firstname'];
                $lastname = $_GET['lastname'];
                $email = $_GET['email'];
                $category = $_GET['category'];
                $gate = $_GET['gate'];
                header("Location: http://liwines.wpengine.com/member-dashboard/?firstname=" . $firstname . "&lastname=" . $lastname . "&email=" . $email . "&category=" . $category . "&gate=" . $gate);
                die();    
            // end Redirect
            endif;
        ?>
        </div>

        <form method="post">
            <h3>Create your login credentials</h3>

            <?php
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            $email = $_GET['email'];
            $category = $_GET['category'];
            $gate = $_GET['gate'];
            ?>
            
            <h4 style="margin: 2% 0;">First Name</h4>
            <input type="text" value="<?php echo $firstname; ?>" name="first_name" id="first_name" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>
            
            <h4 style="margin: 2% 0;">Last Name</h4>
            <input type="text" value="<?php echo $lastname; ?>" name="last_name" id="last_name" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>
            
            <h4 style="margin: 2% 0;">Email</h4>
            <input type="text" value="<?php echo $email; ?>" name="email" id="email" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>
            
            <h4 style="margin: 2% 0;">Username</h4>
            <input type="text" value="" name="username" id="username" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>                  
            
            <h4 style="margin: 2% 0;">Password</h4>
            <input type="password" value="" name="pwd1" id="pwd1" 
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>            
            
            <h4 style="margin: 2% 0;">Password again</h4>
            <input type="password" value="" name="pwd2" id="pwd2"
                style="padding: 1% 2%; width: 80%; font-weight: bold; font-size: 1.25em; color: #2e6091;"/>            
            
            <div class="alignleft">
                <p>
                    <?php if ($sucess != "") { echo $sucess; }?> 
                    <?php if ($err != "") { echo $err; } ?>
                </p>
            </div>
            <button type="submit" name="btnregister" class="button" style="                    
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
            <input type="hidden" name="task" value="register" />

            <p style="background: lightcyan; padding: .25em 1em;"><e>For your records, remember to save your username and password!<br /> You will need them to login to your Member Dashboard.</e></p>

        </form>


    </div><!-- form container -->

</div><!-- container -->

<div id="footer">
</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>
