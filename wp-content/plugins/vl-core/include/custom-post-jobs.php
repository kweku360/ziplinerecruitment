<?php 
class VlJobsPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'jobs_template_include' ) );
	}
	
	public function jobs_template_include( $template ) {
		if ( is_singular( 'jobs' ) ) {
			return $this->get_template( 'single-vl-job.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} 
		else {
			$file = VLCORE_ADDONS_DIR . '/include/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {
		$vl_jobs_slug = get_theme_mod( 'vl_jobs_slug', __( 'jobs', 'vlcore' ) );
		$labels = array(
			'name'                  => esc_html_x( 'Jobs', 'Post Type General Name', 'vlcore' ),
			'singular_name'         => esc_html_x( 'job', 'Post Type Singular Name', 'vlcore' ),
			'menu_name'             => esc_html__( 'Jobs', 'vlcore' ),
			'name_admin_bar'        => esc_html__( 'Jobs', 'vlcore' ),
			'archives'              => esc_html__( 'Item Archives', 'vlcore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'vlcore' ),
			'all_items'             => esc_html__( 'All Items', 'vlcore' ),
			'add_new_item'          => esc_html__( 'Add New job', 'vlcore' ),
			'add_new'               => esc_html__( 'Add New', 'vlcore' ),
			'new_item'              => esc_html__( 'New Item', 'vlcore' ),
			'edit_item'             => esc_html__( 'Edit Item', 'vlcore' ),
			'update_item'           => esc_html__( 'Update Item', 'vlcore' ),
			'view_item'             => esc_html__( 'View Item', 'vlcore' ),
			'search_items'          => esc_html__( 'Search Item', 'vlcore' ),
			'not_found'             => esc_html__( 'Not found', 'vlcore' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'vlcore' ),
			'featured_image'        => esc_html__( 'Featured Image', 'vlcore' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'vlcore' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'vlcore' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'vlcore' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'vlcore' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'vlcore' ),
			'items_list'            => esc_html__( 'Items list', 'vlcore' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'vlcore' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'vlcore' ),
		);

		$args   = array(
			'label'                 => esc_html__( 'job', 'vlcore' ),
			'labels'                => $labels,
			'supports'              => ['title', 'thumbnail', 'elementor'],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-clipboard',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $vl_jobs_slug,
				'with_front' => false
			),
		);

		register_post_type( 'jobs', $args );
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Job Categories', 'Taxonomy General Name', 'vlcore' ),
			'singular_name'              => esc_html_x( 'Job Categories', 'Taxonomy Singular Name', 'vlcore' ),
			'menu_name'                  => esc_html__( 'Job Categories', 'vlcore' ),
			'all_items'                  => esc_html__( 'All job Category', 'vlcore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'vlcore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'vlcore' ),
			'new_item_name'              => esc_html__( 'New job Category Name', 'vlcore' ),
			'add_new_item'               => esc_html__( 'Add New job Category', 'vlcore' ),
			'edit_item'                  => esc_html__( 'Edit job Category', 'vlcore' ),
			'update_item'                => esc_html__( 'Update job Category', 'vlcore' ),
			'view_item'                  => esc_html__( 'View job Category', 'vlcore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'vlcore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'vlcore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'vlcore' ),
			'popular_items'              => esc_html__( 'Popular job Category', 'vlcore' ),
			'search_items'               => esc_html__( 'Search job Category', 'vlcore' ),
			'not_found'                  => esc_html__( 'Not Found', 'vlcore' ),
			'no_terms'                   => esc_html__( 'No job Category', 'vlcore' ),
			'items_list'                 => esc_html__( 'job Category list', 'vlcore' ),
			'items_list_navigation'      => esc_html__( 'job Category list navigation', 'vlcore' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy('jobs-cat','jobs', $args );
	}

}

new VlJobsPost();


// css add for job post type metaboxs
add_action('admin_head', 'custom_css_jobs_metaboxs');

function custom_css_jobs_metaboxs() {
  echo '<style>
	.job-additional-info{
		display: flex;
		
	}
	.job-type{
		width: 50%;
		padding-right: 30px;
		border-right: 1px solid rgba(8, 8, 41, 0.08);
	}
	.job-location {
		width: 50%;
		padding-left: 30px;

    } 
  </style>';
}