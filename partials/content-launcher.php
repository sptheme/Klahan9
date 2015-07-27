<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $post_format = get_post_format();
	if ( $post_format == 'video' ) : 
		$launcher = get_post_meta( $post->ID, 'sp_video_url', true ); 
		$media_type = 'watch-now';
	else :
		$launcher = get_post_meta( $post->ID, 'sp_sound_url', true );  
		$media_type = 'listen-now';
	endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

	<!-- <div class="thumb-effect">
		<?php if (has_post_thumbnail()) {
			    echo get_the_post_thumbnail( $post->ID, 'small-thumb' );
			} else { 
				echo '<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">';
			} ?>
		<div class="thumb-caption">
			<div class="inner-thumb">
				<?php printf( '<a class="%1$s" itemprop="url" href="%2$s" rel="bookmark" title="%3$s">%3$s</a><span>%4$s</span>', 
					esc_html( $media_type ),
					esc_url( $launcher ), 
					esc_attr( get_the_title() ),
					esc_html( get_the_date() )
				); ?>
			</div>
		</div>
	</div> -->

	<div class="post-thumbnail">
	<?php	
		if (has_post_thumbnail()) {
		    printf( '<a class="%1$s" itemprop="url" href="%2$s" rel="bookmark" title="%3$s">%4$s</a>', 
					esc_html( $media_type ),
					esc_url( $launcher ), 
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'small-thumb' )  
				);
		} else { 
			printf( '<a class="%1$s" itemprop="url" href="%2$s" rel="bookmark" title="%3$s">%4$s</a>', 
					esc_html( $media_type ),
					esc_url( $launcher ), 
					esc_attr( get_the_title() ), 
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
		} 
	?>			
	</div>
	<?php the_title( sprintf( '<h3 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' ); ?>
	<div class="entry-meta">
		<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
		<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
	
</article><!-- #post-## -->
