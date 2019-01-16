<?php get_header(); ?>

	<!-- ADVERT OVERRIDE -->
<?php
$advertHead = get_post_custom_values( 'advertHead' );
if ( is_array( $advertHead ) && end( $advertHead ) != '' ) {
	echo end( $advertHead );
}
?>

	<!-- CONTENT -->
	<div id="event" class="content" style="width: 100%;">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- EVENT CARD -->
			<div class="events_list_cell">
				<!-- Event image (featured) -->
				<img class="events_list_cell_image" src="
                  <?php
				$events_list_cell_image = get_post_custom_values( 'events_list_cell_image' );
				if ( is_array( $events_list_cell_image ) && end( $events_list_cell_image ) != '' ) {
					echo end( $events_list_cell_image );
				} else {
					echo bloginfo( 'template_url' ) . '/images/events_default_image.jpg';
				}
				?>" alt="New York Wine Events"/>
				<!-- Event Logo -->
				<?php
				$events_list_cell_image_logo = get_post_custom_values( 'events_list_cell_image_logo' );
				if ( is_array( $events_list_cell_image_logo ) && end( $events_list_cell_image_logo ) != '' ) {
					?>
					<img class="events_list_cell_image_logo" src="<?php echo end( $events_list_cell_image_logo ); ?>"
					     alt="New York Wine Events"/>
					<?php
				}
				?>
				<!-- Content -->
				<div class="events_list_cell_content">
					<!-- Date and Time Overlay -->
					<div class="events_list_cell_image_overlay">
						<h3 class="events_list_cell_image_overlay_date"><?php $eventDate = get_post_custom_values( 'eventDate' );
							if ( is_array( $eventDate ) && end( $eventDate ) != '' ) {
								echo end( $eventDate );
							} ?></h3>
						<?php /* <h4 class="events_list_cell_image_overlay_time"><?php $eventTimePreview = get_post_custom_values('eventTimePreview'); if ( is_array($eventTimePreview) && end($eventTimePreview) != '' ) { echo end($eventTimePreview); } ?></h4> */ ?>
						<h4 class="events_list_cell_image_overlay_time"><?php $value = get_post_custom_values( 'eventCity' );
							if ( is_array( $value ) && end( $value ) != '' ) {
								echo end( $value );
							} ?></h4>
					</div><!-- overlay -->
					<div class="events_list_cell_card">
						<h2 class="events_list_cell_card_title"><?php the_title(); ?></h2>
						<div class="events_list_cell_card_excerpt">
							<span><?php $value = get_post_custom_values( 'eventTime' );
								if ( is_array( $value ) && end( $value ) != '' ) {
									echo end( $value );
								} ?></span>
							<hr/>
							<?php the_excerpt(); ?>
						</div>
						<?php // SOLD OUT?
						$eventSoldout = get_post_custom_values( 'eventSoldout' );
						$eventSoldout = $eventSoldout[0];
						if ( $eventSoldout == 'on' ) {
							echo '<a class="events_list_cell_card_purchase sold_out" href="#event_tickets">SOLD OUT</a>';
						} else {
							echo '<a class="events_list_cell_card_purchase" href="#event_tickets">PURCHASE TICKETS</a>';
						}
						?>

					</div><!-- card -->
				</div><!-- content -->
			</div><!-- end CARD -->


			<!-- PRESENTING SPONSOR -->
		<?php
		$trigger = get_post_custom_values( 'eventPresentingSponsor' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_presenting_sponsor" class="center">
				<h2>Presenting Sponsor</h2>
				<a class="event_presenting_sponsor_url" href="<?php
				$eventPresentingSponsorUrl = get_post_custom_values( 'eventPresentingSponsorUrl' );
				if ( is_array( $eventPresentingSponsorUrl ) && end( $eventPresentingSponsorUrl ) != '' ) {
					echo end( $eventPresentingSponsorUrl );
				}
				?>">
					<img class="event_presenting_sponsor_image" src="<?php
					$eventPresentingSponsor = get_post_custom_values( 'eventPresentingSponsor' );
					if ( is_array( $eventPresentingSponsor ) && end( $eventPresentingSponsor ) != '' ) {
						echo end( $eventPresentingSponsor );
					}
					?>" alt="Event Sponsor"/>
				</a>
			</div><!-- presenting -->
			      <?php endif; ?><!-- presenting sponsor -->


			      <!-- CMS -->
			<div id="event_CMS" class="center">
				<?php the_content(); ?>
			</div>


			<!-- INTRODUCTION MODULE -->
		<?php
		$trigger = get_post_custom_values( 'eventIntroImage' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_intro">
				<!-- Image left -->
				<img id="event_intro_image" src="
                        <?php
				$eventIntroImage = get_post_custom_values( 'eventIntroImage' );
				if ( is_array( $eventIntroImage ) && end( $eventIntroImage ) != '' ) {
					echo end( $eventIntroImage );
				}
				?>" alt="New York Wine Events"/>
				<!-- content -->
				<div id="event_intro_content">
					<!-- Introduction heading -->
					<h3 id="event_intro_heading"><?php $eventIntroHeading = get_post_custom_values( 'eventIntroHeading' );
						if ( is_array( $eventIntroHeading ) && end( $eventIntroHeading ) != '' ) {
							echo end( $eventIntroHeading );
						} ?></h3>
					<!-- Introduction text -->
					<p id="event_intro_text"><?php $eventIntroText = get_post_custom_values( 'eventIntroText' );
						if ( is_array( $eventIntroText ) && end( $eventIntroText ) != '' ) {
							echo end( $eventIntroText );
						} ?></p>
					<!-- Intro Item 1 -->
					<div id="event_intro_item_1">
						<h3 id="event_intro_item_1_heading"><?php $eventIntroItem1_heading = get_post_custom_values( 'eventIntroItem1_heading' );
							if ( is_array( $eventIntroItem1_heading ) && end( $eventIntroItem1_heading ) != '' ) {
								echo end( $eventIntroItem1_heading );
							} ?></h3>
						<p id="event_intro_item_1_text"><?php $eventIntroItem1_text = get_post_custom_values( 'eventIntroItem1_text' );
							if ( is_array( $eventIntroItem1_text ) && end( $eventIntroItem1_text ) != '' ) {
								echo end( $eventIntroItem1_text );
							} ?></p>
					</div>
					<!-- Intro Item 2 -->
					<div id="event_intro_item_2">
						<h3 id="event_intro_item_2_heading"><?php $eventIntroItem2_heading = get_post_custom_values( 'eventIntroItem2_heading' );
							if ( is_array( $eventIntroItem2_heading ) && end( $eventIntroItem2_heading ) != '' ) {
								echo end( $eventIntroItem2_heading );
							} ?></h3>
						<p id="event_intro_item_2_text"><?php $eventIntroItem2_text = get_post_custom_values( 'eventIntroItem2_text' );
							if ( is_array( $eventIntroItem2_text ) && end( $eventIntroItem2_text ) != '' ) {
								echo end( $eventIntroItem2_text );
							} ?></p>
					</div>
					<!-- Puchase -->
					<?php // SOLD OUT?
					$eventSoldout = get_post_custom_values( 'eventSoldout' );
					$eventSoldout = $eventSoldout[0];
					if ( $eventSoldout == 'on' ) {
						echo '<a id="event_intro_purchase" href="#event_tickets" style="opacity: 0.25;">SOLD OUT</a>';
					} else {
						echo '<a id="event_intro_purchase" href="#event_tickets">PURCHASE TICKETS</a>';
					}
					?>
				</div><!-- content -->
			</div><!-- intro module-->
		<?php endif; ?>


			<!-- Sponsors -->
		<?php
		$trigger = 'off';
		for ( $x = 0; $x <= 60; $x ++ ) {
			$custom_sponsors = get_post_custom_values( 'custom_sponsors_' . $x );
			if ( is_array( $custom_sponsors ) && end( $custom_sponsors ) != '' ) {
				$trigger = 'on';
				break;
			}
		} // end for
		if ( $trigger == 'on' ) :
		?>
			<div id="event_sponsors">
				<div id="event_sponsors_grid">
					<?php
					for ( $x = 0; $x <= 60; $x ++ ) {
						$custom_sponsors_url = get_post_custom_values( 'custom_sponsors_url_' . $x );
						$custom_sponsors     = get_post_custom_values( 'custom_sponsors_' . $x );
						if ( is_array( $custom_sponsors ) && end( $custom_sponsors ) != '' ) {
							echo '<a href="' . end( $custom_sponsors_url ) . '">';
						}
						if ( is_array( $custom_sponsors ) && end( $custom_sponsors ) != '' ) {
							echo '<img src="' . end( $custom_sponsors ) . '" alt="New York Wine Events Sponsor" />';
						}
						if ( is_array( $custom_sponsors ) && end( $custom_sponsors ) != '' ) {
							echo '</a>';
						}
					} // end for
					?>
				</div><!-- grid -->
			</div><!-- sponsors -->
		<?php endif; ?>


			<!-- EVENT FEEDBACK -->
		<?php
		$trigger   = 'off';
		$trigger_1 = get_post_custom_values( 'eventFeedback_heading_1' );
		$trigger_2 = get_post_custom_values( 'eventFeedback_heading_2' );
		$trigger_3 = get_post_custom_values( 'eventFeedback_heading_3' );
		if ( is_array( $trigger_1 ) && end( $trigger_1 ) != '' && is_array( $trigger_2 ) && end( $trigger_2 ) != '' && is_array( $trigger_3 ) && end( $trigger_3 ) != '' ) {
			$trigger = 'on';
		}
		if ( $trigger == 'on' ) :
		?>
			<div id="event_feedback">
				<h2>Guest Feedback</h2>
				<div id="event_feedback_grid">
					<!-- 1 -->
					<div id="event_feedback_1" class="event_feedback_card">
						<h5><?php $eventFeedback_heading_1 = get_post_custom_values( 'eventFeedback_heading_1' );
							if ( is_array( $eventFeedback_heading_1 ) && end( $eventFeedback_heading_1 ) != '' ) {
								echo end( $eventFeedback_heading_1 );
							} ?></h5>
						<h6><?php $eventFeedback_client_1 = get_post_custom_values( 'eventFeedback_client_1' );
							if ( is_array( $eventFeedback_client_1 ) && end( $eventFeedback_client_1 ) != '' ) {
								echo end( $eventFeedback_client_1 );
							} ?> <span><?php $eventFeedback_date_1 = get_post_custom_values( 'eventFeedback_date_1' );
								if ( is_array( $eventFeedback_date_1 ) && end( $eventFeedback_date_1 ) != '' ) {
									echo end( $eventFeedback_date_1 );
								} ?></span></h6>
						<p><?php $eventFeedback_excerpt_1 = get_post_custom_values( 'eventFeedback_excerpt_1' );
							if ( is_array( $eventFeedback_excerpt_1 ) && end( $eventFeedback_excerpt_1 ) != '' ) {
								echo end( $eventFeedback_excerpt_1 );
							} ?></p>
					</div><!-- 1 -->
					<!-- 2 -->
					<div id="event_feedback_2" class="event_feedback_card">
						<h5><?php $eventFeedback_heading_2 = get_post_custom_values( 'eventFeedback_heading_2' );
							if ( is_array( $eventFeedback_heading_2 ) && end( $eventFeedback_heading_2 ) != '' ) {
								echo end( $eventFeedback_heading_2 );
							} ?></h5>
						<h6><?php $eventFeedback_client_2 = get_post_custom_values( 'eventFeedback_client_2' );
							if ( is_array( $eventFeedback_client_2 ) && end( $eventFeedback_client_2 ) != '' ) {
								echo end( $eventFeedback_client_2 );
							} ?> <span><?php $eventFeedback_date_2 = get_post_custom_values( 'eventFeedback_date_2' );
								if ( is_array( $eventFeedback_date_2 ) && end( $eventFeedback_date_2 ) != '' ) {
									echo end( $eventFeedback_date_2 );
								} ?></span></h6>
						<p><?php $eventFeedback_excerpt_2 = get_post_custom_values( 'eventFeedback_excerpt_2' );
							if ( is_array( $eventFeedback_excerpt_2 ) && end( $eventFeedback_excerpt_2 ) != '' ) {
								echo end( $eventFeedback_excerpt_2 );
							} ?></p>
					</div><!-- 2 -->
					<!-- 3 -->
					<div id="event_feedback_3" class="event_feedback_card">
						<h5><?php $eventFeedback_heading_3 = get_post_custom_values( 'eventFeedback_heading_3' );
							if ( is_array( $eventFeedback_heading_3 ) && end( $eventFeedback_heading_3 ) != '' ) {
								echo end( $eventFeedback_heading_3 );
							} ?></h5>
						<h6><?php $eventFeedback_client_3 = get_post_custom_values( 'eventFeedback_client_3' );
							if ( is_array( $eventFeedback_client_3 ) && end( $eventFeedback_client_3 ) != '' ) {
								echo end( $eventFeedback_client_3 );
							} ?> <span><?php $eventFeedback_date_3 = get_post_custom_values( 'eventFeedback_date_3' );
								if ( is_array( $eventFeedback_date_3 ) && end( $eventFeedback_date_3 ) != '' ) {
									echo end( $eventFeedback_date_3 );
								} ?></span></h6>
						<p><?php $eventFeedback_excerpt_3 = get_post_custom_values( 'eventFeedback_excerpt_3' );
							if ( is_array( $eventFeedback_excerpt_3 ) && end( $eventFeedback_excerpt_3 ) != '' ) {
								echo end( $eventFeedback_excerpt_3 );
							} ?></p>
					</div><!-- 3 -->
				</div><!-- grid -->
			</div><!-- feedback -->
		<?php endif; ?>
			<!-- event feedback -->

			<!-- Puchase -->
		<?php // SOLD OUT?
		$eventSoldout = get_post_custom_values( 'eventSoldout' );
		$eventSoldout = $eventSoldout[0];
		if ( $eventSoldout == 'on' ) {
			echo '<a id="event_midpage_purchase" href="#event_tickets" style="opacity: 0.25;">SOLD OUT</a>';
		} else {
			echo '<a id="event_midpage_purchase" href="#event_tickets">PURCHASE TICKETS</a>';
		}
		?>


			<!-- VIDEO EMBED -->
		<?php
		$trigger = get_post_custom_values( 'eventVideo' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_video">
				<?php $eventVideo = get_post_custom_values( 'eventVideo' );
				if ( is_array( $eventVideo ) && end( $eventVideo ) != '' ) {
					echo end( $eventVideo );
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


			<!-- CONTINUED INTRODUCTION MODULE -->
		<?php
		$trigger = get_post_custom_values( 'eventIntro2Heading' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_intro2">
				<!-- content -->
				<div id="event_intro2_content">
					<!-- Introduction heading -->
					<h3 id="event_intro2_heading"><?php $eventIntro2Heading = get_post_custom_values( 'eventIntro2Heading' );
						if ( is_array( $eventIntro2Heading ) && end( $eventIntro2Heading ) != '' ) {
							echo end( $eventIntro2Heading );
						} ?></h3>
					<!-- Introduction text -->
					<div id="event_intro2_text"><?php $eventContinuedIntroText = get_post_custom_values( 'eventContinuedIntroText' );
						if ( is_array( $eventContinuedIntroText ) && end( $eventContinuedIntroText ) != '' ) {
							echo end( $eventContinuedIntroText );
						} ?></div>
				</div><!-- content -->
				<!-- Image right -->
				<img id="event_intro2_image" src="
                        <?php
				$eventIntro2Image = get_post_custom_values( 'eventIntro2Image' );
				if ( is_array( $eventIntro2Image ) && end( $eventIntro2Image ) != '' ) {
					echo end( $eventIntro2Image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- intro2 module-->
		<?php endif; ?>


			<!-- ADDITIONAL INTRODUCTION MODULE (3) -->
		<?php
		$trigger = get_post_custom_values( 'eventIntro3Heading' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_intro3">
				<!-- content -->
				<div id="event_intro3_content">
					<!-- Introduction heading -->
					<h3 id="event_intro3_heading"><?php $eventIntro3Heading = get_post_custom_values( 'eventIntro3Heading' );
						if ( is_array( $eventIntro3Heading ) && end( $eventIntro3Heading ) != '' ) {
							echo end( $eventIntro3Heading );
						} ?></h3>
					<!-- Introduction text -->
					<div id="event_intro3_text"><?php $eventContinuedIntroText3 = get_post_custom_values( 'eventContinuedIntroText3' );
						if ( is_array( $eventContinuedIntroText3 ) && end( $eventContinuedIntroText3 ) != '' ) {
							echo end( $eventContinuedIntroText3 );
						} ?></div>
				</div><!-- content -->
				<!-- Image right -->
				<img id="event_intro3_image" src="
                        <?php
				$eventIntro3Image = get_post_custom_values( 'eventIntro3Image' );
				if ( is_array( $eventIntro3Image ) && end( $eventIntro3Image ) != '' ) {
					echo end( $eventIntro3Image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- intro3 module-->
		<?php endif; ?>


			<!-- ADDITIONAL INTRODUCTION MODULE (4) -->
		<?php
		$trigger = get_post_custom_values( 'eventIntro4Heading' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_intro4">
				<!-- content -->
				<div id="event_intro4_content">
					<!-- Introduction heading -->
					<h3 id="event_intro4_heading"><?php $eventIntro4Heading = get_post_custom_values( 'eventIntro4Heading' );
						if ( is_array( $eventIntro4Heading ) && end( $eventIntro4Heading ) != '' ) {
							echo end( $eventIntro4Heading );
						} ?></h3>
					<!-- Introduction text -->
					<div id="event_intro4_text"><?php $eventContinuedIntroText4 = get_post_custom_values( 'eventContinuedIntroText4' );
						if ( is_array( $eventContinuedIntroText4 ) && end( $eventContinuedIntroText4 ) != '' ) {
							echo end( $eventContinuedIntroText4 );
						} ?></div>
				</div><!-- content -->
				<!-- Image right -->
				<img id="event_intro4_image" src="
                        <?php
				$eventIntro4Image = get_post_custom_values( 'eventIntro4Image' );
				if ( is_array( $eventIntro4Image ) && end( $eventIntro4Image ) != '' ) {
					echo end( $eventIntro4Image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- intro4 module-->
		<?php endif; ?>


			<!-- ADDITIONAL INTRODUCTION MODULE (5) -->
		<?php
		$trigger = get_post_custom_values( 'eventIntro5Heading' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_intro5">
				<!-- content -->
				<div id="event_intro5_content">
					<!-- Introduction heading -->
					<h3 id="event_intro5_heading"><?php $eventIntro5Heading = get_post_custom_values( 'eventIntro5Heading' );
						if ( is_array( $eventIntro5Heading ) && end( $eventIntro5Heading ) != '' ) {
							echo end( $eventIntro5Heading );
						} ?></h3>
					<!-- Introduction text -->
					<div id="event_intro5_text"><?php $eventContinuedIntroText5 = get_post_custom_values( 'eventContinuedIntroText5' );
						if ( is_array( $eventContinuedIntroText5 ) && end( $eventContinuedIntroText5 ) != '' ) {
							echo end( $eventContinuedIntroText5 );
						} ?></div>
				</div><!-- content -->
				<!-- Image right -->
				<img id="event_intro5_image" src="
                        <?php
				$eventIntro5Image = get_post_custom_values( 'eventIntro5Image' );
				if ( is_array( $eventIntro5Image ) && end( $eventIntro5Image ) != '' ) {
					echo end( $eventIntro5Image );
				}
				?>" alt="New York Wine Events"/>
			</div><!-- intro5 module-->
		<?php endif; ?>


			<!-- MAP -->
		<?php
		$trigger = get_post_custom_values( 'eventMap' );
		if ( is_array( $trigger ) && end( $trigger ) != '' ) :
		?>
			<div id="event_map">
				<a id="event_map_url" href="<?php $eventMapUrl = get_post_custom_values( 'eventMapUrl' );
				if ( is_array( $eventMapUrl ) && end( $eventMapUrl ) != '' ) {
					echo end( $eventMapUrl );
				} ?>">
					<img id="event_map_image" src="<?php $eventMap = get_post_custom_values( 'eventMap' );
					if ( is_array( $eventMap ) && end( $eventMap ) != '' ) {
						echo end( $eventMap );
					} ?>" alt="New York Wine Events Directions"/>
				</a>
			</div><!-- map -->
		<?php endif; ?>


			<!-- TICKET OPTIONS -->
		<?php
		$trigger  = get_post_custom_values( 'eventTicketsCard_1_heading' );
		$trigger2 = get_post_custom_values( 'eventTicketsCard_2_heading' );
		$trigger3 = get_post_custom_values( 'eventTicketsCard_3_heading' );
		if ( is_array( $trigger ) && end( $trigger ) != '' || is_array( $trigger2 ) && end( $trigger2 ) != '' || is_array( $trigger3 ) && end( $trigger3 ) != '' ) :
		?>
			<div id="event_tickets">
				<?php // SOLD OUT?
				$eventSoldout = get_post_custom_values( 'eventSoldout' );
				$eventSoldout = $eventSoldout[0];
				if ( $eventSoldout == 'on' ) {
					?>
					<h2>SOLD OUT</h2>
					<script type="text/javascript">
						jQuery( function () {
							jQuery( '#event_tickets' ).css( 'opacity', '0.25' );
						} );
					</script>
					<?php
				} else {
					echo '<h2>TICKET OPTIONS</h2>';
				}
				?>
				<div id="event_tickets_grid">
					<?php // CELL 1:
					$trigger = get_post_custom_values( 'eventTicketsCard_1_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_card">
							<?php $eventTicketsCard_1_subHeading = get_post_custom_values( 'eventTicketsCard_1_subHeading' );
							if ( is_array( $eventTicketsCard_1_subHeading ) && end( $eventTicketsCard_1_subHeading ) != '' ) {
								echo '<h6 class="event_tickets_sub_heading">' . end( $eventTicketsCard_1_subHeading ) . '</h6>';
							} else {
								echo '<h6 class="event_tickets_sub_heading">&nbsp;</h6>';
							} ?>
							<h3 class="event_tickets_heading"><?php $eventTicketsCard_1_heading = get_post_custom_values( 'eventTicketsCard_1_heading' );
								if ( is_array( $eventTicketsCard_1_heading ) && end( $eventTicketsCard_1_heading ) != '' ) {
									echo end( $eventTicketsCard_1_heading );
								} ?></h3>
							<p class="event_tickets_text"><?php $eventTicketsCard_1_text = get_post_custom_values( 'eventTicketsCard_1_text' );
								if ( is_array( $eventTicketsCard_1_text ) && end( $eventTicketsCard_1_text ) != '' ) {
									echo end( $eventTicketsCard_1_text );
								} ?></p>
							<span class="event_tickets_price"><?php $eventTicketsCard_1_price = get_post_custom_values( 'eventTicketsCard_1_price' );
								if ( is_array( $eventTicketsCard_1_price ) && end( $eventTicketsCard_1_price ) != '' ) {
									echo end( $eventTicketsCard_1_price );
								} ?></span>
							<?php
							$eventTicketsCard_1_purchase = get_post_custom_values( 'eventTicketsCard_1_purchase' );
							if ( is_array( $eventTicketsCard_1_purchase ) && end( $eventTicketsCard_1_purchase ) != '' ) {
								echo '<a class="event_tickets_purchase" href="' . end( $eventTicketsCard_1_purchase ) . '">PURCHASE TICKETS</a>';
							} else {
								echo '<a class="event_tickets_purchase_out" href="#">SOLD OUT</a>';
							} ?>
						</div><!-- card -->
					<?php endif; ?>
					<?php // CELL 2:
					$trigger = get_post_custom_values( 'eventTicketsCard_2_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_card">
							<?php $eventTicketsCard_2_subHeading = get_post_custom_values( 'eventTicketsCard_2_subHeading' );
							if ( is_array( $eventTicketsCard_2_subHeading ) && end( $eventTicketsCard_2_subHeading ) != '' ) {
								echo '<h6 class="event_tickets_sub_heading">' . end( $eventTicketsCard_2_subHeading ) . '</h6>';
							} else {
								echo '<h6 class="event_tickets_sub_heading">&nbsp;</h6>';
							} ?>
							<h3 class="event_tickets_heading"><?php $eventTicketsCard_2_heading = get_post_custom_values( 'eventTicketsCard_2_heading' );
								if ( is_array( $eventTicketsCard_2_heading ) && end( $eventTicketsCard_2_heading ) != '' ) {
									echo end( $eventTicketsCard_2_heading );
								} ?></h3>
							<p class="event_tickets_text"><?php $eventTicketsCard_2_text = get_post_custom_values( 'eventTicketsCard_2_text' );
								if ( is_array( $eventTicketsCard_2_text ) && end( $eventTicketsCard_2_text ) != '' ) {
									echo end( $eventTicketsCard_2_text );
								} ?></p>
							<span class="event_tickets_price"><?php $eventTicketsCard_2_price = get_post_custom_values( 'eventTicketsCard_2_price' );
								if ( is_array( $eventTicketsCard_2_price ) && end( $eventTicketsCard_2_price ) != '' ) {
									echo end( $eventTicketsCard_2_price );
								} ?></span>
							<?php
							$eventTicketsCard_2_purchase = get_post_custom_values( 'eventTicketsCard_2_purchase' );
							if ( is_array( $eventTicketsCard_2_purchase ) && end( $eventTicketsCard_2_purchase ) != '' ) {
								echo '<a class="event_tickets_purchase" href="' . end( $eventTicketsCard_2_purchase ) . '">PURCHASE TICKETS</a>';
							} else {
								echo '<a class="event_tickets_purchase_out " href="#">SOLD OUT</a>';
							} ?>
						</div><!-- card -->
					<?php endif; ?>
					<?php // CELL 3:
					$trigger = get_post_custom_values( 'eventTicketsCard_3_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_card">
							<?php $eventTicketsCard_3_subHeading = get_post_custom_values( 'eventTicketsCard_3_subHeading' );
							if ( is_array( $eventTicketsCard_3_subHeading ) && end( $eventTicketsCard_3_subHeading ) != '' ) {
								echo '<h6 class="event_tickets_sub_heading">' . end( $eventTicketsCard_3_subHeading ) . '</h6>';
							} else {
								echo '<h6 class="event_tickets_sub_heading">&nbsp;</h6>';
							} ?>
							<h3 class="event_tickets_heading"><?php $eventTicketsCard_3_heading = get_post_custom_values( 'eventTicketsCard_3_heading' );
								if ( is_array( $eventTicketsCard_3_heading ) && end( $eventTicketsCard_3_heading ) != '' ) {
									echo end( $eventTicketsCard_3_heading );
								} ?></h3>
							<p class="event_tickets_text"><?php $eventTicketsCard_3_text = get_post_custom_values( 'eventTicketsCard_3_text' );
								if ( is_array( $eventTicketsCard_3_text ) && end( $eventTicketsCard_3_text ) != '' ) {
									echo end( $eventTicketsCard_3_text );
								} ?></p>
							<span class="event_tickets_price"><?php $eventTicketsCard_3_price = get_post_custom_values( 'eventTicketsCard_3_price' );
								if ( is_array( $eventTicketsCard_3_price ) && end( $eventTicketsCard_3_price ) != '' ) {
									echo end( $eventTicketsCard_3_price );
								} ?></span>
							<?php
							$eventTicketsCard_3_purchase = get_post_custom_values( 'eventTicketsCard_3_purchase' );
							if ( is_array( $eventTicketsCard_3_purchase ) && end( $eventTicketsCard_3_purchase ) != '' ) {
								echo '<a class="event_tickets_purchase" href="' . end( $eventTicketsCard_3_purchase ) . '">PURCHASE TICKETS</a>';
							} else {
								echo '<a class="event_tickets_purchase_out" href="#">SOLD OUT</a>';
							} ?>
						</div><!-- card -->
					<?php endif; ?>
				</div><!-- grid -->
				<!-- ALSO CELL -->
				<div id="event_tickets_also_grid">
					<?php //  1:
					$trigger = get_post_custom_values( 'eventTicketsCard_1_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_also">
							<?php
							$trigger = get_post_custom_values( 'eventTicketsCard_1_also_1' );
							if ( is_array( $trigger ) && end( $trigger ) != '' ) : ?>
								<h4><span class="event_tickets_also_mobile_heading"
								          style="display: none;"><?php echo end( $eventTicketsCard_1_heading ); ?>&nbsp;</span>Also
									includes</h4>
								<ul>
									<?php $eventTicketsCard_1_also_1 = get_post_custom_values( 'eventTicketsCard_1_also_1' );
									if ( is_array( $eventTicketsCard_1_also_1 ) && end( $eventTicketsCard_1_also_1 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_1_also_1 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_1_also_2 = get_post_custom_values( 'eventTicketsCard_1_also_2' );
									if ( is_array( $eventTicketsCard_1_also_2 ) && end( $eventTicketsCard_1_also_2 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_1_also_2 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_1_also_3 = get_post_custom_values( 'eventTicketsCard_1_also_3' );
									if ( is_array( $eventTicketsCard_1_also_3 ) && end( $eventTicketsCard_1_also_3 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_1_also_3 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_1_also_4 = get_post_custom_values( 'eventTicketsCard_1_also_4' );
									if ( is_array( $eventTicketsCard_1_also_4 ) && end( $eventTicketsCard_1_also_4 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_1_also_4 ) . '</li>';
									} ?>
								</ul>
							<?php endif; ?>
						</div><!-- also -->
					<?php endif; ?>
					<?php // 2:
					$trigger = get_post_custom_values( 'eventTicketsCard_2_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_also">
							<?php
							$trigger = get_post_custom_values( 'eventTicketsCard_2_also_1' );
							if ( is_array( $trigger ) && end( $trigger ) != '' ) : ?>
								<h4><span class="event_tickets_also_mobile_heading"
								          style="display: none;"><?php echo end( $eventTicketsCard_2_heading ); ?>&nbsp;</span>Also
									includes</h4>
								<ul>
									<?php $eventTicketsCard_2_also_1 = get_post_custom_values( 'eventTicketsCard_2_also_1' );
									if ( is_array( $eventTicketsCard_2_also_1 ) && end( $eventTicketsCard_2_also_1 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_2_also_1 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_2_also_2 = get_post_custom_values( 'eventTicketsCard_2_also_2' );
									if ( is_array( $eventTicketsCard_2_also_2 ) && end( $eventTicketsCard_2_also_2 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_2_also_2 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_2_also_3 = get_post_custom_values( 'eventTicketsCard_2_also_3' );
									if ( is_array( $eventTicketsCard_2_also_3 ) && end( $eventTicketsCard_2_also_3 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_2_also_3 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_2_also_4 = get_post_custom_values( 'eventTicketsCard_2_also_4' );
									if ( is_array( $eventTicketsCard_2_also_4 ) && end( $eventTicketsCard_2_also_4 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_2_also_4 ) . '</li>';
									} ?>
								</ul>
							<?php endif; ?>
						</div><!-- also -->
					<?php endif; ?>
					<?php // 3:
					$trigger = get_post_custom_values( 'eventTicketsCard_3_heading' );
					if ( is_array( $trigger ) && end( $trigger ) != '' ) :
						?>
						<div class="event_tickets_cell_also">
							<?php
							$trigger = get_post_custom_values( 'eventTicketsCard_3_also_1' );
							if ( is_array( $trigger ) && end( $trigger ) != '' ) : ?>
								<h4><span class="event_tickets_also_mobile_heading"
								          style="display: none;"><?php echo end( $eventTicketsCard_3_heading ); ?>&nbsp;</span>Also
									includes</h4>
								<ul>
									<?php $eventTicketsCard_3_also_1 = get_post_custom_values( 'eventTicketsCard_3_also_1' );
									if ( is_array( $eventTicketsCard_3_also_1 ) && end( $eventTicketsCard_3_also_1 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_3_also_1 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_3_also_2 = get_post_custom_values( 'eventTicketsCard_3_also_2' );
									if ( is_array( $eventTicketsCard_3_also_2 ) && end( $eventTicketsCard_3_also_2 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_3_also_2 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_3_also_3 = get_post_custom_values( 'eventTicketsCard_3_also_3' );
									if ( is_array( $eventTicketsCard_3_also_3 ) && end( $eventTicketsCard_3_also_3 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_3_also_3 ) . '</li>';
									} ?>
									<?php $eventTicketsCard_3_also_4 = get_post_custom_values( 'eventTicketsCard_3_also_4' );
									if ( is_array( $eventTicketsCard_3_also_4 ) && end( $eventTicketsCard_3_also_4 ) != '' ) {
										echo '<li>' . end( $eventTicketsCard_3_also_4 ) . '</li>';
									} ?>
								</ul>
							<?php endif; ?>
						</div><!-- also -->
					<?php endif; ?>
				</div><!-- grid -->
			</div><!-- tickets -->
			<script type="text/javascript">
				jQuery( function () {
					var options = jQuery( '.event_tickets_cell_card:visible' );
					var total = options.length;
					if ( total == 1 ) {
						jQuery( '.event_tickets_cell_card' ).addClass( 'grid_1' );
						jQuery( '#event_tickets_grid' ).addClass( 'grid_1' );
						jQuery( '#event_tickets_also_grid' ).addClass( 'grid_1' );

					}
					if ( total == 2 ) {
						jQuery( '.event_tickets_cell_card' ).addClass( 'grid_2' );
						jQuery( '#event_tickets_grid' ).addClass( 'grid_2' );
						jQuery( '#event_tickets_also_grid' ).addClass( 'grid_2' );
					}
					if ( total == 3 ) {
						jQuery( '.event_tickets_cell_card' ).addClass( 'grid_3' );
						jQuery( '#event_tickets_grid' ).addClass( 'grid_3' );
						jQuery( '#event_tickets_also_grid' ).addClass( 'grid_3' );
					}
				} );
			</script>
		<?php endif; ?>

		<?php endwhile; endif; // Page Loop ?>


		<!-- RELATED -->
		<div id="events_related">
			<h2 id="events_related_heading">RELATED EVENTS</h2>
			<div id="events_related_grid">
				<?php
				$events_list = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => 25 ) );
				while ( $events_list->have_posts() ) : $events_list->the_post();
					?>
					<div class="related_list_cell" id="<?php the_ID(); ?>">
						<span class="related_list_cell_publish_date"
						      style="display: none;"><?php the_time( 'F j, Y' ); ?></span>
						<!-- Event image (featured) -->
						<img class="related_list_cell_image" src="
                            <?php
						$related_list_cell_image = get_post_custom_values( 'events_list_cell_image' );
						if ( is_array( $related_list_cell_image ) && end( $related_list_cell_image ) != '' ) {
							echo end( $related_list_cell_image );
						} else {
							echo bloginfo( 'template_url' ) . '/images/events_default_image.jpg';
						}
						?>" alt="New York Wine Events"/>
						<!-- Content -->
						<div class="related_list_cell_content">
							<!-- Date and Time Overlay -->
							<div class="related_list_cell_image_overlay">
								<h3 class="related_list_cell_image_overlay_date"><?php $relatedDate = get_post_custom_values( 'eventDate' );
									if ( is_array( $relatedDate ) && end( $relatedDate ) != '' ) {
										echo end( $relatedDate );
									} ?></h3>
								<h4 class="related_list_cell_image_overlay_time"><?php $relatedTimePreview = get_post_custom_values( 'eventTimePreview' );
									if ( is_array( $relatedTimePreview ) && end( $relatedTimePreview ) != '' ) {
										echo end( $relatedTimePreview );
									} ?></h4>
							</div><!-- overlay -->
							<div class="related_list_cell_card">
								<h2 class="related_list_cell_card_title"><a
											href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="related_list_cell_card_excerpt"><?php the_excerpt(); ?></div>
								<a class="related_list_cell_card_purchase" href="<?php the_permalink(); ?>">PURCHASE
									TICKETS</a>
							</div><!-- card -->
						</div><!-- content -->
					</div><!-- cell -->
				<?php endwhile; ?>
			</div><!-- grid -->

			<!-- Load more -->
			<a class="related_list_more" href="<?php bloginfo( 'url' ); ?>/upcoming-events/">Explore all events</a>

			<!-- LOGIC -->
			<script type="text/javascript">
				// 0) Remove current event from recommended:
				var url = window.location.href;
				var currentEvent = jQuery( '.related_list_cell' );
				currentEvent.each(
					function () {
						var itemUrl = jQuery( this ).find( '.related_list_cell_card_purchase' ).attr( 'href' );
						if ( itemUrl === url ) {
							jQuery( this ).remove();
						}
					}
				);
				// 1) Hide Expired:
				// HIDE PAST EVENTS:
				var events = jQuery( '.related_list_cell' );
				events.each( function () {
					// Process date:
					var date = jQuery( this ).find( 'span.related_list_cell_publish_date' ).text();
					var date = Date.parse( date );
					var date = date.toString();
					var date = date.slice( 0, 6 );
					// Process today:
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth() + 1; //January is 0!
					var yyyy = today.getFullYear();
					if ( dd < 10 ) {
						dd = '0' + dd
					}
					if ( mm < 10 ) {
						mm = '0' + mm
					}
					var today = mm + '/' + dd + '/' + yyyy;
					var today = Date.parse( today );
					var today = today.toString();
					var today = today.slice( 0, 6 );
					// Compare:
					if ( date < today ) {
						jQuery( this ).hide();
					}
				} );
				// 2) Reverse Order:
				jQuery.fn.reverse = [].reverse;
				jQuery( '.related_list_cell' ).reverse().prependTo( '#events_related_grid' );
				// 3) Show 2:
				events.each( function ( index, value ) {
					var item = jQuery( this );
					if ( item.is( ':visible' ) ) {
						item.addClass( 'visibleRelated' );
					}
				} );
				jQuery( '.visibleRelated' ).slice( 2 ).addClass( 'visibleRelatedMore' );
				jQuery( '.visibleRelatedMore' ).hide();
				// 4) Show All on click, including Event inded above
				jQuery( function () {
					jQuery( '.related_list_more' ).click(
						function ( e ) {
							e.preventDefault();
							jQuery( '.visibleRelatedMore' ).slideDown();
							jQuery( '.related_list_more' ).slideUp();
						}
					);
				} );
			</script>

		</div><!-- related -->


	</div><!-- ..content -->


<?php get_footer(); ?>