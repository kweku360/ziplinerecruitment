<?php
/**
 * Advisory Board Widget for Elementor (Recrute)
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_Advisory_Board_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'recrute_advisory_board';
    }
    public function get_title() {
        return esc_html__('Advisory Board', 'recrute');
    }
    public function get_icon() {
        return 'eicon-person';
    }
    public function get_categories() {
        return ['recrute-category'];
    }
    protected function register_controls() {
        // Header Section
        $this->start_controls_section(
            'header_section',
            [ 'label' => esc_html__('Header', 'recrute') ]
        );
        $this->add_control(
            'header_title',
            [
                'label' => esc_html__('Header Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Advisory Board', 'recrute'),
            ]
        );
        $this->add_control(
            'header_gradient_start',
            [
                'label' => esc_html__('Gradient Start Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff6a21',
                'selectors' => [
                    '{{WRAPPER}} .vl-advisory-board-header' => 'background: linear-gradient(to right, {{VALUE}}, #e55a1a);',
                ],
            ]
        );
        $this->end_controls_section();

        // Advisory Board Members
        $this->start_controls_section(
            'members_section',
            [ 'label' => esc_html__('Advisory Board Members', 'recrute') ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Dr Abdul Hamid Kwarteng', 'recrute'),
            ]
        );
        $repeater->add_control(
            'member_description',
            [
                'label' => esc_html__('Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Professional Management consultant with over 12 years of working experience.', 'recrute'),
            ]
        );
        $repeater->add_control(
            'member_expertise',
            [
                'label' => esc_html__('Expertise', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('International Business, Management, Leadership, Service Innovation, and Organizational Behaviour.', 'recrute'),
            ]
        );
        $repeater->add_control(
            'member_achievements',
            [
                'label' => esc_html__('Achievements & Experience', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lecturer, facilitator, and has championed training programs. His interest lies in HR performance diagnostics, human behavior, and corporate productivity research.', 'recrute'),
            ]
        );
        $repeater->add_control(
            'member_publications',
            [
                'label' => esc_html__('Publications & Qualifications', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('He has 11 published articles and 4 books, holding a PhD in International Law and a Master of Philosophy in Political Science.', 'recrute'),
            ]
        );
        $this->add_control(
            'advisory_members',
            [
                'label' => esc_html__('Advisory Board Members', 'recrute'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('Dr Abdul Hamid Kwarteng', 'recrute'),
                        'member_description' => esc_html__('Professional Management consultant with over 12 years of working experience.', 'recrute'),
                        'member_expertise' => esc_html__('International Business, Management, Leadership, Service Innovation, and Organizational Behaviour.', 'recrute'),
                        'member_achievements' => esc_html__('Lecturer, facilitator, and has championed training programs. His interest lies in HR performance diagnostics, human behavior, and corporate productivity research.', 'recrute'),
                        'member_publications' => esc_html__('He has 11 published articles and 4 books, holding a PhD in International Law and a Master of Philosophy in Political Science.', 'recrute'),
                    ],
                    [
                        'member_name' => esc_html__('Mr. Koney Mensah', 'recrute'),
                        'member_description' => esc_html__('Seasoned human resource professional with over 25 years of extensive working experience.', 'recrute'),
                        'member_expertise' => esc_html__('HR transformation, compensation, training, records management, and public administration.', 'recrute'),
                        'member_achievements' => esc_html__('Noted for enhancing organizational efficiency and fostering a positive workplace culture, and for his instrumental role in recruitment, selection, and placement policies. He is characterized by integrity, honesty, reliability, and commitment.', 'recrute'),
                        'member_publications' => esc_html__('He holds an MPhil in Adult Education - HRD & HRM and over 15 professional and management certificates.', 'recrute'),
                    ],
                    [
                        'member_name' => esc_html__('Dr Tweneboah Koduah', 'recrute'),
                        'member_description' => esc_html__('Industrial Relation Human Resource Management practitioner with over 23 working experience.', 'recrute'),
                        'member_expertise' => esc_html__('Assiduous, achievement-motivated, and possessing integrity.', 'recrute'),
                        'member_achievements' => esc_html__('His specialization involves deploying statistical analytical tools for identifying HR challenges and employee motivational gaps. His research focuses on creating harmonious working environments and employee trust, addressing corporate HR and employee relation challenges in government institutions.', 'recrute'),
                        'member_publications' => esc_html__('He holds a Doctor of Business Administration, an Executive Masters in Business Administration, an MSc in Employment & Industrial Relations, an MSc in Statistics, and a Masters of Applied Business Research.', 'recrute'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="vl-advisory-board-section">
            <!-- Header -->
            <div class="vl-advisory-board-header">
                <h2 class="vl-advisory-board-title">
                    <?php echo esc_html($settings['header_title']); ?>
                </h2>
            </div>

            <!-- Content Area -->
            <div class="vl-advisory-board-content">
                <?php if(!empty($settings['advisory_members'])) : ?>
                    <?php foreach($settings['advisory_members'] as $index => $member) : ?>
                        <div class="vl-advisory-board-member">
                            <div class="vl-advisory-board-member-name">
                                <?php echo esc_html($member['member_name']); ?>
                            </div>
                            <div class="vl-advisory-board-member-description">
                                <?php echo wp_kses_post($member['member_description']); ?>
                            </div>
                            <?php if(!empty($member['member_expertise'])) : ?>
                                <div class="vl-advisory-board-member-expertise">
                                    <?php echo wp_kses_post($member['member_expertise']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($member['member_achievements'])) : ?>
                                <div class="vl-advisory-board-member-achievements">
                                    <?php echo wp_kses_post($member['member_achievements']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($member['member_publications'])) : ?>
                                <div class="vl-advisory-board-member-publications">
                                    <?php echo wp_kses_post($member['member_publications']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    protected function content_template() {}
}

// Register the widget
// add_action('elementor/widgets/register', function($widgets_manager) {
//     $widgets_manager->register( new Recrute_Advisory_Board_Widget() );
// }); 