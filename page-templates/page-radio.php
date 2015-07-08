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
		$team_taxonomy_id = get_post_meta( $post->ID, 'sp_team_tax', true );
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
			                <h1 itemprop="name"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			                <div class="entry-meta">
								<span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span>
								<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
							</div>
		                </div> <!-- .flex-caption -->
        			</li>
        		<?php endwhile; wp_reset_postdata(); ?>	
        		</ul>

				<h4><i class="fa fa-headphones"></i>
				<?php esc_html_e('Topic for ', WPSP_TEXT_DOMAIN); ?>
				<?php if(strtolower(ICL_LANGUAGE_CODE) == 'kh') :
					echo sp_month_kh(date('M'));
				else :
					echo date('F');
				endif; ?>
				</h4>
        	</div>
        	<?php endif; ?>

			<div id="topic-next-month" class="clearfix">
				<div class="monthly-topics">
				<div class="section-title clearfix">
					<h3><i class="fa fa-microphone"></i> Topic Next Month</h3>
				</div>
				<?php 
					$args = array(
		                'post_type' => 'post',
		                'posts_per_page' => 5,
		                'post_status' => array( 'future' ),
		                'order' => 'ASC',
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
		            	echo '<ol>';
		                while ( $custom_query->have_posts() ) : $custom_query->the_post();
		                	echo '<li>';
		                    echo '<span class="topic-title">' . get_the_title() . '</span>';
		                    echo '<span class="topic-date">' . esc_html__( 'will broadcast on ', WPSP_TEXT_DOMAIN ) . esc_html( get_the_date('d M, Y') );
		                    echo '</li>';
		                endwhile; wp_reset_postdata();
		            	echo '</ol>';
	            } ?>
	            </div> <!-- .monthly-topics -->
	            <div class="schedule-banner">
	            	<?php echo '<img src="' . $schedule_banner . '">'; ?>
	            </div>
			</div> <!-- #topic-next-month -->

			<div id="meet-radio-team" class="team clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-users"></i> Meet Radio Team</h3>
					<a href="#" class="more">More people</a>
				</div>
				<?php $args = array(
	                'post_type' => 'cp_team',
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
			</div> <!-- .meet-radio-team -->

			<div id="photo-wrap" class="clearfix">
				<div class="section-title clearfix">
					<h3><i class="fa fa-picture-o"></i> Weekly Photos</h3>
					<a href="<?php echo esc_url( get_permalink( $album_taxonomy_id ) ); ?>" class="more">More photos</a>
				</div>
				<div class="weekly-photo">
					<?php wpsp_single_photo_album( $album_taxonomy_id, 4, 4 ); ?>
				</div> <!-- .weekly-photo -->
			</div> <!-- .lastest-gallery -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
