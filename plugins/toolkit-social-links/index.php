<?php
/**
 * Plugin Name: toolkit social links
 * Description: This is toolkit social links widget
 * Plugin URI:  https://latifmatubber21.com/popular-post
 * Version:     1.0.0
 * Author:      latif matubber
 * Author URI:  latifmatubber21.com/
 * Text Domain: socialLinks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class toolkit_social_links_class extends WP_Widget{

    public function __construct() {
        parent::__construct('social_links',__('toolkit social links','socialLinks'),array(
            'description'=>__('Add social links here','socialLinks'),
        ));
    }

    public function form($instance){
        $value = $instance['title'];
        $paragraph = $instance['paragraph'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $option = $instance['option'];
        ?>
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('title'));?>">Title:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($value) ;?>">
        </p>					
        <p> 
            <label for="<?php echo esc_attr($this->get_field_id('paragraph'));?>">About:</label>			
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('paragraph'));?>" name="<?php echo esc_attr($this->get_field_name('paragraph'));?>" cols="30" rows="10"><?php echo esc_html($paragraph);?></textarea>
        </p>

        <p> 
            <div class="option"> 
             
                <select name="<?php echo esc_attr($this->get_field_name('option'));?>" >

                    <option value="latif">text</option>
                    <option value="rizvi">icon</option>

                </select>

            </div>
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

      <?php  
    }

    public function Widget($args, $instance){
        $value = $instance['title'];
        $paragraph = $instance['paragraph'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $option = $instance['option'];
        echo $args['before_widget'].$args['before_title']. $value.$args['after_title'];
        ?>
            <?php if($paragraph):?>
            <div class="divvv"> 
                <?php echo wp_kses_post(wpautop($paragraph)); ?>
            </div>
            <?php endif;?>
            <div class="option-select">
                <p> 
                <?php echo esc_html($option);?> 
                </p>
            </div>

         
            <div class="social-links">


                <ul class="about__social">                   
                    <li>
                        <a target=_blank href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                   
                    <li>
                        <a target=_blank href="<?php echo esc_url($twitter);?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a target=_blank href="<?php echo esc_url($instagram);?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a target=_blank href="<?php echo esc_url($pinterest);?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>                
                </ul>
            </div>
        <?php
        echo $args['after_widget'];
    }
}


function toolkit_social_links_funct(){

    register_widget('toolkit_social_links_class');

}
add_action('widgets_init','toolkit_social_links_funct');