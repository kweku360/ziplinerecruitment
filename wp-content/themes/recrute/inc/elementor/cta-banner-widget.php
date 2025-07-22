<?php
/**
 * CTA Banner Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_CTA_Banner_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_cta_banner';
    }

    public function get_title() {
        return esc_html__('CTA Banner', 'recrute');
    }

    public function get_icon() {
        return 'eicon-banner';
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
            'headline',
            [
                'label' => esc_html__('Headline', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ready to Power up your Career?', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Feel free to customize this paragraph to better reflect the specific services offered by your recruitment solution & the unique value proposition.', 'recrute'),
                'label_block' => true,
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Buttons Settings
        $this->start_controls_section(
            'section_buttons',
            [
                'label' => esc_html__('Buttons', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'recrute'),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'recrute'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater->add_control(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'recrute'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => esc_html__('Primary', 'recrute'),
                    'secondary' => esc_html__('Secondary', 'recrute'),
                    'outline' => esc_html__('Outline', 'recrute'),
                ],
            ]
        );

        $this->add_control(
            'buttons',
            [
                'label' => esc_html__('Buttons', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'button_text' => esc_html__('Get Started Now', 'recrute'),
                        'button_link' => ['url' => '#'],
                        'button_style' => 'primary',
                    ],
                    [
                        'button_text' => esc_html__('Learn More', 'recrute'),
                        'button_link' => ['url' => '#'],
                        'button_style' => 'secondary',
                    ],
                ],
                'title_field' => '{{{ button_text }}}',
            ]
        );

        $this->end_controls_section();

        // Image Settings
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('Image', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label' => esc_html__('Banner Image', 'recrute'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/cta-banner-placeholder.jpg',
                ],
            ]
        );

        $this->add_control(
            'image_alt',
            [
                'label' => esc_html__('Image Alt Text', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Professional recruitment banner', 'recrute'),
            ]
        );

        $this->end_controls_section();

        // Background Settings
        $this->start_controls_section(
            'section_background',
            [
                'label' => esc_html__('Background', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_type',
            [
                'label' => esc_html__('Background Type', 'recrute'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'color',
                'options' => [
                    'color' => esc_html__('Color', 'recrute'),
                    'image' => esc_html__('Image', 'recrute'),
                ],
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'recrute'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'background_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'background_overlay',
            [
                'label' => esc_html__('Background Overlay', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(250, 100, 68, 0.8)',
                'condition' => [
                    'background_type' => 'image',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-banner::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'condition' => [
                    'background_type' => 'color',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-banner' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => esc_html__('Text Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cta-headline' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cta-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Background image inline style
        $background_style = '';
        if ($settings['background_type'] === 'image' && !empty($settings['background_image']['url'])) {
            $background_style = 'style="background-image: url(' . esc_url($settings['background_image']['url']) . ');"';
        }
        ?>
        <section class="cta-banner" style=" padding:50px;margin:0 auto;" <?php echo $background_style; ?>>
            <div class="container">
                <div class="row align-items-center">
                    <!-- Image Content (Left Side) -->
                    <div class="col-lg-6 col-md-6">
                        <div class="cta-image-container">
                            <?php if (!empty($settings['banner_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['banner_image']['url']); ?>" 
                                     alt="<?php echo esc_attr($settings['image_alt']); ?>" 
                                     class="cta-image">
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- CTA Content (Right Side) -->
                    <div class="col-lg-6 col-md-6">
                        <div class="cta-content">
                            <?php if (!empty($settings['headline'])): ?>
                                <h2 class="cta-headline"><?php echo esc_html($settings['headline']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['description'])): ?>
                                <p class="cta-description"><?php echo esc_html($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['buttons'])): ?>
                                <div class="cta-buttons" style="padding-top: 20px;padding-bottom: 20px;">
                                    <?php foreach ($settings['buttons'] as $index => $button): ?>
                                        <?php
                                        $button_text = $button['button_text'];
                                        $button_link = $button['button_link']['url'];
                                        $button_style = $button['button_style'];
                                        $button_target = $button['button_link']['is_external'] ? 'target="_blank"' : '';
                                        $button_nofollow = $button['button_link']['nofollow'] ? 'rel="nofollow"' : '';
                                        ?>
                                        <a href="<?php echo esc_url($button_link); ?>" 
                                           class="cta-button theme-btn1<?php echo esc_attr($button_style); ?>"
                                           <?php echo esc_attr($button_target); ?>
                                           <?php echo esc_attr($button_nofollow); ?>>
                                            <?php echo esc_html($button_text); ?>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 