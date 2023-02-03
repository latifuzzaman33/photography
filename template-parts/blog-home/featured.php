       
<div class="featured-post-column"> 

    <div class="featured-post-wrapper">
        <?php

        $query = new WP_Query(array(

            'post_type'         =>  'post',
            'posts_per_page'    => 3,
            'post__in'          => get_option( 'sticky_posts' ),
        ));        

        if($query-> have_posts()) : 
        ?>
		<?php 
        while ($query-> have_posts()) :$query->  the_post(); 
        $featured_post = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), 'featured_post' );
        ?>				
        <div class="single-featured-post" style="background-image:url(<?php echo $featured_post;?>)"> 
            <div class="featured-post-inner">
                <div class="featured-post-cell">
                    <div class="featured-post-title"> 
                        <?php echo get_the_category_list(' '); ?>
                        <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                    </div>                        
                    <div class="featured-post-author">
                        <div class="author-img">
                            <?php echo get_avatar( get_the_author_ID());?>
                        </div>
                        <div class="author-info">
                            <div class="author_name"> 
                                <?php the_author_posts_link();?>
                            </div> 
                            <span class="date"><?php echo get_the_date();?></span>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>					
		<?php 
		endwhile; 
		wp_reset_query();
		
		?>

		<?php else : ?>
			<h3><?php _e('404 Error&#58; Not Found', 'photography'); ?></h3>
		<?php endif; ?> 
       
    </div>
</div>
