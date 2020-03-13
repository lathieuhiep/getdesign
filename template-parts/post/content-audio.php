<?php

    $getdesign_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $getdesign_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $getdesign_audio ) ) : ?>

                <?php echo wp_oembed_get( $getdesign_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $getdesign_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>