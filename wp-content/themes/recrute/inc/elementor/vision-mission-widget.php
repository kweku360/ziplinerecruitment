<?php
/**
 * Vision & Mission Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Vision_Mission_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_vision_mission';
    }

    public function get_title() {
        return esc_html__('Vision & Mission', 'recrute');
    }

    public function get_icon() {
        return 'eicon-target';
    }

    public function get_categories() {
        return ['recrute-category'];
    }

    protected function register_controls() {
        // Vision Settings
        $this->start_controls_section(
            'section_vision',
            [
                'label' => esc_html__('Vision', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'vision_title',
            [
                'label' => esc_html__('Vision Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Vision', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'vision_content',
            [
                'label' => esc_html__('Vision Content', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('To cultivate a results-oriented culture that drives performance, unlocks potential, and accelerates growth for both businesses and employees.', 'recrute'),
                'label_block' => true,
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Mission Settings
        $this->start_controls_section(
            'section_mission',
            [
                'label' => esc_html__('Mission', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mission_title',
            [
                'label' => esc_html__('Mission Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Mission', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'mission_content',
            [
                'label' => esc_html__('Mission Content', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('To positively impact one million lives through employment, staff development, and client productivity.', 'recrute'),
                'label_block' => true,
                'rows' => 3,
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
            'title_color',
            [
                'label' => esc_html__('Title Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .vision-mission-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .vision-mission-content' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vision-mission-card' => 'border-left-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="vision-mission-section">
            <div class="container">
                <div class="row">
                    <!-- Vision -->
                    <div class="col-lg-6 col-md-6">
                        <div class="vision-mission-card vision-card">
                            <?php if (!empty($settings['vision_title'])): ?>
                                <h3 class="vision-mission-title"><?php echo esc_html($settings['vision_title']); ?></h3>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['vision_content'])): ?>
                                <div class="vision-mission-content">
                                    <?php echo wp_kses_post(nl2br($settings['vision_content'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Mission -->
                    <div class="col-lg-6 col-md-6">
                        <div class="vision-mission-card mission-card">
                            <?php if (!empty($settings['mission_title'])): ?>
                                <h3 class="vision-mission-title"><?php echo esc_html($settings['mission_title']); ?></h3>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['mission_content'])): ?>
                                <div class="vision-mission-content">
                                    <?php echo wp_kses_post(nl2br($settings['mission_content'])); ?>
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