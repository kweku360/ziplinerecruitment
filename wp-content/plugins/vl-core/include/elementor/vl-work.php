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


class VL_work extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-work';
	}

	public function get_title() {
		return __( 'VL Work', 'vlcore' );
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
            'work_content_section',
            [
                    'label' => esc_html__('Content', 'vlcore'),
            ]
        );

        $this->add_control(
			'work_image',
			[
				'label' => esc_html__( 'Choose Image', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'work_image_2',
			[
				'label' => esc_html__( 'Choose Image 2', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'work_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Recruitment Technologies', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

        $this->add_control(
			'work_sub_title_icon',
			[
				'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'work_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Solving Recruitment Using Technology', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

        $this->add_control(
			'work_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Whether you are seeking temporary assignments, placements, or executive-level positions, our curated', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);


        $work_repeaters = new \Elementor\Repeater();

		$work_repeaters->add_control(
			'work_rep_title',
			[
				'label' => esc_html__( 'Title', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'vlcore' ),
				'label_block' => true,
			]
		);

		$work_repeaters->add_control(
			'work_rep_content',
			[
				'label' => esc_html__( 'Content', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Content' , 'vlcore' ),
				'show_label' => false,
			]
		);

        $work_repeaters->add_control(
			'work_rep_icon',
			[
				'label' => esc_html__( 'Choose Image Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $work_repeaters->add_control(
			'work_rep_url',
			[
				'label' => esc_html__( 'URL', 'vlcore' ),
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
			'work_repts',
			[
				'label' => esc_html__( 'Work Points', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $work_repeaters->get_controls(),
				'default' => [
					[
						'work_rep_title' => esc_html__( 'Sourcing the Best', 'vlcore' ),
						'work_rep_content' => esc_html__( 'Stay tuned for regular updates and valuable insights from our team of staffing experts.', 'vlcore' ),
					],
					[
						'work_rep_title' => esc_html__( 'Sourcing the Best', 'vlcore' ),
						'work_rep_content' => esc_html__( 'Stay tuned for regular updates and valuable insights from our team of staffing experts.', 'vlcore' ),
					],
				],
				'title_field' => '{{{ work_rep_title }}}',
			]
		);



        $this->end_controls_section();


        $this->start_controls_section(
        'content_style_heading',
        [
            'label' => esc_html__( 'Heading Style', 'vlcore' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
            'name' => 'work_sub_title_typography',
            'selector' => '{{WRAPPER}} .heading1 span.span',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'work_sub_title_bg',
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .heading1 span.span',
        ]
    );

    $this->add_control(
        'work_sub_title_color',
        [
            'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .heading1 span.span' => 'color: {{VALUE}}',
            ],
        ]
    );



    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Title Typography', 'vlcore' ),
            'name' => 'work_title_typography',
            'selector' => '{{WRAPPER}} .heading1 h2',
        ]
    );

    $this->add_control(
        'work_title_color',
        [
            'label' => esc_html__( 'Title Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .heading1 h2' => 'color: {{VALUE}}',
            ],
        ]
    );


    $this->end_controls_section();

    $this->start_controls_section(
        'content_style_icon_box',
        [
            'label' => esc_html__( 'Icon Box Style', 'vlcore' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    $this->start_controls_tabs(
        'content_style_icon_box_tabs'
    );
    
    $this->start_controls_tab(
        'content_style_icon_box_normal_tab',
        [
            'label' => esc_html__( 'Normal', 'vlcore' ),
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'work_icon_box_bg',
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .work1 .work1-box, {{WRAPPER}} .others6 .others-boxs,  {{WRAPPER}} .others8 .others-boxs',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'work_icon_box_icon_bg',
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .work1 .work1-box .icon, {{WRAPPER}} .others6 .others-boxs .icon, {{WRAPPER}} .others8 .others-boxs .icon',
        ]
    );


    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Title Typography', 'vlcore' ),
            'name' => 'icon_title_box_typography',
            'selector' => '{{WRAPPER}} .work1 .work1-box .heading1 h4 a, {{WRAPPER}} .heading6 h4 a, {{WRAPPER}} .others8 .others-boxs .heading8 h4 a',
        ]
    );

    $this->add_control(
        'work_icon_box_title_color',
        [
            'label' => esc_html__( 'Title Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .work1 .work1-box .heading1 h4 a' => 'color: {{VALUE}}',
                '{{WRAPPER}} .heading6 h4 a' => 'color: {{VALUE}}',
                '{{WRAPPER}} .others8 .others-boxs .heading8 h4 a' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Content Typography', 'vlcore' ),
            'name' => 'icon_content_box_typography',
            'selector' => '{{WRAPPER}} .work1 .work1-box .heading1 p, {{WRAPPER}} .heading6 p, {{WRAPPER}} .others8 .others-boxs .heading8 p',
        ]
    );

    $this->add_control(
        'work_icon_box_content_color',
        [
            'label' => esc_html__( 'Content Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .work1 .work1-box .heading1 p' => 'color: {{VALUE}}',
                '{{WRAPPER}} .heading6 p' => 'color: {{VALUE}}',
                '{{WRAPPER}} .others8 .others-boxs .heading8 p' => 'color: {{VALUE}}',
            ],
        ]
    );

    
    $this->end_controls_tab();

    $this->start_controls_tab(
        'content_style_icon_box_hover_tab',
        [
            'label' => esc_html__( 'Hover', 'vlcore' ),
        ]
    );


    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'work_icon_box_hover_bg',
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .work1 .work1-box:hover',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'work_icon_box_hover_icon_bg',
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .work1 .work1-box:hover .icon',
        ]
    );


    $this->add_control(
        'work_icon_box_hover_title_color',
        [
            'label' => esc_html__( 'Title Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .work1 .work1-box:hover .heading1 h4 a' => 'color: {{VALUE}}',
            ],
        ]
    );


    $this->add_control(
        'work_icon_box_hover_content_color',
        [
            'label' => esc_html__( 'Content Color', 'vlcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .work1 .work1-box:hover .heading1 p' => 'color: {{VALUE}}',
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

<div class="work1 sp">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">
                <?php if(!empty($settings['work_image']['url'])) : ?>
                    <div class="work-img overlay-anim">
                         <img src="<?php echo esc_url($settings['work_image']['url']); ?>" alt="">
                    </div>
               </div>
               <?php endif; ?>


               <div class="col-lg-6">
                    <div class="heading1 work1-heading">
                        <?php if(!empty($settings['work_sub_title'])) : ?>
                         <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><?php echo esc_html($settings['work_sub_title']); ?></span>
                            <?php endif; ?>

                        <?php if(!empty($settings['work_title'])) : ?>
                         <h2 class="text-anime-style-3"><?php echo esc_html($settings['work_title']); ?></h2>
                         <?php endif; ?>

                         <?php if(!empty($settings['work_content'])) : ?>
                         <div class="space16"></div>
                         <p data-aos="fade-left" data-aos-duration="900"><?php echo esc_html($settings['work_content']); ?></p>
                        <?php endif; ?>

                         <div class="space10"></div>

                        <?php foreach($settings['work_repts'] as $work_rept) : ?>

                         <div class="" data-aos="fade-left" data-aos-duration="900">
                              <div class="work1-box">
                                   <div class="">
                                    <?php if(!empty($work_rept['work_rep_icon']['url'])) : ?>
                                        <div class="icon">
                                             <img src="<?php echo esc_url($work_rept['work_rep_icon']['url']); ?>" alt="">
                                        </div>
                                        <?php endif; ?>
                                   </div>
                                   <div class="heading1">

                                    <?php if(!empty($work_rept['work_rep_title'])) : ?>
                                        <h4><a href="<?php echo esc_url($work_rept['work_rep_url']['url']); ?>"><?php echo esc_html($work_rept['work_rep_title']); ?></a></h4>
                                        <?php endif; ?>

                                        <?php if(!empty($work_rept['work_rep_content'])) : ?>
                                        <p><?php echo esc_html($work_rept['work_rep_content']); ?></p>
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

<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>

<div class="others6">
     <div class="container">
          <div class="row">
            
               <div class="col-lg-6">
               <?php foreach($settings['work_repts'] as $work_rept) : ?>
                    <div class="" data-aos="fade-right" data-aos-duration="800">
                         <div class="others-boxs">
                              <div class="">
                                <?php if(!empty($work_rept['work_rep_icon']['url'])) : ?>
                                    <div class="icon">
                                            <img src="<?php echo esc_url($work_rept['work_rep_icon']['url']); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                              </div>
                              <div class="heading6">
                              <?php if(!empty($work_rept['work_rep_title'])) : ?>
                                <h4><a href="<?php echo esc_url($work_rept['work_rep_url']['url']); ?>"><?php echo esc_html($work_rept['work_rep_title']); ?></a></h4>
                                <?php endif; ?>
                                <?php if(!empty($work_rept['work_rep_content'])) : ?>
                                        <p><?php echo esc_html($work_rept['work_rep_content']); ?></p>
                                        <?php endif; ?>
                              </div>
                         </div>
                    </div>
                    <?php endforeach; ?>

               </div>
               <div class="col-lg-6">
                    <div class="images-all">
                        
                        <?php if(!empty($settings['work_image']['url'])) : ?>
                         <div class="image1" data-aos="flip-right" data-aos-duration="800">
                              <img src="<?php echo esc_url($settings['work_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['work_image_2']['url'])) : ?>
                         <div class="image2" data-aos="zoom-out" data-aos-duration="1000">
                              <img src="<?php echo esc_url($settings['work_image_2']['url']); ?>" alt="">
                         </div>
                        <?php endif; ?>

                    </div>
               </div>
          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>
<div class="others8">
     <div class="container">
          <div class="row align-items-center">
               <div class="col-lg-6">

               <?php foreach($settings['work_repts'] as $work_rept) : ?>
                    <div class="" data-aos="fade-right" data-aos-duration="800">
                         <div class="others-boxs">
                              <div class="">
                              <?php if(!empty($work_rept['work_rep_icon']['url'])) : ?>
                                    <div class="icon">
                                            <img src="<?php echo esc_url($work_rept['work_rep_icon']['url']); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                              </div>
                              <div class="heading8">
                              <?php if(!empty($work_rept['work_rep_title'])) : ?>
                                <h4><a href="<?php echo esc_url($work_rept['work_rep_url']['url']); ?>"><?php echo esc_html($work_rept['work_rep_title']); ?></a></h4>
                                <?php endif; ?>
                                <?php if(!empty($work_rept['work_rep_content'])) : ?>
                                        <p><?php echo esc_html($work_rept['work_rep_content']); ?></p>
                                        <?php endif; ?>
                              </div>
                         </div>
                    </div>
                    <?php endforeach; ?>

               </div>
               <div class="col-lg-6">
                    <div class="images-all">

                        <?php if(!empty($settings['work_image']['url'])) : ?>
                         <div class="image1">
                              <img src="<?php echo esc_url($settings['work_image']['url']); ?>" alt="">
                         </div>
                         <?php endif; ?>

                         <?php if(!empty($settings['work_image_2']['url'])) : ?>
                         <div class="image2">
                              <img src="<?php echo esc_url($settings['work_image_2']['url']); ?>" alt="">
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

$widgets_manager->register( new VL_work() );