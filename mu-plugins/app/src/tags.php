<?php

namespace NYWE;

add_action( 'wp_head', function () {
	?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-M7GSCD');</script>
	<!-- End Google Tag Manager -->

	<?php
} );

add_action( 'after_body_open_tag', function () {
	?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7GSCD"
	                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php
} );

add_action( 'wp_footer', function() {
	?>
	<script type='text/javascript'>
		var zaius = window['zaius']||(window['zaius']=[]);zaius.methods=["initialize","onload","event","entity","identify","anonymize","dispatch"];zaius.factory=function(e){return function(){var t=Array.prototype.slice.call(arguments);t.unshift(e);zaius.push(t);return zaius}};(function(){for(var i=0;i<zaius.methods.length;i++){var method=zaius.methods[i];zaius[method]=zaius.factory(method)}var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=("https:"===document.location.protocol?"https://":"http://")+"d1igp3oop3iho5.cloudfront.net/v2/w81ZGFe69acnQOEZctJbsQ/zaius-min.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();

		// Edits to this script should only be made below this line.
		zaius.event('pageview');
	</script>
	<?php
});
