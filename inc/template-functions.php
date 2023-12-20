<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wavyTrades
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wavytrades_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wavytrades_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wavytrades_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wavytrades_pingback_header' );
function tp_stop_guests( $content ) {
    global $post;
$stm_user_active_subscriptions = stm_user_active_subscriptions(false, get_current_user_id());
$admin = current_user_can('administrator');
$custom_admin = current_user_can('custom_admin');



    if ( $post->post_type == 'daily_videos' ) {

        if ( !empty($stm_user_active_subscriptions['plan_name']) || !empty($admin  ) || !empty( $custom_admin ) ){

        }else{
			wp_redirect(home_url());
			 exit;
        }
    }

    return $content;
}

add_filter( 'the_content', 'tp_stop_guests' );
