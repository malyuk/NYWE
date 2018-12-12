<?php
/*
Template Name: Archive
*/
?>

<?php get_header(); ?>

<!-- BANNER IMAGE -->
<div id="blog_banner_image" class="page_banner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <?php endwhile; endif; ?>
    <img src="<?php bloginfo('template_url'); ?>/images/banner_h.jpg"  alt="banner" />
</div><!-- banner -->

   
<!-- CONTAINER -->
<div id="blog">

    <div class="blog_grid">
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
        $loop = new WP_Query( array( 'post_type' => 'post' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 3 ) { 
                $i = $i + 1;
            }
            if ( $i >= 3 && $i < 6 ) {
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



    <!-- ADVERT 2 -->
    <?php 
    $options = get_option( 'theme_settings' ); 
    if( $options['global_advert_2']) { 
        echo '<div class="advert">' . $options['global_advert_2'] . '</div>';         
    } ?> 
        


    <div class="blog_grid">
        <?php // LOOP:
        $i = 1;             
        $loop = new WP_Query( array( 'post_type' => 'post' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 6 ) { 
                $i = $i + 1;
            }
            if ( $i >= 6 && $i < 9 ) {
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
        $loop = new WP_Query( array( 'post_type' => 'post' ) ); 
        while ( $loop -> have_posts() ) {
            $loop -> the_post();
            if ( $i < 9 ) { 
                $i = $i + 1;
            }
            if ( $i >= 9 && $i < 45 ) {
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