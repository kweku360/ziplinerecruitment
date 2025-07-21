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


class VL_testimonial extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-testimonial';
	}

	public function get_title() {
		return __( 'VL Testimonial', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_testimonial_script' ];
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

          // layout Panel
          $this->start_controls_section(
          'testimonial_heading_content',
               [
                    'label' => esc_html__('Heading', 'vlcore'),
               ]
          );

          $this->add_control(
			'vl_testimonial_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Testimonial', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'vl_testimonial_sub_title_icon',
			[
				'label' => esc_html__( 'Choose Sub Title Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'vl_testimonial_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Real Stories, Real Results ', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'vl_testimonial_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Discover why businesses trust us to find the right talent and candidates trust us to find the perfect fit. ', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);


     $this->end_controls_section();

     $this->start_controls_section(
          'testimonial_section_bg_area',
               [
                    'label' => esc_html__('Section Image', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => ['layout-5', 'layout-6'],
                    ]
               ]
          );

          $this->add_control(
			'testimonial_section_bg',
			[
				'label' => esc_html__( 'Background Imagge', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

     $this->end_controls_section();

     $this->start_controls_section(
          'testimonial_content',
               [
                    'label' => esc_html__('Content', 'vlcore'),
               ]
          );

          $testimonial_repeater = new \Elementor\Repeater();


          $testimonial_repeater->add_control(
			'vl_testimonial_quote',
			[
				'label' => esc_html__( 'Quote Image', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$testimonial_repeater->add_control(
			'vl_testimonial_name',
			[
				'label' => esc_html__( 'Name', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sujon M.' , 'vlcore' ),
				'label_block' => true,
			]
		);

          $testimonial_repeater->add_control(
			'vl_testimonial_image',
			[
				'label' => esc_html__( 'Author Image', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $testimonial_repeater->add_control(
			'vl_testimonial_position',
			[
				'label' => esc_html__( 'Position', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Software Engineer' , 'vlcore' ),
				'label_block' => true,
			]
		);

		$testimonial_repeater->add_control(
			'vl_testimonial_review',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Testimonial Review write here.' , 'vlcore' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'vl_testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_repeater->get_controls(),
				'default' => [
					[
						'vl_testimonial_name' => esc_html__( 'Sujon M.', 'vlcore' ),
						'vl_testimonial_position' => esc_html__( 'Software Engineer', 'vlcore' ),
					],
					[
						'vl_testimonial_name' => esc_html__( 'Sujon M.', 'vlcore' ),
						'vl_testimonial_position' => esc_html__( 'Software Engineer', 'vlcore' ),
					],
                         [
						'vl_testimonial_name' => esc_html__( 'Sujon M.', 'vlcore' ),
						'vl_testimonial_position' => esc_html__( 'Software Engineer', 'vlcore' ),
					],
                         [
						'vl_testimonial_name' => esc_html__( 'Sujon M.', 'vlcore' ),
						'vl_testimonial_position' => esc_html__( 'Software Engineer', 'vlcore' ),
					],
				],
				'title_field' => '{{{ vl_testimonial_name }}}',
			]
		);



     $this->end_controls_section();

     $this->start_controls_section(
          'testimonial_options',
               [
                    'label' => esc_html__('Options', 'vlcore'),
               ]
          );

          $this->add_control(
			'show_section_title',
			[
				'label' => esc_html__( 'Show Section Title? ', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->add_control(
			'show_author_box',
			[
				'label' => esc_html__( 'Show Author Box? ', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->add_control(
			'show_stars',
			[
				'label' => esc_html__( 'Show Stars? ', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->add_control(
			'show_arrows',
			[
				'label' => esc_html__( 'Show Arrows? ', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
          

     $this->end_controls_section();


     $this->start_controls_section(
          'section_title_style',
          [
               'label' => esc_html__( 'Section Title', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
               'name' => 'sub_title_typography',
               'selector' => '{{WRAPPER}} .heading2 span.span, {{WRAPPER}} .heading8 span.span, {{WRAPPER}} .heading7 span.span, {{WRAPPER}} .heading1 span, {{WRAPPER}} .heading3 span, {{WRAPPER}} .heading4 span.span2,  {{WRAPPER}} .heading6-w span.span',
          ]
     );
     $this->add_control(
          'subtitle_color',
          [
               'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} heading4 span.span2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading6-w span.span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading7 span.span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading8 span.span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading2 span.span' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'subtitle_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .heading2 span.span, {{WRAPPER}} .heading8 span.span, {{WRAPPER}} .heading7 span.span, {{WRAPPER}} .heading1 span, {{WRAPPER}} .heading3 span, {{WRAPPER}} .heading4 span.span2, {{WRAPPER}} .heading6-w span.span',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'title_typography',
               'selector' => '{{WRAPPER}} .heading2 h2, {{WRAPPER}} .heading8 h2, {{WRAPPER}} .heading7 h2, {{WRAPPER}} .heading1 h2, {{WRAPPER}} .heading3 h2, {{WRAPPER}} .heading4 h2, {{WRAPPER}} .heading6-w h2',
          ]
     );
     $this->add_control(
          'title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading6-w h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading7 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading8 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading2 h2' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Content Typography', 'vlcore' ),
               'name' => 'content_typography',
               'selector' => '{{WRAPPER}} .heading1 p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .heading4 p',
          ]
     );
     $this->add_control(
          'content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_section();

     $this->start_controls_section(
          'repeater_style',
          [
               'label' => esc_html__( 'Testimonial Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'testimonial_box_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .testimonial-page .single-slider, {{WRAPPER}} .tes8-slider-area, {{WRAPPER}} .testimonial3-slider-content-area, {{WRAPPER}} .tes6-all-slider .single-slider, {{WRAPPER}} .tes1-slider .single-slider, {{WRAPPER}} .single-slider .single-slider-content, {{WRAPPER}} .tes4-slider .single-slider',
          ]
     );


     $this->add_control(
          'star_color',
          [
               'label' => esc_html__( 'Star Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .single-slider ul.stars li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider-content ul.stars li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes4 ul.stars li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes6-all-slider .single-slider .stars li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial3-slider-content-area .testimonial3-author-area ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider ul.stars li' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'testimonial_star_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .single-slider ul.stars li, {{WRAPPER}} .testimonial3-slider-content-area .testimonial3-author-area ul li a, {{WRAPPER}} .single-slider ul.stars li, {{WRAPPER}} .single-slider-content ul.stars li, {{WRAPPER}} .tes4 ul.stars li',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Name Typography', 'vlcore' ),
               'name' => 'name_typography',
               'selector' => '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider .bottom-area .heading-bottom h5, {{WRAPPER}} .heading1 h4 a, {{WRAPPER}} .single-slider .bottom-area .heading h5 a, {{WRAPPER}} .testimonial3-slider-content-area .testimonial3-man-info-area .man3-text a, {{WRAPPER}} .single-slider .bottom-area .heading a, {{WRAPPER}} .single-slider .bottom-heading h4 a, {{WRAPPER}} .heading3 h4 a, {{WRAPPER}} .heading4 h4 a',
          ]
     );

     $this->add_control(
          'name_color',
          [
               'label' => esc_html__( 'Name Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .single-slider .bottom-heading h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider .bottom-area .heading a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial3-slider-content-area .testimonial3-man-info-area .man3-text a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider .bottom-area .heading h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading1 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider .bottom-area .heading-bottom h5' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Position Typography', 'vlcore' ),
               'name' => 'position_typography',
               'selector' => '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider .bottom-area .heading-bottom h5 span, {{WRAPPER}} .single-slider .bottom-heading .heading1 p, {{WRAPPER}} .single-slider .bottom-area .heading span, {{WRAPPER}} .testimonial3-slider-content-area .testimonial3-man-info-area .man3-text p, {{WRAPPER}} .single-slider .bottom-area .heading p, {{WRAPPER}} .single-slider .bottom-heading p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .heading4 p',
          ]
     );

     $this->add_control(
          'position_color',
          [
               'label' => esc_html__( 'Position Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .single-slider .bottom-heading p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider .bottom-area .heading p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial3-slider-content-area .testimonial3-man-info-area .man3-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider .bottom-area .heading span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider .bottom-heading .heading1 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider .bottom-area .heading-bottom h5 span' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Review Typography', 'vlcore' ),
               'name' => 'review_typography',
               'selector' => '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider p, {{WRAPPER}} .tes8-slider-area .single-slider p, {{WRAPPER}} .testimonial3-slider-content-area p, {{WRAPPER}} .tes6-all-slider .single-slider p, {{WRAPPER}} .single-slider .pera p, {{WRAPPER}} .single-slider-content .pera p, {{WRAPPER}} .heading4 p',
          ]
     );

     $this->add_control(
          'review_color',
          [
               'label' => esc_html__( 'Review Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .single-slider .pera p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-slider-content .pera p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes6-all-slider .single-slider p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial3-slider-content-area p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes8-slider-area .single-slider p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes2 .tes2-slider .tes2-signle-slider p' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_section();


     $this->start_controls_section(
          'arrows_style',
          [
               'label' => esc_html__( 'Arrows', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'arrows_tabs'
     );
     
     $this->start_controls_tab(
          'arrows_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );
     $this->add_control(
          'arrows_normal_color',
          [
               'label' => esc_html__( 'Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .tes7-buttons button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes6 .arrows-button button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-sliders .testimonial-arrows2 button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes8-slider-area .arrows-button button' => 'color: {{VALUE}}',
               ],
          ]
     );
     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'arrows_normal_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .tes8-slider-area .arrows-button button, {{WRAPPER}} .testimonial-sliders .testimonial-arrows2 button, {{WRAPPER}} .tes7-buttons button, {{WRAPPER}} .tes6 .arrows-button button',
          ]
     );


     $this->end_controls_tab();

     $this->start_controls_tab(
          'arrows_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_control(
          'arrows_hoverl_color',
          [
               'label' => esc_html__( 'Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .tes7-buttons button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes6 .arrows-button button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-sliders .testimonial-arrows2 button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tes8-slider-area .arrows-button button:hover' => 'color: {{VALUE}}',
               ],
          ]
     );
     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'arrows_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .tes8-slider-area .arrows-button button:hover, {{WRAPPER}} .tes7-buttons button:hover, {{WRAPPER}} .testimonial-sliders .testimonial-arrows2 button:hover, {{WRAPPER}} .tes6 .arrows-button button:hover',
          ]
     );
     
     $this->end_controls_tab();
     
     $this->end_controls_tabs();


     $this->end_controls_section();


     $this->start_controls_section(
          'dots_style',
          [
               'label' => esc_html__( 'Dots', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'dots_style_tabs'
     );
     
     $this->start_controls_tab(
          'dots_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'dots_bg_normal',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .tes2 .owl-dots button',
          ]
     );

     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'dots_style_active_tab',
          [
               'label' => esc_html__( 'Active', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'dots_bg_active',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .tes2 .owl-dots button.active',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'dots_bg_border',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .tes2 .owl-dots button:after',
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

<div class="tes1 sp">
     <div class="container">
          <div class="row align-items-end">

               <div class="col-lg-6">

                    <?php if($settings['show_section_title'] == 'yes') : ?>
                    <div class="heading1">
                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="800"><?php echo esc_html($settings['vl_testimonial_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800">
                              <?php echo esc_html($settings['vl_testimonial_content']); ?></p>
                         <?php endif; ?>
                    </div>
                    <?php endif; ?>

               </div>


               <?php if($settings['show_arrows'] == 'yes') : ?>
               <div class="col-lg-6">
                    <div class="tes7-buttons" data-aos="fade-right" data-aos-duration="900">
                         <button class="testimonial-prev-arrow1"><i class="fa-regular fa-arrow-left"></i></button>
                         <button class="testimonial-next-arrow1"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>
               </div>
               <?php endif; ?>

          </div>

          <?php if(!empty($settings['vl_testimonials'])): ?>
          <div class="space30"></div>
          <div class="row">
               <div class="tes1-slider" data-aos="fade-up" data-aos-duration="900">

                    <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>

                    <div class="single-slider">
                         <div class="row">
                              <div class="col-md-8">

                                   <?php if($settings['show_stars'] == 'yes'): ?>
                                   <ul class="stars">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <?php endif; ?>

                                   <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                                   <div class="pera">
                                        <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                                   </div>
                                   <?php endif; ?>

                                   <?php if($settings['show_author_box'] == 'yes') : ?>
                                   <div class="bottom-heading">
                                        <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                        <h4><a
                                                  href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                        </h4>
                                        <?php endif; ?>
                                        <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                        <p><?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></p>
                                        <?php endif; ?>
                                   </div>
                                   <?php endif; ?>

                              </div>
                              <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                              <div class="col-md-4">
                                   <div class="tes1-image">
                                        <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                             alt="">
                                   </div>
                              </div>
                              <?php endif; ?>
                         </div>
                    </div>
                    <?php endforeach; ?>

               </div>
          </div>
          <?php endif; ?>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-2'): ?>

<div class="tes3 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">

                    <?php if($settings['show_section_title'] == 'yes') : ?>
                    <div class="heading3">
                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span" data-aos-duration="800"
                              data-aos="zoom-in-left"><?php echo esc_html($settings['vl_testimonial_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="900">
                              <?php echo esc_html($settings['vl_testimonial_content']); ?></p>
                         <?php endif; ?>

                    </div>
                    <?php endif; ?>
               </div>
               <?php if($settings['show_arrows'] == 'yes') : ?>
               <div class="col-lg-6">
                    <div class="tes7-buttons" data-aos="fade-left" data-aos-duration="800">
                         <button class="testimonial-prev-arrow1"><i class="fa-regular fa-arrow-left"></i></button>
                         <button class="testimonial-next-arrow1"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>
               </div>
               <?php endif; ?>
          </div>

          <?php if(!empty($settings['vl_testimonials'])): ?>
          <div class="space60"></div>
          <div class="row">
               <div class="tes1-slider" data-aos="fade-up" data-aos-duration="800">

                    <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
                    <div class="single-slider">
                         <div class="single-slider-content">
                              <?php if($settings['show_stars'] == 'yes'): ?>
                              <ul class="stars">
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                              </ul>
                              <?php endif; ?>
                              <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                              <div class="pera">
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                              </div>
                              <?php endif; ?>
                         </div>

                         <?php if($settings['show_author_box'] == 'yes') : ?>
                         <div class="bottom-heading">
                              <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                              <div class="image">
                                   <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                        alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading3">
                                   <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                   <h4><a href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                   </h4>
                                   <?php endif; ?>
                                   <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></p>
                                   <?php endif; ?>
                              </div>
                         </div>
                         <?php endif; ?>
                    </div>
                    <?php endforeach; ?>


               </div>
          </div>
          <?php endif; ?>

     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-3'): ?>

<div class="tes4 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <?php if($settings['show_section_title'] == 'yes') : ?>
                    <div class="heading4">

                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span2" data-aos="zoom-in-left"
                              data-aos-duration="800"><?php echo esc_html($settings['vl_testimonial_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="1100">
                              <?php echo esc_html($settings['vl_testimonial_content']); ?></p>
                         <?php endif; ?>

                    </div>
                    <?php endif; ?>
               </div>

               <?php if($settings['show_arrows'] == 'yes') : ?>
               <div class="col-lg-6">
                    <div class="tes7-buttons" data-aos="fade-up" data-aos-duration="800">
                         <button class="testimonial-prev-arrow1"><i class="fa-regular fa-arrow-left"></i></button>
                         <button class="testimonial-next-arrow1"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>
               </div>
               <?php endif; ?>
          </div>

          <?php if(!empty($settings['vl_testimonials'])): ?>
          <div class="space60"></div>
          <div class="row">
               <div class="tes4-slider" data-aos="fade-up" data-aos-duration="1000">

                    <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
                    <div class="single-slider">
                         <div class="single-slider-content heading4">
                              <?php if($settings['show_stars'] == 'yes'): ?>
                              <ul class="stars">
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                              </ul>
                              <?php endif; ?>

                              <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                              <div class="pera">
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                              </div>
                              <?php endif; ?>
                         </div>

                         <?php if($settings['show_author_box'] == 'yes') : ?>
                         <div class="bottom-heading">

                              <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                              <div class="image">
                                   <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                        alt="">
                              </div>
                              <?php endif; ?>

                              <div class="heading4">

                                   <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                   <h4><a href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                   </h4>
                                   <?php endif; ?>

                                   <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                         <?php endif; ?>
                    </div>
                    <?php endforeach; ?>


               </div>
          </div>
          <?php endif; ?>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-4'): ?>

<div class="tes6 sp">
     <div class="container">

          <div class="row align-items-center">
               <div class="col-lg-6">
                    <?php if($settings['show_section_title'] == 'yes') : ?>
                    <div class="heading6-w">

                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['vl_testimonial_sub_title_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['vl_testimonial_sub_title_icon']['url']); ?>"
                                   alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['vl_testimonial_sub_title']); ?>
                         </span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>

                    </div>
                    <?php endif; ?>

               </div>

               <?php if($settings['show_arrows'] == 'yes') : ?>
               <div class="col-lg-6">
                    <div class="arrows-button">
                         <button class="tes6-next-arrow"><i class="fa-solid fa-angle-left"></i></button>
                         <button class="tes6-prev-arrow"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
               </div>
               <?php endif; ?>
          </div>

          <?php if(!empty($settings['vl_testimonials'])): ?>
          <div class="space60"></div>
          <div class="row">
               <div class="col-lg-12">
                    <div class="tes6-all-slider" data-aos="fade-up" data-aos-duration="800">
                         <div class="tes6-slider">
                              <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>

                              <div class="single-slider">

                                   <?php if(!empty($vl_testimonial['vl_testimonial_quote']['url'])): ?>
                                   <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_quote']['url']); ?>"
                                        alt="" class="qute">
                                   <?php endif; ?>

                                   <?php if($settings['show_stars'] == 'yes'): ?>
                                   <div class="stars">
                                        <ul>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                             <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                                   <?php endif; ?>

                                   <?php if($settings['show_author_box'] == 'yes') : ?>
                                   <div class="bottom-area">

                                        <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                                        <div class="image">
                                             <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>

                                        <div class="heading">
                                             <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                             <a
                                                  href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                             <?php endif; ?>
                                             <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                             <p class="text">
                                                  <?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?>
                                             </p>
                                             <?php endif; ?>
                                        </div>
                                   </div>
                                   <?php endif; ?>

                              </div>

                              <?php endforeach; ?>
                         </div>
                    </div>

               </div>
          </div>
          <?php endif; ?>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-5'): ?>

<div class="testimonial4-section-area sp2 _relative">
     <div class="container">

          <?php if($settings['show_section_title'] == 'yes') : ?>
          <div class="row">
               <div class="col-lg-6 m-auto text-center">
                    <div class="heading7">

                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['vl_testimonial_sub_title_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['vl_testimonial_sub_title_icon']['url']); ?>"
                                   alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['vl_testimonial_sub_title']); ?>
                         </span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
          <?php endif; ?>

          <?php if(!empty($settings['vl_testimonials'])): ?>
          <div class="space60"></div>
          <div class="row">
               <div class="col-lg-12">

                    <?php if(!empty($settings['testimonial_section_bg']['url'])) : ?>
                    <div class="scetion-background">
                         <img src="<?php echo esc_url($settings['testimonial_section_bg']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>

                    <div class="testimonial-sliders">
                         <div class="row">
                              <div class="col-lg-2">
                              </div>
                              <div class="col-lg-8">
                                   <div class="slider-galeria" data-aos="fade-up" data-aos-duration="900">

                                        <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
                                        <div class="testimonial3-slider-content-area">
                                             <div class="testimonial3-author-area">

                                                  <?php if($settings['show_stars'] == 'yes'): ?>
                                                  <ul>
                                                       <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                                       <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                                       <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                                       <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                                       <li><a href=""><i class="fa-solid fa-star"></i></a></li>
                                                  </ul>
                                                  <?php endif; ?>

                                                  <?php if(!empty($vl_testimonial['vl_testimonial_quote']['url'])): ?>
                                                  <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_quote']['url']); ?>"
                                                       alt="">
                                                  <?php endif; ?>

                                             </div>

                                             <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                                             <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                                             <?php endif; ?>

                                             <?php if($settings['show_author_box'] == 'yes') : ?>
                                             <div class="testimonial3-man-info-area">

                                                  <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                                                  <div class="mans-img">
                                                       <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                                            alt="">
                                                  </div>
                                                  <?php endif; ?>

                                                  <div class="man3-text">
                                                       <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                                       <a
                                                            href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                                       <?php endif; ?>
                                                       <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                                       <p class="text">
                                                            <?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?>
                                                       </p>
                                                       <?php endif; ?>
                                                  </div>
                                             </div>
                                             <?php endif; ?>

                                        </div>
                                        <?php endforeach; ?>

                                   </div>

                                   <div class="testimonial-arrows2">
                                        <div class="testimonial-prev-arrow2">
                                             <button><i class="fa-solid fa-angle-left"></i></button>
                                        </div>
                                        <div class="testimonial-next-arrow2">
                                             <button><i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                   </div>

                              </div>

                              <div class="col-lg-2">
                                   <div class="slider-galeria-thumbs d-lg-block d-none text-center" data-aos="fade-up"
                                        data-aos-duration="1000">

                                        <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
                                        <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                                        <div class="testimonial3-sliders-img">
                                             <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; ?>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <?php endif; ?>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-6'): ?>

<div class="tes8 sp">
     <div class="container">

          <?php if($settings['show_section_title'] == 'yes') : ?>
          <div class="row">
               <div class="col-md-6 m-auto text-center">
                    <div class="heading8">
                         <?php if(!empty($settings['vl_testimonial_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['vl_testimonial_sub_title_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['vl_testimonial_sub_title_icon']['url']); ?>"
                                   alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['vl_testimonial_sub_title']); ?>
                         </span>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_testimonial_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['vl_testimonial_title']); ?></h2>
                         <?php endif; ?>
                    </div>
               </div>
          </div>
          <?php endif; ?>

          <div class="space60"></div>
          <div class="row align-items-center">
               <div class="col-lg-4">

                    <?php if(!empty($settings['testimonial_section_bg']['url'])) : ?>
                    <div class="big-image" data-aos="fade-up" data-aos-duration="900">
                         <img src="<?php echo esc_url($settings['testimonial_section_bg']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>

               </div>
               <div class="col-lg-8">

                    <div class="tes8-slider-area" data-aos="fade-up" data-aos-duration="900">

                         <div class="tes8-slider">

                              <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
                              <div class="single-slider">
                                   <?php if(!empty($vl_testimonial['vl_testimonial_quote']['url'])): ?>
                                   <div class="qute">
                                        <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_quote']['url']); ?>" alt="">
                                   </div>

                                   <?php endif; ?>

                                   <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                                   <?php endif; ?>

                                   <?php if($settings['show_author_box'] == 'yes') : ?>
                                   <div class="bottom-area">

                                        <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                                        <div class="image">
                                             <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>

                                        <div class="heading">
                                             <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                             <h5><a
                                                       href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                             </h5>
                                             <?php endif; ?>
                                             <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                             <span><?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></span>
                                             <?php endif; ?>
                                        </div>
                                   </div>
                                   <?php endif; ?>

                              </div>
                              <?php endforeach; ?>

                         </div>
                         <?php if($settings['show_arrows'] == 'yes') : ?>
                         <div class="arrows-button">
                              <button class="tes8-next-arrow"><i class="fa-solid fa-angle-left"></i></button>
                              <button class="tes8-prev-arrow"><i class="fa-solid fa-angle-right"></i></button>
                         </div>
                         <?php endif; ?>
                    </div>

               </div>
          </div>

     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-7'): ?>
<div class="testimonial-page sp">
     <div class="container">
          <div class="row">

               <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
               <div class="col-lg-4 col-md-6">
                    <div class="single-slider">
                         <div class="single-slider-content heading4">

                              <?php if($settings['show_stars'] == 'yes'): ?>
                              <ul class="stars">
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                                   <li><i class="fa-solid fa-star"></i></li>
                              </ul>
                              <?php endif; ?>

                              <?php if(!empty($vl_testimonial['vl_testimonial_review'])): ?>
                              <div class="pera">
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                              </div>
                              <?php endif; ?>
                         </div>

                         <?php if($settings['show_author_box'] == 'yes') : ?>
                         <div class="bottom-heading">
                              <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])): ?>
                              <div class="image">
                                   <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>"
                                        alt="">
                              </div>
                              <?php endif; ?>

                              <div class="heading1">
                                   <?php if(!empty($vl_testimonial['vl_testimonial_name'])): ?>
                                   <h4><a href="#"><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?></a>
                                   </h4>
                                   <?php endif; ?>
                                   <?php if(!empty($vl_testimonial['vl_testimonial_position'])): ?>
                                   <p><?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></p>
                                   <?php endif; ?>
                              </div>
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
               <?php endforeach; ?>

          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-8'): ?>

     <div class="tes2 ">
          <div class="tes2-slider owl-carousel">

               <?php foreach($settings['vl_testimonials'] as $vl_testimonial) : ?>
               <div class="tes2-signle-slider">
                    <div class="icon">
                         <?php if(!empty($vl_testimonial['vl_testimonial_quote']['url'])) : ?>
                         <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_quote']['url']); ?>" alt="">
                         <?php endif; ?>

                    </div>
                    <div class="heading">
                         <?php if(!empty($vl_testimonial['vl_testimonial_review'])) : ?>
                         <p><?php echo esc_html($vl_testimonial['vl_testimonial_review']); ?></p>
                         <?php endif; ?>
                    </div>
                    <div class="bottom-area">
                         <div class="image-bottom">
                              <?php if(!empty($vl_testimonial['vl_testimonial_image']['url'])) : ?>
                              <img src="<?php echo esc_url($vl_testimonial['vl_testimonial_image']['url']); ?>" alt="">
                              <?php endif; ?>

                         </div>
                         <div class="heading-bottom">
                              <?php if(!empty($vl_testimonial['vl_testimonial_name'])) : ?>
                              <h5><?php echo esc_html($vl_testimonial['vl_testimonial_name']); ?> <span>/ <?php echo esc_html($vl_testimonial['vl_testimonial_position']); ?></span></h5>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
               <?php endforeach; ?>

          </div>
     </div>

<?php endif; ?>

<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_testimonial() );