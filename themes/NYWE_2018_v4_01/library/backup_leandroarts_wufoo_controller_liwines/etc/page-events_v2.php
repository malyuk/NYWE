<?php
/*
Template Name: page-leandroarts-events-v2
*/
?>

<?php get_header('global'); ?>

			
<div id="leandroarts" style="
    margin: 0px auto 20px;
    width: 100%;
    overflow: hidden;
    background: #fafafa;
    display: block;
    float: left;
    clear: both;
    padding: 5% 10%;  
">

<h2>UPCOMING EVENTS</h2>

<!-- LIST OF EVENTS -->
<div id="events_list">
    <?php 
    $events_list = new WP_Query( array( 'post_type' => 'LIWC-events', 'posts_per_page' => 50 )); 
    while ( $events_list->have_posts() ) : $events_list->the_post(); 
    ?>
    <div class="events_list_cell" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">

        <span class="events_list_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>            

        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>

        <h3 class="events_list_cell_image_overlay_date"><?php $value = get_post_custom_values('event_date'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?></h3>

        <hr />

        <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <hr />

        <h4 class="events_list_cell_image_overlay_time">
            <?php $value = get_post_custom_values('event_time'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>
            &nbsp;-&nbsp;
            <?php $value = get_post_custom_values('event_time_end'); if ( is_array($value) && end($value) != '' ) { echo end($value); } ?>    
        </h4>                            

        <hr />

        <?php the_excerpt(); ?>

        <hr />

        <?php echo '<h4><a class="events_list_cell_card_purchase" href="' . get_permalink( $post->ID) . '">PURCHASE TICKETS</a></h4>'; ?>                   

    </div><!-- cell -->                        
    <?php endwhile; ?> 

    <!-- LOGIC -->
    <script type="text/javascript">
    // 1) Hide Expired:
    // HIDE PAST EVENTS:
    var events = jQuery('.events_list_cell');
    events.each(function(){
        // Process date:
        var date = jQuery(this).find('span.events_list_cell_publish_date').text(); 
        var date = Date.parse(date); 
        var date = date.toString();
        var date = date.slice(0,6);
        // Process today:
        var today = new Date(); 
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10) {
                dd='0'+dd
            } 
            if(mm<10) {
                mm='0'+mm
            } 
        var today = mm+'/'+dd+'/'+yyyy;
        var today = Date.parse(today); 
        var today = today.toString();
        var today = today.slice(0,6);              
        // Compare:
        if ( date < today) {
            jQuery(this).hide();
        }
    });            

    // 2) Reverse Order:
    jQuery.fn.reverse = [].reverse;
    jQuery('.events_list_cell').reverse().prependTo('#events_list');

    </script>

</div><!-- events_list -->




</div><!-- container -->

<div id="footer">

</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>
