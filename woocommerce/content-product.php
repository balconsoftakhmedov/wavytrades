<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<!--<div --><?php //wc_product_class( '', $product ); ?><!--
<	--><?php
//	/**
//	 * Hook: woocommerce_before_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_open - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item' );
//
//	/**
//	 * Hook: woocommerce_before_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_show_product_loop_sale_flash - 10
//	 * @hooked woocommerce_template_loop_product_thumbnail - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_product_title - 10
//	 */
//	do_action( 'woocommerce_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_rating - 5
//	 * @hooked woocommerce_template_loop_price - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_close - 5
//	 * @hooked woocommerce_template_loop_add_to_cart - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item' );
//


    $title = get_the_title();
    $link = get_post_permalink();
    $desc = get_the_excerpt();
    $id = get_the_ID();
    $backg = get_the_post_thumbnail();
    $price = get_post_meta( $id, '_regular_price', true);
    $priceSale = get_post_meta( $id, '_sale_price', true);
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
    $currentPrice = $priceSale ? $priceSale : $price;
    $slaePrice = $priceSale ? $price : $priceSale;
    $amount = $slaePrice ? '$': '';
    ?>

   <div class='grid_item_courses' >
        <a href='<?php echo $link ?>' class='img_curs_link'>
            <img src='<?php echo $image[0]?>' data-id='<?php echo $id?>' alt=''>
        </a>
        <div class='stm_product_courses_info'>
            <div class='stm_description_courses'>
                <?php echo $desc?>
            </div>
            <div class='product_info_p'>
                <a class='product_button' href='<?php echo $link?>'>Read More</a>
                <div class='product_price'>
                    <span style='text-decoration: line-through; font-size: 15px; font-weight: 400;'><?php echo $amount.''.$slaePrice ?></span>
                    <span style='font-size: 19px; line-height: 1.15;font-weight: 700;' > <?php echo '$'.$currentPrice ?></span>
                </div>
            </div>
        </div>
    </div>


<!--</div>-->
