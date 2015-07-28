<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
<?php $post_format = get_post_format();

	if ( $post_format == 'video' ) : 
		$video_url = get_post_meta( $post->ID, 'sp_video_url', true ); 
		if (has_post_thumbnail()) {
		    printf( '<a class="watch-now" itemprop="url" href="%1$s" rel="bookmark" title="%2$s"><div class="post-thumbnail">%3$s</div></a>', 
					esc_url( $video_url ), 
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'small-thumb' )  
				);
		} else { 
			printf( '<a class="watch-now" itemprop="url" href="%1$s" rel="bookmark" title="%2$s"><div class="post-thumbnail">%3$s</div></a>', 
					esc_url( $video_url ), 
					esc_attr( get_the_title() ), 
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
		}
	else :
		$sound_url = get_post_meta( $post->ID, 'sp_sound_url', true );  
		if (has_post_thumbnail()) {
		    printf( '<a class="listen-now" itemprop="url" href="https://w.soundcloud.com/player/?visual=true&amp;url=%1$s&amp;show_artwork=true&amp;maxwidth=1020&amp;maxheight=1000&amp;auto_play=1" rel="bookmark" title="%2$s"><div class="post-thumbnail">%3$s</div></a>', 
					esc_url( $sound_url ), 
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'small-thumb' )  
				);
		} else { 
			printf( '<a class="listen-now" itemprop="url" href="https://w.soundcloud.com/player/?visual=true&amp;url=%1$s&amp;show_artwork=true&amp;maxwidth=1020&amp;maxheight=1000&amp;auto_play=1" rel="bookmark" title="%2$s"><div class="post-thumbnail">%3$s</div></a>', 
					esc_url( $sound_url ), 
					esc_attr( get_the_title() ), 
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
		}
	endif; ?>

	<?php the_title( sprintf( '<h3 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' ); ?>
	<div class="entry-meta">
		<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
		<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
	
</article><!-- #post-## -->
