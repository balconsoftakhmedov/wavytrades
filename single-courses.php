<?php
$get_courses_id = get_user_meta(get_current_user_id(), 'stm_courses', true);
$id = get_the_ID();

$user = new WP_User(get_current_user_id());
$role = '';
if (!empty($user->roles) && is_array($user->roles)) {
    foreach ($user->roles as $role) {
        if ($role == 'administrator') {
            $role = $role;
        }
    }
}

$redirect = false;

if ( is_array($get_courses_id) && in_array($id, $get_courses_id) || $role == 'administrator') {
    $redirect = false;
} else {
    $redirect = true;
}

if ($redirect) {
    wp_redirect('/');
}


get_header();

?>


<?php
?>
    <main id="primary daily" class="site-main" style="background: #000; border-top: 4px solid #222; color: #fff;">


        <?php
        while (have_posts()) :
            the_post();
            ?>

            <div class="container-fluid pb-5 pt-5">
                <div class="blog__stm">
                    <div class="daily_title"><?php echo get_the_title() ?></div>
                    <div class="daily_subtitle">With <?php the_author() ?></div>
                    <?php
                    the_content(); ?>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>

                </div>
            </div>
        <?php

        endwhile; // End of the loop.
        ?>


    </main><!-- #main -->


<?php

get_footer();
