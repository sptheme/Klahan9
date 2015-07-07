<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $photos = explode( ',', get_post_meta( $post->ID, 'sp_gallery', true ) );
	if ( $photos[0] != '' ) : 
		foreach ( $photos as $photo ) { 
			$imageid = wp_get_attachment_image_src( $photo, 'small-thumb' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
				<div class="thumb-effect">
					<img src="<?php echo $imageid[0]; ?>">
					<div class="thumb-caption">
						<div class="inner-thumb">
							<a href="<?php echo wp_get_attachment_url( $photo ); ?>"><?php echo esc_html__('View photo', WPSP_TEXT_DOMAIN ); ?></a>
						</div> <!-- .inner-thumb -->
					</div> <!-- .thumb-caption -->	
				</div><!-- .thumb-effect -->
			</article><!-- #post-## -->

	<?php } // end foreach ?>
<?php else: ?>
	<h4><?php echo esc_html__( 'Sorry, there is no photo for this album.', WPSP_TEXT_DOMAIN ); ?></h4>
<?php endif; ?>