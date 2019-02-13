<?php
/*
Template Name: Membership
*/
?>

<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
    // Usage:
    // $x = $meta['about_zigzag_1_image'];
    // if ( is_array($x) && end($x) != '' ) { echo end($x); 
?>
   
<!-- BANNER IMAGE -->
<div id="membership_banner_image" class="page_banner">
    <h1 class="page_banner_title"><?php the_title(); ?></h1>
	<?php
	if ( has_post_thumbnail( get_the_ID() ) ) {
		the_post_thumbnail( 'large' );
	} else {
		printf( '<img src="%s/images/banner_c.jpg" />',
			get_stylesheet_directory_uri()
		);
	} ?>
</div><!-- banner -->


<!-- CONTAINER -->
<div id="membership">

    <!-- INTRO TEXT -->
    <div id="membership_cms_intro">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div><!-- cms intro -->


    <!-- ZIGZAG -->
    <?php   
    $trigger = $meta['membership_zigzag_image'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div id="membership_zig_zag">
            <img id="membership_zigzag_image" src="<?php $x = $meta['membership_zigzag_image'];
                                                            if ( is_array($x) && end($x) != '' ) { 
                                                                echo end($x); 
                                                            } ?>" alt="New York Wine Events" />    
            <div id="membership_zigzag_content">
                <h3 id="membership_zigzag_content_heading"><?php $x = $meta['membership_zigzag_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div id="membership_zigzag_content_text"><?php $x = $meta['membership_zigzag_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>
                <h4 id="membership_zigzag_content_price"><?php $x = $meta['membership_zigzag_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h4>
                <a id="membership_zigzag_content_purcase" href="<?php $x = $meta['membership_zigzag_purchase']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">PURCHASE</a>
                <hr />
                <span id="membership_zigzag_content_terms"><a href="#membership_description_terms_heading">Terms &amp; Conditions</a> apply</span>
            </div><!-- content -->
        </div><!-- zigzag -->
    <?php endif; ?>


    <!-- DESCRIPTION -->
    <?php   
    $trigger = $meta['membership_description_title'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div id="membership_description">
            <h3 id="membership_description_title"><?php $x = $meta['membership_description_title']; if ( is_array($x) && end($x) != '' ) { echo end ($x); } ?></h3>
            <div id="membership_description_content">
                <h4 id="membership_description_intro"><?php $x = $meta['membership_description_intro']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h4>
                <div id="membership_description_text"><?php $x = $meta['membership_description_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>
                <a id="membership_description_purcase" href="<?php $x = $meta['membership_zigzag_purchase']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">PURCHASE</a>
                <h3 id="membership_description_terms_heading">Terms &amp; Conditions</h3>
                <div id="membership_description_terms"><?php $x = $meta['membership_description_terms']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>
            </div><!-- content -->
        </div><!-- mem desc -->
    <?php endif; ?>


</div><!-- membership -->


<!-- FOOTER -->
<?php get_footer(); ?>