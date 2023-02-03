<?php

function photography_setup() {

	load_theme_textdomain( 'photography', get_template_directory() . '/languages' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('standard_featured_img',320,370,true);

	add_image_size('post_gallery',320,420,true);
	add_image_size('single_post_gallery',960,480,true);
	add_image_size('video_featured_img',320,320,true);
	add_image_size('single_standard_post',960,480,true);
	add_image_size('featured_large_img',800,560,true);
	add_image_size('featured_small_img',400,280,true);

	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary menu', 'photography' ),
		)
	);
	
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support(
		'post-formats',
		array(
			'video',
			'quote',
			'gallery',
			'audio',
		)
	);


}
add_action( 'after_setup_theme', 'photography_setup' );


function photography_scripts() {
	
	wp_enqueue_style('photography-vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(),'1.0.0','all');   
	wp_enqueue_style('photography-main', get_template_directory_uri() . '/assets/css/main.css', array(),'1.0.0','all');   
	wp_enqueue_style('photography-fontello', get_template_directory_uri() . '/assets/css/fontello.css', array(),'1.0.0','all');   
	wp_enqueue_style('photography-wp-comment-form', get_template_directory_uri() . '/assets/css/wp-comment-form-style.css', array(),'1.0.0','all');   
	wp_enqueue_style('photography-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(),'1.0.0','all');   
	wp_enqueue_style('photography-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(),'3.2.1','all');   
	wp_enqueue_style('photography-slick', get_template_directory_uri() . '/assets/css/slick.css', array(),'1.8.1','all');   
	wp_enqueue_style('photography-base', get_template_directory_uri() . '/assets/css/base.css', array(),'1.0.0','all');   
    wp_enqueue_style('photography-style',get_stylesheet_uri());

	wp_enqueue_script( 'photography-modernizr', get_template_directory_uri() . '/assets/js//modernizr.js', array('jquery'),'1.0.0', true );
	wp_enqueue_script( 'photography-pace', get_template_directory_uri() . '/assets/js/pace.min.js', array('jquery'),'1.0.0', true );
	wp_enqueue_script( 'photography-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'),'1.8.1', true );
	wp_enqueue_script( 'photography-magnific-popup', get_template_directory_uri() .'/assets/js/jquery.magnific-popup.min.js', array('jquery'),'3.2.1', true );
	wp_enqueue_script( 'photography-plugins', get_template_directory_uri() .'/assets/js/plugins.js', array('jquery'),'1.0.0', true );
	wp_enqueue_script( 'photography-main', get_template_directory_uri() .'/assets/js/main.js', array('jquery'),'1.0.0', true );

	
}
add_action( 'wp_enqueue_scripts', 'photography_scripts' );

// registering widgets
function photography_footer_widget() {

	register_sidebar( array(
		'name' => __( 'Footer Widget', 'photography' ),
		'id' => 'footer_widgets',
		'description' => __( 'Add widgets here', 'photography' ),
		'before_widget' => '<div class="col-four md-six tab-full popular" >',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	

	register_sidebar( array(
		'name' => __( 'Footer bottom widget', 'photography' ),
		'id' => 'footer_bottom_widgets',
		'description' => __( 'Add widgets here', 'photography' ),
		'before_widget' => ' <div class="col-two md-four mob-full s-footer__sitelinks">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));	

	register_sidebar( array(
		'name' => __( 'Footer subscribe widget', 'photography' ),
		'id' => 'footer_bottom_subscribe',
		'description' => __( 'Add widgets here', 'photography' ),
		'before_widget' => '<div class="col-five md-full end s-footer__subscribe">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));		
	register_sidebar( array(
		'name' => __( 'Header widget', 'photography' ),
		'id' => 'header_widget',
		'description' => __( 'Add widgets here', 'photography' ),
		'before_widget' => '<div class="header-social-link"> ',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));		

}
add_action('widgets_init', 'photography_footer_widget');



// registering post meta 
function gallery_post_format_meta_box(){

if( 'video' == get_post_format() ):
	add_meta_box( 'gallery_meta_box','Place a video ID here','gallery_meta_box_funct', 'post');
endif;
}
add_action('add_meta_boxes','gallery_post_format_meta_box');

function gallery_meta_box_funct($post){

	$value_mia = get_post_meta($post->ID,'gallery_metadata',true);

	if( 'video' == get_post_format() ):
	?>
		<input class="regular-text" type ="text" name ="video" value ="<?php echo $value_mia;?>" />
	<?php 

	endif;

}

function gallery_meta_save($post_id){

			$valuess = $_POST['video'];

	update_post_meta( $post_id, 'gallery_metadata',$valuess );

}
add_action('save_post','gallery_meta_save');


function erweb_add_extra_social_links( $user )
{
    ?>
        <h3>New User Profile Links</h3>
 
        <table class="form-table">
            <tr>
                <th><label for="facebook_profile">Facebook Profile</label></th>
                <td><input type="text" name="facebook_profile" value="<?php echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
 
            <tr>
                <th><label for="twitter_profile">Twitter Profile</label></th>
                <td><input type="text" name="twitter_profile" value="<?php echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
 
            <tr>
                <th><label for="google_profile">Google+ Profile</label></th>
                <td><input type="text" name="google_profile" value="<?php echo esc_attr(get_the_author_meta( 'google_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="instagram_profile">Instagram</label></th>
                <td><input type="text" name="instagram_profile" value="<?php echo esc_attr(get_the_author_meta( 'instagram_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

        </table>
		
    <?php

}
add_action( 'show_user_profile', 'erweb_add_extra_social_links' );
add_action( 'edit_user_profile', 'erweb_add_extra_social_links' );



 
function erweb_save_extra_social_links( $user_id )
{
    update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
    update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
    update_user_meta( $user_id,'google_profile', sanitize_text_field( $_POST['google_profile'] ) );
    update_user_meta( $user_id,'instagram_profile', sanitize_text_field( $_POST['instagram_profile'] ) );
}
add_action( 'personal_options_update', 'erweb_save_extra_social_links' );
add_action( 'edit_user_profile_update', 'erweb_save_extra_social_links' );

 require_once('inc/theme-customizer.php');