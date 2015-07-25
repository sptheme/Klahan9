<?php
/**
 * Template part for displaying single posts.
 *
 * @package Klahan9
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/VideoObject">
	<?php 
		$video_url = get_post_meta( $post->ID, 'sp_video_url', true ); 
		if ( !empty( $video_url ) ) {
			global $wp_embed;
			$video = $wp_embed->run_shortcode('[embed]' . $video_url . '[/embed]');
			printf( '<div class="single-post-thumbnail"><div class="image-shifter">%s</div></div>', $video );
		}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php wpsp_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', WPSP_TEXT_DOMAIN ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wpsp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

