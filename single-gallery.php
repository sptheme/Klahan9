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

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>
					<div class="album-meta">
						<strong><?php echo get_post_meta($post->ID, 'sp_album_location', true); ?></strong>
						<?php echo get_the_date(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php echo wpsp_get_album_gallery( $post->ID, '', 'small-thumb', 'one-fourth' ); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
