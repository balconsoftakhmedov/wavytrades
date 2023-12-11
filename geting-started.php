<?php /** Template Name: Getting Started */

$user = wp_get_current_user();
if (empty($user->roles)) {
    wp_redirect('/dashboard/');
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
                        <div class="stm-getting-started">
                            <div class="fl-col-content fl-node-content">
                                <div class="fl-module fl-module-heading fl-node-61560b1a3373e"
                                     data-node="61560b1a3373e">
                                    <div class="fl-module-content fl-node-content">
                                        <h2 class="fl-heading">
                                            <span class="fl-heading-text">Getting Started</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="fl-module fl-module-rich-text fl-node-61560b1a3373f"
                                     data-node="61560b1a3373f">
                                    <div class="fl-module-content fl-node-content">
                                        <div class="fl-rich-text">
                                            <p>Welcome to your Simpler Weekly Watchlist! Part of our routine as traders
                                                is curating, managing, and updating our watchlists. This can be a
                                                challenging and tedious task for both new and experienced traders alike.
                                                It’s hard to know what to look for and where to find solid information
                                                that you can trust.</p>
                                            <p>Our Weekly Watchlist takes the guesswork out of this for you and will
                                                help you build confidence around the tickers you follow each week.</p>
                                            <p>So, how exactly do we do this?</p>
                                            <p>Each week, you’ll hear from a different member of the Simpler Trading
                                                Team. They will walk through their process for building their own Weekly
                                                Watchlist and will show you exactly what they will be focusing on for
                                                that week.</p>
                                            <p>Their picks will be based on everything from their own analysis, our
                                                premium indicators, and tools such as the Simpler Trading Scanner.</p>
                                            <p>Essentially, you’re getting the best of all worlds between experienced
                                                Analysts and some of the most sophisticated tools in the industry.</p>
                                            <p><strong>Again, here is what you can expect:</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl-row-content-wrap">
                                    <div class="fl-row-content fl-row-fixed-width fl-node-content">

                                        <div class="fl-col-group fl-node-61560b1a33741 fl-col-group-equal-height fl-col-group-align-center fl-col-group-custom-width"
                                             data-node="61560b1a33741">
                                            <div class="fl-col fl-node-61560b1a33742 fl-col-small text-center"
                                                 data-node="61560b1a33742">
                                                <div class="fl-col-content fl-node-content">
                                                    <div class="fl-module fl-module-html fl-node-61560b1a33745"
                                                         data-node="61560b1a33745">
                                                        <div class="fl-module-content fl-node-content">
                                                            <div class="fl-html">
                                                                <div class="text-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="64.233" height="63.097"
                                                                         viewBox="0 0 64.233 63.097">
                                                                        <g id="Group_17073" data-name="Group 17073"
                                                                           transform="translate(0 0.379)">
                                                                            <path id="Path_22419" data-name="Path 22419"
                                                                                  d="M82.06,14.646h.919a2.529,2.529,0,0,0,2.529-2.529V2.529A2.529,2.529,0,0,0,82.979,0H82.06a2.529,2.529,0,0,0-2.529,2.529v9.588a2.529,2.529,0,0,0,2.529,2.529Zm0,0"
                                                                                  transform="translate(-66.363 -0.316)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22420" data-name="Path 22420"
                                                                                  d="M277.955,14.267h.919a2.529,2.529,0,0,0,2.528-2.529V2.149a2.528,2.528,0,0,0-2.528-2.528h-.919a2.528,2.528,0,0,0-2.529,2.528v9.589a2.529,2.529,0,0,0,2.529,2.529Zm0,0"
                                                                                  transform="translate(-229.825)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22421" data-name="Path 22421"
                                                                                  d="M60.123,31.035H53.633v7.578c0,2.528-2.057,3.922-4.584,3.922H48.13a4.59,4.59,0,0,1-4.584-4.584V31.035H21.2v6.978A4.59,4.59,0,0,1,16.615,42.6H15.7a4.59,4.59,0,0,1-4.584-4.584V31.035h-7A4.116,4.116,0,0,0,0,35.146V84.82a4.115,4.115,0,0,0,4.111,4.111H60.123a4.115,4.115,0,0,0,4.111-4.111V35.146a4.116,4.116,0,0,0-4.111-4.111Zm0,53.785H4.111V47.308H60.123l0,37.512Zm0,0"
                                                                                  transform="translate(0 -26.213)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22422" data-name="Path 22422"
                                                                                  d="M204.128,167.763h7.381a.529.529,0,0,0,.53-.53v-6.391a.53.53,0,0,0-.53-.53h-7.381a.53.53,0,0,0-.53.53v6.391a.529.529,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-169.889 -134.086)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22423" data-name="Path 22423"
                                                                                  d="M276.885,167.763h7.381a.53.53,0,0,0,.53-.53v-6.391a.53.53,0,0,0-.53-.53h-7.381a.53.53,0,0,0-.53.53v6.391a.53.53,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-230.6 -134.086)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22424" data-name="Path 22424"
                                                                                  d="M58.62,230.966H66a.53.53,0,0,0,.53-.53v-6.391a.529.529,0,0,0-.53-.53H58.62a.529.529,0,0,0-.53.53v6.391a.53.53,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-48.472 -186.825)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22425" data-name="Path 22425"
                                                                                  d="M131.374,230.966h7.381a.53.53,0,0,0,.53-.53v-6.391a.529.529,0,0,0-.53-.53h-7.381a.529.529,0,0,0-.53.53v6.391a.53.53,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-109.181 -186.825)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22426" data-name="Path 22426"
                                                                                  d="M204.128,230.966h7.381a.53.53,0,0,0,.53-.53v-6.391a.529.529,0,0,0-.53-.53h-7.381a.53.53,0,0,0-.53.53v6.391a.53.53,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-169.889 -186.825)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22427" data-name="Path 22427"
                                                                                  d="M276.885,230.966h7.381a.53.53,0,0,0,.53-.53v-6.391a.53.53,0,0,0-.53-.53h-7.381a.53.53,0,0,0-.53.53v6.391a.53.53,0,0,0,.53.53Zm0,0"
                                                                                  transform="translate(-230.6 -186.825)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22428" data-name="Path 22428"
                                                                                  d="M66,286.714H58.62a.53.53,0,0,0-.53.53v6.392a.53.53,0,0,0,.53.53H66a.53.53,0,0,0,.53-.53v-6.392a.53.53,0,0,0-.53-.53Zm0,0"
                                                                                  transform="translate(-48.472 -239.56)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22429" data-name="Path 22429"
                                                                                  d="M138.755,286.714h-7.381a.53.53,0,0,0-.53.53v6.392a.53.53,0,0,0,.53.53h7.381a.529.529,0,0,0,.53-.53v-6.392a.53.53,0,0,0-.53-.53Zm0,0"
                                                                                  transform="translate(-109.181 -239.56)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22430" data-name="Path 22430"
                                                                                  d="M211.512,286.714h-7.381a.53.53,0,0,0-.53.53v6.392a.529.529,0,0,0,.53.53h7.381a.53.53,0,0,0,.53-.53v-6.392a.53.53,0,0,0-.53-.53Zm0,0"
                                                                                  transform="translate(-169.892 -239.56)"
                                                                                  fill="#29abe1"></path>
                                                                            <path id="Path_22431" data-name="Path 22431"
                                                                                  d="M284.266,286.714h-7.381a.53.53,0,0,0-.53.53v6.392a.53.53,0,0,0,.53.53h7.381a.53.53,0,0,0,.53-.53v-6.392a.53.53,0,0,0-.53-.53Zm0,0"
                                                                                  transform="translate(-230.6 -239.56)"
                                                                                  fill="#29abe1"></path>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fl-col fl-node-61560b1a33743" data-node="61560b1a33743">
                                                <div class="fl-col-content fl-node-content">
                                                    <div class="fl-module fl-module-rich-text fl-node-61560b1a33744"
                                                         data-node="61560b1a33744">
                                                        <div class="fl-module-content fl-node-content">
                                                            <div class="fl-rich-text">
                                                                <p>Every Monday morning before the cash market opens
                                                                    (8:30 am central time), you’ll receive an email and
                                                                    push notification via our Simpler Trading Mobile App
                                                                    letting you know the new Weekly Watchlist has been
                                                                    posted.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl-row fl-row-full-width fl-row-bg-none fl-node-61560b1a33746" data-node="61560b1a33746">
                                    <div class="fl-row-content-wrap">
                                        <div class="fl-row-content fl-row-fixed-width fl-node-content">

                                            <div class="fl-col-group fl-node-61560b1a33747" data-node="61560b1a33747">
                                                <div class="fl-col fl-node-61560b1a33748" data-node="61560b1a33748">
                                                    <div class="fl-col-content fl-node-content">
                                                        <div class="fl-module fl-module-rich-text fl-node-61560b1a33749" data-node="61560b1a33749">
                                                            <div class="fl-module-content fl-node-content">
                                                                <div class="fl-rich-text">
                                                                    <p>You’ll come to the Weekly Watchlist page where you can watch the new video and/or, you can simply review the list of tickers on the spreadsheet.</p>
                                                                    <p><em>Couple of things to note:</em></p>
                                                                    <ul>
                                                                        <li style="margin-bottom: 20px;">If you’re not familiar with all of our Traders, we encourage you to review each of their bios to better understand their style and their methodology.</li>
                                                                        <li>While the main focus will be on Stocks, Indices, and ETFs, you may also hear analysis on Futures and Currencies.</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
<?php

get_footer();
