<?php
/**
 * The template used for displaying content format (standard, video, audio)
 *
 * Option: diplay as thumbnail or icon post
 * 
 * @package Klahan9
 */

?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'tv-featured-widget' ) ); ?> itemscope itemtype="http://schema.org/Article">
	<?php if (has_post_thumbnail()) { ?>
	<a class="watche-it" href="<?php echo esc_url( get_post_meta( $post->ID, 'sp_video_url', true ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>">
		<div class="tv-featured-thumb">
		<?php echo the_post_thumbnail('small-thumb'); ?>
		</div>
	</a>
	<?php } ?>
	<div class="entry-tv-featured">
		<?php the_title( sprintf( '<h3 itemprop="name" class="entry-title"><a class="watche-it" itemprop="url" href="%s" rel="bookmark">', esc_url( get_post_meta( $post->ID, 'sp_video_url', true ) ) ), '</a></h3>' ); ?>
		<div class="entry-meta">
			<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
			<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
		</div>
	</div> <!-- .tv-featured-title -->
</article><!-- #post-## -->