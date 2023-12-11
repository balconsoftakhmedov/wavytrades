<?php /** Template Name: Weekly Watchlist */
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

						<div class="stm-grid-custom two">
							<div class="stm-item"
								 style="background: center / cover no-repeat  url(/wp-content/themes/wavytrades/assets/image/getting.png)">
								<div class="stm-item-header">Get Started</div>
								<p class="stm-item-body">
									Learn how to best use the Weekly Watchlist and get the most out of it.
								</p>
								<div class="stm-item-footer mb-3">
									<a class="btn btn-tiny btn-default btn--stm" href="/dashboard/ww/getting-started/">Check
										It Out</a>
								</div>
							</div>
							<div class="stm-item"
								 style="background: center / cover no-repeat  url(/wp-content/themes/wavytrades/assets/image/weeklybg.png)">
								<div class="stm-item-header card_title_3">Weekly Watchlist</div>
								<p class="stm-item-body">
									Get the complete Watchlist of the Week in a downloadable format.
								</p>
								<div class="stm-item-footer mb-3">
									<a class="btn btn-tiny btn-default btn--stm"
									   href="/dashboard/watchlist-rundown-archive/">Check It Out</a>
								</div>
							</div>
						</div>


						<h2 class="section-title mb-1 mt-5">Watchlist Rundown Archive</h2>
						<div class="dashboard-filters">
							<div class="dashboard-filters__count">
								<!--                                Showing-->
								<!--                                <div class="facetwp-counts">-->
								<!--                                    --><?php //echo 12  ?>
								<!--                                    1-12 of 1296</div>-->
							</div>

						</div>
						<div class="facetwp-template mt-5 ">
							<div class="card-grid flex-grid row">
								<!--fwp-loop-->
								<?php
								$postsPerPage = 1;
								$args = array(
									'post_type' => 'weekly_videos',
									'posts_per_page' => 3,
									'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
//                            'category_name' => 'blog',
								);

								$loop = new WP_Query($args);

								while ($loop->have_posts()) : $loop->the_post();
									?>
									<article
											class="card-grid-spacer card-grid-spacer--stm flex-grid-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
										<div class="card flex-grid-panel flex-grid-stm">
											<figure class="card-media card-media--video">
												<a href="<?php echo get_the_permalink() ?>"
												   class="card-image"
												   style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/themes/wavytrades/assets/image/place.jpg' ?>);">
													<img src="https://placehold.it/325x183"
														 alt="More Mixed Signals">
												</a>
											</figure>
											<section class="card-body">
												<h4 class="h5 card-title card-title--stm">
													<a href="<?php echo get_the_permalink() ?>">
														<?php echo get_the_title() ?> </a>
												</h4>
												<span class="article-card__meta card-description--stm"><small><?php echo get_the_date(); ?> with <?php the_author() ?></small></span><br>

												<div class="card-description card-description--stm ">
													<div class="u--hide-read-more u--squash">
														<?php echo get_the_excerpt() ?>
													</div>
												</div>
											</section>
											<span class="card-footer">
                                        <a class="btn btn-tiny btn-default"
										   href="<?php echo get_the_permalink() ?>">Watch
                                            Now</a>
                                    </span>
										</div>
									</article>
								<?php
								endwhile;

								?>
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

						</div>
					</section>
				</div>
			</div>
		</main>
	</div>
<?php

get_footer();
