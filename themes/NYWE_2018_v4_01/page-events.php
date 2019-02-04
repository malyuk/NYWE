<?php
/*
Template Name: Events v4
*/
?>

<?php get_header(); ?>
   
<!-- BANNER IMAGE -->
<div id="events_banner_image" class="page_banner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <?php endwhile; endif; ?>
    <img src="<?php bloginfo('template_url'); ?>/images/banner_b.jpg" />
</div><!-- banner -->


<!-- CONTAINER -->
<div id="events">

        <!-- INTRO TEXT -->
        <div id="events_cms_intro">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div><!-- cms intro -->

        <!-- EVENTS INDEX  -->
        <div id="events_index">
            <?php 
            $events_index = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => 50 )); 
            while ( $events_index->have_posts() ) : $events_index->the_post(); 
            ?>
                <div class="events_index_cell">
                    <span class="events_index_cell_publish_date" style="display: none;">
	                    <?php the_time('F j, Y'); ?>
                    </span>
                    <a class="events_index_cell_link" href="#<?php the_ID(); ?>"><?php the_title(); ?></a>
                    <span class="events_index_cell_date">
	                    <?php
	                    $event_date = get_field( 'event_date', false, false );
	                    if ( ! empty( $event_date ) ) {

		                    $event_date = date( 'F d, Y', strtotime( $event_date ) );
		                    echo $event_date;
		                    
	                    } ?>
                    </span>
                </div><!-- cell -->            
            <?php endwhile; ?> 
            
            <a class="events_index_more" href="#">SHOW ALL</a>

            <script type="text/javascript">
            // LOGIC:
            // 1) HIDE EXPIRED:
            var index = jQuery('.events_index_cell');
            index.each(function(){
            // Process date:
            var date = jQuery(this).find('span.events_index_cell_publish_date').text(); 
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

            // 2) CHANGE SORT ON ACTIVE:
            jQuery.fn.reverse = [].reverse;
            jQuery('.events_index_cell').reverse().prependTo('#events_index');

            // 3) HIDE MORE THAN 3:
            index.each(function(index, value){
                var item = jQuery(this);
                if ( item.is(':visible') ){
                    item.addClass('visibleEvent');
                }
            });
            jQuery('.visibleEvent').slice(3).addClass('visibleEventMore');
            jQuery('.visibleEventMore').hide();

            // 4) Show All on click:
            jQuery(function(){
                jQuery('.events_index_more').click(
                    function(e){
                        e.preventDefault();
                        jQuery('.visibleEventMore').slideDown();
                        jQuery('.visibleEventMore2').slideDown();
                        jQuery('.events_index_more').slideUp();
                        jQuery('.events_list_more').slideUp();
                    }
                );
            });               
            </script>
        </div><!-- events_index -->


        <!-- LIST OF EVENTS -->
        <div id="events_list">
            <?php 
            $events_list = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => 50 )); 
            while ( $events_list->have_posts() ) : $events_list->the_post(); 
            ?>
            <div class="events_list_cell" id="<?php the_ID(); ?>">
                <span class="events_list_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>            
                <!-- Event image (featured) -->
	            <?php
	            $event_image = get_field( 'event_image' );
	            if ( ! empty( $event_image ) ) {
		            echo \NYWE\generate_lazy_load_params(
			            sprintf( '<img class="events_list_cell_image" src="%s" srcset="%s" alt="New York Wine Events">',
				            wp_get_attachment_image_url( $event_image, 'large' ),
				            wp_get_attachment_image_srcset( $event_image )
			            )
		            );
	            } ?>

                <!-- Content -->
                <div class="events_list_cell_content">
                    <!-- Date and Time Overlay -->
                    <div class="events_list_cell_image_overlay">
	                    <?php
	                    $event_date = get_field( 'event_date', false, false );
	                    if ( ! empty( $event_date ) ) {

		                    $event_date = date( 'F d, Y', strtotime( $event_date ) );

		                    printf( '<h3 class="events_list_cell_image_overlay_date">%s</h3>',
			                    esc_html( $event_date )
		                    );
	                    }

	                    $event_city = get_field( 'event_city' );
	                    if ( ! empty( $event_city ) ) {
		                    printf( '<h4 class="events_list_cell_image_overlay_time">%s</h4>',
			                    esc_html( $event_city )
		                    );
	                    } ?>
                    </div><!-- overlay -->   
                    <div class="events_list_cell_card">                            
                        <h2 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="events_list_cell_card_excerpt">
	                        <?php
	                        $event_time = get_field( 'event_time' );
	                        if ( ! empty( $event_time ) ) {
		                        printf( '<span>%s</span>',
			                        wp_kses_post( $event_time )
		                        );
	                        } ?>
	                        <?php the_excerpt(); ?>
                        </div>
	                    <?php
	                    $event_sold_out = get_field( 'event_sold_out' );
	                    if ( $event_sold_out ) {
		                    echo '<a class="events_list_cell_card_purchase sold_out" href="' . get_the_permalink() . '">SOLD OUT</a>';
	                    } else {
		                    echo '<a class="events_list_cell_card_purchase" href="' . get_the_permalink() . '">PURCHASE TICKETS</a>';
	                    } ?>
                    </div><!-- card -->
                </div><!-- content -->    
            </div><!-- cell -->                        
            <?php endwhile; ?> 

            <!-- Load more -->
            <a class="events_list_more" href="#">LOAD MORE</a>

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
            
            // 3) Show 3:
            events.each(function(index, value){
                var item = jQuery(this);
                if ( item.is(':visible') ){
                    item.addClass('visibleEvent2');
                }
            });
            jQuery('.visibleEvent2').slice(3).addClass('visibleEventMore2');
            jQuery('.visibleEventMore2').hide(); 
                       
            // 4) Show All on click, including Event inded above
            jQuery(function(){
                jQuery('.events_list_more').click(
                    function(e){
                        e.preventDefault();
                        jQuery('.visibleEventMore').slideDown();
                        jQuery('.visibleEventMore2').slideDown();
                        jQuery('.events_index_more').slideUp();
                        jQuery('.events_list_more').slideUp();
                    }
                );
            });                     
            </script>

        </div><!-- events_list -->
        

</div><!-- events -->

<!-- FOOTER -->
<?php get_footer(); ?>