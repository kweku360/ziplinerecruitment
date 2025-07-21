// Register four widget areas for the footer columns
add_action('widgets_init', function() {
    register_sidebar([
        'name' => __('Footer Column 1', 'recrute'),
        'id' => 'footer-col-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
    register_sidebar([
        'name' => __('Footer Column 2', 'recrute'),
        'id' => 'footer-col-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
    register_sidebar([
        'name' => __('Footer Column 3', 'recrute'),
        'id' => 'footer-col-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
    register_sidebar([
        'name' => __('Footer Column 4', 'recrute'),
        'id' => 'footer-col-4',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}); 