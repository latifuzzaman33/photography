<?php get_header();?>
    <section class="s-content s-content--narrow s-content--no-padding-bottom">
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
        

    </section> <!-- s-content -->

<?php get_footer();?>