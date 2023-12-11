<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wavyTrades
 */

get_header();

?>

    <main id="primary daily" class="site-main" style="background: #000; border-top: 4px solid #222; color: #fff;">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="hero"
                 style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url(<?php echo get_the_post_thumbnail_url() ?>);">
                <div class="container-fluid d-flex align-items-center">
                    <h1 class="entry-title display-3 text-white"><?php echo get_the_title() ?></h1>
                </div>
            </div>

            <div class="container-fluid pt-2">
                <div class="pt-4">

                    <a href="">
                        <div class="badge rounded-pill" style="background-color: #29ABE1;">
                            <h6 class="mx-4 mb-0 py-1" style="font-weight: 400; letter-spacing: 1px;">
                                Trading Tips &amp; Strategies
                            </h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="container-fluid pb-4 pt-5">
                <div class="author-card">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="logo_crop">
                                 <span>   <img
                                             src="/wp-content/themes/wavytrades/assets/image/logoCrop.png"
                                             alt="">
                                 </span>
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-0 fs-sm-6">  <?php echo get_the_author() ?> </h4>
                                <p class="mb-0">
                                    <?php echo get_post_time('j F Y') ?>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pb-5 pt-2">
                <?php the_content(); ?>
            </div>

        <?php

        endwhile; // End of the loop.
        wp_reset_postdata();

        $cat = get_the_category();
        $cat = $cat[0]->name;

        ?>


        <div class="container-fluid pb-5">
            <h2 class="pb-3">Recent Blogs</h2>
            <div class="three_recent_posts">
                <ul class="gx-0 p-0 m-0 list-unstyled slick-initialized slick-slider">


                    <div class="slick-list draggable">
                        <div class="slick-track"
                             style="opacity: 1; width: 1176px; transform: translate3d(0px, 0px, 0px);">
                            <?php
                            $postsPerPage = 3;

                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => $postsPerPage,
                                'category_name' => $cat,
                            );

                            $loop = new WP_Query($args);

                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <li class="mb-3 mb-sm-0 slick-slide slick-current slick-active" style="width: 377px;"
                                    tabindex="0" data-slick-index="0" aria-hidden="false">
                                    <div>
                                        <a href="<?php echo get_the_permalink() ?>"
                                           target="_blank" class="d-block" tabindex="0">
                                            <div class="recent_post_card"
                                                 style="background-size: cover; background-image: linear-gradient(0deg, #0a2335d1, #0a233578), url(<?php echo get_the_post_thumbnail_url() ?>)">
                                                <p class="text-white mb-0"><?php echo get_the_title() ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            <?php
                            endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </ul>

                <div class="arrow_link d-flex align-items-center justify-content-end pt-2">
                    <a target="_blank" class="mr-1 mb-0 h6 color_primary" href="/blog" style="color: #fff !important;">SEE
                        ALL</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#fff"
                         class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-5">


            <div class="container-fluid prev-next-container">
                <div class="row justify-content-between">
                    <div class="col-5 prev prev-container g-0">
                        <span class="nav-previous"><?php previous_post_link('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path></svg> %link '); ?></span>
                    </div>
                    <div class="col-5 prev next-container g-0" style="justify-content: flex-end;">
                        <span class="nav-next"><?php next_post_link(' %link  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                        </svg>'); ?></span>

                    </div>
                </div>
            </div>
        </div>
    </main><!-- #main -->

<?php

get_footer();
