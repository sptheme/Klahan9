<?php
/**
 * The template for displaying all single posts team.
 *
 * @package Klahan9
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content-single', 'team' ); ?>

			<?php if ( ot_get_option( 'related-posts' ) != '1' ) { 
				wpsp_get_related_posts( $post->ID, array('posts_per_page' => 3) ); 
				} ?>

		<?php endwhile; // End of the loop. ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
