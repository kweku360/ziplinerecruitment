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


class VL_team extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-team';
	}

	public function get_title() {
		return __( 'VL Team', 'vlcore' );
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
     'content',
          [
               'label' => esc_html__('Content', 'vlcore'),
          ]
     );

     $this->add_control(
          'vl_team_image',
          [
               'label' => esc_html__( 'Choose Image', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
     );

     $this->add_control(
          'vl_team_title',
          [
               'label' => esc_html__( 'Title', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Sameer Rizvi', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_team_position',
          [
               'label' => esc_html__( 'Position', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Senior Consultant', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_team_url',
          [
               'label' => esc_html__( 'Team URL', 'vlcore' ),
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





     $this->end_controls_section();

     $this->start_controls_section(
          'team_social',
               [
                    'label' => esc_html__('Socials', 'vlcore'),
               ]
      );


      $this->add_control(
          'vl_social_facebook_url',
          [
               'label' => esc_html__( 'Facebook URL', 'vlcore' ),
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
          'vl_social_instagram_url',
          [
               'label' => esc_html__( 'Instagram URL', 'vlcore' ),
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
          'vl_social_linkedin_url',
          [
               'label' => esc_html__( 'LinkedIn URL', 'vlcore' ),
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
          'vl_social_x_url',
          [
               'label' => esc_html__( 'X/Twitter URL', 'vlcore' ),
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


     $this->end_controls_section();


     $this->start_controls_section(
     'content_style',
          [
               'label' => esc_html__( 'Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'team_style_tabs'
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
               'name' => 'team_single_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .team4-box .heading4, {{WRAPPER}} .team1-box .heading-area, {{WRAPPER}} .team3-box, {{WRAPPER}} .team-box .heading-area, {{WRAPPER}} .team7 .team-box',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'team_single_image_overly',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .image-area .image::after, {{WRAPPER}} .team4-box .image-area::after',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'team_title_typography',
               'selector' => '{{WRAPPER}} .heading4 h4 a, {{WRAPPER}} .team-box h5 a, {{WRAPPER}} .heading-area .heading1 h4 a, {{WRAPPER}} .heading3 h4 a, {{WRAPPER}} .team-box .heading-area h4 a',
          ]
     );

     $this->add_control(
          'team_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .team-box h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading-area .heading1 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-box .heading-area h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h4 a' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Position Typography', 'vlcore' ),
               'name' => 'team_position_typography',
               'selector' => '{{WRAPPER}} .heading4 p, {{WRAPPER}} .team-box p, {{WRAPPER}} .heading-area .heading1 p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .team-box .heading-area p',
          ]
     );

     $this->add_control(
          'team_position_color',
          [
               'label' => esc_html__( 'Position Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .team-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading-area .heading1 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-box .heading-area p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
               ],
          ]
     );



     $this->add_control(
          'team_social_color',
          [
               'label' => esc_html__( 'Social Icon Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading-area .icons ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .image-area .icons ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .image .hover-area ul li a' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'team_social_icon_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .heading-area .icons ul li a, {{WRAPPER}} .image-area .icons ul li a, {{WRAPPER}} .image .hover-area ul li a',
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
               'name' => 'team_single_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .team7 .team-box:hover',
          ]
     );


     $this->add_control(
          'team_title_hover_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .team-box h5 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading-area .heading1 h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-box .heading-area h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h4 a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_control(
          'team_social_hover_color',
          [
               'label' => esc_html__( 'Social Icon Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading-area .icons ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .image-area .icons ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .image .hover-area ul li a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'team_social_hover_icon_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .heading-area .icons ul li a:hover, {{WRAPPER}} .image-area .icons ul li a:hover, {{WRAPPER}} .image .hover-area ul li a:hover',
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
<div class="team1">

     <div class="team1-box overlay-anim">
          <?php if(!empty($settings['vl_team_image']['url'])) : ?>
          <div class="image">
               <img src="<?php echo esc_url($settings['vl_team_image']['url']); ?>" alt="">
          </div>
          <?php endif; ?>

          <div class="heading-area">
               <div class="heading1">

                    <?php if(!empty($settings['vl_team_title'])) : ?>
                    <h4><a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>"><?php echo esc_html($settings['vl_team_title']); ?></a></h4>
                    <?php endif; ?>

                    <?php if(!empty($settings['vl_team_position'])) : ?>
                    <p><?php echo esc_html($settings['vl_team_position']); ?></p>
                    <?php endif; ?>

               </div>

               <div class="icons">
                    <ul>
                         <?php if(!empty($settings['vl_social_facebook_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_facebook_url']['url']); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_instagram_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_instagram_url']['url']); ?>"><i class="fa-brands fa-instagram"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_linkedin_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_linkedin_url']['url']); ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_x_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_x_url']['url']); ?>"><i class="fab fa-twitter"></i></a></li>
                         <?php endif; ?>

                    </ul>
               </div>

          </div>

     </div>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-2'): ?>

<div class="team3 ">

     <div class="team3-box">
          <div class="image-area">
               <?php if(!empty($settings['vl_team_image']['url'])) : ?>
               <div class="image">
                    <img src="<?php echo esc_url($settings['vl_team_image']['url']); ?>" alt="">
               </div>
               <?php endif; ?>
               <div class="icons">
                    <ul>
                         <?php if(!empty($settings['vl_social_facebook_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_facebook_url']['url']); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_instagram_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_instagram_url']['url']); ?>"><i class="fa-brands fa-instagram"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_linkedin_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_linkedin_url']['url']); ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_x_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_x_url']['url']); ?>"><i class="fab fa-twitter"></i></a></li>
                         <?php endif; ?>
                    </ul>
               </div>
          </div>
          <div class="heading3">

               <?php if(!empty($settings['vl_team_title'])) : ?>
               <h4><a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>"><?php echo esc_html($settings['vl_team_title']); ?></a></h4>
               <?php endif; ?>

               <?php if(!empty($settings['vl_team_position'])) : ?>
               <p><?php echo esc_html($settings['vl_team_position']); ?></p>
               <?php endif; ?>

          </div>
     </div>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-3'): ?>

<div class="team6">

     <div class="team-box">
          <div class="image image-anime">
               <?php if(!empty($settings['vl_team_image']['url'])) : ?>
               <img src="<?php echo esc_url($settings['vl_team_image']['url']); ?>" alt="">
               <?php endif; ?>
               <div class="hover-area">
                    <ul>
                         <?php if(!empty($settings['vl_social_facebook_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_facebook_url']['url']); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_instagram_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_instagram_url']['url']); ?>"><i class="fa-brands fa-instagram"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_linkedin_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_linkedin_url']['url']); ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                         <?php endif; ?>

                         <?php if(!empty($settings['vl_social_x_url']['url'])) : ?>
                         <li><a href="<?php echo esc_url($settings['vl_social_x_url']['url']); ?>"><i class="fab fa-twitter"></i></a></li>
                         <?php endif; ?>
                    </ul>
               </div>
          </div>
          <div class="heading-area">
               <div class="heading">

                    <?php if(!empty($settings['vl_team_title'])) : ?>
                    <h4><a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>"><?php echo esc_html($settings['vl_team_title']); ?></a></h4>
                    <?php endif; ?>

                    <?php if(!empty($settings['vl_team_position'])) : ?>
                    <p><?php echo esc_html($settings['vl_team_position']); ?></p>
                    <?php endif; ?>

               </div>
               <div class="shere-icon">
                    <a href="#"> <i class="fa-solid fa-share"></i></a>
               </div>
          </div>
     </div>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-4'): ?>

<div class="team7">

     <div class="team-box top">
          <?php if(!empty($settings['vl_team_title'])) : ?>
          <h5><a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>"><?php echo esc_html($settings['vl_team_title']); ?></a></h5>
          <?php endif; ?>
          <?php if(!empty($settings['vl_team_position'])) : ?>
          <p><?php echo esc_html($settings['vl_team_position']); ?></p>
          <?php endif; ?>
     </div>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-5'): ?>

     <div class="team4">
          <div class="team4-box" data-aos="fade-up" data-aos-duration="1200">
               <div class="image-area">
                    <div class="image">
                    <?php if(!empty($settings['vl_team_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['vl_team_image']['url']); ?>" alt="">
                    <?php endif; ?>

                    </div>
                    <?php if(!empty($settings['vl_team_url']['url'])) : ?>
                    <a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>" class="icon"><i class="fa-regular fa-arrow-right"></i></a>
                    <?php endif; ?>
               </div>
               <div class="heading4">
               <?php if(!empty($settings['vl_team_title'])) : ?>
                    <h4><a href="<?php echo esc_url($settings['vl_team_url']['url']); ?>"><?php echo esc_html($settings['vl_team_title']); ?></a></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['vl_team_position'])) : ?>
                    <p><?php echo esc_html($settings['vl_team_position']); ?></p>
                    <?php endif; ?>
               </div>
          </div>
    </div>

<?php endif; ?>



<?php

	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_team() );