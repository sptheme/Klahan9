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
		$tv_team_title = esc_html( get_post_meta( $post->ID, 'sp_tv_team_title', true ) );
		$tv_team_num = esc_html( get_post_meta( $post->ID, 'sp_tv_team_num', true ) );
		$tv_team_text_link = esc_html( get_post_meta( $post->ID, 'sp_tv_team_text_link', true ) );
		$tv_team_page_link = get_post_meta( $post->ID, 'sp_tv_team_page_link', true );
		$tv_photo_page_link = get_post_meta( $post->ID, 'sp_tv_photo_page_link', true );
		$callout_link = get_post_meta( $post->ID, 'sp_callout_link', true ) ;
		$team_taxonomy_id = get_post_meta( $post->ID, 'sp_team_tax', true );
		$tv_photo_title = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_title', true ) );
		$tv_photo_num = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_num', true ) );
		$tv_photo_text_link = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_text_link', true ) );
		$album_term_id = get_post_meta( $post->ID, 'sp_album_term', true ); 
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
	                    <a itemprop="url" class="watche-it" href="<?php echo esc_url( get_post_meta( $post->ID, 'sp_video_url', true ) ); ?>" title="<?php echo esc_attr( the_title() ); ?>" rel="bookmark">
		                    <div class="tv-post-info">
		                    	<h3 itemprop="name" class="entry-title"><?php echo esc_html( get_the_title() ); ?></h3>
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
		                    get_template_part( 'partials/content', 'tv' );
		                endwhile; wp_reset_postdata();
		            } ?>
				</div> <!-- .tv-post-lists -->
			</div> <!-- #tv-header -->

			<div id="meet-tv-star" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-star"></i> <?php echo $tv_team_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $tv_team_page_link ) ); ?>" class="more"><?php echo $tv_team_text_link; ?></a>
					
				</div>
				<?php $args = array(
	                'post_type' => 'cp_team',
	                'posts_per_page' => $tv_team_num,
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

				wpsp_get_posts_type ( 'cp_team', $args, $tv_team_num ); ?>

			</div> <!-- #meet-tv-star -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-film"></i> <?php echo $tv_photo_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $tv_photo_page_link ) ); ?>" class="more"><?php echo $tv_photo_text_link; ?></a>
				</div>
				<div class="filmstrip">
					<div class="strip-top"></div>
					<?php wpsp_get_albums_by_term( $album_term_id, $tv_photo_num, $tv_photo_num ); ?>
					<div class="strip-bottom"></div>
				</div> <!-- .filmstrip -->
			</div> <!-- .lastest-gallery -->

			<div class="callout clearfix">
				<div class="two-third">
					<h2><?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_title', true ) ); ?></h2>
					<p><?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_desc', true ) ); ?></p>
				</div>
				<div class="one-third last">
					<a class="button" href="<?php echo esc_url( get_permalink( $callout_link ) );?>">
					<?php echo esc_html( get_post_meta( $post->ID, 'sp_callout_button', true ) ); ?>
					</a>
				</div>
			</div> <!-- .callout -->
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
