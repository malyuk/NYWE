<?php
/*
Template Name: Wufoo Demo Login
*/
// https://smallenvelop.com/how-to-make-a-custom-wordpress-registration-page/
?>

<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
<meta name="google-site-verification" content="xClhj8OjmujRbxAsBH0zGxKvGk8cU2G7oh4M86b18cQ" />
    <title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="fb:app_id" content="397543903685261"/> <!-- META: Facebook Comment moderation  -->
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/style.css" />  
    <link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_url'); ?>/print.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
  <?php wp_enqueue_script('jquery'); ?>
  <?php include(TEMPLATEPATH . '/core-scripts.php'); ?>
  <?php 
  $options = get_option( 'theme_settings' ); 
  if( $options['header_custom_scripts']) { echo $options['header_custom_scripts']; } 
  ?> 
  <?php wp_head(); ?>
</head>
<!-- EPIC BODY TAG  -->
  <!--[if IE 6]><script type="text/javascript">window.onload = function(){ alert("You are using an obsolete verison of Internet Explorer. It is strongly recommended that you upgrade to a current browser for added security and to experience the advanced features available on modern websites. We recommend Firefox.com, its free!"); }</script><![endif]--> 
  <!--[if lt IE 7 ]> <body <?php body_class('ie6'); ?>> <![endif]-->
  <!--[if IE 7 ]>    <body <?php body_class('ie7'); ?>> <![endif]-->
  <!--[if IE 8 ]>    <body <?php body_class('ie8'); ?>> <![endif]-->
  <!--[if IE 9 ]>    <body <?php body_class('ie9'); ?>> <![endif]-->  
  <!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class('ie6'); ?>> <!--<![endif]-->
  <!--[if lt IE 9]>  <a id="obsolete_browser_warning" href="http://www.firefox.com">You are using an outdated browser. For a safer &amp; modern experience please upgrade for free. Click to continue.</a> <![endif]-->
  <!-- HEADER -->
    <div id="header" <?php if ( is_home() ) { echo 'class="home"'; } ?> style="border-top: 4px solid #000;" >        
    </div><!--  END HEADER  -->

<div class="center">

<h1> TEST </h1>



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
        $user_id = wp_insert_user(array(
            'first_name' => apply_filters('pre_user_first_name', $first_name),
            'last_name' => apply_filters('pre_user_last_name', $last_name),
            'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
            'user_login' => apply_filters('pre_user_user_login', $username),
            'user_email' => apply_filters('pre_user_user_email', $email),
            'role' => 'subscriber'
        ));
    
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
    echo '<p class="error">' . $err . '</p>';
    endif;
    ?>
    <?php
    if (!empty($success)):
    echo '<p class="error">' . $success . '</p>';
    endif;
?>
</div>

<form method="post">
    <h3>Don't have an account?<br/> Create a new one.</h3>
    
    <h5 style="margin: 2% 0;">First Name</h5>
    <input type="text" value="" name="first_name" id="first_name" />
    
    <h5 style="margin: 2% 0;">Last Name</h5>
    <input type="text" value="" name="last_name" id="last_name" />
    
    <h5 style="margin: 2% 0;">Email</h5>
    <input type="text" value="" name="email" id="email" />
    
    <h5 style="margin: 2% 0;">Username</h5>
    <input type="text" value="" name="username" id="username" />
    
    <h5 style="margin: 2% 0;">Password</h5>
    <input type="password" value="" name="pwd1" id="pwd1" />
    
    <h5 style="margin: 2% 0;">Password again</h5>
    <input type="password" value="" name="pwd2" id="pwd2" />
    
    <div class="alignleft">
        <p>
            <?php if ($sucess != "") { echo $sucess; }?> 
            <?php if ($err != "") { echo $err; } ?>
        </p>
    </div>
    
    <button type="submit" name="btnregister" class="button"style="clear: both; display: block;" >Submit</button>
    
    <input type="hidden" name="task" value="register" />

</form>







</div><!-- center -->

<div id="footer">
</div><!-- end Footer -->
<?php include(TEMPLATEPATH . '/scripts.php'); ?>
<?php $options = get_option( 'theme_settings' ); if( $options['footer_custom_scripts']) { echo $options['footer_custom_scripts']; } ?> 
<?php wp_footer(); ?>     
</body>
</html>
