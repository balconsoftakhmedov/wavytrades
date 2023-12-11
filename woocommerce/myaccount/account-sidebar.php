<?php
$current_user = wp_get_current_user();

$theAuthorId = get_the_author_meta('ID');
$getUserUrl = get_avatar_url($theAuthorId);
global $wp;
$hstyle = '100vh';

$obj_id = get_queried_object_id();
$current_url = get_permalink($obj_id);

if (strpos($current_url, 'ww')) {
    $weeklyWatchlist = strpos($current_url, 'ww');
} elseif (strpos($current_url, 'option')) {
    $pos = strpos($current_url, 'option');
} elseif (strpos($current_url, 'account')) {
    $account = strpos($current_url, 'account');
}

$stm_user_active_subscriptions = stm_user_active_subscriptions(false, get_current_user_id());
$get_courses_id = get_user_meta(get_current_user_id(), 'stm_courses', true);


$admin = current_user_can('administrator');
$custom_admin = current_user_can('custom_admin');
?>

<nav class="dashboard__nav-primary is-collapsed" style="min-height: <?php echo $hstyle ?>">
    <ul>
        <li class="<?php echo empty($stm_user_active_subscriptions['plan_name']) && !$admin ? 'is-active' : '' ?>">

            <a href="/dashboard/account" class="dashboard__profile-nav-item">
        <span class="dashboard__profile-photo"
              style="background-image: url(<?php echo get_avatar_url($theAuthorId); ?>);"></span>
                <span class="dashboard__profile-name"><?php echo ucfirst($current_user->user_nicename) ?></span>
                <?php

                ?>
            </a>

        </li>
    </ul>
    <?php if (!empty($stm_user_active_subscriptions['plan_name']) || $admin || $custom_admin) {
        ?>
        <ul>
            <li>
            </li>
            <ul class="dash_main_links">
                <li class="">
                    <a href="/dashboard/" target="">
                        <span class="dashboard__nav-item-icon dashicons dashicons-admin-home"></span>
                        <span class="dashboard__nav-item-text">Member Dashboard</span>
                    </a>
                </li>
            </ul>
        </ul>
        <ul>
            <li>
                <p class="dashboard__nav-category">memberships</p>
            </li>
            <ul class="dash_main_links">
                <li class="<?php echo $pos ? 'is-active' : '' ?>">
                    <a href="/dashboard/options" target="">
                        <span class="dashboard__nav-item-icon st-icon-options"></span>
                        <span class="dashboard__nav-item-text">Option</span>
                    </a>
                </li>
            </ul>
        </ul>
        <ul>
            <li>
                <p class="dashboard__nav-category">mastery</p>
            </li>
        </ul>
        <ul style="display: none;">
            <li>
                <p class="dashboard__nav-category">premium reports</p>
            </li>
            <ul class="dash_main_links">
            </ul>
        </ul>
        <ul>
            <li>
                <p class="dashboard__nav-category">tools</p>
            </li>

        </ul>

        <ul>
            <li>
                <p class="dashboard__nav-category">News</p>
            </li>
            <ul class="dash_main_links">
                <li class="">
                    <a href="/news/" target="">
                        <span class="dashboard__nav-item-icon st-icon-indicators"></span>
                        <span class="dashboard__nav-item-text">News</span>
                    </a>
                </li>

            </ul>
        </ul>
        <ul>
            <li>
                <p class="dashboard__nav-category">Weekly Watchlist</p>
            </li>
            <ul class="dash_main_links">
                <li class="<?php echo $weeklyWatchlist ? 'is-active' : '' ?>">
                    <a href="/dashboard/ww/" target="">
                        <span class="dashboard__nav-item-icon st-icon-trade-of-the-week"></span>
                        <span class="dashboard__nav-item-text">Weekly Watchlist</span>
                    </a>
                </li>
            </ul>
        </ul>
        <ul>
            <li>
                <p class="dashboard__nav-category">Trading Education</p>
            </li>
            <ul class="dash_main_links">
                <li class="">
                    <a href="/trading-education/" target="">
                        <span class="dashboard__nav-item-icon st-icon-training-room" style="font-size: 23px"></span>
                        <span class="dashboard__nav-item-text">Trading Education</span>
                    </a>
                </li>

            </ul>
        </ul>
    <?php } ?>
    <?php if (!empty($get_courses_id)) { ?>

    <ul>
        <li>
            <p class="dashboard__nav-category">account</p>
        </li>
        <ul class="dash_main_links">
            <li class="<?php echo $account ? 'is-active' : '' ?>">
                <a href="/dashboard/account/" target="">
                    <span class="dashboard__nav-item-icon st-icon-settings"></span>
                    <span class="dashboard__nav-item-text">My Account</span>
                </a>
            </li>


            <li class="">
                <a href="/dashboard/account/classes" target="">
                    <span class="dashboard__nav-item-icon st-icon-courses "></span>
                    <span class="dashboard__nav-item-text">Courses</span>
                </a>
            </li>


        </ul>
    </ul>
    <?php } ?>
</nav>
