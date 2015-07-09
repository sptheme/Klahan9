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
	<?php echo $home_meta['sp_presenter'][0];?>

	<div id="homepage" class="site-home-container">
		<div class="site-content-home">
		<script type="text/javascript">
			jQuery(document).ready(function($){

				// Init wow 
				new WOW().init();

			    // Active tooltipster
			    $('.tv').tooltipster({
			    	animation: 'grow',
			    	contentAsHTML: true,
			    	interactive: true,
			    	content: $('<div class="tooltip-wrap"><h1><?php echo esc_html($home_meta["sp_tv_title"][0]);?></h1><p><?php echo esc_textarea($home_meta["sp_tv_desc"][0]);?></p></div>'),
			    });
			    $('.online').tooltipster({
			    	animation: 'grow',
			    	contentAsHTML: true,
			    	interactive: true,
			    	content: $('<div class="tooltip-wrap"><h1><?php echo esc_html($home_meta["sp_online_title"][0]);?></h1><p><?php echo esc_textarea($home_meta["sp_online_desc"][0]);?></p></div>')
			    });
			    $('.radio').tooltipster({
			    	animation: 'grow',
			    	contentAsHTML: true,
			    	interactive: true,
			    	content: $('<div class="tooltip-wrap"><h1><?php echo esc_html($home_meta["sp_radio_title"][0]);?></h1><p><?php echo esc_textarea($home_meta["sp_radio_desc"][0]);?></p></div>')
			    });
			    
			});
		</script>
		<div class="ground-arts">
			<div class="container">
				<img class="ground wow fadeIn" data-wow-duration="2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/ground.png">
				<img class="dead-rize wow fadeInRight" data-wow-duration="1s" data-wow-delay="1.1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/dead-rize.png">
				<img class="cow wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cow.png">
				<img class="kits-fly wow zoomIn" data-wow-duration="1.5s" data-wow-delay="2.2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/kits-fly.png">	
				<img class="birds wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.9s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/birds.png">	
				<img class="bamboo wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="2.1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/bamboo.png">
				<img class="palm-1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/palm-1.png">
				<img class="palm-2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/palm-2.png">
				<img class="pearl wow lightSpeedIn" data-wow-duration="0.8s" data-wow-delay="1.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/pearl.png">	
				<img class="frog wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.3s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/frog.png">
				<img class="fishing-2 wow fadeInDown" data-wow-duration="0.3s" data-wow-delay="2.1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/fishing-2.png">
				<img class="fishing-3 wow fadeInDown" data-wow-duration="0.3s" data-wow-delay="2.2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/fishing-3.png">

				<!-- Main sections -->
				<a class="tv wow zoomIn tooltip" data-wow-duration="0.5s" data-wow-delay="2.2s" href="<?php echo esc_url( get_permalink( $home_meta["sp_tv_link"][0] ) ); ?>">Klahan9 TV</a>
				<a class="online wow zoomIn" data-wow-duration="0.5s" data-wow-delay="2.5s" href="<?php echo esc_url( get_permalink( $home_meta["sp_online_link"][0] ) ); ?>">Klahan9 Online</a>
				<a class="radio wow zoomIn" data-wow-duration="0.5s" data-wow-delay="2.8s" href="<?php echo esc_url( get_permalink( $home_meta["sp_radio_link"][0] ) ); ?>">Klahan9 Radio</a>
				<!-- End Main sections -->

				<img class="banana wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/banana.png">
				<img class="pigs wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/pigs.png">
				<img class="chicken wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="2.3s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/chicken.png">
				<img class="fishing-1 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay="2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/fishing-1.png">	
				<img class="dog wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="2s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/dog.png">
				<img class="book wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="2.3s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/book.png">
				<img class="echo wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="3s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/echo.png">
			</div>
		</div> 
		<div class="back-arts">
			<div class="container">
				<img class="cloud-1 wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="1.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png">
				<img class="cloud-2 wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="1.8s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png">
				<img class="cloud-3 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="1.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png">
				<img class="cloud-4 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="1.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png" width="150" height="40">
				<img class="cloud-5 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="1.5s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png" width="190" height="51">
				<img class="cloud-6 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="1.8s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png" width="150" height="40">
				<img class="cloud-7 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="1.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/cloud.png" width="150" height="40">
				<img class="mountain wow zoomIn" data-wow-duration="1.2s" data-wow-delay="1.5s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/mountain.png">
				<img class="brush-5 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="1.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-5.png">
				<img class="plateau-5 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/plateau-5.png">
				<img class="brush-1 wow fadeIn" data-wow-duration="1s" data-wow-delay="1.4s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-1.png">
				<img class="brush-11 wow fadeIn" data-wow-duration="1s" data-wow-delay="1.4s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-1.png">
				<img class="brush-2 wow fadeIn" data-wow-duration="1s" data-wow-delay="1.4s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-2.png">

				
				<img class="pagoda wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="1.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/pagoda.png">
				<img class="tree wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="1.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/tree.png">
				
				<img class="plateau-4 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.9s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/plateau-4.png">
				<img class="plateau-3 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.8s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/plateau-3.png">
				<img class="plateau-2 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/plateau-2.png">
				<img class="plateau-1 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.6s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/plateau-1.png">
				
				<img class="brush-3 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-3.png">
				<img class="brush-4 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.1s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/brush-4.png">

				<img class="school wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="1.8s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/school.png">
				<img class="house wow bounceInUp" data-wow-duration="1s" data-wow-delay="1.7s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/house.png">
				<img class="old-house wow bounceInUp" data-wow-duration="0.8s" data-wow-delay="1.5s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/old-house.png">

				<img class="carrot-farm wow fadeIn" data-wow-duration="0.7s" data-wow-delay="0.5s" src="<?php echo WPSP_BASE_URL; ?>/images/front-page/carrot-farm.png">
			</div>
		</div>
		</div> <!-- .site-content-home -->
	</div> <!-- #homepage -->
<?php get_footer(); ?>
