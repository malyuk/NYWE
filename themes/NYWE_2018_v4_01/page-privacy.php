<?php
/*
Template Name: Privacy
*/
?>

<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
?>
   
<!-- BANNER IMAGE -->
<div id="about_banner_image" class="page_banner">
    <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <img src="<?php bloginfo('template_url'); ?>/images/banner_privacy.jpg" />
</div><!-- banner -->


<!-- CONTAINER -->
<div id="about">

    <!-- INTRO TEXT -->
    <div id="about_cms_intro">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div><!-- cms intro -->


    <!-- SIGN UP FORM -->
    <div id="about_signup">
        <h2 id="about_signup_heading">SIGN UP</h2>
        <p id="about_signup_intro">
            Dont miss new event updates, reports and discount offers from New York Wine Events - sign up now!                                                        
        </p>
        <form id="about_signup_form" action="https://newjerseywinefestivals.us6.list-manage.com/subscribe/post?u=da778b0b532a20f59d31779a3&id=d6c5ffde20" method="get" name="about_signup_form">
            <input type="submit" value="SIGN UP">
        </form>
    </div><!-- signup -->


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