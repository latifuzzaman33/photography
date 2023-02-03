
<?php if(!is_single()):?>
    <article class="masonry__brick entry " data-aos="fade-up">
        <?php 
        $popup_video = get_post_meta($post->ID,'gallery_metadata',true);

        ?>
        <div class="entry__thumb video-image">
            <div class="video-featured-image">
                <?php 
                the_post_thumbnail('video_featured_img', array( 'class' => 'img-fluid','alt'=> get_the_title() ));
                ?>
                <div class="video-icon"> 
                    <a class="test-popup-link" href="http://www.youtube.com/watch?v=<?php echo $popup_video; ?>"></a>
                </div>
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

    <article class="row format-video">
        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                This Is A Video Post Format.
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">December 16, 2017</li>
                <li class="cat">
                    In
                    <a href="#0">Lifestyle</a>
                    <a href="#0">Travel</a>
                </li>
            </ul>
        </div> 

        <div class="s-content__media col-full">
            <div class="video-container">
                <?php 
                $popup_videos = get_post_meta($post->ID,'gallery_metadata',true);

                ?>       
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $popup_videos; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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