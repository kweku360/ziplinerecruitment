<?php
/**
 * Why Choose Us Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Why_Choose_Us_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_why_choose_us';
    }

    public function get_title() {
        return esc_html__('Why Choose Us', 'recrute');
    }

    public function get_icon() {
        return 'eicon-star';
    }

    public function get_categories() {
        return ['recrute-category'];
    }

    protected function register_controls() {
        // Content Settings
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Why Choose Us', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Choose Excellence Elevate Your Hiring Experience', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our team of industry experts is dedicated to understanding your unique needs and delivering tailored solutions that propel your business forward.', 'recrute'),
                'label_block' => true,
                'rows' => 4,
            ]
        );

        $this->end_controls_section();

        // Features Settings
        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Features', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__('Icon', 'recrute'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Expert Team', 'recrute'),
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__('Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our experienced team ensures quality recruitment solutions.', 'recrute'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_icon' => [
                            'value' => 'fas fa-check-circle',
                            'library' => 'fa-solid',
                        ],
                        'feature_title' => esc_html__('Expert Team', 'recrute'),
                        'feature_description' => esc_html__('Our experienced team ensures quality recruitment solutions.', 'recrute'),
                    ],
                    [
                        'feature_icon' => [
                            'value' => 'fas fa-clock',
                            'library' => 'fa-solid',
                        ],
                        'feature_title' => esc_html__('Fast Service', 'recrute'),
                        'feature_description' => esc_html__('Quick turnaround times for all your hiring needs.', 'recrute'),
                    ],
                    [
                        'feature_icon' => [
                            'value' => 'fas fa-shield-alt',
                            'library' => 'fa-solid',
                        ],
                        'feature_title' => esc_html__('Trusted Partner', 'recrute'),
                        'feature_description' => esc_html__('Reliable and secure recruitment services.', 'recrute'),
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->end_controls_section();

        // Button Settings
        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__('Button', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'recrute'),
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'recrute'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'recrute'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Colors
        $this->start_controls_section(
            'section_style_colors',
            [
                'label' => esc_html__('Colors', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__('Feature Title Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_description_color',
            [
                'label' => esc_html__('Feature Description Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .feature-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .feature-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Button Hover Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#E55A3A',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Button Hover Text Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="why-choose-us-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="why-choose-header text-center">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <p class="why-choose-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="why-choose-title"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['description'])): ?>
                                <div class="why-choose-description">
                                    <?php echo wp_kses_post(nl2br($settings['description'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php if (!empty($settings['features'])): ?>
                    <div class="row">
                        <?php foreach ($settings['features'] as $feature): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="feature-card">
                                    <?php if (!empty($feature['feature_icon']['value'])): ?>
                                        <div class="feature-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_title'])): ?>
                                        <h3 class="feature-title"><?php echo esc_html($feature['feature_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_description'])): ?>
                                        <div class="feature-description">
                                            <?php echo wp_kses_post(nl2br($feature['feature_description'])); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($settings['button_text'])): ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" 
                               class="why-choose-btn"
                               <?php echo $settings['button_url']['is_external'] ? 'target="_blank"' : ''; ?>
                               <?php echo $settings['button_url']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                <?php echo esc_html($settings['button_text']); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
} 