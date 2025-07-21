<?php
	/**
	 *
	 *
	 * @author 		Vikinglab
	 * @category 	Widgets
	 * @package 	vlcore/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */

	add_action('widgets_init', 'vl_contact_form_widget');
	function vl_contact_form_widget() {
		register_widget('vl_contact_form_widget');
	}
	
	
	class vl_contact_form_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('vl_contact_form_widget',esc_html__('VL Contact Form','vlcore'),array(
				'description' => esc_html__('VL Sidebar Widget','vlcore'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget; 

		 // 	if ( ! empty( $title ) ) {
			// 	print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			// }
			
		?>
          
 
            <div class="vlform__widget-item-2 mb-30">
                <div class="vl_form__contact">
                    <?php if( !empty($instance['title']) ): ?>
                    <h3 class="vl-sidebar-widget-title"><?php echo apply_filters( 'widget_title', $instance['title'] ); ?></h3>
                    <?php endif; ?>

                    <?php if( !empty($vl_form_shortcode) ): ?>
                        <?php print do_shortcode($vl_form_shortcode); ?>
                    <?php endif; ?>
                </div>
            </div>

	    	<?php print $after_widget; ?>  

		<?php
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$vl_form_shortcode  = isset($instance['vl_form_shortcode'])? $instance['vl_form_shortcode']:'';

			$vlform_text  = isset($instance['vlform_text'])? $instance['vlform_text']:'';
			$social_heading  = isset($instance['social_heading'])? $instance['social_heading']:'';
			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';
			$youtube  = isset($instance['youtube'])? $instance['youtube']:'';
			$linkedin  = isset($instance['linkedin'])? $instance['linkedin']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','tocore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('vlform Shortcode:','tocore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('vl_form_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('vl_form_shortcode')); ?>" value="<?php print esc_attr($vl_form_shortcode); ?>">

			<p>
				<label for="title"><?php esc_html_e('vlform text','tocore'); ?></label>
			</p>
			<textarea class="widefat" rows="5" cols="15" id="<?php print esc_attr($this->get_field_id('vlform_text')); ?>" value="<?php print esc_attr($vlform_text); ?>" name="<?php print esc_attr($this->get_field_name('vlform_text')); ?>"><?php print esc_attr($vlform_text); ?></textarea>
						
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['subscribe_style'] = ( ! empty( $new_instance['subscribe_style'] ) ) ? strip_tags( $new_instance['subscribe_style'] ) : '';
			$instance['vl_form_shortcode'] = ( ! empty( $new_instance['vl_form_shortcode'] ) ) ? strip_tags( $new_instance['vl_form_shortcode'] ) : '';
			$instance['vlform_text'] = ( ! empty( $new_instance['vlform_text'] ) ) ? strip_tags( $new_instance['vlform_text'] ) : '';


			$instance['social_heading'] = ( ! empty( $new_instance['social_heading'] ) ) ? strip_tags( $new_instance['social_heading'] ) : '';
			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
			$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
			return $instance;
		}
	}