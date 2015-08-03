<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php
	$team_position = esc_html( get_post_meta( $post->ID, 'sp_team_position', true ) );
	/*$team_facebook = esc_url( get_post_meta( $post->ID, 'sp_team_facebook', true ) );
	$team_twitter = esc_url( get_post_meta( $post->ID, 'sp_team_twitter', true ) );
	$team_linkedin = esc_url( get_post_meta( $post->ID, 'sp_team_linkedin', true ) );*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
<?php if( $post->post_content == "" ) : ?>	
	<div class="post-thumbnail">
	<?php
		if (has_post_thumbnail()) {
		    printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>',
					wp_get_attachment_url( get_post_thumbnail_id() ),
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'team-thumb' )  
				);
		} else { 
			echo '<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">';
		} 
	?>
	</div>
	
		<?php the_title( sprintf( '<h3 class="entry-title" itemprop="name">', esc_attr( get_the_title() ) ), '</h3>' ); ?>

		<div class="team-meta">
			<?php echo $team_position; ?>
		</div><!-- .entry-meta -->	
<?php else: ?>
	<div class="post-thumbnail">
	<?php
		if (has_post_thumbnail()) {
		    printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
					__('View profile ', 'klahan9') . esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'team-thumb' )  
				);
		} else { 
			printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
					__('View profile ', 'klahan9') . esc_attr( get_the_title() ),  
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
		} 
	?>
	</div>
	
	<?php the_title( sprintf( '<h3 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' ); ?>

	<div class="team-meta">
		<?php echo $team_position; ?>
	</div><!-- .entry-meta -->

	<!-- <div class="team-social">
		<?php if ( ! empty( $team_facebook ) ) : ?>
			<a href="<?php echo $team_facebook; ?>"><i class="fa fa-facebook"></i></a>
		<?php endif; ?>	
		<?php if ( ! empty( $team_twitter ) ) : ?>
			<a href="<?php echo $team_twitter; ?>"><i class="fa fa-twitter"></i></a>
		<?php endif; ?>	
		<?php if ( ! empty( $team_linkedin ) ) : ?>
			<a href="<?php echo $team_linkedin; ?>"><i class="fa fa-linkedin"></i></a>
		<?php endif; ?>
	</div> --> <!-- .team-social -->	
<?php endif; ?>		
</article><!-- #post-## -->
