<?php
/**
 * Template Name: Home
 *
 * This is the template that displays post video-fomart by category.
 *
 * @package Klahan9
 */

get_header(); ?>
	
	<?php $home_meta = get_post_meta( $post->ID ); ?>

	<div id="fullpage">
		<div class="section" id="section0">
			<div class="art m-tv">
			<a href="<?php echo esc_url( get_permalink( $home_meta["sp_tv_link"][0] ) ); ?>">
			<img src="<?php echo get_template_directory_uri();?>/images/front-page/tv.png" alt="tv" />
			</a>
			</div>
		</div>
		<div class="section" id="section1">
			<div class="art m-online">
			<a href="<?php echo esc_url( get_permalink( $home_meta["sp_online_link"][0] ) ); ?>">
			<img src="<?php echo get_template_directory_uri();?>/images/front-page/online.png" alt="online" />
			</a>
			</div>
		</div>
		<div class="section" id="section2">
			<div class="art m-radio">
			<a href="<?php echo esc_url( get_permalink( $home_meta["sp_radio_link"][0] ) ); ?>">
			<img src="<?php echo get_template_directory_uri();?>/images/front-page/radio.png" alt="radio" />
			</a>
			</div>
		</div>
		<div class="section" id="section3">
		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">

		<div class="site-footer-top clearfix">
			<div class="site-quick-nav two-fourth clearfix">
				<h2><?php echo esc_html__( ot_get_option('more-info') ); ?></h2>
				<?php get_sidebar('footer'); ?>
			</div> <!-- .two-fourth -->

			<div class="site-about two-fourth last clearfix">
				<?php
                if(function_exists('icl_object_id')) {
                    $page_about_obj = get_post(icl_object_id(ot_get_option('about-footer-text'), 'page'));
                    $sponsor_obj = get_post(icl_object_id(ot_get_option('sponsor-footer-text'), 'page'));
                } else {
                    $page_about_obj = get_post(ot_get_option('about-footer-text'));
                    $sponsor_obj = get_post(ot_get_option('sponsor-footer-text'));
                } 
                    $content_about = apply_filters('the_content', $page_about_obj->post_content);
                    $content_sponsor = apply_filters('the_content', $sponsor_obj->post_content);

                ?>

				<h2><?php echo $page_about_obj->post_title; ?></h2>
				<?php echo $content_about; ?>
				<div id="sponsors" class="site-sponsors">
                	<?php echo $content_sponsor; ?>
                </div>
			</div> <!-- .site-about .two-fourth .last .clearfix -->
		</div> <!-- .site-footer-top -->

		<div class="site-info">
			<?php if ( ot_get_option( 'copyright' ) ): 
	            echo ot_get_option( 'copyright' ); 
	        else:
				printf( esc_html__( 'All content copyright © %1$s, %2$s. All Right Reserved.', WPSP_TEXT_DOMAIN ), date( 'Y' ), get_bloginfo( 'name' ) ); 
			endif; ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		</div>
	</div> <!-- #fullpage -->

<?php get_footer(); ?>
