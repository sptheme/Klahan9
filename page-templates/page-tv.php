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
		
		$star_team_title = esc_html( get_post_meta( $post->ID, 'sp_star_team_title', true ) );
		$star_team_num = esc_html( get_post_meta( $post->ID, 'sp_star_team_num', true ) );
		$star_team_text_link = esc_html( get_post_meta( $post->ID, 'sp_star_team_text_link', true ) );
		$star_team_page_link = get_post_meta( $post->ID, 'sp_star_team_page_link', true );
		$star_team_taxonomy_id = get_post_meta( $post->ID, 'sp_star_team_tax', true );

		$tv_team_title = esc_html( get_post_meta( $post->ID, 'sp_tv_team_title', true ) );
		$tv_team_num = esc_html( get_post_meta( $post->ID, 'sp_tv_team_num', true ) );
		$tv_team_text_link = esc_html( get_post_meta( $post->ID, 'sp_tv_team_text_link', true ) );
		$tv_team_page_link = get_post_meta( $post->ID, 'sp_tv_team_page_link', true );
		$tv_team_taxonomy_id = get_post_meta( $post->ID, 'sp_tv_team_tax', true );
		
		$launcher_title = esc_html( get_post_meta( $post->ID, 'sp_launcher_title', true ) );
		$launcher_num = esc_html( get_post_meta( $post->ID, 'sp_launcher_num', true ) );
		$launcher_text_link = esc_html( get_post_meta( $post->ID, 'sp_launcher_text_link', true ) );
		$launcher_page_link = get_post_meta( $post->ID, 'sp_launcher_page_link', true );
		$launcher_taxonomy_id = get_post_meta( $post->ID, 'sp_launcher_tax', true );

		$tv_photo_title = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_title', true ) );
		$tv_photo_num = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_num', true ) );
		$tv_photo_text_link = esc_html( get_post_meta( $post->ID, 'sp_tv_photo_text_link', true ) );
		$tv_photo_page_link = get_post_meta( $post->ID, 'sp_tv_photo_page_link', true );
		$album_term_id = get_post_meta( $post->ID, 'sp_album_term', true ); 
		
		$callout_title = esc_html( get_post_meta( $post->ID, 'sp_callout_title', true ) ); 
		$callout_desc = esc_html( get_post_meta( $post->ID, 'sp_callout_desc', true ) ); 
		$callout_button = esc_html( get_post_meta( $post->ID, 'sp_callout_button', true ) );
		$callout_link = get_post_meta( $post->ID, 'sp_callout_link', true );
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="tv-header" class="clearfix">

				<div class="tv-post-featured clearfix">
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

				$custom_query = new WP_Query( $args ); ?>

				<?php if( $custom_query->have_posts() ) : 
						while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

						<div class="tv-featured">
						<?php $video_url = get_post_meta( $post->ID, 'sp_video_url', true ); 
							if ( !empty( $video_url ) ) {
								global $wp_embed;
								$video = $wp_embed->run_shortcode('[embed]' . $video_url . '[/embed]');
								printf( '<div class="single-post-thumbnail"><div class="image-shifter">%s</div></div>', $video );
							} ?>
						</div> <!-- .tv-featured -->
						<div class="tv-featured-content">	
							<header class="entry-header">
							<?php the_title( sprintf( '<h1 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h1>' ); ?>
							</header>
							<div class="entry-meta">
								<!-- <span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span> -->
								<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
							</div> <!-- .entry-meta -->
							<div class="entry-content">
								<?php the_excerpt(); ?>
							</div> <!-- .entry-content -->
							<footer class="entry-footer continue-reading">
							    <?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_html__('Continue Reading ', 'klahan9') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
							</footer><!-- .entry-footer -->
						</div> <!-- .tv-featured-content -->
					<?php endwhile; wp_reset_postdata(); ?>	
				
				<?php endif; ?>
				</div> <!-- .tv-post-featured -->

				<?php // Start TV Post list
					$args = array(
		                'post_type' => 'post',
		                'posts_per_page' => 4,
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

				$custom_query = new WP_Query( $args ); ?>
            
	        	<?php if( $custom_query->have_posts() ) : ?>
	        		<div class="tv-post-lists post-grid-4 default-post clearfix">
	        		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
	                    get_template_part( 'partials/content', 'tv' );
	                endwhile; wp_reset_postdata(); ?>
	                
	                <?php printf( '<div class="wpsp-more-wrap"><a class="wpsp-more" itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%2$s</a></div>', 
							esc_url( get_category_link( $cateogry_id ) ), 
							__('More video', 'klahan9')
						); ?>

					</div> <!-- .tv-post-lists -->
	
	        	<?php endif; ?>

			</div> <!-- #tv-header -->

			<div id="meet-tv-star" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-star"></i> <?php echo $star_team_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $star_team_page_link ) ); ?>" class="more"><?php echo $star_team_text_link; ?></a>
				</div>
				<?php $args = array(
	                'post_type' => 'cp_team',
	                'posts_per_page' => $star_team_num,
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
							'terms'    => array( $star_team_taxonomy_id ),
						),
					), 
					//'orderby' => 'rand',  
            	); ?>
            	<script type="text/javascript">
					jQuery('document').ready(function($) {
						$("#tv-star").children().children().flexisel({
							visibleItems: 5,
							animationSpeed: 500,
							autoPlay: false,
							autoPlaySpeed: 4000,            
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								},
								iphone: { 
									changePoint:640,
									visibleItems: 2
								}, 
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
					});
				</script>
            	<div id="tv-star">
				<?php wpsp_get_posts_type ( 'cp_team', $args, 5 ); ?>
				</div> <!-- #tv-star -->

			</div> <!-- #meet-tv-star -->

			<div id="meet-tv-team" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-users"></i> <?php echo $tv_team_title; ?></h3>
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
							'terms'    => array( $tv_team_taxonomy_id ),
						),
					), 
					//'orderby' => 'rand',  
            	); ?>
            	<script type="text/javascript">
					jQuery('document').ready(function($) {
						$("#tv-team").children().children().flexisel({
							visibleItems: 5,
							animationSpeed: 500,
							autoPlay: false,
							autoPlaySpeed: 4000,            
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								},
								iphone: { 
									changePoint:640,
									visibleItems: 2
								}, 
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
					});
				</script>
            	<div id="tv-team">
				<?php wpsp_get_posts_type ( 'cp_team', $args, 5 ); ?>
				</div> <!-- #tv-team -->

			</div> <!-- #meet-tv-team -->

			<div id="tv-show-wrap">
				<div class="section-title clearfix">
					<h3><i class="fa fa-youtube-play"></i> <?php echo $launcher_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $launcher_page_link ) ); ?>" class="more"><?php echo $launcher_text_link; ?></a>
				</div>
				<div class="launcher">
				<?php $args = array(
	                'post_type' => 'cp_launcher',
	                'posts_per_page' => $launcher_num,
	                'tax_query' => array(
						array(
							'taxonomy' => 'launcher_category',
							'field'    => 'term_id',
							'terms'    => array( $launcher_taxonomy_id ),
						),
					), 
            	); ?>
            	<?php wpsp_get_posts_type ( 'cp_launcher', $args, $launcher_num ); ?>
            	</div> <!-- .launcher -->
			</div> <!-- #tv-show-wrap -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-film"></i> <?php echo $tv_photo_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $tv_photo_page_link ) ); ?>" class="more"><?php echo $tv_photo_text_link; ?></a>
				</div>
				<div id="tv-team" class="filmstrip">
					<div class="strip-top"></div>
					<?php wpsp_get_albums_by_term( $album_term_id, 10, $tv_photo_num ); ?>
					<div class="strip-bottom"></div>
				</div> <!-- .filmstrip -->
			</div> <!-- .lastest-gallery -->

			<style type="text/css">
				.callout {
				    background-color: <?php echo get_post_meta( $post->ID, 'sp_callout_bg_color', true ); ?>;
				    color:<?php echo get_post_meta( $post->ID, 'sp_callout_txt_color', true ); ?>;
				}
				.callout h2,
				.callout .button {
				    color: <?php echo get_post_meta( $post->ID, 'sp_callout_txt_color', true ); ?>;
				}
				.callout .button {
				    border-color:<?php echo get_post_meta( $post->ID, 'sp_callout_txt_color', true ); ?>;
				    background-color: <?php echo get_post_meta( $post->ID, 'sp_callout_btn_bg_color', true ); ?>;
				}
				.callout a.button:hover {
					background-color: <?php echo get_post_meta( $post->ID, 'sp_callout_btn_over_color', true ); ?>; 
				}
			</style>
			
			<div class="callout clearfix">
				<?php wpsp_callout( $callout_title, $callout_desc, $callout_button, $callout_link ); ?>
			</div> <!-- .callout -->
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
