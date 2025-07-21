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


class VL_pricing_plan extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-pricing-plan';
	}

	public function get_title() {
		return __( 'VL Pricing Plan', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_price' ];
	}


	protected function register_controls() {

     $this->start_controls_section(
          'content_toggle',
          [
               'label' => esc_html__('Price Toggle', 'vlcore'),
          ]
     );

     $this->add_control(
          'montly_text',
          [
               'label' => esc_html__( 'Monthly', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Monthly', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );

     $this->add_control(
          'yearly_text',
          [
               'label' => esc_html__( 'Yearly', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Yearly (Save 20%)', 'vlcore' ),
               'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
          ]
     );


     $this->end_controls_section();


     $this->start_controls_section(
          'content_price_monthly',
          [
               'label' => esc_html__('Price Monthly', 'vlcore'),
          ]
     );

     $repeatermonthly = new \Elementor\Repeater();

     $repeatermonthly->add_control(
          'price_name',
          [
               'label' => esc_html__( 'Price Name', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Temporary' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'price_content',
          [
               'label' => esc_html__( 'Price Content', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'price_value',
          [
               'label' => esc_html__( 'Price', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( '$259/mo' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'price_label',
          [
               'label' => esc_html__( 'Price Label', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Billed Yearly' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'price_button_text',
          [
               'label' => esc_html__( 'Price Button Text', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Get Started' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'price_button_url',
          [
               'label' => esc_html__( 'Price Button Link', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::URL,
               'options' => [ 'url', 'is_external', 'nofollow' ],
               'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
               ],
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'feature_list_heading',
          [
               'label' => esc_html__( 'Feature List Heading', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Everything you get with Basic' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'feature_list_1',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Candidate Sourcing' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'feature_list_2',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Integrations' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'feature_list_3',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Candidate Tracking' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeatermonthly->add_control(
          'feature_list_4',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Resume Management' , 'vlcore' ),
               'label_block' => true,
          ]
     );


     $this->add_control(
          'monthly_reps',
          [
               'label' => esc_html__( 'Monthly', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::REPEATER,
               'fields' => $repeatermonthly->get_controls(),
               'default' => [
                    [
                         'price_name' => esc_html__( 'Temporary', 'vlcore' ),
                         'price_content' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.', 'vlcore' ),
                    ],
                    [
                         'price_name' => esc_html__( 'Contract', 'vlcore' ),
                         'price_content' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.', 'vlcore' ),
                    ],
               ],
               'title_field' => '{{{ price_name }}}',
          ]
     );



     $this->end_controls_section();

     $this->start_controls_section(
          'content_price_yearly',
          [
               'label' => esc_html__('Price Yearly', 'vlcore'),
          ]
     );


     $repeateryearly = new \Elementor\Repeater();

     $repeateryearly->add_control(
          'price_name',
          [
               'label' => esc_html__( 'Price Name', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Temporary' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'price_content',
          [
               'label' => esc_html__( 'Price Content', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'price_value',
          [
               'label' => esc_html__( 'Price', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( '$259/mo' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'price_label',
          [
               'label' => esc_html__( 'Price Label', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Billed Yearly' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'price_button_text',
          [
               'label' => esc_html__( 'Price Button Text', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Get Started' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'price_button_url',
          [
               'label' => esc_html__( 'Price Button Link', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::URL,
               'options' => [ 'url', 'is_external', 'nofollow' ],
               'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
               ],
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'feature_list_heading',
          [
               'label' => esc_html__( 'Feature List Heading', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Everything you get with Basic' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'feature_list_1',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Candidate Sourcing' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'feature_list_2',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Integrations' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'feature_list_3',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Candidate Tracking' , 'vlcore' ),
               'label_block' => true,
          ]
     );

     $repeateryearly->add_control(
          'feature_list_4',
          [
               'label' => esc_html__( 'Feature List', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( 'Resume Management' , 'vlcore' ),
               'label_block' => true,
          ]
     );


     $this->add_control(
          'yearly_reps',
          [
               'label' => esc_html__( 'Yearly', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::REPEATER,
               'fields' => $repeateryearly->get_controls(),
               'default' => [
                    [
                         'price_name' => esc_html__( 'Temporary', 'vlcore' ),
                         'price_content' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.', 'vlcore' ),
                    ],
                    [
                         'price_name' => esc_html__( 'Contract', 'vlcore' ),
                         'price_content' => esc_html__( 'Our pricing is designed to be transparent and tailored to your specific needs.', 'vlcore' ),
                    ],
               ],
               'title_field' => '{{{ price_name }}}',
          ]
     );




     $this->end_controls_section();


     $this->start_controls_section(
          'toggle_style',
               [
               'label' => esc_html__( 'Toggle Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'toggle_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .toggle-inner',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'toggle_active_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .custom-toggle',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Label Typography', 'vlcore' ),
               'name' => 'content_typography',
               'selector' => '{{WRAPPER}} .pricing-plan-page2 .toggle-inner .t-month, {{WRAPPER}} .pricing-plan-page2 .toggle-inner .t-year',
          ]
     );

     $this->add_control(
          'label_color',
          [
               'label' => esc_html__( 'Label Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-plan-page2 .toggle-inner .t-month' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-plan-page2 .toggle-inner .t-year' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_section();

     $this->start_controls_section(
          'price_button_style',
               [
               'label' => esc_html__( 'Button Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'price_button_tabs'
     );
     
     $this->start_controls_tab(
          'price_btn_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Button Typography', 'vlcore' ),
               'name' => 'price_btn_typography',
               'selector' => '{{WRAPPER}} .pricing-btn',
          ]
     );

     
     $this->add_control(
          'price_button_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-btn' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'price_button_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .pricing-btn',
          ]
     );
     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'price_btn_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_control(
          'price_button_hover_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2:hover .pricing-btn' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'price_button_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .pricing-box2:hover .pricing-btn',
          ]
     );
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();


     $this->start_controls_section(
          'price_content_style',
               [
               'label' => esc_html__( 'Content Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'price_box_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .pricing-box2::before',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'price_box_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .pricing-box2::after',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Price Name Typography', 'vlcore' ),
               'name' => 'price_name_typography',
               'selector' => '{{WRAPPER}} .pricing-box2 h5',
          ]
     );

     
     $this->add_control(
          'price_name_color',
          [
               'label' => esc_html__( 'Price Name Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 h5' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Price Content Typography', 'vlcore' ),
               'name' => 'price_content_typography',
               'selector' => '{{WRAPPER}} .pricing-box2 .heading2 p',
          ]
     );

     
     $this->add_control(
          'price_content_color',
          [
               'label' => esc_html__( 'Price Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 .heading2 p' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Price Value Typography', 'vlcore' ),
               'name' => 'price_value_typography',
               'selector' => '{{WRAPPER}} .pricing-box2 h3',
          ]
     );

     
     $this->add_control(
          'price_value_color',
          [
               'label' => esc_html__( 'Price Value Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 h3' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Price Label Typography', 'vlcore' ),
               'name' => 'price_label_typography',
               'selector' => '{{WRAPPER}} .pricing-box2 .heading2 p',
          ]
     );

     
     $this->add_control(
          'price_label_color',
          [
               'label' => esc_html__( 'Price Label Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 .heading2 p' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Feature Heading Typography', 'vlcore' ),
               'name' => 'feature_heading_typography',
               'selector' => '{{WRAPPER}} .pricing-box2:hover .h-pera',
          ]
     );

     
     $this->add_control(
          'price_feature_heading_color',
          [
               'label' => esc_html__( 'Feature Heading Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 .h-pera' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Feature List Typography', 'vlcore' ),
               'name' => 'feature_list_typography',
               'selector' => '{{WRAPPER}} .pricing-box2 .list li',
          ]
     );

     
     $this->add_control(
          'price_feature_list_color',
          [
               'label' => esc_html__( 'Feature List Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .pricing-box2 .list li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-box2 .list li span' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_section();



	}


	protected function render() {
		$settings = $this->get_settings_for_display();

          ?>

<div class="pricing-plan-page2">
     <div class="container">
          <div class="princing-plans">
               <div class="container">

                    <div class="row">
                         <div class="col-12 text-center">
                              <div class="plan-toggle-wrap" data-aos="fade-up" data-aos-duration="800">
                                   <div class="toggle-inner toggle-inner2">
                                        <input id="ce-toggle" checked type="checkbox">
                                        <span class="custom-toggle"></span>
                                        <span class="t-month"><?php echo esc_html($settings['montly_text']); ?></span>
                                        <span class="t-year"><?php echo esc_html($settings['yearly_text']); ?></span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="tab-content">
                         <div id="monthly">
                              <div class="row">
                              
                                   <?php foreach($settings['monthly_reps'] as $monthly_rep) : ?>
                                        <div class="col-md-6 col-lg-4">
                                        <div class="pricing-box2" data-aos="fade-up" data-aos-duration="700">
                                             <div class="pricing-box-single">
                                            
                                                  <div class="heading2">
                                                       <?php if(!empty($monthly_rep['price_name'])) : ?>
                                                       <h5><?php echo esc_html($monthly_rep['price_name']); ?></h5>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['price_content'])) : ?>
                                                       <p><?php echo esc_html($monthly_rep['price_content']); ?></p>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['price_value'])) : ?>
                                                       <h3><?php echo esc_html($monthly_rep['price_value']); ?></h3>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['price_label'])) : ?>
                                                       <p><?php echo esc_html($monthly_rep['price_label']); ?></p>
                                                       <?php endif; ?>
                                                  </div>
                                                  
                                                  <?php if(!empty($monthly_rep['price_button_text'])) : ?>
                                                  <a href="<?php echo esc_url($monthly_rep['price_button_url']['url']); ?>" class="pricing-btn"><?php echo esc_html($monthly_rep['price_button_text']); ?></a>
                                                  <?php endif; ?>
                                                  
                                                  <?php if(!empty($monthly_rep['feature_list_heading'])) : ?>
                                                  <p class="h-pera"><?php echo esc_html($monthly_rep['feature_list_heading']); ?></p>
                                                  <?php endif; ?>
                                                  <ul class="list">

                                                       <?php if(!empty($monthly_rep['feature_list_1'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($monthly_rep['feature_list_1']); ?> </li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['feature_list_2'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($monthly_rep['feature_list_2']); ?></li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['feature_list_3'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($monthly_rep['feature_list_3']); ?></li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($monthly_rep['feature_list_1'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($monthly_rep['feature_list_4']); ?></li>
                                                       <?php endif; ?>
                                                  </ul>

                                             </div>
                                        </div>
                                   </div>
                                   <?php endforeach; ?>


                              </div>
                         </div>


                         <div id="yearly" style="display:none;">

                              <div class="row">

                              <?php foreach($settings['yearly_reps'] as $yearly_rep) : ?>
                                        <div class="col-md-6 col-lg-4">
                                        <div class="pricing-box2" data-aos="fade-up" data-aos-duration="700">
                                             <div class="pricing-box-single">

                                                  <div class="heading2">
                                                       <?php if(!empty($yearly_rep['price_name'])) : ?>
                                                       <h5><?php echo esc_html($yearly_rep['price_name']); ?></h5>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['price_content'])) : ?>
                                                       <p><?php echo esc_html($yearly_rep['price_content']); ?></p>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['price_value'])) : ?>
                                                       <h3><?php echo esc_html($yearly_rep['price_value']); ?></h3>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['price_label'])) : ?>
                                                       <p><?php echo esc_html($yearly_rep['price_label']); ?></p>
                                                       <?php endif; ?>
                                                  </div>
                                                  
                                                  <?php if(!empty($yearly_rep['price_button_text'])) : ?>
                                                  <a href="<?php echo esc_url($yearly_rep['price_button_url']['url']); ?>" class="pricing-btn"><?php echo esc_html($yearly_rep['price_button_text']); ?></a>
                                                  <?php endif; ?>
                                                  
                                                  <?php if(!empty($yearly_rep['feature_list_heading'])) : ?>
                                                  <p class="h-pera"><?php echo esc_html($yearly_rep['feature_list_heading']); ?></p>
                                                  <?php endif; ?>
                                                  <ul class="list">

                                                       <?php if(!empty($yearly_rep['feature_list_1'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($yearly_rep['feature_list_1']); ?> </li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['feature_list_2'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($yearly_rep['feature_list_2']); ?></li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['feature_list_3'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($yearly_rep['feature_list_3']); ?></li>
                                                       <?php endif; ?>

                                                       <?php if(!empty($yearly_rep['feature_list_1'])) : ?>
                                                       <li><span><i class="fa-solid fa-check"></i></span> <?php echo esc_html($yearly_rep['feature_list_4']); ?></li>
                                                       <?php endif; ?>
                                                  </ul>

                                             </div>
                                        </div>
                                   </div>
                                   <?php endforeach; ?>


                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </div>

</div>



<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_pricing_plan() );