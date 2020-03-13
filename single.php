<?php
get_header();

global $getdesign_options;

$getdesign_blog_sidebar_single = !empty( $getdesign_options['getdesign_blog_sidebar_single'] ) ? $getdesign_options['getdesign_blog_sidebar_single'] : 'right';

$getdesign_class_col_content = getdesign_col_use_sidebar( $getdesign_blog_sidebar_single, 'getdesign-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $getdesign_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $getdesign_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

