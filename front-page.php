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
            <h2 class="mdl-typography--display-3"><?= __( 'Learn how to code using C programming right in your browser!', LCO_THEME ) ?> </h2>
            <a href="<?= $content_page_link ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                <?= __('START NOW', LCO_THEME) ?>
            </a>
        </div>

        <div class="lco-home-features-section">
            <h3 class="mdl-typography--display-1"><?= __('How LearnC Works', LCO_THEME) ?></h3>

            <div class="lco-home-features-container">
                <div class="mdl-grid">
                    <!-- Learn Feature -->
                    <div class="mdl-cell--6-col lco-feature">
                        <div class="mdl-grid">
                            <div class="mdl-cell--8-col">
                                <h5 class="mdl-typography--headline"><?= __('Learn', LCO_THEME) ?></h5>
                                <div class="lco-feature-text">
                                    <span class="mdl-typography--subheading">
                                        <?= __('Focused on learn by doing with a step by step tutorial that allows you to practice in every lesson.', LCO_THEME) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="mdl-cell--4-col lco-feature-image">
                                <img src="<?= get_stylesheet_directory_uri() . '/img/home-features/learn.svg' ?>" alt="<?= __('Learn by Doing', LCO_THEME)?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- Beginner Feature -->
                     <div class="mdl-cell--6-col lco-feature">
                        <div class="mdl-grid">
                            <div class="mdl-cell--4-col lco-feature-image">
                                <img src="<?= get_stylesheet_directory_uri() . '/img/home-features/beginner.svg' ?>" alt="<?= __('Beginner Friendly', LCO_THEME)?>"/>
                            </div>
                            <div class="mdl-cell--8-col">
                                <h5 class="mdl-typography--headline"><?= __('Beginner', LCO_THEME) ?></h5>
                                <div class="lco-feature-text">
                                    <span class="mdl-typography--subheading">
                                        <?= __('No need any code experience to start learning with us. We are focus on beginner.', LCO_THEME) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-grid">
                    <!-- Practice Feature -->
                    <div class="mdl-cell--6-col lco-feature">
                        <div class="mdl-grid">
                            <div class="mdl-cell--8-col">
                                <h5 class="mdl-typography--headline"><?= __('Practice', LCO_THEME) ?></h5>
                                <div class="lco-feature-text">
                                    <span class="mdl-typography--subheading">
                                        <?= __('Code directly in the browser with the examples and exercises that you will find in each lesson.', LCO_THEME) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="mdl-cell--4-col">
                                <img src="<?= get_stylesheet_directory_uri() . '/img/home-features/practice.svg' ?>" alt="<?= __('Practice in your Browser', LCO_THEME)?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- Track Feature -->
                     <div class="mdl-cell--6-col lco-feature">
                        <div class="mdl-grid">
                            <div class="mdl-cell--4-col">
                                <img src="<?= get_stylesheet_directory_uri() . '/img/home-features/track.svg' ?>" alt="<?= __('Track your Progress', LCO_THEME)?>"/>
                            </div>
                            <div class="mdl-cell--8-col">
                                <h5 class="mdl-typography--headline"><?= __('Track', LCO_THEME) ?></h5>
                                <div class="lco-feature-text">
                                    <span class="mdl-typography--subheading">
                                        <?= __('Keep track of all your progress - lessons watched, units completed and exercises.', LCO_THEME) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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