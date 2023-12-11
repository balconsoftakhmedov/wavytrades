<?php /** Template Name: Education */
// $stm_user_active_subscriptions = stm_user_active_subscriptions(false, get_current_user_id());
// if (empty($stm_user_active_subscriptions['plan_name'])) {
//     wp_redirect('/dashboard/');
// }
get_header();
?>
    <div class="stm__blog--section">
        <header>
            <div class="hero" style="background-image: url(/wp-content/themes/wavytrades/assets/image/Group-1.jpeg);">
                <div class="container-fluid d-flex align-items-center justify-content-center justify-content-md-start">
                    <h1 class="entry-title display-3 text-white text-center text-md-left">Trading Education Center</h1>
                </div>
            </div>
        </header>


        <div class="entry-content container-fluid py-5">
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="pb-2">
                        <p>Welcome to the Trading Education Center here you can discover some of the most popular
                            trading
                            strategies in the market while getting seasoned insight from veteran traders. Within the
                            Trading
                            Education Center, you can find tutorials on individual strategies, trading 101, indicators,
                            trading platforms, and more. Additionally, you can access the Simpler Blog and articles from
                            Simpler Insights, our free newsletter. There are so many resources at your fingertips, so
                            take
                            some time to look around.</p>
                    </div>


                    <div class="pb-4">
                        <form action="/" data-ajax_url="/wp-admin/admin-ajax.php"
                              method="get" class="input-group flex-nowrap free_cont_search">
                            <button class="btn btn-link" type="button" id="search_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                     class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                            </button>
                            <input type="text" name="s" class="form-control" id="search" aria-label="Search"
                                   aria-describedby="search_btn" placeholder="Search" value="">
                        </form>
                    </div>

                    <div class="pt-4">
                        <h2 class="color_primary font-weight-bold">Free Courses</h2>
                        <div class="three_recent_posts">
                            <ul class="gx-0 p-0 m-0 list-unstyled slick-initialized slick-slider">


                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                         style="opacity: 1; width: 777px; transform: translate3d(0px, 0px, 0px);">
                                        <?php
                                        $args = array(
                                            'post_type' => 'courses',
                                            'posts_per_page' => 3,
											'tax_query'      => array(
												array(
													'taxonomy' => 'custom_taxonomy',
													'field'    => 'slug', // Указывает, что вы используете ярлык (slug) категории
													'terms'    => 'free-courses', // Слаг (ярлык) категории, которую вы хотите отобразить
												),
											),
                                        );

                                        $loop = new WP_Query($args);

                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?>
                                            <li class="mb-3 mb-sm-0 slick-slide slick-current slick-active"
                                                data-slick-index="0"
                                                aria-hidden="false" style="width: 244px;" tabindex="0">
                                                <div>
                                                    <a href="<?php echo get_the_permalink() ?>"
                                                       target="_blank" class="d-block" tabindex="0">
                                                        <div class="recent_post_card"
                                                             style="background-size: cover; background-image: linear-gradient(0deg, #0a2335d1, #0a233578), url(<?php echo get_the_post_thumbnail_url() ?>)">
                                                            <p class="text-white mb-0"><?php echo get_the_title() ?>
                                                                &nbsp;</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>

                                    </div>
                                </div>
                            </ul>

                            <div class="arrow_link d-flex align-items-center justify-content-end pt-2">
                                <a target="_blank" class="mr-1 mb-0 h6 color_primary"
                                   href="/category/free-courses/">SEE ALL</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#fff"
                                     class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="py-4">
                        <h2 class="color_primary font-weight-bold">Tutorials</h2>
                        <div class="three_recent_posts">
                            <ul class="gx-0 p-0 m-0 list-unstyled slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                         style="opacity: 1; width: 777px; transform: translate3d(0px, 0px, 0px);">
                                        <?php
                                        $args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 3,
                                            'category_name' => 'tutorials',
                                        );

                                        $loop = new WP_Query($args);

                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?>
                                            <li class="mb-3 mb-sm-0 slick-slide slick-current slick-active"
                                                data-slick-index="0"
                                                aria-hidden="false" style="width: 244px;" tabindex="0">
                                                <div>
                                                    <a href="<?php echo get_the_permalink() ?>"
                                                       target="_blank" class="d-block" tabindex="0">
                                                        <div class="recent_post_card"
                                                             style="background-size: cover; background-image: linear-gradient(0deg, #0a2335d1, #0a233578), url(<?php echo get_the_post_thumbnail_url() ?>)">
                                                            <p class="text-white mb-0"><?php echo get_the_title() ?>
                                                                &nbsp;</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>

                                    </div>
                                </div>


                            </ul>

                            <div class="arrow_link d-flex align-items-center justify-content-end pt-2">
                                <a target="_blank" class="mr-1 mb-0 h6 color_primary"
                                   href="/category/tutorials/">SEE ALL</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#fff"
                                     class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="color_primary font-weight-bold">Blog Posts</h2>
                        <div class="three_recent_posts">
                            <ul class="gx-0 p-0 m-0 list-unstyled slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                         style="opacity: 1; width: 777px; transform: translate3d(0px, 0px, 0px);">
                                        <?php
                                        $args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 3,
                                            'category_name' => 'blog',
                                        );

                                        $loop = new WP_Query($args);

                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?>
                                            <li class="mb-3 mb-sm-0 slick-slide slick-current slick-active"
                                                data-slick-index="0"
                                                aria-hidden="false" style="width: 244px;" tabindex="0">
                                                <div>
                                                    <a href="<?php echo get_the_permalink() ?>"
                                                       target="_blank" class="d-block" tabindex="0">
                                                        <div class="recent_post_card"
                                                             style="background-size: cover; background-image: linear-gradient(0deg, #0a2335d1, #0a233578), url(<?php echo get_the_post_thumbnail_url() ?>)">
                                                            <p class="text-white mb-0"><?php echo get_the_title() ?>
                                                                &nbsp;</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>

                                    </div>
                                </div>


                            </ul>

                            <div class="arrow_link d-flex align-items-center justify-content-end pt-2">
                                <a target="_blank" class="mr-1 mb-0 h6 color_primary" href="/blog">SEE ALL</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#fff"
                                     class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h2 class="color_primary text-center display-4 font-weight-bold pt-5">Featured Content</h2>
                    <p class="pt-2 text-center mx-auto" style="max-width: 650px"></p>
                    <div class="d-flex">
                        <div class="col col-sm-8 mx-auto pt-3">

                            <div class="post_card_arch">
                                <div class="post_card_img"
                                     style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
                                <div class="card_wrapper px-4">
                                    <a class="d-block h-100"
                                       href="<?php echo get_permalink() ?>">
                                        <div class="card cart--blog py-4 px-3">
                                            <h5 class="color_primary"><?php echo get_the_title() ?></h5>
                                            <hr>


                                            <div class="author-card">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="logo_crop">
                                                         <span>
                                                             <img src="/wp-content/themes/wavytrades/assets/image/logoCrop.png"
                                                                  alt="">
                                                         </span>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h4 class="mb-0 fs-sm-6"> <?php echo ucfirst(get_the_author()) ?> </h4>
                                                            <p class="mb-0">
                                                                <?php echo get_post_time('j F Y') ?>.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">

                        <h2 class="color_primary font-weight-semibold"></h2>
                        <div style="color: #fff;">As we're a collaborative company of like minded traders, we're always
                            looking to provide
                            you
                            with the best market insight and an easy to use experience. If at any time you have any
                            questions, comments, or concerns please feel free to reach out to our awesome customer
                            support
                            team at <a href="tel:" target="_blank"></a> or by email at <a
                                    href="mailto:" target="_blank"></a>
                        </div>

                    </div>


                </div>
                <!-- SIDEBAR -->
                <div class="col-md-5 col-lg-4">
                    <div class="ps-md-4">
                        <h5 class="pb-2 pt-5 pt-sm-0 color_primary"><strong>Join our Free Trading Room Today!</strong>
                        </h5>
                        <div class="card cart--blog pb-4 pt-4 px-3">
                            <div class="pt-2">
                                <style>
                                    .register-error {
                                        text-align: center;
                                        color: red;
                                    }

                                    .btn-green {
                                        background-color: #89C152 !important;
                                    }

                                    .btn-green:hover {
                                        background-color: #79aa48 !important;
                                    }
                                </style>
                                <div>
                                    <?php
                                    if (is_user_logged_in()) {


                                        ?>

                                        <p>You are logged in. Click <a href="/dashboard">here to go to your
                                                dashboard</a></p>
                                    <?php } else { ?>
                                        <form method="post" class="wc-auth-login">
                                        <p class="form-row form-row-wide">
                                            <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>
                                                &nbsp;<span class="required">*</span></label>
                                            <input type="text" class="input-text" name="username" id="username"
                                                   value="<?php echo (!empty($_POST['username'])) ? esc_attr($_POST['username']) : ''; ?>"/><?php //@codingStandardsIgnoreLine ?>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>
                                                &nbsp;<span class="required">*</span></label>
                                            <input class="input-text" type="password" name="password" id="password"/>
                                        </p>
                                        <p class="wc-auth-actions form-group">
                                            <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                                            <input type="submit"
                                                   class="btn btn-lg btn-block btn-orange font-weight-bold login-form-btn "
                                                   name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>">
                                            <input type="hidden" name="user" value="true"/>
                                            <!--        <input type="hidden" name="redirect" value="-->
                                            <?php //echo esc_url( $redirect_url ); ?><!--" />-->
                                        </p>
                                        </form><?php } ?>
                                </div>
                            </div>
                        </div>


                        <h4 class="pt-5 color_primary"><strong>Featured Topics</strong></h4>
                        <div class="most_viewed_posts">
                            <div class="pt-0 pb-3">
                                <h4><strong></strong></h4>
                                <p></p>
                            </div>

                            <?php $args = array(
                                'posts_per_page' => 3,
                                'post_type' => 'post',
                                'category_name' => 'blog',
                            );
                            $the_query = new WP_Query($args);

                            while ($the_query->have_posts()) {
                                // go ahead
                                $the_query->the_post();
                                ?>

                                <a class="mb-4 d-block"
                                   href="<?php echo get_the_permalink() ?>"
                                   target="_blank">
                                    <div class="card  cart--blog p-3">
                                        <h5 class="mb-0"><?php echo get_the_title() ?></h5>
                                        <p class="card-text pt-1">
                                            <?php echo get_post_time('j F Y') ?>.
                                        </p>
                                    </div>
                                </a>
                            <?php }
                            wp_reset_postdata();
                            ?>
                        </div>

                        <div class="pt-4 text-center">
                            <a href="" target="_blank">
                                <img src="" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
