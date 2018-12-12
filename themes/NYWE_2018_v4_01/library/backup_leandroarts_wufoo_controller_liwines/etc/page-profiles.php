<?php
/*
Template Name: page-leandroarts-profiles
*/
?>

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

<h2>PROFILES</h2>

<h3>&nbsp;</h3>


<h3>Winery</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'winery') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- winery_list -->


<h3>Attractions</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'attractions') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- attractions_list -->


<h3>Dining</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'dining') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- dining_list -->


<h3>Lodging</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'lodging') {
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- Lodging_list -->


<h3>Transportation</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'transportation') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>                
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>                    
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- transport_list -->


<h3>Services</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'services') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>                
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>                    
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- services_list -->


<h3>Misc</h3>

<div class="profiles_list">
        <?php 
        $profile_list = new WP_Query( array( 'post_type' => 'profile', 'orderby' => 'title', 'order'   => 'DESC' )); 
        while ( $profile_list->have_posts() ) : $profile_list->the_post(); 
        ?>
            <?php
            // CHECK AUTHOR CATEGORY
            $category = get_the_author_meta('category');
            $category = strtolower($category);
            if ( $category == 'misc') { 
                // check premium?
                $gate = get_the_author_meta('gate');
                $gate = strtolower($gate);
                ?>                
                <div class="events_list_cell <?php echo 'gate' . $gate; ?>" id="<?php the_ID(); ?>" style="margin: 25px auto 25px; padding: 25px; border: 2px solid #d8b98b;">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
                    <h3 class="events_list_cell_card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <hr />
                    <?php the_excerpt(); ?>                    
                    <hr />
                    <?php echo '<h4><a href="' . get_permalink( $post->ID) . '">View Profile</a></h4>'; ?>                   
                </div><!-- cell -->
            <?php }
            ?>                    
        <?php endwhile; ?> 
</div><!-- misc_list -->



<script type="text/javascript">
jQuery(function(){
    // Highlight:
    jQuery('.gate12').css('background', '#eef8ff');    
    // Sort Order:
    var listing = jQuery('.gate12');
    listing.each(
        function(){
            jQuery(this).prependTo( jQuery(this).parent() );
        }
    ); 
});
</script>


</div><!-- container -->

<div id="footer">

</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>
