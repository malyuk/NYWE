<div id="footer">

	<div class="center">

		<img id="footer_logo" src="<?php bloginfo( 'template_url' ); ?>/images/footer_logo.png"
		     alt="New York Wine Events"/>

		<div class="footer_section">
			<p>
				We are bringing together wine and food lovers since 2003.<br/>
				<a href="<?php bloginfo( 'url' ); ?>/about">Read more about us &rightarrow;</a>
			</p>
			<div id="footer_social">
				<a id="footer_social_facebook" target="_BLANK" href="https://www.facebook.com/NewYorkWineEvents">Facebook</a>
				<a id="footer_social_twitter" target="_BLANK" href="https://twitter.com/NYWineEvents">Twitter</a>
				<a id="footer_social_instagram" target="_BLANK" href="http://www.instagram.com/newyorkwineevents">Instagram</a>
			</div>
		</div><!-- footer section -->

		<div class="footer_section">
			<h3>CONTACT US..</h3>
			<p>
				<strong>We’d love to hear from you!</strong>
				<br/> If you have a comment you’d like to share, would like advertising or sponsorship information about
				events, or want to recommend a wine,
				<br/> please <strong><a href="<?php bloginfo( 'url' ); ?>/contact">Contact Us</a></strong>
			</p>
			<?php /*
          <h3>WINE EVENTS IN..</h3>
          <a href="<?php bloginfo('url'); ?>/boston">Boston</a><br />
          <a href="<?php bloginfo('url'); ?>/chicago">Chicago</a><br />
          <a href="<?php bloginfo('url'); ?>/los-angeles">Los Angeles</a><br />
          <a href="<?php bloginfo('url'); ?>/new-york">New York</a><br />
          <a href="<?php bloginfo('url'); ?>/san-francisco">San Francisco</a><br />
          <a href="<?php bloginfo('url'); ?>/washington">Washington D.C.</a> 
        */ ?>
		</div><!-- footer section -->

		<div class="footer_section">
			<h3>ABOUT US</h3>

			<?php wp_nav_menu( array(
				'theme_location' => 'footer_about_us',
				'container'      => '',    // removes auto generated bounding box.
				'depth'          => 1, // 0 is infinite.
				'reverse'        => false,
				'menu_class'     => 'footer_about_us'
			) ); ?>

		</div><!-- footer section -->

		<a id="footer_up_arrow" href="#header">Back to top</a>

		<div id="footer_fineprint">
			<img src="<?php bloginfo( 'template_url' ); ?>/images/footer_fineprint.png" alt="New York Wine Events"/>
			<?php
			$footer_options   = get_field( 'footer', 'options' );
			$global_text      = $footer_options['global_footer_text'] ?? '';
			$conditional_text = $footer_options['conditional_footer_text'] ?? '';

			if ( ! empty( $global_text ) ) :
				echo wp_kses_post( $global_text );
			else : ?>
				<p>&#169; New York Events 2018. All rights reserved. Read our <a
							href="<?php bloginfo( 'url' ); ?>/ticket-purchase-terms-conditions">Terms &amp; Conditions</a>
					&amp; <a href="<?php bloginfo( 'url' ); ?>/privacy-policy/">Privay Policy</a>.</p>
			<?php
			endif;

			if ( ! empty( $conditional_text ) ) {

				// Ensure that we have a clean query.
				wp_reset_query();

				foreach( $conditional_text as $data ) {
					$page_ids = $data['page'] ?? [];
					$text     = $data['text'] ?? '';

					if ( empty( $text ) || ! in_array( get_the_ID(), $page_ids ) ) {
						continue;
					}

					echo wp_kses_post( $text );
				}
			} ?>
		</div>

	</div><!-- center -->

	<a id="linkLove" href="http://leandroarts.com" title="Web Design, Development, SEO"><strong>LEANDROARTS Web
			Development.</strong></a>

</div><!-- end Footer -->


<!-- JAVASCRIPT SCRIPTS -->
<?php include( TEMPLATEPATH . '/scripts.php' ); ?>

<!-- CUSTOM SCRITS -->
<?php $options = get_option( 'theme_settings' );
if ( $options['footer_custom_scripts'] ) {
	echo $options['footer_custom_scripts'];
} ?>


<!-- WP CORE -->
<?php wp_footer(); ?>

</body>

</html>
