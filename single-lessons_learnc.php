<?php

remove_action('genesis_entry_footer', 'genesis_post_info');
remove_action('genesis_entry_footer', 'genesis_post_meta');

function lco_render_next_previous_lesson() {

    $prev_post = get_next_post();
    $previous_lesson = array(
        'title' => $prev_post->post_title,
        'link' => get_permalink($prev_post),
    );

    $next_post = get_previous_post();
    $next_lesson = array(
        'title' => $next_post->post_title,
        'link' => get_permalink($next_post),
    );

    ob_start();
    ?>
        <div class="mdl-grid lco-lesson-footer-next-previous">
            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--2-col-phone lco-navigation">
                <?php
                if ($prev_post) :
                ?>
                <a href="<?= $previous_lesson['link'] ?>">
                    <div class="lco-previous">
                        <p><?= __('Previous', LCO_THEME) ?></p>
                        <h5> <?= $previous_lesson['title'] ?> </h5>
                    </div>
                </a>
                <?php
                endif;
                ?>
            </div>
            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--2-col-phone lco-navigation">
                <?php
                if ($next_post) :
                ?>
                <a href="<?= $next_lesson['link'] ?>">
                    <div class="lco-next">
                        <p><?= __('Next', LCO_THEME) ?></p>
                        <h5> <?= $next_lesson['title'] ?> </h5>
                    </div>
                </a>
                <?php
                endif;
                ?>
            </div>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}

add_action('genesis_entry_footer', 'lco_render_next_previous_lesson');

genesis();