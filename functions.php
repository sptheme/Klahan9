<?php
/**
 * Klahan9 functions and definitions
 *
 * @package Klahan9
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// Get theme info
$shortname 		= get_template(); 
$themeData     	= wp_get_theme( $shortname ); //WP 3.4+ only

// Define branding and version constant
define( 'WPSP_THEME_NAME', 'Klahan9' );
define ('WPSP_THEME_VERSION', $themeData->Version );

// String name of theme textdomain
define( 'WPSP_TEXT_DOMAIN', 'klahan9' );

// Paths to the parent theme directory
define( 'WPSP_BASE_DIR', get_template_directory() );
define( 'WPSP_BASE_URL', get_template_directory_uri() );

// Images, Javascript and CSS Paths
define( 'WPSP_JS_DIR_URI', WPSP_BASE_URL .'/js/' );
define( 'WPSP_CSS_DIR_URI', WPSP_BASE_URL .'/css/' );

// Includes files path
define( 'WPSP_INCS', WPSP_BASE_DIR . '/inc/' );


if ( ! function_exists( 'wpsp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpsp_setup() {

	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'http://fonts.googleapis.com/css?family=Oswald:400,300,700';
	add_editor_style( array( WPSP_CSS_DIR_URI . 'base.css', str_replace( ',', '%2C', $font_url ) ) );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( WPSP_TEXT_DOMAIN , get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('large-thumb', 960, 380, true);
	add_image_size('index-thumb', 640, 315, true);
	add_image_size('small-thumb', 310, 212, true);
	add_image_size('team-thumb', 200, 200, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', WPSP_TEXT_DOMAIN ),
		'social' => esc_html__( 'Social Menu', WPSP_TEXT_DOMAIN ),
		'mobile' => esc_html__( 'Mobile Menu', WPSP_TEXT_DOMAIN ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video', 'audio',
	) );
}
endif; // wpsp_setup
add_action( 'after_setup_theme', 'wpsp_setup' );

/**
 * Add custom favicon
 */
function wpsp_adminfavicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.ot_get_option('custom-favicon').'" />'."\n";
}
add_action( 'admin_head', 'wpsp_adminfavicon' );


function wpsp_apple_touch_icon() {
	$favicon = ot_get_option('custom-favicon');
	// Favicon
	if ( $favicon ) {
		echo '<link rel="shortcut icon" type="image/png" href="' . $favicon . '" />'."\n";
	} else {
		echo '<link rel="shortcut icon" type="image/png" href="' . WPSP_BASE_URL . '/favicon.ico" />'."\n";
	}
}
add_action( 'wp_head', 'wpsp_apple_touch_icon' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpsp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpsp_content_width', 450 );
}
add_action( 'after_setup_theme', 'wpsp_content_width', 0 );

/**
 * Add Option Tree for theme option
 */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
load_template( WPSP_INCS . 'option-tree/ot-loader.php' );

if ( ! function_exists( 'option_tree_admin_bar_render' ) ) :
/**
 * Add theme option on admin menu bar
 */
function wpsp_option_tree_admin_bar_render() {

	if ( current_user_can('edit_theme_options') ) {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'option_tree_admin_bar', // link ID, defaults to a sanitized title value
		'title' => 'Theme Options', // link title
		'href' => admin_url( 'themes.php?page=ot-theme-options'), // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
	}
}
add_action( 'wp_before_admin_bar_render', 'wpsp_option_tree_admin_bar_render' );
endif;


if ( ! function_exists( 'wpsp_admin_scripts_styles' ) ) :
/**
 * Enqueue Custom Admin Styles and Scripts
 */
function wpsp_admin_scripts_styles( $hook ) {
	if ( !in_array($hook, array('post.php','post-new.php')) )
		return;
	wp_enqueue_script('post-formats', WPSP_JS_DIR_URI . 'admin-scripts.js', array( 'jquery' ));
}
add_action('admin_enqueue_scripts', 'wpsp_admin_scripts_styles');
endif;

/**
 * Enqueue scripts and styles.
 */
function wpsp_scripts() {

	// Enqueue styles
	wp_enqueue_style( 'klahan9-style', get_stylesheet_uri() );
	wp_enqueue_style( 'klahan9-google-fonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:300italic,400italic,400,300,600' );
    wp_enqueue_style('klahan9-fontawesome', WPSP_BASE_URL . '/fonts/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('klahan9-menu-mobile', WPSP_CSS_DIR_URI . 'menu-mobile.css');
    wp_enqueue_style('klahan9-responsive', WPSP_CSS_DIR_URI . 'responsive.css');
    wp_enqueue_style('magnific-popup', WPSP_CSS_DIR_URI . 'magnific-popup.css');
    wp_enqueue_style('magnific-popup-custom', WPSP_CSS_DIR_URI . 'magnific-custom.css');
    
    // load only in Radio template or sigle post gallery format
    wp_enqueue_style('flexsider', WPSP_CSS_DIR_URI . 'flexslider.css');
    wp_enqueue_style('flexsider-custom', WPSP_CSS_DIR_URI . 'flexslider-custom.css');
    wp_enqueue_script( 'flexslider', WPSP_JS_DIR_URI . 'jquery.flexslider.js', array('jquery'), WPSP_THEME_VERSION, true );


    // Enqueue scripts
    wp_enqueue_script( 'klahan9-modernizr', WPSP_JS_DIR_URI . 'custom-modernizr.min.js', array('jquery'), WPSP_THEME_VERSION, false );
    wp_enqueue_script( 'klahan9-magnific-popup', WPSP_JS_DIR_URI . 'jquery.magnific-popup.min.js', array('jquery'), WPSP_THEME_VERSION, true );
    wp_enqueue_script('klahan9-menu-mobile', WPSP_JS_DIR_URI . 'menu-mobile.js', array('jquery'), WPSP_THEME_VERSION, true);
    wp_enqueue_script('klahan9-main', WPSP_JS_DIR_URI . 'main.js', array('jquery'), WPSP_THEME_VERSION, true);
    //wp_enqueue_script('klahan9-masonry', WPSP_JS_DIR_URI . 'masonry-settings.js', array('masonry'), WPSP_THEME_VERSION, true);
    //wp_enqueue_script('jquery-enquire', WPSP_JS_DIR_URI . 'enquire.min.js', array('klahan9-masonry'), WPSP_THEME_VERSION, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page_template( 'page-templates/page-home.php' ) ) {
		wp_enqueue_style('klahan9-animate', WPSP_CSS_DIR_URI . 'animate.css');
		wp_enqueue_style('klahan9-front-page', WPSP_CSS_DIR_URI . 'front-page.css');
		wp_enqueue_style('klahan9-tooltipster', WPSP_CSS_DIR_URI . 'tooltipster.css');

		wp_enqueue_script('klahan9-wow', WPSP_JS_DIR_URI . 'wow.min.js', array('jquery'), WPSP_THEME_VERSION, true);
		wp_enqueue_script('klahan9-tooltipster', WPSP_JS_DIR_URI . 'jquery.tooltipster.min.js', array('jquery'), WPSP_THEME_VERSION, true);
	}
}
add_action( 'wp_enqueue_scripts', 'wpsp_scripts' );

/**
 * Print customs css
 */
function wpsp_print_ie_script(){
	echo '<!--[if lt IE 9]>'. "\n";
	echo '<script src="' . esc_url( WPSP_JS_DIR_URI . 'html5.js' ) . '"></script>'. "\n";
	echo '<![endif]-->'. "\n";
}
add_action('wp_head', 'wpsp_print_ie_script');

/**
 * Print customs css and script for theme
 */
	
function wpsp_print_custom_css_script(){
?>
<style type="text/css">
	/* custom style */
	.main-navigation li:nth-of-type(1) > a {
		border-top-color: <?php echo ot_get_option( 'color-menu-item-1' ); ?>;
	}
	.main-navigation li:nth-of-type(1) > a:hover {
		background-color: <?php echo ot_get_option( 'color-menu-item-1' ); ?>;
	}
	.main-navigation li:nth-of-type(2) > a {
		border-top-color: <?php echo ot_get_option( 'color-menu-item-2' ); ?>;
	}
	.main-navigation li:nth-of-type(2) > a:hover {
		background-color: <?php echo ot_get_option( 'color-menu-item-2' ); ?>;
	}
	.main-navigation li:nth-of-type(3) > a {
		border-top-color: <?php echo ot_get_option( 'color-menu-item-3' ); ?>;
	}
	.main-navigation li:nth-of-type(3) > a:hover {
		background-color: <?php echo ot_get_option( 'color-menu-item-3' ); ?>;
	}
	.main-navigation li:nth-of-type(4) > a {
		border-top-color: <?php echo ot_get_option( 'color-menu-item-4' ); ?>;
	}
	.main-navigation li:nth-of-type(4) > a:hover {
		background-color: <?php echo ot_get_option( 'color-menu-item-4' ); ?>;
	}
	<?php $page_bg_color = '#4285f4'; ?>

	<?php if ( is_page_template( 'page-templates/page-blog.php' ) || is_page_template( 'page-templates/page-tv.php' ) || is_page_template( 'page-templates/page-radio.php' )) { 
		$page_bg_color = wpsp_get_page_bg_color(); ?>
	.content-background,
	.custom-post-cp_team article:hover { 
		background-color: <?php echo $page_bg_color; ?>!important; 
	}
	.main-navigation .current_page_item > a { 
		border-top-color: <?php echo $page_bg_color; ?>!important; 
		background-color: <?php echo $page_bg_color; ?>!important;
	}
	.section-title h3,
	.widget-title,
	.widget-title a,
	.tv-featured a:hover h3.entry-title,
	.tv-featured a:hover .tv-post-info:before,
	#featured-radio-post h4,
	#featured-radio-post .flex-caption a:hover {
		color:<?php echo $page_bg_color; ?>;
	}
	
	<?php } ?>
</style>

<?php if ( is_page() || is_singular() ) : ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {

		// Setup content background base on height of main section for template page (tv, radio, blog)
		//$('.content-background').css();

		// Setup content a link work with magnificPopup
	    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
        	if ($(this).parents('.gallery').length == 0) {
	            $(this).magnificPopup({
	               type: 'image',
	               removalDelay: 500,
	               mainClass: 'mfp-fade'
	            });
	        }
	    });

	    // Setup wp gallery work with magnificPopup
	    $('.gallery').each(function() {
	        $(this).magnificPopup({
	            delegate: 'a',
	            type: 'image',
	            removalDelay: 300,
	            mainClass: 'mfp-fade',
	            gallery: {
	            	enabled: true,
	            	navigateByImgClick: true
	            }
	        });
	    });
    });

</script>
<?php endif; ?>
<?php		
}
add_action('wp_head', 'wpsp_print_custom_css_script');


/**
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */

function wpsp_social_menu() {
    if ( has_nav_menu( 'social' ) ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'container'       => 'div',
				'container_id'    => 'menu-social',
				'container_class' => 'menu-social',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-items',
				'depth'           => 1,
				'link_before'     => '<span class="screen-reader-text">',
				'link_after'      => '</span>',
				'fallback_cb'     => '',
			)
		);
    }
}

/**
 * Mobile navigation
 */
function wpsp_mobile_navigation() {
		
	if ( has_nav_menu( 'mobile' ) ) {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_id'		 => 'menu-mobile',
				'menu_class'	 => 'mobile-nav',
				'theme_location' => 'mobile',
				'fallback_cb' 	 => '',
			) 
		);
	}		
	
}

if( !function_exists('wpsp_languages_switcher')) :
/*
 * Language switcher with WPML plugin
 */	

function wpsp_languageswitcherer(){
	if(function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			echo '<div class="language"><ul>';
			//echo '<li>' . __('Language: ', 'sptheme') . '</li>';
			foreach($languages as $l){
				echo '<li class="'.$l['language_code'].'">';

				if(!$l['active']) echo '<a href="'.$l['url'].'" title="' . $l['native_name'] . '">';
				echo '<img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" />';
				if(!$l['active']) echo '</a>';

				echo '</li>';
			}
			echo '</ul></div>';
		}
	} else {
		return null; // Activate WMPL plugin
	}
}

endif;

// Load custom widgets
load_template( WPSP_INCS . 'widgets/widgets.php' );

// Load meta boxes settting
load_template( WPSP_INCS . 'functions/meta-boxes.php' );

// Load theme options settings
load_template( WPSP_INCS . 'functions/theme-options.php' );

// Load custom post type
load_template( WPSP_INCS . 'custom-posts/custom-posts.php' );

// Load theme functions
load_template( WPSP_INCS . 'functions/theme-functions.php' );

// Load shortcodes
load_template( WPSP_INCS . 'shortcodes/shortcodes.php' );