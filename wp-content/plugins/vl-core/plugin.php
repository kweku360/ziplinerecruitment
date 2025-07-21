<?php
namespace VLcore;

use VLcore\PageSettings\Page_Settings;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class VL_Core_Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Add Category
	 */

    public function vl_core_elementor_category($manager)
    {
        $manager->add_category(
            'vlcore',
            array(
                'title' => esc_html__('VL Addons', 'vlcore'),
                'icon' => 'eicon-banner',
            )
        );
    }

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'vlcore', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_hero', plugins_url( '/assets/js/vl-hero.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_brand', plugins_url( '/assets/js/vl-brand.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_testimonial_script', plugins_url( '/assets/js/vl-testimonial.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_price', plugins_url( '/assets/js/vl-price.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_about', plugins_url( '/assets/js/vl-about.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_project', plugins_url( '/assets/js/vl-project.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'vl_service', plugins_url( '/assets/js/vl-service.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	/**
	 * Editor scripts
	 *
	 * Enqueue plugin javascripts integrations for Elementor editor.
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'editor_scripts_as_a_module' ], 10, 2 );

		wp_enqueue_script(
			'vlcore-editor',
			plugins_url( '/assets/js/editor/editor.js', __FILE__ ),
			[
				'elementor-editor',
			],
			'1.2.1',
			true
		);
	}


	/**
	 * vl_enqueue_editor_scripts
	 */
    function vl_enqueue_editor_scripts()
    {
        wp_enqueue_style('tp-element-addons-editor', VLCORE_ADDONS_URL . 'assets/css/editor.css', null, '1.0');
    }


	/**
	 * Force load editor script as a module
	 *
	 * @since 1.2.1
	 *
	 * @param string $tag
	 * @param string $handle
	 *
	 * @return string
	 */
	public function editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'vlcore-editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		// Its is now safe to include Widgets files
		foreach($this->vlcore_widget_list() as $widget_file_name){
			require_once( VLCORE_ELEMENTS_PATH . "/{$widget_file_name}.php" );
		}

		// Wpeventin
		if ( class_exists( 'Wpeventin' ) ) {
			foreach($this->vlcore_widget_list_events_etn() as $widget_file_name){
				require_once( VLCORE_ELEMENTS_PATH . "/{$widget_file_name}.php" );
			}
		}

		// give donation
		if ( class_exists( 'Charitable' ) ) {
			foreach($this->vlcore_widget_list_donation() as $widget_file_name){
				require_once( VLCORE_ELEMENTS_PATH . "/{$widget_file_name}.php" );
			}
		}
	}

	public function vlcore_widget_list() {
		return [
			'vl-hero',
			'vl-about',
			'vl-heading',
			'vl-brand',
			'vl-button',
			'vl-team',
			'vl-testimonial',
			'vl-contact',
			'vl-projects',
			'vl-services',
			'vl-blog',
			'vl-pricing-pan',
			'vl-work',
			'vl-jobs',
			'vl-solution',
			'vl-work-steps',
			'vl-industry',
		];
	}

	// etn events
	public function vlcore_widget_list_events_etn() {
		return [
			// 'events',
		];
	}

	// give
	public function vlcore_widget_list_donation() {
		return [
			// 'charity',
		];
	}

	/**
	 * Add page settings controls
	 *
	 * Register new settings for a document page settings.
	 *
	 * @since 1.2.1
	 * @access private
	 */
	// private function add_page_settings_controls() {
	// 	require_once( __DIR__ . '/page-settings/manager.php' );
	// 	new Page_Settings();
	// }


	/**
	 * Register controls
	 *
	 * @param Controls_Manager $controls_Manager
	 */

    public function register_controls(Controls_Manager $controls_Manager)
    {
        include_once(VLCORE_ADDONS_DIR . '/controls/tpgradient.php');
        $tpgradient = 'VLcore\Elementor\Controls\Group_Control_TPGradient';
        $controls_Manager->add_group_control($tpgradient::get_type(), new $tpgradient());

        include_once(VLCORE_ADDONS_DIR . '/controls/tpbggradient.php');
        $tpbggradient = 'VLcore\Elementor\Controls\Group_Control_TPBGGradient';
        $controls_Manager->add_group_control($tpbggradient::get_type(), new $tpbggradient());
    }


    public function vl_add_custom_icons_tab($tabs = array()){

        // Append new icons
        $feather_icons = array(
            'feather-activity',
            'feather-airplay',
            'feather-alert-circle',
            'feather-alert-octagon',
            'feather-alert-triangle',
            'feather-align-center',
            'feather-align-justify',
            'feather-align-left',
            'feather-align-right',
        );

        $tabs['tp-feather-icons'] = array(
            'name' => 'tp-feather-icons',
            'label' => esc_html__('VL - Feather Icons', 'vlcore'),
            'labelIcon' => 'tp-icon',
            'prefix' => '',
            'displayPrefix' => 'tp',
            'url' => VLCORE_ADDONS_URL . 'assets/css/feather.css',
            'icons' => $feather_icons,
            'ver' => '1.0.0',
        );


        // Append flaticon fonts icons
        $flat_icons = array(
            'flaticon-stethoscope',
            'flaticon-user',
            'flaticon-phone',
            'flaticon-loupe',
            'flaticon-curved-arrow',
            'flaticon-diet',
            'flaticon-handshake',
            'flaticon-play-button',
            'flaticon-arrow-right',
            'flaticon-double-quotes',
            'flaticon-time',
            'flaticon-pin',
            'flaticon-check-mark-black-outline',
            'flaticon-handshake-1',
            'flaticon-tag',
            'flaticon-mail',
            'flaticon-telephone-call',
            'flaticon-book',
            'flaticon-drops',
            'flaticon-healthy-food',
            'flaticon-giving',
            'flaticon-settings',
            'flaticon-volunteer',
            'flaticon-donor',
            'flaticon-handshake-2',
            'flaticon-facebook-logo',
            'flaticon-instagram',
            'flaticon-twitter',
            'flaticon-pinterest',
            'flaticon-agree',
            'flaticon-pray',
            'flaticon-world-blood-donor-day',
			'flaticon-quote',
			'flaticon-map',
			'flaticon-down-arrow',
			'flaticon-open-book',
			'flaticon-warning',
			'flaticon-comment',
			'flaticon-calendar',
			'flaticon-folder',
			'flaticon-home',
			'flaticon-love',
			'flaticon-people',
			'flaticon-shopping-cart',
			'flaticon-heart',
			'flaticon-email',
			'flaticon-mission',
			'flaticon-vision',
			'flaticon-right-arrow',
			'flaticon-up-arrow',
			'flaticon-right-arrow-1',
			'flaticon-down-arrow-1',
			'flaticon-location',
			'flaticon-home-1',
			'flaticon-zakat',
			'flaticon-people-1',
			'flaticon-love-1'
        );

        $tabs['tp-flaticon-icons'] = array(
            'name' => 'tp-flaticon-icons',
            'label' => esc_html__('VL - Flaticons', 'vlcore'),
            'labelIcon' => 'tp-icon',
            'prefix' => '',
            'displayPrefix' => 'tp',
            'url' => VLCORE_ADDONS_URL . 'assets/css/flaticon.css',
            'icons' => $flat_icons,
            'ver' => '1.0.0',
        );

        $fontawesome_icons = array(
	        'angle-up',
	        'check',
	        'times',
	        'calendar',
	        'language',
	        'shopping-cart',
	        'bars',
	        'search',
	        'map-marker',
	        'arrow-right',
	        'arrow-left',
	        'arrow-up',
	        'arrow-down',
	        'angle-right',
	        'angle-left',
	        'angle-up',
	        'angle-down',
	        'phone',
	        'users',
	        'user',
	        'map-marked-alt',
	        'trophy-alt',
	        'envelope',
	        'marker',
	        'globe',
	        'broom',
	        'home',
	        'bed',
	        'chair',
	        'bath',
	        'tree',
	        'laptop-code',
	        'cube',
	        'cog',
	        'play',
	        'trophy-alt',
	        'heart',
	        'truck',
	        'user-circle',
	        'map-marker-alt',
	        'comments',
	         'award',
	        'bell',
	        'book-alt',
	        'book-open',
	        'book-reader',
	        'graduation-cap',
	        'laptop-code',
	        'music',
	        'ruler-triangle',
	        'user-graduate',
	        'microscope',
	        'glasses-alt',
	        'theater-masks',
	        'atom'
        );

        $tabs['tp-fontawesome-icons'] = array(
            'name' => 'tp-fontawesome-icons',
            'label' => esc_html__('VL - Fontawesome Pro Light', 'vlcore'),
            'labelIcon' => 'tp-icon',
            'prefix' => 'fa-',
            'displayPrefix' => 'fal',
            'url' => VLCORE_ADDONS_URL . 'assets/css/fontawesome-all.min.css',
            'icons' => $fontawesome_icons,
            'ver' => '1.0.0',
        );

        return $tabs;
    }


	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'editor_scripts' ] );

		add_action('elementor/elements/categories_registered', [$this, 'vl_core_elementor_category']);

		// Register custom controls
	    add_action('elementor/controls/controls_registered', [$this, 'register_controls']);
	    add_action('elementor/controls/register_style_controls', [$this, 'register_style_rols']);

	    add_filter('elementor/icons_manager/additional_tabs', [$this, 'vl_add_custom_icons_tab']);

	    // $this->vl_add_custom_icons_tab();

	    add_action('elementor/editor/after_enqueue_scripts', [$this, 'vl_enqueue_editor_scripts'] );


		// $this->add_page_settings_controls();

	}


}

// Instantiate Plugin Class
VL_Core_Plugin::instance();
