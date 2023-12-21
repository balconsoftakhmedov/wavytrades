<?php
/* Template Name: Dashboard */
if (!is_user_logged_in()) {
    wp_redirect("/dashboard/account");

}
get_header();
$current_user = wp_get_current_user();
$theAuthorId = get_the_author_meta('ID');
$getUserUrl = get_avatar_url ($theAuthorId);



?>


<div class="dashboard">
    <?php require_once 'woocommerce/dashboard/dashboard-sidebar.php'?>
    <main class="dashboard__main ">

        <header class="dashboard__header">
            <div class="dashboard__header-left">
                <h1 class="dashboard__page-title">Member Dashboard</h1>
            </div>
            <div class="dashboard__header-right">
<!--                <a href="https://cdn.simplertrading.com/2021/10/06121512/SimplerTrading-Rules-of-the-Room.pdf"-->
<!--                   target="_blank" class="btn btn-xs btn-link">Trading Room Rules</a>-->
                <div class="dropdown display-inline-block">
<!--                    <a href="#" class="btn btn-xs btn-orange btn-tradingroom dropdown-toggle" id="dLabel"-->
<!--                       data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                        <strong>Enter a Trading Room</strong>-->
<!--                    </a>-->
                    <nav class="dropdown-menu dropdown-menu--full-width" aria-labelledby="dLabel">
                        <ul class="dropdown-menu__menu">
                            <li>
                                <a href=""
                                   target="_blank" rel="nofollow"><span class="st-icon-options icon icon--md"></span>
                                    Options Trading Room</a></li>
                            <li>
                                <a href=""
                                   target="_blank" rel="nofollow"><span class="st-icon-moxie icon icon--md"></span>
                                    Moxie Indicator™ Mastery Room</a></li>
                            <li>
                                <a href=""
                                   target="_blank" rel="nofollow"><span
                                            class="st-icon-consistent-growth icon icon--md"></span> Compounding Growth
                                    Room</a></li>
                            <li>
                                <a href=""
                                   target="_blank" rel="nofollow"><span
                                            class="st-icon-chart-patterns icon icon--md mx-2"></span> Chart Patterns
                                    Mastery</a></li>
                            <li><a data-user="37192" class="free_trading_room"
                                   href=""
                                   target="_blank" rel="nofollow"><span
                                            class="st-icon-training-room icon icon--sm"></span> Free Trading Room</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <div class="dashboard__content">
            <div class="dashboard__content-main">
                <!-- Dashboard Walkthrough Banner-->
                <section class="dashboard__content-section">
                    <h2 class="section-title">Memberships</h2>
                    <div class="membership-cards row">


                        <div class="col-sm-6 col-xl-4">
                            <article class="membership-card membership-card--options">
                                <a href="/dashboard/options/"
                                   class="membership-card__header">
                            <span class="membership-card__icon">
                                <span class="icon icon--lg st-icon-options"></span>
                            </span>
                                    Options
                                </a>
                                <div class="membership-card__actions">
                                    <a href="/dashboard/account/">Dashboard</a>
                                    <a href="/dashboard/options/"
                                       rel="nofollow">Trading Room</a>
                                </div>
                            </article>
                        </div>

                    </div>
                </section>


                <div class="dashboard__content-section u--background-color-white">

                    <section>
                        <?php

                        $args = array(
                            'post_type' => 'weekly_videos',
                            'posts_per_page' => 1,
                        );

                        $loop = new WP_Query($args);

                        while ($loop->have_posts()) :
                        $loop->the_post();

                        ?>
                        <div class="row">
                            <div class="col-sm-6 col-lg-5">
                                <h2 class="section-title-alt section-title-alt--underline">Weekly Watchlist</h2>
                                <h4 class="h5 u--font-weight-bold">Weekly Watchlist with <?php the_author() ?></h4>
                                <div class="u--hide-read-more">
                                    <p>Week of <?php echo get_the_date('F j Y') ?></p>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                   class="btn btn-tiny btn-default">Watch Now</a>
                            </div>
                            <div class="col-sm-6 col-lg-7 hidden-xs hidden-sm d-none d-lg-block">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo get_the_post_thumbnail() ?>
                                </a>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </section>
                </div>
            </div>

            <aside class="dashboard__content-sidebar">
                <section class="content-sidebar__section">
                </section>
            </aside>
        </div>
    </main>
</div>

<?php
get_footer();
?>
