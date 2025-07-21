<?php
/**
 * Elementor Widgets Manager
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Elementor_Widgets_Manager {

    public function __construct() {
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_widget_categories']);
    }

    public function register_widgets($widgets_manager) {
        // Include widget files
        require_once(__DIR__ . '/process-widget.php');
        require_once(__DIR__ . '/ceo-widget.php');
        require_once(__DIR__ . '/cta-banner-widget.php');
        require_once(__DIR__ . '/about-hero-widget.php');
        require_once(__DIR__ . '/vision-mission-widget.php');
        require_once(__DIR__ . '/stats-widget.php');
        require_once(__DIR__ . '/why-choose-us-widget.php');
        require_once(__DIR__ . '/custom-services-widget.php');
        require_once(__DIR__ . '/minimal-service-card-widget.php');
        require_once(__DIR__ . '/advisory-board-widget.php');
        require_once(__DIR__ . '/ceo-message-card-widget.php');
        
        // Register widgets
        $widgets_manager->register(new Recrute_Process_Widget());
        $widgets_manager->register(new Recrute_CEO_Widget());
        $widgets_manager->register(new Recrute_CTA_Banner_Widget());
        $widgets_manager->register(new Recrute_About_Hero_Widget());
        $widgets_manager->register(new Recrute_Vision_Mission_Widget());
        $widgets_manager->register(new Recrute_Stats_Widget());
        $widgets_manager->register(new Recrute_Why_Choose_Us_Widget());
        $widgets_manager->register(new Recrute_Custom_Services_Widget());
        $widgets_manager->register(new Recrute_Minimal_Service_Card_Widget());
        $widgets_manager->register(new Recrute_Advisory_Board_Widget());
        $widgets_manager->register(new Recrute_CEO_Message_Card_Widget());
    }

    public function add_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'recrute-category',
            [
                'title' => esc_html__('Recrute Widgets', 'recrute'),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}

// Initialize the widgets manager
new Recrute_Elementor_Widgets_Manager(); 