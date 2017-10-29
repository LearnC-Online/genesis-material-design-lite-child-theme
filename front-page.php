<?php

// ***************** Esta será la plantilla de la home

// Quitamos el loop (los posts)

remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_filter( 'genesis_attr_content-sidebar-wrap','gmdl_add_markup_class', 10, 2 );


// Quitamos la barra lateral

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


// Colocamos la widget area "Llamada a la accion"

add_action( 'genesis_after_content', 'jb_mostrar_home_cta' );

function jb_mostrar_home_cta() {
    $content_page_link = get_page_link(get_page_by_path( 'content' )->ID);

    ob_start();
    ?>
        <div class="lco-home-content">
            <h1 class="mdl-typography--display-4"><?= __( 'Learn C Online', LCO_THEME ) ?> </h1>
            <h2 class="mdl-typography--display-3"><?= __( 'A website to learn how to code using C programming.', LCO_THEME ) ?> </h2>
            <a href="<?= $content_page_link ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                <?= __('START NOW', LCO_THEME) ?>
            </a>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}


// instead of genesis build the section of the page that we need
get_header();

do_action( 'genesis_after_content' );

do_action( 'genesis_after_content_sidebar_wrap' );

get_footer();