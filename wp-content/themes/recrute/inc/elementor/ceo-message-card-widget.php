<?php
/**
 * CEO Message Card Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_CEO_Message_Card_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'recrute_ceo_message_card';
    }
    public function get_title() {
        return esc_html__('CEO Message Card', 'recrute');
    }
    public function get_icon() {
        return 'eicon-person';
    }
    public function get_categories() {
        return ['recrute-category'];
    }
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'recrute'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Message from CEO', 'recrute'),
                'label_block' => true,
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
            'ceo_name',
            [
                'label' => esc_html__('CEO Name', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mad. Gladys M. Osman', 'recrute'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ceo_title',
            [
                'label' => esc_html__('CEO Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ag. Chief Executive Officer', 'recrute'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'message_text',
            [
                'label' => esc_html__('Message Text', 'recrute'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<em>“At ZRS, we understand that people are the most valuable assets any organization can have. Our mission is simple yet profound — to connect great talent with great opportunity. Every placement we make is guided by integrity, precision, and a passion for creating positive impact.</em><br><br><em>As we move forward, we remain committed to our vision of touching one million lives through employment, skills development, and improved productivity.</em><br><br><em>Whether you’re a business looking to build a high-performing team or a job seeker aspiring to advance your career, ZRS is your trusted partner on this journey.”</em>',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ceo_signature',
            [
                'label' => esc_html__('CEO Signature', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Gladys M. Osman', 'recrute'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $img = $settings['ceo_image'];
        if (!empty($img['id'])) {
            $meta = wp_get_attachment_metadata($img['id']);
            $width = isset($meta['width']) ? $meta['width'] : '';
            $height = isset($meta['height']) ? $meta['height'] : '';
        } else {
            $width = $height = '';
        }
        ?>
        <section class="ceo-message-card-section">
            <div class="ceo-message-card-row">
                <!-- Left Side -->
                <div class="ceo-message-card-left">
                    <h2 class="ceo-message-heading"><?php echo esc_html($settings['heading']); ?></h2>
                    <?php if (!empty($img['url'])): ?>
                        <div class="ceo-message-image-container">
                            <img src="<?php echo esc_url($img['url']); ?>"
                                 alt="<?php echo esc_attr($settings['ceo_name']); ?>"
                                 <?php if ($width && $height): ?>
                                     width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"
                                 <?php endif; ?>
                                 class="ceo-message-image">
                        </div>
                    <?php endif; ?>
                    <div class="ceo-message-namebar">
                        <span class="ceo-message-name"><?php echo esc_html($settings['ceo_name']); ?></span><br>
                        <span class="ceo-message-title"><?php echo esc_html($settings['ceo_title']); ?></span>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="ceo-message-card-right">
                    <div class="ceo-message-text">
                        <?php echo $settings['message_text']; ?>
                    </div>
                    <div class="ceo-message-signature">
                        &mdash; <?php echo esc_html($settings['ceo_signature']); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 