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


class VL_worksteps extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-work-steps';
	}

	public function get_title() {
		return __( 'VL Work Steps', 'vlcore' );
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // layout Panel
        $this->start_controls_section(
            'work_step_contents',
            [
                    'label' => esc_html__('Content', 'vlcore'),
            ]
        );


        $work_steps_repeater = new \Elementor\Repeater();

        $work_steps_repeater->add_control(
             'workstep_number',
             [
                  'label' => esc_html__( 'Step Number', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => esc_html__( '01' , 'vlcore' ),
                  'label_block' => true,
             ]
        );

        $work_steps_repeater->add_control(
          'step_title',
          [
               'label' => esc_html__( 'Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Applicant Review' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $work_steps_repeater->add_control(
          'step_url',
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

        $work_steps_repeater->add_control(
             'step_content',
             [
                  'label' => esc_html__( 'Content', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::TEXTAREA,
                  'default' => esc_html__( 'The applicant review process is vital step in ensuring that only.' , 'vlcore' ),
                  'show_label' => false,
             ]
        );

        $work_steps_repeater->add_control(
          'work_step_img_1',
          [
               'label' => esc_html__( 'Choose Image 1', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $work_steps_repeater->add_control(
          'work_step_img_2',
          [
               'label' => esc_html__( 'Choose Image 2', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );



        $this->add_control(
             'work_steps',
             [
                  'label' => esc_html__( 'Work Steps', 'vlcore' ),
                  'type' => \Elementor\Controls_Manager::REPEATER,
                  'fields' => $work_steps_repeater->get_controls(),
                  'default' => [
                       [
                            'step_title' => esc_html__( 'Job Analysis', 'vlcore' ),
                            'step_content' => esc_html__( 'Job analysis is a critical process understanding defining specific.', 'vlcore' ),
                       ],
                       [
                            'step_title' => esc_html__( 'Job Analysis', 'vlcore' ),
                            'step_content' => esc_html__( 'IJob analysis is a critical process understanding defining specific.', 'vlcore' ),
                       ],
                  ],
                  'title_field' => '{{{ step_title }}}',
             ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
               'step_content_style',
               [
                         'label' => esc_html__( 'Style', 'vlcore' ),
                         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );

          $this->start_controls_tabs(
               'step_content_style_tabs'
          );
          
          $this->start_controls_tab(
               'step_content_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .work-box .heading-area, {{WRAPPER}} .work10 .work-box .image-area .image, {{WRAPPER}} .work10 .work-box .heading',
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Title Typography', 'vlcore' ),
				'name' => 'step_title_typo',
				'selector' => '{{WRAPPER}} .work10 .work-box .heading h4 a, {{WRAPPER}} .work8 .work87-box .heading h4 a, {{WRAPPER}} .work-box .heading-area h3 a, {{WRAPPER}} .work7 .work87-box .heading h4 a',
			]
		);

          $this->add_control(
			'step_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-box .heading-area h3 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work7 .work87-box .heading h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work8 .work87-box .heading h4 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work10 .work-box .heading h4 a' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Content Typography', 'vlcore' ),
				'name' => 'step_content_typo',
				'selector' => '{{WRAPPER}} .work10 .work-box .heading p, {{WRAPPER}} .work8 .work87-box .heading p, {{WRAPPER}} .work-box .heading-area p, {{WRAPPER}} .work7 .work87-box .heading p',
			]
		);

          $this->add_control(
			'step_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-box .heading-area p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work7 .work87-box .heading p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work8 .work87-box .heading p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work10 .work-box .heading p' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                    'label' => esc_html__( 'Steps Typography', 'vlcore' ),
				'name' => 'step__typo',
				'selector' => '{{WRAPPER}} .work10 .work-box .image-area .step',
			]
		);

          $this->add_control(
			'step__color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work10 .work-box .image-area .step' => 'color: {{VALUE}}',
				],
			]
		);

          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_step_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .work10 .work-box .image-area .step',
			]
		);


          
          $this->end_controls_tab();

          $this->start_controls_tab(
               'step_content_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );


          $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .work-box:hover .heading-area, {{WRAPPER}} .work10 .work-box:hover .heading',
			]
		);

          $this->add_control(
			'step_hover_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-box:hover .heading-area h3 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work10 .work-box:hover .heading h4 a' => 'color: {{VALUE}}',
				],
			]
		);


          $this->add_control(
			'step_hover_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-box:hover .heading-area p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work10 .work-box:hover .heading p' => 'color: {{VALUE}}',
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

<?php if($settings['vl_design_style'] == 'layout-1') : ?>
<div class="work6">
     <div class="container">
          <div class="col-lg-10 m-auto">
               <div class="row">


                    <?php foreach($settings['work_steps'] as $work_step) : ?>

                    <div class="col-lg-4 col-md-6">
                         <div class="work-box" data-aos="zoom-in-up" data-aos-duration="800">
                              <div class="image-area">

                                   <?php if(!empty($work_step['work_step_img_1']['url'])) : ?>
                                   <div class="image1">
                                        <img src="<?php echo esc_url($work_step['work_step_img_1']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($work_step['work_step_img_2']['url'])) : ?>
                                   <div class="image2 overlay-anim">
                                        <img src="<?php echo esc_url($work_step['work_step_img_2']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>
                              </div>
                              <div class="heading-area">
                                   <?php if(!empty($work_step['step_title'])) : ?>
                                   <h3><a
                                             href="<?php echo esc_url($work_step['step_url']['url']); ?>"><?php echo esc_html($work_step['step_title']); ?></a>
                                   </h3>
                                   <?php endif; ?>

                                   <?php if(!empty($work_step['step_content'])) : ?>
                                   <p><?php echo esc_html($work_step['step_content']); ?></p>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>

                    <?php endforeach; ?>

               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>

<div class="work7">
     <div class="container">
          <div class="row _relative">

               <?php foreach($settings['work_steps'] as $work_step) : ?>
               <div class="col-lg-4 col-md-6">
                    <div class="work87-box" data-aos="fade-up" data-aos-duration="800">
                         <?php if(!empty($work_step['work_step_img_1']['url'])) : ?>
                         <div class="icon">
                              <img src="<?php echo esc_url($work_step['work_step_img_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>
                         <div class="heading">
                              <?php if(!empty($work_step['step_title'])) : ?>
                              <h4><a
                                        href="<?php echo esc_url($work_step['step_url']['url']); ?>"><?php echo esc_html($work_step['step_title']); ?></a>
                              </h4>
                              <?php endif; ?>

                              <?php if(!empty($work_step['step_content'])) : ?>
                              <p><?php echo esc_html($work_step['step_content']); ?></p>
                              <?php endif; ?>

                         </div>
                         <?php if(!empty($work_step['work_step_img_2']['url'])) : ?>
                         <img src="<?php echo esc_url($work_step['work_step_img_2']['url']); ?>" alt="" class="shape1">
                         <?php endif; ?>
                    </div>
               </div>
               <?php endforeach; ?>

          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>
<div class="work8">
     <div class="container">
          <div class="row _relative">

               <?php foreach($settings['work_steps'] as $work_step) : ?>
               <div class="col-lg-4 col-md-6">
                    <div class="work87-box" data-aos="zoom-in-up" data-aos-duration="1200">

                         <?php if(!empty($work_step['work_step_img_1']['url'])) : ?>
                         <div class="icon">
                              <img src="<?php echo esc_url($work_step['work_step_img_1']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <div class="heading">
                              <?php if(!empty($work_step['step_title'])) : ?>
                              <h4><a
                                        href="<?php echo esc_url($work_step['step_url']['url']); ?>"><?php echo esc_html($work_step['step_title']); ?></a>
                              </h4>
                              <?php endif; ?>

                              <?php if(!empty($work_step['step_content'])) : ?>
                              <p><?php echo esc_html($work_step['step_content']); ?></p>
                              <?php endif; ?>
                         </div>

                         <?php if(!empty($work_step['work_step_img_2']['url'])) : ?>
                         <img src="<?php echo esc_url($work_step['work_step_img_2']['url']); ?>" alt="" class="shape1">
                         <?php endif; ?>

                    </div>
               </div>
               <?php endforeach; ?>

          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-4') : ?>
<div class="work9">
     <div class="container">
          <div class="col-lg-10 m-auto">
               <div class="row">

                    <?php foreach($settings['work_steps'] as $work_step) : ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="1200">
                         <div class="work-box">
                              <div class="image-area">
                                   <?php if(!empty($work_step['work_step_img_1']['url'])) : ?>
                                   <div class="image1">
                                        <img src="<?php echo esc_url($work_step['work_step_img_1']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>

                                   <?php if(!empty($work_step['work_step_img_2']['url'])) : ?>
                                   <div class="image2 overlay-anim">
                                        <img src="<?php echo esc_url($work_step['work_step_img_2']['url']); ?>" alt="">
                                   </div>
                                   <?php endif; ?>
                              </div>
                              <div class="heading-area">
                                   <?php if(!empty($work_step['step_title'])) : ?>
                                   <h3><a
                                             href="<?php echo esc_url($work_step['step_url']['url']); ?>"><?php echo esc_html($work_step['step_title']); ?></a>
                                   </h3>
                                   <?php endif; ?>

                                   <?php if(!empty($work_step['step_content'])) : ?>
                                   <p><?php echo esc_html($work_step['step_content']); ?></p>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>
                    <?php endforeach; ?>

               </div>
          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-5') : ?>

<div class="work10">
     <div class="container">
          <div class="row">
               <div class="col-lg-10 m-auto">
                    <div class="row">

                         <?php foreach($settings['work_steps'] as $work_step) : ?>
                         <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="700">
                              <div class="work-box">
                                   <div class="image-area">
                                        <?php if(!empty($work_step['work_step_img_1']['url'])) : ?>
                                        <div class="image overlay-anim">
                                             <img src="<?php echo esc_url($work_step['work_step_img_1']['url']); ?>"
                                                  alt="">
                                        </div>
                                        <?php endif; ?>
                                        <?php if(!empty($work_step['workstep_number'])) : ?>
                                        <div class="step">
                                             <p><?php echo esc_html($work_step['workstep_number']); ?></p>
                                        </div>
                                        <?php endif; ?>
                                   </div>
                                   <div class="heading">
                                        <?php if(!empty($work_step['step_title'])) : ?>
                                        <h4><a
                                                  href="<?php echo esc_url($work_step['step_url']['url']); ?>"><?php echo esc_html($work_step['step_title']); ?></a>
                                        </h4>
                                        <?php endif; ?>

                                        <?php if(!empty($work_step['step_content'])) : ?>
                                        <p><?php echo wp_kses_post($work_step['step_content']); ?></p>
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

<?php endif; ?>



<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_worksteps() );