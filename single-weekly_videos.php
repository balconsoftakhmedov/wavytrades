<?php
get_header();

?>

    <main id="primary daily" class="site-main" style="background: #000; border-top: 4px solid #222; color: #fff;">


        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="container-fluid  container-fluid--stm mt-5">
                <div class="container-fluid prev-next-container all--prev-next-conatiner">
                    <div class="row justify-content-between">
                        <div class="col-5 prev prev-container g-0">
                        <span class="nav-previous nav-previous--daily ">
                            <?php previous_post_link( '%link  ',' <i class="fa fa-chevron-circle-left"></i>  Previous' )?>
                        </span>
                        </div>

                        <div class="col-5 prev next-container g-0" style="justify-content: flex-end;">
                    <span class="nav-next nav-previous--daily"><?php next_post_link( '%link','Next <i class="fa fa-chevron-circle-right"></i>' ) ?></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid pb-5 pt-5">
                <div class="blog__stm">
                    <div class="daily_title"><?php echo get_the_title() ?></div>
                    <div class="daily_subtitle">With <?php  the_author() ?></div>
                    <?php the_content();?>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                </div>
            </div>
        <?php

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->


<?php

get_footer();
