<?php
/**
 * Template Name: Radio
 *
 * This is the template that displays post audio-fomart by category.
 *
 * @package Klahan9
 */

get_header(); ?>

	<?php 
		$cateogry_id = get_post_meta( $post->ID, 'sp_post_by_cat', true ); 
		$radio_topic_title = esc_html( get_post_meta( $post->ID, 'sp_radio_topic_title', true ) );
		$radio_topic_num = get_post_meta( $post->ID, 'sp_radio_topic_num', true );
		$radio_topic_order = get_post_meta( $post->ID, 'sp_radio_topic_order', true );
		$radio_team_title = esc_html( get_post_meta( $post->ID, 'sp_radio_team_title', true ) );
		$radio_team_num = esc_html( get_post_meta( $post->ID, 'sp_radio_team_num', true ) );
		$radio_team_text_link = esc_html( get_post_meta( $post->ID, 'sp_radio_team_text_link', true ) );
		$radio_team_page_link = get_post_meta( $post->ID, 'sp_radio_team_page_link', true );
		$team_taxonomy_id = get_post_meta( $post->ID, 'sp_team_tax', true );
		$radio_photo_title = esc_html( get_post_meta( $post->ID, 'sp_radio_photo_title', true ) );
		$radio_photo_num = esc_html( get_post_meta( $post->ID, 'sp_radio_photo_num', true ) );
		$radio_photo_text_link = esc_html( get_post_meta( $post->ID, 'sp_radio_photo_text_link', true ) );
		$album_taxonomy_id = get_post_meta( $post->ID, 'sp_album_tax', true );
		$schedule_banner = get_post_meta( $post->ID, 'sp_schedule_banner', true ); 
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $args = array(
		                'post_type' => 'post',
		                'posts_per_page' => 5,   
		                'date_query' => array(
							array(
								'year' => date( 'Y' ),
								'month' => date( 'm' ),
							),
						),
		                'tax_query' => array(
                        	'relation' => 'AND',
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
	                            'terms'    => array( 'post-format-audio' ),
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

			<script type="text/javascript">
		        jQuery(document).ready(function(){

		            /* Single Post slider */
		            $('#featured-radio-post').flexslider({
		                animation: "fade",
		                controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
		                slideshowSpeed: 8000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
		                animationDuration: 200,         //Integer: Set the speed of animations, in milliseconds
		                animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
		                pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
		                pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
		                before: function(slider) {
		                  $('.flex-caption').delay(100).fadeOut(100);
		                },
		                after: function(slider) {
		                  $('.flex-active-slide').find('.flex-caption').delay(200).fadeIn(400);
		                  }
		            });
		        });
		    </script>

			<div id="featured-radio-post" class="flexslider">
				<ul class="slides">
        		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        			<li>
        				<?php if (has_post_thumbnail()) { ?>
							<?php echo the_post_thumbnail('large-thumb'); ?>
						<?php } ?>
        				<div class="flex-caption">
			                <?php printf( '<h1 itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a></h1>', esc_url( get_permalink() ), esc_attr( get_the_title() ), esc_html( get_the_title() )  ); ?>
			                <div class="entry-meta">
								<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
								<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
							</div>
		                </div> <!-- .flex-caption -->
        			</li>
        		<?php endwhile; wp_reset_postdata(); ?>	
        		</ul>
	        	<?php if(strtolower(ICL_LANGUAGE_CODE) == 'kh') {
					$month = wpsp_month_kh(date('M'));
					} else {
						$month = date('F');
					} 
					printf('<h4><i class="fa fa-headphones"></i>%s</h4>', esc_html__('Topic for ', WPSP_TEXT_DOMAIN) . $month ); ?>
        	</div>
        	<?php endif; ?>

			<div id="topic-next-month">
				
				<div class="section-title clearfix">
					<h3><i class="fa fa-microphone"></i> <?php echo $radio_topic_title; ?></h3>
				</div>
				<div class="schedule-banner">
	            	<?php echo '<img src="' . $schedule_banner . '">'; ?>
	            </div>

	            <div class="monthly-topics clearfix">
	            	<?php $nextmonth = date('F', strtotime('+1 month')); ?>
	            	<ul class="topic-head">
						<li>
						<div class="two-third">
						<?php $nextmonth = date('F', strtotime('+1 month'));
						if(strtolower(ICL_LANGUAGE_CODE) == 'kh') :
							$month = wpsp_month_kh( $nextmonth );
						else :
							$month = $nextmonth;
						endif; 
						echo  __('Topic for ', WPSP_TEXT_DOMAIN) . $nextmonth . ' ' . date('Y'); ?>
						</div>
						<div class="one-fourth last"><?php echo  __('Guest Speaker', WPSP_TEXT_DOMAIN); ?></div>
						</li>
					</ul>
				<?php 
					$args = array(
		                'post_type' => 'post',
		                'posts_per_page' => $radio_topic_num,
		                'order' => $radio_topic_order,
		                'post_status' => array( 'future' ),
		                'date_query' => array(
							array(
								'year' => date( 'Y' ),
								'month' => date( 'm' ) + 1,
							),
						),
		                'tax_query' => array(
	                        'relation' => 'AND',
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
	                            'terms'    => array( 'post-format-audio' ),
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
		                	get_template_part( 'partials/content', 'weekly-topic' );
		                endwhile; wp_reset_postdata();
	            	} else {
	            		printf('<h4>%s</h4>', esc_html__( 'Sorry, new topic will coming soon.', WPSP_TEXT_DOMAIN ) );
	            	}?>
	            </div> <!-- .monthly-topics -->
			</div> <!-- #topic-next-month -->

			<div id="meet-radio-team" class="team clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-users"></i> <?php echo $radio_team_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $radio_team_page_link ) ); ?>" class="more"><?php echo $radio_team_text_link; ?></a>
				</div>
				<?php $args = array(
	                'post_type' => 'cp_team',
	                'posts_per_page' => $radio_team_num,
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

				wpsp_get_posts_type ( 'cp_team', $args, $radio_team_num ); ?>

			</div> <!-- .meet-radio-team -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-picture-o"></i> <?php echo $radio_photo_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $album_taxonomy_id ) ); ?>" class="more"><?php echo $radio_photo_text_link; ?></a>
				</div>
				<div class="weekly-photo">
					<?php wpsp_single_photo_album( $album_taxonomy_id, $radio_photo_num, $radio_photo_num ); ?>
				</div> <!-- .weekly-photo -->
			</div> <!-- .lastest-gallery -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
