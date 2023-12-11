<?php /** Template Name: Indicators */
$get_courses_id = get_user_meta(get_current_user_id(), 'stm_courses', true);

get_header();
?>

	<div class="dashboard">
		<?php require_once 'woocommerce/dashboard/dashboard-sidebar.php' ?>
		<main class="dashboard__main ">
			<header class="dashboard__header">
				<div class="dashboard__header-left">
					<h1 class="dashboard__page-title">Member Dashboard</h1>
				</div>
				<div class="dashboard__header-right">
					<!--                <a href="https://cdn.simplertrading.com/2021/10/06121512/SimplerTrading-Rules-of-the-Room.pdf"-->
					<!--                   target="_blank" class="btn btn-xs btn-link">Trading Room Rules</a>-->
					<div class="dropdown display-inline-block">
						<!--                    <a href="#" class="btn btn-xs btn-orange btn-tradingroom dropdown-toggle" id="dLabel"-->
						<!--                       data-bs-toggle="dropdown" aria-expanded="false">-->
						<!--                        <strong>Enter a Trading Room</strong>-->
						<!--                    </a>-->
						<nav class="dropdown-menu dropdown-menu--full-width" aria-labelledby="dLabel">
							<ul class="dropdown-menu__menu">
								<li>
									<a href=""
									   target="_blank" rel="nofollow"><span
											class="st-icon-options icon icon--md"></span>
										Options Trading Room</a></li>
								<li>
									<a href=""
									   target="_blank" rel="nofollow"><span class="st-icon-moxie icon icon--md"></span>
										Moxie Indicator™ Mastery Room</a></li>
								<li>
									<a href=""
									   target="_blank" rel="nofollow"><span
											class="st-icon-consistent-growth icon icon--md"></span> Compounding
										Growth
										Room</a></li>
								<li>
									<a href=""
									   target="_blank" rel="nofollow"><span
											class="st-icon-chart-patterns icon icon--md mx-2"></span> Chart Patterns
										Mastery</a></li>
								<li><a data-user="37192" class="free_trading_room"
									   href=""
									   target="_blank" rel="nofollow"><span
											class="st-icon-training-room icon icon--sm"></span> Free Trading
										Room</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="dashboard__content ">
				<div class="dashboard__content-main">


					<section class="dashboard__content-section">

						<div class="dashboard-filters">
							<div class="dashboard-filters__count">
								<!--                                Showing-->
								<!--                                <div class="facetwp-counts">-->
								<!--                                    --><?php //echo 12  ?>
								<!--                                    1-12 of 1296</div>-->
							</div>

						</div>
						<?php if (!empty($get_courses_id)) {
							?>

							<div class="facetwp-template mt-2 ">
								<div class="fl-post-grid-post">
									<!--fwp-loop-->
									<?php
									$postsPerPage = 1;
									$args = array(
										'post_type' => 'courses',
										'posts_per_page' => -1,
										'post__in' => $get_courses_id,
										'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
										'tax_query' => array(
											array(
												'taxonomy' => 'custom_taxonomy',
												'field' => 'slug', // Указывает, что вы используете ярлык (slug) категории
												'terms' => 'indicator', // Слаг (ярлык) категории, которую вы хотите отобразить
											),
										),

									);

									$loop = new WP_Query($args);

									while ($loop->have_posts()) : $loop->the_post();
										?>

										<div class="card card--stm fl-post-text">
											<div class="">
												<section class="card-body u--squash">
													<h4 class="h5 card-title"
														style="font-size: 24px; margin-bottom: 0;"><?php echo the_title() ?></h4>
													<div class="excerpt" style="font-size: 16px;">
														<i><?php echo get_the_date('F Y'); ?>
															With <?php echo get_the_author() ?></i>
													</div>
													<div class="fl-post-more-link">
														<a class="btn btn-tiny btn-default"
														   href="<?php echo get_the_permalink() ?>">Read Now</a>
													</div>
												</section>
											</div>
										</div>


									<?php
									endwhile;

									?>
								</div>
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
							<?php
						} else { ?>
							<div class="facetwp-template mt-2" style="color: #fff;">You Don't Have Courses...</div>
						<?php } ?>
					</section>
				</div>
			</div>
		</main>
	</div>


<?php

get_footer();
