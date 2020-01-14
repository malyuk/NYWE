<?php
/*
Template Name: Homepage
*/

get_header();

// SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
    // Usage:
    // $x = $meta['about_zigzag_1_image'];
    // if ( is_array($x) && end($x) != '' ) { echo end($x);
?>

<!-- FEATURED -->
<div class="featured">

  <?php $loop_features = new WP_Query(array('post_type' => 'slideshow_post', 'posts_per_page' => 1)); ?>
  <?php while ( $loop_features->have_posts() ) : $loop_features->the_post(); ?>

    <div class="featured_content">

        <!-- Headings -->
        <?php
            $x = $meta['slideshow_heading_1'];
            if ( is_array($x) && end($x) != '' ) {
              echo '<h3>';
              echo end($x);
              echo '</h3>';
            }

            $x = $meta['slideshow_heading_2']; if ( is_array($x) && end($x) != '' ) {
              echo '<h2>';
              echo end($x);
              echo '</h2>';
            }
        ?>

        <!-- Button -->
        <a href="
            <?php
            $x = $meta['urlOveride']; if ( is_array($x) && end($x) != '' ) {
              echo end($x);
            }
            else {
              ?><?php the_permalink(); ?><?php
            }
            ?>
        ">
          <?php $x = $meta['slideshow_button']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>
        </a><!-- link -->

    </div><!-- featured content -->

      <!-- Desktop Image -->
      <img class="featured_slide_large" src="
              <?php
                $x = $meta['slideshow_image']; if ( is_array($x) && end($x) != '' ) {
                  echo end($x);
                }
              ?>" alt="New York Wine Events" />

      <!-- Mobile Image -->
      <img class="featured_slide_mobile" style="display: none;" src="
              <?php
                $x = $meta['slideshow_image_mobile']; if ( is_array($x) && end($x) != '' ) {
                  echo end($x);
                }
              ?>" alt="New York Wine Events" />
  <?php endwhile; ?>

</div><!-- end Featured -->


	<!-- SUB FEATURED -->
	<div id="home_sub_featured">
		<div id="home_sub_featured_cell_left">
			<!-- TESTIMONIALS -->
			<?php // 1
			$trigger = $meta['home_testimonial_name_1'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_1'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_1'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<?php // 2
			$trigger = $meta['home_testimonial_name_2'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_2'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_2'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<?php // 3
			$trigger = $meta['home_testimonial_name_3'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_3'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_3'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<?php // 4
			$trigger = $meta['home_testimonial_name_4'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_4'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_4'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<?php // 5
			$trigger = $meta['home_testimonial_name_5'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_5'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_5'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<?php // 6
			$trigger = $meta['home_testimonial_name_6'];
			if ( is_array( $trigger ) && end( $trigger ) != '' ) {
				echo '<div class="home_sub_testimonial">';
				// Quote
				$x = $meta['home_testimonial_quote_6'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo end( $x );
				}
				// Name
				$x = $meta['home_testimonial_name_6'];
				if ( is_array( $x ) && end( $x ) != '' ) {
					echo '<span class="sub_featured_testimonial_person">- ' . end( $x ) . '</span>';
				}
				echo '</div>';
			}
			?>
			<script type="text/javascript">
              jQuery(function () {
                var random = Math.floor(Math.random() * jQuery('.home_sub_testimonial').length)
                jQuery('.home_sub_testimonial').hide().eq(random).show()
              })
			</script>
			<a id="sub_featured_testimonial_more"
			   href="<?php bloginfo( 'url' ); ?>/new-york-wine-events-reviews/">Read more guest
				reviews &rightarrow;</a>
		</div><!-- cell -->
		<div id="home_sub_featured_cell_right">
			<?php
			$press = get_field( 'press_module', get_queried_object_id() );

			if ( ! empty( $press ) ) :
				echo '<ul>';
				foreach ( $press as $item ) :
					echo '<li>';
					echo wp_get_attachment_image( $item['logo'] );
					printf( '<p>%s</p>', esc_html( $item['text']));
					echo '</li>';
				endforeach;
				echo '</ul>';
			endif; ?>
		</div><!-- cell -->
	</div><!-- sub featured -->


<!-- ADVERT 1 -->
<?php
$options = get_option( 'theme_settings' );
if( $options['global_advert_1']) {
    echo '<div class="advert">' . $options['global_advert_1'] . '</div>';
} ?>


<!-- EVENTS -->
<div id="home_events">
  <div class="center">
    <div class="home_headings">
      <h2>EVENTS</h2>
      <h2>UPCOMING</h2>
    </div>
    <?php $loop_events = new WP_Query(array('post_type' => 'events', 'order' => 'DESC', 'posts_per_page' => 25)); ?>
    <?php while ( $loop_events->have_posts() ) : $loop_events->the_post(); ?>
      <div class="home_events_cell">
        <span class="home_event_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>
        <div class="home_events_cell_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="home_events_cell_date">
	        <?= date( 'F j, Y', strtotime( get_field( 'event_date', false, false ) ) ); ?>
        </div>
        <div class="home_events_cell_city">
	        <?= get_field( 'event_city' ); ?>
        </div>
        <?php // SOLD OUT?
        $eventSoldout = get_field('event_sold_out');
        if ( $eventSoldout ) {
          echo '<a class="home_events_cell_button sold_out" href="' . get_permalink( $post->ID) . '">SOLD OUT</a>';
        }
        else {
          echo '<a class="home_events_cell_button" href="' . get_permalink( $post->ID) . '">TICKETS &amp; INFO</a>';
        }
        ?>
        <div class="home_events_cell_excerpt"><?php the_excerpt(); ?></div>
      </div><!-- event cell -->
    <?php endwhile; ?>

    <a id="home_events_more_button" href="#">ALL EVENTS</a>
    <a id="home_events_more_listed" href="<?php bloginfo('url'); ?>/submit-event-form">Get YOUR event listed! &rightarrow;</a>

    <!-- LOGIC -->
    <script type="text/javascript">
        // HIDE PAST EVENTS:
        var events = jQuery('.home_events_cell');
        events.each(function(){
          // Process date:
          var date = jQuery(this).find('span.home_event_cell_publish_date').text();
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
        // CHANGE SORT ON ACTIVE:
        jQuery.fn.reverse = [].reverse;
        jQuery('.home_events_cell').reverse().insertAfter('#home_events div.home_headings');

        // HIDE MORE THAN 8:
        events.each(function(index, value){
              var item = jQuery(this);
              if ( item.is(':visible') ){
                item.addClass('visibleEvent');
              }
        });
        jQuery('.visibleEvent').slice(2).addClass('visibleEventMore');
        jQuery('.visibleEventMore').hide();

        // SHOW MORE THAN 2 ON CLICK:
        jQuery(function(){
          jQuery('#home_events_more_button').click(
              function(e){
                e.preventDefault();
                jQuery('.visibleEventMore').slideDown();
                jQuery('#home_events_more_button').fadeOut();
              }
          );
        });
    </script>


  </div><!-- center -->
</div><!-- end Events -->

<!-- DAYTRIP -->
<div id="home_daytrip">
  <?php $loop_daytrip = new WP_Query(array('post_type' => 'daytrip', 'order' => 'DESC', 'posts_per_page' => 25)); ?>
  <?php while ( $loop_daytrip->have_posts() ) : $loop_daytrip->the_post(); ?>
    <!-- Slides -->
    <div class="home_daytrip_cell">
      <span class="home_daytrip_cell_publish_date" style="display: none;"><?php the_time('F j, Y'); ?></span>
      <img class="daytrip_slide_large" src="
              <?php
                $daytrip_image = get_post_custom_values('daytrip_image');
                if ( is_array($daytrip_image) && end($daytrip_image) != '' ) {
                  echo end($daytrip_image);
                }
              ?>" alt="New York Wine Daytrips" />
      <div class="home_daytrip_cell_title">
        <span class="home_daytrip_cell_title_pre">DAY TRIP TO</span>
        <span class="home_daytrip_cell_title_cms"><?php the_title(); ?></span>
      </div>
      <div class="home_daytrip_cell_details">
        <div class="home_daytrip_cell_excerpt"><?php the_excerpt(); ?></div>
        <div class="home_daytrip_cell_date"><?php $daytripDate = get_post_custom_values('daytripDate'); if ( is_array($daytripDate) && end($daytripDate) != '' ) { echo end($daytripDate); } ?></div>
        <div class="home_daytrip_cell_city"><?php $daytripCity = get_post_custom_values('daytripCity'); if ( is_array($daytripCity) && end($daytripCity) != '' ) { echo end($daytripCity); } ?></div>
        <?php // SOLD OUT?
          $daytripSoldout = get_post_custom_values('daytripSoldout');
          $daytripSoldout = $daytripSoldout[0];
          if ( $daytripSoldout == 'on' ) {
            echo '<a class="home_daytrip_cell_button sold_out" href="' . get_permalink( $post->ID) . '">SOLD OUT</a>';
          }
          else {
            echo '<a class="home_daytrip_cell_button" href="' . get_permalink( $post->ID) . '">RESERVE YOUR SPOT</a>';
          }
        ?>
      </div><!-- details -->
    </div><!-- daytrip cell -->
  <?php endwhile; ?>

  <a href="#" id="daytrip_nav_next">NEXT SLIDE</a>
  <a href="#" id="daytrip_nav_prev">PREVIOUS SLIDE</a>
  <div id="daytrip_pagination"></div>


  <!-- ## SLIDESHOW LOGIC ## -->
  <script type="text/javascript">
      // HIDE PAST DAYTRIPS:
      var daytrip = jQuery('.home_daytrip_cell');
      daytrip.each(function(){
        // Process date:
        var date = jQuery(this).find('span.home_daytrip_cell_publish_date').text();
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

      // CHANGE SORT ON ACTIVE:
      jQuery.fn.reverse = [].reverse;
      jQuery('.home_daytrip_cell').reverse().prependTo('#home_daytrip');

      // LIMIT EXCERPT LENGHTS:
      jQuery('.home_daytrip_cell_excerpt').each(function(i){
        len = jQuery(this).text().length;
        if ( len > 140 ) {
          jQuery(this).text(
            jQuery(this).text().substr(0,140)+'...'
          );
        }
      });
  </script>

  <!-- DAYTRIP SLIDESHOW LOGIC -->
  <script type="text/javascript">
    jQuery(function(){
      // SCREEN WIDTH ACTIVATION:
      var screenWidth =  jQuery(window).width();
      if ( screenWidth > 800 ) {
        // SETUP:
        var slides = jQuery('.home_daytrip_cell');
        var counter = 0;
        slides.each(
          function(){
            counter = counter + 1;
            jQuery(this).attr('id','slide_' + counter);
            jQuery(this).css('display', 'none');
            if ( jQuery(this).attr('id') === 'slide_1' ) {
              jQuery(this).addClass('active');
            }
          }
        );

        // SHOW NEXT SLIDE:
        var next_slide = function next_slide(){
          slides.each(
            function(){
              if ( jQuery(this).hasClass('active') === true ) {
                jQuery(this).removeClass('active');
                jQuery('#daytrip_pagination a.active').removeClass('active');
                var nextSlide = jQuery(this).next('.home_daytrip_cell');
                if( nextSlide.length != 0 ) {
                  jQuery(this).next().addClass('active_tmp'); // So that the next each() doesnt get tripped..
                  var slideNumber = jQuery(this).next().attr('id');
                  jQuery('#daytrip_pagination a.'+slideNumber).addClass('active');
                }
                if( nextSlide.length == 0 ) {
                  jQuery('#slide_1').addClass('active');
                  jQuery('#daytrip_pagination a.slide_1').addClass('active');
                }
              }
              if ( jQuery(this).hasClass('active_tmp') === true ) {
                jQuery(this).removeClass('active_tmp');
                jQuery(this).addClass('active');
              }
            }
          );
        } // next..

        // SHOW PREVIOUS SLIDE:
        var previous_slide = function previous_slide(){
          slides.each(
            function(){
              if ( jQuery(this).hasClass('active') === true ) {
                jQuery(this).removeClass('active');
                jQuery('#daytrip_pagination a.active').removeClass('active');
                var prevSlide = jQuery(this).prev('.home_daytrip_cell');
                if( prevSlide.length != 0 ) {
                  prevSlide.addClass('active');
                  var slideNumber = jQuery(this).prev().attr('id');
                  jQuery('#daytrip_pagination a.'+slideNumber).addClass('active');
                }
                if( prevSlide.length == 0 ) {
                  jQuery(this).addClass('active');
                  jQuery('#daytrip_pagination a.slide_1').addClass('active');
                  startLoop();
                }
              }
            }
          );
        } // next..

        // LOOP INIT:
        function startLoop() {
          loop = setInterval(next_slide, 7000);
        }
        startLoop(); // Activate on load
        // Stop:
        function stopLoop() {
          clearInterval(loop);
        }

        // NAVIGATION:
        // Next:
        jQuery('#daytrip_nav_next').show().click(
          function(e){
            e.preventDefault();
            stopLoop();
            next_slide();
          }
        );
        // Previous:
        jQuery('#daytrip_nav_prev').show().click(
          function(e){
            e.preventDefault();
            stopLoop();
            previous_slide();
          }
        );

        // PAGINATION:
        var counter = 0;
        slides.each(
          function(){
            counter = counter + 1;
            jQuery('#daytrip_pagination').append('<a href="#" class="slide_' + counter + '">' + counter + '</a>');
          }
        );

      } // if screen 800+ px
    });
  </script>
</div><!-- daytrip -->

<!-- ARTICLES -->
<div id="home_articles">
  <div class="home_headings">
      <h2>ARTICLES</h2>
      <h2>WINE BLOG</h2>
    </div>
  <div class="center">
    <?php $i = 1; ?>
    <?php $loop_articles = new WP_Query(array('post_type' => 'post')); ?>
    <?php while ( $loop_articles->have_posts() ) : $loop_articles->the_post(); ?>
      <?php // Manually limit posts, plugin conflict preventing Wordpress post per page hook :/
      if ( $i <= 3 ) {
        $i = $i + 1;
        ?>
        <div class="home_articles_cell">
          <div class="home_articles_cell_image">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( array(360,360) ); ?>
            </a>
          </div>
          <div class="home_articles_cell_details">
            <h6><?php the_date(); ?></h6>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="home_articles_cell_details_excerpt"><?php the_excerpt(); ?></div>
            <a class="home_articles_cell_details_readmore" href="<?php the_permalink(); ?>">Read more...</a>
          </div>
        </div>
        <?php
      }
      ?>
    <?php endwhile; ?>
  </div>

  <a id="home_articles_more_button" href="<?php bloginfo('url'); ?>/wine-blog/">ALL ARTICLES</a>

  <script>
    // LIMIT EXCERPT LENGHTS:
    jQuery('.home_articles_cell_details p').each(function(i){
      len = jQuery(this).text().length;
      if ( len > 140 ) {
        jQuery(this).text(
          jQuery(this).text().substr(0,140)+'...'
        );
      }
    });
  </script>

</div><!-- articles -->



<!-- ADVERT 2 -->
<?php
$options = get_option( 'theme_settings' );
if( $options['global_advert_2']) {
    echo '<div class="advert">' . $options['global_advert_2'] . '</div>';
} ?>



<!-- SPONSORS -->
<div id="home_sponsors">
  <div class="home_headings">
      <h2><?= date('Y'); ?></h2>
      <h2>SPONSORS</h2>
    </div>
  <div id="home_sponsors_grid" class="center">
    <?php $i = 1; ?>
    <?php $loop_sponsors = new WP_Query(array('post_type' => 'sponsors')); ?>
    <?php while ( $loop_sponsors->have_posts() ) : $loop_sponsors->the_post(); ?>

        <a href="<?php  $urlOveride2 = get_post_custom_values('urlOveride2');
                        if ( is_array($urlOveride2) && end($urlOveride2) != '' ) {
                          echo end($urlOveride2);
                        }
                        else {
                          ?><?php the_permalink(); ?><?php
                        }
                        ?> ">
                        <?php the_post_thumbnail( array(360,360) ); ?></a>

    <?php endwhile; ?>
  </div><!-- center -->
  <a id="home_sponsors_join" href="<?php bloginfo('url'); ?>/sponsorship">Want to join as sponsor? &#8594;</a>
</div><!-- sponsors -->


<?php get_footer(); ?>