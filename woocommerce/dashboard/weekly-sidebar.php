<?php

$obj_id = get_queried_object_id();
$current_url = get_permalink($obj_id);
if (strpos($current_url, 'archive')) {
    $weeklyWatchlist = 'is-active';
} else {
    $active = 'is-active';
}

?>


<nav class="dashboard__nav-secondary dashboard__nav--stm ">
    <ul>
        <!--        <li class=" ">-->
        <!--            <a class="" href="/dashboard/options/" style="" onclick="return true;" target="">-->
        <!--                <span class="dashboard__nav-item-icon st-icon-dashboard"></span>-->
        <!--                <span class="dashboard__nav-item-text">Options Dashboard</span>-->
        <!--            </a>-->
        <!---->
        <!--        </li>-->
        <li class="<?php echo $active ?>">
            <a class="" href="/dashboard/ww/" style="" onclick="return true;" target="">
                <span class="dashboard__nav-item-icon st-icon-dashboard"></span>
                <span class="dashboard__nav-item-text">Weekly Watchlist</span>
            </a>
        </li>

        <li class="<?php echo $weeklyWatchlist ?>">
            <a class="" href="/dashboard/watchlist-rundown-archive/" style="" onclick="return true;" target="">
                <span class="dashboard__nav-item-icon st-icon-chatroom-archive"></span>
                <span class="dashboard__nav-item-text">Weekly Watchlist Archive</span>
            </a>

        </li>
        <!--        <li class=" has-submenu">-->
        <!--            <a class="" href="#" style="cursor: default;" onclick="return false;" target="">-->
        <!--                <span class="dashboard__nav-item-icon st-icon-forum"></span>-->
        <!--                <span class="dashboard__nav-item-text">Meet the Traders</span>-->
        <!--            </a>-->
        <!---->
        <!--            <ul class="dashboard__nav-submenu">-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/john-carter" target="">-->
        <!--                        John Carter                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/henry-gambell" target="">-->
        <!--                        Henry Gambell                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/taylor-horton" target="">-->
        <!--                        Taylor Horton                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/bruce-marshall" target="">-->
        <!--                        Bruce Marshall                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/danielle-shay" target="">-->
        <!--                        Danielle Shay                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/allison-ostrander" target="">-->
        <!--                        Allison Ostrander                                                      </a>-->
        <!--                </li>-->
        <!--                <li class="">-->
        <!--                    <a href="/dashboard/options/sam-shames" target="">-->
        <!--                        Sam Shames                                                      </a>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--        </li>-->
        <!--        <li class=" ">-->
        <!--            <a class="" href="/dashboard/free-trading-room/" style="" onclick="return true;" target="">-->
        <!--                <span class="dashboard__nav-item-icon st-icon-training-room"></span>-->
        <!--                <span class="dashboard__nav-item-text">Free Trading Room</span>-->
        <!--            </a>-->
        <!---->
        <!--        </li>-->
    </ul>


</nav>
