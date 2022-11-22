<nav id="navbar_main" class="mobile-offcanvas  navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <?php 
            $logo = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $logo , 'full' );
            $image_url = $image[0];
        ?>
        <a title="Ga naar de homepagina" href="/"><img
                <?php if ( get_option( 'logo_width' ) != '' ) : ?>width="<?php echo get_option( 'logo_width' ); ?>"
                <?php endif; ?>
                <?php if ( get_option( 'logo_height' ) != '' ) : ?>height="<?php echo get_option( 'logo_height' ); ?>"
                <?php endif; ?> src="<?php echo $image_url; ?>" class="navbar-brand"
                alt="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"
            data-trigger="navbar_main" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-menu">
        <div class="offcanvas-header">
            <button class="btn-close float-end"></button>
        </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav %2$s">%3$s</ul>',
                'depth' => 3,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
    </div>
</nav>