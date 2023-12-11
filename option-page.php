<?php /** Template Name: Option Page */
get_header();
?>
	<div class="dashboard">
		<div class="dashboard__sidebar">
			<?php require_once 'woocommerce/myaccount/account-sidebar.php' ?>
			<?php require_once 'woocommerce/dashboard/option-sidebar.php' ?>
		</div>
		<main class="dashboard__main">

			<header class="dashboard__header">
				<div class="dashboard__header-left">
					<h1 class="dashboard__page-title">Options Dashboard</h1>
					<a href="<?php echo do_shortcode("[protradingroom room='63232489ba43522695a27aaa' key='F7167611-D09C-4C37-820A-2AA52C8F26A8' link_text='Enter Room' mode='urlv3']") ?>"
					   target="_blank" class="btn btn-xs btn-default">New? Start Here</a>
				</div>
				<div class="dashboard__header-right">
					<a href=""
					   target="_blank" class="btn btn-xs btn-link">Trading Room Rules</a>
					<div class="dropdown display-inline-block">
						<a href="<?php echo do_shortcode("[protradingroom room='63232489ba43522695a27aaa' key='F7167611-D09C-4C37-820A-2AA52C8F26A8' link_text='Enter Room' mode='urlv3']") ?>"
						   target="_blank" class="btn btn-xs btn-orange btn-tradingroom dropdown-toggle" id="dLabel"
						   data-bs-toggle="dropdown" aria-expanded="false">
							<strong>Enter a Trading Room</strong>
						</a>
					</div>
				</div>
			</header>


			<div class="dashboard__content ">
				<div class="dashboard__content-main">
					<section class="dashboard__content-section">
						<h2 class="section-title">Options Premium Daily Videos</h2>
						<div class="dashboard-filters">
							<div class="dashboard-filters__count">
								<!--                                Showing-->
								<!--                                <div class="facetwp-counts">-->
								<!--                                    --><?php //echo 12  ?>
								<!--                                    1-12 of 1296</div>-->
							</div>
							<div class="dashboard-filters__search">
								<!-- Check if is Training Room -->
								<div class="facetwp-facet facetwp-facet-better_search facetwp-type-autocomplete"
									 data-name="better_search" data-type="autocomplete">
									<form class="d-flex" role="search" method="get" id="searchform"
										  action="<?php echo home_url('/') ?>">
										<input type="text"
											   class="facetwp-autocomplete fcomplete-enabled"
											   value=""
											   name="s"
											   placeholder="Search"
											   autocomplete="off">
										<div class="fcomplete-wrap hidden" style="min-width: 230.889px;">
											<div class="fcomplete-status"></div>
											<div class="fcomplete-results"></div>
										</div>
										<input type="button" class="facetwp-autocomplete-update" value="🔍">
								</div>
								<input type="hidden" value="daily_videos" name="post_type"/>
								</form>
							</div>
						</div>
						<div class="facetwp-template mt-5 ">
							<div class="card-grid flex-grid row">
								<!--fwp-loop-->
								<?php
								$postsPerPage = 1;
								$args = array(
									'post_type' => 'daily_videos',
									'posts_per_page' => 3,
									'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
//                        		    'category_name' => 'blog',
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
													<img src="https://placehold.it/325x183" alt="More Mixed Signals">
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
