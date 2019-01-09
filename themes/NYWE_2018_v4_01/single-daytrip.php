<?php get_header(); ?>

	<!-- CONTENT -->
	<div id="daytrip" style="width: 100%;">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- EVENT CARD -->
			<div class="daytrip_list_cell">
				<!-- Event image (featured) -->
				<img class="daytrip_list_cell_image" src="
                  <?php
				$daytrip_image = get_post_custom_values( 'daytrip_image' );
				if ( is_array( $daytrip_image ) && end( $daytrip_image ) != '' ) {
					echo end( $daytrip_image );
				} else {
					echo bloginfo( 'template_url' ) . '/images/events_default_image.jpg';
				}
				?>" alt="New York Wine Events"/>
				<!-- Event Logo -->
				<?php
				$daytrip_list_cell_image_logo = get_post_custom_values( 'daytrip_image_logo' );
				if ( is_array( $daytrip_list_cell_image_logo ) && end( $daytrip_list_cell_image_logo ) != '' ) {
					?>
					<img class="daytrip_list_cell_image_logo" src="<?php echo end( $daytrip_list_cell_image_logo ); ?>"
					     alt="New York Wine Events"/>
					<?php
				}
				?>
				<!-- Content -->
				<div class="daytrip_list_cell_content">
					<!-- Date and Time Overlay -->
					<div class="daytrip_list_cell_image_overlay">
						<h3 class="daytrip_list_cell_image_overlay_date"><?php $daytripDate = get_post_custom_values( 'daytripDate' );
							if ( is_array( $daytripDate ) && end( $daytripDate ) != '' ) {
								echo end( $daytripDate );
							} ?></h3>
						<h4 class="daytrip_list_cell_image_overlay_time"><?php $daytripTimePreview = get_post_custom_values( 'daytripTimePreview' );
							if ( is_array( $daytripTimePreview ) && end( $daytripTimePreview ) != '' ) {
								echo end( $daytripTimePreview );
							} ?></h4>
					</div><!-- overlay -->
					<div class="daytrip_list_cell_card">
						<h2 class="daytrip_list_cell_card_title"><?php the_title(); ?></h2>
						<div class="daytrip_list_cell_card_excerpt"><?php the_excerpt(); ?></div>
						<a class="daytrip_list_cell_card_purchase" href="#daytrip_ticket">PURCHASE TICKETS</a>
					</div><!-- card -->
				</div><!-- content -->
			</div><!-- end CARD -->


			<!-- INTRODUCTION MODULE -->
			<?php
			$trigger = get_post_custom_values( 'daytripIntroImage' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_intro">
					<!-- Image left -->
					<img id="daytrip_intro_image" src="
                        <?php
					$daytripIntroImage = get_post_custom_values( 'daytripIntroImage' );
					if ( is_array( $daytripIntroImage ) && end( $daytripIntroImage ) != '' ) {
						echo end( $daytripIntroImage );
					}
					?>" alt="New York Wine Events"/>
					<!-- content -->
					<div id="daytrip_intro_content">
						<!-- Introduction heading -->
						<h3 id="daytrip_intro_heading"><?php $daytripIntroHeading = get_post_custom_values( 'daytripIntroHeading' );
							if ( is_array( $daytripIntroHeading ) && end( $daytripIntroHeading ) != '' ) {
								echo end( $daytripIntroHeading );
							} ?></h3>
						<!-- Introduction text -->
						<p id="daytrip_intro_text"><?php $daytripIntroText = get_post_custom_values( 'daytripIntroText' );
							if ( is_array( $daytripIntroText ) && end( $daytripIntroText ) != '' ) {
								echo end( $daytripIntroText );
							} ?></p>
						<!-- Intro Item 1 -->
						<div id="daytrip_intro_item_1">
							<h3 id="daytrip_intro_item_1_heading"><?php $daytripIntroItem1_heading = get_post_custom_values( 'daytripIntroItem1_heading' );
								if ( is_array( $daytripIntroItem1_heading ) && end( $daytripIntroItem1_heading ) != '' ) {
									echo end( $daytripIntroItem1_heading );
								} ?></h3>
							<p id="daytrip_intro_item_1_text"><?php $daytripIntroItem1_text = get_post_custom_values( 'daytripIntroItem1_text' );
								if ( is_array( $daytripIntroItem1_text ) && end( $daytripIntroItem1_text ) != '' ) {
									echo end( $daytripIntroItem1_text );
								} ?></p>
						</div>
						<!-- Intro Item 2 -->
						<div id="daytrip_intro_item_2">
							<h3 id="daytrip_intro_item_2_heading"><?php $daytripIntroItem2_heading = get_post_custom_values( 'daytripIntroItem2_heading' );
								if ( is_array( $daytripIntroItem2_heading ) && end( $daytripIntroItem2_heading ) != '' ) {
									echo end( $daytripIntroItem2_heading );
								} ?></h3>
							<p id="daytrip_intro_item_2_text"><?php $daytripIntroItem2_text = get_post_custom_values( 'daytripIntroItem2_text' );
								if ( is_array( $daytripIntroItem2_text ) && end( $daytripIntroItem2_text ) != '' ) {
									echo end( $daytripIntroItem2_text );
								} ?></p>
						</div>
						<!-- Puchase -->
						<a id="daytrip_intro_purchase" href="#daytrip_ticket">PURCHASE TICKETS</a>
					</div><!-- content -->
				</div><!-- intro module-->
			<?php endif; ?>


			<!-- TICKETS INCLUDE -->
			<?php
			$trigger = get_post_custom_values( 'daytripTicksInc_heading_1' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_tickets_include">
					<h2>A TICKET INCLUDES</h2>
					<div id="daytrip_tickets_include_grid">
						<!-- 1 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 1 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_1 = get_post_custom_values( 'daytripTicksInc_heading_1' );
								if ( is_array( $daytripTicksInc_heading_1 ) && end( $daytripTicksInc_heading_1 ) != '' ) {
									echo end( $daytripTicksInc_heading_1 );
								} ?></h3>
							<!--  text 1 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_1 = get_post_custom_values( 'daytripTicksInc_text_1' );
								if ( is_array( $daytripTicksInc_text_1 ) && end( $daytripTicksInc_text_1 ) != '' ) {
									echo end( $daytripTicksInc_text_1 );
								} ?></p>
						</div><!-- cell -->
						<!-- 2 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 2 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_2 = get_post_custom_values( 'daytripTicksInc_heading_2' );
								if ( is_array( $daytripTicksInc_heading_2 ) && end( $daytripTicksInc_heading_2 ) != '' ) {
									echo end( $daytripTicksInc_heading_2 );
								} ?></h3>
							<!--  text 2 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_2 = get_post_custom_values( 'daytripTicksInc_text_2' );
								if ( is_array( $daytripTicksInc_text_2 ) && end( $daytripTicksInc_text_2 ) != '' ) {
									echo end( $daytripTicksInc_text_2 );
								} ?></p>
						</div><!-- cell -->
						<!-- 3 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 3 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_3 = get_post_custom_values( 'daytripTicksInc_heading_3' );
								if ( is_array( $daytripTicksInc_heading_3 ) && end( $daytripTicksInc_heading_3 ) != '' ) {
									echo end( $daytripTicksInc_heading_3 );
								} ?></h3>
							<!--  text 3 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_3 = get_post_custom_values( 'daytripTicksInc_text_3' );
								if ( is_array( $daytripTicksInc_text_3 ) && end( $daytripTicksInc_text_3 ) != '' ) {
									echo end( $daytripTicksInc_text_3 );
								} ?></p>
						</div><!-- cell -->
						<!-- 4 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 4 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_4 = get_post_custom_values( 'daytripTicksInc_heading_4' );
								if ( is_array( $daytripTicksInc_heading_4 ) && end( $daytripTicksInc_heading_4 ) != '' ) {
									echo end( $daytripTicksInc_heading_4 );
								} ?></h3>
							<!--  text 4 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_4 = get_post_custom_values( 'daytripTicksInc_text_4' );
								if ( is_array( $daytripTicksInc_text_4 ) && end( $daytripTicksInc_text_4 ) != '' ) {
									echo end( $daytripTicksInc_text_4 );
								} ?></p>
						</div><!-- cell -->
						<!-- 5 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 5 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_5 = get_post_custom_values( 'daytripTicksInc_heading_5' );
								if ( is_array( $daytripTicksInc_heading_5 ) && end( $daytripTicksInc_heading_5 ) != '' ) {
									echo end( $daytripTicksInc_heading_5 );
								} ?></h3>
							<!--  text 5 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_5 = get_post_custom_values( 'daytripTicksInc_text_5' );
								if ( is_array( $daytripTicksInc_text_5 ) && end( $daytripTicksInc_text_5 ) != '' ) {
									echo end( $daytripTicksInc_text_5 );
								} ?></p>
						</div><!-- cell -->
						<!-- 6 -->
						<div class="daytrip_tickets_include_cell">
							<!-- heading 6 -->
							<h3 class="daytrip_tickets_include_cell_heading"><?php $daytripTicksInc_heading_6 = get_post_custom_values( 'daytripTicksInc_heading_6' );
								if ( is_array( $daytripTicksInc_heading_6 ) && end( $daytripTicksInc_heading_6 ) != '' ) {
									echo end( $daytripTicksInc_heading_6 );
								} ?></h3>
							<!--  text 6 -->
							<p class="daytrip_tickets_include_cell_text"><?php $daytripTicksInc_text_6 = get_post_custom_values( 'daytripTicksInc_text_6' );
								if ( is_array( $daytripTicksInc_text_6 ) && end( $daytripTicksInc_text_6 ) != '' ) {
									echo end( $daytripTicksInc_text_6 );
								} ?></p>
						</div><!-- cell -->
					</div><!-- grid -->
					<!-- Puchase -->
					<a id="daytrip_tickets_include_purchase" href="#daytrip_ticket">PURCHASE TICKETS</a>
				</div><!-- tickets include -->
			<?php endif; ?>


			<!-- DAYTRIP FEEDBACK -->
			<?php
			$trigger   = 'off';
			$trigger_1 = get_post_custom_values( 'daytripFeedback_heading_1' );
			$trigger_2 = get_post_custom_values( 'daytripFeedback_heading_2' );
			$trigger_3 = get_post_custom_values( 'daytripFeedback_heading_3' );
			if ( is_array( $trigger_1 ) && end( $trigger_1 ) != '' && is_array( $trigger_2 ) && end( $trigger_2 ) != '' && is_array( $trigger_3 ) && end( $trigger_3 ) != '' ) {
				$trigger = 'on';
			}
			if ( $trigger == 'on' ) :
				?>
				<div id="daytrip_feedback">
					<h2>Guest Feedback</h2>
					<div id="daytrip_feedback_grid">
						<!-- 1 -->
						<div id="daytrip_feedback_1" class="daytrip_feedback_card">
							<h5><?php $daytripFeedback_heading_1 = get_post_custom_values( 'daytripFeedback_heading_1' );
								if ( is_array( $daytripFeedback_heading_1 ) && end( $daytripFeedback_heading_1 ) != '' ) {
									echo end( $daytripFeedback_heading_1 );
								} ?></h5>
							<h6><?php $daytripFeedback_client_1 = get_post_custom_values( 'daytripFeedback_client_1' );
								if ( is_array( $daytripFeedback_client_1 ) && end( $daytripFeedback_client_1 ) != '' ) {
									echo end( $daytripFeedback_client_1 );
								} ?>
								<span><?php $daytripFeedback_date_1 = get_post_custom_values( 'daytripFeedback_date_1' );
									if ( is_array( $daytripFeedback_date_1 ) && end( $daytripFeedback_date_1 ) != '' ) {
										echo end( $daytripFeedback_date_1 );
									} ?></span></h6>
							<p><?php $daytripFeedback_excerpt_1 = get_post_custom_values( 'daytripFeedback_excerpt_1' );
								if ( is_array( $daytripFeedback_excerpt_1 ) && end( $daytripFeedback_excerpt_1 ) != '' ) {
									echo end( $daytripFeedback_excerpt_1 );
								} ?></p>
						</div><!-- 1 -->
						<!-- 2 -->
						<div id="daytrip_feedback_2" class="daytrip_feedback_card">
							<h5><?php $daytripFeedback_heading_2 = get_post_custom_values( 'daytripFeedback_heading_2' );
								if ( is_array( $daytripFeedback_heading_2 ) && end( $daytripFeedback_heading_2 ) != '' ) {
									echo end( $daytripFeedback_heading_2 );
								} ?></h5>
							<h6><?php $daytripFeedback_client_2 = get_post_custom_values( 'daytripFeedback_client_2' );
								if ( is_array( $daytripFeedback_client_2 ) && end( $daytripFeedback_client_2 ) != '' ) {
									echo end( $daytripFeedback_client_2 );
								} ?>
								<span><?php $daytripFeedback_date_2 = get_post_custom_values( 'daytripFeedback_date_2' );
									if ( is_array( $daytripFeedback_date_2 ) && end( $daytripFeedback_date_2 ) != '' ) {
										echo end( $daytripFeedback_date_2 );
									} ?></span></h6>
							<p><?php $daytripFeedback_excerpt_2 = get_post_custom_values( 'daytripFeedback_excerpt_2' );
								if ( is_array( $daytripFeedback_excerpt_2 ) && end( $daytripFeedback_excerpt_2 ) != '' ) {
									echo end( $daytripFeedback_excerpt_2 );
								} ?></p>
						</div><!-- 2 -->
						<!-- 3 -->
						<div id="daytrip_feedback_3" class="daytrip_feedback_card">
							<h5><?php $daytripFeedback_heading_3 = get_post_custom_values( 'daytripFeedback_heading_3' );
								if ( is_array( $daytripFeedback_heading_3 ) && end( $daytripFeedback_heading_3 ) != '' ) {
									echo end( $daytripFeedback_heading_3 );
								} ?></h5>
							<h6><?php $daytripFeedback_client_3 = get_post_custom_values( 'daytripFeedback_client_3' );
								if ( is_array( $daytripFeedback_client_3 ) && end( $daytripFeedback_client_3 ) != '' ) {
									echo end( $daytripFeedback_client_3 );
								} ?>
								<span><?php $daytripFeedback_date_3 = get_post_custom_values( 'daytripFeedback_date_3' );
									if ( is_array( $daytripFeedback_date_3 ) && end( $daytripFeedback_date_3 ) != '' ) {
										echo end( $daytripFeedback_date_3 );
									} ?></span></h6>
							<p><?php $daytripFeedback_excerpt_3 = get_post_custom_values( 'daytripFeedback_excerpt_3' );
								if ( is_array( $daytripFeedback_excerpt_3 ) && end( $daytripFeedback_excerpt_3 ) != '' ) {
									echo end( $daytripFeedback_excerpt_3 );
								} ?></p>
						</div><!-- 3 -->
					</div><!-- grid -->
				</div><!-- feedback -->
			<?php endif; ?>
			<!-- daytrip feedback -->


			<!-- VIDEO EMBED -->
			<?php
			$trigger = get_post_custom_values( 'daytripVideo' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_video">
					<?php $daytripVideo = get_post_custom_values( 'daytripVideo' );
					if ( is_array( $daytripVideo ) && end( $daytripVideo ) != '' ) {
						echo end( $daytripVideo );
					} ?>
				</div>
			<?php endif; ?>
			<!-- video -->


			<!-- ADVERT 3 -->
			<?php
			$options  = get_option( 'theme_settings' );
			$override = get_post_custom_values( 'advert' );
			if ( is_array( $override ) && end( $override ) != '' ) {
				echo '<div class="advert">' . end( $override ) . '</div>';
			} else {
				if ( $options['global_advert_3'] ) {
					echo '<div class="advert">' . $options['global_advert_3'] . '</div>';
				}
			}
			?>


			<!-- MAP -->
			<?php
			$trigger = get_post_custom_values( 'daytripMap' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_map">
					<a id="daytrip_map_url" href="<?php $daytripMapUrl = get_post_custom_values( 'daytripMapUrl' );
					if ( is_array( $daytripMapUrl ) && end( $daytripMapUrl ) != '' ) {
						echo end( $daytripMapUrl );
					} ?>">
						<img id="daytrip_map_image" src="<?php $daytripMap = get_post_custom_values( 'daytripMap' );
						if ( is_array( $daytripMap ) && end( $daytripMap ) != '' ) {
							echo end( $daytripMap );
						} ?>" alt="New York Wine Daytrips Directions"/>
					</a>
				</div><!-- map -->
			<?php endif; ?>


			<!-- SLIDES MODULE -->
			<?php
			$trigger = get_post_custom_values( 'daytripSlide_1' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_slides">
					<?php
					$trigger = get_post_custom_values( 'daytripSlide_1' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="daytrip_slides_cell">
							<img class="daytrip_slides_image" src="
                        <?php
							$image = get_post_custom_values( 'daytripSlide_1' );
							if ( is_array( $image ) && end( $image ) != '' ) {
								echo end( $image );
							}
							?>" alt="New York Wine Events"/>
						</div><!-- cell -->
					<?php endif; ?>
					<?php
					$trigger = get_post_custom_values( 'daytripSlide_2' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="daytrip_slides_cell">
							<img class="daytrip_slides_image" src="
                    <?php
							$image = get_post_custom_values( 'daytripSlide_2' );
							if ( is_array( $image ) && end( $image ) != '' ) {
								echo end( $image );
							}
							?>" alt="New York Wine Events"/>
						</div><!-- cell -->
					<?php endif; ?>
					<?php
					$trigger = get_post_custom_values( 'daytripSlide_3' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="daytrip_slides_cell">
							<img class="daytrip_slides_image" src="
                    <?php
							$image = get_post_custom_values( 'daytripSlide_3' );
							if ( is_array( $image ) && end( $image ) != '' ) {
								echo end( $image );
							}
							?>" alt="New York Wine Events"/>
						</div><!-- cell -->
					<?php endif; ?>
					<?php
					$trigger = get_post_custom_values( 'daytripSlide_4' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="daytrip_slides_cell">
							<img class="daytrip_slides_image" src="
                    <?php
							$image = get_post_custom_values( 'daytripSlide_4' );
							if ( is_array( $image ) && end( $image ) != '' ) {
								echo end( $image );
							}
							?>" alt="New York Wine Events"/>
						</div><!-- cell -->
					<?php endif; ?>
					<?php
					$trigger = get_post_custom_values( 'daytripSlide_5' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="daytrip_slides_cell">
							<img class="daytrip_slides_image" src="

                        <?php
							$image = get_post_custom_values( 'daytripSlide_5' );
							if ( is_array( $image ) && end( $image ) != '' ) {
								echo end( $image );
							}
							?>" alt="New York Wine Events"/>
						</div><!-- cell -->
					<?php endif; ?>
					<a href="#" id="daytrip_slides_nav_next">NEXT SLIDE</a>
					<a href="#" id="daytrip_slides_nav_prev">PREVIOUS SLIDE</a>
					<div id="daytrip_slides_pagination"></div>
					<!-- DAYTRIP SLIDESHOW LOGIC -->
					<script type="text/javascript">
						jQuery( function () {
							// SCREEN WIDTH ACTIVATION:
							var screenWidth = jQuery( window ).width();
							if ( screenWidth > 800 ) {
								// SETUP:
								var slides = jQuery( '.daytrip_slides_cell' );
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
												jQuery( '#daytrip_slides_pagination a.active' ).removeClass( 'active' );
												var nextSlide = jQuery( this ).next( '.daytrip_slides_cell' );
												if ( nextSlide.length != 0 ) {
													jQuery( this ).next().addClass( 'active_tmp' ); // So that the next each() doesnt get tripped..
													var slideNumber = jQuery( this ).next().attr( 'id' );
													jQuery( '#daytrip_slides_pagination a.' + slideNumber ).addClass( 'active' );
												}
												if ( nextSlide.length == 0 ) {
													jQuery( '#slide_1' ).addClass( 'active' );
													jQuery( '#daytrip_slides_pagination a.slide_1' ).addClass( 'active' );
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
												jQuery( '#daytrip_slides_pagination a.active' ).removeClass( 'active' );
												var prevSlide = jQuery( this ).prev( '.daytrip_slides_cell' );
												if ( prevSlide.length != 0 ) {
													prevSlide.addClass( 'active' );
													var slideNumber = jQuery( this ).prev().attr( 'id' );
													jQuery( '#daytrip_slides_pagination a.' + slideNumber ).addClass( 'active' );
												}
												if ( prevSlide.length == 0 ) {
													jQuery( this ).addClass( 'active' );
													jQuery( '#daytrip_slides_pagination a.slide_1' ).addClass( 'active' );
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
								jQuery( '#daytrip_slides_nav_next' ).show().click(
									function ( e ) {
										e.preventDefault();
										stopLoop();
										next_slide();
									}
								);
								// Previous:
								jQuery( '#daytrip_slides_nav_prev' ).show().click(
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
										jQuery( '#daytrip_slides_pagination' ).append( '<a href="#" class="slide_' + counter + '">' + counter + '</a>' );
									}
								);

							} // if screen 800+ px
						} );
					</script>
				</div> <!-- daytrip_slides -->
			<?php endif; ?>


			<!-- TICKETS -->
			<?php
			$trigger = get_post_custom_values( 'daytripTicket' );
			if ( is_array( $trigger ) && end( $trigger ) != '' ) :
				?>
				<div id="daytrip_ticket" class="center">
					<h2>EVENT TIMELINE</h2>
					<!-- timeline -->
					<div id="daytrip_ticket_timeline">
						<?php for ( $i = 1; $i <= 10; $i ++ ) : ?>
							<?php
							$trigger = get_post_custom_values( 'daytripTicketTimelineTime_' . $i );
							if ( is_array( $trigger ) && end( $trigger ) != '' ) :
								?>
								<div class="daytrip_ticket_timeline_cell">
									<h3>
										<?php // Time:
										$x = get_post_custom_values( 'daytripTicketTimelineTime_' . $i );
										if ( is_array( $x ) && end( $x ) != '' ) {
											echo end( $x );
										}
										?>
									</h3>
									<p>
										<?php // Text:
										$x = get_post_custom_values( 'daytripTicketTimelineText_' . $i );
										if ( is_array( $x ) && end( $x ) != '' ) {
											echo end( $x );
										}
										?>
									</p>

								</div>
							<?php endif; ?>
						<?php endfor; ?>
					</div><!-- timeline -->
					<!-- purchase card -->
					<div id="daytrip_ticket_purchase">
						<h3 id="daytrip_ticket_purchase_heading">
							<?php
							$x = get_post_custom_values( 'daytripTicketHeading' );
							if ( is_array( $x ) && end( $x ) != '' ) {
								echo end( $x );
							}
							?>
						</h3>
						<p id="daytrip_ticket_purchase_text">
							<?php
							$x = get_post_custom_values( 'daytripTicketText' );
							if ( is_array( $x ) && end( $x ) != '' ) {
								echo end( $x );
							}
							?>
						</p>
						<h4 id="daytrip_ticket_purchase_price">
							<?php
							$x = get_post_custom_values( 'daytripTicketPrice' );
							if ( is_array( $x ) && end( $x ) != '' ) {
								echo end( $x );
							}
							?>
						</h4>
						<?php // SOLD OUT?
						$daytripSoldout = get_post_custom_values( 'daytripSoldout' );
						$daytripSoldout = $daytripSoldout[0];
						if ( $daytripSoldout == 'on' ) {
							echo '<a id="daytrip_ticket_purchase_button" class="sold_out" href="#">SOLD OUT</a>';
						} else {
							$link = get_post_custom_values( 'daytripTicket' );
							if ( is_array( $link ) && end( $link ) != '' ) {
								echo '<a id="daytrip_ticket_purchase_button" href="' . end( $link ) . '">PURCHASE TICKETS</a>';
							}
						}
						?>
						<div id="daytrip_ticket_promo">
							<h5>Want a discount?</h5>
							<p>
								Join our tour email list by clicking <a href="http://eepurl.com/dlc2aX">here</a>. We’ll
								send you a Promotional Code when you sign up.
							</p>
							<h5>Not sure what date you want? No problem.</h5>
							<p>
								Buy a Voucher. It lets you Save Now & Book Later. Just join the tour email list <a
										href="https://newjerseywinefestivals.us6.list-manage.com/subscribe?u=da778b0b532a20f59d31779a3&id=462f8355e6.">here</a>.
								Your confirmation email will contain a special link and code to Vouchers.
							</p>
						</div>
					</div><!-- timeline -->
				</div><!-- ticket -->
			<?php endif; ?>


		<?php endwhile; endif; // Page Loop ?>


	</div><!-- ..content -->


<?php get_footer(); ?>