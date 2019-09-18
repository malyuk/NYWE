<?php get_header(); ?>


<!-- BANNER IMAGE -->
<div id="gallery_banner_image" class="page_banner">
	<h1 class="page_banner_title"><?php the_title(); ?></h1>
	<img src="<?php bloginfo( 'template_url' ); ?>/images/banner_g.jpg"/>
</div><!-- banner -->


<!-- CMS -->
<div id="gallery_cms" class="center">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="cms_content" style="clear: both;">
			<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
</div><!-- cms -->


	<!-- VIDEO EMBED -->
<?php
$trigger = get_post_custom_values( 'gallery_video' );
if ( is_array( $trigger ) && end( $trigger ) != '' ) :
	?>
	<div id="gallery_video">
		<?php $x = get_post_custom_values( 'gallery_video' );
		if ( is_array( $x ) && end( $x ) != '' ) {
			echo end( $x );
		} ?>
	</div>
<?php endif; ?>
	<!-- video -->


	<!-- SLIDES MODULE -->
<?php
$trigger = get_post_custom_values( 'gallerySlide_1' );
if ( is_array( $trigger ) && end( $trigger ) != '' ) :
	?>
	<div id="gallery_slides">
		<?php
		$trigger = get_post_custom_values( 'gallerySlide_1' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
			?>
			<div class="gallery_slides_cell">
				<img class="gallery_slides_image" src="
                        <?php
				$image = get_post_custom_values( 'gallerySlide_1' );
				if ( is_array( $image ) && end( $image ) != '' ) {
					echo end( $image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- cell -->
		<?php endif; ?>
		<?php
		$trigger = get_post_custom_values( 'gallerySlide_2' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
			?>
			<div class="gallery_slides_cell">
				<img class="gallery_slides_image" src="
                    <?php
				$image = get_post_custom_values( 'gallerySlide_2' );
				if ( is_array( $image ) && end( $image ) != '' ) {
					echo end( $image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- cell -->
		<?php endif; ?>
		<?php
		$trigger = get_post_custom_values( 'gallerySlide_3' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
			?>
			<div class="gallery_slides_cell">
				<img class="gallery_slides_image" src="
                    <?php
				$image = get_post_custom_values( 'gallerySlide_3' );
				if ( is_array( $image ) && end( $image ) != '' ) {
					echo end( $image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- cell -->
		<?php endif; ?>
		<?php
		$trigger = get_post_custom_values( 'gallerySlide_4' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
			?>
			<div class="gallery_slides_cell">
				<img class="gallery_slides_image" src="
                    <?php
				$image = get_post_custom_values( 'gallerySlide_4' );
				if ( is_array( $image ) && end( $image ) != '' ) {
					echo end( $image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- cell -->
		<?php endif; ?>
		<?php
		$trigger = get_post_custom_values( 'gallerySlide_5' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
			?>
			<div class="gallery_slides_cell">
				<img class="gallery_slides_image" src="

                        <?php
				$image = get_post_custom_values( 'gallerySlide_5' );
				if ( is_array( $image ) && end( $image ) != '' ) {
					echo end( $image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- cell -->
		<?php endif; ?>
		<a href="#" id="gallery_slides_nav_next">NEXT SLIDE</a>
		<a href="#" id="gallery_slides_nav_prev">PREVIOUS SLIDE</a>
		<div id="gallery_slides_pagination"></div>
		<!-- GALLERY SLIDESHOW LOGIC -->
		<script type="text/javascript">
			jQuery( function () {
				// SCREEN WIDTH ACTIVATION:
				var screenWidth = jQuery( window ).width();
				if ( screenWidth > 800 ) {
					// SETUP:
					var slides = jQuery( '.gallery_slides_cell' );
					var counter = 0;
					slides.each(
						function () {
							counter = counter + 1;
							jQuery( this ).attr( 'id', 'slide_' + counter );
							jQuery( this ).css( 'display', 'none' );
							if ( jQuery( this ).attr( 'id' ) === 'slide_1' ) {
								jQuery( this ).addClass( 'active' );
							}
						}
					);
					// SHOW NEXT SLIDE:
					var next_slide = function next_slide() {
						slides.each(
							function () {
								if ( jQuery( this ).hasClass( 'active' ) === true ) {
									jQuery( this ).removeClass( 'active' );
									jQuery( '#gallery_slides_pagination a.active' ).removeClass( 'active' );
									var nextSlide = jQuery( this ).next( '.gallery_slides_cell' );
									if ( nextSlide.length != 0 ) {
										jQuery( this ).next().addClass( 'active_tmp' ); // So that the next each() doesnt get tripped..
										var slideNumber = jQuery( this ).next().attr( 'id' );
										jQuery( '#gallery_slides_pagination a.' + slideNumber ).addClass( 'active' );
									}
									if ( nextSlide.length == 0 ) {
										jQuery( '#slide_1' ).addClass( 'active' );
										jQuery( '#gallery_slides_pagination a.slide_1' ).addClass( 'active' );
									}
								}
								if ( jQuery( this ).hasClass( 'active_tmp' ) === true ) {
									jQuery( this ).removeClass( 'active_tmp' );
									jQuery( this ).addClass( 'active' );
								}
							}
						);
					} // next..
					// SHOW PREVIOUS SLIDE:
					var previous_slide = function previous_slide() {
						slides.each(
							function () {
								if ( jQuery( this ).hasClass( 'active' ) === true ) {
									jQuery( this ).removeClass( 'active' );
									jQuery( '#gallery_slides_pagination a.active' ).removeClass( 'active' );
									var prevSlide = jQuery( this ).prev( '.gallery_slides_cell' );
									if ( prevSlide.length != 0 ) {
										prevSlide.addClass( 'active' );
										var slideNumber = jQuery( this ).prev().attr( 'id' );
										jQuery( '#gallery_slides_pagination a.' + slideNumber ).addClass( 'active' );
									}
									if ( prevSlide.length == 0 ) {
										jQuery( this ).addClass( 'active' );
										jQuery( '#gallery_slides_pagination a.slide_1' ).addClass( 'active' );
										startLoop();
									}
								}
							}
						);
					} // next..
					// LOOP INIT:
					function startLoop() {
						loop = setInterval( next_slide, 7000 );
					}

					startLoop(); // Activate on load
					// Stop:
					function stopLoop() {
						clearInterval( loop );
					}

					// NAVIGATION:
					// Next:
					jQuery( '#gallery_slides_nav_next' ).show().click(
						function ( e ) {
							e.preventDefault();
							stopLoop();
							next_slide();
						}
					);
					// Previous:
					jQuery( '#gallery_slides_nav_prev' ).show().click(
						function ( e ) {
							e.preventDefault();
							stopLoop();
							previous_slide();
						}
					);
					// PAGINATION:
					var counter = 0;
					slides.each(
						function () {
							counter = counter + 1;
							jQuery( '#gallery_slides_pagination' ).append( '<a href="#" class="slide_' + counter + '">' + counter + '</a>' );
						}
					);

				} // if screen 800+ px
			} );
		</script>
	</div> <!-- daytrip_slides -->
<?php endif; ?>

<!-- GALLERY ADD-ON -->
<?php
$has_gallery = \NYWE\post_has_gallery();
if ( ! empty( $has_gallery ) ) {
	$gallery = \NYWE\get_post_gallery_id();
	echo do_shortcode( '[Modula id=' . absint( $gallery ) . ']' );
} ?>

	<!-- RELATED GALLERYS -->
	<div id="post_blog_related">
		<h2 id="post_blog_related_heading">OTHER GALLERIES WE RECOMMEND</h2>

		<div class="post_blog_grid">
			<?php // LOOP:
			$i    = 1;
			$loop = new WP_Query( array( 'post_type' => 'gallery' ) );
			while ( $loop->have_posts() ) {
				$loop->the_post();
				if ( $i <= 3 ) {
					$i = $i + 1;
					echo '<div class="loop_cell">';
					echo '<a class="loop_cell_image" href="' . get_the_permalink() . '" title="Read the full Article.">';
					echo get_the_post_thumbnail( get_the_ID(), array( 480, 480 ) );
					echo '</a>';
					echo '<h3 class="loop_cell_date">' . get_the_time( 'l, F jS, Y' ) . '</h3>';
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
			jQuery( function () {
				jQuery( '#post_blog_more_button' ).click(
					function ( e ) {
						e.preventDefault();
						jQuery( this ).fadeOut( 'slow' );
						jQuery( '#post_blog_more' ).slideDown();
					}
				);
			} );
		</script>


		<div id="post_blog_more" style="display: none;" class="post_blog_grid">
			<?php // LOOP:
			$i    = 1;
			$loop = new WP_Query( array( 'post_type' => 'gallery' ) );
			while ( $loop->have_posts() ) {
				$loop->the_post();
				if ( $i < 5 ) {
					$i = $i + 1;
				}
				if ( $i >= 5 && $i < 9 ) {
					$i = $i + 1;
					echo '<div class="loop_cell">';
					echo '<a class="loop_cell_image" href="' . get_the_permalink() . '" title="Read the full Article.">';
					echo get_the_post_thumbnail( get_the_ID(), array( 480, 480 ) );
					echo '</a>';
					echo '<h3 class="loop_cell_date">' . get_the_time( 'l, F jS, Y' ) . '</h3>';
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
		jQuery( function () {
			// Tweak Footer margin:
			jQuery( '#footer' ).css( 'margin-top', '0' );
			// Remove Legacy ADVERT TAG and <hr>:
			var x = jQuery( 'p' );
			x.each(
				function () {
					var y = jQuery( this ).text();
					if ( y === 'ADVERT' ) {
						jQuery( this ).hide();
						jQuery( this ).next().hide();
						jQuery( this ).prev().hide();
					}
				}
			);
			// Remove Legacy <p>&nbsp;</p> spacings:
			var x = jQuery( 'p' );
			x.each(
				function () {
					var y = jQuery( this ).html();
					if ( y === '&nbsp;' ) {
						jQuery( this ).hide();
					}
				}
			);
		} );
	</script>

	<!-- FOOTER -->
<?php get_footer(); ?>