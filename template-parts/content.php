<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wavyTrades
 */

?>

<div class="col-sm-6 col-lg-4 pb-4" id=" test post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post_card_arch">
        <div class="post_card_img" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)), url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/themes/wavytrades/assets/image/place.jpg'?>)"></div>
        <div class="card_wrapper px-4">
            <a class="d-block " href="<?php echo get_the_permalink()?>">
                <div class="card cart--blog py-4 px-3">
                    <h5 class="color_primary"><?php echo get_the_title() ?></h5>
                    <hr>
                    <div class="author-card">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="logo_crop">
                                     <span>   <img
                                                 src="/wp-content/themes/wavytrades/assets/image/logoCrop.png"
                                                 alt="">
                                     </span>
                                </div>   <div class="ms-3">
                                    <h4 class="mb-0 fs-sm-6"> <?php echo ucfirst(get_the_author()) ?> </h4>
                                    <p class="mb-0">
                                        <?php echo get_post_time('j F Y') ?>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


<!--	<header class="entry-header">-->
<!--		--><?php
//		if ( is_singular() ) :
//			the_title( '<h1 class="entry-title display-3 color_primary pb-4">', '</h1>' );
//		else :
//			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
//		endif;
//
//		if ( 'post' === get_post_type() ) :
//			?>
<!--			<div class="entry-meta">-->
<!--				--><?php
//				wavytrades_posted_on();
//				wavytrades_posted_by();
//				?>
<!--			</div>-->
            <!-- .entry-meta -->
<!--		--><?php //endif; ?>
<!--	</header>-->
    <!-- .entry-header -->

<!--	--><?php //wavytrades_post_thumbnail(); ?>

<!--	<div class="entry-content">-->
<!--		--><?php
//		the_content(
//			sprintf(
//				wp_kses(
//					/* translators: %s: Name of current post. Only visible to screen readers */
//					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wavytrades' ),
//					array(
//						'span' => array(
//							'class' => array(),
//						),
//					)
//				),
//				wp_kses_post( get_the_title() )
//			)
//		);
//
//		wp_link_pages(
//			array(
//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wavytrades' ),
//				'after'  => '</div>',
//			)
//		);
//		?>
<!--	</div><.entry-content -->

	<footer class="entry-footer">
<!--		--><?php //wavytrades_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div><!-- #post-<?php the_ID(); ?> -->
