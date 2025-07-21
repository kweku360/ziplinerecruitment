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


class VL_jobs extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-jobs';
	}

	public function get_title() {
		return __( 'VL Jobs', 'vlcore' );
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


     $this->start_controls_section(
          'job_content',
               [
                    'label' => esc_html__('Content', 'vlcore'),
               ]
          );

          $this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Job Details', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
			]
		);

          $this->add_control(
			'show_btn_icon',
			[
				'label' => esc_html__( 'Show Button Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


          
          $this->end_controls_section();

        $this->start_controls_section(
            'job_options',
            [
                    'label' => esc_html__('Options', 'vlcore'),
            ]
        );


        $this->add_control(
          'vl_job_post_count',
          [
               'label' => esc_html__( 'Post Count', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( '3', 'vlcore' ),
               'placeholder' => esc_html__( 'Post Count', 'vlcore' ),
          ]
          );



     $this->end_controls_section();


     $this->start_controls_section(
     'jobs_style',
          [
               'label' => esc_html__( 'Job Box Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'jobs_style_tabs'
     );
     
     $this->start_controls_tab(
          'job_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'job_box_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .job-post-box',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
               'label' => esc_html__( 'Job border Color', 'vlcore' ),
               'name' => 'job_border',
               'selector' => '{{WRAPPER}} .job-post-box',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Type Typography', 'vlcore' ),
               'name' => 'job_type_typography',
               'selector' => '{{WRAPPER}} .job-post-box .tag',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'job_box_type_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .job-post-box .tag',
          ]
     );

     $this->add_control(
          'job_type_color',
          [
               'label' => esc_html__( 'Job Type Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .tag' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Compnay Typography', 'vlcore' ),
               'name' => 'job_company_typography',
               'selector' => '{{WRAPPER}} .job-post-box .job-owners-area .text a',
          ]
     );

     $this->add_control(
          'job_company_color',
          [
               'label' => esc_html__( 'Job Company Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .job-owners-area .text a' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Location Typography', 'vlcore' ),
               'name' => 'job_location_typography',
               'selector' => '{{WRAPPER}} .job-post-box .job-owners-area .text p',
          ]
     );

     $this->add_control(
          'job_location_color',
          [
               'label' => esc_html__( 'Job Location Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .job-owners-area .text p' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Position Typography', 'vlcore' ),
               'name' => 'job_position_typography',
               'selector' => '{{WRAPPER}} .job-post-box .work-info h5',
          ]
     );

     $this->add_control(
          'job_position_color',
          [
               'label' => esc_html__( 'Job Position Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .work-info h5' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
               'label' => esc_html__( 'Job Middle border Color', 'vlcore' ),
               'name' => 'job_middle_border',
               'selector' => '{{WRAPPER}} .job-post-box .divider',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Salary Typography', 'vlcore' ),
               'name' => 'job_salary_typography',
               'selector' => '{{WRAPPER}} .job-post-box .work-info h6',
          ]
     );

     $this->add_control(
          'job_salary_color',
          [
               'label' => esc_html__( 'Job Salary Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .work-info h6' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Job Date Typography', 'vlcore' ),
               'name' => 'job_date_typography',
               'selector' => '{{WRAPPER}} .job-post-box .work-info span',
          ]
     );

     $this->add_control(
          'job_date_color',
          [
               'label' => esc_html__( 'Job Date Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .work-info span' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     $this->end_controls_tab();


     $this->start_controls_tab(
          'job_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );



     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'job_box_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .job-post-box:hover',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
               'label' => esc_html__( 'Job border Color', 'vlcore' ),
               'name' => 'job_hover_border',
               'selector' => '{{WRAPPER}} .job-post-box:hover',
          ]
     );


     $this->add_control(
          'job_company_hover_color',
          [
               'label' => esc_html__( 'Job Company Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .job-post-box .job-owners-area .text a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();


     $this->start_controls_section(
          'jobs_button_style',
               [
                    'label' => esc_html__( 'Job Button Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );
     
     
          $this->start_controls_tabs(
               'jobs_button_style_tabs'
          );
          
          $this->start_controls_tab(
               'job_button_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );


          $this->add_group_control(
               \Elementor\Group_Control_Background::get_type(),
               [
                    'name' => 'job_button_bg',
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .job-learn',
               ]
          );

          $this->add_group_control(
               \Elementor\Group_Control_Border::get_type(),
               [
                    'label' => esc_html__( 'Job Button Border', 'vlcore' ),
                    'name' => 'job_button_border',
                    'selector' => '{{WRAPPER}} .job-learn',
               ]
          );


          $this->add_group_control(
               \Elementor\Group_Control_Typography::get_type(),
               [
                    'label' => esc_html__( 'Job Button Typography', 'vlcore' ),
                    'name' => 'job_button_typography',
                    'selector' => '{{WRAPPER}} .job-learn',
               ]
          );
     
          $this->add_control(
               'job_button_color',
               [
                    'label' => esc_html__( 'Job Button Color', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                         '{{WRAPPER}} .job-learn' => 'color: {{VALUE}}',
                    ],
               ]
          );
          
          
          $this->end_controls_tab();
     
     
          $this->start_controls_tab(
               'job_button_style_hover_tab',
               [
                    'label' => esc_html__( 'Hover', 'vlcore' ),
               ]
          );


          $this->add_group_control(
               \Elementor\Group_Control_Background::get_type(),
               [
                    'name' => 'job_button_hover_bg',
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .job-learn::before, {{WRAPPER}} .job-learn::after',
               ]
          );

          $this->add_group_control(
               \Elementor\Group_Control_Border::get_type(),
               [
                    'label' => esc_html__( 'Job Button Border', 'vlcore' ),
                    'name' => 'job_button_hover_border',
                    'selector' => '{{WRAPPER}} .job-learn:hover',
               ]
          );

     
          $this->add_control(
               'job_button_hover_color',
               [
                    'label' => esc_html__( 'Job Button Color', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                         '{{WRAPPER}} .job-learn:hover' => 'color: {{VALUE}}',
                    ],
               ]
          );
     
     
          
          $this->end_controls_tab();
          $this->end_controls_tabs();
          $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          $args = array(
               'post_type' => 'jobs',
               'post_status' => 'publish',
               'posts_per_page' => $settings['vl_job_post_count'],
           );
           $vl_job_posts = new \WP_Query($args);


          ?>

<div class="job-page">
     <div class="container">
          <div class="row">


          <?php while ($vl_job_posts->have_posts()) : 
               $vl_job_posts->the_post();
               $recrute_job_company_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_job_company_logo') : '';
               $job_position = function_exists('tpmeta_field')? tpmeta_field('recrute_job_position') : '';
               $job_salary = function_exists('tpmeta_field')? tpmeta_field('recrute_job_salary') : '';
               $job_location = function_exists('tpmeta_field')? tpmeta_field('recrute_job_location') : '';
               $job_type = function_exists('tpmeta_field')? tpmeta_field('recrute_job_type') : '';
 
          ?>

               <div class="col-lg-4 col-md-6 mb-30">
                    <div class="job-post-box">
                         <p class="tag"><?php echo esc_html($job_type); ?></p>
                         <div class="job-owners-area">
                              <div class="image">
                                   <img src="<?php echo esc_url($recrute_job_company_icon['url']); ?>" alt="">
                              </div>
                              <div class="text">
                                   <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                   <p><?php echo esc_html($job_location); ?></p>
                              </div>
                         </div>
                         <div class="divider"></div>
                         <div class="work-info">
                              <h5><?php echo esc_html($job_position); ?></h5>
                              <h6><?php echo esc_html($job_salary); ?></h6>
                              <span>Posted : <?php echo get_the_date(); ?></span>
                         </div>
                         <div class="button">
                              <a class="job-learn" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['button_text']); ?> 
                              <?php if($settings['show_btn_icon'] == 'yes'): ?>
                              <span><i class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                         </div>
                    </div>
               </div>
               <?php endwhile; wp_reset_query(); ?>

          </div>
     </div>
</div>


<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_jobs() );