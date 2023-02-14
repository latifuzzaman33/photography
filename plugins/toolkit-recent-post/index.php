<?php
/**
 * Plugin Name: toolkit recent post
 * Description: This is recent post new features
 * Plugin URI:  https://latifmatubber21.com/popular-post
 * Version:     1.0.0
 * Author:      latif matubber
 * Author URI:  latifmatubber21.com/
 * Text Domain: recentPost
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class recent_post_widget_cls extends WP_Widget{

    public function __construct() {
        parent::__construct('recent_post_widget',__('toolki recent Post','recentPost'),array(
            'description'=>__('Add recent post here','recentPost'),
        ));
    }

    public function form($instance){
        $value = $instance['name'];

        ?>
        <p> 
            <label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('name');?>" type="text" value="<?php echo $value ;?>">
        </p>					
      <?php   
    }

    public function Widget($args, $instance){
        $value = $instance['name'];
        echo $args['before_widget'].$args['before_title']. $value.$args['after_title'];
        ?>

        <?php 
            $query = new WP_Query(array(

                'post_type'           => 'post',
                'posts_per_page'      => 3,               
                'orderby'             => 'date',               
                'order'             => 'DESC',               

            ));
        ?>
        <div class="block-m-full popular__posts">
            <?php while ($query-> have_posts()) : $query-> the_post(); ?>
          
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <?php the_post_thumbnail('popular-post', array( 'class' => 'img-fluid','alt'=> get_the_title() ));?>
                    </a>
                    <h5><a href="#0"><?php the_title();?></a></h5>
                    <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <?php the_author_posts_link();?></span>
                        <span class="popular__date"><span>on </span><?php echo get_the_date();?></span>
                    </section>
                </article>
                       
            <?php 
            endwhile; 
            wp_reset_query();
            
            ?>
        </div>
        <?php 
        echo $args['after_widget'];
    }

}

function recent_post_widget_funct(){

    register_widget('recent_post_widget_cls');

}
add_action('widgets_init','recent_post_widget_funct');