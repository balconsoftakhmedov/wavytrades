<?php
class Alg_WC_Email_Verification_Emails_ extends Alg_WC_Email_Verification_Emails{
    public function __construct() {
        add_filter('alg_wc_ev_email_content', array($this, 'custom_content_filter'), 10, 2);
        add_filter( 'alg_wc_ev_email_subject', array( $this, 'custom_subject_filter' ), 10, 2 );
    }

    public function custom_content_filter($content, $args) {
        $content =  __('<p style="text-align: left; margin-bottom: 15px;">Thank you for expressing your interest in joining our vibrant community of traders. We have received your request and are delighted to assist you in activating your account.</p>
                        <p style="text-align: left; margin-bottom: 15px;">
                        To proceed, please click on the following URL to activate your account:  <a href="%verification_url%" target="_blank">Verify your account</a>. This will grant you access to our exclusive community features, where you can connect with like-minded traders and benefit from valuable trading insights.</p>
                        <p style="text-align: left; margin-bottom: 15px;">
                        In the event that you did not initiate this request, kindly disregard this email. No further action is required on your part.
                        </p>
                        <p style="text-align: left; margin-bottom: 15px;">
                        If you encounter any issues during the activation process or have any questions regarding our community, please don’t hesitate to reach out to our dedicated  <a href="https://wavytrades.com/" target="_blank">WavyTrades Community Team.</a> We are here to provide you with the assistance you need.</p>
                        <p style="text-align: left; margin-bottom: 15px;">We look forward to welcoming you to our thriving community of traders.</p>
                        
                        <p style="text-align: left; margin-bottom: 15px;">Best regards, <br>
                        The WavyTrades Community Team*</p>', 'emails-verification-for-woocommerce');
        return $content;
    }

    public function custom_subject_filter( $subject, $args ) {
        // Внесите нужные изменения в переменную $subject
        $subject =  __( 'Activate Your WavyTrades AccountDear', 'emails-verification-for-woocommerce' );

        // Возвращаем измененное значение
        return $subject;
    }

}

new Alg_WC_Email_Verification_Emails_();
