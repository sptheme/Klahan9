<?php
/**
 * Template Name: Monthly topic
 *
 * This is the template that displays post audio-fomart by category.
 *
 * @package Klahan9
 */

get_header(); ?>

	<?php 
		$cateogry_id = esc_html( get_post_meta( $post->ID, 'sp_post_by_cat', true ) ); 
		$yearly_topic = esc_html( get_post_meta( $post->ID, 'sp_yearly_topic', true ) );
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article>
			
			<div class="monthly-topics">	
			<?php if ( $yearly_topic == '2015' ) :
						$now = date('n', strtotime('2015-12-30')) - 7;
						$current_month = strtotime(date("Y-m-d"));
					else :
						$now = date('n', strtotime(date("Y-m-d")));
						$current_month = strtotime(date("Y-m-d"));
					endif; ?>

			<?php $i = 1; 
				while($i <= $now) :
					$month_name = date('F', $current_month); ?>

					<ul class="topic-head">
						<li>
						<div class="two-third">
						<?php wpsp_month_string_translate( $month_name ); ?>
						</div>
						<div class="one-fourth last"><?php echo  __('Guest Speaker', 'klahan9'); ?></div>
						</li>
					</ul>

				<?php wpsp_monthly_topic( $cateogry_id, 5, $yearly_topic, date('m', $current_month) ); ?>

			<?php	$current_month = strtotime('-1 month', $current_month);
					$i++;
				endwhile; //end monthly loop ?>	
			</div> <!-- .monthly-topics -->		

			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
