<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wavyTrades
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php wavytrades_post_thumbnail(); ?>

	<div class="">
		<?php
		the_content();


		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
