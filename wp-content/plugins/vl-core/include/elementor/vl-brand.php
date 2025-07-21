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


class VL_brand extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-brand';
	}

	public function get_title() {
		return __( 'VL Brand', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_brand' ];
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
			'logo_heading',
			[
				'label' => esc_html__( 'Heading', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'More Than 5K+ Brands With Work Recrute', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);


          $this->add_control(
			'image_slider_1',
			[
				'label' => esc_html__( 'Add Images', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

          $this->add_control(
			'show_gallary_2',
			[
				'label' => esc_html__( 'Show Gallay 2', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

          $this->add_control(
			'image_slider_2',
			[
				'label' => esc_html__( 'Add Images', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
                    'condition' => [
                         'show_gallary_2' => 'yes'
                    ]
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



          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'logo_carousel_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hero1-slider',
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Heading Typography', 'vlcore' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .slider-pera p',
			]
		);

          $this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-pera p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>

<?php if($settings['vl_design_style'] == 'layout-1') : ?>
<div class="hero1-slider">
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <?php if(!empty($settings['image_slider_1'])) :  ?>
                    <div class="logo-slider">

                         <?php foreach($settings['image_slider_1'] as $gallery1) : ?>
                         <div class="single-slider">
                              <img src="<?php echo esc_url($gallery1['url']); ?>" alt="">
                         </div>

                         <?php endforeach; ?>

                    </div>
                    <?php endif; ?>
                    
               </div>
          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-2'): ?>

<div class="logo-slider-area sp">
     <?php if(!empty($settings['logo_heading'])) : ?>
     <div class="container">
          <div class="row">
               <div class="slider-pera">
                    <p><?php echo esc_html($settings['logo_heading']); ?></p>
               </div>
          </div>
     </div>
     <?php endif; ?>

     <div class="container-fluid">
          <div class="row">
               <div class="col-lg-12">
                    <div class="slider-all">

                         <?php if(!empty($settings['image_slider_1'])) :  ?>
                         <div class="logo-slider3">

                         <?php foreach($settings['image_slider_1'] as $gallery1) : ?>
                              <div class="single-slider">
                                   <img src="<?php echo esc_url($gallery1['url']); ?>" alt="">
                              </div>
                         <?php endforeach; ?>
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['image_slider_2'])) :  ?>
                         <div class="logo-slider4">

                              <?php foreach($settings['image_slider_2'] as $gallery2) : ?>
                                   <div class="single-slider">
                                        <img src="<?php echo esc_url($gallery2['url']); ?>" alt="">
                                   </div>
                              <?php endforeach; ?>

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

$widgets_manager->register( new VL_brand() );