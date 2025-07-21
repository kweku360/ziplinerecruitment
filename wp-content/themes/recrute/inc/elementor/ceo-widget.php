<?php
/**
 * CEO Section Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_CEO_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_ceo';
    }

    public function get_title() {
        return esc_html__('CEO Message', 'recrute');
    }

    public function get_icon() {
        return 'eicon-person';
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
            'ceo_name',
            [
                'label' => esc_html__('CEO Name', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('John Smith', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ceo_title',
            [
                'label' => esc_html__('CEO Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Chief Executive Officer', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ceo_message',
            [
                'label' => esc_html__('CEO Message', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Welcome to Zipline Recruitment, where we connect exceptional talent with outstanding opportunities. Our mission is to bridge the gap between skilled professionals and innovative companies, creating partnerships that drive success and growth.

With years of experience in the recruitment industry, we understand the unique challenges that both employers and job seekers face. Our dedicated team works tirelessly to ensure that every placement is not just a match, but a perfect fit for long-term success.

We believe in building relationships that last, providing personalized service, and delivering results that exceed expectations. Whether you\'re looking for your next career move or seeking the perfect candidate for your organization, we\'re here to make that connection happen.', 'recrute'),
                'label_block' => true,
                'rows' => 8,
            ]
        );

        $this->add_control(
            'ceo_signature',
            [
                'label' => esc_html__('CEO Signature', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('- John Smith, CEO', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Image Settings
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('CEO Image', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ceo_image',
            [
                'label' => esc_html__('CEO Photo', 'recrute'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/ceo-placeholder.jpg',
                ],
            ]
        );

        $this->add_control(
            'image_alt',
            [
                'label' => esc_html__('Image Alt Text', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CEO of Zipline Recruitment', 'recrute'),
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
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .ceo-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__('Card Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ceo-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => esc_html__('Accent Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .ceo-name' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ceo-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ceo-signature' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="ceo-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ceo-card">
                            <div class="row align-items-center">
                                <!-- Text Content (Left Side) -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="ceo-content">
                                        <?php if (!empty($settings['ceo_name'])): ?>
                                            <h3 class="ceo-name"><?php echo esc_html($settings['ceo_name']); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($settings['ceo_title'])): ?>
                                            <p class="ceo-title"><?php echo esc_html($settings['ceo_title']); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($settings['ceo_message'])): ?>
                                            <div class="ceo-message">
                                                <?php echo wp_kses_post(nl2br($settings['ceo_message'])); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($settings['ceo_signature'])): ?>
                                            <p class="ceo-signature"><?php echo esc_html($settings['ceo_signature']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <!-- Image Content (Right Side) -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="ceo-image-container">
                                        <?php 
                                        $img = $settings['ceo_image'];
                                        if (!empty($img['id'])) {
                                            $meta = wp_get_attachment_metadata($img['id']);
                                            $width = isset($meta['width']) ? $meta['width'] : '';
                                            $height = isset($meta['height']) ? $meta['height'] : '';
                                        } else {
                                            $width = $height = '';
                                        }
                                        ?>
                                        <?php if (!empty($img['url'])): ?>
                                            <img src="<?php echo esc_url($img['url']); ?>"
                                                 alt="<?php echo esc_attr($settings['image_alt']); ?>"
                                                 <?php if ($width && $height): ?>
                                                     width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"
                                                 <?php endif; ?>
                                                 class="ceo-image">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 