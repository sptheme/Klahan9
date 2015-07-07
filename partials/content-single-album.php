<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $album_location = get_post_meta( $post->ID, 'sp_album_location', true ); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' ); ?>
		<div class="album-meta">
			<?php esc_html_e( 'at ', WPSP_TEXT_DOMAIN ); ?>
			<strong><?php echo esc_html__( $album_location ); ?></strong>
			<?php esc_html_e( ', on ', WPSP_TEXT_DOMAIN ); ?> 
			<?php echo esc_html( get_the_date() ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php wpsp_single_photo_album( 3 ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
