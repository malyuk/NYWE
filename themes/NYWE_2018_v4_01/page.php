<?php get_header();

if ( has_post_thumbnail( get_the_ID() ) ) {
	printf( '<div class="page_banner">%s</div>',
		get_the_post_thumbnail( get_the_ID(), 'large', ['class' => 'page_banner_img'] )
	);
} ?>


	<!-- ADVERT 1 -->
<?php
$options  = get_option( 'theme_settings' );
$override = get_post_custom_values( 'advert' );
if ( is_array( $override ) && end( $override ) != '' ) {
	echo '<div class="advert">' . end( $override ) . '</div>';
} else {
	if ( $options['global_advert_1'] ) {
		echo '<div class="advert">' . $options['global_advert_1'] . '</div>';
	}
}
?>


	<!-- CONTAINER -->
	<div class="center">

		<!-- CONTENT -->
		<div class="content">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1 class="heading"><?php the_title(); ?></h1>

				<?php the_content(); ?>

			<?php endwhile; endif; ?>

		</div><!-- ..content -->

		<!-- SIDEBAR ACTION -->
		<?php include( TEMPLATEPATH . '/sidebar.php' ); ?>


	</div><!-- ..container -->

	<!-- FOOTER -->
<?php get_footer(); ?>