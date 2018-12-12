<?php
/*
Template Name: Sponsorship
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
<div id="sponsorship_banner_image" class="page_banner">
    <h1 class="page_banner_title"><?php the_title(); ?></h1>
    <img src="<?php bloginfo('template_url'); ?>/images/banner_x.jpg" />
</div><!-- banner -->


<!-- CONTAINER -->
<div id="sponsorship">

    <!-- INTRO TEXT -->
    <div id="sponsorship_cms_intro">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div><!-- cms intro -->



    <!-- INTRO -->
    <?php   
    $trigger = $meta['sponsorship_intro_heading'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <div id="sponsorship_intro">
            <h3 id="sponsorship_intro_heading"><?php $x = $meta['sponsorship_intro_heading']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
            <div id="sponsorship_intro_text"><?php $x = $meta['sponsorship_intro_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>
            <a id="sponsorship_intro_contact" href="<?php $x = $meta['sponsorship_intro_contact_url']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">CONTACT US</a>
        </div><!-- intro -->
    <?php endif; ?>


    <!-- DEMOGRAPHICS -->
    <?php   
    $trigger = $meta['sponsorship_demo_banner'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <h2 id="sponsorship_demo_heading">DEMOGRAPHICS</h2>
        <div id="sponsorship_demo">
            <img id="sponsorship_demo_image" src="<?php $x = $meta['sponsorship_demo_banner'];
                                                            if ( is_array($x) && end($x) != '' ) { 
                                                                echo end($x); 
                                                            } ?>" alt="New York Wine Events" />    
            <div id="sponsorship_demo_highlight">
                <div class="sponsorship_demo_highlight_cell">
                    <h3 class="sponsorship_demo_highlight_cell_title"><?php $x = $meta['sponsorship_demo_highlight_1_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                    <div class="sponsorship_demo_highlight_cell_text"><?php $x = $meta['sponsorship_demo_highlight_1_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>            
                </div><!-- cell -->
                <div class="sponsorship_demo_highlight_cell">
                    <h3 class="sponsorship_demo_highlight_cell_title"><?php $x = $meta['sponsorship_demo_highlight_2_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                    <div class="sponsorship_demo_highlight_cell_text"><?php $x = $meta['sponsorship_demo_highlight_2_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>            
                </div><!-- cell -->
                <div class="sponsorship_demo_highlight_cell">
                    <h3 class="sponsorship_demo_highlight_cell_title"><?php $x = $meta['sponsorship_demo_highlight_3_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                    <div class="sponsorship_demo_highlight_cell_text"><?php $x = $meta['sponsorship_demo_highlight_3_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div>            
                </div><!-- cell -->
            </div><!-- highlight -->
        </div><!-- demo -->
    <?php endif; ?>


    <!-- CHANNELS -->
    <?php   
    $trigger = $meta['sponsorship_channel_1_logo'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <h2 id="sponsorship_channel_heading">THE REACH OF OUR CHANNELS</h2>
        <div id="sponsorship_channel">
            <!-- Channel 1 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_1_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_1_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_1_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 2 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_2_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_2_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_2_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 3 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_3_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_3_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_3_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 4 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_4_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_4_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_4_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 5 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_5_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_5_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_5_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 6 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_6_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_6_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_6_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 7 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_7_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_7_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_7_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->
            <!-- Channel 8 -->
            <div class="sponsorship_channel_cell">
                <img id="sponsorship_channel_cell_image" src="<?php $x = $meta['sponsorship_channel_8_logo'];
                                                                if ( is_array($x) && end($x) != '' ) { 
                                                                    echo end($x); 
                                                                } ?>" alt="New York Wine Events" />
                <h3 class="sponsorship_channel_cell_title"><?php $x = $meta['sponsorship_channel_8_title']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></h3>
                <div class="sponsorship_channel_cell_text"><?php $x = $meta['sponsorship_channel_8_text']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?></div> 
            </div><!-- cell -->                                                        
        </div><!-- channel -->
    <?php endif; ?>




    <!-- SLIDES MODULE -->
    <?php 
    $trigger = $meta['sponsorship_slide_1'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>    
        <div id="sponsorship_slides">
            <?php // 1:
            $trigger = $meta['sponsorship_slide_1'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>    
            <div class="sponsorship_slides_cell">
                <img class="sponsorship_slides_image" src="
                            <?php  
                                $x = $meta['sponsorship_slide_1'];
                                if ( is_array($x) && end($x) != '' ) { 
                                    echo end($x); 
                                } 
                            ?>" alt="New York Wine Events" />    
            </div><!-- cell -->
            <?php endif; ?>
            <?php // 2:
            $trigger = $meta['sponsorship_slide_2'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>    
            <div class="sponsorship_slides_cell">
                <img class="sponsorship_slides_image" src="
                            <?php  
                                $x = $meta['sponsorship_slide_2'];
                                if ( is_array($x) && end($x) != '' ) { 
                                    echo end($x); 
                                } 
                            ?>" alt="New York Wine Events" />    
            </div><!-- cell -->
            <?php endif; ?>
            <?php // 3:
            $trigger = $meta['sponsorship_slide_3'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>    
            <div class="sponsorship_slides_cell">
                <img class="sponsorship_slides_image" src="
                            <?php  
                                $x = $meta['sponsorship_slide_3'];
                                if ( is_array($x) && end($x) != '' ) { 
                                    echo end($x); 
                                } 
                            ?>" alt="New York Wine Events" />    
            </div><!-- cell -->
            <?php endif; ?>
            <?php // 4:
            $trigger = $meta['sponsorship_slide_4'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>    
            <div class="sponsorship_slides_cell">
                <img class="sponsorship_slides_image" src="
                            <?php  
                                $x = $meta['sponsorship_slide_4'];
                                if ( is_array($x) && end($x) != '' ) { 
                                    echo end($x); 
                                } 
                            ?>" alt="New York Wine Events" />    
            </div><!-- cell -->
            <?php endif; ?>
            <?php // 5:
            $trigger = $meta['sponsorship_slide_5'];
            if ( is_array($trigger) && end($trigger) != '' ) : 
            ?>    
            <div class="sponsorship_slides_cell">
                <img class="sponsorship_slides_image" src="
                            <?php  
                                $x = $meta['sponsorship_slide_5'];
                                if ( is_array($x) && end($x) != '' ) { 
                                    echo end($x); 
                                } 
                            ?>" alt="New York Wine Events" />    
            </div><!-- cell -->
            <?php endif; ?>
            <a href="#" id="sponsorship_slides_nav_next">NEXT SLIDE</a>
            <a href="#" id="sponsorship_slides_nav_prev">PREVIOUS SLIDE</a> 
            <div id="sponsorship_slides_pagination"></div>
            <!-- SLIDESHOW LOGIC -->
            <script type="text/javascript">
            jQuery(function(){
                // SCREEN WIDTH ACTIVATION:
                var screenWidth =  jQuery(window).width();
                if ( screenWidth > 800 ) {
                // SETUP:
                var slides = jQuery('.sponsorship_slides_cell');
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
                        jQuery('#sponsorship_slides_pagination a.active').removeClass('active');
                        var nextSlide = jQuery(this).next('.sponsorship_slides_cell');
                        if( nextSlide.length != 0 ) {
                            jQuery(this).next().addClass('active_tmp'); // So that the next each() doesnt get tripped.. 
                            var slideNumber = jQuery(this).next().attr('id');
                            jQuery('#sponsorship_slides_pagination a.'+slideNumber).addClass('active');
                        }
                        if( nextSlide.length == 0 ) {
                            jQuery('#slide_1').addClass('active'); 
                            jQuery('#sponsorship_slides_pagination a.slide_1').addClass('active');                  
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
                        jQuery('#sponsorship_slides_pagination a.active').removeClass('active');
                        var prevSlide = jQuery(this).prev('.sponsorship_slides_cell');
                        if( prevSlide.length != 0 ) {
                            prevSlide.addClass('active');   
                            var slideNumber = jQuery(this).prev().attr('id');
                            jQuery('#sponsorship_slides_pagination a.'+slideNumber).addClass('active');
                        }
                        if( prevSlide.length == 0 ) {
                            jQuery(this).addClass('active');
                            jQuery('#sponsorship_slides_pagination a.slide_1').addClass('active');
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
                jQuery('#sponsorship_slides_nav_next').show().click(
                    function(e){
                    e.preventDefault();
                    stopLoop();
                    next_slide();
                    }
                );
                // Previous:
                jQuery('#sponsorship_slides_nav_prev').show().click(
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
                    jQuery('#sponsorship_slides_pagination').append('<a href="#" class="slide_' + counter + '">' + counter + '</a>');
                    }
                );        

                } // if screen 800+ px
            });
            </script>
        </div> <!-- sponsorship_slides -->
    <?php endif; ?>


    <!-- PARTNERS -->
    <?php   
    $trigger = $meta['sponsorship_partner_1_image'];
    if ( is_array($trigger) && end($trigger) != '' ) : 
    ?>       
        <h2 id="sponsorship_partners_heading">OUR PARTNERS</h2>
        <div id="sponsorship_partners">
            <!-- 1 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_1_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_1_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 2 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_2_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_2_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 3 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_3_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_3_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 4 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_4_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_4_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 5 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_5_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_5_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 6 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_6_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_6_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 7 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_7_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_7_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->
            <!-- 8 -->
            <div class="sponsorship_partners_cell">
                <h5 class="sponsorship_partners_cell_label">Official Partner</h5>
                <a class="sponsorship_partners_cell_link" href="<?php $x = $meta['sponsorship_partner_8_link']; if ( is_array($x) && end($x) != '' ) { echo end($x); } ?>">
                    <img class="sponsorship_partners_image" src="<?php $x = $meta['sponsorship_partner_8_image'];
                                                                    if ( is_array($x) && end($x) != '' ) { 
                                                                        echo end($x); 
                                                                    } ?>" alt="New York Wine Events" />
                </a>
            </div><!-- cell -->                                                
        </div><!-- partner -->
    <?php endif; ?>



    <!-- REQUEST FORM -->
    <div id="sponsorship_form">
        <h2 id="sponsorship_form_heading">WINE FESTIVAL SPONSORSHIP REQUEST</h2>
        <p id="sponsorship_form_intro"></p>
        <?php /*
        <form id="sponsorship_form_form" action="" method="post" name="about_signup_form">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="tel" name="telephone" placeholder="Your phone number" required>
            <input type="email" name="email" placeholder="Your email address" required>
            <input type="text" name="organization" placeholder="Your organization name" required>
            <input type="submit" value="SUBMIT REQUEST">
        </form>
        */ ?>
        <?php echo do_shortcode('[wufoo username="newyorkwineevents" formhash="mnw17u71gfn1mj" autoresize="true" height="678" header="show" ssl="true"]'); ?>
        


    </div><!-- form -->


</div><!-- sponsorship -->


<script type="text/javascript">
    // TWEAKS:
    jQuery(function(){
        jQuery('#footer').css('margin', '0');
    });
</script>

<!-- FOOTER -->
<?php get_footer(); ?>