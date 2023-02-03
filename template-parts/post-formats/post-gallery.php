                    
                    <?php if( ! is_single() ):?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('masonry__brick entry format-gallery'); ?> data-aos="fade-up">                
                        <div class="photogrpahy-gallery-post-format">
                            <?php 

                            $galleries = get_post_gallery($post, false);
                            $attachment_ids = explode(",", $galleries['ids']);
                            foreach ($attachment_ids as $attachment_id):                         
                            ?>                
                            <div class="single-gallery">
                                <?php echo wp_get_attachment_image($attachment_id,'post_gallery');?>
                            </div>
                            <?php 
                            endforeach;
                            ?>       
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

<article class="row format-gallery">

<div class="s-content__header col-full">
    <h1 class="s-content__header-title">
        <?php the_title();?>
    </h1>
    <div class="s-content__header-meta">
        <span class="date"><?php echo esc_html(get_the_date()); ?></span>
        <span class="category_list">In: <?php echo get_the_category_list(', '); ?></span>
        
    </div>
</div> <!-- end s-content__header -->

    <div class="s-content__media col-full">
        <div class="photogrpahy-gallery-post-format">
            <?php 

            $galleries = get_post_gallery($post, false);
            $attachment_ids = explode(",", $galleries['ids']);
            foreach ($attachment_ids as $attachment_id):                         
            ?>                
            <div class="single-gallery">
                <?php echo wp_get_attachment_image($attachment_id,'single_post_gallery');?>
            </div>
            <?php 
            endforeach;
            ?>       
        </div>
    </div> <!-- end s-content__media -->

    <?php get_template_part('template-parts/post-formats/common/single-summary'); ?>
</article>
<?php 

// If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
?>
<?php endif;?>

