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


class VL_about extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-about';
	}

	public function get_title() {
		return __( 'VL About', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_about' ];
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

          // layout Panel
          $this->start_controls_section(
               'about_section_content',
               [
                    'label' => esc_html__('Section Content', 'vlcore'),
               ]
          );

          $this->add_control(
			'about_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Why Choose Us', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);


          $this->add_control(
			'subtitle_image_icon',
			[
				'label' => esc_html__( 'Sub Title Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


          $this->add_control(
			'about_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Choose Excellence Elevate Your Hiring Experience', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'about_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Our team of industry experts is dedicated to understanding your unique needs and delivering tailored solutions that propel your business forward.', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->end_controls_section();

          $this->start_controls_section(
               'about_conter',
               [
                    'label' => esc_html__('About Counter', 'vlcore'),
               ]
          );

          $this->add_control(
			'counter_1_icon',
			[
				'label' => esc_html__( 'Counter 1 Icon', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'counter_1_count',
			[
				'label' => esc_html__( 'Count 1 Number', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '100', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'counter_1_label',
			[
				'label' => esc_html__( 'Counter 1 Label', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Successful Client', 'vlcore' ),
				'placeholder' => esc_html__( 'Successful Client', 'vlcore' ),
			]
		);


          $this->add_control(
			'counter_2_icon',
			[
				'label' => esc_html__( 'Counter 2 Icon', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'counter_2_count',
			[
				'label' => esc_html__( 'Count 2 Number', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '100', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'counter_2_label',
			[
				'label' => esc_html__( 'Counter 2 Label', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Team Advisors', 'vlcore' ),
				'placeholder' => esc_html__( 'Successful Client', 'vlcore' ),
			]
		);


          $this->add_control(
			'counter_3_icon',
			[
				'label' => esc_html__( 'Counter 2 Icon', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'counter_3_count',
			[
				'label' => esc_html__( 'Count 3 Number', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '100', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'counter_3_label',
			[
				'label' => esc_html__( 'Counter 3 Label', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Years Experience', 'vlcore' ),
				'placeholder' => esc_html__( 'Successful Client', 'vlcore' ),
			]
		);


          $this->end_controls_section();

          $this->start_controls_section(
               'about_images',
               [
                    'label' => esc_html__('About Images', 'vlcore'),
               ]
          );

          $this->add_control(
			'about_image_1',
			[
				'label' => esc_html__( 'Image 1', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'about_image_2',
			[
				'label' => esc_html__( 'Image 2', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'about_image_3',
			[
				'label' => esc_html__( 'Image 3', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'about_image_4',
			[
				'label' => esc_html__( 'Image 4', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


          $this->end_controls_section();

          $this->start_controls_section(
               'about_bullet_point',
               [
                    'label' => esc_html__('About Points', 'vlcore'),
               ]
          );

          $buller_point_rep = new \Elementor\Repeater();

		$buller_point_rep->add_control(
			'bullet_point',
			[
				'label' => esc_html__( 'Point', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Range Of Services' , 'vlcore' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'buller_points',
			[
				'label' => esc_html__( 'Bullet Points', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $buller_point_rep->get_controls(),
				'default' => [
					[
						'bullet_point' => esc_html__( 'Range Of Services', 'vlcore' ),
					],
					[
						'bullet_point' => esc_html__( 'Range Of Services', 'vlcore' ),
					],
				],
				'title_field' => '{{{ bullet_point }}}',
			]
		);

          $this->end_controls_section();

          $this->start_controls_section(
               'about_Icon_box',
               [
                    'label' => esc_html__('About Icon Box', 'vlcore'),
               ]
          );

          $icon_box_reps = new \Elementor\Repeater();

		$icon_box_reps->add_control(
			'icon_box_heading',
			[
				'label' => esc_html__( 'Heading', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Empowering Careers, Driving Growth' , 'vlcore' ),
				'label_block' => true,
			]
		);

          $icon_box_reps->add_control(
			'icon_box_url',
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


		$icon_box_reps->add_control(
			'icon_box_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'we are your strategic partner in talent acquisition. With a steadfast commitment to excellence' , 'vlcore' ),
				'show_label' => false,
			]
		);

          $icon_box_reps->add_control(
			'icon_box_icon',
			[
				'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'icon_box_repeaters',
			[
				'label' => esc_html__( 'Icon Box', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $icon_box_reps->get_controls(),
				'default' => [
					[
						'icon_box_heading' => esc_html__( 'Title #1', 'vlcore' ),
						'icon_box_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'vlcore' ),
					],
					[
						'icon_box_heading' => esc_html__( 'Title #2', 'vlcore' ),
						'icon_box_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'vlcore' ),
					],
				],
				'title_field' => '{{{ icon_box_heading }}}',
			]
		);


          $this->end_controls_section();

          $this->start_controls_section(
               'about_button',
               [
                    'label' => esc_html__('About Button', 'vlcore'),
               ]
          );

          $this->add_control(
			'about_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Us', 'vlcore' ),
				'placeholder' => esc_html__( 'Write here', 'vlcore' ),
			]
		);

          $this->add_control(
			'about_btn_url',
			[
				'label' => esc_html__( 'Button Url', 'vlcore' ),
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
			'show_about_btn_icon',
			[
				'label' => esc_html__( 'Show Icon ?', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


          $this->add_control(
			'about_phone_btn_label',
			[
				'label' => esc_html__( 'Phone Button Label', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Call Us For Help', 'vlcore' ),
				'placeholder' => esc_html__( 'Write here', 'vlcore' ),
			]
		);
          $this->add_control(
			'about_phone_btn_text',
			[
				'label' => esc_html__( 'Phone Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+124 567 890', 'vlcore' ),
				'placeholder' => esc_html__( 'Write here', 'vlcore' ),
			]
		);

          $this->add_control(
			'about_phone_btn_url',
			[
				'label' => esc_html__( 'Phone Button Url', 'vlcore' ),
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


          $this->end_controls_section();


          $this->start_controls_section(
               'section_style',
                    [
                         'label' => esc_html__( 'Section Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .heading10 span.span, {{WRAPPER}} .heading9 span.span, {{WRAPPER}} .heading8 span.span, {{WRAPPER}} .heading7 span.span, {{WRAPPER}} .heading6 span.span, {{WRAPPER}} .heading2 span.span, {{WRAPPER}} .heading1 span.span, {{WRAPPER}} .heading3 span.span, {{WRAPPER}} .heading4 span.span, {{WRAPPER}} .heading5 span.span',
			]
		);


          $this->add_control(
			'substile_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading2 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading6 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading7 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading8 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading9 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading10 span.span' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'substitle_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .heading10 span.span, {{WRAPPER}} .heading9 span.span, {{WRAPPER}} .heading8 span.span, {{WRAPPER}} .heading7 span.span, {{WRAPPER}} .heading6 span.span, {{WRAPPER}} .heading2 span.span, {{WRAPPER}} .heading1 span.span, {{WRAPPER}} .heading3 span.span, {{WRAPPER}} .heading4 span.span, {{WRAPPER}} .heading5 span.span',
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Title Typography', 'vlcore' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .heading10 h2, {{WRAPPER}} .heading9 h2, {{WRAPPER}} .heading8 h2, {{WRAPPER}} .heading7 h2, {{WRAPPER}} .heading6 h2, {{WRAPPER}} .heading2 h2, {{WRAPPER}} .heading1 h2, {{WRAPPER}} .heading3 h2, {{WRAPPER}} .heading4 h2, {{WRAPPER}} .heading5 h2',
			]
		);

          $this->add_control(
			'tile_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading2 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading6 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading7 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading8 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading9 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading10 h2' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'Content_typography',
				'selector' => '{{WRAPPER}} .heading10 p, {{WRAPPER}} .heading9 p, {{WRAPPER}} .heading8 p, {{WRAPPER}} .heading7 p, {{WRAPPER}} .heading6 p, {{WRAPPER}} .heading2 p, {{WRAPPER}} .heading1 p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .heading4 p, .heading5 p',
			]
		);

          $this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading2 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading6 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading7 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading8 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading9 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading10 p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->end_controls_section();


          $this->start_controls_section(
               'bullet_point_style',
                    [
                         'label' => esc_html__( 'Point Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Point Typograhy', 'vlcore' ),
				'name' => 'point_typograpgy',
				'selector' => '{{WRAPPER}} .heading9 .list li, {{WRAPPER}} .choose1-heading .icon-list li, {{WRAPPER}} .about6 .heading6 .list li, {{WRAPPER}} .heading8 .list li',
			]
		);

          $this->add_control(
			'point_color',
			[
				'label' => esc_html__( 'Point Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .choose1-heading .icon-list li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about6 .heading6 .list li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading8 .list li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading9 .list li' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_control(
			'point_icon_color',
			[
				'label' => esc_html__( 'Point Icon Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .choose1-heading .icon-list li span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading6 .list li .check' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading8 .list li .check' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading9 .list li .check' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'point_icon_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .heading9 .list li .check, {{WRAPPER}} .choose1-heading .icon-list li span, {{WRAPPER}} .heading6 .list li .check, {{WRAPPER}} .heading8 .list li .check',
			]
		);

          $this->end_controls_section();

          $this->start_controls_section(
               'icon_box_style',
                    [
                         'label' => esc_html__( 'Icon Box Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
          );

          $this->start_controls_tabs(
               'about_icon_box_tabs'
          );
          
          $this->start_controls_tab(
               'about_icon_box_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlocre' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Heading Typography', 'vlcore' ),
				'name' => 'icon_box_heading_typograpgy',
				'selector' => '{{WRAPPER}} .heading2 h5 a, {{WRAPPER}} .heading3 h5 a, {{WRAPPER}} .heading4 h5 a, {{WRAPPER}} .heading5 h5 a',
			]
		);

          $this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading3 h5 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 h5 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h5 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading2 h5 a' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'icon_box_content_typograpgy',
				'selector' => '{{WRAPPER}} .about1-box .heading2 p, {{WRAPPER}} .about3-icon-box .heading3 p, {{WRAPPER}} .about4-box .heading4 p, {{WRAPPER}} .icon-box .heading5 p',
			]
		);

          $this->add_control(
			'icon_box_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about3-icon-box .heading3 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about4-box .heading4 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .icon-box .heading5 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about1-box .heading2 p' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_icon_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .about1-box .icon, {{WRAPPER}} .about3-icon-box .icon, {{WRAPPER}} .heading4 .about4-box .icon, {{WRAPPER}} .about5-heading .icon-box .icon',
			]
		);
          
          $this->end_controls_tab();

          $this->start_controls_tab(
               'about_icon_box_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlocre' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_icon_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => ' {{WRAPPER}} .about1-box:hover .icon, {{WRAPPER}} .about3 .about3-icon-box:hover .icon, {{WRAPPER}} .heading4 .about4-box:hover .icon, {{WRAPPER}} .about5-heading .icon-box:hover .icon',
			]
		);

          $this->add_control(
			'heading_hover_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading3 h5 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 h5 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h5 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading2 h5 a:hover' => 'color: {{VALUE}}',
				],
			]
		);
          
          $this->end_controls_tab();
          
          $this->end_controls_tabs();


          $this->end_controls_section();

          $this->start_controls_section(
               'counter_style',
                    [
                         'label' => esc_html__( 'Counter Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
          );
          $this->start_controls_tabs(
               'counter_style_tabs'
          );


          $this->start_controls_tab(
               'counter_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'counter_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .chosse1 .icon-box, {{WRAPPER}} .about3 .conter-box2',
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Counter Typography', 'vlcore' ),
				'name' => 'counter_typography',
				'selector' => '{{WRAPPER}} .about10 .heading10 .counter-box h3, {{WRAPPER}} .chosse1 .heading1 h3, {{WRAPPER}} .about3 .conter-box h3, {{WRAPPER}} .about7 .heading7 .counter-box h3',
			]
		);

          $this->add_control(
			'counter_color',
			[
				'label' => esc_html__( 'Counter Color', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chosse1 .heading1 h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about3 .conter-box h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about7 .heading7 .counter-box h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about10 .heading10 .counter-box h3' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Counter Label Typography', 'vlcore' ),
				'name' => 'counter_label_typography',
				'selector' => '{{WRAPPER}} .about10 .heading10 .counter-box p, {{WRAPPER}} .chosse1 .heading1 p, {{WRAPPER}} .about7 .heading7 .counter-box p',
			]
		);

          $this->add_control(
			'counter_label_color',
			[
				'label' => esc_html__( 'Counter Label Color', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chosse1 .heading1 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about7 .heading7 .counter-box p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about10 .heading10 .counter-box p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->end_controls_tab();

          $this->start_controls_tab(
               'counter_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'counter_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .chosse1 .icon-box:hover',
			]
		);

          $this->add_control(
			'counter_hover_color',
			[
				'label' => esc_html__( 'Counter Color', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chosse1 .icon-box:hover .heading1 h3' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_control(
			'counter_label_hover_color',
			[
				'label' => esc_html__( 'Counter Label Color', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chosse1 .icon-box:hover .heading1 p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->end_controls_tab();
          $this->end_controls_tabs();
          $this->end_controls_section();


          $this->start_controls_section(
               'button_style',
                    [
                         'label' => esc_html__( 'Button Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
          );

          $this->start_controls_tabs(
               'button_style_tabs'
          );
          
          $this->start_controls_tab(
               'button_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Button Typography', 'vlcore' ),
				'name' => 'about_button_typograpgy',
				'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn12, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn10, {{WRAPPER}} .theme-btn4',
			]
		);

          $this->add_control(
			'about_button_color',
			[
				'label' => esc_html__( 'About Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn10' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn11' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn12' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn14' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn15' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn16' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'about_button_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn12, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn10, {{WRAPPER}} .theme-btn4',
			]
		);
          
          $this->end_controls_tab();

          $this->start_controls_tab(
               'button_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );

          $this->add_control(
			'about_button_hover_color',
			[
				'label' => esc_html__( 'About Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn1:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn10:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn4:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn11:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn12:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn14:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn15:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn16:hover' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'about_button_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .theme-btn16:hover, {{WRAPPER}} .theme-btn15:hover, {{WRAPPER}} .theme-btn14:hover, {{WRAPPER}} .theme-btn12:hover, {{WRAPPER}} .theme-btn11:hover, {{WRAPPER}} .theme-btn4:after, {{WRAPPER}} .theme-btn10:after, {{WRAPPER}} .theme-btn10:before, {{WRAPPER}} .theme-btn1:after, {{WRAPPER}} .theme-btn1:before, {{WRAPPER}} .theme-btn6:after, {{WRAPPER}} .theme-btn6:before',
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

<div class="chosse1 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-2">


                    <div class="" data-aos="zoom-in-up" data-aos-duration="700">
                         <div class="icon-box">

                              <?php if(!empty($settings['counter_1_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($settings['counter_1_icon']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>

                              <div class="heading1">
                                   <?php if(!empty($settings['counter_1_count'])) : ?>
                                   <h3><span
                                             class="counter"><?php echo esc_html($settings['counter_1_count']); ?></span>%
                                   </h3>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['counter_1_label'])) : ?>
                                   
                                   <p><?php echo esc_html($settings['counter_1_label']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                    </div>

                    <div class="" data-aos="zoom-in-up" data-aos-duration="900">
                         <div class="icon-box">
                              <?php if(!empty($settings['counter_2_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($settings['counter_2_icon']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading1">
                                   <?php if(!empty($settings['counter_2_count'])) : ?>
                                   <h3><span
                                             class="counter"><?php echo esc_html($settings['counter_2_count']); ?></span>%
                                   </h3>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['counter_2_label'])) : ?>
                                   <div class="space10"></div>
                                   <p><?php echo esc_html($settings['counter_2_label']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                    </div>

                    <div class="" data-aos="zoom-in-up" data-aos-duration="1200">
                         <div class="icon-box icon-box2">
                              <?php if(!empty($settings['counter_3_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($settings['counter_3_icon']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading1">

                                   <?php if(!empty($settings['counter_3_count'])) : ?>
                                   <h3><span
                                             class="counter"><?php echo esc_html($settings['counter_3_count']); ?></span>+
                                   </h3>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['counter_3_label'])) : ?>
                                   <div class="space10"></div>
                                   <p><?php echo esc_html($settings['counter_3_label']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                    </div>

               </div>
               <div class="col-lg-5">

                    <?php if(!empty($settings['about_image_1']['url'])) : ?>
                    <div class="image overlay-anim">
                         <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
               </div>
               <div class="col-lg-5">
                    <div class="heading1 choose1-heading">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="fade-left"
                              data-aos-duration="700"><?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>


                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="900">
                              <?php echo esc_html($settings['about_content']); ?> </p>
                         <?php endif; ?>

                         <div class="space10"></div>
                         <div class="row" data-aos="fade-left" data-aos-duration="800">

                              <?php foreach($settings['buller_points'] as $b_points) : ?>
                              <div class="col-lg-6">
                                   <ul class="icon-list">
                                        <li><span><i class="fa-solid fa-check"></i></span>
                                             <?php echo esc_html($b_points['bullet_point']); ?></li>
                                   </ul>
                              </div>
                              <?php endforeach; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="1100">
                              <a class="theme-btn1"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-2'): ?>

<div class="about3 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="about3-images">
                         <div class="row">

                              <div class="col-lg-6">
                                   <?php if(!empty($settings['counter_1_icon']['url'])): ?>
                                   <div class="image">
                                        <img src="<?php echo esc_url($settings['counter_1_icon']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <div class="conter-box conter-box1" data-aos="zoom-out" data-aos-duration="700">
                                        <?php if(!empty($settings['counter_1_count'])): ?>
                                        <h3><span
                                                  class="counter"><?php echo esc_html($settings['counter_1_count']); ?></span>+
                                        </h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_1_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_1_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>

                              <div class="col-lg-6">
                                   <div class="conter-box conter-box2" data-aos="zoom-out" data-aos-duration="700">
                                        <?php if(!empty($settings['counter_2_count'])): ?>
                                        <h3><span
                                                  class="counter"><?php echo esc_html($settings['counter_2_count']); ?></span>+
                                        </h3>
                                        <?php endif; ?>
                                        <?php if(!empty($settings['counter_2_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_2_label']); ?></p>
                                        <?php endif; ?>
                                   </div>

                                   <?php if(!empty($settings['counter_2_icon']['url'])): ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['counter_2_icon']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                              </div>

                         </div>
                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="heading3 about3-heading">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="700">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>


                         <?php foreach($settings['icon_box_repeaters'] as $icon_box_repeater) : ?>
                         <div class="about3-icon-box" data-aos="fade-left" data-aos-duration="900">

                              <?php if(!empty($icon_box_repeater['icon_box_icon']['url'])): ?>
                              <div class="">
                                   <div class="icon">
                                        <img src="<?php echo esc_url($icon_box_repeater['icon_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                              </div>
                              <?php endif; ?>

                              <div class="heading3">

                                   <?php if(!empty($icon_box_repeater['icon_box_heading'])): ?>
                                   <h5><a
                                             href="<?php echo esc_url($icon_box_repeater['icon_box_url']['url']); ?>"><?php echo esc_html($icon_box_repeater['icon_box_heading']); ?></a>
                                   </h5>
                                   <?php endif; ?>

                                   <?php if(!empty($icon_box_repeater['icon_box_content'])): ?>
                                   <p><?php echo esc_html($icon_box_repeater['icon_box_content']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                         <?php endforeach; ?>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="800">
                              <a class="theme-btn6"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-3'): ?>

<div class="about4 sp" id="about">
     <div class="container">
          <div class="row">
               <div class="col-lg-6">
                    <div class="images">

                         <?php if(!empty($settings['about_image_1']['url'])) : ?>
                         <div class="image1 overlay-anim">
                              <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_image_2']['url'])) : ?>
                         <div class="image2 animate1" data-aos="flip-left" data-aos-duration="700">
                              <img src="<?php echo esc_url($settings['about_image_2']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="heading4 about4-heading">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="1100">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="about4-border"></div>

                         <?php foreach($settings['icon_box_repeaters'] as $icon_box_repeater) : ?>
                         <div class="about4-box" data-aos="fade-left" data-aos-duration="800">
                              <?php if(!empty($icon_box_repeater['icon_box_icon']['url'])): ?>
                              <div class="">
                                   <div class="icon">
                                        <img src="<?php echo esc_url($icon_box_repeater['icon_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                              </div>
                              <?php endif; ?>
                              <div class="heading4">
                                   <?php if(!empty($icon_box_repeater['icon_box_heading'])): ?>
                                   <h5><a
                                             href="<?php echo esc_url($icon_box_repeater['icon_box_url']['url']); ?>"><?php echo esc_html($icon_box_repeater['icon_box_heading']); ?></a>
                                   </h5>
                                   <?php endif; ?>

                                   <?php if(!empty($icon_box_repeater['icon_box_content'])): ?>
                                   <div class="space10"></div>
                                   <p><?php echo esc_html($icon_box_repeater['icon_box_content']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                         <?php endforeach; ?>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="" data-aos="fade-left" data-aos-duration="900">
                              <a class="theme-btn10"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-4'): ?>

<div class="about5 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="images">

                         <?php if(!empty($settings['about_image_1']['url'])) : ?>
                         <div class="image1 overlay-anim" style="width:100%;height:100%;">
                              <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="" style="width:100%;height:auto;object-fit:cover;">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="heading5 about5-heading">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="about5-border"></div>

                         <div class="row">

                              <?php foreach($settings['icon_box_repeaters'] as $icon_box_repeater) : ?>
                              <div class="col-lg-6">
                                   <div class="icon-box" data-aos="fade-left" data-aos-duration="900">
                                        <?php if(!empty($icon_box_repeater['icon_box_icon']['url'])): ?>
                                        <div class="icon">
                                             <img src="<?php echo esc_url($icon_box_repeater['icon_box_icon']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>
                                        <div class="heading5">
                                             <?php if(!empty($icon_box_repeater['icon_box_heading'])): ?>
                                             <h5><a
                                                       href="<?php echo esc_url($icon_box_repeater['icon_box_url']['url']); ?>"><?php echo esc_html($icon_box_repeater['icon_box_heading']); ?></a>
                                             </h5>
                                             <?php endif; ?>

                                             <?php if(!empty($icon_box_repeater['icon_box_content'])): ?>
                                             <div class="space10"></div>
                                             <p><?php echo esc_html($icon_box_repeater['icon_box_content']); ?></p>
                                             <?php endif; ?>
                                        </div>
                                   </div>
                              </div>
                              <?php endforeach; ?>

                         </div>

                         <div class="space30"></div>
                         <div class="buttons-about5" data-aos="fade-left" data-aos-duration="1000">

                              <?php if(!empty($settings['about_btn_text'])) : ?>
                              <a class="theme-btn4"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
                                   <span><i class="fa-solid fa-arrow-right"></i></span>
                                   <?php endif; ?>
                              </a>
                              <?php endif; ?>

                              <?php if(!empty($settings['about_phone_btn_text'])): ?>
                              <div class="phone-btn">
                                   <div class="icon">
                                        <a href="tel:<?php echo esc_html($settings['about_phone_btn_url']['url']); ?>"><i class="fa-regular fa-phone"></i></a>
                                   </div>
                                   <div class="heading">
                                        <p><?php echo esc_html($settings['about_phone_btn_label']); ?></p>
                                        <h4><a
                                                  href="tel:<?php echo esc_html($settings['about_phone_btn_url']['url']); ?>"><?php echo esc_html($settings['about_phone_btn_text']); ?></a>
                                        </h4>
                                   </div>
                              </div>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-5'): ?>
<div class="about2 sp2 _relative">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <?php if(!empty($settings['about_image_1']['url'])) : ?>
                    <div class="image1 overlay-anim">
                         <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
               </div>
               <div class="col-lg-6">
                    <div class="heading2">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="1000">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>

                         <?php foreach($settings['icon_box_repeaters'] as $icon_box_repeater) : ?>
                         <div class="about1-box" data-aos="fade-left" data-aos-duration="800">

                              <?php if(!empty($icon_box_repeater['icon_box_icon']['url'])): ?>
                              <div class="">
                                   <div class="icon">
                                        <img src="<?php echo esc_url($icon_box_repeater['icon_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                              </div>
                              <?php endif; ?>

                              <div class="heading2">
                                   <?php if(!empty($icon_box_repeater['icon_box_heading'])): ?>
                                   <h5><a
                                             href="<?php echo esc_url($icon_box_repeater['icon_box_url']['url']); ?>"><?php echo esc_html($icon_box_repeater['icon_box_heading']); ?></a>
                                   </h5>
                                   <?php endif; ?>

                                   <?php if(!empty($icon_box_repeater['icon_box_content'])): ?>
                                   <div class="space10"></div>
                                   <p><?php echo esc_html($icon_box_repeater['icon_box_content']); ?></p>
                                   <?php endif; ?>

                              </div>
                         </div>
                         <?php endforeach; ?>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="900">
                              <a class="theme-btn4"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-6'): ?>
<div class="about6 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="images-all" data-aos="zoom-out" data-aos-duration="900">

                         <?php if(!empty($settings['about_image_1']['url'])) : ?>
                         <div class="image1">
                              <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_image_2']['url'])) : ?>
                         <div class="image2">
                              <img src="<?php echo esc_url($settings['about_image_2']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_image_3']['url'])) : ?>
                         <div class="image3 animate3">
                              <img src="<?php echo esc_url($settings['about_image_3']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="heading6">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['subtitle_image_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['subtitle_image_icon']['url']); ?>" alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>
                         <div class="row">

                              <?php foreach($settings['buller_points'] as $b_points) : ?>
                              <div class="col-lg-6">
                                   <ul class="list" data-aos="fade-left" data-aos-duration="1000">
                                        <li><span class="check"><i class="fa-solid fa-check"></i></span>
                                             <?php echo esc_html($b_points['bullet_point']); ?></li>
                                   </ul>
                              </div>
                              <?php endforeach; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="button" data-aos="fade-left" data-aos-duration="900">
                              <a class="theme-btn11"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-7'): ?>
<div class="about7 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="images-all">

                         <div class="row">

                              <div class="col-lg-6">

                                   <?php if(!empty($settings['about_image_1']['url'])) : ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['about_image_4']['url'])) : ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_4']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>
                              </div>

                              <div class="col-lg-6">
                                   <div class="space50"></div>

                                   <?php if(!empty($settings['about_image_2']['url'])) : ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_2']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['about_image_3']['url'])) : ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_3']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                              </div>

                         </div>
                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="heading7">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['subtitle_image_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['subtitle_image_icon']['url']); ?>" alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="800">
                              <?php echo esc_html($settings['about_content']); ?> </p>
                         <?php endif; ?>

                         <div class="row" data-aos="fade-left" data-aos-duration="1000">

                              <?php if(!empty($settings['counter_1_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_1_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_1_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_1_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_1_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['counter_2_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_2_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_2_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_2_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_2_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['counter_3_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_3_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_3_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_3_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_3_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="800">
                              <a href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"
                                   class="theme-btn12"><?php echo esc_html($settings['about_btn_text']); ?></a>
                         </div>
                         <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-8'): ?>

<div class="about8 sp">
     <div class="container">
          <div class="row">
               <div class="col-lg-5">
                    <div class="heading10">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['subtitle_image_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['subtitle_image_icon']['url']); ?>" alt="">
                              <?php endif; ?>
                                   <?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="600">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>
                         <div class="row" data-aos="fade-right" data-aos-duration="900">


                              <?php foreach($settings['buller_points'] as $b_points) : ?>
                              <div class="col-lg-6">
                                   <ul class="list" data-aos="fade-left" data-aos-duration="1000">
                                        <li><span class="check"><i class="fa-solid fa-check"></i></span>
                                             <?php echo esc_html($b_points['bullet_point']); ?></li>
                                   </ul>
                              </div>
                              <?php endforeach; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="button" data-aos="fade-right" data-aos-duration="1200">
                              <a class="theme-btn14"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?></a>
                         </div>
                         <?php endif; ?>

                    </div>
               </div>

               <div class="col-lg-7">
                    <div class="about8-images">
                         <div class="cs_height_118 cs_height_lg_70"></div>
                         <div class="cs_case_study_1_list">

                              <?php if(!empty($settings['about_image_1']['url'])) : ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active active">
                                      
                                   <div style="background:url(<?php echo esc_url($settings['about_image_1']['url']); ?>);"
                                        class="cs_case_study_thumb cs_bg_filed"
                                        data-src="<?php echo esc_url($settings['about_image_1']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-9'): ?>

<div class="about9 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="images-all">
                         <div class="row align-items-center">

                              <?php if(!empty($settings['about_image_1']['url'])) : ?>
                              <div class="col-md-6">
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_1']['url']); ?>" alt="">
                                   </div>
                              </div>
                              <?php endif; ?>


                              <div class="col-md-6">

                                   <?php if(!empty($settings['about_image_2']['url'])) : ?>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_2']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($settings['about_image_3']['url'])) : ?>
                                   <div class="space30"></div>
                                   <div class="image overlay-anim">
                                        <img src="<?php echo esc_url($settings['about_image_3']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="heading10">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                         <?php if(!empty($settings['subtitle_image_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['subtitle_image_icon']['url']); ?>" alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="700">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>
                         <div class="row" data-aos="fade-left" data-aos-duration="1000">

                              <?php foreach($settings['buller_points'] as $b_points) : ?>
                              <div class="col-lg-6">
                                   <ul class="list" data-aos="fade-left" data-aos-duration="1000">
                                        <li>
                                             <!-- <span class="check"><i class="fa-solid fa-check"></i></span> -->
                                             <?php echo esc_html($b_points['bullet_point']); ?></li>
                                   </ul>
                              </div>
                              <?php endforeach; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="1200">
                              <a class="theme-btn15"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-10'): ?>

<div class="about10 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-7">
                    <div class="about10-images">
                         <div class="cs_height_118 cs_height_lg_70"></div>
                         <div class="cs_case_study_1_list">


                              <?php if(!empty($settings['about_image_1']['url'])) : ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active active">
                                   <div style="background:url(<?php echo esc_url($settings['about_image_1']['url']); ?>);"
                                        class="cs_case_study_thumb cs_bg_filed"
                                        data-src="<?php echo esc_url($settings['about_image_1']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['about_image_2']['url'])) : ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active">
                                   <div style="background:url(<?php echo esc_url($settings['about_image_2']['url']); ?>);"
                                        class="cs_case_study_thumb cs_case_study_thumb2 cs_bg_filed"
                                        data-src="<?php echo esc_url($settings['about_image_2']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['about_image_3']['url'])) : ?>
                              <div class="cs_case_study cs_style_1 cs_hover_active">
                                   <div style="background:url(<?php echo esc_url($settings['about_image_3']['url']); ?>);"
                                        class="cs_case_study_thumb cs_case_study_thumb3 cs_bg_filed"
                                        data-src="<?php echo esc_url($settings['about_image_3']['url']); ?>"></div>
                              </div>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>

               <div class="col-lg-5">
                    <div class="heading10">

                         <?php if(!empty($settings['about_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                              <?php if(!empty($settings['subtitle_image_icon']['url'])) : ?>
                              <img src="<?php echo esc_url($settings['subtitle_image_icon']['url']); ?>" alt="">
                              <?php endif; ?>
                              <?php echo esc_html($settings['about_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['about_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['about_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="700">
                              <?php echo esc_html($settings['about_content']); ?></p>
                         <?php endif; ?>

                         <div class="row" data-aos="fade-left" data-aos-duration="900">

                              <?php if(!empty($settings['counter_1_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_1_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_1_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_1_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_1_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['counter_2_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_2_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_2_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_2_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_2_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                              <?php if(!empty($settings['counter_3_count'])): ?>
                              <div class="col-md-4 col-6">
                                   <div class="counter-box">

                                        <?php if(!empty($settings['counter_3_count'])): ?>
                                        <h3><?php echo esc_html($settings['counter_3_count']); ?></h3>
                                        <?php endif; ?>

                                        <?php if(!empty($settings['counter_3_label'])): ?>
                                        <p><?php echo esc_html($settings['counter_3_label']); ?></p>
                                        <?php endif; ?>

                                   </div>
                              </div>
                              <?php endif; ?>

                         </div>

                         <?php if(!empty($settings['about_btn_text'])) : ?>
                         <div class="space30"></div>
                         <div class="" data-aos="fade-left" data-aos-duration="1100">
                              <a class="theme-btn16"
                                   href="<?php echo esc_url($settings['about_btn_url']['url']); ?>"><?php echo esc_html($settings['about_btn_text']); ?>
                                   <?php if($settings['show_about_btn_icon'] == 'yes') : ?>
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

<?php endif; ?>



<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_about() );