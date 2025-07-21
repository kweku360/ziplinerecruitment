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


class VL_industry extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-industry';
	}

	public function get_title() {
		return __( 'VL Industry', 'vlcore' );
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
            'content',
            [
                    'label' => esc_html__('Content', 'vlcore'),
            ]
        );

        $this->add_control(
          'company_icon',
          [
               'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $this->add_control(
          'company_title',
          [
               'label' => esc_html__( 'Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Hotel', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'company_staff',
          [
               'label' => esc_html__( 'Staff', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( '2344 Staffs', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
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
          'industry_style_tabs'
     );
     
     $this->start_controls_tab(
          'style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'industry_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .industries7 .industries-box',
          ]
     );

     $this->add_control(
          'industry_box_shadow',
          [
               'label' => esc_html__( 'Box Shadow', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::BOX_SHADOW,
               'selectors' => [
                    '{{WRAPPER}} .industries7 .industries-box' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'title_typography',
               'selector' => '{{WRAPPER}} .industries7 .industries-box h3',
          ]
     );

     $this->add_control(
          'title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .industries7 .industries-box h3' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Staff Typography', 'vlcore' ),
               'name' => 'staff_typography',
               'selector' => '{{WRAPPER}} .industries7 .industries-box .bottom .pera p',
          ]
     );

     $this->add_control(
          'staff_color',
          [
               'label' => esc_html__( 'Staff Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .industries7 .industries-box .bottom .pera p' => 'color: {{VALUE}}',
               ],
          ]
     );


     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'industry_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .industries7 .industries-box:hover',
          ]
     );

     $this->add_control(
          'title_hover_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .industries7 .industries-box:hover h3' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_control(
          'staff_hover_color',
          [
               'label' => esc_html__( 'Staff Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .industries7 .industries-box:hover .bottom .pera p' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     $this->end_controls_tab();
     $this->end_controls_tabs();
    $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>

          <div class="industries7">
               <div class="industries-box">
                    <?php if(!empty($settings['company_title'])) : ?>
                    <h3><?php echo esc_html($settings['company_title']); ?></h3>
                    <?php endif; ?>

                    <div class="bottom">
                         <?php if(!empty($settings['company_icon']['url'])) : ?>
                         <div class="icons">
                              <img src="<?php echo esc_url($settings['company_icon']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['company_staff'])) : ?>
                         <div class="pera">
                              <p><?php echo esc_html($settings['company_staff']); ?></p>
                         </div>
                         <?php endif; ?>
                    </div>
               </div>
          </div>
<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_industry() );