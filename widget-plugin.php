<?php
/*
Plugin Name: Simple Widget plugin
Plugin URI: http://jakir.me
Description: Simple Widget plugin for wordpress 
Author: Jakir Hossain
Version: 1.0
Author URI: http://jakir.me
*/
?>
<?php
/**
 * Simple Widget Class
 */
class simple_widget extends WP_Widget {
    /** constructor -- name this the same as the class above */
    function simple_widget() {
        parent::WP_Widget(false, $name = 'Simple Widget');	
    }
 
    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
		$your_name 	= $instance['your_name'];
        ?>
		  
              <?php echo $before_widget; ?>
			 
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
					
				<?php echo "Hello " . $your_name ."! ";
				echo "Today is " . date("l");
				?>	
					

              <?php echo $after_widget; ?>
			  
        <?php
    }
 
    /** @see WP_Widget::update  */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['your_name'] = strip_tags($new_instance['your_name']);
        return $instance;
    }
 
    /** @see WP_Widget::form */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
		$your_name	= esc_attr($instance['your_name']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('your_name'); ?>"><?php _e('Enter your name'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('your_name'); ?>" name="<?php echo $this->get_field_name('your_name'); ?>" type="text" value="<?php echo $your_name; ?>" />
        </p>
	 
        <?php } 
 
} // end class simple_widget

add_action('widgets_init', create_function('', 'return register_widget("simple_widget");'));
?>

