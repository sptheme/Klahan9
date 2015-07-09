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
				<?php 
					if (has_post_thumbnail()) {
					    echo '<div class="single-post-thumbnail">';
					    echo '<div class="image-shifter">';
					    echo the_post_thumbnail();
					    echo '</div>';
					    echo '</div>';
					}
				?>
				<header class="entry-header">
					<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>
					<div class="team-meta">
						<?php echo get_post_meta( $post->ID, 'sp_team_position', true ); ?>
					</div><!-- .entry-meta -->
					<div class="social-profile-team">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			<?php wpsp_get_related_posts( $post->ID, array('posts_per_page' => 3) ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
