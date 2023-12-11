<?php
/** Template Name: checkout  */

get_header();

?>

<section class="wl-page-content">
	<div class="container-fluid">
		<div class="woocommerce">
			<!--                <div class="woocommerce-notices-wrapper">-->
			<!--                    <div class="woocommerce-message" role="alert">-->
			<!--                        Coupon code applied successfully.-->
			<!--                    </div>-->
			<!--                </div>-->
			<div class="woocommerce-notices-wrapper"></div>
			<div id="coupons_list" style="display: none;">
				<style type="text/css">
                    :root {
                        --sc-color1: #2b2d42;
                        --sc-color2: #edf2f4;
                        --sc-color3: #fcbf49;
                    }
				</style>
				<h3>Available Coupons (click on a coupon to use it)</h3>
				<div id="sc-cc">
					<div id="all_coupon_container" class="sc-coupons-list">
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-8 order-2 order-sm-1">
						<nav class="checkout-nav hidden-xs">
							<ul>
								<li id="nav-checkout-account"
									class="<?php echo is_user_logged_in() ? 'disabled' : 'active' ?>">
									<span>Sign In / Register</span></li>
								<li id="nav-checkout-billing"
									class="<?php echo is_user_logged_in() ? 'active' : 'disabled' ?>">
									<span>Billing Info</span>
								</li>
								<!--                                    <li id="nav-checkout-payment" class="disabled"><span>Payment</span></li>-->
							</ul>
						</nav>
						<div class="checkout-steps">
							<!--                            <div id="checkout-account"-->
							<!--                                 class="checkout-step -->
							<?php //echo is_user_logged_in() ? '' : 'active' ?><!-- ">-->
							<div id="checkout-account"
								 class="checkout-step">

								<div class="checkout-account-login is-visible">
									<div class="card">
										<div class="card-body">
											<div class="checkout-account-login-left">
												<h3>Sign in</h3>
												<?php do_shortcode('[woocommerce_signin]'); ?>
											</div>

											<div class="checkout-account-login-right text-center">
												<h3>New to WayTrades?</h3>
												<p>You will need an account to purchase our classes and other
													products.</p>
												<a href="#"
												   class="toggle-account-forms btn btn-lg btn-block btn-orange font-weight-bold">Register
													for an Account</a>
											</div>
										</div>
									</div>
								</div>

								<div class="checkout-account-register">
									<?php do_shortcode('[woocommerce_register]') ?>
								</div>
							</div>
							<?php
							$getKey = 'alg_wc_ev_activate_account_message';
							if (isset($_GET[$getKey]) && !empty($_GET[$getKey])) { ?>
								<div class="woocommerce-message">
									Thank you for your registration. Your account has to be activated before you can
									login. Please check your email.
								</div>
							<?php } ?>
							<div id="" class="checkout-step active">
								<?php
								define('WOOCOMMERCE_CHECKOUT', true);
								echo do_shortcode('[woocommerce_checkout]');
								?>
							</div>
						</div>
					</div>
					<!--    <pre>-->
					<!---->
					<!---->
					<!--    --><?php ////var_dump(WC()->cart->get_cart());
					//
					//    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					//         var_dump($cart_item['data']);
					//    }
					//    ?>
					<!---->
					<!---->
					<!--    </pre>-->


					<div class="col-xs-12 col-sm-5 col-md-4 order-1 order-sm-2">
						<div class="checkout-cart">
							<div class="card">
								<div id="order_review" class="woocommerce-checkout-review-order">
									<div class="">
										<div class="card-header hidden-xs">
											<h4 class="font-weight-bold">Shopping Cart</h4>
											<a href="/cart"
											   class="btn btn-xs btn-default">Edit</a>
										</div>

										<div class="checkout-cart-contents">

											<div class="checkout-cart-products">
												<?php
												foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
													$product = $cart_item['data'];
													$product_id = $cart_item['product_id'];
													$thumbnail = $product->get_image(array('50', '50'), array('class' => 'alignleft'));
													?>
													<div class="product">
														<div class="product-image">
															<?php echo $thumbnail ?>
														</div>
														<div class="product-name">
															<?php
															echo $cart_item['data']->name ?? '';
															$freeTrialDay = get_post_meta($product_id, '_rp_sub:free_trial_length', true);
															?>

															<?php if (empty($freeTrialDay)) { ?>
																<span style="background: #29abe1; padding: 1px 4px; border-radius: 2px;">
                                                                <?php echo 'x ' . $cart_item['quantity'] ?>
                                                            </span>

															<?php } else { ?>

																<span style="background: #29abe1; padding: 1px 4px; border-radius: 2px;">
                                                                <?php echo  $freeTrialDay . ' Days trial' ?>
                                                            </span>
															<?php } ?>
															<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
																<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
																	<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
																</div>
															<?php endforeach; ?>

														</div>
														<div class="product-total">

                                                            <span class="woocommerce-Price-amount amount"><bdi>
                                                   <span class="woocommerce-Price-currencySymbol">$</span><?php echo !empty($cart_item['data']->sale_price) ? $cart_item['data']->sale_price : $cart_item['data']->regular_price ?></bdi></span>

															<!--                                                            --><?php //if (isset($cart_item['data']->sale_price) && $cart_item['data']->sale_price > 0) { ?>
															<!---->
															<!--                                                                <span class="woocommerce-Price-currencySymbol">$</span>-->
															<?php //echo !empty($cart_item['data']->sale_price) ? $cart_item['data']->sale_price : $cart_item['data']->regular_price ?><!--</bdi></span>-->
															<!--                                                            --><?php //} ?>
															<del class="product-price-regular"><span
																		class="woocommerce-Price-amount amount"><bdi>
                                                                        <?php
																		if (!empty($cart_item['data']->sale_price))
																		{
																		?>
                                                                                      <span class="woocommerce-Price-currencySymbol">$</span>
                                                                        <?php echo $cart_item['data']->regular_price ?> </bdi>
                                                                        <?php } ?>

                                                                </span>
															</del>
															<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
																<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
																	<div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
																</div>
															<?php endforeach; ?>
														</div>
													</div>
												<?php } ?>
											</div>


											<!--                            <div class="cart-table-wrapper">-->
											<!--                                <table class="cart-table coupons-table">-->
											<!--                                    <tbody>-->
											<!--                                    <tr>-->
											<!--                                        <th colspan="2">Coupons</th>-->
											<!--                                    </tr>-->
											<!--                                    <tr class="cart-discount coupon-sam-trial7">-->
											<!--                                        <th style="vertical-align: middle;">sam-trial7</th>-->
											<!--                                        <td style="vertical-align: middle; text-align: right;">-->
											<!--                                            -<span class="woocommerce-Price-amount amount"><span-->
											<!--                                                        class="woocommerce-Price-currencySymbol">$</span>40.00</span>-->
											<!--                                            <a href="https://www.simplertrading.com/cart?remove_coupon=sam-trial7"-->
											<!--                                               class="woocommerce-remove-coupon btn btn-xs btn-default"-->
											<!--                                               data-coupon="sam-trial7"><span-->
											<!--                                                        class="fa fa-times"></span></a></td>-->
											<!--                                    </tr>-->
											<!--                                    </tbody>-->
											<!--                                </table>-->
											<!--                            </div>-->


											<!--                            <div class="cart-table-wrapper">-->
											<!--                                <table class="cart-table">-->
											<!--                                    <tbody>-->
											<!--                                    <tr class="tax-total">-->
											<!--                                        <th>Tax</th>-->
											<!--                                        <td><span class="woocommerce-Price-amount amount"><bdi><span-->
											<!--                                                            class="woocommerce-Price-currencySymbol">$</span>0.00</bdi></span>-->
											<!--                                        </td>-->
											<!--                                    </tr>-->
											<!--                                    </tbody>-->
											<!--                                </table>-->
											<!--                            </div>-->


											<div class="checkout-order-total">
												<div>Total</div>
												<div class="checkout-order-total-price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol">$ </span><?php echo WC()->cart->total ?>
                                                            </bdi>
                                                        </span>
													<del class="checkout-order-total-price-regular"><span
																class="woocommerce-Price-amount amount"><bdi>
<!--                                                <span class="woocommerce-Price-currencySymbol">$</span>-->
																<?php //echo $cart_item['data']->sale_price ? $cart_item['data']->sale_price : $cart_item['data']->regular_price?><!--</bdi></span>-->
													</del>
												</div>
											</div>

											<!--                            <div class="cart-table-wrapper">-->
											<!--                                <table class="cart-table">-->
											<!--                                    <tbody>-->
											<!--                                    <tr class="recurring-totals">-->
											<!--                                        <th colspan="2">Recurring Totals</th>-->
											<!--                                    </tr>-->
											<!---->
											<!--                                    <tr class="cart-subtotal recurring-total">-->
											<!--                                        <th rowspan="1">Subtotal</th>-->
											<!--                                        <td data-title="Subtotal"><span-->
											<!--                                                    class="woocommerce-Price-amount amount"><span-->
											<!--                                                        class="woocommerce-Price-currencySymbol">$</span>597.00</span>-->
											<!--                                            every 3 months-->
											<!--                                        </td>-->
											<!--                                    </tr>-->
											<!---->
											<!---->
											<!--                                    <tr class="tax-total recurring-total">-->
											<!--                                        <th>Tax</th>-->
											<!--                                        <td data-title="Tax"><span-->
											<!--                                                    class="woocommerce-Price-amount amount"><span-->
											<!--                                                        class="woocommerce-Price-currencySymbol">$</span>0.00</span>-->
											<!--                                            every 3 months-->
											<!--                                        </td>-->
											<!--                                    </tr>-->
											<!---->
											<!--                                    <tr class="order-total recurring-total">-->
											<!--                                        <th rowspan="1">Recurring Total</th>-->
											<!--                                        <td data-title="Recurring Total"><strong><span-->
											<!--                                                        class="woocommerce-Price-amount amount"><span-->
											<!--                                                            class="woocommerce-Price-currencySymbol">$</span>597.00</span></strong>-->
											<!--                                            every 3 months-->
											<!--                                            <div class="first-payment-date"><small>First renewal:-->
											<!--                                                    April 8, 2023</small></div>-->
											<!--                                        </td>-->
											<!--                                    </tr>-->
											<!--                                    </tbody>-->
											<!--                                </table>-->
											<!--                                <div class="recurring_details" style="font-size: 14px;">-->
											<!--                                    <br>-->
											<!--                                    <p>This is a continuous subscription and your membership will-->
											<!--                                        continue until you cancel. The payment method you provided-->
											<!--                                        will be charged the recurring amount listed above at the end-->
											<!--                                        of your trial and will be charged the then market rate for-->
											<!--                                        the membership for the period you selected (monthly,-->
											<!--                                        quarterly, annual) thereafter. You can cancel at any time-->
											<!--                                        before your next billing date via the My Account area of-->
											<!--                                        your dashboard. Your subscription will continue until the-->
											<!--                                        end of the billing period in which you cancelled.</p></div>-->
											<!--                            </div>-->
										</div>
									</div>
								</div>

								<div class="checkout-cart-contents">
									<div class="woocommerce-form-coupon-toggle">

										<div class="woocommerce-info">
											Have a coupon? <a href="#" class="showcoupon">Click here to enter your
												code</a></div>
									</div>

									<form class="checkout_coupon woocommerce-form-coupon" method="post"
										  style="display:none">

										<p>If you have a coupon code, please apply it below.</p>

										<p class="form-row form-row-first">
											<input type="text" name="coupon_code" class="input-text"
												   placeholder="Coupon code" id="coupon_code" value="">
										</p>

										<p class="form-row form-row-last">
											<button type="submit" class="button" name="apply_coupon"
													value="Apply coupon">Apply coupon
											</button>
										</p>

										<div class="clear"></div>
									</form>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>


		</div>
		<style>
            .coupon-q3jrsp, .coupon-q3jr10x, {
                display: none;
            }
		</style>
	</div>
</section>


<?php get_footer() ?>





