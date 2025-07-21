<?php
/**
 * Process Steps Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Process_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_process';
    }

    public function get_title() {
        return esc_html__('Process Steps', 'recrute');
    }

    public function get_icon() {
        return 'eicon-flow';
    }

    public function get_categories() {
        return ['recrute-category'];
    }

    protected function register_controls() {
        // Section Settings
        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('Section Settings', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Recruitment Process', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We follow a comprehensive 5-step process to ensure the perfect match between candidates and employers.', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Process Steps
        $this->start_controls_section(
            'section_process_steps',
            [
                'label' => esc_html__('Process Steps', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'step_number',
            [
                'label' => esc_html__('Step Number', 'recrute'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 10,
            ]
        );

        $repeater->add_control(
            'step_title',
            [
                'label' => esc_html__('Step Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Application Phase', 'recrute'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'step_description',
            [
                'label' => esc_html__('Step Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Job advertisement across verified platforms. Applications through ZRS Official Website, ZRS Job Portal, and ZRS Official Email.', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'process_steps',
            [
                'label' => esc_html__('Process Steps', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'step_number' => '1',
                        'step_title' => esc_html__('Application Phase', 'recrute'),
                        'step_description' => esc_html__('Job advertisement across verified platforms. Applications through ZRS Official Website, ZRS Job Portal, and ZRS Official Email.', 'recrute'),
                    ],
                    [
                        'step_number' => '2',
                        'step_title' => esc_html__('Assessment & Screening', 'recrute'),
                        'step_description' => esc_html__('Categorization and classification of applications. Preliminary CV screening. Shortlisting of potential candidates. Aptitude and job-specific assessments. Structured interviews.', 'recrute'),
                    ],
                    [
                        'step_number' => '3',
                        'step_title' => esc_html__('Background Verification', 'recrute'),
                        'step_description' => esc_html__('Police background checks. Medical examinations. Reference and guarantor checks.', 'recrute'),
                    ],
                    [
                        'step_number' => '4',
                        'step_title' => esc_html__('Onboarding', 'recrute'),
                        'step_description' => esc_html__('Pre-employment orientation. Transition support and follow-ups. Placement confirmation and employee induction.', 'recrute'),
                    ],
                    [
                        'step_number' => '5',
                        'step_title' => esc_html__('Client Engagement', 'recrute'),
                        'step_description' => esc_html__('Compilation of a comprehensive candidate report. Final client review and selection. Offer extension and negotiation.', 'recrute'),
                    ],
                ],
                'title_field' => '{{{ step_title }}}',
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
                    '{{WRAPPER}} .process-section' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .process-card' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .process-number' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .process-connector' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="process-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="process-header text-center mb-5">
                            <?php if (!empty($settings['section_title'])): ?>
                                <h2 class="process-title"><?php echo esc_html($settings['section_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['section_subtitle'])): ?>
                                <p class="process-subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="process-steps-container">
                    <div class="row justify-content-center">
                        <?php foreach ($settings['process_steps'] as $index => $step): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="process-card">
                                    <div class="process-number">
                                        <span><?php echo esc_html($step['step_number']); ?></span>
                                    </div>
                                    <div class="process-content">
                                        <h4 class="process-step-title"><?php echo esc_html($step['step_title']); ?></h4>
                                        <p class="process-step-description"><?php echo esc_html($step['step_description']); ?></p>
                                    </div>
                                    <?php if ($index < count($settings['process_steps']) - 1): ?>
                                        <div class="process-arrow">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 