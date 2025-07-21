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


class VL_features extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-features';
	}

	public function get_title() {
		return __( 'VL Features', 'vlcore' );
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
        'content',
        [
                'label' => esc_html__('Content', 'vlcore'),
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


    $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>
          <?php if($settings['vl_design_style'] == 'layout-1') : ?>
          
          <?php elseif($settings['vl_design_style'] == 'layout-2') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-3') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-4') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-5') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-6') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-7') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-8') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-9') : ?>

          <?php elseif($settings['vl_design_style'] == 'layout-10') : ?>
          
          <?php endif; ?>

          <?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_features() );