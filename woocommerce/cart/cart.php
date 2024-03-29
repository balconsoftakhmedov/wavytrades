<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;

?>
<header class="cart-page-header">
    <div class="container-fluid">
        <h1 class="cart-page-title" style="color: #fff;">Shopping Cart</h1>
    </div>
</header>

<div class="container-fluid">
<?php do_action( 'woocommerce_before_cart' ); ?>
</div>

<div class="container-lg">
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class="woocommerce-cart-form__contents">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-8">


	<table class="table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove"><?php esc_html_e( 'Delete', 'masterstudy' ); ?></th>
				<th class="product-name"><?php esc_html_e( 'Product name', 'masterstudy' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'masterstudy' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'masterstudy' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Total', 'masterstudy' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="product-remove" data-title="<?php esc_attr_e( 'Remove', 'masterstudy' ); ?>">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" data-label="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Delete', 'masterstudy' ),
										esc_html__( 'Remove this item', 'masterstudy' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e( 'Name', 'masterstudy' ); ?>">
							<span class="mobile-title"><?php esc_html_e( 'Product name', 'masterstudy' ); ?>:</span>
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo stm_echo_safe_output( $thumbnail ); // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s" class="shop_table_small_thumb">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), wp_kses_post( $thumbnail ) );
						}
						?>
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'masterstudy' ) . '</p>' ) );
						}
						?>
						</td>

						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'masterstudy' ); ?>">
							<span class="mobile-title"><?php esc_html_e( 'Price', 'masterstudy' ); ?>:</span>
							<?php
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ) );
							?>
						</td>

						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'masterstudy' ); ?>">
							<span class="mobile-title"><?php esc_html_e( 'Quantity', 'masterstudy' ); ?>:</span>
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'masterstudy' ); ?>">
							<span class="mobile-title"><?php esc_html_e( 'Subtotal', 'masterstudy' ); ?>:</span>
							<?php
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) );
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="5" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'masterstudy' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'masterstudy' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<input type="submit" class="button update-cart" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'masterstudy' ); ?>" />

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
</div> <!-- table-responsive -->


    <div class="col-xs-12 col-sm-5 col-md-4">
        <div class="cart-collaterals mb-5">

            <div class="card">
                <div class="card-body">

            <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            do_action( 'woocommerce_cart_collaterals' );
            ?>
                </div>
            </div>
        </div>
    </div>
<div class="multiseparator"></div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</div>
        </div>
</form>
</div>
<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>



<?php do_action( 'woocommerce_after_cart' ); ?>
