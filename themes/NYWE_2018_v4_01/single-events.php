<?php get_header();

$event_purchase_link = get_field( 'event_purchase_link' );
?>

	<!-- ADVERT OVERRIDE -->
<?php
$advertHead = get_field( 'advert_head' );
if ( ! empty( $advertHead ) ) {
	echo $advertHead;
} ?>

	<!-- CONTENT -->
	<div id="event" class="content" style="width: 100%;">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- EVENT CARD -->
			<div class="events_list_cell">
				<?php

				// Event banner image.
				$event_image = get_field( 'event_image' );
				printf( '<img class="events_list_cell_image" src="%s" srcset="%s" alt="New York Wine Events">',
					empty( $event_image ) ? bloginfo( 'template_url' ) . '/images/events_default_image.jpg' : wp_get_attachment_image_url( $event_image, 'full' ),
					empty( $event_image ) ? '' : wp_get_attachment_image_srcset( $event_image )
				);

				// Event Logo
				$event_logo = get_field( 'event_image_logo' );
				if ( ! empty( $event_logo ) ) {
					printf( '<img class="events_list_cell_image_logo" src="%s" srcset="%s" alt="New York Wine Events"/>',
						wp_get_attachment_image_url( $event_logo, 'full' ),
						wp_get_attachment_image_srcset( $event_logo )
					);
				} ?>

				<!-- Content -->
				<div class="events_list_cell_content">
					<!-- Date and Time Overlay -->
					<div class="events_list_cell_image_overlay">
						<?php
						$event_date = get_field( 'event_date', false, false );
						if ( ! empty( $event_date ) ) {

							$event_date = date( 'F d, Y', strtotime( $event_date ) );

							printf( '<h3 class="events_list_cell_image_overlay_date">%s</h3>',
								esc_html( $event_date )
							);
						}

						$event_city = get_field( 'event_city' );
						if ( ! empty( $event_city ) ) {
							printf( '<h4 class="events_list_cell_image_overlay_time">%s</h4>',
								esc_html( $event_city )
							);
						} ?>
					</div><!-- overlay -->
					<div class="events_list_cell_card">
						<h2 class="events_list_cell_card_title"><?php the_title(); ?></h2>
						<div class="events_list_cell_card_excerpt">
							<?php
							$event_time = get_field( 'event_time' );
							if ( ! empty( $event_time ) ) {
								printf( '<span>%s</span>',
									wp_kses_post( $event_time )
								);
							} ?>
							<?php the_excerpt(); ?>
						</div>

						<?php
						$event_sold_out = get_field( 'event_sold_out' );
						if ( $event_sold_out ) {
							echo '<a class="events_list_cell_card_purchase sold_out" href="#event_tickets">SOLD OUT</a>';
						} else {
							echo '<a class="events_list_cell_card_purchase" href="' . esc_url( $event_purchase_link ) . '">PURCHASE TICKETS</a>';
						} ?>

					</div><!-- card -->
				</div><!-- content -->
			</div><!-- end CARD -->


			<!-- PRESENTING SPONSOR -->
		<?php
		$event_presenting_sponsor_img = get_field( 'event_presenting_sponsor' );
		$event_presenting_sponsor_url = get_field( 'event_presenting_sponsor_url' );
		if ( $event_presenting_sponsor_img ) : ?>

			<div id="event_presenting_sponsor" class="center">
				<h2>Presenting Sponsor</h2>
				<?php
				if ( ! empty( $event_presenting_sponsor_url ) ) {
					printf( '<a class="event_presenting_sponsor_url" href="%s">',
						esc_url( $event_presenting_sponsor_url )
					);
				}

				echo \NYWE\generate_lazy_load_params(
					sprintf( '<img class="event_presenting_sponsor_image" src="%s" srcset="%s" alt="Event Sponsor">',
						wp_get_attachment_image_url( $event_presenting_sponsor_img, 'large' ),
						wp_get_attachment_image_srcset( $event_presenting_sponsor_img )
					)
				);

				if ( ! empty( $event_presenting_sponsor_url ) ) {
					echo '</a>';
				} ?>
			</div><!-- presenting -->
		<?php endif; ?><!-- presenting sponsor -->

		<!-- CMS -->
		<div id="event_CMS" class="center">
			<?php the_content(); ?>
		</div>

		<!-- INTRODUCTION MODULE -->
		<?php
		$event_intro_image = get_field( 'event_intro_image' );
		if ( ! empty( $event_intro_image ) ) : ?>

			<div id="event_intro">
				<!-- Image left -->
				<?php
				echo \NYWE\generate_lazy_load_params(
					sprintf( '<img id="event_intro_image" src="%s" srcset="%s" alt="New York Wine Events">',
						wp_get_attachment_image_url( $event_intro_image, 'large' ),
						wp_get_attachment_image_srcset( $event_intro_image )
					)
				); ?>
				<!-- content -->
				<div id="event_intro_content">
					<!-- Introduction heading -->
					<?php
					$event_intro_heading = get_field( 'event_intro_heading' );
					if ( ! empty( $event_intro_heading ) ) {
						printf( '<h3 id="event_intro_heading">%s</h3>',
							esc_html( $event_intro_heading )
						);
					}

					$event_intro_text = get_field( 'event_intro_text' );
					if ( ! empty( $event_intro_text ) ) {
						printf( '<p id="event_intro_text">%s</p>',
							esc_html( $event_intro_text )
						);
					}

					$event_intro_items = get_field( 'repeater_event_intro_item' );
					if ( ! empty( $event_intro_items ) ) {
						foreach( $event_intro_items as $index => $item ) {
							$count = $index + 1;
							$slug  = "event_intro_item_{$count}";

							echo "<div id=\"{$slug}\">";

							if ( ! empty( $item['heading'] ) ) {
								printf( '<h3 class="%s" id="event_intro_item_1_heading">%s</h3>',
									esc_attr( $slug . "_heading" ),
									esc_html( $item['heading'] )
								);
							}

							if ( ! empty( $item['text'] ) ) {
								printf( '<p class="%s" id="event_intro_item_1_text">%s</p>',
									esc_attr( $slug . "_text" ),
									esc_html( $item['text'] )
								);
							}

							echo '</div>';
						}
					}

					if ( $event_sold_out ) {
						echo '<a id="event_intro_purchase" href="#event_tickets" style="opacity: 0.25;">SOLD OUT</a>';
					} else {
						echo '<a id="event_intro_purchase" href="' . esc_url( $event_purchase_link ) . '">PURCHASE TICKETS</a>';
					} ?>
				</div><!-- content -->
			</div><!-- intro module-->
		<?php endif; ?>


		<!-- Sponsors -->
		<?php
		$sponsors = get_field( 'sponsors' );
		if ( ! empty( $sponsors ) ) : ?>
			<div id="event_sponsors">
				<div id="event_sponsors_grid">
					<?php
					shuffle( $sponsors );
					foreach ( $sponsors as $sponsor ) {

						$sponsor_image = wp_get_attachment_image_url( $sponsor['image'], 'medium' );
						if ( empty( $sponsor_image ) ) {
							continue;
						}

						$sponsor_url = $sponsor['url'] ?? '';
						if ( ! empty( $sponsor_url ) ) {
							printf( '<a href="%s" target="_blank">',
								esc_url( $sponsor_url )
							);
						}

						echo \NYWE\generate_lazy_load_params(
							sprintf( '<img src="%s" srcset="%s" alt="New York Wine Events Sponsor">',
								esc_url( $sponsor_image ),
								wp_get_attachment_image_srcset( $sponsor_image )
							)
						);

						if ( ! empty( $sponsor_url ) ) {
							echo '</a>';
						}

					} ?>
				</div>
				<a id="event_sponsor_more" href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/menu3.png"/>
					Show all sponsors</a>
			</div>
			<script type="text/javascript">
				jQuery( function () {
					// LOGIC:
					var sponsor = jQuery( '#event_sponsors_grid a' );

					// If ONLY 1:
					var count = sponsor.length;
					if ( count === 1 ) {
						jQuery( '#event_sponsors_grid' ).addClass( 'single' );
					}

					// HIDE MORE THAN 6:
					sponsor.each( function () {
						var item = jQuery( this );
						if ( item.is( ':visible' ) ) {
							item.addClass( 'visibleSponsor' );
						}
					} );
					jQuery( '.visibleSponsor' ).slice( 6 ).addClass( 'visibleSponsorMore' );
					jQuery( '.visibleSponsorMore' ).hide();

					// SHOW MORE THAN 4 ON CLICK:
					jQuery( '#event_sponsor_more' ).click(
						function ( e ) {
							e.preventDefault();
							jQuery( '.visibleSponsorMore' ).slideDown();
							jQuery( '#event_sponsor_more' ).fadeOut();
						}
					);
				} ); // end
			</script>
		<?php endif; ?>


		<!-- EVENT FEEDBACK -->
		<?php
		$event_feedback = get_field( 'repeater_event_feedback' );
		if ( ! empty( $event_feedback ) ) : ?>
			<div id="event_feedback">
				<h2>Guest Experiences</h2>
				<div class="instagram-feed">
					<?= do_shortcode( '[instagram-feed disablelightbox=true type=user]' ); ?>
				</div>
				<div id="event_feedback_grid">
					<?php
					foreach( $event_feedback as $index => $feedback ) {
						$count = $index + 1;
						$slug  = "event_feedback_{$count}";

						echo '<div id="' . $slug . '" class="event_feedback_card">';

							if ( ! empty( $feedback['heading'] ) ) {
								printf( '<h5>%s</h5>',
									esc_html( $feedback['heading'] )
								);
							}

							if ( ! empty( $feedback['client'] ) ) {
								printf( '<h6><span>%s</span></h6>',
									esc_html( $feedback['client'] )
								);
							}

							if ( ! empty( $feedback['excerpt'] ) ) {
								printf( '<p>%s</p>',
									esc_html( $feedback['excerpt'] )
								);
							}

						echo '</div>';
					} ?>
				</div>
			</div>
		<?php
		endif;

		// Purchase
		if ( $event_sold_out ) {
			echo '<a id="event_midpage_purchase" href="#event_tickets" style="opacity: 0.25;">SOLD OUT</a>';
		} else {
			echo '<a id="event_midpage_purchase" href="' . esc_url( $event_purchase_link ) . '">PURCHASE TICKETS</a>';
		}

		// Video embed.
		$event_video = get_field( 'event_video' );
		if ( ! empty( $event_video ) ) {
			printf( '<div id="event_video">%s</div>',
				$event_video
			);
		}

		// Global advert.
		$options  = get_option( 'theme_settings' );
		$override = get_post_custom_values( 'advert' );
		if ( is_array( $override ) && end( $override ) != '' ) {
			echo '<div class="advert">' . end( $override ) . '</div>';
		} else {
			if ( $options['global_advert_3'] ) {
				echo '<div class="advert">' . $options['global_advert_3'] . '</div>';
			}
		} ?>


		<!-- CONTINUED INTRODUCTION MODULE -->
		<?php
		$event_continued_intros = get_field( 'repeater_continued_intros' );
		if ( ! empty( $event_continued_intros ) ) {
			foreach( $event_continued_intros as $index => $intro ) {
				$count = $index + 1;
				$slug  = "event_intro{$count}";

				echo '<div id="' . $slug . '">';

					if ( ! empty( $intro['introduction_text'] ) || ! empty( $intro['heading'] ) ) {
						echo '<div id="' . $slug . '_content">';

							if ( ! empty( $intro['heading'] ) ) {
								printf( '<h3 id="event_intro%s_heading">%s</h3>',
									$count,
									esc_html( $intro['heading'] )
								);
							}

							if ( ! empty( $intro['introduction_text'] ) ) {
								printf( '<div id="event_intro%s_text">%s</div>',
									$count,
									wp_kses_post( $intro['introduction_text'] )
								);
							}

						echo '</div>';
					}

					if ( ! empty( $intro['image'] ) ) {
						echo \NYWE\generate_lazy_load_params(
							sprintf( '<img id="event_intro%s_image" src="%s" srcset="%s" alt="New York Wine Events">',
								$count,
								wp_get_attachment_image_url( $intro['image'], 'large' ),
								wp_get_attachment_image_srcset( $intro['image'] )
							)
						);
					}
				echo '</div>';
			}
		} ?>


			<!-- MAP -->
		<?php
		$event_map = get_field( 'event_map' );
		if ( ! empty( $event_map ) ) {

			echo '<div id="event_map">';

				$event_map_url = get_field( 'event_map_url' );
				if ( ! empty( $event_map_url ) ) {
					printf( '<a id="event_map_url" href="%s">',
						esc_url( $event_map_url )
					);
				}

				echo \NYWE\generate_lazy_load_params(
					sprintf( '<img id="event_map_image" src="%s" srcset="%s">',
						wp_get_attachment_image_url( $event_map, 'full' ),
						wp_get_attachment_image_srcset( $event_map )
					)
				);

				if ( ! empty( $event_map_url ) ) {
					echo '</a>';
				}

			echo '</div>';

		} ?>


			<!-- TICKET OPTIONS -->
		<?php
		$event_tickets = get_field( 'repeater_event_ticket_cards' );
		if ( ! empty( $event_tickets ) ) : ?>
			<div id="event_tickets">

				<?php
				if ( $event_sold_out ) : ?>
					<h2>SOLD OUT</h2>
					<script type="text/javascript">
						jQuery( function () {
							jQuery( '#event_tickets' ).css( 'opacity', '0.25' );
						} );
					</script>
				<?php else:
					echo '<h2>TICKET OPTIONS</h2>';
				endif;

				echo '<div id="event_tickets_grid" class="grid_3">';
					foreach( $event_tickets as $index => $ticket ) : ?>
						<div class="event_tickets_cell_card grid_3">
							<h6 class="event_tickets_sub_heading"><?= esc_html( $ticket['subheading'] ); ?></h6>
							<h3 class="event_tickets_heading"><?= wp_kses_post( $ticket['heading'] ); ?></h3>
							<p class="event_tickets_text"><?= esc_html( $ticket['text'] ); ?></p>
							<span class="event_tickets_price"><?= esc_html( $ticket['price'] ); ?></span>
							<?php
							if ( ! empty( $ticket['purchase_link'] ) ) {
								printf( '<a class="event_tickets_purchase" href="%s">PURCHASE TICKETS</a>',
									esc_url( $ticket['purchase_link'] )
								);
							} else {
								echo '<a class="event_tickets_purchase_out" href="#">SOLD OUT</a>';
							} ?>
						</div>
					<?php
					endforeach; ?>
				</div>
				<div id="event_tickets_also_grid">
					<?php
					foreach( $event_tickets as $index => $ticket ) : ?>
						<div class="event_tickets_cell_also">
							<h4>
								<span class="event_tickets_also_mobile_heading" style="display: none;"><?= $ticket['heading']; ?>&nbsp;</span>
								Also includes
							</h4>
							<ul>
								<?php
								if ( ! empty( $ticket['includes'] ) ) {
									foreach( $ticket['includes'] as $include ) {

										if ( empty( $include['text'] ) ) {
											continue;
										}

										printf( "<li>%s</li>",
											esc_html( $include['text'] )
										);

									}
								} ?>
							</ul>
						</div>
					<?php
					endforeach; ?>
				</div>
			</div>
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
		<?php endif;

		endwhile; endif; // Page Loop ?>


		<!-- RELATED -->
		<div id="events_related">
			<h2 id="events_related_heading">RELATED EVENTS</h2>
			<div id="events_related_grid">
				<?php
				$events_list = new WP_Query( array(
					'post_type'      => 'events',
					'posts_per_page' => 25,
					'post_status'    => 'publish',
					'order'          => 'ASC',
					'date_query'     => array(
						'after' => date( 'F j, Y' )
					)
				) );
				while ( $events_list->have_posts() ) : $events_list->the_post();
					?>
					<div class="related_list_cell" id="<?php the_ID(); ?>">
						<span class="related_list_cell_publish_date"
						      style="display: none;"><?php the_time( 'F j, Y' ); ?></span>
						<!-- Event image (featured) -->
						<?php
						$event_image = get_field( 'event_image' );
						if ( ! empty( $event_image ) ) {
							echo \NYWE\generate_lazy_load_params(
								sprintf( '<img class="related_list_cell_image" src="%s" srcset="%s" alt="New York Wine Events">',
									wp_get_attachment_image_url( $event_image, 'large' ),
									wp_get_attachment_image_srcset( $event_image )
								)
							);
						} ?>
						<!-- Content -->
						<div class="related_list_cell_content">
							<!-- Date and Time Overlay -->
							<div class="related_list_cell_image_overlay">
								<?php
								$event_date = get_field( 'event_date', false, false );
								if ( ! empty( $event_date ) ) {

									$event_date = date( 'F d, Y', strtotime( $event_date ) );

									printf( '<h3 class="related_list_cell_image_overlay_date">%s</h3>',
										esc_html( $event_date )
									);
									
								} ?>
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
				// 3) Show 2:
				var events = jQuery( '.related_list_cell' );
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