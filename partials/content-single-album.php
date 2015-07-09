<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $album_location = get_post_meta( $post->ID, 'sp_album_location', true ); 
	$photo_cols = get_post_meta( $post->ID, 'sp_gallery_cols', true ); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>
		<div class="album-meta">
			<?php echo esc_html__( 'at ', WPSP_TEXT_DOMAIN ); ?>
			<strong><?php echo esc_html__( $album_location ); ?></strong>
			<?php echo esc_html__( ', on ', WPSP_TEXT_DOMAIN ); ?> 
			<?php echo esc_html( get_the_date() ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php wpsp_single_photo_album( $post->ID, 99, $photo_cols ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
