<?php

global $getdesign_options;

$getdesign_show_loading = $getdesign_options['getdesign_general_show_loading'] == '' ? '0' : $getdesign_options['getdesign_general_show_loading'];

if(  $getdesign_show_loading == 1 ) :

    $getdesign_loading_url  = $getdesign_options['getdesign_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $getdesign_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $getdesign_loading_url ); ?>" alt="<?php esc_attr_e('loading...','getdesign') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','getdesign') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>