
        <div class="comments-wrap">

<div id="comments" class="row">
    <div class="col-full">

        <h3 class="h2">5 Comments</h3>

       
        <ol class="commentlist">
            <?php wp_list_comments();?>
        </ol> 
        <div class="comments-pagination"> 
            <?php 
            the_comments_pagination(array(

                    'screen_reader_text' => __( 'Comments navigation' ),
                    'prev_text'         => __( 'Previous Comments','photograph' ),
                    'next_text'         => __( 'Next Comments','photograph' ),
                ));
            ?>
        </div>

        <!-- respond
        ================================================== -->
        <div class="respond">

            <h3 class="h2">Add Comment</h3>

          <?php comment_form() ;?>

        </div> <!-- end respond -->

    </div> <!-- end col-full -->

</div> <!-- end row comments -->
</div> <!-- end comments-wrap -->