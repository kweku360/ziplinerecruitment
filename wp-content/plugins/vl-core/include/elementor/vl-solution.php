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


class VL_solution extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-solution';
	}

	public function get_title() {
		return __( 'VL Solution', 'vlcore' );
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // layout Panel
        $this->start_controls_section(
            'solution_content',
            [
                    'label' => esc_html__('Content', 'vlcore'),
            ]
        );

        $solution_repts = new \Elementor\Repeater();

        $solution_repts->add_control(
             'solution_title',
             [
                  'label' => esc_html__( 'Title', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => esc_html__( 'Highest Success Rates' , 'vlcore' ),
                  'label_block' => true,
             ]
        );

        $solution_repts->add_control(
             'solution_content',
             [
                  'label' => esc_html__( 'Content', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::TEXTAREA,
                  'default' => esc_html__( 'Whether youre looking for temporary staffing, direct hire placements, or executive search' , 'vlcore' ),
                  'show_label' => false,
             ]
        );


        $solution_repts->add_control(
          'solution_image',
          [
               'label' => esc_html__( 'Choose Image', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $solution_repts->add_control(
          'solution_image_icon',
          [
               'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $solution_repts->add_control(
          'solution_button_text',
          [
               'label' => esc_html__( 'Button Text', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Learn More' , 'vlcore' ),
               'label_block' => true,
          ]
     );


     $solution_repts->add_control(
          'solution_url',
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
             'solution_repeaters',
             [
                  'label' => esc_html__( 'Solutions', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::REPEATER,
                  'fields' => $solution_repts->get_controls(),
                  'default' => [
                       [
                            'solution_title' => esc_html__( 'Highest Success Rates', 'vlcore' ),
                            'solution_content' => esc_html__( 'Whether you are looking for temporary staffing, direct hire placements, or executive search', 'vlcore' ),
                       ],
                       [
                            'solution_title' => esc_html__( 'Highest Success Rates', 'vlcore' ),
                            'solution_content' => esc_html__( 'Whether you are looking for temporary staffing, direct hire placements, or executive search', 'vlcore' ),
                       ],
                  ],
                  'title_field' => '{{{ solution_title }}}',
             ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
        'solution_style',
               [
                    'label' => esc_html__( 'Box Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );


          $this->start_controls_tabs(
               'solution_style_tabs'
          );
          
          $this->start_controls_tab(
               'solution_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'solution_box_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .solution4-box, {{WRAPPER}} .service-benefits5 .benefits-box::before, {{WRAPPER}} .solutions9 .solutions-box',
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Title Typography', 'vlcore' ),
				'name' => 'solution_title_typography',
				'selector' => '{{WRAPPER}} .heading4 h4 a, {{WRAPPER}} .service-benefits5 .benefits-box h4 a, {{WRAPPER}} .solutions9 .solutions-box .heading-area .heading h4 a',
			]
		);

          $this->add_control(
			'solution_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading4 h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-benefits5 .benefits-box h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .solutions9 .solutions-box .heading-area .heading h4 a' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'solution_content_typography',
				'selector' => '{{WRAPPER}} .heading4 p, {{WRAPPER}} .service-benefits5 .benefits-box p, {{WRAPPER}} .solutions9 .solutions-box .heading-area .heading p',
			]
		);

          $this->add_control(
			'solution_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-benefits5 .benefits-box p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .solutions9 .solutions-box .heading-area .heading p' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Button Typography', 'vlcore' ),
				'name' => 'solution_button_typography',
				'selector' => '{{WRAPPER}} .service-benefits5 .benefits-box a.learn',
			]
		);

          $this->add_control(
			'solution_button_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-benefits5 .benefits-box a.learn' => 'color: {{VALUE}}',
				],
			]
		);

          
          $this->end_controls_tab();

          $this->start_controls_tab(
               'solution_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'solution_box_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .service-benefits5 .benefits-box::after',
			]
		);


          $this->add_control(
			'solution_hover_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-benefits5 .benefits-box:hover h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .solutions9 .solutions-box .heading-area .heading h4 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_control(
			'solution_hover_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-benefits5 .benefits-box:hover p' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_control(
			'solution_button_hover_color',
			[
				'label' => esc_html__( 'Button Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-benefits5 .benefits-box:hover a.learn' => 'color: {{VALUE}}',
				],
			]
		);

          
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();

     $this->start_controls_section(
     'solution_icon_style',
               [
                    'label' => esc_html__( 'Icon Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
     );

          $this->start_controls_tabs(
               'solution_icon_style_tabs'
          );
          
          $this->start_controls_tab(
               'solution_icon_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'solution_icon_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .solution4-box .icon, {{WRAPPER}} .service-benefits5 .benefits-box .icon, {{WRAPPER}} .solutions9 .solutions-box .heading-area .icon',
          ]
     );


          
          $this->end_controls_tab();

          $this->start_controls_tab(
               'solution__icon_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );
          
          $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'solution_hover_icon_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .solution4-box:hover .icon, {{WRAPPER}} .service-benefits5 .benefits-box:hover .icon',
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

<div class="solution4">
     <div class="container">
          <div class="row">
               <?php foreach($settings['solution_repeaters'] as $solution_repeater) : ?>
               <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
                    <div class="solution4-box">

                         <?php if(!empty($solution_repeater['solution_image']['url'])) : ?>
                         <div class="image overlay-anim">
                              <img src="<?php echo esc_url($solution_repeater['solution_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($solution_repeater['solution_image_icon']['url'])) : ?>
                         <div class="icon">
                              <img src="<?php echo esc_url($solution_repeater['solution_image_icon']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <div class="heading4">

                              <?php if(!empty($solution_repeater['solution_title'])) : ?>
                              <h4><a href="<?php echo esc_url($solution_repeater['solution_url']['url']); ?>"><?php echo esc_html($solution_repeater['solution_title']); ?></a></h4>
                              <?php endif; ?>

                              <?php if(!empty($solution_repeater['solution_content'])) : ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($solution_repeater['solution_content']); ?></p>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
               <?php endforeach; ?>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>
<div class="service-benefits5 ">
     <div class="container">
          <div class="row">

          <?php foreach($settings['solution_repeaters'] as $solution_repeater) : ?>
               <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="700">
                    <div class="benefits-box">
                         <?php if(!empty($solution_repeater['solution_image_icon']['url'])) : ?>
                         <div class="icon">
                              <img src="<?php echo esc_url($solution_repeater['solution_image_icon']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>
                         <div class="heading2">

                              <?php if(!empty($solution_repeater['solution_title'])) : ?>
                              <h4><a href="<?php echo esc_url($solution_repeater['solution_url']['url']); ?>"><?php echo esc_html($solution_repeater['solution_title']); ?></a></h4>
                              <?php endif; ?>

                              <?php if(!empty($solution_repeater['solution_content'])) : ?>
                              <div class="space16"></div>
                              <p><?php echo esc_html($solution_repeater['solution_content']); ?></p>
                              <?php endif; ?>

                              <?php if(!empty($solution_repeater['solution_button_text'])) : ?>
                              <div class="space16"></div>
                              <a href="<?php echo esc_url($solution_repeater['solution_url']['url']); ?>" class="learn"><?php echo esc_html($solution_repeater['solution_button_text']); ?> <span><i  class="fa-solid fa-arrow-right"></i></span></a>
                              <?php endif; ?>
                         </div>
                    </div>
               </div>
               <?php endforeach; ?>


          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>
<div class="solutions9">
     <div class="container">
          <div class="row">

          <?php foreach($settings['solution_repeaters'] as $solution_repeater) : ?>
               <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="800">
                    <div class="solutions-box">

                         <?php if(!empty($solution_repeater['solution_image']['url'])) : ?>
                         <div class="image overlay-anim">
                              <img src="<?php echo esc_url($solution_repeater['solution_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <div class="heading-area">
                              <?php if(!empty($solution_repeater['solution_image_icon']['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($solution_repeater['solution_image_icon']['url']); ?>" alt="">
                              </div>
                              <?php endif; ?>
                              <div class="heading">

                              <?php if(!empty($solution_repeater['solution_title'])) : ?>
                              <h4><a href="<?php echo esc_url($solution_repeater['solution_url']['url']); ?>"><?php echo esc_html($solution_repeater['solution_title']); ?></a></h4>
                              <?php endif; ?>

                              <?php if(!empty($solution_repeater['solution_content'])) : ?>
                              <p><?php echo esc_html($solution_repeater['solution_content']); ?></p>
                              <?php endif; ?>

                              </div>
                         </div>
                    </div>
               </div>
               <?php endforeach; ?>

          </div>
     </div>
</div>

<?php endif; ?>


<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_solution() );