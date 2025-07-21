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


class VL_button extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-button';
	}

	public function get_title() {
		return __( 'VL Button', 'vlcore' );
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // layout Panel
        $this->start_controls_section(
        'content',
          [
                    'label' => esc_html__('Content', 'vlcore'),
          ]
        );

        $this->add_control(
          'vl_button_text',
          [
               'label' => esc_html__( 'Button Text', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Get Started', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_button_url',
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
          'show_btn_icon',
          [
               'label' => esc_html__( 'Show Icon ?', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__( 'Show', 'vlcore' ),
               'label_off' => esc_html__( 'Hide', 'vlcore' ),
               'return_value' => 'yes',
               'default' => 'yes',
          ]
     );


        $this->end_controls_section();

        $this->start_controls_section(
          'content_style',
               [
                         'label' => esc_html__( 'Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );
          $this->start_controls_tabs(
			'vl_button_style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'vlcore' ),
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'vl_button_typography',
				'selector' => '{{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn4, {{WRAPPER}} .theme-btn11',
			]
		);

          $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn11' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .theme-btn1, {{WRAPPER}} .theme-btn6, {{WRAPPER}} .theme-btn4, {{WRAPPER}} .theme-btn11',
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'vlcore' ),
			]
		);

          $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
                         '{{WRAPPER}} .theme-btn1:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn6:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn4:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-btn11:hover' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .theme-btn1:before, {{WRAPPER}} .theme-btn1:after,  {{WRAPPER}} .theme-btn6:before, {{WRAPPER}} .theme-btn6:after, {{WRAPPER}} .theme-btn4:after, {{WRAPPER}} .theme-btn11:hover',
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
               <?php if(!empty($settings['vl_button_text'])) : ?>
               <a class="theme-btn1" href="<?php echo esc_url($settings['vl_button_url']['url']); ?>"><?php echo esc_html($settings['vl_button_text']); ?> 
                    <?php if($settings['show_btn_icon'] == 'yes'): ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
               </a>
              <?php endif; ?>

          <?php elseif($settings['vl_design_style'] == 'layout-2'): ?>
               <?php if(!empty($settings['vl_button_text'])) : ?>
               <a class="theme-btn6" href="<?php echo esc_url($settings['vl_button_url']['url']); ?>"><?php echo esc_html($settings['vl_button_text']); ?> 
                    <?php if($settings['show_btn_icon'] == 'yes'): ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
               </a>
               <?php endif; ?>

          <?php elseif($settings['vl_design_style'] == 'layout-3'): ?>

               <?php if(!empty($settings['vl_button_text'])) : ?>
               <a class="theme-btn4" href="<?php echo esc_url($settings['vl_button_url']['url']); ?>"><?php echo esc_html($settings['vl_button_text']); ?>  
                    <?php if($settings['show_btn_icon'] == 'yes'): ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
               </a>
               <?php endif; ?>

          <?php elseif($settings['vl_design_style'] == 'layout-4'): ?>

               <?php if(!empty($settings['vl_button_text'])) : ?>
               <a class="theme-btn11" href="<?php echo esc_url($settings['vl_button_url']['url']); ?>"><?php echo esc_html($settings['vl_button_text']); ?> 
                    <?php if($settings['show_btn_icon'] == 'yes'): ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
               </a>
          <?php endif; ?>


          <?php endif; ?>

          <?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_button() );