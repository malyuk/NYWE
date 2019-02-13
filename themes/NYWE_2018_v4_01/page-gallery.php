<?php
/*
Template Name: Gallery
*/
?>
<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
?>

<!-- BANNER IMAGE -->
<div id="gallery_banner_image" class="page_banner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <?php endwhile; endif; ?>
	<?php
	if ( has_post_thumbnail( get_the_ID() ) ) {
		the_post_thumbnail( 'large' );
	} else {
		printf( '<img src="%s/images/banner_e.jpg" />',
			get_stylesheet_directory_uri()
		);
	} ?>
</div><!-- banner -->

   
<!-- CONTAINER -->
<div id="gallery">

    <div class="blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'gallery' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i <= 3 ) {
                $i = $i + 1;
                echo '<div class="loop_cell">';
                  echo '<a class="loop_cell_image ';
                    $x= get_post_custom_values('gallery_video');
                    if ( is_array($x) && end($x) != '' ) { echo 'video'; }                   
                    echo '" href="' . get_the_permalink() . '" title="Read the full Article.">';
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
    </div><!-- grid -->


    <!-- ADVERT 1 -->
    <?php 
    $options = get_option( 'theme_settings' ); 
    if( $options['global_advert_1']) { 
        echo '<div class="advert">' . $options['global_advert_1'] . '</div>';         
    } ?> 
        


    <div class="blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'gallery' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i <= 4 ) { 
                $i = $i + 1;
            }
            if ( $i > 4 && $i < 8 ) {
                $i = $i + 1;
              echo '<div class="loop_cell">';
                echo '<a class="loop_cell_image ';
                  $x = get_post_custom_values('gallery_video');
                  if ( is_array($x) && end($x) != '' ) { echo 'video'; }                   
                  echo '" href="' . get_the_permalink() . '" title="Read the full Article.">';
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
    </div><!-- grid -->



    <!-- ADVERT 2 -->
    <?php 
    $options = get_option( 'theme_settings' ); 
    if( $options['global_advert_2']) { 
        echo '<div class="advert">' . $options['global_advert_2'] . '</div>';         
    } ?> 
        


    <div class="blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'gallery' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 8 ) { 
                $i = $i + 1;
            }
            if ( $i >= 8 && $i < 11 ) {
                $i = $i + 1;
                echo '<div class="loop_cell">';
                echo '<a class="loop_cell_image ';
                  $x = get_post_custom_values('gallery_video');
                  if ( is_array($x) && end($x) != '' ) { echo 'video'; }                   
                  echo '" href="' . get_the_permalink() . '" title="Read the full Article.">';
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
    </div><!-- grid -->



    <a id="blog_more_button" href="#">LOAD MORE</a>
    <script type="text/javascript">
    jQuery(function(){
        jQuery('#blog_more_button').click(
            function(e){
                e.preventDefault();
                jQuery(this).fadeOut('slow');
                jQuery('#blog_more').slideDown();
            }
        );
    });
    </script>


    <div id="blog_more" style="display: none;">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'gallery' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 11 ) { 
                $i = $i + 1;
            }
            if ( $i >= 11 && $i < 45 ) {
                $i = $i + 1;
                echo '<div class="loop_cell">';
                echo '<h3 class="loop_cell_date">' . get_the_time('l, F jS, Y') . '</h3>';
                echo '<a class="loop_cell_title" href="' . get_the_permalink() . '" title="Read the full Article.">' . get_the_title() . '</a>';
                echo '<div class="loop_cell_excerpt">' . get_the_excerpt() . '</div>';
                echo '<a class="loop_cell_more" href="' . get_the_permalink() . '">Read more...</a>';
                echo '</div><!-- ..cell -->';
            }                
        }
        ?>
    </div><!-- grid -->




</div><!-- center -->


<script type="text/javascript">
    // TWEAKS:
    jQuery(function(){
        // a)
        jQuery('#footer').css('margin', '0');
        // b)
        jQuery('.loop_cell_excerpt').each(function(i){
            len = jQuery(this).text().length;
            if ( len > 140 ) {
                jQuery(this).text(
                jQuery(this).text().substr(0,140)+'...'
                );
            }
        });               
    });
</script>

<!-- FOOTER -->
<?php get_footer(); ?>