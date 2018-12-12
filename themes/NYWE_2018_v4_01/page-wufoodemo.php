<?php
/*
Template Name: Wufoo Demo
*/
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




<h1>EMBEDED WUFOO FORM</h1>

<div id="wufoo-z1btfhxa15r74gk">
Fill out my <a href="https://newyorkwineevents.wufoo.com/forms/z1btfhxa15r74gk">online form</a>.
</div>
<script type="text/javascript">var z1btfhxa15r74gk;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'newyorkwineevents',
'formHash':'z1btfhxa15r74gk',
'autoResize':true,
'height':'316',
'async':true,
'host':'wufoo.com',
'header':'show',
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { z1btfhxa15r74gk = new WufooForm();z1btfhxa15r74gk.initialize(options);z1btfhxa15r74gk.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>


<?php 
// <h3>CAPTURED FORM DATA (log)</h3>
// $x = file_get_contents('http://winship.staging.wpengine.com/wp-content/themes/NYWE_2018_v4_01/library/wufoo_form/log.php');
// echo $x;
?>





</div><!-- center -->

<div id="footer">
</div><!-- end Footer -->
<?php include(TEMPLATEPATH . '/scripts.php'); ?>
<?php $options = get_option( 'theme_settings' ); if( $options['footer_custom_scripts']) { echo $options['footer_custom_scripts']; } ?> 
<?php wp_footer(); ?>     
</body>
</html>
