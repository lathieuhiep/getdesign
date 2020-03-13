<?php
global $getdesign_options;

$getdesign_information_show_hide = $getdesign_options['getdesign_information_show_hide'] == '' ? 1 : $getdesign_options['getdesign_information_show_hide'];

if ( $getdesign_information_show_hide == 1 ) :

$getdesign_information_address   =   $getdesign_options['getdesign_information_address'];
$getdesign_information_mail      =   $getdesign_options['getdesign_information_mail'];
$getdesign_information_phone     =   $getdesign_options['getdesign_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $getdesign_information_address != '' ) : ?>

                    <span>
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $getdesign_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $getdesign_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fas fa-envelope"></i>
                        <?php echo esc_html( $getdesign_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $getdesign_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $getdesign_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php getdesign_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;