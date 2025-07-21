add_action('elementor/widgets/register', function($widgets_manager) {
    require_once __DIR__ . '/include/elementor/vl-additional-services.php';
    $widgets_manager->register( new \VLcore\Widgets\VL_Additional_Services() );
});
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'vl-additional-services-style',
        plugin_dir_url(__FILE__) . 'include/elementor/vl-additional-services.css'
    );
}); 