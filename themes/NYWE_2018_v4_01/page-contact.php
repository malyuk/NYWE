<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php // SETUP FOR CUSTOM PAGE TEMPLATES:
$meta = get_post_meta( $post->ID );
?>

	<!-- BANNER IMAGE -->
	<div id="about_banner_image" class="page_banner">
		<h1 class="page_banner_title"><?php the_title(); ?></h1>
		<?php
		if ( has_post_thumbnail( get_the_ID() ) ) {
			the_post_thumbnail( 'large' );
		} else {
			printf( '<img src="%s/images/banner_contact.jpg" />',
				get_stylesheet_directory_uri()
			);
		} ?>
	</div><!-- banner -->


	<!-- CONTAINER -->
	<div id="about">

		<!-- INTRO TEXT -->
		<div id="about_cms_intro">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();

				$children = get_children( [
					'post_type'   => 'page',
					'post_status' => 'publish',
					'post_parent' => get_the_ID()
				] );

				if ( ! empty( $children ) ) {
					echo '<div class="card-wrap">';

					foreach ( $children as $page ) {
						printf( '<a class="card-link" href="%s" aria-label="%s" rel="bookmark"><h3 class="card-link__title">%s</h3></a>',
							esc_url( get_the_permalink( $page->ID ) ),
							esc_attr( $page->post_title ),
							esc_html( $page->post_title )
						);
	                }

					echo '</div>';
				}
			endwhile; endif; ?>
		</div><!-- cms intro -->

		<?php echo get_signup_form(); ?>

	</div><!-- about -->


	<!-- FOOTER -->
<?php get_footer(); ?>