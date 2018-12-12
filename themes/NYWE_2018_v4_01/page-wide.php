<?php
/*
Template Name: Wide
*/
?>

<?php get_header(); ?>

<!-- ADVERT 1 -->
<?php 
$options = get_option( 'theme_settings' ); 
$override = get_post_custom_values('advert');
if ( is_array($override) && end($override) != '' ) { 
    echo '<div class="advert">' . end($override) . '</div>';
}
else{
    if( $options['global_advert_1']) { 
        echo '<div class="advert">' . $options['global_advert_1'] . '</div>';         
    } 
}
?> 

<!-- CONTAINER -->
<div class="center" style="margin-top: 0px; max-width: 1920px;">


      <!-- CONTENT -->
      <div class="content">
    
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1 class="heading"><?php the_title(); ?></h1>
                
                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

            <?php endwhile; endif; ?>

    </div><!-- content -->

</div><!-- ..container -->

<!-- FOOTER -->
<?php get_footer(); ?>