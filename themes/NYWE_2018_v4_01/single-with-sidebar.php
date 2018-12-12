<?php get_header(); ?>
   
<!-- FEATURED PAGE BANNER -->
<div class="page_banner">
    <?php 
      $page_banner = get_post_custom_values('page_banner');
      if ( is_array($page_banner) && end($page_banner) != '' ) { echo '<img class="page_banner_img" src="' . end($page_banner) . '" />'; } 
    ?>    
</div><!-- banner -->


<!-- ADVERT 4 -->
<?php 
$options = get_option( 'theme_settings' ); 
$override = get_post_custom_values('advert');
if ( is_array($override) && end($override) != '' ) { 
    echo '<div class="advert">' . end($override) . '</div>';
}
else{
    if( $options['global_advert_4']) { 
        echo '<div class="advert">' . $options['global_advert_4'] . '</div>';         
    } 
}
?> 
    

<!-- CONTAINER -->
<div class="center">

    <!-- CONTENT -->
    <div class="content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h1><?php the_title(); ?></h1>
        
            <div id="cms_content" style="clear: both;">
                <?php the_content(); ?>
            </div>
        
        <?php endwhile; endif; ?>
            

        <div id="post_navigation">
            <hr />        
            <?php wp_link_pages(); ?>
            <span id="post_navigation_left"><?php previous_post_link('%link', 'Previous Article', TRUE); ?></span>  
            <span id="post_navigation_right"><?php next_post_link('%link', 'Next Article', TRUE); ?></span> 
            <hr />
            <a class="button" style="margin-top: 10%;" href="<?php bloginfo('url'); ?>/archive">See All Blog Posts</a>
        </div><!-- end postNavigation -->


        <!-- COMMENTS -->
        <?php comments_template( '', true ); ?>
        
    </div><!-- ..content -->


    <!-- SIDEBAR ACTION -->
    <?php include(TEMPLATEPATH . '/sidebar.php'); ?>    

    
</div><!-- ..container -->

<!-- FOOTER -->
<?php get_footer(); ?>