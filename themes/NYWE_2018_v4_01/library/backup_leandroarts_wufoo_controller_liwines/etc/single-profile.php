<?php get_header('global'); ?>

			
<div style="
    margin: 0px auto 20px;
    width: 100%;
    overflow: hidden;
    background: #fafafa;
    display: block;
    float: left;
    clear: both;
    padding: 5% 10%;  
">

<!-- CONTENT -->
<div id="profile" class="content" style="width: 100%;">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- IMAGE -->
    <div id="featured_image"><?php the_post_thumbnail( 'large' ); ?></div>  

    <hr />
    
    <!-- TITLE -->
    <h2><?php the_title(); ?></h2>

    <hr />
    
    <!-- WEBSITE URL -->
    <a style="background: #316096; border-radius: 6px; color: #fff; font-weight: bold; padding: 1em; display: inline-block; font-size: 1.5em; margin: 20px 0 40px;" href="<?php $value = get_post_custom_values('profile_website_url'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>">VISIT WEBSITE</a>

    <hr />
    
    <!-- CMS -->
    <div id="event_CMS" class="center">
      <?php the_content(); ?>
    </div>    



  <?php endwhile; endif; // Page Loop ?>                  
    


</div><!-- container -->

<div id="footer">

</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>    