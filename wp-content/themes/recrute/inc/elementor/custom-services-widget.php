<?php
/**
 * Custom Services Widget for Elementor
 * Based on VL Services Layout 7 with manual content input
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Custom_Services_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_custom_services';
    }

    public function get_title() {
        return esc_html__('Custom Services', 'recrute');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['recrute-category'];
    }

    public function get_script_depends() {
        return ['vl_service'];
    }

    protected function register_controls() {
        // Services Settings
        $this->start_controls_section(
            'section_services',
            [
                'label' => esc_html__('Services', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__('Icon', 'recrute'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Service Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recruitment Services', 'recrute'),
            ]
        );

        $repeater->add_control(
            'service_items',
            [
                'label' => esc_html__('Service Items', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('• Local and international talent acquisition\n• Graduate and skilled worker placements\n• Executive search and headhunting\n• Temporary and permanent staffing', 'recrute'),
                'description' => esc_html__('Enter each service item on a new line starting with •', 'recrute'),
                'rows' => 6,
            ]
        );

        $this->add_control(
            'services',
            [
                'label' => esc_html__('Services', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Recruitment Services', 'recrute'),
                        'service_items' => esc_html__('• Local and international talent acquisition\n• Graduate and skilled worker placements\n• Executive search and headhunting\n• Temporary and permanent staffing', 'recrute'),
                    ],
                    [
                        'service_title' => esc_html__('Outsourcing Services', 'recrute'),
                        'service_items' => esc_html__('• On-demand staffing for short-term and long-term projects\n• Contractual labor solutions\n• Third-party HR administration and supervision', 'recrute'),
                    ],
                    [
                        'service_title' => esc_html__('Payroll Management', 'recrute'),
                        'service_items' => esc_html__('• Accurate and compliant payroll processing\n• Tax filings and statutory deductions\n• Payslip and payroll reporting\n• Employee benefits administration', 'recrute'),
                    ],
                    [
                        'service_title' => esc_html__('HR Consultancy', 'recrute'),
                        'service_items' => esc_html__('• Organizational development\n• Workforce planning and analytics\n• Talent management strategies\n• Compliance advisory and labor law consulting', 'recrute'),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Services
        $this->start_controls_section(
            'section_style_services',
            [
                'label' => esc_html__('Services Style', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Service Title Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .service8 .service-box .heading h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .service8 .service-box:hover .heading h4' => 'color: #fff;',
                ],
            ]
        );

        $this->add_control(
            'service_bullet_color',
            [
                'label' => esc_html__('Bullet Point Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .service8 .service-box .service-content li::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .service8 .service-box:hover .service-content li::before' => 'color: #fff;',
                ],
            ]
        );

        $this->add_control(
            'service_bullet_text_color',
            [
                'label' => esc_html__('Bullet Text Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .service8 .service-box .service-content li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .service8 .service-box:hover .service-content li' => 'color: #fff;',
                ],
            ]
        );

        $this->add_control(
            'service_card_bg',
            [
                'label' => esc_html__('Card Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service8 .service-box' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .service8 .service-box .heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'service_card_bg_hover',
            [
                'label' => esc_html__('Card Hover Background Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .service8 .service-box:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .service8 .service-box:hover .heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="service8">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['services'] as $index => $service): ?>
                        <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1200">
                            <div class="service-box">
                                <?php if (!empty($service['service_icon']['url'])): ?>
                                    <div class="icon" style="text-align:center; margin-top: 30px; margin-bottom: 10px;">
                                        <img src="<?php echo esc_url($service['service_icon']['url']); ?>" alt="<?php echo esc_attr($service['service_title']); ?>" style="width:48px;height:48px;object-fit:contain;display:inline-block;">
                                    </div>
                                <?php endif; ?>
                                <div class="heading" style="text-align:center;">
                                    <?php if (!empty($service['service_title'])): ?>
                                        <h4><?php echo esc_html($service['service_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($service['service_items'])): ?>
                                        <div class="service-content">
                                            <ul>
                                                <?php 
                                                $items = explode("\n", $service['service_items']);
                                                foreach ($items as $item) {
                                                    $item = trim($item);
                                                    if (!empty($item)) {
                                                        // Remove bullet point if present
                                                        $item = preg_replace('/^[•\-\*]\s*/', '', $item);
                                                        echo '<li>' . esc_html($item) . '</li>';
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
} 