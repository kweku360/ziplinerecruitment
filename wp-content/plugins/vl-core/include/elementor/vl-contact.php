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


class VL_contact extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-contact';
	}

	public function get_title() {
		return __( 'VL Contact', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vlcore' ];
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
          'section_content',
               [
                    'label' => esc_html__('Section Content', 'vlcore'),
               ]
          );

          $this->add_control(
			'contact_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'vlocre' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'contact_sub_title_image_icon',
			[
				'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

          $this->add_control(
			'contact_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get in Touch Lets Start the Conversation', 'vlocre' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'contact_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'We are here to help you find the right staffing solutions for your needs. Whether you are a company looking to hire top talent or a candidate seeking your next career opportunity', 'vlocre' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'section_map_code',
			[
				'label' => esc_html__( 'Embaded Map Iframe here', 'vlocre' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
			]
		);



          $this->end_controls_section();

          $this->start_controls_section(
               'contact_repeater',
                    [
                         'label' => esc_html__('Contact Repeater', 'vlcore'),
                    ]
               );

               $contact_repeater = new \Elementor\Repeater();

               $contact_repeater->add_control(
                    'contact_box_title',
                    [
                         'label' => esc_html__( 'Title', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::TEXT,
                         'default' => esc_html__( 'List Title' , 'vlcore' ),
                         'label_block' => true,
                    ]
               );

               $contact_repeater->add_control(
                    'contact_box_url',
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
     

               $contact_repeater->add_control(
                    'contact_box_desc',
                    [
                         'label' => esc_html__( 'Content', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::TEXTAREA,
                         'default' => esc_html__( 'List Content' , 'vlcore' ),
                         'show_label' => false,
                    ]
               );

               $contact_repeater->add_control(
                    'contact_box_icon',
                    [
                         'label' => esc_html__( 'Choose Image', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::MEDIA,
                         'default' => [
                              'url' => \Elementor\Utils::get_placeholder_image_src(),
                         ],
                    ]
               );
     

               $this->add_control(
                    'contact_box_repts',
                    [
                         'label' => esc_html__( 'Contact Boxs', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::REPEATER,
                         'fields' => $contact_repeater->get_controls(),
                         'default' => [
                              [
                                   'contact_box_title' => esc_html__( 'Gives us a Call', 'vlcore' ),
                                   'contact_box_desc' => esc_html__( '123-456-7890', 'vlcore' ),
                              ],
                              [
                                   'contact_box_title' => esc_html__( 'Send me Mail', 'vlcore' ),
                                   'contact_box_desc' => esc_html__( 'Consult@hotmail.com', 'vlcore' ),
                              ],
                         ],
                         'title_field' => '{{{ contact_box_title }}}',
                    ]
               );
          
     
          $this->end_controls_section();

          $this->start_controls_section(
               'form_content',
                    [
                         'label' => esc_html__('Form Contents', 'vlcore'),
                    ]
               );

               $this->add_control(
                    'contact_form_title',
                    [
                         'label' => esc_html__( 'Form Title', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::TEXT,
                         'default' => esc_html__( 'Send us a Message', 'vlocre' ),
                         'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
                    ]
               );

               $this->add_control(
                    'contact_form_desc',
                    [
                         'label' => esc_html__( 'Form Description', 'vlcore' ),
                         'type' => \Elementor\Controls_Manager::TEXTAREA,
                         'default' => esc_html__( 'Feel free to reach out to us with any questions, inquiries, or staffing requirements you may have. Our experienced', 'vlocre' ),
                         'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
                    ]
               );

               $this->add_control(
                    'contact_form_shortcode',
                    [
                         'label' => esc_html__( 'Form Shortcode', 'vlocre' ),
                         'type' => \Elementor\Controls_Manager::TEXTAREA,
                         'rows' => 10,
                         'default' => esc_html__( '[contact-form-7 id="ad94ded" title="Contact Form 01"]', 'vlcore' ),
                         'placeholder' => esc_html__( 'Pur your shortcode', 'vlcore' ),
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'contact_section_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact1, {{WRAPPER}} .contact3, {{WRAPPER}} .contact5',
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
				'name' => 'contact_sub_title_typography',
				'selector' => '{{WRAPPER}} .heading1 span.span, {{WRAPPER}} .heading5 span.span, {{WRAPPER}} .heading1-w span.span, {{WRAPPER}} .heading3 span.span, {{WRAPPER}} .heading4 span.span',
			]
		);

          $this->add_control(
			'contact_sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1-w span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 span.span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading1 span.span' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'cotact_sub_title_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .heading1 span.span, {{WRAPPER}} .heading5 span.span, {{WRAPPER}} .heading1-w span.span, {{WRAPPER}} .heading3 span.span, {{WRAPPER}} .heading4 span.span',
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Title Typography', 'vlcore' ),
				'name' => 'contact_title_typography',
				'selector' => '{{WRAPPER}} .heading1 h2, {{WRAPPER}} .heading1-w h2, {{WRAPPER}} .heading3 h2, {{WRAPPER}} .heading4 h2, {{WRAPPER}} .heading5 h2',
			]
		);

          $this->add_control(
			'contact_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1-w h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading1 h2' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'contact_content_typography',
				'selector' => '{{WRAPPER}} .heading1 p, {{WRAPPER}} .heading1-w p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .heading4 p, {{WRAPPER}} .heading5 p',
			]
		);

          $this->add_control(
			'contact_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading1-w p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading1 p' => 'color: {{VALUE}}',
				],
			]
		);


          $this->end_controls_section();

          $this->start_controls_section(
               'contact_repeater_style',
               [
                    'label' => esc_html__( 'Icon Box Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );

          $this->start_controls_tabs(
               'contact_repeater_style_tabs'
          );
          
          $this->start_controls_tab(
               'contact_repeater_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact1 .contact1-box, {{WRAPPER}} .contact3-box, {{WRAPPER}} .contact9-content-area .contact9-box',
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Title Typography', 'vlcore' ),
				'name' => 'icon_box_heading_typography',
				'selector' => '{{WRAPPER}} .contact-box .heading1 p, {{WRAPPER}} .contact9-content-area .contact9-box .heading h5, {{WRAPPER}} .contact1 .contact1-box .heading p, {{WRAPPER}} .contact3-box .heading3 h6, {{WRAPPER}} .contact3-box .heading4 h6',
			]
		);

          $this->add_control(
			'icon_box_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact1 .contact1-box .heading p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact3-box .heading3 h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact3-box .heading4 h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .contact9-box .heading h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact-box .heading1 p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'icon_box_content_typography',
				'selector' => '{{WRAPPER}} .contact-page .contact-page-box .contact-box h4 a, {{WRAPPER}} .contact9-content-area .contact9-box .heading a, {{WRAPPER}} .contact1 .contact1-box .heading a, {{WRAPPER}} .heading3 h4 a, {{WRAPPER}} .heading5 h4 a',
			]
		);

          $this->add_control(
			'icon_box_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact1 .contact1-box .heading a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .contact9-box .heading a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact-page .contact-page-box .contact-box h4 a' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact-page .contact-page-box .contact-box .icon, {{WRAPPER}} .contact9-content-area .contact9-box .icon, {{WRAPPER}} .contact1 .contact1-box .icon, {{WRAPPER}} .contact3-box .icon',
			]
		);

          
          $this->end_controls_tab();
          
          $this->start_controls_tab(
               'contact_repeater_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );


          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact9-content-area .contact9-box:hover',
			]
		);


          $this->add_control(
			'icon_box_hover_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact9-content-area .contact9-box:hover .heading h5' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_control(
			'icon_box_hover_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact1 .contact1-box .heading a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3 h4 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading5 h4 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .contact9-box:hover .heading a' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_icon_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact9-content-area .contact9-box:hover .icon',
			]
		);


          
          $this->end_controls_tab();
          $this->end_controls_tabs();
          $this->end_controls_section();

          $this->start_controls_section(
               'contact_form_style',
               [
                    'label' => esc_html__( 'Form Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'form_area_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .contact9-content-area, {{WRAPPER}} .contact-from, {{WRAPPER}} .contact1-form, {{WRAPPER}} .contact3-form, {{WRAPPER}} .contact9-content-area',
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Heading Typography', 'vlcore' ),
				'name' => 'form_heading_typography',
				'selector' => '{{WRAPPER}} .contact10 .contact-from h3, {{WRAPPER}} .contact9-content-area .form-area h3, {{WRAPPER}} .contact7 .contact-from h3, {{WRAPPER}} .contact1-form .heading1 h3, {{WRAPPER}}  .heading3-w h5, {{WRAPPER}} .contact9-content-area .form-area h3',
			]
		);

          $this->add_control(
			'form_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact1-form .heading1 h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3-w h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .form-area h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact7 .contact-from h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .form-area h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact10 .contact-from h3' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'form_content_typography',
				'selector' => '{{WRAPPER}} .contact10 .contact-from p, {{WRAPPER}} .contact7 .contact-from p, {{WRAPPER}} .contact1-form .heading1 p, {{WRAPPER}} .heading3-w p, {{WRAPPER}} .contact9-content-area .form-area p',
			]
		);

          $this->add_control(
			'form_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact1-form .heading1 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .heading3-w p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact9-content-area .form-area p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact7 .contact-from p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact10 .contact-from p' => 'color: {{VALUE}}',
				],
			]
		);


          $this->start_controls_tabs(
               'contact_form_button_style_tabs'
          );
          
          $this->start_controls_tab(
               'contact_form_button_normal_style',
               [
                    'label' => esc_html__( 'Normal', 'vlocre' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Button Typography', 'vlcore' ),
				'name' => 'form_button_typography',
				'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn12, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn8, {{WRAPPER}} .theme-btn4',
			]
		);

          $this->add_control(
			'form_button_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn8' => 'color: {{VALUE}}',
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
				'name' => 'form_button_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .theme-btn16, {{WRAPPER}} .theme-btn15, {{WRAPPER}} .theme-btn14, {{WRAPPER}} .theme-btn12, {{WRAPPER}} .theme-btn11, {{WRAPPER}} .theme-btn4, {{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn8',
			]
		);
          
          $this->end_controls_tab();
          $this->start_controls_tab(
               'contact_form_button_hover_style',
               [
                    'label' => esc_html__( 'Hover', 'vlocre' ),
               ]
          );


          $this->add_control(
			'form_button_hover_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn1:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn8:hover' => 'color: {{VALUE}}',
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
				'name' => 'form_button_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .theme-btn16:hover, {{WRAPPER}} .theme-btn15:hover, {{WRAPPER}} .theme-btn14:hover, {{WRAPPER}} .theme-btn12:hover, {{WRAPPER}} .theme-btn11:hover, {{WRAPPER}} .theme-btn4:after, {{WRAPPER}} .theme-btn8:after, {{WRAPPER}} .theme-btn8:before, {{WRAPPER}} .theme-btn1:after, {{WRAPPER}} .theme-btn1:before, {{WRAPPER}} .theme-btn6:after, {{WRAPPER}} .theme-btn6:before',
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

<div class="contact1 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="heading1-w">
                         <?php if(!empty($settings['contact_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['contact_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['contact_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="900">
                              <?php echo esc_html($settings['contact_content']); ?></p>
                         <?php endif; ?>


                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="" data-aos="fade-right" data-aos-duration="800">
                              <div class="contact1-box">
                                   <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                   <div class="icon">
                                        <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                                   <?php endif; ?>

                                   <div class="heading">

                                        <?php if($contact_box_rept['contact_box_title']): ?>
                                        <p><?php echo wp_kses_post($contact_box_rept['contact_box_title']); ?></p>
                                        <?php endif; ?>

                                        <?php if($contact_box_rept['contact_box_desc']): ?>
                                        <a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                        <?php endif; ?>

                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>


                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="contact1-form" data-aos="zoom-out" data-aos-duration="900">
                         <div class="heading1">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>
                         </div>
                         <div class="space10"></div>
                         <div class="recrute-form">
                              <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>

<div class="contact3 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="heading3">

                         <?php if(!empty($settings['contact_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['contact_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['contact_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="900">
                              <?php echo esc_html($settings['contact_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>


                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="" data-aos="fade-right" data-aos-duration="900">
                              <div class="contact3-box">
                                   <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                   <div class="icon">
                                        <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                                   <?php endif; ?>
                                   <div class="heading3">
                                        <?php if($contact_box_rept['contact_box_title']): ?>
                                        <h6><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h6>
                                        <?php endif; ?>
                                        <?php if($contact_box_rept['contact_box_desc']): ?>
                                        <h4><a
                                                  href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                        </h4>
                                        <?php endif; ?>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="contact3-form" data-aos="zoom-in-up" data-aos-duration="800">
                         <div class="heading3-w">
                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h5><?php echo esc_html($settings['contact_form_title']); ?></h5>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>
                         </div>

                         <div class="space10"></div>

                         <div class="recrute-form">
                              <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                         </div>


                    </div>
               </div>
          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>

<div class="contact4 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="heading4">

                         <?php if(!empty($settings['contact_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['contact_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['contact_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="900">
                              <?php echo esc_html($settings['contact_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>
                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="contact3-box" data-aos="fade-right" data-aos-duration="1000">
                              <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                        alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading4">
                                   <?php if($contact_box_rept['contact_box_title']): ?>
                                   <h6><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h6>
                                   <?php endif; ?>
                                   <?php if($contact_box_rept['contact_box_desc']): ?>
                                   <h4><a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                   </h4>
                                   <?php endif; ?>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="contact3-form" data-aos="zoom-out" data-aos-duration="900">
                         <div class="heading3-w">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h5><?php echo esc_html($settings['contact_form_title']); ?></h5>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>

                         </div>

                         <div class="space10"></div>

                         <div class="recrute-form">
                              <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                         </div>


                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-4') : ?>
<div class="contact5 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="heading5">

                         <?php if(!empty($settings['contact_sub_title'])): ?>
                         <span class="span" data-aos="zoom-in-left"
                              data-aos-duration="700"><?php echo esc_html($settings['contact_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_title'])): ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['contact_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_content'])): ?>
                         <div class="space16"></div>
                         <p data-aos="fade-right" data-aos-duration="900">
                              <?php echo esc_html($settings['contact_content']); ?></p>
                         <?php endif; ?>

                         <div class="space10"></div>

                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="contact3-box" data-aos="fade-right" data-aos-duration="900">
                              <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                        alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading4">
                                   <?php if($contact_box_rept['contact_box_title']): ?>
                                   <h6><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h6>
                                   <?php endif; ?>
                                   <?php if($contact_box_rept['contact_box_desc']): ?>
                                   <h4><a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                   </h4>
                                   <?php endif; ?>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="contact3-form" data-aos="zoom-out" data-aos-duration="900">
                         <div class="heading3-w">
                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h5><?php echo esc_html($settings['contact_form_title']); ?></h5>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>
                         </div>

                         <div class="space10"></div>

                         <div class="recrute-form">
                              <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                         </div>

                    </div>
               </div>
          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-5') : ?>

<div class="contact6">
     <div class="container">
          <div class="contact9-content-area">
               <div class="row align-items-center">
                    <div class="col-lg-7">
                         <div class="form-area">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>

                              <div class="recrute-form">
                                   <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                              </div>

                         </div>
                    </div>
                    <div class="col-lg-5">

                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="" data-aos="fade-left" data-aos-duration="700">
                              <div class="contact9-box">
                                   <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                   <div class="icon">
                                        <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                                   <?php endif; ?>
                                   <div class="heading">
                                        <?php if($contact_box_rept['contact_box_title']): ?>
                                        <h5><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h5>
                                        <?php endif; ?>
                                        <?php if($contact_box_rept['contact_box_desc']): ?>
                                        <a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                        <?php endif; ?>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>
               </div>
          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-6') : ?>

<div class="contact7">
     <div class="container">
          <div class="row">
               <div class="col-lg-6">
                    <div class="contact-from">

                         <?php if(!empty($settings['contact_form_title'])): ?>
                         <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_form_desc'])): ?>
                         <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                         <?php endif; ?>

                         <div class="form-area">

                              <div class="recrute-form">
                                   <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                              </div>

                         </div>
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="contact-map">
                         <?php echo $settings['section_map_code']; ?>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-7') : ?>
<div class="contact8">
     <div class="container">

          <div class="contact9-content-area">
               <div class="row align-items-center">
                    <div class="col-lg-7">
                         <div class="form-area">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>

                              <div class="recrute-form">
                                   <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                              </div>

                         </div>
                    </div>
                    <div class="col-lg-5">

                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="" data-aos="fade-left" data-aos-duration="700">
                              <div class="contact9-box">
                                   <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                   <div class="icon">
                                        <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                                   <?php endif; ?>
                                   <div class="heading">
                                        <?php if($contact_box_rept['contact_box_title']): ?>
                                        <h5><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h5>
                                        <?php endif; ?>
                                        <?php if($contact_box_rept['contact_box_desc']): ?>
                                        <a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                        <?php endif; ?>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-8') : ?>
<div class="contact9">
     <div class="container">

          <div class="contact9-content-area">
               <div class="row align-items-center">
                    <div class="col-lg-7">
                         <div class="form-area">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>

                              <div class="recrute-form">
                                   <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                              </div>

                         </div>
                    </div>
                    <div class="col-lg-5">

                         <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                         <div class="" data-aos="fade-left" data-aos-duration="700">
                              <div class="contact9-box">
                                   <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                   <div class="icon">
                                        <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                             alt="">
                                   </div>
                                   <?php endif; ?>
                                   <div class="heading">
                                        <?php if($contact_box_rept['contact_box_title']): ?>
                                        <h5><?php echo esc_html($contact_box_rept['contact_box_title']); ?></h5>
                                        <?php endif; ?>
                                        <?php if($contact_box_rept['contact_box_desc']): ?>
                                        <a
                                             href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                        <?php endif; ?>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>
               </div>
          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-9') : ?>

<div class="contact10">
     <div class="container">
          <div class="row">
               <div class="col-lg-6">
                    <div class="contact-from">
                         <?php if(!empty($settings['contact_form_title'])): ?>
                         <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_form_desc'])): ?>
                         <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                         <?php endif; ?>


                         <div class="form-area">
                              <div class="recrute-form">
                                   <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                              </div>

                         </div>
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="contact-map">
                         <?php echo $settings['section_map_code']; ?>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-10') : ?>

<div class="contact-page sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                    <div class="heading1">

                         <?php if(!empty($settings['contact_sub_title'])): ?>
                         <span class="span"><?php echo esc_html($settings['contact_sub_title']); ?></span>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_title'])): ?>
                         <h2><?php echo esc_html($settings['contact_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['contact_content'])): ?>
                         <div class="space16"></div>
                         <p><?php echo esc_html($settings['contact_content']); ?></p>
                         <?php endif; ?>

                    </div>

                    <div class="contact-page-box">
                         <div class="row">

                              <?php foreach($settings['contact_box_repts'] as $contact_box_rept): ?>
                              <div class="col-lg-6">
                                   <div class="contact-box">
                                        <?php if(!empty($contact_box_rept['contact_box_icon']['url'])) : ?>
                                        <div class="icon">
                                             <img src="<?php echo esc_url($contact_box_rept['contact_box_icon']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>
                                        <div class="heading1">
                                             <?php if($contact_box_rept['contact_box_title']): ?>
                                             <p><?php echo esc_html($contact_box_rept['contact_box_title']); ?></p>
                                             <?php endif; ?>
                                             <?php if($contact_box_rept['contact_box_desc']): ?>
                                             <h4><a
                                                       href="<?php echo esc_url($contact_box_rept['contact_box_url']['url']); ?>"><?php echo esc_html($contact_box_rept['contact_box_desc']); ?></a>
                                             </h4>
                                             <?php endif; ?>
                                        </div>
                                   </div>
                              </div>
                              <?php endforeach; ?>

                         </div>
                    </div>
               </div>

               <div class="col-lg-6">
                    <div class="contact1-form">
                         <div class="heading1">

                              <?php if(!empty($settings['contact_form_title'])): ?>
                              <h3><?php echo esc_html($settings['contact_form_title']); ?></h3>
                              <?php endif; ?>

                              <?php if(!empty($settings['contact_form_desc'])): ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($settings['contact_form_desc']); ?></p>
                              <?php endif; ?>

                         </div>
                         <div class="space10"></div>

                         <div class="recrute-form">
                              <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                         </div>
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

$widgets_manager->register( new VL_contact() );