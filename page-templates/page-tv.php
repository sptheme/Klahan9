<?php
/**
 * Template Name: TV
 *
 * This is the template that displays post video-fomart by category.
 *
 * @package Klahan9
 */

get_header(); ?>

	<?php 
		$cateogry_id = get_post_meta( $post->ID, 'sp_post_by_cat', true ); 
		$team_taxonomy_id = get_post_meta( $post->ID, 'sp_team_tax', true );
		$album_taxonomy_id = get_post_meta( $post->ID, 'sp_album_tax', true ); 
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="tv-header" class="clearfix">
				<div class="tv-featured">
					<?php $args = array(
		                'post_type' => 'post',
		                'posts_per_page' => 1,   
		                'tax_query' => array(
                        	'relation' => 'AND',
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
	                            'terms'    => array( 'post-format-video' ),
	                        ),
	                        array(
	                                'taxonomy' => 'category',
	                                'field'    => 'term_id',
	                                'terms'    => array( $cateogry_id ),
	                        )
	                    )
	            	); 

					$custom_query = new WP_Query( $args );

	                while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
	                	<?php if (has_post_thumbnail()) { ?>
							<div class="tv-post-featured">
								<?php echo the_post_thumbnail('index-thumb'); ?>
							</div>
						<?php } ?>
	                    <a itemprop="url" class="watche-it" href="<?php echo esc_url( get_post_meta( $post->ID, 'sp_video_url', true ) ); ?>" rel="bookmark">
		                    <div class="tv-post-info">
		                    	<h3 itemprop="name" class="entry-title"><?php the_title(); ?></h3>
		                    	<div class="entry-meta">
									<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
									<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
								</div>
		                    </div> <!-- .tv-post-info -->
	                    </a>

	                <?php endwhile; wp_reset_postdata(); ?>
				</div> <!-- .tv-post-featured -->
				<div class="widget-post-category tv-post-lists">
				<?php $args = array(
		                'post_type' => 'post',
		                'posts_per_page' => 6,
		                'offset' => 1,
		                'tax_query' => array(
                        	'relation' => 'AND',
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
	                            'terms'    => array( 'post-format-video' ),
	                        ),
	                        array(
	                                'taxonomy' => 'category',
	                                'field'    => 'term_id',
	                                'terms'    => array( $cateogry_id ),
	                        )
	                    )   
	            	); 

					$custom_query = new WP_Query( $args );
	            
		            if( $custom_query->have_posts() ) {
		                while ( $custom_query->have_posts() ) : $custom_query->the_post();
		                    get_template_part( 'partials/post-thumb-tv' );
		                endwhile; wp_reset_postdata();
		            } ?>
				</div> <!-- .tv-post-lists -->
			</div> <!-- #tv-header -->

			<div id="meet-tv-star" class="team clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-star"></i> Meet the Star</h3>
					<a href="#" class="more">More people</a>
				</div>
				<?php $args = array(
	                'post_type' => 'team',
	                'posts_per_page' => 5,
	                'meta_query' => array(
						array(
							'key'     => 'sp_team_featured',
							'value'   => 'on',
							'compare' => '==',
						),
					),
	                'tax_query' => array(
						array(
							'taxonomy' => 'team_category',
							'field'    => 'term_id',
							'terms'    => array( $team_taxonomy_id ),
						),
					), 
					//'orderby' => 'rand',  
            	); 

				$custom_query = new WP_Query( $args );
            
	            if( $custom_query->have_posts() ) {
	                while ( $custom_query->have_posts() ) : $custom_query->the_post();
	                    get_template_part( 'partials/content-team' );
	                endwhile; wp_reset_postdata();
	            } ?>
			</div> <!-- .meet-tv-star -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-film"></i> Behind the scenes</h3>
					<a href="<?php echo esc_url( get_permalink( $album_taxonomy_id ) ); ?>" class="more">More photos</a>
				</div>
				<div class="filmstrip">
					<div class="strip-top"></div>
					<?php wpsp_single_photo_album( $album_taxonomy_id, 4, 4 ); ?>
					<div class="strip-bottom"></div>
				</div> <!-- .filmstrip -->
			</div> <!-- .lastest-gallery -->
			<div class="callout clearfix">
				<div class="two-third">
					<h2><?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_title', true ) ); ?></h2>
					<p><?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_desc', true ) ); ?></p>
				</div>
				<div class="one-third last">
					<a class="button" href="<?php echo esc_url( get_post_meta( $post->ID, 'sp_callout_link', true ) );?>">
					<?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_button', true ) ); ?>
					</a>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
