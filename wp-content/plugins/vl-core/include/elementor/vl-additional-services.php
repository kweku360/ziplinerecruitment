<?php
namespace VLcore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class VL_Additional_Services extends Widget_Base {
    public function get_name() {
        return 'vl-additional-services';
    }
    public function get_title() {
        return __( 'VL Additional Services', 'vlcore' );
    }
    public function get_icon() {
        return 'eicon-bullet-list';
    }
    public function get_categories() {
        return [ 'recrute' ];
    }
    protected function register_controls() {
        // Section Title
        $this->start_controls_section(
            'section_title',
            [ 'label' => esc_html__('Section Title', 'vlcore') ]
        );
        $this->add_control(
            'main_title',
            [
                'label' => esc_html__('Main Title', 'vlcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Additional', 'vlcore'),
            ]
        );
        $this->add_control(
            'main_title_color',
            [
                'label' => esc_html__('Main Title Color', 'vlcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vl-additional-services-title-main' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'accent_title',
            [
                'label' => esc_html__('Accent Title', 'vlcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Service', 'vlcore'),
            ]
        );
        $this->add_control(
            'accent_title_color',
            [
                'label' => esc_html__('Accent Title Color', 'vlcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vl-additional-services-title-accent' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Left Box
        $this->start_controls_section(
            'left_box',
            [ 'label' => esc_html__('Left Box', 'vlcore') ]
        );
        $this->add_control(
            'left_highlighted',
            [
                'label' => esc_html__('Highlighted Text', 'vlcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('At ZRS, we understand that effective human resources management extends far beyond recruitment and payroll.', 'vlcore'),
            ]
        );
        $this->add_control(
            'left_highlighted_color',
            [
                'label' => esc_html__('Highlighted Text Color', 'vlcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vl-additional-services-left-highlighted' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'left_regular',
            [
                'label' => esc_html__('Regular Text', 'vlcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('As a full-service HR solutions provider, we offer a range of additional services designed to support our clients in optimizing their workforce, enhancing employee experience, and ensuring long-term organizational success.', 'vlcore'),
            ]
        );
        $this->end_controls_section();

        // Services Repeater
        $this->start_controls_section(
            'services_section',
            [ 'label' => esc_html__('Services', 'vlcore') ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'service_number',
            [
                'label' => esc_html__('Number', 'vlcore'),
                'type' => Controls_Manager::TEXT,
                'default' => '01',
            ]
        );
        $repeater->add_control(
            'number_box_color',
            [
                'label' => esc_html__('Number Box Color', 'vlcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .vl-additional-services-number' => 'background: {{VALUE}};',
                ],
            ]
        );
        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Title', 'vlcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'vlcore'),
            ]
        );
        $repeater->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Title Color', 'vlcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .vl-additional-services-service-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $repeater->add_control(
            'service_desc',
            [
                'label' => esc_html__('Description', 'vlcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service description here.', 'vlcore'),
            ]
        );
        $repeater->add_control(
            'service_list',
            [
                'label' => esc_html__('List Items', 'vlcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_text',
                        'label' => esc_html__('Text', 'vlcore'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('List item', 'vlcore'),
                    ],
                    [
                        'name' => 'list_color',
                        'label' => esc_html__('Text Color', 'vlcore'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .vl-additional-services-list-item' => 'color: {{VALUE}};',
                        ],
                    ],
                ],
                'title_field' => '{{{ list_text }}}',
            ]
        );
        $this->add_control(
            'services',
            [
                'label' => esc_html__('Services', 'vlcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ service_title }}}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="vl-additional-services-section">
            <div class="vl-additional-services-header">
                <h2 class="vl-additional-services-title">
                    <span class="vl-additional-services-title-main" style="<?php if(!empty($settings['main_title_color'])) echo 'color:' . esc_attr($settings['main_title_color']); ?>">
                        <?php echo esc_html($settings['main_title']); ?>
                    </span>
                    <span class="vl-additional-services-title-accent" style="<?php if(!empty($settings['accent_title_color'])) echo 'color:' . esc_attr($settings['accent_title_color']); ?>">
                        <?php echo esc_html($settings['accent_title']); ?>
                    </span>
                </h2>
            </div>
            <div class="vl-additional-services-content-row">
                <div class="vl-additional-services-left">
                    <div class="vl-additional-services-left-highlighted" style="<?php if(!empty($settings['left_highlighted_color'])) echo 'color:' . esc_attr($settings['left_highlighted_color']); ?>">
                        <?php echo nl2br(esc_html($settings['left_highlighted'])); ?>
                    </div>
                    <div class="vl-additional-services-left-regular">
                        <?php echo nl2br(esc_html($settings['left_regular'])); ?>
                    </div>
                </div>
                <div class="vl-additional-services-right">
                    <?php if(!empty($settings['services'])) : ?>
                        <?php foreach($settings['services'] as $index => $service) : ?>
                            <div class="vl-additional-services-service">
                                <div class="vl-additional-services-number" style="<?php if(!empty($service['number_box_color'])) echo 'background:' . esc_attr($service['number_box_color']); ?>">
                                    <?php echo esc_html($service['service_number']); ?>
                                </div>
                                <div class="vl-additional-services-service-content">
                                    <div class="vl-additional-services-service-title" style="<?php if(!empty($service['service_title_color'])) echo 'color:' . esc_attr($service['service_title_color']); ?>">
                                        <?php echo esc_html($service['service_title']); ?>
                                    </div>
                                    <div class="vl-additional-services-service-desc">
                                        <?php echo wp_kses_post($service['service_desc']); ?>
                                    </div>
                                    <?php if(!empty($service['service_list'])) : ?>
                                        <ul class="vl-additional-services-list">
                                            <?php foreach($service['service_list'] as $list_item) : ?>
                                                <li class="vl-additional-services-list-item" style="<?php if(!empty($list_item['list_color'])) echo 'color:' . esc_attr($list_item['list_color']); ?>">
                                                    <?php echo wp_kses_post($list_item['list_text']); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
    protected function content_template() {}
} 