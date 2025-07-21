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


class VL_blog extends Widget_Base {

    use \VLcore\Widgets\VLcoreElementFunctions;

	public function get_name() {
		return 'vl-blog';
	}

	public function get_title() {
		return __( 'VL Blog', 'vlcore' );
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


          $this->start_controls_section(
               'section_content',
               [
                    'label' => esc_html__('Content', 'vlcore'),
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
               'vl_post_content',
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
               'vl_post_content_limit',
               [
               'label' => __('Content Limit', 'ftcore'),
               'type' => Controls_Manager::TEXT,
               'label_block' => true,
               'default' => '14',
               'dynamic' => [
                    'active' => true,
               ],
               'condition' => [
                    'vl_post_content' => 'yes'
               ]
               ]
          );


          $this->add_control(
			'readmorebtntext',
			[
				'label' => esc_html__( 'Button Text', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'vlcore' ),
				'placeholder' => esc_html__( 'Type your button text', 'vlcore' ),
			]
		);

          $this->add_control(
			'show_blog_btn_icon',
			[
				'label' => esc_html__( 'Show Icon', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->end_controls_section();

          $this->start_controls_section(
               'section_options',
               [
                    'label' => esc_html__('Options', 'vlcore'),
               ]
          );

          $this->add_control(
			'show_author',
			[
				'label' => esc_html__( 'Show Author', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->add_control(
			'show_date',
			[
				'label' => esc_html__( 'Show Date', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

          $this->add_control(
			'show_button',
			[
				'label' => esc_html__( 'Show Button', 'vlcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlcore' ),
				'label_off' => esc_html__( 'Hide', 'vlcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


          $this->end_controls_section();


          $this->start_controls_section(
               'service_query',
                    [
                         'label' => esc_html__('Query', 'vlcore'),
                    ]
               );
     
          
               $post_type = 'post';
               $taxonomy = 'category';
     
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
          'blog_content_style',
          [
               'label' => esc_html__( 'Blog Box Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'blog_content_style_tabs'
     );
     
     $this->start_controls_tab(
          'blog_content_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Background::get_type(),
          [
               'name' => 'blog_box_bg',
               'types' => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .blog1-box .heading-area, {{WRAPPER}} .blog3 .blog3-box .heading-area, {{WRAPPER}} .blog4-box, {{WRAPPER}} .blog7 .blog-box, {{WRAPPER}} .blog9 .blog-box .heading',
          ]
     );

     $this->add_group_control(
          \Elementor\Group_Control_Box_Shadow::get_type(),
          [
               'name' => 'blog_box_shadow',
               'selector' => '{{WRAPPER}} .blog4-box',
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Blog Title Typography', 'vlcore' ),
               'name' => 'blog_title_typography',
               'selector' => '{{WRAPPER}} .heading1 h4 a, {{WRAPPER}} .heading3 h4 a, {{WRAPPER}} .heading4 h5 a, {{WRAPPER}} .blog7 .blog-box .heading h4 a, {{WRAPPER}} .blog9 .blog-box .heading h4 a',
          ]
     );


     $this->add_control(
          'blog_title_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading3 h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading h4 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading h4 a' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Blog Content Typography', 'vlcore' ),
               'name' => 'blog_content_typography',
               'selector' => '{{WRAPPER}} .heading1 p, {{WRAPPER}} .heading4 p, {{WRAPPER}} .heading3 p',
          ]
     );

     $this->add_control(
          'blog_content_color',
          [
               'label' => esc_html__( 'Content Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading4 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading1 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading3 p' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     $this->end_controls_tab();
     $this->start_controls_tab(
          'blog_content_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );



     $this->add_control(
          'blog_title_hover_color',
          [
               'label' => esc_html__( 'Title Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .heading3 h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading4 h5 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading h4 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading h4 a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );


     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();

     $this->start_controls_section(
          'blog_meta_style',
          [
               'label' => esc_html__( 'Blog Meta Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );
     $this->start_controls_tabs(
          'blog_meta_style_tabs'
     );
     
     $this->start_controls_tab(
          'blog_meta_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );



     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Blog Meta Typography', 'vlcore' ),
               'name' => 'blog_meta_typography',
               'selector' => '{{WRAPPER}} .blog3 .blog3-box .heading-area .tags a, {{WRAPPER}} .blog9 .blog-box .heading .date, {{WRAPPER}} .blog7 .blog-box .heading a, {{WRAPPER}} .blog1-box .heading-area .tags a, {{WRAPPER}} .blog4-box .heading4 .tags a',
          ]
     );


     $this->add_control(
          'blog_meta_color',
          [
               'label' => esc_html__( 'Meta Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .blog1-box .heading-area .tags a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog4-box .heading4 .tags a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading .date' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog3 .blog3-box .heading-area .tags a' => 'color: {{VALUE}}',
               ],
          ]
     );


     
     $this->end_controls_tab();
     $this->start_controls_tab(
          'blog_meta_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );


     $this->add_control(
          'blog_meta_hover_color',
          [
               'label' => esc_html__( 'Meta Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .blog1-box .heading-area .tags a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog4-box .heading4 .tags a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading .date:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog3 .blog3-box .heading-area .tags a:hover' => 'color: {{VALUE}}',
               ],
          ]
     );

     
     
     $this->end_controls_tab();
     $this->end_controls_tabs();
     $this->end_controls_section();


     $this->start_controls_section(
          'blog_button_style',
          [
               'label' => esc_html__( 'Blog Button Style', 'vlcore' ),
               'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
     );

     $this->start_controls_tabs(
          'blog_button_style_tabs'
     );
     
     $this->start_controls_tab(
          'blog_button_style_normal_tab',
          [
               'label' => esc_html__( 'Normal', 'vlcore' ),
          ]
     );


     $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
               'label' => esc_html__( 'Blog Button Typography', 'vlcore' ),
               'name' => 'blog_button_typography',
               'selector' => '{{WRAPPER}} .blog9 .blog-box .heading .learn, {{WRAPPER}} .blog7 .blog-box .heading .learn, {{WRAPPER}} .blog4-box .heading4 a.learn, {{WRAPPER}} .blog1-box .heading-area .heading1 a.learn, {{WRAPPER}} .blog3 .blog3-box .heading-area .heading3 a.learn',
          ]
     );

     $this->add_control(
          'blog_button_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .blog1-box .heading-area .heading1 a.learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog3 .blog3-box .heading-area .heading3 a.learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog4-box .heading4 a.learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading .learn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading .learn' => 'color: {{VALUE}}',
               ],
          ]
     );


     
     $this->end_controls_tab();
     $this->start_controls_tab(
          'blog_button_style_hover_tab',
          [
               'label' => esc_html__( 'Hover', 'vlcore' ),
          ]
     );
     
     $this->add_control(
          'blog_button_hover_color',
          [
               'label' => esc_html__( 'Button Color', 'vlcore' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                    '{{WRAPPER}} .blog1-box .heading-area .heading1 a.learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog3 .blog3-box .heading-area .heading3 a.learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog4-box .heading4 a.learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog7 .blog-box .heading .learn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog9 .blog-box .heading .learn:hover' => 'color: {{VALUE}}',
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
               'post_type' => 'post',
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
                       'taxonomy'	=> 'category',
                       'field'	 	=> 'slug',
                       'terms'		=> $exclude_category_list_value,
                       'operator'	=> 'NOT IN'
                   )
               );
   
               // Include the correct cats in tax_query
               if ( !empty($settings['category'])) {
                   $args['tax_query']['relation'] = 'AND';
                   $args['tax_query'][] = array(
                       'taxonomy'	=> 'category',
                       'field'		=> 'slug',
                       'terms'		=> $category_list_value,
                       'operator'	=> 'IN'
                   );
               }
   
           } else {
               // Include the cats from $cat_slugs in tax_query
               if (!empty($settings['category'])) {
                   $args['tax_query'][] = [
                       'taxonomy' => 'category',
                       'field' => 'slug',
                       'terms' => $category_list_value,
                   ];
               }
           }
   
           $filter_list = $settings['category'];
   
           // The Query
           $vlblogquery = new \WP_Query($args);



          ?>

<?php if($settings['vl_design_style'] == 'layout-1') : ?>

<div class="blog1">
     <div class="container">
          <div class="row">

               <?php while ($vlblogquery->have_posts()) : 
                    $vlblogquery->the_post();
                    global $post;
                    $categories = get_the_category($post->ID);
               ?>
               <div class="col-lg-6">
                    <div class="blog1-box overlay-anim" data-aos="zoom-in-up" data-aos-duration="800">
                         
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                         </div>
      

                         <div class="heading-area">

                              <div class="tags">
                                   <?php if($settings['show_date'] == 'yes') : ?>
                                   <a href="#"><span><i class="fas fa-calendar-alt"></i></span> <?php the_time( get_option('date_format') ); ?></a>
                                   <?php endif; ?>

                                   <?php if($settings['show_author'] == 'yes') : ?>
                                   <a href="#"><span><i class="far fa-user"></i></span> <?php print get_the_author();?></a>
                                   <?php endif; ?>
                              </div>
                              <div class="heading1">

                                   <?php if(!empty(get_the_title())): ?>
                                   <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                                   <?php endif; ?>

                                   <?php if (!empty($settings['vl_post_content'])): ?>
                                   <?php $vl_post_content_limit = (!empty($settings['vl_post_content_limit'])) ? $settings['vl_post_content_limit'] : ''; ?>
                                   <div class="space16"></div>
                                   <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_post_content_limit, ''); ?></p>
                                   <?php endif; ?>
                                   
                                   <?php if($settings['show_button'] == 'yes') : ?>
                                   <div class="blog1-border"></div>
                                   <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['readmorebtntext']); ?> 
                                        <?php if($settings['show_blog_btn_icon'] == 'yes') : ?>
                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                        <?php endif; ?>
                                   </a>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>
               </div>

               <?php endwhile; wp_reset_query(); ?>
          </div>
     </div>
</div>


<?php elseif($settings['vl_design_style'] == 'layout-2') : ?>


<div class="blog3">
     <div class="container">
          <div class="row">

               <?php while ($vlblogquery->have_posts()) : 
                    $vlblogquery->the_post();
                    global $post;
                    $categories = get_the_category($post->ID);
               ?>

               <div class="col-lg-6">
                    <div class="blog3-box" data-aos="zoom-in-up" data-aos-duration="800">
                  
                         <div class="image">
                              <?php the_post_thumbnail('full');?>
                         </div>
       
                         <div class="heading-area">
                              <div class="tags">
                                   
                                   <?php if($settings['show_date'] == 'yes') : ?>
                                   <a href="#"><span><i class="fas fa-calendar-alt"></i></span> <?php the_time( get_option('date_format') ); ?></a>
                                   <?php endif; ?>

                                   <?php if($settings['show_author'] == 'yes') : ?>
                                   <a href="#"><span><i class="far fa-user"></i></span>  <?php print get_the_author();?></a>
                                   <?php endif; ?>

                              </div>
                              <div class="heading3">

                                   <?php if(!empty(get_the_title())): ?>
                                   <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                                   <?php endif; ?>

                                   <?php if (!empty($settings['vl_post_content'])): ?>
                                   <?php $vl_post_content_limit = (!empty($settings['vl_post_content_limit'])) ? $settings['vl_post_content_limit'] : ''; ?>
                                   <div class="space16"></div>
                                   <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_post_content_limit, ''); ?>  </p>
                                   <?php endif; ?>

                                   <?php if($settings['show_button'] == 'yes') : ?>
                                   <div class="blog1-border"></div>
                                   <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['readmorebtntext']); ?>
                                         <?php if($settings['show_blog_btn_icon'] == 'yes') : ?>
                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                        <?php endif; ?>
                                   </a>
                                   <?php endif; ?>
                              </div>
                         </div>

                    </div>
               </div>

               <?php endwhile; wp_reset_query(); ?>


          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-3') : ?>

<div class="blog4">
     <div class="container">
          <div class="row">

               <?php while ($vlblogquery->have_posts()) : 
                         $vlblogquery->the_post();
                         global $post;
                         $categories = get_the_category($post->ID);
                    ?>
               <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="1100">
                    <div class="blog4-box">
                         
                         <div class="image overlay-anim">
                              <?php the_post_thumbnail('full');?>
                         </div>
                     
                         <div class="heading4">
                              <div class="tags">
                                   <?php if($settings['show_date'] == 'yes') : ?>
                                   <a href="#"><span><i class="fas fa-calendar-alt"></i></span> <?php the_time( get_option('date_format') ); ?></a>
                                   <?php endif; ?>

                                   <?php if($settings['show_author'] == 'yes') : ?>
                                   <a href="#"><span><i class="far fa-user"></i></span> <?php print get_the_author();?></a>
                                   <?php endif; ?>
                              </div>

                              <?php if(!empty(get_the_title())): ?>
                                   <h5><a  href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h5>
                              <?php endif; ?>
                             
                              <?php if (!empty($settings['vl_post_content'])): ?>
                              <?php $vl_post_content_limit = (!empty($settings['vl_post_content_limit'])) ? $settings['vl_post_content_limit'] : ''; ?>
                              <div class="space16"></div>
                              <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $vl_post_content_limit, ''); ?></p>
                              <?php endif; ?>

                              <?php if($settings['show_button'] == 'yes') : ?>
                              <div class="blog1-border"></div>
                              <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['readmorebtntext']); ?> 
                              <?php if($settings['show_blog_btn_icon'] == 'yes') : ?>
                                   <span><i class="fa-solid fa-arrow-right"></i></span>
                              <?php endif; ?>
                              </a>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
               <?php endwhile; wp_reset_query(); ?>

          </div>
     </div>
</div>

<?php elseif($settings['vl_design_style'] == 'layout-4') : ?>
     <div class="blog7">
          <div class="container">
               <div class="row align-items-center">

               <?php while ($vlblogquery->have_posts()) : 
                         $vlblogquery->the_post();
                         global $post;
                         $categories = get_the_category($post->ID);
                    ?>

                    <div class="blog-box">
                     
                         <div class="">
                              <div class="image overlay-anim">
                              <?php the_post_thumbnail('full');?>
                              </div>
                         </div>
                 
                         <div class="heading">

                         <?php if($settings['show_date'] == 'yes') : ?>
                         <a href="<?php the_permalink(); ?>"><span><i class="fas fa-calendar-alt"></i></span> <?php the_time( get_option('date_format') ); ?></a>
                         <?php endif; ?>

                         <?php if(!empty(get_the_title())): ?>
                         <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                         <?php endif; ?>

                         <?php if($settings['show_button'] == 'yes') : ?>
                         <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['readmorebtntext']); ?> 
                              <?php if($settings['show_blog_btn_icon'] == 'yes') : ?>
                              <span><i class="fa-solid fa-arrow-right"></i></span>
                         <?php endif; ?>
                         </a>
                         <?php endif; ?>

                         </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>

               </div>
          </div>
     </div>

<?php elseif($settings['vl_design_style'] == 'layout-5') : ?>

     <div class="blog9">
        <div class="container">
          <div class="row">

               <?php while ($vlblogquery->have_posts()) : 
                    $vlblogquery->the_post();
                    global $post;
                    $categories = get_the_category($post->ID);
               ?>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="900">
              <div class="blog-box">
      
                <div class="image overlay-anim">
                    <?php the_post_thumbnail('full');?>
                </div>
       

                <div class="heading">

                <?php if($settings['show_date'] == 'yes') : ?>
                <a href="#" class="date"><span><i class="fas fa-calendar-alt"></i></span> <?php the_time( get_option('date_format') ); ?></a>
               <?php endif; ?>

                <?php if(!empty(get_the_title())): ?>
                <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['vl_blog_title_word'], ''); ?></a></h4>
                <?php endif; ?>

               <?php if($settings['show_button'] == 'yes') : ?>
                <a href="<?php the_permalink(); ?>" class="learn"><?php echo esc_html($settings['readmorebtntext']); ?> 
                <?php if($settings['show_blog_btn_icon'] == 'yes') : ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span>
               <?php endif; ?>
               </a>
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

$widgets_manager->register( new VL_blog() );