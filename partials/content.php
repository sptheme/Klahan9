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
		    	echo '<div class="small-index-thumbnail">';
			    echo '<a href="' . get_permalink() . '" title="' . __('Read ', WPSP_TEXT_DOMAIN) . get_the_title() . '" rel="bookmark">';
			    echo the_post_thumbnail('index-thumb');
			    echo '</a>';
			    echo '</div>';
			}
		?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h1 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

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
		    <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', WPSP_TEXT_DOMAIN) . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
		</footer><!-- .entry-footer -->
	</div> <!-- .index-box -->
</article><!-- #post-## -->
