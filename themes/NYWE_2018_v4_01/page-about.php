<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
    // Usage:
    // $x = $meta['about_zigzag_1_image'];
    // if ( is_array($x) && end($x) != '' ) { echo end($x); } 
?>
   
<!-- BANNER IMAGE -->
<div id="about_banner_image" class="page_banner">
    <h1 class="page_banner_title"><?php the_title(); ?></h1>
	<?php
	if ( has_post_thumbnail( get_the_ID() ) ) {
		the_post_thumbnail( 'large' );
	} else {
		printf( '<img src="%s/images/banner_a.jpg" />',
			get_stylesheet_directory_uri()
		);
	} ?>
</div><!-- banner -->


<!-- CONTAINER -->
<div id="about">

    <!-- INTRO TEXT -->
    <div id="about_cms_intro">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div><!-- cms intro -->


    <!-- ZIGZAG 1 -->
    <?php   
    $trigger = $meta['about_zigzag_1_image'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div class="about_zig_zag">
            <img class="about_zigzag_image" src="<?php $x = $meta['about_zigzag_1_image'];
                                                            if ( is_array($x) && end($x) != '' ) { 
                                                                echo end($x); 
                                                            } ?>" alt="New York Wine Events" />    
            <div class="about_zigzag_content">
                <h3 class="about_zigzag_content_heading"><?php $x = $meta['about_zigzag_1_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <p class="about_zigzag_content_text"><?php $x = $meta['about_zigzag_1_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></p>
            </div><!-- content -->
        </div><!-- zigzag -->
    <?php endif; ?>

    <!-- ZIGZAG 2 -->
    <?php   
    $trigger = $meta['about_zigzag_2_image'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div class="about_zig_zag">
            <div class="about_zigzag_content">
                <h3 class="about_zigzag_content_heading"><?php $x = $meta['about_zigzag_2_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <p class="about_zigzag_content_text"><?php $x = $meta['about_zigzag_2_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></p>
            </div><!-- content -->
            <img class="about_zigzag_image" src="<?php $x = $meta['about_zigzag_2_image'];
                                                            if ( is_array($x) && end($x) != '' ) { 
                                                                echo end($x); 
                                                            } ?>" alt="New York Wine Events" />    

        </div><!-- zigzag -->
    <?php endif; ?>

    <!-- ZIGZAG 3 -->
    <?php   
    $trigger = $meta['about_zigzag_3_image'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div class="about_zig_zag">
            <img class="about_zigzag_image" src="<?php $x = $meta['about_zigzag_3_image'];
                                                            if ( is_array($x) && end($x) != '' ) { 
                                                                echo end($x); 
                                                            } ?>" alt="New York Wine Events" />    
            <div class="about_zigzag_content">
                <h3 class="about_zigzag_content_heading"><?php $x = $meta['about_zigzag_3_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <p class="about_zigzag_content_text"><?php $x = $meta['about_zigzag_3_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></p>
            </div><!-- content -->
        </div><!-- zigzag -->
    <?php endif; ?>

	<?php echo get_signup_form(); ?>

    <!-- CONTACT US FORM -->
    <div id="about_contact">
        <div id="about_contact_map">
            <div id="about_contact_map_overlay">
                Winship Media LLC <br>
                New York Wine Events <br>
                720 Greenwich Street, suite 8A <br>
                New York, NY 10014 <br>
                &nbsp;<br>
                +1 877-571-6690
            </div>
            <img src="<?php bloginfo('template_url'); ?>/images/about_contact_map.jpg" alt="Map image" /> 
        </div>
        <div id="about_contact_us">
            <h2 id="about_contact_us_heading">CONTACT US</h2>
                <!-- START EMBED -->
                <div id="wufoo-q1n0dkl20hq397i">
                Fill out my <a href="https://newyorkwineevents.wufoo.com/forms/q1n0dkl20hq397i">online form</a>.
                </div>
                <script type="text/javascript">var q1n0dkl20hq397i;(function(d, t) {
                var s = d.createElement(t), options = {
                'userName':'newyorkwineevents',
                'formHash':'q1n0dkl20hq397i',
                'autoResize':true,
                'height':'534',
                'async':true,
                'host':'wufoo.com',
                'header':'show',
                'ssl':true};
                s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
                s.onload = s.onreadystatechange = function() {
                var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
                try { q1n0dkl20hq397i = new WufooForm();q1n0dkl20hq397i.initialize(options);q1n0dkl20hq397i.display(); } catch (e) {}};
                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
                })(document, 'script');</script>
                <!-- END EMBED -->
        </div>
    </div><!-- contact us -->

</div><!-- about -->


<!-- FOOTER -->
<?php get_footer(); ?>