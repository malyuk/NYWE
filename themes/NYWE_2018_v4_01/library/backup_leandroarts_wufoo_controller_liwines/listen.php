<?php /* 
=====================================
LEANDROARTS
=====================================
== LIWINES 
== Wufoo Process form.
=====================================
*/
// NOTES:
// https://help.wufoo.com/articles/en_US/kb/Templating
// http://liwines.wpengine.com/wp-content/themes/leandroarts_liwines/library/leandroarts_wufoo_controller/listen.php

// SAVED WUFOO HOOK: 
// http://liwines.wpengine.com/wp-content/themes/leandroarts_liwines/library/leandroarts_wufoo_controller/listen.php?trigger=true&firstname={entry:Field1}&lastname={entry:Field2}&email={entry:Field5}&category={entry:Field9}


$trigger = $_GET['trigger'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$category = $_GET['category'];
$gate = $_GET['gate'];
	if ( $gate == 'Basic Affiliate Membership ($250)' ) {
		$gate = '1';
	}
	if ( $gate == 'Enhanced Affiliate Membership ($500)' ) {
		$gate = '12';
	}

if ( $trigger == 'true' ) {
	// Redirect to Registration form:
	header("Location: http://liwines.wpengine.com/members-register/?firstname=" . $firstname . "&lastname=" . $lastname . "&email=" . $email . "&category=" . $category . "&gate=" . $gate);
	die();
}

else {	
	// Redirect back to Purchase form:
	header("Location: http://liwines.wpengine.com/members-signup/");
	die();
}