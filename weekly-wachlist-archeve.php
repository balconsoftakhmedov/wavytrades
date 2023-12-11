<?php /** Template Name: Weekly Watchlist Archive */

$user_id = get_current_user_id();
$stm_active_sub = stm_user_active_subscriptions(false, $user_id);
$admin = current_user_can('administrator');

if (!$admin) {
	if (!empty($stm_active_sub)) {
		wp_redirect('/dashboard/');
	}
}
get_header();

?>
    <div class="dashboard">
        <div class="dashboard__sidebar">
            <?php require_once 'woocommerce/myaccount/account-sidebar.php' ?>
            <?php require_once 'woocommerce/dashboard/weekly-sidebar.php' ?>
        </div>
        <main class="dashboard__main">

            <header class="dashboard__header">
                <div class="dashboard__header-left">
                    <h1 class="dashboard__page-title">Weekly Watchlist Dashboard</h1>

                </div>
            </header>


            <div class="dashboard__content ">
                <div class="dashboard__content-main">


                            <section class="dashboard__content-section">

                                <div class="dashboard-filters">
                                    <div class="dashboard-filters__count">
                                        <!--                                Showing-->
                                        <!--                                <div class="facetwp-counts">-->
                                        <!--                                    --><?php //echo 12  ?>
                                        <!--                                    1-12 of 1296</div>-->
                                    </div>

                                </div>
                                <div class="facetwp-template mt-2 ">
                                    <div class="fl-post-grid-post">
                                        <!--fwp-loop-->
                                        <?php
                                        $postsPerPage = 1;
                                        $args = array(
                                            'post_type' => 'weekly_videos',
                                            'posts_per_page' => 12,
                                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,

                                        );

                                        $loop = new WP_Query($args);

                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?>

                                            <div class="card card--stm fl-post-text">
                                                <div class="">
                                                    <section class="card-body u--squash">
                                                        <h4 class="h5 card-title" style="font-size: 24px; margin-bottom: 0;">Weekly Watchlist for  <?php echo get_the_date() ?></h4>
                                                        <div class="excerpt" style="font-size: 16px;">
                                                            <i>With  <?php echo get_the_author() ?></i>
                                                        </div>
                                                        <div class="fl-post-more-link">
                                                            <a class="btn btn-tiny btn-default" href="<?php echo get_the_permalink() ?>">Read Now</a>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>



                                        <?php
                                        endwhile;

                                        ?>
                                    </div>
                                        <div class="facetwp-pagination">
                                            <div class="facetwp-pager">
                                                <?php

                                                $total_pages = $loop->max_num_pages;

                                                if ($total_pages > 1) {
                                                    $big = 999999999; // need an unlikely integer
                                                    echo paginate_links(array(
                                                        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                                        'format' => '?paged=%#%',
                                                        'current' => max(1, get_query_var('paged')),
                                                        'total' => $loop->max_num_pages
                                                    ));
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php wp_reset_postdata(); ?>


                                </div>
                            </section>
                        </div>
                    </div>
        </main>
    </div>
<?php

get_footer();
