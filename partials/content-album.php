<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $album_location = get_post_meta( $post->ID, 'sp_album_location', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('format-gallery') ); ?> itemscope itemtype="http://schema.org/Article">
<?php if ( is_page_template( 'page-templates/page-tv.php' ) || is_page_template( 'page-templates/page-radio.php' ) ) :?>
	<div class="thumb-effect">
		<?php if (has_post_thumbnail()) {
			    echo get_the_post_thumbnail( $post->ID, 'small-thumb' );
			} else { 
				echo '<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">';
			} ?>
		<div class="thumb-caption">
			<div class="inner-thumb">
				<!-- <a itemprop="url" href="#"><?php echo esc_html__('View photo', WPSP_TEXT_DOMAIN ); ?></a> -->
				<?php printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%2$s</a><span>%3$s</span>', 
					esc_url( get_permalink() ), 
					esc_attr( get_the_title() ),
					esc_html( get_the_date() )
				); ?>
			</div> <!-- .inner-thumb -->
		</div> <!-- .thumb-caption -->
	</div><!-- .thumb-effect -->
<?php else: ?>
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
	</div> <!-- .post-thumbnail -->
	
	<?php the_title( sprintf( '<h3 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' ); ?>
		
	<div class="album-meta">
		<?php echo esc_html__( 'at ', WPSP_TEXT_DOMAIN ); ?>
		<strong><?php echo esc_html__( $album_location ); ?></strong>
		<?php echo esc_html__( ', on ', WPSP_TEXT_DOMAIN ); ?> 
		<?php echo esc_html( get_the_date() ); ?>
	</div><!-- .entry-meta -->
<?php endif; ?>
</article><!-- #post-## -->
