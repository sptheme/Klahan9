<?php
/**
 * Template Name: Blog
 *
 * This is the template that displays multi post fomart by category.
 *
 * @package Klahan9
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
				
				$cateogry_id = get_post_meta( $post->ID, 'sp_post_by_cat', true );
				$args = array(
						'post_type' 	=> 	'post',
						'category__in'  => array( $cateogry_id ),
						'paged' 		=> $paged
					);
				
				$wp_query = new WP_Query( $args ); ?>

			<?php if ( $wp_query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'partials/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php wpsp_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'partials/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
