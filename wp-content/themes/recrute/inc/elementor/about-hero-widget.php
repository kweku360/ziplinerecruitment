<?php
/**
 * About Hero Widget for Elementor
 *
 * @package recrute
 */

if (!defined('ABSPATH')) {
    exit;
}

class Recrute_About_Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recrute_about_hero';
    }

    public function get_title() {
        return esc_html__('About Hero Section', 'recrute');
    }

    public function get_icon() {
        return 'eicon-info-circle';
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
                'default' => esc_html__('ABOUT US', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Zipline Recruitment Services', 'recrute'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Zipline Recruitment Services (ZRS) LTD was founded in 2018 and is headquartered in Ghana. We are a dynamic and results-driven staffing and human resource solutions company established to bridge the gap between skilled professionals and businesses seeking exceptional human capital.

Our firm has grown into a respected name in the recruitment and outsourcing industry, offering tailor-made solutions to clients across multiple sectors. We specialize in full-cycle recruitment, workforce outsourcing, payroll administration, and HR consultancy.

Our client base spans various industries, including financial services, healthcare, vocational and technical sectors, security services, and general staffing needs. ZRS has built a reputation for professionalism, excellence, and performance-driven service delivery, backed by experienced professionals and cutting-edge recruitment technology.', 'recrute'),
                'label_block' => true,
                'rows' => 8,
            ]
        );

        $this->end_controls_section();

        // CEO Settings
        $this->start_controls_section(
            'section_ceo',
            [
                'label' => esc_html__('CEO Information', 'recrute'),
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
            'ceo_name',
            [
                'label' => esc_html__('CEO Name', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Albert Patterson', 'recrute'),
            ]
        );

        $this->add_control(
            'ceo_title',
            [
                'label' => esc_html__('CEO Title', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Founder & CEO', 'recrute'),
            ]
        );

        $this->add_control(
            'ceo_signature',
            [
                'label' => esc_html__('CEO Signature', 'recrute'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Patterson', 'recrute'),
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
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FA6444',
                'selectors' => [
                    '{{WRAPPER}} .about-subtitle' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .about-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'recrute'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .about-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="about-hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Content Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="about-content">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <p class="about-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['title'])): ?>
                                <h1 class="about-title"><?php echo esc_html($settings['title']); ?></h1>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['description'])): ?>
                                <div class="about-description" style="font-size: 18px;">
                                    <?php echo wp_kses_post(nl2br($settings['description'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- CEO Column -->
                    <div class="col-lg-4 col-md-5">
                        <div class="ceo-profile">
                            <?php if (!empty($settings['ceo_image']['url'])): ?>
                                <div class="ceo-image-container">
                                    <img src="<?php echo esc_url($settings['ceo_image']['url']); ?>" 
                                         alt="<?php echo esc_attr($settings['ceo_name']); ?>" 
                                         class="ceo-image">
                                </div>
                            <?php endif; ?>
                            
                            <div class="ceo-info">
                                <?php if (!empty($settings['ceo_signature'])): ?>
                                    <div class="ceo-signature"><?php echo esc_html($settings['ceo_signature']); ?></div>
                                <?php endif; ?>
                                
                                <?php if (!empty($settings['ceo_name'])): ?>
                                    <h3 class="ceo-name"><?php echo esc_html($settings['ceo_name']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($settings['ceo_title'])): ?>
                                    <p class="ceo-title"><?php echo esc_html($settings['ceo_title']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 