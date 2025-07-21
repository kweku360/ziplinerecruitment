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


class VL_projects extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-projects';
	}

	public function get_title() {
		return __( 'VL Projects', 'vlcore' );
	}

	public function get_icon() {
		return 'tp-icon';
	}


	public function get_categories() {
		return [ 'vlcore' ];
	}

	public function get_script_depends() {
		return [ 'vl_project' ];
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
          'project_content',
               [
                    'label' => esc_html__('Content', 'vlcore'),
                    'condition' => [
                         'vl_design_style' => 'layout-3',
                    ]
               ]
          );

          $this->add_control(
			'project_height',
			[
				'label' => esc_html__( 'Min Height', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 370,
				],
				'selectors' => [
					'{{WRAPPER}} .case3 .image-area.image-area2' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

          $this->add_control(
               'projct_bg_image',
               [
                    'label' => esc_html__( 'Bg Image', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                         'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
               ]
          );
          $this->add_control(
               'project_subtitle',
               [
                    'label' => esc_html__( 'Sub Title', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Staffing Service', 'vlcore' ),
                    'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
               ]
          );
          $this->add_control(
               'project_title',
               [
                    'label' => esc_html__( 'Title', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'HR Consulting & Staffing Support', 'vlcore' ),
                    'placeholder' => esc_html__( 'Type your title here', 'vlcore' ),
               ]
          );

          $this->add_control(
               'project_url',
               [
                    'label' => esc_html__( 'Link', 'vlcore' ),
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

          $this->add_control(
			'active_project',
			[
				'label' => esc_html__( 'Active Project?', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Ative', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->end_controls_section();

     // layout Panel
     $this->start_controls_section(
          'project_options',
          [
               'label' => esc_html__('Options', 'vlcore'),
          ]
     );


          $this->add_control(
               'vl_project_title_word',
               [
                    'label' => esc_html__( 'Title Word Count', 'vlcore' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '10', 'vlcore' ),
                    'placeholder' => esc_html__( 'Word Count', 'vlcore' ),
               ]
          );

          $this->add_control(
               'vl_project_content',
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
               'vl_project_content_limit',
               [
               'label' => __('Content Limit', 'ftcore'),
               'type' => Controls_Manager::TEXT,
               'label_block' => true,
               'default' => '14',
               'dynamic' => [
                    'active' => true,
               ],
               'condition' => [
                    'vl_project_content' => 'yes'
               ]
               ]
          );


          $this->add_control(
			'show_icon_btn',
			[
				'label' => esc_html__( 'Show Icon Button', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


     $this->end_controls_section();



     $this->start_controls_section(
          'projects_query',
               [
                    'label' => esc_html__('Query', 'vlcore'),
               ]
          );

     
          $post_type = 'vl-projects';
          $taxonomy = 'projects-cat';

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
     'project_content_style',
          [
               'label' => esc_html__( 'Box Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'project_content_style_tabs'
     );
     
     $this->start_controls_tab(
          'project_content_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'project_box_bg',
               'types' => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .case6 .project-two__box-content-inner, {{WRAPPER}} .case10 .case-box .hover-area, {{WRAPPER}} .case7 .case7-slider .single-slider .hover-area, {{WRAPPER}} .project-two__box-content-inner, {{WRAPPER}} .case3 .image-area::after',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Sub Title Typography', 'vlcore' ),
               'name' => 'proejct_subtitle_typo',
               'selector' => '{{WRAPPER}} .case10 .case-box .hover-area p, {{WRAPPER}} .case7 .case7-slider .single-slider .hover-area p, {{WRAPPER}} .case6 .project-two__box-content-inner-wrapper p, {{WRAPPER}} .project-two__box-content-inner-wrapper p, {{WRAPPER}} .case3 .image-area .heading-area p',
          ]
     );

     $this->add_control(
          'projct_sub_title_color',
          [
               'label' => esc_html__( 'Sub Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .project-two__box-content-inner-wrapper p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case3 .image-area .heading-area p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case6 .project-two__box-content-inner-wrapper p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case7 .case7-slider .single-slider .hover-area p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case10 .case-box .hover-area p' => 'color: {{VALUE}}',
               ],
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Title Typography', 'vlcore' ),
               'name' => 'proejct_title_typo',
               'selector' => '{{WRAPPER}} .case10 .case-box .hover-area h3 a, {{WRAPPER}} .case7 .case7-slider .single-slider .hover-area h4 a, {{WRAPPER}} .case6 .project-two__box-content-inner-wrapper h4 a, {{WRAPPER}} .project-two__box-content-inner-wrapper h4, {{WRAPPER}} .case3 .image-area .heading-area h4 a',
          ]
     );

     $this->add_control(
          'projct_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .project-two__box-content-inner-wrapper h4' => 'color: {{VALUE}}',
                    '{WRAPPER}} .case3 .image-area .heading-area h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case6 .project-two__box-content-inner-wrapper h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case7 .case7-slider .single-slider .hover-area h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case10 .case-box .hover-area h3 a' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Content Typography', 'vlcore' ),
               'name' => 'proejct_content_typo',
               'selector' => '{{WRAPPER}} .case10 .case-box .hover-area p',
          ]
     );

     $this->add_control(
          'projct_content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .case10 .case-box .hover-area p' => 'color: {{VALUE}}',
               ],
          ]
     );



     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'project_content_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );


     $this->add_control(
          'projct_title_hover_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .project-two__box-content-inner-wrapper h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case3 .image-area .heading-area h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case6 .project-two__box-content-inner-wrapper h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case7 .case7-slider .single-slider .hover-area h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case10 .case-box .hover-area h3 a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();


     $this->start_controls_section(
     'project_content_icon_style',
          [
               'label' => esc_html__( 'Icon Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );


     $this->start_controls_tabs(
          'project_content_icon_style_tabs'
     );
     
     $this->start_controls_tab(
          'project_content_icon_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'project_icon_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .case10 .case-box .hover-area .arrow, {{WRAPPER}} .case7 .case7-slider .single-slider .hover-area .arrow, {{WRAPPER}} .case6 .project-two__single-box .icon a, {{WRAPPER}} .project-two__single-box .icon a, {{WRAPPER}} .case3 .image-area .heading-area .icon',
          ]
     );


     $this->add_control(
          'project_icon_color',
          [
               'label' => esc_html__( 'Icon Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .project-two__single-box .icon a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case3 .image-area .heading-area .icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case6 .project-two__single-box .icon a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case7 .case7-slider .single-slider .hover-area .arrow' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case10 .case-box .hover-area .arrow' => 'color: {{VALUE}}',
               ],
          ]
     );
     
     $this->end_controls_tab();

     $this->start_controls_tab(
          'project_content_icon_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'project_icon_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .case10 .case-box .hover-area .arrow:hover, {{WRAPPER}} .case7 .case7-slider .single-slider .hover-area .arrow:hover, {{WRAPPER}} .project-two__single-box .icon a:hover, {{WRAPPER}} .case6 .project-two__single-box .icon a:hover',
          ]
     );


     $this->add_control(
          'project_icon_hover_color',
          [
               'label' => esc_html__( 'Icon Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .project-two__single-box .icon a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case3 .image-area .heading-area .icon:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case6 .project-two__single-box .icon a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case7 .case7-slider .single-slider .hover-area .arrow:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case10 .case-box .hover-area .arrow:hover' => 'color: {{VALUE}}',
               ],
          ]
     );
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();

     $this->start_controls_section(
     'project_content_arrows_style',
          [
               'label' => esc_html__( 'Arrows Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'project_content_arrows_style_tabs'
     );
     
     $this->start_controls_tab(
          'project_content_arrows_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'project_arrows_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .case6 .project-two .owl-nav button',
          ]
     );


     $this->add_control(
          'project_arrows_color',
          [
               'label' => esc_html__( 'Arrows Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .case6 .project-two .owl-nav button' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     $this->end_controls_tab();
     $this->start_controls_tab(
          'project_content_arrows_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'project_arrows_hover_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .case6 .project-two .owl-nav button:hover',
          ]
     );


     $this->add_control(
          'project_arrows_hover_color',
          [
               'label' => esc_html__( 'Arrows Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .case6 .project-two .owl-nav button:hover' => 'color: {{VALUE}}',
               ],
          ]
     );
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();

     $this->start_controls_section(
          'project_content_dots_style',
               [
                    'label' => esc_html__( 'Dots Style', 'vlcore' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
               ]
          );

          $this->start_controls_tabs(
               'project_content_dots_style_tabs'
          );
          
          $this->start_controls_tab(
               'project_content_dots_style_normal_tab',
               [
                    'label' => esc_html__( 'Normal', 'vlcore' ),
               ]
          );

          $this->add_group_control(
               \Elementor\Group_Control_Background::get_type(),
               [
                    'name' => 'project_dots_bg',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .owl-carousel.owl-dot-style1 .owl-dots button',
               ]
          );
     
          
          $this->end_controls_tab();
     
          $this->start_controls_tab(
               'project_content_dots_style_active_tab',
               [
                    'label' => esc_html__( 'Active', 'vlcore' ),
               ]
          );

          $this->add_group_control(
               \Elementor\Group_Control_Background::get_type(),
               [
                    'name' => 'project_dots_active_bg',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .owl-carousel.owl-dot-style1 .owl-dots button.active',
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
               'post_type' => 'vl-projects',
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
                       'taxonomy'	=> 'projects-cat',
                       'field'	 	=> 'slug',
                       'terms'		=> $exclude_category_list_value,
                       'operator'	=> 'NOT IN'
                   )
               );
   
               // Include the correct cats in tax_query
               if ( !empty($settings['category'])) {
                   $args['tax_query']['relation'] = 'AND';
                   $args['tax_query'][] = array(
                       'taxonomy'	=> 'projects-cat',
                       'field'		=> 'slug',
                       'terms'		=> $category_list_value,
                       'operator'	=> 'IN'
                   );
               }
   
           } else {
               // Include the cats from $cat_slugs in tax_query
               if (!empty($settings['category'])) {
                   $args['tax_query'][] = [
                       'taxonomy' => 'projects-cat',
                       'field' => 'slug',
                       'terms' => $category_list_value,
                   ];
               }
           }
   
           $filter_list = $settings['category'];
   
           // The Query
           $vl_project_posts = new \WP_Query($args);

           
     
          ?>
<?php if($settings['vl_design_style'] == 'layout-1') : ?>

<div class="project-page-area">
     <div class="container">
          <div class="row">

               <div class="project-two__single-box">
                    <ul class="project-two__box list-unstyled">

                         <?php while ($vl_project_posts->have_posts()) : 
                              $vl_project_posts->the_post();
                              $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                              $project_sub_title = function_exists('tpmeta_field')? tpmeta_field('recrute_project_sub_title') : '';
                              
                         ?>

                         <li>
                              <div class="project-two__box-content">

                                   <?php if(!empty($featured_img_url)) : ?>
                                   <div class="single-project-two__bg" style="background-image: url(<?php echo esc_url($featured_img_url);?>)"> </div>
                                   <div class="img-holder-img-bg"></div>
                                   <?php endif; ?>

                                   <div class="project-two__box-content-inner-icon">
                                        <a href="#" class="img-popup"><i class="icon-next"></i></a>
                                   </div>
                                   <div class="project-two__box-content-inner">
                                        <div class="project-two__box-content-inner-wrapper">

                                             <?php if(!empty($project_sub_title)) : ?>
                                             <p><?php echo esc_html($project_sub_title); ?></p>
                                             <?php endif; ?>

                                             <?php if(!empty(get_the_title())) : ?>
                                             <h4><a
                                                       href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_project_title_word'], ''); ?></a>
                                             </h4>
                                             <?php endif; ?>

                                        </div>
                                        <?php if($settings['show_icon_btn'] == 'yes') : ?>
                                        <div class="icon">
                                             <a href="<?php the_permalink(); ?>"><i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                             <?php endif; ?>
                                   </div>
                              </div>
                         </li>
                         <?php endwhile; wp_reset_query(); ?>

                    </ul>
               </div>



          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>


<section class="project-two project-two-carousel">
     <div class="project-two__bottom">
          <div class="container">


               <div class="project-two__carousel-container" data-aos="fade-up" data-aos-duration="900">
                    <div
                         class="project-two__carousel owl-carousel owl-theme thm-owl__carousel project-style1-carousel owl-dot-style1">

                         <?php while ($vl_project_posts->have_posts()) : 
                                   $vl_project_posts->the_post();
                                   $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                   $project_sub_title = function_exists('tpmeta_field')? tpmeta_field('recrute_project_sub_title') : '';
                                   
                              ?>
                         <div class="project-two__single-box">
                              <ul class="project-two__box list-unstyled">
                                   <li>
                                        <div class="project-two__box-content">

                                             <?php if(!empty($featured_img_url)) : ?>
                                             <div class="single-project-two__bg" style="background-image: url(<?php echo esc_url($featured_img_url);?>)">
                                             </div>
                                             <?php endif; ?>

                                             <div class="img-holder-img-bg"></div>
                                             <div class="project-two__box-content-inner-icon">
                                                  <a href="<?php the_permalink(); ?>" class="img-popup"><i class="icon-next"></i></a>
                                             </div>
                                             <div class="project-two__box-content-inner">
                                                  <div class="project-two__box-content-inner-wrapper">

                                                       <?php if(!empty($project_sub_title)) : ?>
                                                       <p><?php echo esc_html($project_sub_title); ?></p>
                                                       <?php endif; ?>

                                                       <?php if(!empty(get_the_title())) : ?>
                                                       <h4><a
                                                                 href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_project_title_word'], ''); ?></a>
                                                       </h4>
                                                       <?php endif; ?>

                                                  </div>
                                                  <?php if($settings['show_icon_btn'] == 'yes') : ?>
                                                  <div class="icon">
                                                       <a href="<?php the_permalink(); ?>"><i  class="fa-solid fa-arrow-right"></i></a>
                                                  </div>
                                                  <?php endif; ?>
                                             </div>
                                        </div>
                                   </li>
                              </ul>
                         </div>
                         <?php endwhile; wp_reset_query(); ?>

                    </div>
               </div>
          </div>
     </div>
</section>

<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>
<?php
     if($settings['active_project'] == 'yes'){
          $active_project = 'active';
     
     }else{
          $active_project = ' ';
     }
?>
<div class="case3">
     <div class="image-area image-area2 <?php echo esc_attr($active_project); ?>" data-aos="zoom-in-up" data-aos-duration="800">

          <?php if(!empty($settings['projct_bg_image']['url'])) : ?>
          <div class="image">
               <img src="<?php echo esc_url($settings['projct_bg_image']['url']); ?>" alt="">
          </div>
          <?php endif; ?>

          <div class="heading-area">

               <?php if($settings['show_icon_btn'] == 'yes') : ?>
               <a href="<?php echo esc_url($settings['project_url']['url']); ?>" class="icon"><i class="fa-solid fa-arrow-right"></i></a>
               <?php endif; ?>

               <?php if(!empty($settings['project_subtitle'])) : ?>
               <p><?php echo esc_html($settings['project_subtitle']); ?></p>
               <?php endif; ?>

               <?php if(!empty($settings['project_title'])) : ?>
               <h4><a href="<?php echo esc_url($settings['project_url']['url']); ?>"><?php echo esc_html($settings['project_title']); ?></a></h4>
               <?php endif; ?>

          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-4') : ?>

<div class="case6">

     <div class="project-two">
          <div class="project-two__bottom">
               <div class="container">

                    <div class="project-two__carousel-container" data-aos="fade-up" data-aos-duration="900">
                         <div
                              class="project-there__carousel owl-carousel owl-theme thm-owl__carousel project-style1-carousel owl-dot-style1">

                              <?php while ($vl_project_posts->have_posts()) : 
                                   $vl_project_posts->the_post();
                                   $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                   $project_sub_title = function_exists('tpmeta_field')? tpmeta_field('recrute_project_sub_title') : '';
                                   
                              ?>
                              <div class="project-two__single-box">
                                   <ul class="project-two__box list-unstyled">
                                        <li>
                                             <div class="project-two__box-content">
                                                  <div class="single-project-two__bg"
                                                       style="background-image: url(<?php echo esc_url($featured_img_url);?>)">
                                                  </div>
                                                  <div class="img-holder-img-bg"></div>
                                                  
                                                  <div class="project-two__box-content-inner-icon">
                                                       <a href="<?php the_permalink(); ?>" class="img-popup"><i class="icon-next"></i></a>
                                                  </div>
                                                  <div class="project-two__box-content-inner">
                                                       <div class="project-two__box-content-inner-wrapper">

                                                            <?php if(!empty($project_sub_title)) : ?>
                                                            <p><?php echo esc_html($project_sub_title); ?></p>
                                                            <?php endif; ?>

                                                            <?php if(!empty(get_the_title())) : ?>
                                                            <h4><a
                                                                      href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_project_title_word'], ''); ?></a>
                                                            </h4>
                                                            <?php endif; ?>

                                                       </div>

                                                       <?php if($settings['show_icon_btn'] == 'yes') : ?>
                                                       <div class="icon">
                                                            <a href="<?php the_permalink(); ?>"><i class="fa-solid fa-arrow-right"></i></a>
                                                       </div>
                                                       <?php endif; ?>

                                                  </div>
                                             </div>
                                        </li>
                                   </ul>
                              </div>

                              <?php endwhile; wp_reset_query(); ?>


                         </div>
                    </div>
               </div>
          </div>
     </div>

</div>

<?php elseif($settings['vl_design_style'] == 'layout-5') : ?>

<div class="case7">
     <div class="container">
          <div class="row">
               <div class="case7-slider" data-aos="fade-up" data-aos-duration="900">

                    <?php while ($vl_project_posts->have_posts()) : 
                         $vl_project_posts->the_post();
                         $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                         $project_sub_title = function_exists('tpmeta_field')? tpmeta_field('recrute_project_sub_title') : '';
                         
                    ?>
                    <div class="single-slider">
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                         </div>
                         <div class="hover-area">

                              <?php if(!empty($project_sub_title)) : ?>
                              <p><?php echo esc_html($project_sub_title); ?></p>
                              <?php endif; ?>

                              <?php if(!empty(get_the_title())) : ?>
                              <h4><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_project_title_word'], ''); ?></a>
                              </h4>
                              <?php endif; ?>

                              <?php if($settings['show_icon_btn'] == 'yes') : ?>
                              <a href="<?php the_permalink(); ?>" class="arrow"><i class="fa-solid fa-arrow-right"></i></a>
                              <?php endif; ?>

                         </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>

               </div>


          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-6') : ?>
<div class="case10">
     <div class="container">
          <div class="row">

               <?php while ($vl_project_posts->have_posts()) : 
                    $vl_project_posts->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $project_sub_title = function_exists('tpmeta_field')? tpmeta_field('recrute_project_sub_title') : '';
                    
               ?>
               <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1100">
                    <div class="case-box">
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                         </div>
                         <div class="hover-area">
                              <?php if(!empty($project_sub_title)) : ?>
                              <p><?php echo esc_html($project_sub_title); ?></p>
                              <?php endif; ?>

                              <?php if(!empty(get_the_title())) : ?>
                              <h3><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_project_title_word'], ''); ?></a>
                              </h3>
                              <?php endif; ?>

                              <?php if (!empty($settings['vl_project_content'])): ?>
                              <?php  $vl_project_content_limit = (!empty($settings['vl_project_content_limit'])) ? $settings['vl_project_content_limit'] : ''; ?>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_project_content_limit, ''); ?>
                              </p>
                              <?php endif; ?>

                              <?php if($settings['show_icon_btn'] == 'yes') : ?>
                              <a href="<?php the_permalink(); ?>" class="arrow"><i class="fa-solid fa-arrow-right"></i></a>
                              <?php endif; ?>

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

$widgets_manager->register( new VL_projects() );