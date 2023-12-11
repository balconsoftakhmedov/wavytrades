<?php
/**
 * wavyTrades functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wavyTrades
 */


if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.4.9');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wavytrades_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on wavyTrades, use a find and replace
        * to change 'wavytrades' to the name of your theme in all the template files.
        */
    load_theme_textdomain('wavytrades', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');


    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );


    add_theme_support('woocommerce');
    add_theme_support('widgets');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'wavytrades'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'wavytrades_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'wavytrades_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wavytrades_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wavytrades_content_width', 640);
}

add_action('after_setup_theme', 'wavytrades_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wavytrades_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'wavytrades'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'wavytrades'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'wavytrades_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wavytrades_scripts()
{
    wp_enqueue_style('wavytrades-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('icon-style', get_template_directory_uri() . '/assets/style.css', array(), _S_VERSION);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap-3.4.1-dist/css/bootstrap.min.css', array(), _S_VERSION);
    wp_enqueue_style('dashbord', get_template_directory_uri() . '/assets/bootstrap-3.4.1-dist/css/dashboard.css', array(), _S_VERSION);
    wp_enqueue_style('dashbord', get_template_directory_uri() . '/assets/bootstrap-3.4.1-dist/css/dashicons.min.css', array(), _S_VERSION);
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/bootstrap-3.4.1-dist/css/custom.css', array(), _S_VERSION);

    wp_style_add_data('wavytrades-style', 'rtl', 'replace');

    wp_enqueue_script('wavytrades-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array(), '3.5', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_register_style('fonts-stm', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css', false, null);
    wp_enqueue_style('fonts-stm');

}

add_filter('woocommerce_add_to_cart_redirect', 'misha_skip_cart_redirect_checkout');

function misha_skip_cart_redirect_checkout($url)
{
    return wc_get_checkout_url();
}


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('dashicons');
});

add_action('wp_enqueue_scripts', 'wavytrades_scripts');

function load_custom_wp_admin_style()
{
    wp_register_style('custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/admin.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/shortcode.php';
require get_template_directory() . '/inc/class-alg-wc-ev-emails-child.php';
require get_template_directory() . '/inc/woo_function.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


wp_localize_script('twentyfifteen-script', 'ajax_posts', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'noposts' => __('No older posts found', 'twentyfifteen'),
));


function more_post_ajax()
{

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged' => $page,
        'category_name' => 'blog',
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
        ?>

        <div class="col-sm-6 col-lg-4 pb-4">
            <div class="post_card_arch">
                <div class="post_card_img"
                     style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
                <div class="card_wrapper px-4">

                    <a class="d-block h-100"
                       href="<?php echo get_the_permalink() ?>">
                        <div class="card cart--blog py-4 px-3">
                            <h5 class="color_primary">
                                <?php echo get_the_title() ?>
                            </h5>
                            <hr>
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
                                            <h4 class="mb-0 fs-sm-6"> <?php
                                                echo get_the_author();
                                                ?> </h4>
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

    <?php

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl()
{

    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

// end blog post ajax


// start news post ajax
function more_post_news_ajax()
{

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged' => $page,
        'category_name' => 'news',
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
        ?>

        <div class="col-sm-6 col-lg-4 pb-4">
            <div class="post_card_arch">
                <div class="post_card_img"
                     style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
                <div class="card_wrapper px-4">

                    <a class="d-block h-100"
                       href="<?php echo get_the_permalink() ?>">
                        <div class="card cart--blog py-4 px-3">
                            <h5 class="color_primary">
                                <?php echo get_the_title() ?>
                            </h5>
                            <hr>
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
                                            <h4 class="mb-0 fs-sm-6"> <?php
                                                echo get_the_author();
                                                ?> </h4>
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

    <?php

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_news_ajax', 'more_post_news_ajax');
add_action('wp_ajax_more_post_news_ajax', 'more_post_news_ajax');


//add_filter('woocommerce_login_redirect', 'truemisha_login_redirect', 25, 2);
//
//function truemisha_login_redirect($redirect, $user)
//{
//
//    $redirect = '/dashboard/account';
//    return $redirect;
//
//}


add_filter('woocommerce_account_menu_items', 'add_my_menu_items', 99, 1);

function add_my_menu_items($items)
{
    $my_items = array(
        //  endpoint   => label
//        '2nd-item' => __( '2nd Item', 'my_plugin' ),
//        '3rd-item' => __( '3rd Item', 'my_plugin' ),
    );
    unset($items['dashboard']);
    unset($items['downloads']);
    $items['orders'] = __('My Orders', 'woocommerce');
    $items['edit-address'] = __('Billing Address', 'woocommerce');
    $items['subscriptions'] = __('My Subscription', 'woocommerce');


    $my_items = array_slice($items, 0, 1, true) +
        $my_items +
        array_slice($items, 1, count($items), true);

    return $my_items;
}


function custom_shop_page_redirect()
{
    if (is_shop()) {
        wp_redirect(home_url('/money-room'));
        exit();
    }

	$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$url = strpos($actual_link, "money-room");
	$optionsUrl = strpos($actual_link, "options");
	$wwURl = strpos($actual_link, "ww");
	$user_id = get_current_user_id();
	$stm_active_sub = stm_user_active_subscriptions(false, $user_id);
	$admin = current_user_can('administrator');
	$customAdmin = current_user_can('custom_admin');

	if (!$admin && !$customAdmin) {

		if (!empty($stm_active_sub) &&  $url) {
			wp_redirect(home_url('/dashboard/options/'));
			exit();
		}

		if (empty($stm_active_sub) && $optionsUrl ) {
			wp_redirect(home_url('/money-room/'));
		}

		if (empty($stm_active_sub) && $wwURl ) {
			wp_redirect(home_url('/dashboard/'));
		}
	}

}

add_action('template_redirect', 'custom_shop_page_redirect');


add_action('init', 'stm_user_active_subscriptions');

if (!function_exists('stm_user_active_subscriptions')) {
    /**
     * @param bool $get_paused
     * @param int $user_id
     * @return array
     */
    function stm_user_active_subscriptions($get_paused = false, $user_id = 0)
    {
        /*
         * TODO
         * 'Subscriptio_User' will be removed
        */
        $user_subscriptions = (class_exists('Subscriptio_User')) ? Subscriptio_User::find_subscriptions(true, $user_id) : subscriptio_get_customer_subscriptions($user_id);



        $active_subscription = '';
        $has_active = false;

        if ($get_paused) {
            $statuses = array('overdue', 'suspended');
        } else {
            $statuses = array('active', 'trial', 'set-to-cancel');
        }

        $status = '';
        foreach ($user_subscriptions as $user_subscription) {
            /*
             * TODO
             * 'Subscriptio_User' will be removed
            */
            if (!$user_subscription) {
                continue;
            }

            $status = (class_exists('Subscriptio_User')) ? $user_subscription->status : $user_subscription->get_status();

            if (in_array($status, $statuses) && !$has_active) {
                $active_subscription = $user_subscription;
                $has_active = true;

            }
        }

        $user_subscriptions = $active_subscription;
        $user_subscription_quota = array();

        if (!empty($user_subscriptions)) {

            /*
             * TODO
             * 'Subscriptio_User' will be removed
             * */
            if (class_exists('Subscriptio_User')) {

                $plan_name = (!empty($user_subscriptions->products_multiple)) ? $user_subscriptions->products_multiple[0]['product_name'] : $user_subscriptions->product_name;
                $customer_id = $user_subscriptions->user_id;
                $product_id = $user_subscriptions->product_id;
                $last_order_id = $user_subscriptions->last_order_id;
                $expires = $user_subscriptions->payment_due_readable;

                if (empty($product_id) && !empty($user_subscriptions->products_multiple) && is_array($user_subscriptions->products_multiple)) {
                    $products = $user_subscriptions->products_multiple;
                    if (!empty($products[0]) && !empty($products[0]['product_id'])) {
                        $product_id = $products[0]['product_id'];
                    }
                }
            } else {
                $initial_order = $user_subscriptions->get_initial_order()->get_data();
                $key = key($initial_order['line_items']);
                $order_data = $initial_order['line_items'][$key]->get_data();
                $plan_name = $order_data['name'];
                $customer_id = $user_subscriptions->get_customer_id();
                $product_id = $order_data['product_id'];
                $last_order_id = $user_subscriptions->get_last_renewal_order_id();
                $expires = (!empty($user_subscriptions->get_scheduled_renewal_payment())) ? $user_subscriptions->get_scheduled_renewal_payment()->format('m/d/Y H:i') : null;
            }

            $user_subscription_quota['user_id'] = $customer_id;
            $user_subscription_quota['product_id'] = $product_id;
            $user_subscription_quota['plan_name'] = $plan_name;
            $user_subscription_quota['status'] = $status;
            $user_subscription_quota['last_order_id'] = $last_order_id;
            $user_subscription_quota['expires'] = $expires;

        }

        return $user_subscription_quota;
    }
}

add_action('wp', 'check_home');
function check_home()
{
    if (is_home() || is_front_page()) {
    } else {
        function my_plugin_body_class_test($classes)
        {
            $classes[] = 'not-front-page';
            return $classes;
        }

        add_filter('body_class', 'my_plugin_body_class_test');
    }
}


if (is_user_logged_in()) {
    function my_plugin_body_class($classes)
    {
        $classes[] = 'account-stm';
        return $classes;
    }

    add_filter('body_class', 'my_plugin_body_class');
}


if (isset($_GET['cat_name'])) {
    function searchcategory($query)
    {
        if ($query->is_search) {
            $query->set('category_name', $_GET['cat_name']);
        }
        return $query;
    }

    add_filter('pre_get_posts', 'searchcategory');
}


if (!function_exists('write_log')) {
    function write_log($log)
    {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}


function custom_post_type_add_upsells_product_data_tab($product_data_tabs)
{
    $product_data_tabs['general']['upsells'] = array(
        'label' => __('Upsells', 'woocommerce'),
        'target' => 'upsells_product_data',
    );
    return $product_data_tabs;
}


function custom_post_type_save_upsells_fields($post_id)
{
    if (isset($_POST['courses'])) {
        $upsell_ids = is_array($_POST['courses']) ? array_map('intval', $_POST['courses']) : array();

        update_post_meta($post_id, 'courses', implode(',', $upsell_ids));
    }
}

add_action('save_post', 'custom_post_type_save_upsells_fields');
add_filter('woocommerce_product_data_tabs', 'custom_post_type_add_upsells_product_data_tab');
add_action('woocommerce_product_options_general_product_data', 'custom_post_type_add_upsells_product_data_panel');

function custom_post_type_add_upsells_product_data_panel()
{
    global $woocommerce, $post;

    // Get current upsell IDs
    $upsell_ids = get_post_meta($post->ID, 'courses', true);
    $upsell_ids = empty($upsell_ids) ? array() : explode(',', $upsell_ids);

    // Add Upsells product data panel
    ?>
    <div id='upsells_product_data' class='panel woocommerce_options_panel'><?php
    ?><p class="form-field upsells_ids_field">
    <label for="upsells_ids"><?php _e('Courses', 'woocommerce'); ?></label>
    <select class="wc-product-search" multiple="multiple" style="width: 50%;" id="upsells_ids" name="courses[]"
            data-placeholder="<?php esc_attr_e('Search for a product&hellip;', 'woocommerce'); ?>"
            data-action="my_custom_post_type_json_search" data-exclude="<?php echo intval($post->ID); ?>">
        <?php
        $products = get_posts(array(
            'post_type' => 'courses', // Replace with your custom post type
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'exclude' => $post->ID,
        ));

        if ($products) {
            foreach ($products as $product) {
                echo '<option value="' . esc_attr($product->ID) . '" ' . selected(in_array($product->ID, $upsell_ids), true, false) . '>' . esc_html($product->post_title) . '</option>';
            }
        }
        ?>
    </select> <?php echo wc_help_tip(__('Upsells are products that you recommend instead of the currently viewed product.', 'woocommerce')); ?>
    </p><?php
    ?></div><?php


}

add_action('wp_ajax_my_custom_post_type_json_search', 'my_custom_post_type_json_search');
function my_custom_post_type_json_search()
{
    check_ajax_referer('search-products', 'security');

    $term = wc_clean(stripslashes($_GET['term']));
    $exclude_ids = array_map('intval', (array)$_GET['exclude']);

    $query = new WP_Query(array(
        'post_type' => 'courses', // Replace with your custom post type
        'post_status' => 'publish',
//        's' => $term,
        'posts_per_page' => -1,
//        'post__not_in' => $exclude_ids,
        'fields' => 'ids',
    ));

    $products = array();
    foreach ($query->posts as $product_id) {
        $product = get_post($product_id);
        $products[$product_id] = rawurldecode(get_the_title($product->ID));
    }

    wp_send_json($products);
    wp_die();
}


add_action('woocommerce_order_status_completed', 'order_created');
function order_created($order_id)
{

    $order = new WC_Order($order_id);
    $user_id = $order->get_user_id();
    $user_courses = get_user_meta($user_id, 'stm_courses', true);

	$user_courses = (is_array($user_courses)) ? $user_courses : [];
	$user_courses = array_filter($user_courses);


    $id_courses = [];


    foreach ($order->get_items() as $item) {
        if (!is_object($item)) {
            continue;
        }
        $product = $item->get_product();
        $courses = get_post_meta($product->get_id(), 'courses', true);

        if (!empty($courses)) {
            $courses = explode(',', $courses);

            foreach ($courses as $course) {
                $id_courses[] = $course;

            }
        }

    }

    if (!empty($id_courses)) {
        $id_courses = array_merge($user_courses, $id_courses);
		$id_courses = array_unique($id_courses);
        update_user_meta($user_id, 'stm_courses', $id_courses);
    }

}


add_shortcode('quarterly_annual', 'quarterly_annual');


function quarterly_annual()
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array('monthly' ,'quarterly', 'annual'),
            ),
        ),
    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product annual-product">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $classTitle = strtolower($title);
            $title = ucfirst($title);
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $regular_price = get_post_meta($id, '_regular_price', true);
            $sale_price = get_post_meta($id, '_sale_price', true);
            $price = get_post_meta($id, '_price', true);
            $count++;

            $sale_price_all = '';
            if (!empty($sale_price)) {
                $sale_price_all = 'save $' . ($regular_price - $sale_price);
            } else {
                $sale_price_all = '';
            }

            $categories = get_the_terms($id, 'product_cat');
            $class = '';
            if ($categories && !is_wp_error($categories)) {
                // Получаем первую категорию (если есть)
                $category = current($categories);
                $class .= $category->name;
            }

//      <span>{$sale_price_all}</span>
            if ($class === 'annual') {
                $urlImage = '/wp-content/themes/wavytrades/assets/image/minLogo.svg';
            } else {
                $urlImage = '/wp-content/themes/wavytrades/assets/image/minLogo.svg';
            }

            $output .= " <div class='annual_item  $classTitle' >
                 <div class='annual_header'>
           
                    <div class='annual_icon'><img src='{$urlImage}' alt='' width='35px'></div>
                     <div class='annual_title'>
                        <span class='annual-span'>{$title}</span> <span>\${$price}</span>
                    </div>
                 </div>
                 <div class='annual_inner'>
                   
                    <div class='annual-description stm-description'>
                        {$desc}
                    </div>
                    <div class='btns_two annual_btn'>
                        <a href='?add-to-cart={$id}'>
                            sign up now
                        </a>
                    </div>
                </div>
            </div>";
        }

        $output .= '</div>';
    } else {
        $output .= '<div class="fe-query-results-shortcode-output-none">No results were found</div>';
    }

    wp_reset_postdata();
    return $output;
}

function my_theme_modify_stripe_fields_styles($styles)
{

	return array(
        'base' => array(
            'color' => '#fff',
            'fontSize' => '15px',
            '::placeholder' => array(
                'color' => '#fff',
            ),
			':-webkit-autofill' => array(
				'-webkit-text-fill-color' => '#fff',
				'color' => '#fff',
			),
        ),
    );
}

add_filter('wc_stripe_elements_styling', 'my_theme_modify_stripe_fields_styles', 70);



// Отправка письма с подтверждением заказа для загружаемых товаров
add_action('woocommerce_order_status_completed', 'send_order_confirmation_email', 10, 1);
function send_order_confirmation_email($order_id)
{
    $order = wc_get_order($order_id);

    // Проверяем, что заказ содержит загружаемые товары
    $has_downloadable_products = false;
    foreach ($order->get_items() as $item) {
        if ($item->is_type('line_item') && $item->get_product()->is_downloadable()) {
            $has_downloadable_products = true;
            break;
        }
    }

    // Если заказ содержит загружаемые товары, отправляем письмо с подтверждением заказа
    if ($has_downloadable_products) {
        $order->update_status('completed'); // Устанавливаем статус заказа в "Завершен"
        $order->add_order_note('Order confirmation email sent for downloadable products.'); // Опционально: добавляем примечание к заказу

        // Отправляем письмо с подтверждением заказа
        $mailer = WC()->mailer();
        $email = $mailer->get_emails()['WC_Email_Customer_Completed_Order'];
        $email->trigger($order_id);
    }
}


function redirect_without_subscription()
{
    if (current_user_can('administrator') || current_user_can('custom_admin')) {
        return;
    }
    $user_id = get_current_user_id();
    $stm_active_sub = stm_user_active_subscriptions(false, $user_id);

//    if (empty($stm_active_sub['plan_name'])) {
//        if (is_page([976, 450, 738, 735])) {
//            wp_redirect('/money-room');
//        }
//        $pos = strripos(get_permalink(get_the_ID()), 'courses');
//        if ($pos) {
//            wp_redirect('/money-room');
//        }
//    }

}

add_action('template_redirect', 'redirect_without_subscription');



// делает редирект после верфикации аккаунта email
add_action('alg_wc_ev_user_account_activated', function ($user_id, $args) {

    $orders = get_posts(array(
        'post_type'   => 'shop_order',
        'numberposts' => 1,
        'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'),
        'meta_query'  => array(
            array(
                'key'   => '_customer_user',
                'value' => $user_id,
            ),
        ),
    ));

    if (empty($orders)) {
        // Пользователь имеет пустой woo order, перенаправляем его на нужную страницу
        wp_redirect('/money-room/?add-to-cart=573'); // Замените ссылку на нужную страницу
        exit;
    } else {
        wp_redirect('/dashboard/classes/'); // Замените ссылку на нужную страницу
        exit;
    }



}, 11, 2);



// Получаем текущего пользователя
$current_user = wp_get_current_user();

function create_custom_role() {
	$role_exists = get_role('custom_admin');

	if (!$role_exists) {
		// Получаем разрешения администратора
		$admin_capabilities = get_role('administrator')->capabilities;

		// Создаем новую роль с разрешениями администратора, но без возможности удаления и изменения администраторов
		add_role('custom_admin', 'Custom Admin', $admin_capabilities);
	}
}

// Добавляем новую роль при активации темы или плагина
add_action('init', 'create_custom_role');


add_action('pre_get_users', 'exclude_admins_for_custom_admin');

function exclude_admins_for_custom_admin($query) {
	// Проверяем, является ли текущий пользователь пользователем с пользовательской ролью 'custom_admin'
	if (current_user_can('custom_admin')) {
		// Исключаем администраторов из списка пользователей
		$query->query_vars['role__not_in'] = ['administrator'];
	}
}


add_action('admin_menu', 'hide_settings_menu_for_custom_admin', 999);

function hide_settings_menu_for_custom_admin() {
	// Проверяем, является ли текущий пользователь пользователем с пользовательской ролью 'custom_admin'
	if (current_user_can('custom_admin')) {
		// Удаляем меню "Настройки"
		remove_menu_page('options-general.php');
		// Удаляем меню "Внешний вид"
		remove_menu_page('themes.php');
		// Удаляем меню "Плагины"
		remove_menu_page('plugins.php');
		// Удаляем меню "Шаблоны"
		remove_menu_page('edit.php');
		// Удаляем меню "Инструменты"
		remove_menu_page('tools.php');
		// Указываем идентификатор страницы настроек Subscripto
		$parent_slug = 'edit.php?post_type=rp_sub_subscription'; // Используйте фактический идентификатор родительской страницы
		$menu_slug = 'rp_sub_settings'; // Используйте фактический идентификатор подстраницы
		// Удаляем меню "Настройки" Subscripto
		remove_submenu_page($parent_slug, $menu_slug);
		// Указываем идентификатор страницы настроек WooCommerce
		$menu_slug = 'woocommerce';
		// Удаляем меню настроек WooCommerce и его подменю
		remove_menu_page('wc-settings');
		remove_submenu_page($menu_slug, 'wc-settings');
		remove_menu_page('mailchimp-for-wp');
		remove_menu_page('wp-mail-smtp');
		remove_submenu_page('wp-mail-smtp','wp-mail-smtp');
		remove_menu_page('ai1wm_export');

	}

}

function add_custom_admin_body_class($classes) {
	// Check if the current user has the 'custom_admin' role
	if (current_user_can('custom_admin')) {
		// Add your custom class to the body classes array
		$classes .= ' custom-admin';
	}
	return $classes;
}

add_filter('admin_body_class', 'add_custom_admin_body_class');


function custom_change_order_status($order_id) {
	// Получаем объект заказа
	$order = wc_get_order($order_id);

	// Меняем статус на "Completed"
	$order->update_status('completed');
}

add_action('woocommerce_payment_complete', 'custom_change_order_status');


add_filter('woocommerce_coupon_message', 'filter_woocommerce_coupon_message_reload', 10, 3);

function filter_woocommerce_coupon_message_reload($msg, $msg_code, $coupon) {
	if ($msg === __('Coupon code applied successfully.', 'woocommerce')) {
		echo '<script>window.location.reload();</script>';
	}

	return $msg;
}
