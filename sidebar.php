
<?php if( is_active_sidebar( 'getdesign-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( getdesign_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'getdesign-sidebar-main' ); ?>
    </aside>

<?php endif; ?>