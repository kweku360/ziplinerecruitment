<?php 
class VlServicesPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'services_template_include' ) );
	}
	
	public function services_template_include( $template ) {
		if ( is_singular( 'vl-services' ) ) {
			return $this->get_template( 'single-vl-services.php');
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
		$vlcore_services_slug = get_theme_mod( 'vlcore_services_slug', __( 'services', 'vlcore' ) );
		$labels = array(
			'name'                  => esc_html_x( 'Services', 'Post Type General Name', 'vlcore' ),
			'singular_name'         => esc_html_x( 'Service', 'Post Type Singular Name', 'vlcore' ),
			'menu_name'             => esc_html__( 'Services', 'vlcore' ),
			'name_admin_bar'        => esc_html__( 'Services', 'vlcore' ),
			'archives'              => esc_html__( 'Item Archives', 'vlcore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'vlcore' ),
			'all_items'             => esc_html__( 'All Items', 'vlcore' ),
			'add_new_item'          => esc_html__( 'Add New Service', 'vlcore' ),
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
			'label'                 => esc_html__( 'Service', 'vlcore' ),
			'labels'                => $labels,
			'supports'              => ['title', 'editor', 'thumbnail', 'elementor'],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-shield',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $vlcore_services_slug,
				'with_front' => false
			),
		);

		register_post_type( 'vl-services', $args );
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Service Categories', 'Taxonomy General Name', 'vlcore' ),
			'singular_name'              => esc_html_x( 'Service Categories', 'Taxonomy Singular Name', 'vlcore' ),
			'menu_name'                  => esc_html__( 'Service Categories', 'vlcore' ),
			'all_items'                  => esc_html__( 'All Service Category', 'vlcore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'vlcore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'vlcore' ),
			'new_item_name'              => esc_html__( 'New Service Category Name', 'vlcore' ),
			'add_new_item'               => esc_html__( 'Add New Service Category', 'vlcore' ),
			'edit_item'                  => esc_html__( 'Edit Service Category', 'vlcore' ),
			'update_item'                => esc_html__( 'Update Service Category', 'vlcore' ),
			'view_item'                  => esc_html__( 'View Service Category', 'vlcore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'vlcore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'vlcore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'vlcore' ),
			'popular_items'              => esc_html__( 'Popular Service Category', 'vlcore' ),
			'search_items'               => esc_html__( 'Search Service Category', 'vlcore' ),
			'not_found'                  => esc_html__( 'Not Found', 'vlcore' ),
			'no_terms'                   => esc_html__( 'No Service Category', 'vlcore' ),
			'items_list'                 => esc_html__( 'Service Category list', 'vlcore' ),
			'items_list_navigation'      => esc_html__( 'Service Category list navigation', 'vlcore' ),
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

		register_taxonomy('services-cat','vl-services', $args );
	}

}

new VlServicesPost();