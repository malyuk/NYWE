<?php /* 
==========================
== PROCESS Wufoo Form
========================== 

API Doc:
https://help.wufoo.com/articles/en_US/kb/Wufoo-REST-API-V3
https://wufoo.github.io/docs/

Test URL:
http://winship.staging.wpengine.com/wp-content/themes/NYWE_2018_v4_01/library/wufoo_form/listen.php
http://winship.staging.wpengine.com/wp-content/themes/NYWE_2018_v4_01/library/wufoo_form/log.php
http://winship.staging.wpengine.com/wp-content/themes/NYWE_2018_v4_01/library/wufoo_form/demo.php

*/

// ------------------------------
// LOAD WORDPRESS FUNCTIONS:
// ------------------------------
require_once("../../../../../wp-load.php");


// -------------------------
// CREATE LOG FILE:
// -------------------------
$filename = "log.php";
$ourFileName =$filename;
$ourFileHandle = fopen($ourFileName, 'a');

$var = print_r($_POST, true);
$var = (string)$var . ' <br />&nbsp;<br />';

$written = $var;
fwrite($ourFileHandle,$written);
fclose($ourFileHandle);


// email
	// Send Confirmation email:
	// ----------------------------
	// Reference: http://php.net/manual/en/function.mail.php
	$to      = 'leandroflaherty@gmail.com';
	$subject = 'the subject';
	$message = 'TEST';
	$headers = 'From: info@nywe.com' . "\r\n" .
		'Reply-To: info@nywe.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);


// -------------------------
// CREATE USER
// -------------------------


// -------------------------
// CREATE PROFILE
// -------------------------


// -------------------------
// CREATE DRAFT EVENT
// -------------------------
// Notes: https://developer.wordpress.org/reference/functions/wp_insert_post/
// https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/

function leandroarts_create_post() {
	// Check for Wufoo $_POST data:
	if( isset($_POST['Field13']) ) {

		// Setup the author, slug, and title for the post
		$author_id = 1;
		$slug = 'demo-post-' . rand();
		// $title = 'Demo -' . rand();
		$title = 'Demo Event - via @' . $_POST['Field13'];
		$content = 'Sample Content - ' . $_POST['Field14'];

		wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_content'  	=> 	$content,
				'post_status'		=>	'draft',  // publish
				'post_type'			=>	'events'
			)
		);		

	} // endif

} // end function

leandroarts_create_post();




// -------------------------
// REDIRECT:
// -------------------------
// header("Location: http://winship.staging.wpengine.com/wp-content/themes/NYWE_2018_v4_01/library/wufoo_form/demo.php");
header("Location: http://newyorkwineevents.com/dev-wufoo-demo/");
die();