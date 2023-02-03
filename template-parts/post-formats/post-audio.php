<?php if(!is_single()):?>
<article class="masonry__brick entry format-audio" data-aos="fade-up">
    <div class="entry__thumb">
        <div class="post-audio">
            <?php 
                $content = do_shortcode(apply_filters( 'the_content',$post->post_content )  );
                $embed = get_media_embedded_in_content( $content,array('audio','iframe') );
                echo $embed[0];           
            ?>
        </div>	
    </div>
    <div class="entry__text">
        <div class="entry__header">

            <div class="entry__date">
                <?php echo esc_html( get_the_date() ); ?> 
            </div>
            <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

        </div>
        <div class="entry__excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="entry__meta">
            <span class="entry__meta-links">
                <?php
                echo get_the_category_list(' ');
                ?>
            </span>
        </div>
    </div>
</article> 
<?php else:?>
    <article class="row format-audio">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                     <?php the_title();?>
                </h1>
                <div class="s-content__header-meta">
                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                    <span class="category_list">In: <?php echo get_the_category_list(', '); ?></span>
                    
                </div>
            </div> 
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                        <?php 
                        $content = do_shortcode(apply_filters( 'the_content',$post->post_content )  );
                        $embed = get_media_embedded_in_content( $content,array('audio','iframe') );
                        echo $embed[0];           
                        ?>
                </div>
            </div> 

            <?php get_template_part('template-parts/post-formats/common/single-summary'); ?>
        </article>

        <?php 

        // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>
    <?php endif;?>