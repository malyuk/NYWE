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
<div id="event" class="content" style="width: 100%;">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div id="event_meta">

        <!-- TITLE -->
        <h2><?php the_title(); ?></h2>

        <hr />
              
        <!-- DATE -->
        <h3><?php $value = get_post_custom_values('event_date'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?></h3>

        <hr />
              
        <!-- TIME -->
        <h3>
            <?php $value = get_post_custom_values('event_time'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>
            &nbsp;-&nbsp;
            <?php $value = get_post_custom_values('event_time_end'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>    
        </h3>                            

        <hr />
            
        <!-- PLACE -->
        <h3><?php $value = get_post_custom_values('event_place'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?></h3>
      
        <hr />
        
        <!-- BUTTON -->
        <a style="background: #4da752; border-radius: 6px; color: #fff; font-weight: bold; padding: 1em; display: inline-block; font-size: 1.5em; margin: 20px 0 40px;" href="<?php $value = get_post_custom_values('event_ticket_url'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>">PURCHASE TICKETS</a>
      
    </div><!-- meta -->

    <!-- IMAGE -->
    <div id="featured_image"><?php the_post_thumbnail( 'large' ); ?></div>  
    

    <hr />
    
    <!-- CMS -->
    <div id="event_CMS" class="center">
      <?php the_content(); ?>
    </div>    

    <hr />
    
    <!-- VIDEO EMBED -->
    <?php 
    $trigger = get_post_custom_values('event_video');
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>
        <div id="event_video">
            <?php $value = get_post_custom_values('event_video'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>
        </div>
    <?php endif; ?>
    <!-- video -->


  <?php endwhile; endif; // Page Loop ?>                  
    


</div><!-- container -->

<div id="footer">

</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>    