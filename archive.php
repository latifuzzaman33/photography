<?php
 get_header();
 $description = get_the_archive_description();
?>
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

                <?php if ( $description ) : ?>
			        <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		        <?php endif; ?>
                
            </div>
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
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> 
    
<?php get_footer();?>