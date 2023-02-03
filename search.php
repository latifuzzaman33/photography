<?php get_header();?>

    <section class="s-content">
        <div class="serach-title">
            <h3><?php _e('You are searching for :','photography') ?><span> <?php the_search_query();?></span></h3>
        </div>
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
               			
                <?php if(have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>	

                <?php get_template_part('template-parts/post-formats/post',get_post_format());?>
                <?php 
                endwhile; 
                wp_reset_query();                
                ?>
                <?php else : ?>
                    <h3><?php _e('404 Error&#58; Not Found', 'bilanti'); ?></h3>
                <?php endif; ?>                
               
            </div>
        </div> 

        <div class="row">
            <div class="col-full ">
                <div class="custom-pagination "> 

                
                    <?php 
                    the_posts_pagination( array(

                        'screen_reader_text' => __( ' ', 'photograph' ),
                        'prev_text'          => __( '<i class="fa fa-arrow-left"></i>','photograph' ),
                        'next_text'          => __( '<i class="fa fa-arrow-right"></i>', 'photograph' ),

                        ) );
                    ?>                    
                </div>
            </div>
        </div>

    </section> <!-- s-content -->


<?php get_footer();?>