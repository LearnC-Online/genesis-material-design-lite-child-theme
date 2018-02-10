<?php
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action('genesis_before_loop', 'lco_render_about_page');

function lco_render_about_page () {
    ob_start();
    ?>
        <div class="lco-about-page-container">
            <h1 class="text-center"><?= __('Here you will Learn C Online by doing', LCO_THEME) ?></h1>
            <h4><?= __('Since our 1st line of code we knew that the best way to learn how to code is always by doing.
                Here you can find tutorials to Learn C programming language with a lot of coding exercises.', LCO_THEME) ?></h4>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col">
                    <h3 class="text-center"><?=__('Mission', LCO_THEME)?></h3>
                    <h6 class="mdl-typography--title"><?= __('Teach in a pragmatic way how to start to code using C language.', LCO_THEME) ?></h6>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <h3 class="text-center"><?=__('Vision', LCO_THEME)?></h3>
                    <h6 class="mdl-typography--title"><?=__('Be the starred website for the beginners who wants to learn how to code by its own using C.', LCO_THEME)?></h6>
                </div>
                <div class="mdl-cell mdl-cell--8-col">
                    <h3><?=__('Characteristics', LCO_THEME)?></h3>
                    <ul>
                        <li>
                            <h6 class="mdl-typography--title"><?=__('Beginners', LCO_THEME)?></h6>
                        </li>
                        <li>
                            <h6 class="mdl-typography--title"><?=__('People without code experience', LCO_THEME)?></h6>
                        </li>
                        <li>
                            <h6 class="mdl-typography--title"><?=__('Programmer Students of 1st Semester', LCO_THEME)?></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}

genesis();