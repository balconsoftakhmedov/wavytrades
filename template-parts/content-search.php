<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wavyTrades
 */

?>



    <a href="<?php echo  get_the_permalink()?>">
        <div class="card cart--blog p-2 mb-4 d-block d-sm-flex align-items-center flex-row">
            <div id="result_thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/themes/wavytrades/assets/image/place.jpg' ?>)"></div>

            <div class="ms-3 py-3 py-sm-0">
                <div class="s_cats"></div>
                <h5 class="color_primary"><?php echo get_the_title() ?>;</h5>
                <p class="m-sm-0 color_secondary" style="color: #fff;"><?php echo get_the_excerpt() ?></p>
                <p class="m-0 color_primary">
                    <?php echo get_post_time('j F Y') ?>.
                </p>
            </div>
        </div>
    </a>





<!--<article class="container-lg" id="post---><?php //the_ID(); ?><!--" --><?php //post_class(); ?><!--
   <header class="entry-header">-->
<!--        --><?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
<!---->
<!--        --><?php //if ( 'post' === get_post_type() ) : ?>
<!--            <div class="entry-meta">-->
<!--                --><?php
//                wavytrades_posted_on();
//                wavytrades_posted_by();
//                ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!--    </header>-->
<!---->
<!--    --><?php //wavytrades_post_thumbnail(); ?>
<!---->
<!--    <div class="entry-summary">-->
<!--        --><?php //; ?>
<!--    </div>-->
<!---->
<!--    <footer class="entry-footer">-->
<!--        --><?php //wavytrades_entry_footer(); ?>
<!--    </footer>-->
<!--</article>--><?php //the_ID(); ?>
