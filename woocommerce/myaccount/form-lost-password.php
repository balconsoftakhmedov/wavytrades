<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>
    <div class="dashboard">
        <?php require_once 'account-sidebar.php' ?>
        <main class="dashboard__main dashboard__main--gradient">
            <div class="dashboard__content">
                <div class="dashboard__content-main">
                    <section class="dashboard__content-section">
                        <div class="woocommerce">
                            <div class="dashboard__login-container">
                                <div class="dashboard__login-logo"></div>
                                <div class="content-box content-box--centered">
                                    <div class="content-box__section">

                                        <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                                            <h2 class="h3 text-center title">Reset Password</h2>
                                            <p style="text-align: center;"><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine ?>

                                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                <label for="user_login"><?php esc_html_e('Username or email', 'woocommerce'); ?></label>
                                                <input class="woocommerce-Input woocommerce-Input--text input-text"
                                                       type="text" name="user_login" id="user_login"
                                                       autocomplete="username"/>
                                            </p>

                                            <div class="clear"></div>

                                            <?php do_action('woocommerce_lostpassword_form'); ?>

                                            <p class="woocommerce-form-row form-row">
                                                <input type="hidden" name="wc_reset_password" value="true"/>
                                                <button type="submit"
                                                        class="woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
                                                        value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
                                            </p>

                                            <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

                                        </form>

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
do_action('woocommerce_after_lost_password_form');
