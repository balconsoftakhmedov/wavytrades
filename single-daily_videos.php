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
                    <?php
                    the_content();   ?>
                  <p>
                      <?php the_excerpt(); ?>
                  </p>

                </div>
            </div>
        <?php

        endwhile; // End of the loop.
        ?>


        <div class="container-fluid pb-5">

            <section id="dv-recent" class="dv-section cpost-recent-section cpost-section">
                <div class="section-inner">
                    <h2 class="title_recent">Recent options Daily Videos</h2>
                    <div class="card-grid flex-grid   row">

                        <?php
                        $postsPerPage = 3;
                        $args = array(
                            'post_type' => 'daily_videos',
                            'posts_per_page' => $postsPerPage,
//                            'category_name' => 'blog',
                        );

                        $loop = new WP_Query($args);

                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <article class="card-grid-spacer card-grid-spacer--stm flex-grid-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="card flex-grid-panel flex-grid-stm">
                                    <figure class="card-media card-media--video">
                                        <a href="<?php echo get_the_permalink() ?>"
                                           class="card-image"
                                           style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/themes/wavytrades/assets/image/place.jpg' ?>);">
                                            <img src="https://placehold.it/325x183" alt="More Mixed Signals">
                                        </a>
                                    </figure>
                                    <section class="card-body">
                                        <h4 class="h5 card-title card-title--stm">
                                            <a href="<?php echo get_the_permalink() ?>">
                                                <?php echo get_the_title() ?> </a>
                                        </h4>
                                        <span class="article-card__meta"><small><?php echo get_the_date(); ?> with <?php  the_author() ?></small></span><br>

                                        <div class="card-description">
                                            <div class="u--hide-read-more u--squash">
                                                <?php echo get_the_excerpt() ?>
                                            </div>
                                        </div>
                                    </section>
                                    <span class="card-footer">
                                        <a class="btn btn-tiny btn-default"
                                           href="<?php echo get_the_permalink()?>">Watch
                                            Now</a>
                                    </span>
                                </div>
                            </article>
                        <?php
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        </div>

    </main><!-- #main -->


<?php

get_footer();
