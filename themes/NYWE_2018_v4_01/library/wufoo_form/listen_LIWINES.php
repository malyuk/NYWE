<?php /* 
=====================================
== LIWINES =-PROCESS Wufoo Form
=====================================
*/



// ------------------------------
// LOAD WORDPRESS FUNCTIONS:
// ------------------------------
require_once("../../../../../wp-load.php");


// -------------------------
// CREATE DRAFT EVENT
// -------------------------

function leandroarts_create_post() {

		$author_id = 1;
		$slug = 'demo-post-' . rand();
		// $title = 'Demo -' . rand();
		$title = 'Demo Event - via @' . $_POST['Field1'];
		$content = 'Sample Content';

		wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_content'  	=> 	$content,
				'post_status'		=>	'draft',  // publish
				'post_type'			=>	'post'
			)
		);		

} // end function

leandroarts_create_post();



/*

// -----------------------------
// PROCESS WUFORM SUBMISSION
// -----------------------------
// Check if a name was submitted?
if( isset($_POST['Field1']) ) {


	// Send Confirmation email:
	// ----------------------------
	// Reference: http://php.net/manual/en/function.mail.php
	$to      = 'leandroflaherty@gmail.com';
	$subject = 'the subject';
	$message = 'POSITIVE';
	$headers = 'From: info@liwines.com' . "\r\n" .
		'Reply-To: info@liwines.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);


	// Redirect:
	//header("Location: http://liwines.wpengine.com/dev-wufoo-demo-login/");
	// die();	
}

// If No name, die.
if( !isset($_POST['Field1']) ) {

	// Send Confirmation email:
	// ----------------------------
	// Reference: http://php.net/manual/en/function.mail.php
	$to      = 'leandroflaherty@gmail.com';
	$subject = 'the subject';
	$message = 'NEGATIVE';
	$headers = 'From: info@liwines.com' . "\r\n" .
		'Reply-To: info@liwines.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);


	// Redirect:	
	// header("Location: http://liwines.wpengine.com/dev-wufoo-demo/");
	// die();	
}


*/