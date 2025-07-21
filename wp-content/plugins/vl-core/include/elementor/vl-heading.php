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


class VL_heading extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-heading';
	}

	public function get_title() {
		return __( 'VL Heading', 'vlcore' );
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
            'heading_content',
            [
                'label' => esc_html__('Content', 'vlcore'),
            ]
        );

        $this->add_control(
          'heading_sub_title',
          [
               'label' => esc_html__( 'Sub Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Our Project', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'sub_title_icon_show',
          [
               'label' => esc_html__( 'Sub Title Icon', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__( 'Show', 'vlcore' ),
               'label_off' => esc_html__( 'Hide', 'vlcore' ),
               'return_value' => 'yes',
               'default' => 'no',
          ]
     );

     $this->add_control(
          'subtitle_icon',
          [
               'label' => esc_html__( 'Choose Icon', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
               'condition' => [
                    'sub_title_icon_show' => 'yes'
               ]
          ]
     );

     $this->add_control(
          'heading_title',
          [
               'label' => esc_html__( 'Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Successes A Look at Our Projects', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'heading_text_content',
          [
               'label' => esc_html__( 'Content', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => esc_html__( 'Explore our portfolio of successful projects that showcase the impact we ve made', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );



        $this->end_controls_section();


        $this->start_controls_section(
          'heading_style',
          [
               'label' => esc_html__( 'Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->add_control(
          'heading_align',
          [
               'label' => esc_html__( 'Alignment', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::CHOOSE,
               'options' => [
                    'left' => [
                         'title' => esc_html__( 'Left', 'vlcore' ),
                         'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                         'title' => esc_html__( 'Center', 'vlcore' ),
                         'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                         'title' => esc_html__( 'Right', 'vlcore' ),
                         'icon' => 'eicon-text-align-right',
                    ],
               ],
               'default' => 'center',
               'toggle' => true,
               'selectors' => [
                    '{{WRAPPER}} .heading1' => 'text-align: {{VALUE}};',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
               'name' => 'sub_heading_typography',
               'selector' => '{{WRAPPER}} .heading1 span',
          ]
     );


     $this->add_control(
          'sub_title_color',
          [
               'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 span' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'sub_title_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .heading1 span',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'heading_title_typography',
               'selector' => '{{WRAPPER}} .heading1 h2',
          ]
     );

     $this->add_control(
          'title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 h2' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Content Typography', 'vlcore' ),
               'name' => 'heading_content_typography',
               'selector' => '{{WRAPPER}} .heading1 p',
          ]
     );

     $this->add_control(
          'content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1 p' => 'color: {{VALUE}}',
               ],
          ]
     );

        $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>

     <div class="heading1">

          <?php if(!empty($settings['heading_sub_title'])) : ?>
          <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
               <?php if(!empty($settings['subtitle_icon']['url'])) : ?>
               <img src="<?php echo esc_url($settings['subtitle_icon']['url']); ?>" alt="">
               <?php endif; ?>
               <?php echo esc_html($settings['heading_sub_title']); ?>
          </span>
          <?php endif; ?>

          <?php if(!empty($settings['heading_title'])) : ?>
          <h2 class="text-anime-style-3"><?php echo esc_html($settings['heading_title']); ?></h2>
          <?php endif; ?>

          <?php if(!empty($settings['heading_text_content'])) : ?>
          <div class="space16"></div>
          <p data-aos="fade-up" style="font-size: 20px;" data-aos-duration="800"><?php echo esc_html($settings['heading_text_content']); ?></p>
          <?php endif; ?>

     </div>

<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_heading() );