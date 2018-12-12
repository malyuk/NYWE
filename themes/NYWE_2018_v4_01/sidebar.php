<!-- SIDEBAR -->
<div class="sidebar">

	<!-- MAILING LIST -->
	<div id="widget_mailing" class="widget">
		<h3 class="widgettitle">MAILING LIST</h3>
		<!-- Begin MailChimp Signup Form -->
		<link href="https://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
		</style>
		<div id="mc_embed_signup">
		<form action="http://newjerseywinefestivals.us6.list-manage.com/subscribe/post?u=da778b0b532a20f59d31779a3&amp;id=d6c5ffde20" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			
		<div class="mc-field-group">
			<label for="mce-EMAIL" style="clear: both;">Email Address </label>
			<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" style="clear: both;">
		</div>
		<div class="mc-field-group">
			<label for="mce-FNAME" style="clear: both;">First Name </label>
			<input type="text" value="" name="FNAME" class="required" id="mce-FNAME" style="clear: both;">
		</div>
		<div class="mc-field-group">
			<label for="mce-MMERGE10" style="clear: both;">State </label>
			<input type="text" value="" name="MMERGE10" class="required" id="mce-MMERGE10" style="clear: both;">
		</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</form>
		</div>
		<!--End mc_embed_signup-->
	</div>
	<!-- end MAILING LIST -->
		
	<!-- SIDEBAR SPONSORS -->
    <?php include( TEMPLATEPATH . '/sidebar_sponsors.php' );  ?>



	<!-- WIDGITIZE -->
	<ul>
	  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
	  <?php endif; ?>
	</ul>
	<!-- wigitize -->


</div><!-- end Sidebar -->