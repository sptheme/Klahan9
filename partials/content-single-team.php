<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

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