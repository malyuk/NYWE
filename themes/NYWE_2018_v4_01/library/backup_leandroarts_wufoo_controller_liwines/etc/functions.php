<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;

if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Sidebar',
    'before_title'=>'<h4>',
    'after_title'=>'</h4>'
  ));
endif;

add_editor_style( 'editor-style.css' );

// Get the id of a page by its slug
function get_page_id($page_name){
  global $wpdb;
  $page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
  return $page_name;
}

// register external jquery library with wordpress & exclude from admin panel
function my_init_method() {
  if (is_admin() == false ):
    wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
  endif;
}    
add_action('init', 'my_init_method');

// add first and last to menu item list 
function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

// Grab first image of post
function get_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  return $first_img;
}


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// shorten length of excerpt
function custom_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



// add read more to end of expert
function new_excerpt_more( $more ) {
	
	// add ... that are clickable
	// return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '"> Read More</a>';
	
	// add ... that are NOT clickable
	return '... '  . '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">     Read More</a>';
	
}

add_filter( 'excerpt_more', 'new_excerpt_more' );



// Used in Blog, automatically removes width and height value and replaces it with "width=100%"

function filter_image_send_to_editor($html, $id, $caption, $title, $align, $url, $size, $alt) {

  $html = preg_replace("#width=\"[\d+]+\"#", 'width="100%"', $html);
  $html = preg_replace("#height=\"[\d+]+\"#", '', $html);
  
  return $html;
  
}
add_filter('image_send_to_editor', 'filter_image_send_to_editor', 10, 8);

// End









////////////////////////////////////////////////////////////////////////
//  TWITTER
////////////////////////////////////////////////////////////////////////


// Use Twitter API to get tweets
// $number_of_tweets is how many tweets to get
// $hashtag is the hashtag to search on
// THIS REQUIRES THE TwitterAPIExchange.php file. Can be found at 'https://github.com/J7mbo/twitter-api-php/blob/master/TwitterAPIExchange.php'


function msc_init_twitter(){
	
	require_once('TwitterAPIExchange.php');

    $settings = array(
        'oauth_access_token' => "73191009-ggahXOHGAi6C4fSSXLqyN86qaAyQU47ex8u5p3BCe",
        'oauth_access_token_secret' => "VK3IABKOMBNRRX1kz3wimzTlV8RHu3vnc8c66Np6IYGmQ",
        'consumer_key' => "YXVeMwO5WW8JwTxKJTQZkCQcp",
        'consumer_secret' => "cMhtg7ghqflzQYIi82yHwZlfiVDkTpWGB14l6myXIDa7uPSgMm"
    );
	
	return $settings;

}

function msc_get_tweets_by_hashtag($tweets_arguments) {
	
	$settings = msc_init_twitter();
	
	
	// This is the search "stream" used to find hashtags and user mentions. Does not find a specific users timeline
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	
	if( $tweets_arguments['mentioning'] != '' ){
		$mentioning = 'q=' . $tweets_arguments['mentioning'];
	}
	if( $tweets_arguments['number_of_tweets'] != '' ){
		$number_of_tweets = '&count=' . $tweets_arguments['number_of_tweets'];
	}

	// Search parameters
	$getfield = '?' . $mentioning . $number_of_tweets . '&include_rts=false';
    $requestMethod = 'GET';
	
    $twitter = new TwitterAPIExchange($settings);

    $response = $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();     

    $decoded = json_decode($response,true);
	return $decoded;
}


function msc_get_tweets_by_user($tweets_arguments) {
	
	$settings = msc_init_twitter();
	
	// This is the users "stream" 
	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	
	if( $tweets_arguments['number_of_tweets'] != '' ){
		$number_of_tweets = '&count=' . $tweets_arguments['number_of_tweets'];
	}
	if( $tweets_arguments['username'] != '' ){
		$screen_name = 'screen_name=' . $tweets_arguments['username'];
	}
	

	// Search parameters
	$getfield = '?' . $screen_name . $number_of_tweets . '&include_rts=false';
    $requestMethod = 'GET';
	
    $twitter = new TwitterAPIExchange($settings);

    $response = $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();     

    $decoded = json_decode($response,true);
	return $decoded;
}

function msc_get_tweet_image($tweet, $alt_tag = 'twitter pic', $class = ""){
	if($tweet['entities']['media'][0]["media_url"]){
		echo '<img class="' . $class . '" src="';
		echo $tweet['entities']['media'][0]["media_url"];
		echo '" alt="' . $alt_tag . '" />';
	}
}

function msc_get_tweet_image_url($tweet){
	if($tweet['entities']['media'][0]["media_url"]){
		echo $tweet['entities']['media'][0]["media_url"];
	}
}

function msc_get_tweet_text($tweet){
	if($tweet['text']){
		echo $tweet['text'];
	}
}

function msc_get_tweet_link_URL($tweet){
	$url = $tweet['entities']['urls'][0]["expanded_url"];

	if($url){
		echo $url;
	}
}








////////////////////////////////////////////////////////////////////////
//  INSTAGRAM
////////////////////////////////////////////////////////////////////////


function msc_get_grams($args){
	// Get class for Instagram
    // More examples here: https://github.com/cosenary/Instagram-PHP-API
    require_once 'instagram.class.php';

    // Initialize class with client_id
    // Register at http://instagram.com/developer/ and replace client_id with your own
    $instagram = new Instagram($args['client_id']);

    // Set keyword for #hashtag
    $tag = $args['tag'];

    // Get latest photos according to #hashtag keyword
    $media = $instagram->getTagMedia($tag);
	
	return $media;
}





////////////////////////////////////////////////////////////////////////
//  CUSTOM POSTS
////////////////////////////////////////////////////////////////////////



//Add custom post types
function create_post_type() {
  register_post_type( 'winery',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-image-filter',
      'labels' => array(
        'name' => __( 'Wineries' ),
        'singular_name' => __( 'Winery' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  register_post_type( 'dining',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-carrot',
      'labels' => array(
        'name' => __( 'Dining' ),
        'singular_name' => __( 'Restaurant' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  register_post_type( 'events',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-tickets-alt',
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );


  register_post_type( 'lodging',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-admin-multisite',
      'labels' => array(
        'name' => __( 'Lodging' ),
        'singular_name' => __( 'Accommodation' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  register_post_type( 'attractions',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-location-alt',
      'labels' => array(
        'name' => __( 'Attractions' ),
        'singular_name' => __( 'Attraction' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  register_post_type( 'members',
    array(
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'menu_icon' => 'dashicons-awards',
      'labels' => array(
        'name' => __( 'Members' ),
        'singular_name' => __( 'Member' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  register_post_type( 'videos',
    array(
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-awards',
      'labels' => array(
        'name' => __( 'Videos' ),
        'singular_name' => __( 'Video' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
}
add_action( 'init', 'create_post_type' );





////////////////////////////////////////////////////////////////////////
//  CALENDAR
////////////////////////////////////////////////////////////////////////





/* draws a calendar */
function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<div class="calendar">';
	
	$monthName = date('F', mktime(0, 0, 0, $month, 10));

	/* table headings */
	$headings = array('S','M','T','W','T','F','S');
	if($month < 10){ $num_month = '0' . $month; }else{ $num_month = $month; }
	$calendar.= '<div class="date-head"><span id="' . $num_month . $year .'" class="floatleft back_month"><i class="fa fa-angle-left"></i></span>' . $monthName . ' ' . $year . '<span id="' . $num_month . $year .'" class="floatright forward_month"><i class="fa fa-angle-right"></i></span></div><div class="calendar-row"><div class="calendar-day-head">'.implode('</div><div class="calendar-day-head">',$headings).'</div></div>';

	/* days and weeks vars now ... */
	
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_last_month = date('t',mktime(0,0,0,$month - 1,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<div class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		// generate numerical value of end of last month
		$offset = $days_in_last_month - $running_day + $x + 1;
		$calendar.= '<div class="calendar-day-np"><div class="day-number">' . $offset .'</div></div>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day < 10){ $num_day = '0' . $list_day; }else{ $num_day = $list_day; }
		$calendar.= '<div id="' . $num_day . $month . $year .'" class="calendar-day transitionall">';
			/* add in the day number */
			$calendar.= '<div class="day-number transitionall">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			// $calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</div>';
		if($running_day == 6):
			$calendar.= '</div>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<div class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8 && $days_in_this_week > 1):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			// generate numerical value of end of last month
			$calendar.= '<div class="calendar-day-np"><div class="day-number">'.$x.'</div></div>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</div>';

	/* end the table */
	$calendar.= '</div>';
	
	/* all done, return result */
	return $calendar;
}


// function add_single_ajax(){
// 		wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/itinerary_ajax.js', 'jquery' );
// 		wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
// }
// add_action('wp_enqueue_scripts', 'add_single_ajax');






// Itinerary AJAX REFERENCE
function add_itinerary_ajax(){
	if(is_page(83)){
		wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/itinerary_ajax.js', 'jquery' );
		wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action('wp_enqueue_scripts', 'add_itinerary_ajax');

function update_geo_ajax(){
	if(is_singular( 'winery' ) || is_singular( 'dining' ) || is_singular( 'lodging' ) || is_singular( 'members' )){
		wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/updategeo_ajax.js', 'jquery' );
		wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action('wp_enqueue_scripts', 'update_geo_ajax');

function update_geocode() {
	
	// global $wpdb;
	
	// passed from ajax in JS
	if($_POST[locaton]){
		$location = $_POST[locaton];
		$post_id = $_POST[post_id];
		update_field( "geocode", $location, $post_id );
		echo 'complete';
		
	}
	wp_die();
}
add_action( 'wp_ajax_update_geocode', 'update_geocode' );
add_action( 'wp_ajax_nopriv_update_geocode', 'update_geocode' );



function fetch_calendar() {
	
	// global $wpdb;
	
	// passed from ajax in JS
	if($_POST[month]){
		$month = $_POST[month];
		$year = $_POST[year];
		// build_itinerary($storage_values);
		echo draw_calendar($month, $year);
		
	}
	// var_dump($storage_values);
	// return $month;
	// echo 'asdf';
	wp_die();
}
add_action( 'wp_ajax_fetch_calendar', 'fetch_calendar' );
add_action( 'wp_ajax_nopriv_fetch_calendar', 'fetch_calendar' );



// AJAX Handler Itinerary
function fetch_itinerary() {
	
	// global $wpdb;
	
	// passed from ajax in JS
	if($_POST[storage_values]){
		$storage_values = $_POST[storage_values];
		// build_itinerary($storage_values);
		
	}
	// var_dump($storage_values);
	
	
	// echo 'asdf';
	$itinerary = build_itinerary($storage_values);
	$geo_codes = build_geocodes($storage_values);
	// $geo_codes = 'adsf';
	$list = array($itinerary, $geo_codes);
	echo json_encode($list);
	wp_die();
}
add_action( 'wp_ajax_fetch_itinerary', 'fetch_itinerary' );
add_action( 'wp_ajax_nopriv_fetch_itinerary', 'fetch_itinerary' );


function build_geocodes($storage_values){
	
	$geo_codes = array();
	
	foreach($storage_values as $data => $value){
		
		// array_push();
		// var[0] = title; var[1] = location name; var[2] = post_id
		$vars = explode("?", $value);
		
		
		$geo_code = get_field('geocode', $vars[2]);
		$geo_code = explode(",", $geo_code);
		array_unshift($geo_code, $data);
		array_push($geo_codes, $geo_code);
	}
	
	// return $geo_codes;
	return $geo_codes;
	
}

function build_itinerary($storage_values){
	
	$itinerary;
	
	foreach($storage_values as $data => $value){
		// var[0] = title; var[1] = location name; var[2] = post_id
		$vars = explode("?", $value);
		
		$post_thumbnail_id = get_post_thumbnail_id($vars[2]);
		$thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
		
		
		
		$itinerary .= '<div id="'.$data.'" class="'.$data.' itinerary_item transitionall clearfix">';
		$itinerary .='<div class="time"><input class="hour" type="text" placeholder="12" maxlength="2" />:<input type="text" placeholder="00" maxlength="2" /><input class="day_half" type="text" placeholder="pm" maxlength="2" /></div>';
		
		$itinerary .= '<div class="itinerary_img"><img class="fullwidth" src="';
		if($thumbnail_url[0]){
			 $itinerary .= $thumbnail_url[0]; 
		}else{
			$itinerary .= 'http://www.liwines.com/2015/wp-content/uploads/2015/11/placeholder.png';
		}
		
		$itinerary .='" alt="Long Island Wine Council" /></div>';
		$itinerary .= '<div class="itinerary_copy"><h4><a href="'. get_the_permalink($vars[2]) . '">' . get_the_title($vars[2]) . '</a></h4><span class="light_serif">' . get_field('location', $vars[2]) . "</span></div><span class='itinerary_location_close'></span>";
		$itinerary .= '</div>';
	}
	
	return $itinerary;
	
	
}


// TRIP PLANNER

function query_trip_tiles($post_types){
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 
	$args = array(
		'post_type' => $post_types,
		'posts_per_page'   => -1,
		'order' => 'ASC',
		'orderby' => 'title',
		'paged' => $paged
		// 'category__not_in' => array(12, 11, 1, 17)        used to exclude categories
	);
 

	$tile_query = new WP_Query( $args ); 
	return $tile_query;
}




// ===========================================
// == LEANDROARTS  ===========================
// ===========================================


// ----------------------------
// REGISTER POST TYPES
// ----------------------------
// Events:
require_once('library/leandroarts_wufoo_controller/events-v2_post-type.php');    
// Profiles:
require_once('library/leandroarts_wufoo_controller/profile_post-type.php');    



// -------------------------------------
// PUBLISH FUTURE EVENTS POSTS-TYPE:
// -------------------------------------

remove_action('future_post', '_future_post_hook');
add_filter( 'wp_insert_post_data', 'nacin_do_not_set_posts_to_future' );
function nacin_do_not_set_posts_to_future( $data ) {
	if ( $data['post_status'] == 'future' ) {
		 $data['post_status'] = 'publish';
	}
	   
	return $data;
}
// end FUTURE POSTS




// ----------------------------
// Add a custom user role
// ----------------------------

$result = add_role( 'member', __(

	'Member' ),
	
	array(
		'read' => false, // true allows this capability
		'edit_posts' => false, // Allows user to edit their own posts
		'edit_pages' => false, // Allows user to edit pages
		'edit_others_posts' => false, // Allows user to edit others posts not just their own
		'create_posts' => false, // Allows user to create new posts
		'manage_categories' => false, // Allows user to manage post categories
		'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'upload_files' => true,
		'update_core' => false // user cant perform core updates
	)
	
);




// ----------------------------------------
// ADD USER META DATA
// ----------------------------------------

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
		<tr>
			<th><label for="member"><?php _e("Premium Member?"); ?></label></th>
			<td>
				<input 	type="checkbox" 
				name="member" 
				id="member" 
				value="yes" 
				<?php if (esc_attr( get_the_author_meta( "member", $user->ID )) == "yes") echo "checked"; ?> 
				/>
			</td>
		</tr>
		<tr>
			<th><label for="category"><?php _e("Member Category"); ?></label></th>
			<td>
				<input 	type="text" 
				name="category" 
				id="category" 
				value="<?php echo get_the_author_meta( 'category', $user->ID ); ?>" 				 
				/>
			</td>
		</tr>
		<tr>
			<th><label for="gate"><?php _e("Member Gate"); ?></label></th>
			<td>
				<input 	type="text" 
				name="gate" 
				id="gate" 
				value="<?php echo get_the_author_meta( 'gate', $user->ID ); ?>" 				 
				/>
				<p>
					<strong>Options:</strong><br/> 
					'1' (basic affiliate)<br/>
					'12' (enhanced affiliate)
				</p>
			</td>
		</tr>		
	</table>

<?php }


add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }

	update_user_meta( $user_id, 'member', $_POST['member'] );
	update_user_meta( $user_id, 'category', $_POST['category'] );
	update_user_meta( $user_id, 'gate', $_POST['gate'] );

}






// ----------------------------------------
// DISABLE DASHBOARD TO NON ADMIN
// ----------------------------------------
/*
add_action( 'init', 'blockusers_init' );

function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && 
       ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}
*/

// ----------------------------------------
// DISABLE ADMIN BAR
// ----------------------------------------
// All except Admins:
/*
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
*/

// Disable WordPress Admin Bar for all users
show_admin_bar(false);
	
// --------------------------------------
// Override Default Login Redirects
// --------------------------------------
// Redirects all login redirects to /login
// Notes: https://themetrust.com/build-custom-wordpress-login-page/


/* Main redirection of the default login page */
function redirect_login_page() {
	$login_page  = home_url('/login/');
	$page_viewed = basename($_SERVER['REQUEST_URI']);

	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
		wp_redirect($login_page);
		exit;
	}
}
add_action('init','redirect_login_page');

/* Where to go if a login failed */
function custom_login_failed() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . '?login=failed');
	exit;
}
add_action('wp_login_failed', 'custom_login_failed');

/* Where to go if any of the fields were empty */
function verify_user_pass($user, $username, $password) {
	$login_page  = home_url('/login/');
	if($username == "" || $password == "") {
		wp_redirect($login_page . "?login=empty");
		exit;
	}
}
add_filter('authenticate', 'verify_user_pass', 1, 3);

/* What to do on logout */
function logout_redirect() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . "?login=false");
	exit;
}
add_action('wp_logout','logout_redirect');

// ===========================
// JQUERY UI DATEPICKER
// ===========================
function wpse_enqueue_datepicker() {
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );
    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );  
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );


// ==========================
// GUTENBERG POST TYPE HACK
// ==========================
// LEGACY:
// winery, dining, events, lodging, attractions, members, videos
// LEANDROARTS:
// LIWC-events, profile
/*
add_filter( 'gutenberg_can_edit_post_type', 'my_gutenberg_can_edit_post_types' );
function my_gutenberg_can_edit_post_types( $can_edit, $post_type ) {
    If ( in_array( $post_type, array( 'winery', 'dining', 'events', 'lodging', 'attractions', 'members', 'videos', 'LIWC-events', 'profile' ) ) {
        return false;
    }
    return $can_edit;
}
*/
?>