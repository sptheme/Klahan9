<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php
	$team_position = esc_html( get_post_meta( $post->ID, 'sp_team_position', true ) );
	$team_facebook = esc_url( get_post_meta( $post->ID, 'sp_team_facebook', true ) );
	$team_twitter = esc_url( get_post_meta( $post->ID, 'sp_team_twitter', true ) );
	$team_linkedin = esc_url( get_post_meta( $post->ID, 'sp_team_linkedin', true ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if (has_post_thumbnail()) {
		    printf( '<div class="single-post-thumbnail"><div class="image-shifter">%s</div></div>', get_the_post_thumbnail() );
		}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>
		<div class="team-meta">
			<?php echo $team_position; ?>
		</div><!-- .entry-meta -->
		<div class="team-social">
			<?php if ( ! empty( $team_facebook ) ) : ?>
				<a href="<?php echo $team_facebook; ?>"><i class="fa fa-facebook"></i></a>
			<?php endif; ?>	
			<?php if ( ! empty( $team_twitter ) ) : ?>
				<a href="<?php echo $team_twitter; ?>"><i class="fa fa-twitter"></i></a>
			<?php endif; ?>	
			<?php if ( ! empty( $team_linkedin ) ) : ?>
				<a href="<?php echo $team_linkedin; ?>"><i class="fa fa-linkedin"></i></a>
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->