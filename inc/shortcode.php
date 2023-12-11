<?php


/** Shortcode show featured-indicators */
add_shortcode('indicators_featured', 'product_indicators');
function product_indicators($atts)
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'posts_per_page' => 3,
        'product_cat' => 'featured-indicators',

    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product_courses">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $backg = get_the_post_thumbnail();
            $price = get_post_meta($id, '_regular_price', true);
            $priceSale = get_post_meta($id, '_sale_price', true);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
            $currentPrice = $priceSale ? $priceSale : $price;
            $slaePrice = $priceSale ? $price : $priceSale;
            $amount = $slaePrice ? '$' : '';

            $output .= " <div class='grid_item_courses' >
                            <a href='$link' class='img_curs_link'>
                                <img src='{$image[0]}' data-id='{$id}' alt=''>
                            </a>
                         <div class='stm_product_courses_info'>
                            <div class='stm_description_courses'>
                             {$desc}
                            </div>
                              <div class='product_info_p'>
                                <a class='product_button' href='{$link}'>Read More</a>
                                <div class='product_price'>    
                                 <span style='text-decoration: line-through; font-size: 15px; font-weight: 400;'> $amount$slaePrice</span>   
                                 <span style='font-size: 19px; line-height: 1.15;font-weight: 700;' > $$currentPrice</span>
                                 </div>
                              </div>
                            </div>
                        </div>
                        ";
        }
        $output .= '</div>';
    } else {
        $output .= '<div style="padding: 10px">No results were found</div>';
    }

    wp_reset_postdata();
    return $output;
}


/** Shortcode show product popular-indicators */
add_shortcode('indicators_popular', 'product_curs');
function product_curs($atts)
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'posts_per_page' => 3,
        'product_cat' => 'popular-indicators',

    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product_courses">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $backg = get_the_post_thumbnail();
            $price = get_post_meta($id, '_regular_price', true);
            $priceSale = get_post_meta($id, '_sale_price', true);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
            $currentPrice = $priceSale ? $priceSale : $price;
            $slaePrice = $priceSale ? $price : $priceSale;
            $amount = $slaePrice ? '$' : '';

            $output .= " <div class='grid_item_courses' >
                            <a href='$link' class='img_curs_link'>
                                <img src='{$image[0]}' data-id='{$id}' alt=''>
                            </a>
                         <div class='stm_product_courses_info'>
                            <div class='stm_description_courses'>
                             {$desc}
                            </div>
                              <div class='product_info_p'>
                                <a class='product_button' href='{$link}'>Read More</a>
                                <div class='product_price'>    
                                 <span style='text-decoration: line-through; font-size: 15px; font-weight: 400;'> $amount$slaePrice</span>   
                                 <span style='font-size: 19px; line-height: 1.15;font-weight: 700;' > $$currentPrice</span>
                                 </div>
                              </div>
                            </div>
                        </div>
                        ";
        }
        $output .= '</div>';
    } else {
        $output .= '<div style="padding: 10px">No results were found</div>';
    }

    wp_reset_postdata();
    return $output;
}


/** Shortcode show product popular-indicators */
add_shortcode('courses_popular', 'courses_popular');
function courses_popular($atts)
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'posts_per_page' => 3,
        'product_cat' => 'popular-courses',

    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product_courses">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $backg = get_the_post_thumbnail();
            $price = get_post_meta($id, '_regular_price', true);
            $priceSale = get_post_meta($id, '_sale_price', true);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
            $currentPrice = $priceSale ? $priceSale : $price;
            $slaePrice = $priceSale ? $price : $priceSale;
            $amount = $slaePrice ? '$' : '';

            $output .= " <div class='grid_item_courses' >
                            <a href='$link' class='img_curs_link'>
                                <img src='{$image[0]}' data-id='{$id}' alt=''>
                            </a>
                         <div class='stm_product_courses_info'>
                            <div class='stm_description_courses'>
                             {$desc}
                            </div>
                              <div class='product_info_p'>
                                <a class='product_button' href='{$link}'>Read More</a>
                                <div class='product_price'>    
                                 <span style='text-decoration: line-through; font-size: 15px; font-weight: 400;'> $amount$slaePrice</span>   
                                 <span style='font-size: 19px; line-height: 1.15;font-weight: 700;' > $$currentPrice</span>
                                 </div>
                              </div>
                            </div>
                        </div>
                        ";
        }
        $output .= '</div>';
    } else {
        $output .= '<div style="padding: 10px">No results were found</div>';
    }

    wp_reset_postdata();
    return $output;
}


/** Shortcode show product popular-indicators */
add_shortcode('courses_featured', 'courses_featured');
function courses_featured($atts)
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'posts_per_page' => 3,
        'product_cat' => 'featured-courses',

    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product_courses">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $backg = get_the_post_thumbnail();
            $price = get_post_meta($id, '_regular_price', true);
            $priceSale = get_post_meta($id, '_sale_price', true);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
            $currentPrice = $priceSale ? $priceSale : $price;
            $slaePrice = $priceSale ? $price : $priceSale;
            $amount = $slaePrice ? '$' : '';

            $output .= " <div class='grid_item_courses' >
                            <a href='$link' class='img_curs_link'>
                                <img src='{$image[0]}' data-id='{$id}' alt=''>
                            </a>
                         <div class='stm_product_courses_info'>
                            <div class='stm_description_courses'>
                             {$desc}
                            </div>
                              <div class='product_info_p'>
                                <a class='product_button' href='{$link}'>Read More</a>
                                <div class='product_price'>    
                                 <span style='text-decoration: line-through; font-size: 15px; font-weight: 400;'> $amount$slaePrice</span>   
                                 <span style='font-size: 19px; line-height: 1.15;font-weight: 700;' > $$currentPrice</span>
                                 </div>
                              </div>
                            </div>
                        </div>
                        ";
        }
        $output .= '</div>';
    } else {
        $output .= '<div style="padding: 10px">No results were found</div>';
    }

    wp_reset_postdata();
    return $output;
}

/** Shortcode show subscriptions product*/
add_shortcode('foobar', 'foobar_func');
function foobar_func($atts)
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'product_cat' => 'subscriptions',

    );
    $fe_query = new WP_Query($args);
    if ($fe_query->have_posts()) {
        $output .= '<div class="stm-product">';
        $count = 0;
        while ($fe_query->have_posts()) {
            $fe_query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $desc = get_the_excerpt();
            $id = get_the_ID();
            $backg = '#f4f4f4';
            $count++;
            if ($count & 1) {
                $backg = '#e6e6e6';
            }
            if ($count == 3) {
                $backg = '#f4f4f4';
            } elseif ($count === 4) {
                $backg = '#e6e6e6';
            }

            $output .= " <div class='grid_item' style='background: {$backg} '>
                        <div class='stm_title'>
                         {$title}
                        </div>
                        <div class='stm-description'>
                         {$desc}
                        </div>
                        <div class='btns_two'>
                          
                             <a href='?add-to-cart={$id}'>
                                START A TRIAL FOR $7
                            </a>
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


/** Shortcode show new_form_sign_in*/
add_shortcode('woocommerce_signin', 'new_form_sign_in');
function new_form_sign_in()
{
    if (file_exists(get_template_directory() . '/sign_in.php')) {
        load_template(get_template_directory() . '/sign_in.php');
    } else {
        echo 'Файл register.php не существует';
    }
}


/** Shortcode show new_form_register*/
add_shortcode('woocommerce_register', 'new_form_register');
function new_form_register()
{
    if (file_exists(get_template_directory() . '/register.php')) {
        load_template(get_template_directory() . '/register.php');
    } else {
        echo 'Файл register.php не существует';
    }
}


/* Custom Post Type Start */

function create_posttype()
{
    register_post_type('daily_videos',
// CPT Options

        array(
            'labels' => array(
                'name' => __('Daily Videos'),
                'singular_name' => __('Daily Videos')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'daily-videos'),
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype');

/* Custom Post Type End */


/*Custom Post type start*/
function cw_post_type_news()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Daily Videos', 'plural'),
        'singular_name' => _x('Daily Videos', 'singular'),
        'menu_name' => _x('Daily Videos', 'admin menu'),
        'name_admin_bar' => _x('daily_videos', 'admin bar'),
        'add_new' => _x('Add New', 'Daily Videos'),
        'add_new_item' => __('Add New Daily Videos'),
        'new_item' => __('New Daily Videos'),
        'edit_item' => __('Edit Daily Videos'),
        'view_item' => __('View Daily Videos'),
        'all_items' => __('All Daily Videos'),
        'search_items' => __('Search Daily Videos'),
        'not_found' => __('No Daily Videos found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'daily_videos'),
        'has_archive' => true,
        'hierarchical' => false,
        'show_in_rest' => true
    );
    register_post_type('daily_videos', $args);
}

add_action('init', 'cw_post_type_news');
/*Custom Post type end*/


/* Custom Post Type Start */

function create_posttype_weekly()
{
    register_post_type('weekly_videos',
// CPT Options

        array(
            'labels' => array(
                'name' => __('Weekly Videos'),
                'singular_name' => __('Weekly Videos')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'weekly-videos'),
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype_weekly');

/* Custom Post Type End */

/*Custom Post type start*/
function cw_post_type_weekly()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Weekly Videos', 'plural'),
        'singular_name' => _x('Weekly Videos', 'singular'),
        'menu_name' => _x('Weekly Videos', 'admin menu'),
        'name_admin_bar' => _x('daily_videos', 'admin bar'),
        'add_new' => _x('Add New', 'Weekly Videos'),
        'add_new_item' => __('Add New Weekly Videos'),
        'new_item' => __('New Weekly Videos'),
        'edit_item' => __('Edit Weekly Videos'),
        'view_item' => __('View Weekly Videos'),
        'all_items' => __('All Weekly Videos'),
        'search_items' => __('Search Weekly Videos'),
        'not_found' => __('No Weekly Videos found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'weekly-videos'),
        'has_archive' => true,
        'hierarchical' => false,
        'show_in_rest' => true
    );
    register_post_type('weekly_videos', $args);
}

add_action('init', 'cw_post_type_weekly');
/*Custom Post type end*/


add_action('widgets_init', 'ci_register_sidebar');

function ci_register_sidebar()
{
    register_sidebar(array(
        'name' => 'shop-stm',
        'id' => 'your-sidebar-id',
        'description' => 'My sidebar description',
        'before_widget' => '<aside id="%1$s" class="widget group %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}


add_filter('woocommerce_catalog_orderby', function ($arr) {
    return $arr[] = array(
        'menu_order' => __('Sort by', 'woocommerce'),
        'popularity' => __('Popularity', 'woocommerce'),
        'rating' => __('Average rating', 'woocommerce'),
        'date' => __('Latest', 'woocommerce'),
        'price' => __('Price: low to high', 'woocommerce'),
        'price-desc' => __('Price: high to low', 'woocommerce'),
    );
});


add_filter('get_search_form', function ($form) {
    return '
			<form action="/" data-ajax_url="/wp-admin/admin-ajax.php" method="get" class="input-group flex-nowrap free_cont_search">
                <button class="btn btn-link" type="button" id="search_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg>
                </button>
                <input type="text" name="s" class="form-control" id="search" aria-label="Search" aria-describedby="search_btn" placeholder="Search" value="' . get_search_query() . '">
                <input type="hidden" name="cat_name" class="form-control" value="' . get_search_query() . '">
            </form>';
});


/*Custom Post type start*/
function cw_post_type_courses()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Courses', 'plural'),
        'singular_name' => _x('Courses', 'singular'),
        'menu_name' => _x('Courses', 'admin menu'),
        'name_admin_bar' => _x('Courses', 'admin bar'),
        'add_new' => _x('Add New', 'Courses'),
        'add_new_item' => __('Add New Courses'),
        'new_item' => __('New Courses'),
        'edit_item' => __('Edit Courses'),
        'view_item' => __('View Courses'),
        'all_items' => __('All Courses'),
        'search_items' => __('Search Courses'),
        'not_found' => __('No Courses found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'courses'),
        'has_archive' => true,
        'hierarchical' => false,
        'show_in_rest' => true,
        'taxonomies' => array('custom_taxonomy'),
        'menu_icon' => 'dashicons-format-video',

    );
    register_post_type('courses', $args);
}

add_action('init', 'cw_post_type_courses');
/*Custom Post type end*/


function custom_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Categories',
            'singular_name' => 'Categories',
        ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'cat'),
    );
    register_taxonomy('custom_taxonomy', 'courses', $args);
}

add_action('init', 'custom_taxonomy');


