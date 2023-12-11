<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wavyTrades
 */

get_header();
?>
    <main id="main" class="site-main">
        <div class="inside-article">
            <div class="error404_st_logo">
                <img src="http://wavytraders.local/wp-content/uploads/2022/11/PNG.png"
                     alt="">
            </div>
            <div class="plug_img"></div>

            <div class="error404_content">
                <h2>Oops!</h2>
                <h3>We can’t seem to find the page you’re looking for…You can:</h3>
                <div class="text-center">
                    <p>1. Click your “Back” button and try again</p>
                    <p>2. <a href="/">Click Here</a> to go to our homepage</p>
                    <p>3. Contact us at <a href="mailto:gmail.com">gmail.com</a> or
                        call (512) 266-8659</p>
                </div>
            </div>
        </div><!-- .inside-article -->
    </main><!-- #main -->
<?php
get_footer();
