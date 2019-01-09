<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
	<meta name="google-site-verification" content="xClhj8OjmujRbxAsBH0zGxKvGk8cU2G7oh4M86b18cQ"/>

	<!-- TITLE -->
	<title><?php wp_title(); ?> | <?php bloginfo( 'name' ); ?></title>

	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta property="fb:app_id" content="397543903685261"/> <!-- META: Facebook Comment moderation  -->

	<!-- CSS -->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico"/>

	<!-- JAVASCRIPT CORE -->
	<?php include( TEMPLATEPATH . '/core-scripts.php' ); ?>

	<!-- CUSTOM SCRITS -->
	<?php
	$options = get_option( 'theme_settings' );
	if ( $options['header_custom_scripts'] ) {
		echo $options['header_custom_scripts'];
	}
	?>

	<!-- WORDPRESS CORE -->
	<?php wp_head(); ?>

</head>

<!-- EPIC BODY TAG  -->
<!--[if IE 6]>
<script type="text/javascript">window.onload = function () {
	alert( "You are using an obsolete verison of Internet Explorer. It is strongly recommended that you upgrade to a current browser for added security and to experience the advanced features available on modern websites. We recommend Firefox.com, its free!" );
}</script><![endif]-->
<!--[if lt IE 7 ]>
<body <?php body_class('ie6'); ?>> <![endif]-->
<!--[if IE 7 ]>
<body <?php body_class('ie7'); ?>> <![endif]-->
<!--[if IE 8 ]>
<body <?php body_class('ie8'); ?>> <![endif]-->
<!--[if IE 9 ]>
<body <?php body_class('ie9'); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body <?php body_class( 'ie6' ); ?>> <!--<![endif]-->
<!--[if lt IE 9]>  <a id="obsolete_browser_warning" href="http://www.firefox.com">You are using an outdated browser. For
	a safer &amp; modern experience please upgrade for free. Click to continue.</a> <![endif]-->

<?php do_action('after_body_open_tag'); ?>

<!-- HEADER -->
<div id="header" <?php if ( is_home() ) {
	echo 'class="home"';
} ?> style="border-top: 4px solid #000;">

	<!-- LOGO -->
	<a class="logo" href="<?php bloginfo( 'url' ); ?>/">
		<img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt="New York Wine Events"/>
	</a>

	<!-- NAVIGATION -->
	<div id="head_navigation">

		<!-- MENUS -->
		<div id="nav-wrap">

			<div class="nav">
				<?php wp_nav_menu( array(
					'theme_location' => 'header_main_menu',
					'container'      => '',    // removes auto generated bounding box.
					'depth'          => 1, // 0 is infinite.
					'reverse'        => true,
					'menu_class'     => ''
				) ); ?>
			</div>

			<div class="nav nav_sub">
				<?php wp_nav_menu( array(
					'theme_location' => 'header_sub_menu',
					'container'      => '',    // removes auto generated bounding box.
					'depth'          => 1, // 0 is infinite.
					'reverse'        => true,
					'menu_class'     => ''
				) ); ?>
			</div>

		</div><!-- ..nav-wrap -->

		<!-- TOOLS -->
		<div id="head_tools">

			<!-- SUBSCRIBE -->
			<a id="head_tools_subscribe" class="button"
			   href="https://newjerseywinefestivals.us6.list-manage.com/subscribe/post?u=da778b0b532a20f59d31779a3&id=d6c5ffde20" target="_blank">Subscribe</a>

			<!-- SOCIAL -->
			<div id="head_tools_buttons">
				<a id="head_tools_buttons_facebook" target="_BLANK" href="https://www.facebook.com/NewYorkWineEvents">Facebook</a>
				<a id="head_tools_buttons_twitter" target="_BLANK" href="https://twitter.com/NYWineEvents">Twitter</a>
				<a id="head_tools_buttons_instagram" target="_BLANK" href="http://www.instagram.com/newyorkwineevents">Instagram</a>
				<a id="head_tools_buttons_search" href="<?php bloginfo( 'url' ); ?>/?s=yoursearch">Search</a>
			</div><!-- header_social -->

		</div><!-- head_tools -->

	</div><!-- head_navigation -->

	<!-- MOBILE NAVIGATION -->
	<div id="mobile_navigation" style="display: none;">
		<div id="mobile_navigation_controls">
			<a id="mobile_navigation_subscribe" class="button"
			   href="<?php bloginfo( 'url' ); ?>/subscribe">Subscribe</a>
			<a id="mobile_navigation_toggle" href="#">NAV</a>
			<script type="text/javascript">
				jQuery( function () {
					jQuery( '#mobile_navigation_toggle' ).click( function ( e ) {
						e.preventDefault();
						jQuery( '#mobile_navigation_content' ).slideToggle();
						jQuery( this ).toggleClass( 'active' );
					} );
				} );
			</script>
		</div>
		<div id="mobile_navigation_content" style="display: none;">
			<div id="mobile_nav-wrap">

				<div class="nav">
					<?php wp_nav_menu( array(
						'theme_location' => 'header_main_menu',
						'container'      => '',    // removes auto generated bounding box.
						'depth'          => 1, // 0 is infinite.
						'reverse'        => false,
						'menu_class'     => ''
					) ); ?>
				</div>

				<div class="nav nav_sub">
					<?php wp_nav_menu( array(
						'theme_location' => 'header_sub_menu',
						'container'      => '',    // removes auto generated bounding box.
						'depth'          => 1, // 0 is infinite.
						'reverse'        => false,
						'menu_class'     => ''
					) ); ?>
				</div>

			</div><!-- mobile_nav-wrap -->


			<div id="mobile_head_tools_buttons">
				<a id="mobile_head_tools_buttons_facebook" target="_BLANK"
				   href="https://www.facebook.com/NewYorkWineEvents">Facebook</a>
				<a id="mobile_head_tools_buttons_twitter" target="_BLANK" href="https://twitter.com/NYWineEvents">Twitter</a>
				<a id="mobile_head_tools_buttons_instagram" target="_BLANK"
				   href="http://www.instagram.com/newyorkwineevents">Instagram</a>
				<a id="mobile_head_tools_buttons_search" href="<?php bloginfo( 'url' ); ?>/search">Search</a>
			</div><!-- mobile_header_social -->
		</div><!-- mobile_navigation_content -->
	</div><!-- MOBILE NAVIGATION -->


</div><!--  END HEADER  -->