<?php
/**
 * The template for displaying all single posts.
 *
 * @package Klahan9
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content-single', get_post_format() ); ?>

			<?php wpsp_the_post_navigation(); ?> 
			
			<?php if ( ot_get_option( 'related-posts' ) != '1' ) { 
				wpsp_get_related_posts( $post->ID, array('posts_per_page' => 3) ); 
				} ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
