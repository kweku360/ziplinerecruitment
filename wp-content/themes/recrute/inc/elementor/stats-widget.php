<?php
/**
 * Statistics Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_stats';
    }

    public function get_title() {
        return esc_html__('Statistics', 'recrute');
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return ['recrute-category'];
    }

    protected function register_controls() {
        // Statistics Settings
        $this->start_controls_section(
            'section_stats',
            [
                'label' => esc_html__('Statistics', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_number',
            [
                'label' => esc_html__('Number', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '47+',
            ]
        );

        $repeater->add_control(
            'stat_label',
            [
                'label' => esc_html__('Label', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Countries',
            ]
        );

        $repeater->add_control(
            'stat_icon',
            [
                'label' => esc_html__('Icon', 'recrute'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-globe',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'stats',
            [
                'label' => esc_html__('Statistics', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'stat_number' => '47+',
                        'stat_label' => 'Countries',
                        'stat_icon' => [
                            'value' => 'fas fa-globe',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'stat_number' => '110+',
                        'stat_label' => 'Clients',
                        'stat_icon' => [
                            'value' => 'fas fa-users',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'stat_number' => '250+',
                        'stat_label' => 'Projects',
                        'stat_icon' => [
                            'value' => 'fas fa-briefcase',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'stat_number' => '30+',
                        'stat_label' => 'Team Members',
                        'stat_icon' => [
                            'value' => 'fas fa-user-friends',
                            'library' => 'fa-solid',
                        ],
                    ],
                ],
                'title_field' => '{{{ stat_label }}}',
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
            'number_color',
            [
                'label' => esc_html__('Number Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .stat-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .stat-label' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .stat-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="stats-section">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['stats'] as $stat): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="stat-card">
                                <?php if (!empty($stat['stat_icon']['value'])): ?>
                                    <div class="stat-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($stat['stat_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($stat['stat_number'])): ?>
                                    <div class="stat-number"><?php echo esc_html($stat['stat_number']); ?></div>
                                <?php endif; ?>
                                
                                <?php if (!empty($stat['stat_label'])): ?>
                                    <div class="stat-label"><?php echo esc_html($stat['stat_label']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
} 