	<!-- SPONSORS -->
	<div id="widget_sponsors" class="widget">
	
		<h3 class="widgettitle">SPONSORS</h3>

		<?php include(TEMPLATEPATH . '/DFP-advert_tower.php'); ?>


		<?php // SPONSOR LOGIC:
      
			if ( isset($activateSidebar) && ($activateSidebar == true) ) { 

				// SPONSOR 1:
				$trigger_1 = get_post_custom_values('custom_sponsors_trigger_1');
				if ( end($trigger_1) == 'on' ) {
					$img_1 = get_post_meta(get_the_ID(), 'custom_sponsors_1', true);
					$url_1 = get_post_custom_values('custom_sponsors_url_1');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_1) . '">';
					echo '<img src="' . $img_1['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 2:
				$trigger_2 = get_post_custom_values('custom_sponsors_trigger_2');
				if ( end($trigger_2) == 'on' ) {
					$img_2 = get_post_meta(get_the_ID(), 'custom_sponsors_2', true);
					$url_2 = get_post_custom_values('custom_sponsors_url_2');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_2) . '">';
					echo '<img src="' . $img_2['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 3:
				$trigger_3 = get_post_custom_values('custom_sponsors_trigger_3');
				if ( end($trigger_3) == 'on' ) {
					$img_3 = get_post_meta(get_the_ID(), 'custom_sponsors_3', true);
					$url_3 = get_post_custom_values('custom_sponsors_url_3');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_3) . '">';
					echo '<img src="' . $img_3['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 4:
				$trigger_4 = get_post_custom_values('custom_sponsors_trigger_4');
				if ( end($trigger_4) == 'on' ) {
					$img_4 = get_post_meta(get_the_ID(), 'custom_sponsors_4', true);
					$url_4 = get_post_custom_values('custom_sponsors_url_4');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_4) . '">';
					echo '<img src="' . $img_4['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 5:
				$trigger_5 = get_post_custom_values('custom_sponsors_trigger_5');
				if ( end($trigger_5) == 'on' ) {
					$img_5 = get_post_meta(get_the_ID(), 'custom_sponsors_5', true);
					$url_5 = get_post_custom_values('custom_sponsors_url_5');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_5) . '">';
					echo '<img src="' . $img_5['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 6:
				$trigger_6 = get_post_custom_values('custom_sponsors_trigger_6');
				if ( end($trigger_6) == 'on' ) {
					$img_6 = get_post_meta(get_the_ID(), 'custom_sponsors_6', true);
					$url_6 = get_post_custom_values('custom_sponsors_url_6');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_6) . '">';
					echo '<img src="' . $img_6['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 7:
				$trigger_7 = get_post_custom_values('custom_sponsors_trigger_7');
				if ( end($trigger_7) == 'on' ) {
					$img_7 = get_post_meta(get_the_ID(), 'custom_sponsors_7', true);
					$url_7 = get_post_custom_values('custom_sponsors_url_7');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_7) . '">';
					echo '<img src="' . $img_7['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 8:
				$trigger_8 = get_post_custom_values('custom_sponsors_trigger_8');
				if ( end($trigger_8) == 'on' ) {
					$img_8 = get_post_meta(get_the_ID(), 'custom_sponsors_8', true);
					$url_8 = get_post_custom_values('custom_sponsors_url_8');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_8) . '">';
					echo '<img src="' . $img_8['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 9:
				$trigger_9 = get_post_custom_values('custom_sponsors_trigger_9');
				if ( end($trigger_9) == 'on' ) {
					$img_9 = get_post_meta(get_the_ID(), 'custom_sponsors_9', true);
					$url_9 = get_post_custom_values('custom_sponsors_url_9');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_9) . '">';
					echo '<img src="' . $img_9['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 10:
				$trigger_10 = get_post_custom_values('custom_sponsors_trigger_10');
				if ( end($trigger_10) == 'on' ) {
					$img_10 = get_post_meta(get_the_ID(), 'custom_sponsors_10', true);
					$url_10 = get_post_custom_values('custom_sponsors_url_10');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_10) . '">';
					echo '<img src="' . $img_10['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}


				// SPONSOR 11:
				$trigger_11 = get_post_custom_values('custom_sponsors_trigger_11');
				if ( end($trigger_11) == 'on' ) {
					$img_11 = get_post_meta(get_the_ID(), 'custom_sponsors_11', true);
					$url_11 = get_post_custom_values('custom_sponsors_url_11');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_11) . '">';
					echo '<img src="' . $img_11['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 12:
				$trigger_12 = get_post_custom_values('custom_sponsors_trigger_12');
				if ( end($trigger_12) == 'on' ) {
					$img_12 = get_post_meta(get_the_ID(), 'custom_sponsors_12', true);
					$url_12 = get_post_custom_values('custom_sponsors_url_12');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_12) . '">';
					echo '<img src="' . $img_12['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 13:
				$trigger_13 = get_post_custom_values('custom_sponsors_trigger_13');
				if ( end($trigger_13) == 'on' ) {
					$img_13 = get_post_meta(get_the_ID(), 'custom_sponsors_13', true);
					$url_13 = get_post_custom_values('custom_sponsors_url_13');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_13) . '">';
					echo '<img src="' . $img_13['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 14:
				$trigger_14 = get_post_custom_values('custom_sponsors_trigger_14');
				if ( end($trigger_14) == 'on' ) {
					$img_14 = get_post_meta(get_the_ID(), 'custom_sponsors_14', true);
					$url_14 = get_post_custom_values('custom_sponsors_url_14');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_14) . '">';
					echo '<img src="' . $img_14['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 15:
				$trigger_15 = get_post_custom_values('custom_sponsors_trigger_15');
				if ( end($trigger_15) == 'on' ) {
					$img_15 = get_post_meta(get_the_ID(), 'custom_sponsors_15', true);
					$url_15 = get_post_custom_values('custom_sponsors_url_15');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_15) . '">';
					echo '<img src="' . $img_15['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 16:
				$trigger_16 = get_post_custom_values('custom_sponsors_trigger_16');
				if ( end($trigger_16) == 'on' ) {
					$img_16 = get_post_meta(get_the_ID(), 'custom_sponsors_16', true);
					$url_16 = get_post_custom_values('custom_sponsors_url_16');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_16) . '">';
					echo '<img src="' . $img_16['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 17:
				$trigger_17 = get_post_custom_values('custom_sponsors_trigger_17');
				if ( end($trigger_17) == 'on' ) {
					$img_17 = get_post_meta(get_the_ID(), 'custom_sponsors_17', true);
					$url_17 = get_post_custom_values('custom_sponsors_url_17');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_17) . '">';
					echo '<img src="' . $img_17['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}
			
				// SPONSOR 18:
				$trigger_18 = get_post_custom_values('custom_sponsors_trigger_18');
				if ( end($trigger_18) == 'on' ) {
					$img_18 = get_post_meta(get_the_ID(), 'custom_sponsors_18', true);
					$url_18 = get_post_custom_values('custom_sponsors_url_18');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_18) . '">';
					echo '<img src="' . $img_18['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 19:
				$trigger_19 = get_post_custom_values('custom_sponsors_trigger_19');
				if ( end($trigger_19) == 'on' ) {
					$img_19 = get_post_meta(get_the_ID(), 'custom_sponsors_19', true);
					$url_19 = get_post_custom_values('custom_sponsors_url_19');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_19) . '">';
					echo '<img src="' . $img_19['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 20:
				$trigger_20 = get_post_custom_values('custom_sponsors_trigger_20');
				if ( end($trigger_20) == 'on' ) {
					$img_20 = get_post_meta(get_the_ID(), 'custom_sponsors_20', true);
					$url_20 = get_post_custom_values('custom_sponsors_url_20');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_20) . '">';
					echo '<img src="' . $img_20['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 21:
				$trigger_21 = get_post_custom_values('custom_sponsors_trigger_21');
				if ( end($trigger_21) == 'on' ) {
					$img_21 = get_post_meta(get_the_ID(), 'custom_sponsors_21', true);
					$url_21 = get_post_custom_values('custom_sponsors_url_21');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_21) . '">';
					echo '<img src="' . $img_21['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 22:
				$trigger_22 = get_post_custom_values('custom_sponsors_trigger_22');
				if ( end($trigger_22) == 'on' ) {
					$img_22 = get_post_meta(get_the_ID(), 'custom_sponsors_22', true);
					$url_22 = get_post_custom_values('custom_sponsors_url_22');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_22) . '">';
					echo '<img src="' . $img_22['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 23:
				$trigger_23 = get_post_custom_values('custom_sponsors_trigger_23');
				if ( end($trigger_23) == 'on' ) {
					$img_23 = get_post_meta(get_the_ID(), 'custom_sponsors_23', true);
					$url_23 = get_post_custom_values('custom_sponsors_url_23');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_23) . '">';
					echo '<img src="' . $img_23['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 20:
				$trigger_24 = get_post_custom_values('custom_sponsors_trigger_24');
				if ( end($trigger_24) == 'on' ) {
					$img_24 = get_post_meta(get_the_ID(), 'custom_sponsors_24', true);
					$url_24 = get_post_custom_values('custom_sponsors_url_24');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_24) . '">';
					echo '<img src="' . $img_24['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 25:
				$trigger_25 = get_post_custom_values('custom_sponsors_trigger_25');
				if ( end($trigger_25) == 'on' ) {
					$img_25 = get_post_meta(get_the_ID(), 'custom_sponsors_25', true);
					$url_25 = get_post_custom_values('custom_sponsors_url_25');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_25) . '">';
					echo '<img src="' . $img_25['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 26:
				$trigger_26 = get_post_custom_values('custom_sponsors_trigger_26');
				if ( end($trigger_26) == 'on' ) {
					$img_26 = get_post_meta(get_the_ID(), 'custom_sponsors_26', true);
					$url_26 = get_post_custom_values('custom_sponsors_url_26');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_26) . '">';
					echo '<img src="' . $img_26['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 27:
				$trigger_27 = get_post_custom_values('custom_sponsors_trigger_27');
				if ( end($trigger_27) == 'on' ) {
					$img_27 = get_post_meta(get_the_ID(), 'custom_sponsors_27', true);
					$url_27 = get_post_custom_values('custom_sponsors_url_27');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_27) . '">';
					echo '<img src="' . $img_27['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 28:
				$trigger_28 = get_post_custom_values('custom_sponsors_trigger_28');
				if ( end($trigger_28) == 'on' ) {
					$img_28 = get_post_meta(get_the_ID(), 'custom_sponsors_28', true);
					$url_28 = get_post_custom_values('custom_sponsors_url_28');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_28) . '">';
					echo '<img src="' . $img_28['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 29:
				$trigger_29 = get_post_custom_values('custom_sponsors_trigger_29');
				if ( end($trigger_29) == 'on' ) {
					$img_29 = get_post_meta(get_the_ID(), 'custom_sponsors_29', true);
					$url_29 = get_post_custom_values('custom_sponsors_url_29');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_29) . '">';
					echo '<img src="' . $img_29['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 30:
				$trigger_30 = get_post_custom_values('custom_sponsors_trigger_30');
				if ( end($trigger_30) == 'on' ) {
					$img_30 = get_post_meta(get_the_ID(), 'custom_sponsors_30', true);
					$url_30 = get_post_custom_values('custom_sponsors_url_30');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_30) . '">';
					echo '<img src="' . $img_30['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}																																																																				


				// SPONSOR 31:
				$trigger_31 = get_post_custom_values('custom_sponsors_trigger_31');
				if ( end($trigger_31) == 'on' ) {
					$img_31 = get_post_meta(get_the_ID(), 'custom_sponsors_31', true);
					$url_31 = get_post_custom_values('custom_sponsors_url_31');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_31) . '">';
					echo '<img src="' . $img_31['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 32:
				$trigger_32 = get_post_custom_values('custom_sponsors_trigger_32');
				if ( end($trigger_32) == 'on' ) {
					$img_32 = get_post_meta(get_the_ID(), 'custom_sponsors_32', true);
					$url_32 = get_post_custom_values('custom_sponsors_url_32');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_32) . '">';
					echo '<img src="' . $img_32['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 33:
				$trigger_33 = get_post_custom_values('custom_sponsors_trigger_33');
				if ( end($trigger_33) == 'on' ) {
					$img_33 = get_post_meta(get_the_ID(), 'custom_sponsors_33', true);
					$url_33 = get_post_custom_values('custom_sponsors_url_33');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_33) . '">';
					echo '<img src="' . $img_33['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 34:
				$trigger_34 = get_post_custom_values('custom_sponsors_trigger_34');
				if ( end($trigger_34) == 'on' ) {
					$img_34 = get_post_meta(get_the_ID(), 'custom_sponsors_34', true);
					$url_34 = get_post_custom_values('custom_sponsors_url_34');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_34) . '">';
					echo '<img src="' . $img_34['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 35:
				$trigger_35 = get_post_custom_values('custom_sponsors_trigger_35');
				if ( end($trigger_35) == 'on' ) {
					$img_35 = get_post_meta(get_the_ID(), 'custom_sponsors_35', true);
					$url_35 = get_post_custom_values('custom_sponsors_url_35');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_35) . '">';
					echo '<img src="' . $img_35['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 36:
				$trigger_36 = get_post_custom_values('custom_sponsors_trigger_36');
				if ( end($trigger_36) == 'on' ) {
					$img_36 = get_post_meta(get_the_ID(), 'custom_sponsors_36', true);
					$url_36 = get_post_custom_values('custom_sponsors_url_36');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_36) . '">';
					echo '<img src="' . $img_36['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 37:
				$trigger_37 = get_post_custom_values('custom_sponsors_trigger_37');
				if ( end($trigger_37) == 'on' ) {
					$img_37 = get_post_meta(get_the_ID(), 'custom_sponsors_37', true);
					$url_37 = get_post_custom_values('custom_sponsors_url_37');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_37) . '">';
					echo '<img src="' . $img_37['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 38:
				$trigger_38 = get_post_custom_values('custom_sponsors_trigger_38');
				if ( end($trigger_38) == 'on' ) {
					$img_38 = get_post_meta(get_the_ID(), 'custom_sponsors_38', true);
					$url_38 = get_post_custom_values('custom_sponsors_url_38');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_38) . '">';
					echo '<img src="' . $img_38['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 39:
				$trigger_39 = get_post_custom_values('custom_sponsors_trigger_39');
				if ( end($trigger_39) == 'on' ) {
					$img_39 = get_post_meta(get_the_ID(), 'custom_sponsors_39', true);
					$url_39 = get_post_custom_values('custom_sponsors_url_39');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_39) . '">';
					echo '<img src="' . $img_39['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 40:
				$trigger_40 = get_post_custom_values('custom_sponsors_trigger_40');
				if ( end($trigger_40) == 'on' ) {
					$img_40 = get_post_meta(get_the_ID(), 'custom_sponsors_40', true);
					$url_40 = get_post_custom_values('custom_sponsors_url_40');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_40) . '">';
					echo '<img src="' . $img_40['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}


				// SPONSOR 41:
				$trigger_41 = get_post_custom_values('custom_sponsors_trigger_41');
				if ( end($trigger_41) == 'on' ) {
					$img_41 = get_post_meta(get_the_ID(), 'custom_sponsors_41', true);
					$url_41 = get_post_custom_values('custom_sponsors_url_41');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_41) . '">';
					echo '<img src="' . $img_41['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 42:
				$trigger_42 = get_post_custom_values('custom_sponsors_trigger_42');
				if ( end($trigger_42) == 'on' ) {
					$img_42 = get_post_meta(get_the_ID(), 'custom_sponsors_42', true);
					$url_42 = get_post_custom_values('custom_sponsors_url_42');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_42) . '">';
					echo '<img src="' . $img_42['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 43:
				$trigger_43 = get_post_custom_values('custom_sponsors_trigger_43');
				if ( end($trigger_43) == 'on' ) {
					$img_43 = get_post_meta(get_the_ID(), 'custom_sponsors_43', true);
					$url_43 = get_post_custom_values('custom_sponsors_url_43');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_43) . '">';
					echo '<img src="' . $img_43['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 44:
				$trigger_44 = get_post_custom_values('custom_sponsors_trigger_44');
				if ( end($trigger_44) == 'on' ) {
					$img_44 = get_post_meta(get_the_ID(), 'custom_sponsors_44', true);
					$url_44 = get_post_custom_values('custom_sponsors_url_44');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_44) . '">';
					echo '<img src="' . $img_44['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 45:
				$trigger_45 = get_post_custom_values('custom_sponsors_trigger_45');
				if ( end($trigger_45) == 'on' ) {
					$img_45 = get_post_meta(get_the_ID(), 'custom_sponsors_45', true);
					$url_45 = get_post_custom_values('custom_sponsors_url_45');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_45) . '">';
					echo '<img src="' . $img_45['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 46:
				$trigger_46 = get_post_custom_values('custom_sponsors_trigger_46');
				if ( end($trigger_46) == 'on' ) {
					$img_46 = get_post_meta(get_the_ID(), 'custom_sponsors_46', true);
					$url_46 = get_post_custom_values('custom_sponsors_url_46');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_46) . '">';
					echo '<img src="' . $img_46['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 47:
				$trigger_47 = get_post_custom_values('custom_sponsors_trigger_47');
				if ( end($trigger_47) == 'on' ) {
					$img_47 = get_post_meta(get_the_ID(), 'custom_sponsors_47', true);
					$url_47 = get_post_custom_values('custom_sponsors_url_47');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_47) . '">';
					echo '<img src="' . $img_47['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}
			
				// SPONSOR 48:
				$trigger_48 = get_post_custom_values('custom_sponsors_trigger_48');
				if ( end($trigger_48) == 'on' ) {
					$img_48 = get_post_meta(get_the_ID(), 'custom_sponsors_48', true);
					$url_48 = get_post_custom_values('custom_sponsors_url_48');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_48) . '">';
					echo '<img src="' . $img_48['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 49:
				$trigger_49 = get_post_custom_values('custom_sponsors_trigger_49');
				if ( end($trigger_49) == 'on' ) {
					$img_49 = get_post_meta(get_the_ID(), 'custom_sponsors_49', true);
					$url_49 = get_post_custom_values('custom_sponsors_url_49');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_49) . '">';
					echo '<img src="' . $img_49['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}

				// SPONSOR 50:
				$trigger_50 = get_post_custom_values('custom_sponsors_trigger_50');
				if ( end($trigger_50) == 'on' ) {
					$img_50 = get_post_meta(get_the_ID(), 'custom_sponsors_50', true);
					$url_50 = get_post_custom_values('custom_sponsors_url_50');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_50) . '">';
					echo '<img src="' . $img_50['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 51:
				$trigger_51 = get_post_custom_values('custom_sponsors_trigger_51');
				if ( end($trigger_51) == 'on' ) {
					$img_51 = get_post_meta(get_the_ID(), 'custom_sponsors_51', true);
					$url_51 = get_post_custom_values('custom_sponsors_url_51');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_51) . '">';
					echo '<img src="' . $img_51['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 52:
				$trigger_52 = get_post_custom_values('custom_sponsors_trigger_52');
				if ( end($trigger_52) == 'on' ) {
					$img_52 = get_post_meta(get_the_ID(), 'custom_sponsors_52', true);
					$url_52 = get_post_custom_values('custom_sponsors_url_52');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_52) . '">';
					echo '<img src="' . $img_52['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 53:
				$trigger_53 = get_post_custom_values('custom_sponsors_trigger_53');
				if ( end($trigger_53) == 'on' ) {
					$img_53 = get_post_meta(get_the_ID(), 'custom_sponsors_53', true);
					$url_53 = get_post_custom_values('custom_sponsors_url_53');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_53) . '">';
					echo '<img src="' . $img_53['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 54:
				$trigger_54 = get_post_custom_values('custom_sponsors_trigger_54');
				if ( end($trigger_4) == 'on' ) {
					$img_54 = get_post_meta(get_the_ID(), 'custom_sponsors_54', true);
					$url_54 = get_post_custom_values('custom_sponsors_url_54');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_54) . '">';
					echo '<img src="' . $img_54['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 55:
				$trigger_55 = get_post_custom_values('custom_sponsors_trigger_55');
				if ( end($trigger_55) == 'on' ) {
					$img_55 = get_post_meta(get_the_ID(), 'custom_sponsors_55', true);
					$url_55 = get_post_custom_values('custom_sponsors_url_55');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_55) . '">';
					echo '<img src="' . $img_55['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 56:
				$trigger_56 = get_post_custom_values('custom_sponsors_trigger_56');
				if ( end($trigger_56) == 'on' ) {
					$img_56 = get_post_meta(get_the_ID(), 'custom_sponsors_56', true);
					$url_56 = get_post_custom_values('custom_sponsors_url_56');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_56) . '">';
					echo '<img src="' . $img_56['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 57:
				$trigger_57 = get_post_custom_values('custom_sponsors_trigger_57');
				if ( end($trigger_57) == 'on' ) {
					$img_57 = get_post_meta(get_the_ID(), 'custom_sponsors_57', true);
					$url_57 = get_post_custom_values('custom_sponsors_url_57');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_57) . '">';
					echo '<img src="' . $img_57['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 58:
				$trigger_58 = get_post_custom_values('custom_sponsors_trigger_58');
				if ( end($trigger_58) == 'on' ) {
					$img_58 = get_post_meta(get_the_ID(), 'custom_sponsors_58', true);
					$url_58 = get_post_custom_values('custom_sponsors_url_58');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_58) . '">';
					echo '<img src="' . $img_58['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 59:
				$trigger_59 = get_post_custom_values('custom_sponsors_trigger_59');
				if ( end($trigger_59) == 'on' ) {
					$img_59 = get_post_meta(get_the_ID(), 'custom_sponsors_59', true);
					$url_59 = get_post_custom_values('custom_sponsors_url_59');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_59) . '">';
					echo '<img src="' . $img_59['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}	

				// SPONSOR 60:
				$trigger_60 = get_post_custom_values('custom_sponsors_trigger_60');
				if ( end($trigger_60) == 'on' ) {
					$img_60 = get_post_meta(get_the_ID(), 'custom_sponsors_60', true);
					$url_60 = get_post_custom_values('custom_sponsors_url_60');
					echo '<div class="sponsors_cell">';
					echo '<a href="' . end($url_60) . '">';
					echo '<img src="' . $img_60['url'] . '" />';
					echo '</a>';
					echo '</div><!-- end Cell -->';					
				}																																																																				


			}

			else { 
				?>
				 			
		        <?php $loop_sponsors = new WP_Query(array('post_type' => 'sponsors', 'posts_per_page' => 99)); ?>
		        <?php while ( $loop_sponsors->have_posts() ) : $loop_sponsors->the_post(); ?>
		        	<!-- Cell -->
		    		<div class="sponsors_cell">
						<a href="
								<?php
								$url_overide = get_post_custom_values('url_overide2');
								if ( is_array($url_overide) && end($url_overide) != '' ) { 
									echo end($url_overide);
								}
								else {
									the_permalink();
								}
								?>
								"><?php the_post_thumbnail('medium'); ?>
		                </a>    			 
		    		</div><!-- end Cell -->
			    <?php endwhile; ?>

			<?php 
			
			} // end else.. 

			// END SPONSER LOGIC..
		?>
				

	</div><!-- end Sponsors -->
