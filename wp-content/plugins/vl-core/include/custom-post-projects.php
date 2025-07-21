<?php 
class VlPortfoliosPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'projects_template_include' ) );
	}
	
	public function projects_template_include( $template ) {
		if ( is_singular( 'vl-projects' ) ) {
			return $this->get_template( 'single-vl-projects.php');
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
		$vlcore_projects_slug = get_theme_mod( 'vlcore_projects_slug', __( 'projects', 'vlcore' ) );
		$labels = array(
			'name'                  => esc_html_x( 'Projects', 'Post Type General Name', 'vlcore' ),
			'singular_name'         => esc_html_x( 'Project', 'Post Type Singular Name', 'vlcore' ),
			'menu_name'             => esc_html__( 'Projects', 'vlcore' ),
			'name_admin_bar'        => esc_html__( 'Projects', 'vlcore' ),
			'archives'              => esc_html__( 'Item Archives', 'vlcore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'vlcore' ),
			'all_items'             => esc_html__( 'All Items', 'vlcore' ),
			'add_new_item'          => esc_html__( 'Add New Portfolio', 'vlcore' ),
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
			'label'                 => esc_html__( 'Projects', 'vlcore' ),
			'labels'                => $labels,
			'supports'              => ['title', 'editor', 'thumbnail', 'elementor'],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $vlcore_projects_slug,
				'with_front' => false
			),
		);

		register_post_type( 'vl-projects', $args );
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Project Categories', 'Taxonomy General Name', 'vlcore' ),
			'singular_name'              => esc_html_x( 'Project Categories', 'Taxonomy Singular Name', 'vlcore' ),
			'menu_name'                  => esc_html__( 'Project Categories', 'vlcore' ),
			'all_items'                  => esc_html__( 'All Project Category', 'vlcore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'vlcore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'vlcore' ),
			'new_item_name'              => esc_html__( 'New Project Category Name', 'vlcore' ),
			'add_new_item'               => esc_html__( 'Add New Project Category', 'vlcore' ),
			'edit_item'                  => esc_html__( 'Edit Project Category', 'vlcore' ),
			'update_item'                => esc_html__( 'Update Project Category', 'vlcore' ),
			'view_item'                  => esc_html__( 'View Project Category', 'vlcore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'vlcore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'vlcore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'vlcore' ),
			'popular_items'              => esc_html__( 'Popular Project Category', 'vlcore' ),
			'search_items'               => esc_html__( 'Search Project Category', 'vlcore' ),
			'not_found'                  => esc_html__( 'Not Found', 'vlcore' ),
			'no_terms'                   => esc_html__( 'No Project Category', 'vlcore' ),
			'items_list'                 => esc_html__( 'Project Category list', 'vlcore' ),
			'items_list_navigation'      => esc_html__( 'Project Category list navigation', 'vlcore' ),
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

		register_taxonomy('projects-cat','vl-projects', $args );
	}

}

new VlPortfoliosPost();
