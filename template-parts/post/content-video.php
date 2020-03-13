<?php

$getdesign_video_post = get_post_meta(  get_the_ID() , 'getdesign_video_post', true );

if ( !empty( $getdesign_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $getdesign_video_post ); ?>
    </div>

<?php endif;?>