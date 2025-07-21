<?php

// tp metabox 
add_filter( 'tp_meta_boxes', 'themepure_metabox' );

function themepure_metabox( $meta_boxes ) {
	
	$prefix     = 'recrute';
	
	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_page_meta_box',
		'title'    => esc_html__( 'VL Page Info', 'recrute' ),
		'post_type'=> 'page',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Show Breadcrumb?', 'recrute' ), 
				'id'      => "{$prefix}_check_bredcrumb",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			),		
			array(
				'label'    => esc_html__( 'Show Breadcrumb Image?', 'recrute' ),
				'id'      => "{$prefix}_check_bredcrumb_img",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			), 

            array(
				'label'    => esc_html__( 'Enable Secondary Logo', 'recrute' ),
				'id'      => "{$prefix}_en_secondary_logo",
				'type'    => 'switch',
				'default' => 'off',
				'conditional' => array()
			), 

			array(
				'label'    => esc_html__( 'Enable Custom Logo', 'recrute' ),
				'id'      => "{$prefix}_en_custom_logo",
				'type'    => 'switch',
				'default' => 'off',
				'conditional' => array()
			), 

			array(
				
				'label'    => esc_html__( 'Custom Logo', 'recrute' ),
				'id'      => "{$prefix}_custom_logo",
				'type'    => 'image',
				'default' => '',
				'conditional' => array(
					"{$prefix}_en_custom_logo", "==", "on"
				)
			),

            array(
				
				'label'    => esc_html__( 'Breadcrumb Background', 'recrute' ),
				'id'      => "{$prefix}_breadcrumb_bg",
				'type'    => 'image',
				'default' => '',
				'conditional' => array(
					"{$prefix}_check_bredcrumb_img", "==", "on"
				)
			),

            array(
				
				'label'    => esc_html__( 'Footer BG', 'recrute' ),
				'id'      => "{$prefix}_footer_bg_image",
				'type'    => 'image',
				'default' => '',
				'conditional' => array()
			),

			array(
				'label' => 'Footer Bg Color',
				'id'   	=> "{$prefix}_footer_bg_color",
				'type' 	=> 'colorpicker',
				'placeholder' => '',
				'default' 	  => '',
				'conditional' => array()
			),

			array(
				
				'label'    => esc_html__( 'CTA BG Image', 'recrute' ),
				'id'      => "{$prefix}_footer_cta_bg_image",
				'type'    => 'image',
				'default' => '',
				'conditional' => array()
			),

			array(
				'label' => 'Footer CTA Bg Color',
				'id'   	=> "{$prefix}_footer_cta_bg_color",
				'type' 	=> 'colorpicker',
				'placeholder' => '',
				'default' 	  => '',
				'conditional' => array()
			),

			array(
				
				'label'    => esc_html__( 'CTA Image', 'recrute' ),
				'id'      => "{$prefix}_footer_cta_image",
				'type'    => 'image',
				'default' => '',
				'conditional' => array()
			),

			


            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Header', 'recrute' ),
				'id'      => "{$prefix}_header_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'recrute' ),
					'custom' => esc_html__( 'Custom', 'recrute' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown 
			array(
				
				'label'           => esc_html__('Select Header Style', 'recrute'),
				'id'              => "{$prefix}_header_style",
				'type'            => 'select',
				'options'         => array(
					'header_1' => esc_html__( 'Header 1', 'recrute' ),
					'header_2' => esc_html__( 'Header 2', 'recrute' ),
					'header_3' => esc_html__( 'Header 3', 'recrute' ),
					'header_4' => esc_html__( 'Header 4', 'recrute' ),
					'header_5' => esc_html__( 'Header 5', 'recrute' ),
					'header_6' => esc_html__( 'Header 6', 'recrute' ),
					'header_7' => esc_html__( 'Header 7', 'recrute' ),
					'header_8' => esc_html__( 'Header 8', 'recrute' ),
					'header_9' => esc_html__( 'Header 9', 'recrute' ),
					'header_10' => esc_html__( 'Header 10', 'recrute' ),
				),
				'placeholder'     => esc_html__( 'Select a header', 'recrute' ),
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "custom"
				),
				'default' => 'header_1',
				'parent' => "{$prefix}_header_tabs",
				'context'  => 'normal' 
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Header Template', 'recrute'),
				'id'              => "{$prefix}_header_templates",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'recrute' ),
                'post_type'       => 'vl-header',
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "elementor"
				),
				'default' => '',
			),


            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Footer', 'recrute' ),
				'id'      => "{$prefix}_footer_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'recrute' ),
					'custom' => esc_html__( 'Custom', 'recrute' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Style', 'recrute'),
				'id'              => "{$prefix}_footer_style",
				'type'            => 'select',
				'options'         => array(
					'footer_1' => esc_html__( 'Footer 1', 'recrute' ),
					'footer_2' => esc_html__( 'Footer 2', 'recrute' ),
					'footer_3' => esc_html__( 'Footer 3', 'recrute' ),
					'footer_4' => esc_html__( 'Footer 4', 'recrute' ),
					'footer_5' => esc_html__( 'Footer 5', 'recrute' ),
					'footer_6' => esc_html__( 'Footer 6', 'recrute' ),
					'footer_7' => esc_html__( 'Footer 7', 'recrute' ),
					'footer_8' => esc_html__( 'Footer 8', 'recrute' ),
					'footer_9' => esc_html__( 'Footer 9', 'recrute' ),
					'footer_10' => esc_html__( 'Footer 10', 'recrute' ),
				),
				'placeholder'     => esc_html__( 'Select a footer', 'recrute' ),
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "custom"
				),
				'default' => 'footer_1',
				'parent' => "{$prefix}_footer_tabs"
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Template', 'recrute'),
				'id'              => "{$prefix}_footer_template",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'recrute' ),
                'post_type'       => 'vl-footer',
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "elementor"
				),
				'default' => '',
			),
		),
	);

    $meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_gallery_meta',
		'title'    => esc_html__( 'VL Gallery Post', 'recrute' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
            array(
				'label'    => esc_html__( 'Gallery', '' ),
				'id'      => "{$prefix}_post_gallery",
				'type'    => 'gallery',
				'default' => '',
				'conditional' => array(),
			),
		),
		'post_format' => 'gallery'
	);    

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_video_meta',
		'title'    => esc_html__( 'VL Video Post', 'recrute' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Video', 'recrute' ),
				'id'      => "{$prefix}_post_video",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your video url.', 'recrute' ),
			),
		),
		'post_format' => 'video'
	);	

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_audio_meta',
		'title'    => esc_html__( 'VL Audio Post', 'recrute' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Audio', 'recrute' ),
				'id'      => "{$prefix}_post_audio",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your audio url..', 'recrute' ),
			),
		),
		'post_format' => 'audio'
	);

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_services_meta',
		'title'    => esc_html__( 'Services Post', 'recrute' ),
		'post_type'=> 'vl-services',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 

			array(
				'label'    => esc_html__( 'Service Icon', 'recrute' ),
				'id'      => "{$prefix}_service_icon",
				'type'    => 'image',
				'default' => '',
			),
			array(
				'label' => 'Service Number',
				'id'      => "{$prefix}_service_number",
				'type'  => 'text', 
				'placeholder' => ' Type Service Number',
				'default' => 'Service 01',
			 )


		),
	);

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_projects_meta',
		'title'    => esc_html__( 'Project Post', 'recrute' ),
		'post_type'=> 'vl-projects',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 

			array(
				'label' => 'Sub Title',
				'id'    => "{$prefix}_project_sub_title",
				'type'  => 'text', 
				'placeholder' => 'Staffing Service',
				'default' => 'Staffing Service', 
			),

		),
	);


	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_jobs_meta',
		'title'    => esc_html__( 'Job Post', 'recrute' ),
		'post_type'=> 'jobs',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 

			array(
				'label'           => esc_html__('Job Type', 'recrute'),
				'id'              => "{$prefix}_job_type",
				'type'            => 'select',
				'options'         => array(
				    'Full Time' => 'Full Time',
				    'Part Time' => 'Part Time ',
				    'Freelance' => 'Freelance',
				    'Internship' => 'Internship',
				),
				'placeholder'     => 'Select Job Type',
				'default' => 'full_time',
				'multiple' => false,
			),

			array(
				
				'label'    => esc_html__( 'Company Logo', 'recrute' ),
				'id'      => "{$prefix}_job_company_logo",
				'type'    => 'image',
				'default' => '',
			),
			array(
				'label' => 'Position',
				'id'    => "{$prefix}_job_position",
				'type'  => 'text', 
				'placeholder' => 'Web Developer',
				'default' => 'Web Developer', 
			),

			array(
				'label' => 'Job Loaction',
				'id'    => "{$prefix}_job_location",
				'type'  => 'text', 
				'placeholder' => '',
				'default' => 'San Francisco, USA', 
			),

			array(
				'label' => 'Salary',
				'id'    => "{$prefix}_job_salary",
				'type'  => 'text', 
				'placeholder' => '$3000 / Month',
				'default' => '$3000 / Month', 
			),

		),
	);

	return $meta_boxes;
}