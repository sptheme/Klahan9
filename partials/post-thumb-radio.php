<?php
/**
 * The template used for displaying content format (standard, video, audio)
 *
 * Option: diplay as thumbnail or icon post
 * 
 * @package Klahan9
 */

?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'post-audio-icon' ) ); ?> itemscope itemtype="http://schema.org/Article">
	<?php the_title( sprintf( '<h3 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<div class="entry-meta">
		<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
		<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
</article><!-- #post-## -->