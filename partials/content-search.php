<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Klahan9
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h1>' ); ?>

			
			<div class="entry-meta">
				<?php wpsp_posted_on(); ?>
			</div><!-- .entry-meta -->
			
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
		
</article><!-- #post-## -->

