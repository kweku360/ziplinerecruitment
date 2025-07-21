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


class VL_services extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-services';
	}

	public function get_title() {
		return __( 'VL Services', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_service' ];
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
          'service_content',
               [
                    'label' => esc_html__('Content', 'vlcore'),
               ]
          );

          $this->add_control(
			'service_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'vlcore' ),
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

     // layout Panel
     $this->start_controls_section(
          'service_options',
               [
                    'label' => esc_html__('Options', 'vlcore'),
               ]
          );


     $this->add_control(
          'vl_blog_title_word',
          [
               'label' => esc_html__( 'Title Word Count', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => esc_html__( '10', 'vlcore' ),
               'placeholder' => esc_html__( 'Word Count', 'vlcore' ),
          ]
     );

     $this->add_control(
          'vl_service_content',
          [
          'label' => __('Content', 'ftcore'),
          'type' => Controls_Manager::SWITCHER,
          'label_on' => __('Show', 'ftcore'),
          'label_off' => __('Hide', 'ftcore'),
          'return_value' => 'yes',
          'default' => '',
          ]
     );

     $this->add_control(
          'vl_service_content_limit',
          [
          'label' => __('Content Limit', 'ftcore'),
          'type' => Controls_Manager::TEXT,
          'label_block' => true,
          'default' => '14',
          'dynamic' => [
               'active' => true,
          ],
          'condition' => [
               'vl_service_content' => 'yes'
          ]
          ]
     );

     $this->end_controls_section();

     $this->start_controls_section(
          'service_query',
               [
                    'label' => esc_html__('Query', 'vlcore'),
               ]
          );

          

          $post_type = 'vl-services';
          $taxonomy = 'services-cat';

          $this->add_control(
               'posts_per_page',
               [
                   'label' => esc_html__('Posts Per Page', 'tpcore'),
                   'description' => esc_html__('Leave blank or enter -1 for all.', 'tpcore'),
                   'type' => Controls_Manager::NUMBER,
                   'default' => '3',
               ]
           );
   
     
          $this->add_control(
               'category',
               [
                    'label' => esc_html__('Include Categories', 'tpcore'),
                    'description' => esc_html__('Select a category to include or leave blank for all.', 'tpcore'),
                    'type' => Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => vl_get_categories($taxonomy),
                    'label_block' => true,
               ]
          );

          $this->add_control(
               'exclude_category',
               [
                    'label' => esc_html__('Exclude Categories', 'tpcore'),
                    'description' => esc_html__('Select a category to exclude', 'tpcore'),
                    'type' => Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => vl_get_categories($taxonomy),
                    'label_block' => true
               ]
          );

          $this->add_control(
               'post__not_in',
               [
                    'label' => esc_html__('Exclude Item', 'tpcore'),
                    'type' => Controls_Manager::SELECT2,
                    'options' => vl_get_all_types_post($post_type),
                    'multiple' => true,
                    'label_block' => true
               ]
          );

          $this->add_control(
               'offset',
               [
                    'label' => esc_html__('Offset', 'tpcore'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '0',
               ]
          );

          $this->add_control(
               'orderby',
               [
                    'label' => esc_html__('Order By', 'tpcore'),
                    'type' => Controls_Manager::SELECT,
                    'options' => array(
                              'ID' => 'Post ID',
                              'author' => 'Post Author',
                              'title' => 'Title',
                              'date' => 'Date',
                              'modified' => 'Last Modified Date',
                              'parent' => 'Parent Id',
                              'rand' => 'Random',
                              'comment_count' => 'Comment Count',
                              'menu_order' => 'Menu Order',
                         ),
                    'default' => 'date',
               ]
          );

          $this->add_control(
               'order',
               [
                    'label' => esc_html__('Order', 'tpcore'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                         'asc' 	=> esc_html__( 'Ascending', 'tpcore' ),
                         'desc' 	=> esc_html__( 'Descending', 'tpcore' )
                    ],
                    'default' => 'desc',

               ]
          );
          $this->add_control(
               'ignore_sticky_posts',
               [
                    'label' => esc_html__( 'Ignore Sticky Posts', 'tpcore' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'tpcore' ),
                    'label_off' => esc_html__( 'No', 'tpcore' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
               ]
          );


     $this->end_controls_section();


     $this->start_controls_section(
          'service_box_content_style',
          [
               'label' => esc_html__( 'Service Box', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'service_box_style_tabs'
     );
     
     $this->start_controls_tab(
          'service_box_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_box_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .service10 .service-box, {{WRAPPER}} .service9 .service-box::after, {{WRAPPER}} .service8 .service-box, {{WRAPPER}} .service7 .service7-slider .single-slider .hover-area, {{WRAPPER}} .service6 .service-box, {{WRAPPER}} .service1-box::after, {{WRAPPER}} .service3 .service3-box, {{WRAPPER}} .service5-box',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'service_title_typo',
               'selector' => '{{WRAPPER}} .service10 .service-box .heading h4 a, {{WRAPPER}} .service9 .service-box h4 a, {{WRAPPER}} .service8 .service-box .heading h4 a, {{WRAPPER}} .service7 .service7-slider .single-slider .hover-area h3 a, {{WRAPPER}} .service6 .service-box .heading6 h5 a, {{WRAPPER}} .heading5 h4 a, {{WRAPPER}} .heading1-w h4 a, {{WRAPPER}} .heading3 h4 a, {{WRAPPER}} .heading4-w h5 a',
          ]
     );

     $this->add_control(
          'service_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading1-w h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4-w h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading5 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service6 .service-box .heading6 h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service7 .service7-slider .single-slider .hover-area h3 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box .heading h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service9 .service-box h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box .heading h4 a' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Content Typography', 'vlcore' ),
               'name' => 'service_content_typo',
               'selector' => '{{WRAPPER}} .service10 .service-box .heading p, {{WRAPPER}} .service9 .service-box p, {{WRAPPER}} .service8 .service-box .heading p, {{WRAPPER}} .service1-box .hover-area p, {{WRAPPER}} .heading3 p, {{WRAPPER}} .heading5 p',
          ]
     );

     $this->add_control(
          'service_content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .service1-box .hover-area p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading5 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box .heading p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service9 .service-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box .heading p' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_tab();

     $this->start_controls_tab(
          'service_box_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_box_hover_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .service10 .service-box:hover, {{WRAPPER}} .service5-box::after, {{WRAPPER}} .service8 .service-box:hover',
          ]
     );


     $this->add_control(
          'service_hover_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading4-w h5 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service5-box:hover .heading5 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service6 .service-box .heading6 h5 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service7 .service7-slider .single-slider .hover-area h3 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box:hover .heading h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service9 .service-box h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box:hover h4 a' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_control(
          'service_hover_content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .service5-box:hover .heading5 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box:hover .heading p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box:hover p' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();

     $this->start_controls_section(
          'service_box_icon_style',
          [
               'label' => esc_html__( 'Icon Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'service_box_icon_style_tabs'
     );
     
     $this->start_controls_tab(
          'service_box_icon_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_box_icon_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .service10 .service-box .icon, {{WRAPPER}} .service8 .service-box .icon, {{WRAPPER}} .service6 .service-box .icon, {{WRAPPER}} .service3 .service3-box .icon, {{WRAPPER}} .service4-box .icon, {{WRAPPER}} .service5-box .icon',
          ]
     );
     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'service_box_icon_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_box_hover_icon_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .service3 .service3-box:hover .icon, {{WRAPPER}} .service5-box:hover .icon',
          ]
     );
     
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();



     $this->start_controls_section(
          'service_box_button_style',
          [
               'label' => esc_html__( 'Button Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'service_box_button_style_tabs'
     );
     
     $this->start_controls_tab(
          'service_box_button_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_button_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .service7 .service7-slider .single-slider .image .hover-icon, {{WRAPPER}} .service5-box .learn, {{WRAPPER}} .service6 .service-box:hover .image .arrow',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Button Typography', 'vlcore' ),
               'name' => 'service_button_typo',
               'selector' => '{{WRAPPER}} .service10 .service-box .heading .learn, {{WRAPPER}} .service9 .service-box .learn, {{WRAPPER}} .service8 .service-box .heading .learn, {{WRAPPER}} .service3 .service3-box .learn, {{WRAPPER}} .service5-box .learn',
          ]
     );

     $this->add_control(
          'service_button_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .service3 .service3-box .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service5-box .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service6 .service-box:hover .image .arrow' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service7 .service7-slider .single-slider .image .hover-icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box .heading .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service9 .service-box .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box .heading .learn' => 'color: {{VALUE}}',
               ],
          ]
     );


     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'service_box_button_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'service_button_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .service3 .service3-box .learn:hover, {{WRAPPER}} .service5-box:hover .learn',
          ]
     );

     $this->add_control(
          'service_button_hover_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .service5-box:hover .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service3 .service3-box .learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service6 .service-box:hover .image .arrow:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service8 .service-box:hover .heading .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service9 .service-box .learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service10 .service-box:hover a.learn' => 'color: {{VALUE}}',
               ],
          ]
     );


     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		if (get_query_var('paged')) {
               $paged = get_query_var('paged');
           } else if (get_query_var('page')) {
               $paged = get_query_var('page');
           } else {
               $paged = 1;
           }
   
           // include_categories
           $category_list = '';
           if (!empty($settings['category'])) {
               $category_list = implode(", ", $settings['category']);
           }
           $category_list_value = explode(" ", $category_list);
   
           // exclude_categories
           $exclude_categories = '';
           if(!empty($settings['exclude_category'])){
               $exclude_categories = implode(", ", $settings['exclude_category']);
           }
           $exclude_category_list_value = explode(" ", $exclude_categories);
   
           $post__not_in = '';
           if (!empty($settings['post__not_in'])) {
               $post__not_in = $settings['post__not_in'];
               $args['post__not_in'] = $post__not_in;
           }
           $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
           $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
           $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
           $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';
           $ignore_sticky_posts = (! empty( $settings['ignore_sticky_posts'] ) && 'yes' == $settings['ignore_sticky_posts']) ? true : false ;
   
   
           // number
           $off = (!empty($offset_value)) ? $offset_value : 0;
           $offset = $off + (($paged - 1) * $posts_per_page);
           $p_ids = array();
   
           // build up the array
           if (!empty($settings['post__not_in'])) {
               foreach ($settings['post__not_in'] as $p_idsn) {
                   $p_ids[] = $p_idsn;
               }
           }
   
           $args = array(
               'post_type' => 'vl-services',
               'post_status' => 'publish',
               'posts_per_page' => $posts_per_page,
               'orderby' => $orderby,
               'order' => $order,
               'offset' => $offset,
               'paged' => $paged,
               'post__not_in' => $p_ids,
               'ignore_sticky_posts' => $ignore_sticky_posts
           );
   
           // exclude_categories
           if ( !empty($settings['exclude_category'])) {
   
               // Exclude the correct cats from tax_query
               $args['tax_query'] = array(
                   array(
                       'taxonomy'	=> 'services-cat',
                       'field'	 	=> 'slug',
                       'terms'		=> $exclude_category_list_value,
                       'operator'	=> 'NOT IN'
                   )
               );
   
               // Include the correct cats in tax_query
               if ( !empty($settings['category'])) {
                   $args['tax_query']['relation'] = 'AND';
                   $args['tax_query'][] = array(
                       'taxonomy'	=> 'services-cat',
                       'field'		=> 'slug',
                       'terms'		=> $category_list_value,
                       'operator'	=> 'IN'
                   );
               }
   
           } else {
               // Include the cats from $cat_slugs in tax_query
               if (!empty($settings['category'])) {
                   $args['tax_query'][] = [
                       'taxonomy' => 'services-cat',
                       'field' => 'slug',
                       'terms' => $category_list_value,
                   ];
               }
           }
   
           $filter_list = $settings['category'];
   
           // The Query
           $vl_service_posts = new \WP_Query($args);


          ?>


<?php if($settings['vl_design_style'] == 'layout-1'): ?>

<div class="service1 service-page-service">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                                   $vl_service_posts->the_post();
                                   $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
                              ?>
               <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                         <div class="service1-box-bg-image">
                              <?php if(!empty(the_post_thumbnail())) : ?>
                              <div class="image overlay-anim">
                                   <?php the_post_thumbnail('full');?>
                              </div>
                              <?php endif; ?>
                         </div>
                         <div class="hover-area">
                              <?php if(!empty($recrute_service_icon['url'])) : ?>
                              <div class="icon">
                                   <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                              </div>
                              <div class="space16"></div>
                              <?php endif; ?>

                              <div class="heading1-w">
                                   <?php if(!empty(get_the_title())): ?>
                                   <h4><a
                                             href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                                   </h4>
                                   <?php endif; ?>

                                   <?php if (!empty($settings['vl_service_content'])): ?>
                                   <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                                   
                                   <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                                   </p>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>
               </div>
               <?php endwhile; wp_reset_query(); ?>

          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-2'): ?>
<div class="service3">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>

               <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="700">
                    <div class="service3-box">
                         <div class="icon">
                              <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                         </div>
                         <div class="heading3">
                              <h4><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                              </h4>

                              <?php if (!empty($settings['vl_service_content'])): ?>
                              <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                              <div class="space16"></div>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>

                              <div class="space16"></div>
                              <a href="<?php the_permalink(); ?>"
                                   class="learn"><?php echo esc_html($settings['service_btn_text']); ?>
                                   <?php if($settings['show_btn_icon'] == 'yes') : ?>
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


<?php elseif($settings['vl_design_style'] == 'layout-3'): ?>
<div class="service4">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>
               <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="1200">
                    <div class="service4-box">
                         <div class="image overlay-anim">
                              <?php the_post_thumbnail('full');?>
                         </div>
                         <a href="<?php the_permalink(); ?>" class="icon"><i class="fa-regular fa-arrow-right"></i></a>
                         <div class="heading4-w">
                              <h5><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                              </h5>
                         </div>
                    </div>
               </div>
               <?php endwhile; wp_reset_query(); ?>


          </div>
     </div>
</div>
<?php elseif($settings['vl_design_style'] == 'layout-4'): ?>
<div class="service5">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>
               <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="700">
                    <div class="service5-box">
                         <div class="icon">
                              <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                         </div>
                         <div class="heading5">
                              <h4><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                              </h4>

                              <?php if (!empty($settings['vl_service_content'])): ?>
                              <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                              <div class="space16"></div>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>

                              <a href="<?php the_permalink(); ?>"
                                   class="learn"><?php echo esc_html($settings['service_btn_text']); ?>
                                   <?php if($settings['show_btn_icon'] == 'yes') : ?>
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

<?php elseif($settings['vl_design_style'] == 'layout-5'): ?>
<div class="service6">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>
               <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="1200">
                    <div class="service-box">
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                              <a href="<?php the_permalink(); ?>" class="arrow"><i
                                        class="fa-solid fa-arrow-right"></i></a>
                         </div>
                         <div class="icon">
                              <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                         </div>
                         <div class="heading6">
                              <h5><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                              </h5>
                         </div>
                    </div>
               </div>
               <?php endwhile; wp_reset_query(); ?>


          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-6'): ?>
<div class="service7">
     <div class="container">
          <div class="row">
               <div class="service7-slider" data-aos="fade-up" data-aos-duration="700">

                    <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>

                    <div class="single-slider">
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                              <a href="<?php the_permalink(); ?>" class="hover-icon"><i
                                        class="fa-solid fa-arrow-right"></i></a>
                         </div>
                         <div class="hover-area">
                              <div class="icon">
                                   <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                              </div>
                              <div class="heading">
                                   <h3><a
                                             href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>

               </div>


          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-7'): ?>
<div class="service8">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                         $vl_service_posts->the_post();
                         $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
                    ?>
               <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="1200">
                    <div class="service-box">
                         <div class="icon">
                              <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                         </div>
                         <div class="heading">
                              <h4><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a>
                              </h4>

                              <?php if (!empty($settings['vl_service_content'])): ?>
                              <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                        
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>

                              <a href="<?php the_permalink(); ?>"
                                   class="learn"><?php echo esc_html($settings['service_btn_text']); ?>
                                   <?php if($settings['show_btn_icon'] == 'yes') : ?>
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


<?php elseif($settings['vl_design_style'] == 'layout-8'): ?>

<div class="service9 ">
     <div class="container">
          <div class="row">

               <?php while ($vl_service_posts->have_posts()) : 
                         $vl_service_posts->the_post();
                         $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
                         $service_number = function_exists('tpmeta_field')? tpmeta_field('recrute_service_number') : '';

                    ?>
               <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="800">
                    <div class="service-box">
                         <div class="image overlay-anim">
                         <?php the_post_thumbnail('full');?>
                         </div>
                         <div class="heading">

                              <?php if(!empty($service_number)) : ?>
                              <span class="text"><?php echo esc_html($service_number); ?></span>
                              <?php endif; ?>

                              <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                              <?php if (!empty($settings['vl_service_content'])): ?>
                              <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>
                              <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['service_btn_text']); ?> 
                              <?php if($settings['show_btn_icon'] == 'yes') : ?>
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


<?php elseif($settings['vl_design_style'] == 'layout-9'): ?>

     <div class="service10">
          <div class="container">
            <div class="row">

            <?php while ($vl_service_posts->have_posts()) : 
                    $vl_service_posts->the_post();
                    $recrute_service_icon = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_service_icon') : ''; 
               ?>
              <div class="col-lg-4 col-mg-6" data-aos="zoom-in-up" data-aos-duration="700">
                <div class="service-box">
                  <div class="icon">
                  <img src="<?php echo esc_url($recrute_service_icon['url']); ?>" alt="">
                  </div>
                  <div class="heading">
                    <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                    <?php if (!empty($settings['vl_service_content'])): ?>
                              <?php  $vl_service_content_limit = (!empty($settings['vl_service_content_limit'])) ? $settings['vl_service_content_limit'] : ''; ?>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_service_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['service_btn_text']); ?>  
                    <?php if($settings['show_btn_icon'] == 'yes') : ?>
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


<?php endif; ?>

<?php


	}

     protected function content_template() {}
}

$widgets_manager->register( new VL_services() );