<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php
	$team_position = get_post_meta( $post->ID, 'sp_team_position', true );
	$team_facebook = get_post_meta( $post->ID, 'sp_team_facebook', true );
	$team_twitter = get_post_meta( $post->ID, 'sp_team_twitter', true );
	$team_linkedin = get_post_meta( $post->ID, 'sp_team_linkedin', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<?php
		if (has_post_thumbnail()) {
		    echo '<a href="' . get_permalink() . '" title="' . esc_html__('View profile ', WPSP_TEXT_DOMAIN) . esc_html( get_the_title() ) . '" rel="bookmark">';
		    echo the_post_thumbnail('team-thumb');
		    echo '</a>';
		}
	?>

	
		<?php the_title( sprintf( '<h1 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<div class="team-meta">
			<?php echo $team_position; ?>
		</div><!-- .entry-meta -->
		<div class="social-profile-team">
		<?php if ( ! empty( $team_facebook ) ) : ?>
			<a href="<?php echo $team_facebook; ?>"><i class="fa fa-facebook"></i></a>
		<?php endif; ?>	
		<?php if ( ! empty( $team_twitter ) ) : ?>
			<a href="<?php echo $team_twitter; ?>"><i class="fa fa-twitter"></i></a>
		<?php endif; ?>	
		<?php if ( ! empty( $team_linkedin ) ) : ?>
			<a href="<?php echo $team_linkedin; ?>"><i class="fa fa-linkedin"></i></a>
		<?php endif; ?>	
			
			
		</div><!-- .entry-meta -->
</article><!-- #post-## -->
