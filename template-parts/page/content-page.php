<?php
/**
 * Displays content for front page
 *
 */
?>

<div class="container">

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="site-page-content">

            <?php
            the_content();

            getdesign_link_page();
            ?>

        </div>

    <?php
        getdesign_comment_form();

    endwhile;
    ?>

</div>