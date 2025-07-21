<?php


new \Kirki\Panel(
    'panel_id',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Recrute Panel', 'recrute' ),
        'description' => esc_html__( 'Recrute Panel Description.', 'recrute' ),
    ]
);

// header_top_section
function header_top_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_top_section',
        [
            'title'       => esc_html__( 'Header Info', 'recrute' ),
            'description' => esc_html__( 'Header Section Information.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );
    // header_top_bar section 

    new \Kirki\Field\Radio_Image(
        [
            'settings'    => 'header_layout_custom',
            'label'       => esc_html__( 'Chose Header Style', 'recrute' ),
            'section'     => 'header_top_section',
            'priority'    => 10,
            'choices'     => [
                'header_1'   => get_template_directory_uri() . '/inc/img/header/header-1.jpg',
                'header_2' => get_template_directory_uri() . '/inc/img/header/header-2.jpg',
                'header_3'  => get_template_directory_uri() . '/inc/img/header/header-3.jpg',
                'header_4'  => get_template_directory_uri() . '/inc/img/header/header-4.jpg',
                'header_5'  => get_template_directory_uri() . '/inc/img/header/header-5.jpg',
                'header_6'  => get_template_directory_uri() . '/inc/img/header/header-6.jpg',
                'header_7'  => get_template_directory_uri() . '/inc/img/header/header-7.jpg',
                'header_8'  => get_template_directory_uri() . '/inc/img/header/header-8.jpg',
                'header_9'  => get_template_directory_uri() . '/inc/img/header/header-9.jpg',
                'header_10'  => get_template_directory_uri() . '/inc/img/header/header-10.jpg',
            ],
            'default'     => 'header_1',
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_topbar_switch',
            'label'       => esc_html__( 'Header Topbar Switch', 'recrute' ),
            'description' => esc_html__( 'Header Topbar switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );    

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_right_switch',
            'label'       => esc_html__( 'Header Right Switch', 'recrute' ),
            'description' => esc_html__( 'Header Right switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_preloader_switch',
            'label'       => esc_html__( 'Header Preloader Switch', 'recrute' ),
            'description' => esc_html__( 'Header Preloader switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );



    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_auth_switch',
            'label'       => esc_html__( 'Header Auth Switch', 'recrute' ),
            'description' => esc_html__( 'Header Auth switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    ); 


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_backtotop_switch',
            'label'       => esc_html__( 'Header Back to Top Switch', 'recrute' ),
            'description' => esc_html__( 'Header Back to Top switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_top_button_switch',
            'label'       => esc_html__( 'Header Top Button On/Off', 'recrute' ),
            'description' => esc_html__( 'Header Top Button switch On/Off', 'recrute' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );
    

    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_text',
            'label'    => esc_html__( 'Button Text', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( 'Get Started ', 'recrute' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\URL(
        [
            'settings' => 'header_button_link',
            'label'    => esc_html__( 'Button URL', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_phone',
            'label'    => esc_html__( 'Phone Number', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '+88 01310-069824', 'recrute' ),
            'priority' => 10,
        ]
    );    

    new \Kirki\Field\Text(
        [
            'settings' => 'header_email',
            'label'    => esc_html__( 'Email ID', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( 'recrute@support.com', 'recrute' ),
            'priority' => 10,
        ]
    );    

    new \Kirki\Field\Text(
        [
            'settings' => 'header_address',
            'label'    => esc_html__( 'Address Text', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '734 H, Bryan Burlington, NC 27215', 'recrute' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\URL(
        [
            'settings' => 'header_address_link',
            'label'    => esc_html__( 'Address URL', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => 'https://www.google.com/maps/@36.0758266,-79.4558848,17z',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_top_time',
            'label'    => esc_html__( 'Header top time', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => 'Sunday - Friday: 9 am - 8 pm',
            'priority' => 10,
        ]
    );
    new \Kirki\Field\textarea(
        [
            'settings' => 'header_top_menu',
            'label'    => esc_html__( 'Header top menu', 'recrute' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '#', 'recrute' ),
            'priority' => 10,
        ]
    );


}
header_top_section();


// header_side_section
function header_side_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_side_section',
        [
            'title'       => esc_html__( 'Header Side Info', 'recrute' ),
            'description' => esc_html__( 'Header Side Information.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 110,
        ]
    );
    // header_side_section section 

    // header_side_logo_section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_side_logo',
            'label'       => esc_html__( 'Header Side Logo', 'recrute' ),
            'description' => esc_html__( 'Header Side Default/Primary Logo Here', 'recrute' ),
            'section'     => 'header_side_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_side_info_switch',
            'label'       => esc_html__( 'Header Side Info Switch', 'recrute' ),
            'description' => esc_html__( 'Header Side Info switch On/Off', 'recrute' ),
            'section'     => 'header_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );  

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_side_social_switch',
            'label'       => esc_html__( 'Header Side Social Switch', 'recrute' ),
            'description' => esc_html__( 'Header Side Social switch On/Off', 'recrute' ),
            'section'     => 'header_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );  

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_side_button_switch',
            'label'       => esc_html__( 'Header Side Button Switch', 'recrute' ),
            'description' => esc_html__( 'Header Side Button switch On/Off', 'recrute' ),
            'section'     => 'header_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );  


    // Social Heading
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_social_heading',
            'label'    => esc_html__( 'Social Heading', 'recrute' ),
            'section'  => 'header_side_section',
            'default'  => esc_html__( 'Social Media', 'recrute' ),
            'priority' => 10,
        ]
    );


    new \Kirki\Field\Textarea(
        [
            'settings'    => 'header_top_offcanvas_textarea',
            'label'       => esc_html__( 'Offcanvas About Us', 'recrute' ),
            'section'     => 'header_side_section',
            'default'     => esc_html__( 'Web designing in a powerful way of just not an only professions. We have tendency to believe the idea that smart looking .', 'recrute' ),
        ]
    );

    // Contacts Text 
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_contacts_text',
            'label'    => esc_html__( 'Contacts Text', 'recrute' ),
            'section'  => 'header_side_section',
            'default'  => esc_html__( 'Contact Us', 'recrute' ),
            'priority' => 10,
        ]
    );

}
header_side_section();

// header_social_section
function header_social_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_social_section',
        [
            'title'       => esc_html__( 'Social Area', 'recrute' ),
            'description' => esc_html__( 'Social URL.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 120,
        ]
    );
    // header_top_bar section 

    new \Kirki\Field\URL(
        [
            'settings' => 'header_facebook_link',
            'label'    => esc_html__( 'Facebook URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    ); 

    new \Kirki\Field\URL(
        [
            'settings' => 'header_twitter_link',
            'label'    => esc_html__( 'Twitter URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );  

    new \Kirki\Field\URL(
        [
            'settings' => 'header_linkedin_link',
            'label'    => esc_html__( 'Linkedin URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    ); 

    new \Kirki\Field\URL(
        [
            'settings' => 'header_instagram_link',
            'label'    => esc_html__( 'Instagram URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );  

    new \Kirki\Field\URL(
        [
            'settings' => 'header_youtube_link',
            'label'    => esc_html__( 'Youtube URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );  

    new \Kirki\Field\URL(
        [
            'settings' => 'header_fb_link',
            'label'    => esc_html__( 'Facebook URL', 'recrute' ),
            'section'  => 'header_social_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );  

}
header_social_section();

// header_logo_section
function header_logo_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_logo_section',
        [
            'title'       => esc_html__( 'Header Logo', 'recrute' ),
            'description' => esc_html__( 'Header Logo Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 130,
        ]
    );

    // header_logo_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_logo',
            'label'       => esc_html__( 'Header Logo', 'recrute' ),
            'description' => esc_html__( 'Theme Default/Primary Logo Here', 'recrute' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_secondary_logo',
            'label'       => esc_html__( 'Header Secondary Logo / White', 'recrute' ),
            'description' => esc_html__( 'Theme Secondary Logo Here', 'recrute' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'preloader_logo',
            'label'       => esc_html__( 'Preloader Icon', 'recrute' ),
            'description' => esc_html__( 'Preloader Icon Logo Here', 'recrute' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/preloder.png',
        ]
    );
}
header_logo_section();


// header_logo_section
function header_breadcrumb_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_breadcrumb_section',
        [
            'title'       => esc_html__( 'Breadcrumb', 'recrute' ),
            'description' => esc_html__( 'Breadcrumb Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 160,
        ]
    );

    // header_logo_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'breadcrumb_image',
            'label'       => esc_html__( 'Breadcrumb Image', 'recrute' ),
            'description' => esc_html__( 'Breadcrumb Image add/remove', 'recrute' ),
            'section'     => 'header_breadcrumb_section',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'breadcrumb_bg_color',
            'label'       => __( 'Breadcrumb BG Color', 'recrute' ),
            'description' => esc_html__( 'You can change breadcrumb bg color from here.', 'recrute' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => '#f3fbfe',
        ]
    );

    new \Kirki\Field\Dimensions(
        [
            'settings'    => 'breadcrumb_padding',
            'label'       => esc_html__( 'Dimensions Control', 'recrute' ),
            'description' => esc_html__( 'Description', 'recrute' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => [
                'padding-top'  => '',
                'padding-bottom' => '',
            ],
        ]
    );


    new \Kirki\Field\Text(
        [
            'settings' => 'breadcrumb_blog_title',
            'label'    => esc_html__( 'Page Title', 'recrute' ),
            'section'  => 'header_breadcrumb_section',
            'default'  => esc_html__( 'Blog', 'recrute' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'breadcrumb_blog_title_details',
            'label'    => esc_html__( 'Page Inner Title', 'recrute' ),
            'section'  => 'header_breadcrumb_section',
            'default'  => esc_html__( 'Blog Details', 'recrute' ),
            'priority' => 10,
        ]
    );

    

    new \Kirki\Field\Typography(
        [
            'settings'    => 'breadcrumb_typography',
            'label'       => esc_html__( 'Typography Control', 'recrute' ),
            'description' => esc_html__( 'The full set of options.', 'recrute' ),
            'section'     => 'header_breadcrumb_section',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => '.tpbreadcrumb-title',
                ],
            ],
        ]
    );


}
header_breadcrumb_section();

// header_logo_section
function full_site_typography(){
    // header_logo_section section 
    new \Kirki\Section(
        'full_site_typography',
        [
            'title'       => esc_html__( 'Typography', 'recrute' ),
            'description' => esc_html__( 'Typography Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );

    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_body',
            'label'       => esc_html__( 'Typography Body Text', 'recrute' ),
            'description' => esc_html__( 'Body Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'body',
                ],
            ],
        ]
    );

    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h1',
            'label'       => esc_html__( 'Typography Heading 1 Font', 'recrute' ),
            'description' => esc_html__( 'H1 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h1',
                ],
            ],
        ]
    );


    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h2',
            'label'       => esc_html__( 'Typography Heading 2 Font', 'recrute' ),
            'description' => esc_html__( 'H2 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h2',
                ],
            ],
        ]
    );


    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h3',
            'label'       => esc_html__( 'Typography Heading 3 Font', 'recrute' ),
            'description' => esc_html__( 'H3 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h3',
                ],
            ],
        ]
    );


    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h4',
            'label'       => esc_html__( 'Typography Heading 4 Font', 'recrute' ),
            'description' => esc_html__( 'H4 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h4',
                ],
            ],
        ]
    );


    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h5',
            'label'       => esc_html__( 'Typography Heading 5 Font', 'recrute' ),
            'description' => esc_html__( 'H5 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h5',
                ],
            ],
        ]
    );


    new \Kirki\Field\Typography(
        [
            'settings'    => 'recrute_typo_h6',
            'label'       => esc_html__( 'Typography Heading 6 Font', 'recrute' ),
            'description' => esc_html__( 'H6 Typography Control.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => 'h6',
                ],
            ],
        ]
    );

    new \Kirki\Field\Typography(
        [
            'settings'    => 'full_site_typography_settings',
            'label'       => esc_html__( 'Typography Control', 'recrute' ),
            'description' => esc_html__( 'The full set of options.', 'recrute' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => '.tpbreadcrumb-title',
                ],
            ],
        ]
    );
}
full_site_typography();

// header_logo_section
function footer_layout_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'footer_layout_section',
        [
            'title'       => esc_html__( 'Footer', 'recrute' ),
            'description' => esc_html__( 'Footer Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );
    // footer_widget_number section 
    new \Kirki\Field\Select(
        [
            'settings'    => 'footer_widget_number',
            'label'       => esc_html__( 'Footer Widget Number', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => '4',
            'placeholder' => esc_html__( 'Choose an option', 'recrute' ),
            'choices'     => [
                '1' => esc_html__( '1', 'recrute' ),
                '2' => esc_html__( '2', 'recrute' ),
                '3' => esc_html__( '3', 'recrute' ),
                '4' => esc_html__( '4', 'recrute' ),
            ],
        ]
    );

    new \Kirki\Field\Radio_Image(
        [
            'settings'    => 'footer_layout',
            'label'       => esc_html__( 'Footer Layout Control', 'recrute' ),
            'section'     => 'footer_layout_section',
            'priority'    => 10,
            'choices'     => [
                'footer_1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.jpg',
                'footer_2' => get_template_directory_uri() . '/inc/img/footer/footer-2.jpg',
                'footer_3' => get_template_directory_uri() . '/inc/img/footer/footer-3.jpg',
                'footer_4' => get_template_directory_uri() . '/inc/img/footer/footer-4.jpg',
                'footer_5' => get_template_directory_uri() . '/inc/img/footer/footer-5.jpg',
                'footer_6' => get_template_directory_uri() . '/inc/img/footer/footer-6.jpg',
                'footer_7' => get_template_directory_uri() . '/inc/img/footer/footer-7.jpg',
                'footer_8' => get_template_directory_uri() . '/inc/img/footer/footer-8.jpg',
                'footer_9' => get_template_directory_uri() . '/inc/img/footer/footer-9.jpg',
                'footer_10' => get_template_directory_uri() . '/inc/img/footer/footer-10.jpg',
            ],
            'default'     => 'footer_1',
        ]
    );

    // footer_layout_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'footer_bg_image',
            'label'       => esc_html__( 'Footer BG Image', 'recrute' ),
            'description' => esc_html__( 'Footer Image add/remove', 'recrute' ),
            'section'     => 'footer_layout_section',
        ]
    );

    // footer_layout_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'footer_logo_image',
            'label'       => esc_html__( 'Footer Logo Image', 'recrute' ),
            'description' => esc_html__( 'Footer Logo add/remove', 'recrute' ),
            'section'     => 'footer_layout_section',
        ]
    );

    // Footer Logo Image Upload
    new \Kirki\Field\Image(
        [
            'settings' => 'recrute_footer_logo',
            'label'    => esc_html__( 'Footer Logo Image', 'recrute' ),
            'description' => esc_html__( 'Upload your footer logo image', 'recrute' ),
            'section'  => 'footer_layout_section',
            'priority' => 10,
            'default'  => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
        ]
    );

    // Footer Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'footer_description',
            'label'    => esc_html__( 'Footer Description', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( 'Our goal is to demystify the process, address your concerns, and empower you with the knowledge to embark.', 'recrute' ),
            'priority' => 10,
        ]
    );

    // Footer Address
    new \Kirki\Field\Text(
        [
            'settings' => 'footer_address',
            'label'    => esc_html__( 'Footer Address', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( '8708 Technology Forest PI Suite 125 -G, The Woodlands', 'recrute' ),
            'priority' => 10,
        ]
    );

    // Footer Email
    new \Kirki\Field\Text(
        [
            'settings' => 'footer_email',
            'label'    => esc_html__( 'Footer Email', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( 'infoseoc@gmail.com', 'recrute' ),
            'priority' => 10,
        ]
    );

    // Footer Phone
    new \Kirki\Field\Text(
        [
            'settings' => 'footer_phone',
            'label'    => esc_html__( 'Footer Phone', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( '1235690ecrute', 'recrute' ),
            'priority' => 10,
        ]
    );

    // Social Media URLs
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_footer_fb_url',
            'label'    => esc_html__( 'Facebook URL', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_footer_twitter_url',
            'label'    => esc_html__( 'Twitter URL', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_footer_instagram_url',
            'label'    => esc_html__( 'Instagram URL', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_footer_linkedin_url',
            'label'    => esc_html__( 'LinkedIn URL', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'footer_bg_color',
            'label'       => __( 'Footer BG Color', 'recrute' ),
            'description' => esc_html__( 'You can change footer bg color from here.', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => '',
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_2_switch',
            'label'       => esc_html__( 'Footer Style 2 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 2 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_3_switch',
            'label'       => esc_html__( 'Footer Style 3 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 3 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_4_switch',
            'label'       => esc_html__( 'Footer Style 4 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 4 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_5_switch',
            'label'       => esc_html__( 'Footer Style 5 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 5 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_6_switch',
            'label'       => esc_html__( 'Footer Style 6 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 6 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_7_switch',
            'label'       => esc_html__( 'Footer Style 7 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 7 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );     
    
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_8_switch',
            'label'       => esc_html__( 'Footer Style 8 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 8 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_9_switch',
            'label'       => esc_html__( 'Footer Style 9 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 9 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_layout_10_switch',
            'label'       => esc_html__( 'Footer Style 10 Switch', 'recrute' ),
            'description' => esc_html__( 'Footer Style 10 On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'recrute' ),
                'off' => esc_html__( 'Disable', 'recrute' ),
            ],
        ]
    );      

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_copyright_switch',
            'label'       => esc_html__( 'Footer Copyright On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => true,
            'priority' => 10,
        ]
    ); 

    new \Kirki\Field\Text(
        [
            'settings' => 'footer_copyright',
            'label'    => esc_html__( 'Footer Copyright', 'recrute' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( 'Copyright &copy; 2023 Vikinglab. All Rights Reserved', 'recrute' ),
            'priority' => 10,
        ]
    );  


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_social_switch',
            'label'       => esc_html__( 'Footer Social On / Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => false,
            'priority' => 10,
        ]
    ); 


  new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_bottom_copyright_area_switch',
            'label'       => esc_html__( 'Footer Bottom  Copyright Area On/Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => true,
            'priority' => 10,
        ]
    ); 
    new \Kirki\Field\textarea(
        [
            'settings'    => 'footer_bottom_menu',
            'label'       => esc_html__( 'Footer Bottom Menu', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => esc_html__( 'Footer Bottom menu', 'recrute' ),
            'priority' => 10,
        ]
    ); 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_cta_switch',
            'label'       => esc_html__( 'Footer Cta On / Off', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => false,
            'priority' => 10,
        ]
    ); 

    new \Kirki\Field\text(
        [
            'settings'    => 'footer_top_cta_title',
            'label'       => esc_html__( 'Footer Cta Title', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => esc_html__( 'Ready to Power up your Savings and Reliability?', 'recrute' ),
            'priority' => 10,
        ]
    ); 

    new \Kirki\Field\textarea(
        [
            'settings'    => 'footer_top_cta_content',
            'label'       => esc_html__( 'Footer Cta Content', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => esc_html__( 'Feel free to customize this paragraph to better reflect the
specific services offered by your IT solution & the unique', 'recrute' ),
            'priority' => 10,
        ]
    ); 


    new \Kirki\Field\Image(
        [
            'settings'    => 'cta_bg_image',
            'label'       => esc_html__( 'CTA BG Image', 'recrute' ),
            'description' => esc_html__( 'Cta BG Image add/remove', 'recrute' ),
            'section'     => 'footer_layout_section',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'cta_bg_color',
            'label'       => __( 'CTA BG Color', 'recrute' ),
            'description' => esc_html__( 'You can change CTA bg color from here.', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => '',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'cta_image',
            'label'       => esc_html__( 'CTA Image', 'recrute' ),
            'description' => esc_html__( 'Cta Image add/remove', 'recrute' ),
            'section'     => 'footer_layout_section',
        ]
    );

    new \Kirki\Field\textarea(
        [
            'settings'    => 'footer_top_cta_subscribe',
            'label'       => esc_html__( 'Footer Cta Subscribe', 'recrute' ),
            'section'     => 'footer_layout_section',
            'default'     => esc_html__( ' ', 'recrute' ),
            'priority' => 10,
        ]
    ); 


}
footer_layout_section();

// blog_section
function blog_section(){
    // blog_section section 
    new \Kirki\Section(
        'blog_section',
        [
            'title'       => esc_html__( 'Blog Section', 'recrute' ),
            'description' => esc_html__( 'Blog Section Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'recrute_blog_btn_switch',
            'label'       => esc_html__( 'Blog BTN On/Off', 'recrute' ),
            'section'     => 'blog_section',
            'default'     => true,
            'priority' => 10,
        ]
    ); 

    // blog_section BTN 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'recrute_blog_cat',
            'label'    => esc_html__( 'Blog Category Meta On/Off', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => false,
            'priority' => 10,
        ]
    );

    // blog_section Author Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'recrute_blog_author',
            'label'    => esc_html__( 'Blog Author Meta On/Off', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );
    // blog_section Date Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'recrute_blog_date',
            'label'    => esc_html__( 'Blog Date Meta On/Off', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );

    // blog_section Comments Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'recrute_blog_comments',
            'label'    => esc_html__( 'Blog Comments Meta On/Off', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );


    // blog_section Blog BTN text 
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_blog_btn',
            'label'    => esc_html__( 'Blog Button Text', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => "Read More",
            'priority' => 10,
        ]
    );



    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'recrute_singleblog_social',
            'label'    => esc_html__( 'Single Blog Social Share', 'recrute' ),
            'section'  => 'blog_section',
            'default'  => false,
            'priority' => 10,
        ]
    );

}
blog_section();


// 404 section
function error_404_section(){
    // 404_section section 
    new \Kirki\Section(
        'error_404_section',
        [
            'title'       => esc_html__( '404 Page', 'recrute' ),
            'description' => esc_html__( '404 Page Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );


    // 404_section 
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_error_title',
            'label'    => esc_html__( 'Not Found Title', 'recrute' ),
            'section'  => 'error_404_section',
            'default'  => "Sorry We Can't Find That Page! ",
            'priority' => 10,
        ]
    );

    // 404_section 
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_error_404',
            'label'    => esc_html__( 'Not Found 404', 'recrute' ),
            'section'  => 'error_404_section',
            'default'  => "404",
            'priority' => 10,
        ]
    );
    // 404_section 
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_error_text',
            'label'    => esc_html__( 'Not Found 404', 'recrute' ),
            'section'  => 'error_404_section',
            'default'  => "Oops! The page you are looking for does not exist. It might have been moved or deleted.",
            'priority' => 10,
        ]
    );




    // 404_section description
    new \Kirki\Field\Text(
        [
            'settings' => 'recrute_error_link_text',
            'label'    => esc_html__( 'Error Link Text', 'recrute' ),
            'section'  => 'error_404_section',
            'default'  => "Back To Home",
            'priority' => 10,
        ]
    );


}
error_404_section();

// theme color section
function theme_color_section(){
    new \Kirki\Section(
        'theme_color_section',
        [
            'title'       => esc_html__( 'Theme Color', 'recrute' ),
            'description' => esc_html__( 'recrute theme color Settings.', 'recrute' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_body',
            'label'       => __( 'Body Text Color', 'recrute' ),
            'description' => esc_html__( 'Theme body text color control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#77787b',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_heading_color_1',
            'label'       => __( 'Heading Color 1', 'recrute' ),
            'description' => esc_html__( 'Theme Heading color 1 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#081120',
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_heading_color_2',
            'label'       => __( 'Heading Color ', 'recrute' ),
            'description' => esc_html__( 'Theme Heading color 2 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#19326A',
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_heading_color_3',
            'label'       => __( 'Heading Color 3', 'recrute' ),
            'description' => esc_html__( 'Theme Heading color 3 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#001431',
        ]
    );
    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_common_color_1',
            'label'       => __( 'Common Color 1', 'recrute' ),
            'description' => esc_html__( 'Theme Common color 1 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#5957E5',
        ]
    );


    
    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_pera_color_1',
            'label'       => __( 'Peragraph Color 1', 'recrute' ),
            'description' => esc_html__( 'Theme peragraph color 1 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#CCCCD5',
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_pera_color_2',
            'label'       => __( 'Peragraph Color 2', 'recrute' ),
            'description' => esc_html__( 'Theme peragraph color 2 control.', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#5A5F6A',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_white_color',
            'label'       => __( 'White Color', 'recrute' ),
            'description' => esc_html__( 'White color control', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#ffffff',
        ]
    );



    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_1',
            'label'       => __( 'Background Color 1', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 1', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FF7A01',
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_2',
            'label'       => __( 'Background Color 2', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 1', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FC253F',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_3',
            'label'       => __( 'Background Color 3', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 3', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FD965B',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_4',
            'label'       => __( 'Background Color 4', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 4', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#23342E',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_5',
            'label'       => __( 'Background Color 5', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 5', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#19326A',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_6',
            'label'       => __( 'Background Color 6', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 6', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#52B5E9',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_7',
            'label'       => __( 'Background Color 7', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 7', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FFF2E6',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_8',
            'label'       => __( 'Background Color 8', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 8', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#F5F3F4',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_9',
            'label'       => __( 'Background Color 9', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 9', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#28284D',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_10',
            'label'       => __( 'Background Color 10', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 10', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FFFAEC',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_11',
            'label'       => __( 'Background Color 11', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 11', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#FFF4EF',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_12',
            'label'       => __( 'Background Color 12', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 12', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#E9EBEA',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_13',
            'label'       => __( 'Background Color 13', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 13', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#ECF3F6',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_14',
            'label'       => __( 'Background Color 14', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 1', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#E5E7EA',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_15',
            'label'       => __( 'Background Color 15', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 15', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#F2F4F7',
        ]
    );
    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_16',
            'label'       => __( 'Background Color 16', 'recrute' ),
            'description' => esc_html__( 'Background Color Control 16', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#5957E5',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_bg_color_white',
            'label'       => __( 'Background Color White', 'recrute' ),
            'description' => esc_html__( 'White Background Color Control ', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#ffffff',
        ]
    );



    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_border_color_1',
            'label'       => __( 'Border Color 1', 'recrute' ),
            'description' => esc_html__( 'Border Color Control 1', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#f0f0f0',
        ]
    );


    new \Kirki\Field\Color(
        [
            'settings'    => 'recrute_border_color_2',
            'label'       => __( 'Border Color 2', 'recrute' ),
            'description' => esc_html__( 'Border Color Control 2', 'recrute' ),
            'section'     => 'theme_color_section',
            'default'     => '#dfdcdc',
        ]
    );





}
theme_color_section();