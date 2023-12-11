<?php

?>

<form method="post" class="wc-auth-login">
    <p class="form-row form-row-wide">
        <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" /><?php //@codingStandardsIgnoreLine ?>
    </p>
    <p class="form-row form-row-wide">
        <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input class="input-text" type="password" name="password" id="password" />
    </p>
    <p class="wc-auth-actions form-group">
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
        <input type="submit" class="btn btn-lg btn-block btn-orange font-weight-bold login-form-btn " name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>">
        <input type="hidden" name="user" value="true" />
<!--        <input type="hidden" name="redirect" value="--><?php //echo esc_url( $redirect_url ); ?><!--" />-->
    </p>
</form>
