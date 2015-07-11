<?php
/**
 * The template used for displaying related post content
 *
 * Option: diplay as thumbnail or icon post
 * 
 * @package Klahan9
 */

?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<div class="post-thumbnail">
	<?php	
		if (has_post_thumbnail()) {
		    printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'small-thumb' )  
				);
		} else { 
			printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
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