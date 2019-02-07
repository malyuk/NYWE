<?php get_header(); ?>
 
<!-- BANNER IMAGE -->
<?php 
    $page_banner = get_post_custom_values('page_banner');
    if ( is_array($page_banner) && end($page_banner) != '' ) { 
        echo '<div id="post_banner_image" class="page_banner">';
        echo '<img class="page_banner_img" src="' . end($page_banner) . '" />'; 
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                echo '<h1 class="page_banner_title">' . get_the_title() . '</h1>';      
                echo '<h6 class="page_banner_author">by ' . get_the_author() . '</h6>';  
            } 
        } 
        echo '</div><!-- banner -->';
    }
    else {
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                echo '<div class="center">';                
                echo '<h1 class="page_non_banner_title">' . get_the_title() . '</h1>'; 
                echo '<h6 class="page_non_banner_author">by ' . get_the_author() . '</h6>';                  
                echo '</div><!-- center -->';
            } 
        }         
    } 
?>


<!-- INTRO -->
<?php 
$trigger = get_post_custom_values('postIntro');
if ( is_array($trigger) && end($trigger) != '' ) : 
?>
    <div id="post_intro" class="center">
        <?php 
        $value = get_post_custom_values('postIntro'); 
        if ( is_array($value) && end($value) != '' ) {             
            echo end($value); 
        } 
        ?>
    </div>
<?php endif; ?>
<!-- intro -->


<!-- BULLETS -->
<?php 
$trigger = get_post_custom_values('postBulletHeading_1');
if ( is_array($trigger) && end($trigger) != '' ) : 
?>
    <div id="post_bullets" class="center">
        <?php
        // 1:
        $value = get_post_custom_values('postBulletHeading_1'); 
        if ( is_array($value) && end($value) != '' ) {          
            echo '<div class="post_bullet_cell">';    
            echo '<h3 class="post_bullet_cell_heading">' . end($value) . '</h3>';             
            $blurb = get_post_custom_values('postBulletText_1');
            if ( is_array($blurb) && end($blurb) != '' ) {             
                echo '<div class="post_bullet_cell_text">' . end($blurb) . '</div>'; 
            }         
            echo '</div><!-- cell -->';
        }
        // 2:
        $value = get_post_custom_values('postBulletHeading_2'); 
        if ( is_array($value) && end($value) != '' ) {          
            echo '<div class="post_bullet_cell">';    
            echo '<h3 class="post_bullet_cell_heading">' . end($value) . '</h3>';             
            $blurb = get_post_custom_values('postBulletText_2');
            if ( is_array($blurb) && end($blurb) != '' ) {             
                echo '<div class="post_bullet_cell_text">' . end($blurb) . '</div>'; 
            }         
            echo '</div><!-- cell -->';
        }
        // 3:
        $value = get_post_custom_values('postBulletHeading_3'); 
        if ( is_array($value) && end($value) != '' ) {          
            echo '<div class="post_bullet_cell">';    
            echo '<h3 class="post_bullet_cell_heading">' . end($value) . '</h3>';             
            $blurb = get_post_custom_values('postBulletText_3');
            if ( is_array($blurb) && end($blurb) != '' ) {             
                echo '<div class="post_bullet_cell_text">' . end($blurb) . '</div>'; 
            }         
            echo '</div><!-- cell -->';
        }
        ?>
    </div>
<?php endif; ?>
<!-- bullets -->


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

<!-- CMS -->
<div id="posts_cms" class="center">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>        
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
        </div><!-- end postNavigation -->
</div><!-- cms -->


<!-- FEATURED -->    
<div id="post_events_related">
    <h2 id="post_events_related_heading">FEATURED EVENTS</h2>
    <div id="post_events_related_grid">        
        <?php 
        $events_list = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => 25 )); 
        while ( $events_list->have_posts() ) : $events_list->the_post(); 
        ?>
            <div class="post_related_list_cell" id="<?php the_ID(); ?>">
                <span class="post_related_list_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>            
                <!-- Event image (featured) -->
	            <?php
	            $event_image = get_field( 'event_image' );
	            if ( ! empty( $event_image ) ) {
		            echo \NYWE\generate_lazy_load_params(
			            sprintf( '<img class="post_related_list_cell_image" src="%s" srcset="%s" alt="New York Wine Events">',
				            wp_get_attachment_image_url( $event_image, 'large' ),
				            wp_get_attachment_image_srcset( $event_image )
			            )
		            );
	            } ?>
                <!-- Content -->
                <div class="post_related_list_cell_content">
                    <!-- Date and Time Overlay -->
                    <div class="post_related_list_cell_image_overlay">
                        <h3 class="post_related_list_cell_image_overlay_date">
	                        <?= date( 'F j, Y', strtotime( get_field( 'event_date', false, false ) ) ); ?>
                        </h3>
	                    <?php
	                    $event_city = get_field( 'event_city' );
	                    if ( ! empty( $event_city ) ) {
		                    printf( '<h4 class="post_related_list_cell_image_overlay_time">%s</h4>',
			                    esc_html( $event_city )
		                    );
	                    } ?>
                    </div><!-- overlay -->   
                    <div class="post_related_list_cell_card">                            
                        <h2 class="post_related_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post_related_list_cell_card_excerpt"><?php the_excerpt(); ?></div>
                        <a class="post_related_list_cell_card_purchase" href="<?php the_permalink(); ?>">PURCHASE TICKETS</a>
                    </div><!-- card -->
                </div><!-- content -->    
            </div><!-- cell -->                        
        <?php endwhile; ?> 
    </div><!-- grid -->
    <!-- LOGIC -->
    <script type="text/javascript">
        // 0) Remove current event from recommended:
        var url = window.location.href;
        var currentEvent = jQuery('.post_related_list_cell');
        currentEvent.each(
            function(){
                var itemUrl = jQuery(this).find('.post_related_list_cell_card_purchase').attr('href');
                if ( itemUrl === url ) {
                    jQuery(this).remove();
                }
            }
        );
        // 1) Hide Expired:
        var events = jQuery('.post_related_list_cell');
        events.each(function(){
            // Process date:
            var date = jQuery(this).find('span.post_related_list_cell_publish_date').text(); 
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
        jQuery('.post_related_list_cell').reverse().prependTo('#post_events_related_grid');
        // 3) Show 2:
        events.each(function(index, value){
            var item = jQuery(this);
            if ( item.is(':visible') ){
                item.addClass('visibleRelated');
            }
        });
        jQuery('.visibleRelated').slice(1).addClass('visibleRelatedMore');
        jQuery('.visibleRelatedMore').hide();         
    </script>
</div><!-- related -->





<!-- RELATED WINE BLOGS -->    
<div id="post_blog_related">
    <h2 id="post_blog_related_heading">RELATED WINE BLOGS</h2>

    <div class="post_blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'post' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i <= 3 ) {
                $i = $i + 1;
                echo '<div class="loop_cell">';
                echo '<a class="loop_cell_image" href="' . get_the_permalink() . '" title="Read the full Article.">';
                echo get_the_post_thumbnail( $post_id, array(480,480) );                
                echo '</a>';
                echo '<h3 class="loop_cell_date">' . get_the_time('l, F jS, Y') . '</h3>';
                echo '<a class="loop_cell_title" href="' . get_the_permalink() . '" title="Read the full Article">' . get_the_title() . '</a>';                
                echo '<div class="loop_cell_excerpt">' . get_the_excerpt() . '</div>';
                echo '<a class="loop_cell_more" href="' . get_the_permalink() . '">Read more...</a>';                
                echo '</div><!-- ..cell -->';
            }                
        }
        ?>
    </div><!-- post_grid -->



    <a id="post_blog_more_button" href="#">LOAD MORE</a>
    <script type="text/javascript">
    jQuery(function(){
        jQuery('#post_blog_more_button').click(
            function(e){
                e.preventDefault();
                jQuery(this).fadeOut('slow');
                jQuery('#post_blog_more').slideDown();
            }
        );
    });
    </script>


    <div id="post_blog_more" style="display: none;" class="post_blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'post' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 5 ) { 
                $i = $i + 1;
            }
            if ( $i >= 5 && $i < 25 ) {
                $i = $i + 1;
                echo '<div class="loop_cell">';
                echo '<a class="loop_cell_image" href="' . get_the_permalink() . '" title="Read the full Article.">';
                echo get_the_post_thumbnail( $post_id, array(480,480) );                
                echo '</a>';
                echo '<h3 class="loop_cell_date">' . get_the_time('l, F jS, Y') . '</h3>';
                echo '<a class="loop_cell_title" href="' . get_the_permalink() . '" title="Read the full Article.">' . get_the_title() . '</a>';                
                echo '<div class="loop_cell_excerpt">' . get_the_excerpt() . '</div>';
                echo '<a class="loop_cell_more" href="' . get_the_permalink() . '">Read more...</a>';                
                echo '</div><!-- ..cell -->';
            }                
        }
        ?>
    </div><!-- grid -->


</div><!-- post_blog_related -->





<script type="text/javascript">
    // TWEAKS:
    jQuery(function(){
        // Tweak Footer margin:
        jQuery('#footer').css('margin-top', '0');
        // Remove Legacy ADVERT TAG and <hr>:
        var x = jQuery('p');
        x.each(
            function(){
                var y = jQuery(this).text();
                if ( y === 'ADVERT' ) {
                    jQuery(this).hide();
                    jQuery(this).next().hide();
                    jQuery(this).prev().hide();
                }
            }
        );
        // Remove Legacy <p>&nbsp;</p> spacings:
        var x = jQuery('p');
        x.each(
            function(){
                var y = jQuery(this).html();
                if ( y === '&nbsp;' ) {
                    jQuery(this).hide();
                }
            }
        );        
    });
</script>

<!-- FOOTER -->
<?php get_footer(); ?>