<?php

/*  Initialize the options before anything else. 
/* ------------------------------------ */
add_action( 'admin_init', 'custom_theme_options', 1 );


/*  Build the custom settings & update OptionTree.
/* ------------------------------------ */
function custom_theme_options() {
	
	// Get a copy of the saved settings array.
	$saved_settings = get_option( 'option_tree_settings', array() );

	// Custom settings array that will eventually be passed to the OptionTree Settings API Class.
	$custom_settings = array(

/*  Help pages
/* ------------------------------------ */	
	'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'Documentation',
          'content'   => '
			<h1>Hueman</h1>
			<p>Thanks for using this theme! Enjoy.</p>
			<ul>
				<li>Read the theme documentation <a target="_blank" href="'.get_template_directory_uri().'/functions/documentation/documentation.html">here</a></li>
				<li>Download the sample child theme <a href="https://github.com/AlxMedia/hueman-child/archive/master.zip">here</a></li>
				<li>Download or contribute translations <a target="_blank" href="https://github.com/AlxMedia/hueman-languages">here</a></li>
				<li>Feel free to rate/review the theme <a target="_blank" href="http://wordpress.org/support/view/theme-reviews/hueman">here</a></li>
				<li>If you have theme questions, go <a target="_blank" href="http://wordpress.org/support/theme/hueman">here</a></li>
				<li>Hueman is on <a target="_blank" href="https://github.com/AlxMedia/hueman">GitHub</a></li>
			</ul>
			<hr />
			<p>You can support the theme author by donating <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K54RW72RZM2HN">here</a> – any amount is always appreciated.</p>
		'
        )
      )
    ),
	
/*  Admin panel sections
/* ------------------------------------ */	
	'sections'        => array(
		array(
			'id'		=> 'header',
			'title'		=> 'Header'
		),
		array(
			'id'		=> 'favicon',
			'title'		=> 'Favicon'
		),
		array(
			'id'		=> 'post',
			'title'		=> 'Post'
		),
		array(
			'id'		=> 'footer',
			'title'		=> 'Footer'
		),
		array(
			'id'		=> 'layout',
			'title'		=> 'Layout'
		),
		array(
			'id'		=> 'sidebars',
			'title'		=> 'Sidebars'
		),
	),
	
/*  Theme options
/* ------------------------------------ */
	'settings'        => array(
		
		// Header
		array(
			'id'		=> 'custom-logo',
			'label'		=> 'Custom Logo',
			'desc'		=> 'Upload your custom logo image. Set logo max-height in styling options.',
			'std'		=> WPSP_BASE_URL . '/images/logo.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'color-menu-item-1',
			'label'		=> '1st menu item',
			'desc'		=> 'Choose color for 1st menu item',
			'std'		=> '#f36a71',
			'type'		=> 'colorpicker',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'color-menu-item-2',
			'label'		=> '2nd menu item',
			'desc'		=> 'Choose color for 2nd menu item',
			'std'		=> '#6aad68',
			'type'		=> 'colorpicker',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'color-menu-item-3',
			'label'		=> '3th menu item',
			'desc'		=> 'Choose color for 3th menu item',
			'std'		=> '#00b7e1',
			'type'		=> 'colorpicker',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'color-menu-item-4',
			'label'		=> '4th menu item',
			'desc'		=> 'Choose color for 4th menu item',
			'std'		=> '#4285f4',
			'type'		=> 'colorpicker',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'bbc-logo',
			'label'		=> 'BBC Logo',
			'desc'		=> '',
			'std'		=> WPSP_BASE_URL . '/images/bbc-media-action.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'bbc-link',
			'label'		=> 'BBC website url',
			'desc'		=> '',
			'std'		=> 'http://www.bbc.co.uk/mediaaction/',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Header: Favicon
		array(
			'id'		=> 'custom-favicon',
			'label'		=> 'Favicon',
			'desc'		=> 'Upload your custom site favicon.',
			'std'		=> WPSP_BASE_URL . '/favicon.ico',
			'type'		=> 'upload',
			'section'	=> 'favicon'
		),
		/*array(
			'id'		=> 'custom-iphone-icon57',
			'label'		=> 'Apple iPhone Icon',
			'desc'		=> 'Upload your custom iPhone icon (57px by 57px).',
			'std'		=> WPSP_BASE_URL . '/images/favicons/apple-touch-icon-57x57-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'favicon'
		),
		array(
			'id'		=> 'custom-ipad-icon72',
			'label'		=> 'Apple iPad Icon',
			'desc'		=> 'Upload your custom iPad icon (72px by 72px).',
			'std'		=> WPSP_BASE_URL . '/images/favicons/apple-touch-icon-72x72-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'favicon'
		),
		array(
			'id'		=> 'custom-iphone-icon114',
			'label'		=> 'Apple iPhone Retina Icon',
			'desc'		=> 'Upload your custom For iPhone with high-resolution Retina display (114px by 114px).',
			'std'		=> WPSP_BASE_URL . '/images/favicons/apple-touch-icon-114x114-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'favicon'
		),
		array(
			'id'		=> 'custom-ipad-icon144',
			'label'		=> 'Apple iPad Retina Icon',
			'desc'		=> 'Upload your custom For iPad with high-resolution Retina display running (144px by 144px).',
			'std'		=> WPSP_BASE_URL . '/images/favicons/apple-touch-icon-144x144-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'favicon'
		),*/
		
		// Post : Post settings
		array(
			'id'		=> 'post-placeholder',
			'label'		=> 'Post placeholder',
			'desc'		=> 'Upload your custom place holder image. Size 960px by 720px',
			'std'		=> WPSP_BASE_URL . '/images/placeholder/thumbnail-960x720.jpg',
			'type'		=> 'upload',
			'section'	=> 'post'
		),
		array(
			'id'		=> 'related-posts',
			'label'		=> 'Single &mdash; Related Posts',
			'desc'		=> 'Shows randomized related articles below the post',
			'std'		=> 'categories',
			'type'		=> 'radio',
			'section'	=> 'post',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => 'Disable'
				),
				array( 
					'value' => 'categories',
					'label' => 'Related by categories'
				),
				array( 
					'value' => 'tags',
					'label' => 'Related by tags'
				)
			)
		),
		// Footer: Copyright
		array(
			'id'		=> 'more-info',
			'label'		=> 'More Information',
			'desc'		=> 'Heading title above footer navigation',
			'std'		=> 'More Information',
			'type'		=> 'text',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'about-footer-text',
			'label'		=> 'Text Highlight of About page',
			'desc'		=> 'Select highlight about page to show in footer',
			'type'		=> 'page_select',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'sponsor-footer-text',
			'label'		=> 'Sponsor page',
			'desc'		=> 'Select sponsor page to show in footer',
			'type'		=> 'page_select',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'copyright',
			'label'		=> 'Footer Copyright',
			'desc'		=> 'Replace the footer copyright text',
			'std'		=> 'WPSP Theme Development © 2015. All Rights Reserved.',
			'type'		=> 'text',
			'section'	=> 'footer'
		),

		// Layout : Global
		array(
			'id'		=> 'layout-global',
			'label'		=> 'Global Layout',
			'desc'		=> 'Other layouts will override this option if they are set',
			'std'		=> 'col-2cr',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Home
		array(
			'id'		=> 'layout-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ] Posts homepage layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Single
		array(
			'id'		=> 'layout-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] Single post layout - If a post has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Archive
		array(
			'id'		=> 'layout-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ] Category, date, tag and author archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Archive - Category
		array(
			'id'		=> 'layout-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ] Category archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Search
		array(
			'id'		=> 'layout-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ] Search page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Error 404
		array(
			'id'		=> 'layout-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ] Error 404 page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Layout : Default Page
		array(
			'id'		=> 'layout-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] Default page layout - If a page has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> WPSP_BASE_URL . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> WPSP_BASE_URL . '/images/admin/col-2cr.png'
				)
			)
		),
		// Sidebars: Create Areas
		array(
			'id'		=> 'sidebar-areas',
			'label'		=> 'Create Sidebars',
			'desc'		=> 'You must save changes for the new areas to appear below. <br /><i>Warning: Make sure each area has a unique ID.</i>',
			'type'		=> 'list-item',
			'section'	=> 'sidebars',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'id',
					'label'		=> 'Sidebar ID',
					'desc'		=> 'This ID must be unique, for example "sidebar-about"',
					'std'		=> 'sidebar-',
					'type'		=> 'text',
					'choices'	=> array()
				)
			)
		),
		// Sidebar 1 & 2
		array(
			'id'		=> 's1-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] Primary - If a single post has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] Primary - If a page has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
	)
);

/*  Settings are not the same? Update the DB
/* ------------------------------------ */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	} 
}
