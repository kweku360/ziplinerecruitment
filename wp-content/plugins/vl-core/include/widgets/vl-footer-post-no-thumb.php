<?php 
Class VL_Latest_Post_Footer_No_Thumb extends WP_Widget{

	public function __construct(){
		parent::__construct('vl-latest-posts-footer-no-thumb', 'VL Footer Posts No Thumb', array(
			'description'	=> 'Latest Post Widget by Vikinglab'
		));
	}
	public function widget($args, $instance){
			extract($args);
			extract($instance);
	 	echo $before_widget; 
	 		if($instance['title']):
     		echo $before_title; ?>
<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
<?php echo $after_title; ?>
<?php endif; ?>

<div class="vl-footer-widget-content">

    <?php 
		$q = new WP_Query( array(
			'post_type'     => 'post',
			'posts_per_page'=> ($instance['count']) ? $instance['count'] : '3',
			'order'			=> ($instance['posts_order']) ? $instance['posts_order'] : 'DESC',
			'orderby' => 'comment_count'
		));

		if( $q->have_posts() ):
			while( $q->have_posts() ):$q->the_post();
			$categories = get_the_terms($q->ID, 'category' );
			

		?>
    <div class="vl-footer-widget-item">
        <h4 class="vl-footer-widget-item-title"> <a
                href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 3, '..'); ?></a></h4>
        <span><i class="fa-regular fa-calendar-days"></i><?php the_time('F d, Y'); ?></span>
    </div>

    <?php endwhile;            
				 endif; ?>
</div>


<?php echo $after_widget; ?>

<?php
	}

	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'tocores' );
		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'tocores' );
		$choose_style = ! empty( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'tocores' );
	?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
    <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
        id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
</p>

<p>
    <label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
    <input type="number" name="<?php echo $this->get_field_name('count'); ?>"
        id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
</p>

<p>
    <label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
    <select name="<?php echo $this->get_field_name('posts_order'); ?>"
        id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
        <option value="" disabled="disabled">Select Post Order</option>
        <option value="ASC" <?php if($posts_order === 'ASC'){ echo 'selected="selected"'; } ?>>ASC</option>
        <option value="DESC" <?php if($posts_order === 'DESC'){ echo 'selected="selected"'; } ?>>DESC</option>
    </select>
</p>

<?php }


}




add_action('widgets_init', function(){
	register_widget('VL_Latest_Post_Footer_No_Thumb');
});