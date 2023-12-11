<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wavyTrades
 */

get_header();
$cat_name = $_GET['cat_name'] ?? '';
$serch_value = $_GET['s'] ?? '';
?>
    <div class="stm__blog--section">
   <div class="container-fluid">
    <main id="primary" class="site-main search_results">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="display-3 text-center font-weight-bold" style="color: #fff;">Search Results</h1>
                <div class="py-5 d-flex justify-content-center">

                    <form action="/" data-ajax_url="/wp-admin/admin-ajax.php" method="get" class="input-group flex-nowrap free_cont_search">
                        <button class="btn btn-link" type="button" id="search_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                        </button>
                        <input type="text" name="s" class="form-control" id="search" aria-label="Search" aria-describedby="search_btn" placeholder="Search" value="<?php echo $serch_value?>">
                        <input type="hidden" name="cat_name" class="form-control" value="<?php echo $cat_name?>">
                    </form>

                </div>

            </header>


            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part('template-parts/content', 'search');

            endwhile;

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- #main -->
   </div>
    </div>
<?php
//get_sidebar();
get_footer();
