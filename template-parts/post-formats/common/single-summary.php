<div class="col-full s-content__main">
                <?php the_content();?>               
                <div class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        <?php echo get_the_tag_list() ;?>
                    </span>
                </div> 

                <div class="s-content__author">
                   <?php echo get_avatar( get_the_author_ID());?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>"><?php echo get_the_author() ;?></a>
                        </h4>
                    
                        <p>
                            <?php echo get_the_author_description();?>
                            
                        </p>

                        <ul class="s-content__author-social">
                            <?php 
                                $facebook = get_the_author_meta( 'facebook_profile', $userID );
                                $twitter = get_the_author_meta( 'twitter_profile', $userID );
                                $google_plus = get_the_author_meta( 'google_profile', $userID );
                                $instagram = get_the_author_meta( 'instagram_profile', $userID );
                            ?>
                           <li><a href="<?php echo esc_url($facebook);?>" target=__black>Facebook</a></li>
                           <li><a href="<?php echo esc_url($twitter);?>" target=__black>Twitter</a></li>
                           <li><a href="<?php echo esc_url($google_plus);?>" target=__black>GooglePlus</a></li>
                           <li><a href="<?php echo esc_url($instagram);?>" target=__black>Instagram</a></li>
                        </ul>

                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <?php 
                        $photograph_prev_post = get_previous_post( );
                        if($photograph_prev_post):
                        ?>
                        <div class="s-content__prev">
                            <a href="<?php echo get_the_permalink( $photograph_prev_post );?>" rel="prev">
                                <span><?php _e('Previous Post','photograph') ;?></span>
                                <?php echo get_the_title($photograph_prev_post);?>
                            </a>
                        </div>
                        <?php endif;?>

                        <?php 
                        $photograph_next_post = get_next_post();
                        if($photograph_next_post):
                        ?>
                        <div class="s-content__next">
                            <a href="<?php echo get_the_permalink( $photograph_next_post );?>" rel="next">
                                <span><?php _e('Next Post','photograph') ;?></span>
                                <?php echo get_the_title($photograph_next_post);?>
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->
