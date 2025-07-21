<?php
namespace VLcore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class VL_hero extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-hero';
	}

	public function get_title() {
		return __( 'VL Hero', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_hero' ];
	}


	protected function register_controls() {

        // layout Panel
        $this->start_controls_section(
            'vl_layout',
            [
                'label' => esc_html__('Design Layout', 'vlcore'),
            ]
        );
        $this->add_control(
            'vl_design_style',
            [
                'label' => esc_html__('Select Layout', 'vlcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'vlcore'),
                    'layout-2' => esc_html__('Layout 2', 'vlcore'),
                    'layout-3' => esc_html__('Layout 3', 'vlcore'),
                    'layout-4' => esc_html__('Layout 4', 'vlcore'),
                    'layout-5' => esc_html__('Layout 5', 'vlcore'),
                    'layout-6' => esc_html__('Layout 6', 'vlcore'),
                    'layout-7' => esc_html__('Layout 7', 'vlcore'),
                    'layout-8' => esc_html__('Layout 8', 'vlcore'),
                    'layout-9' => esc_html__('Layout 9', 'vlcore'),
                    'layout-10' => esc_html__('Layout 10', 'vlcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // Hero Contents
        $this->start_controls_section(
          'vl_hero_contents',
          [
              'label' => esc_html__('Content', 'vlcore'),
          ]
      );

      $this->add_control(
          'vl_hero_title',
          [
               'label' => esc_html__( 'Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Growth Exceptional Talent Lets Build Success Together', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_hero_sub_title',
          [
               'label' => esc_html__( 'Sub Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Staffing Power Your Success', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_hero_sub_title_icon',
          [
               'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $this->add_control(
          'vl_hero_content',
          [
               'label' => esc_html__( 'Description', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'rows' => 10,
               'default' => esc_html__( 'Our tailored staffing solutions streamline the hiring process saving you time and resources while ensuring the perfect fit.', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your description here', 'vlcore' ),
          ]
     );
     

        $this->end_controls_section();

        // Hero Buttons
        $this->start_controls_section(
          'vl_hero_buttons',
               [
               'label' => esc_html__('Buttons', 'vlcore'),
               ]
          );

          $this->add_control(
               'vl_hero_button_1_text',
               [
                    'label' => esc_html__( 'Button 1 Text', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Start Your Search  ', 'vlcore' ),
                    'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
               ]
          );

          $this->add_control(
			'vl_hero_button_1_url',
			[
				'label' => esc_html__( 'Link 1', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

          $this->add_control(
			'hero_btn_1_icon_show',
			[
				'label' => esc_html__( 'Button 1 Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);



          $this->add_control(
               'vl_hero_button_2_text',
               [
                    'label' => esc_html__( 'Button 2 Text', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Start Your Search  ', 'vlcore' ),
                    'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
               ]
          );

          $this->add_control(
			'vl_hero_button_2_url',
			[
				'label' => esc_html__( 'Link 2', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

          $this->add_control(
			'hero_btn_2_icon_show',
			[
				'label' => esc_html__( 'Button 2 Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();


         // Hero Images
         $this->start_controls_section(
          'vl_hero_images',
               [
               'label' => esc_html__('Images', 'vlcore'),
               ]
          );

          $this->add_control(
			'hero_main_image',
			[
				'label' => esc_html__( 'Main Image', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'hero_element_image_1',
			[
				'label' => esc_html__( 'Element 1', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_element_image_2',
			[
				'label' => esc_html__( 'Element 2', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_element_image_3',
			[
				'label' => esc_html__( 'Element 3', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_element_image_4',
			[
				'label' => esc_html__( 'Element 4', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_element_image_5',
			[
				'label' => esc_html__( 'Element 5', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
          'vl_hero_review',
               [
                    'label' => esc_html__('Review', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => 'layout-2'
                    ]
               ]
          );

          $this->add_control(
			'review_text',
			[
				'label' => esc_html__( 'Review Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Trusted By 5,789 Users', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'review_text2',
			[
				'label' => esc_html__( 'Satisfied Clients', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '4K Happy Client', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'hero_review_shape_1',
			[
				'label' => esc_html__( 'Review Shape', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


        $this->end_controls_section();


        $this->start_controls_section(
          'vl_hero_video',
               [
                    'label' => esc_html__('Video', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => 'layout-2'
                    ]
               ]
          );

          $this->add_control(
			'hero_video_bg',
			[
				'label' => esc_html__( 'Video BG', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'vl_hero_video_url',
			[
				'label' => esc_html__( 'Video Url', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
          'vl_hero_shapes',
               [
                    'label' => esc_html__('Shapes', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => ['layout-3', 'layout-5'],
                    ]
               ]
          );

          $this->add_control(
			'hero_shape_1',
			[
				'label' => esc_html__( 'Shape 1', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_shape_2',
			[
				'label' => esc_html__( 'Shape 2', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
          $this->add_control(
			'hero_shape_3',
			[
				'label' => esc_html__( 'Shape 3', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
          'vl_hero_slider',
               [
                    'label' => esc_html__('Slider', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => ['layout-10'],
                    ]
               ]
          );

          $repeater_slider = new \Elementor\Repeater();

          $repeater_slider->add_control(
			'slide_bg',
			[
				'label' => esc_html__( 'BG Image', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $repeater_slider->add_control(
			'slide_sub_title_icon',
			[
				'label' => esc_html__( 'Sub Title Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $repeater_slider->add_control(
			'slider_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'vlcore' ),
				'label_block' => true,
			]
		);

		$repeater_slider->add_control(
			'slide_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'vlcore' ),
				'label_block' => true,
			]
		);

		$repeater_slider->add_control(
			'slide_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Content' , 'vlcore' ),
				'show_label' => false,
			]
		);

          $repeater_slider->add_control(
			'slide_button_text',
			[
				'label' => esc_html__( 'Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Started' , 'vlcore' ),
				'label_block' => true,
			]
		);

          $repeater_slider->add_control(
			'slide_button_url',
			[
				'label' => esc_html__( 'Link', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);


		$this->add_control(
			'slides_content',
			[
				'label' => esc_html__( 'Slides', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater_slider->get_controls(),
				'default' => [
					[
						'slide_title' => esc_html__( 'Slide #1', 'vlcore' ),
						'slide_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'vlcore' ),
					],
					[
						'slide_title' => esc_html__( 'Slide #2', 'vlcore' ),
						'slide_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'vlcore' ),
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);


        $this->end_controls_section();


     //    Style Controlls Start

        $this->start_controls_section(
          'hero_content_style_section',
          [
               'label' => esc_html__( 'Content', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
               'name' => 'hero_sub_title_typography',
               'selector' => '{{WRAPPER}} .main-heading span.span',
          ]
     );

     $this->add_control(
          'hero_sub_title_color',
          [
               'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .main-heading span.span' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'subtitle_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .main-heading span.span',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'hero_title_typography',
               'selector' => '{{WRAPPER}} .main-heading h1',
          ]
     );
     
     $this->add_control(
          'hero_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .main-heading h1' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Content Typography', 'vlcore' ),
               'name' => 'hero_content_typography',
               'selector' => '{{WRAPPER}} .main-heading p',
          ]
     );
     
     $this->add_control(
          'hero_content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .main-heading p' => 'color: {{VALUE}}',
               ],
          ]
     );


        $this->end_controls_section();

        $this->start_controls_section(
          'hero_button_style_section',
          [
               'label' => esc_html__( 'Buttons', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'vl_hero_style_tabs'
     );
     
     $this->start_controls_tab(
          'vl_hero_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Button 1 Typography', 'vlcore' ),
               'name' => 'btn_1_typo',
               'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn13, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn10, {{WRAPPER}} .theme-btn4',
          ]
     );

     $this->add_control(
          'hero_btn_1_color',
          [
               'label' => esc_html__( 'Button 1 Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .theme-btn1' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn10' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn11' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn13' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn14' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn15' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn16' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'btn_1_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn13, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn10, {{WRAPPER}} .theme-btn4',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Button 2 Typography', 'vlcore' ),
               'name' => 'btn_2_typo',
               'selector' => '{{WRAPPER}} .theme-btn2, {{WRAPPER}} .theme-btn7, {{WRAPPER}} .theme-btn9, {{WRAPPER}} .theme-btn5',
          ]
     );

     $this->add_control(
          'hero_btn_2_color',
          [
               'label' => esc_html__( 'Button 2 Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .theme-btn2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn7' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn9' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn5' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'btn_2_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .theme-btn2, {{WRAPPER}} .theme-btn7, {{WRAPPER}} .theme-btn9, {{WRAPPER}} .theme-btn5',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
               'label' => esc_html__( 'Button 2 Border', 'vlcore' ),
               'name' => 'button_2_border',
               'selector' => '{{WRAPPER}} .theme-btn2, {{WRAPPER}} .theme-btn7, {{WRAPPER}} .theme-btn9, {{WRAPPER}} .theme-btn5',
          ]
     );

     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'vl_hero_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );


     $this->add_control(
          'hero_btn_1_hover_color',
          [
               'label' => esc_html__( 'Button 1 Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .theme-btn1:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn6:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn10:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn4:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn11:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn13:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn14:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn15:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn16:hover' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'btn_1_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .theme-btn16:hover, {{WRAPPER}} .theme-btn15:hover, {{WRAPPER}} .theme-btn14:hover, {{WRAPPER}} .theme-btn13:hover, {{WRAPPER}} .theme-btn11:hover, {{WRAPPER}} .theme-btn1::after, {{WRAPPER}} .theme-btn1::before, {{WRAPPER}} .theme-btn6::before, {{WRAPPER}} .theme-btn6::after, {{WRAPPER}} .theme-btn10::before, {{WRAPPER}} .theme-btn10::after, {{WRAPPER}} .theme-btn4::after',
          ]
     );


     $this->add_control(
          'hero_btn_2_hover_color',
          [
               'label' => esc_html__( 'Button 2 Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .theme-btn2:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn7:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn9:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme-btn5:hover' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'btn_2_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .theme-btn5::after, {{WRAPPER}} .theme-btn2::after, {{WRAPPER}} .theme-btn2::before, {{WRAPPER}} .theme-btn7::after, {{WRAPPER}} .theme-btn7::before, {{WRAPPER}} .theme-btn9::after, {{WRAPPER}} .theme-btn9::before',
          ]
     );

     
     $this->end_controls_tab();
     
     $this->end_controls_tabs();



     $this->end_controls_section();



	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>

     <?php if($settings['vl_design_style'] == 'layout-1') : ?>
     <div class="hero-area1">
          <div class="container">
               <div class="row align-items-center">
                    <div class="col-lg-6">
                         <div class="main-heading">

                              <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                              <span class="span" data-aos="fade-right" data-aos-duration="800"><?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                              <?php endif; ?>

                              <?php if (!empty($settings['vl_hero_title'])): ?>
                              <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                              <?php endif; ?>

                              <?php if(!empty($settings['vl_hero_content'])): ?>
                              <div class="space16"></div>
                              <p data-aos="fade-right" data-aos-duration="1000"><?php echo esc_html( $settings['vl_hero_content'] ); ?></p>
                              <?php endif; ?>

                              <?php if(!empty($settings['vl_hero_button_1_text'] || $settings['vl_hero_button_2_text'])): ?>
                              <div class="space30"></div>
                              <div class="hero1-buttons" data-aos="fade-right" data-aos-duration="1200">
                                   
                                   <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                                   <a class="theme-btn1" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>">
                                        <?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                                        <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                                        <span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                        <?php endif; ?>
                                   </a>
                                   <?php endif; ?>
                                   
                                   <?php if(!empty($settings['vl_hero_button_2_text'])) : ?>
                                   <a class="theme-btn2" href="<?php echo esc_url($settings['vl_hero_button_2_url']['url']); ?>">
                                        <?php echo esc_html($settings['vl_hero_button_2_text']); ?> 
                                        <?php if($settings['hero_btn_2_icon_show'] == 'yes'): ?>
                                        <span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                        <?php endif; ?>
                                   </a>
                                   <?php endif; ?>
                              </div>
                              <?php endif; ?>

                         </div>
                    </div>

                    <div class="col-lg-6">

                         <div class="hero1-images">

                              <?php if(!empty($settings['hero_main_image']['url'])): ?>
                              <div class="image1">
                                   <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                              <div class="image2 overlay-anim" data-aos="zoom-in-up" data-aos-duration="700">
                                   <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                              <div class="image3 shape-animaiton2" data-aos="zoom-in-up" data-aos-duration="700">
                                   <img src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['hero_element_image_3']['url'])): ?>
                              <div class="image4 shape-animaiton3">
                                   <img src="<?php echo esc_url($settings['hero_element_image_3']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>

                         </div>

                    </div>
               </div>
          </div>
     </div>

<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>
<div class="hero-area3">
     <div class="container">
          <div class="row">
               <div class="col-lg-6">
                    <div class="main-heading">

                          <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-right" data-aos-duration="700"><?php echo esc_html( $settings['vl_hero_sub_title'] ); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html( $settings['vl_hero_title'] ); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="700"><?php echo esc_html( $settings['vl_hero_content'] ); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'] || $settings['vl_hero_button_2_text'])): ?>
                         <div class="space30"></div>
                         <div class="buttons" data-aos="fade-right" data-aos-duration="900">

                              <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                              <a class="theme-btn6" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html( $settings['vl_hero_button_1_text'] ); ?> 
                              <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                              <span><i class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                              <?php endif; ?>
                              <?php if(!empty($settings['vl_hero_button_2_text'])): ?>
                              <a class="theme-btn7" href="<?php echo esc_url($settings['vl_hero_button_2_url']['url']); ?>"><?php echo esc_html( $settings['vl_hero_button_2_text'] ); ?> 
                              <?php if($settings['hero_btn_2_icon_show'] == 'yes'): ?>
                              <span><i  class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                              <?php endif; ?>
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['review_text'])): ?>
                         <div class="reating-area" data-aos="fade-right" data-aos-duration="1100">

                              <?php if(!empty($settings['review_text'])): ?>
                              <p class="pera"><?php echo esc_html($settings['review_text']); ?></p>
                              <?php endif; ?>

                              <div class="reating">
                                   <div class="stars">
                                        <ul>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                   </div>
                                   <?php if(!empty($settings['review_text2'])): ?>
                                   <div class="reating-h">
                                        <p><?php echo esc_html($settings['review_text']); ?></p>
                                   </div>
                                   <?php endif; ?>
                              </div>
                         </div>
                              <?php if(!empty($settings['hero_review_shape_1'])): ?>
                              <img class="arrow-shape" src="<?php echo esc_url($settings['hero_review_shape_1']['url']); ?>" alt="">
                              <?php endif; ?>

                         <?php endif; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="images-all">
                         <div class="row">

                              <?php if(!empty($settings['hero_main_image']['url'])): ?>
                              <div class="col-md-7">
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                                   </div>
                              </div>
                              <?php endif; ?>

                              
                              <div class="col-md-5">
                                   <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>
                                   <?php if(!empty($settings['hero_video_bg']['url'])): ?>
                                   <div class="space30"></div>
                                   <div class="image video-area">
                                        <img src="<?php echo esc_url($settings['hero_video_bg']['url']); ?>" alt="">
                                        <div class="video-buttton play-btn"
                                             href="<?php echo esc_url($settings['vl_hero_video_url']['url']); ?>">
                                             <a id="play-video play-btn" class="video-play-button">
                                                  <span></span>
                                             </a>
                                        </div>
                                   </div>
                                   <?php endif; ?>
                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>
<div class="hero-area4"  style="padding-bottom: 20px;margin-bottom: -120px;">
     <div class="container _relative">
          <div class="row">
               <div class="col-lg-8 m-auto text-center">
                    <div class="main-heading" style="padding-top: 20px;padding-bottom: 20px;">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-right" data-aos-duration="700"><?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>
                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800"> <?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'] || $settings['vl_hero_button_2_text'])): ?>
                         <div class="space30"></div>
                         <div class="buttons" data-aos="fade-left" data-aos-duration="1200">

                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <a class="theme-btn10" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                         <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                         <span><i  class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_2_text'])) : ?>
                         <a class="theme-btn9" href="<?php echo esc_url($settings['vl_hero_button_2_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_2_text']); ?> 
                         <?php if($settings['hero_btn_2_icon_show'] == 'yes'): ?>
                         <span><i  class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>

          <div class="row d-none d-lg-block">
               <div class="col-lg-12">
                    <div class="images-all">

                         <?php if(!empty($settings['hero_main_image']['url'])): ?>
                         <div class="image1 animate1 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                         <div class="image2 animate2 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                         <div class="image3 animate3 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_3']['url'])): ?>
                         <div class="image4 animate4 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_3']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>

          <div class="row d-lg-block d-lg-none">
               <div class="row images-all-md">

                    <?php if(!empty($settings['hero_main_image']['url'])): ?>
                    <div class="col-md-6">
                         <div class="image1 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                    <div class="col-md-6">
                         <div class="image2 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                    <div class="col-md-6">
                         <div class="image3 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
                         </div>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($settings['hero_element_image_3']['url'])): ?>
                    <div class="col-md-6">
                         <div class="image4 overlay-anim">
                              <img src="<?php echo esc_url($settings['hero_element_image_3']['url']); ?>" alt="">
                         </div>
                    </div>
                    <?php endif; ?>

               </div>
          </div>

          <div class="shape-all-area">
               <div class="icon">
                    <a href="#about"><i class="fa-regular fa-arrow-down"></i></a>
               </div>
               <?php if(!empty($settings['hero_shape_1']['url'])): ?>
               <img src="<?php echo esc_url($settings['hero_shape_1']['url']); ?>" alt="" class="shape shape-animaiton4">
               <?php endif; ?>
          </div>
          <?php if(!empty($settings['hero_shape_2']['url'])): ?>
          <img class="shape2 shape-animaiton4" src="<?php echo esc_url($settings['hero_shape_2']['url']); ?>" alt="">
          <?php endif; ?>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-4') : ?>
<div class="hero-area5">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="main-heading">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-right" data-aos-duration="700"><?php echo esc_html($settings['vl_hero_sub_title']); ?> </span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800"><?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'] || $settings['vl_hero_button_2_text'])): ?>
                         <div class="space30"></div>
                         <div class="hero2-buttons" data-aos="fade-left" data-aos-duration="900">
                              
                              <?php if(!empty($settings['vl_hero_button_1_text'])) : ?>
                              <a class="theme-btn4" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                              <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                              <span><i  class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                              <?php endif; ?>
                              
                              <?php if(!empty($settings['vl_hero_button_2_text'])) : ?>
                              <a class="theme-btn5" href="<?php echo esc_url($settings['vl_hero_button_2_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                              <?php if($settings['hero_btn_2_icon_show'] == 'yes'): ?>
                              <span><i  class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                              <?php endif; ?>

                         </div>
                         <?php endif; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="images-all">

                         <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                         <div class="image1">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_main_image']['url'])): ?>
                         <div class="image2">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
     <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
     <img class="shape" src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
     <?php endif; ?>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-5') : ?>
<div class="hero-area2">
     <div class="container">
          <div class="row">
               <div class="col-lg-6">
                    <div class="main-heading">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"> <?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800"><?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'] || $settings['vl_hero_button_2_text'])): ?>
                         <div class="space30"></div>
                         <div class="hero2-buttons" data-aos="fade-left" data-aos-duration="1000">

                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <a class="theme-btn4" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                         <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                         <span><i class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_2_text'])): ?>
                         <a class="theme-btn5" href="<?php echo esc_url($settings['vl_hero_button_2_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_2_text']); ?> 
                         <?php if($settings['hero_btn_2_icon_show'] == 'yes'): ?>
                         <span><i class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                         </div>
                         <?php endif; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="images">

                         <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                         <div class="image1" data-aos="zoom-in-up" data-aos-duration="700">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_main_image']['url'])): ?>
                         <div class="image2" data-aos="zoom-in-up" data-aos-duration="800">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                         <div class="image3 animate4">
                              <img src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>

     <?php if(!empty($settings['hero_shape_1']['url'])): ?>
     <img class="shape1 animate1" src="<?php echo esc_url($settings['hero_shape_1']['url']); ?>" alt="">
     <?php endif; ?>

     <?php if(!empty($settings['hero_shape_2']['url'])): ?>
     <img class="shape2 animate2" src="<?php echo esc_url($settings['hero_shape_2']['url']); ?>" alt="">
     <?php endif; ?>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-6') : ?>
<div class="hero6">
     <div class="container">
          <div class="row">
               <div class="col-lg-5">
                    <div class="main-heading">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><?php if(!empty($settings['vl_hero_sub_title_icon']['url'])): ?><img src="<?php echo esc_url($settings['vl_hero_sub_title_icon']['url']); ?>" alt=""><?php endif; ?> <?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p><?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>
                         
                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <div class="space30"></div>
                         <a class="theme-btn11" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                         <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                         <span><i  class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-7">
                    <div class="images-all" data-aos="zoom-out" data-aos-duration="800">

                         <?php if(!empty($settings['hero_main_image']['url'])): ?>
                         <div class="image1">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                         <div class="image2">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-7') : ?>
<div class="hero7">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-5">
                    <div class="main-heading">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><?php if(!empty($settings['vl_hero_sub_title_icon']['url'])): ?><img src="<?php echo esc_url($settings['vl_hero_sub_title_icon']['url']); ?>" alt=""><?php endif; ?> <?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p><?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <div class="space30"></div>
                         <a class="theme-btn13" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?></a>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-7">
                    <div class="hero7-images">
                         <div class="cs_height_118 cs_height_lg_70"></div>
                         <div class="cs_case_study_1_list">

                              <?php if(!empty($settings['hero_main_image']['url'])): ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active active">
                                   <div style="background-image: url(<?php echo esc_url($settings['hero_main_image']['url']); ?>);" class="cs_case_study_thumb cs_bg_filed" data-src="<?php echo esc_url($settings['hero_main_image']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active">
                                   <div style="background-image: url(<?php echo esc_url($settings['hero_element_image_1']['url']); ?>);" class="cs_case_study_thumb cs_case_study_thumb2 cs_bg_filed"  data-src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active">
                                   <div style="background-image: url(<?php echo esc_url($settings['hero_element_image_2']['url']); ?>);" class="cs_case_study_thumb cs_case_study_thumb3 cs_bg_filed"  data-src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                         </div>
                         <?php if(!empty($settings['hero_element_image_3']['url'])): ?>
                         <img src="<?php echo esc_url($settings['hero_element_image_3']['url']); ?>" alt="" class="shape shape-animaiton4">
                         <?php endif; ?>
                         
                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-8') : ?>
<div class="hero8">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading">
                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><?php if(!empty($settings['vl_hero_sub_title_icon']['url'])): ?><img src="<?php echo esc_url($settings['vl_hero_sub_title_icon']['url']); ?>" alt=""> <?php endif; ?><?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <div class="space30"></div>
                         <a class="theme-btn14" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?></a>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_2']['url'])): ?>
                         <div class="shape animate3">
                              <img src="<?php echo esc_url($settings['hero_element_image_2']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
     <?php if(!empty($settings['hero_main_image']['url'])): ?>
     <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="" class="image1">
     <?php endif; ?>

     <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
     <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="" class="image2">
     <?php endif; ?>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-9') : ?>
<div class="hero9">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="main-heading">

                         <?php if(!empty($settings['vl_hero_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><?php if(!empty($settings['vl_hero_sub_title_icon']['url'])): ?><img src="<?php echo esc_url($settings['vl_hero_sub_title_icon']['url']); ?>" alt=""><?php endif; ?> <?php echo esc_html($settings['vl_hero_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_title'])): ?>
                         <h1 class="text-anime-style-3"><?php echo esc_html($settings['vl_hero_title']); ?></h1>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_content'])): ?>
                         <div class="space16"></div>
                         <p><?php echo esc_html($settings['vl_hero_content']); ?></p>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_hero_button_1_text'])): ?>
                         <div class="space30"></div>
                         <a class="theme-btn15" href="<?php echo esc_url($settings['vl_hero_button_1_url']['url']); ?>"><?php echo esc_html($settings['vl_hero_button_1_text']); ?> 
                         <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                         <span><i class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="main-images">

                         <?php if(!empty($settings['hero_main_image']['url'])): ?>
                         <div class="image1" data-aos="zoom-out" data-aos-duration="800">
                              <img src="<?php echo esc_url($settings['hero_main_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['hero_element_image_1']['url'])): ?>
                         <div class="image2" data-aos="flip-right" data-aos-duration="800">
                              <img src="<?php echo esc_url($settings['hero_element_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-10') : ?>
<div class="_relative">
     <div style="margin-top: -100px;" class="hero10-sliders">

          <?php if(!empty($settings['slides_content'])): ?>
          
          <?php foreach($settings['slides_content'] as $slide_content) : ?>

               <div class="hero10-single" style="background:url(<?php echo esc_url($slide_content['slide_bg']['url']); ?>); background-position:center center; background-size:cover; background-repeat: no-repeat;">
                    <div class="hero10-overlay"></div>
                    <div class="container">
                         <div class="row">
                              <div class="col-lg-6 col-md-10">
                                   <div class="main-heading">
                                        
                                        <?php if(!empty($slide_content['slider_sub_title'])): ?>
                                        <span class="span"><img src="<?php echo esc_url($slide_content['slide_sub_title_icon']['url']); ?>" alt=""> <?php echo esc_html($slide_content['slider_sub_title']); ?></span>
                                        <?php endif; ?>

                                        <?php if(!empty($slide_content['slide_title'])): ?>
                                        <h1><?php echo esc_html($slide_content['slide_title']); ?></h1>
                                        <?php endif; ?>

                                        <?php if(!empty($slide_content['slide_content'])): ?>
                                        <div class="space16"></div>
                                        <p><?php echo esc_html($slide_content['slide_content']); ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty($slide_content['slide_button_text'])): ?>
                                        <div class="space30"></div>
                                        <div class="button">
                                             <a class="theme-btn16" href="<?php echo esc_url($slide_content['slide_button_url']['url']); ?>"><?php echo esc_html($slide_content['slide_button_text']); ?> 
                                             <?php if($settings['hero_btn_1_icon_show'] == 'yes'): ?>
                                             <span><i class="fa-solid fa-arrow-right"></i></span>
                                             <?php endif; ?>
                                             </a>
                                        </div>
                                        <?php endif; ?>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          <?php endforeach; ?>

          <?php endif; ?>

     </div>

     <div class="hero10-btns">
          <button class="hero10-next-arrow"><i class="fa-solid fa-arrow-left"></i></button>
          <button class="hero10-prev-arrow"><i class="fa-solid fa-arrow-right"></i></button>
     </div>
</div>

<?php endif; ?>


<?php

	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_hero() );