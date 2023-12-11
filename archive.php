<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wavyTrades
 */
//$stm_user_active_subscriptions = stm_user_active_subscriptions(false, get_current_user_id());
//if (empty($stm_user_active_subscriptions['plan_name'])) {
//    wp_redirect('/dashboard/');
//}


// redirect user if user don't sign in
global $wp;
$wp->parse_request();
$current_url = home_url($wp->request);

if (strpos($current_url, 'free-courses')) {
    $user = wp_get_current_user();
    if (empty($user->roles)) {
        wp_redirect('/dashboard/');
    }

}


get_header();
?>
    <div class="stm__blog--section">
        <main id="primary" class="site-main">
            <div class="container-fluid">

                <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    $taxonomy = get_queried_object();
                    if ( !empty($taxonomy->name)) {
                        $tax = $taxonomy->name;
                    }

                    ?>
                    <h1 class="entry-title display-3 color_primary pb-4"> <?php echo !empty(get_the_category()['0']->name) ? get_the_category()['0']->name : $tax; ?></h1>
                    <p class="pb-4" style="max-width: 600px">Trading the markets can get rough. Make sure your mentally
                        prepared to go up against the markets with these tips on trading psychology.</p>
                    <div class="d-lg-flex d-grid mb-5 justify-content-center align-items-center">
                        <div class="d-flex align-items-center mx-3">
                            <form action="/" data-ajax_url="/wp-admin/admin-ajax.php" method="get"
                                  class="input-group flex-nowrap free_cont_search">
                                <button class="btn btn-link" type="button" id="search_btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                         class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                    </svg>
                                </button>
                                <input type="text" name="s" class="form-control" id="search" aria-label="Search"
                                       aria-describedby="search_btn" placeholder="Search" value="">
                                <input type="hidden" name="cat_name" class="form-control"
                                       value="<?php echo !empty(get_the_category()['0']->name) ? get_the_category()['0']->name : ''; ?>">
                            </form>
                        </div>
                    </div>
                    <?php
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->
                <div class="row post_content">

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;

                    the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
            </div>


        </main><!-- #main -->
    </div>
<?php
get_sidebar();
get_footer();
