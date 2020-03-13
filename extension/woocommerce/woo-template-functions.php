<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'getdesign_shop_setup' );

function getdesign_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Start limit product */
add_filter('loop_shop_per_page', 'getdesign_show_products_per_page');

function getdesign_show_products_per_page() {
    global $getdesign_options;

    $getdesign_product_limit = $getdesign_options['getdesign_product_limit'];

    return $getdesign_product_limit;

}
/* End limit product */

/* Start Change number or products per row */
add_filter('loop_shop_columns', 'getdesign_loop_columns_product');

function getdesign_loop_columns_product() {
    global $getdesign_options;

    $getdesign_products_per_row = $getdesign_options['getdesign_products_per_row'];

    if ( !empty( $getdesign_products_per_row ) ) :
        return $getdesign_products_per_row;
    else:
        return 4;
    endif;

}
/* End Change number or products per row */

/* Start get cart */
if ( ! function_exists( 'getdesign_get_cart' ) ):

    function getdesign_get_cart() {

    ?>

        <div class="cart-box d-flex align-items-center">
            <div class="cart-customlocation">
                <i class="fas fa-shopping-cart"></i>

                <span class="number-cart-product">
                     <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                </span>
            </div>
        </div>

    <?php
    }

endif;

/* To ajaxify your cart viewer */
add_filter( 'woocommerce_add_to_cart_fragments', 'getdesign_add_to_cart_fragment' );

if ( ! function_exists( 'getdesign_add_to_cart_fragment' ) ) :

    function getdesign_add_to_cart_fragment( $getdesign_fragments ) {

        ob_start();

        do_action( 'getdesign_woo_shopping_cart' );

        $getdesign_fragments['.cart-box'] = ob_get_clean();

        return $getdesign_fragments;

    }

endif;
/* End get cart */

/* Start Sidebar Shop */
if ( ! function_exists( 'getdesign_woo_get_sidebar' ) ) :

    function getdesign_woo_get_sidebar() {

	    global $getdesign_options;
	    $getdesign_sidebar_woo_position = $getdesign_options['getdesign_sidebar_woo'];


	    if( is_active_sidebar( 'getdesign-sidebar-wc' ) ):

	        if ( $getdesign_sidebar_woo_position == 'left' ) :
		        $class_order = 'order-md-1';
	        else:
		        $class_order = 'order-md-2';
	        endif;
    ?>

            <aside class="col-12 col-md-4 col-lg-3 order-2 <?php echo esc_attr( $class_order ); ?>">
                <?php dynamic_sidebar( 'getdesign-sidebar-wc' ); ?>
            </aside>

    <?php
        endif;
    }

endif;
/* End Sidebar Shop */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'getdesign_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function getdesign_woo_before_main_content() {
        global $getdesign_options;
        $getdesign_sidebar_woo_position = $getdesign_options['getdesign_sidebar_woo'];

    ?>

        <div class="site-shop">
            <div class="container">
                <div class="row">

                <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked getdesign_woo_sidebar - 10
                     */
                    do_action( 'getdesign_woo_sidebar' );

                ?>

                    <div class="<?php echo is_active_sidebar( 'getdesign-sidebar-wc' ) && $getdesign_sidebar_woo_position != 'hide' ? 'col-12 col-md-8 col-lg-9 order-1 has-sidebar' : 'col-md-12'; ?>">

    <?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function getdesign_woo_after_main_content() {
        global $getdesign_options;
        $getdesign_sidebar_woo_position = $getdesign_options['getdesign_sidebar_woo'];
    ?>

                    </div><!-- .col-md-9 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->

    <?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_product_thumbnail_open' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked getdesign_woo_product_thumbnail_open - 5
     */

    function getdesign_woo_product_thumbnail_open() {

?>

        <div class="site-shop__product--item-image">

<?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_product_thumbnail_close' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked getdesign_woo_product_thumbnail_close - 15
     */

    function getdesign_woo_product_thumbnail_close() {

        do_action( 'getdesign_woo_button_quick_view' );
?>

        </div><!-- .site-shop__product--item-image -->

        <div class="site-shop__product--item-content">

<?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_get_product_title' ) ) :
    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked getdesign_woo_get_product_title - 10
     */

    function getdesign_woo_get_product_title() {
    ?>
        <h2 class="woocommerce-loop-product__title">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php
    }
endif;

if ( ! function_exists( 'getdesign_woo_after_shop_loop_item_title' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked getdesign_woo_after_shop_loop_item_title - 15
     */
    function getdesign_woo_after_shop_loop_item_title() {
    ?>
        </div><!-- .site-shop__product--item-content -->
    <?php
    }
endif;

if ( ! function_exists( 'getdesign_woo_loop_add_to_cart_open' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getdesign_woo_loop_add_to_cart_open - 4
     */

    function getdesign_woo_loop_add_to_cart_open() {
    ?>
        <div class="site-shop__product-add-to-cart">
    <?php
    }

endif;

if ( ! function_exists( 'getdesign_woo_loop_add_to_cart_close' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getdesign_woo_loop_add_to_cart_close - 12
     */

    function getdesign_woo_loop_add_to_cart_close() {
    ?>
        </div><!-- .site-shop__product-add-to-cart -->
    <?php
    }

endif;

if ( ! function_exists( 'getdesign_woo_before_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked getdesign_woo_before_shop_loop_item - 5
     */
    function getdesign_woo_before_shop_loop_item() {
    ?>

        <div class="site-shop__product--item">

    <?php
    }
endif;

if ( ! function_exists( 'getdesign_woo_after_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked getdesign_woo_after_shop_loop_item - 15
     */
    function getdesign_woo_after_shop_loop_item() {
    ?>

        </div><!-- .site-shop__product--item -->

    <?php
    }
endif;

if ( ! function_exists( 'getdesign_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked getdesign_woo_before_shop_loop_open - 5
     */
    function getdesign_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'getdesign_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked getdesign_woo_before_shop_loop_close - 35
     */
    function getdesign_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

/*
* Single Shop
*/

if ( ! function_exists( 'getdesign_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked getdesign_woo_before_single_product - 5
     */

    function getdesign_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked getdesign_woo_after_single_product - 30
     */

    function getdesign_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'getdesign_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getdesign_woo_before_single_product_summary_open_warp - 1
     */

    function getdesign_woo_before_single_product_summary_open_warp() {

    ?>

        <div class="site-shop-single__warp">

    <?php

    }

endif;

if ( !function_exists( 'getdesign_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked getdesign_woo_after_single_product_summary_close_warp - 5
     */

    function getdesign_woo_after_single_product_summary_close_warp() {

    ?>

        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getdesign_woo_before_single_product_summary_open - 5
     */

    function getdesign_woo_before_single_product_summary_open() {

    ?>

        <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'getdesign_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked getdesign_woo_before_single_product_summary_close - 30
     */

    function getdesign_woo_before_single_product_summary_close() {

    ?>

        </div><!-- .site-shop-single__gallery-box -->

    <?php

    }

endif;