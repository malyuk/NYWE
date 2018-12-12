<?php
/*
Template Name: Shop
*/
?>

<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
    $meta = get_post_meta($post->ID);
    // Usage:
    // $x = $meta['about_zigzag_1_image'];
    // if ( is_array($x) && end($x) != '' ) { echo end($x); 
?>
   
<!-- BANNER IMAGE -->
<div id="shop_banner_image" class="page_banner">
    <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <img src="<?php bloginfo('template_url'); ?>/images/banner_f.jpg" />
</div><!-- banner -->


<!-- CONTAINER -->
<div id="shop">

    <!-- INTRO TEXT -->
    <div id="shop_cms_intro">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div><!-- cms intro -->


    <!-- MERCHANDISE -->
    <div id="shop_merchandise">
        <h2 id="shop_merchandise_heading">MERCHANDISE</h2>
        <div id="shop_merchandise_grid">
            <?php // 1)
            $trigger = $meta['shop_product_1_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_1_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_1_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 2)
            $trigger = $meta['shop_product_2_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_2_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_2_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 3)
            $trigger = $meta['shop_product_3_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_3_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_3_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 4)
            $trigger = $meta['shop_product_4_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_4_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_4_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 5)
            $trigger = $meta['shop_product_5_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_5_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_5_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 6)
            $trigger = $meta['shop_product_6_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_6_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_6_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 7)
            $trigger = $meta['shop_product_7_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_7_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_7_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 8)
            $trigger = $meta['shop_product_8_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_8_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_8_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 9)
            $trigger = $meta['shop_product_9_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_9_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_9_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>
            <?php // 10)
            $trigger = $meta['shop_product_10_image'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>       
                <div class="shop_merchandise_product">
                    <a class="shop_merchandise_product_link" href="<?php $x = $meta['shop_product_10_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                        <img class="shop_merchandise_product_image" src="<?php $x = $meta['shop_product_10_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />  
                        <span class="shop_merchandise_product_overlay">PURCHASE</span>
                    </a>
                                      
                </div><!-- product -->
            <?php endif; ?>                                                                                                            
        </div><!-- grid --> 
        <a id="shop_merchandise_more" href="#">SHOW ALL</a>
    </div>
    <script type="text/javascript">
    jQuery(function(){
        // HIDE MORE THAN 4:
        var index = jQuery('.shop_merchandise_product');
        index.each(function(){
            var item = jQuery(this);
            if ( item.is(':visible') ){
                item.addClass('visibleProduct');
            }
        });
        jQuery('.visibleProduct').slice(4).addClass('visibleProductMore');
        jQuery('.visibleProductMore').hide();
        // Show All on click:
        jQuery('#shop_merchandise_more').click(
            function(e){
                e.preventDefault();
                jQuery('.visibleProductMore').slideDown();
                jQuery(this).hide();
            }
        );
    });
    </script>

<?php /*
    <!-- EVENT WINE AND FOOD -->
    <div id="shop_event">
        <h2 id="shop_event_heading">WINES &amp; FOOD</h2>

        <!-- EVENT -->
        <?php   
        $trigger = $meta['shop_event_1_name'];
        if ( is_array($trigger) && end($trigger) != '' ) : 
        ?>            
            <div id="shop_event_1" class="shop_event_cell">
                <div class="shop_event_cell_name">
                    <?php $x = $meta['shop_event_1_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>
                </div>
                <div class="shop_event_cell_link">
                    <a href="<?php $x = $meta['shop_event_1_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">Go to event page</a>
                </div>
                <div class="shop_event_cell_index">
                    <span>TABLE</span>
                    <span>PRODUCT</span>
                    <span>SPEC</span>
                    <span>PRICE</span>
                </div>
                <?php  // ITEM 1 
                $trigger = $meta['shop_event_1_item_1_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_1_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_1_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_1_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_1_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_1_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 2 
                $trigger = $meta['shop_event_1_item_2_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_2_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_2_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_2_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_2_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_2_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 3 
                $trigger = $meta['shop_event_1_item_3_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_3_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_3_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_3_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_3_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_3_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 4 
                $trigger = $meta['shop_event_1_item_4_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_4_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_4_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_4_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_4_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_4_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 5 
                $trigger = $meta['shop_event_1_item_5_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_5_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_5_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_5_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_5_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_5_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 6 
                $trigger = $meta['shop_event_1_item_6_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_6_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_6_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_6_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_6_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_6_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 7 
                $trigger = $meta['shop_event_1_item_7_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_7_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_7_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_7_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_7_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_7_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 8 
                $trigger = $meta['shop_event_1_item_8_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_8_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_8_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_8_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_8_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_8_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 9 
                $trigger = $meta['shop_event_1_item_9_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_9_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_9_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_9_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_9_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_9_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 10 
                $trigger = $meta['shop_event_1_item_10_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_10_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_10_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_10_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_10_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_10_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 11 
                $trigger = $meta['shop_event_1_item_11_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_11_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_11_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_11_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_11_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_11_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 12 
                $trigger = $meta['shop_event_1_item_12_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_12_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_12_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_12_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_12_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_12_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 13 
                $trigger = $meta['shop_event_1_item_13_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_13_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_13_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_13_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_13_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_13_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 14 
                $trigger = $meta['shop_event_1_item_14_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_14_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_14_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_14_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_14_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_14_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 15 
                $trigger = $meta['shop_event_1_item_15_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_15_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_15_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_15_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_15_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_15_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 16 
                $trigger = $meta['shop_event_1_item_16_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_16_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_16_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_16_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_16_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_16_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 17 
                $trigger = $meta['shop_event_1_item_17_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_17_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_17_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_17_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_17_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_17_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 18 
                $trigger = $meta['shop_event_1_item_18_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_18_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_18_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_18_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_18_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_18_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 19 
                $trigger = $meta['shop_event_1_item_19_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_19_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_19_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_19_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_19_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_19_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 20 
                $trigger = $meta['shop_event_1_item_20_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_1_item_20_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_20_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_20_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_1_item_20_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_1_item_20_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
            </div><!-- cell -->
            <a id="shop_event_1_more" href="#">SHOW ALL</a>
        <?php endif; ?>

        <script type="text/javascript">
        jQuery(function(){
            // HIDE MORE THAN 4:
            var index = jQuery('#shop_event_1 .shop_event_cell_item');
            index.each(function(){
                var item = jQuery(this);
                if ( item.is(':visible') ){
                    item.addClass('visibleItems_1');
                }
            });
            jQuery('.visibleItems_1').slice(3).addClass('visibleItemsMore_1');
            jQuery('.visibleItemsMore_1').hide();
            // Show All on click:
            jQuery('#shop_event_1_more').click(
                function(e){
                    e.preventDefault();
                    jQuery('.visibleItemsMore_1').slideDown();
                    jQuery(this).hide();
                }
            );
        });
        </script>
        <!-- event -->



        <!-- EVENT 2 -->
        <?php   
        $trigger = $meta['shop_event_2_name'];
        if ( is_array($trigger) && end($trigger) != '' ) : 
        ?>            
            <div id="shop_event_2" class="shop_event_cell">
                <div class="shop_event_cell_name">
                    <?php $x = $meta['shop_event_2_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>
                </div>
                <div class="shop_event_cell_link">
                    <?php $x = $meta['shop_event_2_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>
                </div>
                <div class="shop_event_cell_index">
                    <span>TABLE</span>
                    <span>PRODUCT</span>
                    <span>SPEC</span>
                    <span>PRICE</span>
                </div>
                <?php  // ITEM 1 
                $trigger = $meta['shop_event_2_item_1_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_1_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_1_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_1_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_1_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_1_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 2 
                $trigger = $meta['shop_event_2_item_2_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_2_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_2_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_2_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_2_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_2_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 3 
                $trigger = $meta['shop_event_2_item_3_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_3_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_3_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_3_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_3_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_3_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 4 
                $trigger = $meta['shop_event_2_item_4_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_4_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_4_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_4_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_4_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_4_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 5 
                $trigger = $meta['shop_event_2_item_5_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_5_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_5_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_5_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_5_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_5_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 6 
                $trigger = $meta['shop_event_2_item_6_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_6_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_6_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_6_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_6_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_6_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 7 
                $trigger = $meta['shop_event_2_item_7_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_7_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_7_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_7_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_7_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_7_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 8 
                $trigger = $meta['shop_event_2_item_8_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_8_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_8_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_8_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_8_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_8_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 9 
                $trigger = $meta['shop_event_2_item_9_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_9_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_9_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_9_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_9_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_9_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 10 
                $trigger = $meta['shop_event_2_item_10_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_10_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_10_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_10_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_10_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_10_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 11 
                $trigger = $meta['shop_event_2_item_11_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_11_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_11_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_11_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_11_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_11_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 12 
                $trigger = $meta['shop_event_2_item_12_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_12_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_12_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_12_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_12_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_12_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 13 
                $trigger = $meta['shop_event_2_item_13_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_13_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_13_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_13_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_13_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_13_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 14 
                $trigger = $meta['shop_event_2_item_14_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_14_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_14_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_14_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_14_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_14_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 15 
                $trigger = $meta['shop_event_2_item_15_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_15_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_15_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_15_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_15_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_15_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 16 
                $trigger = $meta['shop_event_2_item_16_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_16_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_16_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_16_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_16_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_16_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 17 
                $trigger = $meta['shop_event_2_item_17_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_17_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_17_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_17_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_17_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_17_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 18 
                $trigger = $meta['shop_event_2_item_18_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_18_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_18_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_18_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_18_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_18_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 19 
                $trigger = $meta['shop_event_2_item_19_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_19_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_19_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_19_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_19_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_19_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->
                <?php  // ITEM 20 
                $trigger = $meta['shop_event_2_item_20_name'];
                if ( is_array($trigger) && end($trigger) != '' ) : 
                ?>                   
                    <div class="shop_event_cell_item">
                        <span><?php $x = $meta['shop_event_2_item_20_table']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_20_name']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_20_spec']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <span><?php $x = $meta['shop_event_2_item_20_price']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></span>
                        <a href="<?php $x = $meta['shop_event_2_item_20_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>" target="_BLANK">PURCHASE</a>                                      
                    </div>
                <?php endif; ?>
                <!-- item -->                
            </div><!-- cell -->
            <a id="shop_event_2_more" href="#">SHOW ALL</a>
        <?php endif; ?>

        <script type="text/javascript">
        jQuery(function(){
            // HIDE MORE THAN 4:
            var index = jQuery('#shop_event_2 .shop_event_cell_item');
            index.each(function(){
                var item = jQuery(this);
                if ( item.is(':visible') ){
                    item.addClass('visibleItems_2');
                }
            });
            jQuery('.visibleItems_2').slice(3).addClass('visibleItemsMore_2');
            jQuery('.visibleItemsMore_2').hide();
            // Show All on click:
            jQuery('#shop_event_2_more').click(
                function(e){
                    e.preventDefault();
                    jQuery('.visibleItemsMore_2').slideDown();
                    jQuery(this).hide();
                }
            );
        });
        </script>
        <!-- event -->
*/ ?>

</div><!-- shop -->


<!-- FOOTER -->
<?php get_footer(); ?>