<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<?php if( $wp_query->current_post == 0 && !is_paged() ) { ?>
	<div class="index-box post-highlight clearfix">
	<?php } else { ?> 
	<div class="index-box clearfix">
	<?php } ?>
		
		<?php
			if (has_post_thumbnail()) {
			    printf( '<div class="small-index-thumbnail"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a></div>', 
					esc_url( get_permalink() ), 
					__('Read ', 'klahan9') . esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'index-thumb' )  
				);
			} else {
				printf( '<div class="small-index-thumbnail"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a></div>', 
					esc_url( get_permalink() ), 
					__('Read ', 'klahan9') . esc_attr( get_the_title() ), 
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
			}
		?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wpsp_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer continue-reading">
		    <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'klahan9') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
		</footer><!-- .entry-footer -->
	</div> <!-- .index-box -->
</article><!-- #post-## -->
