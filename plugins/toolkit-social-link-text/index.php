<?php
/**
 * Plugin Name: toolkit social links text
 * Description: This is toolkit social links text widget
 * Plugin URI:  https://latifmatubber21.com/popular-post
 * Version:     1.0.0
 * Author:      latif matubber
 * Author URI:  latifmatubber21.com/
 * Text Domain: socialLinks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class toolkit_social_links_text_class extends WP_Widget{

    public function __construct() {
        parent::__construct('social_links_text',__('toolkit social links text','socialLinks'),array(
            'description'=>__('Add social links text here','socialLinks'),
        ));
    }

    public function form($instance){
        $value = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $google_plus = $instance['google_plus'];
        $LinkedIn = $instance['LinkedIn'];

        ?>
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('title'));?>">Title:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($value) ;?>">
        </p>					
 

        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('facebook'));?>">Facebook Link:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook'));?>" name="<?php echo esc_attr($this->get_field_name('facebook'));?>" type="text" value="<?php echo esc_attr($facebook);?>">
        </p>
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('twitter'));?>">Twitter Link:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter'));?>" name="<?php echo esc_attr($this->get_field_name('twitter'));?>" type="text" value="<?php echo esc_attr($twitter);?>">
        </p>
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('instagram'));?>">Instagram Link:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram'));?>" name="<?php echo esc_attr($this->get_field_name('instagram'));?>" type="text" value="<?php echo esc_attr($instagram);?>">
        </p>
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('pinterest'));?>">Pinterest Link:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest'));?>" name="<?php echo esc_attr($this->get_field_name('pinterest'));?>" type="text" value="<?php echo esc_attr($pinterest);?>">
        </p>

        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('google_plus'));?>">Google Plus:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_plus'));?>" name="<?php echo esc_attr($this->get_field_name('google_plus'));?>" type="text" value="<?php echo esc_attr($google_plus);?>">
        </p>

        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('LinkedIn'));?>">LinkedIn:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('LinkedIn'));?>" name="<?php echo esc_attr($this->get_field_name('LinkedIn'));?>" type="text" value="<?php echo esc_attr($LinkedIn);?>">
        </p>

      <?php  
    }

    public function Widget($args, $instance){
        $value = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $google_plus = $instance['google_plus'];
        $LinkedIn = $instance['LinkedIn'];
        echo $args['before_widget'].$args['before_title']. $value.$args['after_title'];
        ?>
         
            <div class="social-links">


                <ul class="about__socials">                   
                    <li>
                        <a target=_blank href="<?php echo esc_url($facebook);?>">Facebook</a>
                    </li>
                   
                    <li>
                        <a target=_blank href="<?php echo esc_url($twitter);?>">Twitter</a>
                    </li>
                    <li>
                        <a target=_blank href="<?php echo esc_url($instagram);?>">Instagram</a>
                    </li>
                    <li>
                        <a target=_blank href="<?php echo esc_url($pinterest);?>">Pinterest</a>
                    </li>                
                    <li>
                        <a target=_blank href="<?php echo esc_url($google_plus);?>">Google Plus</a>
                    </li>                
                    <li>
                        <a target=_blank href="<?php echo esc_url($LinkedIn);?>">LinkedIn</a>
                    </li>                
                </ul>
            </div>
        <?php
        echo $args['after_widget'];
    }
}


function toolkit_social_links_text_funct(){

    register_widget('toolkit_social_links_text_class');

}
add_action('widgets_init','toolkit_social_links_text_funct');