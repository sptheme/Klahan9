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
		$radio_all_topic_title = esc_html( get_post_meta( $post->ID, 'sp_radio_all_topic_title', true ) );
		$radio_all_topic_link = get_post_meta( $post->ID, 'sp_radio_all_topic_link', true );
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
		$radio_photo_page_link = get_post_meta( $post->ID, 'sp_radio_photo_page_link', true );
		$album_term_id = get_post_meta( $post->ID, 'sp_album_term', true );
		$schedule_banner = get_post_meta( $post->ID, 'sp_schedule_banner', true ); 
		$callout_title = esc_html( get_post_meta( $post->ID, 'sp_callout_title', true ) ); 
		$callout_desc = esc_html( get_post_meta( $post->ID, 'sp_callout_desc', true ) ); 
		$callout_button = esc_html( get_post_meta( $post->ID, 'sp_callout_button', true ) );
		$callout_link = get_post_meta( $post->ID, 'sp_callout_link', true );
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
						'meta_query' => array(
							array(
								'key'     => 'sp_sound_url',
								'value'   => '',
								'compare' => '!=',
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
        				<?php if (has_post_thumbnail()) { 
        					echo get_the_post_thumbnail($post->ID, 'large-thumb');
						} else { 
							echo '<img src="' . WPSP_BASE_URL . '/images/placeholder/thumbnail-960x380.jpg">';
						} ?>
        				<div class="flex-caption">
			                <?php printf( '<h1 itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a></h1>', esc_url( get_permalink() ), esc_attr( get_the_title() ), esc_html( get_the_title() )  ); ?>
			                <div class="entry-meta">
								<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
								<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
							</div>
		                </div> <!-- .flex-caption -->
        			</li>
        		<?php endwhile; wp_reset_postdata();?>	
        		</ul>
        		<h4><i class="fa fa-headphones"></i><a href="<?php echo esc_url( get_permalink( $radio_all_topic_link ) ); ?>" title="<?php echo $radio_all_topic_title; ?>"><?php echo $radio_all_topic_title; ?></a></h4>
        	</div> <!-- #featured-radio-post -->
        	<?php endif; ?>

			<div id="topic-next-month">
				<div class="section-title clearfix">
					<h3><i class="fa fa-microphone"></i> <?php echo $radio_topic_title; ?></h3>
				</div>
				<div class="schedule-banner">
	            	<?php echo '<img src="' . $schedule_banner . '">'; ?>
	            </div>

	            <div class="monthly-topics clearfix">
	            	<ul class="topic-head">
						<li>
						<div class="two-third">
						<?php //$next_month = date('F', strtotime('+1 month'));
							//wpsp_month_string_translate( $next_month ); 
							wpsp_month_string_translate( date('F') ); ?>
						</div>
						<div class="one-fourth last"><?php echo  __('Guest Speaker', WPSP_TEXT_DOMAIN); ?></div>
						</li>
					</ul>
					<?php $yearly_topic = date( 'Y' );
						$monthly_topic = date( 'm' );
						wpsp_monthly_topic( $cateogry_id, $radio_topic_num, $yearly_topic, $monthly_topic, $radio_topic_order ); ?>
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
            	); ?>

            	<script type="text/javascript">
					jQuery('document').ready(function($) {
						$("#radio-team").children().children().flexisel({
							visibleItems: 5,
							animationSpeed: 1500,
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
				<div id="radio-team">
				<?php wpsp_get_posts_type ( 'cp_team', $args, $radio_team_num ); ?>
				</div> <!-- #radio-team -->

			</div> <!-- .meet-radio-team -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-picture-o"></i> <?php echo $radio_photo_title; ?></h3>
					<a href="<?php echo esc_url( get_permalink( $radio_photo_page_link ) ); ?>" class="more"><?php echo $radio_photo_text_link; ?></a>
				</div>
				<div class="weekly-photo">
					<?php wpsp_get_albums_by_term( $album_term_id, $radio_photo_num, $radio_photo_num ); ?>
				</div> <!-- .weekly-photo -->
			</div> <!-- .lastest-gallery -->

			<div class="callout clearfix">
				<?php wpsp_callout( $callout_title, $callout_desc, $callout_button, $callout_link ); ?>
			</div> <!-- .callout -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
