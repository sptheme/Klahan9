<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Klahan9
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="wrapper">

	<aside id="sidemenu-container">
        <div id="sidemenu">
        <img class="logo-mobile" src="<?php echo WPSP_BASE_URL;?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
		<nav class="menu-mobile-container">
        <?php wpsp_mobile_navigation(); ?>
        </nav>
        </div>            	
    </aside> <!-- end #sidemenu-container -->

    <div id="pager">

    	<?php if ( ! is_page_template( 'page-templates/page-home.php' ) ) :?>
    	<div class="content-background"></div>
    	<?php endif; ?>
    	
		<div class="navigation-overlay"></div>

		<?php wpsp_masthead_option(); ?>

		<header id="header" class="site-header">
			<div class="container clearfix">
			
			<div class="site-branding">
				<?php if( !is_singular() ) echo '<h1 class="site-title">'; else echo '<h2>'; ?>
					<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo ot_get_option( 'custom-logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
					<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
				<?php if( !is_singular() ) echo '</h1>'; else echo '</h2>'; ?>
			</div> <!-- end .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="search-toggle">
			    <i class="fa fa-search"></i>
			    <a href="#search-container" class="screen-reader-text">Search</a>
			</div> <!-- end .search-toggle -->

			<?php wpsp_social_menu(); ?>

			<a class="bbc-logo" href="<?php echo ot_get_option( 'bbc-link' ); ?>" title="BBC Media Action" target="_blank"><img src="<?php echo ot_get_option( 'bbc-logo' ); ?>"></a>

			<?php wpsp_languageswitcherer(); ?>

			<div class="menu-button">
	            <span class="border-before"></span>
	            <span class="border-main"></span>
	            <span class="border-after"></span>
	        </div> <!-- .menu-button -->
			
			<div class="clear"></div>

			<div id="search-container" class="search-box-wrapper">
			    <div class="search-box clearfix">
			        <?php get_search_form(); ?>
			    </div>
			</div> <!-- end #search-container -->
			</div> <!-- end .container .clearfix -->
		</header> <!-- end #header-navigate -->

		<?php if ( ! is_page_template( 'page-templates/page-home.php' ) ) :?>
		<div id="content" class="site-content container clearfix">
		<?php endif; ?>
