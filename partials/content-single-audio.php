<?php
/**
 * Template part for displaying single posts.
 *
 * @package Klahan9
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/AudioObject">
	<?php 
		$sound_url = get_post_meta( $post->ID, 'sp_sound_url', true ); 
		if ( !empty( $sound_url ) ) {
			$sound_embed = wpsp_soundcloud($sound_url, true);
		    printf( '<div class="single-post-thumbnail"><div class="image-shifter">%s</div></div>', $sound_embed );
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

