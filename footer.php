
    <
<section class="s-extra">
    <div class="row top">
      <?php dynamic_sidebar('footer_widgets') ;?>             
    </div>   
    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Tags</h3>
            <div class="tagcloud">
                <?php 
                    $terms = get_terms( array(
                        'taxonomy' => 'post_tag',
                        'hide_empty' => false,
                    ) );
                ?>
                <?php foreach( $terms as  $term ):?>
                    <a href="<?php echo get_term_link($term->term_id) ;?>"><?php echo $term->name;?></a>
                <?php endforeach;?>               
            </div> 
        </div> 
    </div>
</section>     
<footer class="s-footer">
    <div class="s-footer__main">
        <div class="row">
            <div class="wrapper-nil"> 
                <?php dynamic_sidebar('footer_bottom_widgets');?>   
            </div>
            <?php dynamic_sidebar('footer_bottom_subscribe');?>
        </div>
    </div> 
    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span><?php echo get_theme_mod('copyright_setting');?></span> 
                   
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> 

</footer> 

<?php wp_footer();?>
</body>

</html>