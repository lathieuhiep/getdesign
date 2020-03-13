<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','getdesign_config_theme' );

        function getdesign_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $getdesign_options;
                    $getdesign_favicon = $getdesign_options['getdesign_favicon_upload']['url'];

                    if( $getdesign_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $getdesign_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'getdesign_custom_css', 99 );

        function getdesign_custom_css() {

            global $getdesign_options;

            $getdesign_typo_selecter_1   =   $getdesign_options['getdesign_custom_typography_1_selector'];

            $getdesign_typo1_font_family   =   $getdesign_options['getdesign_custom_typography_1']['font-family'] == '' ? '' : $getdesign_options['getdesign_custom_typography_1']['font-family'];

            $getdesign_css_style = '';

            if ( $getdesign_typo1_font_family != '' ) :
                $getdesign_css_style .= ' '.esc_attr( $getdesign_typo_selecter_1 ).' { font-family: '.balanceTags( $getdesign_typo1_font_family, true ).' }';
            endif;

            if ( $getdesign_css_style != '' ) :
                wp_add_inline_style( 'getdesign-style', $getdesign_css_style );
            endif;

        }

    endif;
