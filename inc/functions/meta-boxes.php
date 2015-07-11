<?php
/**
 * Initialize the meta boxes for post, page and custom templates
 *
 * @package klahan9
 */

add_action( 'admin_init', '_custom_meta_boxes' );

function _custom_meta_boxes() {
	
	$prefix = 'sp_';

	// Page layout
	$page_layout_options = array(
		'id'          => 'page-options',
		'title'       => 'Page Options',
		'desc'        => '',
		'pages'       => array( 'page', 'post', 'cp_team', 'cp_gallery' ),
		'context'     => 'normal',
		'priority'    => 'default',
		'fields'      => array(
			array(
				'label'		=> 'Primary Sidebar',
				'id'		=> $prefix . 'sidebar_primary',
				'type'		=> 'sidebar-select',
				'desc'		=> 'Overrides default'
			),
			array(
				'label'		=> 'Layout',
				'id'		=> $prefix . 'layout',
				'type'		=> 'radio-image',
				'desc'		=> 'Overrides the default layout option',
				'std'		=> 'inherit',
				'choices'	=> array(
					array(
						'value'		=> 'inherit',
						'label'		=> 'Inherit Layout',
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
			)
		)
	);

	// Post Format: Video 
	$post_format_video = array(
		'id'          => 'format-video',
		'title'       => 'Video settings',
		'desc'        => 'These settings enable you to embed videos into your posts.',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Video URL',
				'id'		=> $prefix . 'video_url',
				'type'		=> 'text',
				'desc'		=> 'Enter Video Embed URL from youtube, vimeo or dailymotion'
			)
		)
	);

	// Post Format: Audio
	$post_format_audio = array(
		'id'          => 'format-audio',
		'title'       => 'Audio settings',
		'desc'        => 'These settings enable you to embed soundcloud into your posts.',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Soundcloud URL',
				'id'		=> $prefix . 'sound_url',
				'type'		=> 'text',
				'desc'		=> 'Enter share URL of sound from Soundcloud'
			)
		)
	);

	// Post Format: Gallery
	$post_format_gallery = array(
		'id'          => 'format-gallery',
		'title'       => 'Format: Gallery',
		'desc'        => 'These settings enable you to present photos as slideshow in post',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Upload photo',
				'id'		=> $prefix . 'gallery',
				'type'		=> 'gallery',
				'desc'		=> 'Upload photos'
			)
		)
	);

	//Page template setting for TV, Radio and Online resource
	$page_template_settings = array(
		'id'          => 'page-template-settings',
		'title'       => 'Page settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => __( 'Masthead', 'wpsp' ),
				'id'          => 'tab_masthead',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Masthead',
				'id'		=> $prefix . 'masthead',
				'type'		=> 'upload',
				'desc'		=> 'Upload heading image for masthead page. Size: 960px by 150px'
			),
			array(
				'label'       => __( 'Post Featured', 'wpsp' ),
				'id'          => 'tab_post_featuerd',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Featured category',
				'id'		=> $prefix . 'post_by_cat',
				'type'		=> 'category-select',
				'desc'		=> 'Choose category show featured post for page'
			),
			array(
				'label'		=> 'Page background color',
				'id'		=> $prefix . 'page_bg_color',
				'type'		=> 'colorpicker',
				'desc'		=> 'Choose color for page background'
			),
		)
	);

	//Page template setting for TV
	$page_tv_template_settings = array(
		'id'          => 'page-tv-template-settings',
		'title'       => 'Addon settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => __( 'Team', 'wpsp' ),
				'id'          => 'tab_team',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'tv_team_title',
				'type'		=> 'text',
				'std'		=> 'Meet the star',
				'desc'		=> 'Enter title for this section e.g: Meet the Star'
			),
			array(
				'label'		=> 'TV team',
				'id'		=> $prefix . 'team_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'team_category',
				'desc'		=> 'Select TV team category e.g: Meet the Star'
			),
			array(
				'label'		=> 'Amount of people',
				'id'		=> $prefix . 'tv_team_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of people to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Team text link',
				'id'		=> $prefix . 'tv_team_text_link',
				'type'		=> 'text',
				'std'		=> 'More people',
				'desc'		=> 'Title link for TV team'
			),
			array(
				'label'		=> 'Team page link',
				'id'		=> $prefix . 'tv_team_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for TV team group'
			),
			array(
				'label'       => __( 'Gallery', 'wpsp' ),
				'id'          => 'tab_gallery',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'tv_photo_title',
				'type'		=> 'text',
				'std'		=> 'Behind the scenes',
				'desc'		=> 'Enter title for this section e.g: Behind the scenes'
			),
			array(
				'label'		=> 'TV photo album',
				'id'		=> $prefix . 'album_tax',
				'type'		=> 'custom-post-type-select',
				'post_type' => 'cp_gallery',
				'desc'		=> 'Select TV Album show on TV main page'
			),
			array(
				'label'		=> 'Amount of photo',
				'id'		=> $prefix . 'tv_photo_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of photo to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Photo text link',
				'id'		=> $prefix . 'tv_photo_text_link',
				'type'		=> 'text',
				'std'		=> 'More photos',
				'desc'		=> 'Title link for TV Photo'
			),
			array(
				'label'       => __( 'Callout', 'wpsp' ),
				'id'          => 'tab_callout',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'callout_title',
				'type'		=> 'text',
				'std'		=> 'Ready For a New Job or a Career Change?',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Description',
				'id'		=> $prefix . 'callout_desc',
				'type'		=> 'textarea',
				'rows'      => '3',
				'std'		=> 'Klahan9 provided more information & documents with difference ways and experiences to make everyone have good career opportunity.',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button title',
				'id'		=> $prefix . 'callout_button',
				'type'		=> 'text',
				'std'		=> 'Online Resource',
				'desc'		=> ''
			),
			array(
				'label'		=> 'Button link',
				'id'		=> $prefix . 'callout_link',
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Past Link/Url for button'
			),
		)
	);

	//Page template setting for Radio
	$page_radio_template_settings = array(
		'id'          => 'page-radio-template-settings',
		'title'       => 'Addon settings',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => __( 'Topics', 'wpsp' ),
				'id'          => 'tab_topic',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_topic_title',
				'type'		=> 'text',
				'std'		=> 'Topic next month',
				'desc'		=> 'Enter title for this section e.g: Topic next month'
			),
			array(
				'label'		=> 'Number of topic',
				'id'		=> $prefix . 'radio_topic_num',
				'type'		=> 'text',
				'std'		=> '5',
				'desc'		=> 'Enter amount of topic to show'
			),
			array(
				'label'		=> 'Topic order',
				'id'		=> $prefix . 'radio_team_order',
				'type'		=> 'select',
				'std'		=> 'ASC',
				'desc'		=> 'Select order type for topic. ASC (1, 2, 3; a, b, c) or DESC (3, 2, 1; c, b, a)',
				'choices'   => array( 
		          array(
		            'value'       => 'ASC',
		            'label'       => 'ASC',
		            'src'         => ''
		          ),
		          array(
		            'value'       => 'DESC',
		            'label'       => 'DESC',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'       => __( 'Schedule', 'wpsp' ),
				'id'          => 'tab_schedule',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Schedule banner',
				'id'		=> $prefix . 'schedule_banner',
				'type'		=> 'upload',
				'desc'		=> 'Recommend square image banner. e.g: 310px by 310px'
			),
			array(
				'label'       => __( 'Team', 'wpsp' ),
				'id'          => 'tab_team',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_team_title',
				'type'		=> 'text',
				'std'		=> 'Meet the radio team',
				'desc'		=> 'Enter title for this section e.g: Meet the radio team'
			),
			array(
				'label'		=> 'TV team',
				'id'		=> $prefix . 'team_tax',
				'type'		=> 'taxonomy-select',
				'taxonomy'  => 'team_category',
				'desc'		=> 'Select TV team category e.g: Meet the Star'
			),
			array(
				'label'		=> 'Amount of people',
				'id'		=> $prefix . 'radio_team_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of people to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Team text link',
				'id'		=> $prefix . 'radio_team_text_link',
				'type'		=> 'text',
				'std'		=> 'More people',
				'desc'		=> 'Title link for Radio team'
			),
			array(
				'label'		=> 'Team page link',
				'id'		=> $prefix . 'radio_team_page_link',
				'type'		=> 'page-select',
				'std'		=> '',
				'desc'		=> 'Select page link for Radio team group'
			),
			array(
				'label'       => __( 'Gallery', 'wpsp' ),
				'id'          => 'tab_gallery',
				'type'        => 'tab'
			),
			array(
				'label'		=> 'Title',
				'id'		=> $prefix . 'radio_photo_title',
				'type'		=> 'text',
				'std'		=> 'Weekly photos',
				'desc'		=> 'Enter title for this section e.g: Weekly photos'
			),
			array(
				'label'		=> 'TV Photo Album',
				'id'		=> $prefix . 'album_tax',
				'type'		=> 'custom-post-type-select',
				'post_type' => 'cp_gallery',
				'desc'		=> 'Select TV Album show on TV main page'
			),
			array(
				'label'		=> 'Amount of photo',
				'id'		=> $prefix . 'radio_photo_num',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> 'Choose amount of photo to show',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
			array(
				'label'		=> 'Photo text link',
				'id'		=> $prefix . 'radio_photo_text_link',
				'type'		=> 'text',
				'std'		=> 'More photos',
				'desc'		=> 'Title link for Radio Photo'
			),
		)
	);
		
	//Page template setting for Home
	$page_home_template_settings = array(
			'id'          => 'page-home-template-settings',
			'title'       => 'Message Settings',
			'desc'        => '',
			'pages'       => array( 'page' ),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				array(
					'label'       => __( 'TV', 'wpsp' ),
					'id'          => 'tab_tv',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'tv_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'tv_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for TV'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'tv_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select TV Landing page to be link to'
				),
				array(
					'label'       => __( 'Online', 'wpsp' ),
					'id'          => 'tab_online',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'online_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'online_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for Online'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'online_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select Online Landing page to be link to'
				),
				array(
					'label'       => __( 'Radio', 'wpsp' ),
					'id'          => 'tab_radio',
					'type'        => 'tab'
				),
				array(
					'label'		=> 'Title',
					'id'		=> $prefix . 'radio_title',
					'type'		=> 'text',
					'desc'		=> ''
				),
				array(
					'label'		=> 'Description',
					'id'		=> $prefix . 'radio_desc',
					'type'		=> 'textarea',
					'rows'      => '3',
					'desc'		=> 'Enter short description for Radio'
				),
				array(
					'label'		=> 'Link',
					'id'		=> $prefix . 'radio_link',
					'type'		=> 'page-select',
					'desc'		=> 'Select Radio Landing page to be link to'
				),
				
			)
		);
	
	// Team post type
	$post_type_team = array(
		'id'          => 'peronal-setting',
		'title'       => 'Personal settings',
		'desc'        => '',
		'pages'       => array( 'cp_team' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Team Featured',
				'id'		=> $prefix . 'team_featured',
				'std'       => 'off',
				'type'		=> 'on-off',
				'desc'		=> 'Show this profile to show on front'
			),
			array(
				'label'		=> 'Position',
				'id'		=> $prefix . 'team_position',
				'type'		=> 'text',
				'desc'		=> 'Enter the team member\'s position within the team.'
			),
			array(
				'label'		=> 'Facebook Profile',
				'id'		=> $prefix . 'team_facebook',
				'type'		=> 'text',
				'desc'		=> 'On/Off Facebook profile. If Off, keep it empty'
			),
			array(
				'label'		=> 'Twitter Profile',
				'id'		=> $prefix . 'team_twitter',
				'type'		=> 'text',
				'desc'		=> 'On/Off Twitter profile, If Off keep it empty'
			),
			array(
				'label'		=> 'Linkedin Profile',
				'id'		=> $prefix . 'team_linkedin',
				'type'		=> 'text',
				'desc'		=> 'On/Off linkedin profile, If Off keep it empty'
			)
		)
	);

	// Gallery post type
	$post_type_gallery = array(
		'id'          => 'gallery-setting',
		'title'       => 'Upload photos',
		'desc'        => 'These settings enable you to upload photos.',
		'pages'       => array( 'cp_gallery' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'		=> 'Location',
				'id'		=> $prefix . 'album_location',
				'type'		=> 'text',
				'desc'		=> 'Where this album take photos'
			),
			array(
				'label'		=> 'Upload photo',
				'id'		=> $prefix . 'gallery',
				'type'		=> 'gallery',
				'desc'		=> 'Upload photos'
			),
			array(
				'label'		=> 'Photo columns',
				'id'		=> $prefix . 'gallery_cols',
				'type'		=> 'select',
				'std'		=> '4',
				'desc'		=> '',
				'choices'   => array( 
		          array(
		            'value'       => '2',
		            'label'       => '2',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '3',
		            'label'       => '3',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '4',
		            'label'       => '4',
		            'src'         => ''
		          ),
		          array(
		            'value'       => '5',
		            'label'       => '5',
		            'src'         => ''
		          ),
		        )
			),
		)
	);

	/**
	 *	Return meta box option base on page template selected
	 */
	function rw_maybe_include() {
		// Include in back-end only
		if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
			return false;
		}

		// Always include for ajax
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return true;
		}

		if ( isset( $_GET['post'] ) ) {
			$post_id = $_GET['post'];
		}
		elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = $_POST['post_ID'];
		}
		else {
			$post_id = false;
		}

		$post_id = (int) $post_id;
		$post    = get_post( $post_id );

		$template = get_post_meta( $post_id, '_wp_page_template', true );

		return $template;
	}
	//Register meta boxes
	ot_register_meta_box( $post_format_video );
	ot_register_meta_box( $post_format_audio );
	//ot_register_meta_box( $post_format_gallery );
	ot_register_meta_box( $post_type_team );
	ot_register_meta_box( $post_type_gallery );

	$template_file = rw_maybe_include();
	if ( ( $template_file == 'page-templates/page-tv.php' ) || ( $template_file == 'page-templates/page-radio.php' ) || ( $template_file == 'page-templates/page-blog.php' ) ) {
		ot_register_meta_box( $page_template_settings ); 
	} elseif ( $template_file == 'page-templates/page-home.php' ) {
		ot_register_meta_box( $page_home_template_settings ); 
	}  else {
		ot_register_meta_box( $page_layout_options );
	}
	
	if ( $template_file == 'page-templates/page-tv.php' ) {
		ot_register_meta_box( $page_tv_template_settings ); 
	} 
	if ( $template_file == 'page-templates/page-radio.php' ) {
		ot_register_meta_box( $page_radio_template_settings ); 
	} 
	
}

